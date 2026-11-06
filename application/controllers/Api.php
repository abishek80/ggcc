<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * GGCC REST API Controller
 * Base URL: http://localhost/ggcc/api/
 *
 * Public endpoints (no token required):
 *   POST  api/login
 *
 * Protected endpoints (require: Authorization: Bearer {token}):
 *   POST  api/logout
 *   GET   api/profile
 *   GET   api/attendance/list
 *   GET   api/payslip/list
 */
class Api extends CI_Controller
{
    // ─── Properties ─────────────────────────────────────────────────

    /** Currently authenticated user (populated by authGuard) */
    private $authUser = null;

    // ─── Constructor ────────────────────────────────────────────────

    public function __construct()
    {
        parent::__construct();

        // Disable CodeIgniter output buffering — always return JSON
        $this->output->set_content_type('application/json');

        // Load models
        $this->load->model('apimodel');
        $this->load->model('loginmodel');

        // Allow CORS (useful for mobile / frontend clients)
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');

        // Respond to preflight OPTIONS request
        if ($this->input->server('REQUEST_METHOD') === 'OPTIONS') {
            http_response_code(200);
            exit();
        }
    }

    // ─── Helpers ────────────────────────────────────────────────────

    /**
     * Read and decode raw JSON body (works with Bruno / Postman raw JSON)
     */
    private function jsonBody()
    {
        $raw = file_get_contents('php://input');
        return json_decode($raw, true) ?: [];
    }

    /**
     * Send a JSON response
     */
    private function respond($data, $statusCode = 200)
    {
        http_response_code($statusCode);
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        exit();
    }

    /**
     * Base URL for building file/image links in API responses, using the *actual*
     * host this request arrived on rather than the static config['base_url'].
     * A mobile client rarely reaches the server the same way a browser on the host
     * machine does (e.g. an Android emulator calls the API via 10.0.2.2, not
     * "localhost") - using base_url() verbatim would embed an address only the
     * browser case can resolve, so every *_img URL would silently fail to load
     * for mobile clients even though the API call itself succeeded.
     */
    private function fileBaseUrl()
    {
        $configured = base_url();
        $host = $this->input->server('HTTP_HOST');
        if (empty($host)) {
            return $configured;
        }

        $path = parse_url($configured, PHP_URL_PATH) ?: '/';
        $scheme = $this->input->server('HTTPS') ? 'https' : 'http';
        return $scheme . '://' . $host . $path;
    }

    /**
     * Extract Bearer token from Authorization header
     */
    private function getBearerToken()
    {
        $header = $_SERVER['HTTP_AUTHORIZATION'] 
               ?? $_SERVER['REDIRECT_HTTP_AUTHORIZATION']
               ?? $this->input->server('HTTP_AUTHORIZATION')
               ?? '';

        if (empty($header) && function_exists('apache_request_headers')) {
            $headers = apache_request_headers();
            foreach ($headers as $key => $val) {
                if (strtolower($key) === 'authorization') {
                    $header = $val;
                    break;
                }
            }
        }

        if (preg_match('/Bearer\s+(.+)/i', $header, $matches)) {
            return trim($matches[1]);
        }
        return null;
    }

    /**
     * Validate bearer token — sets $this->authUser or responds 401
     */
    private function authGuard()
    {
        $token = $this->getBearerToken();

        if (!$token) {
            $this->respond([
                'isError' => true,
                'message' => 'Authorization token missing. Please login first.',
            ], 401);
        }

        $user = $this->apimodel->validateToken($token);

        if (!$user) {
            $this->respond([
                'isError' => true,
                'message' => 'Invalid or expired token. Please login again.',
            ], 401);
        }

        $this->authUser = $user;
    }

    // ─── Public Endpoints ────────────────────────────────────────────

    /**
     * Default index — API info
     * GET api/
     */
    public function index()
    {
        $this->respond([
            'isError' => false,
            'name'    => 'GGCC API',
            'version' => '1.0.0',
            'endpoints' => [
                'POST api/login'            => 'Generate bearer token',
                'POST api/logout'           => 'Revoke token (protected)',
                'GET  api/profile'             => 'Get current user profile (protected)',
                'GET  api/attendance/present'  => 'Get present list (protected)',
                'GET  api/attendance/leave'    => 'Get leave list (protected)',
                'GET  api/attendance/ot'       => 'Get OT list (protected)',
                'GET  api/branch-attendance/month'          => 'Branch Incharge: month grid for assigned team (protected)',
                'GET  api/branch-attendance/day'            => 'Branch Incharge: one day status per employee (protected)',
                'GET  api/branch-attendance/search-employee'=> 'Branch Incharge: search an employee to add (protected)',
                'POST api/branch-attendance/mark'           => 'Branch Incharge: save a day\'s attendance (protected)',
                'GET  api/payslip/list'        => 'Get payslip list (protected)',
                'GET  api/payslip/detail'      => 'Get payslip details (protected)',
                'GET  api/payslip/pdf'         => 'Stream payslip PDF (protected)',
                'GET  api/loan/detail'         => 'Get personal loan details (protected)',
            ],
        ]);
    }

    /**
     * Login — generate bearer token
     * POST api/login
     * Body (raw JSON): { "username": "...", "password": "..." }
     */
    public function login()
    {
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            $this->respond(['isError' => true, 'message' => 'Method not allowed.'], 405);
        }

        $body     = $this->jsonBody();
        $username = trim($body['username'] ?? '');
        $password = trim($body['password'] ?? '');

        if (empty($username) || empty($password)) {
            $this->respond([
                'isError' => true,
                'message' => 'username and password are required.',
            ], 422);
        }

        // Authenticate using the existing loginmodel
        $result   = $this->loginmodel->checkLogin($username, $password);
        $rowCount = $result['rowCount'];
        $status   = $result['status'];
        $loginId  = $result['login_id'];

        if ($rowCount < 1) {
            $this->respond([
                'isError' => true,
                'message' => 'Login code / Mobile No or Password is not matched.',
            ], 401);
        }

        if ($status !== 'active') {
            $this->respond([
                'isError' => true,
                'message' => 'Your account has been suspended. Please contact admin.',
            ], 403);
        }

        // Generate & store token — get employee_id from login_permission
        $userSql = "SELECT LP.*, MD.designation, E.profile_img
                    FROM login_permission LP
                    LEFT JOIN employee E ON E.id = LP.employee_id
                    LEFT JOIN master_designation MD ON MD.id = E.designation
                    WHERE LP.id = ? LIMIT 1";
        $row = $this->db->query($userSql, [$loginId])->row();
        $tokenData = $this->apimodel->generateToken($loginId, $row->employee_id ?? 0);

        $designation = $row->designation ?? '';
        if (empty($designation) && ($row->is_admin ?? 0) == 1) {
            $designation = 'Administrator';
        }

        $profileImg = '';
        if (!empty($row->profile_img)) {
            $profileImg = filter_var($row->profile_img, FILTER_VALIDATE_URL)
                ? $row->profile_img
                : $this->fileBaseUrl() . ltrim($row->profile_img, './');
        }

        $isBranchIncharge = $this->apimodel->isBranchIncharge($row->employee_id ?? 0);

        $this->respond([
            'isError'    => false,
            'message'    => 'Login successful.',
            'token'      => $tokenData['token'],
            'token_type' => 'Bearer',
            'expires_at' => $tokenData['expires_at'],
            'user' => [
                'id'                  => $loginId,
                'name'                => $row->employee_name ?? '',
                'login_code'          => $row->login_code ?? '',
                'mobile'              => $row->mobile_number ?? '',
                'designation'         => $designation,
                'profile_img'         => $profileImg,
                'is_admin'            => $row->is_admin ?? 0,
                'permission'          => $row->permission ?? '',
                'is_branch_incharge'  => $isBranchIncharge,
            ],
        ]);
    }

    /**
     * Logout — revoke current bearer token
     * POST api/logout
     * Header: Authorization: Bearer {token}
     */
    public function logout()
    {
        $this->authGuard();
        $token = $this->getBearerToken();
        $this->apimodel->revokeToken($token);
        $this->respond(['isError' => false, 'message' => 'Logged out successfully.']);
    }

    // ─── Protected Endpoints ─────────────────────────────────────────

    /**
     * Get current authenticated user profile (full employee data)
     * GET api/profile
     * Header: Authorization: Bearer {token}
     */
    public function profile()
    {
        $this->authGuard();
        $u = $this->authUser;
        $employeeId = $u->employee_id ?? 0;
        $isBranchIncharge = $this->apimodel->isBranchIncharge($employeeId);

        // Fetch detailed employee record if employee_id exists
        $empData = null;
        if (!empty($employeeId)) {
            $sql = "SELECT E.*, MD.designation AS designation_name, B.branch AS branch_name,
                           DATE_FORMAT(E.dob, '%d - %m - %Y') AS dobFormat,
                           DATE_FORMAT(E.doj, '%d - %m - %Y') AS dojFormat
                    FROM employee E
                    LEFT JOIN master_branch B ON B.id = E.branch
                    LEFT JOIN master_designation MD ON MD.id = E.designation
                    WHERE E.id = ? AND E.delete_status = 0
                    LIMIT 1";
            $empData = $this->db->query($sql, [$employeeId])->row();
        }

        $fileBaseUrl = $this->fileBaseUrl();
        $formatImg = function($path) use ($fileBaseUrl) {
            if (empty($path)) return '';
            if (filter_var($path, FILTER_VALIDATE_URL)) return $path;
            return $fileBaseUrl . ltrim($path, './');
        };

        // One consistent shape every time, regardless of whether a linked employee
        // record exists - fields just fall back to '' (an admin-only login, with no
        // employee row, gets the same keys with empty values instead of a different,
        // smaller response the client would need to branch on).
        $designation = $empData->designation_name ?? $u->designation ?? '';
        if (empty($designation) && ($u->is_admin ?? 0) == 1) {
            $designation = 'Administrator';
        }

        $profileResponse = [
            'employee_id'            => $empData->id ?? ($u->employee_id ?? ''),
            'employee_code'          => $empData->employee_code ?? '',
            'login_code'             => $u->login_code ?? '',
            'permission'             => $empData->permission ?? $u->permission ?? '',
            'is_admin'               => $u->is_admin ?? '0',
            'is_branch_incharge'     => $isBranchIncharge,
            'token_expires_at'       => $u->expires_at ?? '',
            'company_name'           => $empData->company_name ?? '',
            'payslip_location'       => $empData->branch_location ?? '',
            'zone'                   => $empData->zone ?? '',
            'branch'                 => $empData->branch ?? '',
            'branch_name'            => $empData->branch_name ?? '',
            'employee_name'          => $empData->employee_name ?? $u->employee_name ?? '',
            'email'                  => $empData->email ?? '',
            'mobile_number'          => $empData->mobile_number ?? $u->mobile_number ?? '',
            'designation'            => $designation,
            'doj'                    => $empData->doj ?? '',
            'doj_formatted'          => $empData->dojFormat ?? '',
            'payslip_status'         => $empData->payslip_status ?? '',
            'basic_pay'              => $empData->basic_pay ?? '',
            'allowance_amount'       => $empData->allowance_amount ?? '',
            'mobile_recharge'        => $empData->mobile_recharge ?? '',
            'esi_status'             => $empData->esi_status ?? '',
            'esi_number'             => $empData->esi_number ?? '',
            'pf_status'              => $empData->pf_status ?? '',
            'pf_number'              => $empData->pf_number ?? '',
            'pf_amount'              => $empData->pf_amount ?? '',
            'pan_number'             => $empData->pan_number ?? '',
            'aadhar_number'          => $empData->aadhar_number ?? '',
            'aadharcard_img'         => $formatImg($empData->aadharcard_img ?? ''),
            'pancard_img'            => $formatImg($empData->pancard_img ?? ''),
            'licence_img'            => $formatImg($empData->licence_img ?? ''),
            'licence_number'         => $empData->licence_number ?? '',
            'electrical_licence'     => $empData->electrical_licence ?? '',
            'electrical_licence_img' => $formatImg($empData->electrical_licence_img ?? ''),
            'bank_details' => [
                'account_number'     => $empData->account_number ?? '',
                'ifsc_code'          => $empData->ifsc_code ?? '',
                'bank_name'          => $empData->bank_name ?? '',
                'bank_branch_name'   => $empData->bank_branch_name ?? '',
                'bankbook_img'       => $formatImg($empData->bankbook_img ?? ''),
                'status'             => $empData->status ?? '',
            ],
            'personal_details' => [
                'dob'                => $empData->dob ?? '',
                'dob_formatted'      => $empData->dobFormat ?? '',
                'education'          => $empData->education ?? '',
                'employee_photo'     => $formatImg($empData->profile_img ?? ''),
                'house_no'           => $empData->house_no ?? '',
                'street'             => $empData->street ?? '',
                'city'               => $empData->city ?? '',
                'district'           => $empData->district ?? '',
                'pincode'            => $empData->pincode ?? '',
            ],
            'contact_details' => [
                'relative_type'                => $empData->contact_relative ?? '',
                'contact_person_name'          => $empData->contact_name ?? '',
                'contact_person_phone_number'  => $empData->contact_phone_number ?? '',
                'contact_house_no'             => $empData->contact_house_no ?? '',
                'contact_street'               => $empData->contact_street ?? '',
                'contact_city'                 => $empData->contact_city ?? '',
                'contact_district'             => $empData->contact_district ?? '',
                'contact_pincode'              => $empData->contact_pincode ?? '',
            ],
        ];

        $this->respond([
            'isError' => false,
            'data'    => $profileResponse,
        ]);
    }

    /**
     * Attendance lists
     * GET api/attendance/present?year=2026&month=august&employee_id=20
     * GET api/attendance/leave?year=2026&month=august&employee_id=20&status=active
     * GET api/attendance/ot?year=2026&month=august&employee_id=20&status=active
     * Header: Authorization: Bearer {token}
     */
    public function attendance($action = 'list')
    {
        $this->authGuard();
        $this->load->model('attendancemodel');

        $permissions = json_decode($this->authUser->permission, true) ?: [];
        $isAdminOrManager = ($this->authUser->is_admin == 1) 
                            || in_array('admin', $permissions) 
                            || in_array('attendance_management', $permissions);

        // Determine target employee ID
        $employeeId = $this->input->get('employee_id');
        if (!$isAdminOrManager || empty($employeeId)) {
            // Regular employees or when no ID is provided, default to self
            $employeeId = $this->authUser->employee_id;
        }

        $year   = $this->input->get('year')   ?: '';
        $month  = $this->input->get('month')  ?: '';
        $status = $this->input->get('status') ?: '';

        if ($action === 'present') {
            $data = $this->attendancemodel->getEmployeePresentList($year, $month, $employeeId);
            $this->respond(['isError' => false, 'data' => $data]);
        } elseif ($action === 'leave') {
            $data = $this->attendancemodel->getEmployeeLeaveList($status, $year, $month, $employeeId);
            $this->respond(['isError' => false, 'data' => $data]);
        } elseif ($action === 'ot') {
            $data = $this->attendancemodel->getEmployeeOTList($status, $year, $month, $employeeId);
            $this->respond(['isError' => false, 'data' => $data]);
        } elseif ($action === 'list') {
            // Fallback: overall summary list filtered by employeeId if regular employee
            $data = $this->attendancemodel->getEmployeeAttendanceList($year, $month, $employeeId);
            $this->respond(['isError' => false, 'data' => $data]);
        } else {
            $this->respond(['isError' => true, 'message' => 'Unknown action.'], 404);
        }
    }

    // ─── Branch Attendance (mobile: a Branch Incharge managing their team's attendance) ───
    //
    // Mirrors the web implementation exactly (Attendance::branch_attendance_list/add/
    // branchAttendanceFormSave and the same Attendancemodel/Mastermodel methods) - same
    // queries, same save functions, same business rules (empty selection is ignored,
    // OT only applies on Present, ad-hoc-added employees get auto-assigned going forward).
    //
    // GET  api/branch-attendance/month?year=&month=   - excel-style month grid
    // GET  api/branch-attendance/day?date=            - one day's status per employee
    // GET  api/branch-attendance/search-employee?q=   - add-employee name search
    // POST api/branch-attendance/mark                 - save a day's attendance

    /**
     * Resolve the logged-in employee to the Branch Incharge record they themselves
     * are the incharge of. Returns null (and the caller should 403) if they aren't one.
     */
    private function requireBranchIncharge()
    {
        $this->load->model('mastermodel');
        $myIncharge = $this->mastermodel->getBranchInchargeByEmployeeId($this->authUser->employee_id);
        if (!$myIncharge) {
            $this->respond(['isError' => true, 'message' => 'Access denied. You are not an active Branch Incharge.'], 403);
        }
        return $myIncharge;
    }

    public function branch_attendance($action = 'day')
    {
        $this->authGuard();
        $myIncharge = $this->requireBranchIncharge();

        $this->load->model('mastermodel');
        $this->load->model('attendancemodel');

        if ($action === 'month') {
            $year = $this->input->get('year') ?: date('Y');
            $month = $this->input->get('month') ?: strtolower(date('F'));

            $employeeIds = $this->mastermodel->getBranchInchargeEmployeeIdsWithSelf($myIncharge->id);
            $grid = $this->attendancemodel->getEmployeeAttendanceGridByIds($year, $month, $employeeIds);

            // This is the Branch Incharge's OWN managed branch/zone - NOT the same as any
            // individual employee's "branch" field below, which is that employee's own
            // home branch and can legitimately differ. Use these two fields for any
            // "Zone"/"Branch" header in the UI, never an employee row's branch/zone.
            $branchName = '';
            foreach ($this->mastermodel->getBranchInfo($myIncharge->branch) as $row) {
                $branchName = $row->branch;
            }

            $this->respond([
                'isError' => false,
                'data' => [
                    'year' => $year,
                    'month' => $month,
                    'days_in_month' => (int) date('t', strtotime("1 $month $year")),
                    'zone' => $myIncharge->zone,
                    'branch_name' => $branchName,
                    'employees' => $grid,
                ],
            ]);
        } elseif ($action === 'day') {
            $date = $this->input->get('date') ?: date('Y-m-d');

            $employeeIds = $this->mastermodel->getBranchInchargeEmployeeIdsWithSelf($myIncharge->id);
            $employees = $this->mastermodel->getEmployeesByIds($employeeIds);
            $valueByEmployee = $this->attendancemodel->getEmployeeDayStatusByIds($employeeIds, $date);

            $branchName = '';
            foreach ($this->mastermodel->getBranchInfo($myIncharge->branch) as $row) {
                $branchName = $row->branch;
            }

            $list = [];
            foreach ($employees as $emp) {
                $list[] = [
                    'employee_id'   => $emp->id,
                    'employee_name' => $emp->employee_name,
                    'designation'   => $emp->designation,
                    // one combined value: ''|'present'|'absent'|'half_day_ot'|'full_day_ot'
                    'value'         => $valueByEmployee[$emp->id] ?? '',
                ];
            }

            $this->respond([
                'isError' => false,
                'data' => [
                    'date' => $date,
                    'zone' => $myIncharge->zone,
                    'branch_name' => $branchName,
                    'employees' => $list,
                ],
            ]);
        } elseif ($action === 'search-employee') {
            $this->load->model('employeemodel');
            $q = $this->input->get('q') ?: '';
            $results = $this->employeemodel->getActiveEmployeeName($q);

            // Don't suggest employees already in this incharge's list
            $alreadyAssignedIds = $this->mastermodel->getBranchInchargeEmployeeIdsWithSelf($myIncharge->id);
            $results = array_values(array_filter($results, function ($row) use ($alreadyAssignedIds) {
                return !in_array((int) $row['id'], $alreadyAssignedIds);
            }));

            $this->respond(['isError' => false, 'data' => $results]);
        } elseif ($action === 'mark') {
            if ($this->input->server('REQUEST_METHOD') !== 'POST') {
                $this->respond(['isError' => true, 'message' => 'Method not allowed. Use POST.'], 405);
            }
            $this->doBranchAttendanceMark($myIncharge);
        } else {
            $this->respond(['isError' => true, 'message' => 'Unknown action.'], 404);
        }
    }

    /**
     * Save a day's Branch Attendance for one or more employees.
     * POST api/branch-attendance/mark
     * Body (raw JSON): { "date": "2026-11-05", "entries": [ { "employee_id": 3, "value": "present" }, ... ] }
     * value: ''|'present'|'absent'|'half_day_ot'|'full_day_ot' - same vocabulary as the
     * single Attendance select on the web form. An empty value skips that employee
     * entirely (nothing is saved/changed) - use it for anyone not decided on yet.
     */
    private function doBranchAttendanceMark($myIncharge)
    {
        $body = $this->jsonBody();
        $date = $body['date'] ?? '';
        $entries = $body['entries'] ?? [];

        if (empty($date) || empty($entries)) {
            $this->respond(['isError' => true, 'message' => 'date and entries are required.'], 422);
        }

        // Bridge for the shared save functions, which read created_by/updated_by from the
        // CI session rather than a parameter - mobile requests have no session populated.
        $this->session->set_userdata('userid', $this->authUser->login_id);

        // Ad-hoc employees are valid for THIS DATE ONLY - never persisted into the
        // assigned-employee list, so they don't start appearing on other dates/month grid.
        $postedEmployeeIds = array_map(function ($e) { return $e['employee_id'] ?? 0; }, $entries);
        $validEmployeeIds = array_map(function ($row) { return $row->id; }, $this->mastermodel->getEmployeesByIds($postedEmployeeIds));

        $savedCount = 0;
        foreach ($entries as $entry) {
            $employeeId = $entry['employee_id'] ?? 0;
            $value = $entry['value'] ?? '';

            if (!in_array((int) $employeeId, $validEmployeeIds) || $value === '') {
                continue; // not a real employee, or left blank on purpose - don't touch it
            }

            $this->attendancemodel->saveEmployeeAttendanceValue($myIncharge->branch, $date, $employeeId, $value);
            $savedCount++;
        }

        $this->respond(['isError' => false, 'message' => "Attendance saved for {$savedCount} employee(s)."]);
    }

    /**
     * Payslip list or detail
     * GET api/payslip/list?year=2026
     * GET api/payslip/detail?id=123
     * GET api/payslip/detail/123
     * Header: Authorization: Bearer {token}
     */
    public function payslip($action = 'list', $id = '')
    {
        $this->authGuard();
        $this->load->model('employeemodel');

        $permissions = json_decode($this->authUser->permission, true) ?: [];
        $isAdminOrManager = ($this->authUser->is_admin == 1) 
                            || in_array('admin', $permissions) 
                            || in_array('employee_management', $permissions);

        if ($action === 'list') {
            $year = $this->input->get('year') ?: '';
            
            // Determine target employee ID
            $targetEmployeeId = $this->input->get('employee_id');
            if (!$isAdminOrManager || empty($targetEmployeeId)) {
                // Default to self for regular employees or when no ID is explicitly requested
                $targetEmployeeId = $this->authUser->employee_id;
            }

            // If employee ID is empty/0 (e.g. administrator with no employee record), return empty list
            if (empty($targetEmployeeId)) {
                $this->respond(['isError' => false, 'data' => []]);
            }

            $data = $this->employeemodel->getPayslipList($year, $targetEmployeeId);
            $this->respond(['isError' => false, 'data' => $data]);
        } elseif ($action === 'detail') {
            $payslipId = $id ?: $this->input->get('id');
            if (empty($payslipId)) {
                $this->respond(['isError' => true, 'message' => 'Payslip ID is required.'], 400);
            }

            $payslipData = $this->employeemodel->getPayslipData($payslipId);
            if (empty($payslipData)) {
                $this->respond(['isError' => true, 'message' => 'Payslip not found.'], 404);
            }

            $payslip = $payslipData[0];

            // If not admin/manager, ensure the payslip belongs to the logged-in employee
            if (!$isAdminOrManager && $payslip->employee_id != $this->authUser->employee_id) {
                $this->respond(['isError' => true, 'message' => 'Access denied. You can only view your own payslips.'], 403);
            }

            $this->respond(['isError' => false, 'data' => $payslip]);
        } elseif ($action === 'pdf') {
            $payslipId = $id ?: $this->input->get('id');
            if (empty($payslipId)) {
                $this->respond(['isError' => true, 'message' => 'Payslip ID is required.'], 400);
            }

            $payslipData = $this->employeemodel->getPayslipData($payslipId);
            if (empty($payslipData)) {
                $this->respond(['isError' => true, 'message' => 'Payslip not found.'], 404);
            }

            $row = $payslipData[0];

            // If not admin/manager, ensure the payslip belongs to the logged-in employee
            if (!$isAdminOrManager && $row->employee_id != $this->authUser->employee_id) {
                $this->respond(['isError' => true, 'message' => 'Access denied. You can only view your own payslips.'], 403);
            }

            $data = [
                'payslipId'              => $row->id,
                'payslipYear'            => $row->year,
                'payslipMonth'           => $row->month,
                'employeeId'             => $row->employee_code,
                'joiningDate'            => $row->joining_date,
                'employeeName'           => $row->employee_name,
                'employeeDesignation'    => $row->designation,
                'companyName'            => $row->company_name,
                'employeeBranch'         => $row->branch_location,
                'employeeEsiNumber'      => $row->esi_number,
                'employeePfNumber'       => $row->pf_number,
                'employeeBank_name'      => $row->bank_name,
                'employeeAccountNumber'  => $row->account_number,
                'employeeIfscCode'       => $row->ifsc_code,
                'employeePanNumber'      => $row->pan_number,
                'employeePayableDays'    => $row->day_count,
                'employeePresentDays'    => $row->present_count,
                'employeeAbsentDays'     => $row->absent_count,
                'employeeOtDays'         => $row->ot_count,
                'basicPay'               => $row->basic_pay,
                'presentBasicePay'       => $row->month_basic_pay,
                'allowanceAmount'        => $row->allowance_amount,
                'presentAllowanceAmount' => $row->month_allowance_amount,
                'overtimePay'            => $row->ot_amount,
                'mobileRecharge'         => $row->mobile_recharge,
                'travellingAmount'       => $row->travelling_amount,
                'incentiveAmount'        => $row->incentive_amount,
                'foodExpenses'           => $row->food_expenses,
                'esiAmount'              => $row->esi_amount,
                'basicPfAmount'          => $row->pf_amount,
                'pfAmount'               => $row->month_pf_amount,
                'advanceCash'            => $row->advance_cash,
                'professionalTax'        => $row->professional_tax,
                'tdsAmount'              => $row->tds_amount ?? 0,
                'totalEarning'           => $row->total_earning,
                'deductionAmount'        => $row->deduction_amount,
                'salaryAmount'           => $row->salary_amount,
                'salaryInWord'           => $row->salary_in_word,
            ];

            // Render HTML view string
            $html = $this->load->view('employee-payslip/payslip-view-pdf', $data, true);

            // If format=html is requested explicitly
            if ($this->input->get('format') === 'html') {
                header('Content-Type: text/html; charset=utf-8');
                echo $html;
                exit();
            }

            // Locate Dompdf autoloader across standard paths
            $autoloaderPaths = [
                APPPATH . 'third_party/dompdf/vendor/autoload.php',
                APPPATH . 'third_party/dompdf/autoload.inc.php',
                FCPATH . 'vendor/autoload.php',
                FCPATH . 'application/third_party/dompdf/vendor/autoload.php',
            ];

            $loaded = false;
            foreach ($autoloaderPaths as $path) {
                if (file_exists($path)) {
                    require_once $path;
                    $loaded = true;
                    break;
                }
            }

            if ($loaded && class_exists('\Dompdf\Dompdf')) {
                $dompdf = new \Dompdf\Dompdf([
                    'isRemoteEnabled' => true,
                    'isHtml5ParserEnabled' => true
                ]);
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                $fileName = $row->employee_name . ' - ' . $row->month . ' ' . $row->year . ' payslip.pdf';

                // Send PDF headers and stream binary output
                header('Content-Type: application/pdf');
                header('Content-Disposition: inline; filename="' . $fileName . '"');
                header('Cache-Control: private, max-age=0, must-revalidate');
                header('Pragma: public');

                echo $dompdf->output();
                exit();
            } else {
                // If Dompdf is not installed/uploaded on server, output HTML payslip layout directly
                header('Content-Type: text/html; charset=utf-8');
                echo $html;
                exit();
            }
        } else {
            $this->respond(['isError' => true, 'message' => 'Unknown action.'], 404);
        }
    }

    /**
     * Personal Loan (Advance cash) details
     * GET api/loan/detail?employee_id=20
     * Header: Authorization: Bearer {token}
     */
    public function loan($action = 'detail')
    {
        $this->authGuard();
        $this->load->model('loanmodel');

        $permissions = json_decode($this->authUser->permission, true) ?: [];
        $isAdminOrManager = ($this->authUser->is_admin == 1) 
                            || in_array('admin', $permissions) 
                            || in_array('employee_management', $permissions);

        // Determine target employee ID
        $employeeId = $this->input->get('employee_id');
        if (!$isAdminOrManager || empty($employeeId)) {
            // Regular employees or when no ID is provided, default to self
            $employeeId = $this->authUser->employee_id;
        }

        if ($action === 'detail') {
            $advancecashEmployeeData = $this->loanmodel->getAdvanceCashEmployeeList($employeeId);
            
            // If no data found for this employee, return empty structure with 0 values
            if (empty($advancecashEmployeeData)) {
                $this->respond([
                    'isError' => false,
                    'data' => [
                        'employee_id'            => $employeeId,
                        'overall_loan_amount'    => "0.00",
                        'overall_paid_amount'    => "0.00",
                        'overall_balance_amount' => "0.00",
                        'loan_list'              => [],
                        'received_list'          => []
                    ]
                ]);
            }

            $empInfo = $advancecashEmployeeData[0];
            $loanList = $this->loanmodel->getAdvancecashList($employeeId);
            $receivedList = $this->loanmodel->getAdvancecashReceivedList($employeeId);

            $this->respond([
                'isError' => false,
                'data' => [
                    'employee_id'            => $empInfo->employee_id,
                    'employee_name'          => $empInfo->employee_name,
                    'designation'            => $empInfo->designation,
                    'overall_loan_amount'    => $empInfo->overall_advancecash_amount,
                    'overall_paid_amount'    => $empInfo->overall_received_amount,
                    'overall_balance_amount' => $empInfo->overall_notreceived_amount,
                    'loan_list'              => $loanList,
                    'received_list'          => $receivedList
                ]
            ]);
        } else {
            $this->respond(['isError' => true, 'message' => 'Unknown action.'], 404);
        }
    }

    /**
     * Check App Version
     * GET api/check_version?platform=android&current_version=1.0.0
     */
    public function check_version()
    {
        $platform = trim($this->input->get('platform'));
        $current_version = trim($this->input->get('current_version'));

        if (empty($platform) || empty($current_version)) {
            $this->respond([
                'isError' => true,
                'message' => 'platform and current_version parameters are required.'
            ], 400);
        }

        // Get the latest active version for the platform
        $sql = "SELECT * FROM app_version_control 
                WHERE platform = ? AND status = 'active' 
                ORDER BY id DESC LIMIT 1";
        $latest = $this->db->query($sql, [$platform])->row();

        if (!$latest) {
            $this->respond([
                'isError' => false,
                'update_available' => false,
                'message' => 'No version configuration found.'
            ]);
        }

        // Compare versions using version_compare
        $update_available = version_compare($current_version, $latest->latest_version, '<');

        $this->respond([
            'isError'          => false,
            'update_available' => $update_available,
            'latest_version'   => $latest->latest_version,
            'is_force'         => (int)$latest->is_force,
            'update_url'       => $latest->update_url,
            'release_notes'    => $latest->release_notes ? $latest->release_notes : ''
        ]);
    }

    // ─── App Notification Endpoints ─────────────────────────────────

    /**
     * App Notifications
     * GET  api/notification/list?page=1&limit=20
     * GET  api/notification/unread-count
     * POST api/notification/mark-read  {id: optional}
     * POST api/notification/send       {title, description} (admin only)
     * Header: Authorization: Bearer {token}
     */
    public function notification($action = 'list')
    {
        $this->authGuard();
        $this->load->model('notificationmodel');

        $employeeId = $this->authUser->employee_id;

        if ($action === 'list') {
            $page = max(1, (int) ($this->input->get('page') ?: 1));
            $limit = max(1, min(100, (int) ($this->input->get('limit') ?: 20)));
            $offset = ($page - 1) * $limit;

            $notifications = $this->notificationmodel->getAppNotifications($employeeId, $limit, $offset);
            $total = $this->notificationmodel->getAppNotificationTotalCount($employeeId);

            $this->respond([
                'isError' => false,
                'data' => $notifications,
                'pagination' => [
                    'page' => $page,
                    'limit' => $limit,
                    'total' => $total,
                ]
            ]);
        } elseif ($action === 'unread-count') {
            $count = $this->notificationmodel->getAppNotificationUnreadCount($employeeId);
            $this->respond([
                'isError' => false,
                'count' => $count,
            ]);
        } elseif ($action === 'mark-read') {
            if ($this->input->server('REQUEST_METHOD') !== 'POST') {
                $this->respond(['isError' => true, 'message' => 'Method not allowed.'], 405);
            }

            $body = $this->jsonBody();
            $id = $body['id'] ?? null;
            $this->notificationmodel->markAppNotificationRead($id, $employeeId);
            $this->respond([
                'isError' => false,
                'message' => 'Notifications marked as read.',
            ]);
        } elseif ($action === 'send') {
            // Admin-only: create and push a custom notification to all users
            if ($this->input->server('REQUEST_METHOD') !== 'POST') {
                $this->respond(['isError' => true, 'message' => 'Method not allowed.'], 405);
            }

            $permissions = json_decode($this->authUser->permission, true) ?: [];
            $isAdmin = ($this->authUser->is_admin == 1) || in_array('admin', $permissions);
            if (!$isAdmin) {
                $this->respond(['isError' => true, 'message' => 'Access denied. Admin only.'], 403);
            }

            $body = $this->jsonBody();
            $title = trim($body['title'] ?? '');
            $description = trim($body['description'] ?? '');

            if (empty($title) || empty($description)) {
                $this->respond(['isError' => true, 'message' => 'Title and description are required.'], 422);
            }

            $notifId = $this->notificationmodel->createAppNotification([
                'title' => $title,
                'description' => $description,
                'notification_type' => 'custom',
                'target_employee_id' => null,
                'created_by' => $this->authUser->login_id,
            ]);

            // Push FCM notification to all registered devices
            $tokens = $this->apimodel->getAllActiveFcmTokens();
            if (!empty($tokens)) {
                $this->notificationmodel->sendFcmNotification($title, $description, $tokens);
            }

            // Mark as sent
            $this->db->where('id', $notifId)->update('app_notifications', [
                'sent_status' => 1,
                'sent_at' => date('Y-m-d H:i:s'),
            ]);

            $this->respond([
                'isError' => false,
                'message' => 'Notification sent successfully.',
                'notification_id' => $notifId,
            ]);
        } else {
            $this->respond(['isError' => true, 'message' => 'Unknown action.'], 404);
        }
    }

    /**
     * Mobile compatibility endpoint: PATCH api/notifications
     * Marks notifications as read (single or all)
     */
    public function notifications()
    {
        $this->authGuard();
        $this->load->model('notificationmodel');
        $employeeId = $this->authUser->employee_id;

        $method = $this->input->server('REQUEST_METHOD');
        if ($method === 'PATCH') {
            $body = $this->jsonBody();
            $action = $body['action'] ?? '';
            
            if ($action === 'markRead') {
                $notificationId = $body['notificationId'] ?? null;
                $this->notificationmodel->markAppNotificationRead($notificationId, $employeeId);
            } elseif ($action === 'markAllRead') {
                $this->notificationmodel->markAppNotificationRead(null, $employeeId);
            }

            $this->respond([
                'success' => true,
                'isError' => false,
                'message' => 'Notifications marked as read.',
            ]);
        } else {
            $this->respond(['isError' => true, 'message' => 'Method not allowed.'], 405);
        }
    }


    /**
     * FCM Token Management
     * POST api/fcm/register  {fcm_token: "..."}
     * Header: Authorization: Bearer {token}
     */
    public function fcm($action = 'register')
    {
        $this->authGuard();

        if ($action === 'register') {
            if ($this->input->server('REQUEST_METHOD') !== 'POST') {
                $this->respond(['isError' => true, 'message' => 'Method not allowed.'], 405);
            }

            $body = $this->jsonBody();
            $fcmToken = trim($body['fcm_token'] ?? '');

            if (empty($fcmToken)) {
                $this->respond(['isError' => true, 'message' => 'fcm_token is required.'], 422);
            }

            $this->apimodel->updateFcmToken($this->authUser->login_id, $fcmToken);

            $this->respond([
                'isError' => false,
                'message' => 'FCM token registered successfully.',
            ]);
        } else {
            $this->respond(['isError' => true, 'message' => 'Unknown action.'], 404);
        }
    }

}

?>

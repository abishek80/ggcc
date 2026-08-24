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
     * Extract Bearer token from Authorization header
     */
    private function getBearerToken()
    {
        $header = $this->input->server('HTTP_AUTHORIZATION')
                  ?? apache_request_headers()['Authorization']
                  ?? '';

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
                : base_url() . ltrim($row->profile_img, './');
        }

        $this->respond([
            'isError'    => false,
            'message'    => 'Login successful.',
            'token'      => $tokenData['token'],
            'token_type' => 'Bearer',
            'expires_at' => $tokenData['expires_at'],
            'user' => [
                'id'          => $loginId,
                'name'        => $row->employee_name ?? '',
                'login_code'  => $row->login_code ?? '',
                'mobile'      => $row->mobile_number ?? '',
                'designation' => $designation,
                'profile_img' => $profileImg,
                'is_admin'    => $row->is_admin ?? 0,
                'permission'  => $row->permission ?? '',
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

        if ($empData) {
            $formatImg = function($path) {
                if (empty($path)) return '';
                if (filter_var($path, FILTER_VALIDATE_URL)) return $path;
                return base_url() . ltrim($path, './');
            };

            $profileResponse = [
                'employee_id'            => $empData->id,
                'employee_code'          => $empData->employee_code,
                'login_code'             => $u->login_code,
                'permission'             => $empData->permission ?: $u->permission,
                'company_name'           => $empData->company_name,
                'payslip_location'       => $empData->branch_location,
                'zone'                   => $empData->zone,
                'branch'                 => $empData->branch,
                'branch_name'            => $empData->branch_name ?? '',
                'employee_name'          => $empData->employee_name,
                'email'                  => $empData->email,
                'mobile_number'          => $empData->mobile_number,
                'designation'            => $empData->designation_name ?? $u->designation ?? '',
                'doj'                    => $empData->doj,
                'doj_formatted'          => $empData->dojFormat,
                'payslip_status'         => $empData->payslip_status,
                'basic_pay'              => $empData->basic_pay,
                'allowance_amount'       => $empData->allowance_amount,
                'mobile_recharge'        => $empData->mobile_recharge,
                'esi_status'             => $empData->esi_status,
                'esi_number'             => $empData->esi_number,
                'pf_status'              => $empData->pf_status,
                'pf_number'              => $empData->pf_number,
                'pf_amount'              => $empData->pf_amount,
                'pan_number'             => $empData->pan_number,
                'aadhar_number'          => $empData->aadhar_number,
                'aadharcard_img'         => $formatImg($empData->aadharcard_img),
                'pancard_img'            => $formatImg($empData->pancard_img),
                'licence_img'            => $formatImg($empData->licence_img),
                'licence_number'         => $empData->licence_number,
                'electrical_licence'     => $empData->electrical_licence,
                'electrical_licence_img' => $formatImg($empData->electrical_licence_img),
                'bank_details' => [
                    'account_number'     => $empData->account_number,
                    'ifsc_code'          => $empData->ifsc_code,
                    'bank_name'          => $empData->bank_name,
                    'bank_branch_name'   => $empData->bank_branch_name,
                    'bankbook_img'       => $formatImg($empData->bankbook_img),
                    'status'             => $empData->status,
                ],
                'personal_details' => [
                    'dob'                => $empData->dob,
                    'dob_formatted'      => $empData->dobFormat,
                    'education'          => $empData->education,
                    'employee_photo'     => $formatImg($empData->profile_img),
                    'house_no'           => $empData->house_no,
                    'street'             => $empData->street,
                    'city'               => $empData->city,
                    'district'           => $empData->district,
                    'pincode'            => $empData->pincode,
                ],
                'contact_details' => [
                    'relative_type'               => $empData->contact_relative,
                    'contact_person_name'        => $empData->contact_name,
                    'contact_person_phone_number' => $empData->contact_phone_number,
                    'contact_house_no'            => $empData->contact_house_no,
                    'contact_street'              => $empData->contact_street,
                    'contact_city'                => $empData->contact_city,
                    'contact_district'            => $empData->contact_district,
                    'contact_pincode'             => $empData->contact_pincode,
                ]
            ];
        } else {
            // Fallback for Admin / users without employee row
            $designation = $u->designation ?? '';
            if (empty($designation) && ($u->is_admin ?? 0) == 1) {
                $designation = 'Administrator';
            }
            $profileResponse = [
                'id'                 => $u->login_id,
                'name'               => $u->employee_name,
                'login_code'         => $u->login_code,
                'mobile'             => $u->mobile_number,
                'designation'        => $designation,
                'is_admin'           => $u->is_admin,
                'permission'         => $u->permission,
                'token_expires_at'   => $u->expires_at,
            ];
        }

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
}
?>

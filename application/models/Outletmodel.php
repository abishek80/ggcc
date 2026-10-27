<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Outletmodel extends CI_Model
{
    // Branch Outlet Summary
    public function getBranchOutletSummary()
    {
        $sql = "SELECT 
                    MB.id AS branch_id,
                    MB.zone,
                    MB.branch AS branch_name,
                    MB.location_url,
                    COUNT(O.id) AS outlet_count
                FROM master_branch MB
                LEFT JOIN outlet O 
                    ON O.branch = MB.id 
                    AND O.delete_status = 0 
                    AND O.status = 'active'
                WHERE MB.delete_status = 0 
                AND MB.status = 'active'
                GROUP BY MB.id, MB.zone, MB.branch, MB.location_url
                ORDER BY MB.zone ASC, MB.branch ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Outlet List
    public function outletList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND O.status = '$pageStatus'";
        }

        $sql = "SELECT O.*, DATE_FORMAT(O.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(O.renewal_date, '%d - %m - %Y') AS renewal_dateFormat, DATE_FORMAT(O.checking_date, '%d - %m - %Y') AS checking_dateFormat, LP.employee_name, B.branch AS branch FROM outlet O INNER JOIN login_permission LP ON LP.employee_id = O.created_by INNER JOIN master_branch B ON B.id = O.branch WHERE O.delete_status = 0 $where ORDER BY O.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Outlet Report List
    public function outletReportList($pageStatus='', $branch_id = '')
    {
        if ($branch_id) {
            $where = "AND O.branch = '$branch_id' AND O.status = '$pageStatus'";
        }

        $sql = "SELECT O.*, DATE_FORMAT(O.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(O.renewal_date, '%d - %m - %Y') AS renewal_dateFormat, DATE_FORMAT(O.checking_date, '%d - %m - %Y') AS checking_dateFormat, LP.employee_name, B.branch AS branch FROM outlet O INNER JOIN login_permission LP ON LP.employee_id = O.created_by INNER JOIN master_branch B ON B.id = O.branch WHERE O.delete_status = 0 $where ORDER BY O.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function outletDropdownList($zone = '', $branch = '')
    {
        if ($zone > '' && $branch > '') {
            $where = "WHERE zone = '" . $zone . "' AND branch = '" . $branch . "' AND status = 'active' AND delete_status = 0 ORDER BY outlet_name ASC";
        }else{
            $where = '';
        }
        
        $sql ="SELECT * FROM outlet $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function getDropdownOutletInfo($outletName = '')
    {
        if ($outletName > '') {
            $where = "WHERE id = " . $outletName . " AND status = 'active' AND delete_status = 0 ORDER BY outlet_name ASC";
        }else{
            $where = '';
        }
        
        $sql ="SELECT * FROM outlet $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Outlet Info
    public function getOutletInfo($outletId)
    {
        $outletId = (int)$outletId;
        $sql = "SELECT O.*, 
                       O.branch AS branch_id, 
                       DATE_FORMAT(O.created_at, '%d/%m/%Y %h:%i %p') AS created_at, 
                       DATE_FORMAT(O.renewal_date, '%d - %m - %Y') AS renewal_dateFormat, 
                       DATE_FORMAT(O.checking_date, '%d - %m - %Y') AS checking_dateFormat, 
                       LP.employee_name, 
                       B.branch AS branch_name 
                FROM outlet O 
                LEFT JOIN login_permission LP ON LP.employee_id = O.created_by 
                INNER JOIN master_branch B ON B.id = O.branch 
                WHERE O.delete_status = 0 AND O.id = $outletId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Outlet
    public function checkOutlet($token, $branch)
    {
        $sql = "SELECT * FROM outlet WHERE delete_status = 0 AND token = '" . $token . "' AND branch = '" . $branch . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Outlet Form
    public function saveOutletData($outletId, $token, $zone, $branch, $outletType, $customerId, $outletName, $outletLocation, $contactName, $contactNumber, $earthingChamber, $checkingDate, $renewalDate, $cvt, $stabilizer, $yardPole, $stp, $canopyLight, $pump, $status, $locationUrl = '')
    {
        $userId = $this->session->userdata('userid');

        $year        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('outlet');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $year . '/' . $miNumberId;

        if ($outletId > 0) {
            $data = array(
                'zone' => $zone,
                'branch' => $branch,
                'outlet_type' => $outletType,
                'customer_id' => $customerId,
                'outlet_name' => $outletName,
                'outlet_location' => $outletLocation,
                'location_url' => $locationUrl,
                'contact_name' => $contactName,
                'contact_number' => $contactNumber,
                'earthing_chamber' => $earthingChamber,
                'checking_date' => $checkingDate,
                'renewal_date' => $renewalDate,
                'cvt' => $cvt,
                'stabilizer' => $stabilizer,
                'stp' => $stp,
                'yard_pole' => $yardPole,
                'canopy_light' => $canopyLight,
                'pump' => $pump,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $outletId);
            $this->db->update('outlet', $data);
        } else {
            $data = array(
                'sno' => $miNumber,
                'token' => $token,
                'zone' => $zone,
                'branch' => $branch,
                'outlet_type' => $outletType,
                'customer_id' => $customerId,
                'outlet_name' => $outletName,
                'outlet_location' => $outletLocation,
                'location_url' => $locationUrl,
                'contact_name' => $contactName,
                'contact_number' => $contactNumber,
                'earthing_chamber' => $earthingChamber,
                'checking_date' => $checkingDate,
                'renewal_date' => $renewalDate,
                'cvt' => $cvt,
                'stabilizer' => $stabilizer,
                'stp' => $stp,
                'yard_pole' => $yardPole,
                'canopy_light' => $canopyLight,
                'pump' => $pump,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('outlet', $data);
            $this->db->insert_id();
        }
    }


    //Branch Project List
    public function getAllBranchProjectList()
    {
        $sql = "SELECT B.zone, B.branch, B.id AS branch_id, COUNT(BP.id) AS overall_project_count, SUM(CASE WHEN BP.project_category = 'hpcl' THEN 1 ELSE 0 END) AS hpcl_overall_project_count, SUM(CASE WHEN BP.project_category = 'private' THEN 1 ELSE 0 END) AS private_overall_project_count, SUM(CASE WHEN BP.project_status = 'not_started' AND BP.project_category = 'hpcl' THEN 1 ELSE 0 END) AS hpcl_notstarted_project_count, SUM(CASE WHEN BP.project_status = 'not_started' AND BP.project_category = 'private' THEN 1 ELSE 0 END) AS private_notstarted_project_count, SUM(CASE WHEN BP.project_status = 'ongoing' AND BP.project_category = 'hpcl' THEN 1 ELSE 0 END) AS hpcl_ongoing_project_count, SUM(CASE WHEN BP.project_status = 'ongoing' AND BP.project_category = 'private' THEN 1 ELSE 0 END) AS private_ongoing_project_count, SUM(CASE WHEN BP.project_status = 'completed' AND BP.project_category = 'hpcl' THEN 1 ELSE 0 END) AS hpcl_completed_project_count, SUM(CASE WHEN BP.project_status = 'completed' AND BP.project_category = 'private' THEN 1 ELSE 0 END) AS private_completed_project_count FROM branch_project BP INNER JOIN master_branch B ON B.id = BP.branch_id WHERE BP.delete_status = 0 GROUP BY B.zone, B.branch ORDER BY B.branch ASC;";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Branch Project List
    public function getProjectCategoryList($projectCategory = '', $branchId = '')
    {
        $whereProjectCategory = '';
        $whereBranchId = '';

        if ($projectCategory) {
            $whereProjectCategory = "AND BP.project_category = '$projectCategory'";
        }

        if ($branchId) {
            $whereBranchId = "AND BP.branch_id = '$branchId'";
        }

        $sql = "SELECT BP.project_type, COUNT(BP.id) AS overall_project_count, SUM(CASE WHEN BP.project_status = 'not_started' THEN 1 ELSE 0 END) AS notstarted_project_count, SUM(CASE WHEN BP.project_status = 'ongoing' THEN 1 ELSE 0 END) AS ongoing_project_count, SUM(CASE WHEN BP.project_status = 'completed' THEN 1 ELSE 0 END) AS completed_project_count, MPT.project_type AS project_type_name, MPT.id AS project_type_id FROM branch_project BP LEFT JOIN master_project_type MPT ON MPT.id = BP.project_type WHERE BP.delete_status = 0 $whereBranchId $whereProjectCategory GROUP BY BP.project_type";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Branch Project List
    public function getBranchProjectList($projectCategory = '', $branchId = '', $projectType = '')
    {
        if ($projectCategory) {
            $whereProjectCategory = "AND BP.project_category = '$projectCategory'";
        }
        if ($branchId) {
            $whereBranchId = "AND BP.branch_id = '$branchId'";
        }
        if ($projectType) {
            $whereProjectType = "AND BP.project_type = '$projectType'";
        }

        $sql = "SELECT BP.*, DATE_FORMAT(BP.date, '%d-%m-%Y') AS projectDateFormat, DATE_FORMAT(BP.completed_date, '%d-%m-%Y') AS projectCompletedDateFormat, E.employee_name, MD.designation AS employee_designation, B.branch AS branch_name, B.id AS branch_id, B.zone, MPT.project_type AS project_type_name FROM branch_project BP LEFT JOIN master_project_type MPT ON MPT.id = BP.project_type LEFT JOIN employee E ON E.id = BP.employee_id LEFT JOIN master_designation MD ON MD.id = E.designation LEFT JOIN master_branch B ON B.id = BP.branch_id WHERE BP.delete_status = 0 $whereProjectCategory $whereBranchId $whereProjectType";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Branch Project Info
    public function getBranchProjectInfo($branchProjectId)
    {
        $sql = "SELECT BP.*, B.zone, B.branch, MPT.project_type AS project_type_name, E.employee_name, MD.designation AS employee_designation, DATE_FORMAT(BP.date, '%d - %m - %Y') AS project_dateFormat, DATE_FORMAT(BP.completed_date, '%d - %m - %Y') AS completed_dateFormat, MPT.id AS project_type_id FROM branch_project BP INNER JOIN master_branch B ON B.id = BP.branch_id LEFT JOIN employee E ON E.id = BP.employee_id LEFT JOIN master_project_type MPT ON MPT.id = BP.project_type LEFT JOIN master_designation MD ON MD.id = E.designation WHERE BP.id = $branchProjectId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Branch Project Form
    public function saveBranchProjectData($branchProjectId, $branchId, $projectCategory, $projectType, $projectDate, $outletName, $outletLocation, $employeeName, $projectStatus, $completedDate)
    {
        $userId = $this->session->userdata('userid');

        if ($branchProjectId > 0) {
            $data = array(
                'branch_id' => $branchId,
                'project_category' => $projectCategory,
                'project_type' => $projectType,
                'date' => $projectDate,
                'outlet_name' => $outletName,
                'outlet_location' => $outletLocation,
                'completed_date' => $completedDate,
                'employee_id' => $employeeName,
                'project_status' => $projectStatus,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $branchProjectId);
            $this->db->update('branch_project', $data);
        } else {
            $data = array(
                'branch_id' => $branchId,
                'project_category' => $projectCategory,
                'project_type' => $projectType,
                'date' => $projectDate,
                'outlet_name' => $outletName,
                'outlet_location' => $outletLocation,
                'completed_date' => $completedDate,
                'employee_id' => $employeeName,
                'project_status' => $projectStatus,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('branch_project', $data);
            $this->db->insert_id();
        }
    }
    
    //Branch Project Completed Form
    public function saveBranchProjectCompletedForm($branchProjectId, $completedDate)
    {
        if ($branchProjectId > 0) {
            $data = array(
                'completed_date' => $completedDate,
                'project_status' => 'completed'
            );
            $this->db->where('id', (int) $branchProjectId);
            $this->db->update('branch_project', $data);
        }
    }

    // Server Side Outlet List
    public function get_outlets_server_side($postData, $pageStatus = '')
    {
        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        ## Custom Filter
        $branchId = $postData['branchId'];

        ## Search 
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = " (O.outlet_name like '%" . $searchValue . "%' or O.outlet_location like '%" . $searchValue . "%' or O.customer_id like '%" . $searchValue . "%' or O.contact_name like '%" . $searchValue . "%' or O.contact_number like '%" . $searchValue . "%' or B.branch like '%" . $searchValue . "%') ";
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('outlet O');
        $this->db->where('O.delete_status', 0);
        if ($pageStatus) {
            $this->db->where('O.status', $pageStatus);
        }
        if ($branchId != '') {
            $this->db->where('O.branch', $branchId);
        }
        $query = $this->db->get();
        $records = $query->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of records with filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('outlet O');
        $this->db->join('master_branch B', 'B.id = O.branch', 'inner');
        $this->db->where('O.delete_status', 0);
        if ($pageStatus) {
            $this->db->where('O.status', $pageStatus);
        }
        if ($branchId != '') {
            $this->db->where('O.branch', $branchId);
        }
        if ($searchQuery != '') {
            $this->db->where($searchQuery);
        }
        $query = $this->db->get();
        $records = $query->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select("O.*, DATE_FORMAT(O.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(O.renewal_date, '%d - %m - %Y') AS renewal_dateFormat, DATE_FORMAT(O.checking_date, '%d - %m - %Y') AS checking_dateFormat, LP.employee_name, B.branch AS branch_name");
        $this->db->from('outlet O');
        $this->db->join('login_permission LP', 'LP.employee_id = O.created_by', 'inner');
        $this->db->join('master_branch B', 'B.id = O.branch', 'inner');
        $this->db->where('O.delete_status', 0);
        if ($pageStatus) {
            $this->db->where('O.status', $pageStatus);
        }
        if ($branchId != '') {
            $this->db->where('O.branch', $branchId);
        }
        if ($searchQuery != '') {
            $this->db->where($searchQuery);
        }
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $query = $this->db->get();
        $data = $query->result();

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }

    // Extract Latitude and Longitude from Google Maps URL
    public function extractLatLngFromUrl($url)
    {
        if (empty($url)) {
            return null;
        }
        $url = trim($url);

        // Check cache first for instant response
        $cacheFile = APPPATH . 'cache/maps_coords_cache.json';
        static $coordsCache = null;
        if ($coordsCache === null) {
            $coordsCache = file_exists($cacheFile) ? json_decode(@file_get_contents($cacheFile), true) : [];
            if (!is_array($coordsCache)) {
                $coordsCache = [];
            }
        }
        $cacheKey = md5(strtolower($url));
        if (isset($coordsCache[$cacheKey])) {
            return $coordsCache[$cacheKey];
        }

        // 1. Direct patterns in the URL itself (without network call)
        // Matches /@13.08268,80.27071
        if (preg_match('#/@(-?\d+\.\d+),(-?\d+\.\d+)#', $url, $m)) {
            return $this->saveCoordsCache($cacheKey, (float)$m[1], (float)$m[2], $cacheFile, $coordsCache);
        }

        // Matches !3d10.9927282!4d76.9682276
        if (preg_match('#!3d(-?\d+\.\d+)!4d(-?\d+\.\d+)#', $url, $m)) {
            return $this->saveCoordsCache($cacheKey, (float)$m[1], (float)$m[2], $cacheFile, $coordsCache);
        }

        // Matches [?&](q|query|ll|daddr|destination)=13.08268,80.27071
        if (preg_match('#[?&](?:q|query|ll|daddr|destination)=(-?\d+\.\d+)[,\s]+(-?\d+\.\d+)#i', $url, $m)) {
            return $this->saveCoordsCache($cacheKey, (float)$m[1], (float)$m[2], $cacheFile, $coordsCache);
        }

        // Matches /(?:place|search|dir)/13.08268,80.27071
        if (preg_match('#/(?:place|search|dir)/(-?\d+\.\d+)[,\s]+(-?\d+\.\d+)#i', $url, $m)) {
            return $this->saveCoordsCache($cacheKey, (float)$m[1], (float)$m[2], $cacheFile, $coordsCache);
        }

        // 2. Short URLs (e.g., maps.app.goo.gl or goo.gl/maps)
        if (preg_match('#^https?://(?:maps\.app\.goo\.gl|goo\.gl(?:/maps)?)/#i', $url)) {
            $redirectUrl = '';
            if (function_exists('curl_init')) {
                $ch = curl_init($url);
                curl_setopt_array($ch, [
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER => true,
                    CURLOPT_NOBODY => true,
                    CURLOPT_FOLLOWLOCATION => false, // Fetch 301/302 Location header directly
                    CURLOPT_TIMEOUT => 4,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false,
                    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                    // Bypass local ISP DNS poisoning/IPv6 hang for goo.gl domains
                    CURLOPT_RESOLVE => [
                        'maps.app.goo.gl:443:142.250.205.110',
                        'maps.app.goo.gl:443:142.250.205.78',
                        'goo.gl:443:142.250.205.110'
                    ]
                ]);
                $responseHeaders = curl_exec($ch);
                curl_close($ch);

                if (!empty($responseHeaders) && preg_match('#^Location:\s*(https?://[^\r\n]+)#im', $responseHeaders, $lm)) {
                    $redirectUrl = trim($lm[1]);
                }
            }

            if (!empty($redirectUrl)) {
                // Check expanded redirect URL
                if (preg_match('#/@(-?\d+\.\d+),(-?\d+\.\d+)#', $redirectUrl, $m)) {
                    return $this->saveCoordsCache($cacheKey, (float)$m[1], (float)$m[2], $cacheFile, $coordsCache);
                }
                if (preg_match('#!3d(-?\d+\.\d+)!4d(-?\d+\.\d+)#', $redirectUrl, $m)) {
                    return $this->saveCoordsCache($cacheKey, (float)$m[1], (float)$m[2], $cacheFile, $coordsCache);
                }
                if (preg_match('#[?&](?:q|query|ll|daddr|destination)=(-?\d+\.\d+)[,\s]+(-?\d+\.\d+)#i', $redirectUrl, $m)) {
                    return $this->saveCoordsCache($cacheKey, (float)$m[1], (float)$m[2], $cacheFile, $coordsCache);
                }
                if (preg_match('#/(?:place|search|dir)/(-?\d+\.\d+)[,\s]+(-?\d+\.\d+)#i', $redirectUrl, $m)) {
                    return $this->saveCoordsCache($cacheKey, (float)$m[1], (float)$m[2], $cacheFile, $coordsCache);
                }
            }
        }

        // 3. Fallback: Any raw coordinate pair in string e.g. "13.082680, 80.270718"
        if (preg_match('#(-?\d{1,3}\.\d+)[,\s]+(-?\d{1,3}\.\d+)#', $url, $m)) {
            $lat = (float)$m[1];
            $lng = (float)$m[2];
            if ($lat >= -90 && $lat <= 90 && $lng >= -180 && $lng <= 180) {
                return $this->saveCoordsCache($cacheKey, $lat, $lng, $cacheFile, $coordsCache);
            }
        }

        return null;
    }

    private function saveCoordsCache($cacheKey, $lat, $lng, $cacheFile, &$coordsCache)
    {
        $coords = ['lat' => (float)$lat, 'lng' => (float)$lng];
        $coordsCache[$cacheKey] = $coords;
        @file_put_contents($cacheFile, json_encode($coordsCache, JSON_PRETTY_PRINT));
        return $coords;
    }

    // Calculate Haversine road-approximated distance in Kilometers
    public function haversineDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // km
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $straightKm = $earthRadius * $c;
        // 1.25x road winding factor for driving approximation
        return round($straightKm * 1.25, 1);
    }

    // Earth Testing Planner: Prioritize by Due Date & Optimize Route from Branch
    public function getEarthTestingPlanner($branchId = '', $priorityFilter = 'all')
    {
        // 1. Get Branch Info
        $branchInfo = null;
        $branchCoords = null;
        if (!empty($branchId)) {
            $bSql = "SELECT id, branch, zone, location_url FROM master_branch WHERE id = " . (int)$branchId . " AND delete_status = 0";
            $bRes = $this->db->query($bSql);
            $branchList = $bRes->result();
            if (!empty($branchList)) {
                $branchInfo = $branchList[0];
                if (!empty($branchInfo->location_url)) {
                    $branchCoords = $this->extractLatLngFromUrl($branchInfo->location_url);
                }
            }
        }

        // 2. Query Outlets for the Branch
        $where = "O.delete_status = 0 AND O.status = 'active'";
        if (!empty($branchId)) {
            $where .= " AND O.branch = " . (int)$branchId;
        }

        $sql = "SELECT O.*, 
                       B.branch AS branch_name, 
                       B.zone AS branch_zone,
                       B.location_url AS branch_location_url,
                       DATE_FORMAT(O.renewal_date, '%d-%m-%Y') AS renewal_dateFormat, 
                       DATE_FORMAT(O.checking_date, '%d-%m-%Y') AS checking_dateFormat 
                FROM outlet O 
                INNER JOIN master_branch B ON B.id = O.branch 
                WHERE $where 
                ORDER BY O.renewal_date ASC";

        $res = $this->db->query($sql);
        $rawOutlets = $res->result();

        $today = new DateTime(date('Y-m-d'));

        $stats = [
            'total' => 0,
            'overdue' => 0,      // < 15 days or past
            'due_soon' => 0,     // 15 - 45 days
            'safe' => 0,         // > 45 days
            'with_coords' => 0,
            'total_km' => 0.0
        ];

        $classifiedOutlets = [];

        foreach ($rawOutlets as $row) {
            $stats['total']++;

            // Calculate days remaining
            $renewalDateStr = trim($row->renewal_date);
            $hasValidDate = (!empty($renewalDateStr) && $renewalDateStr != '0000-00-00' && $renewalDateStr != '00 - 00 - 0000');
            
            if ($hasValidDate) {
                $renewalDate = new DateTime($renewalDateStr);
                $diff = $today->diff($renewalDate);
                $daysRemaining = (int)$diff->format("%r%a");
            } else {
                $daysRemaining = -999;
            }

            // User Priority Thresholds:
            // 🔴 Overdue (renewal_date < 15 days or past) - Highest Priority
            // 🟠 Due Soon (15 to 45 days) - Medium Priority
            // 🟢 Upcoming / Safe (> 45 days) - Low Priority
            if ($daysRemaining < 15) {
                $priority = 1;
                $priorityKey = 'overdue';
                $priorityLabel = ($daysRemaining < 0) ? 'Overdue (' . abs($daysRemaining) . ' days)' : 'Critical (' . $daysRemaining . ' days left)';
                $priorityBadge = 'danger';
                $stats['overdue']++;
            } elseif ($daysRemaining <= 45) {
                $priority = 2;
                $priorityKey = 'due_soon';
                $priorityLabel = 'Due Soon (' . $daysRemaining . ' days)';
                $priorityBadge = 'warning';
                $stats['due_soon']++;
            } else {
                $priority = 3;
                $priorityKey = 'safe';
                $priorityLabel = 'Upcoming (' . $daysRemaining . ' days)';
                $priorityBadge = 'success';
                $stats['safe']++;
            }

            // Extract outlet coordinates
            $coords = null;
            if (!empty($row->location_url)) {
                $coords = $this->extractLatLngFromUrl($row->location_url);
            }
            if ($coords) {
                $stats['with_coords']++;
            }

            // Filter check
            if ($priorityFilter !== 'all' && $priorityFilter !== $priorityKey) {
                continue;
            }

            $item = (object)[
                'id' => $row->id,
                'sno' => $row->sno,
                'outlet_name' => $row->outlet_name,
                'outlet_location' => $row->outlet_location,
                'location_url' => $row->location_url,
                'customer_id' => $row->customer_id,
                'contact_name' => $row->contact_name,
                'contact_number' => $row->contact_number,
                'branch_id' => $row->branch,
                'branch_name' => $row->branch_name,
                'zone' => $row->branch_zone,
                'checking_date' => $row->checking_date,
                'checking_dateFormat' => $row->checking_dateFormat,
                'renewal_date' => $row->renewal_date,
                'renewal_dateFormat' => $row->renewal_dateFormat,
                'days_remaining' => $daysRemaining,
                'priority' => $priority,
                'priority_key' => $priorityKey,
                'priority_label' => $priorityLabel,
                'priority_badge' => $priorityBadge,
                'coords' => $coords,
                'has_coords' => !empty($coords),
                'lat' => $coords ? $coords['lat'] : null,
                'lng' => $coords ? $coords['lng'] : null,
                'distance_from_branch' => null
            ];

            // Direct distance from branch if both have coords
            if ($branchCoords && $coords) {
                $item->distance_from_branch = $this->haversineDistance($branchCoords['lat'], $branchCoords['lng'], $coords['lat'], $coords['lng']);
            }

            $classifiedOutlets[] = $item;
        }

        // 3. Sequential Route Planning ("Which Outlet We Go First")
        // Group by Priority Tier (1 = Highest, 2 = Medium, 3 = Low)
        $tierGroups = [1 => [], 2 => [], 3 => []];
        foreach ($classifiedOutlets as $outlet) {
            $tierGroups[$outlet->priority][] = $outlet;
        }

        $sequencedStops = [];
        $currentPos = $branchCoords; // Start at branch location if available
        $prevStopName = !empty($branchInfo) ? $branchInfo->branch . ' Branch' : 'Start Point';
        $cumulativeKm = 0.0;
        $stopIndex = 1;

        // Process each tier from highest priority to lowest
        foreach ([1, 2, 3] as $tier) {
            $pool = $tierGroups[$tier];
            if (empty($pool)) continue;

            $withCoords = [];
            $withoutCoords = [];

            foreach ($pool as $p) {
                if ($p->has_coords) {
                    $withCoords[] = $p;
                } else {
                    $withoutCoords[] = $p;
                }
            }

            // Nearest Neighbor for geolocated outlets in this tier
            while (!empty($withCoords)) {
                $bestIdx = 0;
                $bestDist = 999999;

                if ($currentPos) {
                    foreach ($withCoords as $idx => $cand) {
                        $dist = $this->haversineDistance($currentPos['lat'], $currentPos['lng'], $cand->lat, $cand->lng);
                        if ($dist < $bestDist) {
                            $bestDist = $dist;
                            $bestIdx = $idx;
                        }
                    }
                } else {
                    $bestDist = 0;
                }

                $selected = $withCoords[$bestIdx];
                array_splice($withCoords, $bestIdx, 1);

                $legDistance = ($currentPos && $bestDist < 999999) ? $bestDist : null;
                if ($legDistance !== null) {
                    $cumulativeKm += $legDistance;
                }

                $selected->stop_number = $stopIndex++;
                $selected->from_point = $prevStopName;
                $selected->leg_km = $legDistance;
                $selected->cumulative_km = round($cumulativeKm, 1);

                $sequencedStops[] = $selected;

                // Move current position to this stop
                $currentPos = ['lat' => $selected->lat, 'lng' => $selected->lng];
                $prevStopName = $selected->outlet_name;
            }

            // Append non-geolocated outlets of this priority tier
            foreach ($withoutCoords as $unloc) {
                $unloc->stop_number = $stopIndex++;
                $unloc->from_point = $prevStopName;
                $unloc->leg_km = null;
                $unloc->cumulative_km = round($cumulativeKm, 1);
                $sequencedStops[] = $unloc;
            }
        }

        $stats['total_km'] = round($cumulativeKm, 1);

        // 4. Construct Multi-Stop Google Maps Direction URL
        $mapWaypoints = [];
        if ($branchCoords) {
            $mapWaypoints[] = $branchCoords['lat'] . ',' . $branchCoords['lng'];
        }
        foreach ($sequencedStops as $stop) {
            if ($stop->has_coords) {
                $mapWaypoints[] = $stop->lat . ',' . $stop->lng;
            }
        }

        $multiStopRouteUrl = '';
        if (count($mapWaypoints) >= 2) {
            // Google Maps URL with up to ~15 stops
            $multiStopRouteUrl = 'https://www.google.com/maps/dir/' . implode('/', array_slice($mapWaypoints, 0, 15));
        }

        return [
            'branch' => $branchInfo,
            'branch_coords' => $branchCoords,
            'stats' => $stats,
            'sequenced_stops' => $sequencedStops,
            'google_maps_route_url' => $multiStopRouteUrl,
            'priority_filter' => $priorityFilter
        ];
    }
}
?>
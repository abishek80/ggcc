<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emailmodel extends CI_Model
{
    public function sendPayslipEmail($year, $month, $employeeName, $designation, $email)
    {
        $month = ucfirst(strtolower($month));
        
        $data['year']           =   $year;
        $data['month']          =   $month;
        $data['email']          =   $email;
        $data['employeeName']   =   $employeeName;
        $data['designation']    =   $designation;

        $subject    = $month . ' ' . $year . ' - Payslip';
        $message    = $this->load->view('email_template/employee_payslip_template',$data, TRUE);
        $this->common->email_data($email, $subject, $message);
    }

    public function sendWelcomeEmail($companyName, $employeeName, $email, $mobileNumber, $plainPassword)
    {
        if (empty($email)) {
            return false;
        }

        $companyNameStr = !empty($companyName) ? $companyName : 'GGCC';

        $data['companyName']    = $companyNameStr;
        $data['employeeName']   = $employeeName;
        $data['email']          = $email;
        $data['mobileNumber']   = $mobileNumber;
        $data['plainPassword']  = $plainPassword;
        $data['webLoginUrl']    = 'https://ggcc.org.in/login';

        // Retrieve the latest active Android update URL from the app_version_control table
        $latestApkUrl = 'https://ggcc.org.in/ggcc_mobile.apk'; // default fallback
        
        $sql = "SELECT update_url FROM app_version_control 
                WHERE platform = 'android' AND status = 'active' 
                ORDER BY id DESC LIMIT 1";
        $versionInfo = $this->db->query($sql)->row();
        if ($versionInfo && !empty($versionInfo->update_url)) {
            $latestApkUrl = $versionInfo->update_url;
        }
        $data['apkDownloadUrl'] = $latestApkUrl;

        $subject = 'Welcome to ' . $companyNameStr . ' - Login Details';
        $message = $this->load->view('email_template/welcome_employee_template', $data, TRUE);
        $this->common->email_data($email, $subject, $message);
        return true;
    }
}
?>
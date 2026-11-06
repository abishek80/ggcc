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

        // Android App Link - opens the app directly if already installed
        // (verified via /.well-known/assetlinks.json), otherwise falls back to
        // a web page that redirects to the latest active Play Store listing.
        $data['apkDownloadUrl'] = base_url('app');

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

        // Android App Link - opens the app directly if already installed
        // (verified via /.well-known/assetlinks.json), otherwise falls back to
        // a web page that redirects to the latest active Play Store listing.
        $data['apkDownloadUrl'] = base_url('app');

        $subject = 'Welcome to ' . $companyNameStr . ' - Login Details';
        $message = $this->load->view('email_template/welcome_employee_template', $data, TRUE);
        $this->common->email_data($email, $subject, $message);
        return true;
    }
}
?>
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
        $message    = $this->load->view('email_template/payslip_email_template',$data, TRUE);
        $this->common->email_data($email, $subject, $message);
    }
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
// SMTP Server
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp-relay.brevo.com';
$config['smtp_port'] = 587;
$config['smtp_user'] = '8d827a001@smtp-brevo.com';
$config['smtp_pass'] = 'bJvC86zRgykP2cV7';
$config['smtp_crypto'] = 'tls';
$config['smtp_timeout'] = 60;
$config['smtp_keepalive'] = TRUE;

$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['crlf'] = "\r\n";
$config['wordwrap'] = TRUE;

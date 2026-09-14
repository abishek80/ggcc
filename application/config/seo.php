<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| SEO & Metadata Central Configuration
|--------------------------------------------------------------------------
| Single source of truth for site branding, default meta values,
| canonical URLs, social profiles, and JSON-LD schema defaults.
*/

$config['seo_site_name'] = 'George General Construction Company (GGCC)';
$config['seo_short_name'] = 'GGCC';
$config['seo_canonical_domain'] = 'https://ggcc.org.in/';
$config['seo_default_title'] = 'GGCC — Turnkey Electrical Contracting & Installation Services in India';
$config['seo_default_description'] = 'George General Construction Company (GGCC) is a premier licensed electrical contracting firm delivering turnkey industrial electrification, HT/LT cable laying, custom control panel fabrication, and 24/7 maintenance across India.';
$config['seo_default_og_image'] = 'https://ggcc.org.in/themes/images/hpcl_petrol_pump_lighting.jpg';
$config['seo_twitter_handle'] = '@ggcc_official';

$config['seo_contact_phone'] = '+919920667756';
$config['seo_contact_phone_display'] = '99206 67756';
$config['seo_contact_email'] = 'info@ggcc.org.in';

$config['seo_address'] = array(
    '@type' => 'PostalAddress',
    'streetAddress' => 'Suyog Samuha CHS Ltd, 9, Plot No. 41 to 44, Sector 8, Sanpada',
    'addressLocality' => 'Navi Mumbai',
    'addressRegion' => 'Maharashtra',
    'postalCode' => '400705',
    'addressCountry' => 'IN'
);

$config['seo_service_locations'] = array(
    'Vashi', 'Gwalior', 'Madurai', 'Coimbatore', 'Tiruchirappalli', 
    'Bangalore', 'Indore', 'Tirunelveli', 'Mumbai', 'Nanded', 'Chennai', 'Bhopal', 'Kochi'
);

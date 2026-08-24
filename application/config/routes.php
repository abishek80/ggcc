<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$default_controller = "web";
$language_alias = array('en');
// exceptions
$controller_exceptions = array('web', 'login', 'admin', 'complaint', 'purchase', 'bill', 'employee', 'master', 'vehicle', 'outlet', 'stock', 'loan', 'report', 'attendance', 'cron', 'notification', 'api');
// route
$route['default_controller'] = $default_controller;

// Public GGCC Corporate Website Routes
$route['about'] = 'web/about';
$route['services'] = 'web/services';
$route['services/(:any)'] = 'web/service_detail/$1';
$route['gallery'] = 'web/gallery';
$route['contact'] = 'web/contact';
$route['partners-customers'] = 'web/partners_customers';
$route['terms-and-conditions'] = 'web/terms_and_conditions';
$route['privacy-policy'] = 'web/privacy_policy';
$route['locations'] = 'web/locations';
$route['locations/(:any)'] = 'web/location_detail/$1';

$route["^(".implode('|', $language_alias).")/(".implode('|', $controller_exceptions).")(.*)"] = '$2';
$route["^(".implode('|', $language_alias).")?/(.*)"] = $default_controller.'/$2';
$route["^((?!\b".implode('\b|\b', $controller_exceptions)."\b).*)$"] = $default_controller.'/$1';
foreach($language_alias as $language) {
    $route[$language] = $default_controller.'/index';
}
$route['404_override'] = 'common/errorPage';
$route['^(it|en)/(.+)$'] = "$2";
$route['^(it|en)$'] = $route['default_controller'];
$route['translate_uri_dashes'] = TRUE;
// Admin Route Path
$route['admin/dashboard'] = 'admin/index';
$route['dashboard'] = 'admin/index';

// API Route Path
$route['api'] = 'api/index';
$route['api/(:any)/(:any)'] = 'api/$1/$2';
$route['api/(:any)'] = 'api/$1';

// complaint Controller Route Path
$route['complaint'] = "complaint/index";
$route['complaint/(:any)'] = 'complaint/$1';
$route['complaint/(:any)/(:any)'] = 'complaint/$1/$2';

// purchase Controller Route Path
$route['purchase'] = "purchase/index";
$route['purchase/(:any)'] = 'purchase/$1';
$route['purchase/(:any)/(:any)'] = 'purchase/$1/$2';

// bill Controller Route Path
$route['bill'] = "bill/index";
$route['bill/(:any)'] = 'bill/$1';
$route['bill/(:any)/(:any)'] = 'bill/$1/$2';

// employee Controller Route Path
$route['employee'] = "employee/index";
$route['employee/(:any)'] = 'employee/$1';
$route['employee/(:any)/(:any)'] = 'employee/$1/$2';

// master Controller Route Path
$route['master'] = "master/index";
$route['master/(:any)'] = 'master/$1';
$route['master/(:any)/(:any)'] = 'master/$1/$2';

// vehicle Controller Route Path
$route['vehicle'] = "vehicle/index";
$route['vehicle/(:any)'] = 'vehicle/$1';
$route['vehicle/(:any)/(:any)'] = 'vehicle/$1/$2';

// outlet Controller Route Path
$route['outlet'] = "outlet/index";
$route['outlet/(:any)'] = 'outlet/$1';
$route['outlet/(:any)/(:any)'] = 'outlet/$1/$2';

// stock Controller Route Path
$route['stock'] = "stock/index";
$route['stock/(:any)'] = 'stock/$1';
$route['stock/(:any)/(:any)'] = 'stock/$1/$2';

// loan Controller Route Path
$route['loan'] = "loan/index";
$route['loan/(:any)'] = 'loan/$1';
$route['loan/(:any)/(:any)'] = 'loan/$1/$2';

// report Controller Route Path
$route['report'] = "report/index";
$route['report/(:any)'] = 'report/$1';
$route['report/(:any)/(:any)'] = 'report/$1/$2';

// attendance Controller Route Path
$route['attendance'] = "attendance/index";
$route['attendance/(:any)'] = 'attendance/$1';
$route['attendance/(:any)/(:any)'] = 'attendance/$1/$2';
$route['report/(:any)/(:any)'] = 'report/$1/$2';

// notification Controller Route Path
$route['notification'] = "notification/index";
$route['notification/(:any)'] = 'notification/$1';
$route['notification/(:any)/(:any)'] = 'notification/$1/$2';
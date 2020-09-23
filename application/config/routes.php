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
|	https://codeigniter.com/user_guide/general/routing.html
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
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'web/view';
$route['package_mail'] = 'web/package_mail';
// $route['supplier/login'] = 'auth/admin_login';
// $route['supplier/register'] = 'auth/register';
// $route['supplier/forgot_password'] = 'auth/forgot_password';
// $route['supplier/logout'] = 'auth/logout';
$route['super_admin'] = "super_admin/super_admin/index";


$route['Supplier'] = 'auth/admin_login';
$route['supplier/dashboard'] = 'dashboard/view';

$route['admin/sliders/edit/(:num)']='dashboard/edit_sliders/$1';
$route['admin/sliders/delete/(:num)']='dashboard/delete_sliders/$1';

$route['admin/contacts/edit/(:num)']='dashboard/edit_contacts/$1';
$route['admin/contacts/delete/(:num)']='dashboard/delete_contacts/$1';

$route['admin/pages/edit/(:num)']='dashboard/edit_pages/$1';
$route['admin/pages/delete/(:num)']='dashboard/delete_pages/$1';

$route['admin/socials/edit/(:num)']='dashboard/edit_socials/$1';
$route['admin/socials/delete/(:num)']='dashboard/delete_socials/$1';

$route['admin/comments/edit/(:num)']='dashboard/edit_comments/$1';
$route['admin/comments/delete/(:num)']='dashboard/delete_comments/$1';

$route['admin/galleries/edit/(:num)']='dashboard/edit_gallery/$1';
$route['admin/galleries/delete/(:num)']='dashboard/delete_gallery/$1';

$route['list-questionnaire'] = 'Questionnaire/getQuestionnaire';
$route['create-questionnaire'] = 'Questionnaire/create';
$route['create-questionnaire/(:any)'] = 'Questionnaire/create/$1';
$route['questionnaire/delete'] = 'Questionnaire/deleteQuestionnaire';



$route['list-consumer-categories'] = 'ConsumerCategories/getConsumerCategories';
$route['create-consumer-categories'] = 'ConsumerCategories/create';
$route['create-consumer-categories/(:any)'] = 'ConsumerCategories/create/$1';
$route['consumer-categorie/delete'] = 'ConsumerCategories/deleteConsumerCategorie';


$route['list-business-categories'] = 'BusinessCategories/getBusinessCategories';
$route['create-business-categories'] = 'BusinessCategories/create';
$route['create-business-categories/(:any)'] = 'BusinessCategories/create/$1';
$route['business-categorie/delete'] = 'BusinessCategories/deleteBusinessCategorie';

$route['articles'] = 'Articles/getAllArticles';
$route['admin/list-articles/(:any)'] = 'Articles/getArticles/$1';
$route['create-article'] = 'Articles/create';
$route['create-article/(:any)'] = 'Articles/create/$1';
$route['article/delete'] = 'Articles/deleteArticle';


//Reviews List
$route['admin/list-reviews/(:any)'] = 'Reviews/getReviews/$1';




$route['admin/(:any)'] = 'dashboard/view/$1';


$route['lang/(:any)'] = 'web/change_language/$1';
$route['lang/(:any)/(:any)'] = 'web/change_language/$1/$2';


$route['logout'] = 'web/logout';
$route['(:any)'] = 'web/view/$1';


//new routes

$route['Supplier/Login'] = 'auth/admin_login';
$route['Supplier/Register'] = 'auth/register';
$route['Supplier/ForgotPassword'] = 'auth/forgot_password';
$route['supplier/logout'] = 'auth/logout';
$route['Supplier/OVDashboard'] = 'supplier/create';
$route['Supplier/Create/CreateStoreFront/'] = 'supplier/create/addStoreFront';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//user url                   = 'controller_name/method_name/arg1/arg2/arg3....'
$route['default_controller'] = 'page_manage/index';

$route['about']				 = 'page_manage/about';
$route['contact']			 = 'page_manage/contact';
$route['product']			 = 'page_manage/product';
$route['product_detail/(:num)']			 = 'page_manage/product_detail/$1';
$route['product_detail/(:num)/(:any)']			 = 'page_manage/product_detail/$1/$2';
$route['contact_submit']	 = 'page_manage/contact_submit';

$route['login']	 = 'login_manage/login';
$route['login_submit']	 = 'login_manage/login_submit';
$route['profile']	 = 'profile_manage/index';
$route['profile/(:num)']	 = 'profile_manage/index/$1';
$route['contact/delete/(:num)']	 = 'profile_manage/delete/$1';
$route['contact/edit/(:num)']	 = 'profile_manage/edit/$1';


$route['api/product_list']	 = 'api_product_manage/product_list';
$route['api/get_product/(:num)']	 = 'api_product_manage/get_product/$1';
$route['api/glogin']	 = 'api_login_manage/glogin';
$route['api/flogin']	 = 'api_login_manage/flogin';

$route['api/testtoken']	 = 'api_login_manage/testtoken';

//One time
$route['visitorGenerator'] = "profile_manage/visitorGenerator";
$route['contactGenerator'] = "profile_manage/contactGenerator";

$route['schedule/cronjob']	 = 'schedule_manage/cronjob';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'homeController/index';
$route['login_action'] = 'homeController/login_action';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['check'] = 'test/home';

$route['fetch'] = 'test/get_data';



$route['session'] = 'test/session';

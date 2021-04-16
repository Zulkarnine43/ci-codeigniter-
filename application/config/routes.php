<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'homeController/index';
$route['register'] = 'homeController/register';
$route['register_save'] = 'homeController/register_save';
$route['login_action'] = 'homeController/login_action';

$route['edit_data/(.+)'] = 'homeController/edit_data/$1';

$route['register_update'] = 'homeController/register_update';

$route['delete_data/(.+)'] = 'homeController/delete_data/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['check'] = 'test/home';

$route['fetch'] = 'test/get_data';



$route['session'] = 'test/session';

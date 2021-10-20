<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Landing';
$route['admin'] = 'Auth/index/';
$route['Change%(:any)'] = 'Systems/Change/';
$route['Setting%20Profile'] = 'Systems/Profile/';
$route['Dashboard'] = 'Applications/Dashboard/index/';
$route['Signin'] = 'Landing/index/';
$route['404_override'] = 'Error_404';
$route['translate_uri_dashes'] = false;
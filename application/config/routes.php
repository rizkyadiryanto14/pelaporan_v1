<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Auth/login_view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//auth
$route['auth/login']	= 'Auth/logic_login';
$route['logout']		= 'Auth/logout';

//halaman
$route['dashboard']		= 'Backend/Dashboard';
//atlet
$route['atlet']			= 'Backend/Atlet';
$route['atlet/detail/(:num)'] = 'Backend/Atlet/detail/$1';
$route['atlet/insert']	= 'Backend/Atlet/insert';
$route['atlet/update/(:num)']  = 'Backend/Atlet/update/$1';
$route['atlet/delete/(:num)']  = 'Backend/Atlet/delete/$1';

//dojang
$route['dojang']				= 'Backend/Dojang';
$route['dojang/detail/(:num)'] 	= 'Backend/Dojang/detail/$1';
$route['dojang/insert']			= 'Backend/Dojang/insert';
$route['dojang/update/(:num)'] 	= 'Backend/Dojang/update/$1';
$route['dojang/delete/(:num)'] 	= 'Backend/Dojang/delete/$1';

//jadwal
$route['jadwal']				= 'Backend/Jadwal';
$route['jadwal/detail/(:num)']	= 'Backend/Jadwal/detail/$1';
$route['jadwal/insert']			= 'Backend/Jadwal/insert';
$route['jadwal/update/(:num)']	= 'Backend/Jadwal/update/$1';
$route['jadwal/delete/(:num)']	= 'Backend/Jadwal/delete/$1';

//pelatih
$route['pelatih']				= 'Backend/Pelatih';
$route['pelatih/detail/(:num)']	= 'Backend/Pelatih/detail/$1';
$route['pelatih/insert']		= 'Backend/Pelatih/insert';
$route['pelatih/update/(:num)']	= 'Backend/Pelatih/update/$1';
$route['pelatih/delete/(:num)']	= 'Backend/Pelatih/delete/$1';

//user
$route['users']					= 'Backend/Users';
$route['users/detail/(:num)']	= 'Backend/Users/detail/$1';
$route['users/insert']			= 'Backend/Users/insert';
$route['users/update/(:num)']	= 'Backend/Users/update/$1';
$route['users/delete/(:num)']	= 'Backend/Users/delete/$1';

//pembayaran
$route['pembayaran']				= 'Backend/Pembayaran';
$route['pembayaran/detail/(:num)']	= 'Backend/Pembayaran/detail/$1';
$route['pembayaran/insert']			= 'Backend/Pembayaran/insert';
$route['pembayaran/update/(:num)']	= 'Backend/Pembayaran/update/$1';
$route['pembayaran/delete/(:num)']	= 'Backend/Pembayaran/delete/$1';

<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

$route['kelola-user'] = 'User/kelolaUser';
$route['detail-user/(:any)'] = 'User/detailUser/$1';
$route['tambah-user'] = 'User/tambahUser';
$route['edit-user/(:any)'] = 'User/editUser/$1';
$route['hapus-user/(:any)'] = 'User/hapusUser/$1';

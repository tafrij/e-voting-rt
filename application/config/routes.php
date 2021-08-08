<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

$route['kelola-user'] = 'User/kelolaUser';
$route['detail-user/(:any)'] = 'User/detailUser/$1';
$route['tambah-user'] = 'User/tambahUser';
$route['edit-user/(:any)'] = 'User/editUser/$1';
$route['hapus-user/(:any)'] = 'User/hapusUser/$1';

$route['kandidat'] = 'User/kelolaKandidat';
$route['tambah-kandidat'] = 'User/tambahKandidat';
$route['edit-kandidat/(:any)'] = 'User/editKandidat/$1/';
$route['detail-kandidat/(:any)'] = 'User/detailKandidat/$1/';
$route['hapus-kandidat/(:any)'] = 'User/deleteKandidat/$1/';
$route['pemilihan'] = 'Vote/index';

$route['user-login'] = 'Auth/userLogin';
$route['user-logout'] = 'Auth/userLogout';

$route['vote-kandidat/(:any)'] = 'Vote/voteKandidat/$1';
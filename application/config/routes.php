<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'errors';
$route['translate_uri_dashes'] = FALSE;

$route['redefinicao/t/(:any)'] = "redefinicao/t/$1";
$route['ebook/detalhes/(:any)'] = "ebook/detalhes/$1";



$route['painel/ebooks_editar/(:any)'] = "painel/ebooks_editar/$1";

$route['painel/usuarios_editar/(:any)'] = "painel/usuarios_editar/$1";


$route['painel/play/i/(:any)'] = "painel/play/i/$1";


$route['checkout/(:any)'] = "checkout/index/$1";

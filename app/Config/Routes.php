<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/Auth', 'Auth::index');
$routes->get('/Auth/login', 'Auth::login');
$routes->post('/Auth/login_akun', 'Auth::login');
$routes->get('/Auth/register', 'Auth::register');
$routes->post('/Auth/register_akun', 'Auth::register');
$routes->post('/Auth/cekUsername', 'Auth::cekUsername');
$routes->get('/Auth/logout', 'Auth::logout');
$routes->get('/Dashboard', 'Dashboard::index');
$routes->post('/Dashboard/save', 'Dashboard::save');
$routes->post('/Dashboard/update', 'Dashboard::update');
$routes->post('/Dashboard/delete', 'Dashboard::delete');
$routes->get('/User', 'User::index');
$routes->post('/User/update', 'User::update');
$routes->get('/Kategori', 'Kategori::index');
$routes->post('/Kategori/save', 'Kategori::save');
$routes->post('/Kategori/update', 'Kategori::update');
$routes->post('/Kategori/delete', 'Kategori::delete');
$routes->get('/Berita', 'Berita::index');
$routes->post('/Berita/save', 'Berita::save');
$routes->post('/Berita/update', 'Berita::update');
$routes->post('/Berita/delete', 'Berita::delete');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

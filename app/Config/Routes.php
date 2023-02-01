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
$routes->get('/', 'User::index', ['filter' => 'AutoFilter']);
$routes->get('/logout', 'User::logout');
$routes->post('/ceklogin', 'User::ceklogin');

$routes->get('/pages', 'Pages::index', ['filter' => 'AuthFilter']);
$routes->get('/pages-about', 'Pages::about');

$routes->get('/surat', 'DataSurat::index', ['filter' => 'AuthFilter']);
$routes->get('/surat/edit/(:any)', 'DataSurat::edit/$1', ['filter' => 'AuthFilter']);
$routes->post('/surat/update/(:num)', 'DataSurat::update/$1', ['filter' => 'AuthFilter']);

$routes->get('/riwayat', 'Riwayat::index', ['filter' => 'AuthFilter']);
$routes->get('/riwayat/edit/(:any)', 'Riwayat::edit/$1', ['filter' => 'AuthFilter']);
$routes->post('/riwayat/update/(:num)', 'Riwayat::update/$1', ['filter' => 'AuthFilter']);
$routes->delete('/riwayat/delete/(:num)', 'Riwayat::delete/$1');

$routes->get('/ttd', 'Ttd::index', ['filter' => 'AuthFilter']);
$routes->get('/editttd/(:any)', 'Ttd::edit/$1', ['filter' => 'AuthFilter']);
$routes->post('/updatettd/(:num)', 'Ttd::updatettd/$1', ['filter' => 'AuthFilter']);

$routes->post('/identitas', 'Surat::identitas', ['filter' => 'AuthFilter']);
$routes->post('/isiidentitas', 'Surat::isiidentitas', ['filter' => 'AuthFilter']);

$routes->post('/dispensasi', 'Surat::dispensasi', ['filter' => 'AuthFilter']);
$routes->post('/isidispensasi', 'Surat::isidispensasi', ['filter' => 'AuthFilter']);

$routes->post('/belibbm', 'Surat::belibbm', ['filter' => 'AuthFilter']);
$routes->post('/isibelibbm', 'Surat::isibelibbm', ['filter' => 'AuthFilter']);

$routes->post('/izincuti', 'Surat::izincuti', ['filter' => 'AuthFilter']);
$routes->post('/isiizincuti', 'Surat::isiizincuti', ['filter' => 'AuthFilter']);

$routes->post('/izinkeramaian', 'Surat::izinkeramaian', ['filter' => 'AuthFilter']);
$routes->post('/isiizinkeramaian', 'Surat::isiizinkeramaian', ['filter' => 'AuthFilter']);

$routes->post('/izinterop', 'Surat::izinterop', ['filter' => 'AuthFilter']);
$routes->post('/isiizinterop', 'Surat::isiizinterop', ['filter' => 'AuthFilter']);

$routes->post('/belummenikah', 'Surat::belummenikah', ['filter' => 'AuthFilter']);
$routes->post('/isibelummenikah', 'Surat::isibelummenikah', ['filter' => 'AuthFilter']);

$routes->post('/izinpendirian', 'Surat::izinpendirian', ['filter' => 'AuthFilter']);
$routes->post('/isiizinpendirian', 'Surat::isiizinpendirian', ['filter' => 'AuthFilter']);

$routes->post('/domisili', 'Surat::domisili', ['filter' => 'AuthFilter']);
$routes->post('/isidomisili', 'Surat::isidomisili', ['filter' => 'AuthFilter']);

$routes->post('/keteranganhilang', 'Surat::keteranganhilang', ['filter' => 'AuthFilter']);
$routes->post('/isiketeranganhilang', 'Surat::isiketeranganhilang', ['filter' => 'AuthFilter']);

$routes->post('/keterangankelahiran', 'Surat::keterangankelahiran', ['filter' => 'AuthFilter']);
$routes->post('/isiketerangankelahiran', 'Surat::isiketerangankelahiran', ['filter' => 'AuthFilter']);

$routes->post('/keterangankematian', 'Surat::keterangankematian', ['filter' => 'AuthFilter']);
$routes->post('/isiketerangankematian', 'Surat::isiketerangankematian', ['filter' => 'AuthFilter']);

$routes->post('/keteranganmerantau', 'Surat::keteranganmerantau', ['filter' => 'AuthFilter']);
$routes->post('/isiketeranganmerantau', 'Surat::isiketeranganmerantau', ['filter' => 'AuthFilter']);

$routes->post('/skck', 'Surat::skck', ['filter' => 'AuthFilter']);
$routes->post('/isiskck', 'Surat::isiskck', ['filter' => 'AuthFilter']);

$routes->post('/sktm', 'Surat::sktm', ['filter' => 'AuthFilter']);
$routes->post('/isisktm', 'Surat::isisktm', ['filter' => 'AuthFilter']);

$routes->post('/sppd', 'Surat::sppd', ['filter' => 'AuthFilter']);
$routes->post('/isisppd', 'Surat::isisppd', ['filter' => 'AuthFilter']);

$routes->post('/kuasa', 'Surat::kuasa', ['filter' => 'AuthFilter']);
$routes->post('/isikuasa', 'Surat::isikuasa', ['filter' => 'AuthFilter']);

$routes->post('/keteranganlain', 'Surat::keteranganlain', ['filter' => 'AuthFilter']);
$routes->post('/isiketeranganlain', 'Surat::isiketeranganlain', ['filter' => 'AuthFilter']);

$routes->post('/usaha', 'Surat::usaha', ['filter' => 'AuthFilter']);
$routes->post('/isiusaha', 'Surat::isiusaha', ['filter' => 'AuthFilter']);

$routes->post('/perintahtugas', 'Surat::perintahtugas', ['filter' => 'AuthFilter']);
$routes->post('/isiperintahtugas', 'Surat::isiperintahtugas', ['filter' => 'AuthFilter']);

$routes->post('/pernyataanmiskin', 'Surat::pernyataanmiskin', ['filter' => 'AuthFilter']);
$routes->post('/isipernyataanmiskin', 'Surat::isipernyataanmiskin', ['filter' => 'AuthFilter']);

$routes->post('/undangan', 'Surat::undangan', ['filter' => 'AuthFilter']);
$routes->post('/isiundangan', 'Surat::isiundangan', ['filter' => 'AuthFilter']);









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

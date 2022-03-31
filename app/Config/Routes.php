<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->addRedirect('/', 'home');
$routes->get('/home', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/login/logout', 'Login::logout');



// $routes->post('/login', 'Login::index');


$routes->get('/user', 'User::index');
$routes->post('/user', 'User::insertuser');
$routes->get('/user/tambah', 'User::tambahuser');
$routes->post('/user/edit', 'User::edituser');
$routes->get('/user/editdatauser/(::any)', 'User::edidatauser');

$routes->get('/menu', 'Menu::index');
$routes->post('/menu', 'Menu::insertmenu');
$routes->get('/menu/tambah', 'Menu::tambahmenu');
$routes->post('/menu/edit', 'Menu::edit');
$routes->post('/menu/editdata/(::any)', 'Menu::editdata');

$routes->post('/menuorder', 'Order::insert');
$routes->get('/Order/orderbaru', 'Order::order');
$routes->post('/order/order', 'Order::insert');
$routes->post('/order/pesan/(::any)', 'Order::pesan');
$routes->post('/order/pesan', 'Order::insertpesan');
$routes->post('/order/hapus/(::any)', 'Order::hapus');
$routes->post('/order/pesanan/delete/(:num)', 'Order::hapusPesan/$1');

$routes->post('/transaksi', 'Transaksi::index');
$routes->post('/transaksi/tambah(:num)', 'Transaksi::tambah/$1');
$routes->post('/transaksi/insert', 'Transaksi::insert');

$routes->get('/detail transaksi', 'DetailTransaksi::index');
$routes->get('order', 'Order::index');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

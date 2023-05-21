<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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

// Routes Pertama Kali di Eksekusi
// Bisa diakses Tanpa Login
$routes->get('/', 'Pages\HomeController::index');
$routes->get('/about', 'Pages\AboutController::index');
$routes->get('/guest-keuangan', 'Pages\GuestKeuanganController::index');
$routes->get('/peminjaman', 'Pages\PeminjamanInventarisController::index');
$routes->post('/peminjaman/save', 'Pages\PeminjamanInventarisController::save', ['filter' => 'role:user']);
$routes->post('/peminjaman/save-masjid', 'Pages\PeminjamanInventarisController::save_masjid');



// Routes Admin Dashboard
$routes->get('dashboard', 'Admin\DashboardController::index', ['filter' => 'role:admin']);

// Routes Admin Data Pengurus
$routes->get('pengurus', 'Admin\PengurusController::index');
$routes->post('/pengurus/save', 'Admin\PengurusController::save');
$routes->get('/pengurus/tambah', 'Admin\PengurusController::create');
$routes->put('/pengurus/edit/(:segment)', 'Admin\PengurusController::update/$1');
$routes->delete('/pengurus/hapus/(:segment)', 'Admin\PengurusController::delete/$1');
$routes->get('/pengurus/detail/(:segment)', 'Admin\PengurusController::detail/$1');
$routes->get('/pengurus/edit/(:segment)', 'Admin\PengurusController::form_update/$1');

// Routes Admin Data Jabatan
$routes->get('jabatan', 'Admin\JabatanController::index');
$routes->post('/jabatan/save', 'Admin\JabatanController::save');
$routes->get('/jabatan/tambah', 'Admin\JabatanController::create');
$routes->put('/jabatan/edit/(:segment)', 'Admin\JabatanController::update/$1');
$routes->delete('/jabatan/hapus/(:segment)', 'Admin\JabatanController::delete/$1');
$routes->get('/jabatan/detail/(:segment)', 'Admin\JabatanController::detail/$1');
$routes->get('/jabatan/edit/(:segment)', 'Admin\JabatanController::form_update/$1');

// Routes Admin Data Inventaris
$routes->get('inventaris', 'Admin\InventarisController::index');
$routes->get('inventaris/tambah', 'Admin\InventarisController::create');
$routes->post('inventaris/save', 'Admin\InventarisController::save');
$routes->put('/inventaris/edit/(:segment)', 'Admin\InventarisController::update/$1');
$routes->delete('/inventaris/hapus/(:segment)', 'Admin\InventarisController::delete/$1');
$routes->get('/inventaris/detail/(:segment)', 'Admin\InventarisController::detail/$1');
$routes->get('/inventaris/edit/(:segment)', 'Admin\InventarisController::form_update/$1');




// Routes Bendahara Dashboard
$routes->get('bendahara', 'Bendahara\DashboardController::index');

// Routes Keuangan Bendahara
$routes->get('keuangan', 'Bendahara\KeuanganController::index', ['filter' => 'role:bendahara']);

// Routes Bendahara Pemasukan
$routes->get('pemasukan', 'Bendahara\PemasukanController::index', ['filter' => 'role:bendahara']);
$routes->get('keuangan/tambah-pemasukan', 'Bendahara\PemasukanController::create', ['filter' => 'role:bendahara']);
$routes->post('keuangan/pemasukan-save', 'Bendahara\PemasukanController::save');
$routes->put('/pemasukan/edit/(:segment)', 'Bendahara\PemasukanController::update/$1');
$routes->delete('/pemasukan/hapus/(:segment)', 'Bendahara\PemasukanController::delete/$1');
$routes->get('/pemasukan/detail/(:segment)', 'Bendahara\PemasukanController::detail/$1');
$routes->get('/pemasukan/edit/(:segment)', 'Bendahara\PemasukanController::form_update/$1');

// Routes Bendahara Pengeluaran
$routes->get('pengeluaran', 'Bendahara\PengeluaranController::index');
$routes->get('keuangan/tambah-pengeluaran', 'Bendahara\PengeluaranController::create');
$routes->post('keuangan/pengeluaran-save', 'Bendahara\PengeluaranController::save');
$routes->put('/pengeluaran/edit/(:segment)', 'Bendahara\PengeluaranController::update/$1');
$routes->delete('/pengeluaran/hapus/(:segment)', 'Bendahara\PengeluaranController::delete/$1');
$routes->get('/pengeluaran/detail/(:segment)', 'Bendahara\PengeluaranController::detail/$1');
$routes->get('/pengeluaran/edit/(:segment)', 'Bendahara\PengeluaranController::form_update/$1');




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

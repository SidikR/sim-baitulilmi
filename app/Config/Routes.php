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
$routes->get('/home', 'Pages\HomeController::index');
$routes->get('/about', 'Pages\AboutController::index');
$routes->get('/guest-keuangan', 'Pages\GuestKeuanganController::index');
$routes->get('/pengurus-guest', 'Pages\PengurusController::index');
$routes->get('/detail-pengurus-(:segment)', 'Pages\PengurusController::detail/$1');
$routes->get('/kegiatan-guest', 'Pages\KegiatanController::index');
$routes->get('/detail-kegiatan-(:segment)', 'Pages\KegiatanController::detail/$1');
$routes->get('/post-guest', 'Pages\PostController::index');
$routes->get('/detail/post-(:segment)', 'Pages\PostController::detail/$1');
$routes->post('comment/add/(:segment)', 'Pages\PostController::store/$1');
$routes->get('/peminjaman', 'Pages\PeminjamanInventarisController::index');
$routes->post('/send-feedback', 'Pages\AboutController::send_feedback');

$routes->post('/peminjaman/save', 'Pages\PeminjamanInventarisController::save', ['filter' => 'role:user']);
$routes->get('/akun', 'Pages\AkunController::index', ['filter' => 'role:user']);
$routes->put('/akun/(:segment)', 'Pages\AkunController::update/$1', ['filter' => 'role:user']);
$routes->put('/akun/foto/(:segment)', 'Pages\AkunController::update_foto/$1', ['filter' => 'role:user']);
$routes->post('peminjaman/batal/(:segment)', 'Pages\AkunController::batal/$1', ['filter' => 'role:user']);
$routes->post('peminjaman-masjid/batal/(:segment)', 'Pages\AkunController::batal_masjid/$1', ['filter' => 'role:user']);
$routes->post('/peminjaman/save-masjid', 'Pages\PeminjamanMasjidController::save_masjid', ['filter' => 'role:user']);




// Routes Admin Dashboard
$routes->get('dashboard', 'Admin\DashboardController::index', ['filter' => 'role:admin']);
$routes->get('users/index', 'Admin\UsersController::index', ['filter' => 'role:admin']);
$routes->post('users/activate', 'Admin\UsersController::activate', ['filter' => 'role:admin']);
$routes->get('users/changePassword/(:segment)', 'Admin\UsersController::changePassword/$1', ['filter' => 'role:admin']);
$routes->post('users/setPassword', 'Admin\UsersController::setPassword', ['filter' => 'role:admin']);
$routes->post('users/changeGroup', 'Admin\UsersController::changeGroup', ['filter' => 'role:admin']);

// Routes Admin Data Pengurus
$routes->get('pengurus', 'Admin\PengurusController::index', ['filter' => 'role:admin']);
$routes->post('/pengurus/save', 'Admin\PengurusController::save', ['filter' => 'role:admin']);
$routes->get('/pengurus/tambah', 'Admin\PengurusController::create', ['filter' => 'role:admin']);
$routes->put('/pengurus/edit/(:segment)', 'Admin\PengurusController::update/$1', ['filter' => 'role:admin']);
$routes->delete('/pengurus/hapus/(:segment)', 'Admin\PengurusController::delete/$1', ['filter' => 'role:admin']);
$routes->post('/pengurus/hapus-multiple', 'Admin\PengurusController::deleteMultiple', ['filter' => 'role:admin']);
$routes->get('/pengurus/detail/(:segment)', 'Admin\PengurusController::detail/$1', ['filter' => 'role:admin']);
$routes->get('/pengurus/edit/(:segment)', 'Admin\PengurusController::form_update/$1', ['filter' => 'role:admin']);
$routes->put('/pengurus/edit/foto/(:segment)', 'Admin\PengurusController::update_foto/$1', ['filter' => 'role:admin']);
$routes->post('pengurus-import', 'Admin\PengurusController::import', ['filter' => 'role:admin']);

$routes->get('petugas-jumat', 'Admin\PetugasJumatController::index', ['filter' => 'role:admin']);
$routes->post('/petugas-jumat/save', 'Admin\PetugasJumatController::save', ['filter' => 'role:admin']);
$routes->get('/petugas-jumat/tambah', 'Admin\PetugasJumatController::create', ['filter' => 'role:admin']);
$routes->put('/petugas-jumat/edit/(:segment)', 'Admin\PetugasJumatController::update/$1', ['filter' => 'role:admin']);
$routes->delete('/petugas-jumat/hapus/(:segment)', 'Admin\PetugasJumatController::delete/$1', ['filter' => 'role:admin']);
$routes->get('/petugas-jumat/detail/(:segment)', 'Admin\PetugasJumatController::detail/$1', ['filter' => 'role:admin']);
$routes->get('/petugas-jumat/edit/(:segment)', 'Admin\PetugasJumatController::form_update/$1', ['filter' => 'role:admin']);
$routes->put('/petugas-jumat/edit/foto/(:segment)', 'Admin\PetugasJumatController::update_foto/$1', ['filter' => 'role:admin']);

$routes->get('pengumuman', 'Admin\PengumumanController::index', ['filter' => 'role:admin']);
$routes->post('/pengumuman/save', 'Admin\PengumumanController::save', ['filter' => 'role:admin']);
$routes->get('/pengumuman/tambah', 'Admin\PengumumanController::create', ['filter' => 'role:admin']);
$routes->put('/pengumuman/edit/(:segment)', 'Admin\PengumumanController::update/$1', ['filter' => 'role:admin']);
$routes->delete('/pengumuman/hapus/(:segment)', 'Admin\PengumumanController::delete/$1', ['filter' => 'role:admin']);
$routes->get('/pengumuman/detail/(:segment)', 'Admin\PengumumanController::detail/$1', ['filter' => 'role:admin']);
$routes->get('/pengumuman/edit/(:segment)', 'Admin\PengumumanController::form_update/$1', ['filter' => 'role:admin']);

// Routes Admin Data Pengurus
$routes->get('kegiatan', 'Admin\KegiatanController::index', ['filter' => 'role:admin']);
$routes->post('/kegiatan/save', 'Admin\KegiatanController::save', ['filter' => 'role:admin']);
$routes->get('/kegiatan/tambah', 'Admin\KegiatanController::create', ['filter' => 'role:admin']);
$routes->put('/kegiatan/edit/(:segment)', 'Admin\KegiatanController::update/$1', ['filter' => 'role:admin']);
$routes->delete('/kegiatan/hapus/(:segment)', 'Admin\KegiatanController::delete/$1', ['filter' => 'role:admin']);
$routes->get('/kegiatan/detail/(:segment)', 'Admin\KegiatanController::detail/$1', ['filter' => 'role:admin']);
$routes->get('/kegiatan/edit/(:segment)', 'Admin\KegiatanController::form_update/$1', ['filter' => 'role:admin']);
$routes->put('/kegiatan/edit/foto/(:segment)', 'Admin\KegiatanController::update_foto/$1', ['filter' => 'role:admin']);


$routes->get('program', 'Admin\ProgramController::index', ['filter' => 'role:admin']);
$routes->post('/program/save', 'Admin\ProgramController::save', ['filter' => 'role:admin']);
$routes->get('/program/tambah', 'Admin\ProgramController::create', ['filter' => 'role:admin']);
$routes->put('/program/edit/(:segment)', 'Admin\ProgramController::update/$1', ['filter' => 'role:admin']);
$routes->delete('/program/hapus/(:segment)', 'Admin\ProgramController::delete/$1', ['filter' => 'role:admin']);
$routes->get('/program/detail/(:segment)', 'Admin\ProgramController::detail/$1', ['filter' => 'role:admin']);
$routes->get('/program/edit/(:segment)', 'Admin\ProgramController::form_update/$1', ['filter' => 'role:admin']);
$routes->put('/program/edit/foto/(:segment)', 'Admin\ProgramController::update_foto/$1', ['filter' => 'role:admin']);

// Routes Admin Data Pengurus
$routes->get('post', 'Admin\PostController::index', ['filter' => 'role:admin']);
$routes->post('/post/save', 'Admin\PostController::save', ['filter' => 'role:admin']);
$routes->get('/post/tambah', 'Admin\PostController::create', ['filter' => 'role:admin']);
$routes->put('/post/edit/(:segment)', 'Admin\PostController::update/$1', ['filter' => 'role:admin']);
$routes->delete('/post/hapus/(:segment)', 'Admin\PostController::delete/$1', ['filter' => 'role:admin']);
$routes->get('/post/detail/(:segment)', 'Admin\PostController::detail/$1', ['filter' => 'role:admin']);
$routes->get('/post/edit/(:segment)', 'Admin\PostController::form_update/$1', ['filter' => 'role:admin']);
$routes->put('/post/edit/foto/(:segment)', 'Admin\PostController::update_foto/$1', ['filter' => 'role:admin']);

// Routes Admin Data Inventaris
$routes->get('inventaris', 'Admin\InventarisController::index', ['filter' => 'role:admin']);
$routes->get('inventaris/tambah', 'Admin\InventarisController::create', ['filter' => 'role:admin']);
$routes->post('inventaris/save', 'Admin\InventarisController::save', ['filter' => 'role:admin']);
$routes->put('/inventaris/edit/(:segment)', 'Admin\InventarisController::update/$1', ['filter' => 'role:admin']);
$routes->put('/inventaris/edit/foto/(:segment)', 'Admin\InventarisController::update_foto/$1', ['filter' => 'role:admin']);
$routes->delete('/inventaris/hapus/(:segment)', 'Admin\InventarisController::delete/$1', ['filter' => 'role:admin']);
$routes->get('/inventaris/detail/(:segment)', 'Admin\InventarisController::detail/$1', ['filter' => 'role:admin']);
$routes->get('/inventaris/edit/(:segment)', 'Admin\InventarisController::form_update/$1', ['filter' => 'role:admin']);

// Feddback
$routes->get('feedback', 'Admin\FeedbackController::index', ['filter' => 'role:admin']);

$routes->get('list-peminjaman', 'Admin\PeminjamanController::index', ['filter' => 'role:admin']);
$routes->get('list-peminjaman-ok/(:segment)', 'Admin\PeminjamanController::accept/$1', ['filter' => 'role:admin']);
$routes->get('list-peminjaman-done/(:segment)', 'Admin\PeminjamanController::done/$1', ['filter' => 'role:admin']);
$routes->get('list-peminjaman-infaq-ok/(:segment)', 'Admin\PeminjamanController::infaqok/$1', ['filter' => 'role:admin']);
$routes->post('list-peminjaman-no/(:segment)', 'Admin\PeminjamanController::no/$1', ['filter' => 'role:admin']);
$routes->post('peminjaman-inventaris-bukti-transfer/(:segment)', 'Admin\PeminjamanController::infaqok/$1', ['filter' => 'role:admin']);


$routes->get('peminjaman-masjid', 'Admin\PeminjamanMasjidController::index', ['filter' => 'role:admin']);
$routes->get('peminjaman-masjid-ok/(:segment)', 'Admin\PeminjamanMasjidController::accept/$1', ['filter' => 'role:admin']);
$routes->get('peminjaman-masjid-done/(:segment)', 'Admin\PeminjamanMasjidController::done/$1', ['filter' => 'role:admin']);
$routes->get('peminjaman-masjid-infaq-ok/(:segment)', 'Admin\PeminjamanMasjidController::infaqok/$1', ['filter' => 'role:admin']);
$routes->post('peminjaman-masjid-no/(:segment)', 'Admin\PeminjamanMasjidController::no/$1', ['filter' => 'role:admin']);
$routes->post('peminjaman-masjid-bukti-transfer/(:segment)', 'Admin\PeminjamanMasjidController::infaqok/$1', ['filter' => 'role:admin']);

$routes->get('invoice-peminjaman-masjid/(:segment)', 'Pages\PeminjamanMasjidController::index_transfer/$1');
$routes->put('invoice-peminjaman-masjid/bukti-transfer/(:segment)', 'Pages\PeminjamanMasjidController::bukti_transfer/$1');
$routes->get('invoice-peminjaman-inventaris/(:segment)', 'Pages\PeminjamanInventarisController::index_transfer/$1');
$routes->put('invoice-peminjaman-inventaris/bukti-transfer/(:segment)', 'Pages\PeminjamanInventarisController::bukti_transfer/$1');



// Routes Bendahara Dashboard
$routes->get('bendahara', 'Bendahara\DashboardController::index');

// Routes Keuangan Bendahara
$routes->get('keuangan', 'Bendahara\KeuanganController::index', ['filter' => 'role:bendahara']);
$routes->post('keuangan-import', 'Bendahara\KeuanganController::import', ['filter' => 'role:bendahara']);

// Routes Bendahara Pemasukan
$routes->get('pemasukan', 'Bendahara\PemasukanController::index', ['filter' => 'role:bendahara']);
$routes->get('keuangan/tambah-pemasukan', 'Bendahara\PemasukanController::create', ['filter' => 'role:bendahara']);
$routes->post('keuangan/pemasukan-save', 'Bendahara\PemasukanController::save', ['filter' => 'role:bendahara']);
$routes->put('/pemasukan/edit/(:segment)', 'Bendahara\PemasukanController::update/$1', ['filter' => 'role:bendahara']);
$routes->delete('/keuangan/hapus/(:segment)', 'Bendahara\PemasukanController::delete/$1', ['filter' => 'role:bendahara']);
$routes->get('/pemasukan/detail/(:segment)', 'Bendahara\PemasukanController::detail/$1', ['filter' => 'role:bendahara']);
$routes->get('/pemasukan/edit/(:segment)', 'Bendahara\PemasukanController::form_update/$1', ['filter' => 'role:bendahara']);

// Routes Bendahara Pengeluaran
$routes->get('pengeluaran', 'Bendahara\PengeluaranController::index', ['filter' => 'role:bendahara']);
$routes->get('keuangan/tambah-pengeluaran', 'Bendahara\PengeluaranController::create', ['filter' => 'role:bendahara']);
$routes->post('keuangan/pengeluaran-save', 'Bendahara\PengeluaranController::save', ['filter' => 'role:bendahara']);
$routes->put('/pengeluaran/edit/(:segment)', 'Bendahara\PengeluaranController::update/$1', ['filter' => 'role:bendahara']);
$routes->delete('/pengeluaran/hapus/(:segment)', 'Bendahara\PengeluaranController::delete/$1', ['filter' => 'role:bendahara']);
$routes->get('/pengeluaran/detail/(:segment)', 'Bendahara\PengeluaranController::detail/$1', ['filter' => 'role:bendahara']);
$routes->get('/pengeluaran/edit/(:segment)', 'Bendahara\PengeluaranController::form_update/$1', ['filter' => 'role:bendahara']);
$routes->put('/pengeluaran/edit/foto/(:segment)', 'Bendahara\PengeluaranController::update_foto/$1', ['filter' => 'role:bendahara']);




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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['masuk']['POST'] = 'AuthController/masuk';

// ADMIN
$route['admin']['GET'] = 'AdminController';
$route['admin/profil']['GET'] = 'AdminController/profil';
$route['admin/pengaturan']['GET'] = 'AdminController/pengaturan';
$route['admin/keluar']['GET'] = 'AdminController/keluar';

$route['admin/daftar_peserta']['GET'] = 'AdminController/daftar_peserta';
$route['admin/daftar_paket']['GET'] = 'AdminController/daftar_paket';
$route['admin/daftar_metode']['GET'] = 'AdminController/daftar_metode';
$route['admin/daftar_jemput']['GET'] = 'AdminController/daftar_jemput';
$route['admin/daftar_transaksi']['GET'] = 'AdminController/daftar_transaksi';
$route['admin/laporan_bulanan']['GET'] = 'AdminController/laporan_bulanan';

// METODE
$route['metode/tambah']['GET'] = 'MetodeController/index';
$route['metode/tambah']['POST'] = 'MetodeController/tambah';
$route['metode/ubah/(:any)']['GET'] = 'MetodeController/ubah/$1';
$route['metode/ubah']['POST'] = 'MetodeController/f_ubah';

// PAKET
$route['paket/tambah']['GET'] = 'PaketController/index';
$route['paket/tambah']['POST'] = 'PaketController/tambah';
$route['paket/ubah/(:any)']['GET'] = 'PaketController/ubah/$1';
$route['paket/ubah']['POST'] = 'PaketController/f_ubah';

// PENJEMPUTAN
$route['jemput/tambah']['GET'] = 'JemputController/index';
$route['jemput/tambah']['POST'] = 'JemputController/tambah';
$route['jemput/ubah/(:any)']['GET'] = 'JemputController/ubah/$1';
$route['jemput/ubah']['POST'] = 'JemputController/f_ubah';

// TRANSAKSI/PENDAFTARAN
$route['pendaftaran/verifikasi/(:any)']['POST'] = 'PendaftaranController/verifikasi/$1';
$route['pendaftaran/batalkan']['POST'] = 'PendaftaranController/batalkan';

// API
$route['api/dataadmin']['POST'] = 'ApiController/ambilDataAdmin';
$route['api/datapeserta']['POST'] = 'ApiController/ambilDataPeserta';
$route['api/datapaket']['POST'] = 'ApiController/ambilDataPaket';
$route['api/datametode']['POST'] = 'ApiController/ambilDataMetode';
$route['api/datajemput']['POST'] = 'ApiController/ambilDataJemput';
$route['api/datapendaftaran']['POST'] = 'ApiController/ambilDataPendaftaran';
$route['api/datapendaftaran/detail']['POST'] = 'ApiController/ambilDataPendaftaranDetail';

// EXPORT
$route['api/export/bulanan']['POST'] = 'ApiController/ambilLaporanBulanan';

// UPLOAD
$route['api/upload_sc_sim']['POST'] = 'ApiController/upload_sc_sim';
$route['api/upload_sc_ktp']['POST'] = 'ApiController/upload_sc_ktp';
$route['api/upload_sc_bukti']['POST'] = 'ApiController/upload_sc_bukti';

// $route['api/proses_pendaftaran']['POST'] = 'ApiController/pendaftaran';
$route['api/proses_pendaftaran'] = 'ApiController/pendaftaran';
$route['api/daftarakun']['POST'] = 'ApiController/daftar_akun';
$route['api/cetak/invoice/(:any)']['GET'] = 'ApiController/invoice/$1';

// TESTING ROUTE
$route['api/cek_id_tambah']['GET'] = 'ApiController/cek_id_tambah';

$route['default_controller'] = 'AuthController';
$route['404_override'] = 'ErrController/index';
$route['translate_uri_dashes'] = FALSE;
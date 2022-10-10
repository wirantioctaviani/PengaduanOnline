<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('FormPengaduan');
});

Route::get('/FormPengaduan', function () {
    return view('FormPengaduan');
});

// USER
Route::get('FormPengaduan', 'App\Http\Controllers\PengaduanController@FormPengaduan');
Route::post('CreatePengaduan', 'App\Http\Controllers\PengaduanController@CreatePengaduan');
Route::get('user/tracking', 'App\Http\Controllers\PengaduanController@tracking');

// Route::group(['middleware' => ['auth:admin', 'revalidate']], function(){
// 		// ADMIN
// 	Route::prefix('admin')->middleware('role:1')->group(function () {
// 		Route::get('/', 'App\Http\Controllers\AdminController@HomeAdmin');
// 		Route::get('HomeAdmin', 'App\Http\Controllers\AdminController@HomeAdmin');
// 		Route::get('PengaduanBaru', 'App\Http\Controllers\AdminController@PengaduanBaru');
// 		Route::post('EditKategori', 'App\Http\Controllers\AdminController@EditKategori');
// 		Route::get('PengaduanDitindaklanjuti', 'App\Http\Controllers\AdminController@PengaduanDitindaklanjuti');
// 		Route::get('ProsesPengaduan/{id_pengaduan}', 'App\Http\Controllers\AdminController@ProsesPengaduan');
// 		Route::post('FinalAnswer', 'App\Http\Controllers\AdminController@FinalAnswer');
// 		Route::get('PengaduanView/{id_pengaduan}', 'App\Http\Controllers\AdminController@PengaduanView');
// 		Route::get('PengaduanDetail/{id_pengaduan}', 'App\Http\Controllers\AdminController@PengaduanDetail');
// 		Route::get('PengaduanDiproses', 'App\Http\Controllers\AdminController@PengaduanDiproses');
// 		Route::get('PengaduanSelesai', 'App\Http\Controllers\AdminController@PengaduanSelesai');
// 		Route::get('PengaduanDitolak', 'App\Http\Controllers\PengaduanController@PengaduanDitolak');
// 		Route::get('ManageUser', 'App\Http\Controllers\AdminController@ManageUser');
// 		Route::post('AddUser', 'App\Http\Controllers\AdminController@AddUser');
// 		Route::post('EditUser', 'App\Http\Controllers\AdminController@EditUser');
// 		Route::post('CloseTiket', 'App\Http\Controllers\AdminController@CloseTiket');
// 	});
// 	});

Route::group(['middleware' => ['islogin', 'revalidate']], function(){
		// ADMIN
	Route::prefix('admin')->middleware('role:1')->group(function () {
		Route::get('/', 'App\Http\Controllers\AdminController@HomeAdmin');
		Route::get('HomeAdmin', 'App\Http\Controllers\AdminController@HomeAdmin');
		Route::get('PengaduanBaru', 'App\Http\Controllers\AdminController@PengaduanBaru');
		Route::post('EditKategori', 'App\Http\Controllers\AdminController@EditKategori');
		Route::get('PengaduanDitindaklanjuti', 'App\Http\Controllers\AdminController@PengaduanDitindaklanjuti');
		Route::get('ProsesPengaduan/{id_pengaduan}', 'App\Http\Controllers\AdminController@ProsesPengaduan');
		Route::post('FinalAnswer', 'App\Http\Controllers\AdminController@FinalAnswer');
		Route::get('PengaduanView/{id_pengaduan}', 'App\Http\Controllers\AdminController@PengaduanView');
		Route::get('PengaduanDetail/{id_pengaduan}', 'App\Http\Controllers\AdminController@PengaduanDetail');
		Route::get('PengaduanDiproses', 'App\Http\Controllers\AdminController@PengaduanDiproses');
		Route::get('PengaduanSelesai', 'App\Http\Controllers\AdminController@PengaduanSelesai');
		Route::get('PengaduanDitolak', 'App\Http\Controllers\PengaduanController@PengaduanDitolak');
		Route::get('ManageUser', 'App\Http\Controllers\AdminController@ManageUser');
		Route::get('ManageAdmin', 'App\Http\Controllers\AdminController@ManageAdmin');
		Route::post('AddUser', 'App\Http\Controllers\AdminController@AddUser');
		Route::post('EditUser', 'App\Http\Controllers\AdminController@EditUser');
		Route::post('CloseTiket', 'App\Http\Controllers\AdminController@CloseTiket');
		Route::post('AddAdmin', 'App\Http\Controllers\AdminController@AddAdmin');
		Route::post('AddAdmin2', 'App\Http\Controllers\AdminController@AddAdmin2');
		Route::post('EditAdmin', 'App\Http\Controllers\AdminController@EditAdmin');
	});

	Route::prefix('kapus')->middleware('role:5')->group(function () {
		// KOORDINATOR
		Route::get('/', 'App\Http\Controllers\KapusController@HomeKapus');
		Route::get('HomeKapus', 'App\Http\Controllers\KapusController@HomeKapus');
		Route::get('PengaduanNew', 'App\Http\Controllers\KapusController@PengaduanBaru');
		Route::post('PilihKoor', 'App\Http\Controllers\KapusController@PilihKoor');
		Route::get('PengaduanDitindaklanjuti', 'App\Http\Controllers\KapusController@PengaduanDitindaklanjuti');
		Route::get('ProsesPengaduan/{id_pengaduan}', 'App\Http\Controllers\KapusController@ProsesPengaduan');
		Route::post('AddTindaklanjut', 'App\Http\Controllers\KapusController@AddTindaklanjut');
		Route::get('PengaduanDiproses', 'App\Http\Controllers\KapusController@PengaduanDiproses');
		Route::get('PengaduanView/{id}', 'App\Http\Controllers\KapusController@PengaduanView');
		Route::get('PengaduanSelesai', 'App\Http\Controllers\KapusController@PengaduanSelesai');
		Route::get('PengaduanDetail/{id}', 'App\Http\Controllers\KapusController@PengaduanDetail');
	});

	Route::prefix('koor')->middleware('role:2')->group(function () {
		// KOORDINATOR
		Route::get('/', 'App\Http\Controllers\KoorController@HomeKoor');
		Route::get('HomeKoor', 'App\Http\Controllers\KoorController@HomeKoor');
		Route::get('PengaduanNew', 'App\Http\Controllers\KoorController@PengaduanBaru');
		Route::get('pick/{id_pengaduan}', 'App\Http\Controllers\KoorController@pick');
		Route::post('PilihSubkoor', 'App\Http\Controllers\KoorController@PilihSubkoor');
		Route::get('PengaduanDiproses', 'App\Http\Controllers\KoorController@PengaduanDiproses');
		Route::get('PengaduanDitindaklanjuti', 'App\Http\Controllers\KoorController@PengaduanDitindaklanjuti');
		Route::get('ProsesPengaduan/{id_pengaduan}', 'App\Http\Controllers\KoorController@ProsesPengaduan');
		Route::post('AddTindaklanjut', 'App\Http\Controllers\KoorController@AddTindaklanjut');
		Route::get('PengaduanView/{id_pengaduan}', 'App\Http\Controllers\KoorController@PengaduanView');
		Route::get('PengaduanDetail/{mstr_pengaduan_id}', 'App\Http\Controllers\KoorController@PengaduanDetail');
		Route::get('PengaduanSelesai', 'App\Http\Controllers\KoorController@PengaduanSelesai');
	});

	Route::prefix('subkoor')->middleware('role:3')->group(function () {
		// KOORDINATOR
		Route::get('/', 'App\Http\Controllers\SubkoorController@HomeSubkoor');
		Route::get('HomeSubkoor', 'App\Http\Controllers\SubkoorController@HomeSubkoor');
		Route::get('PengaduanNew', 'App\Http\Controllers\SubkoorController@PengaduanBaru');
		Route::get('pick/{id_pengaduan}', 'App\Http\Controllers\SubkoorController@pick');
		Route::post('PilihPIC', 'App\Http\Controllers\SubkoorController@PilihPIC');
		Route::get('PengaduanDitindaklanjuti', 'App\Http\Controllers\SubkoorController@PengaduanDitindaklanjuti');
		Route::get('ProsesPengaduan/{id_pengaduan}', 'App\Http\Controllers\SubkoorController@ProsesPengaduan');
		Route::post('AddTindaklanjut', 'App\Http\Controllers\SubkoorController@AddTindaklanjut');
		Route::get('PengaduanDiproses', 'App\Http\Controllers\SubkoorController@PengaduanDiproses');
		Route::get('PengaduanView/{id_pengaduan}', 'App\Http\Controllers\SubkoorController@PengaduanView');
		Route::get('PengaduanDetail/{mstr_pengaduan_id}', 'App\Http\Controllers\SubkoorController@PengaduanDetail');
		Route::get('PengaduanSelesai', 'App\Http\Controllers\SubkoorController@PengaduanSelesai');
		// Route::post('FinalAnswer', 'App\Http\Controllers\SubkoorController@FinalAnswer');
	});

	Route::prefix('pic')->middleware('role:4')->group(function () {
		// PIC
		Route::get('/', 'App\Http\Controllers\PicController@HomePic');
		Route::get('HomePic', 'App\Http\Controllers\PicController@HomePic');
		Route::get('PengaduanDitl', 'App\Http\Controllers\PicController@PengaduanDiprosess');
		Route::get('ProsesPengaduan/{id_pengaduan}', 'App\Http\Controllers\PicController@ProsesPengaduan');
		Route::post('AddTindaklanjut', 'App\Http\Controllers\PicController@AddTindaklanjut');
		Route::post('FinalAnswer', 'App\Http\Controllers\PicController@FinalAnswer');
		Route::get('PengaduanDiproses', 'App\Http\Controllers\PicController@PengaduanDiproses');
		Route::get('PengaduanView/{id_pengaduan}', 'App\Http\Controllers\PicController@PengaduanView');
		Route::get('PengaduanSelesai', 'App\Http\Controllers\PicController@PengaduanSelesai');
		Route::get('PengaduanDetail/{mstr_pengaduan_id}', 'App\Http\Controllers\PicController@PengaduanDetail');
	});
});


Route::get('webmin', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('login/process', 'App\Http\Controllers\LoginController@otentikasi');
Route::get('webmin/logout', 'App\Http\Controllers\LoginController@logout');

Route::get('webadmin', 'App\Http\Controllers\LoginAdminController@index')->name('login');
Route::post('loginadmin/process', 'App\Http\Controllers\LoginAdminController@otentikasi');
Route::get('webadmin/logoutadmin', 'App\Http\Controllers\LoginAdminController@logout');
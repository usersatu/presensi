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



Route::middleware(['guest:karyawan'])->group(function (){
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    
    Route::post('/prosesLogin',[App\Http\Controllers\AuthController::class , 'prosesLogin']);
});

Route::middleware(['guest:user'])->group(function (){
    Route::get('/panel', function () {
        return view('auth.loginadmin');
    })->name('loginadmin');
    
    Route::post('/prosesLoginadmin',[App\Http\Controllers\AuthController::class , 'prosesLoginadmin']);
});

    Route::middleware(['auth:karyawan'])->group(function (){
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/prosesLogout', [App\Http\Controllers\AuthController::class, 'prosesLogout']);

    //presensi
    Route::get('/presensi/create', [App\Http\Controllers\PresensiController ::class, 'create']);
    Route::post('/presensi/store', [App\Http\Controllers\PresensiController ::class, 'store']);

    //Edit Profile
    Route::get('/editprofile', [App\Http\Controllers\PresensiController ::class, 'editprofile']);
    Route::post('/presensi/{nik}/updateprofile', [App\Http\Controllers\PresensiController ::class, 'updateprofile']);

    //histori
    Route::get('/presensi/histori', [App\Http\Controllers\PresensiController ::class, 'histori']);
    Route::post('/gethistori', [App\Http\Controllers\PresensiController ::class, 'gethistori']);

    //izin
    Route::get('/presensi/izin', [App\Http\Controllers\PresensiController ::class, 'izin']);
    Route::get('/presensi/buatizin', [App\Http\Controllers\PresensiController ::class, 'buatizin']);
    Route::post('/presensi/storeizin', [App\Http\Controllers\PresensiController ::class, 'storeizin']);
    Route::post('/presensi/cekpengajuanizin', [App\Http\Controllers\PresensiController ::class, 'cekpengajuanizin']);
});

    Route::middleware(['auth:user'])->group(function (){
    Route::get('/prosesLogoutadmin', [App\Http\Controllers\AuthController::class, 'prosesLogoutadmin']);
    Route::get('/panel/dashboardadmin', [App\Http\Controllers\DashboardController::class, 'dashboardadmin']);

    //Karyawan
    Route::get('/karyawan', [App\Http\Controllers\KaryawanController::class, 'index']);
    Route::post('/karyawan/store', [App\Http\Controllers\KaryawanController::class, 'store']);
    Route::post('/karyawan/edit', [App\Http\Controllers\KaryawanController::class, 'edit']);
    Route::post('/karyawan/{nik}/update', [App\Http\Controllers\KaryawanController::class, 'update']);
    Route::post('/karyawan/{nik}/delete', [App\Http\Controllers\KaryawanController::class, 'delete']);

    //Departemen
    Route::get('/departemen', [App\Http\Controllers\DepartemenController::class, 'index']);
    Route::post('/departemen/store', [App\Http\Controllers\DepartemenController::class, 'store']);
    Route::post('/departemen/edit', [App\Http\Controllers\DepartemenController::class, 'edit']);
    Route::post('/departemen/{kode_dept}/update', [App\Http\Controllers\DepartemenController::class, 'update']);
    Route::post('/departemen/{kode_dept}/delete', [App\Http\Controllers\DepartemenController::class, 'delete']);


    //presensi
    Route::get('/presensi/monitoring', [App\Http\Controllers\PresensiController ::class, 'monitoring']);
    Route::post('/getpresensi', [App\Http\Controllers\PresensiController ::class, 'getpresensi']);
    Route::post('/tampilkanpeta', [App\Http\Controllers\PresensiController ::class, 'tampilkanpeta']);
    Route::get('/presensi/laporan', [App\Http\Controllers\PresensiController ::class, 'laporan']);
    Route::post('/presensi/cetaklaporan', [App\Http\Controllers\PresensiController ::class, 'cetaklaporan']);
    Route::get('/presensi/rekap', [App\Http\Controllers\PresensiController ::class, 'rekap']);
    Route::post('/presensi/cetakrekap', [App\Http\Controllers\PresensiController ::class, 'cetakrekap']);
    Route::get('/presensi/izinsakit', [App\Http\Controllers\PresensiController ::class, 'izinsakit']);
    Route::post('/presensi/approvedizinsakit', [App\Http\Controllers\PresensiController ::class, 'approvedizinsakit']);
    Route::get('/presensi/{id}/batalkanizinsakit', [App\Http\Controllers\PresensiController ::class, 'batalkanizinsakit']);
    


    //konfigurasi
    Route::get('/konfigurasi/lokasikantor', [App\Http\Controllers\KonfigurasiController ::class, 'lokasikantor']);
    Route::post('/konfigurasi/updatelokasi', [App\Http\Controllers\KonfigurasiController ::class, 'updatelokasi']);

});




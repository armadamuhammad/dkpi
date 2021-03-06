<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdlnController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/pdln', [HomeController::class, 'pdln']);
Route::get('/mitra', [HomeController::class, 'mitra']);
Route::get('/layanan', [HomeController::class, 'layanan']);


Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/mitra', MitraController::class);
Route::resource('/pdln', PdlnController::class);

// Route::resource('mahasiswa', MahasiswaController::class);
// Route::resource('Dosen', DosenController::class);
// Route::resource('pimpinan', PimpinanController::class);
// Route::resource('sekolah', SekolahController::class);
// Route::resource('cv', CVController::class);
// Route::resource('yayasan', YayasanController::class);
// Route::resource('jasaKeuangan', JasaKeuanganController::class);

// Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
// Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
// Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
// Route::get('/mahasiswa/show{mahasiswa}', [MahasiswaController::class, 'show']);
// Route::get('/mahasiswa/edit{mahasiswa}', [MahasiswaController::class, 'edit']);
// Route::put('/mahasiswa/update{mahasiswa}', [MahasiswaController::class, 'update']);
// Route::get('/mahasiswa/destroy{mahasiswa}', [MahasiswaController::class, 'destroy']);

// Route::get('/dosen', [DosenController::class, 'index']);
// Route::get('/dosen/create', [DosenController::class, 'create']);
// Route::post('/dosen/store', [DosenController::class, 'store']);
// Route::get('/dosen/show{dosen}', [DosenController::class, 'show']);
// Route::get('/dosen/edit{dosen}', [DosenController::class, 'edit']);
// Route::put('/dosen/update{dosen}', [DosenController::class, 'update']);
// Route::get('/dosen/destroy{dosen}', [DosenController::class, 'destroy']);

// Route::get('/pimpinan', [PimpinanController::class, 'index']);
// Route::get('/pimpinan/create', [PimpinanController::class, 'create']);
// Route::post('/pimpinan/store', [PimpinanController::class, 'store']);
// Route::get('/pimpinan/show{pimpinan}', [PimpinanController::class, 'show']);
// Route::get('/pimpinan/edit{pimpinan}', [PimpinanController::class, 'edit']);
// Route::put('/pimpinan/update{pimpinan}', [PimpinanController::class, 'update']);
// Route::get('/pimpinan/destroy{pimpinan}', [PimpinanController::class, 'destroy']);






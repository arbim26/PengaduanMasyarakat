<?php

use Illuminate\Support\Facades\Auth;

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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::resource('user', UserController::class);

Route::get('/riwayat',[UserController::class,'riwayat'])->name('riwayat')->middleware('auth:web');
Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::get('/register',[RegisterController::class,'showUserLoginForm'])->name('register');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/login',[LoginController::class,'adminLogin'])->name('admin.login');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard',function(){ return view('admin.admin'); })->middleware('auth:admin');
Route::resource('pengaduan', PengaduanController::class)->middleware('auth:admin');
Route::put('/verifikasi/{id}', [PengaduanController::class, 'verifikasi'])->middleware('auth:admin');
Route::put('/tanggapan/{id}', [PengaduanController::class, 'tanggapan'])->middleware('auth:admin');
?>
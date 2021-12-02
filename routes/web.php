<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardProfilController;
use App\Http\Controllers\DashboardPemohonController;
use App\Http\Controllers\DashboardPengajuanController;

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
    return view('index',[
        'title'=>'Halaman Utama'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');
Route::resource('/dashboard/profil', DashboardProfilController::class)->middleware('auth');
Route::get('/dashboard/pengajuan', [DashboardPengajuanController::class,'index'])->middleware('auth');
Route::resource('/dashboard/listPemohon', DashboardPemohonController::class)->middleware('admin');
Route::resource('/dashboard/dataAdmin', DashboardAdminController::class)->middleware('admin');

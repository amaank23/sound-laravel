<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\DashboardController;
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
    return view('welcome');
});

Route::get('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => ['adminAuth']], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/audio', [AudioController::class, 'index'])->name('admin.audio');
    Route::get('/admin/audio/add', [AudioController::class, 'create'])->name('admin.create');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

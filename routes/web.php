<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\VideoController;
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
    // Audio Routes
    Route::get('/admin/audio', [AudioController::class, 'index'])->name('admin.audio');
    Route::get('/admin/audio/add', [AudioController::class, 'create'])->name('admin.audio.create');
    Route::post('/admin/audio', [AudioController::class, 'store'])->name('admin.audio.add');
    Route::delete('/admin/audio/{id}', [AudioController::class, 'destroy'])->name('admin.audio.destroy');

    //Video Routes
    Route::get('/admin/video', [VideoController::class, 'index'])->name('admin.video');
    Route::get('/admin/video/add', [VideoController::class, 'create'])->name('admin.video.create');
    Route::post('/admin/video', [VideoController::class, 'store'])->name('admin.video.add');
    Route::delete('/admin/video/{id}', [VideoController::class, 'destroy'])->name('admin.video.destroy');

    //Artist Routes
    Route::get('/admin/artist', [ArtistController::class, 'index'])->name('admin.artist');
    Route::get('/admin/artist/add', [ArtistController::class, 'create'])->name('admin.artist.create');
    Route::post('/admin/artist', [ArtistController::class, 'store'])->name('admin.artist.add');
    Route::get('/admin/artist/{id}', [ArtistController::class, 'destroy'])->name('admin.artist.destroy');

    //Album Routes
    Route::get('/admin/album', [AlbumController::class, 'index'])->name('admin.album');
    Route::get('/admin/album/add', [AlbumController::class, 'create'])->name('admin.album.create');
    Route::post('/admin/album', [AlbumController::class, 'store'])->name('admin.album.add');
    Route::get('/admin/album/{id}', [AlbumController::class, 'destroy'])->name('admin.album.destroy');

    //Genre Routes
    Route::get('/admin/genre', [GenreController::class, 'index'])->name('admin.genre');
    Route::get('/admin/genre/add', [GenreController::class, 'create'])->name('admin.genre.create');
    Route::post('/admin/genre', [GenreController::class, 'store'])->name('admin.genre.add');
    Route::get('/admin/genre/{id}', [GenreController::class, 'destroy'])->name('admin.genre.destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// File Serving Route
Route::get('/file/{name}', [FileController::class, 'index'])->name('file.get');

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Models\Language;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


Route::get('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['verified', 'auth']], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/audio/{id}/play', [AudioController::class, 'play'])->name('audio.play');
    Route::get('/audio/{id}', [AudioController::class, 'single'])->name('audio.single.get');
    Route::get('/video/{id}/play', [VideoController::class, 'play'])->name('video.play');
    Route::get('/video/{id}', [VideoController::class, 'single'])->name('video.single.get');
    Route::get('/audio', [HomeController::class, 'audio'])->name('audio.get');
    Route::get('/video', [HomeController::class, 'video'])->name('video.get');
    Route::get('/artist', [HomeController::class, 'artist'])->name('artist.get');
    Route::get('/genre', [HomeController::class, 'genre'])->name('genre.get');
    Route::get('/album', [HomeController::class, 'album'])->name('album.get');
    Route::get('/language', [HomeController::class, 'language'])->name('language.get');
    Route::get('/language/{id}', [LanguageController::class, 'language'])->name('language.get.single');
    Route::get('/artist/{id}', [ArtistController::class, 'artist'])->name('artist.get.single');
    Route::get('/genre/{id}', [GenreController::class, 'genre'])->name('genre.get.single');
    Route::get('/album/{id}', [AlbumController::class, 'album'])->name('album.get.single');
    Route::post('/audio/review/{id}', [ReviewController::class, 'audio'])->name('audio.review.store');
    Route::post('/video/review/{id}', [ReviewController::class, 'video'])->name('video.review.store');
    // Route::post('/playlist', [PlaylistController::class, 'store'])->name('playlist.store');
    // Route::get('/playlists', [HomeController::class, 'playlists'])->name('playlists.get');
    // Route::get('/ajax/playlists', [PlaylistController::class, 'index']);
    Route::get('/search', [HomeController::class, 'search'])->name('song.search');
});

Route::group(['middleware' => ['adminAuth']], function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    // Audio Routes
    Route::get('/admin/audio', [AudioController::class, 'index'])->name('admin.audio');
    Route::get('/admin/audio/add', [AudioController::class, 'create'])->name('admin.audio.create');
    Route::post('/admin/audio', [AudioController::class, 'store'])->name('admin.audio.add');
    Route::delete('/admin/audio/{id}', [AudioController::class, 'destroy'])->name('admin.audio.destroy');
    Route::get('/admin/audio/{id}', [AudioController::class, 'edit'])->name('admin.audio.edit');
    Route::put('/admin/audio/{id}', [AudioController::class, 'update'])->name('admin.audio.update');

    //Video Routes
    Route::get('/admin/video', [VideoController::class, 'index'])->name('admin.video');
    Route::get('/admin/video/add', [VideoController::class, 'create'])->name('admin.video.create');
    Route::post('/admin/video', [VideoController::class, 'store'])->name('admin.video.add');
    Route::delete('/admin/video/{id}', [VideoController::class, 'destroy'])->name('admin.video.destroy');
    Route::get('/admin/video/{id}', [VideoController::class, 'edit'])->name('admin.video.edit');
    Route::put('/admin/video/{id}', [VideoController::class, 'update'])->name('admin.video.update');

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

    //Language Routes
    Route::get('/admin/language', [LanguageController::class, 'index'])->name('admin.language');
    Route::get('/admin/language/add', [LanguageController::class, 'create'])->name('admin.language.create');
    Route::post('/admin/language', [LanguageController::class, 'store'])->name('admin.language.add');
    Route::get('/admin/language/{id}', [LanguageController::class, 'destroy'])->name('admin.language.destroy');

    //Users Routes
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/add', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.add');
    Route::get('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginUser'])->name('login.post');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerUser'])->name('register.post');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// File Serving Route
Route::get('/file/{name}', [FileController::class, 'index'])->name('file.get');


Route::get('/email/verify', function () {
    $user = Auth::user();
    if ($user->email_verified_at) {
        return redirect('/');
    }
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

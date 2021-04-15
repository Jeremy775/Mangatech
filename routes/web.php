<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AnimeTagController;
use App\Http\Controllers\MangaTagController;
use App\Http\Controllers\CommentAnimeController;
use App\Http\Controllers\CommentMangaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;

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

Route::get('/', [PagesController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// --------------------------------  Admin -------------------------------------------//
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// --------------------------------  User -------------------------------------------//
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function(){
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});

// --------------------------------  Anime -------------------------------------------//
Route::resource('anime', AnimeController::class);
Route::get('/anime/tags/{tag}', [AnimeTagController::class, 'index']);

// --------------------------------  Manga -------------------------------------------//
Route::resource('manga', MangaController::class);
Route::get('/manga/tags/{tag}', [MangaTagController::class, 'index']);

// --------------------------------  Comments -------------------------------------------//
Route::resource('comment', CommentAnimeController::class)->except('store');
route::post('anime/{anime}/comment', [CommentAnimeController::class, 'store'])->name('anime.comment.store');
route::post('manga/{manga}/comment', [CommentMangaController::class, 'store'])->name('manga.comment.store');





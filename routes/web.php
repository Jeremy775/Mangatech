<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Anime\AnimeController;
use App\Http\Controllers\Forum\ForumController;
use App\Http\Controllers\Forum\ReplyController;
use App\Http\Controllers\Manga\MangaController;
use App\Http\Controllers\Admin\AnimesController;
use App\Http\Controllers\Admin\MangasController;

use App\Http\Controllers\Manga\ReadedController;
use App\Http\Controllers\Admin\RepliesController;
use App\Http\Controllers\Anime\WatchedController;

use App\Http\Controllers\Admin\ChannelsController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Anime\AnimeTagController;
use App\Http\Controllers\Manga\FavoriteController;
use App\Http\Controllers\Manga\MangaTagController;
use App\Http\Controllers\Manga\PlanningController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Forum\DiscussionController;
use App\Http\Controllers\Admin\DiscussionsController;

use App\Http\Controllers\Anime\CommentAnimeController;
use App\Http\Controllers\CommentReplyController;
use App\Http\Controllers\Manga\CommentMangaController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Route::get('/', [PagesController::class, 'index'])->name('index');

Auth::routes(); //generates all the routes required for user authentication.

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// --------------------------------  Admin -------------------------------------------//
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('animes', AnimesController::class);
    Route::resource('channels', ChannelsController::class);
    Route::resource('comments', CommentsController::class);
    Route::resource('discussions', DiscussionsController::class);
    Route::resource('mangas', MangasController::class);
    Route::resource('replies', RepliesController::class);
    Route::resource('tags', TagsController::class);
});

// --------------------------------  User -------------------------------------------//
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function(){
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});

// --------------------------------  User Manga Lists -------------------------------------------//
Route::post('favmanga/{manga}/add', [FavoriteController::class, 'add'])->name('manga.fav')->middleware('auth');
Route::post('planning_manga/{manga}/add', [PlanningController::class, 'add'])->name('manga.planning')->middleware('auth');
Route::post('readed/{manga}/add', [ReadedController::class, 'add'])->name('manga.readed')->middleware('auth');

Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite.index');
Route::get('/planning_manga', [PlanningController::class, 'index'])->name('planning.manga.index');

// --------------------------------  User Anime Lists -------------------------------------------//
Route::post('favanime/{anime}/add', [App\Http\Controllers\Anime\FavoriteController::class, 'add'])->name('anime.fav')->middleware('auth');
Route::post('planning_anime/{anime}/add', [App\Http\Controllers\Anime\PlanningController::class, 'add'])->name('anime.planning')->middleware('auth');
Route::post('watched/{anime}/add', [WatchedController::class, 'add'])->name('anime.watched')->middleware('auth');

Route::get('/planning_anime', [App\Http\Controllers\Anime\PlanningController::class, 'index'])->name('planning.anime.index');

// --------------------------------  Anime -------------------------------------------//
Route::resource('anime', AnimeController::class);
Route::get('/anime/tags/{tag}', [AnimeTagController::class, 'index']);

// --------------------------------  Manga -------------------------------------------//
Route::resource('manga', MangaController::class);
Route::get('/manga/tags/{tag}', [MangaTagController::class, 'index']);

// --------------------------------  Comments -------------------------------------------//
Route::resource('comment', CommentAnimeController::class)->except('store');
Route::post('anime/{anime}/comment', [CommentAnimeController::class, 'store'])->name('anime.comment.store');
Route::post('manga/{manga}/comment', [CommentMangaController::class, 'store'])->name('manga.comment.store');

Route::post('comment-reply/{comment}', [CommentReplyController::class, 'store'])->name('comment-reply.store');
Route::resource('comment-reply', CommentReplyController::class)->except(['store', 'index', 'show']);
// --------------------------------  Forum -------------------------------------------//
Route::resource('discussions', DiscussionController::class);
Route::resource('discussions/{discussion}/replies', ReplyController::class);



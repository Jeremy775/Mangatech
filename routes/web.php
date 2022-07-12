<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Cour\CourController;
use App\Http\Controllers\Forum\ForumController;
use App\Http\Controllers\Forum\ReplyController;
use App\Http\Controllers\Admin\CoursController;

use App\Http\Controllers\Manga\ReadedController;
use App\Http\Controllers\Admin\RepliesController;
use App\Http\Controllers\Cour\WatchedController;

use App\Http\Controllers\Admin\ChannelsController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Cour\CourTagController;
use App\Http\Controllers\Manga\FavoriteController;
use App\Http\Controllers\Manga\PlanningController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Forum\DiscussionController;
use App\Http\Controllers\Admin\DiscussionsController;

use App\Http\Controllers\Cour\CommentCourController;
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
    Route::resource('cours', CoursController::class);
    Route::resource('channels', ChannelsController::class);
    Route::resource('comments', CommentsController::class);
    Route::resource('discussions', DiscussionsController::class);
    Route::resource('replies', RepliesController::class);
    Route::resource('tags', TagsController::class);
});

// --------------------------------  User -------------------------------------------//
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function(){
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});

// --------------------------------  User Cour Lists -------------------------------------------//
Route::post('favcour/{cour}/add', [App\Http\Controllers\Cour\FavoriteController::class, 'add'])->name('cour.fav')->middleware('auth');
Route::post('planning_cour/{cour}/add', [App\Http\Controllers\Cour\PlanningController::class, 'add'])->name('cour.planning')->middleware('auth');
Route::post('watched/{cour}/add', [WatchedController::class, 'add'])->name('cour.watched')->middleware('auth');

Route::get('/planning_cour', [App\Http\Controllers\Cour\PlanningController::class, 'index'])->name('planning.cour.index');

// --------------------------------  Cour -------------------------------------------//
Route::resource('cour', CourController::class);
Route::get('/cour/tags/{tag}', [CourTagController::class, 'index']);

// --------------------------------  Comments -------------------------------------------//
Route::resource('comment', CommentCourController::class)->except('store');
route::post('cour/{cour}/comment', [CommentCourController::class, 'store'])->name('cour.comment.store');

// --------------------------------  Forum -------------------------------------------//
Route::resource('forum', ForumController::class);
Route::resource('discussions', DiscussionController::class);
Route::resource('discussions/{discussion}/replies', ReplyController::class);



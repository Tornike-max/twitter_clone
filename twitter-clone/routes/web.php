<?php

use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\PopularpostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Support\Facades\Route;

//languages
Route::get('/lang/{lang}', function ($lang) {
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return redirect()->route('dashboard');
})->name('lang');



// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');


// Ideas

Route::resource('ideas', IdeaController::class)->except(['index', 'create'])->middleware('auth');
Route::resource('ideas', IdeaController::class)->only(['show']);
Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');
Route::resource('users', UserController::class)->only(['show', 'edit', 'update'])->middleware('auth');

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('/users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('/users/{user}/unfollow', [FollowerController::class, 'unFollow'])->middleware('auth')->name('users.unfollow');

Route::post('/users/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('ideas.like');
Route::post('/users/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');


//feed
Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

//popular post
Route::get('/popular', PopularpostController::class)->middleware('auth')->name('popular');

// Auth
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('login.user');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//admin

Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function () {
    //dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    //users
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('users.show');

    //ideas
    Route::get('/ideas', [AdminIdeaController::class, 'index'])->name('ideas.index');
    Route::get('/ideas/{idea}/edit', [AdminIdeaController::class, 'edit'])->name('ideas.edit');
    Route::put('/ideas/{idea}', [AdminIdeaController::class, 'update'])->name('ideas.update');
    Route::get('/ideas/{idea}', [AdminIdeaController::class, 'show'])->name('ideas.show');
    Route::delete('/ideas/{idea}', [AdminIdeaController::class, 'destroy'])->name('ideas.destroy');

    //comments
    Route::resource('/comments', AdminCommentController::class)->only(['index', 'edit', 'update', 'destroy']);
});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/show/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])
    ->name('ideas.edit')
    ->middleware('auth');
Route::put('/ideas/{idea}', [IdeaController::class, 'update'])
    ->name('ideas.update')
    ->middleware('auth');
Route::post('/store', [IdeaController::class, 'store'])
    ->middleware('auth');;
Route::delete('/ideas/{id}', [IdeaController::class, 'destroy'])
    ->name('ideas.destroy')
    ->middleware('auth');;

Route::post('/store/{id}', [CommentController::class, 'store'])->name('ideas.comments.store');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

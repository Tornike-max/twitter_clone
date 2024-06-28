<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/show/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');
Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update');
Route::post('/store', [IdeaController::class, 'store']);
Route::delete('/ideas/{id}', [IdeaController::class, 'destroy'])->name('ideas.destroy');

Route::post('/store/{id}', [CommentController::class, 'store'])->name('ideas.comments.store');


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

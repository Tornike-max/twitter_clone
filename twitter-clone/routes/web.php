<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/show/{idea}', [DashboardController::class, 'show'])->name('ideas.show');
Route::post('/store', [DashboardController::class, 'store']);
Route::delete('/ideas/{id}', [DashboardController::class, 'destroy'])->name('ideas.destroy');

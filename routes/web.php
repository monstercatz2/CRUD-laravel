<?php

use App\Http\Controllers\karyawanController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('karyawan',karyawanController::class);

Route::resource('leaderboard',LeaderboardController::class);

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
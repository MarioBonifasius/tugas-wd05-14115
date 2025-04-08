<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// router default
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get(uri: '/',action: [DashboardController::class, 'index']);
Route::get('/', [DashboardController::class, 'index']);
// Route::get('/', [DashboardController::class, 'index']);
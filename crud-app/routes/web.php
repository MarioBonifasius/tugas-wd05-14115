<?php

use Illuminate\Support\Facades\Route;

// router default
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get(uri: '/dashboard',action: [DashboardController::class, 'index']);
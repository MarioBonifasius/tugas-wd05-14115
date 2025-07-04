<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\AuthController;
use App\Models\Obat;
use App\Models\Periksa;
use App\Models\User;

// router default
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get(uri: '/',action: [DashboardController::class, 'index']);
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [DashboardController::class, 'index']);


//login session

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* --------------- Setelah Login (Dibatasi auth) --------------- */
Route::middleware('auth')->group(function () {

    // Dashboard umum (bisa kamu kembangkan lagi)
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/tables', [DashboardController::class, 'tables']);

    /* --------- Pasien --------- */
    Route::get('/pasien', function () {
        return view('pasien.dashboard');
    })->name('pasien.dashboard');

    Route::get('/pasien/periksa', function () {
        return view('pasien.periksa');
    })->name('pasien.periksa');

    Route::get('/pasien/riwayat', function () {
        return view('pasien.riwayat');
    })->name('pasien.riwayat');

    /* --------- Admin --------- */
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/periksa', function () {
        return view('admin.periksa');
    })->name('admin.periksa');

    Route::get('/admin/riwayat', function () {
        return view('admin.riwayat');
    })->name('admin.riwayat');

    Route::get('/admin/dokter', function () {
        return view('admin.dokter');
    })->name('admin.dokter');

  /* --------- Dokter --------- */

    Route::get('/dokter', function () {
        return view('dokter.dashboard'); // ini akan arahkan ke blade
    })->middleware('auth')->name('dokter.dashboard');

    Route::get('/dokter/periksa', function () {
        $periksas = Periksa::all();
        return view('dokter.periksa', compact('periksas'));
    })->name('dokter.periksa');

    Route::get('/dokter/obat', [ObatController::class , 'index'])->name('dokter.obat');
    Route::post('/dokter/obat', [ObatController::class, 'store'])->name('dokter.obat.store');
    Route::get('/dokter/obat/{id}', [ObatController::class, 'edit'])->name('dokter.obat.edit');
    Route::put('/dokter/obat/{id}', [ObatController::class, 'update'])->name('dokter.obat.update');
    Route::delete('/dokter/obat/{id}', [ObatController::class, 'delete'])->name('dokter.obat.delete');
});

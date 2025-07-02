<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\PembayaranController;

// Redirect default ke login
Route::get('/', function () {
    return redirect('/login');
});

// // Autentikasi
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group route setelah login (admin-only)
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Kamar
    Route::resource('/kamar', KamarController::class);

    // Manajemen Penyewa
    Route::resource('/penyewa', PenyewaController::class);

    // Pembayaran
    Route::resource('/pembayaran', PembayaranController::class);

    // Riwayat Pembayaran (role: penyewa)
    Route::get('/riwayat-bayar', [DashboardController::class, 'riwayatBayar'])->name('riwayat-bayar');


    // Export Transaksi (contoh tambahan)
    // Route::get('/pembayaran-export', [PembayaranController::class, 'export'])->name('pembayaran.export');
});

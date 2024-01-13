<?php

use App\Http\Controllers\KelompokProdukController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    if (Auth::check()) {
        // Jika sudah login, arahkan ke halaman lain jika diperlukan
        return redirect('/home');
    }

    // Jika belum login, arahkan ke halaman login
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Kelompok Produk Routes
Route::middleware('auth')->group(function () {
    Route::resource('kelompokproduk', KelompokProdukController::class);
    Route::resource('produk', ProdukController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

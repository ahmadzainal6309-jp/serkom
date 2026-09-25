<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProdukController::class, 'index'])->name('home');


Route::prefix('produk')->name('produk.')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('index');
    Route::get('/create', [ProdukController::class, 'create'])->name('create');
    Route::post('/', [ProdukController::class, 'store'])->name('store');
    Route::get('/{produk}/edit', [ProdukController::class, 'edit'])->name('edit');
    Route::put('/{produk}', [ProdukController::class, 'update'])->name('update');
    Route::delete('/{produk}', [ProdukController::class, 'destroy'])->name('destroy');
});


Route::prefix('transaksi')->name('transaksi.')->group(function () {
    
    Route::get('/create', [TransaksiController::class, 'create'])->name('create');
    Route::post('/', [TransaksiController::class, 'store'])->name('store');

    
    Route::get('/', [TransaksiController::class, 'index'])->name('index');

    
    Route::get('/{transaksi}', [TransaksiController::class, 'show'])->name('show');
});

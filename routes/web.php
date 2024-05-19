<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/barang',\App\Http\Controllers\BarangController::class);
Route::resource('/penerimaan_barang',\App\Http\Controllers\PenerimaanBarangController::class);
Route::resource('/pengeluaran_barang',\App\Http\Controllers\PengeluaranBarangController::class);

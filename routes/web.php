<?php

use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\MerkController;
use App\Models\JenisBarang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokasiController;
use App\Models\Kategori;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChartController;


// Route::get('/beranda', [MerkController::class, 'beranda'])->name('merk.beranda');


Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/dash', function () {
    return view('partial.dash');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/tentangkami', function () {
    return view('tentangkami');
});
Route::resource('/merk', MerkController::class);
Route::resource('/jenis', JenisBarangController::class);
Route::resource('/lokasi', LokasiController::class);



Route::get('/kategori', [KategoriController::class, 'index']);
Route::resource('kategori', KategoriController::class);



Route::resource('barang_masuk', BarangMasukController::class);
Route::get('/barang_masuk', [BarangMasukController::class, 'index'])->name('barang_masuk.index');
Route::get('/barang_masuk/create', [BarangMasukController::class, 'create'])->name('barang_masuk.create');
Route::post('/barang_masuk', [BarangMasukController::class, 'store'])->name('barang_masuk.store');

Route::resource('pembelian', PembelianController::class);

Route::resource('penjualan', PenjualanController::class);
Route::resource('/barang', BarangController::class);
//Route::get('/barang', [BarangController::class, 'index']);
Route::get('barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');

Route::resource('supplier', SupplierController::class);



Route::resource('profile', ProfileController::class);

Route::get('/chart', [Chartcontroller::class, 'index']);






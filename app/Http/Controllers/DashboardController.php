<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    // Mengambil data stok barang
    $stokData = Barang::pluck('stok')->toArray();

    // Jika $stokData null atau kosong, gunakan array kosong sebagai fallback
    $stokData = $stokData ?? [];

    // Hitung total barang, supplier, pembelian, penjualan
    $totalBarang = Barang::count();
    $totalSupplier = Supplier::count();
    $totalPembelian = Pembelian::count();
    $totalPenjualan = Penjualan::sum('jumlah');

    // Kirim data ke view
    return view('dashboard', compact('totalBarang', 'totalSupplier', 'totalPembelian', 'totalPenjualan', 'stokData'));
}

}

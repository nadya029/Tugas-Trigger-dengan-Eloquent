<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang; // Import model Barang

class BarangChartController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel barangs
        $barangs = Barang::select('nama_barang', 'stok')->get();

        // Kirim data ke view
        return view('barang.chart', compact('barangs'));
    }
}


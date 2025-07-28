<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Barang;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    // Menampilkan daftar penjualan
    public function index()
    {
        $barangs = Barang::all();
        $penjualans = Penjualan::all(); // Mengambil semua data penjualan
        return view('penjualan.index', compact('penjualans', 'barangs')); // Mengirim data ke view
    }

    // Menampilkan form untuk menambah penjualan
    public function create()
    {
        $barangs = Barang::all(); // Mengambil semua barang untuk dropdown
        return view(
            'penjualan.create',compact('barangs'));
// Tampilkan form untuk menambah data
    }

    // Menyimpan data penjualan baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'tanggal_keluar' => 'required|date',
            'jumlah' => 'required|integer',
        ]);

        // Perubahan di sini: Cari barang berdasarkan kode_barang
        $barang = Barang::where('kode_barang', $request->kode_barang)->first();

        // Perubahan di sini: Cek apakah stok mencukupi
        if ($barang->stok < $request->jumlah) {
            // Jika stok tidak cukup, kirim notifikasi dan redirect kembali
            return redirect()->back()->with('error', 'Stok barang tidak cukup');
        }

        // Jika stok cukup, lanjutkan dengan penjualan
        Penjualan::create($request->all()); // Menyimpan data ke database

        // Perubahan di sini: Kurangi stok barang
        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit penjualan
    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id); // Mengambil data penjualan berdasarkan ID
        return view('penjualan.edit', compact('penjualan')); // Mengirim data ke view
    }

    // Mengupdate data penjualan
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required',
            'tanggal_keluar' => 'required|date',
            'jumlah' => 'required|integer',
        ]);

        $penjualan = Penjualan::findOrFail($id); // Mengambil data penjualan berdasarkan ID
        $penjualan->update($request->all()); // Mengupdate data

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil diupdate.');
    }

    // Menghapus data penjualan
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id); // Mengambil data penjualan berdasarkan ID
        $penjualan->delete(); // Menghapus data

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil dihapus.');
    }
}


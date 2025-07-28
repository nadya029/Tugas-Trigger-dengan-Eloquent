<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Merk;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Tampilkan daftar barang
    public function index()
    {
        $barangs = Barang::with(['kategori', 'merk'])->get(); // Mengambil semua data barang
        return view('barang.index', compact('barangs')); // Menampilkan view daftar barang
    }

    // Tampilkan form untuk membuat barang baru
    public function create()
    {
        $kategoris = Kategori::all(); // Mengambil semua kategori
        $merks = Merk::all(); // Mengambil semua merk
        return view('barang.create', compact('kategoris', 'merks')); // Menampilkan form input barang
    }

    // Menyimpan data barang baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:255|unique:barangs',
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'id' => 'required|exists:merks,id',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Tampilkan detail barang
    public function show($id)
    {
        $barang = Barang::with(['kategori', 'merk'])->findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    // Tampilkan form edit barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        $merks = Merk::all();
        return view('barang.edit', compact('barang', 'kategoris', 'merks'));
    }

    // Update data barang di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:255|unique:barangs,kode_barang,' . $id . ',id_barang',
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'id' => 'required|exists:merks,id',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    // Hapus barang dari database
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
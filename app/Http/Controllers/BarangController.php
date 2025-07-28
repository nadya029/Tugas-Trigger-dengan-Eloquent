<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Merk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    // Method untuk menampilkan daftar barang
    public function index(Request $request)
    {
        $query = Barang::with(['kategori', 'merk', 'supplier']);

        if ($request->has('search')) {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        $barangs = $query->get();

        return view('barang.index', compact('barangs'));
    }

    // Method untuk menampilkan form tambah barang
    public function create()
    {
        $kategoris = Kategori::all();
        $merks = Merk::all();
        $suppliers = Supplier::all();
        return view('barang.create', compact('kategoris', 'merks', 'suppliers'));
    }

    // Method untuk menyimpan barang baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_barang' => 'required|unique:barangs',
            'nama_barang' => 'required|string|max:100',
            'stok' => 'required|integer',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'id_merk' => 'required|exists:merks,id_merk',
            'id_supplier' => 'required|exists:suppliers,id_supplier',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Siapkan data untuk disimpan
        $data = $request->all();

        // Mengelola upload gambar
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $data['gambar'] = $imageName;
        }

        // Simpan data ke database
        Barang::create($data);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    // Method untuk menampilkan form edit barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        $merks = Merk::all();
        $suppliers = Supplier::all();
        return view('barang.edit', compact('barang', 'kategoris', 'merks', 'suppliers'));
    }

    // Method untuk mengupdate data barang
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $id . ',id_barang',
            'nama_barang' => 'required|string|max:100',
            'stok' => 'required|integer',
            'id_kategori' => 'required|exists:k ategoris,id_kategori',
            'id_merk' => 'required|exists:merks,id_merk',
            'id_supplier' => 'required|exists:suppliers,id_supplier',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Temukan barang yang akan diupdate
        $barang = Barang::findOrFail($id);
        $data = $request->all();

        // Mengelola upload gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($barang->gambar) {
                unlink(public_path('images/' . $barang->gambar));
            }
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $data['gambar'] = $imageName;
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $data['gambar'] = $barang->gambar;
        }

        // Update data barang
        $barang->update($data);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate');
    }

    // Method untuk menghapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        // Hapus gambar jika ada
        if ($barang->gambar) {
            unlink(public_path('images/' . $barang->gambar));
        }
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}
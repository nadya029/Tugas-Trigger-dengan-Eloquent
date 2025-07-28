<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all(); // Ambil semua supplier
        return view('suppliers.index', compact('suppliers')); // Tampilkan view index
    }

    public function create()
    {
        return view('suppliers.create'); // Tampilkan form tambah supplier
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_supplier' => 'required|unique:suppliers',
            'nama_supplier' => 'required',
            'no_tlp' => 'required',
            'email' => 'nullable|email',
            'alamat' => 'nullable',
        ]);

        Supplier::create($validatedData); // Simpan supplier baru
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function edit($id_supplier)
{
    $supplier = Supplier::findOrFail($id_supplier); // Ambil supplier berdasarkan id_supplier
    return view('suppliers.edit', compact('supplier')); // Tampilkan form edit
}

public function update(Request $request, $id_supplier)
{
    $supplier = Supplier::findOrFail($id_supplier);

    // Validasi kode_supplier, gunakan id_supplier untuk pengecualian data saat ini
    $validatedData = $request->validate([
        'kode_supplier' => 'required|unique:suppliers,kode_supplier,' . $supplier->id_supplier . ',id_supplier', // Ganti 'id' dengan 'id_supplier'
        'nama_supplier' => 'required',
        'no_tlp' => 'required',
        'email' => 'nullable|email',
        'alamat' => 'nullable',
    ]);

    $supplier->update($validatedData); // Update supplier
    return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diupdate.');
}



    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete(); // Hapus supplier
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus.');
    }
}

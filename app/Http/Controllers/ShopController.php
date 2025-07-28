<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class ShopController extends Controller
{
    /**
     * Display a listing of the products (barang).
     */
    public function index(Request $request)
    {
        // Jika ada pencarian, ambil barang berdasarkan nama yang dicari
        $search = $request->input('search');
        if ($search) {
            $barang = Barang::where('nama_barang', 'like', '%' . $search . '%')->get();
        } else {
            $barang = Barang::all();
        }

        // Mengirimkan data barang ke view
        return view('shop.index', compact('barang'));
    }
    /**
     * Show the form to create a new product (barang).
     */
    public function create()
    {
        return view('shop.create');
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data (without id_barang)
        $validated = $request->validate([
            'code_barang' => 'required|unique:barangs,code_barang',
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|integer|min:0',
            'id_merk' => 'required|integer',
            'id_supplier' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {
            // Create a new Barang instance without specifying id_barang (auto-increment)
            $barang = new Barang();
            $barang->code_barang = $validated['code_barang'];
            $barang->nama_barang = $validated['nama_barang'];
            $barang->deskripsi = $validated['deskripsi'];
            $barang->harga = $validated['harga'];
            $barang->stok = $validated['stok'];
            $barang->id_merk = $validated['id_merk'];
            $barang->id_supplier = $validated['id_supplier'];

            // Handle the image upload (if any)
            if ($request->hasFile('gambar')) {
                // Store the image with a unique name based on the timestamp
                $fileName = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('gambar'), $fileName);
                $barang->gambar = $fileName;
            }

            // Save the new barang to the database
            $barang->save();

            // Redirect to /barang (index route) after saving the data
            return redirect()->route('barang.index')->with('success', 'Barang successfully added!');
        } catch (\Exception $e) {
            // Handle any errors during the save operation
            return back()->with('error', 'There was an error saving the data: ' . $e->getMessage());
        }
    }
}

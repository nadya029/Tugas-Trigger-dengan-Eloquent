<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $jenisBarangs = JenisBarang::get();
        return view('jenis.index',compact('jenisBarangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('jenis.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'jenis' => 'required|string|max:50',
        ]);

        JenisBarang::create([
                'jenis_barang' => $request->jenis,
            ]);
                      
        return redirect()->route('jenis.index')->with('success', 'Jenis barang berhasil ditambahkan');       

    }

    /**
     * Display the specified resource.
     */
    public function show(JenisBarang $jenisBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenis = JenisBarang::findOrFail($id);
        return view('jenis.edit',compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $jenis = JenisBarang::findOrFail($id);
        $jenis->jenis_barang = $request->jenis;
        $jenis->save();

        return redirect()->route('jenis.index')->with('success', 'Jenis updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string  $id):RedirectResponse
    {
    
        $jenis= JenisBarang::findOrFail($id);
        $jenis->delete();
        return redirect()->route('jenis.index')->with('success', 'Jenis deleted successfully.');

    }
}

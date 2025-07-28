<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    public function index()
    {
        $merks = Merk::all();
        return view('merk.index', compact('merks'));
    }

    public function create()
    {
        return view('merk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk_barang' => 'required'
        ]);

        Merk::create($request->all());
        return redirect()->route('merk.index')->with('success', 'Merk created successfully.');
    }

    public function edit(Merk $merk)
    {
        return view('merk.edit', compact('merk'));
    }

    public function update(Request $request, Merk $merk)
    {
        $request->validate([
            'merk_barang' => 'required'
        ]);

        $merk->update($request->all());
        return redirect()->route('merk.index')->with('success', 'Merk updated successfully.');
    }

    public function destroy(Merk $merk)
    {
        $merk->delete();
        return redirect()->route('merk.index')->with('success', 'Merk deleted successfully.');
    }
}

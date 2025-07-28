<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// use Intervention\Image\Drivers\Imagick\Driver;
class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $lokasis = Lokasi::paginate(10);
        return view('lokasi.index', \compact('lokasis'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('lokasi.input');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'lokasi' => 'required|string|max:50',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'nullable| ',
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '-' . 'lokasi' . '.' . $image->getClientOriginalExtension();
            $image->move('gambar', $imageName);
            $manager = new ImageManager(new Driver());
            $thumbImage = $manager->read('gambar/' . $imageName);
            $thumbImage->resize(200, 200);
            $thumbImage->save(public_path('gambar/thumbnails/' . $imageName));
        }
        // $imageName = time().'-'.'lokasi'.'.'.$request->gambar->extension();
        // $request->gambar->move(public_path('gambar'), $imageName);
        $lokasi = new Lokasi;
        $lokasi->kode = $request->kode;
        $lokasi->nama_lokasi = $request->lokasi;
        $lokasi->gambar_lokasi = $imageName;
        $lokasi->keterangan = $request->keterangan;
        $lokasi->save();
        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil
ditambahkan');
    }
    /**
     * Display the specified resource.
     */
    public function show(Lokasi $lokasi)
    {
        return View('lokasi.show');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('lokasi.edit', \compact('lokasi'));
    }
    /**
     * Update the specified resource in storage.
     */ public function update(Request $request, String $id): RedirectResponse
    {
        $lokasi = Lokasi::find($id);
        $request->validate([
            'kode' => 'required|string|max:10',
            'lokasi' => 'required|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'nullable|string|min:5',
        ]);
        if ($request->gambar) {
            $gambar_path = \public_path($lokasi->gambar_lokasi);
            if (file_exists($gambar_path)) {
                unlink($gambar_path);
            }
            $imageName = time() . '-' . 'lokasi' . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('gambar'), $imageName);
            $lokasi->gambar_lokasi = 'gambar/' . $imageName;
        }
        $lokasi->kode = $request->kode;
        $lokasi->nama_lokasi = $request->lokasi;
        $lokasi->keterangan = $request->keterangan;
        $lokasi->save();
        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil
diubah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi)
    {
        $lokasi = Lokasi::find($lokasi['id']);
        $gambar_path1 = \public_path('gambar/thumbnails/' . $lokasi->gambar_lokasi);
        $gambar_path = \public_path('gambar/' . $lokasi->gambar_lokasi);
        if (file_exists($gambar_path) && (\file_exists($gambar_path1))) {
            unlink($gambar_path);
            unlink($gambar_path1);
        }
        $lokasi->delete();
        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil dihapus');
    }
}

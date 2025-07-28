<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Menampilkan daftar profil
    public function index()
    {
        $profiles = Profile::all();
        return view('profile.index', compact('profiles'));
    }

    // Menampilkan form untuk menambah profil
    public function create()
    {
        return view('profile.create');
    }

    // Menyimpan profil baru
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Mengolah gambar profil jika ada
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // Membuat profil baru
        Profile::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'bio' => $request->bio,
            'profile_picture' => $profilePicturePath,
        ]);

        return redirect()->route('profile.index')->with('success', 'Profil berhasil ditambahkan.');
    }

    // Menampilkan detail profil
    public function show(Profile $profile)
    {
        return view('profile.show', compact('profile'));
    }

    // Menampilkan form untuk mengedit profil
    public function edit(Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    // Memperbarui profil
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Mengolah gambar profil jika ada
        if ($request->hasFile('profile_picture')) {
            // Menghapus gambar lama jika ada
            if ($profile->profile_picture) {
                Storage::disk('public')->delete($profile->profile_picture);
            }
            $profile->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // Memperbarui data profil
        $profile->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'bio' => $request->bio,
        ]);

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui.');
    }

    // Menghapus profil
    public function destroy(Profile $profile)
    {
        // Menghapus gambar jika ada
        if ($profile->profile_picture) {
            Storage::disk('public')->delete($profile->profile_picture);
        }
        $profile->delete();

        return redirect()->route('profile.index')->with('success', 'Profil berhasil dihapus.');
    }
}

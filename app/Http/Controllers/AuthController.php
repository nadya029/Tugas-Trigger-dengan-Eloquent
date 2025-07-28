<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    // Fungsi untuk registrasi
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|in:user,admin', // Pastikan hanya user atau admin yang bisa dipilih
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar profil
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mendaftar pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Menyimpan role yang dipilih
        ]);

        // Menyimpan gambar profil jika ada
        if ($request->hasFile('profile_picture')) {
            // Menyimpan gambar profil
            $path = $request->file('profile_picture')->store('profiles', 'public');
            $user->profile_picture = $path;
            $user->save();
        } else {
            // Jika tidak ada gambar, set gambar default
            $user->profile_picture = 'profiles/default-avatar.jpg';
            $user->save();
        }

        // Login setelah mendaftar
        auth()->login($user);

        // Mengarahkan pengguna ke halaman yang sesuai
        return redirect()->route('dashboard');  // Admin atau user, bisa ke halaman dashboard
    }

    // Fungsi untuk login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->only('email', 'password');

        // Mengecek kredensial pengguna
        if (Auth::attempt($credentials)) {
            // Mengarahkan pengguna ke halaman yang sesuai berdasarkan peran mereka
            $role = Auth::user()->role;
            if ($role == 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('shop.index');
            }
        }

        // Jika login gagal
        return redirect()->route('login')->withErrors(['email' => 'The provided credentials do not match our records.']);
    }
}

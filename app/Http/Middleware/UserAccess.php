<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Pastikan user sudah login
        if (Auth::check()) {
            // Cek jika role user cocok
            if (Auth::user()->role == $role) {
                return $next($request);
            }
        }

        // Jika user tidak punya akses, redirect ke halaman yang sesuai
        return redirect('/dashboard');  // Ganti dengan halaman yang sesuai
    }
}


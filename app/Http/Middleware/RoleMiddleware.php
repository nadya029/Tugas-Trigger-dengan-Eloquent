<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        // Mengambil member yang terautentikasi menggunakan guard
        $member = auth()->guard('web')->user();

        if (!$member || $member->role !== $role) {
            return redirect('/'); // Atau tampilkan pesan error
        }
        
        return $next($request);
    }
}

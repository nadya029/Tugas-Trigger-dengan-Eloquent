<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Mengubah pengalihan setelah login berdasarkan role
    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect('/dashboard');
        } else {
            return redirect('/shop');
        }
    }
}

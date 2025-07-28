<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // Menampilkan halaman checkout (misalnya, tampilkan data keranjang)
        return view('checkout.index');
    }
}

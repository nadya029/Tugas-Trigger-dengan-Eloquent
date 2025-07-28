<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barang; 

class CartController extends Controller
{
    // Menampilkan halaman keranjang belanja
    public function index()
    {
        return view('cart.index');
    }

    // Menampilkan halaman keranjang belanja
    public function show()
    {
        return view('cart.show');
    }

    public function add($id_barang)
    {
        // Ambil barang berdasarkan id_barang
        $barang = Barang::find($id_barang);

        // Cek apakah barang ada
        if (!$barang) {
            return redirect()->route('cart.index')->with('error', 'Barang tidak ditemukan!');
        }

        // Ambil data keranjang dari session atau buat keranjang baru jika belum ada
        $cart = session()->get('cart', []);

        // Jika barang sudah ada di keranjang, tambahkan quantity
        if (isset($cart[$id_barang])) {
            $cart[$id_barang]['quantity']++;
        } else {
            // Jika barang belum ada, tambahkan barang ke keranjang
            $cart[$id_barang] = [
                'name' => $barang->nama_barang,
                'price' => $barang->harga,
                'quantity' => 1,
            ];
        }

        // Simpan kembali ke session
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Barang berhasil ditambahkan ke keranjang!');
    
        // Jika session cart belum ada, buat array baru
        $cart = session('cart', []);

        // Cek apakah barang sudah ada dalam keranjang
        $exists = false;
        foreach ($cart as &$cartItem) {
            if ($cartItem['id_barang'] == $item['id_barang']) {
                $cartItem['quantity']++;
                $exists = true;
                break;
            }
        }

        // Jika barang belum ada, tambahkan ke keranjang
        if (!$exists) {
            $cart[] = $item;
        }

        // Simpan keranjang ke dalam session
        session(['cart' => $cart]);

        return redirect()->route('cart.index');
    }

    // Memperbarui jumlah barang dalam keranjang
    public function update(Request $request)
    {
        $cart = session('cart');

        foreach ($request->input('cart') as $index => $item) {
            if (isset($cart[$index])) {
                $cart[$index]['quantity'] = $item['quantity'];
            }
        }

        session(['cart' => $cart]);

        return redirect()->route('cart.index');
    }

    // Menghapus item dari keranjang
    public function remove($index)
    {
        $cart = session('cart');

        // Hapus item dari keranjang
        unset($cart[$index]);

        // Re-index array untuk menghindari masalah dengan array yang tidak terurut
        session(['cart' => array_values($cart)]);

        return redirect()->route('cart.index');
    }
}

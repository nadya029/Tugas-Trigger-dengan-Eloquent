<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class ChartController extends Controller
{
    public function index()
    {
        //return view('graph');
        $brg=Barang::select('nama_barang')->pluck('nama_barang');
        $jml=Barang::select('stok')->pluck('stok');
    
        return view('graph',compact('brg','jml'));
    }

  
}

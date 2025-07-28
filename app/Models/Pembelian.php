<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelians'; // Nama tabel
    protected $primaryKey = 'id_pembelian'; // Primary key
    protected $fillable = ['kode_barang','tanggal_pembelian','jumlah']; // Kolom yang dapat diisi massal
}


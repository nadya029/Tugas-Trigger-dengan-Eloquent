<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'tbl_barang_masuk';

    protected $fillable = [
        'id_barang_masuk',
        'kode_barang',
        'kode_supplier',
        'jumlah',
    ];
}

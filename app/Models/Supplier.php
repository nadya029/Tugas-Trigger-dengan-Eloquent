<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers'; // Nama tabel
    protected $primaryKey = 'id_supplier'; // Primary key

    protected $fillable = [
        'kode_supplier',
        'nama_supplier',
        'no_tlp',
        'email',
        'alamat',
    ];
}

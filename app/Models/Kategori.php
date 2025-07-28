<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris'; // Nama tabel

    protected $primaryKey = 'id_kategori'; // Primary key

    protected $fillable = ['nama_kategori']; // Kolom yang dapat diisi
}

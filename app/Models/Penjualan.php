<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualans'; // Nama tabel
    protected $primaryKey = 'id_penjualan'; // Primary key
    public $incrementing = true; // Auto-increment
    protected $fillable = ['kode_barang', 'tanggal_keluar', 'jumlah']; // Kolom yang bisa diisi

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }
}


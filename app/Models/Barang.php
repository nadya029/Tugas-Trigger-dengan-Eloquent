<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs'; // Nama tabel
    protected $primaryKey = 'id_barang'; // Primary key

    // Menggunakan fillable untuk menentukan kolom mana yang bisa diisi
    protected $fillable = [
        'code_barang',
        'nama_barang',
        'deskripsi',
        'harga',
        'stok',
        'id_merk',
        'id_supplier',
        'gambar'
    ];

    // Relasi ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    // Relasi ke model Merk
    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk');
    }

    // Relasi ke model Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    // Relasi ke model Penjualan
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'kode_barang');
    }

    // Relasi ke model Pembelian
    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'kode_barang');
    }
}

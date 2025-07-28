<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Tentukan tabel jika tidak menggunakan penamaan default (profiles)
    protected $table = 'profiles';

    // Tentukan primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'id_profile';

    // Menentukan atribut yang dapat diisi (mass assignable)
    protected $fillable = [
        'user_id',        // Mengacu pada ID pengguna
        'first_name',     // Nama depan
        'last_name',      // Nama belakang
        'address',        // Alamat
        'phone',          // Nomor telepon
        'bio',            // Biografi atau deskripsi singkat
        'profile_picture' // Gambar profil
    ];

    // Jika Anda memiliki relasi dengan model lain, misalnya User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

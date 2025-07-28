<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id(); // ID Barang
            $table->string('kode_barang')->unique(); // Kode Barang
            $table->string('nama_barang'); // Nama Barang
            $table->integer('stok'); // Stok Barang
            $table->foreignId('id_kategori')->constrained('kategoris')->onDelete('cascade'); // Relasi ke kategori
            $table->foreignId('id')->constrained('merks')->onDelete('cascade'); // Relasi ke merk
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
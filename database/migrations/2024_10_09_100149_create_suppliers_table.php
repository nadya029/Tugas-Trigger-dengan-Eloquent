<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('id_supplier'); // Primary key
            $table->string('kode_supplier')->unique(); // Kode Supplier
            $table->string('nama_supplier'); // Nama Supplier
            $table->string('no_tlp'); // No Telepon
            $table->string('email')->nullable(); // Email
            $table->text('alamat')->nullable(); // Alamat
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}


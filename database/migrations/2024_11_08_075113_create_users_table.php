<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Kolom id
            $table->string('name'); // Kolom name
            $table->string('email')->unique(); // Kolom email, dengan unique constraint
            $table->timestamp('email_verified_at')->nullable(); // Kolom email_verified_at, bisa null
            $table->string('password'); // Kolom password
            $table->string('type')->nullable(); // Kolom type, bisa null
            $table->rememberToken(); // Kolom remember_token
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->string('level')->nullable(); // Kolom level, bisa null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

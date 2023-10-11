<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('jawab', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Kolom untuk menyimpan ID pengguna
            $table->unsignedBigInteger('soal_id'); // Kolom untuk menyimpan ID soal
            $table->string('jawaban_user')->nullable(); // Kolom untuk menyimpan jawaban pengguna
            $table->timestamps();
        });

        Schema::table('jawab', function (Blueprint $table) {
            // Menambahkan foreign key ke kolom user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Menambahkan foreign key ke kolom soal_id
            $table->foreign('soal_id')->references('id')->on('pppk')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jawab');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pppk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('no');
            $table->string('jenis_soal');
            $table->longtext('soal');
            $table->enum('jawaban', ['a', 'b', 'c', 'd', 'e']);
            $table->string('jawaban_a');
            $table->string('jawaban_b');
            $table->string('jawaban_c');
            $table->string('jawaban_d');
            $table->string('jawaban_e');
            $table->integer('durasi_waktu')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pppk');
    }
};

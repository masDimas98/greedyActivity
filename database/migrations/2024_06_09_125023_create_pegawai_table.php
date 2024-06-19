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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('nip', 15)->primary();
            $table->string('ktp', 16);
            $table->string('foto')->nullable();
            $table->string('namaPegawai');
            $table->string('namaPanggilan');
            $table->foreignId('bagian')->nullable()->references('idBagian')->on('bagian')->nullOnDelete();
            $table->string('posisiSekarang');
            $table->string('tempatLahir');
            $table->date('tanggalLahir');
            $table->string('agamaKepercayaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};

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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->text('pembuatan_ktp')->nullable();
            $table->text('pembuatan_akta_kelahiran')->nullable();
            $table->text('pembuatan_akta_kematian')->nullable();
            $table->text('pembuatan_surat_ket_usaha')->nullable();
            $table->text('pembuatan_surat_ket_nikah')->nullable();
            $table->text('pembuatan_surat_ket_tidak_mampu')->nullable();
            $table->text('pembuatan_surat_alih_waris')->nullable();
            $table->text('pembuatan_surat_keterangan_penghasilan')->nullable();
            $table->text('pembuatan_surat_kepindahan_penduduk')->nullable();
            $table->text('pembuatan_kartu_keluarga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

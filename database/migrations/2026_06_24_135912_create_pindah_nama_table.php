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
        Schema::create('pindah_nama', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kendaraan_id')->constrained('kendaraans')->onDelete('cascade');
            $table->string('nama_pemilik_lama');
            $table->string('nik_pemilik_lama');
            $table->string('nama_pemilik_baru');
            $table->string('nik_pemilik_baru');
            $table->string('alamat_pemilik_baru');
            $table->string('no_telepon_pemilik_baru');
            $table->string('email_pemilik_baru')->nullable();
            $table->text('alasan_pindah_nama');
            $table->string('dokumen_ktp_lama')->nullable();
            $table->string('dokumen_ktp_baru')->nullable();
            $table->string('dokumen_bpkb')->nullable();
            $table->string('dokumen_stnk')->nullable();
            $table->string('dokumen_kwitansi')->nullable();
            $table->enum('status', ['pending', 'diproses', 'selesai', 'ditolak'])->default('pending');
            $table->text('catatan_admin')->nullable();
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pindah_nama');
    }
};

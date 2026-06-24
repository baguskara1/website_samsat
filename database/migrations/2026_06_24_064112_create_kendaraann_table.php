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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('no_polisi', 15)->unique();
            $table->string('nama_pemilik');
            $table->string('NIK')->unique();
            $table->string('merk'); 
            $table->string('tipe'); 
            $table->enum('jenis', ['SIM-A', 'SIM-B1', 'SIM-B2', 'SIM-C', 'SIM-C1', 'SIM-C2']); 
            $table->year('tahun_pembuatan');
            $table->string('warna');
            $table->string('no_rangka')->unique();
            $table->string('no_mesin')->unique();
            $table->timestamps(); // create_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
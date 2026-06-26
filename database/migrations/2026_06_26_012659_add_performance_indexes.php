<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->index(['no_polisi', 'NIK'], 'kendaraans_nopol_nik_idx');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->index('midtrans_transaction_id', 'payments_midtrans_id_idx');
            $table->index('kendaraan_id', 'payments_kendaraan_id_idx');
            $table->index('status', 'payments_status_idx');
        });

        Schema::table('pindah_nama', function (Blueprint $table) {
            $table->index('kendaraan_id', 'pindah_nama_kendaraan_id_idx');
            $table->index('user_id', 'pindah_nama_user_id_idx');
            $table->index('status', 'pindah_nama_status_idx');
        });
    }

    public function down(): void
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->dropIndex('kendaraans_nopol_nik_idx');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropIndex('payments_midtrans_id_idx');
            $table->dropIndex('payments_kendaraan_id_idx');
            $table->dropIndex('payments_status_idx');
        });

        Schema::table('pindah_nama', function (Blueprint $table) {
            $table->dropIndex('pindah_nama_kendaraan_id_idx');
            $table->dropIndex('pindah_nama_user_id_idx');
            $table->dropIndex('pindah_nama_status_idx');
        });
    }
};

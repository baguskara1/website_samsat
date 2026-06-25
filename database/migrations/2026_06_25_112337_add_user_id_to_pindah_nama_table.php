<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pindah_nama', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->after('id');
            $table->foreignId('admin_id')->nullable()->constrained('admins')->nullOnDelete()->after('user_id');
        });
    }

    public function down(): void
    {
        Schema::table('pindah_nama', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};

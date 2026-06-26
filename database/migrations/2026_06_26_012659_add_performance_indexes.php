<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This migration adds performance indexes to improve query speed
     * for the SAMSAT DIY website, particularly for:
     * - User authentication (email lookups)
     * - Vehicle searches (no_polisi, NIK)
     * - Payment queries
     * - Transfer name requests
     */
    public function up(): void
    {
        // Users table indexes for authentication
        Schema::table('users', function (Blueprint $table) {
            // Email index for login lookups (critical for auth performance)
            $table->index('email', 'users_email_index');
            
            // Compound index for common queries
            $table->index(['email', 'id'], 'users_email_id_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('users_email_index');
            $table->dropIndex('users_email_id_index');
        });
    }
};

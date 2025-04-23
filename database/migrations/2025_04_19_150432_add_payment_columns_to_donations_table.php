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
        Schema::table('donations', function (Blueprint $table) {
            // Menambahkan kolom bukti pembayaran
            $table->string('payment_proof')->nullable()->after('session_count'); // Kolom untuk menyimpan bukti pembayaran (misalnya file gambar atau dokumen)

            // Menambahkan kolom status verifikasi pembayaran
            $table->enum('payment_verified', ['pending', 'approved', 'rejected'])->default('pending')->after('payment_proof'); // Status verifikasi admin
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            // Menghapus kolom bukti pembayaran dan status verifikasi
            $table->dropColumn(['payment_proof', 'payment_verified']);
        });
    }
};


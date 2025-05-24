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
    Schema::table('donations', function (Blueprint $table) {
        $table->text('initial_message')->nullable(); // Kolom untuk pesan pertama donasi emosional
    });
}

public function down()
{
    Schema::table('donations', function (Blueprint $table) {
        $table->dropColumn('initial_message'); // Menghapus kolom jika rollback
    });
}

};

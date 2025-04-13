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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // untuk user guest
            $table->enum('type', ['financial', 'goods', 'emotional']);
            $table->decimal('amount', 15, 2)->nullable(); // untuk uang
            $table->string('item_description')->nullable(); // untuk barang
            $table->integer('session_count')->nullable(); // untuk curhat
            $table->string('donor_name')->nullable(); // untuk guest
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

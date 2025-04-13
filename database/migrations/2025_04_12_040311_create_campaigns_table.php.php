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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['financial', 'goods', 'emotional']);
            $table->decimal('target_amount', 15, 2)->nullable(); // untuk uang
            $table->integer('target_items')->nullable(); // untuk barang
            $table->integer('target_sessions')->nullable(); // untuk curhat
            $table->decimal('collected_amount', 15, 2)->default(0);
            $table->integer('collected_items')->default(0);
            $table->integer('collected_sessions')->default(0);
            $table->enum('status', ['active', 'completed', 'pending', 'rejected'])->default('pending');
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

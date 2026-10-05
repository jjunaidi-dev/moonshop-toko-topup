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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel customers (id). 
            // Gunakan nullable() jika ingin mengizinkan checkout tanpa login.
            $table->foreignId('customer_id')
                ->nullable()
                ->constrained('customers') // sesuaikan dengan nama tabel pelanggan Anda
                ->onDelete('cascade');

            $table->string('order_id')->unique(); // ID Transaksi unik
            $table->string('game_name')->default('Mobile Legends');
            $table->string('user_id'); // ID Akun Game
            $table->string('zone_id'); // Zone ID Game
            $table->string('package_name');
            $table->decimal('total_price', 12, 2);
            $table->string('payment_method')->nullable();
            $table->enum('status', ['pending', 'success', 'failed', 'expired'])->default('pending');
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

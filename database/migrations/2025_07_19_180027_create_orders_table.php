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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('template_id')->constrained('templates');
            $table->decimal('amount', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2);
            $table->string('currency', 3)->default('IDR');
            $table->enum('status', ['pending', 'paid', 'failed', 'cancelled', 'refunded'])->default('pending');
            $table->enum('payment_method', ['bank_transfer', 'credit_card', 'e_wallet', 'qris'])->nullable();
            $table->string('payment_proof')->nullable(); // bukti transfer
            $table->json('order_details')->nullable(); // detail tambahan pesanan
            $table->text('notes')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index('order_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
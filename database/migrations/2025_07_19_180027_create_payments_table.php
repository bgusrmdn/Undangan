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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id')->unique();
            $table->foreignId('user_id')->constrained('users');
            $table->morphs('paymentable'); // bisa order atau custom_request
            $table->decimal('amount', 15, 2);
            $table->string('currency', 3)->default('IDR');
            $table->enum('payment_method', [
                'bank_transfer', 'credit_card', 'debit_card',
                'e_wallet', 'qris', 'virtual_account'
            ]);
            $table->string('payment_gateway')->nullable(); // midtrans, xendit, dll
            $table->string('external_id')->nullable(); // ID dari payment gateway
            $table->enum('status', [
                'pending', 'processing', 'success', 
                'failed', 'cancelled', 'expired', 'refunded'
            ])->default('pending');
            $table->json('gateway_response')->nullable();
            $table->string('receipt_url')->nullable();
            $table->text('failure_reason')->nullable();
            $table->decimal('fee', 10, 2)->default(0);
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index('payment_id');
            $table->index(['paymentable_type', 'paymentable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
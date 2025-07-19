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
        Schema::create('custom_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_number')->unique();
            $table->foreignId('user_id')->constrained('users');
            $table->string('title');
            $table->text('description');
            $table->string('category'); // jenis undangan
            $table->json('requirements'); // requirement detail
            $table->json('reference_images')->nullable(); // gambar referensi
            $table->decimal('budget_min', 10, 2)->nullable();
            $table->decimal('budget_max', 10, 2)->nullable();
            $table->decimal('quoted_price', 10, 2)->nullable();
            $table->timestamp('deadline')->nullable();
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->enum('status', [
                'pending', 'reviewed', 'quoted', 'accepted', 
                'in_progress', 'completed', 'delivered', 
                'cancelled', 'rejected'
            ])->default('pending');
            $table->foreignId('assigned_to')->nullable()->constrained('users'); // designer
            $table->text('admin_notes')->nullable();
            $table->json('progress_updates')->nullable();
            $table->json('deliverables')->nullable(); // file hasil
            $table->decimal('rating', 2, 1)->nullable();
            $table->text('review')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index('request_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_requests');
    }
};
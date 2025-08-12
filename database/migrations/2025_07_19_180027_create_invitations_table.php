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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('template_id')->constrained('templates');
            $table->string('title');
            $table->string('slug')->unique(); // untuk URL publik
            $table->json('invitation_data'); // data undangan (nama, tanggal, tempat, dll)
            $table->json('custom_styles')->nullable(); // modifikasi CSS user
            $table->string('custom_domain')->nullable(); // domain custom jika ada
            $table->json('rsvp_responses')->nullable(); // jawaban tamu
            $table->json('guest_list')->nullable(); // daftar tamu
            $table->boolean('is_public')->default(true);
            $table->boolean('rsvp_enabled')->default(true);
            $table->boolean('guest_book_enabled')->default(true);
            $table->boolean('music_enabled')->default(true);
            $table->string('background_music')->nullable();
            $table->json('gallery_images')->nullable(); // galeri foto
            $table->text('love_story')->nullable(); // cerita cinta
            $table->json('event_details'); // detail acara (waktu, tempat, dll)
            $table->integer('views_count')->default(0);
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamp('event_date')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
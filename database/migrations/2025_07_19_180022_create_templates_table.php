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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('category')->nullable(); // pernikahan, ulang_tahun, wisuda, dll
            $table->decimal('price', 10, 2);
            $table->json('preview_images'); // array URL gambar preview
            $table->json('demo_data')->nullable(); // data contoh untuk preview
            $table->text('html_structure'); // struktur HTML template
            $table->text('css_styles'); // styling CSS
            $table->json('customizable_fields'); // field yang bisa diedit user
            $table->json('color_schemes')->nullable(); // skema warna yang tersedia
            $table->json('font_options')->nullable(); // pilihan font
            $table->boolean('is_premium')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('downloads_count')->default(0);
            $table->decimal('rating', 2, 1)->default(0);
            $table->integer('reviews_count')->default(0);
            $table->string('tags')->nullable(); // tags untuk search
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
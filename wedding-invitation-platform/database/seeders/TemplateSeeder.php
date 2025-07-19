<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Elegant Wedding Classic',
                'description' => 'Template undangan pernikahan elegan dengan desain klasik yang timeless',
                'category' => 'wedding',
                'preview_image' => 'templates/elegant-wedding-classic.jpg',
                'template_data' => json_encode([
                    'colors' => ['#2C3E50', '#ECF0F1', '#E74C3C'],
                    'fonts' => ['Playfair Display', 'Open Sans'],
                    'sections' => ['header', 'couple', 'event', 'gallery', 'rsvp']
                ]),
                'price' => 299000,
                'is_active' => true,
                'is_featured' => true,
                'demo_url' => '/demo/elegant-wedding-classic'
            ],
            [
                'name' => 'Modern Minimalist Wedding',
                'description' => 'Template undangan pernikahan modern dengan desain minimalis yang clean',
                'category' => 'wedding',
                'preview_image' => 'templates/modern-minimalist-wedding.jpg',
                'template_data' => json_encode([
                    'colors' => ['#FFFFFF', '#000000', '#F8F9FA'],
                    'fonts' => ['Inter', 'Poppins'],
                    'sections' => ['header', 'couple', 'event', 'gallery', 'rsvp']
                ]),
                'price' => 249000,
                'is_active' => true,
                'is_featured' => false,
                'demo_url' => '/demo/modern-minimalist-wedding'
            ],
            [
                'name' => 'Romantic Garden Wedding',
                'description' => 'Template undangan pernikahan romantis dengan tema taman yang indah',
                'category' => 'wedding',
                'preview_image' => 'templates/romantic-garden-wedding.jpg',
                'template_data' => json_encode([
                    'colors' => ['#8B4513', '#228B22', '#FFB6C1'],
                    'fonts' => ['Dancing Script', 'Lora'],
                    'sections' => ['header', 'couple', 'event', 'gallery', 'rsvp']
                ]),
                'price' => 349000,
                'is_active' => true,
                'is_featured' => true,
                'demo_url' => '/demo/romantic-garden-wedding'
            ],
            [
                'name' => 'Birthday Celebration',
                'description' => 'Template undangan ulang tahun yang ceria dan colorful',
                'category' => 'birthday',
                'preview_image' => 'templates/birthday-celebration.jpg',
                'template_data' => json_encode([
                    'colors' => ['#FF6B6B', '#4ECDC4', '#45B7D1'],
                    'fonts' => ['Fredoka One', 'Nunito'],
                    'sections' => ['header', 'host', 'event', 'gallery', 'rsvp']
                ]),
                'price' => 199000,
                'is_active' => true,
                'is_featured' => false,
                'demo_url' => '/demo/birthday-celebration'
            ],
            [
                'name' => 'Anniversary Special',
                'description' => 'Template undangan anniversary yang romantis dan elegan',
                'category' => 'anniversary',
                'preview_image' => 'templates/anniversary-special.jpg',
                'template_data' => json_encode([
                    'colors' => ['#D4AF37', '#8B0000', '#F5F5DC'],
                    'fonts' => ['Great Vibes', 'Crimson Text'],
                    'sections' => ['header', 'couple', 'event', 'gallery', 'rsvp']
                ]),
                'price' => 279000,
                'is_active' => true,
                'is_featured' => false,
                'demo_url' => '/demo/anniversary-special'
            ]
        ];

        foreach ($templates as $template) {
            Template::create($template);
        }
    }
}

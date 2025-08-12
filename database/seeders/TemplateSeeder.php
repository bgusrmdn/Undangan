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
                'name' => 'Elegant Rose Gold',
                'description' => 'Template undangan pernikahan elegan dengan sentuhan rose gold yang mewah. Cocok untuk pasangan yang menginginkan undangan dengan kesan modern dan glamor.',
                'category' => 'pernikahan',
                'price' => 75000,
                'preview_images' => [
                    '/images/templates/elegant-rose-gold-1.jpg',
                    '/images/templates/elegant-rose-gold-2.jpg',
                    '/images/templates/elegant-rose-gold-3.jpg'
                ],
                'demo_data' => [
                    'bride_name' => 'Sarah Amelia',
                    'groom_name' => 'Ahmad Fauzi',
                    'event_date' => '2024-08-15',
                    'event_time' => '10:00',
                    'venue_name' => 'Ballroom Hotel Mulia',
                    'venue_address' => 'Jl. Asia Afrika No. 8, Jakarta Pusat'
                ],
                'html_structure' => $this->getElegantTemplate(),
                'css_styles' => $this->getElegantStyles(),
                'customizable_fields' => [
                    'bride_name',
                    'groom_name', 
                    'parents_names',
                    'event_date',
                    'event_time',
                    'venue_name',
                    'venue_address',
                    'dress_code',
                    'rsvp_info',
                    'gallery_images',
                    'love_story'
                ],
                'color_schemes' => [
                    ['name' => 'Rose Gold Classic', 'primary' => '#E8B4B8', 'secondary' => '#C9A96E', 'accent' => '#F4D5AE'],
                    ['name' => 'Blush Pink', 'primary' => '#F7D5D3', 'secondary' => '#E8A5A0', 'accent' => '#D4756B'],
                    ['name' => 'Champagne Gold', 'primary' => '#F7E7CE', 'secondary' => '#E6D5AA', 'accent' => '#D4C299']
                ],
                'font_options' => [
                    ['name' => 'Playfair Display', 'value' => 'Playfair Display'],
                    ['name' => 'Dancing Script', 'value' => 'Dancing Script'],
                    ['name' => 'Crimson Text', 'value' => 'Crimson Text']
                ],
                'is_premium' => true,
                'is_active' => true,
                'downloads_count' => 245,
                'rating' => 4.8,
                'reviews_count' => 67,
                'tags' => 'pernikahan, elegan, rose gold, modern, mewah',
                'created_by' => null
            ],
            [
                'name' => 'Minimalist Modern',
                'description' => 'Template undangan dengan design minimalis dan modern. Sempurna untuk pasangan yang menyukai kesederhanaan dengan sentuhan contemporary.',
                'category' => 'pernikahan',
                'price' => 50000,
                'preview_images' => [
                    '/images/templates/minimalist-modern-1.jpg',
                    '/images/templates/minimalist-modern-2.jpg'
                ],
                'demo_data' => [
                    'bride_name' => 'Rina Sari',
                    'groom_name' => 'David Chen',
                    'event_date' => '2024-09-20',
                    'event_time' => '11:00',
                    'venue_name' => 'The Ritz-Carlton',
                    'venue_address' => 'Jl. Dr. Ide Anak Agung Gde Agung, Jakarta Selatan'
                ],
                'html_structure' => $this->getMinimalistTemplate(),
                'css_styles' => $this->getMinimalistStyles(),
                'customizable_fields' => [
                    'bride_name',
                    'groom_name', 
                    'event_date',
                    'event_time',
                    'venue_name',
                    'venue_address',
                    'quote',
                    'gallery_images'
                ],
                'color_schemes' => [
                    ['name' => 'Classic Black & White', 'primary' => '#000000', 'secondary' => '#FFFFFF', 'accent' => '#F5F5F5'],
                    ['name' => 'Sage Green', 'primary' => '#9CAF88', 'secondary' => '#F8F9FA', 'accent' => '#E8F5E8'],
                    ['name' => 'Navy Blue', 'primary' => '#2C3E50', 'secondary' => '#ECF0F1', 'accent' => '#3498DB']
                ],
                'font_options' => [
                    ['name' => 'Poppins', 'value' => 'Poppins'],
                    ['name' => 'Inter', 'value' => 'Inter'],
                    ['name' => 'Roboto', 'value' => 'Roboto']
                ],
                'is_premium' => true,
                'is_active' => true,
                'downloads_count' => 189,
                'rating' => 4.6,
                'reviews_count' => 43,
                'tags' => 'pernikahan, minimalis, modern, simple, clean',
                'created_by' => null
            ],
            [
                'name' => 'Classic Vintage',
                'description' => 'Template undangan dengan nuansa vintage klasik. Memberikan kesan romantic dan timeless untuk pernikahan yang berkesan.',
                'category' => 'pernikahan',
                'price' => 0,
                'preview_images' => [
                    '/images/templates/classic-vintage-1.jpg',
                    '/images/templates/classic-vintage-2.jpg'
                ],
                'demo_data' => [
                    'bride_name' => 'Putri Maharani',
                    'groom_name' => 'Raden Wijaya',
                    'event_date' => '2024-10-05',
                    'event_time' => '14:00',
                    'venue_name' => 'Gedung Kesenian Jakarta',
                    'venue_address' => 'Jl. Gedung Kesenian No. 1, Jakarta Pusat'
                ],
                'html_structure' => $this->getVintageTemplate(),
                'css_styles' => $this->getVintageStyles(),
                'customizable_fields' => [
                    'bride_name',
                    'groom_name', 
                    'parents_names',
                    'event_date',
                    'event_time',
                    'venue_name',
                    'venue_address',
                    'blessing_info'
                ],
                'color_schemes' => [
                    ['name' => 'Vintage Cream', 'primary' => '#F5E6D3', 'secondary' => '#8B4513', 'accent' => '#DEB887'],
                    ['name' => 'Antique Gold', 'primary' => '#FFD700', 'secondary' => '#B8860B', 'accent' => '#FFF8DC']
                ],
                'font_options' => [
                    ['name' => 'Crimson Text', 'value' => 'Crimson Text'],
                    ['name' => 'Playfair Display', 'value' => 'Playfair Display']
                ],
                'is_premium' => false,
                'is_active' => true,
                'downloads_count' => 567,
                'rating' => 4.5,
                'reviews_count' => 128,
                'tags' => 'pernikahan, vintage, klasik, romantic, timeless',
                'created_by' => null
            ],
            [
                'name' => 'Birthday Party Fun',
                'description' => 'Template undangan ulang tahun yang colorful dan menyenangkan. Perfect untuk merayakan momen spesial dengan keluarga dan teman.',
                'category' => 'ulang_tahun',
                'price' => 25000,
                'preview_images' => [
                    '/images/templates/birthday-fun-1.jpg',
                    '/images/templates/birthday-fun-2.jpg'
                ],
                'demo_data' => [
                    'name' => 'Andi Pratama',
                    'age' => '25',
                    'event_date' => '2024-07-30',
                    'event_time' => '19:00',
                    'venue_name' => 'Sky Lounge Jakarta',
                    'venue_address' => 'Jl. Sudirman No. 52, Jakarta Pusat'
                ],
                'html_structure' => $this->getBirthdayTemplate(),
                'css_styles' => $this->getBirthdayStyles(),
                'customizable_fields' => [
                    'name',
                    'age',
                    'event_date',
                    'event_time',
                    'venue_name',
                    'venue_address',
                    'theme',
                    'dress_code'
                ],
                'color_schemes' => [
                    ['name' => 'Rainbow Bright', 'primary' => '#FF6B6B', 'secondary' => '#4ECDC4', 'accent' => '#FFE66D'],
                    ['name' => 'Pastel Party', 'primary' => '#FF9FF3', 'secondary' => '#54A0FF', 'accent' => '#5F27CD'],
                    ['name' => 'Neon Glow', 'primary' => '#00D2D3', 'secondary' => '#FF9F43', 'accent' => '#EE5A24']
                ],
                'font_options' => [
                    ['name' => 'Comic Neue', 'value' => 'Comic Neue'],
                    ['name' => 'Fredoka One', 'value' => 'Fredoka One'],
                    ['name' => 'Baloo', 'value' => 'Baloo']
                ],
                'is_premium' => true,
                'is_active' => true,
                'downloads_count' => 156,
                'rating' => 4.7,
                'reviews_count' => 34,
                'tags' => 'ulang tahun, fun, colorful, party, celebration',
                'created_by' => null
            ],
            [
                'name' => 'Graduation Ceremony',
                'description' => 'Template undangan wisuda yang formal dan berkesan. Sesuai untuk merayakan pencapaian akademik yang membanggakan.',
                'category' => 'wisuda',
                'price' => 35000,
                'preview_images' => [
                    '/images/templates/graduation-1.jpg',
                    '/images/templates/graduation-2.jpg'
                ],
                'demo_data' => [
                    'graduate_name' => 'Maya Sari',
                    'degree' => 'Sarjana Ekonomi',
                    'university' => 'Universitas Indonesia',
                    'event_date' => '2024-08-25',
                    'event_time' => '09:00',
                    'venue_name' => 'Balai Sidang UI',
                    'venue_address' => 'Depok, Jawa Barat'
                ],
                'html_structure' => $this->getGraduationTemplate(),
                'css_styles' => $this->getGraduationStyles(),
                'customizable_fields' => [
                    'graduate_name',
                    'degree',
                    'university',
                    'gpa',
                    'event_date',
                    'event_time',
                    'venue_name',
                    'venue_address',
                    'family_message'
                ],
                'color_schemes' => [
                    ['name' => 'Academic Navy', 'primary' => '#1E3A8A', 'secondary' => '#DBEAFE', 'accent' => '#FBBF24'],
                    ['name' => 'Classic Black', 'primary' => '#000000', 'secondary' => '#F3F4F6', 'accent' => '#D97706']
                ],
                'font_options' => [
                    ['name' => 'Times New Roman', 'value' => 'Times New Roman'],
                    ['name' => 'Georgia', 'value' => 'Georgia'],
                    ['name' => 'Crimson Text', 'value' => 'Crimson Text']
                ],
                'is_premium' => true,
                'is_active' => true,
                'downloads_count' => 89,
                'rating' => 4.4,
                'reviews_count' => 21,
                'tags' => 'wisuda, graduation, formal, academic, achievement',
                'created_by' => null
            ],
            [
                'name' => 'Baby Shower Cute',
                'description' => 'Template undangan baby shower yang cute dan adorable. Perfect untuk merayakan kedatangan buah hati.',
                'category' => 'baby_shower',
                'price' => 30000,
                'preview_images' => [
                    '/images/templates/baby-shower-1.jpg',
                    '/images/templates/baby-shower-2.jpg'
                ],
                'demo_data' => [
                    'mother_name' => 'Siti Nurhaliza',
                    'father_name' => 'Bambang Sutrisno',
                    'baby_gender' => 'Laki-laki',
                    'event_date' => '2024-09-10',
                    'event_time' => '15:00',
                    'venue_name' => 'Rumah Keluarga',
                    'venue_address' => 'Jl. Cempaka No. 15, Jakarta Timur'
                ],
                'html_structure' => $this->getBabyShowerTemplate(),
                'css_styles' => $this->getBabyShowerStyles(),
                'customizable_fields' => [
                    'mother_name',
                    'father_name',
                    'baby_gender',
                    'due_date',
                    'event_date',
                    'event_time',
                    'venue_name',
                    'venue_address',
                    'registry_info'
                ],
                'color_schemes' => [
                    ['name' => 'Baby Blue', 'primary' => '#87CEEB', 'secondary' => '#F0F8FF', 'accent' => '#FFB6C1'],
                    ['name' => 'Baby Pink', 'primary' => '#FFB6C1', 'secondary' => '#FFF0F5', 'accent' => '#87CEEB'],
                    ['name' => 'Neutral Yellow', 'primary' => '#FFFFE0', 'secondary' => '#FFFACD', 'accent' => '#F0E68C']
                ],
                'font_options' => [
                    ['name' => 'Quicksand', 'value' => 'Quicksand'],
                    ['name' => 'Nunito', 'value' => 'Nunito'],
                    ['name' => 'Comfortaa', 'value' => 'Comfortaa']
                ],
                'is_premium' => true,
                'is_active' => true,
                'downloads_count' => 112,
                'rating' => 4.6,
                'reviews_count' => 28,
                'tags' => 'baby shower, cute, adorable, pregnancy, celebration',
                'created_by' => null
            ]
        ];

        foreach ($templates as $templateData) {
            Template::create($templateData);
        }
    }

    private function getElegantTemplate()
    {
        return '
        <div class="invitation-container elegant-theme">
            <section class="hero-section">
                <div class="ornament-top"></div>
                <h1 class="couple-names">{{bride_name}} & {{groom_name}}</h1>
                <p class="wedding-date">{{event_date}}</p>
                <div class="ornament-bottom"></div>
            </section>
            
            <section class="details-section">
                <h2>Undangan Pernikahan</h2>
                <div class="parents-info">
                    <p>Anak dari:</p>
                    <p>{{parents_bride}} & {{parents_groom}}</p>
                </div>
                <div class="event-details">
                    <h3>Akad Nikah</h3>
                    <p class="time">{{event_time}}</p>
                    <p class="venue">{{venue_name}}</p>
                    <p class="address">{{venue_address}}</p>
                </div>
            </section>
            
            <section class="gallery-section">
                <h2>Our Gallery</h2>
                <div class="gallery-grid">{{gallery_images}}</div>
            </section>
            
            <section class="rsvp-section">
                <h2>RSVP</h2>
                <div class="rsvp-form">{{rsvp_form}}</div>
            </section>
        </div>';
    }

    private function getElegantStyles()
    {
        return '
        .elegant-theme {
            font-family: "Playfair Display", serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        
        .hero-section {
            text-align: center;
            padding: 80px 20px;
            background: url("ornament-bg.png") center/cover;
        }
        
        .couple-names {
            font-size: 3.5rem;
            color: #E8B4B8;
            margin: 20px 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        
        .wedding-date {
            font-size: 1.5rem;
            color: #C9A96E;
            font-style: italic;
        }
        
        .details-section {
            padding: 60px 20px;
            background: white;
            margin: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }';
    }

    private function getMinimalistTemplate()
    {
        return '
        <div class="invitation-container minimalist-theme">
            <section class="hero-section">
                <h1 class="couple-names">{{bride_name}} <span>&</span> {{groom_name}}</h1>
                <p class="quote">{{quote}}</p>
                <div class="date-time">
                    <p class="date">{{event_date}}</p>
                    <p class="time">{{event_time}}</p>
                </div>
            </section>
            
            <section class="venue-section">
                <h2>Venue</h2>
                <p class="venue-name">{{venue_name}}</p>
                <p class="venue-address">{{venue_address}}</p>
                <button class="map-button">View on Map</button>
            </section>
        </div>';
    }

    private function getMinimalistStyles()
    {
        return '
        .minimalist-theme {
            font-family: "Poppins", sans-serif;
            color: #2C3E50;
            line-height: 1.6;
        }
        
        .hero-section {
            text-align: center;
            padding: 100px 20px;
            background: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9));
        }
        
        .couple-names {
            font-size: 2.5rem;
            font-weight: 300;
            margin-bottom: 30px;
        }
        
        .couple-names span {
            font-style: italic;
            font-size: 2rem;
        }';
    }

    private function getVintageTemplate()
    {
        return '
        <div class="invitation-container vintage-theme">
            <div class="vintage-border">
                <section class="header-section">
                    <div class="vintage-ornament"></div>
                    <h1>{{bride_name}} & {{groom_name}}</h1>
                    <p class="subtitle">Together with their families</p>
                </section>
                
                <section class="ceremony-details">
                    <h2>Request the pleasure of your company</h2>
                    <p class="date">{{event_date}}</p>
                    <p class="venue">{{venue_name}}</p>
                    <p class="address">{{venue_address}}</p>
                </section>
            </div>
        </div>';
    }

    private function getVintageStyles()
    {
        return '
        .vintage-theme {
            font-family: "Crimson Text", serif;
            background: #F5E6D3;
            color: #8B4513;
        }
        
        .vintage-border {
            border: 5px solid #8B4513;
            margin: 20px;
            padding: 40px;
            background: white;
        }
        
        .header-section h1 {
            font-size: 2.8rem;
            text-align: center;
            margin: 20px 0;
        }';
    }

    private function getBirthdayTemplate()
    {
        return '
        <div class="invitation-container birthday-theme">
            <section class="party-header">
                <div class="confetti"></div>
                <h1>🎉 Birthday Party! 🎉</h1>
                <h2>{{name}} is turning {{age}}!</h2>
                <p class="celebration-text">Join us for a fun celebration!</p>
            </section>
            
            <section class="party-details">
                <div class="detail-card">
                    <h3>📅 When</h3>
                    <p>{{event_date}} at {{event_time}}</p>
                </div>
                <div class="detail-card">
                    <h3>📍 Where</h3>
                    <p>{{venue_name}}</p>
                    <p>{{venue_address}}</p>
                </div>
            </section>
        </div>';
    }

    private function getBirthdayStyles()
    {
        return '
        .birthday-theme {
            font-family: "Comic Neue", cursive;
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4, #FFE66D);
            color: white;
        }
        
        .party-header {
            text-align: center;
            padding: 60px 20px;
        }
        
        .party-header h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            animation: bounce 2s infinite;
        }';
    }

    private function getGraduationTemplate()
    {
        return '
        <div class="invitation-container graduation-theme">
            <section class="grad-header">
                <div class="cap-icon">🎓</div>
                <h1>Graduation Ceremony</h1>
                <h2>{{graduate_name}}</h2>
                <p class="degree">{{degree}}</p>
                <p class="university">{{university}}</p>
            </section>
            
            <section class="ceremony-info">
                <h3>Join us in celebrating this achievement</h3>
                <p class="date">{{event_date}} at {{event_time}}</p>
                <p class="venue">{{venue_name}}</p>
                <p class="address">{{venue_address}}</p>
            </section>
        </div>';
    }

    private function getGraduationStyles()
    {
        return '
        .graduation-theme {
            font-family: "Times New Roman", serif;
            background: #1E3A8A;
            color: white;
        }
        
        .grad-header {
            text-align: center;
            padding: 80px 20px;
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3));
        }
        
        .cap-icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }';
    }

    private function getBabyShowerTemplate()
    {
        return '
        <div class="invitation-container baby-shower-theme">
            <section class="baby-header">
                <h1>👶 Baby Shower 👶</h1>
                <p class="parents">For {{mother_name}} & {{father_name}}</p>
                <p class="baby-info">Expecting a {{baby_gender}}</p>
            </section>
            
            <section class="shower-details">
                <h3>Join us for a special celebration</h3>
                <p class="date">{{event_date}} at {{event_time}}</p>
                <p class="venue">{{venue_name}}</p>
                <p class="address">{{venue_address}}</p>
            </section>
        </div>';
    }

    private function getBabyShowerStyles()
    {
        return '
        .baby-shower-theme {
            font-family: "Quicksand", sans-serif;
            background: linear-gradient(135deg, #87CEEB 0%, #F0F8FF 100%);
            color: #4682B4;
        }
        
        .baby-header {
            text-align: center;
            padding: 60px 20px;
        }
        
        .baby-header h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }';
    }
}
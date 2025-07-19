@extends('layouts.app')

@section('title', 'Undangan Online - Buat Undangan Digital Impianmu')
@section('description', 'Platform terbaik untuk membuat undangan digital yang elegan dan modern. Template premium, editor mudah, dan fitur lengkap untuk undangan pernikahan, ulang tahun, dan acara spesial lainnya.')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 bg-gradient-to-br from-cream-50 via-white to-blush-50"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-rose-gold-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse-slow"></div>
    <div class="absolute top-1/3 right-1/4 w-80 h-80 bg-blush-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse-slow animation-delay-2000"></div>
    <div class="absolute bottom-1/4 left-1/3 w-72 h-72 bg-sage-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse-slow animation-delay-4000"></div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-20 animate-float">
        <div class="w-4 h-4 bg-rose-gold-400 rounded-full opacity-60"></div>
    </div>
    <div class="absolute top-40 right-32 animate-float animation-delay-1000">
        <div class="w-6 h-6 bg-blush-400 rounded-full opacity-60"></div>
    </div>
    <div class="absolute bottom-32 left-16 animate-float animation-delay-2000">
        <div class="w-5 h-5 bg-sage-400 rounded-full opacity-60"></div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-fade-in">
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/80 backdrop-blur-sm border border-rose-gold-200 text-rose-gold-700 text-sm font-medium mb-8 animate-bounce-in">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                Platform Undangan Digital Terpercaya
            </div>

            <!-- Main Headline -->
            <h1 class="text-5xl md:text-7xl font-elegant font-bold text-gray-900 mb-6 animate-slide-up">
                Wujudkan Undangan
                <span class="bg-gradient-to-r from-rose-gold-500 via-blush-500 to-rose-gold-600 bg-clip-text text-transparent animate-gradient bg-300%">
                    Impianmu
                </span>
            </h1>

            <!-- Subtitle -->
            <p class="text-xl md:text-2xl text-gray-600 mb-8 max-w-4xl mx-auto leading-relaxed animate-slide-up animation-delay-200">
                Buat undangan digital yang <span class="font-script text-rose-gold-600 text-2xl md:text-3xl">elegan</span> dan <span class="font-script text-blush-600 text-2xl md:text-3xl">modern</span> dengan template premium dan editor yang mudah digunakan
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12 animate-slide-up animation-delay-400">
                <a href="{{ route('templates.index') }}" class="group bg-gradient-to-r from-rose-gold-500 to-blush-500 text-white px-8 py-4 rounded-full font-semibold text-lg hover:shadow-dreamy transform hover:-translate-y-1 transition-all duration-300 flex items-center">
                    <svg class="w-5 h-5 mr-2 group-hover:animate-wiggle" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                    Pilih Template
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                
                <a href="#demo" class="group bg-white text-gray-700 px-8 py-4 rounded-full font-semibold text-lg border-2 border-gray-200 hover:border-rose-gold-300 hover:shadow-soft transform hover:-translate-y-1 transition-all duration-300 flex items-center">
                    <svg class="w-5 h-5 mr-2 group-hover:animate-heart-beat text-rose-gold-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12l-2-2m0 0l-2-2m2 2l-2 2m2-2l2-2"/>
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd"/>
                    </svg>
                    Lihat Demo
                </a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-8 max-w-2xl mx-auto animate-slide-up animation-delay-600">
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-rose-gold-600 mb-2">500+</div>
                    <div class="text-gray-600 text-sm md:text-base">Template Premium</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-blush-600 mb-2">10K+</div>
                    <div class="text-gray-600 text-sm md:text-base">Undangan Dibuat</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-sage-600 mb-2">99%</div>
                    <div class="text-gray-600 text-sm md:text-base">Customer Puas</div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white" id="features">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-elegant font-bold text-gray-900 mb-6">
                Kenapa Memilih <span class="text-rose-gold-600">Kami?</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Platform undangan digital yang memberikan kemudahan, kualitas premium, dan hasil yang memukau
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="group bg-gradient-to-br from-cream-50 to-white p-8 rounded-2xl shadow-soft hover:shadow-elegant transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-rose-gold-400 to-blush-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Template Premium</h3>
                <p class="text-gray-600 leading-relaxed">
                    Koleksi template undangan yang elegan dan modern, dirancang oleh desainer profesional untuk setiap momen spesial Anda.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="group bg-gradient-to-br from-blush-50 to-white p-8 rounded-2xl shadow-soft hover:shadow-elegant transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blush-400 to-rose-gold-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Editor Mudah</h3>
                <p class="text-gray-600 leading-relaxed">
                    Interface yang intuitif dan user-friendly, memungkinkan Anda mengedit undangan dengan mudah tanpa skill design.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="group bg-gradient-to-br from-sage-50 to-white p-8 rounded-2xl shadow-soft hover:shadow-elegant transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-sage-400 to-blush-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Download Instant</h3>
                <p class="text-gray-600 leading-relaxed">
                    Undangan siap download dalam berbagai format berkualitas tinggi, cocok untuk dibagikan digital atau dicetak.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="group bg-gradient-to-br from-cream-50 to-white p-8 rounded-2xl shadow-soft hover:shadow-elegant transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-rose-gold-400 to-sage-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">RSVP & Guest List</h3>
                <p class="text-gray-600 leading-relaxed">
                    Fitur RSVP terintegrasi dan manajemen guest list yang memudahkan Anda melacak kehadiran tamu undangan.
                </p>
            </div>

            <!-- Feature 5 -->
            <div class="group bg-gradient-to-br from-blush-50 to-white p-8 rounded-2xl shadow-soft hover:shadow-elegant transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blush-400 to-sage-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Custom Domain</h3>
                <p class="text-gray-600 leading-relaxed">
                    Gunakan domain personal untuk undangan digital Anda, memberikan kesan yang lebih profesional dan memorable.
                </p>
            </div>

            <!-- Feature 6 -->
            <div class="group bg-gradient-to-br from-sage-50 to-white p-8 rounded-2xl shadow-soft hover:shadow-elegant transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-sage-400 to-rose-gold-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Support 24/7</h3>
                <p class="text-gray-600 leading-relaxed">
                    Tim support yang siap membantu Anda kapan saja, memberikan panduan dan solusi untuk setiap kebutuhan.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Demo Section -->
<section class="py-20 bg-gradient-to-br from-cream-50 to-white" id="demo">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-elegant font-bold text-gray-900 mb-6">
                Lihat <span class="text-blush-600">Contoh</span> Undangan
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Template undangan yang telah dipercaya oleh ribuan pengguna untuk momen spesial mereka
            </p>
        </div>

        <!-- Demo Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @for($i = 1; $i <= 6; $i++)
            <div class="group bg-white rounded-2xl shadow-soft hover:shadow-elegant transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                <div class="aspect-w-3 aspect-h-4 bg-gradient-to-br from-rose-gold-100 to-blush-100 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-rose-gold-200/50 to-blush-200/50 group-hover:scale-110 transition-transform duration-500"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center text-gray-600">
                            <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                            </svg>
                            <p class="font-script text-2xl">Template {{ $i }}</p>
                        </div>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-white/90 text-rose-gold-600 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $i % 2 == 0 ? 'Premium' : 'Gratis' }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-semibold text-lg text-gray-900 mb-2">Template {{ $i % 3 == 0 ? 'Elegan' : ($i % 2 == 0 ? 'Modern' : 'Classic') }}</h3>
                    <p class="text-gray-600 text-sm mb-4">Perfect untuk {{ $i % 3 == 0 ? 'pernikahan' : ($i % 2 == 0 ? 'ulang tahun' : 'wisuda') }}</p>
                    <div class="flex justify-between items-center">
                        <span class="font-semibold text-rose-gold-600">
                            {{ $i % 2 == 0 ? 'Rp 49.000' : 'Gratis' }}
                        </span>
                        <button class="bg-gradient-to-r from-rose-gold-500 to-blush-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <!-- CTA -->
        <div class="text-center">
            <a href="{{ route('templates.index') }}" class="inline-flex items-center bg-gradient-to-r from-rose-gold-500 to-blush-500 text-white px-8 py-4 rounded-full font-semibold text-lg hover:shadow-dreamy transform hover:-translate-y-1 transition-all duration-300">
                Lihat Semua Template
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-elegant font-bold text-gray-900 mb-6">
                Apa Kata <span class="text-sage-600">Mereka?</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Testimoni dari ribuan pengguna yang telah mempercayakan momen spesial mereka kepada kami
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
            $testimonials = [
                [
                    'name' => 'Sarah & Ahmad',
                    'event' => 'Pernikahan',
                    'rating' => 5,
                    'text' => 'Template undangannya sangat elegan dan mudah disesuaikan. Tamu-tamu kami semua terpukau dengan designnya!',
                    'avatar' => 'S'
                ],
                [
                    'name' => 'Rina Sari',
                    'event' => 'Ulang Tahun',
                    'rating' => 5,
                    'text' => 'Proses pembuatan undangan sangat mudah dan cepat. Customer service juga sangat responsif membantu.',
                    'avatar' => 'R'
                ],
                [
                    'name' => 'David Chen',
                    'event' => 'Wisuda',
                    'rating' => 5,
                    'text' => 'Kualitas template premium benar-benar worth it. Hasil akhirnya melebihi ekspektasi saya.',
                    'avatar' => 'D'
                ]
            ];
            @endphp

            @foreach($testimonials as $testimonial)
            <div class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl shadow-soft hover:shadow-elegant transition-all duration-300 transform hover:-translate-y-2">
                <!-- Stars -->
                <div class="flex space-x-1 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>

                <!-- Testimonial Text -->
                <p class="text-gray-600 leading-relaxed mb-6 italic">
                    "{{ $testimonial['text'] }}"
                </p>

                <!-- Author -->
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-rose-gold-400 to-blush-500 rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-semibold">{{ $testimonial['avatar'] }}</span>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">{{ $testimonial['name'] }}</div>
                        <div class="text-sm text-gray-500">{{ $testimonial['event'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-br from-rose-gold-500 via-blush-500 to-rose-gold-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-elegant font-bold text-white mb-6">
            Siap Membuat Undangan Impianmu?
        </h2>
        <p class="text-xl text-white/90 mb-8 leading-relaxed">
            Bergabunglah dengan ribuan pengguna yang telah mempercayakan momen spesial mereka kepada kami
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('register') }}" class="bg-white text-rose-gold-600 px-8 py-4 rounded-full font-semibold text-lg hover:shadow-dreamy transform hover:-translate-y-1 transition-all duration-300 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                </svg>
                Daftar Gratis Sekarang
            </a>
            
            <a href="{{ route('templates.index') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-rose-gold-600 transition-all duration-300 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                </svg>
                Jelajahi Template
            </a>
        </div>
        
        <!-- Trust Indicators -->
        <div class="mt-12 flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-8 text-white/80">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Gratis Forever
            </div>
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                No Credit Card Required
            </div>
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Setup in 5 Minutes
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .animation-delay-200 { animation-delay: 200ms; }
    .animation-delay-400 { animation-delay: 400ms; }
    .animation-delay-600 { animation-delay: 600ms; }
    .animation-delay-1000 { animation-delay: 1000ms; }
    .animation-delay-2000 { animation-delay: 2000ms; }
    .animation-delay-4000 { animation-delay: 4000ms; }
    
    .bg-300\% { background-size: 300% 300%; }
    
    @media (max-width: 768px) {
        .aspect-w-3 { position: relative; }
        .aspect-w-3::before { content: ""; display: block; padding-bottom: 133.33%; }
        .aspect-h-4 > * { position: absolute; top: 0; right: 0; bottom: 0; left: 0; }
    }
</style>
@endpush
@endsection
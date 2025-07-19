@extends('layouts.app')

@section('title', 'Beranda')
@section('description', 'Platform template undangan online terbaik dengan desain modern dan animasi yang memukau')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-red-600 via-red-700 to-gray-700 text-white overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-72 h-72 bg-white opacity-10 rounded-full -translate-x-1/2 -translate-y-1/2 animate-float"></div>
            <div class="absolute top-1/4 right-0 w-96 h-96 bg-white opacity-5 rounded-full translate-x-1/2 animate-float" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-0 left-1/4 w-64 h-64 bg-white opacity-10 rounded-full -translate-y-1/2 animate-float" style="animation-delay: 2s;"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="text-center">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-on-scroll" data-aos="fade-up">
                    Buat Undangan Digital
                    <span class="text-gradient">Yang Memukau</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90 animate-on-scroll" data-aos="fade-up" data-aos-delay="200">
                    Platform template undangan online terbaik dengan desain modern, animasi yang memukau, 
                    dan kemudahan kustomisasi untuk momen spesial Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center animate-on-scroll" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('templates.index') }}" class="btn-primary text-lg px-8 py-4">
                        Lihat Template
                    </a>
                    <a href="{{ route('custom-requests.create') }}" class="btn-outline text-lg px-8 py-4 border-white text-white hover:bg-white hover:text-red-600">
                        Custom Request
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white" id="features">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="section-title" data-aos="fade-up">Mengapa Memilih Kami?</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                    Kami menyediakan solusi lengkap untuk undangan digital Anda dengan fitur-fitur terbaik
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card p-8 text-center animate-on-scroll" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Template Berkualitas</h3>
                    <p class="text-gray-600">
                        Koleksi template undangan yang dirancang oleh desainer profesional dengan berbagai tema dan gaya.
                    </p>
                </div>
                
                <div class="card p-8 text-center animate-on-scroll" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Animasi Memukau</h3>
                    <p class="text-gray-600">
                        Animasi dan transisi yang smooth dan elegan untuk memberikan pengalaman yang tak terlupakan.
                    </p>
                </div>
                
                <div class="card p-8 text-center animate-on-scroll" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Kustomisasi Mudah</h3>
                    <p class="text-gray-600">
                        Editor yang user-friendly untuk mengkustomisasi template sesuai kebutuhan Anda dengan mudah.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Templates Section -->
    <section class="py-20 bg-gray-50" id="templates">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="section-title" data-aos="fade-up">Template Unggulan</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                    Pilihan template terbaik yang paling populer dan sering digunakan
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredTemplates as $template)
                <div class="card overflow-hidden animate-on-scroll" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="relative h-64 bg-gradient-to-br from-gray-200 to-gray-300">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-gray-500 text-lg">{{ $template->name }}</span>
                        </div>
                        @if($template->is_featured)
                        <div class="absolute top-4 right-4 bg-primary-600 text-white px-2 py-1 rounded-full text-xs font-medium">
                            Featured
                        </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $template->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($template->description, 100) }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-red-600">Rp {{ number_format($template->price) }}</span>
                            <a href="{{ route('templates.show', $template) }}" class="btn-primary">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('templates.index') }}" class="btn-outline text-lg px-8 py-4">
                    Lihat Semua Template
                </a>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-20 bg-white" id="how-it-works">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="section-title" data-aos="fade-up">Cara Kerja</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                    Hanya dalam 3 langkah sederhana, undangan digital Anda siap digunakan
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center animate-on-scroll" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold">
                        1
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Pilih Template</h3>
                    <p class="text-gray-600">
                        Pilih template yang sesuai dengan tema dan gaya acara Anda dari koleksi kami.
                    </p>
                </div>
                
                <div class="text-center animate-on-scroll" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold">
                        2
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Kustomisasi</h3>
                    <p class="text-gray-600">
                        Edit konten, warna, font, dan elemen lainnya sesuai dengan kebutuhan Anda.
                    </p>
                </div>
                
                <div class="text-center animate-on-scroll" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-20 h-20 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold">
                        3
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Publish & Share</h3>
                    <p class="text-gray-600">
                        Undangan siap dipublikasikan dan dapat dibagikan ke semua tamu Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 animate-on-scroll" data-aos="fade-up">
                Siap Membuat Undangan Digital?
            </h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90 animate-on-scroll" data-aos="fade-up" data-aos-delay="200">
                Mulai sekarang dan buat undangan digital yang tak terlupakan untuk momen spesial Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-on-scroll" data-aos="fade-up" data-aos-delay="400">
                <a href="{{ route('templates.index') }}" class="bg-white text-red-600 hover:bg-gray-100 font-medium py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105">
                    Mulai Sekarang
                </a>
                <a href="{{ route('custom-requests.create') }}" class="border-2 border-white text-white hover:bg-white hover:text-red-600 font-medium py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105">
                    Custom Request
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-white" id="about">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="animate-on-scroll" data-aos="fade-right">
                    <h2 class="text-4xl font-bold mb-6">Tentang WeddingInvite</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        WeddingInvite adalah platform terdepan untuk membuat undangan digital yang memukau. 
                        Kami menggabungkan teknologi modern dengan desain yang elegan untuk memberikan 
                        pengalaman yang tak terlupakan.
                    </p>
                    <p class="text-lg text-gray-600 mb-8">
                        Dengan tim desainer dan developer yang berpengalaman, kami berkomitmen untuk 
                        memberikan solusi terbaik bagi setiap momen spesial Anda.
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-red-600 mb-2">1000+</div>
                            <div class="text-gray-600">Template Tersedia</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-red-600 mb-2">50K+</div>
                            <div class="text-gray-600">Undangan Dibuat</div>
                        </div>
                    </div>
                </div>
                
                <div class="animate-on-scroll" data-aos="fade-left">
                    <div class="bg-gradient-to-br from-gray-200 to-gray-300 rounded-2xl h-96 flex items-center justify-center">
                        <span class="text-gray-500 text-lg">Image Placeholder</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
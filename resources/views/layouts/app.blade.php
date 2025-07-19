<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Undangan Online - Buat Undangan Digital Impianmu')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Dancing+Script:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&family=Crimson+Text:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'Platform terbaik untuk membuat undangan digital yang elegan dan modern. Template premium, editor mudah, dan fitur lengkap.')">
    <meta name="keywords" content="undangan online, undangan digital, template undangan, undangan pernikahan, undangan elegant">
    <meta name="author" content="Undangan Online">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title', 'Undangan Online - Buat Undangan Digital Impianmu')">
    <meta property="og:description" content="@yield('description', 'Platform terbaik untuk membuat undangan digital yang elegan dan modern.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Undangan Online')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom Styles -->
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gradient-to-br from-cream-50 via-white to-blush-50 min-h-screen">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md bg-white/80 border-b border-gray-200/20 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                        <div class="relative">
                            <div class="w-10 h-10 bg-gradient-to-br from-rose-gold-400 to-blush-500 rounded-lg flex items-center justify-center transform group-hover:scale-110 transition-transform duration-200">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <div class="absolute -inset-1 bg-gradient-to-br from-rose-gold-400 to-blush-500 rounded-lg blur opacity-30 group-hover:opacity-50 transition-opacity duration-200"></div>
                        </div>
                        <span class="text-xl font-elegant font-semibold text-gray-800 group-hover:text-rose-gold-600 transition-colors duration-200">
                            Undangan<span class="text-rose-gold-500">Online</span>
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('templates.index') }}" class="text-gray-700 hover:text-rose-gold-600 font-medium transition-colors duration-200 relative group">
                        Template
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-rose-gold-500 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-rose-gold-600 font-medium transition-colors duration-200 relative group">
                        Galeri
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-rose-gold-500 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('pricing') }}" class="text-gray-700 hover:text-rose-gold-600 font-medium transition-colors duration-200 relative group">
                        Harga
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-rose-gold-500 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('custom-request') }}" class="text-gray-700 hover:text-rose-gold-600 font-medium transition-colors duration-200 relative group">
                        Custom Request
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-rose-gold-500 group-hover:w-full transition-all duration-300"></span>
                    </a>

                    @auth
                        <!-- User Menu -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-rose-gold-600 transition-colors duration-200">
                                <div class="w-8 h-8 bg-gradient-to-br from-rose-gold-400 to-blush-500 rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm font-medium">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                </div>
                                <span class="font-medium">{{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-elegant border border-gray-200 py-2">
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                    Dashboard
                                </a>
                                <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                    Profil Saya
                                </a>
                                <a href="{{ route('my-invitations') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                    Undangan Saya
                                </a>
                                <a href="{{ route('orders') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                    Pesanan
                                </a>
                                <hr class="my-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-200">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Auth Buttons -->
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-rose-gold-600 font-medium transition-colors duration-200">
                                Masuk
                            </a>
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-rose-gold-500 to-blush-500 text-white px-6 py-2 rounded-full font-medium hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                                Daftar Gratis
                            </a>
                        </div>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button class="text-gray-700 hover:text-rose-gold-600 transition-colors duration-200" id="mobile-menu-btn">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-gray-200">
                <a href="{{ route('templates.index') }}" class="block px-3 py-2 text-gray-700 hover:text-rose-gold-600 font-medium transition-colors duration-200">
                    Template
                </a>
                <a href="{{ route('gallery') }}" class="block px-3 py-2 text-gray-700 hover:text-rose-gold-600 font-medium transition-colors duration-200">
                    Galeri
                </a>
                <a href="{{ route('pricing') }}" class="block px-3 py-2 text-gray-700 hover:text-rose-gold-600 font-medium transition-colors duration-200">
                    Harga
                </a>
                <a href="{{ route('custom-request') }}" class="block px-3 py-2 text-gray-700 hover:text-rose-gold-600 font-medium transition-colors duration-200">
                    Custom Request
                </a>

                @auth
                    <hr class="my-2">
                    <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-gray-700 hover:text-rose-gold-600 font-medium transition-colors duration-200">
                        Dashboard
                    </a>
                    <a href="{{ route('profile') }}" class="block px-3 py-2 text-gray-700 hover:text-rose-gold-600 font-medium transition-colors duration-200">
                        Profil Saya
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 text-red-600 hover:text-red-700 font-medium transition-colors duration-200">
                            Logout
                        </button>
                    </form>
                @else
                    <hr class="my-2">
                    <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-700 hover:text-rose-gold-600 font-medium transition-colors duration-200">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 bg-gradient-to-r from-rose-gold-500 to-blush-500 text-white font-medium rounded-lg mx-3 text-center transition-all duration-200">
                        Daftar Gratis
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-rose-gold-400 to-blush-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <span class="text-lg font-elegant font-semibold">
                            Undangan<span class="text-rose-gold-400">Online</span>
                        </span>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        Platform terbaik untuk membuat undangan digital yang elegan dan modern. Wujudkan undangan impian Anda dengan mudah.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-rose-gold-400 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-rose-gold-400 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-rose-gold-400 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.120.112.225.085.347-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.748-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z."/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-rose-gold-400 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-semibold text-lg mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('templates.index') }}" class="text-gray-300 hover:text-rose-gold-400 transition-colors duration-200">Template</a></li>
                        <li><a href="{{ route('gallery') }}" class="text-gray-300 hover:text-rose-gold-400 transition-colors duration-200">Galeri</a></li>
                        <li><a href="{{ route('pricing') }}" class="text-gray-300 hover:text-rose-gold-400 transition-colors duration-200">Harga</a></li>
                        <li><a href="{{ route('custom-request') }}" class="text-gray-300 hover:text-rose-gold-400 transition-colors duration-200">Custom Request</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h3 class="font-semibold text-lg mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('help') }}" class="text-gray-300 hover:text-rose-gold-400 transition-colors duration-200">Bantuan</a></li>
                        <li><a href="{{ route('faq') }}" class="text-gray-300 hover:text-rose-gold-400 transition-colors duration-200">FAQ</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-rose-gold-400 transition-colors duration-200">Kontak</a></li>
                        <li><a href="{{ route('tutorial') }}" class="text-gray-300 hover:text-rose-gold-400 transition-colors duration-200">Tutorial</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="font-semibold text-lg mb-4">Kontak Kami</h3>
                    <div class="space-y-2">
                        <p class="text-gray-300 text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            support@undanganonline.com
                        </p>
                        <p class="text-gray-300 text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            +62 812-3456-7890
                        </p>
                        <p class="text-gray-300 text-sm flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            Jakarta, Indonesia
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} UndanganOnline. All rights reserved.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="{{ route('privacy') }}" class="text-gray-400 hover:text-rose-gold-400 text-sm transition-colors duration-200">Privacy Policy</a>
                    <a href="{{ route('terms') }}" class="text-gray-400 hover:text-rose-gold-400 text-sm transition-colors duration-200">Terms of Service</a>
                    <a href="{{ route('sitemap') }}" class="text-gray-400 hover:text-rose-gold-400 text-sm transition-colors duration-200">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-8 right-8 bg-gradient-to-r from-rose-gold-500 to-blush-500 text-white p-3 rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 opacity-0 invisible">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Custom Scripts -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            const backToTop = document.getElementById('back-to-top');
            
            if (window.scrollY > 100) {
                navbar.classList.add('bg-white/95', 'shadow-soft');
                backToTop.classList.remove('opacity-0', 'invisible');
            } else {
                navbar.classList.remove('bg-white/95', 'shadow-soft');
                backToTop.classList.add('opacity-0', 'invisible');
            }
        });

        // Back to top functionality
        document.getElementById('back-to-top').addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
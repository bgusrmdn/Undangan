# WeddingInvite - Platform Template Undangan Online

Platform template undangan online yang modern dengan desain elegan dan animasi yang memukau. Dibangun menggunakan Laravel dan teknologi frontend modern.

## 🚀 Fitur Utama

### Untuk Customer
- **Template Berkualitas**: Koleksi template undangan yang dirancang oleh desainer profesional
- **Kustomisasi Mudah**: Editor yang user-friendly untuk mengkustomisasi template
- **Animasi Memukau**: Animasi dan transisi yang smooth dan elegan
- **Responsive Design**: Tampilan yang optimal di semua perangkat
- **Custom Request**: Layanan pembuatan undangan custom sesuai kebutuhan

### Untuk Admin
- **Manajemen Template**: CRUD untuk template undangan
- **Manajemen User**: Kelola user customer, admin, dan editor
- **Manajemen Order**: Monitor dan kelola pesanan
- **Custom Request Management**: Assign dan monitor custom request

### Untuk Editor
- **Dashboard Editor**: Interface khusus untuk editor
- **Assigned Requests**: Lihat dan kerjakan custom request yang diassign
- **Progress Tracking**: Update progress pekerjaan

## 🛠️ Teknologi yang Digunakan

### Backend
- **Laravel 12**: Framework PHP modern
- **SQLite**: Database (development)
- **Eloquent ORM**: Database abstraction layer
- **Laravel UI**: Authentication scaffolding

### Frontend
- **Tailwind CSS**: Utility-first CSS framework
- **Alpine.js**: Lightweight JavaScript framework
- **AOS (Animate On Scroll)**: Library animasi scroll
- **GSAP**: Advanced animations
- **Framer Motion**: React animation library (optional)

### Development Tools
- **Vite**: Build tool dan development server
- **Laravel Mix**: Asset compilation
- **PHPUnit**: Testing framework

## 📋 Struktur Database

### Tabel Utama
1. **users** - Data pengguna (customer, admin, editor)
2. **templates** - Katalog template undangan
3. **orders** - Data pesanan template
4. **custom_requests** - Permintaan custom undangan

### Relasi
- User dapat memiliki banyak Order dan CustomRequest
- Template dapat dipesan oleh banyak User
- CustomRequest dapat diassign ke Editor

## 🚀 Instalasi

### Prerequisites
- PHP 8.1+
- Composer
- Node.js 16+
- npm atau yarn

### Langkah Instalasi

1. **Clone Repository**
```bash
git clone <repository-url>
cd wedding-invitation-platform
```

2. **Install Dependencies**
```bash
composer install
npm install
```

3. **Setup Environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Setup Database**
```bash
php artisan migrate
php artisan db:seed
```

5. **Build Assets**
```bash
npm run build
```

6. **Jalankan Server**
```bash
php artisan serve
npm run dev
```

## 👥 User Default

Setelah menjalankan seeder, tersedia user default:

### Admin
- Email: `admin@weddinginvitation.com`
- Password: `password123`
- Role: `admin`

### Editor
- Email: `editor@weddinginvitation.com`
- Password: `password123`
- Role: `editor`

### Customer
- Email: `john@example.com`
- Password: `password123`
- Role: `customer`

## 📁 Struktur Proyek

```
wedding-invitation-platform/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── TemplateController.php
│   │   ├── OrderController.php
│   │   └── CustomRequestController.php
│   ├── Models/
│   │   ├── Template.php
│   │   ├── Order.php
│   │   └── CustomRequest.php
│   └── Http/Middleware/
│       └── CheckRole.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   ├── templates/
│   │   ├── auth/
│   │   └── home.blade.php
│   ├── css/
│   └── js/
├── routes/
│   └── web.php
└── public/
```

## 🎨 Template System

### Struktur Template
Setiap template memiliki:
- **Preview Image**: Gambar preview template
- **Template Data**: JSON data untuk konfigurasi template
- **Category**: Kategori template (wedding, birthday, anniversary)
- **Price**: Harga template
- **Features**: Fitur yang tersedia

### Customization Options
- Warna dan tema
- Font dan typography
- Layout dan sections
- Animasi dan transisi
- Konten dan media

## 🔐 Authentication & Authorization

### Role-based Access Control
- **Customer**: Akses ke template, order, custom request
- **Admin**: Full access ke semua fitur
- **Editor**: Akses ke custom request yang diassign

### Middleware
- `auth`: Memastikan user sudah login
- `role`: Memastikan user memiliki role yang sesuai

## 📱 Responsive Design

Aplikasi didesain responsif untuk:
- Desktop (1024px+)
- Tablet (768px - 1023px)
- Mobile (320px - 767px)

## 🎭 Animasi & Transisi

### Animasi yang Tersedia
- **Fade In/Out**: Transisi opacity
- **Slide Up/Down**: Transisi transform
- **Scale**: Efek zoom
- **Float**: Animasi mengambang
- **Bounce**: Efek pantulan

### Library Animasi
- **AOS**: Scroll-triggered animations
- **GSAP**: Advanced timeline animations
- **CSS Transitions**: Smooth hover effects

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter=TemplateTest
```

## 📦 Deployment

### Production Setup
1. Set environment variables
2. Run migrations
3. Build assets: `npm run build`
4. Configure web server (Apache/Nginx)
5. Set up SSL certificate
6. Configure caching

### Environment Variables
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=weddinginvite
DB_USERNAME=username
DB_PASSWORD=password
```

## 🤝 Contributing

1. Fork repository
2. Create feature branch
3. Commit changes
4. Push to branch
5. Create Pull Request

## 📄 License

This project is licensed under the MIT License.

## 📞 Support

Untuk dukungan teknis atau pertanyaan:
- Email: support@weddinginvitation.com
- Documentation: [Link ke dokumentasi]
- Issues: [GitHub Issues]

## 🗺️ Roadmap

### Phase 1 (Current)
- ✅ Basic template system
- ✅ User authentication
- ✅ Order management
- ✅ Custom request system

### Phase 2 (Next)
- 🔄 Advanced template editor
- 🔄 Payment integration
- 🔄 Email notifications
- 🔄 Analytics dashboard

### Phase 3 (Future)
- 📋 AI-powered template suggestions
- 📋 Social media integration
- 📋 Multi-language support
- 📋 Mobile app

---

**WeddingInvite** - Membuat momen spesial menjadi tak terlupakan dengan undangan digital yang memukau! ✨

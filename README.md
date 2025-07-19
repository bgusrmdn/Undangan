# 🎉 Platform Undangan Online

Platform undangan digital modern yang memungkinkan pengguna membuat undangan yang elegan dan menarik untuk berbagai acara seperti pernikahan, ulang tahun, wisuda, dan acara spesial lainnya.

## ✨ Fitur Utama

### 🎨 Template Premium
- **500+ Template Berkualitas**: Koleksi template yang dirancang oleh desainer profesional
- **Multi-Category**: Pernikahan, ulang tahun, wisuda, baby shower, dan lainnya
- **Customizable**: Setiap template dapat disesuaikan sepenuhnya
- **Responsive Design**: Tampil sempurna di semua device

### 🖼️ Editor Visual Canggih
- **Live Preview**: Lihat perubahan secara real-time
- **Drag & Drop**: Interface yang mudah digunakan
- **Custom Colors**: Pilih skema warna sesuai keinginan
- **Font Options**: Berbagai pilihan font elegant
- **Image Upload**: Upload foto galeri dan background custom

### 💳 Sistem Pembayaran Terintegrasi
- **Multiple Payment Gateways**: Bank transfer, credit card, e-wallet, QRIS
- **Secure Transactions**: Transaksi aman dengan enkripsi
- **Order Management**: Tracking pesanan lengkap
- **Digital Receipts**: Bukti pembayaran digital

### 📱 Fitur Undangan Digital
- **Custom URL**: Domain personal untuk undangan
- **RSVP System**: Konfirmasi kehadiran tamu
- **Guest Management**: Kelola daftar tamu dengan mudah
- **Analytics**: Statistik views dan interaksi
- **Guest Book**: Buku tamu digital
- **Music Player**: Background music untuk undangan

### 🛠️ Custom Request Service
- **Professional Designers**: Tim desainer berpengalaman
- **Unlimited Revisions**: Revisi hingga puas
- **Fast Turnaround**: Pengerjaan cepat
- **Direct Communication**: Komunikasi langsung dengan desainer

## 🚀 Teknologi yang Digunakan

### Backend
- **Laravel 11**: PHP framework modern dengan fitur terbaru
- **MySQL/SQLite**: Database relational yang robust
- **Laravel Sanctum**: API authentication
- **Laravel Queue**: Background job processing

### Frontend
- **Tailwind CSS**: Utility-first CSS framework
- **Alpine.js**: Lightweight JavaScript framework
- **Blade Templates**: Laravel templating engine
- **Vite**: Modern build tool untuk asset bundling

### UI/UX
- **Modern Design**: Design contemporary dengan animasi smooth
- **Responsive Layout**: Mobile-first approach
- **Custom Animations**: Transisi dan animasi yang elegan
- **Accessibility**: Memenuhi standar WCAG

## 📦 Instalasi

### Persyaratan Sistem
- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL >= 8.0 (atau SQLite untuk development)

### Langkah-langkah Instalasi

1. **Clone Repository**
```bash
git clone https://github.com/your-username/undangan-online.git
cd undangan-online
```

2. **Install Dependencies**
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

3. **Environment Setup**
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

4. **Database Setup**
```bash
# Run migrations
php artisan migrate

# Seed sample data
php artisan db:seed
```

5. **Build Assets**
```bash
# Development
npm run dev

# Production
npm run build
```

6. **Start Development Server**
```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## 🗂️ Struktur Database

### Tables Utama
- **users**: User management dengan role admin/customer
- **templates**: Template undangan dengan metadata lengkap
- **invitations**: Undangan yang dibuat user
- **orders**: Pesanan template premium
- **custom_requests**: Permintaan design custom
- **payments**: Transaksi pembayaran

## 👤 User Roles

### Customer
- Membuat undangan dari template
- Membeli template premium
- Request custom design
- Manage undangan personal

### Admin
- Kelola template dan kategori
- Monitor orders dan payments
- Handle custom requests
- Analytics dan reporting
- User management

## 🎨 Template System

### Template Structure
```php
[
    'name' => 'Template Name',
    'category' => 'pernikahan|ulang_tahun|wisuda|baby_shower',
    'price' => 50000, // 0 untuk gratis
    'html_structure' => 'HTML template dengan placeholder',
    'css_styles' => 'CSS styling untuk template',
    'customizable_fields' => ['bride_name', 'groom_name', ...],
    'color_schemes' => [
        ['name' => 'Scheme Name', 'primary' => '#color', ...]
    ],
    'font_options' => [
        ['name' => 'Font Name', 'value' => 'Font Family']
    ]
]
```

### Template Variables
Template menggunakan sistem placeholder `{{variable_name}}` yang dapat diganti dengan data user.

## 🔐 Authentication & Authorization

### Middleware
- **auth**: Require authentication
- **verified**: Require email verification
- **admin**: Require admin role

### API Endpoints
```
GET /api/templates/search - Search templates
POST /api/invitations/{id}/preview - Live preview
POST /api/payments/process - Process payment
```

## 💰 Payment Integration

### Supported Gateways
- **Midtrans**: Credit card, bank transfer, e-wallets
- **Xendit**: Multiple payment methods
- **Bank Transfer**: Manual verification
- **QRIS**: QR code payments

### Payment Flow
1. User memilih template premium
2. Checkout dengan payment gateway
3. Payment verification
4. Template unlock otomatis
5. Digital receipt sent

## 📊 Analytics & Reporting

### User Analytics
- Invitation views
- RSVP responses
- Guest interactions
- Popular time access

### Admin Analytics
- Sales revenue
- Template popularity
- User engagement
- Payment success rate

## 🎯 Custom Request Workflow

1. **Submit Request**: User mengisi form requirement
2. **Admin Review**: Admin assign ke designer
3. **Quote & Timeline**: Pricing dan estimasi waktu
4. **Design Process**: Iterative design dengan feedback
5. **Final Delivery**: Template custom delivered

## 🌐 Deployment

### Production Setup
```bash
# Environment
APP_ENV=production
APP_DEBUG=false

# Database
DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_DATABASE=your-database

# Queue
QUEUE_CONNECTION=redis

# Mail
MAIL_MAILER=smtp
```

### Server Requirements
- **Web Server**: Nginx/Apache
- **PHP**: 8.2+ dengan extensions required
- **Database**: MySQL 8.0+
- **Queue Worker**: Supervisor untuk job processing
- **Storage**: File storage untuk uploaded images

### Optimizations
- **OPcache**: PHP opcode caching
- **Redis**: Session dan cache storage
- **CDN**: Asset delivery optimization
- **Image Optimization**: Automatic image compression

## 🔧 Configuration

### Key Configurations
```php
// config/app.php
'timezone' => 'Asia/Jakarta',
'locale' => 'id',

// config/filesystems.php
'default' => 'public', // atau 's3' untuk production

// config/queue.php
'default' => 'redis', // untuk background jobs
```

## 🧪 Testing

```bash
# Run unit tests
php artisan test

# Run with coverage
php artisan test --coverage

# Feature tests
php artisan test --filter=FeatureTest
```

## 📱 API Documentation

### Authentication
```
POST /api/login
POST /api/register
POST /api/logout
```

### Templates
```
GET /api/templates
GET /api/templates/{id}
GET /api/templates/categories
POST /api/templates/search
```

### Invitations
```
GET /api/invitations
POST /api/invitations
PUT /api/invitations/{id}
DELETE /api/invitations/{id}
POST /api/invitations/{id}/publish
```

## 🤝 Contributing

1. Fork repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

### Coding Standards
- PSR-12 untuk PHP
- ESLint untuk JavaScript
- Prettier untuk code formatting

## 📄 License

Distributed under the MIT License. See `LICENSE` for more information.

## 🎭 Demo Accounts

### Admin Access
- **Email**: admin@undanganonline.com
- **Password**: password

### Customer Access
- **Email**: test@example.com
- **Password**: password

## 📞 Support

- **Email**: support@undanganonline.com
- **Documentation**: [docs.undanganonline.com](https://docs.undanganonline.com)
- **GitHub Issues**: [Issues](https://github.com/your-username/undangan-online/issues)

## 🚀 Roadmap

### Version 2.0
- [ ] Mobile App (React Native)
- [ ] Video Invitations
- [ ] AI-Powered Design Suggestions
- [ ] Social Media Integration
- [ ] Multi-language Support

### Version 2.1
- [ ] WhatsApp Integration
- [ ] Calendar Integration
- [ ] Advanced Analytics
- [ ] Template Marketplace
- [ ] Affiliate Program

---

<div align="center">
  <p>Made with ❤️ for creating beautiful digital invitations</p>
  <p>© 2024 Undangan Online. All rights reserved.</p>
</div>
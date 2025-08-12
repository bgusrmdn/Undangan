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

### 🌐 **Sistem Domain Lengkap**
- **Path-based URL**: `undanganonline.com/invitation/sarah-ahmad-wedding`
- **Subdomain System**: `sarah-ahmad.undanganonline.com`
- **Custom Domain**: `sarahahmad.wedding` (Premium)
- **Auto-generated**: Domain otomatis terbentuk setelah pembelian
- **QR Code**: Untuk sharing mudah
- **Social Sharing**: WhatsApp, Facebook, Twitter integration

### 📱 Fitur Undangan Digital
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

## 🌐 **Sistem Domain - Detail Lengkap**

### **📋 Jenis Domain yang Tersedia:**

#### **1. Path-based URL (Default)**
```
https://undanganonline.com/invitation/sarah-ahmad-wedding
https://undanganonline.com/invitation/rina-david-anniversary
https://undanganonline.com/invitation/maya-graduation
```
- ✅ **Gratis untuk semua user**
- ✅ **Otomatis terbentuk dari nama undangan**
- ✅ **SEO-friendly slug generation**
- ✅ **Unique constraint untuk mencegah duplikasi**

#### **2. Subdomain System**
```
https://sarah-ahmad.undanganonline.com
https://rina-david.undanganonline.com
https://maya-graduation.undanganonline.com
```
- ✅ **Auto-generated untuk template premium**
- ✅ **Custom subdomain untuk user premium**
- ✅ **Batas maksimal 5 subdomain untuk user gratis**
- ✅ **Unlimited untuk user premium**
- ✅ **Reserved subdomain protection** (www, admin, api, dll)

#### **3. Custom Domain (Premium)**
```
https://sarahahmad.wedding
https://rinadavid.com
https://maya2024.graduation
```
- 🔒 **Hanya untuk user premium**
- ✅ **Domain validation dan verification**
- ✅ **SSL certificate support**
- ✅ **Admin approval system**

### **⚙️ Cara Kerja Sistem Domain:**

#### **Alur Pembuatan Undangan:**
1. **User memilih template** (gratis/premium)
2. **Sistem generate slug otomatis** dari judul undangan
3. **URL path terbentuk**: `/invitation/{slug}`
4. **Jika template premium atau user premium**:
   - Subdomain auto-generated dari data undangan
   - Format: `{bride-name}-{groom-name}.domain.com`
5. **User dapat upgrade ke custom domain** (premium only)

#### **Logic Auto-generation Subdomain:**
```php
// Untuk undangan pernikahan
sarah-ahmad.undanganonline.com

// Untuk ulang tahun
rina-25th-birthday.undanganonline.com

// Untuk wisuda
maya-ui-graduation.undanganonline.com
```

#### **Database Schema Domain:**
```sql
invitations table:
- slug (unique) -> untuk path-based URL
- subdomain (unique, nullable) -> untuk subdomain
- custom_domain (nullable) -> untuk custom domain
- domain_type (enum: 'path', 'subdomain', 'custom')
```

### **🔧 Konfigurasi Domain:**

#### **Environment Variables:**
```bash
# Domain utama aplikasi
APP_DOMAIN=undanganonline.com

# Feature flags
ENABLE_SUBDOMAINS=true
ENABLE_CUSTOM_DOMAINS=true
SUBDOMAIN_PREMIUM_ONLY=false
CUSTOM_DOMAIN_PREMIUM_ONLY=true
MAX_SUBDOMAINS_PER_USER=5
```

#### **Reserved Subdomains:**
```php
'reserved_subdomains' => [
    'www', 'admin', 'api', 'mail', 'email', 'smtp', 
    'ftp', 'ssh', 'ssl', 'cdn', 'blog', 'shop', 
    'app', 'support', 'help', 'docs', 'dev', 'test'
]
```

### **📡 Routing System:**

#### **Subdomain Routes:**
```php
// Handle semua subdomain undangan
Route::domain('{subdomain}.'.config('app.domain'))->group(function () {
    Route::get('/', [InvitationController::class, 'showBySubdomain']);
    Route::post('/rsvp', [InvitationController::class, 'rsvpBySubdomain']);
    Route::get('/gallery', [InvitationController::class, 'galleryBySubdomain']);
});
```

#### **Path Routes:**
```php
// Handle URL path-based
Route::get('/invitation/{slug}', [InvitationController::class, 'publicShow']);
Route::post('/invitation/{slug}/rsvp', [InvitationController::class, 'rsvp']);
```

#### **QR Code Redirect:**
```php
// Short URL untuk QR code
Route::get('/qr/{slug}', [InvitationController::class, 'qrRedirect']);
```

### **🎯 Domain Management Features:**

#### **User Interface:**
- **Domain Selector**: Pilih jenis domain di editor undangan
- **Subdomain Generator**: Input custom subdomain dengan real-time validation
- **Custom Domain Setup**: Form untuk domain pribadi dengan DNS instruction
- **Domain Analytics**: Statistik akses per domain type

#### **Admin Features:**
- **Domain Monitoring**: Dashboard untuk monitor semua domain
- **Custom Domain Approval**: Approve/reject custom domain requests
- **Reserved Domain Management**: Kelola daftar reserved subdomains
- **Domain Analytics**: Statistik penggunaan domain

### **🔐 Validation & Security:**

#### **Subdomain Validation:**
```php
// Real-time AJAX validation
POST /api/validate-subdomain
{
    "subdomain": "sarah-ahmad",
    "invitation_id": 123
}

Response:
{
    "available": true,
    "message": "Subdomain tersedia"
}
```

#### **Custom Domain Validation:**
```php
// Domain format validation
POST /api/validate-custom-domain
{
    "domain": "sarahahmad.wedding"
}

Response:
{
    "valid": true,
    "message": "Domain valid dan tersedia"
}
```

### **📊 Analytics & Tracking:**

#### **Per-Domain Analytics:**
- **Views per domain type**
- **Popular subdomains**
- **Custom domain usage**
- **QR code scans**
- **Social media shares**

#### **API Endpoints:**
```php
GET /api/invitations/{id}/analytics
{
    "total_views": 1234,
    "domain_type": "subdomain",
    "public_url": "https://sarah-ahmad.undanganonline.com",
    "rsvp_count": 45,
    "qr_scans": 23
}
```

### **🚀 Implementation Examples:**

#### **Membuat Undangan dengan Subdomain:**
```php
// 1. User beli template premium
$order = Order::create([...]);

// 2. Buat undangan
$invitation = Invitation::create([
    'template_id' => $template->id,
    'title' => 'Sarah & Ahmad Wedding',
    'invitation_data' => [
        'bride_name' => 'Sarah',
        'groom_name' => 'Ahmad'
    ]
]);

// 3. Subdomain auto-generated (in model boot)
// Result: sarah-ahmad.undanganonline.com
```

#### **Enable Custom Domain:**
```php
// User request custom domain
$invitation->enableCustomDomain('sarahahmad.wedding');

// Admin approve
$invitation->approveCustomDomain();

// DNS setup instruction sent to user
```

### **🛠️ Technical Requirements:**

#### **Server Setup:**
```nginx
# Nginx wildcard subdomain configuration
server {
    listen 80;
    server_name *.undanganonline.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl;
    server_name *.undanganonline.com;
    
    # Laravel subdomain handling
    root /var/www/undangan-online/public;
    index index.php;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
}
```

#### **DNS Setup:**
```dns
# Wildcard subdomain
*.undanganonline.com    A    123.456.789.123

# Custom domain (user setup)
sarahahmad.wedding      CNAME    undanganonline.com
```

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

### Domain Management
- **Wildcard DNS**: Untuk subdomain routing
- **SSL/TLS**: Certificate management
- **CDN Integration**: Asset delivery optimization
- **DNS Validation**: Domain ownership verification

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
- Wildcard DNS setup (untuk subdomain)

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

# Configure domain
APP_DOMAIN=your-domain.com
ENABLE_SUBDOMAINS=true
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
- **users**: User management dengan role admin/customer dan premium status
- **templates**: Template undangan dengan metadata lengkap
- **invitations**: Undangan yang dibuat user dengan domain configuration
- **orders**: Pesanan template premium
- **custom_requests**: Permintaan design custom
- **payments**: Transaksi pembayaran

### Domain Fields
```sql
-- invitations table
slug VARCHAR(255) UNIQUE           -- untuk path-based URL
subdomain VARCHAR(255) UNIQUE      -- untuk subdomain
custom_domain VARCHAR(255)         -- untuk custom domain
domain_type ENUM('path', 'subdomain', 'custom') DEFAULT 'path'

-- users table  
premium_until TIMESTAMP NULL       -- untuk status premium
```

## 👤 User Roles

### Customer
- Membuat undangan dari template
- Membeli template premium → auto-generate subdomain
- Request custom design
- Manage undangan personal
- Upgrade ke premium untuk unlimited subdomain

### Premium Customer
- Semua fitur customer
- Unlimited subdomain creation
- Custom domain support
- Priority customer support
- Early access ke template baru

### Admin
- Kelola template dan kategori
- Monitor orders dan payments
- Handle custom requests
- Approve custom domains
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
    ],
    'is_premium' => true, // auto-generate subdomain jika true
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
POST /api/validate-subdomain - Validate subdomain
POST /api/validate-custom-domain - Validate custom domain
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
5. **Subdomain auto-generated**
6. Digital receipt sent dengan domain info

## 📊 Analytics & Reporting

### User Analytics
- Invitation views per domain type
- RSVP responses
- Domain usage statistics
- Popular access times

### Admin Analytics
- Sales revenue
- Template popularity
- Domain type distribution
- User engagement metrics

## 🎯 Custom Request Workflow

1. **Submit Request**: User mengisi form requirement
2. **Admin Review**: Admin assign ke designer
3. **Quote & Timeline**: Pricing dan estimasi waktu
4. **Design Process**: Iterative design dengan feedback
5. **Final Delivery**: Template custom delivered dengan domain options

## 🌐 Deployment

### Production Setup
```bash
# Environment
APP_ENV=production
APP_DEBUG=false
APP_DOMAIN=undanganonline.com

# Database
DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_DATABASE=your-database

# Queue
QUEUE_CONNECTION=redis
```

### Server Requirements
- **Web Server**: Nginx/Apache dengan wildcard subdomain support
- **PHP**: 8.2+ dengan extensions required
- **Database**: MySQL 8.0+
- **Queue Worker**: Supervisor untuk job processing
- **Storage**: File storage untuk uploaded images
- **SSL**: Wildcard SSL certificate untuk subdomain

### DNS Configuration
```dns
# Main domain
undanganonline.com          A       123.456.789.123

# Wildcard for subdomains
*.undanganonline.com        A       123.456.789.123

# www redirect
www.undanganonline.com      CNAME   undanganonline.com
```

### Optimizations
- **OPcache**: PHP opcode caching
- **Redis**: Session dan cache storage
- **CDN**: Asset delivery optimization untuk semua domain
- **Image Optimization**: Automatic image compression

## 🔧 Configuration

### Key Configurations
```php
// config/app.php
'domain' => env('APP_DOMAIN', 'localhost'),
'invitation' => [
    'enable_subdomains' => true,
    'enable_custom_domains' => true,
    'subdomain_premium_only' => false,
    'custom_domain_premium_only' => true,
    'max_subdomains_per_user' => 5,
]
```

## 🧪 Testing

```bash
# Run unit tests
php artisan test

# Test dengan subdomain
php artisan test --filter=SubdomainTest

# Feature tests
php artisan test --filter=InvitationDomainTest
```

## 📱 API Documentation

### Domain Management
```
POST /invitations/{id}/enable-subdomain
POST /invitations/{id}/set-custom-domain
DELETE /invitations/{id}/remove-custom-domain
GET /api/validate-subdomain
GET /api/validate-custom-domain
```

### Analytics
```
GET /api/invitations/{id}/analytics
{
    "total_views": 1234,
    "domain_type": "subdomain",
    "public_url": "https://sarah-ahmad.undanganonline.com",
    "rsvp_count": 45
}
```

## 🤝 Contributing

1. Fork repository
2. Create feature branch (`git checkout -b feature/DomainManagement`)
3. Commit changes (`git commit -m 'Add domain management feature'`)
4. Push branch (`git push origin feature/DomainManagement`)
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
- [x] **Multi-Domain System** ✅
- [ ] Social Media Integration

### Version 2.1
- [ ] WhatsApp Integration
- [ ] Calendar Integration
- [ ] Advanced Analytics
- [ ] Template Marketplace
- [ ] Affiliate Program
- [ ] **Domain Analytics Dashboard** 
- [ ] **DNS Management Interface**

---

<div align="center">
  <p>Made with ❤️ for creating beautiful digital invitations</p>
  <p>© 2024 Undangan Online. All rights reserved.</p>
</div>
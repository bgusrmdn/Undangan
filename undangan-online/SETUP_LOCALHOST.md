# 🚀 **PANDUAN SETUP LOCALHOST - UNDANGAN ONLINE**

## 📦 **1. SOFTWARE YANG PERLU DIINSTALL**

### **A. XAMPP (All-in-One Package)**
```bash
1. Download XAMPP dari: https://www.apachefriends.org/
2. Pilih versi PHP 8.2+
3. Install dengan default settings
4. Start Apache & MySQL dari XAMPP Control Panel
```

### **B. Composer (PHP Package Manager)**
```bash
1. Download dari: https://getcomposer.org/download/
2. Install sebagai global command
3. Test: buka CMD → ketik "composer --version"
```

### **C. Node.js & NPM**
```bash
1. Download dari: https://nodejs.org/
2. Pilih LTS version (v18+)
3. Install dengan default settings
4. Test: buka CMD → ketik "node --version" dan "npm --version"
```

### **D. Git (Optional)**
```bash
1. Download dari: https://git-scm.com/
2. Install dengan default settings
3. Untuk clone repository jika diperlukan
```

## 🔧 **2. SETUP PROJECT DI CURSOR**

### **A. Extensions yang Dibutuhkan:**
```
Install di Cursor/VS Code:
- PHP Intelephense
- Laravel Blade Snippets  
- Laravel Extra Intellisense
- Tailwind CSS IntelliSense
- Auto Rename Tag
- Bracket Pair Colorizer
- GitLens (optional)
```

### **B. Copy Project Files:**
```bash
# Copy semua file project ke:
C:\xampp\htdocs\undangan-online\

# Struktur folder harus seperti ini:
C:\xampp\htdocs\undangan-online\
├── app/
├── config/
├── database/
├── resources/
├── routes/
├── public/
├── vendor/
├── .env
├── composer.json
└── package.json
```

## 🗄️ **3. SETUP DATABASE**

### **A. Buat Database MySQL:**
```bash
1. Buka browser → http://localhost/phpmyadmin
2. Login (default: username: root, password: kosong)
3. Klik "New" → Buat database baru
4. Nama database: "undangan_online"
5. Collation: utf8mb4_unicode_ci
6. Klik "Create"
```

### **B. Import Database:**
```bash
1. Pilih database "undangan_online"
2. Klik tab "Import"
3. Choose file → pilih "database_mysql_complete.sql"
4. Klik "Go"
5. Tunggu sampai selesai import
```

### **C. Verifikasi Data:**
```bash
Database akan berisi:
- 2 users (admin & test user)
- 6 template undangan
- 1 sample invitation
- 1 sample order
- Semua tabel Laravel (cache, sessions, dll)
```

## ⚙️ **4. KONFIGURASI LARAVEL**

### **A. Edit File .env:**
```bash
# Buka file .env di root project
# Edit konfigurasi database:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=undangan_online
DB_USERNAME=root
DB_PASSWORD=

# Edit URL aplikasi:
APP_URL=http://localhost/undangan-online/public

# Pastikan APP_KEY ada, jika kosong jalankan:
# php artisan key:generate
```

### **B. Install Dependencies:**
```bash
# Buka CMD/Terminal di folder project
cd C:\xampp\htdocs\undangan-online

# Install PHP dependencies
composer install

# Install Node.js dependencies  
npm install

# Build assets untuk development
npm run dev

# Atau untuk production:
npm run build
```

### **C. Set Permissions (Windows):**
```bash
# Pastikan folder ini writeable:
- storage/
- bootstrap/cache/
- public/storage/

# Di Windows biasanya sudah otomatis, tapi jika error:
# Klik kanan folder → Properties → Security → Full Control
```

### **D. Create Storage Link:**
```bash
# Jalankan command ini di CMD:
php artisan storage:link
```

## 🌐 **5. AKSES WEBSITE**

### **A. URL Aplikasi:**
```bash
Homepage: http://localhost/undangan-online/public
Admin: http://localhost/undangan-online/public/admin
API: http://localhost/undangan-online/public/api
```

### **B. Login Accounts:**
```bash
# Admin Account:
Email: admin@undanganonline.com
Password: password

# Test User Account:
Email: test@example.com  
Password: password
```

### **C. Sample URLs:**
```bash
# Homepage dengan 6 template
http://localhost/undangan-online/public

# Sample invitation (sudah published)
http://localhost/undangan-online/public/invitation/sarah-ahmad-wedding-2024

# Template browsing
http://localhost/undangan-online/public/templates
```

## 🛠️ **6. TROUBLESHOOTING**

### **A. Error: "could not find driver"**
```bash
Solution:
1. Buka php.ini (di XAMPP: C:\xampp\php\php.ini)
2. Uncomment: extension=pdo_mysql
3. Restart Apache
```

### **B. Error: "Class not found"**
```bash
Solution:
1. Jalankan: composer dump-autoload
2. Clear cache: php artisan cache:clear
3. Clear config: php artisan config:clear
```

### **C. Error: CSS/JS tidak load**
```bash
Solution:
1. Jalankan: npm run build
2. Check file public/build/manifest.json ada
3. Clear browser cache
```

### **D. Error: 500 Internal Server Error**
```bash
Solution:
1. Check log: storage/logs/laravel.log
2. Set permissions ke storage/ folder
3. Check .env configuration
4. Run: php artisan config:cache
```

### **E. Error: Route not found**
```bash
Solution:
1. Check .htaccess di public/ folder
2. Enable mod_rewrite di Apache
3. Clear route cache: php artisan route:clear
```

## 📋 **7. DEVELOPMENT WORKFLOW**

### **A. Daily Development:**
```bash
# Start XAMPP services
1. Start Apache & MySQL

# Start development server (optional)
php artisan serve --host=0.0.0.0 --port=8000

# Watch file changes (untuk CSS/JS)
npm run dev

# Access via:
http://localhost:8000  (artisan serve)
# OR
http://localhost/undangan-online/public  (XAMPP)
```

### **B. Database Management:**
```bash
# Reset database (jika perlu)
php artisan migrate:fresh --seed

# Backup database
php artisan db:backup

# Check database status
php artisan migrate:status
```

### **C. Cache Management:**
```bash
# Clear all cache
php artisan optimize:clear

# Cache for production
php artisan optimize
```

## 🎯 **8. FITUR YANG BISA DITEST**

### **A. Homepage Features:**
```bash
✅ Beautiful animated homepage
✅ Template gallery (6 sample templates)
✅ Responsive design  
✅ Modern UI with Tailwind CSS
✅ User registration/login
```

### **B. Admin Features:**
```bash
✅ Admin login
✅ User management
✅ Template management
✅ Order monitoring
✅ Analytics dashboard
```

### **C. User Features:**
```bash
✅ Template browsing
✅ User dashboard
✅ Invitation creation (basic)
✅ Profile management
✅ Order history
```

### **D. Sample Data:**
```bash
✅ 6 template undangan (berbagai kategori)
✅ 2 users (admin + customer)
✅ 1 published invitation
✅ 1 paid order
✅ Complete database structure
```

## 📞 **9. SUPPORT & HELP**

### **A. Error Debugging:**
```bash
# Enable debug mode
APP_DEBUG=true (di .env)

# Check logs
tail -f storage/logs/laravel.log

# Database queries log
DB_LOG_QUERIES=true
```

### **B. Performance Monitoring:**
```bash
# Install Laravel Debugbar (optional)
composer require barryvdh/laravel-debugbar --dev

# Check performance
php artisan route:list
php artisan config:show
```

## 🎉 **10. NEXT STEPS**

### **A. After Setup:**
```bash
1. ✅ Test homepage loading
2. ✅ Test user registration
3. ✅ Test admin login
4. ✅ Browse templates
5. ✅ View sample invitation
6. 🚧 Start developing controller methods
7. 🚧 Add payment integration
8. 🚧 Build invitation editor
```

### **B. Development Priorities:**
```bash
1. Template Controller implementation
2. Invitation Editor UI
3. Payment Gateway integration
4. File upload functionality
5. Email notifications
6. RSVP system
7. Admin dashboard
```

---

## ✅ **CHECKLIST SETUP BERHASIL:**

```bash
☐ XAMPP running (Apache + MySQL)
☐ Database "undangan_online" created
☐ SQL file imported successfully  
☐ .env file configured correctly
☐ composer install completed
☐ npm install completed
☐ npm run build successful
☐ Storage link created
☐ Homepage loads: http://localhost/undangan-online/public
☐ Login works with test accounts
☐ Templates visible (6 templates)
☐ Sample invitation accessible
☐ No errors in browser console
```

**Jika semua checklist ✅, setup berhasil dan siap development!** 🚀

---

### 📧 **Password Default untuk Testing:**
- **All accounts**: `password`
- **Hash**: `$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi`
# 🎓 Astrantia

## Sistem Informasi Kelas & Manajemen Mahasiswa

<div align="center">

**Solusi manajemen akademik modern untuk mengelola kelas, jadwal, tugas, dan dokumentasi kegiatan mahasiswa dengan mudah.**

[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)
[![FilamentPHP](https://img.shields.io/badge/FilamentPHP-v4-3B82F6?style=flat-square&logo=laravel)](https://filamentphp.com)
[![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)](LICENSE)
[![PHP](https://img.shields.io/badge/PHP-8.4+-777BB4?style=flat-square&logo=php)](https://php.net)

</div>

---

## 📖 Tentang Astrantia

Astrantia adalah aplikasi web yang dirancang khusus untuk **menyederhanakan manajemen informasi akademik**. Dengan antarmuka yang intuitif dan fitur-fitur lengkap, Astrantia membantu mahasiswa dan pengurus kelas dalam mengelola jadwal, tugas, materi pembelajaran, dan dokumentasi kegiatan dengan lebih efisien.

Dibangun dengan teknologi terkini untuk Universitas Tadulako dan institusi pendidikan lainnya.

---

## 🚀 Fitur Utama

### 🎯 Untuk Mahasiswa (Halaman Publik)

Antarmuka yang ramah pengguna dengan semua informasi yang dibutuhkan:

| Fitur | Deskripsi |
|-------|-----------|
| 🏠 **Beranda Informatif** | Ringkasan dan navigasi cepat ke semua menu |
| 📅 **Jadwal Kuliah** | Lihat jadwal mata kuliah harian secara real-time |
| ✅ **Daftar Tugas** | Pantau tugas dari dosen beserta deadline |
| 📚 **Daftar Materi** | Akses dan unduh materi perkuliahan |
| 🖼️ **Galeri Kegiatan** | Dokumentasi foto kegiatan kelas dan angkatan |
| 👥 **Daftar Anggota** | Lihat informasi lengkap teman-teman sekelas |

### ⚡ Untuk Pengurus Kelas (Admin Panel)

Panel admin powerful dengan fitur manajemen lengkap:

| Fitur | Deskripsi |
|-------|-----------|
| 📊 **Dashboard Statistik** | Overview jumlah tugas, materi, dan jadwal hari ini |
| 📅 **Manajemen Jadwal** | Tambah, edit, hapus jadwal mata kuliah |
| ✏️ **Manajemen Tugas** | Kelola penugasan dan deadline tugas |
| 📖 **Manajemen Materi** | Upload dan kelola file/link materi pembelajaran |
| 📸 **Manajemen Galeri** | Kelola dokumentasi foto kegiatan |
| 👤 **Data Mahasiswa** | Kelola profil dan data anggota kelas |

---

## 🛠️ Tech Stack

Astrantia dibangun dengan **stack teknologi modern** untuk performa optimal:

```
Backend:
  ├─ Laravel 12          → Framework PHP powerful & elegant
  ├─ FilamentPHP v4      → Admin panel & form builder
  ├─ Livewire            → Real-time interactivity tanpa JS berat
  └─ MySQL/MariaDB       → Database robust & reliable

Frontend:
  ├─ Tailwind CSS        → Utility-first CSS framework
  ├─ Vite                → Build tool cepat & modern
  └─ Blade Templates     → Template engine Laravel

DevOps:
  ├─ PHP 8.4+
  ├─ Composer            → PHP package manager
  └─ NPM/Node.js         → JavaScript dependency management
```

---

## 📋 Persyaratan Sistem

Pastikan environment Anda memenuhi requirement ini sebelum instalasi:

- **PHP** ≥ 8.4
- **Composer** (latest version)
- **Node.js** ≥ 16.x & **NPM** ≥ 7.x
- **MySQL/MariaDB** ≥ 5.7

---

## 🔧 Instalasi & Setup

### Step 1️⃣ Clone Repository

```bash
git clone https://github.com/AdityaAksar/astrantia.git
cd astrantia
```

### Step 2️⃣ Install PHP Dependencies

```bash
composer install
```

### Step 3️⃣ Install Frontend Dependencies

```bash
npm install
npm run build
```

### Step 4️⃣ Setup Environment

Duplikasi `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Edit file `.env` dan atur konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=astrantia
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Step 5️⃣ Generate Application Key

```bash
php artisan key:generate
```

### Step 6️⃣ Jalankan Database Migration

```bash
php artisan migrate
```

**(Opsional)** Tambahkan data dummy untuk testing:

```bash
php artisan migrate --seed
```

### Step 7️⃣ Setup Storage Link

Penting untuk menampilkan gambar galeri dan materi:

```bash
php artisan storage:link
```

### Step 8️⃣ Buat Akun Admin

Buat user admin untuk akses panel:

```bash
php artisan make:filament-user
```

Ikuti instruksi di terminal (masukkan nama, email, password).

### Step 9️⃣ Jalankan Aplikasi

Buka **dua terminal berbeda**:

**Terminal 1 - Vite Dev Server (Hot Reload):**
```bash
npm run dev
```

**Terminal 2 - Laravel Server:**
```bash
php artisan serve
```

✅ **Aplikasi siap diakses:**
- 🌐 **Publik:** http://localhost:8000
- 🔐 **Admin:** http://localhost:8000/admin

---

## 📁 Struktur Project

```
astrantia/
│
├── 📂 app/
│   ├── Filament/                    # ⚙️ Admin Panel Logic
│   │   ├── Resources/               # CRUD Resources
│   │   └── Widgets/                 # Dashboard Widgets
│   ├── Http/Controllers/            # 🎮 Public Page Controllers
│   ├── Livewire/                    # ⚡ Interactive Components
│   └── Models/                      # 🗂️ Eloquent Models
│
├── 📂 resources/
│   ├── views/                       # 🎨 Blade Templates
│   └── css/                         # 🎨 Custom Styles
│
├── 📂 database/
│   ├── migrations/                  # 🔧 Database Schema
│   └── seeders/                     # 🌱 Dummy Data
│
├── 📂 public/
│   └── storage/                     # 📸 User Uploads
│
├── .env.example                     # ⚙️ Environment Template
├── package.json                     # 📦 NPM Dependencies
├── composer.json                    # 📦 PHP Dependencies
└── README.md                        # 📖 This File
```

---

## 🚀 Deployment

### Production Build

Untuk production, gunakan:

```bash
npm run build
```

Pastikan environment production:
```env
APP_ENV=production
APP_DEBUG=false
```

### Hosting Requirements

- Web server: Apache/Nginx
- PHP 8.4+ dengan extensions: curl, gd, mbstring, openssl, pdo, tokenizer, xml
- Database: MySQL 5.7+ atau MariaDB

---

## 🤝 Kontribusi

Kami sangat menerima kontribusi dari komunitas! 

### Cara Berkontribusi:

1. **Fork** repository ini
2. **Buat branch** fitur baru: `git checkout -b feature/AmazingFeature`
3. **Commit** perubahan: `git commit -m 'Add some AmazingFeature'`
4. **Push** ke branch: `git push origin feature/AmazingFeature`
5. **Buat Pull Request**

### Laporkan Issues

Temukan bug atau punya saran? [Buat issue di sini!](https://github.com/AdityaAksar/astrantia/issues)

---

## 📚 Dokumentasi & Resources

- 📖 [Laravel Documentation](https://laravel.com/docs)
- 📖 [FilamentPHP Documentation](https://filamentphp.com/docs)
- 📖 [Livewire Documentation](https://livewire.laravel.com/docs)
- 📖 [Tailwind CSS Documentation](https://tailwindcss.com/docs)

---

## 👨‍💻 Author

### Kontak & Media Sosial
- 📧 Email: [adityaaksar40@gmail.com]
- 💻 GitHub: [@AdityaAksar](https://github.com/AdityaAksar)

---

<div align="center">

**[⭐ Beri bintang jika project ini membantu!](https://github.com/AdityaAksar/astrantia)**

</div>

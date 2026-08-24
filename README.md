# 🍰 JeikinanCake Web Application

Aplikasi Web **JeikinanCake** yang dibangun menggunakan framework **CodeIgniter 4**.

---

## 🚀 Quick Start (Panduan Singkat)

### 1. Clone & Install Dependensi
```bash
git clone <URL_REPOSITORY_ANDA>
cd JeikinanCake-Web
composer install
```

### 2. Setup Environment
Salin file templat `env` menjadi `.env`:
```bash
cp env .env
```
*(Sesuaikan konfigurasi `app.baseURL` dan kredensial database lokal Anda di file `.env`)*

### 3. Setup Database & Migrasi
Untuk panduan lengkap mengenai setup database, pembuatan user MySQL/MariaDB, dan alur kerja migrasi, silakan merujuk ke dokumentasi khusus database:
👉 **[DATABASE.md](DATABASE.md)**

Jalankan perintah cepat migrasi:
```bash
php spark db:create jenkeinans-cake
php spark migrate
```

### 4. Menjalankan Server Lokal
```bash
php spark serve
```
Akses aplikasi melalui browser: **`http://localhost:8080`**

---

## 📚 Dokumentasi Terkait
* 🗃️ **[Panduan Setup & Dokumentasi Database](DATABASE.md)**
* 📑 **[User Guide Resmi CodeIgniter 4](https://codeigniter.com/user_guide/)**

---

## 🛠️ Perintah CLI Spark Utama

| Perintah | Fungsi |
| :--- | :--- |
| `php spark serve` | Menjalankan server lokal |
| `php spark migrate` | Menjalankan migrasi database |
| `php spark make:controller` | Membuat file Controller baru |
| `php spark make:model` | Membuat file Model baru |
| `php spark make:migration` | Membuat file Migration baru |
| `php spark make:seeder` | Membuat file Seeder baru |

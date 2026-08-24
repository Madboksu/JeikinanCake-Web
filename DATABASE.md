# 🗃️ Panduan & Dokumentasi Database (JeikinanCake Web)

Dokumentasi ini berisi panduan lengkap setup database lokal, eksekusi migrasi, pemrosesan seeder, serta referensi skema tabel untuk proyek JeikinanCake.

---

## 📋 Daftar Isi
1. [Prasyarat & Konfigurasi Lingkungan (`.env`)](#1-prasyarat--konfigurasi-lingkungan-env)
2. [Setup Database Pertama Kali](#2-setup-database-pertama-kali)
3. [Alur Kerja Development Database (Migrations)](#3-alur-kerja-development-database-migrations)
4. [Mengisi Data Awal (Seeds & Seeders)](#4-mengisi-data-awal-seeds--seeders)
5. [Skema & Struktur Tabel (ERD)](#5-skema--struktur-tabel-erd)
6. [Troubleshooting & Perintah Spark CLI](#6-troubleshooting--perintah-spark-cli)

---

## 1. Prasyarat & Konfigurasi Lingkungan (`.env`)

Sebelum menjalankan perintah database, pastikan Anda telah menyalin file `env` ke `.env`:

```bash
cp env .env
```

Atur koneksi database lokal Anda di file `.env`:

```ini
CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = jenkeinans-cake
database.default.username = ukwms          # (Sesuaikan dengan user MySQL/MariaDB lokal Anda)
database.default.password = 5803025        # (Sesuaikan dengan password MySQL/MariaDB lokal Anda)
database.default.DBDriver = MySQLi
database.default.port = 3306
```

---

## 2. Setup Database Pertama Kali

Pastikan service MariaDB / MySQL di perangkat Anda sudah berjalan.

### **Opsi A: Perintah Otomatis via CodeIgniter Spark**
```bash
# 1. Buat Schema Database
php spark db:create jenkeinans-cake

# 2. Jalankan Seluruh Migrasi Tabel
php spark migrate
```

### **Opsi B: Manual via GUI (phpMyAdmin / DBeaver) atau SQL CLI**
```sql
CREATE DATABASE `jenkeinans-cake`;
CREATE USER 'ukwms'@'localhost' IDENTIFIED BY '5803025';
GRANT ALL PRIVILEGES ON `jenkeinans-cake`.* TO 'ukwms'@'localhost';
FLUSH PRIVILEGES;
```
Lalu jalankan migrasi di terminal:
```bash
php spark migrate
```

---

## 3. Alur Kerja Development Database (Migrations)

### **A. Saat Mengambil Update Terbaru (`git pull`)**
Setiap kali mengunduh pembaruan dari tim, jalankan migrasi untuk memperbarui skema database lokal Anda:
```bash
git pull origin main
php spark migrate
```

### **B. Saat Menambah / Mengubah Tabel Baru**
1. **Buat File Migration:**
   ```bash
   php spark make:migration CreateNamaTabelTable
   ```
2. **Tuliskan Struktur di File Migration (`app/Database/Migrations/`):**
   - Gunakan method `up()` untuk membuat tabel / kolom.
   - Gunakan method `down()` untuk pembatalan (*drop table*).
3. **Uji Coba Migrasi:**
   ```bash
   php spark migrate
   ```
4. **Commit File Migrasi ke Git:**
   > [!IMPORTANT]
   > Jangan meng-commit file `.env`. Cukup commit file migration baru yang telah dibuat di folder `app/Database/Migrations/`.

---

## 4. Mengisi Data Awal (Seeds & Seeders)

Seeder digunakan untuk mengisi data awal ke tabel (misal data admin atau kategori default).

### **Membuat & Menjalankan Seeder**
1. Buat file Seeder:
   ```bash
   php spark make:seeder AdminSeeder
   ```
2. Isi data pada method `run()` di `app/Database/Seeds/AdminSeeder.php`.
3. Jalankan seeder:
   ```bash
   php spark db:seed AdminSeeder
   ```

> [!NOTE]
> **Apakah Seeder perlu dijalankan setiap kali `git pull`?**
> **TIDAK PERLU.** Seeder cukup dijalankan sekali saat setup database baru atau setelah melakukan reset database (`php spark migrate:refresh`). Setiap kali `git pull`, Anda cukup menjalankan `php spark migrate`.

---

## 5. Skema & Struktur Tabel (ERD)

Aplikasi ini menggunakan 4 tabel utama:

### **1. `category`**
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `category_id` | INT (11) Unsigned | Primary Key, Auto Increment |
| `category_name` | VARCHAR (100) | Not Null, Unique |

### **2. `admin`**
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `admin_id` | INT (11) Unsigned | Primary Key, Auto Increment |
| `username` | VARCHAR (100) | Unique |
| `password_hash` | VARCHAR (255) | Hash password |

### **3. `testimonial`**
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `testimonial_id` | INT (11) Unsigned | Primary Key, Auto Increment |
| `testimonial_image` | VARCHAR (255) | Path gambar ulasan |
| `testimonial_name` | VARCHAR (100) | Nama pemberi ulasan |
| `testimonial_desc` | TEXT | Isi ulasan |
| `testimonial_date` | DATE | Tanggal ulasan |
| `testimonial_star` | TINYINT (3) | Not Null, Rating bintang |

### **4. `product`**
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `product_id` | INT (11) Unsigned | Primary Key, Auto Increment |
| `product_image` | VARCHAR (255) | Path gambar produk |
| `product_name` | VARCHAR (100) | Nama produk |
| `product_desc` | TEXT | Deskripsi produk |
| `product_price` | DECIMAL (12,2) | Harga produk |
| `product_is_available` | BOOLEAN | Status ketersediaan (default 1) |
| `product_is_best_seller` | BOOLEAN | Status laris (default 0) |
| `product_slug` | VARCHAR (100) | Not Null, Unique |
| `created_at` | DATETIME | Tanggal dibuat |
| `updated_at` | DATETIME | Tanggal diubah |
| `category_id` | INT (11) Unsigned | Foreign Key ➔ `category(category_id)` ON DELETE CASCADE |

---

## 6. Troubleshooting & Perintah Spark CLI

| Perintah | Deskripsi |
| :--- | :--- |
| `php spark migrate` | Menjalankan seluruh migrasi baru |
| `php spark migrate:status` | Mengecek daftar migrasi yang sudah/belum berjalan |
| `php spark migrate:rollback` | Membatalkan migrasi pada batch terakhir |
| `php spark migrate:refresh` | Membatalkan semua migrasi lalu menjalankannya ulang dari awal |
| `php spark db:table [tabel]` | Menampilkan struktur & isi tabel langsung di terminal |

### **Kendala Umum (Common Issues)**
* **Access denied for user 'root'@'localhost':**
  Di Arch Linux/Linux, MariaDB menggunakan `unix_socket` untuk `root`. Buat user kustom (`ukwms`) dan berikan `GRANT ALL PRIVILEGES ON \`jenkeinans-cake\`.* TO 'ukwms'@'localhost';`.
* **Warning mbstring.so not found:**
  Pada PHP 8+ Arch Linux, `mbstring` sudah terkompilasi langsung (*built-in*). Pastikan `extension=mbstring` diberi tanda `;` (di-comment) di `/etc/php/php.ini`.

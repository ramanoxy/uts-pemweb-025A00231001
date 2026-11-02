# Portal Profil & Katalog Agenda Kegiatan — JDG (Junior Developer Group)

Proyek Mini UTS — Mata Kuliah Pemograman Web
Program Studi Informatika · Fakultas Teknik · Tiga Serangkai University

## 1. Identitas Mahasiswa

| Atribut | Keterangan |
| :--- | :--- |
| **Nama Lengkap** | *Alif Fathi Athallah Ramadhan Sya'roni* |
| **NIM** | *025A00231001* |
| **Kelas** | *A2-3A* |
| **Program Studi** | Informatika — Fakultas Teknik |
| **Nama Repositori** | `uts-pemweb-025A00231001` |

## 2. Deskripsi Singkat Tema

Website ini merupakan portal profil organisasi dan katalog agenda kegiatan dinamis untuk komunitas mahasiswa **JDG (Junior Developer Group)** di Tiga Serangkai University. Halaman **Beranda (`index.php`)** menyajikan identitas komunitas, visi kolaborasi, statistik anggota, serta empat jalur fokus belajar utama (*Pengembangan Web, Aplikasi Mobile, Data & Kecerdasan Buatan, dan Desain Produk Digital*). Halaman **Agenda Kegiatan (`katalog.php`)** menampilkan daftar kegiatan komunitas secara dinamis dari array multidimensi PHP, dilengkapi perhitungan sisa kuota otomatis, penentuan badge status pendaftaran (*TERBUKA*, *PENUH*, *SELESAI*), fitur penyaringan (*filter*) berdasarkan status, serta pengurutan (*sorting*) berdasarkan tanggal pelaksanaan terdekat.

## 3. Struktur Folder & Berkas Proyek

Seluruh kode dipisahkan sesuai tanggung jawabnya (*Separation of Concerns*: data, fungsi logika, tampilan halaman, dan gaya antarmuka) dengan struktur sebagai berikut:

```text
uts-pemweb-025A00231001/
├── index.php               # Halaman utama: Profil & Fokus Belajar komunitas JDG
├── katalog.php             # Halaman data dinamis: Statistik, filter, sort, & tabel agenda
├── data.php                # Penyimpanan data array multidimensi ($daftarAgenda)
├── functions.php           # Kumpulan fungsi buatan sendiri & manipulasi array PHP
├── style.css               # Stylesheet eksternal untuk index.php dan katalog.php
├── assets/
│   └── gemini-svg.svg      # Ilustrasi banner komunitas pada halaman beranda
├── screenshots/
│   ├── Beranda.png         # Tangkapan layar halaman Beranda (index.php)
│   └── Katalog_Agenda.png  # Tangkapan layar halaman Agenda Kegiatan (katalog.php)
├── README.md               # Dokumentasi lengkap proyek
└── .gitignore              # Daftar file sistem/editor yang diabaikan oleh Git
```

## 4. Cara Menjalankan Proyek di Localhost

Anda dapat menjalankan proyek ini menggunakan **PHP Built-in Web Server** maupun aplikasi paket server lokal seperti **XAMPP / Laragon**.

### Opsi A: Menggunakan PHP Built-in Server (Paling Cepat)
1. Pastikan PHP (minimal versi 8.0+) sudah terpasang di komputer Anda (`php -v`).
2. Clone repositori ini dan masuk ke direktori proyek:
   ```bash
   git clone https://github.com/username-anda/uts-pemweb-025A00231001.git
   cd uts-pemweb-NIM
   ```
3. Jalankan server lokal bawaan PHP:
   ```bash
   php -S localhost:8000
   ```
4. Buka browser dan akses:
   - Halaman Beranda: `http://localhost:8000/index.php`
   - Halaman Agenda: `http://localhost:8000/katalog.php`

### Opsi B: Menggunakan XAMPP atau Laragon
1. Clone atau salin folder `uts-pemweb-025A00231001` ke dalam direktori:
   - **XAMPP:** `C:\xampp\htdocs\uts-pemweb-025A00231001`
   - **Laragon:** `C:\laragon\www\uts-pemweb-025A00231001`
2. Nyalakan modul **Apache** pada Control Panel XAMPP atau klik **Start All** pada Laragon.
3. Buka browser dan akses `http://localhost/uts-pemweb-025A00231001/index.php`.

## 5. Daftar Fitur & Fungsi Buatan Sendiri (`functions.php`)

Seluruh file PHP diawali dengan `declare(strict_types=1);` dan mematuhi standar penulisan kode bersih **PSR-12**. Berikut adalah daftar fitur beserta file dan nama fungsi yang menanganinya:

| No | Fitur Proyek | File Penangan | Nama & Signature Fungsi | Penjelasan Logika dan Peran |
| :--- | :--- | :--- | :--- | :--- |
| 1 | **Keamanan Output HTML (Anti-XSS)** | `functions.php`, `katalog.php` | `e(string $teks): string` | Membungkus fungsi `htmlspecialchars($teks, ENT_QUOTES, 'UTF-8')` agar seluruh data dinamis yang dicetak ke HTML aman dari injeksi karakter khusus. |
| 2 | **Perhitungan Sisa Kursi Kuota** | `functions.php`, `katalog.php` | `hitungSisaKuota(int $kuota, int $peserta): int` | Menghitung selisih antara kapasitas `$kuota` dan jumlah `$peserta` terdaftar (`$kuota - $peserta`), serta memastikan nilai kembalian tidak bernilai negatif (`0` jika penuh). |
| 3 | **Penentuan Label & Warna Status Otomatis** | `functions.php`, `katalog.php` | `tentukanStatusAgenda(array $agenda, string $tanggalHariIni): array` | Menggunakan struktur percabangan `if / elseif / else` untuk memeriksa tanggal acara terhadap `$tanggalHariIni` (`2026-10-28`) dan sisa kuota: menghasilkan status **`SELESAI`** (class `.selesai`), **`PENUH`** (class `.penuh`), atau **`TERBUKA`** (class `.terbuka`). |
| 4 | **Kalkulasi Ringkasan Statistik Agenda** | `functions.php`, `katalog.php` | `hitungRingkasanAgenda(array $daftarAgenda, string $tanggalHariIni): array` | Mengolah seluruh item di `$daftarAgenda` untuk menghitung total agenda, total seluruh peserta terdaftar, jumlah kegiatan berstatus *Terbuka*, *Penuh*, *Selesai*, serta total sisa kursi pada kegiatan yang masih terbuka. |
| 5 | **Pengurutan Agenda Berdasarkan Tanggal Terdekat** | `functions.php`, `katalog.php` | `urutkanTanggalTerdekat(array $daftarAgenda): array` | Mengurutkan elemen agenda secara menaik (*ascending*) dari tanggal pelaksanaan paling awal ke paling akhir ketika pengguna memilih tombol urut (`?urut=terdekat`). |
| 6 | **Penyaringan (Filter) Berdasarkan Status** | `functions.php`, `katalog.php` | `filterStatusAgenda(array $daftarAgenda, string $statusFilter, string $tanggalHariIni): array` | Menyaring daftar kegiatan berdasarkan parameter URL `?status=SEMUA`, `?status=TERBUKA`, `?status=PENUH`, atau `?status=SELESAI`. Jika hasil saringan kosong, tabel menampilkan pesan informasi secara dinamis. |

## 6. Daftar Fungsi Array Bawaan PHP yang Dipakai

Proyek ini menggunakan **5 fungsi array bawaan PHP** (melampaui batas minimal 3 fungsi) untuk memanipulasi array multidimensi `$daftarAgenda` yang memiliki **8 item kegiatan** dan **8 atribut per item** (`nama`, `kategori`, `deskripsi`, `tanggal`, `waktu`, `lokasi`, `kuota`, `peserta`):

| No | Fungsi Array Bawaan | Lokasi Pemakaian | Tujuan dan Cara Penggunaan dalam Kode |
| :--- | :--- | :--- | :--- |
| 1 | **`count()`** | `functions.php` & `katalog.php` | Menghitung jumlah total seluruh agenda kegiatan di dalam `hitungRingkasanAgenda()` (8 kegiatan) serta memeriksa jumlah item hasil filter (`count($agendaTampil)`) sebelum dirender ke tabel. |
| 2 | **`array_column()`** | `functions.php` | Mengekstrak seluruh nilai dari atribut `'peserta'` pada array multidimensi `$daftarAgenda` menjadi satu array satu dimensi (`[32, 30, 45, 60, 18, 29, 38, 46]`). |
| 3 | **`array_sum()`** | `functions.php` | Menjumlahkan seluruh angka peserta hasil ekstraksi `array_column()` untuk mendapatkan total keseluruhan pendaftar di semua kegiatan (298 peserta). |
| 4 | **`usort()`** | `functions.php` | Mengurutkan array multidimensi `$daftarAgenda` di dalam fungsi `urutkanTanggalTerdekat()` menggunakan *spaceship operator* (`$a['tanggal'] <=> $b['tanggal']`). |
| 5 | **`array_filter()`** | `functions.php` | Menyaring elemen `$daftarAgenda` di dalam fungsi `filterStatusAgenda()` dengan memeriksa apakah label status tiap kegiatan sesuai dengan status yang dipilih pengguna. |

## 7. Riwayat Tahapan Pengerjaan (Git Workflow)

Pengerjaan dilakukan secara bertahap mengikuti 4 tahapan pengembangan yang dipantau melalui riwayat commit Git:

1. **Tahap 1 — Rancang (`Commit #1`):** Pemilihan tema komunitas JDG, pembuatan struktur direktori, penambahan `.gitignore`, dan penyusunan kerangka `README.md` awal.
2. **Tahap 2 — Kerangka Antarmuka (`Commit #2`):** Pembuatan kerangka HTML5 semantik (`<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`) pada `index.php` dan `katalog.php`, aset gambar `assets/jdg-banner.svg`, serta desain antarmuka pada `style.css`.
3. **Tahap 3a — Data & Logika Dasar (`Commit #3`):** Pembuatan data array multidimensi 8 kegiatan di `data.php`, fungsi perhitungan kuota, status, dan ringkasan di `functions.php`, serta render tabel dinamis menggunakan `foreach` di `katalog.php`.
4. **Tahap 3b — Fitur Tambahan Filter & Sort (`Commit #4`):** Penambahan fungsi `filterStatusAgenda()` (`array_filter`) dan `urutkanTanggalTerdekat()` (`usort`) beserta kontrol antarmuka filter status dan pengurutan tanggal di `katalog.php`.
5. **Tahap 4 — Rapikan & Finalisasi (`Commit #5`):** Penyempurnaan dokumentasi `README.md`, penambahan tangkapan layar aplikasi di folder `screenshots/`, pengecekan standar PSR-12, dan tindak lanjut hasil *peer code review*.

## 8. Tangkapan Layar (Screenshots)

### A. Halaman Beranda / Profil Organisasi (`index.php`)
Menampilkan identitas JDG, banner komunitas, statistik anggota, dan empat fokus belajar utama:



### B. Halaman Katalog Agenda Kegiatan (`katalog.php`)
Menampilkan ringkasan statistik otomatis, tombol filter status & pengurutan tanggal terdekat, tabel daftar kegiatan hasil render `foreach`, serta keterangan badge status:



## 9. Sumber Referensi & Catatan Pemakaian AI

### Sumber Referensi Dokumentasi
- **Dokumentasi Resmi PHP — Array Functions:** [https://www.php.net/manual/en/ref.array.php](https://www.php.net/manual/en/ref.array.php) (Referensi penggunaan `count`, `array_column`, `array_sum`, `array_filter`, dan `usort`).
- **Dokumentasi Resmi PHP — Strict Typing & Type Declarations:** [https://www.php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration](https://www.google.com/search?q=https://www.php.net/manual/en/functions.arguments.php%23functions.arguments.type-declaration) (Referensi penerapan `declare(strict_types=1);` serta tipe parameter dan *return type*).
- **PHP-FIG — Standar Coding Style PSR-12:** [https://www.php-fig.org/psr/psr-12/](https://www.php-fig.org/psr/psr-12/) (Acuan kerapian indentasi, penamaan variabel/fungsi *camelCase*, dan struktur blok kode).

### Catatan Pemakaian AI (Transparansi Akademik)
- **Bagian yang Dibantu AI:** Diskusi (*brainstorming*) pemilihan tema komunitas **JDG (Junior Developer Group)**, penyusunan struktur data contoh pada `data.php`, perancangan gaya CSS sederhana pada `style.css`, serta perapian format tabel dokumentasi pada `README.md`.
- **Bagaimana Saya Memeriksa dan Memverifikasinya:**
  1. Menjalankan dan menguji langsung seluruh file (`index.php`, `katalog.php`, `data.php`, `functions.php`) di server lokal (`localhost`) untuk memastikan tidak ada *error*, *warning*, maupun *notice*.
  2. Menghitung ulang secara manual hasil ringkasan statistik untuk memastikan output fungsi `hitungRingkasanAgenda()` 100% akurat.
  3. Mempelajari cara kerja setiap baris kode pada `functions.php` dan `katalog.php` sehingga siap menjelaskan maupun memodifikasi logika secara langsung saat sesi demo kelas.

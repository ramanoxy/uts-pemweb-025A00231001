<?php

declare(strict_types=1);

// Tanggal patokan hari ini untuk mengecek apakah kegiatan sudah lewat (SELESAI) atau belum
$tanggalHariIni = '2026-10-28';

// Data utama: Array multidimensi berisi 8 agenda kegiatan JDG
$daftarAgenda = [
    [
        'nama' => 'Mulai dari React: komponen pertama',
        'kategori' => 'Lokakarya / Web',
        'deskripsi' => 'Kenali komponen, props, dan state lewat praktik membuat aplikasi catatan sederhana.',
        'tanggal' => '2026-10-29',
        'waktu' => '15.30–18.00 WIB',
        'lokasi' => 'Lab Komputer A',
        'kuota' => 40,
        'peserta' => 32,
    ],
    [
        'nama' => 'Dari ide ke prototipe di Figma',
        'kategori' => 'Lokakarya / Desain',
        'deskripsi' => 'Rancang alur pengguna dan prototipe interaktif untuk menguji ide produkmu.',
        'tanggal' => '2026-11-14',
        'waktu' => '09.00–12.00 WIB',
        'lokasi' => 'Studio Kreatif',
        'kuota' => 30,
        'peserta' => 30,
    ],
    [
        'nama' => 'Kolaborasi kode dengan Git & GitHub',
        'kategori' => 'Lokakarya / Dasar',
        'deskripsi' => 'Latihan alur kerja kolaboratif: branch, commit, dan pull request pertama.',
        'tanggal' => '2026-10-24',
        'waktu' => '09.00–12.00 WIB',
        'lokasi' => 'Lab Komputer A',
        'kuota' => 45,
        'peserta' => 45,
    ],
    [
        'nama' => 'Kenalan dengan AI, tanpa ribet',
        'kategori' => 'Diskusi / Data & AI',
        'deskripsi' => 'Kupas cara kerja AI generatif, batasannya, dan pemanfaatannya untuk belajar.',
        'tanggal' => '2026-11-01',
        'waktu' => '13.00–15.00 WIB',
        'lokasi' => 'Aula Kampus',
        'kuota' => 60,
        'peserta' => 55,
    ],
    [
        'nama' => 'Bangun REST API dengan Node.js',
        'kategori' => 'Lokakarya / Web',
        'deskripsi' => 'Bangun layanan backend sederhana, kelola data, dan uji endpoint API bersama.',
        'tanggal' => '2026-11-21',
        'waktu' => '09.00–12.00 WIB',
        'lokasi' => 'Lab Komputer A',
        'kuota' => 50,
        'peserta' => 18,
    ],
    [
        'nama' => 'Aplikasi pertamamu dengan Flutter',
        'kategori' => 'Lokakarya / Mobile',
        'deskripsi' => 'Susun antarmuka dan navigasi aplikasi mobile pertamamu bersama mentor JDG.',
        'tanggal' => '2026-11-04',
        'waktu' => '15.30–18.00 WIB',
        'lokasi' => 'Lab Komputer B',
        'kuota' => 35,
        'peserta' => 29,
    ],
    [
        'nama' => 'Bedah antarmuka: belajar dari pengguna',
        'kategori' => 'Diskusi / Desain',
        'deskripsi' => 'Membaca pola antarmuka dan mengevaluasi pengalaman pengguna aplikasi sehari-hari.',
        'tanggal' => '2026-10-17',
        'waktu' => '13.00–15.00 WIB',
        'lokasi' => 'Ruang Kolaborasi',
        'kuota' => 40,
        'peserta' => 38,
    ],
    [
        'nama' => 'Dari kampus ke karier teknologi',
        'kategori' => 'Bincang / Karier',
        'deskripsi' => 'Cerita alumni tentang portofolio, magang pertama, dan proses rekrutmen developer.',
        'tanggal' => '2026-11-07',
        'waktu' => '10.00–12.00 WIB',
        'lokasi' => 'Ruang Seminar Utama',
        'kuota' => 80,
        'peserta' => 46,
    ],
];
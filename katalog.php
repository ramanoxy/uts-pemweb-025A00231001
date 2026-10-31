<?php

declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Kegiatan — JDG (Junior Developer Group)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>JDG (Junior Developer Group)</h1>
            <nav>
                <a href="index.php">Beranda</a>
                <a href="katalog.php" class="aktif">Agenda Kegiatan</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <section>
            <h2>Agenda Kegiatan JDG</h2>
            <p>Satu ruang untuk belajar dan bertemu. Pilih kegiatanmu, amankan kursimu, mulai langkah baru.</p>

            <article class="kotak">
                <h3>Ringkasan Statistik Agenda</h3>
                <ul>
                    <li>Total Agenda: <strong>8 Kegiatan</strong> (6 mendatang, 2 selesai)</li>
                    <li>Pendaftaran Terbuka: <strong>4 Kegiatan</strong></li>
                    <li>Kuota Penuh: <strong>2 Kegiatan</strong></li>
                    <li>Total Kursi Tersisa: <strong>80 Kursi</strong></li>
                </ul>
            </article>
        </section>

        <section>
            <h2>Daftar Agenda &amp; Status Pendaftaran</h2>
            <div class="kotak">
                <span>Urutkan tampilan: </span>
                <a href="katalog.php?urut=terdekat" class="tombol">Tanggal Terdekat</a>
                <a href="katalog.php" class="tombol">Urutan Default</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Kategori &amp; Nama Kegiatan</th>
                        <th>Waktu &amp; Lokasi</th>
                        <th>Kuota Peserta</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>
        </section>

        <section>
            <h2>Cara Membaca Status</h2>
            <article class="kotak">
                <p><span class="badge terbuka">TERBUKA</span> — Kegiatan belum lewat dan kursi masih tersedia. Pendaftaran dapat dilakukan.</p>
                <p><span class="badge penuh">PENUH</span> — Kegiatan belum lewat, tetapi tidak ada kursi tersisa. Pendaftaran ditutup.</p>
                <p><span class="badge selesai">SELESAI</span> — Tanggal kegiatan sudah lewat. Pendaftaran berakhir.</p>
            </article>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2026 JDG (Junior Developer Group) — Seluruh Kegiatan Gratis untuk Mahasiswa</p>
        </div>
    </footer>
</body>
</html>
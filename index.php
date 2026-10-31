<?php

declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda — JDG (Junior Developer Group)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>JDG (Junior Developer Group)</h1>
            <nav>
                <a href="index.php" class="aktif">Beranda</a>
                <a href="katalog.php">Agenda Kegiatan</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <section class="kotak">
            <h2>Belajar bareng. Bangun sesuatu.</h2>
            <p>
                Ruang bertumbuh bagi mahasiswa yang ingin mengenal teknologi, menulis kode, dan mengubah ide menjadi karya. Mulai dari nol, tidak sendiri.
            </p>
            <img src="assets/gemini-svg.svg" alt="Banner Komunitas Junior Developer Group" class="banner">
            <p>
                <a href="katalog.php" class="tombol">Jelajahi Agenda Kegiatan &rarr;</a>
            </p>
        </section>

        <section>
            <h2>Tentang JDG: Bukan sekadar kumpul, tempat ide menemukan timnya</h2>
            <p>
                JDG adalah komunitas belajar teknologi yang digerakkan oleh mahasiswa. Lewat lokakarya, diskusi, dan proyek kolaboratif, kami membuat proses belajar lebih terbuka, relevan, dan menyenangkan.
            </p>
            <article class="kotak">
                <h3>Statistik Komunitas</h3>
                <ul>
                    <li><strong>180+ Anggota Aktif:</strong> Mahasiswa dari berbagai angkatan.</li>
                    <li><strong>12 Mentor Sebaya:</strong> Siap membimbing sesi praktik mingguan.</li>
                    <li><strong>4 Fokus Belajar:</strong> Web, Mobile, Data/AI, dan Desain Produk.</li>
                </ul>
            </article>
        </section>

        <section>
            <h2>Fokus Belajar</h2>

            <article class="kotak">
                <h3>01. Pengembangan Web (HTML, CSS, PHP)</h3>
                <p>Dari halaman pertama sampai aplikasi web dinamis yang siap dipakai.</p>
            </article>

            <article class="kotak">
                <h3>02. Aplikasi Mobile (Flutter, Dart, Android)</h3>
                <p>Bangun pengalaman digital yang ikut ke mana saja di perangkat mobile.</p>
            </article>

            <article class="kotak">
                <h3>03. Data &amp; Kecerdasan Buatan (Python, SQL, ML)</h3>
                <p>Ubah data menjadi wawasan dan eksperimen yang bermakna.</p>
            </article>

            <article class="kotak">
                <h3>04. Desain Produk Digital (UI/UX, Figma)</h3>
                <p>Pahami pengguna, uji ide, dan rancang solusi antarmuka yang berguna.</p>
            </article>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2026 JDG (Junior Developer Group) — Proyek Mini UTS Pemrograman Web</p>
        </div>
    </footer>
</body>
</html>
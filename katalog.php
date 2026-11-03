<?php

declare(strict_types=1);

require_once 'data.php';
require_once 'functions.php';

$filterStatus = strtoupper($_GET['status'] ?? 'SEMUA');
$modeUrut = $_GET['urut'] ?? 'default';

$agendaTampil = filterStatusAgenda($daftarAgenda, $filterStatus, $tanggalHariIni);

if ($modeUrut === 'terdekat') {
    $agendaTampil = urutkanTanggalTerdekat($agendaTampil);
}

$ringkasan = hitungRingkasanAgenda($daftarAgenda, $tanggalHariIni);
$jumlahMendatang = $ringkasan['terbuka'] + $ringkasan['penuh'];
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
                <h3>Ringkasan Statistik Agenda (Dihitung Otomatis)</h3>
                <ul>
                    <li>
                        Total Agenda: <strong><?= e((string) $ringkasan['total_agenda']) ?> Kegiatan</strong>
                        (<?= e((string) $jumlahMendatang) ?> mendatang, <?= e((string) $ringkasan['selesai']) ?> selesai)
                    </li>
                    <li>Pendaftaran Terbuka: <strong><?= e((string) $ringkasan['terbuka']) ?> Kegiatan</strong></li>
                    <li>Kuota Penuh: <strong><?= e((string) $ringkasan['penuh']) ?> Kegiatan</strong></li>
                    <li>Kursi Tersisa (di Agenda Terbuka): <strong><?= e((string) $ringkasan['kursi_tersisa']) ?> Kursi</strong></li>
                    <li>Total Seluruh Peserta Terdaftar: <strong><?= e((string) $ringkasan['total_peserta']) ?> Orang</strong></li>
                </ul>
            </article>
        </section>

        <section>
            <h2>Daftar Agenda &amp; Status Pendaftaran</h2>

            <div class="kotak">
                <p style="margin: 0 0 10px 0;">
                    <strong>Filter Status:</strong>
                    <a href="katalog.php?status=SEMUA&amp;urut=<?= e($modeUrut) ?>" class="tombol">
                        Semua (<?= e((string) $ringkasan['total_agenda']) ?>)
                    </a>
                    <a href="katalog.php?status=TERBUKA&amp;urut=<?= e($modeUrut) ?>" class="tombol">
                        Terbuka (<?= e((string) $ringkasan['terbuka']) ?>)
                    </a>
                    <a href="katalog.php?status=PENUH&amp;urut=<?= e($modeUrut) ?>" class="tombol">
                        Penuh (<?= e((string) $ringkasan['penuh']) ?>)
                    </a>
                    <a href="katalog.php?status=SELESAI&amp;urut=<?= e($modeUrut) ?>" class="tombol">
                        Selesai (<?= e((string) $ringkasan['selesai']) ?>)
                    </a>
                </p>

                <p style="margin: 0 0 8px 0;">
                    <strong>Urutkan Tampilan:</strong>
                    <a href="katalog.php?status=<?= e($filterStatus) ?>&amp;urut=terdekat" class="tombol">
                        Tanggal Terdekat
                    </a>
                    <a href="katalog.php?status=<?= e($filterStatus) ?>&amp;urut=default" class="tombol">
                        Urutan Default
                    </a>
                </p>

                <small style="color: #94a3b8;">
                    Menampilkan <strong><?= e((string) count($agendaTampil)) ?></strong> agenda
                    | Status: <strong><?= e($filterStatus) ?></strong>
                    | Urutan: <strong><?= e($modeUrut === 'terdekat' ? 'Tanggal Terdekat' : 'Default') ?></strong>
                </small>
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
                <tbody>
                    <?php if (count($agendaTampil) === 0) : ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">
                                Tidak ada agenda kegiatan untuk status yang dipilih.
                            </td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($agendaTampil as $agenda) : ?>
                            <?php
                            $sisaKuota = hitungSisaKuota($agenda['kuota'], $agenda['peserta']);
                            $status = tentukanStatusAgenda($agenda, $tanggalHariIni);
                            ?>
                            <tr>
                                <td><?= e($agenda['tanggal']) ?></td>
                                <td>
                                    <strong><?= e($agenda['nama']) ?></strong><br>
                                    <small><?= e($agenda['kategori']) ?> — <?= e($agenda['deskripsi']) ?></small>
                                </td>
                                <td>
                                    <?= e($agenda['waktu']) ?><br>
                                    <?= e($agenda['lokasi']) ?>
                                </td>
                                <td>
                                    <?= e((string) $agenda['peserta']) ?> / <?= e((string) $agenda['kuota']) ?> terisi<br>
                                    <small>(Sisa <?= e((string) $sisaKuota) ?> kursi)</small>
                                </td>
                                <td>
                                    <span class="badge <?= e($status['class']) ?>">
                                        <?= e($status['label']) ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>

        <section>
            <h2>Cara Membaca Status</h2>
            <article class="kotak">
                <p><span class="badge terbuka">TERBUKA</span> — Kegiatan belum lewat dan kursi masih tersedia. Pendaftaran dapat dilakukan.</p>
                <p><span class="badge penuh">PENUH</span> — Kegiatan belum lewat, tetapi tidak ada kursi tersisa. Pendaftaran ditutup.</p>
                <p><span class="badge selesai">SELESAI</span> — Tanggal kegiatan sudah lewat (sebelum <?= e($tanggalHariIni) ?>). Pendaftaran berakhir.</p>
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
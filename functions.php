<?php

declare(strict_types=1);

/**
 * 1. Fungsi keamanan output HTML (Wajib melewati htmlspecialchars)
 */
function e(string $teks): string
{
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}

/**
 * 2. Fungsi buatan sendiri #1: Menghitung sisa kursi kuota kegiatan
 */
function hitungSisaKuota(int $kuota, int $peserta): int
{
    $sisa = $kuota - $peserta;
    if ($sisa < 0) {
        return 0;
    }

    return $sisa;
}

/**
 * 3. Fungsi buatan sendiri #2: Menentukan status kegiatan dengan percabangan if/elseif/else
 * Mengembalikan array berisi teks label dan nama class CSS untuk badge warna
 */
function tentukanStatusAgenda(array $agenda, string $tanggalHariIni): array
{
    $sisaKuota = hitungSisaKuota($agenda['kuota'], $agenda['peserta']);

    if ($agenda['tanggal'] < $tanggalHariIni) {
        return [
            'label' => 'SELESAI',
            'class' => 'selesai',
        ];
    } elseif ($sisaKuota === 0) {
        return [
            'label' => 'PENUH',
            'class' => 'penuh',
        ];
    } else {
        return [
            'label' => 'TERBUKA',
            'class' => 'terbuka',
        ];
    }
}

/**
 * 4. Fungsi buatan sendiri #3: Menghitung ringkasan statistik agenda
 * Memakai 3 fungsi array bawaan PHP: count(), array_column(), dan array_sum()
 */
function hitungRingkasanAgenda(array $daftarAgenda, string $tanggalHariIni): array
{
    // Fungsi array bawaan #1: count() untuk menghitung jumlah total item agenda
    $totalAgenda = count($daftarAgenda);

    // Fungsi array bawaan #2 & #3: array_column() dan array_sum() untuk menjumlahkan seluruh peserta
    $daftarPeserta = array_column($daftarAgenda, 'peserta');
    $totalPeserta = (int) array_sum($daftarPeserta);

    $jumlahTerbuka = 0;
    $jumlahPenuh = 0;
    $jumlahSelesai = 0;
    $kursiTersisaTerbuka = 0;

    foreach ($daftarAgenda as $agenda) {
        $status = tentukanStatusAgenda($agenda, $tanggalHariIni);

        if ($status['label'] === 'TERBUKA') {
            $jumlahTerbuka++;
            $kursiTersisaTerbuka += hitungSisaKuota($agenda['kuota'], $agenda['peserta']);
        } elseif ($status['label'] === 'PENUH') {
            $jumlahPenuh++;
        } else {
            $jumlahSelesai++;
        }
    }

    return [
        'total_agenda' => $totalAgenda,
        'total_peserta' => $totalPeserta,
        'terbuka' => $jumlahTerbuka,
        'penuh' => $jumlahPenuh,
        'selesai' => $jumlahSelesai,
        'kursi_tersisa' => $kursiTersisaTerbuka,
    ];
}

/**
 * 5. Fungsi buatan sendiri #4: Mengurutkan agenda berdasarkan tanggal terdekat (dari paling awal)
 * Memakai fungsi array bawaan #4: usort()
 */
function urutkanTanggalTerdekat(array $daftarAgenda): array
{
    usort($daftarAgenda, function (array $a, array $b): int {
        return $a['tanggal'] <=> $b['tanggal'];
    });

    return $daftarAgenda;
}
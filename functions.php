<?php

declare(strict_types=1);

function e(string $teks): string
{
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}

function hitungSisaKuota(int $kuota, int $peserta): int
{
    $sisa = $kuota - $peserta;
    if ($sisa < 0) {
        return 0;
    }

    return $sisa;
}

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

function hitungRingkasanAgenda(array $daftarAgenda, string $tanggalHariIni): array
{
    $totalAgenda = count($daftarAgenda);
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

function urutkanTanggalTerdekat(array $daftarAgenda): array
{
    usort($daftarAgenda, function (array $a, array $b): int {
        return $a['tanggal'] <=> $b['tanggal'];
    });

    return $daftarAgenda;
}

function filterStatusAgenda(array $daftarAgenda, string $statusFilter, string $tanggalHariIni): array
{
    if ($statusFilter === 'SEMUA') {
        return $daftarAgenda;
    }

    return array_filter(
        $daftarAgenda,
        function (array $agenda) use ($statusFilter, $tanggalHariIni): bool {
            $status = tentukanStatusAgenda($agenda, $tanggalHariIni);
            return $status['label'] === $statusFilter;
        }
    );
}
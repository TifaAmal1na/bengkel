<?php

namespace App\Charts;

use App\Models\Standard;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class WorkloadChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        // Mengambil data dari tabel Standard (TANGGAL_MULAI dan TANGGAL_SELESAI)
        $standardData = Standard::selectRaw("
                DATE_FORMAT(TANGGAL_MULAI, '%Y-%m') AS bulan,
                DATE_FORMAT(TANGGAL_SELESAI, '%Y-%m') AS bulan_selesai,
                STANDARD
            ")
            ->whereNotNull('TANGGAL_MULAI')
            ->whereNotNull('TANGGAL_SELESAI')
            ->orderBy('TANGGAL_MULAI')
            ->get();

        // Menyiapkan data untuk chart
        $labels = $standardData->pluck('bulan')->toArray();
        $standards = $standardData->pluck('STANDARD')->toArray();

        // Menyesuaikan warna dan nilai berdasarkan standar
        $adjustedStandards = array_map(function ($standard) {
            return $standard > 5 ? 5 : $standard; // Menurunkan standar jika lebih dari 5
        }, $standards);

        // Membuat chart dengan data garis merah
        return $this->chart->lineChart()
            ->setTitle('Workload Analysis')
            ->setSubtitle('Analisis Pekerjaan per Bulan')
            ->addData('Standard', $adjustedStandards)
            ->setXAxis($labels)
            ->setColors(['#dc3545']); // Merah untuk standar
    }
}
?>

<?php

namespace App\Charts;

use App\Models\Pekerjaan;
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
        // Mengambil jumlah pekerjaan aktif per bulan
        $workloadData = Pekerjaan::selectRaw("
                DATE_FORMAT(TANGGAL_MULAI, '%Y-%m') AS bulan,
                COUNT(*) AS jumlah_aktif
            ")
            ->where('STATUS', '<>', 'Tidak Aktif')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Mengambil data dari tabel Standard
        $standardData = Pekerjaan::selectRaw("
                DATE_FORMAT(TANGGAL_MULAI, '%Y-%m') AS bulan,
                COUNT(*) AS jumlah_standard
            ")
            ->whereNotNull('TANGGAL_MULAI')
            ->whereNotNull('TANGGAL_SELESAI')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Memisahkan data untuk chart
        $labels = $workloadData->pluck('bulan')->toArray();
        $activeJobs = $workloadData->pluck('jumlah_aktif')->toArray();
        $standards = $standardData->pluck('jumlah_standard')->toArray();

        // Membuat chart
        return $this->chart->lineChart()
            ->setTitle('Workload Analysis')
            ->setSubtitle('Analisis Pekerjaan per Bulan')
            ->addData('Pekerjaan Aktif', $activeJobs)
            ->addData('Standard', $standards)
            ->setXAxis($labels)
            ->setColors(['#28a745', '#dc3545']); // Hijau untuk pekerjaan, merah untuk standar
    }
}
?>

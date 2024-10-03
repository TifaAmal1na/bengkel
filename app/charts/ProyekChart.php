<?php

namespace App\Charts;

use App\Models\Proyek; // Pastikan untuk mengimpor model Proyek
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProyekChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        // Mengambil data proyek dari database
        $data = Proyek::all();

        // Mengelompokkan proyek berdasarkan status dan menjumlahkan jumlah pekerja
        $counts = $data->groupBy('STATUS')->map(function ($group) {
            return $group->sum('JUMLAH_PEKERJA');
        });

        // Mengambil label status proyek
        $labels = $counts->keys()->toArray();
        // Mengambil jumlah pekerja per status
        $values = $counts->values()->toArray();

        // Membuat chart
        return $this->chart->barChart()
            ->setTitle('Jumlah Pekerja Berdasarkan Status Proyek')
            ->setSubtitle('Data Proyek')
            ->addData('Jumlah Pekerja', $values)
            ->setLabels($labels);
    }
}

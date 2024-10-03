<?php

namespace App\Charts;

use App\Models\Personel;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PersonelChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        // Mengambil data personel dari database
        $data = Personel::all();

        // Mengelompokkan personel berdasarkan status dan menjumlahkan jumlah pekerja
        $counts = $data->groupBy('STATUS')->map(function ($group) {
            return $group->sum('JUMLAH_PEKERJA');
        });

        // Mengambil label status personel
        $labels = $counts->keys()->toArray();

        // Mengambil jumlah pekerja per status
        $values = $counts->values()->toArray();

        // Membuat chart pie
        return $this->chart->pieChart()
            ->setTitle('Distribusi Jumlah Pekerja Berdasarkan Status Tim')
            ->setSubtitle('Data Tim')
            ->addData($values) // Mengisi dengan jumlah pekerja
            ->setLabels($labels); // Status sebagai label
    }
}

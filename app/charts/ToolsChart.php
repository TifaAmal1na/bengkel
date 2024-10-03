<?php

namespace App\Charts;

use App\Models\Tools;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ToolsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        // Mengambil data tools dari database
        $data = Tools::all();

        // Mengelompokkan tools berdasarkan status
        $counts = $data->groupBy('STATUS')->map(function ($group) {
            return $group->count(); // Menghitung jumlah tools per status
        });

        // Mengambil label status tools
        $labels = $counts->keys()->toArray();

        // Mengambil jumlah tools per status
        $values = $counts->values()->toArray();

        // Membuat donut chart
        return $this->chart->donutChart()
            ->setTitle('Distribusi Tools Berdasarkan Status')
            ->setSubtitle('Data Tools 2024')
            ->addData($values) // Data jumlah tools
            ->setLabels($labels); // Status sebagai label
    }
}

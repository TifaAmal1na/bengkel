<?php

namespace App\Charts;

use App\Models\Workload;
use ArielMejiaDev\LarapexCharts\LarapexChart;

Class WorkloadChart{
    protected $chart;
    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        // Mengambil data workload dari database
        $data = Workload::orderBy('TANGGAL')->get();

        // Ekstrak tanggal dan jumlah pekerjaan aktif
        $labels = $data->pluck('TANGGAL')->toArray();
        $activeJobs = $data->pluck('JUMLAH_PEKERJAAN')->toArray();

        // Membuat array standar dengan nilai 5 untuk setiap tanggal
        $standard = array_fill(0, count($labels), 5);

        return $this->chart->lineChart()
            ->setTitle('Workload Chart')
            ->setSubtitle('Jumlah Pekerjaan Aktif per Hari')
            ->addData('Standard', $standard)
            ->addData('Aktif', $activeJobs)
            ->setLabels($labels)
            ->setColors(['#FF5733', '#33FF57']) // Warna garis
            ->setMarkers(['#FF5733', '#33FF57']); // Warna marker
            // ->setYAxisFormat('0'); // Format Y axis sebagai integer
    }
}

?>

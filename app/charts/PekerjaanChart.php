<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Workload;
use App\Models\Pekerjaan;

class PekerjaanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
{
    // Mengambil data target dari tabel Workload
    $workloads = Workload::orderBy('TANGGAL', 'asc')->get();
    $targets = $workloads->pluck('STANDARD')->toArray();

    // Memastikan $dates adalah array, bukan Collection
    $dates = $workloads->pluck('TANGGAL')->map(fn($date) => date('M d', strtotime($date)))->toArray();

    // Mengambil data realisasi dari tabel Pekerjaan
    $realisasi = Pekerjaan::whereIn('TANGGAL', $workloads->pluck('TANGGAL'))
        ->orderBy('TANGGAL', 'asc')
        ->pluck('JUMLAH')->toArray();

    return $this->chart->barChart()
        ->setTitle('Perbandingan Target dan Realisasi Pekerjaan')
        ->addData('Target Jumlah Pekerjaan', $targets)
        ->addData('Realisasi Jumlah Pekerjaan', $realisasi)
        ->setLabels($dates) // Pastikan ini sudah dalam bentuk array
        ->setColors(['#C0C0C0', '#33FFDD']); // Warna abu-abu dan hijau tosca
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\Workload;

class GaugeController extends Controller
{
public function index()
{
    // Ambil semua pekerjaan yang statusnya "Selesai"
    $completedPekerjaan = Pekerjaan::where('STATUS', 'Selesai')->get();

    // Ambil workload analysis terbaru berdasarkan tanggal
    $latestWorkloads = Workload::orderBy('TANGGAL', 'desc')->get();

    // Inisialisasi variabel untuk menghitung standar total dan pekerjaan
    $totalStandard = 0;
    $totalWorkload = 0;
    $completedCount = $completedPekerjaan->count();

    // Looping untuk menghitung nilai standar dari workload yang terkait dengan pekerjaan selesai
    foreach ($completedPekerjaan as $pekerjaan) {
        $workload = $latestWorkloads->where('ID_GRAFIK', $pekerjaan->ID_GRAFIK)->first();
        if ($workload) {
            $totalStandard += $workload->STANDARD;
            $totalWorkload += $workload->JUMLAH_PEKERJAAN;
        }
    }

    // Menghitung rata-rata standard workload jika ada pekerjaan selesai
    $averageStandard = ($completedCount > 0) ? ($totalStandard / $completedCount) : 0;

    // Menghitung persentase penyelesaian pekerjaan
    $completionPercentage = Pekerjaan::where('STATUS', 'Selesai')->count() / Pekerjaan::count() * 100;

    // Menentukan status kesehatan gauge berdasarkan nilai standard dan persentase pekerjaan selesai
    $healthStatus = 'Critical'; // Status default
    if ($completionPercentage > 70 && $averageStandard >= 5) {
        $healthStatus = 'Good';
    } elseif ($completionPercentage > 40) {
        $healthStatus = 'Moderate';
    }

    // Menghitung total jumlah workload (misalkan sebagai contoh, ini diambil dari total workload yang dihitung sebelumnya)
    $totalJumlah = $totalWorkload;

    // Return view dengan data yang sudah dihitung
    return view('gauge', compact('completionPercentage', 'averageStandard', 'healthStatus', 'totalJumlah'));
    }
}

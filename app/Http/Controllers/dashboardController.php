<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;
use App\Models\Standard; // Replace Workload with Standard model
use App\Models\Pekerjaan;
use App\Models\Tools;
use App\Models\User;
use App\Models\Personel;
use App\Models\Revisi;
use App\Models\Aktivitas;
use App\Charts\ProyekChart;
use App\Charts\PersonelChart;
use App\Charts\ToolsChart;
use App\Charts\WorkloadChart;
use App\Charts\PekerjaanChart;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index(ProyekChart $proyekChart, PersonelChart $personelChart, ToolsChart $toolsChart, WorkloadChart $workloadChart, PekerjaanChart $pekerjaanChart)
    {

        // Mengambil jumlah data dari masing-masing model
        $aktifProyek = Proyek::where('status', 'Aktif')->count();
        $pekerjaansemua = Pekerjaan::count();
        $kalibrarionTools = Tools::where('status', 'Perlu Kalibrasi')->count();
        $user = User::count();
        $aktifTools = Tools::where('status', 'Aktif')->count();
        $totalPekerjaanAktif = DB::table('pekerjaan')
            ->leftJoin('standard', 'standard.TANGGAL_MULAI', '=', 'pekerjaan.TANGGAL_MULAI') // Update table name to standard
            ->where('pekerjaan.status', 'Aktif')
            ->count('pekerjaan.id_pekerjaan');

        // Notifikasi
        $notifications = DB::table('notifikasi')
            ->orderBy('TANGGAL', 'DESC')
            ->limit(3)
            ->get();

        // Revisi Gambar
        $latestRevisions = Revisi::with('pekerjaan')
            ->orderBy('TANGGAL', 'DESC')
            ->limit(3)
            ->get();

        // Aktivitas Terbaru
        $latestActivities = Aktivitas::with('pekerjaan')
            ->orderBy('TANGGAL', 'DESC')
            ->limit(3)
            ->get();

        // Gauge data for health status
        $totalPekerjaan = Pekerjaan::count();
        $completedPekerjaan = Pekerjaan::where('STATUS', 'Selesai')->count();

        $latestStandard = Standard::orderBy('TANGGAL_MULAI', 'desc')->first(); // Replace Workload with Standard
        $workloadStandard = $latestStandard->STANDARD ?? 0; // Default to 0 if no standard found
        $workloadCount = $latestStandard->JUMLAH_PEKERJAAN ?? 0; // Default to 0 if no standard found

        $completionPercentage = ($totalPekerjaan > 0) ? ($completedPekerjaan / $totalPekerjaan) * 100 : 0;
        $healthStatus = 'Critical';

        if ($completionPercentage > 70 && $workloadCount < $workloadStandard) {
            $healthStatus = 'Good';
        } elseif ($completionPercentage > 40 && $completionPercentage <= 70) {
            $healthStatus = 'Moderate';
        }

        // Set gauge data based on health status
        $gaugeData = match ($healthStatus) {
            'Good' => 100,
            'Moderate' => 50,
            'Critical' => 0,
            default => 0,
        };

        // Membuat semua chart dan mengirimkannya ke view
        return view('dashboard', [
            'proyekChart' => $proyekChart->build(),
            'personelChart' => $personelChart->build(),
            'toolsChart' => $toolsChart->build(),
            'workloadChart' => $workloadChart->build(),
            'aktifProyek' => $aktifProyek,
            'pekerjaansemua' => $pekerjaansemua,
            'kalibrarionTools' => $kalibrarionTools,
            'user' => $user,
            'aktifTools' => $aktifTools,
            'totalPekerjaanAktif' => $totalPekerjaanAktif,
            'pekerjaanChart' => $pekerjaanChart->build(),
            'notifications' => $notifications,
            'latestRevisions' => $latestRevisions,
            'latestActivities' => $latestActivities,
            'completionPercentage' => $completionPercentage,
            'workloadCount' => $workloadCount,
            'healthStatus' => $healthStatus,
            'gaugeData' => $gaugeData, // Pass gauge data to the view
        ]);
    }
}

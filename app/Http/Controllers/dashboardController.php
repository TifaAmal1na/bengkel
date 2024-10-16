<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;
use App\Models\Workload;
use App\Models\Pekerjaan;
use App\Models\Tools;
use App\Models\User;
use App\Models\Personel;
use App\Charts\ProyekChart;
use App\Charts\PersonelChart;
use App\Charts\ToolsChart;
use App\Charts\WorkloadChart;
use App\Charts\PekerjaanChart;
use App\Models\Revisi; // Include the Revisi model

use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index(ProyekChart $proyekChart, PersonelChart $personelChart, ToolsChart $toolsChart, WorkloadChart $workloadChart, PekerjaanChart $pekerjaanChart)
    {
        // Mengambil jumlah data dari masing-masing model
        $aktifProyek = Proyek::where('status', 'Aktif')->count();
        $aktifPersonel = Personel::where('status', 'Aktif')->count();
        $kalibrarionTools = Tools::where('status', 'Perlu Kalibrasi')->count();
        $user = User::count();
        $aktifTools = Tools::where('status', 'Aktif')->count();
        $totalPekerjaanAktif = DB::table('pekerjaan')
            ->leftJoin('workload_analysis', 'workload_analysis.tanggal', '=', 'pekerjaan.tanggal')
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

        // Membuat semua chart dan mengirimkannya ke view
        return view('dashboard', [
            'proyekChart' => $proyekChart->build(),
            'personelChart' => $personelChart->build(),
            'toolsChart' => $toolsChart->build(),
            'workloadChart' => $workloadChart->build(),
            'aktifProyek' => $aktifProyek,
            'aktifPersonel' => $aktifPersonel,
            'kalibrarionTools' => $kalibrarionTools,
            'user' => $user,
            'aktifTools' => $aktifTools,
            'totalPekerjaanAktif' => $totalPekerjaanAktif,
            'pekerjaanChart' => $pekerjaanChart->build(),
            'notifications' => $notifications,  // Pass notifications to the view
            'latestRevisions' => $latestRevisions,  // Pass latest revisions to the view
        ]);
    }
}

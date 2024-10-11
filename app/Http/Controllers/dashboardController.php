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

class dashboardController extends Controller
{
    public function index(ProyekChart $proyekChart, PersonelChart $personelChart, ToolsChart $toolsChart, WorkloadChart $workloadChart)
    {
        // Mengambil jumlah data dari masing-masing model
        $aktifProyek = Proyek::where('status', 'Aktif')->count();
        $aktifPersonel = Personel::where('status', 'Aktif')->count();
        $kalibrarionTools = Tools::where('status', 'Perlu Kalibrasi')->count();
        $user = User::count(); 
        $aktifTools = Tools::where('status', 'Aktif')->count();
        $workload = Workload::count(); // sementara

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
            'workload' => $workload,
        ]);
    }
}

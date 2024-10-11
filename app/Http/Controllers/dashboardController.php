<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;
use App\Models\Workload;
use App\Models\Pekerjaan;
use App\Models\Tools;
use App\Models\User;
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
        $proyek = Proyek::count(); 
        $workload = Workload::count(); 
        $user = User::count(); 
        $pekerjaan = Pekerjaan::count();
        $tools = Tools::count();

        // Membuat semua chart dan mengirimkannya ke view
        return view('dashboard', [
            'proyekChart' => $proyekChart->build(),
            'personelChart' => $personelChart->build(),
            'toolsChart' => $toolsChart->build(),
            'workloadChart' => $workloadChart->build(),
            'aktifProyek' => $aktifProyek,
            'proyek' => $proyek,
            'workload' => $workload,
            'user' => $user,
            'pekerjaan' => $pekerjaan,
            'tools' => $tools,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\Workload;

class GaugeController extends Controller
{
    public function index()
    {
        // Total number of pekerjaan
        $totalPekerjaan = Pekerjaan::count();
        
        // Get completed pekerjaan count
        $completedPekerjaan = Pekerjaan::where('STATUS', 'Selesai')->count();

        // Get the latest workload analysis data
        $latestWorkload = Workload::orderBy('TANGGAL', 'desc')->first();
        $workloadStandard = $latestWorkload->STANDARD ?? 0; // Fallback to 0 if null
        $workloadCount = $latestWorkload->JUMLAH_PEKERJAAN ?? 0; // Fallback to 0 if null
        
        // Avoid division by zero and calculate completion percentage
        $completionPercentage = ($totalPekerjaan > 0) ? ($completedPekerjaan / $totalPekerjaan) * 100 : 0;

        // Determine health status
        $healthStatus = 'Critical'; // Default status
        
        if ($completionPercentage > 70 && $workloadCount < $workloadStandard) {
            $healthStatus = 'Good';
        } elseif ($completionPercentage > 40) {
            $healthStatus = 'Moderate';
        }

        // Return view with calculated data
        return view('dashboard.gauge', compact('completionPercentage', 'workloadCount', 'healthStatus'));
    }
}

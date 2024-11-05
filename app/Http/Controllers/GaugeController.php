<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\Standard;

class GaugeController extends Controller
{
    public function index()
    {
        
        // Fetch all completed pekerjaan
        $completedPekerjaan = Pekerjaan::where('STATUS', 'Selesai')->get();

        // Get the latest active standards based on date
        $activeStandards = Standard::where('STATUS', 'Aktif')
            ->whereDate('TANGGAL_MULAI', '<=', now())
            ->whereDate('TANGGAL_SELESAI', '>=', now())
            ->get();

        $totalStandard = 0;
        $totalWorkload = 0;
        $completedCount = $completedPekerjaan->count();

        // Calculate the total standard and workload values from active standards
        foreach ($completedPekerjaan as $pekerjaan) {
            $standard = $activeStandards->where('ID_GRAFIK', $pekerjaan->ID_GRAFIK)->first();
            if ($standard) {
                $totalStandard += $standard->STANDARD;
                $totalWorkload += $pekerjaan->JUMLAH_PEKERJAAN ?? 0; // Assuming JUMLAH_PEKERJAAN is part of pekerjaan data
            }
        }

        $averageStandard = ($completedCount > 0) ? ($totalStandard / $completedCount) : 0;
        $completionPercentage = Pekerjaan::where('STATUS', 'Selesai')->count() / Pekerjaan::count() * 100;

        // Determine health status based on completion percentage and average standard
        $healthStatus = 'Critical';
        if ($completionPercentage > 70 && $averageStandard >= 5) {
            $healthStatus = 'Good';
        } elseif ($completionPercentage > 40) {
            $healthStatus = 'Moderate';
        }

        // Return view with calculated data
        return view('gauge', compact('completionPercentage', 'averageStandard', 'healthStatus', 'totalJumlah'));
    }
}

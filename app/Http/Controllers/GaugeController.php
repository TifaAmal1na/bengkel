<?php

namespace App\Http\Controllers;

use App\Models\Workload;
use App\Models\Pekerjaan; // Add this model
use Illuminate\Http\Request;

class GaugeController extends Controller
{
    /**
     * Display the gauge chart.
     */
    public function index()
    {
        // Fetch data from both tables
        $workloadData = Workload::all();
        $pekerjaanData = Pekerjaan::all();

        // Example calculation: Sum of `JUMLAH` from pekerjaan and average `STANDARD` from workload_analysis
        $totalJumlah = $pekerjaanData->sum('JUMLAH');
        $averageStandard = $workloadData->avg('STANDARD');

        return view('gauge', compact('totalJumlah', 'averageStandard'));
    }
}

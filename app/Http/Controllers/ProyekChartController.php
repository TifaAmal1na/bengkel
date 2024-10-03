<?php

namespace App\Http\Controllers;

use App\Charts\ProyekChart;
use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekChartController extends Controller
{
    public function index(ProyekChart $chart)
    {
        return view('proyek.chart', ['chart' => $chart->build()]);
    }
}

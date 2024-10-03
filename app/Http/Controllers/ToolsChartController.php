<?php

namespace App\Http\Controllers;

use App\Charts\ToolsChart;

class ToolsChartController extends Controller
{
    public function index(ToolsChart $chart)
    {
        return view('tools.chart', ['chart' => $chart->build()]);
    }
}

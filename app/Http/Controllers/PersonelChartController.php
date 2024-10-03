<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\PersonelChart;

class PersonelChartController extends Controller
{
    public function index(PersonelChart $chart)
    {
        return view('personel.chart', ['chart' => $chart->build()]);
    }
}

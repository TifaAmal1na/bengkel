<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;
use App\Models\Workload;
use App\Models\Pekerjaan;
use App\Models\Tools;

class dashboardController extends Controller
{
    public function dashboard(){
        return view ("dashboard");
    }
}

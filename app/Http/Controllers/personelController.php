<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class personelController extends Controller
{
    public function personel(){
        return view('personel.personel');
    }
}

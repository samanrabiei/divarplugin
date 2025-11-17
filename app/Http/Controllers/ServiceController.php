<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{


    public function shahkarinquiry()
    {
        return view('divar.services.shahkarinquiry');
    }

    public function requiest($transicon)
    {
        dd($transicon);
    }
}

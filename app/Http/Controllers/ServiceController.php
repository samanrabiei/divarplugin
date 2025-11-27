<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function requiest($transicon)
    {


        $service = session('service')[$transicon] ?? null;

        // dd($transicon, $date, $txn);
        return \App\Services\ServiceDispatcher::dispatch(
            $service['type'],
            $service
        );
    }

    public function shahkarinquiry()
    {
        return view('divar.services.shahkarinquiry');
    }

    public function VehicleViolation()
    {
        return view('divar.services.VehicleViolation');
    }
}

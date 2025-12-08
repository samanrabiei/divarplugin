<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class begin extends Controller
{
    public function VehicleViolation()
    {
        return view('divar.services.landingVehicleViolation');
    }
}

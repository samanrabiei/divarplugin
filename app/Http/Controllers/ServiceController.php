<?php

namespace App\Http\Controllers;

use App\Models\ApiRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function requiest($transicon)
    {

        $apiRequest = ApiRequest::where('endpoint', $transicon)->first();

        if ($apiRequest) {
            session()->flash('error', [
                
                'title' => 'در خواست تکراری',
                'message' => 'این درخواست تکراری است لطفا سوابق استعلام خود را مشاهده فرمایید.'
            ]);
            return redirect()->route('profile.profile');
        } else {
            $service = session('service')[$transicon] ?? null;
            return \App\Services\ServiceDispatcher::dispatch(
                $service['type'],
                $service
            );
        }
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

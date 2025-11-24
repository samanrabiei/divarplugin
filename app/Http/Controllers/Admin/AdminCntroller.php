<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminCntroller extends Controller
{
    public function index()
    {
        $customers = DB::table('users')->where('is_admin', 0)->count();
        $wallet = DB::table('wallets')->sum('balance');
        $data =  [
            'customers' =>  $customers,
            'balance' =>  number_format($wallet),
        ];
        return view('admin.dashboard.index', $data);
    }
}

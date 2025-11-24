<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\DivarTransaction;

class DivarTransactionController extends Controller
{
    public function index()
    {
        $transactions = DivarTransaction::with('users')->get();
        return view('admin.transctions.TransctionsList', compact('transactions'));
    }
}

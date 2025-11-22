<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customers;
use Illuminate\Http\Request;
use App\Models\User;

class CustommerController extends Controller
{
    public function index()
    {
        $customers = Customers::where('is_admin', 0)->with('wallet')->paginate(10);

        return view('admin.custommers.usersList', compact('customers'));
    }


    public function show(Customers $customer)
    {
        return view('admin.custommers.viewProfile', compact('customer'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use  App\Models\ApiRequest;
use Illuminate\Support\Facades\Auth;

class VilationsContorller extends Controller
{
    public function index()
    {
        // $user = Auth::user();
        // $data = User::find($user['id']);
        $data['id'] = '1';
        $records = ApiRequest::where('user_id', $data['id'])->orderBy('id', 'desc')->paginate(10);

        return view('divar.records.index', compact('records'));
    }

    public function view($slug)
    {
        // $user = Auth::user();
        // $data = User::find($user['id']);
        $data['id'] = '1';

        $record = ApiRequest::where('endpoint', $slug)
            ->where('user_id', $data['id'])
            ->firstOrFail();
        return view('divar.records.view', compact('record'));
    }

    public function details($slug)
    {
        // $user = Auth::user();
        // $data = User::find($user['id']);
        $data['id'] = '1';

        $record = ApiRequest::where('endpoint', $slug)
            ->where('user_id', $data['id'])
            ->firstOrFail();
        return view('divar.records.details', compact('record'));
    }
}

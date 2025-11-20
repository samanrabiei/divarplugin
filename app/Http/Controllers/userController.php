<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function index()
    {
        // $user = User::find(5);
        // dd($user->profile->phone);

        // $profile = profile::find('1');
        // dd($profile->user);
        $id =  Auth::id();
        $user = User::find($id);
        dd($user['is_admin']);
    }
}

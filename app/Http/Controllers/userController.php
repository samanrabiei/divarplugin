<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\profile;

class userController extends Controller
{
    public function index()
    {
        // $user = User::find(5);
        // dd($user->profile->phone);

        // $profile = profile::find('1');
        // dd($profile->user);

        $user = User::find(5);
        dd($user->role);
    }
}

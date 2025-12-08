<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckDivarToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $id = Auth::id();
        $user = User::find($id);
        $timestart = strtotime($user->updated_at);
        $timeend = $timestart + $user->token_expires_at;
        $timenow = strtotime(Carbon::now()->format('Y-m-d H:i:s'));
        if ($timeend  <  $timenow) {
            auth()->logout(); // خروج از حساب
            return redirect()->route('profile.profile')->withErrors([
                'token' => 'زمان توکن شما تمام شده است. لطفاً دوباره وارد شوید.',
            ]);
        }
        return $next($request);
    }
}

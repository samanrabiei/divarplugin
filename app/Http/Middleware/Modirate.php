<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Modirate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = Auth::id();
        $user = User::find($id);

        // اگر لاگین نبود
        if (!$user) {
            return redirect()->route('admin');
        }

        // اگر ادمین نبود
        if ($user->is_admin != 1) {
            return redirect()->route('otp.phone.form');  // اینجا هر روتی که خواستی بگذار
        }

        return $next($request);
    }
}

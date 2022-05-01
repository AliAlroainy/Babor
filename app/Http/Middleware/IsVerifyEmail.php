<?php

namespace App\Http\Middleware;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    { $user=User::where(['email'=>$request->email])->first();
    //     if(empty($user->email_verified_at)){
        if (!Auth::user()->email_verified_at) {
           //  auth()->logout();
            return redirect()->route('user.dashboard')->with(
                [
                    'Emailverfication' => 'يرجى تاكيد حسابك    ',
                'tab' => 'profile',
            ]);
                }

        return $next($request);
    }
}

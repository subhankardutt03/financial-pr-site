<?php

namespace App\Http\Middleware;

use App\Models\AdminDeviceLogin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TokenStatus
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
        if (Session::has('session_token_status')) {
            $token = Session::get('session_token_status');
            if ($token != 'active') {
                return redirect()->route('admin.login.page')->with('error', 'Your token in expired!!');
            }
        }
        return $next($request);
    }
}
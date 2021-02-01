<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
//use App\Http\Controllers\Front\FrontController;

class DeezerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function isLoggedIn()
    {
        if (Session::has('user')) {
            $user = Session::get('user');

            if (date('Y-m-d H:i:s') >= $user->tokenDestroyTime) return false;

            return true;
        }
        return false;
    }

    public function forceLogout()
    {
        Session::forget('user');
        Session::forget('app');

        return redirect(route('front.login'));
    }


    public function handle($request, Closure $next)
    {

        if (!$this->isLoggedIn()) {
            return $this->forceLogout();
        }

        return $next($request);
    }
}

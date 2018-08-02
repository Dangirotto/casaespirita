<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user->isAdmin()){
            return $next($request);
        }else{
            Session::flash('middlewareErrorFlash','Esta área está disponível apenas para usuários administradores');
            return redirect(route('admin.index'));
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RootMiddleware
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
        if($user->isRoot()){
            return $next($request);
        }else{
            Session::flash('middlewareErrorFlash','Esta área está disponível apenas para usuário Master');
            return redirect(route('admin.index'));
        }
    }
}

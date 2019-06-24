<?php

namespace App\Http\Middleware;

use App\User;
use Illuminate\Support\Facades\Auth;
use Closure;
use Session;

class StatusMiddleware
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
        $user = User::find(Auth::user()->id);
        if($user->status==0){
            Auth::logout();
            Session::flash('message', 'No tienes permisos para acceder'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('/login');
        }
         
        return $next($request);
    }
}

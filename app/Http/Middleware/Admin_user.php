<?php

namespace App\Http\Middleware;

use Closure;
Use Auth;

class Admin_user
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
        if ( Auth::check() ) {
            $user = Auth::user();
            if($user->name == 'admin'){
                return $next($request);
            }else{
                return redirect()->route('index_page');
            }
        }
        else{
            return redirect()->route('index_page');
        }
    }
}

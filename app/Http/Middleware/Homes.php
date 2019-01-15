<?php

namespace App\Http\Middleware;

use Closure;

class Homes
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
        if(session()->get('login_user')['user_id'] == '0'){
            return redirect('/home/login')->with('error','请登录');
        }else{
            return $next($request);
        }
        
    }
}

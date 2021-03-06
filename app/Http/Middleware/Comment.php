<?php

namespace App\Http\Middleware;

use Closure;

class Comment
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
        if(session()->get('login_admin')){
            $admin = session()->get('login_admin');
            $data = $admin->adminpower['power_usable'];
            $array = explode(",", $data);
            foreach($array as $k=>$v){
                if($v == '12'){
                    return $next($request);
                }    
            }
            return redirect('/admin/index')->with('error','权限不够');
        }else{
            return redirect('/admin/login')->with('error','请登录');
        }
    }
}

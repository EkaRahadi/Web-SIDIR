<?php

namespace App\Http\Middleware;

use Closure;

class cekLogin
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
        if(empty(\Session::get('logged_in')[0])) return redirect('login')->with(['warning'=>'Anda harus Login dulu!']);
        return $next($request);
    }
}

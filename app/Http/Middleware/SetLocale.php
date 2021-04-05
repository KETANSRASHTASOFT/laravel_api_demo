<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use App;

class SetLocale
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
        $c = Cookie::get('locale');
        if($c){
            app()->setLocale(Cookie::get('locale'));  
        }else{
            // echo "not set";
        }
        return $next($request);
    }
}

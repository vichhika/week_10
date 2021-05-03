<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HTMLSanitize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        foreach($request->all() as $key => $value){
            if(in_array($request->method(),array("POST","PUT"))) filter_var($request->all()[$key],FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $next($request);
    }
}

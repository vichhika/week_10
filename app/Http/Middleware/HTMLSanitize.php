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
        if(in_array($request->method(),array("POST","PUT"))) filter_var($request->all()['category'],FILTER_SANITIZE_SPECIAL_CHARS);
        return $next($request);
    }
}

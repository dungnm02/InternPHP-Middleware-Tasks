<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $logFile = fopen('D:\Projects\InternPHP-Middleware-Tasks\MiddlewareTasks\resources\logs\requestlog.txt', 'a');
        fwrite($logFile, $request);
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/*
 * Middleware dùng để check tuổi user
 * Nếu chưa đủ 18 => điều hướng sang trang báo chưa đủ 18
 * Nếu đủ 18 => cho phép truy cập
 */
class CheckAge
{
    /**
     * Handle an incoming request.
     * @author dungnm243
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Lấy thông tin tuổi của user trong body
        if ($request->input('user.age') < 18) {
            return redirect('/notadultyet'); // Redirect sang trang chuaDu18
        }
        return $next($request); // Cho phép truy cập
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userRole = ['Murid', 'Walas'];
        if (session()->has('role') && in_array(session('role'), $userRole)) {
            // Lakukan sesuatu jika role sesuai
            // dd($userRole); // Hapus atau sesuaikan sesuai kebutuhan
            return $next($request);
        }
        return redirect('/unauthorized');
    }

}

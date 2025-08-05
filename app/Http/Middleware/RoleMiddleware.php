<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Periksa apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        // Periksa apakah peran pengguna (user->role) ada di dalam daftar $roles
        if (!in_array($user->role, $roles)) {
            // Jika tidak, arahkan kembali ke halaman sebelumnya atau halaman utama
            return redirect('/')->with('error', 'Anda tidak memiliki hak akses.');
        }

        return $next($request);
    }
}
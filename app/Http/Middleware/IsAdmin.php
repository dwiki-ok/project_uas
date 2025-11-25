<?php

// app/Http/Middleware/IsAdmin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect('login'); // Arahkan ke halaman login jika belum login
        }

        // 2. Periksa peran (role) pengguna
        $user = Auth::user();

        // Asumsi: Anda memiliki kolom 'role' di tabel 'users'
        // dan nilai untuk admin adalah 'admin'.
        if ($user->role === 'admin') {
            return $next($request); // Lanjutkan permintaan jika pengguna adalah admin
        }

        // 3. Jika pengguna bukan admin, tolak akses dan arahkan ke halaman lain
        return redirect('dashboard')->with('error', 'Anda tidak memiliki akses sebagai Admin.');
    }
}
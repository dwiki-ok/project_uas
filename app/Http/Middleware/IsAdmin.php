<?php
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
        // memastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect('login'); // kembali ke login 
        }

        // Periksa (role) pengguna
        $user = Auth::user();

        
        // periksa  role apakah admin atau mahasiswa  
        if ($user->role === 'admin') {
            return $next($request); // ke dashboard admin
        }

        // Jika pengguna bukan admin, akan ditolak akses 
        return redirect('dashboard')->with('error', 'Anda tidak memiliki akses sebagai Admin.');
    }
}
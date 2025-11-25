<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

// tampilan untuk mahasiswa 
Route::middleware(['auth', 'verified', ])->group(function () {

    Route::get('/dashboard', function () {
        $user = request()->user();
        $portfolios = $user ? $user->portfolios()->latest()->get() : collect();
        $allMahasiswa = User::where('role', 'mahasiswa')->with('portfolios')->get();
        return view('dashboard', compact('user', 'portfolios', 'allMahasiswa'));
    })->name('dashboard');

    // Profile (untuk mahasiswa)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // portofolio untuk mahasiswa 
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::get('/portfolio/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('/portfolio/{portfolio}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
});
  
   
require __DIR__.'/auth.php';

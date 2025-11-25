<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Tampilan untuk mahasiswa
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard mahasiswa
    Route::get('/dashboard', function () {
        $user = request()->user();
        $portfolios = $user ? $user->portfolios()->latest()->get() : collect();
        $allMahasiswa = User::where('role', 'mahasiswa')->with('portfolios')->get();
        return view('dashboard', compact('user', 'portfolios', 'allMahasiswa'));
    })->name('dashboard');

    // Profile mahasiswa
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Portofolio mahasiswa
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::get('/portfolio/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('/portfolio/{portfolio}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // Pengelolaan Portofolio Mahasiswa
    Route::get('/admin/{id}/portfolios', [AdminController::class, 'managePortfolios'])->name('admin.managePortfolios');
    Route::delete('/admin/portfolios/{portfolioId}', [AdminController::class, 'destroyPortfolio'])->name('admin.destroyPortfolio');

    // Statistik Mahasiswa dan Portofolio
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';

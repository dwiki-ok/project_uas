<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPortfolioController; 

Route::get('/', function () {
    return view('welcome');
});

// Tampilan untuk mahasiswa
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard mahasiswa
    Route::get('/dashboard', function () {
        $user = request()->user();
        $portfolios = $user ? $user->portfolios()->latest()->get() : collect();
        $allMahasiswa = User::where('role', 'mahasiswa')
        ->where('id', '!=', $user->id)   
        ->with('portfolios')
        ->paginate(4);            

        return view('dashboard', compact('user', 'portfolios', 'allMahasiswa'));
    })->name('dashboard');

    Route::get('/about', function () {
    return view('about');
    })->name('about');

    // Profile mahasiswa
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Portofolio mahasiswa
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::get('/portfolio/{portfolio}', [PortfolioController::class, 'show'])->name('portfolio.show');
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
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // Untuk kemudahan: buka 'admin.dashboard' akan menampilkan halaman Kelola Mahasiswa (index)
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Menampilkan Semua Portofolio (Halaman Tabel)
    Route::get('/admin/all-portfolios', [AdminPortfolioController::class, 'index'])
        ->name('admin.portfolios.index');

    // 2. Form Edit Portofolio (oleh Admin)
    Route::get('/admin/all-portfolios/{id}/edit', [AdminPortfolioController::class, 'edit'])
        ->name('admin.portfolios.edit');

    // 3. Proses Update Portofolio (oleh Admin)
    Route::put('/admin/all-portfolios/{id}', [AdminPortfolioController::class, 'update'])
        ->name('admin.portfolios.update');

    // 4. Hapus Portofolio (oleh Admin)
    Route::delete('/admin/all-portfolios/{id}', [AdminPortfolioController::class, 'destroy'])
        ->name('admin.portfolios.destroy');
});

require __DIR__.'/auth.php';

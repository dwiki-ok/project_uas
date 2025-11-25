<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware; // PENTING: Import Interface ini
use Illuminate\Routing\Controllers\Middleware;    // PENTING: Import Class ini
use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

// PENTING: Tambahkan "implements HasMiddleware" di sini
class AdminController extends Controller implements HasMiddleware
{
    /**
     * Pengganti __construct() di Laravel 11.
     * Mendefinisikan middleware yang berlaku untuk controller ini.
     */
    public static function middleware(): array
    {
        return [
            // Pastikan 'admin' sesuai dengan alias yang Anda buat di bootstrap/app.php
            'admin', 
            
            // Opsional: Jika ingin memastikan user login juga
            // 'auth', 
        ];
    }

    // Halaman daftar mahasiswa
    public function index()
    {
        $students = User::where('role', 'mahasiswa')->get();
        return view('admin.index', compact('students'));
    }

    // Redirect ke form register untuk tambah mahasiswa
    public function create()
    {
        return redirect()->route('register');
    }

    // Menyimpan data mahasiswa baru
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:8|confirmed',
            'nrp'           => 'required|unique:users,nrp',
            'prodi'         => 'nullable|string',
            'tahun_masuk'   => 'nullable|integer',
        ]);

        $user = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = Hash::make($request->password);
        $user->nrp          = $request->nrp;
        $user->prodi        = $request->prodi;
        $user->tahun_masuk  = $request->tahun_masuk;
        $user->role         = 'mahasiswa';
        $user->save();

        return redirect()->route('admin.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    // Menampilkan form edit mahasiswa
    public function edit($id)
    {
        $student = User::findOrFail($id);
        return view('admin.edit', compact('student'));
    }

    // Memperbarui data mahasiswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $id,
            'password'      => 'nullable|min:8|confirmed',
            'nrp'           => 'required|unique:users,nrp,' . $id,
            'prodi'         => 'nullable|string',
            'tahun_masuk'   => 'nullable|integer',
        ]);

        $user = User::findOrFail($id);
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->nrp          = $request->nrp;
        $user->prodi        = $request->prodi;
        $user->tahun_masuk  = $request->tahun_masuk;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    // Menghapus mahasiswa
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    // Menampilkan daftar portofolio mahasiswa
    public function managePortfolios($id)
    {
        $user = User::findOrFail($id);
        $portfolios = $user->portfolios;

        return view('admin.manage-portfolios', compact('user', 'portfolios'));
    }

    // Menghapus portofolio mahasiswa
    public function destroyPortfolio($portfolioId)
    {
        $portfolio = Portfolio::findOrFail($portfolioId);
        $portfolio->delete();

        return redirect()->back()->with('success', 'Portofolio berhasil dihapus.');
    }

    // Halaman dashboard admin
    public function dashboard()
    {
        $studentCount    = User::where('role', 'mahasiswa')->count();
        $portfolioCount  = Portfolio::count();

        return view('admin.dashboard', compact('studentCount', 'portfolioCount'));
    }
}
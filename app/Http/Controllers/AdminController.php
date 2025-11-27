<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;   
use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class AdminController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'admin', 
        ];
    }

    // Halaman daftar mahasiswa
    public function index()
    {
        $students = User::where('role', 'mahasiswa')->get();
        return view('admin.index', compact('students'));
    }

    // Menambahkan data mahasiswa baru
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'name'          => 'required|string|max:255',
        'email'         => 'required|email|unique:users,email',
        'password'      => 'required|min:8|confirmed',
        'nrp'           => 'required|unique:users,nrp',
        'prodi'         => 'nullable|string',
        'tahun_masuk'   => 'nullable|integer',
        'photo'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    // Handle photo upload
    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
    }

    // Create new user (mahasiswa)
    $user = new User();
    $user->name         = $request->name;
    $user->email        = $request->email;
    $user->password     = Hash::make($request->password);
    $user->nrp          = $request->nrp;
    $user->prodi        = $request->prodi;
    $user->tahun_masuk  = $request->tahun_masuk;
    $user->role         = 'mahasiswa';
    $user->profile_photo = $photoPath;  
    $user->save();  

    // Redirect back to the list with success message
    return redirect()->route('admin.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
}


     
    public function edit($id)
    {
        $student = User::findOrFail($id);
        return view('admin.edit', compact('student'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $id,
            'password'      => 'nullable|min:8|confirmed',
            'nrp'           => 'required|unique:users,nrp,' . $id,
            'prodi'         => 'nullable|string',
            'tahun_masuk'   => 'nullable|integer',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = User::findOrFail($id);

        
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->nrp          = $request->nrp;
        $user->prodi        = $request->prodi;
        $user->tahun_masuk  = $request->tahun_masuk;

        // Cek apakah ada foto baru yang diupload
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada 
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }
            
            //  Simpan foto 
            $newPhotoPath = $request->file('photo')->store('photos', 'public');
            $user->photo = $newPhotoPath;
        }
        
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.index')->with('success', 'Data Mahasiswa berhasil diperbarui.');
    }

    
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Hapus foto profil dari penyimpanan folder 
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        return redirect()->route('admin.index')->with('success', 'Data Mahasiswa berhasil dihapus.');
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
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;

class AdminPortfolioController extends Controller
{
    // Menampilkan SEMUA portofolio dari SEMUA mahasiswa
    public function index(Request $request)
    {
        // 1. Mulai Query Dasar
        // Kita siapkan query, tapi jangan pakai ->get() dulu, karena kita mau filter dulu.
        $query = Portfolio::with('user')->latest();

        // 2. Logika PENCARIAN (Search)
        // Jika di URL ada ?search=sesuatu
        if ($request->filled('search')) {
            $search = $request->search;
            
            // Cari dimana (Nama Proyek mirip) ATAU (Deskripsi mirip) ATAU (Nama User mirip)
            $query->where(function($q) use ($search) {
                $q->where('nama_proyek', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // 3. Logika FILTER PRODI
        // Jika di URL ada ?prodi=Teknik...
        if ($request->filled('prodi')) {
            $prodi = $request->prodi;
            
            // Cari portfolio yang pemiliknya (user) punya kolom prodi sesuai pilihan
            $query->whereHas('user', function($q) use ($prodi) {
                $q->where('prodi', $prodi); 
            });
        }

        // 4. Logika PAGINATION & "ALL" (Revisi Baru)
        
        // Ambil input dari dropdown, defaultnya 10
        $perPageInput = $request->input('per_page', 10);

        // Jika user memilih 'all', kita set limitnya jadi angka besar (misal 9999)
        // Jika tidak, pakai angka yang dipilih (10, 25, atau 50)
        $limit = ($perPageInput === 'all') ? 9999 : $perPageInput;

        // Eksekusi query
        $portfolios = $query->paginate($limit)->appends($request->all());

        return view('admin.portfolios.index', compact('portfolios'));
    }
    // Menghapus portofolio (Fitur Admin)
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        // Hapus file PDF jika ada
        if ($portfolio->pdf_file) {
            Storage::disk('public')->delete($portfolio->pdf_file);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio mahasiswa berhasil dihapus.');
    }
    // Opsional: Jika admin ingin mengedit portofolio mahasiswa
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolios.edit', compact('portfolio'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_proyek' => 'required',
            'deskripsi' => 'required',
            'keahlian' => 'required',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update($request->only(['nama_proyek','deskripsi','keahlian']));

        // Jika ada file PDF baru, simpan dan hapus file lama
        if ($request->hasFile('pdf_file')) {
            // hapus file lama jika ada
            if ($portfolio->pdf_file) {
                Storage::disk('public')->delete($portfolio->pdf_file);
            }

            $file = $request->file('pdf_file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('pdfs', $fileName, 'public');
            $portfolio->pdf_file = 'pdfs/' . $fileName;
            $portfolio->save();
        }

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil diupdate!');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Portfolio;


class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Auth::user()->portfolios;
        return view('portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('portfolio.create');
    }
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolio.edit', compact('portfolio'));
    }

    public function show($id)
    {
        $portfolio = Portfolio::with('user')->findOrFail($id);
        return view('portfolio.show', compact('portfolio'));
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

        return redirect()->route('portfolio.index')->with('success', 'Portfolio berhasil diupdate!');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio berhasil dihapus!');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'keahlian' => 'nullable|string',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240', 
        ]);

        $portfolio = Portfolio::create([
            'user_id' => Auth::id(),
            'nama_proyek' => $request->nama_proyek,
            'deskripsi' => $request->deskripsi,
            'keahlian' => $request->keahlian,
        ]);
        // Menyimpan file PDF jika ada
        // Menyimpan file PDF jika ada
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('pdfs', $fileName, 'public'); // Pastikan file disimpan di 'storage/app/public/pdfs'
            $portfolio->pdf_file = 'pdfs/' . $fileName; // Menyimpan path file PDF relatif ke storage
            $portfolio->save();  // Simpan perubahan ke database
        }



        return redirect()->route('portfolio.index')->with('success', 'Portofolio berhasil ditambahkan.');
    }
}

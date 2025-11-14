<?php

namespace App\Http\Controllers;

use App\Exports\BukuExport;
use App\Imports\BukuImport;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        $kategori = Kategori::all();
        return view('admin.buku', compact('kategori', 'buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'kategori_id' => 'required',
            'isbn' => 'required|unique:buku',
            'cover' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $coverPath = null;

        if ($request->file('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'kategori_id' => $request->kategori_id,
            'isbn' => $request->isbn,
            'cover' => $coverPath
        ]);

        return back()->with('success', 'Buku berhasil ditambahkan');
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.show-buku', compact('buku', 'kategori'));
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.edit-buku', compact('buku', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'kategori_id' => 'required',
            'isbn' => 'required',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $buku = Buku::findOrFail($id);

        $coverPath = $buku->cover;
        if ($request->file('cover')) {
            if ($buku->cover && file_exists(storage_path('app/public/' . $buku->cover))) {
                unlink(storage_path('app/public/' . $buku->cover));
            }
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'kategori_id' => $request->kategori_id,
            'isbn' => $request->isbn,
            'cover' => $coverPath
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    public function export()
    {
        return Excel::download(new BukuExport, 'buku.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new BukuImport, $request->file('file'));

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diimport!');
    }

    public function destroy(Buku $buku)
    {
        if ($buku->cover && Storage::disk('public')->exists($buku->cover)) {
            Storage::disk('public')->delete($buku->cover);
        }
        $buku->delete();

        return redirect()->back()->with('success', 'Buku berhasil dihapus.');
    }
}

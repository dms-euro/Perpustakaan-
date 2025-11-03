<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        $kategori = Kategori::all();
        return view('admin.buku', compact('kategori', 'buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'isbn' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        Buku::create($request->all());
        return redirect()->back()->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.show-buku', compact('buku', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all(); // kalau kamu punya tabel kategori
        return view('admin.edit-buku', compact('buku', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'isbn' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Buku berhasil dihapus.');
    }
}

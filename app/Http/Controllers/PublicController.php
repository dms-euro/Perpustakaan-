<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Pagination

        $buku = Buku::latest()->paginate(10);

        // Kategori + jumlah buku
        $kategori = Kategori::withCount('buku')->get();

        // Statistik
        $totalBuku = Buku::count();
        $tersedia  = Buku::where('stock', '>', 0)->count();
        $dipinjam  = Buku::where('stock', 0)->count();

        return view('homepage', compact(
            'buku',
            'kategori',
            'totalBuku',
            'tersedia',
            'dipinjam'
        ));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = User::where('role', 'anggota')->get();
        $buku = Buku::all();
        $peminjaman = Peminjaman::with('user', 'buku')->where('status', '!=', 'Dikembalikan')->get();
        return view('admin.peminjaman', compact('anggota', 'buku', 'peminjaman'));
    }

    public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'Dikembalikan';
        $peminjaman->save();

        return redirect()->route('peminjaman.index')->with('success', 'Buku berhasil dikembalikan!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'buku_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status' => 'required',
        ]);

        Peminjaman::create($request->all());
        return redirect()->back()->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $peminjaman = Peminjaman::with('user', 'buku')->findOrFail($id);

        // Hitung denda & keterlambatan
        $tglSekarang = Carbon::now()->startOfDay();
        $tglKembali = Carbon::parse($peminjaman->tanggal_kembali);
        $hariTerlambat = 0;
        $denda = 0;

        if ($tglSekarang->gt($tglKembali)) {
            $hariTerlambat = $tglSekarang->diffInDays($tglKembali);
            $denda = $hariTerlambat * 5000;
        }

        return view('admin.show-peminjaman', compact('peminjaman', 'hariTerlambat', 'denda'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}

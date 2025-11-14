<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        $buku = Buku::all();
        $anggota = User::where('role', 'anggota')->get();
        $peminjaman = Peminjaman::where('status', ['meminjam', '
terlambat'])->get();
        $start = Carbon::now()->startOfMonth();
        $end   = Carbon::now()->endOfMonth();

        $data = Peminjaman::selectRaw('DATE(tanggal_pinjam) as tanggal, COUNT(*) as total')
            ->whereBetween('tanggal_pinjam', [$start, $end])
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        // Kirim labels & values ke chart
        $labels = $data->pluck('tanggal')->map(fn($t) => Carbon::parse($t)->format('d M'));
        $values = $data->pluck('total');
        $kategoriChart = Kategori::withCount('buku')->get();

        $kategoriLabels = $kategoriChart->pluck('nama');      // Nama kategori
        $kategoriValues = $kategoriChart->pluck('buku_count'); // Jumlah buku per kategori

        return view('admin.dashboard', compact(
            'kategori',
            'buku',
            'anggota',
            'peminjaman',
            'labels',
            'values',
            'kategoriLabels',
            'kategoriValues'
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

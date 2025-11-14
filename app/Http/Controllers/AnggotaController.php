<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = User::where('role', 'anggota')->get();
        $petugas = user::where('role', 'petugas')->get();
        return view('admin.anggota', compact('anggota','petugas'));
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
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        User::create($request->all());
        return back()->with('success', 'Anggota berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anggota = User::findOrFail($id);
        return view('admin.show-anggota', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota = User::findOrFail($id);
        return view('admin.edit-anggota', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);
        $anggota = User::findOrFail($id);
        $anggota->update($request->all());
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota = User::findOrFail($id);
        $anggota->delete();
        return redirect()->back()->with('success', 'Anggota berhasil dihapus');
    }
}

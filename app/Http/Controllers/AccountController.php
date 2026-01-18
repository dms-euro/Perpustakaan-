<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akun = User::all();
        return view('admin.akun', compact('akun'));
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
            'kelas' => 'nullable',
            'role' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'kelas' => $request->kelas,
            'role' => $request->role,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);
        return back()->with('success', 'Akun berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $akun = User::findOrFail($id);
        return view('admin.show-akun', compact('akun'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $akun = User::findOrFail($id);
        return view('admin.edit-akun', compact('akun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'nullable',
            'email' => 'nullable',
            'password' => 'nullable',
            'kelas' => 'nullable',
            'role' => 'nullable',
            'alamat' => 'nullable',
            'telepon' => 'nullable',
        ]);
        $akun = User::findOrFail($id);

        $data = $request->only([
            'nama',
            'email',
            'kelas',
            'role',
            'alamat',
            'telepon',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $akun->update($data);

        return redirect()->route('akun.index')->with('success', 'Akun berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $akun = User::findOrFail($id);
        $akun->delete();
        return redirect()->back()->with('success', 'Akun berhasil dihapus');
    }
}

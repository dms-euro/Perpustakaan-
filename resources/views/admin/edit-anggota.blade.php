@extends('layouts.app')
@section('page-title', 'Manajemen User & Anggota')
@section('content')
<div class="lg:ml-64 pt-24">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header dengan Glass Effect --}}
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-sm border border-white/60 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex items-center gap-4 mb-4 lg:mb-0">
                    <div class="p-3 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-2xl shadow-lg">
                        <i class='bx bx-user text-white text-2xl'></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Edit Profil Anggota</h1>
                        <p class="text-gray-600 mt-2">Perbarui informasi dan keamanan akun anggota</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                        <span>Terakhir update: {{ $anggota->updated_at->format('d M Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-12 gap-8">

            {{-- Navigation Sidebar --}}
            <div class="xl:col-span-3">
                <div class="sticky top-8 space-y-6">

                    {{-- Profile Summary --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-full mx-auto mb-4 flex items-center justify-center shadow-lg">
                                <i class='bx bx-user text-white text-2xl'></i>
                            </div>
                            <h3 class="font-bold text-gray-800">{{ $anggota->nama }}</h3>
                            <p class="text-gray-600 text-sm mt-1">{{ $anggota->email }}</p>
                            <div class="mt-3">
                                <span class="inline-flex items-center px-3 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-semibold">
                                    {{ ucfirst($anggota->role) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Form Navigation --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                        <h4 class="font-semibold text-gray-800 mb-4">Menu Edit</h4>
                        <nav class="space-y-2">
                            <a href="#personal-info" class="flex items-center gap-3 p-3 bg-emerald-50 text-emerald-700 rounded-xl border border-emerald-200">
                                <i class='bx bx-user-circle text-emerald-600'></i>
                                <span class="font-medium">Informasi Pribadi</span>
                            </a>
                            <a href="#account-security" class="flex items-center gap-3 p-3 text-gray-600 hover:bg-gray-50 rounded-xl transition duration-200">
                                <i class='bx bx-lock-alt'></i>
                                <span class="font-medium">Keamanan Akun</span>
                            </a>
                            <a href="#preview" class="flex items-center gap-3 p-3 text-gray-600 hover:bg-gray-50 rounded-xl transition duration-200">
                                <i class='bx bx-show'></i>
                                <span class="font-medium">Preview Data</span>
                            </a>
                        </nav>
                    </div>

                    {{-- Quick Stats --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                        <h4 class="font-semibold text-gray-800 mb-4">Status Akun</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Status</span>
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">
                                    Aktif
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Bergabung</span>
                                <span class="font-medium text-gray-800">{{ $anggota->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Update Terakhir</span>
                                <span class="font-medium text-gray-800">{{ $anggota->updated_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Main Form Content --}}
            <div class="xl:col-span-9">
                <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">

                        {{-- Personal Information Section --}}
                        <div id="personal-info" class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                            <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-200">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                                        <i class='bx bx-user-circle text-emerald-600 text-xl'></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800">Informasi Pribadi</h3>
                                        <p class="text-gray-600 text-sm">Data diri dan kontak anggota</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <div class="lg:col-span-2">
                                        <label class="block text-sm font-semibold text-gray-700 mb-3">Nama Lengkap</label>
                                        <input type="text" name="nama" value="{{ old('nama', $anggota->nama) }}" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
                                            placeholder="Masukkan nama lengkap">
                                        @error('nama')
                                            <p class="text-red-500 text-sm mt-2 flex items-center gap-2">
                                                <i class='bx bx-error-circle'></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-3">Email</label>
                                        <input type="email" name="email" value="{{ old('email', $anggota->email) }}" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
                                            placeholder="contoh@email.com">
                                        @error('email')
                                            <p class="text-red-500 text-sm mt-2 flex items-center gap-2">
                                                <i class='bx bx-error-circle'></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-3">Nomor Telepon</label>
                                        <input type="text" name="telepon" value="{{ old('telepon', $anggota->telepon) }}" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
                                            placeholder="08xxxxxxxxxx">
                                        @error('telepon')
                                            <p class="text-red-500 text-sm mt-2 flex items-center gap-2">
                                                <i class='bx bx-error-circle'></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-3">Role</label>
                                        <select name="role" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 appearance-none bg-white">
                                            <option value="admin" {{ old('role', $anggota->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="petugas" {{ old('role', $anggota->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                            <option value="anggota" {{ old('role', $anggota->role) == 'anggota' ? 'selected' : '' }}>Anggota</option>
                                        </select>
                                        @error('role')
                                            <p class="text-red-500 text-sm mt-2 flex items-center gap-2">
                                                <i class='bx bx-error-circle'></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="lg:col-span-2">
                                        <label class="block text-sm font-semibold text-gray-700 mb-3">Alamat Lengkap</label>
                                        <textarea name="alamat" rows="3" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 resize-none"
                                            placeholder="Masukkan alamat lengkap">{{ old('alamat', $anggota->alamat) }}</textarea>
                                        @error('alamat')
                                            <p class="text-red-500 text-sm mt-2 flex items-center gap-2">
                                                <i class='bx bx-error-circle'></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Account Security Section --}}
                        <div id="account-security" class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                            <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-200">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                        <i class='bx bx-lock-alt text-red-600 text-xl'></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800">Keamanan Akun</h3>
                                        <p class="text-gray-600 text-sm">Update password untuk keamanan akun</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-3">Password Lama</label>
                                        <input type="password" name="current_password"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
                                            placeholder="Masukkan password lama">
                                        @error('current_password')
                                            <p class="text-red-500 text-sm mt-2 flex items-center gap-2">
                                                <i class='bx bx-error-circle'></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-3">Password Baru</label>
                                        <input type="password" name="password"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
                                            placeholder="Masukkan password baru">
                                        @error('password')
                                            <p class="text-red-500 text-sm mt-2 flex items-center gap-2">
                                                <i class='bx bx-error-circle'></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="lg:col-span-2">
                                        <label class="block text-sm font-semibold text-gray-700 mb-3">Konfirmasi Password Baru</label>
                                        <input type="password" name="password_confirmation"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
                                            placeholder="Konfirmasi password baru">
                                    </div>
                                </div>
                                <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-xl">
                                    <div class="flex items-start gap-3">
                                        <i class='bx bx-info-circle text-blue-500 text-lg mt-0.5'></i>
                                        <div>
                                            <p class="text-sm text-blue-800 font-medium">Tips Keamanan</p>
                                            <p class="text-sm text-blue-700 mt-1">Password harus mengandung minimal 8 karakter dengan kombinasi huruf, angka, dan simbol.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-4 pt-6">
                            <a href="{{ route('anggota.index') }}"
                                class="flex-1 px-6 py-4 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition duration-200 font-semibold flex items-center justify-center gap-3">
                                <i class='bx bx-arrow-back text-xl'></i>
                                Kembali ke Daftar
                            </a>
                            <button type="submit"
                                class="flex-1 px-6 py-4 bg-gradient-to-r from-emerald-500 to-teal-600 text-white rounded-xl hover:from-emerald-600 hover:to-teal-700 transition duration-200 font-semibold flex items-center justify-center gap-3 shadow-lg hover:shadow-xl">
                                <i class='bx bx-save text-xl'></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('nav a');
        links.forEach(link => {
            link.addEventListener('click', function() {
                links.forEach(l => l.classList.remove('bg-emerald-50', 'text-emerald-700', 'border-emerald-200'));
                links.forEach(l => l.classList.add('text-gray-600', 'hover:bg-gray-50'));
                this.classList.remove('text-gray-600', 'hover:bg-gray-50');
                this.classList.add('bg-emerald-50', 'text-emerald-700', 'border-emerald-200');
            });
        });
    });
</script>
@endsection

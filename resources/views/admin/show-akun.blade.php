@extends('layouts.app')
@section('page-title', 'Manajemen User')
@section('content')
    <div class="lg:ml-64 pt-24">

        <div class="max-w-6xl mx-auto px-4">
            {{-- Header --}}
            <div class="text-center mb-12">
                <div
                    class="inline-flex items-center gap-3 bg-white rounded-2xl px-6 py-4 shadow-sm border border-gray-200 mb-4">
                    <div class="p-3 bg-emerald-500 rounded-xl">
                        <i class='bx bx-user text-white text-2xl'></i>
                    </div>
                    <div class="text-left">
                        <h1 class="text-3xl font-bold text-gray-800">Detail Akun</h1>
                        <p class="text-gray-600 mt-1">Informasi lengkap data akun perpustakaan</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col xl:flex-row gap-8">

                {{-- Sidebar Profile --}}
                <div class="w-full xl:w-1/3">
                    <div class="sticky top-8 space-y-6">

                        {{-- Profile Card --}}
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                            <div class="text-center">
                                <div
                                    class="w-24 h-24 bg-emerald-100 rounded-full mx-auto mb-4 flex items-center justify-center border-4 border-white shadow-md">
                                    <i class='bx bx-user text-emerald-600 text-3xl'></i>
                                </div>
                                <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $akun->nama }}</h2>
                                <p class="text-gray-600 mb-4 flex items-center justify-center gap-2">
                                    <i class='bx bx-envelope text-emerald-500'></i>
                                    {{ $akun->email }}
                                </p>
                                <span
                                    class="inline-flex items-center px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-semibold">
                                    <i class='bx bx-cog mr-2'></i>
                                    {{ ucfirst($akun->role) }}
                                </span>
                            </div>
                        </div>

                        {{-- Contact Info --}}
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                            <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                                <i class='bx bx-phone text-emerald-500'></i>
                                Informasi Kontak
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3 text-gray-600 p-3 bg-gray-50 rounded-lg">
                                    <i class='bx bx-phone text-emerald-500'></i>
                                    <span>{{ $akun->telepon ?? '-' }}</span>
                                </div>
                                <div class="flex items-center gap-3 text-gray-600 p-3 bg-gray-50 rounded-lg">
                                    <i class='bx bx-calendar text-emerald-500'></i>
                                    <span>Bergabung: {{ $akun->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="flex-1">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                        {{-- Personal Information --}}
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="p-2 bg-blue-100 rounded-lg">
                                    <i class='bx bx-user-circle text-blue-600 text-xl'></i>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800">Informasi Pribadi</h3>
                            </div>

                            <div class="space-y-4">
                                <div
                                    class="flex items-center gap-4 p-4 hover:bg-gray-50 rounded-xl transition-colors duration-200 border border-gray-100">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class='bx bx-id-card text-blue-600 text-lg'></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-500">Nama</p>
                                        <p class="font-semibold text-gray-800">{{ $akun->nama }}</p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center gap-4 p-4 hover:bg-gray-50 rounded-xl transition-colors duration-200 border border-gray-100">
                                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i class='bx bx-envelope text-green-600 text-lg'></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-500">Email</p>
                                        <p class="font-semibold text-gray-800">{{ $akun->email }}</p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center gap-4 p-4 hover:bg-gray-50 rounded-xl transition-colors duration-200 border border-gray-100">
                                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <i class='bx bx-phone text-purple-600 text-lg'></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-500">Telepon</p>
                                        <p class="font-semibold text-gray-800">{{ $akun->telepon ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Role & Account --}}
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="p-2 bg-purple-100 rounded-lg">
                                    <i class='bx bx-shield-alt text-purple-600 text-xl'></i>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800">Role & Akun</h3>
                            </div>

                            <div class="space-y-4">
                                <div class="p-4 bg-emerald-50 border border-emerald-200 rounded-xl">
                                    <p class="text-sm text-gray-600">Role Saat Ini</p>
                                    <div class="flex items-center gap-3 mt-2">
                                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                                            <i class='bx bx-cog text-emerald-600 text-xl'></i>
                                        </div>
                                        <p class="text-lg font-bold text-gray-800">{{ ucfirst($akun->role) }}</p>
                                    </div>
                                </div>

                                <div class="p-4 bg-gray-50 border border-gray-200 rounded-xl">
                                    <p class="text-sm text-gray-600">Status Akun</p>
                                    <div class="flex items-center gap-3 mt-2">
                                        <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center">
                                            <i class='bx bx-check text-emerald-600'></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">Aktif</p>
                                            <p class="text-sm text-gray-500">Terdaftar sejak
                                                {{ $akun->created_at->format('M Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Alamat --}}
                        <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="p-2 bg-orange-100 rounded-lg">
                                    <i class='bx bx-home-alt text-orange-600 text-xl'></i>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800">Alamat Lengkap</h3>
                            </div>

                            <div class="p-4 bg-gray-50 border border-gray-200 rounded-xl">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mt-1">
                                        <i class='bx bx-map text-orange-600 text-xl'></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-semibold text-gray-800 mb-2">Alamat Terdaftar</p>
                                        <p class="text-gray-600 leading-relaxed">
                                            {{ $akun->alamat ?? 'Alamat belum diisi' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Action Buttons --}}
                    <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-end mb-4">
                        <a href="{{ route('akun.index') }}"
                            class="px-6 py-3 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition duration-200 font-semibold flex items-center gap-2 shadow-sm">
                            <i class='bx bx-arrow-back text-base'></i>
                            Kembali
                        </a>

                        <a href="{{ route('akun.edit', $akun->id) }}"
                            class="px-6 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition duration-200 font-semibold flex items-center gap-2 shadow-sm">
                            <i class='bx bx-edit text-base'></i>
                            Edit Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection

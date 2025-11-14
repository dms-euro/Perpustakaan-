@extends('layouts.app')
@section('page-title', 'Manajemen Buku & Kategori')
@section('content')
 <div class="lg:ml-64 pt-24">
        {{-- Header Section --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Detail Buku</h1>
            <div class="w-20 h-1 bg-emerald-500 mx-auto rounded-full"></div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">

            {{-- Cover Buku Section --}}
            <div class="w-full lg:w-2/5">
                <div class="sticky top-6">
                    @if ($buku->cover)
                        <img src="{{ asset('storage/' . $buku->cover) }}"
                            class="w-full h-80 object-cover rounded-xl shadow-lg border border-gray-200 hover:shadow-xl transition-shadow duration-300"
                            alt="Cover Buku">
                    @else
                        <div class="w-full h-80 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl flex flex-col items-center justify-center text-gray-400 border-2 border-dashed border-gray-300">
                            <i class='bx bx-image text-5xl mb-3'></i>
                            <p class="text-sm font-medium">Tidak ada cover</p>
                        </div>
                    @endif

                    {{-- Status Badge --}}
                    <div class="mt-4 flex justify-center">
                        <span class="px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-semibold">
                            <i class='bx bx-book-open mr-1'></i>
                            Buku Tersedia
                        </span>
                    </div>
                </div>
            </div>

            {{-- Detail Buku Section --}}
            <div class="flex-1">
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200">
                    {{-- Judul Buku --}}
                    <div class="mb-6 pb-4 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-800 leading-tight">{{ $buku->judul }}</h2>
                        <p class="text-gray-600 mt-2 flex items-center gap-1">
                            <i class='bx bx-user text-emerald-600'></i>
                            Karya {{ $buku->penulis }}
                        </p>
                    </div>

                    {{-- Grid Informasi --}}
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            {{-- Kategori --}}
                            <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm">
                                <div class="flex items-center gap-2 mb-2">
                                    <i class='bx bx-category text-emerald-600 text-lg'></i>
                                    <p class="text-sm font-medium text-gray-500">Kategori</p>
                                </div>
                                <h4 class="font-semibold text-gray-800 text-lg">{{ $buku->kategori->kategori ?? '-' }}</h4>
                            </div>

                            {{-- Penerbit --}}
                            <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm">
                                <div class="flex items-center gap-2 mb-2">
                                    <i class='bx bx-building text-emerald-600 text-lg'></i>
                                    <p class="text-sm font-medium text-gray-500">Penerbit</p>
                                </div>
                                <h4 class="font-semibold text-gray-800 text-lg">{{ $buku->penerbit }}</h4>
                            </div>

                            {{-- ISBN --}}
                            <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm">
                                <div class="flex items-center gap-2 mb-2">
                                    <i class='bx bx-barcode text-emerald-600 text-lg'></i>
                                    <p class="text-sm font-medium text-gray-500">ISBN</p>
                                </div>
                                <h4 class="font-semibold text-gray-800 text-lg font-mono">{{ $buku->isbn }}</h4>
                            </div>

                            {{-- Tahun Terbit --}}
                            <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm">
                                <div class="flex items-center gap-2 mb-2">
                                    <i class='bx bx-user text-emerald-600 text-lg'></i>
                                    <p class="text-sm font-medium text-gray-500">Penulis</p>
                                </div>
                                <h4 class="font-semibold text-gray-800 text-lg">{{ $buku->penulis }}</h4>
                            </div>
                        </div>

                        {{-- Timeline --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                            <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm">
                                <div class="flex items-center gap-2 mb-2">
                                    <i class='bx bx-plus-circle text-blue-600 text-lg'></i>
                                    <p class="text-sm font-medium text-gray-500">Dibuat</p>
                                </div>
                                <h4 class="font-semibold text-gray-800">{{ $buku->created_at->format('d M Y, H:i') }}</h4>
                            </div>

                            <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm">
                                <div class="flex items-center gap-2 mb-2">
                                    <i class='bx bx-edit text-orange-600 text-lg'></i>
                                    <p class="text-sm font-medium text-gray-500">Diperbarui</p>
                                </div>
                                <h4 class="font-semibold text-gray-800">{{ $buku->updated_at->format('d M Y, H:i') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-end">
            <a href="{{ route('buku.index') }}"
                class="px-6 py-3 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition duration-200 text-sm font-semibold flex items-center gap-2 justify-center">
                <i class='bx bx-arrow-back text-base'></i>
                Kembali ke Daftar
            </a>

            <a href="{{ route('buku.edit', $buku->id) }}"
                class="px-6 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition duration-200 text-sm font-semibold flex items-center gap-2 justify-center shadow-lg shadow-emerald-200">
                <i class='bx bx-edit text-base'></i>
                Edit Buku
            </a>
        </div>

    </div>
@endsection


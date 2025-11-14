@extends('layouts.app')
@section('page-title', 'Manajemen Peminjaman Buku')
@section('content')
 <div class="lg:ml-64 pt-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header Section --}}
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center gap-4 bg-white rounded-2xl px-8 py-6 shadow-lg border border-gray-200 mb-6">
                    <div class="p-4 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-2xl shadow-lg">
                        <i class='bx bx-book-open text-white text-3xl'></i>
                    </div>
                    <div class="text-left">
                        <h1 class="text-3xl font-bold text-gray-800">Detail Peminjaman Buku</h1>
                        <p class="text-gray-600 mt-2">Informasi lengkap transaksi peminjaman</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Main Information Card --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                        {{-- Card Header --}}
                        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-6 py-4">
                            <h2 class="text-xl font-bold text-white flex items-center gap-3">
                                <i class='bx bx-info-circle text-2xl'></i>
                                Informasi Peminjaman
                            </h2>
                        </div>

                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                {{-- Anggota Info --}}
                                <div class="md:col-span-2">
                                    <div
                                        class="flex items-center gap-4 p-4 bg-emerald-50 rounded-xl border border-emerald-200">
                                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                                            <i class='bx bx-user text-emerald-600 text-xl'></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-emerald-600 font-semibold">ANGGOTA PEMINJAM</p>
                                            <p class="text-lg font-bold text-gray-800 mt-1">{{ $peminjaman->user->nama }}
                                            </p>
                                            <p class="text-sm text-gray-600 mt-1">{{ $peminjaman->user->email }}</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Buku Info --}}
                                <div class="md:col-span-2">
                                    <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-xl border border-blue-200">
                                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <i class='bx bx-book text-blue-600 text-xl'></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-blue-600 font-semibold">BUKU YANG DIPINJAM</p>
                                            <p class="text-lg font-bold text-gray-800 mt-1">{{ $peminjaman->buku->judul }}
                                            </p>
                                            <p class="text-sm text-gray-600 mt-1">
                                                <span class="font-medium">Penulis:</span>
                                                {{ $peminjaman->buku->penulis ?? '-' }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                <span class="font-medium">Penerbit:</span>
                                                {{ $peminjaman->buku->penerbit ?? '-' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Timeline --}}
                                <div class="md:col-span-2">
                                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                        <p class="text-sm text-gray-600 font-semibold mb-4">TIMELINE PEMINJAMAN</p>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div class="text-center p-3 bg-white rounded-lg border border-gray-200">
                                                <p class="text-sm text-gray-500">TANGGAL PINJAM</p>
                                                <p class="text-lg font-bold text-emerald-600 mt-1">
                                                    {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}
                                                </p>
                                                <p class="text-xs text-gray-500 mt-1">
                                                    {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('H:i') }}
                                                </p>
                                            </div>
                                            <div class="text-center p-3 bg-white rounded-lg border border-gray-200">
                                                <p class="text-sm text-gray-500">TANGGAL KEMBALI</p>
                                                <p class="text-lg font-bold text-blue-600 mt-1">
                                                    {{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d M Y') }}
                                                </p>
                                                <p class="text-xs text-gray-500 mt-1">
                                                    {{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('H:i') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Status & Duration --}}
                                <div class="space-y-4">
                                    <div class="text-center p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                                        <p class="text-sm text-gray-500 mb-2">STATUS</p>
                                        <span
                                            class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold
                                        @if ($peminjaman->status == 'meminjam') bg-emerald-100 text-emerald-700 border border-emerald-200
                                        @elseif($peminjaman->status == 'terlambat') bg-red-100 text-red-700 border border-red-200
                                        @else bg-yellow-100 text-yellow-700 border border-yellow-200 @endif">
                                            <i
                                                class='bx
                                            @if ($peminjaman->status == 'meminjam') bx-check-circle
                                            @elseif($peminjaman->status == 'terlambat') bx-error-circle
                                            @else bx-time @endif mr-2'>
                                            </i>
                                            {{ ucfirst($peminjaman->status) }}
                                        </span>
                                    </div>

                                    <div class="text-center p-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                                        <p class="text-sm text-gray-500 mb-2">DURASI PINJAM</p>
                                        <p class="text-2xl font-bold text-gray-800">
                                            {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->diffInDays($peminjaman->tanggal_kembali) }}
                                            hari
                                        </p>
                                    </div>
                                </div>

                                {{-- Keterlambatan & Denda --}}
                                <div class="space-y-4">
                                    <div
                                        class="text-center p-4 bg-white rounded-xl border border-gray-200 shadow-sm
                                    {{ $hariTerlambat > 0 ? 'bg-red-50 border-red-200' : 'bg-green-50 border-green-200' }}">
                                        <p class="text-sm text-gray-500 mb-2">KETERLAMBATAN</p>
                                        <p
                                            class="text-2xl font-bold {{ $hariTerlambat > 0 ? 'text-red-600' : 'text-green-600' }}">
                                            {{ $hariTerlambat > 0 ? $hariTerlambat . ' hari' : 'Tepat waktu' }}
                                        </p>
                                        @if ($hariTerlambat > 0)
                                            <p class="text-xs text-red-500 mt-1">Melebihi batas waktu</p>
                                        @else
                                            <p class="text-xs text-green-500 mt-1">Masih dalam batas waktu</p>
                                        @endif
                                    </div>

                                    <div
                                        class="text-center p-4 bg-white rounded-xl border border-gray-200 shadow-sm
                                    {{ $denda > 0 ? 'bg-red-50 border-red-200' : 'bg-gray-50 border-gray-200' }}">
                                        <p class="text-sm text-gray-500 mb-2">DENDA</p>
                                        <p class="text-2xl font-bold {{ $denda > 0 ? 'text-red-600' : 'text-gray-600' }}">
                                            Rp {{ number_format($denda, 0, ',', '.') }}
                                        </p>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $denda > 0 ? 'Harus dibayar' : 'Tidak ada denda' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sidebar Actions & Info --}}
                <div class="space-y-6">

                    {{-- Quick Actions --}}
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                        <div class="bg-gradient-to-r from-gray-600 to-gray-700 px-6 py-4">
                            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                                <i class='bx bx-cog text-xl'></i>
                                Aksi Cepat
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <form action="{{ route('peminjaman.kembalikan', $peminjaman->id) }}" method="POST"
                                class="inline kembalikan-form">
                                @csrf
                                <button
                                    class="w-full bg-emerald-500 text-white py-3 px-4 rounded-xl hover:bg-emerald-600 transition duration-200 font-semibold flex items-center justify-center gap-2 shadow-lg hover:shadow-xl">
                                    <i class='bx bx-check-circle text-xl'></i>
                                    Kembalikan Buku
                                </button>
                            </form>
                            <a href="{{ route('peminjaman.index') }}"
                                class="w-full bg-gray-500 text-white py-3 px-4 rounded-xl hover:bg-gray-600 transition duration-200 font-semibold flex items-center justify-center gap-2">
                                <i class='bx bx-arrow-back text-xl'></i>
                                Kembali
                            </a>
                        </div>
                    </div>

                    {{-- Additional Info --}}
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-500 to-cyan-600 px-6 py-4">
                            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                                <i class='bx bx-info-circle text-xl'></i>
                                Informasi Tambahan
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <span class="text-sm text-gray-600">ID Transaksi</span>
                                <span class="font-mono font-bold text-gray-800">#{{ $peminjaman->id }}</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <span class="text-sm text-gray-600">Dibuat</span>
                                <span class="text-sm font-semibold text-gray-800">
                                    {{ $peminjaman->created_at->format('d M Y') }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <span class="text-sm text-gray-600">Diupdate</span>
                                <span class="text-sm font-semibold text-gray-800">
                                    {{ $peminjaman->updated_at->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Status Alert --}}
                    @if ($peminjaman->status == 'terlambat')
                        <div class="bg-red-50 border border-red-200 rounded-2xl p-6">
                            <div class="flex items-center gap-3">
                                <i class='bx bx-error-circle text-red-500 text-2xl'></i>
                                <div>
                                    <h4 class="font-bold text-red-800">Peringatan Keterlambatan</h4>
                                    <p class="text-sm text-red-600 mt-1">Buku sudah melebihi batas waktu pengembalian</p>
                                </div>
                            </div>
                        </div>
                    @elseif($peminjaman->status == 'meminjam')
                        <div class="bg-green-50 border border-green-200 rounded-2xl p-6">
                            <div class="flex items-center gap-3">
                                <i class='bx bx-check-circle text-green-500 text-2xl'></i>
                                <div>
                                    <h4 class="font-bold text-green-800">Status Normal</h4>
                                    <p class="text-sm text-green-600 mt-1">Buku masih dalam masa peminjaman</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

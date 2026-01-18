@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-50">
        <!-- Hero Section dengan Desain Modern -->
        <div class="relative overflow-hidden bg-gradient-to-br from-gray-900 via-emerald-900 to-teal-900">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); background-size: 60px 60px;"></div>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 py-28 sm:px-6 lg:px-8">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Perpustakaan Digital Terdepan
                    </div>

                    <!-- Main Heading -->
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight tracking-tight">
                        <span class="block">Jelajahi Dunia</span>
                        <span class="block bg-gradient-to-r from-emerald-400 to-cyan-400 bg-clip-text text-transparent">Tanpa Batas</span>
                    </h1>

                    <!-- Subheading -->
                    <p class="text-xl text-gray-300 mb-10 max-w-3xl mx-auto leading-relaxed">
                        Akses koleksi digital eksklusif dari berbagai genre. Temukan pengetahuan baru dan kembangkan potensi Anda dengan fitur pencarian yang canggih.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#explore"
                            class="group relative inline-flex items-center justify-center px-8 py-3.5 bg-white text-gray-900 font-bold rounded-lg hover:shadow-2xl hover:shadow-emerald-500/30 transition-all duration-300 transform hover:-translate-y-1">
                            <span>Mulai Jelajahi</span>
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                        <a href="#rules"
                            class="group inline-flex items-center justify-center px-8 py-3.5 bg-transparent text-white font-bold rounded-lg border-2 border-white/30 hover:bg-white/10 hover:border-white/50 backdrop-blur-sm transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            Panduan Akses
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="relative -mb-12">
                <div class="max-w-6xl mx-auto px-4">
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="bg-white/90 backdrop-blur-lg rounded-2xl p-6 text-center shadow-2xl shadow-black/10 transform hover:-translate-y-1 transition-all duration-300">
                            <div class="text-3xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent mb-2">{{ $totalBuku }}+</div>
                            <p class="text-gray-700 font-medium">Judul Buku</p>
                        </div>
                        <div class="bg-white/90 backdrop-blur-lg rounded-2xl p-6 text-center shadow-2xl shadow-black/10 transform hover:-translate-y-1 transition-all duration-300">
                            <div class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent mb-2">{{ $kategori->count() }}+</div>
                            <p class="text-gray-700 font-medium">Kategori</p>
                        </div>
                        <div class="bg-white/90 backdrop-blur-lg rounded-2xl p-6 text-center shadow-2xl shadow-black/10 transform hover:-translate-y-1 transition-all duration-300">
                            <div class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-2">24/7</div>
                            <p class="text-gray-700 font-medium">Akses Digital</p>
                        </div>
                        <div class="bg-white/90 backdrop-blur-lg rounded-2xl p-6 text-center shadow-2xl shadow-black/10 transform hover:-translate-y-1 transition-all duration-300">
                            <div class="text-3xl font-bold bg-gradient-to-r from-amber-600 to-orange-600 bg-clip-text text-transparent mb-2">100%</div>
                            <p class="text-gray-700 font-medium">Gratis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 py-16">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content Area -->
                <div class="lg:w-2/3 space-y-8">
                    <!-- Search Section -->
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100" id="explore">
                        <div class="flex items-center justify-between mb-8">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Temukan Buku Favoritmu</h2>
                                <p class="text-gray-600 mt-2">Filter dan cari dari koleksi kami yang luas</p>
                            </div>
                            <div class="hidden sm:block">
                                <span class="text-sm text-gray-500">{{ $buku->total() }} buku tersedia</span>
                            </div>
                        </div>

                        <form id="searchForm" class="space-y-6">
                            <!-- Search Bar -->
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <input type="text" id="searchInput"
                                    class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:bg-white transition-all duration-200"
                                    placeholder="Cari judul, penulis, atau ISBN...">
                            </div>

                            <!-- Filter Row -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <select id="kategoriSelect" name="kategori"
                                    class="bg-gray-50 border border-gray-200 text-gray-900 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3.5 transition-all duration-200">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id }}" {{ request('kategori') == $k->id ? 'selected' : '' }}>
                                            {{ $k->kategori }}
                                        </option>
                                    @endforeach
                                </select>

                                <select id="sortSelect" name="sort"
                                    class="bg-gray-50 border border-gray-200 text-gray-900 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 px-4 py-3.5 transition-all duration-200">
                                    <option value="">Urutkan berdasarkan</option>
                                    <option value="judul_asc" {{ request('sort') == 'judul_asc' ? 'selected' : '' }}>Judul A → Z</option>
                                    <option value="judul_desc" {{ request('sort') == 'judul_desc' ? 'selected' : '' }}>Judul Z → A</option>
                                    <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                </select>

                                <button type="button" onclick="resetFilter()"
                                    class="inline-flex items-center justify-center gap-2 text-gray-700 bg-gray-100 hover:bg-gray-200 border border-gray-200 font-medium rounded-xl px-4 py-3.5 transition-all duration-200 hover:shadow-md">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    Reset Filter
                                </button>
                            </div>
                        </form>

                        <!-- Active Filters -->
                        <div id="activeFilters" class="flex flex-wrap gap-2 mt-6 hidden">
                            <!-- Active filters will be shown here -->
                        </div>
                    </div>

                    <!-- Books Grid -->
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($buku as $item)
                            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 transform hover:-translate-y-1 book-card"
                                data-judul="{{ strtolower($item->judul) }}"
                                data-penulis="{{ strtolower($item->penulis) }}"
                                data-isbn="{{ strtolower($item->isbn ?? '') }}"
                                data-kategori="{{ $item->kategori_id }}"
                                data-tahun="{{ $item->tahun_terbit }}">

                                <!-- Book Cover -->
                                <div class="relative overflow-hidden">
                                    <div class="aspect-[3/4] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                        @if($item->cover && file_exists(public_path('storage/' . $item->cover)))
                                            <img src="{{ asset('storage/' . $item->cover) }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            <div class="text-gray-400">
                                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Status Badge -->
                                    <div class="absolute top-4 right-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                            {{ $item->stock > 0 ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $item->stock > 0 ? 'Tersedia' : 'Dipinjam' }}
                                        </span>
                                    </div>

                                    <!-- Category Badge -->
                                    <div class="absolute top-4 left-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/90 backdrop-blur-sm text-gray-700">
                                            {{ $item->kategori->kategori ?? 'Umum' }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Book Details -->
                                <div class="p-5">
                                    <h3 class="font-bold text-gray-900 mb-2 line-clamp-2 text-lg group-hover:text-emerald-600 transition-colors">
                                        {{ $item->judul }}
                                    </h3>

                                    <div class="space-y-3 mb-4">
                                        <div class="flex items-center gap-2 text-sm text-gray-600">
                                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                            <span class="truncate">{{ $item->penulis }}</span>
                                        </div>

                                        <div class="flex items-center gap-2 text-sm text-gray-600">
                                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                            <span>{{ $item->penerbit }} • {{ $item->tahun_terbit ?? '-' }}</span>
                                        </div>
                                    </div>

                                    <!-- Action Button -->
                                    <div class="pt-4 border-t border-gray-100">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-xs text-gray-500">Stok Tersedia</p>
                                                <p class="font-semibold {{ $item->stock > 0 ? 'text-emerald-600' : 'text-red-600' }}">
                                                    {{ $item->stock }} buku
                                                </p>
                                            </div>
                                            <button class="inline-flex items-center gap-2 text-sm font-medium text-emerald-600 hover:text-emerald-700 transition-colors">
                                                Detail
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3 text-center py-16">
                                <div class="max-w-md mx-auto">
                                    <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Tidak ada buku yang cocok</h3>
                                    <p class="text-gray-500 mb-6">Coba ubah kata kunci pencarian atau filter yang digunakan</p>
                                    <button onclick="resetFilter()" class="text-emerald-600 hover:text-emerald-700 font-medium">
                                        Reset semua filter →
                                    </button>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if ($buku->hasPages())
                        <div class="mt-10">
                            {{ $buku->links() }}
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3 space-y-6" id="rules">
                    <!-- Info Cards Container -->
                    <div class="space-y-6 sticky top-6">
                        <!-- Quick Stats -->
                        <div class="bg-gradient-to-br from-emerald-50 to-cyan-50 rounded-2xl p-6 border border-emerald-100">
                            <h3 class="font-bold text-gray-900 mb-4 text-lg">Statistik Cepat</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                                    <div class="text-2xl font-bold text-emerald-600 mb-1">{{ $totalBuku }}</div>
                                    <div class="text-sm text-gray-600">Total Buku</div>
                                </div>
                                <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                                    <div class="text-2xl font-bold text-blue-600 mb-1">{{ $kategori->count() }}</div>
                                    <div class="text-sm text-gray-600">Kategori</div>
                                </div>
                            </div>
                        </div>

                        <!-- Rules Card -->
                        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="font-bold text-gray-900 text-lg">Aturan Peminjaman</h3>
                                <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="space-y-4">
                                @foreach([
                                    ['num' => 1, 'text' => 'Wajib membawa kartu anggota'],
                                    ['num' => 2, 'text' => 'Maksimal 3 buku per anggota'],
                                    ['num' => 3, 'text' => 'Durasi pinjam 7 hari'],
                                    ['num' => 4, 'text' => 'Denda Rp 2.000/hari']
                                ] as $rule)
                                <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                    <div class="w-7 h-7 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0">
                                        <span class="text-emerald-600 font-bold text-sm">{{ $rule['num'] }}</span>
                                    </div>
                                    <p class="text-gray-700">{{ $rule['text'] }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Hours Card -->
                        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="font-bold text-gray-900 text-lg">Jam Operasional</h3>
                                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="space-y-3">
                                @foreach([
                                    ['days' => 'Senin - Jumat', 'hours' => '08:00 - 17:00', 'color' => 'text-emerald-600'],
                                    ['days' => 'Sabtu', 'hours' => '09:00 - 15:00', 'color' => 'text-emerald-600'],
                                    ['days' => 'Minggu', 'hours' => 'Tutup', 'color' => 'text-red-600']
                                ] as $schedule)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="font-medium text-gray-700">{{ $schedule['days'] }}</span>
                                    <span class="font-bold {{ $schedule['color'] }}">{{ $schedule['hours'] }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Contact Card -->
                        <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl p-6 text-white">
                            <h3 class="font-bold text-white mb-6 text-lg">Butuh Bantuan?</h3>

                            <div class="space-y-4">
                                <a href="tel:02112345678" class="flex items-center gap-3 p-3 rounded-lg bg-white/10 hover:bg-white/20 transition-colors">
                                    <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-300">Telepon</p>
                                        <p class="font-medium">(021) 1234-5678</p>
                                    </div>
                                </a>

                                <a href="mailto:info@perpusdigital.id" class="flex items-center gap-3 p-3 rounded-lg bg-white/10 hover:bg-white/20 transition-colors">
                                    <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-300">Email</p>
                                        <p class="font-medium">info@perpusdigital.id</p>
                                    </div>
                                </a>

                                <div class="flex items-center gap-3 p-3 rounded-lg bg-white/10">
                                    <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-300">Lokasi</p>
                                        <p class="font-medium">Jl. Perpustakaan No. 123</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function resetFilter() {
            document.getElementById('searchInput').value = "";
            document.getElementById('kategoriSelect').value = "";
            document.getElementById('sortSelect').value = "";
            filterBooks();
            updateActiveFilters();
        }

        function filterBooks() {
            const keyword = document.getElementById('searchInput').value.toLowerCase();
            const kategori = document.getElementById('kategoriSelect').value;
            const sort = document.getElementById('sortSelect').value;
            const cards = document.querySelectorAll('.book-card');

            let visibleCards = [];

            cards.forEach(card => {
                const judul = card.dataset.judul;
                const penulis = card.dataset.penulis;
                const isbn = card.dataset.isbn;
                const kategoriId = card.dataset.kategori;

                const matchSearch = judul.includes(keyword) || penulis.includes(keyword) || isbn.includes(keyword);
                const matchKategori = kategori === "" || kategori === kategoriId;

                if (matchSearch && matchKategori) {
                    card.style.display = "block";
                    visibleCards.push(card);
                } else {
                    card.style.display = "none";
                }
            });

            // Sorting logic
            if (sort === "judul_asc") {
                visibleCards.sort((a, b) => a.dataset.judul.localeCompare(b.dataset.judul));
            } else if (sort === "judul_desc") {
                visibleCards.sort((a, b) => b.dataset.judul.localeCompare(a.dataset.judul));
            } else if (sort === "terbaru") {
                visibleCards.sort((a, b) => b.dataset.tahun - a.dataset.tahun);
            }

            // Reorder cards in DOM
            const parent = visibleCards[0]?.parentElement;
            if (parent) {
                visibleCards.forEach(card => parent.appendChild(card));
            }
        }

        function updateActiveFilters() {
            const container = document.getElementById('activeFilters');
            const searchInput = document.getElementById('searchInput');
            const kategoriSelect = document.getElementById('kategoriSelect');

            container.innerHTML = '';

            if (searchInput.value) {
                const chip = document.createElement('div');
                chip.className = 'inline-flex items-center gap-1 bg-emerald-50 text-emerald-700 px-3 py-1.5 rounded-lg text-sm';
                chip.innerHTML = `
                    ${searchInput.value}
                    <button onclick="document.getElementById('searchInput').value = ''; filterBooks(); updateActiveFilters();"
                            class="ml-1 text-emerald-500 hover:text-emerald-700">
                        &times;
                    </button>
                `;
                container.appendChild(chip);
            }

            if (kategoriSelect.value) {
                const chip = document.createElement('div');
                chip.className = 'inline-flex items-center gap-1 bg-blue-50 text-blue-700 px-3 py-1.5 rounded-lg text-sm';
                chip.innerHTML = `
                    ${kategoriSelect.options[kategoriSelect.selectedIndex].text}
                    <button onclick="document.getElementById('kategoriSelect').value = ''; filterBooks(); updateActiveFilters();"
                            class="ml-1 text-blue-500 hover:text-blue-700">
                        &times;
                    </button>
                `;
                container.appendChild(chip);
            }

            container.style.display = container.children.length > 0 ? 'flex' : 'none';
        }

        // Event listeners
        document.getElementById('searchInput').addEventListener('input', () => {
            filterBooks();
            updateActiveFilters();
        });

        document.getElementById('kategoriSelect').addEventListener('change', () => {
            filterBooks();
            updateActiveFilters();
        });

        document.getElementById('sortSelect').addEventListener('change', filterBooks);

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            filterBooks();
            updateActiveFilters();
        });
    </script>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            gap: 4px;
        }

        .pagination li {
            margin: 0;
        }

        .pagination li a,
        .pagination li span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0 12px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            color: #374151;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .pagination li a:hover {
            background-color: #f3f4f6;
            border-color: #d1d5db;
            transform: translateY(-1px);
        }

        .pagination li.active span {
            background: linear-gradient(135deg, #059669, #10b981);
            color: white;
            border-color: #059669;
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.2);
        }

        .pagination li.disabled span {
            color: #9ca3af;
            cursor: not-allowed;
            opacity: 0.5;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
@endsection

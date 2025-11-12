    @extends('layouts.app')
    @section('content')
        <!-- Main Content -->
        <div class="lg:ml-64">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center space-x-4">
                        <button class="lg:hidden text-emerald-700" id="open-sidebar">
                            <i class='bx bx-menu text-2xl'></i>
                        </button>
                        <h1 class="text-2xl font-bold text-emerald-900">Manajemen Peminjaman</h1>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- New Loan Button -->
                        <button
                            class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium flex items-center"
                            id="new-loan-btn">
                            <i class='bx bx-plus mr-2'></i>Peminjaman Baru
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="p-6">
                <!-- Stats Overview -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Sedang Dipinjam</p>
                                <p class="text-3xl font-bold text-emerald-900">1,245</p>
                                <p class="text-sm text-emerald-600">Aktif sekarang</p>
                            </div>
                            <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                                <i class='bx bx-book-open text-2xl text-emerald-600'></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Hampir Jatuh Tempo</p>
                                <p class="text-3xl font-bold text-amber-900">45</p>
                                <p class="text-sm text-amber-600">Perlu peringatan</p>
                            </div>
                            <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                                <i class='bx bx-time text-2xl text-amber-600'></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Terlambat</p>
                                <p class="text-3xl font-bold text-red-900">28</p>
                                <p class="text-sm text-red-600">Perlu penagihan</p>
                            </div>
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class='bx bx-error text-2xl text-red-600'></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Bulan Ini</p>
                                <p class="text-3xl font-bold text-blue-900">324</p>
                                <p class="text-sm text-blue-600">Peminjaman baru</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class='bx bx-trending-up text-2xl text-blue-600'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Loans Table -->
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up">
                    <!-- Table Header -->
                    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-emerald-900">Daftar Peminjaman</h3>
                            <p class="text-sm text-gray-600 mt-1">Kelola data peminjaman buku perpustakaan</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 ">
                            <!-- Search -->
                            <div class="md:col-span-2">
                                <div class="relative group">
                                    <i
                                        class='bx bx-search absolute left-4 top-1/2 -translate-y-1/2 text-xl text-gray-400 group-focus-within:text-emerald-500 transition-colors'></i>
                                    <input type="text" placeholder="Cari anggota, judul buku, atau ID peminjaman..."
                                        class="w-full pl-12 pr-4 py-2.5 rounded-full border border-gray-200 focus:border-emerald-500 focus:ring-emerald-500 focus:ring-2 outline-none bg-gray-50 hover:bg-white transition-all duration-200 placeholder-gray-400 text-sm">
                                </div>
                            </div>

                            <!-- Status Filter -->
                            <div>
                                <select
                                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-gray-50 hover:bg-white transition-all duration-200 text-sm text-gray-700">
                                    <option selected>Semua Status</option>
                                    <option>Sedang Dipinjam</option>
                                    <option>Dikembalikan</option>
                                    <option>Terlambat</option>
                                    <option>Hampir Jatuh Tempo</option>
                                    <option>Perpanjangan</option>
                                </select>
                            </div>

                            <button data-modal-target="modalTambahPeminjaman" data-modal-toggle="modalTambahPeminjaman"
                                class="px-3 py-1 border border-emerald-500 text-emerald-600 rounded-full transition-all text-sm flex items-center hover:text-white hover:bg-gradient-to-r hover:from-emerald-500 hover:to-emerald-700">
                                <i class='bx bx-plus mr-1'></i> Tambah Peminjaman
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Anggota</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Buku</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal Pinjam</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Jatuh Tempo</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Denda</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tbody>
                                @foreach ($peminjaman as $p)
                                    @php

                                        $tglKembali = Carbon\Carbon::parse($p->tanggal_kembali)->startOfDay();
                                        $tglSekarang = Carbon\Carbon::now()->startOfDay();

                                        $hariTerlambat = 0;
                                        $hariSisa = 0;
                                        $denda = 0;
                                        $status = strtolower($p->status);

                                        if ($tglSekarang->gt($tglKembali)) {
                                            // Sudah lewat dari tanggal kembali
                                            $hariTerlambat = $tglKembali->diffInDays($tglSekarang); // urutan dibalik
                                            $denda = $hariTerlambat * 5000;
                                            $status = 'terlambat';
                                        } elseif ($tglSekarang->eq($tglKembali)) {
                                            // Hari ini jatuh tempo
                                            $status = 'jatuh tempo';
                                        } else {
                                            // Belum jatuh tempo
                                            $hariSisa = $tglSekarang->diffInDays($tglKembali);
                                            $status = 'meminjam';
                                        }

                                        // Warna badge
                                        $badgeColor = match ($status) {
                                            'meminjam' => 'bg-emerald-100 text-emerald-800',
                                            'terlambat' => 'bg-red-100 text-red-800',
                                            'jatuh tempo' => 'bg-amber-100 text-amber-800',
                                            default => 'bg-gray-100 text-gray-800',
                                        };
                                    @endphp


                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <!-- Anggota -->
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                                    <i class='bx bx-user text-emerald-600 text-sm'></i>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-emerald-900">
                                                        {{ $p->user->nama }}
                                                    </div>
                                                    <div class="text-xs text-gray-500">ID: {{ $p->user->id }}</div>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Buku -->
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $p->buku->judul }}</div>
                                            <div class="text-xs text-gray-500">{{ $p->buku->penulis ?? '-' }}</div>
                                        </td>

                                        <!-- Tanggal Pinjam -->
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{ $tglKembali->format('d M Y') }}
                                            </div>

                                            @if ($hariTerlambat > 0)
                                                <div class="text-xs text-red-600">
                                                    Terlambat {{ $hariTerlambat }} hari
                                                </div>
                                            @else
                                                <div class="text-xs text-emerald-600">
                                                    {{ $hariSisa }} hari lagi
                                                </div>
                                            @endif
                                        </td>

                                        <!-- Status -->
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 {{ $badgeColor }} text-xs rounded-full capitalize">
                                                {{ ucfirst($status) }}
                                            </span>
                                        </td>

                                        <!-- Denda -->
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Rp {{ number_format($denda, 0, ',', '.') }}
                                        </td>
                                        <!-- Aksi -->
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-2">
                                                <form action="{{ route('peminjaman.kembalikan', $p->id) }}" method="POST"
                                                    class="inline kembalikan-form">
                                                    @csrf
                                                    <button type="submit"
                                                        class="text-emerald-600 hover:text-emerald-900">
                                                        <i class='bx bx-check-circle text-lg'></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('peminjaman.show', $p->id) }}"
                                                    class="text-blue-600 hover:text-blue-800 transition" title="Lihat">
                                                    <i class='bx bx-show text-lg'></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            </tbody>
                        </table>
                    </div>

                    <!-- Table Footer -->
                    <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">4</span> dari
                            <span class="font-medium">1,245</span> hasil
                        </div>
                        <div class="flex items-center space-x-2">
                            <button
                                class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors">
                                Sebelumnya
                            </button>
                            <button
                                class="px-3 py-1 bg-emerald-600 text-white rounded-lg text-sm hover:bg-emerald-700 transition-colors">
                                1
                            </button>
                            <button
                                class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors">
                                2
                            </button>
                            <button
                                class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors">
                                3
                            </button>
                            <button
                                class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors">
                                Selanjutnya
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="modalTambahPeminjaman" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <!-- Close Button -->
                    <button type="button"
                        class="absolute top-5 right-5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-hide="modalTambahPeminjaman">
                        <i class='bx bx-x text-2xl'></i>
                    </button>

                    <!-- Header -->
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-emerald-100 rounded-lg">
                            <i class='bx bx-book text-2xl text-emerald-600'></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Tambah Peminjaman Baru</h3>
                            <p class="text-sm text-gray-600 mt-1">Lengkapi form berikut untuk pendataan peminjaman</p>
                        </div>
                    </div>
                    <form action="{{ route('peminjaman.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Cari User -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class='bx bx-user text-emerald-600'></i> Pilih / Cari Anggota
                            </label>
                            <select id="user_id" name="user_id" class="w-full border-gray-300 rounded-xl">
                                <option value="">Ketik nama atau email...</option>
                                @foreach ($anggota as $user)
                                    <option value="{{ $user->id }}">{{ $user->nama }} - {{ $user->email }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Cari Buku -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class='bx bx-book text-emerald-600'></i> Pilih / Cari Buku
                            </label>
                            <select id="buku_id" name="buku_id" class="w-full border-gray-300 rounded-xl">
                                <option value="">Ketik judul atau penulis...</option>
                                @foreach ($buku as $item)
                                    <option value="{{ $item->id }}">{{ $item->judul }} - {{ $item->penulis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tanggal Pinjam -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class='bx bx-calendar text-emerald-600'></i> Tanggal Pinjam
                            </label>
                            <input type="date" name="tanggal_pinjam" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200">
                        </div>

                        <!-- Tanggal Kembali -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class='bx bx-calendar-check text-emerald-600'></i> Tanggal Kembali
                            </label>
                            <input type="date" name="tanggal_kembali" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200">
                        </div>

                        <!-- Status Otomatis -->
                        <input type="hidden" name="status" value="meminjam">

                        <!-- kalau tetap mau ditampilkan (readonly) -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class='bx bx-list-check text-emerald-600'></i> Status
                            </label>
                            <input type="text" value="meminjam" readonly
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-gray-100 text-gray-600 cursor-not-allowed">
                        </div>


                        <!-- Tombol -->
                        <div class="pt-4 flex gap-3">
                            <button type="submit"
                                class="px-6 py-3 bg-emerald-600 text-white font-semibold rounded-xl hover:bg-emerald-700 transition-all duration-300 flex items-center gap-2">
                                <i class='bx bx-save'></i> Simpan
                            </button>
                            <a href="{{ route('peminjaman.index') }}"
                                class="px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-all duration-300 flex items-center gap-2">
                                <i class='bx bx-arrow-back'></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const options = {
                    create: false,
                    sortField: {
                        field: "text",
                        direction: "asc"
                    },
                    maxOptions: 10,
                    placeholder: "Ketik untuk mencari...",
                    render: {
                        option: function(data, escape) {
                            return `<div class="flex flex-col">
                    <span class="font-medium text-emerald-800">${escape(data.text)}</span>
                </div>`;
                        }
                    }
                };

                new TomSelect("#user_id", options);
                new TomSelect("#buku_id", options);
            });
        </script>
        <script>
            document.querySelectorAll('.kembalikan-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Kembalikan Buku?',
                        text: 'Apakah kamu yakin buku ini sudah dikembalikan?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#10B981',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, kembalikan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    @endsection

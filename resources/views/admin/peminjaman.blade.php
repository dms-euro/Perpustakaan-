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
                    <button class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium flex items-center" id="new-loan-btn">
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

            <!-- Filters and Search -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-6" data-aos="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Search -->
                    <div class="md:col-span-2">
                        <div class="relative">
                            <input type="text" placeholder="Cari anggota, judul buku, atau ID peminjaman..."
                                   class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <i class='bx bx-search absolute left-4 top-3 text-xl text-gray-400'></i>
                        </div>
                    </div>

                    <!-- Status Filter -->
                    <div>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <option>Semua Status</option>
                            <option>Sedang Dipinjam</option>
                            <option>Dikembalikan</option>
                            <option>Terlambat</option>
                            <option>Hampir Jatuh Tempo</option>
                            <option>Perpanjangan</option>
                        </select>
                    </div>

                    <!-- Date Filter -->
                    <div>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <option>Semua Waktu</option>
                            <option>Hari Ini</option>
                            <option>Minggu Ini</option>
                            <option>Bulan Ini</option>
                            <option>3 Bulan Terakhir</option>
                        </select>
                    </div>
                </div>

                <!-- Advanced Filters -->
                <div class="mt-4 flex flex-wrap gap-4">
                    <button class="px-4 py-2 border border-emerald-600 text-emerald-700 rounded-lg hover:bg-emerald-50 transition-colors text-sm">
                        <i class='bx bx-filter-alt mr-2'></i>Filter Lanjutan
                    </button>
                    <button class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm">
                        <i class='bx bx-export mr-2'></i>Export Laporan
                    </button>
                    <button class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm">
                        <i class='bx bx-envelope mr-2'></i>Kirim Pengingat
                    </button>
                </div>
            </div>

            <!-- Loans Table -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up">
                <!-- Table Header -->
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-emerald-900">Daftar Peminjaman</h3>
                        <p class="text-sm text-gray-600">Menampilkan 1-8 dari 1,245 peminjaman aktif</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500">
                            <option>10 per halaman</option>
                            <option>25 per halaman</option>
                            <option>50 per halaman</option>
                        </select>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Anggota</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Buku</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pinjam</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jatuh Tempo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Denda</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Loan 1 - Active -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-emerald-900">
                                    LOAN-2301
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                            <i class='bx bx-user text-emerald-600 text-sm'></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-emerald-900">Ahmad Rizki</div>
                                            <div class="text-xs text-gray-500">MEM-8542</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Sustainable Future</div>
                                    <div class="text-xs text-gray-500">Dr. Michael Green</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    15 Des 2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">29 Des 2023</div>
                                    <div class="text-xs text-emerald-600">4 hari lagi</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 bg-emerald-100 text-emerald-800 text-xs rounded-full">Aktif</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Rp 0
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-emerald-600 hover:text-emerald-900 process-return" data-id="1">
                                            <i class='bx bx-check-circle text-lg'></i>
                                        </button>
                                        <button class="text-amber-600 hover:text-amber-900 extend-loan" data-id="1">
                                            <i class='bx bx-time text-lg'></i>
                                        </button>
                                        <button class="text-blue-600 hover:text-blue-900 view-details" data-id="1">
                                            <i class='bx bx-show text-lg'></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Loan 2 - Almost Due -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-emerald-900">
                                    LOAN-2302
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                            <i class='bx bx-user text-emerald-600 text-sm'></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-emerald-900">Sari Dewi</div>
                                            <div class="text-xs text-gray-500">MEM-8541</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Digital Transformation</div>
                                    <div class="text-xs text-gray-500">Sarah Johnson</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    10 Des 2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">24 Des 2023</div>
                                    <div class="text-xs text-amber-600">Besok</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 bg-amber-100 text-amber-800 text-xs rounded-full">Hampir Jatuh Tempo</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Rp 0
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-emerald-600 hover:text-emerald-900 process-return" data-id="2">
                                            <i class='bx bx-check-circle text-lg'></i>
                                        </button>
                                        <button class="text-amber-600 hover:text-amber-900 extend-loan" data-id="2">
                                            <i class='bx bx-time text-lg'></i>
                                        </button>
                                        <button class="text-blue-600 hover:text-blue-900 view-details" data-id="2">
                                            <i class='bx bx-show text-lg'></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Loan 3 - Late -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-emerald-900">
                                    LOAN-2303
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                            <i class='bx bx-user text-emerald-600 text-sm'></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-emerald-900">Budi Santoso</div>
                                            <div class="text-xs text-gray-500">MEM-8540</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Mindful Living</div>
                                    <div class="text-xs text-gray-500">Emma Wilson</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    01 Des 2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">15 Des 2023</div>
                                    <div class="text-xs text-red-600">8 hari terlambat</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Terlambat</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 font-medium">
                                    Rp 16,000
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-emerald-600 hover:text-emerald-900 process-return" data-id="3">
                                            <i class='bx bx-check-circle text-lg'></i>
                                        </button>
                                        <button class="text-amber-600 hover:text-amber-900 extend-loan" data-id="3">
                                            <i class='bx bx-time text-lg'></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 manage-fine" data-id="3">
                                            <i class='bx bx-dollar-circle text-lg'></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Loan 4 - Extended -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-emerald-900">
                                    LOAN-2304
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                            <i class='bx bx-user text-emerald-600 text-sm'></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-emerald-900">Citra Lestari</div>
                                            <div class="text-xs text-gray-500">MEM-8539</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">The Art of Programming</div>
                                    <div class="text-xs text-gray-500">Robert Martin</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    05 Des 2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">02 Jan 2024</div>
                                    <div class="text-xs text-blue-600">Diperpanjang</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Diperpanjang</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Rp 0
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-emerald-600 hover:text-emerald-900 process-return" data-id="4">
                                            <i class='bx bx-check-circle text-lg'></i>
                                        </button>
                                        <button class="text-blue-600 hover:text-blue-900 view-details" data-id="4">
                                            <i class='bx bx-show text-lg'></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer -->
                <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">4</span> dari <span class="font-medium">1,245</span> hasil
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors">
                            Sebelumnya
                        </button>
                        <button class="px-3 py-1 bg-emerald-600 text-white rounded-lg text-sm hover:bg-emerald-700 transition-colors">
                            1
                        </button>
                        <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors">
                            2
                        </button>
                        <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors">
                            3
                        </button>
                        <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors">
                            Selanjutnya
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

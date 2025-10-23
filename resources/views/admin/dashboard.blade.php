@extends('layouts.app')
@section('content')
    <div class="lg:ml-64">
        <!-- Top Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between p-4">
                <div class="flex items-center space-x-4">
                    <button class="lg:hidden text-emerald-700" id="open-sidebar">
                        <i class='bx bx-menu text-2xl'></i>
                    </button>
                    <h1 class="text-2xl font-bold text-emerald-900">Dashboard Overview</h1>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button class="relative p-2 text-emerald-700 hover:bg-emerald-50 rounded-lg transition-colors"
                        id="notifications-btn">
                        <i class='bx bx-bell text-xl'></i>
                        <span
                            class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                    </button>

                    <!-- Quick Actions -->
                    <div class="hidden md:flex items-center space-x-2">
                        <button
                            class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                            <i class='bx bx-plus mr-2'></i>Tambah Buku
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="p-6">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Books -->
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Total Buku</p>
                            <p class="text-3xl font-bold text-emerald-900">15,248</p>
                            <p class="text-sm text-emerald-600 flex items-center">
                                <i class='bx bx-up-arrow-alt mr-1'></i>+245 bulan ini
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <i class='bx bx-book text-2xl text-emerald-600'></i>
                        </div>
                    </div>
                </div>

                <!-- Active Members -->
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Anggota Aktif</p>
                            <p class="text-3xl font-bold text-emerald-900">8,542</p>
                            <p class="text-sm text-emerald-600 flex items-center">
                                <i class='bx bx-up-arrow-alt mr-1'></i>+128 bulan ini
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <i class='bx bx-group text-2xl text-emerald-600'></i>
                        </div>
                    </div>
                </div>

                <!-- Active Loans -->
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Sedang Dipinjam</p>
                            <p class="text-3xl font-bold text-emerald-900">1,245</p>
                            <p class="text-sm text-amber-600 flex items-center">
                                <i class='bx bx-time mr-1'></i>45 hampir jatuh tempo
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                            <i class='bx bx-transfer text-2xl text-amber-600'></i>
                        </div>
                    </div>
                </div>

                <!-- Revenue -->
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Pendapatan Bulan Ini</p>
                            <p class="text-3xl font-bold text-emerald-900">Rp 12.5Jt</p>
                            <p class="text-sm text-emerald-600 flex items-center">
                                <i class='bx bx-up-arrow-alt mr-1'></i>+18% dari bulan lalu
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <i class='bx bx-dollar text-2xl text-emerald-600'></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Loans Chart -->
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-emerald-900">Statistik Peminjaman</h3>
                        <select
                            class="px-3 py-1 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500">
                            <option>Bulan Ini</option>
                            <option>3 Bulan Terakhir</option>
                            <option>Tahun Ini</option>
                        </select>
                    </div>
                    <div class="h-80">
                        <canvas id="loansChart"></canvas>
                    </div>
                </div>

                <!-- Categories Chart -->
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-emerald-900">Distribusi Kategori</h3>
                        <select
                            class="px-3 py-1 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500">
                            <option>Semua Kategori</option>
                            <option>Populer</option>
                        </select>
                    </div>
                    <div class="h-80">
                        <canvas id="categoriesChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Quick Stats -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Activity -->
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-emerald-900">Aktivitas Terbaru</h3>
                        <button class="text-sm text-emerald-600 hover:text-emerald-500 font-medium">
                            Lihat Semua
                        </button>
                    </div>

                    <div class="space-y-4">
                        <!-- Activity 1 -->
                        <div class="flex items-center space-x-4 p-4 bg-emerald-50 rounded-lg">
                            <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center">
                                <i class='bx bx-book text-emerald-600'></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-emerald-900">Buku baru ditambahkan</p>
                                <p class="text-sm text-gray-600">"Digital Transformation" oleh Sarah Johnson</p>
                            </div>
                            <span class="text-sm text-gray-500">2 jam lalu</span>
                        </div>

                        <!-- Activity 2 -->
                        <div class="flex items-center space-x-4 p-4 bg-amber-50 rounded-lg">
                            <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                                <i class='bx bx-time text-amber-600'></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-amber-900">Peminjaman hampir jatuh tempo</p>
                                <p class="text-sm text-gray-600">5 buku akan jatuh tempo besok</p>
                            </div>
                            <span class="text-sm text-gray-500">4 jam lalu</span>
                        </div>

                        <!-- Activity 3 -->
                        <div class="flex items-center space-x-4 p-4 bg-emerald-50 rounded-lg">
                            <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center">
                                <i class='bx bx-user-plus text-emerald-600'></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-emerald-900">Anggota baru bergabung</p>
                                <p class="text-sm text-gray-600">Ahmad Rizki - Member #8,543</p>
                            </div>
                            <span class="text-sm text-gray-500">6 jam lalu</span>
                        </div>

                        <!-- Activity 4 -->
                        <div class="flex items-center space-x-4 p-4 bg-red-50 rounded-lg">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                <i class='bx bx-error text-red-600'></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-red-900">Buku hilang dilaporkan</p>
                                <p class="text-sm text-gray-600">"Mindful Living" - perlu tindakan</p>
                            </div>
                            <span class="text-sm text-gray-500">1 hari lalu</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="space-y-6" data-aos="fade-up" data-aos-delay="100">
                    <!-- System Status -->
                    <div class="bg-white rounded-2xl shadow-sm p-6">
                        <h3 class="text-lg font-bold text-emerald-900 mb-4">Status Sistem</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Server</span>
                                <span class="px-2 py-1 bg-emerald-100 text-emerald-800 text-xs rounded-full">Online</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Database</span>
                                <span class="px-2 py-1 bg-emerald-100 text-emerald-800 text-xs rounded-full">Stable</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Backup</span>
                                <span class="px-2 py-1 bg-amber-100 text-amber-800 text-xs rounded-full">Pending</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">SSL Certificate</span>
                                <span class="px-2 py-1 bg-emerald-100 text-emerald-800 text-xs rounded-full">Valid</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white rounded-2xl shadow-sm p-6">
                        <h3 class="text-lg font-bold text-emerald-900 mb-4">Aksi Cepat</h3>
                        <div class="space-y-3">
                            <button
                                class="w-full flex items-center space-x-3 p-3 text-left bg-emerald-50 hover:bg-emerald-100 rounded-lg transition-colors">
                                <i class='bx bx-book-add text-emerald-600 text-xl'></i>
                                <span class="font-medium text-emerald-900">Tambah Buku Baru</span>
                            </button>
                            <button
                                class="w-full flex items-center space-x-3 p-3 text-left bg-emerald-50 hover:bg-emerald-100 rounded-lg transition-colors">
                                <i class='bx bx-user-plus text-emerald-600 text-xl'></i>
                                <span class="font-medium text-emerald-900">Daftarkan Anggota</span>
                            </button>
                            <button
                                class="w-full flex items-center space-x-3 p-3 text-left bg-emerald-50 hover:bg-emerald-100 rounded-lg transition-colors">
                                <i class='bx bx-report text-emerald-600 text-xl'></i>
                                <span class="font-medium text-emerald-900">Generate Laporan</span>
                            </button>
                            <button
                                class="w-full flex items-center space-x-3 p-3 text-left bg-emerald-50 hover:bg-emerald-100 rounded-lg transition-colors">
                                <i class='bx bx-backup text-emerald-600 text-xl'></i>
                                <span class="font-medium text-emerald-900">Backup Data</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

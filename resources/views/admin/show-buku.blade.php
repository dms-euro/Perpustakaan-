@extends('layouts.app')

@section('content')
    <div class="lg:ml-64">
        <main class="p-6">
            <!-- Book Information -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column - Book Cover & Basic Info -->
                <div class="lg:col-span-1">

                    <!-- Quick Stats -->
                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-right" data-aos-delay="100">
                        <h3 class="text-lg font-bold text-emerald-900 mb-4">Statistik</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Total Peminjaman</span>
                                <span class="font-bold text-emerald-900">24 kali</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Rating</span>
                                <div class="flex items-center">
                                    <i class='bx bxs-star text-amber-400 mr-1'></i>
                                    <span class="font-bold text-emerald-900">4.8/5</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Ditambahkan</span>
                                <span class="font-bold text-emerald-900">15 Jan 2023</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Terakhir Diupdate</span>
                                <span class="font-bold text-emerald-900">20 Des 2023</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Detailed Information -->
                <div class="lg:col-span-2">
                    <!-- Basic Information -->
                    <div class="bg-white rounded-2xl shadow-sm p-6 mb-6" data-aos="fade-left">
                        <h3 class="text-lg font-bold text-emerald-900 mb-4 flex items-center">
                            <i class='bx bx-info-circle mr-2'></i>Informasi Dasar
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Buku</label>
                                    <div class="text-lg font-bold text-emerald-900" id="book-title">Sustainable Future</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Penulis</label>
                                    <div class="text-lg text-gray-900" id="book-author">Dr. Michael Green</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">ISBN</label>
                                    <div class="text-lg text-gray-900" id="book-isbn">978-1234567890</div>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                                    <div class="flex items-center">
                                        <span
                                            class="px-3 py-1 bg-emerald-100 text-emerald-800 rounded-full text-sm font-medium"
                                            id="book-category">Sains & Teknologi</span>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">ID Kategori</label>
                                    <div class="text-lg text-gray-900" id="book-category-id">CAT-001</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium"
                                        id="book-status">Tersedia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Loan History -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mt-6" data-aos="fade-up">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-emerald-900">Riwayat Peminjaman Terbaru</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Peminjam</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal Pinjam</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jatuh Tempo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal Kembali</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                            <i class='bx bx-user text-emerald-600 text-sm'></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-emerald-900">Ahmad Rizki</div>
                                            <div class="text-xs text-gray-500">MEM-8542</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">15 Des 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">29 Des 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">28 Des 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Dikembalikan</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                            <i class='bx bx-user text-emerald-600 text-sm'></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-emerald-900">Sari Dewi</div>
                                            <div class="text-xs text-gray-500">MEM-8541</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">10 Des 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">24 Des 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">-</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 bg-amber-100 text-amber-800 text-xs rounded-full">Dipinjam</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex justify-end space-x-4">
                <a href="books.html"
                    class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium">
                    Kembali ke Daftar
                </a>
                <a href="edit-book.html"
                    class="px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium flex items-center">
                    <i class='bx bx-edit mr-2'></i>Edit Buku
                </a>
            </div>
        </main>
    </div>
@endsection

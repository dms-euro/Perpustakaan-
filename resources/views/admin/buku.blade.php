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
                    <h1 class="text-2xl font-bold text-emerald-900">Manajemen Buku</h1>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="p-6">

            <!-- ➕ Action Buttons Card -->
            <div class="bg-white rounded-2xl shadow-md p-6 mb-6 border border-gray-100 transition-all hover:shadow-lg"
                data-aos="fade-up">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                    <!-- 🎚️ Kiri: Filter -->
                    <div class="flex flex-col md:flex-row gap-3">
                        <!-- Kategori Filter -->
                        <select
                            class="flex-1 px-4 py-2.5 text-sm border border-gray-200 rounded-lg bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                            <option>Semua Kategori</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                            @endforeach
                        </select>

                        <!-- Status Filter -->
                        <select
                            class="flex-1 px-4 py-2.5 text-sm border border-gray-200 rounded-lg bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                            <option>Semua Status</option>
                            <option>Tersedia</option>
                            <option>Dipinjam</option>
                            <option>Dalam Perbaikan</option>
                            <option>Hilang</option>
                        </select>
                    </div>

                    <!-- ➕ Kanan: Tombol Aksi -->
                    <div class="flex flex-wrap gap-2 justify-start md:justify-end">
                        <button data-modal-target="modalTambahBuku" data-modal-toggle="modalTambahBuku"
                            class="px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 active:scale-[.97] transition-all text-sm flex items-center shadow-sm">
                            <i class='bx bx-plus mr-2 text-base'></i>Tambah Buku
                        </button>

                        <button data-modal-target="modalTambahKategori" data-modal-toggle="modalTambahKategori"
                            class="px-4 py-2 border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-100 active:scale-[.97] transition-all text-sm flex items-center shadow-sm">
                            <i class='bx bx-category mr-2 text-base'></i>Kategori
                        </button>
                    </div>
                </div>
            </div>

            <!-- Books Table -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up">
                <!-- Table Header -->
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <div>
                        <div class="relative">
                            <i class='bx bx-search absolute left-3 top-1/2 -translate-y-1/2 text-lg text-gray-400'></i>
                            <input type="text" placeholder="Cari buku, penulis, atau ISBN..."
                                class="pl-10 pr-4 py-2.5 w-56 md:w-64 text-sm border border-gray-200 rounded-full bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 placeholder-gray-400 transition-all">
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="flex gap-2">
                            <button
                                class="px-4 py-2 border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-100 active:scale-[.97] transition-all text-sm flex items-center shadow-sm">
                                <i class='bx bx-export mr-2 text-base'></i>Export
                            </button>
                            <button
                                class="px-4 py-2 border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-100 active:scale-[.97] transition-all text-sm flex items-center shadow-sm">
                                <i class='bx bx-import mr-2 text-base'></i>Import
                            </button>
                        </div>
                        <select
                            class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500">
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

                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Buku</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Penulis</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ISBN</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Lokasi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Book 1 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-12 bg-emerald-100 rounded flex items-center justify-center mr-3">
                                            <i class='bx bx-book text-emerald-600'></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-emerald-900">Sustainable Future</div>
                                            <div class="text-sm text-gray-500">Edisi 2023</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Dr. Michael Green</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 bg-emerald-100 text-emerald-800 text-xs rounded-full">Sains &
                                        Teknologi</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">978-1234567890</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Tersedia</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rak A-12</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-emerald-600 hover:text-emerald-900 edit-book" data-id="1">
                                            <i class='bx bx-edit text-lg'></i>
                                        </button>
                                        <button class="text-amber-600 hover:text-amber-900">
                                            <i class='bx bx-show text-lg'></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 delete-book" data-id="1">
                                            <i class='bx bx-trash text-lg'></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Book 2 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-12 bg-emerald-100 rounded flex items-center justify-center mr-3">
                                            <i class='bx bx-book text-emerald-600'></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-emerald-900">Digital Transformation
                                            </div>
                                            <div class="text-sm text-gray-500">Edisi 2022</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Sarah Johnson</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Bisnis &
                                        Ekonomi</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">978-1234567891</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 bg-amber-100 text-amber-800 text-xs rounded-full">Dipinjam</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rak B-05</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-emerald-600 hover:text-emerald-900 edit-book" data-id="2">
                                            <i class='bx bx-edit text-lg'></i>
                                        </button>
                                        <button class="text-amber-600 hover:text-amber-900">
                                            <i class='bx bx-show text-lg'></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 delete-book" data-id="2">
                                            <i class='bx bx-trash text-lg'></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Book 3 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-12 bg-emerald-100 rounded flex items-center justify-center mr-3">
                                            <i class='bx bx-book text-emerald-600'></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-emerald-900">Mindful Living</div>
                                            <div class="text-sm text-gray-500">Edisi 2023</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Emma Wilson</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">Kesehatan</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">978-1234567892</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Dalam
                                        Perbaikan</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Gudang</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-emerald-600 hover:text-emerald-900 edit-book" data-id="3">
                                            <i class='bx bx-edit text-lg'></i>
                                        </button>
                                        <button class="text-amber-600 hover:text-amber-900">
                                            <i class='bx bx-show text-lg'></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 delete-book" data-id="3">
                                            <i class='bx bx-trash text-lg'></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Add more books as needed -->
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer -->
                <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">10</span> dari
                        <span class="font-medium">1,248</span> hasil
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
    <div id="modalTambahBuku" tabindex="-1" aria-hidden="true"
        class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%)] max-h-full flex justify-center items-center bg-black/40">

        <div class="relative bg-white rounded-2xl shadow-lg w-full max-w-md p-6">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Buku</h3>
                <button type="button" data-modal-hide="modalTambahBuku"
                    class="text-gray-400 hover:text-gray-600 text-xl">
                    &times;
                </button>
            </div>

            <!-- Form -->
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                    <input type="text" id="kategori" name="kategori" required
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" data-modal-hide="modalTambahBuku"
                        class="px-4 py-2 text-sm border border-gray-200 rounded-lg hover:bg-gray-100 transition-all">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 text-sm bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-all">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div id="modalTambahKategori" tabindex="-1" aria-hidden="true"
        class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%)] max-h-full flex justify-center items-center bg-black/40">

        <div class="relative bg-white rounded-2xl shadow-lg w-full max-w-md p-6">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Kategori</h3>
                <button type="button" data-modal-hide="modalTambahKategori"
                    class="text-gray-400 hover:text-gray-600 text-xl">
                    &times;
                </button>
            </div>

            <!-- Form -->
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                    <input type="text" id="kategori" name="kategori" required
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" data-modal-hide="modalTambahKategori"
                        class="px-4 py-2 text-sm border border-gray-200 rounded-lg hover:bg-gray-100 transition-all">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 text-sm bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-all">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

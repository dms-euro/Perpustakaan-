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
                    <h1 class="text-2xl font-bold text-emerald-900">Manajemen Anggota</h1>
                </div>

                <div class="flex items-center space-x-4">
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
                            <p class="text-sm text-gray-600">Total Anggota</p>
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

                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Aktif</p>
                            <p class="text-3xl font-bold text-emerald-900">7,215</p>
                            <p class="text-sm text-emerald-600">84.5% dari total</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class='bx bx-check-circle text-2xl text-green-600'></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Tidak Aktif</p>
                            <p class="text-3xl font-bold text-amber-900">1,327</p>
                            <p class="text-sm text-amber-600">Perlu verifikasi</p>
                        </div>
                        <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                            <i class='bx bx-time text-2xl text-amber-600'></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Diblokir</p>
                            <p class="text-3xl font-bold text-red-900">84</p>
                            <p class="text-sm text-red-600">Pelanggaran aturan</p>
                        </div>
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                            <i class='bx bx-block text-2xl text-red-600'></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-3" data-aos="fade-up">
                <h3 class=" text-lg font-bold text-emerald-900 mb-4">Tambah Anggota</h3>
                <form action="{{ route('anggota.store') }}" method="POST" id="add-book-form"
                    class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                            <input type="text" name="nama" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                placeholder="Masukkan Nama Anggota">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Telephone</label>
                            <input type="text" name="telepon" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                placeholder="Contoh: 0882 0000 0000">
                        </div>

                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                            <textarea name="alamat" rows="4" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-300"
                                placeholder="Masukkan alamat lengkap"></textarea>
                        </div>
                    </div>
                    <div class="md:col-span-2 flex items-center space-x-4 mt-4">
                        <button type="button" onclick="history.back()"
                            class="w-full px-6 py-3 bg-gray-800 text-white rounded-xl hover:bg-gray-900 transition-all duration-300 font-medium shadow-lg hover:shadow-xl flex items-center justify-center group">
                            <i
                                class='bx bx-x-circle text-xl mr-2 group-hover:rotate-90 transition-transform duration-300'></i>Batalkan
                        </button>
                        <button type="submit"
                            class="w-full px-6 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all duration-300 font-medium shadow-lg hover:shadow-emerald-200 hover:shadow-2xl flex items-center justify-center group">
                            <i class='bx bx-save mr-2'></i>Simpan Anggota
                        </button>
                    </div>
                </form>
            </div>

            <!-- Members Table -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up">
                <!-- Table Header with Search -->
                <div
                    class="px-6 py-4 border-b border-gray-200 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-bold text-emerald-900">Daftar Anggota</h3>
                        <p class="text-sm text-gray-600">Menampilkan 1-10 dari 8,542 anggota</p>
                    </div>

                    <div class="flex flex-col md:flex-row items-start md:items-center gap-4 w-full md:w-auto">
                        <!-- Search Bar -->
                        <div class="relative w-full md:w-64">
                            <input type="text" placeholder="Cari nama, email, atau ID..."
                                class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                            <i class='bx bx-search absolute left-3 top-2.5 text-lg text-gray-400'></i>
                        </div>

                        <div class="flex items-center space-x-2">
                            <select
                                class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500">
                                <option>10 per halaman</option>
                                <option>25 per halaman</option>
                                <option>50 per halaman</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Anggota</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kontak</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Bergabung</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tipe</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Buku Dipinjam</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($anggota as $a)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox"
                                            class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                                <i class='bx bx-user text-emerald-600'></i>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-emerald-900">{{ $a->nama }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $a->telepone }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        15 Jan 2023
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Aktif</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Premium</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">3 buku</div>
                                        <div class="text-xs text-amber-600">1 hampir jatuh tempo</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <button class="text-emerald-600 hover:text-emerald-900 edit-member"
                                                data-id="1">
                                                <i class='bx bx-edit text-lg'></i>
                                            </button>
                                            <button class="text-amber-600 hover:text-amber-900 view-member"
                                                data-id="1">
                                                <i class='bx bx-show text-lg'></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 delete-member" data-id="1">
                                                <i class='bx bx-trash text-lg'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer -->
                <div
                    class="px-6 py-4 border-t border-gray-200 flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-gray-700">
                        Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">2</span> dari
                        <span class="font-medium">8,542</span> hasil
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
@endsection

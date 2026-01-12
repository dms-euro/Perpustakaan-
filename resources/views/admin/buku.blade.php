@php
    $role = Auth::user()->role ?? null;
@endphp
@extends('layouts.app')
@section('page-title', 'Manajemen Buku & Kategori')
@section('content')
    <div class="lg:ml-64 pt-24">
        <main class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Total Kategori</p>
                            <p class="text-3xl font-bold text-emerald-900" id="total-categories">{{ $kategori->count() }}
                            </p>
                            <p class="text-sm text-emerald-600 flex items-center">
                                <i class='bx bx-category mr-1'></i>Kategori aktif
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <i class='bx bx-bookmark text-2xl text-emerald-600'></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Total Buku</p>
                            <p class="text-3xl font-bold text-emerald-900" id="total-books">{{ $buku->count() }}</p>
                            <p class="text-sm text-emerald-600 flex items-center">
                                <i class='bx bx-book mr-1'></i>Dalam koleksi
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <i class='bx bx-library text-2xl text-emerald-600'></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-right">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-emerald-900"><i class="bx bx-category"></i> Daftar Kategori
                            </h3>
                            <button data-modal-target="modalTambahKategori" data-modal-toggle="modalTambahKategori"
                                class="px-3 py-1 border border-emerald-500 text-emerald-600 rounded-full transition-all text-sm flex items-center hover:text-white hover:bg-gradient-to-r hover:from-emerald-500 hover:to-emerald-700">
                                <i class='bx bx-plus mr-1'></i> Tambah
                            </button>
                        </div>
                        <div class="rounded-2xl shadow-sm border border-gray-100 bg-white overflow-hidden">
                            <div
                                class="max-h-[420px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 hover:scrollbar-thumb-emerald-400 transition-all">
                                <table class="w-full text-sm text-gray-700">
                                    <thead
                                        class="bg-gradient-to-r from-emerald-50 to-green-50 text-xs uppercase text-emerald-700 sticky top-0 z-10">
                                        <tr>
                                            <th class="px-6 py-3 text-left font-bold tracking-wide">Kategori</th>
                                            <th class="px-6 py-3 text-center font-bold tracking-wide w-28">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @forelse ($kategori as $k)
                                            <tr
                                                class="hover:bg-gradient-to-r hover:from-emerald-50/50 hover:to-green-50/50 transition-all duration-200 group">
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center gap-3">
                                                        <div
                                                            class="flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-emerald-100 to-green-100 text-emerald-600 group-hover:from-emerald-200 group-hover:to-green-200 transition-colors">
                                                            <i class='bx bx-collection text-base'></i>
                                                        </div>
                                                        <span
                                                            class="font-medium text-emerald-900">{{ $k->kategori }}</span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex justify-center">
                                                        @if ($role === 'admin')
                                                            <form id="form-delete-{{ $k->id }}"
                                                                action="{{ route('kategori.destroy', $k->id) }}"
                                                                method="POST" class="inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" onclick="hapus({{ $k->id }})"
                                                                    class="inline-flex items-center justify-center w-8 h-8 text-red-500 rounded-full transition-all hover:bg-red-50 hover:scale-105 active:scale-95">
                                                                    <i class='bx bx-trash text-base'></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-center py-8 text-gray-400">
                                                    <div class="flex flex-col items-center justify-center">
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center mb-2">
                                                            <i class='bx bx-folder-open text-xl'></i>
                                                        </div>
                                                        <span class="text-sm">Belum ada kategori</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm p-6 space-y-4" data-aos="fade-left">
                        <h3 class="text-lg font-bold text-emerald-900">Tambah Buku Baru</h3>
                        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data"
                            class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
                            @csrf
                            <div class="space-y-5">
                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-1">
                                        <i class='bx bx-book text-emerald-600'></i>
                                        Judul Buku
                                    </label>
                                    <div class="relative">
                                        <input type="text" name="judul" required
                                            class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition duration-300 bg-white hover:border-emerald-300 group-hover:shadow-sm"
                                            placeholder="Masukkan judul buku">
                                        <i
                                            class='bx bx-edit absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-emerald-500 transition-colors'></i>
                                    </div>
                                </div>
                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-1">
                                        <i class='bx bx-user text-emerald-600'></i>
                                        Penulis
                                    </label>
                                    <div class="relative">
                                        <input type="text" name="penulis" required
                                            class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition duration-300 bg-white hover:border-emerald-300 group-hover:shadow-sm"
                                            placeholder="Nama penulis buku">
                                        <i
                                            class='bx bx-pencil absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-emerald-500 transition-colors'></i>
                                    </div>
                                </div>
                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-1">
                                        <i class='bx bx-list-ol text-emerald-600'></i>
                                        Stock
                                    </label>
                                    <div class="relative">
                                        <input type="number" name="stock" required
                                            class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition duration-300 bg-white hover:border-emerald-300 group-hover:shadow-sm"
                                            placeholder="Jumlah stock buku">
                                        <i
                                            class='bx bx-pencil absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-emerald-500 transition-colors'></i>
                                    </div>
                                </div>
                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-1">
                                        <i class='bx bx-category text-emerald-600'></i>
                                        Kategori
                                    </label>
                                    <div class="relative">
                                        <select name="kategori_id" id="category-select" required
                                            class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-xl bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition duration-300 hover:border-emerald-300 group-hover:shadow-sm appearance-none">
                                            <option value="" disabled selected>Pilih kategori</option>
                                            @foreach ($kategori as $k)
                                                <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                                            @endforeach
                                        </select>
                                        <i
                                            class='bx bx-category absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-emerald-500 transition-colors'></i>
                                        <i
                                            class='bx bx-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none'></i>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-5">
                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-1">
                                        <i class='bx bx-barcode text-emerald-600'></i>
                                        ISBN
                                    </label>
                                    <div class="relative">
                                        <input type="text" name="isbn"
                                            class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition duration-300 bg-white hover:border-emerald-300 group-hover:shadow-sm"
                                            placeholder="Nomor ISBN (opsional)">
                                        <i
                                            class='bx bx-barcode absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-emerald-500 transition-colors'></i>
                                    </div>
                                </div>
                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-1">
                                        <i class='bx bx-building text-emerald-600'></i>
                                        Penerbit
                                    </label>
                                    <div class="relative">
                                        <input type="text" name="penerbit" required
                                            class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition duration-300 bg-white hover:border-emerald-300 group-hover:shadow-sm"
                                            placeholder="Nama penerbit">
                                        <i
                                            class='bx bx-building-house absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-emerald-500 transition-colors'></i>
                                    </div>
                                </div>
                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                        <i class='bx bx-image-add text-emerald-600 text-lg'></i>
                                        Cover Buku
                                    </label>
                                    <input type="file" name="cover" id="coverInput"
                                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-colors duration-200"
                                        accept="image/*">
                                </div>
                            </div>

                            <div class="lg:col-span-2 pt-4 border-t border-gray-100">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <button type="submit"
                                        class="w-full py-3.5 bg-gradient-to-r from-emerald-500 to-green-500 text-white rounded-xl font-semibold shadow-md hover:from-emerald-600 hover:to-green-600 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center space-x-2 group">
                                        <i class='bx bx-save text-xl group-hover:scale-110 transition-transform'></i>
                                        <span>Simpan Buku</span>
                                    </button>
                                    <button type="button" onclick="clearInputs()"
                                        class="w-full py-3.5 bg-gradient-to-r from-gray-600 to-gray-700 text-white rounded-xl font-semibold shadow-md hover:from-gray-700 hover:to-gray-800 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center space-x-2 group">
                                        <i
                                            class='bx bx-refresh text-xl group-hover:rotate-180 transition-transform duration-500'></i>
                                        <span>Reset Form</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100" data-aos="fade-up">
                    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                        <div>
                            <div class="relative">
                                <i class='bx bx-search absolute left-3 top-1/2 -translate-y-1/2 text-lg text-gray-400'></i>
                                <input type="text" id="search-books" placeholder="Cari buku, penulis, atau ISBN..."
                                    class="pl-10 pr-4 py-2.5 w-56 md:w-64 text-sm border border-gray-200 rounded-full bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 placeholder-gray-400 transition-all">
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="flex gap-2">
                                <a href="{{ route('buku.export') }}"
                                    class="px-4 py-2 border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-100 flex items-center shadow-sm">
                                    <i class='bx bx-export mr-2'></i>Export
                                </a>
                                <form action="{{ route('buku.import') }}" method="POST" enctype="multipart/form-data"
                                    class="inline">
                                    @csrf
                                    <input type="file" name="file" accept=".xlsx,.csv" class="hidden"
                                        id="file-upload">
                                    <label for="file-upload"
                                        class="px-4 py-2 border border-gray-200 text-gray-700 rounded-lg cursor-pointer flex items-center gap-2">
                                        <i class='bx bx-import text-base'></i> Import
                                    </label>
                                    <button type="submit" class="hidden" id="submit-upload"></button>
                                </form>
                            </div>
                            <select id="category-filter"
                                class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500">
                                <option value="">Semua Kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->kategori }}">{{ $k->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table id="table-buku" class="w-full text-sm text-gray-700">
                            <thead class="bg-gradient-to-r from-emerald-600 to-emerald-700 text-white uppercase text-xs">
                                <tr>
                                    <th class="px-5 py-3 text-left font-medium">Cover</th>
                                    <th class="px-5 py-3 text-left font-medium">Judul</th>
                                    <th class="px-5 py-3 text-left font-medium">Penulis</th>
                                    <th class="px-5 py-3 text-left font-medium">Penerbit</th>
                                    <th class="px-5 py-3 text-left font-medium">Kategori</th>
                                    <th class="px-5 py-3 text-left font-medium">Stock</th>
                                    <th class="px-5 py-3 text-left font-medium">ISBN</th>
                                    <th class="px-5 py-3 text-center font-medium w-28">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="books-table" class="divide-y divide-gray-100">
                                @foreach ($buku as $b)
                                    <tr class="hover:bg-emerald-50 transition-colors duration-200 group">
                                        <td class="px-5 py-3">
                                            @if ($b->cover)
                                                <img src="{{ asset('storage/' . $b->cover) }}" width="80">
                                            @else
                                                <div
                                                    class="w-12 h-16 bg-gray-200 border-2 border-dashed rounded-lg flex items-center justify-center">
                                                    <i class='bx bx-image text-gray-400 text-xl'></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-5 py-3 font-medium text-gray-900">{{ Str::limit($b->judul, 30) }}
                                        </td>
                                        <td class="px-5 py-3 text-gray-700">{{ $b->penulis }}</td>
                                        <td class="px-5 py-3 text-gray-700">{{ $b->penerbit }}</td>
                                        <td class="px-5 py-3">
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                                {{ $b->kategori->kategori }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-3 text-gray-700">{{ $b->stock }}</td>
                                        <td class="px-5 py-3 font-mono text-xs text-gray-600">{{ $b->isbn ?? '-' }}</td>
                                        <td class="px-5 py-3 text-center">
                                            <div class="flex items-center justify-center gap-1.5">
                                                <a href="{{ route('buku.show', $b->id) }}"
                                                    class="text-blue-600 hover:text-blue-800 transition" title="Lihat">
                                                    <i class='bx bx-show text-lg'></i>
                                                </a>
                                                @if ($role === 'admin')
                                                    <a href="{{ route('buku.edit', $b->id) }}"
                                                        class="text-emerald-600 hover:text-emerald-800 transition"
                                                        title="Edit">
                                                        <i class='bx bx-edit text-lg'></i>
                                                    </a>
                                                    <form id="form-delete-{{ $b->id }}"
                                                        action="{{ route('buku.destroy', $b->id) }}" method="POST"
                                                        class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="hapus({{ $b->id }})"
                                                            class="text-red-600 hover:text-red-800 transition">
                                                            <i class='bx bx-trash text-lg'></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="custom-pagination"
                            class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                            <div class="text-sm text-gray-700" id="custom-info"></div>
                            <div class="flex items-center space-x-2" id="custom-buttons"></div>
                        </div>

                        @if ($buku->isEmpty())
                            <div class="text-center py-10 text-gray-500">
                                <i class='bx bx-book-open text-4xl mb-2 block'></i>
                                <p class="font-medium">Belum ada buku</p>
                                <p class="text-sm">Tambahkan buku pertama Anda!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="modalTambahKategori" tabindex="-1" aria-hidden="true"
        class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%)] max-h-full flex justify-center items-center bg-black/40">
        <div class="relative bg-white rounded-2xl shadow-lg w-full max-w-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Kategori</h3>
                <button type="button" data-modal-hide="modalTambahKategori"
                    class="text-gray-400 hover:text-gray-600 text-xl">
                    &times;
                </button>
            </div>
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                    <input type="text" id="kategori" name="kategori" required
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="submit"
                        class="w-full py-3.5 bg-gradient-to-r from-emerald-500 to-green-500 text-white rounded-xl font-semibold shadow-md hover:from-emerald-600 hover:to-green-600 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center space-x-2 group">
                        <i class='bx bx-save text-xl group-hover:scale-110 transition-transform'></i>
                        <span>Simpan Buku</span>
                    </button>
                    <button type="button" onclick="clearInputs()"
                        class="w-full py-3.5 bg-gradient-to-r from-gray-600 to-gray-700 text-white rounded-xl font-semibold shadow-md hover:from-gray-700 hover:to-gray-800 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center space-x-2 group">
                        <i class='bx bx-refresh text-xl group-hover:rotate-180 transition-transform duration-500'></i>
                        <span>Reset Form</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            FilePondPluginFileEncode
        );
        const pond = FilePond.create(document.getElementById('cover'), {
            acceptedFileTypes: ['image/*'],
            allowImagePreview: true,
            allowFileEncode: true,
            labelIdle: 'Klik atau seret gambar ke sini',
            stylePanelAspectRatio: '1 / 1'
        });

        function clearInputs() {
            const inputs = document.querySelectorAll('form input[type="text"], form select');
            inputs.forEach(input => {
                if (input.tagName === 'SELECT') {
                    input.selectedIndex = 0;
                } else {
                    input.value = '';
                }
            });
            const fileInput = document.getElementById('coverInput');
            fileInput.value = '';
            const newFile = fileInput.cloneNode(true);
            fileInput.parentNode.replaceChild(newFile, fileInput);
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const hasBooks = {{ $buku->count() > 0 ? 'true' : 'false' }};
            if (!hasBooks) return;

            let table = $('#table-buku').DataTable({
                language: {
                    search: "Cari Buku:",
                    lengthMenu: "Tampilkan _MENU_",
                    zeroRecords: "Tidak ada data",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                },
                dom: 't',
                pageLength: 10,
            });

            function updatePagination() {
                let info = table.page.info();
                let totalPages = info.pages;
                let currentPage = info.page + 1;

                $('#custom-info').html(
                    `Menampilkan <span class="font-medium">${info.start + 1}</span> sampai <span class="font-medium">${info.end}</span> dari <span class="font-medium">${info.recordsDisplay}</span> hasil`
                );

                let buttons = '';

                buttons +=
                    `<button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors" ${currentPage === 1 ? 'disabled' : ''} data-page="${currentPage - 2}">Sebelumnya</button>`;

                let start = Math.max(1, currentPage - 1);
                let end = Math.min(totalPages, currentPage + 1);

                if (start > 2) {
                    buttons +=
                        `<button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors" data-page="0">1</button>`;
                    buttons += `<span class="text-gray-400 px-1">...</span>`;
                }

                for (let i = start; i <= end; i++) {
                    buttons +=
                        `<button class="px-3 py-1 ${i === currentPage ? 'bg-emerald-600 text-white' : 'border border-gray-300'} rounded-lg text-sm hover:bg-gray-50 transition-colors" data-page="${i - 1}">${i}</button>`;
                }

                if (end < totalPages - 1) {
                    buttons += `<span class="text-gray-400 px-1">...</span>`;
                    buttons +=
                        `<button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors" data-page="${totalPages - 1}">${totalPages}</button>`;
                } else if (end === totalPages - 1) {
                    buttons +=
                        `<button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors" data-page="${totalPages - 1}">${totalPages}</button>`;
                }

                buttons +=
                    `<button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors" ${currentPage === totalPages ? 'disabled' : ''} data-page="${currentPage}">Selanjutnya</button>`;

                $('#custom-buttons').html(buttons);
            }

            $('#custom-buttons').on('click', 'button[data-page]', function() {
                let page = $(this).data('page');
                table.page(page).draw('page');
            });

            table.on('draw', updatePagination);
            updatePagination();

            $('#search-books').on('keyup', function() {
                table.search(this.value).draw();
            });

            $('#category-filter').on('change', function() {
                table.column(4).search(this.value).draw();
            });
        });

        document.getElementById('file-upload').addEventListener('change', function() {
            document.getElementById('submit-upload').click();
        });
    </script>
@endsection

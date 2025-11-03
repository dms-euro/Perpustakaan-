@extends('layouts.app')
@section('content')
    <div class="lg:ml-64">
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between p-4">
                <div class="flex items-center space-x-4">
                    <button class="lg:hidden text-emerald-700" id="open-sidebar">
                        <i class='bx bx-menu text-2xl'></i>
                    </button>
                    <h1 class="text-2xl font-bold text-emerald-900">Manajemen Buku & Kategori</h1>
                </div>

                <div class="flex items-center space-x-4">
                </div>
            </div>
        </header>

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
                                class="px-3 py-1 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm flex items-center">
                                <i class='bx bx-plus mr-1'></i> Tambah
                            </button>
                        </div>
                        <div class="overflow-hidden rounded-2xl shadow-sm border border-gray-100 bg-white">
                            <div
                                class="max-h-[240px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 hover:scrollbar-thumb-emerald-400 transition-all">
                                <table class="w-full text-sm text-gray-700">
                                    <thead class="bg-gray-50 text-xs uppercase text-gray-500 sticky top-0 z-10">
                                        <tr>
                                            <th class="px-6 py-3 text-left font-semibold tracking-wide bg-gray-50">Kategori
                                            </th>
                                            <th class="px-6 py-3 text-left font-semibold tracking-wide bg-gray-50 w-24">Aksi
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200">
                                        @forelse ($kategori as $k)
                                            <tr class="hover:bg-emerald-50 transition-colors">
                                                <td class="px-6 py-4 flex items-center gap-2">
                                                    <i class='bx bx-collection text-emerald-500 text-xl'></i>
                                                    <span class="font-medium text-emerald-900">{{ $k->kategori }}</span>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <form id="form-delete-{{ $k->id }}"
                                                        action="{{ route('kategori.destroy', $k->id) }}" method="POST"
                                                        class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="hapus({{ $k->id }})"
                                                            class="inline-flex items-center px-2 py-1 text-red-600 rounded-md transition hover:bg-red-100">
                                                            <i class='bx bx-trash text-base'></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-center py-5 text-gray-400">
                                                    <i class='bx bx-folder-open text-2xl mb-1'></i><br>
                                                    Belum ada kategori
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
                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-left">
                        <h3 class="text-lg font-bold text-emerald-900 mb-4">Tambah Buku Baru</h3>
                        <form action="{{ route('buku.store') }}" method="POST"
                            class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @csrf
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Buku</label>
                                    <input type="text" name="judul" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                        placeholder="Masukkan judul buku">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                                    <select name="kategori_id" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                        id="category-select">
                                        <option value="" disabled selected>Pilih kategori</option>
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex items-end">
                                    <button type="button" onclick="history.back()"
                                        class="w-full px-6 py-3 bg-gray-800 text-white rounded-xl hover:bg-gray-900 transition-all duration-300 font-medium shadow-lg hover:shadow-xl flex items-center justify-center group">
                                        <i
                                            class='bx bx-x-circle text-xl mr-2 group-hover:rotate-90 transition-transform duration-300'></i>Batalkan
                                    </button>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">ISBN</label>
                                    <input type="text" name="isbn"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                        placeholder="Nomor ISBN">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Penulis</label>
                                    <input type="text" name="penulis" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                        placeholder="Nama penulis">
                                </div>
                                <div class="flex items-end">
                                    <button type="submit"
                                        class="w-full px-6 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all duration-300 font-medium shadow-lg hover:shadow-emerald-200 hover:shadow-2xl flex items-center justify-center group">
                                        <i class='bx bx-save mr-2 group-hover:animate-bounce'></i>Simpan Buku
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                        <div class="relative max-w-md mb-4">
                            <input type="text" id="search-books" placeholder="Cari judul, penulis, atau ISBN..."
                                class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <i class='bx bx-search absolute left-3 top-2.5 text-gray-400'></i>
                        </div>
                        <div class="flex items-center space-x-4">
                            <select id="category-filter"
                                class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500">
                                <option value="" disabled selected>Semua Kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->kategori }}">{{ $k->kategori }}</option>
                                @endforeach
                            </select>
                            <select id="status-filter"
                                class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500">
                                <option value="">Semua Status</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Dipinjam">Dipinjam</option>
                                <option value="Perbaikan">Perbaikan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto rounded-2xl shadow-lg border border-gray-100 bg-white">
                    <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-emerald-600 text-white text-sm uppercase">
                            <tr>
                                <th class="px-4 py-2 text-left">Judul</th>
                                <th class="px-4 py-2 text-left">Penulis</th>
                                <th class="px-4 py-2 text-left">Kategori</th>
                                <th class="px-4 py-2 text-left">ISBN</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="books-table-body">
                            @foreach ($buku as $b)
                                <tr class="hover:bg-emerald-50 transition">
                                    <td class="px-4 py-2">{{ $b->judul }}</td>
                                    <td class="px-4 py-2">{{ $b->penulis }}</td>
                                    <td class="px-4 py-2">{{ $b->kategori->kategori }}</td>
                                    <td class="px-4 py-2">{{ $b->isbn }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('buku.show', $b->id) }}"
                                            class="text-blue-500 hover:text-blue-700 mx-1"><i class='bx bx-show'></i></a>
                                        <a href="{{ route('buku.edit', $b->id) }}"
                                            class="text-emerald-500 hover:text-emerald-700 mx-1"><i
                                                class='bx bx-edit'></i></a>
                                        <form action="{{ route('buku.destroy', $b->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin hapus buku ini?')"
                                                class="text-red-500 hover:text-red-700 mx-1">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer -->
                <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Menampilkan <span class="font-medium" id="showing-count">0</span> dari <span class="font-medium"
                            id="total-count">0</span> buku
                    </div>
                    <div class="flex items-center space-x-2">
                        <button
                            class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors"
                            id="prev-page">
                            Sebelumnya
                        </button>
                        <button
                            class="px-3 py-1 bg-emerald-600 text-white rounded-lg text-sm hover:bg-emerald-700 transition-colors"
                            id="current-page">
                            1
                        </button>
                        <button
                            class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition-colors"
                            id="next-page">
                            Selanjutnya
                        </button>
                    </div>
                </div>
            </div>
        </main>
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
    <script>
        const books = @json($buku);
        const fuse = new Fuse(books, {
            keys: ['judul', 'penulis', 'isbn', 'kategori.kategori'],
            threshold: 0.3
        });
        const tbody = document.getElementById('books-table-body');

        document.getElementById('search-books').addEventListener('input', e => {
            const list = e.target.value ? fuse.search(e.target.value).map(r => r.item) : books;
            tbody.innerHTML = list.map(b => `
        <tr class="hover:bg-emerald-50 transition">
            <td class="px-4 py-2">${b.judul}</td>
            <td class="px-4 py-2">${b.penulis}</td>
            <td class="px-4 py-2">${b.kategori?.kategori||'-'}</td>
            <td class="px-4 py-2">${b.isbn}</td>
            <td class="px-4 py-2">
                <button class="px-3 py-1 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 text-sm">Edit</button>
                <button class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm">Hapus</button>
            </td>
        </tr>
    `).join('') || `<tr><td colspan="5" class="text-center text-gray-400 py-4">Tidak ada hasil</td></tr>`;
        });
    </script>
@endsection

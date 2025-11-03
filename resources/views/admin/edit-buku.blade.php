@extends('layouts.app')

@section('content')
    <div class="lg:ml-64" data-aos="fade-up">
        <header class="bg-white shadow-sm border-b border-gray-200 p-4 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-emerald-900">Edit Buku</h1>
                <p class="text-sm text-gray-600">Perbarui informasi buku di koleksi</p>
            </div>
            <a href="{{ route('buku.index') }}"
                class="px-4 py-2 border border-emerald-600 text-emerald-700 rounded-lg hover:bg-emerald-50 transition">
                <i class='bx bx-arrow-back mr-2'></i>Kembali
            </a>
        </header>

        <main class="p-6">
            <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-left">
                <h3 class="text-lg font-bold text-emerald-900 mb-4">Tambah Buku Baru</h3>
                <form action="{{ route('buku.update', $buku->id) }}" method="POST"
                    class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Judul Buku</label>
                            <input type="text" name="judul" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                placeholder="Masukkan judul buku" value="{{ $buku->judul }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <select name="kategori_id" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                id="category-select">
                                <option value="" disabled>Pilih kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}"
                                        {{ $buku->kategori_id == $k->id ? 'selected' : '' }}>
                                        {{ $k->kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">ISBN</label>
                            <input type="text" name="isbn"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                placeholder="Nomor ISBN" value="{{ $buku->isbn }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Penulis</label>
                            <input type="text" name="penulis" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                placeholder="Nama penulis" value="{{ $buku->penulis }}">
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
                            <i class='bx bx-save mr-2'></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection

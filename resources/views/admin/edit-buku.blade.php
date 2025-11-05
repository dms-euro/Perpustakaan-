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
                <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data"
                    class="bg-white p-6 rounded-2xl shadow-lg space-y-6 border border-gray-100">
                    @csrf
                    @method('PUT')

                    <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <i class='bx bx-edit text-emerald-600 text-2xl'></i> Edit Data Buku
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- KIRI -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Judul Buku</label>
                                <input type="text" name="judul" required value="{{ $buku->judul }}"
                                    class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                                <select name="kategori_id" required
                                    class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                    <option value="" disabled>Pilih kategori</option>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id }}"
                                            {{ $buku->kategori_id == $k->id ? 'selected' : '' }}>
                                            {{ $k->kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Penerbit</label>
                                <input type="text" name="penerbit" required value="{{ $buku->penerbit }}"
                                    class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" />
                            </div>
                        </div>

                        <!-- KANAN -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">ISBN</label>
                                <input type="text" name="isbn" value="{{ $buku->isbn }}"
                                    class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Penulis</label>
                                <input type="text" name="penulis" required value="{{ $buku->penulis }}"
                                    class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" />
                            </div>

                            <!-- UPLOAD COVER -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Cover Buku</label>

                                <input type="file" name="cover" id="cover" class="filepond"
                                    data-allow-replace="true" data-max-file-size="3MB"
                                    data-accepted-file-types="image/png, image/jpg, image/jpeg">
                            </div>
                        </div>
                    </div>

                    <!-- PREVIEW COVER SAAT INI -->
                    <div class="mt-4">
                        <p class="text-sm font-medium text-gray-700 mb-2">Cover Sebelumnya:</p>
                        @if ($buku->cover)
                            <img src="{{ asset('storage/' . $buku->cover) }}" class="h-32 rounded-lg shadow-md border">
                        @else
                            <span class="text-gray-500 italic">Belum ada cover</span>
                        @endif
                    </div>

                    <!-- TOMBOL -->
                    <div class="flex gap-4 pt-4">
                        <a href="{{ route('buku.index') }}"
                            class="w-1/2 px-6 py-3 bg-gray-700 text-white rounded-lg shadow hover:bg-gray-900 transition flex items-center justify-center gap-2">
                            <i class='bx bx-x-circle text-lg'></i> Batal
                        </a>

                        <button type="submit"
                            class="w-1/2 px-6 py-3 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition flex items-center justify-center gap-2">
                            <i class='bx bx-save text-lg'></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
        </main>
    </div>
    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            FilePondPluginFileEncode
        );

        FilePond.create(document.getElementById('cover'), {
            allowImagePreview: true,
            allowFileEncode: true,
            acceptedFileTypes: ['image/*'],
            labelIdle: 'Klik / tarik gambar',
        });
    </script>
@endsection

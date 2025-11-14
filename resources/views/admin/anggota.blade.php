@extends('layouts.app')
@section('page-title', 'Manajemen  & Anggota')
@section('content')
    <div class="lg:ml-64 pt-24">
        <!-- Main Content Area -->
        <main class="p-6">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Total Anggota</p>
                            <p class="text-3xl font-bold text-emerald-900">{{ $anggota->count() }}</p>
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
                            <p class="text-sm text-gray-600">Petugas</p>
                            <p class="text-3xl font-bold text-emerald-900">{{ $petugas->count() }}</p>
                            <p class="text-sm text-emerald-600">84.5% dari total</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class='bx bx-check-circle text-2xl text-green-600'></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Members Table -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up">
                <!-- Table Header with Search -->
                <div
                    class="px-6 py-4 border-b border-gray-200 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-bold text-emerald-900">Daftar Anggota</h3>
                        <p class="text-sm text-gray-600">Menampilkan semua anggota dengan role <strong>Anggota</strong></p>
                    </div>

                    <div class="flex flex-col md:flex-row items-start md:items-center gap-4 w-full md:w-auto">
                        <!-- Search Bar -->
                        <div class="relative">
                            <i class='bx bx-search absolute left-3 top-1/2 -translate-y-1/2 text-lg text-gray-400'></i>
                            <input type="text" id="search-anggota" placeholder="Cari Nama Anggota..."
                                class="pl-10 pr-4 py-2.5 w-56 md:w-64 text-sm border border-gray-200 rounded-full bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 placeholder-gray-400 transition-all">
                        </div>
                        <button data-modal-target="anggotaModal" data-modal-toggle="anggotaModal"
                            class="px-6 py-3 bg-emerald-600 text-white rounded-full hover:bg-emerald-700 transition-all duration-300 font-semibold flex items-center gap-2">
                            <i class='bx bx-user-plus text-lg'></i> Tambah Anggota
                        </button>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-2xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table id="table-user" class="min-w-full text-sm text-gray-700">
                            <thead class="bg-gradient-to-r from-emerald-600 to-emerald-700 text-white uppercase text-xs">
                                <tr>
                                    <th class="px-5 py-3 text-left font-medium">Nama</th>
                                    <th class="px-5 py-3 text-left font-medium">Email</th>
                                    <th class="px-5 py-3 text-left font-medium">Password</th>
                                    <th class="px-5 py-3 text-left font-medium">Role</th>
                                    <th class="px-5 py-3 text-left font-medium">Alamat</th>
                                    <th class="px-5 py-3 text-left font-medium">Telepon</th>
                                    <th class="px-5 py-3 text-center font-medium w-28">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($anggota as $u)
                                    <tr class="hover:bg-emerald-50 transition-colors duration-200 group">
                                        <td class="px-5 py-3 font-medium text-emerald-900"> <i
                                                class="bx bx-user-circle text-xl  mr-1 text-emerald-500"></i>
                                            {{ $u->nama }}</td>
                                        <td class="px-5 py-3 text-gray-700">{{ $u->email }}</td>
                                        <td class="px-5 py-3 text-gray-500 font-mono">••••••••</td>
                                        <td class="px-5 py-3">
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                                {{ $u->role == 'admin' ? 'bg-red-100 text-red-800' : 'bg-emerald-100 text-emerald-800' }}">
                                                {{ ucfirst($u->role) }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-3 text-gray-700">{{ $u->alamat ?? '-' }}</td>
                                        <td class="px-5 py-3 text-gray-700">{{ $u->telepon ?? '-' }}</td>
                                        <td class="px-5 py-3 text-center">
                                            <div class="flex items-center justify-center gap-1.5">
                                                <a href="{{ route('anggota.show', $u->id) }}"
                                                    class="text-blue-600 hover:text-blue-800 transition" title="Lihat">
                                                    <i class='bx bx-show text-lg'></i>
                                                </a>
                                                <a href="{{ route('anggota.edit', $u->id) }}"
                                                    class="text-emerald-600 hover:text-emerald-800 transition"
                                                    title="Edit">
                                                    <i class='bx bx-edit text-lg'></i>
                                                </a>
                                                <form id="form-delete-{{ $u->id }}"
                                                    action="{{ route('anggota.destroy', $u->id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="hapus({{ $u->id }})"
                                                        class="text-red-600 hover:text-red-800 transition" title="Hapus">
                                                        <i class='bx bx-trash text-lg'></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="custom-pagination-user"
                        class="px-6 py-4 border-t border-gray-200 flex items-center justify-between bg-gray-50">
                        <div class="text-sm text-gray-700" id="custom-info-user"></div>
                        <div class="flex items-center space-x-2" id="custom-buttons-user"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="anggotaModal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <!-- Close Button -->
                <button type="button"
                    class="absolute top-5 right-5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="anggotaModal">
                    <i class='bx bx-x text-2xl'></i>
                </button>

                <!-- Header -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-2 bg-emerald-100 rounded-lg">
                        <i class='bx bx-user-plus text-2xl text-emerald-600'></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Tambah Anggota Baru</h3>
                        <p class="text-sm text-gray-600 mt-1">Lengkapi form berikut untuk menambahkan anggota baru</p>
                    </div>
                </div>

                <!-- Form -->
                <form id="bukuForm" action="{{ route('anggota.store') }}" method="POST" id="add-anggota-form"
                    class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @csrf

                    <!-- Kolom Kiri -->
                    <div class="space-y-5">
                        <!-- Nama -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i class='bx bx-user text-emerald-600'></i> Nama Lengkap
                            </label>
                            <input type="text" name="nama" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 placeholder-gray-400"
                                placeholder="Masukkan nama lengkap">
                        </div>

                        <!-- Email -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i class='bx bx-envelope text-emerald-600'></i> Email
                            </label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 placeholder-gray-400"
                                placeholder="contoh@email.com">
                        </div>

                        <!-- Password -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i class='bx bx-lock-alt text-emerald-600'></i> Password
                            </label>
                            <input type="password" name="password" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 placeholder-gray-400"
                                placeholder="Buat password yang kuat">
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="space-y-5">
                        <!-- Role -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i class='bx bx-cog text-emerald-600'></i> Role
                            </label>
                            <select name="role" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 appearance-none bg-white">
                                <option value="" class="text-gray-400">Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                                <option value="anggota">Anggota</option>
                            </select>
                        </div>

                        <!-- Telepon -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i class='bx bx-phone text-emerald-600'></i> Nomor Telepon
                            </label>
                            <input type="text" name="telepon" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 placeholder-gray-400"
                                placeholder="Contoh: 0882 0000 0000">
                        </div>

                        <!-- Alamat -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i class='bx bx-home text-emerald-600'></i> Alamat
                            </label>
                            <textarea name="alamat" rows="3" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 placeholder-gray-400 resize-none"
                                placeholder="Tulis alamat lengkap di sini..."></textarea>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="lg:col-span-2 flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
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
    </div>
    <script>
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
            if (fileInput) {
                fileInput.value = '';
                const newFile = fileInput.cloneNode(true);
                fileInput.parentNode.replaceChild(newFile, fileInput);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const table = $('#table-user').DataTable({
                dom: 't',
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                ordering: true,
                info: true,
                language: {
                    emptyTable: "Tidak ada data anggota",
                }
            });

            const searchInput = document.getElementById('search-anggota');
            searchInput.addEventListener('keyup', function() {
                table.search(this.value).draw();
            });

            function updateCustomPagination() {
                const pageInfo = table.page.info();
                const buttonsContainer = document.getElementById('custom-buttons-user');
                const infoContainer = document.getElementById('custom-info-user');
                buttonsContainer.innerHTML = '';
                infoContainer.textContent =
                    `Menampilkan ${pageInfo.start + 1} sampai ${pageInfo.end} dari ${pageInfo.recordsDisplay} anggota`;

                const prevBtn = document.createElement('button');
                prevBtn.className =
                    `px-3 py-1 border border-gray-300 rounded-lg text-sm transition-colors ${pageInfo.page === 0 ? 'text-gray-400 cursor-not-allowed' : 'hover:bg-gray-100'}`;
                prevBtn.textContent = 'Sebelumnya';
                prevBtn.disabled = pageInfo.page === 0;
                prevBtn.addEventListener('click', () => table.page('previous').draw('page'));
                buttonsContainer.appendChild(prevBtn);

                for (let i = 0; i < pageInfo.pages; i++) {
                    const btn = document.createElement('button');
                    btn.className =
                        `px-3 py-1 border rounded-lg text-sm ${pageInfo.page === i
                    ? 'bg-emerald-600 text-white border-emerald-600 hover:bg-emerald-700'
                    : 'border-gray-300 hover:bg-gray-100'
                } transition-colors`;
                    btn.textContent = i + 1;
                    btn.addEventListener('click', () => table.page(i).draw('page'));
                    buttonsContainer.appendChild(btn);
                }

                const nextBtn = document.createElement('button');
                nextBtn.className =
                    `px-3 py-1 border border-gray-300 rounded-lg text-sm transition-colors ${pageInfo.page === pageInfo.pages - 1 ? 'text-gray-400 cursor-not-allowed' : 'hover:bg-gray-100'}`;
                nextBtn.textContent = 'Selanjutnya';
                nextBtn.disabled = pageInfo.page === pageInfo.pages - 1;
                nextBtn.addEventListener('click', () => table.page('next').draw('page'));
                buttonsContainer.appendChild(nextBtn);
            }

            table.on('draw', updateCustomPagination);
            updateCustomPagination();
        });
    </script>
@endsection

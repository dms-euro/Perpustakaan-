    @extends('layouts.app')
    @section('page-title', 'Manajemen Peminjaman Buku')
    @section('content')
        <!-- Main Content -->
        <div class="lg:ml-64 pt-24">

            <!-- Main Content Area -->
            <main class="p-6">
                <!-- Stats Overview -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Sedang Dipinjam</p>
                                <p class="text-3xl font-bold text-emerald-900">{{ $dipinjam }}</p>
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
                                <p class="text-3xl font-bold text-amber-900">{{ $hampirJatuhTempo->count() }}</p>
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
                                <p class="text-3xl font-bold text-red-900">{{ $terlambat }}</p>
                                <p class="text-sm text-red-600">Perlu penagihan</p>
                            </div>
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class='bx bx-error text-2xl text-red-600'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Loans Table -->
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up">
                    <!-- Table Header -->
                    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-emerald-900">Daftar Peminjaman</h3>
                            <p class="text-sm text-gray-600 mt-1">Kelola data peminjaman buku perpustakaan</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ">
                            <!-- Search -->
                            <div class="md:col-span-2">
                                <div class="relative group">
                                    <i
                                        class='bx bx-search absolute left-4 top-1/2 -translate-y-1/2 text-xl text-gray-400 group-focus-within:text-emerald-500 transition-colors'></i>
                                    <input type="text" id="search-peminjaman"
                                        placeholder="Cari anggota, judul buku, atau ID peminjaman..."
                                        class="w-full pl-12 pr-4 py-2.5 rounded-full border border-gray-200 ...">

                                </div>
                            </div>
                            <button data-modal-target="modalTambahPeminjaman" data-modal-toggle="modalTambahPeminjaman"
                                class="px-3 py-1 border border-emerald-500 text-emerald-600 rounded-full transition-all text-sm flex items-center hover:text-white hover:bg-gradient-to-r hover:from-emerald-500 hover:to-emerald-700">
                                <i class='bx bx-plus mr-1'></i> Tambah Peminjaman
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table id="peminjamanTable" class="w-full text-sm">
                            <thead class="bg-green-100">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Anggota</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Buku</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Tanggal Pinjam</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Jatuh Tempo</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Status</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Denda</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y">
                                @foreach ($peminjaman as $p)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-3">{{ $p->user->nama }}</td>
                                        <td class="px-6 py-3">{{ $p->buku->judul }}</td>

                                        <td class="px-6 py-3">
                                            {{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }}
                                        </td>

                                        <td class="px-6 py-3">
                                            {{ \Carbon\Carbon::parse($p->tanggal_kembali)->format('d M Y') }}
                                        </td>

                                        <td class="px-6 py-3">
                                            <span
                                                class="px-3 py-1 rounded-full text-xs font-medium
                                                    @if ($p->status == 'meminjam') bg-emerald-100 text-emerald-700
                                                    @elseif ($p->status == 'terlambat') bg-red-100 text-red-700 @endif">
                                                {{ ucfirst($p->status) }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-3">
                                            Rp {{ number_format($p->denda, 0, ',', '.') }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-2">
                                                <form action="{{ route('peminjaman.kembalikan', $p->id) }}" method="POST"
                                                    class="inline kembalikan-form" data-status="{{ $p->status }}">
                                                    @csrf
                                                    <button type="submit" class="text-emerald-600 hover:text-emerald-900">
                                                        <i class='bx bx-check-circle text-lg'></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('peminjaman.show', $p->id) }}"
                                                    class="text-blue-600 hover:text-blue-800 transition" title="Lihat">
                                                    <i class='bx bx-show text-lg'></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Table Footer -->
                    <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                        <div id="peminjaman-pagination"
                            class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                            <div class="text-sm text-gray-700" id="peminjaman-info"></div>
                            <div class="flex items-center space-x-2" id="peminjaman-buttons"></div>
                        </div>

                    </div>
                </div>
            </main>
        </div>
        <div id="modalTambahPeminjaman" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <!-- Close Button -->
                    <button type="button"
                        class="absolute top-5 right-5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-hide="modalTambahPeminjaman">
                        <i class='bx bx-x text-2xl'></i>
                    </button>

                    <!-- Header -->
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-emerald-100 rounded-lg">
                            <i class='bx bx-book text-2xl text-emerald-600'></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Tambah Peminjaman Baru</h3>
                            <p class="text-sm text-gray-600 mt-1">Lengkapi form berikut untuk pendataan peminjaman</p>
                        </div>
                    </div>
                    <form action="{{ route('peminjaman.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Cari User -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class='bx bx-user text-emerald-600'></i> Pilih / Cari Anggota
                            </label>
                            <select id="user_id" name="user_id" class="w-full border-gray-300 rounded-xl">
                                <option value="">Ketik nama atau email...</option>
                                @foreach ($anggota as $user)
                                    <option value="{{ $user->id }}">{{ $user->nama }} - {{ $user->email }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Cari Buku -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class='bx bx-book text-emerald-600'></i> Pilih / Cari Buku
                            </label>
                            <select id="buku_id" name="buku_id" class="w-full border-gray-300 rounded-xl">
                                <option value="">Ketik judul atau penulis...</option>
                                @foreach ($buku as $item)
                                    <option value="{{ $item->id }}">{{ $item->judul }} - {{ $item->penulis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tanggal Pinjam -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class='bx bx-calendar text-emerald-600'></i> Tanggal Pinjam
                            </label>
                            <input type="date" name="tanggal_pinjam" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200">
                        </div>

                        <!-- Tanggal Kembali -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class='bx bx-calendar-check text-emerald-600'></i> Tanggal Kembali
                            </label>
                            <input type="date" name="tanggal_kembali" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200">
                        </div>

                        <!-- Status Otomatis -->
                        <input type="hidden" name="status" value="meminjam">

                        <!-- kalau tetap mau ditampilkan (readonly) -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class='bx bx-list-check text-emerald-600'></i> Status
                            </label>
                            <input type="text" value="meminjam" readonly
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-gray-100 text-gray-600 cursor-not-allowed">
                        </div>


                        <!-- Tombol -->
                        <div class="pt-4 flex gap-3">
                            <button type="submit"
                                class="px-6 py-3 bg-emerald-600 text-white font-semibold rounded-xl hover:bg-emerald-700 transition-all duration-300 flex items-center gap-2">
                                <i class='bx bx-save'></i> Simpan
                            </button>
                            <a href="{{ route('peminjaman.index') }}"
                                class="px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-all duration-300 flex items-center gap-2">
                                <i class='bx bx-arrow-back'></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const options = {
                    create: false,
                    sortField: {
                        field: "text",
                        direction: "asc"
                    },
                    maxOptions: 10,
                    placeholder: "Ketik untuk mencari...",
                    render: {
                        option: function(data, escape) {
                            return `<div class="flex flex-col">
                    <span class="font-medium text-emerald-800">${escape(data.text)}</span>
                </div>`;
                        }
                    }
                };

                new TomSelect("#user_id", options);
                new TomSelect("#buku_id", options);
            });
        </script>
        <script>
            $(document).ready(function() {

                var table = $('#tabelPeminjaman').DataTable({
                    paging: true,
                    searching: true,
                    info: false,
                    lengthChange: false,
                    ordering: true,
                    autoWidth: false,

                    // hilangkan style bawaan datatable
                    dom: 'rt<"flex items-center justify-between px-6 py-4"p>',
                });

                // custom search input kamu
                $('#searchInput').on('keyup', function() {
                    table.search(this.value).draw();
                });
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let table = $('#peminjamanTable').DataTable({
                    language: {
                        search: "",
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

                    document.getElementById('peminjaman-info').innerHTML =
                        `Menampilkan <span class="font-medium">${info.start + 1}</span> sampai <span class="font-medium">${info.end}</span> dari <span class="font-medium">${info.recordsDisplay}</span> hasil`;

                    let buttons = '';

                    // tombol previous
                    buttons += `<button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50"
                ${currentPage === 1 ? 'disabled' : ''} data-page="${currentPage - 2}">
                Sebelumnya
            </button>`;

                    // halaman dinamis
                    let start = Math.max(1, currentPage - 1);
                    let end = Math.min(totalPages, currentPage + 1);

                    if (start > 2) {
                        buttons += `<button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50"
                        data-page="0">1</button>`;
                        buttons += `<span class="text-gray-400 px-1">...</span>`;
                    }

                    for (let i = start; i <= end; i++) {
                        buttons += `
                <button class="px-3 py-1 ${i === currentPage ? 'bg-emerald-600 text-white' : 'border border-gray-300'}
                        rounded-lg text-sm hover:bg-gray-50"
                        data-page="${i - 1}">${i}</button>`;
                    }

                    if (end < totalPages - 1) {
                        buttons += `<span class="text-gray-400 px-1">...</span>`;
                        buttons += `<button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50"
                        data-page="${totalPages - 1}">${totalPages}</button>`;
                    }

                    // tombol next
                    buttons += `<button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50"
                    ${currentPage === totalPages ? 'disabled' : ''} data-page="${currentPage}">
                    Selanjutnya
                </button>`;

                    document.getElementById('peminjaman-buttons').innerHTML = buttons;
                }

                // klik pagination custom
                $('#peminjaman-buttons').on('click', 'button[data-page]', function() {
                    let page = $(this).data('page');
                    table.page(page).draw('page');
                });

                table.on('draw', updatePagination);
                updatePagination();

                // 🔍 search custom
                document.getElementById('search-peminjaman').addEventListener('keyup', function() {
                    table.search(this.value).draw();
                });
            });
        </script>

        <script>
            document.querySelectorAll('.kembalikan-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const status = form.getAttribute('data-status');

                    // Jika TERLAMBAT → wajib bayar denda
                    if (status === 'terlambat') {
                        Swal.fire({
                            title: 'Bayar Denda',
                            html: `
                    <p class="mb-2">Denda keterlambatan: <b>Rp 50.000</b></p>
                    <input type="number" id="bayar" class="swal2-input" placeholder="Masukkan nominal">
                `,
                            showCancelButton: true,
                            confirmButtonText: 'Bayar & Kembalikan',
                            cancelButtonText: 'Batal',
                            preConfirm: () => {
                                const bayar = document.getElementById('bayar').value;
                                if (bayar < 50000) {
                                    Swal.showValidationMessage('Minimal bayar Rp 50.000');
                                }
                                return bayar;
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });

                    }
                    // Jika BELUM TERLAMBAT → langsung konfirmasi biasa
                    else {
                        Swal.fire({
                            title: 'Kembalikan Buku?',
                            text: 'Apakah kamu yakin buku ini sudah dikembalikan?',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#10B981',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, kembalikan!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    }
                });
            });
        </script>
    @endsection

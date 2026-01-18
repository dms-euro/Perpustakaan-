@extends('layouts.app')
@section('page-title', 'Log Aktivitas Peminjaman')

@section('content')
    <div class="lg:ml-64 pt-24">
        <main class="p-4 md:p-6">
            <div class="mb-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Log Aktivitas Peminjaman</h1>
                <p class="text-gray-600 mt-2">Riwayat aktivitas peminjaman dan pengembalian buku</p>
            </div>
            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Aktivitas</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $logs->total() }}</p>
                        </div>
                        <div class="p-3 bg-blue-50 rounded-lg">
                            <i class='bx bx-history text-2xl text-blue-600'></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Peminjaman Aktif</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $activeLoans ?? 0 }}</p>
                        </div>
                        <div class="p-3 bg-emerald-50 rounded-lg">
                            <i class='bx bx-book-bookmark text-2xl text-emerald-600'></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Denda</p>
                            <p class="text-2xl font-bold text-red-600">Rp {{ number_format($totalDenda ?? 0, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="p-3 bg-red-50 rounded-lg">
                            <i class='bx bx-money text-2xl text-red-600'></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <!-- Header dengan Filter -->
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200 bg-gradient-to-r from-emerald-50 to-white">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-bold text-emerald-900">Log Aktivitas</h3>
                            <p class="text-sm text-gray-600 mt-1">Total {{ $logs->count() }} aktivitas ditemukan</p>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <!-- Search -->
                            <div class="relative w-full md:w-72">
                                <input type="text" id="searchInput" placeholder="Cari user atau buku..."
                                    class="w-full pl-11 pr-4 py-2.5 rounded-xl bg-white/60 text-gray-800
                                        border border-white/40 focus:ring-2 focus:ring-emerald-400
                                        focus:border-emerald-400 outline-none shadow-sm
                                        placeholder-gray-500">
                                <i class='bx bx-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-500'></i>
                            </div>

                            <!-- Status Filter -->
                            <select id="statusFilter"
                                class="px-4 py-2.5 rounded-xl bg-white/60 text-gray-800
                                    border border-white/40 focus:ring-2 focus:ring-emerald-400
                                    focus:border-emerald-400 outline-none shadow-sm">
                                <option value="">Semua Status</option>
                                <option value="meminjam">Meminjam</option>
                                <option value="dikembalikan">Dikembalikan</option>
                                <option value="terlambat">Terlambat</option>
                            </select>

                            <!-- Export Excel -->
                            <a href="{{ route('aktivitas.export.excel') }}"
                                class="flex items-center gap-2 px-5 py-2.5 rounded-xl
                                    bg-gradient-to-r from-emerald-500 to-green-600
                                    text-white font-medium shadow-lg
                                    hover:scale-105 transition-all duration-200">
                                <i class='bx bxs-file'></i>
                                <span>Export Excel</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table id="logTable" class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b">Tanggal</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b">User</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b">Buku</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b">Status</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b">Denda</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($logs as $log)
                                <tr class="hover:bg-gray-50 transition-colors duration-150"
                                    data-user="{{ strtolower($log->user->nama ?? '') }}"
                                    data-buku="{{ strtolower($log->buku->judul ?? '') }}" data-status="{{ $log->status }}">
                                    <td class="px-4 py-3">
                                        <div class="font-medium text-gray-800">{{ $log->created_at->format('d-m-Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $log->created_at->format('H:i') }}</div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-2">
                                            <div
                                                class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
                                                <i class='bx bx-user text-emerald-600'></i>
                                            </div>
                                            <div>
                                                <div class="font-medium text-gray-800">{{ $log->user->nama ?? '-' }}</div>
                                                <div class="text-xs text-gray-500">{{ $log->user->email ?? '' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="font-medium text-gray-800">{{ $log->buku->judul ?? '-' }}</div>
                                        <div class="text-xs text-gray-500">ISBN: {{ $log->buku->isbn ?? '-' }}</div>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($log->status == 'meminjam')
                                            <span
                                                class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs font-medium border border-blue-100">
                                                <i class='bx bx-book text-sm'></i> Meminjam
                                            </span>
                                        @elseif($log->status == 'dikembalikan')
                                            <span
                                                class="inline-flex items-center gap-1 bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs font-medium border border-green-100">
                                                <i class='bx bx-check-circle text-sm'></i> Dikembalikan
                                            </span>
                                        @elseif($log->status == 'terlambat')
                                            <span
                                                class="inline-flex items-center gap-1 bg-red-50 text-red-700 px-3 py-1 rounded-full text-xs font-medium border border-red-100">
                                                <i class='bx bx-time-five text-sm'></i> Terlambat
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($log->denda > 0)
                                            <div class="flex items-center gap-2">
                                                <span class="text-red-600 font-bold">
                                                    Rp {{ number_format($log->denda, 0, ',', '.') }}
                                                </span>
                                                @if ($log->status == 'terlambat')
                                                    <span class="text-xs text-red-500">(Belum dibayar)</span>
                                                @else
                                                    <span class="text-xs text-green-500">(Lunas)</span>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <button onclick="showLogDetail({{ $log->id }})"
                                            class="text-emerald-600 hover:text-emerald-800 hover:bg-emerald-50 p-2 rounded-lg transition-colors duration-150"
                                            title="Detail">
                                            <i class='bx bx-dots-horizontal-rounded text-lg'></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center gap-2">
                                            <i class='bx bx-book-open text-4xl text-gray-300'></i>
                                            <p class="text-gray-400">Tidak ada data log aktivitas</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($logs->hasPages())
                    <div class="px-4 py-4 border-t border-gray-200">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                            <p class="text-sm text-gray-600">
                                Menampilkan {{ $logs->firstItem() ?? 0 }} - {{ $logs->lastItem() ?? 0 }} dari
                                {{ $logs->total() }} aktivitas
                            </p>
                            <div class="flex gap-1">
                                @if ($logs->onFirstPage())
                                    <span
                                        class="px-3 py-1 border border-gray-300 rounded-lg text-gray-400 cursor-not-allowed">
                                        <i class='bx bx-chevron-left'></i>
                                    </span>
                                @else
                                    <a href="{{ $logs->previousPageUrl() }}"
                                        class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                                        <i class='bx bx-chevron-left'></i>
                                    </a>
                                @endif

                                @foreach (range(1, min(5, $logs->lastPage())) as $page)
                                    @if ($page == $logs->currentPage())
                                        <span
                                            class="px-3 py-1 bg-emerald-600 text-white rounded-lg">{{ $page }}</span>
                                    @else
                                        <a href="{{ $logs->url($page) }}"
                                            class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach

                                @if ($logs->hasMorePages())
                                    <a href="{{ $logs->nextPageUrl() }}"
                                        class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                                        <i class='bx bx-chevron-right'></i>
                                    </a>
                                @else
                                    <span
                                        class="px-3 py-1 border border-gray-300 rounded-lg text-gray-400 cursor-not-allowed">
                                        <i class='bx bx-chevron-right'></i>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </main>
    </div>
    <div id="logModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-xl p-6 w-full max-w-md">
            <h3 class="text-lg font-bold mb-4">Detail Aktivitas</h3>
            <div id="modalContent" class="text-sm text-gray-700"></div>
            <div class="mt-4 text-right">
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded-lg">Tutup</button>
            </div>
        </div>
    </div>
    <script>
        function showLogDetail(id) {
            fetch(`/aktivitas/${id}`)
                .then(res => res.json())
                .then(data => {
                    document.getElementById('modalContent').innerHTML = `
                <p><b>User:</b> ${data.user}</p>
                <p><b>Buku:</b> ${data.buku}</p>
                <p><b>Status:</b> ${data.status}</p>
                <p><b>Denda:</b> Rp ${data.denda}</p>
            `;
                    document.getElementById('logModal').classList.remove('hidden');
                });
        }

        function closeModal() {
            document.getElementById('logModal').classList.add('hidden');
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('#logTable tbody tr');
            const searchInput = document.getElementById('searchInput');
            const statusFilter = document.getElementById('statusFilter');

            let currentPage = 1;
            const rowsPerPage = 10;

            function filterRows() {
                const search = searchInput.value.toLowerCase();
                const status = statusFilter.value;

                let visibleRows = [];

                rows.forEach(row => {
                    const user = row.dataset.user || '';
                    const buku = row.dataset.buku || '';
                    const rowStatus = row.dataset.status || '';

                    const matchSearch = user.includes(search) || buku.includes(search);
                    const matchStatus = status === '' || rowStatus === status;

                    if (matchSearch && matchStatus) {
                        row.style.display = '';
                        visibleRows.push(row);
                    } else {
                        row.style.display = 'none';
                    }
                });

                paginateRows(visibleRows);
            }

            function paginateRows(visibleRows) {
                const totalPages = Math.ceil(visibleRows.length / rowsPerPage);
                const start = (currentPage - 1) * rowsPerPage;
                const end = start + rowsPerPage;

                visibleRows.forEach((row, index) => {
                    row.style.display = (index >= start && index < end) ? '' : 'none';
                });

                renderPagination(totalPages);
            }

            function renderPagination(totalPages) {
                const container = document.getElementById('custom-pagination');
                const info = document.getElementById('custom-info');

                container.innerHTML = '';

                if (totalPages <= 1) return;

                info.textContent = `Halaman ${currentPage} dari ${totalPages}`;

                const prev = document.createElement('button');
                prev.textContent = 'Sebelumnya';
                prev.className = 'px-3 py-1 border rounded-lg';
                prev.disabled = currentPage === 1;
                prev.onclick = () => {
                    currentPage--;
                    filterRows();
                };
                container.appendChild(prev);

                for (let i = 1; i <= totalPages; i++) {
                    const btn = document.createElement('button');
                    btn.textContent = i;
                    btn.className =
                        `px-3 py-1 border rounded-lg ${i === currentPage ? 'bg-emerald-600 text-white' : ''}`;
                    btn.onclick = () => {
                        currentPage = i;
                        filterRows();
                    };
                    container.appendChild(btn);
                }

                const next = document.createElement('button');
                next.textContent = 'Selanjutnya';
                next.className = 'px-3 py-1 border rounded-lg';
                next.disabled = currentPage === totalPages;
                next.onclick = () => {
                    currentPage++;
                    filterRows();
                };
                container.appendChild(next);
            }

            searchInput.addEventListener('keyup', () => {
                currentPage = 1;
                filterRows();
            });

            statusFilter.addEventListener('change', () => {
                currentPage = 1;
                filterRows();
            });

            filterRows();
        });
    </script>

@endsection

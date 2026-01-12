@extends('layouts.app')
@section('page-title', 'Log Aktivitas Peminjaman')

@section('content')
    <div class="lg:ml-64 pt-24">
        <main class="p-6">

            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

                <!-- Header -->
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-emerald-900">Log Aktivitas</h3>
                    <p class="text-sm text-gray-600">Riwayat aktivitas peminjaman buku</p>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b">
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>Buku</th>
                                <th>Status</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                                <tr class="border-b">
                                    <td>{{ $log->created_at->format('d-m-Y H:i') }}</td>
                                    <td>{{ $log->user->nama ?? '-' }}</td>
                                    <td>{{ $log->buku->judul ?? '-' }}</td>

                                    <td>
                                        @if ($log->status == 'meminjam')
                                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded">
                                                📘 Meminjam
                                            </span>
                                        @elseif($log->status == 'dikembalikan')
                                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                                ✅ Dikembalikan
                                            </span>
                                        @elseif($log->status == 'terlambat')
                                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded">
                                                ⏰ Terlambat
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($log->denda > 0)
                                            <span class="text-red-600 font-bold">
                                                Rp {{ number_format($log->denda) }}
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </main>
    </div>
@endsection

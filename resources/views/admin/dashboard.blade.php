@extends('layouts.app')
@section('page-title', 'Dashboard')
@section('content')
    <div class="lg:ml-64 pt-24">

        <!-- Main Content Area -->
        <main class="p-6">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Books -->
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Total Kategori</p>
                            <p class="text-3xl font-bold text-emerald-900">{{ $kategori->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Total Buku</p>
                            <p class="text-3xl font-bold text-emerald-900">{{ $buku->count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Active Members -->
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Anggota Aktif</p>
                            <p class="text-3xl font-bold text-emerald-900">{{ $anggota->count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Active Loans -->
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Sedang Dipinjam</p>
                            <p class="text-3xl font-bold text-emerald-900">{{ $peminjaman->count() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                            <i class='bx bx-transfer text-2xl text-amber-600'></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-emerald-900">Statistik Peminjaman</h3>
                        <select
                            class="px-3 py-1 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500">
                            <option>Bulan Ini</option>
                            <option>3 Bulan Terakhir</option>
                            <option>Tahun Ini</option>
                        </select>
                    </div>
                    <div class="h-80">
                        <canvas id="loansChart"></canvas>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-emerald-900">Distribusi Kategori</h3>
                        <select
                            class="px-3 py-1 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500">
                            <option>Semua Kategori</option>
                            <option>Populer</option>
                        </select>
                    </div>
                    <div class="h-80">
                        <canvas id="categoriesChart"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const labels = @json($labels);
    const values = @json($values);

    const ctx = document.getElementById('loansChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: "Total Peminjaman",
                data: values,
                borderWidth: 2,
                backgroundColor: 'rgba(16, 185, 129, 0.5)',
                borderColor: 'rgb(16, 185, 129)',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: Math.max(...values) + 2,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // Data dari Laravel
    const kategoriLabels = @json($kategoriLabels);
    const kategoriValues = @json($kategoriValues);

    const ctxKategori = document.getElementById("categoriesChart").getContext("2d");

    new Chart(ctxKategori, {
        type: "doughnut",
        data: {
            labels: kategoriLabels,
            datasets: [{
                data: kategoriValues,
                borderWidth: 2,
                backgroundColor: [
                    "rgba(16, 185, 129, 0.7)",
                    "rgba(59, 130, 246, 0.7)",
                    "rgba(245, 158, 11, 0.7)",
                    "rgba(239, 68, 68, 0.7)",
                    "rgba(139, 92, 246, 0.7)"
                ],
                borderColor: "#fff",
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "bottom",
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            }
        }
    });

});
</script>



@endsection

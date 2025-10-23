<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Perpustakaan' }}</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-emerald-50 font-sans">

    <main>
        @auth
            @if (Auth::user() && Auth::user()->role === 'admin')
                @include('layouts.sidebar')
            @endif
        @endauth

        @yield('content')
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // ✅ Success Message
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000,
                background: '#ecfdf5',
                color: '#065f46',
                iconColor: '#10b981',
            });
        @endif

        // ❌ Error Message
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan!',
                text: '{{ session('error') }}',
                showConfirmButton: true,
                confirmButtonColor: '#dc2626',
                background: '#fef2f2',
                color: '#7f1d1d',
                iconColor: '#ef4444',
            });
        @endif

        // ⚠️ Konfirmasi Hapus
        function confirmDelete(event, formId) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                background: '#fefce8',
                color: '#78350f',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: false,
            offset: 100,
            miror: true
        });

        // Sidebar functionality
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('open-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');

        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });

        // Logout functionality
        document.getElementById('logout-btn').addEventListener('click', () => {
            Swal.fire({
                title: 'Konfirmasi Logout',
                text: 'Apakah Anda yakin ingin keluar dari panel admin?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#10b981'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.html';
                }
            });
        });

        // Notifications
        document.getElementById('notifications-btn').addEventListener('click', () => {
            Swal.fire({
                title: 'Notifikasi',
                html: `
                    <div class="text-left space-y-3">
                        <div class="p-3 bg-emerald-50 rounded-lg">
                            <p class="font-medium text-emerald-900">Peminjaman Baru</p>
                            <p class="text-sm text-gray-600">Ahmad meminjam 2 buku</p>
                        </div>
                        <div class="p-3 bg-amber-50 rounded-lg">
                            <p class="font-medium text-amber-900">Jatuh Tempo</p>
                            <p class="text-sm text-gray-600">3 buku akan jatuh tempo besok</p>
                        </div>
                        <div class="p-3 bg-red-50 rounded-lg">
                            <p class="font-medium text-red-900">Buku Hilang</p>
                            <p class="text-sm text-gray-600">Laporan buku hilang diterima</p>
                        </div>
                    </div>
                `,
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#10b981'
            });
        });

        // Charts initialization
        const loansChart = new Chart(
            document.getElementById('loansChart'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Peminjaman',
                        data: [1200, 1900, 1500, 2200, 1800, 2500, 2300, 2100, 2400, 2600, 2800, 3000],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            }
        );

        const categoriesChart = new Chart(
            document.getElementById('categoriesChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Sains & Teknologi', 'Sastra', 'Bisnis', 'Sejarah', 'Lainnya'],
                    datasets: [{
                        data: [35, 25, 20, 15, 5],
                        backgroundColor: [
                            '#10b981',
                            '#059669',
                            '#047857',
                            '#065f46',
                            '#064e3b'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            }
        );

        // Quick actions
        document.querySelectorAll('.bg-emerald-50 button').forEach(button => {
            button.addEventListener('click', function() {
                const action = this.querySelector('.font-medium').textContent;
                Swal.fire({
                    title: 'Aksi Cepat',
                    text: `Membuka form untuk: ${action}`,
                    icon: 'info',
                    confirmButtonText: 'Lanjutkan',
                    confirmButtonColor: '#10b981'
                });
            });
        });

        // Auto refresh stats every 30 seconds (simulated)
        setInterval(() => {
            const stats = document.querySelectorAll('.text-3xl.font-bold');
            stats.forEach(stat => {
                const current = parseInt(stat.textContent.replace(/[^0-9]/g, ''));
                const newValue = current + Math.floor(Math.random() * 10);
                stat.textContent = stat.textContent.replace(current, newValue);
            });
        }, 30000);
    </script>
</body>

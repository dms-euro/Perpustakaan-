<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Perpustakaan' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet" />
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css"rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/fuse.js@7.0.0"></script>
    <style>
        .swal2-popup {
            font-size: 1rem !important;
        }

        .swal2-confirm,
        .swal2-cancel {
            display: inline-block !important;
            padding: 0.5rem 1.25rem !important;
            font-weight: 600 !important;
            border-radius: 0.5rem !important;
            color: #fff !important;
            margin: 0 0.5rem !important;
            cursor: pointer !important;
        }

        .swal2-confirm {
            background-color: #10b981 !important;
        }

        .swal2-cancel {
            background-color: #6b7280 !important;
        }

        .swal2-confirm:hover {
            background-color: #059669 !important;
        }

        .swal2-cancel:hover {
            background-color: #4b5563 !important;
        }
    </style>

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

    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script>
        function hapus(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-delete-' + id).submit();
                }
            });
        }
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session('info'))
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Informasi',
                text: '{{ session('info') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

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
        document.getElementById('btnLogout').addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: "Keluar?",
                text: "Kamu yakin mau logout?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, logout",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        });

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

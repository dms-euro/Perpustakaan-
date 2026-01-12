@php
    $role = Auth::user()->role ?? null;
@endphp
<header class="fixed top-0 left-0 right-0 z-40 bg-emerald-50">
    <div class="flex items-center justify-between p-4">
        <div class="flex items-center space-x-4">
            <button class="lg:hidden text-emerald-700" id="open-sidebar">
                <i class='bx bx-menu text-2xl'></i>
            </button>
            <h1 class="text-center text-2xl font-bold text-emerald-900">
                @yield('page-title', 'Dashboard')
            </h1>
        </div>
    </div>
</header>

<!-- SIDEBAR -->
<aside id="sidebar"
    class="fixed top-[64px] left-0 z-50 w-64 h-[calc(100vh-64px)] bg-emerald-800 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out rounded-r-3xl flex flex-col">

    <!-- HEADER SIDEBAR -->
    <div class="flex items-center justify-between p-2 border-b border-white">
        <div class="flex items-center space-x-2">
            <i class='bx bx-book-open text-2xl text-emerald-300'></i>
            <span class="p-2 text-xl font-bold text-white">Perpustakaan Sekolahku</span>
        </div>
        <button id="close-sidebar" class="lg:hidden text-emerald-300 hover:text-white">
            <i class='bx bx-x text-2xl'></i>
        </button>
    </div>

    <!-- MENU -->
    <nav class="p-4 space-y-2 overflow-y-auto flex-1">
        @if ($role === 'admin')
            <a href="{{ route('dashboard.index') }}"
                class="flex items-center space-x-3 p-3 rounded-full transition-all
            {{ Request::routeIs('dashboard.*') ? 'bg-emerald-700 text-white' : 'text-emerald-200 hover:bg-emerald-700 hover:text-white' }}">
                <i class='bx bx-home text-xl'></i>
                <span>Dashboard</span>
            </a>
        @endif

        <a href="{{ route('buku.index') }}"
            class="flex items-center space-x-3 p-3 rounded-full transition-all
            {{ Request::routeIs('buku.*') ? 'bg-emerald-700 text-white' : 'text-emerald-200 hover:bg-emerald-700 hover:text-white' }}">
            <i class='bx bx-book text-xl'></i>
            <span>Manajemen Buku</span>
        </a>

        @if ($role === 'admin')
            <a href="{{ route('akun.index') }}"
                class="flex items-center space-x-3 p-3 rounded-full transition-all
            {{ Request::routeIs('akun.*') ? 'bg-emerald-700 text-white' : 'text-emerald-200 hover:bg-emerald-700 hover:text-white' }}">
                <i class='bx bx-group text-xl'></i>
                <span>Akun & User</span>
            </a>
        @endif

        @if ($role === 'admin')
            <a href="{{ route('aktivitas.index') }}"
                class="flex items-center space-x-3 p-3 rounded-full transition-all
            {{ Request::routeIs('aktivitas.*') ? 'bg-emerald-700 text-white' : 'text-emerald-200 hover:bg-emerald-700 hover:text-white' }}">
                <i class='bx bx-history text-xl'></i>
                <span>Log Aktivitas</span>
            </a>
        @endif


        @if ($role === 'petugas')
            <a href="{{ route('peminjaman.index') }}"
                class="flex items-center space-x-3 p-3 rounded-full transition-all
            {{ Request::routeIs('peminjaman.*') ? 'bg-emerald-700 text-white' : 'text-emerald-200 hover:bg-emerald-700 hover:text-white' }}">
                <i class='bx bx-transfer text-xl'></i>
                <span>Peminjaman</span>
            </a>
        @endif
    </nav>

    <!-- BAGIAN PROFIL -->
    <div class="border-t border-emerald-700 p-4">
        <div class="flex items-center space-x-3 text-emerald-200">
            <a href="{{ route('profile.index') }}" class="flex items-center space-x-3 text-emerald-200">
                <div class="w-10 h-10 bg-emerald-600 rounded-full flex items-center justify-center">
                    <i class='bx bx-user text-white'></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-white">{{ Auth::user()->nama ?? 'Administrator' }}</p>
                    <p class="text-sm text-emerald-300">{{ Auth::user()->role ?? 'Super Admin' }}</p>
                </div>
            </a>
            <a href="#" id="btnLogout" class="text-emerald-300 hover:text-white">
                <i class='bx bx-log-out text-xl'></i> Logout
            </a>

            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="hidden">
                @csrf
            </form>

        </div>
    </div>
</aside>

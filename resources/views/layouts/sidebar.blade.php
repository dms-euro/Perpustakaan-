<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-emerald-800 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="flex items-center justify-between p-4 border-b border-emerald-700">
        <div class="flex items-center space-x-2">
            <i class='bx bx-book-open text-2xl text-emerald-300'></i>
            <span class="text-xl font-bold text-white">Admin Panel</span>
        </div>
        <button id="close-sidebar" class="lg:hidden text-emerald-300 hover:text-white">
            <i class='bx bx-x text-2xl'></i>
        </button>
    </div>

    <nav class="p-4 space-y-2 overflow-y-auto h-[calc(100vh-150px)]">

        <a href="{{ route('dashboard.index') }}"
            class="flex items-center space-x-3 p-3 rounded-lg transition-all
    {{ Request::routeIs('dashboard.*') ? 'bg-emerald-700 text-white' : 'text-emerald-200 hover:bg-emerald-700 hover:text-white' }}">
            <i class='bx bx-home text-xl'></i>
            <span>Dashboard</span>
        </a>


        <!-- Buku -->
        <a href="{{ route('buku.index') }}"
            class="flex items-center space-x-3 p-3 rounded-lg transition-all
        {{ Request::routeIs('buku.*') ? 'bg-emerald-700 text-white' : 'text-emerald-200 hover:bg-emerald-700 hover:text-white' }}">
            <i class='bx bx-book text-xl'></i>
            <span>Manajemen Buku</span>
        </a>

        <!-- Anggota -->
        <a href="#"
            class="flex items-center space-x-3 p-3 rounded-lg transition-all
        {{ Request::routeIs('anggota.*') ? 'bg-emerald-700 text-white' : 'text-emerald-200 hover:bg-emerald-700 hover:text-white' }}">
            <i class='bx bx-group text-xl'></i>
            <span>Manajemen Anggota</span>
        </a>

        <!-- Peminjaman -->
        <a href="#"
            class="flex items-center space-x-3 p-3 rounded-lg transition-all
        {{ Request::routeIs('peminjaman.*') ? 'bg-emerald-700 text-white' : 'text-emerald-200 hover:bg-emerald-700 hover:text-white' }}">
            <i class='bx bx-transfer text-xl'></i>
            <span>Peminjaman</span>
        </a>

        <!-- Laporan -->
        <a href="#"
            class="flex items-center space-x-3 p-3 rounded-lg transition-all
        {{ Request::routeIs('laporan.*') ? 'bg-emerald-700 text-white' : 'text-emerald-200 hover:bg-emerald-700 hover:text-white' }}">
            <i class='bx bx-chart text-xl'></i>
            <span>Laporan</span>
        </a>

        <!-- Pengaturan -->
        <a href="#"
            class="flex items-center space-x-3 p-3 rounded-lg transition-all
        {{ Request::routeIs('pengaturan.*') ? 'bg-emerald-700 text-white' : 'text-emerald-200 hover:bg-emerald-700 hover:text-white' }}">
            <i class='bx bx-cog text-xl'></i>
            <span>Pengaturan</span>
        </a>

    </nav>


    <!-- User Section -->
    <div class="absolute bottom-0 w-full border-t border-emerald-700 p-4">
        <div class="flex items-center space-x-3 text-emerald-200">
            <div class="w-10 h-10 bg-emerald-600 rounded-full flex items-center justify-center">
                <i class='bx bx-user text-white'></i>
            </div>
            <div class="flex-1">
                <p class="font-medium text-white">{{ Auth::user()->nama ?? 'Administrator' }}</p>
                <p class="text-sm text-emerald-300">{{ Auth::user()->role ?? 'Super Admin' }}</p>
            </div>
            <a href="{{ route('auth.logout') }}" id="logout-btn" class="text-emerald-300 hover:text-white">
                <i class='bx bx-log-out text-xl'></i>
            </a>
        </div>
    </div>
</aside>

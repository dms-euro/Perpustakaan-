<header class="sticky top-0 z-50 bg-white shadow-sm">
    <nav class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class='bx bx-book-open text-3xl text-emerald-600'></i>
                <span class="text-xl font-bold text-emerald-800">Perpustakaan Hijau</span>
            </div>

            <!-- Desktop Navigation -->
            <div class="md:flex items-center space-x-8">
                <a href="#" class="text-emerald-700 hover:text-emerald-500 font-medium">Beranda</a>
                <a href="#" class="text-gray-600 hover:text-emerald-500 font-medium">Koleksi</a>
                <a href="#" class="text-gray-600 hover:text-emerald-500 font-medium">Layanan</a>
                <a href="#" class="text-gray-600 hover:text-emerald-500 font-medium">Tentang</a>
                <a href="#" class="text-gray-600 hover:text-emerald-500 font-medium">Kontak</a>
            </div>

            <!-- Auth Buttons -->
            <div class="md:flex items-center space-x-4">
                <a href="{{ route('login') }}"
                    class="px-4 py-2 text-emerald-700 font-medium hover:text-emerald-500">Masuk</a>
                <button
                    class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">Daftar</button>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden text-emerald-700">
                <i class='bx bx-menu text-2xl'></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4">
            <a href="#" class="block py-2 text-emerald-700 font-medium">Beranda</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-emerald-500">Koleksi</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-emerald-500">Layanan</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-emerald-500">Tentang</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-emerald-500">Kontak</a>
            <div class="flex space-x-4 mt-4">
                <button
                    class="flex-1 py-2 text-emerald-700 font-medium border border-emerald-700 rounded-lg">Masuk</button>
                <button class="flex-1 py-2 bg-emerald-600 text-white rounded-lg">Daftar</button>
            </div>
        </div>
    </nav>
</header>

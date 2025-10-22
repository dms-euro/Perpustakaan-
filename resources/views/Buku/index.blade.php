<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Buku - Perpustakaan Modern</title>
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
    <style>
        .book-card {
            transition: all 0.3s ease;
        }
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .category-filter {
            transition: all 0.2s ease;
        }
        .category-filter.active {
            background-color: #059669;
            color: white;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-emerald-50 font-sans">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <nav class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <i class='bx bx-book-open text-3xl text-emerald-600'></i>
                    <span class="text-xl font-bold text-emerald-800">Perpustakaan Hijau</span>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.html" class="text-gray-600 hover:text-emerald-500 font-medium">Beranda</a>
                    <a href="koleksi.html" class="text-emerald-700 hover:text-emerald-500 font-medium">Koleksi</a>
                    <a href="#" class="text-gray-600 hover:text-emerald-500 font-medium">Layanan</a>
                    <a href="#" class="text-gray-600 hover:text-emerald-500 font-medium">Tentang</a>
                    <a href="#" class="text-gray-600 hover:text-emerald-500 font-medium">Kontak</a>
                </div>

                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex items-center space-x-2 text-emerald-700">
                        <i class='bx bx-user-circle text-2xl'></i>
                        <span class="font-medium">Hai, Pembaca!</span>
                    </div>
                    <button class="p-2 text-emerald-700 hover:bg-emerald-50 rounded-lg transition-colors">
                        <i class='bx bx-bell text-xl'></i>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <section class="mb-12 text-center" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-emerald-900 mb-4">Koleksi Buku Perpustakaan</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Jelajahi ribuan buku dari berbagai genre dan temukan bacaan favorit Anda</p>
        </section>

        <!-- Search and Filter Section -->
        <section class="mb-8" data-aos="fade-up">
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <div class="flex flex-col lg:flex-row gap-6">
                    <!-- Search Bar -->
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" id="search-input" placeholder="Cari judul buku, penulis, atau kategori..."
                                class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                            <i class='bx bx-search absolute left-4 top-3 text-xl text-gray-400'></i>
                            <button class="absolute right-3 top-2 px-4 py-1 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                                Cari
                            </button>
                        </div>
                    </div>

                    <!-- Filter Buttons -->
                    <div class="flex items-center space-x-4">
                        <button id="filter-toggle" class="flex items-center space-x-2 px-4 py-2 border border-emerald-600 text-emerald-700 rounded-lg hover:bg-emerald-50 transition-colors">
                            <i class='bx bx-filter-alt'></i>
                            <span>Filter</span>
                        </button>
                        <button id="sort-toggle" class="flex items-center space-x-2 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            <i class='bx bx-sort'></i>
                            <span>Urutkan</span>
                        </button>
                    </div>
                </div>

                <!-- Advanced Filters -->
                <div id="advanced-filters" class="hidden mt-6 pt-6 border-t border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option>Semua Kategori</option>
                                <option>Sains & Teknologi</option>
                                <option>Sastra</option>
                                <option>Bisnis & Ekonomi</option>
                                <option>Sejarah</option>
                                <option>Filsafat</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tahun Terbit</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option>Semua Tahun</option>
                                <option>2020 - 2024</option>
                                <option>2010 - 2019</option>
                                <option>2000 - 2009</option>
                                <option>Sebelum 2000</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Format</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option>Semua Format</option>
                                <option>Buku Fisik</option>
                                <option>E-Book</option>
                                <option>Audiobook</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option>Semua Status</option>
                                <option>Tersedia</option>
                                <option>Dipinjam</option>
                                <option>Dalam Proses</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Categories -->
        <section class="mb-8" data-aos="fade-up">
            <div class="flex space-x-4 overflow-x-auto pb-4 scrollbar-hide">
                <button class="category-filter active px-6 py-2 bg-emerald-600 text-white rounded-full whitespace-nowrap">
                    Semua Buku
                </button>
                <button class="category-filter px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-full whitespace-nowrap hover:bg-gray-50">
                    Sains & Teknologi
                </button>
                <button class="category-filter px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-full whitespace-nowrap hover:bg-gray-50">
                    Sastra
                </button>
                <button class="category-filter px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-full whitespace-nowrap hover:bg-gray-50">
                    Bisnis & Ekonomi
                </button>
                <button class="category-filter px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-full whitespace-nowrap hover:bg-gray-50">
                    Sejarah
                </button>
                <button class="category-filter px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-full whitespace-nowrap hover:bg-gray-50">
                    Filsafat
                </button>
                <button class="category-filter px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-full whitespace-nowrap hover:bg-gray-50">
                    Kesehatan
                </button>
            </div>
        </section>

        <!-- Books Grid -->
        <section class="mb-12">
            <!-- Results Info -->
            <div class="flex justify-between items-center mb-6" data-aos="fade-up">
                <div>
                    <h2 class="text-2xl font-bold text-emerald-900">Buku Terpopuler</h2>
                    <p class="text-gray-600">Menampilkan 12 dari 5.248 buku</p>
                </div>
                <div class="flex items-center space-x-2 text-gray-600">
                    <span>Tampilkan:</span>
                    <select class="px-3 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500">
                        <option>12</option>
                        <option>24</option>
                        <option>48</option>
                    </select>
                </div>
            </div>

            <!-- Books Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Book Card 1 -->
                <div class="book-card bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80"
                             alt="Sustainable Future" class="w-full h-48 object-cover">
                        <div class="absolute top-3 right-3">
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-800 text-xs rounded-full">Tersedia</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-emerald-900 mb-2">Sustainable Future</h3>
                        <p class="text-gray-600 text-sm mb-3">Dr. Michael Green</p>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm text-gray-500">Sains & Teknologi</span>
                            <div class="flex items-center text-amber-400">
                                <i class='bx bxs-star'></i>
                                <span class="text-sm text-gray-600 ml-1">4.8</span>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-emerald-600 text-white py-2 rounded-lg hover:bg-emerald-700 transition-colors text-sm">
                                Pinjam
                            </button>
                            <button class="w-10 h-10 border border-emerald-600 text-emerald-600 rounded-lg hover:bg-emerald-50 transition-colors flex items-center justify-center">
                                <i class='bx bx-heart'></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 2 -->
                <div class="book-card bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80"
                             alt="Digital Transformation" class="w-full h-48 object-cover">
                        <div class="absolute top-3 right-3">
                            <span class="px-2 py-1 bg-amber-100 text-amber-800 text-xs rounded-full">Dipinjam</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-emerald-900 mb-2">Digital Transformation</h3>
                        <p class="text-gray-600 text-sm mb-3">Sarah Johnson</p>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm text-gray-500">Bisnis & Ekonomi</span>
                            <div class="flex items-center text-amber-400">
                                <i class='bx bxs-star'></i>
                                <span class="text-sm text-gray-600 ml-1">4.6</span>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-gray-400 text-white py-2 rounded-lg text-sm cursor-not-allowed" disabled>
                                Tidak Tersedia
                            </button>
                            <button class="w-10 h-10 border border-emerald-600 text-emerald-600 rounded-lg hover:bg-emerald-50 transition-colors flex items-center justify-center">
                                <i class='bx bx-heart'></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 3 -->
                <div class="book-card bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80"
                             alt="Mindful Living" class="w-full h-48 object-cover">
                        <div class="absolute top-3 right-3">
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-800 text-xs rounded-full">Tersedia</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-emerald-900 mb-2">Mindful Living</h3>
                        <p class="text-gray-600 text-sm mb-3">Emma Wilson</p>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm text-gray-500">Kesehatan</span>
                            <div class="flex items-center text-amber-400">
                                <i class='bx bxs-star'></i>
                                <span class="text-sm text-gray-600 ml-1">4.9</span>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-emerald-600 text-white py-2 rounded-lg hover:bg-emerald-700 transition-colors text-sm">
                                Pinjam
                            </button>
                            <button class="w-10 h-10 border border-emerald-600 text-emerald-600 rounded-lg hover:bg-emerald-50 transition-colors flex items-center justify-center">
                                <i class='bx bx-heart'></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 4 -->
                <div class="book-card bg-white rounded-2xl shadow-sm overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80"
                             alt="The Art of Programming" class="w-full h-48 object-cover">
                        <div class="absolute top-3 right-3">
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-800 text-xs rounded-full">Tersedia</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-emerald-900 mb-2">The Art of Programming</h3>
                        <p class="text-gray-600 text-sm mb-3">Robert Martin</p>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm text-gray-500">Sains & Teknologi</span>
                            <div class="flex items-center text-amber-400">
                                <i class='bx bxs-star'></i>
                                <span class="text-sm text-gray-600 ml-1">4.7</span>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-emerald-600 text-white py-2 rounded-lg hover:bg-emerald-700 transition-colors text-sm">
                                Pinjam
                            </button>
                            <button class="w-10 h-10 border border-emerald-600 text-emerald-600 rounded-lg hover:bg-emerald-50 transition-colors flex items-center justify-center">
                                <i class='bx bx-heart'></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Add more book cards as needed -->
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-8" data-aos="fade-up">
                <button class="px-6 py-3 border border-emerald-600 text-emerald-700 rounded-lg hover:bg-emerald-50 transition-colors">
                    Muat Lebih Banyak Buku
                </button>
            </div>
        </section>

        <!-- Featured Categories -->
        <section class="mb-12" data-aos="fade-up">
            <h2 class="text-2xl font-bold text-emerald-900 mb-6">Kategori Populer</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm text-center hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class='bx bx-atom text-2xl text-emerald-700'></i>
                    </div>
                    <h3 class="font-bold text-emerald-900 mb-2">Sains & Teknologi</h3>
                    <p class="text-sm text-gray-600">1,245 buku</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm text-center hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class='bx bx-book-open text-2xl text-emerald-700'></i>
                    </div>
                    <h3 class="font-bold text-emerald-900 mb-2">Sastra</h3>
                    <p class="text-sm text-gray-600">892 buku</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm text-center hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class='bx bx-trending-up text-2xl text-emerald-700'></i>
                    </div>
                    <h3 class="font-bold text-emerald-900 mb-2">Bisnis</h3>
                    <p class="text-sm text-gray-600">756 buku</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm text-center hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class='bx bx-history text-2xl text-emerald-700'></i>
                    </div>
                    <h3 class="font-bold text-emerald-900 mb-2">Sejarah</h3>
                    <p class="text-sm text-gray-600">634 buku</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-emerald-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i class='bx bx-book-open text-2xl text-emerald-300'></i>
                        <span class="text-xl font-bold">Perpustakaan Hijau</span>
                    </div>
                    <p class="text-emerald-200">Membangun masyarakat pembelajar melalui akses pengetahuan yang luas dan mudah.</p>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="index.html" class="text-emerald-200 hover:text-white">Beranda</a></li>
                        <li><a href="koleksi.html" class="text-emerald-200 hover:text-white">Koleksi</a></li>
                        <li><a href="#" class="text-emerald-200 hover:text-white">Layanan</a></li>
                        <li><a href="#" class="text-emerald-200 hover:text-white">Tentang Kami</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4">Layanan</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-emerald-200 hover:text-white">Peminjaman Buku</a></li>
                        <li><a href="#" class="text-emerald-200 hover:text-white">Akses Digital</a></li>
                        <li><a href="#" class="text-emerald-200 hover:text-white">Ruang Baca</a></li>
                        <li><a href="#" class="text-emerald-200 hover:text-white">Program Literasi</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4">Kontak</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class='bx bx-map mr-2 text-emerald-300'></i>
                            <span class="text-emerald-200">Jl. Pengetahuan No. 123, Jakarta</span>
                        </li>
                        <li class="flex items-center">
                            <i class='bx bx-phone mr-2 text-emerald-300'></i>
                            <span class="text-emerald-200">(021) 1234-5678</span>
                        </li>
                        <li class="flex items-center">
                            <i class='bx bx-envelope mr-2 text-emerald-300'></i>
                            <span class="text-emerald-200">info@perpustakaanhijau.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-emerald-800 mt-8 pt-8 text-center text-emerald-300">
                <p>&copy; 2023 Perpustakaan Hijau. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Filter toggle functionality
        const filterToggle = document.getElementById('filter-toggle');
        const advancedFilters = document.getElementById('advanced-filters');

        filterToggle.addEventListener('click', function() {
            advancedFilters.classList.toggle('hidden');
        });

        // Category filter functionality
        const categoryFilters = document.querySelectorAll('.category-filter');

        categoryFilters.forEach(filter => {
            filter.addEventListener('click', function() {
                // Remove active class from all filters
                categoryFilters.forEach(f => f.classList.remove('active', 'bg-emerald-600', 'text-white'));
                categoryFilters.forEach(f => f.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-300'));

                // Add active class to clicked filter
                this.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-300');
                this.classList.add('active', 'bg-emerald-600', 'text-white');
            });
        });

        // Book borrowing functionality
        const borrowButtons = document.querySelectorAll('button:contains("Pinjam")');

        document.addEventListener('click', function(e) {
            if (e.target.textContent === 'Pinjam' || e.target.closest('button')?.textContent === 'Pinjam') {
                const bookCard = e.target.closest('.book-card');
                const bookTitle = bookCard?.querySelector('h3')?.textContent;

                if (bookTitle) {
                    Swal.fire({
                        title: 'Konfirmasi Peminjaman',
                        html: `Anda akan meminjam buku <strong>"${bookTitle}"</strong>`,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Pinjam',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#10b981'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: `Buku "${bookTitle}" berhasil dipinjam`,
                                icon: 'success',
                                confirmButtonColor: '#10b981'
                            });
                        }
                    });
                }
            }

            // Favorite button functionality
            if (e.target.closest('button')?.querySelector('.bx-heart')) {
                const heartIcon = e.target.closest('button').querySelector('.bx-heart');
                heartIcon.classList.toggle('bxs-heart');
                heartIcon.classList.toggle('bx-heart');
                heartIcon.classList.toggle('text-red-500');

                if (heartIcon.classList.contains('bxs-heart')) {
                    Swal.fire({
                        title: 'Ditambahkan ke Favorit',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            }
        });

        // Search functionality
        const searchInput = document.getElementById('search-input');
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                Swal.fire({
                    title: 'Mencari...',
                    text: `Menampilkan hasil untuk "${this.value}"`,
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    </script>
</body>
</html>

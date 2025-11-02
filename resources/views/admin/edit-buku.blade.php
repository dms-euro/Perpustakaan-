<div class="lg:ml-64">
        <!-- Top Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between p-4">
                <div class="flex items-center space-x-4">
                    <button class="lg:hidden text-emerald-700" id="open-sidebar">
                        <i class='bx bx-menu text-2xl'></i>
                    </button>
                    <div>
                        <h1 class="text-2xl font-bold text-emerald-900">Edit Buku</h1>
                        <p class="text-sm text-gray-600">Memperbarui informasi buku dalam koleksi</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Back to Books -->
                    <a href="books.html" class="px-4 py-2 border border-emerald-600 text-emerald-700 rounded-lg hover:bg-emerald-50 transition-colors font-medium flex items-center">
                        <i class='bx bx-arrow-back mr-2'></i>Kembali
                    </a>
                    <!-- Save Button -->
                    <button class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium flex items-center" id="save-book-btn">
                        <i class='bx bx-save mr-2'></i>Simpan Perubahan
                    </button>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="p-6">
            <!-- Book Information -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column - Form -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Basic Information Card -->
                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up">
                        <h3 class="text-lg font-bold text-emerald-900 mb-4 flex items-center">
                            <i class='bx bx-info-circle mr-2'></i>Informasi Dasar
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Judul Buku *</label>
                                <input type="text" id="book-title" value="Sustainable Future" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Masukkan judul buku">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Penulis *</label>
                                <input type="text" id="book-author" value="Dr. Michael Green" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Nama penulis">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">ISBN</label>
                                <input type="text" id="book-isbn" value="978-1234567890" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Nomor ISBN">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Penerbit</label>
                                <input type="text" id="book-publisher" value="Green Publishing" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Nama penerbit">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tahun Terbit</label>
                                <input type="number" id="book-year" value="2023" min="1900" max="2030" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Tahun terbit">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Edisi</label>
                                <input type="text" id="book-edition" value="1st Edition" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Edisi buku">
                            </div>
                        </div>
                    </div>

                    <!-- Category & Classification Card -->
                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="text-lg font-bold text-emerald-900 mb-4 flex items-center">
                            <i class='bx bx-category mr-2'></i>Kategori & Klasifikasi
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Utama *</label>
                                <select id="book-category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                    <option value="">Pilih Kategori</option>
                                    <option value="sains-teknologi" selected>Sains & Teknologi</option>
                                    <option value="sastra">Sastra</option>
                                    <option value="bisnis-ekonomi">Bisnis & Ekonomi</option>
                                    <option value="sejarah">Sejarah</option>
                                    <option value="filsafat">Filsafat</option>
                                    <option value="kesehatan">Kesehatan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Sub Kategori</label>
                                <select id="book-subcategory" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                    <option value="">Pilih Sub Kategori</option>
                                    <option value="lingkungan" selected>Lingkungan & Ekologi</option>
                                    <option value="teknologi">Teknologi Hijau</option>
                                    <option value="energi">Energi Terbarukan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Bahasa</label>
                                <select id="book-language" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                    <option value="indonesia" selected>Indonesia</option>
                                    <option value="inggris">English</option>
                                    <option value="arab">Arabic</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tingkat Kesulitan</label>
                                <select id="book-difficulty" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                    <option value="pemula">Pemula</option>
                                    <option value="menengah" selected>Menengah</option>
                                    <option value="mahir">Mahir</option>
                                    <option value="akademik">Akademik</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Description & Details Card -->
                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="text-lg font-bold text-emerald-900 mb-4 flex items-center">
                            <i class='bx bx-file mr-2'></i>Deskripsi & Detail
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Sinopsis</label>
                                <textarea id="book-synopsis" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Tulis sinopsis buku...">Buku ini membahas tentang masa depan berkelanjutan dengan pendekatan teknologi hijau dan solusi inovatif untuk tantangan lingkungan global. Dr. Michael Green menyajikan pandangan komprehensif tentang bagaimana kita dapat membangun dunia yang lebih baik untuk generasi mendatang.</textarea>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Halaman</label>
                                    <input type="number" id="book-pages" value="320" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Jumlah halaman">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Berat (gram)</label>
                                    <input type="number" id="book-weight" value="450" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Berat buku">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Dimensi (cm)</label>
                                    <input type="text" id="book-dimensions" value="23.5 x 15.5 x 2.5" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="P x L x T">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Sidebar -->
                <div class="space-y-6">
                    <!-- Book Cover & Status -->
                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-left">
                        <h3 class="text-lg font-bold text-emerald-900 mb-4">Sampul Buku</h3>
                        <div class="text-center">
                            <div class="w-32 h-40 bg-emerald-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <i class='bx bx-book text-4xl text-emerald-600'></i>
                            </div>
                            <button class="w-full px-4 py-2 border border-emerald-600 text-emerald-700 rounded-lg hover:bg-emerald-50 transition-colors text-sm">
                                <i class='bx bx-upload mr-2'></i>Unggah Sampul Baru
                            </button>
                            <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG. Maks: 2MB</p>
                        </div>
                    </div>

                    <!-- Inventory & Location -->
                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-left" data-aos-delay="100">
                        <h3 class="text-lg font-bold text-emerald-900 mb-4">Inventori & Lokasi</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Total Eksemplar *</label>
                                <input type="number" id="book-copies" value="5" min="1" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Eksemplar Tersedia</label>
                                <input type="number" id="book-available" value="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi Rak *</label>
                                <input type="text" id="book-location" value="RAK-A-12" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Kode lokasi">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status Buku</label>
                                <select id="book-status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                    <option value="available" selected>Tersedia</option>
                                    <option value="borrowed">Dipinjam</option>
                                    <option value="maintenance">Dalam Perbaikan</option>
                                    <option value="lost">Hilang</option>
                                    <option value="reference">Referensi</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-left" data-aos-delay="200">
                        <h3 class="text-lg font-bold text-emerald-900 mb-4">Informasi Tambahan</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">ID Buku</span>
                                <span class="font-medium text-emerald-900">BK-2023-001</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Dibuat Pada</span>
                                <span class="font-medium">15 Jan 2023</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Diupdate Pada</span>
                                <span class="font-medium">20 Des 2023</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Total Peminjaman</span>
                                <span class="font-medium">24 kali</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Rating</span>
                                <div class="flex items-center text-amber-400">
                                    <i class='bx bxs-star'></i>
                                    <span class="text-gray-600 ml-1">4.8/5</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white rounded-2xl shadow-sm p-6" data-aos="fade-left" data-aos-delay="300">
                        <h3 class="text-lg font-bold text-emerald-900 mb-4">Aksi Cepat</h3>
                        <div class="space-y-2">
                            <button class="w-full flex items-center space-x-3 p-3 text-left bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors">
                                <i class='bx bx-show text-blue-600 text-xl'></i>
                                <span class="font-medium text-blue-900">Pratinjau Buku</span>
                            </button>
                            <button class="w-full flex items-center space-x-3 p-3 text-left bg-amber-50 hover:bg-amber-100 rounded-lg transition-colors">
                                <i class='bx bx-history text-amber-600 text-xl'></i>
                                <span class="font-medium text-amber-900">Riwayat Peminjaman</span>
                            </button>
                            <button class="w-full flex items-center space-x-3 p-3 text-left bg-red-50 hover:bg-red-100 rounded-lg transition-colors" id="delete-book-btn">
                                <i class='bx bx-trash text-red-600 text-xl'></i>
                                <span class="font-medium text-red-900">Hapus Buku</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex justify-end space-x-4">
                <a href="books.html" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium">
                    Batal
                </a>
                <button class="px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium flex items-center" id="update-book-btn">
                    <i class='bx bx-check-circle mr-2'></i>Perbarui Buku
                </button>
            </div>
        </main>
    </div>

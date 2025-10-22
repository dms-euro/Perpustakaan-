@extends('layouts.app')
@section('content')
    <div class="bg-emerald-50 font-sans min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-6xl bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row min-h-[600px]">
            <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center relative overflow-hidden">
                <div data-aos="flip-left" class="relative">
                    <!-- Register Form -->
                    <div id="register-form" class="form-section inactive-form">
                        <div class="text-center mb-4">
                            <h1 class="text-3xl font-bold text-emerald-900">Daftar Akun Baru</h1>
                            <p class="text-gray-600 mt-2">Bergabung dengan komunitas pembaca kami</p>
                        </div>

                        <form id="registerForm" class="space-y-6">
                            <div>
                                <div>
                                    <label for="register-firstname"
                                        class="block text-sm font-medium text-gray-700 mb-2">Nama
                                        Depan</label>
                                    <input type="text" id="register-firstname" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                        placeholder="Nama Lengkap Anda">
                                </div>
                            </div>

                            <div>
                                <label for="register-email"
                                    class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <div class="relative">
                                    <input type="email" id="register-email" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                        placeholder="nama@email.com">
                                    <i class='bx bx-envelope absolute right-3 top-3 text-gray-400'></i>
                                </div>
                            </div>

                            <div>
                                <label for="register-password"
                                    class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <div class="relative">
                                    <input type="password" id="register-password" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                        placeholder="Minimal 8 karakter">
                                    <i class='bx bx-lock-alt absolute right-3 top-3 text-gray-400'></i>
                                </div>
                            </div>

                            <div>
                                <label for="register-confirm-password"
                                    class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                                <div class="relative">
                                    <input type="password" id="register-confirm-password" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                        placeholder="Ketik ulang password">
                                    <i class='bx bx-lock-alt absolute right-3 top-3 text-gray-400'></i>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="agree-terms" required
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <label for="agree-terms" class="ml-2 text-sm text-gray-700">
                                    Saya setuju dengan <a href="#"
                                        class="text-emerald-600 hover:text-emerald-500">Syarat
                                        &
                                        Ketentuan</a> dan <a href="#"
                                        class="text-emerald-600 hover:text-emerald-500">Kebijakan Privasi</a>
                                </label>
                            </div>

                            <button type="submit"
                                class="w-full bg-emerald-600 text-white py-3 rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                                Daftar Sekarang
                            </button>

                            <div class="text-center">
                                <p class="text-gray-600">Sudah punya akun?
                                    <a href="{{ route('auth.index') }}" type="button"
                                        class="text-emerald-600 hover:text-emerald-500 font-medium">Masuk di sini</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div
                class="md:w-1/2 bg-gradient-to-br from-emerald-100 to-emerald-200 p-8 flex flex-col justify-center relative overflow-hidden">
                <!-- Background Elements -->
                <div class="absolute -top-20 -right-20 w-40 h-40 bg-emerald-300 rounded-full opacity-20"></div>
                <div class="absolute -bottom-16 -left-16 w-32 h-32 bg-emerald-400 rounded-full opacity-30"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-emerald-200 rounded-full opacity-10">
                </div>

                <!-- Content -->
                <div class="relative z-10 text-center" data-aos="fade-up">
                    <div class="mb-8">
                        <i class='bx bx-book-open text-6xl text-emerald-700 mb-4'></i>
                        <h2 class="text-3xl font-bold text-emerald-900 mb-2">Selamat Datang Kembali</h2>
                        <p class="text-emerald-700">Masuk ke akun Anda untuk mengakses koleksi perpustakaan digital kami</p>
                    </div>

                    <div class="space-y-6 mt-8">
                        <div class="flex items-center justify-center space-x-4 bg-white/70 backdrop-blur-sm p-4 rounded-xl">
                            <i class='bx bx-book-reader text-3xl text-emerald-600'></i>
                            <div class="text-left">
                                <h4 class="font-bold text-emerald-900">50,000+ Buku</h4>
                                <p class="text-sm text-emerald-700">Koleksi lengkap berbagai genre</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-center space-x-4 bg-white/70 backdrop-blur-sm p-4 rounded-xl">
                            <i class='bx bx-time text-3xl text-emerald-600'></i>
                            <div class="text-left">
                                <h4 class="font-bold text-emerald-900">Akses 24/7</h4>
                                <p class="text-sm text-emerald-700">Baca kapan saja, di mana saja</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-center space-x-4 bg-white/70 backdrop-blur-sm p-4 rounded-xl">
                            <i class='bx bx-group text-3xl text-emerald-600'></i>
                            <div class="text-left">
                                <h4 class="font-bold text-emerald-900">Komunitas Aktif</h4>
                                <p class="text-sm text-emerald-700">Bergabung dengan pembaca lainnya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

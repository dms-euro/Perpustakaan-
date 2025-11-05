@extends('layouts.app')
@section('content')
    <div class="bg-emerald-50 font-sans min-h-screen flex items-center justify-center p-4" data-aos="flip-right">
        <div class="w-full max-w-6xl bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row min-h-[600px]">
            <div data-aos="flip-right"
                class="md:w-1/2 bg-gradient-to-br from-emerald-100 to-emerald-200 p-8 flex flex-col justify-center relative overflow-hidden">
                <div class="absolute -top-20 -right-20 w-40 h-40 bg-emerald-300 rounded-full opacity-20"></div>
                <div class="absolute -bottom-16 -left-16 w-32 h-32 bg-emerald-400 rounded-full opacity-30"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-emerald-200 rounded-full opacity-10">
                </div>
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
            <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center relative overflow-hidden">
                <div class="relative">
                    <div id="login-form" class="form-section active-form">
                        <div class="text-center mb-8">
                            <h1 class="text-3xl font-bold text-emerald-900">Masuk ke Akun</h1>
                            <p class="text-gray-600 mt-2">Masukkan kredensial Anda untuk mengakses perpustakaan</p>
                        </div>
                        <form action="{{ route('auth.login') }}" method="POST" id="loginForm" class="space-y-6">
                            @csrf
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email
                                </label>
                                <div class="relative">
                                    <input type="email" id="email" name="email" required
                                        class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 outline-none text-gray-800"
                                        placeholder="contoh@perpus.ac.id" />
                                    <i class='bx bx-envelope absolute left-3 top-3.5 text-gray-500'></i>
                                </div>
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kata Sandi
                                </label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" required
                                        class="w-full pl-11 pr-12 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 outline-none text-gray-800"
                                        placeholder="••••••••" />
                                    <i class='bx bx-lock-alt absolute left-3 top-3.5 text-gray-500'></i>
                                    <button type="button" onclick="togglePassword()"
                                        class="absolute right-3 top-3.5 text-gray-500 hover:text-emerald-600 transition">
                                        <i class='bx bx-show' id="eyeIcon"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500" />
                                    <span class="ml-2 text-gray-600">Ingat saya</span>
                                </label>
                                <a href="#" class="text-emerald-600 hover:underline font-medium">Lupa kata sandi?</a>
                            </div>
                            <button type="submit" id="loginBtn"
                                class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition duration-300 flex items-center justify-center space-x-2">
                                <span id="loginText">Masuk Sekarang</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (password.type === 'password') {
                password.type = 'text';
                eyeIcon.classList.replace('bx-show', 'bx-hide');
            } else {
                password.type = 'password';
                eyeIcon.classList.replace('bx-hide', 'bx-show');
            }
        }
    </script>
@endsection

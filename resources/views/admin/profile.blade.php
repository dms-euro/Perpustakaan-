@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-3 mb-4">
                <div class="p-3 bg-blue-500 rounded-full">
                    <i class='bx bx-user text-white text-xl'></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Pengaturan Profil</h1>
            </div>
            <p class="text-gray-600">Kelola informasi akun dan keamanan</p>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4 flex items-center gap-3">
            <i class='bx bx-check-circle text-green-500 text-xl'></i>
            <span class="text-green-800 font-medium">{{ session('success') }}</span>
        </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            {{-- Profile Section --}}
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Informasi Profil</h2>
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                        Admin
                    </span>
                </div>

                <form action=" " method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Profile Photo --}}
                    <div class="flex items-center gap-6">
                        <div class="relative">
                            @if(auth()->user()->foto_profil)
                                <img src="{{ asset('storage/' . auth()->user()->foto_profil) }}"
                                     class="w-20 h-20 rounded-full object-cover border-2 border-gray-200"
                                     alt="Foto Profil">
                            @else
                                <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center border-2 border-gray-200">
                                    <i class='bx bx-user text-gray-400 text-2xl'></i>
                                </div>
                            @endif
                            <label for="photo-upload" class="absolute -bottom-1 -right-1 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center cursor-pointer border-2 border-white shadow-md hover:bg-blue-600 transition">
                                <i class='bx bx-camera text-white text-sm'></i>
                            </label>
                            <input type="file" id="photo-upload" name="foto_profil" class="hidden" accept="image/*">
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Klik ikon kamera untuk mengubah foto profil</p>
                            <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG, JPEG (Maks. 2MB)</p>
                        </div>
                    </div>

                    {{-- Form Fields --}}
                    <div class="grid grid-cols-1 gap-5">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama', auth()->user()->nama) }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            @error('nama')
                                <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                    <i class='bx bx-error-circle'></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            @error('email')
                                <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                    <i class='bx bx-error-circle'></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label for="telepon" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="text" id="telepon" name="telepon" value="{{ old('telepon', auth()->user()->telepon) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                placeholder="Opsional">
                            @error('telepon')
                                <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                    <i class='bx bx-error-circle'></i>{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>

            {{-- Password Section --}}
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Keamanan Akun</h2>

                <form action="" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-5">
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Password Saat Ini</label>
                            <input type="password" id="current_password" name="current_password" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                placeholder="Masukkan password saat ini">
                            @error('current_password')
                                <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                    <i class='bx bx-error-circle'></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                                <input type="password" id="password" name="password" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    placeholder="Password baru">
                                @error('password')
                                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                        <i class='bx bx-error-circle'></i>{{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    placeholder="Ulangi password baru">
                            </div>
                        </div>
                    </div>

                    {{-- Password Requirements --}}
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <h4 class="font-medium text-blue-900 mb-3 flex items-center gap-2">
                            <i class='bx bx-info-circle text-blue-500'></i>
                            Tips Password Aman
                        </h4>
                        <ul class="text-sm text-blue-800 space-y-2">
                            <li class="flex items-center gap-2">
                                <i class='bx bx-check text-blue-500'></i>
                                Minimal 8 karakter
                            </li>
                            <li class="flex items-center gap-2">
                                <i class='bx bx-check text-blue-500'></i>
                                Kombinasi huruf besar dan kecil
                            </li>
                            <li class="flex items-center gap-2">
                                <i class='bx bx-check text-blue-500'></i>
                                Sertakan angka dan simbol
                            </li>
                        </ul>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-3 pt-4">
                        <button type="button" onclick="window.history.back()"
                            class="flex-1 px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-medium flex items-center justify-center gap-2">
                            <i class='bx bx-arrow-back'></i>
                            Kembali
                        </button>
                        <button type="submit" form="profile-form"
                            class="flex-1 px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-medium flex items-center justify-center gap-2">
                            <i class='bx bx-save'></i>
                            Simpan Profil
                        </button>
                        <button type="submit"
                            class="flex-1 px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition font-medium flex items-center justify-center gap-2">
                            <i class='bx bx-lock-alt'></i>
                            Ganti Password
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Account Info --}}
        <div class="mt-6 text-center text-sm text-gray-500">
            <p>Akun dibuat pada {{ auth()->user()->created_at->format('d F Y') }}</p>
            <p class="mt-1">Terakhir diperbarui {{ auth()->user()->updated_at->format('d M Y H:i') }}</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Photo upload preview
        const photoUpload = document.getElementById('photo-upload');
        if (photoUpload) {
            photoUpload.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Check file size (2MB max)
                    if (file.size > 2 * 1024 * 1024) {
                        alert('Ukuran file maksimal 2MB');
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.querySelector('img[alt="Foto Profil"]');
                        if (img) {
                            img.src = e.target.result;
                        } else {
                            const div = document.querySelector('.bg-gray-200');
                            const newImg = document.createElement('img');
                            newImg.src = e.target.result;
                            newImg.className = 'w-20 h-20 rounded-full object-cover border-2 border-gray-200';
                            newImg.alt = 'Foto Profil';
                            div.parentElement.replaceChild(newImg, div);
                        }
                    }
                    reader.readAsDataURL(file);
                }
            });
        }

        // Form submission
        const profileForm = document.querySelector('form[enctype="multipart/form-data"]');
        const passwordForm = document.querySelector('form:not([enctype])');

        // Set form IDs for button targeting
        profileForm.id = 'profile-form';
        passwordForm.id = 'password-form';
    });
</script>

<style>
    input:focus, select:focus, textarea:focus {
        outline: none;
        ring: 2px;
    }

    .transition {
        transition: all 0.2s ease-in-out;
    }
</style>
@endsection

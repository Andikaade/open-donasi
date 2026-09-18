<x-layouts.auth>
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-12 bg-slate-50 relative">

        <!-- Tombol Kembali ke Beranda (Pojok Kanan Atas) -->
        <a href="{{ url('/') }}"
           class="absolute top-5 right-5 z-50 inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 bg-white/90 hover:bg-white hover:text-emerald-600 shadow-sm border border-slate-200/80 backdrop-blur-md transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Kembali ke Beranda</span>
        </a>

        <!-- Sisi Kiri: Branding / Banner (Hanya muncul di layar besar) -->
        <div class="hidden lg:flex lg:col-span-6 bg-gradient-to-br from-emerald-700 via-emerald-800 to-slate-900 p-12 text-white flex-col justify-between relative overflow-hidden">
            <!-- Background Decorative Elements -->
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-emerald-400/10 rounded-full blur-3xl pointer-events-none"></div>

            <!-- Logo & Brand Header -->
            <div class="relative z-10 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-md flex items-center justify-center border border-white/20 shadow-inner">
                    <span class="font-bold text-xl text-emerald-400">RT</span>
                </div>
                <div>
                    <h2 class="font-bold text-lg tracking-wide">Rumah Tahfiz Amanah</h2>
                    <p class="text-xs text-emerald-200/80">Portal Administrasi Donasi</p>
                </div>
            </div>

            <!-- Hero Message -->
            <div class="relative z-10 space-y-4 my-auto">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-xs font-semibold backdrop-blur-sm">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Sistem Manajemen Terpadu
                </div>
                <h1 class="text-3xl lg:text-4xl font-extrabold leading-tight text-white">
                    Kelola Program & Penyaluran Donasi Lebih Transparan.
                </h1>
                <p class="text-sm text-emerald-100/70 leading-relaxed max-w-md">
                    Masuk ke panel administrator untuk memantau transaksi masuk, verifikasi pencairan, dan pengelolaan program donasi santri secara aman.
                </p>
            </div>

            <!-- Footer / Copyright -->
            <div class="relative z-10 text-xs text-emerald-200/60">
                &copy; {{ date('Y') }} Rumah Tahfiz Amanah. All rights reserved.
            </div>
        </div>

        <!-- Sisi Kanan: Form Login -->
        <div class="lg:col-span-6 flex items-center justify-center p-6 sm:p-12 lg:p-16 bg-white">
            <div class="w-full max-w-md space-y-8">

                <!-- Mobile Logo Header (Hanya di HP) -->
                <div class="lg:hidden text-center mb-6">
                    <div class="inline-flex w-12 h-12 rounded-xl bg-emerald-600 text-white items-center justify-center font-bold text-xl mb-3 shadow-lg shadow-emerald-600/30">
                        RT
                    </div>
                    <h2 class="text-xl font-bold text-slate-900">Rumah Tahfiz Amanah</h2>
                    <p class="text-xs text-slate-500">Panel Administrasi</p>
                </div>

                <!-- Form Title -->
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Selamat Datang Kembali</h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Silakan masukkan kredensial akun Anda untuk mengakses sistem.</p>
                </div>

                <!-- Session Status Notification -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Form Login -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                placeholder="admin@rumahtahfiz.or.id"
                                class="w-full pl-10 pr-4 py-3 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all shadow-sm @error('email') border-red-500 @enderror">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Kata Sandi</label>
                            @if (Route::has('password.request'))
                                <a class="text-xs font-semibold text-emerald-600 hover:text-emerald-700 hover:underline transition-colors" href="{{ route('password.request') }}">
                                    Lupa Kata Sandi?
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                placeholder="••••••••"
                                class="w-full pl-10 pr-4 py-3 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all shadow-sm @error('password') border-red-500 @enderror">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between pt-1">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                            <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 transition-all">
                            <span class="ms-2 text-xs font-medium text-slate-600">Ingat saya di perangkat ini</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" class="w-full py-3.5 px-4 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-bold rounded-xl shadow-lg shadow-emerald-600/25 hover:shadow-emerald-600/35 transition-all text-sm flex items-center justify-center gap-2">
                            <span>Masuk ke Dashboard</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</x-layouts.auth>

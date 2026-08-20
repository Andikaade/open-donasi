<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Tahfiz - Infaq & Donasi Transparan</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- AOS (Animate On Scroll) Library CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .hero-gradient {
            background: radial-gradient(135.8% 120.3% at 50% 10%, #065f46 0%, #022c22 100%);
        }
        .glow-effect {
            box-shadow: 0 0 50px -12px rgba(16, 185, 129, 0.35);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased overflow-x-hidden">

    <!-- 1. NAVBAR -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <a href="#" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-md group-hover:scale-105 transition-transform duration-300">
                        RT
                    </div>
                    <span class="text-xl font-extrabold bg-gradient-to-r from-emerald-700 to-teal-600 bg-clip-text text-transparent">
                        Rumah Tahfiz
                    </span>
                </a>

                <div class="hidden md:flex items-center space-x-8 text-sm font-semibold text-slate-600">
                    <a href="#beranda" class="hover:text-emerald-600 transition-colors">Beranda</a>
                    <a href="#pengumuman" class="hover:text-emerald-600 transition-colors">Pengumuman</a>
                    <a href="#legalitas" class="hover:text-emerald-600 transition-colors">Profil & Legalitas</a>
                    <a href="#program" class="hover:text-emerald-600 transition-colors">Program Donasi</a>
                    <a href="#transparansi" class="hover:text-emerald-600 transition-colors">Transparansi Keuangan</a>
                    <a href="#artikel" class="hover:text-emerald-600 transition-colors">Kabar Santri</a>
                </div>

                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="px-5 py-2.5 bg-emerald-600 text-white rounded-full text-sm font-semibold shadow-lg shadow-emerald-600/30 hover:bg-emerald-700 hover:shadow-emerald-600/50 transition-all duration-300">
                                Dashboard Admin
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-emerald-600 px-3 py-2 transition-colors">
                                Masuk Admin
                            </a>
                            <a href="#program" class="px-5 py-2.5 bg-emerald-600 text-white rounded-full text-sm font-semibold shadow-lg shadow-emerald-600/30 hover:bg-emerald-700 hover:shadow-emerald-600/50 transition-all duration-300">
                                Donasi Sekarang
                            </a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- 2. HERO SECTION -->
    <section id="beranda" class="hero-gradient text-white py-20 lg:py-28 relative overflow-hidden">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-teal-400/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-12 gap-12 items-center relative z-10">
            <div class="lg:col-span-7" data-aos="fade-right" data-aos-duration="1000">
                <div class="inline-flex items-center gap-2 bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-xs px-3.5 py-1.5 rounded-full font-medium mb-6">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                    Program MBG Mandiri & Operasional Santri
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight">
                    Bantu Generasi <span class="bg-gradient-to-r from-emerald-300 to-amber-300 bg-clip-text text-transparent">Penghafal Al-Qur'an</span> Tumbuh Sehat & Cerdas
                </h1>
                <p class="mt-6 text-emerald-100/80 text-lg leading-relaxed max-w-2xl">
                    Dukung pemenuhan Makan Bergizi Gratis (MBG) mandiri, gaji guru, dan fasilitas belajar santri Rumah Tahfiz secara akuntabel dan transparan.
                </p>
                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="#program" class="px-7 py-3.5 bg-amber-400 text-slate-900 font-bold rounded-xl hover:bg-amber-300 shadow-xl shadow-amber-400/20 transition-all duration-300">
                        Pilih Program Donasi
                    </a>
                    <a href="#transparansi" class="px-7 py-3.5 bg-white/10 backdrop-blur-md border border-white/20 text-white font-semibold rounded-xl hover:bg-white/20 transition-all duration-300">
                        Lihat Transparansi Dana
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-emerald-400 to-amber-300 rounded-3xl blur opacity-30 group-hover:opacity-60 transition duration-500"></div>
                    <div class="relative bg-slate-900/50 border border-white/10 p-3 rounded-3xl backdrop-blur-sm glow-effect">
                        <img src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?q=80&w=800&auto=format&fit=crop"
                             alt="Santri Rumah Tahfiz"
                             class="rounded-2xl object-cover w-full h-80 lg:h-96 transform group-hover:scale-[1.01] transition-transform duration-500">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. SECTION PENGUMUMAN / ARTIKEL UTAMA (FEATURED ANNOUNCEMENT) -->
    <section id="pengumuman" class="py-12 bg-slate-100 relative -mt-8 z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-amber-500 via-emerald-700 to-emerald-900 rounded-3xl p-1 shadow-2xl overflow-hidden" data-aos="zoom-in" data-aos-duration="800">
                <div class="bg-slate-900/90 backdrop-blur-md rounded-[22px] p-6 sm:p-10 text-white grid lg:grid-cols-12 gap-8 items-center">

                    <div class="lg:col-span-8 space-y-4">
                        <div class="flex flex-wrap items-center gap-3">
                            <span class="bg-amber-400 text-slate-900 text-xs font-black px-3.5 py-1.5 rounded-full uppercase tracking-wider flex items-center gap-1.5 shadow-md">
                                <span class="w-2 h-2 rounded-full bg-slate-900 animate-ping"></span>
                                Pengumuman Penting
                            </span>
                            <span class="text-xs text-emerald-300 font-medium">Diperbarui: 16 Februari 2026</span>
                        </div>

                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white leading-tight">
                            Pendaftaran Santri Baru Rumah Tahfiz Angkatan 2026 Resmikan Dibuka!
                        </h2>

                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                            Kesempatan emas bagi putra-putri untuk menghafal Al-Qur'an dengan fasilitas beasiswa penuh, bimbingan pengajar bersanad, serta dukungan asupan harian gratis (Program MBG Mandiri).
                        </p>

                        <div class="pt-2 flex flex-wrap gap-4 text-xs sm:text-sm text-emerald-200">
                            <div class="flex items-center gap-2 bg-white/10 px-3.5 py-2 rounded-lg border border-white/10">
                                📅 <strong>Kuota:</strong> 30 Santri
                            </div>
                            <div class="flex items-center gap-2 bg-white/10 px-3.5 py-2 rounded-lg border border-white/10">
                                📍 <strong>Batas Akhir:</strong> 15 Maret 2026
                            </div>
                            <div class="flex items-center gap-2 bg-white/10 px-3.5 py-2 rounded-lg border border-white/10">
                                🎁 <strong>Beasiswa:</strong> Gratis 100%
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3 justify-center items-stretch">
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20ingin%20mendaftar%20Santri%20Baru"
                           target="_blank"
                           class="w-full text-center py-4 px-6 bg-amber-400 text-slate-900 font-extrabold rounded-xl hover:bg-amber-300 shadow-lg shadow-amber-400/20 transition-all duration-300 transform hover:-translate-y-0.5">
                            Daftar Pelajar Sekarang
                        </a>
                        <a href="#artikel"
                           class="w-full text-center py-3.5 px-6 bg-white/10 border border-white/20 text-white font-semibold rounded-xl hover:bg-white/20 transition-all duration-300">
                            Brosur & Syarat Lengkap
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- 4. SECTION LEGALITAS & TRUST -->
    <section id="legalitas" class="py-16 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="bg-emerald-50/60 border border-emerald-100 p-8 rounded-2xl" data-aos="fade-up">
                    <div class="w-12 h-12 bg-emerald-600 text-white rounded-xl flex items-center justify-center font-bold text-xl mb-4">
                        📜
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Amanah Wasiat Almarhum</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Pendirian Rumah Tahfiz ini berlandaskan amanah dan wasiat tanah wakaf almarhum untuk dijadikan pusat pendidikan hafalan Al-Qur'an gratis bagi anak-anak dan santri kurang mampu.
                    </p>
                </div>

                <div class="bg-slate-50 border border-slate-200/80 p-8 rounded-2xl" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 bg-teal-600 text-white rounded-xl flex items-center justify-center font-bold text-xl mb-4">
                        🏛️
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Izin Resmi Wali Nagari</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Pengelolaan kegiatan operasional dan penggalangan dana publik ini telah terdaftar dan mendapat rekomendasi izin resmi dari Kantor Wali Nagari setempat.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. PROGRAM DONASI UTAMA -->
    <section id="program" class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
            <span class="text-emerald-600 font-bold text-sm tracking-wider uppercase bg-emerald-50 px-3.5 py-1.5 rounded-full">Infaq Berkelanjutan</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Program Donasi Utama</h2>
            <p class="text-slate-600 mt-3 text-base">Pilih program kebaikan yang ingin Anda dukung untuk masa depan para santri.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1: MBG Mandiri -->
            <div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-200/50 overflow-hidden flex flex-col justify-between hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 group" data-aos="fade-up" data-aos-delay="100">
                <div>
                    <div class="relative overflow-hidden h-52">
                        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-emerald-600/90 backdrop-blur-md text-white text-xs font-bold px-3 py-1 rounded-full">
                            MBG Mandiri
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">
                            Dapur Tahfiz: Makan Bergizi Gratis (MBG) Santri
                        </h3>
                        <p class="text-slate-600 text-sm mt-2 line-clamp-2">
                            Penyediaan asupan makanan bergizi harian secara mandiri untuk menjaga daya tahan tubuh dan kefokusan hafalan santri.
                        </p>
                        <div class="mt-6 pt-4 border-t border-slate-100">
                            <div class="flex justify-between text-xs font-bold mb-2">
                                <span class="text-emerald-600">Terkumpul: Rp 8.500.000</span>
                                <span class="text-slate-500">56%</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-2.5 rounded-full" style="width: 56%"></div>
                            </div>
                            <div class="text-xs text-slate-400 mt-2 font-medium">Target: Rp 15.000.000</div>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <button class="w-full py-3 bg-slate-900 text-white font-semibold rounded-xl group-hover:bg-emerald-600 group-hover:shadow-lg transition-all duration-300">
                        Donasi Sekarang
                    </button>
                </div>
            </div>

            <!-- Card 2: Gaji Guru -->
            <div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-200/50 overflow-hidden flex flex-col justify-between hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 group" data-aos="fade-up" data-aos-delay="200">
                <div>
                    <div class="relative overflow-hidden h-52">
                        <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-teal-600/90 backdrop-blur-md text-white text-xs font-bold px-3 py-1 rounded-full">
                            Gaji Guru
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">
                            Insentif Guru Al-Qur'an & Ustaz Tahfiz
                        </h3>
                        <p class="text-slate-600 text-sm mt-2 line-clamp-2">
                            Dukungan honorarium dan insentif bulanan yang layak untuk pembina dan pengajar hafalan santri.
                        </p>
                        <div class="mt-6 pt-4 border-t border-slate-100">
                            <div class="flex justify-between text-xs font-bold mb-2">
                                <span class="text-emerald-600">Terkumpul: Rp 3.200.000</span>
                                <span class="text-slate-500">32%</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-2.5 rounded-full" style="width: 32%"></div>
                            </div>
                            <div class="text-xs text-slate-400 mt-2 font-medium">Target: Rp 10.000.000</div>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <button class="w-full py-3 bg-slate-900 text-white font-semibold rounded-xl group-hover:bg-emerald-600 group-hover:shadow-lg transition-all duration-300">
                        Donasi Sekarang
                    </button>
                </div>
            </div>

            <!-- Card 3: Sarana Belajar -->
            <div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-200/50 overflow-hidden flex flex-col justify-between hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 group" data-aos="fade-up" data-aos-delay="300">
                <div>
                    <div class="relative overflow-hidden h-52">
                        <img src="https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-amber-600/90 backdrop-blur-md text-white text-xs font-bold px-3 py-1 rounded-full">
                            Perbaikan Sarana
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">
                            Renovasi Ruang Belajar & Asrama Santri
                        </h3>
                        <p class="text-slate-600 text-sm mt-2 line-clamp-2">
                            Perbaikan fasilitas tempat tinggal, karpet sholat, dan meja Al-Qur'an agar lingkungan belajar lebih nyaman.
                        </p>
                        <div class="mt-6 pt-4 border-t border-slate-100">
                            <div class="flex justify-between text-xs font-bold mb-2">
                                <span class="text-emerald-600">Terkumpul: Rp 12.000.000</span>
                                <span class="text-slate-500">60%</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-2.5 rounded-full" style="width: 60%"></div>
                            </div>
                            <div class="text-xs text-slate-400 mt-2 font-medium">Target: Rp 20.000.000</div>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <button class="w-full py-3 bg-slate-900 text-white font-semibold rounded-xl group-hover:bg-emerald-600 group-hover:shadow-lg transition-all duration-300">
                        Donasi Sekarang
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. SECTION TRANSPARANSI KEUANGAN (MASUK & KELUAR) -->
    <section id="transparansi" class="py-20 bg-slate-100/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12" data-aos="fade-up">
                <span class="text-emerald-600 font-bold text-sm tracking-wider uppercase bg-emerald-100/60 px-3.5 py-1.5 rounded-full">
                    Akuntabilitas Keuangan
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Laporan Transparansi Dana</h2>
                <p class="text-slate-600 mt-3">Pencatatan donasi masuk dan penyaluran pengeluaran kas secara terbuka.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8" data-aos="fade-up" data-aos-delay="100">
                <!-- TABEL UANG MASUK (DONASI DARI WEBSITE) -->
                <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 border border-slate-200/60 overflow-hidden">
                    <div class="p-5 bg-emerald-50 border-b border-emerald-100 flex justify-between items-center">
                        <h3 class="font-bold text-slate-900 text-base flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                            Donasi Masuk Terbaru (Website)
                        </h3>
                        <span class="text-xs bg-emerald-200 text-emerald-800 font-semibold px-2.5 py-1 rounded-md">Realtime</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-200 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                    <th class="py-3.5 px-5">Tanggal</th>
                                    <th class="py-3.5 px-5">Nama Donatur</th>
                                    <th class="py-3.5 px-5">Program</th>
                                    <th class="py-3.5 px-5 text-right">Nominal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm text-slate-700 font-medium">
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-3.5 px-5 whitespace-nowrap text-slate-500 text-xs">15 Feb 2026</td>
                                    <td class="py-3.5 px-5 font-bold text-slate-800">
                                        Hamba Allah
                                        <span class="block text-[10px] text-slate-400 font-normal">Anonim</span>
                                    </td>
                                    <td class="py-3.5 px-5 text-xs text-slate-600">MBG Mandiri</td>
                                    <td class="py-3.5 px-5 text-right font-bold text-emerald-600 whitespace-nowrap">+ Rp 250.000</td>
                                </tr>
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-3.5 px-5 whitespace-nowrap text-slate-500 text-xs">14 Feb 2026</td>
                                    <td class="py-3.5 px-5 font-bold text-slate-800">
                                        Ahmad Fauzi
                                        <span class="block text-[10px] text-slate-400 font-normal">Verified Donor</span>
                                    </td>
                                    <td class="py-3.5 px-5 text-xs text-slate-600">Gaji Guru</td>
                                    <td class="py-3.5 px-5 text-right font-bold text-emerald-600 whitespace-nowrap">+ Rp 500.000</td>
                                </tr>
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-3.5 px-5 whitespace-nowrap text-slate-500 text-xs">13 Feb 2026</td>
                                    <td class="py-3.5 px-5 font-bold text-slate-800">
                                        Hamba Allah
                                        <span class="block text-[10px] text-slate-400 font-normal">Anonim</span>
                                    </td>
                                    <td class="py-3.5 px-5 text-xs text-slate-600">Sarana Belajar</td>
                                    <td class="py-3.5 px-5 text-right font-bold text-emerald-600 whitespace-nowrap">+ Rp 1.000.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TABEL UANG KELUAR (PENGELUARAN KAS) -->
                <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 border border-slate-200/60 overflow-hidden">
                    <div class="p-5 bg-rose-50 border-b border-rose-100 flex justify-between items-center">
                        <h3 class="font-bold text-slate-900 text-base flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-rose-500"></span>
                            Pengeluaran Kas Terbaru
                        </h3>
                        <span class="text-xs bg-rose-200 text-rose-800 font-semibold px-2.5 py-1 rounded-md">Terverifikasi</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-200 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                    <th class="py-3.5 px-5">Tanggal</th>
                                    <th class="py-3.5 px-5">Rincian Pengeluaran</th>
                                    <th class="py-3.5 px-5 text-right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm text-slate-700 font-medium">
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-3.5 px-5 whitespace-nowrap text-slate-500 text-xs">12 Feb 2026</td>
                                    <td class="py-3.5 px-5 text-xs">
                                        <span class="font-semibold block text-slate-800">Bahan Pokok MBG Santri</span>
                                        Beras, sayur & lauk pauk mingguan
                                    </td>
                                    <td class="py-3.5 px-5 text-right font-bold text-rose-600 whitespace-nowrap">- Rp 1.850.000</td>
                                </tr>
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-3.5 px-5 whitespace-nowrap text-slate-500 text-xs">10 Feb 2026</td>
                                    <td class="py-3.5 px-5 text-xs">
                                        <span class="font-semibold block text-slate-800">Honorarium Ustaz Tahfiz</span>
                                        Insentif 4 pengajar bulan berjalan
                                    </td>
                                    <td class="py-3.5 px-5 text-right font-bold text-rose-600 whitespace-nowrap">- Rp 4.000.000</td>
                                </tr>
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-3.5 px-5 whitespace-nowrap text-slate-500 text-xs">05 Feb 2026</td>
                                    <td class="py-3.5 px-5 text-xs">
                                        <span class="font-semibold block text-slate-800">Pembelian Meja Al-Qur'an</span>
                                        15 unit meja lipat kayu santri
                                    </td>
                                    <td class="py-3.5 px-5 text-right font-bold text-rose-600 whitespace-nowrap">- Rp 1.200.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. SECTION ARTIKEL & KABAR TERBARU SANTRI -->
    <section id="artikel" class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
            <span class="text-emerald-600 font-bold text-sm tracking-wider uppercase bg-emerald-50 px-3.5 py-1.5 rounded-full">Kabar Terbaru</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Kegiatan & Berita Santri</h2>
            <p class="text-slate-600 mt-3">Perkembangan hafalan Al-Qur'an dan aktivitas sehari-hari di Rumah Tahfiz.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=500&auto=format&fit=crop" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-xs text-slate-400">15 Februari 2026</span>
                    <h3 class="font-bold text-slate-900 text-lg mt-1 hover:text-emerald-600 transition-colors">Ujian Tasmi' 3 Juz Santri Angkatan Ke-2</h3>
                    <p class="text-slate-600 text-sm mt-2 line-clamp-2">Alhamdulillah, sebanyak 10 santri berhasil menuntaskan hafalan dengan predikat mumtaz.</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=500&auto=format&fit=crop" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-xs text-slate-400">10 Februari 2026</span>
                    <h3 class="font-bold text-slate-900 text-lg mt-1 hover:text-emerald-600 transition-colors">Penyaluran Menu MBG Sehat Pekan Ke-2</h3>
                    <p class="text-slate-600 text-sm mt-2 line-clamp-2">Pemberian nutrisi berupa susu, buah, dan makanan bergizi untuk mendukung hafalan harian.</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=500&auto=format&fit=crop" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-xs text-slate-400">01 Februari 2026</span>
                    <h3 class="font-bold text-slate-900 text-lg mt-1 hover:text-emerald-600 transition-colors">Kunjungan Bimbingan Pembina Tahfiz</h3>
                    <p class="text-slate-600 text-sm mt-2 line-clamp-2">Evaluasi metode pembelajaran sanad Al-Qur'an bersama tim pengajar.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. FOOTER & KONTAK -->
    <footer class="bg-slate-900 text-slate-400 py-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-3 gap-10 text-sm">
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-emerald-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">
                        RT
                    </div>
                    <span class="text-lg font-bold text-white">Rumah Tahfiz</span>
                </div>
                <p class="text-slate-400 leading-relaxed">
                    Sistem Informasi Donasi & Transparansi Keuangan Santri Mandiri. Mengelola amanah dengan terbuka dan akuntabel.
                </p>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4">Navigasi Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="#beranda" class="hover:text-emerald-400 transition-colors">Beranda</a></li>
                    <li><a href="#pengumuman" class="hover:text-emerald-400 transition-colors">Pengumuman</a></li>
                    <li><a href="#legalitas" class="hover:text-emerald-400 transition-colors">Wasiat & Legalitas</a></li>
                    <li><a href="#program" class="hover:text-emerald-400 transition-colors">Program Donasi</a></li>
                    <li><a href="#transparansi" class="hover:text-emerald-400 transition-colors">Laporan Keuangan</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4">Kontak & Alamat</h4>
                <p class="text-slate-400">📍 Jalan Raya Nagari No. 12, Kantor Wali Nagari, Sumatera Barat</p>
                <p class="mt-2 text-slate-400">📞 WhatsApp: +62 812-3456-7890</p>
                <p class="mt-1 text-slate-400">✉️ Email: info@rumahtahfiz.or.id</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-6 border-t border-slate-800 text-center text-xs text-slate-500">
            &copy; 2026 Rumah Tahfiz. Seluruh Hak Cipta Dilindungi.
        </div>
    </footer>

    <!-- AOS (Animate On Scroll) Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
            easing: 'ease-out-cubic',
        });
    </script>
</body>
</html>

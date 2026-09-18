<section id="program" class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Header Section + Tombol Lihat Semua Program -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6" data-aos="fade-up">
        <div class="max-w-2xl">
            <span class="text-emerald-600 font-bold text-sm tracking-wider uppercase bg-emerald-50 px-3.5 py-1.5 rounded-full">Infaq Berkelanjutan</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Program Donasi Utama</h2>
            <p class="text-slate-600 mt-3 text-base">Pilih program kebaikan yang ingin Anda dukung untuk masa depan para santri.</p>
        </div>

        <!-- Tombol Mengarah ke Katalog Semua Campaign (campaigns/index.blade.php) -->
        <div class="shrink-0">
            <a href="{{ route('campaigns.index') }}" class="inline-flex items-center gap-2 font-bold text-emerald-600 hover:text-emerald-700 transition-colors group text-sm sm:text-base">
                <span>Lihat Semua Program</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Grid 3 Card Campaign Statis -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- Card 1: MBG Mandiri -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-200/50 overflow-hidden flex flex-col justify-between hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 group" data-aos="fade-up" data-aos-delay="100">
            <div>
                <!-- Image Klik ke Detail -->
                <a href="{{ route('campaigns.show', 'mbg-mandiri') }}" class="block relative overflow-hidden h-52">
                    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-emerald-600/90 backdrop-blur-md text-white text-xs font-bold px-3 py-1 rounded-full">
                        MBG Mandiri
                    </div>
                </a>

                <div class="p-6">
                    <!-- Judul Klik ke Detail -->
                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">
                        <a href="{{ route('campaigns.show', 'mbg-mandiri') }}">
                            Dapur Tahfiz: Makan Bergizi Gratis (MBG) Santri
                        </a>
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

            <!-- Tombol Donasi (Mengarahkan ke Halaman Checkout / Form Donasi) -->
            <div class="p-6 pt-0">
                <a href="{{ route('campaigns.donasi', 'mbg-mandiri') }}" class="w-full block text-center py-3 bg-slate-900 text-white font-semibold rounded-xl group-hover:bg-emerald-600 group-hover:shadow-lg transition-all duration-300">
                    Donasi Sekarang
                </a>
            </div>
        </div>

        <!-- Card 2: Gaji Guru -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-200/50 overflow-hidden flex flex-col justify-between hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 group" data-aos="fade-up" data-aos-delay="200">
            <div>
                <a href="{{ route('campaigns.show', 'gaji-guru') }}" class="block relative overflow-hidden h-52">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-teal-600/90 backdrop-blur-md text-white text-xs font-bold px-3 py-1 rounded-full">
                        Gaji Guru
                    </div>
                </a>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">
                        <a href="{{ route('campaigns.show', 'gaji-guru') }}">
                            Insentif Guru Al-Qur'an & Ustaz Tahfiz
                        </a>
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
                <a href="{{ route('campaigns.donasi', 'gaji-guru') }}" class="w-full block text-center py-3 bg-slate-900 text-white font-semibold rounded-xl group-hover:bg-emerald-600 group-hover:shadow-lg transition-all duration-300">
                    Donasi Sekarang
                </a>
            </div>
        </div>

        <!-- Card 3: Sarana Belajar -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-200/50 overflow-hidden flex flex-col justify-between hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 group" data-aos="fade-up" data-aos-delay="300">
            <div>
                <a href="{{ route('campaigns.show', 'perbaikan-sarana') }}" class="block relative overflow-hidden h-52">
                    <img src="https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-amber-600/90 backdrop-blur-md text-white text-xs font-bold px-3 py-1 rounded-full">
                        Perbaikan Sarana
                    </div>
                </a>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">
                        <a href="{{ route('campaigns.show', 'perbaikan-sarana') }}">
                            Renovasi Ruang Belajar & Asrama Santri
                        </a>
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
                <a href="{{ route('campaigns.donasi', 'perbaikan-sarana') }}" class="w-full block text-center py-3 bg-slate-900 text-white font-semibold rounded-xl group-hover:bg-emerald-600 group-hover:shadow-lg transition-all duration-300">
                    Donasi Sekarang
                </a>
            </div>
        </div>

    </div>
</section>

<section id="artikel" class="py-12 sm:py-16 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header (Fleksibel & Sejajar Tombol CTA) -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8" data-aos="fade-up">
            <div>
                <span class="inline-flex items-center gap-1.5 text-emerald-700 font-bold text-xs tracking-wider uppercase bg-emerald-100/80 px-3 py-1 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Kabar Terbaru
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-2.5 tracking-tight">Kegiatan & Berita Santri</h2>
                <p class="text-slate-500 mt-1 text-sm max-w-xl">
                    Perkembangan hafalan Al-Qur'an dan aktivitas sehari-hari di Rumah Tahfiz.
                </p>
            </div>

            <!-- Tombol CTA Ke Halaman Artikel Lengkap -->
            <a href="{{ route('artikel.index') }}" class="group inline-flex items-center gap-2 text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-600 hover:text-white px-4 py-2.5 rounded-xl transition-all duration-300 shadow-sm hover:shadow-md border border-emerald-200/60 self-start sm:self-auto flex-shrink-0">
                <span>Lihat Seluruh Kabar Santri</span>
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

        <!-- Grid Cards Artikel -->
        <div class="grid md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="100">

            <!-- Item 1 -->
            <article class="group bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col">
                <div class="relative overflow-hidden aspect-video bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=500&auto=format&fit=crop" alt="Ujian Tasmi" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                </div>
                <div class="p-5 flex flex-col flex-grow justify-between">
                    <div>
                        <span class="text-[11px] font-medium text-slate-400">15 Februari 2026</span>
                        <h3 class="font-bold text-slate-900 text-base mt-1 group-hover:text-emerald-600 transition-colors line-clamp-2">
                            Ujian Tasmi' 3 Juz Santri Angkatan Ke-2
                        </h3>
                        <p class="text-slate-500 text-xs mt-2 line-clamp-2 leading-relaxed">
                            Alhamdulillah, sebanyak 10 santri berhasil menuntaskan hafalan dengan predikat mumtaz.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Item 2 -->
            <article class="group bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col">
                <div class="relative overflow-hidden aspect-video bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=500&auto=format&fit=crop" alt="Program MBG" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                </div>
                <div class="p-5 flex flex-col flex-grow justify-between">
                    <div>
                        <span class="text-[11px] font-medium text-slate-400">10 Februari 2026</span>
                        <h3 class="font-bold text-slate-900 text-base mt-1 group-hover:text-emerald-600 transition-colors line-clamp-2">
                            Penyaluran Menu MBG Sehat Pekan Ke-2
                        </h3>
                        <p class="text-slate-500 text-xs mt-2 line-clamp-2 leading-relaxed">
                            Pemberian nutrisi berupa susu, buah, dan makanan bergizi untuk mendukung hafalan harian.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Item 3 -->
            <article class="group bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col">
                <div class="relative overflow-hidden aspect-video bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=500&auto=format&fit=crop" alt="Kunjungan Pembina" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                </div>
                <div class="p-5 flex flex-col flex-grow justify-between">
                    <div>
                        <span class="text-[11px] font-medium text-slate-400">01 Februari 2026</span>
                        <h3 class="font-bold text-slate-900 text-base mt-1 group-hover:text-emerald-600 transition-colors line-clamp-2">
                            Kunjungan Bimbingan Pembina Tahfiz
                        </h3>
                        <p class="text-slate-500 text-xs mt-2 line-clamp-2 leading-relaxed">
                            Evaluasi metode pembelajaran sanad Al-Qur'an bersama tim pengajar.
                        </p>
                    </div>
                </div>
            </article>

        </div>
    </div>
</section>

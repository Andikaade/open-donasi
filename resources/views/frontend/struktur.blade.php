<section id="struktur" class="py-12 sm:py-16 bg-slate-50/70 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header + CTA -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8" data-aos="fade-up">
            <div>
                <span class="inline-flex items-center gap-1.5 text-emerald-700 font-bold text-xs tracking-wider uppercase bg-emerald-100/80 px-3 py-1 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Pengelola Lembaga
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-2.5 tracking-tight">Struktur Organisasi</h2>
                <p class="text-slate-500 mt-1 text-sm max-w-xl">
                    Amanah dan keberlangsungan Rumah Tahfiz dikelola oleh pengurus yang berdedikasi (Masa Bakti 2026–2030).
                </p>
            </div>

            <a href="{{ route('struktur.index') }}" class="group inline-flex items-center gap-2 text-xs font-bold text-emerald-700 bg-white hover:bg-emerald-600 hover:text-white px-4 py-2.5 rounded-xl transition-all duration-300 shadow-sm hover:shadow-md border border-slate-200/80 self-start sm:self-auto flex-shrink-0">
                <span>Lihat Struktur Lengkap</span>
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

        <!-- Grid 4 Pengurus Utama -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5" data-aos="fade-up" data-aos-delay="100">

            <!-- Pimpinan Eksekutif -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-300 text-center flex flex-col items-center">
                <div class="w-20 h-20 mb-4 rounded-full bg-emerald-50 border-2 border-emerald-500/30 flex items-center justify-center text-emerald-700 text-base font-bold overflow-hidden shadow-inner">
                    <span>YUH</span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm">YUHELMA, S.Pd</h3>
                <p class="text-[11px] text-emerald-600 font-bold mt-1 uppercase tracking-wider">Pimpinan Eksekutif</p>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">Pengarah utama eksekutif dan manajerial lembaga.</p>
            </div>

            <!-- Pembina -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-300 text-center flex flex-col items-center">
                <div class="w-20 h-20 mb-4 rounded-full bg-emerald-50 border-2 border-emerald-500/30 flex items-center justify-center text-emerald-700 text-base font-bold overflow-hidden shadow-inner">
                    <span>ALG</span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm">ALGANI LABAI ST, S.Hi</h3>
                <p class="text-[11px] text-emerald-600 font-bold mt-1 uppercase tracking-wider">Pembina</p>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">Pembimbing arah spiritual dan syariat lembaga.</p>
            </div>

            <!-- Ketua Umum -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-300 text-center flex flex-col items-center">
                <div class="w-20 h-20 mb-4 rounded-full bg-emerald-50 border-2 border-emerald-500/30 flex items-center justify-center text-emerald-700 text-base font-bold overflow-hidden shadow-inner">
                    <span>BED</span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm">BEDRUL EFENDI, S.Pd.MM</h3>
                <p class="text-[11px] text-emerald-600 font-bold mt-1 uppercase tracking-wider">Ketua Umum</p>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">Penanggung jawab operasional harian organisasi.</p>
            </div>

            <!-- Sekretaris & Keuangan -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-300 text-center flex flex-col items-center">
                <div class="w-20 h-20 mb-4 rounded-full bg-emerald-50 border-2 border-emerald-500/30 flex items-center justify-center text-emerald-700 text-base font-bold overflow-hidden shadow-inner">
                    <span>ADM</span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm">RADHIATUL HUSNA, S.Sos</h3>
                <p class="text-[11px] text-emerald-600 font-bold mt-1 uppercase tracking-wider">Sekretaris I</p>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">Koordinator tata kelola administrasi lembaga.</p>
            </div>

        </div>
    </div>
</section>

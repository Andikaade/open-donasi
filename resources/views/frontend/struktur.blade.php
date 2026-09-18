<section id="struktur" class="py-12 sm:py-16 bg-slate-50/70 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section + Tombol CTA Halaman Detail -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8" data-aos="fade-up">
            <div>
                <span class="inline-flex items-center gap-1.5 text-emerald-700 font-bold text-xs tracking-wider uppercase bg-emerald-100/80 px-3 py-1 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Pengelola Lembaga
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-2.5 tracking-tight">Struktur Organisasi</h2>
                <p class="text-slate-500 mt-1 text-sm max-w-xl">
                    Amanah dan keberlangsungan Rumah Tahfiz dikelola oleh tim pengurus yang berdedikasi.
                </p>
            </div>

            <!-- Tombol Mengarah ke Route Detail -->
            <a href="{{ route('struktur.index') }}" class="group inline-flex items-center gap-2 text-xs font-bold text-emerald-700 bg-white hover:bg-emerald-600 hover:text-white px-4 py-2.5 rounded-xl transition-all duration-300 shadow-sm hover:shadow-md border border-slate-200/80 self-start sm:self-auto flex-shrink-0">
            {{-- <a href="#" class="group inline-flex items-center gap-2 text-xs font-bold text-emerald-700 bg-white hover:bg-emerald-600 hover:text-white px-4 py-2.5 rounded-xl transition-all duration-300 shadow-sm hover:shadow-md border border-slate-200/80 self-start sm:self-auto flex-shrink-0"> --}}
                <span>Lihat Struktur Lengkap</span>
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

        <!-- Grid Ringkas 4 Pengurus Utama (1 Baris) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5" data-aos="fade-up" data-aos-delay="100">

            <!-- Pembina / Penasihat -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-300 text-center flex flex-col items-center">
                <div class="w-20 h-20 mb-4 rounded-full bg-emerald-50 border-2 border-emerald-500/30 flex items-center justify-center text-emerald-700 text-lg font-bold overflow-hidden shadow-inner">
                    <!-- Gunakan <img> jika foto ada, contoh fallback avatar -->
                    <span>UST</span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm">Nama Pembina/Tokoh</h3>
                <p class="text-[11px] text-emerald-600 font-bold mt-1 uppercase tracking-wider">Pembina / Penasihat</p>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">Mengarahkan arah kebijakan & spiritualitas yayasan.</p>
            </div>

            <!-- Ketua Pengurus -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-300 text-center flex flex-col items-center">
                <div class="w-20 h-20 mb-4 rounded-full bg-emerald-50 border-2 border-emerald-500/30 flex items-center justify-center text-emerald-700 text-lg font-bold overflow-hidden shadow-inner">
                    <span>KUA</span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm">Nama Ketua</h3>
                <p class="text-[11px] text-emerald-600 font-bold mt-1 uppercase tracking-wider">Ketua Pengurus</p>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">Penanggung jawab harian operasional Rumah Tahfiz.</p>
            </div>

            <!-- Sekretaris & Bendahara -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-300 text-center flex flex-col items-center">
                <div class="w-20 h-20 mb-4 rounded-full bg-emerald-50 border-2 border-emerald-500/30 flex items-center justify-center text-emerald-700 text-lg font-bold overflow-hidden shadow-inner">
                    <span>ADM</span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm">Nama Bendahara</h3>
                <p class="text-[11px] text-emerald-600 font-bold mt-1 uppercase tracking-wider">Keuangan & Administrasi</p>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">Pengelola pencatatan keuangan donasi & operasional.</p>
            </div>

            <!-- Koordinator Pengajar -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-300 text-center flex flex-col items-center">
                <div class="w-20 h-20 mb-4 rounded-full bg-emerald-50 border-2 border-emerald-500/30 flex items-center justify-center text-emerald-700 text-lg font-bold overflow-hidden shadow-inner">
                    <span>UST</span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm">Nama Kepala Pengajar</h3>
                <p class="text-[11px] text-emerald-600 font-bold mt-1 uppercase tracking-wider">Koordinator Tahfiz</p>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">Membimbing & mengawasi mutu hafalan santri.</p>
            </div>

        </div>
    </div>
</section>

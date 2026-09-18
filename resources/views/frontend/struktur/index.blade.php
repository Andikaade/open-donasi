<x-guest-layout>
    <main class="py-12 bg-slate-50/60 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Page -->
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="inline-flex items-center gap-1.5 text-emerald-700 font-bold text-xs tracking-wider uppercase bg-emerald-100/80 px-3.5 py-1.5 rounded-full">
                    Struktur Lengkap
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Struktur Organisasi & Pengurus</h1>
                <p class="text-slate-500 mt-2 text-sm">
                    Sinergi dewan pembina, pengurus harian, dan tenaga pendidik dalam mengelola Rumah Tahfiz Amanah.
                </p>
            </div>

            <!-- SECTION 1: BAGAN ORGANISASI (TREE VISUAL) -->
            <div class="bg-white p-6 sm:p-10 rounded-3xl border border-slate-200/80 shadow-xs mb-12">
                <h2 class="text-center font-bold text-slate-900 text-lg mb-8">Bagan Alur Organisasi</h2>

                <div class="flex flex-col items-center gap-6 overflow-x-auto pb-4">
                    <!-- Level 1: Pembina / Penasihat -->
                    <div class="bg-emerald-50 border-2 border-emerald-500 text-emerald-900 px-6 py-3 rounded-2xl text-center shadow-xs min-w-[220px]">
                        <span class="text-[10px] uppercase font-bold text-emerald-600 block tracking-wider">Dewan Pembina</span>
                        <strong class="text-sm block">Ustadz / Tokoh Pembina</strong>
                    </div>

                    <!-- Garis Penghubung Vertikal -->
                    <div class="w-0.5 h-6 bg-slate-300"></div>

                    <!-- Level 2: Ketua Pengurus -->
                    <div class="bg-emerald-600 text-white px-6 py-3 rounded-2xl text-center shadow-md min-w-[220px]">
                        <span class="text-[10px] uppercase font-bold text-emerald-200 block tracking-wider">Ketua Pengurus</span>
                        <strong class="text-sm block">Nama Ketua Harian</strong>
                    </div>

                    <!-- Garis Penghubung Vertikal -->
                    <div class="w-0.5 h-6 bg-slate-300"></div>

                    <!-- Level 3: Divisi Harian -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full max-w-3xl relative">
                        <div class="hidden md:block absolute top-0 left-1/6 right-1/6 h-0.5 bg-slate-300 -translate-y-3"></div>

                        <!-- Keuangan & ADM -->
                        <div class="bg-slate-50 border border-slate-200 p-4 rounded-xl text-center">
                            <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Keuangan & Adm</span>
                            <strong class="text-xs text-slate-800 block mt-0.5">Nama Bendahara / ADM</strong>
                        </div>

                        <!-- Koordinator Tahfiz -->
                        <div class="bg-slate-50 border border-slate-200 p-4 rounded-xl text-center">
                            <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Koordinator Tahfiz</span>
                            <strong class="text-xs text-slate-800 block mt-0.5">Nama Kepala Pengajar</strong>
                        </div>

                        <!-- Umum & Logistik -->
                        <div class="bg-slate-50 border border-slate-200 p-4 rounded-xl text-center">
                            <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Umum & Logistik</span>
                            <strong class="text-xs text-slate-800 block mt-0.5">Nama Tim Operasional</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: DETAIL DATA UMUM ANGGOTA & PENGURUS -->
            <div>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-slate-900">Daftar Pengurus & Tenaga Pendidik</h2>
                    <span class="text-xs text-slate-500">Total: 6 Anggota</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Anggota 1 -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all flex items-start gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-50 border border-emerald-200 flex-shrink-0 flex items-center justify-center text-emerald-700 font-extrabold text-base">
                            UST
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold text-emerald-600 tracking-wider">Pembina Utama</span>
                            <h3 class="font-bold text-slate-900 text-sm mt-0.5">Nama Pembina / Tokoh</h3>
                            <p class="text-xs text-slate-500 mt-1">Mengarahkan kebijakan & pertimbangan hukum syariat lembaga.</p>
                            <div class="mt-3 pt-3 border-t border-slate-100 text-[11px] text-slate-400">
                                ✉️ pembina@rumahtahfiz.or.id
                            </div>
                        </div>
                    </div>

                    <!-- Anggota 2 -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all flex items-start gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-50 border border-emerald-200 flex-shrink-0 flex items-center justify-center text-emerald-700 font-extrabold text-base">
                            KUA
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold text-emerald-600 tracking-wider">Ketua Pengurus</span>
                            <h3 class="font-bold text-slate-900 text-sm mt-0.5">Nama Ketua Harian</h3>
                            <p class="text-xs text-slate-500 mt-1">Menanggung jawabkan seluruh aktivitas operasional & program harian.</p>
                            <div class="mt-3 pt-3 border-t border-slate-100 text-[11px] text-slate-400">
                                📞 +62 812-3456-7890
                            </div>
                        </div>
                    </div>

                    <!-- Anggota 3 -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all flex items-start gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-50 border border-emerald-200 flex-shrink-0 flex items-center justify-center text-emerald-700 font-extrabold text-base">
                            ADM
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold text-emerald-600 tracking-wider">Keuangan & Adm</span>
                            <h3 class="font-bold text-slate-900 text-sm mt-0.5">Nama Bendahara</h3>
                            <p class="text-xs text-slate-500 mt-1">Mengelola pembukuan donasi, laporan keuangan, dan administrasi.</p>
                            <div class="mt-3 pt-3 border-t border-slate-100 text-[11px] text-slate-400">
                                ✉️ keuangan@rumahtahfiz.or.id
                            </div>
                        </div>
                    </div>

                    <!-- Anggota 4 -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all flex items-start gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-50 border border-emerald-200 flex-shrink-0 flex items-center justify-center text-emerald-700 font-extrabold text-base">
                            UST
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold text-emerald-600 tracking-wider">Koordinator Tahfiz</span>
                            <h3 class="font-bold text-slate-900 text-sm mt-0.5">Nama Kepala Pengajar</h3>
                            <p class="text-xs text-slate-500 mt-1">Menyusun kurikulum hafalan santri dan evaluasi ujian setoran.</p>
                            <div class="mt-3 pt-3 border-t border-slate-100 text-[11px] text-slate-400">
                                📜 Sanad Al-Qur'an 30 Juz
                            </div>
                        </div>
                    </div>

                    <!-- Anggota 5 -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all flex items-start gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-50 border border-emerald-200 flex-shrink-0 flex items-center justify-center text-emerald-700 font-extrabold text-base">
                            USTZ
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold text-emerald-600 tracking-wider">Pengajar Putri</span>
                            <h3 class="font-bold text-slate-900 text-sm mt-0.5">Ustazah Musyrifah</h3>
                            <p class="text-xs text-slate-500 mt-1">Pembimbing hafalan dan pengasuhan santriwati harian.</p>
                            <div class="mt-3 pt-3 border-t border-slate-100 text-[11px] text-slate-400">
                                📜 Pengajar Tajwid
                            </div>
                        </div>
                    </div>

                    <!-- Anggota 6 -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all flex items-start gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-50 border border-emerald-200 flex-shrink-0 flex items-center justify-center text-emerald-700 font-extrabold text-base">
                            LOG
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold text-emerald-600 tracking-wider">Tim Logistik</span>
                            <h3 class="font-bold text-slate-900 text-sm mt-0.5">Nama Penanggung Jawab</h3>
                            <p class="text-xs text-slate-500 mt-1">Memastikan pemenuhan konsumsi MBG santri & fasilitas asrama.</p>
                            <div class="mt-3 pt-3 border-t border-slate-100 text-[11px] text-slate-400">
                                📞 Ops Rumah Tangga
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

    <!-- Panggil Footer dari komponen -->
    <x-footer />
</x-guest-layout>

<x-guest-layout>
    <div class="bg-slate-50 min-h-screen py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb Navigation -->
            <nav class="flex mb-6 text-sm text-slate-500">
                <a href="#" class="hover:text-emerald-600">Beranda</a>
                {{-- <a href="{{ route('home') ?? '/' }}" class="hover:text-emerald-600">Beranda</a> --}}
                <span class="mx-2">/</span>
                <a href="{{ url('/artikel') }}" class="hover:text-emerald-600">Kabar Santri</a>
                <span class="mx-2">/</span>
                <span class="text-slate-800 font-medium">Detail Artikel</span>
            </nav>

            <!-- Artikel Header -->
            <div class="bg-white rounded-2xl p-6 sm:p-10 shadow-sm border border-slate-100 mb-8">
                <span class="px-3 py-1 text-xs font-semibold text-emerald-700 bg-emerald-100 rounded-full inline-block mb-4">
                    Kegiatan Santri
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 leading-tight mb-4">
                    Ujian Tasmi' 3 Juz Santri Angkatan Ke-2 Rumah Tahfiz Amanah
                </h1>

                <div class="flex items-center gap-4 text-sm text-slate-500 border-b border-slate-100 pb-6 mb-6">
                    <div>Penulis: <span class="font-medium text-slate-700">Admin Humas</span></div>
                    <span>•</span>
                    <div>Dipublikasikan: <span class="font-medium text-slate-700">15 Februari 2026</span></div>
                </div>

                <!-- Featured Image -->
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1000&auto=format&fit=crop" alt="Gambar Utama Ujian Tasmi" class="w-full h-80 sm:h-96 object-cover rounded-xl mb-8">

                <!-- Body Content -->
                <div class="prose max-w-none text-slate-700 leading-relaxed space-y-4">
                    <p class="text-lg text-slate-800 font-medium leading-relaxed">
                        Alhamdulillah, sebanyak 10 santri berhasil menuntaskan hafalan dengan predikat mumtaz dalam kegiatan Ujian Tasmi' 3 Juz yang diselenggarakan di aula Rumah Tahfiz Amanah.
                    </p>
                    <p>
                        Kegiatan ini diadakan sebagai tolok ukur kelancaran hafalan para santri sebelum melangkah ke juz berikutnya. Setiap santri membacakan 3 juz hafalan Al-Qur'an secara sekali duduk di hadapan penguji dan disaksikan oleh para wali santri.
                    </p>
                    <blockquote class="border-l-4 border-emerald-500 pl-4 italic text-slate-600 bg-emerald-50/50 py-2 my-4 rounded-r">
                        "Menjaga hafalan membutuhkan konsistensi dan kesabaran yang tinggi. Ujian Tasmi' ini melatih mental santri agar tetap percaya diri dan memperkuat muraja'ah mereka." Ujar Pembina Rumah Tahfiz.
                    </blockquote>
                    <p>
                        Kami mengucapkan terima kasih yang sebesar-besarnya kepada para donatur dan muhsinin yang senantiasa mendukung program dakwah dan pendidikan santri di Rumah Tahfiz Amanah. Semoga setiap bait ayat yang dibacakan mengalirkan pahala jariyah bagi kita semua.
                    </p>
                </div>

                <!-- Tombol Kembal/Navigasi -->
                <div class="mt-8 pt-6 border-t border-slate-100 flex justify-between items-center">
                    <a href="{{ url('/artikel') }}" class="inline-flex items-center text-emerald-600 font-medium hover:underline text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Kembali ke Kabar Santri
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>

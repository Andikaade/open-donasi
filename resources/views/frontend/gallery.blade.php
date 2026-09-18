<section id="galeri" class="py-12 sm:py-16 bg-slate-50/70 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8" data-aos="fade-up">
            <div>
                <span class="inline-flex items-center gap-1.5 text-emerald-700 font-bold text-xs tracking-wider uppercase bg-emerald-100/80 px-3 py-1 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Dokumentasi
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-2.5 tracking-tight">Galeri & Suasana Belajar</h2>
                <p class="text-slate-500 mt-1 text-sm max-w-xl">
                    Keseriusan dan keceriaan para santri dalam menghafal Al-Qur'an di Rumah Tahfiz.
                </p>
            </div>

            <a href="{{ route('galeri.index') }}" class="group inline-flex items-center gap-2 text-xs font-bold text-emerald-700 bg-white hover:bg-emerald-600 hover:text-white px-4 py-2.5 rounded-xl transition-all duration-300 shadow-sm hover:shadow-md border border-slate-200/80 self-start sm:self-auto">
                <span>Lihat Galeri Lengkap</span>
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

        <!-- Modern Bento Grid (Visual Dynamic) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4" data-aos="fade-up" data-aos-delay="100">

            <!-- Card Utama: Highlight Video (Lebih Besar) -->
            <div class="lg:col-span-7 relative group rounded-2xl overflow-hidden bg-slate-900 shadow-sm h-64 sm:h-80 lg:h-[340px]">
                <img src="https://images.unsplash.com/photo-1609599006353-e629aaabfeae?auto=format&fit=crop&w=1000&q=80" alt="Video Kegiatan Santri" class="w-full h-full object-cover opacity-75 group-hover:scale-105 transition-transform duration-700 ease-out">

                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-transparent p-5 sm:p-6 flex flex-col justify-between">
                    <span class="bg-red-600/90 backdrop-blur-md text-white text-[10px] font-bold px-2.5 py-1 rounded-lg uppercase tracking-wider w-max flex items-center gap-1.5 shadow-sm">
                        <span class="w-1.5 h-1.5 bg-white rounded-full animate-ping"></span> Video Profile
                    </span>

                    <div class="flex items-end justify-between gap-4">
                        <div class="space-y-1">
                            <h3 class="text-white font-bold text-base sm:text-lg leading-snug">Profil & Kegiatan Santri</h3>
                            <p class="text-slate-300 text-xs font-normal">Dokumentasi harian hafalan Al-Qur'an & program kebaikan</p>
                        </div>

                        <!-- Pulse Play Button -->
                        <button onclick="openVideoModal('https://www.youtube.com/embed/dQw4w9WgXcQ')" class="relative flex items-center justify-center w-12 h-12 bg-emerald-500 hover:bg-emerald-400 text-white rounded-full shadow-lg transition-transform hover:scale-110 flex-shrink-0 group/btn" aria-label="Play Video">
                            <span class="absolute -inset-1 rounded-full bg-emerald-400/40 animate-pulse"></span>
                            <svg class="w-5 h-5 fill-current ml-0.5 relative z-10" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Side Cards: 2 Foto Stacked Vertikal -->
            <div class="lg:col-span-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4">

                <!-- Foto 1 -->
                <div class="relative group rounded-2xl overflow-hidden bg-slate-200 shadow-sm h-40 sm:h-40 lg:h-[162px]">
                    <img src="https://images.unsplash.com/photo-1585036156171-384164a8c675?auto=format&fit=crop&w=600&q=80" alt="Bimbingan Tajwid" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent opacity-80 lg:opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-4 flex items-end">
                        <p class="text-white text-xs font-semibold">Bimbingan Tajwid & Tahsin Ustadz</p>
                    </div>
                </div>

                <!-- Foto 2 -->
                <div class="relative group rounded-2xl overflow-hidden bg-slate-200 shadow-sm h-40 sm:h-40 lg:h-[162px]">
                    <img src="https://images.unsplash.com/photo-1542810634-71277d95dcbb?auto=format&fit=crop&w=600&q=80" alt="Makan Bergizi Gratis" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent opacity-80 lg:opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-4 flex items-end">
                        <p class="text-white text-xs font-semibold">Penyaluran Program Makan Bergizi (MBG)</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- MODAL POPUP VIDEO -->
<div id="videoModal" class="fixed inset-0 bg-slate-950/85 z-50 hidden items-center justify-center p-4 backdrop-blur-md">
    <div class="relative w-full max-w-3xl bg-black rounded-2xl overflow-hidden shadow-2xl border border-slate-800">
        <button onclick="closeVideoModal()" class="absolute top-3 right-3 text-white hover:text-red-400 bg-slate-800/80 p-1.5 rounded-full z-10 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <div class="aspect-video w-full">
            <iframe id="videoIframe" class="w-full h-full" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div>
</div>

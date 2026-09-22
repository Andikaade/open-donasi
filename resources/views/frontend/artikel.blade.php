<section id="artikel" class="py-12 sm:py-16 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
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

        <!-- Grid Cards Artikel Dinamis -->
        <div class="grid md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="100">
            @forelse($artikels as $artikel)
                <article class="group bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col">
                    <a href="{{ route('artikel.show', $artikel->slug ?? $artikel->id) }}" class="block relative overflow-hidden aspect-video bg-slate-100">
                        @if($artikel->image)
                            <img src="{{ Storage::url($artikel->image) }}"
                                 alt="{{ $artikel->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
                                 onerror="this.onerror=null; this.src='https://placehold.co/500x300?text=No+Image';">
                        @else
                            <img src="https://placehold.co/500x300?text=No+Image"
                                 alt="Default Image"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                        @endif
                    </a>
                    <div class="p-5 flex flex-col flex-grow justify-between">
                        <div>
                            <span class="text-[11px] font-medium text-slate-400">
                                {{ $artikel->published_at ? \Carbon\Carbon::parse($artikel->published_at)->translatedFormat('d F Y') : $artikel->created_at->translatedFormat('d F Y') }}
                            </span>
                            <h3 class="font-bold text-slate-900 text-base mt-1 group-hover:text-emerald-600 transition-colors line-clamp-2">
                                <a href="{{ route('artikel.show', $artikel->slug ?? $artikel->id) }}">
                                    {{ $artikel->title }}
                                </a>
                            </h3>
                            <p class="text-slate-500 text-xs mt-2 line-clamp-2 leading-relaxed">
                                {{ $artikel->excerpt ?? Str::limit(strip_tags($artikel->body), 100) }}
                            </p>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-8 text-slate-400 text-sm">
                    Belum ada kabar terbaru yang dipublikasikan.
                </div>
            @endforelse
        </div>

    </div>
</section>

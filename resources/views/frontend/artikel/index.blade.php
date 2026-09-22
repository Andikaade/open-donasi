<x-guest-layout>
    <div class="bg-slate-50 min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="text-center max-w-3xl mx-auto mb-10">
                <span class="px-3 py-1 text-xs font-semibold uppercase tracking-wider text-emerald-700 bg-emerald-100 rounded-full">
                    KABAR TERBARU
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight mt-3">
                    Kegiatan & Berita Santri
                </h1>
                <p class="mt-2 text-sm text-slate-600">
                    Informasi seputar perkembangan hafalan Al-Qur'an, penyaluran donasi, dan aktivitas sehari-hari di Rumah Tahfiz Amanah.
                </p>
            </div>

            <!-- Grid Artikel (4 Kolom pada layar Desktop) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($artikels as $item)
                    <article class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col group">

                        <!-- Gambar Artikel dengan Fallback -->
                        <a href="{{ route('artikel.show', $item->slug ?? $item->id) }}" class="block relative overflow-hidden h-44 bg-slate-100">
                            @if($item->image)
                                <img src="{{ Storage::url($item->image) }}"
                                     alt="{{ $item->title }}"
                                     class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
                                     onerror="this.onerror=null; this.src='https://placehold.co/500x300?text=No+Image';">
                            @else
                                <img src="https://placehold.co/500x300?text=No+Image"
                                     alt="Default Image"
                                     class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                            @endif
                        </a>

                        <!-- Konten Card -->
                        <div class="p-5 flex flex-col flex-grow justify-between">
                            <div>
                                <!-- Tanggal -->
                                <span class="text-[11px] font-medium text-slate-400 block mb-1">
                                    {{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') : $item->created_at->translatedFormat('d F Y') }}
                                </span>

                                <!-- Judul Artikel -->
                                <h2 class="text-sm font-bold text-slate-800 group-hover:text-emerald-600 transition-colors duration-200 mb-2 line-clamp-2">
                                    <a href="{{ route('artikel.show', $item->slug ?? $item->id) }}">
                                        {{ $item->title }}
                                    </a>
                                </h2>

                                <!-- Ringkasan / Excerpt -->
                                <p class="text-slate-500 text-xs line-clamp-2 leading-relaxed mb-4">
                                    {{ $item->excerpt ?? Str::limit(strip_tags($item->body), 90) }}
                                </p>
                            </div>

                            <!-- Tombol Baca Selengkapnya -->
                            <div class="pt-2 border-t border-slate-100">
                                <a href="{{ route('artikel.show', $item->slug ?? $item->id) }}"
                                   class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 hover:text-emerald-700 transition-colors">
                                    <span>Baca Selengkapnya</span>
                                    <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </article>
                @empty
                    <div class="col-span-full text-center py-12 text-slate-400 text-sm bg-white rounded-2xl border border-slate-200/80">
                        Belum ada kabar santri yang dipublikasikan.
                    </div>
                @endforelse
            </div>

            <!-- Paginasi jika menggunakan paginate() di Controller -->
            @if(method_exists($artikels, 'hasPages') && $artikels->hasPages())
                <div class="mt-8">
                    {{ $artikels->links() }}
                </div>
            @endif

        </div>
    </div>
</x-guest-layout>

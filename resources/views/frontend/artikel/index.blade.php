<x-guest-layout>
    <div class="bg-slate-50 min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="text-center max-w-3xl mx-auto mb-10">
                <span class="px-3 py-1 text-xs font-semibold uppercase tracking-wider text-emerald-700 bg-emerald-100 rounded-full inline-block mb-3">
                    KABAR TERBARU
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">
                    Kegiatan & Berita Santri
                </h1>
                <p class="mt-2 text-sm text-slate-600">
                    Informasi seputar perkembangan hafalan Al-Qur'an, penyaluran donasi, dan aktivitas sehari-hari di Rumah Tahfiz Amanah.
                </p>
            </div>

            <!-- Grid Artikel (4 Kolom pada layar Desktop) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

                @forelse($artikels ?? [] as $item)
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300 border border-slate-100 flex flex-col">
                    <!-- Tinggi Gambar Diperkecil menjadi h-36 -->
                    <img src="{{ $item->image }}" alt="{{ $item->title }}" class="h-36 w-full object-cover">

                    <!-- Padding Diperkecil (p-4) -->
                    <div class="p-4 flex flex-col flex-grow">
                        <span class="text-[11px] font-medium text-slate-400 mb-1">
                            {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') }}
                        </span>
                        <h2 class="text-sm font-bold text-slate-800 hover:text-emerald-600 transition-colors duration-200 mb-2 line-clamp-2 leading-snug">
                            <a href="{{ url('/kabar-santri/' . $item->slug) }}">{{ $item->title }}</a>
                        </h2>
                        <p class="text-slate-500 text-xs line-clamp-2 mb-3 flex-grow leading-relaxed">
                            {{ $item->excerpt }}
                        </p>
                        <a href="{{ url('/kabar-santri/' . $item->slug) }}" class="text-emerald-600 font-semibold text-xs hover:underline inline-flex items-center gap-1">
                            Baca Selengkapnya
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
                @empty
                <!-- Fallback jika data dynamic belum dipanggil -->
                <div class="col-span-full text-center py-8 text-slate-500 text-sm">
                    Belum ada artikel yang dipublikasikan.
                </div>
                @endforelse

            </div>
        </div>
    </div>
</x-guest-layout>

<x-guest-layout>
    <div class="bg-slate-50 min-h-screen py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb Navigation -->
            <nav class="flex mb-6 text-sm text-slate-500">
                <a href="{{ route('home') }}" class="hover:text-emerald-600">Beranda</a>
                <span class="mx-2">/</span>
                <a href="{{ route('artikel.index') }}" class="hover:text-emerald-600">Kabar Santri</a>
                <span class="mx-2">/</span>
                <span class="text-slate-800 font-medium truncate max-w-[200px] sm:max-w-xs">{{ $artikel->title }}</span>
            </nav>

            <!-- Artikel Header & Content -->
            <div class="bg-white rounded-2xl p-6 sm:p-10 shadow-sm border border-slate-100 mb-8">
                <!-- Badge Kategori / Label -->
                <span class="px-3 py-1 text-xs font-semibold text-emerald-700 bg-emerald-100 rounded-full inline-block mb-4">
                    {{ $artikel->category->name ?? 'Kegiatan Santri' }}
                </span>

                <!-- Judul Artikel -->
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 leading-tight mb-4">
                    {{ $artikel->title }}
                </h1>

                <!-- Meta Info (Penulis & Tanggal) -->
                <div class="flex items-center gap-4 text-sm text-slate-500 border-b border-slate-100 pb-6 mb-6">
                    <div>Penulis: <span class="font-medium text-slate-700">{{ $artikel->user->name ?? 'Admin Humas' }}</span></div>
                    <span>•</span>
                    <div>Dipublikasikan: <span class="font-medium text-slate-700">{{ $artikel->published_at ? \Carbon\Carbon::parse($artikel->published_at)->translatedFormat('d F Y') : $artikel->created_at->translatedFormat('d F Y') }}</span></div>
                </div>

                <!-- Featured Image -->
                @if($artikel->image)
                    <img src="{{ Storage::url($artikel->image) }}"
                         alt="{{ $artikel->title }}"
                         class="w-full h-80 sm:h-96 object-cover rounded-xl mb-8"
                         onerror="this.onerror=null; this.src='https://placehold.co/800x400?text=No+Image';">
                @else
                    <img src="https://placehold.co/800x400?text=No+Image"
                         alt="Default Image"
                         class="w-full h-80 sm:h-96 object-cover rounded-xl mb-8">
                @endif

                <!-- Excerpt / Ringkasan Singkat (Jika ada) -->
                @if($artikel->excerpt)
                    <p class="text-lg text-slate-800 font-medium leading-relaxed mb-6 italic border-l-4 border-emerald-500 pl-4 bg-emerald-50/40 py-2 rounded-r">
                        {{ $artikel->excerpt }}
                    </p>
                @endif

                <!-- Body Content -->
                <div class="prose max-w-none text-slate-700 leading-relaxed space-y-4">
                    {!! $artikel->body !!}
                </div>

                <!-- Tombol Kembali/Navigasi -->
                <div class="mt-8 pt-6 border-t border-slate-100 flex justify-between items-center">
                    <a href="{{ route('artikel.index') }}" class="inline-flex items-center text-emerald-600 font-medium hover:underline text-sm gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <span>Kembali ke Kabar Santri</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>

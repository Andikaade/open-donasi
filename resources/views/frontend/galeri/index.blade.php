<x-guest-layout>
    <div class="bg-slate-50 min-h-screen py-10" x-data="{ activeTab: 'all', lightboxOpen: false, lightboxSrc: '', lightboxTitle: '', isVideo: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="text-center max-w-3xl mx-auto mb-10">
                <span class="px-3 py-1 text-xs font-semibold uppercase tracking-wider text-emerald-700 bg-emerald-100 rounded-full inline-block mb-3">
                    DOKUMENTASI DAKWAH
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Galeri & Suasana Belajar Santri
                </h1>
                <p class="mt-3 text-sm sm:text-base text-slate-600">
                    Kumpulan momen keceriaan, proses menghafal Al-Qur'an, dan transparansi kegiatan penyaluran donasi di Rumah Tahfiz Amanah.
                </p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex flex-wrap items-center justify-center gap-2 mb-10">
                <button @click="activeTab = 'all'" :class="activeTab === 'all' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all duration-200">
                    Semua Dokumentasi
                </button>
                <button @click="activeTab = 'kegiatan'" :class="activeTab === 'kegiatan' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all duration-200">
                    Aktivitas Santri
                </button>
                <button @click="activeTab = 'video'" :class="activeTab === 'video' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all duration-200">
                    Video Dokumentasi
                </button>
                <button @click="activeTab = 'penyaluran'" :class="activeTab === 'penyaluran' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all duration-200">
                    Penyaluran Donasi
                </button>
            </div>

            <!-- Grid Galeri Dinamis -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                @forelse($galleries as $item)
                    <div x-show="activeTab === 'all' || activeTab === '{{ $item->category }}'"
                         class="relative group rounded-2xl overflow-hidden bg-slate-900 shadow-sm border border-slate-100 h-64 cursor-pointer"
                         @click="lightboxOpen = true; isVideo = {{ $item->type === 'video' ? 'true' : 'false' }}; lightboxSrc = '{{ $item->file_path }}'; lightboxTitle = '{{ $item->title }}'">

                        <img src="{{ $item->type === 'video' ? 'https://images.unsplash.com/photo-1609599006353-e629aaabfeae?auto=format&fit=crop&w=800&q=80' : $item->file_path }}"
                             alt="{{ $item->title }}"
                             class="w-full h-full object-cover {{ $item->type === 'video' ? 'opacity-75' : '' }} group-hover:scale-105 transition-transform duration-500">

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-transparent p-4 flex flex-col justify-between">
                            @if($item->type === 'video')
                                <span class="bg-red-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-md uppercase tracking-wider w-max flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full animate-ping"></span> Video
                                </span>
                            @else
                                <div></div>
                            @endif

                            <div class="flex items-end justify-between">
                                <div>
                                    <h3 class="text-white font-bold text-sm">{{ $item->title }}</h3>
                                    @if($item->description)
                                        <p class="text-slate-300 text-xs line-clamp-1">{{ $item->description }}</p>
                                    @endif
                                </div>
                                @if($item->type === 'video')
                                    <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white shadow-md group-hover:scale-110 transition-transform">
                                        <svg class="w-4 h-4 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 text-slate-500">
                        Belum ada item galeri yang ditambahkan.
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $galleries->links() }}
            </div>

        </div>

        <!-- LIGHTBOX MODAL -->
        <div x-show="lightboxOpen"
             x-transition.opacity
             class="fixed inset-0 bg-slate-950/90 z-50 flex items-center justify-center p-4 backdrop-blur-md"
             style="display: none;"
             @keydown.escape.window="lightboxOpen = false; lightboxSrc = ''">

            <div class="relative w-full max-w-4xl bg-black rounded-2xl overflow-hidden shadow-2xl border border-slate-800" @click.outside="lightboxOpen = false; lightboxSrc = ''">
                <button @click="lightboxOpen = false; lightboxSrc = ''" class="absolute top-3 right-3 text-white hover:text-red-400 bg-slate-800/80 p-2 rounded-full z-10 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <div class="w-full">
                    <template x-if="isVideo">
                        <div class="aspect-video w-full">
                            <iframe :src="lightboxSrc" class="w-full h-full" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </template>
                    <template x-if="!isVideo">
                        <div class="flex flex-col items-center">
                            <img :src="lightboxSrc" :alt="lightboxTitle" class="max-h-[75vh] w-auto object-contain">
                            <div class="w-full p-4 bg-slate-900 text-slate-200 text-sm font-medium text-center">
                                <span x-text="lightboxTitle"></span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

    </div>
</x-guest-layout>

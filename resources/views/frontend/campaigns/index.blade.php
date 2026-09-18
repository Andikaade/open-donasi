<x-guest-layout>
    <div class="bg-slate-50 min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="px-3 py-1 text-xs font-semibold uppercase tracking-wider text-emerald-700 bg-emerald-100 rounded-full inline-block mb-3">
                    PROGRAM KEBAIKAN
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Bantu Wujudkan Masa Depan Santri
                </h1>
                <p class="mt-3 text-sm sm:text-base text-slate-600">
                    Pilih program donasi yang ingin Anda dukung. Setiap rupiah yang Anda salurkan menjadi pahala jariyah yang terus mengalir.
                </p>
            </div>

            <!-- Grid Campaigns -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($campaigns as $campaign)
                    @php
                        $percentage = min(100, round(($campaign->target_amount > 0 ? ($campaign->current_amount / $campaign->target_amount) * 100 : 0)));
                    @endphp
                    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col">
                        <!-- Gambar & Badge -->
                        <div class="relative h-48 overflow-hidden bg-slate-200">
                            <a href="{{ route('campaigns.show', $campaign->slug) }}">
                                <img src="{{ $campaign->image ?? 'https://images.unsplash.com/photo-1609599006353-e629aaabfeae?auto=format&fit=crop&w=800&q=80' }}"
                                     alt="{{ $campaign->title }}"
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                            </a>
                            <span class="absolute top-3 left-3 bg-emerald-600/90 backdrop-blur-sm text-white text-[10px] font-bold px-2.5 py-1 rounded-lg uppercase tracking-wider">
                                {{ $campaign->category ?? 'Donasi' }}
                            </span>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                            <div>
                                <h3 class="font-bold text-slate-900 text-lg leading-snug hover:text-emerald-600 transition-colors">
                                    <a href="{{ route('campaigns.show', $campaign->slug) }}">
                                        {{ $campaign->title }}
                                    </a>
                                </h3>
                                <p class="text-slate-500 text-xs mt-2 line-clamp-2 leading-relaxed">
                                    {{ $campaign->short_description ?? Str::limit(strip_tags($campaign->description), 100) }}
                                </p>
                            </div>

                            <!-- Progress Bar & Target -->
                            <div class="space-y-2 pt-2 border-t border-slate-100">
                                <div class="flex justify-between text-xs font-semibold">
                                    <span class="text-emerald-600">Terkumpul: Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</span>
                                    <span class="text-slate-500">{{ $percentage }}%</span>
                                </div>
                                <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden">
                                    <div class="bg-emerald-500 h-2 rounded-full transition-all duration-500" style="width: {{ $percentage }}%"></div>
                                </div>
                                <div class="text-[11px] text-slate-400">
                                    Target: Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}
                                </div>
                            </div>

                            <!-- CTA Buttons -->
                            <div class="grid grid-cols-2 gap-2 pt-2">
                                <a href="{{ route('campaigns.show', $campaign->slug) }}"
                                   class="w-full text-center px-3 py-2.5 rounded-xl text-xs font-semibold border border-slate-200 text-slate-700 hover:bg-slate-50 transition-colors">
                                    Detail Program
                                </a>
                                <a href="{{ route('campaigns.donasi', $campaign->slug) }}"
                                   class="w-full text-center px-3 py-2.5 rounded-xl text-xs font-bold bg-emerald-600 hover:bg-emerald-700 text-white shadow-sm transition-colors">
                                    Donasi Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 text-slate-500">
                        Belum ada program kebaikan yang tersedia saat ini.
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $campaigns->links() }}
            </div>

        </div>
    </div>
</x-guest-layout>

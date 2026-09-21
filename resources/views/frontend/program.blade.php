<section id="program" class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Header Section + Menu Lihat Semua Program -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6" data-aos="fade-up">
        <div class="max-w-2xl">
            <span class="text-emerald-600 font-bold text-sm tracking-wider uppercase bg-emerald-50 px-3.5 py-1.5 rounded-full">Infaq Berkelanjutan</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Program Donasi Utama</h2>
            <p class="text-slate-600 mt-3 text-base">Pilih program kebaikan yang ingin Anda dukung untuk masa depan para santri.</p>
        </div>

        <!-- Menu Mengarah ke Katalog Semua Campaign -->
        <div class="shrink-0">
            <a href="{{ route('campaigns.index') }}" class="inline-flex items-center gap-2 font-bold text-emerald-600 hover:text-emerald-700 transition-colors group text-sm sm:text-base">
                <span>Lihat Semua Program</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Grid Dinamis Card Campaign -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($campaigns as $campaign)
            @php
                $percentage = min(100, round(($campaign->target_amount > 0 ? ($campaign->current_amount / $campaign->target_amount) * 100 : 0)));
            @endphp

            <div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-200/50 overflow-hidden flex flex-col justify-between hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 group" data-aos="fade-up">
                <div>
                    <!-- Image Klik ke Detail -->
                    <a href="{{ route('campaigns.show', $campaign->slug) }}" class="block relative overflow-hidden h-52">
                        @if($campaign->featured_image)
                            <img src="{{ Storage::url($campaign->featured_image) }}" alt="{{ $campaign->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=600&auto=format&fit=crop" alt="{{ $campaign->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @endif

                        <div class="absolute top-4 left-4 bg-emerald-600/90 backdrop-blur-md text-white text-xs font-bold px-3 py-1 rounded-full">
                            {{ $campaign->category->name ?? 'Donasi' }}
                        </div>
                    </a>

                    <div class="p-6">
                        <!-- Judul Klik ke Detail -->
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">
                            <a href="{{ route('campaigns.show', $campaign->slug) }}">
                                {{ $campaign->title }}
                            </a>
                        </h3>
                        <p class="text-slate-600 text-sm mt-2 line-clamp-2">
                            {{ $campaign->short_description ?? Str::limit(strip_tags($campaign->description), 100) }}
                        </p>
                        <div class="mt-6 pt-4 border-t border-slate-100">
                            <div class="flex justify-between text-xs font-bold mb-2">
                                <span class="text-emerald-600">Terkumpul: Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</span>
                                <span class="text-slate-500">{{ $percentage }}%</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-2.5 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                            <div class="text-xs text-slate-400 mt-2 font-medium">Target: Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Menu Donasi -->
                <div class="p-6 pt-0">
                    <a href="{{ route('campaigns.donasi', $campaign->slug) }}" class="w-full block text-center py-3 bg-slate-900 text-white font-semibold rounded-xl group-hover:bg-emerald-600 group-hover:shadow-lg transition-all duration-300">
                        Donasi Sekarang
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-slate-500">
                Belum ada program kebaikan yang ditampilkan.
            </div>
        @endforelse
    </div>
</section>

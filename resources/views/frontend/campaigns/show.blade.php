<x-guest-layout>
    <div class="bg-slate-50 min-h-screen py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb -->
            <nav class="flex mb-6 text-sm text-slate-500">
                <a href="/" class="hover:text-emerald-600">Beranda</a>
                <span class="mx-2">/</span>
                <a href="{{ route('campaigns.index') }}" class="hover:text-emerald-600">Program Kebaikan</a>
                <span class="mx-2">/</span>
                <span class="text-slate-800 font-medium truncate">{{ $campaign->title }}</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <!-- Left Column: Media & Deskripsi Lengkap -->
                <div class="lg:col-span-8 space-y-6">
                    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm">
                        <!-- Gambar Campaign -->
                        @if($campaign->featured_image)
                            <img src="{{ Storage::url($campaign->featured_image) }}"
                                 alt="{{ $campaign->title }}"
                                 class="w-full h-72 sm:h-96 object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1609599006353-e629aaabfeae?auto=format&fit=crop&w=1000&q=80"
                                 alt="{{ $campaign->title }}"
                                 class="w-full h-72 sm:h-96 object-cover">
                        @endif

                        <div class="p-6 sm:p-8">
                            <!-- Category Badge -->
                            <span class="px-3 py-1 text-xs font-semibold text-emerald-700 bg-emerald-100 rounded-full inline-block mb-3">
                                {{ $campaign->category->name ?? 'Program Donasi' }}
                            </span>

                            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight mb-6">
                                {{ $campaign->title }}
                            </h1>

                            <div class="prose max-w-none text-slate-700 leading-relaxed space-y-4">
                                {!! nl2br(e($campaign->description)) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Card Donasi & Progress (Sticky) -->
                <div class="lg:col-span-4">
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm sticky top-6 space-y-6">
                        @php
                            $percentage = min(100, round(($campaign->target_amount > 0 ? ($campaign->current_amount / $campaign->target_amount) * 100 : 0)));
                        @endphp

                        <div>
                            <p class="text-xs text-slate-500 uppercase font-semibold">Dana Terkumpul</p>
                            <h2 class="text-2xl font-extrabold text-emerald-600 mt-1">
                                Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}
                            </h2>
                            <p class="text-xs text-slate-400 mt-1">
                                dari target <span class="font-semibold text-slate-600">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</span>
                            </p>
                        </div>

                        <!-- Progress Bar -->
                        <div class="space-y-1">
                            <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                                <div class="bg-emerald-500 h-2.5 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                            <div class="flex justify-between text-xs font-semibold text-slate-500 pt-1">
                                <span>{{ $percentage }}% Tercapai</span>
                            </div>
                        </div>

                        <!-- CTA Donasi -->
                        {{-- <a href="{{ route('campaigns.donasi', $campaign->slug) }}" --}}
                        <a href="#"
                           class="w-full block text-center bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 px-4 rounded-xl shadow-md transition-colors text-sm">
                            Donasi Sekarang
                        </a>

                        <!-- Informasi Transparansi Tambahan -->
                        <div class="border-t border-slate-100 pt-4 space-y-3 text-xs text-slate-500">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>Pencairan dana diawasi oleh pengurus yayasan.</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>Laporan penyaluran di-update secara berkala.</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>

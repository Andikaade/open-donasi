<x-admin-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 leading-tight">
                    {{ __('Detail Program Donasi') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">Informasi lengkap dan progres penggalangan dana.</p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.campaigns.index') }}"
                class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-800 text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Kembali ke Halaman Sebelumnya</span>
                </a>

                <a href="{{ route('admin.campaigns.edit', $campaign) }}"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-semibold text-xs rounded-xl shadow-md shadow-amber-500/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    <span>Edit Program</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-2 space-y-6">

        <!-- Header Info Card -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden p-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Banner Image -->
                <div class="lg:col-span-1">
                    @if($campaign->featured_image)
                        <img src="{{ Storage::url($campaign->featured_image) }}"
                             alt="{{ $campaign->title }}"
                             class="w-full h-56 object-cover rounded-xl border border-slate-200 shadow-sm"
                             onerror="this.onerror=null; this.src='https://placehold.co/600x400?text=No+Banner+Image';">
                    @else
                        <div class="w-full h-56 bg-slate-100 text-slate-400 rounded-xl flex items-center justify-center text-sm font-medium">
                            Tidak Ada Banner
                        </div>
                    @endif
                </div>

                <!-- Summary Info -->
                <div class="lg:col-span-2 flex flex-col justify-between space-y-4">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 font-bold text-xs rounded-full border border-emerald-100">
                                {{ $campaign->category->name ?? 'Tanpa Kategori' }}
                            </span>
                            @if($campaign->is_active)
                                <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-bold">Aktif</span>
                            @else
                                <span class="px-3 py-1 bg-rose-100 text-rose-700 rounded-full text-xs font-bold">Non-Aktif</span>
                            @endif
                        </div>
                        <h1 class="text-xl font-bold text-slate-800">{{ $campaign->title }}</h1>
                        <p class="text-xs text-slate-500 mt-2 line-clamp-3 leading-relaxed">
                            {{ $campaign->short_description }}
                        </p>
                    </div>

                    <!-- Financial Progress -->
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 space-y-3">
                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-[11px] text-slate-400 font-semibold uppercase">Dana Terkumpul</p>
                                <p class="text-lg font-bold text-emerald-600">
                                    Rp {{ number_format($campaign->current_amount ?? 0, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-[11px] text-slate-400 font-semibold uppercase">Target Dana</p>
                                <p class="text-sm font-bold text-slate-700">
                                    Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        @php
                            $percentage = $campaign->target_amount > 0 ? min(100, round(($campaign->current_amount / $campaign->target_amount) * 100)) : 0;
                        @endphp
                        <div>
                            <div class="w-full bg-slate-200 rounded-full h-2">
                                <div class="bg-emerald-500 h-2 rounded-full transition-all duration-500" style="width: {{ $percentage }}%"></div>
                            </div>
                            <div class="flex justify-between text-[11px] text-slate-400 mt-1 font-medium">
                                <span>Tercapai {{ $percentage }}%</span>
                                <span>Batas Waktu: {{ $campaign->end_date ? \Carbon\Carbon::parse($campaign->end_date)->translatedFormat('d F Y') : 'Tidak Ada Batas Waktu' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Detail Information Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Deskripsi Lengkap -->
            <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                <h3 class="font-bold text-slate-800 text-base border-b border-slate-100 pb-3">Rincian & Cerita Program</h3>
                <div class="prose prose-slate max-w-none text-xs text-slate-600 leading-relaxed space-y-3">
                    {!! nl2br(e($campaign->description)) !!}
                </div>
            </div>

            <!-- Side Documents / Info Tambahan -->
            <div class="space-y-6">
                <!-- Berkas RAB -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <h3 class="font-bold text-slate-800 text-base border-b border-slate-100 pb-3">Dokumen RAB</h3>

                    @if($campaign->budget_plan_file)
                        <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-rose-100 text-rose-600 rounded-lg">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-700">Berkas RAB</p>
                                    <p class="text-[10px] text-slate-400">Rancangan Anggaran Biaya</p>
                                </div>
                            </div>
                            <a href="{{ Storage::url($campaign->budget_plan_file) }}" target="_blank"
                               class="px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs rounded-lg transition-all">
                                Unduh
                            </a>
                        </div>
                    @else
                        <div class="p-4 bg-slate-50 border border-dashed border-slate-200 rounded-xl text-center text-xs text-slate-400 italic">
                            Belum ada dokumen RAB yang diunggah.
                        </div>
                    @endif
                </div>

                <!-- Informasi Sistem -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-3">
                    <h3 class="font-bold text-slate-800 text-base border-b border-slate-100 pb-3">Informasi Tambahan</h3>

                    <div class="text-xs space-y-2">
                        <div class="flex justify-between py-1 border-b border-slate-50">
                            <span class="text-slate-400">Dibuat Pada</span>
                            <span class="font-semibold text-slate-700">{{ $campaign->created_at ? $campaign->created_at->translatedFormat('d M Y, H:i') : '-' }}</span>
                        </div>
                        <div class="flex justify-between py-1 border-b border-slate-50">
                            <span class="text-slate-400">Terakhir Diperbarui</span>
                            <span class="font-semibold text-slate-700">{{ $campaign->updated_at ? $campaign->updated_at->translatedFormat('d M Y, H:i') : '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-admin-layout>

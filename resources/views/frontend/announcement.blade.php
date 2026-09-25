@if($announcement)
<section id="pengumuman" class="py-12 bg-slate-100 relative -mt-8 z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-amber-500 via-emerald-700 to-emerald-900 rounded-3xl p-1 shadow-2xl overflow-hidden" data-aos="zoom-in" data-aos-duration="800">
            <div class="bg-slate-900/90 backdrop-blur-md rounded-[22px] p-6 sm:p-10 text-white grid lg:grid-cols-12 gap-8 items-center">

                <!-- Sisi Kiri: Informasi Utama -->
                <div class="lg:col-span-8 space-y-4">
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="bg-amber-400 text-slate-900 text-xs font-black px-3.5 py-1.5 rounded-full uppercase tracking-wider flex items-center gap-1.5 shadow-md">
                            <span class="w-2 h-2 rounded-full bg-slate-900 animate-ping"></span>
                            {{ $announcement->badge }}
                        </span>
                        <span class="text-xs text-emerald-300 font-medium">
                            Diperbarui: {{ $announcement->updated_at->translatedFormat('d F Y') }}
                        </span>
                    </div>

                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white leading-tight">
                        {{ $announcement->title }}
                    </h2>

                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                        {{ $announcement->description }}
                    </p>

                    <!-- Atribut Tambahan (Opsional) -->
                    @if($announcement->kuota || $announcement->batas_akhir || $announcement->beasiswa)
                        <div class="pt-2 flex flex-wrap gap-4 text-xs sm:text-sm text-emerald-200">
                            @if($announcement->kuota)
                                <div class="flex items-center gap-2 bg-white/10 px-3.5 py-2 rounded-lg border border-white/10">
                                    📅 <strong>Kuota:</strong> {{ $announcement->kuota }}
                                </div>
                            @endif

                            @if($announcement->batas_akhir)
                                <div class="flex items-center gap-2 bg-white/10 px-3.5 py-2 rounded-lg border border-white/10">
                                    📍 <strong>Batas Akhir:</strong> {{ $announcement->batas_akhir }}
                                </div>
                            @endif

                            @if($announcement->beasiswa)
                                <div class="flex items-center gap-2 bg-white/10 px-3.5 py-2 rounded-lg border border-white/10">
                                    🎁 <strong>Beasiswa:</strong> {{ $announcement->beasiswa }}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Sisi Kanan: Tombol Aksi Dinamis -->
                <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3 justify-center items-stretch">
                    @if($announcement->primary_button_text)
                        <a href="{{ $announcement->primary_button_url ?? '#' }}"
                            target="_blank"
                            class="w-full text-center py-4 px-6 bg-amber-400 text-slate-900 font-extrabold rounded-xl hover:bg-amber-300 shadow-lg shadow-amber-400/20 transition-all duration-300 transform hover:-translate-y-0.5">
                            {{ $announcement->primary_button_text }}
                        </a>
                    @endif

                    @if($announcement->secondary_button_text)
                        @php
                            $secondaryUrl = $announcement->secondary_button_file
                                ? asset('storage/' . $announcement->secondary_button_file)
                                : ($announcement->secondary_button_url ?? '#');
                        @endphp

                        <a href="{{ $secondaryUrl }}"
                            @if($announcement->secondary_button_file) target="_blank" @endif
                            class="w-full text-center py-3.5 px-6 bg-white/10 border border-white/20 text-white font-semibold rounded-xl hover:bg-white/20 transition-all duration-300 flex items-center justify-center gap-2">
                            @if($announcement->secondary_button_file)
                                <!-- Icon Download/File Opsional -->
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            @endif
                            <span>{{ $announcement->secondary_button_text }}</span>
                        </a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</section>
@endif

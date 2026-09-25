<x-guest-layout>
    <main class="py-12 bg-slate-50/60 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Page -->
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="inline-flex items-center gap-1.5 text-emerald-700 font-bold text-xs tracking-wider uppercase bg-emerald-100/80 px-3.5 py-1.5 rounded-full">
                    Masa Bakti 2026 - 2030
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Struktur Organisasi & Pengurus</h1>
                <p class="text-slate-500 mt-2 text-sm">
                    Sinergi pimpinan eksekutif, pengurus harian, seksi-seksi, dan majelis guru Rumah Tahfidz Al-Qur'an Jorong Simabur.
                </p>
            </div>

            <!-- SECTION 1: BAGAN ORGANISASI (TREE VISUAL) -->
            <div class="bg-white p-6 sm:p-10 rounded-3xl border border-slate-200/80 shadow-xs mb-12">
                <h2 class="text-center font-bold text-slate-900 text-lg mb-8">Bagan Alur Organisasi</h2>

                <div class="flex flex-col items-center gap-6 overflow-x-auto pb-4">
                    <!-- Level 0: Pelindung / Penasehat -->
                    <div class="flex gap-4 justify-center flex-wrap">
                        @forelse($pelindung as $item)
                            <div class="bg-slate-100 border border-slate-300 text-slate-800 px-6 py-2.5 rounded-2xl text-center shadow-xs min-w-[240px]">
                                <span class="text-[10px] uppercase font-bold text-slate-500 block tracking-wider">{{ $item->position }}</span>
                                <strong class="text-xs block text-slate-700">{{ $item->name }}</strong>
                            </div>
                        @empty
                            <div class="bg-slate-100 border border-slate-300 text-slate-800 px-6 py-2.5 rounded-2xl text-center shadow-xs min-w-[260px]">
                                <span class="text-[10px] uppercase font-bold text-slate-500 block tracking-wider">Pelindung / Penasehat</span>
                                <strong class="text-xs block text-slate-700">Wali Nagari Simabur & KAN Nagari Simabur</strong>
                            </div>
                        @endforelse
                    </div>

                    <div class="w-0.5 h-5 bg-slate-300"></div>

                    <!-- Level 1: Pimpinan Eksekutif & Pembina -->
                    <div class="flex gap-4 justify-center flex-wrap">
                        @foreach($eksekutif as $item)
                            <div class="bg-emerald-50 border-2 border-emerald-500 text-emerald-900 px-6 py-3 rounded-2xl text-center shadow-xs min-w-[200px]">
                                <span class="text-[10px] uppercase font-bold text-emerald-600 block tracking-wider">{{ $item->position }}</span>
                                <strong class="text-sm block">{{ $item->name }}</strong>
                            </div>
                        @endforeach
                    </div>

                    <div class="w-0.5 h-5 bg-slate-300"></div>

                    <!-- Filter Pengurus Harian -->
                    @php
                        $pimpinanHarian = $pengurus->filter(function($item) {
                            return str_contains(strtolower($item->position), 'ketua');
                        });
                        $stafHarian = $pengurus->reject(function($item) {
                            return str_contains(strtolower($item->position), 'ketua');
                        });
                    @endphp

                    <!-- Level 2: Ketua Umum & Wakil Ketua -->
                    <div class="flex gap-4 justify-center flex-wrap">
                        @foreach($pimpinanHarian as $item)
                            <div class="bg-emerald-600 text-white px-6 py-3 rounded-2xl text-center shadow-md min-w-[200px]">
                                <span class="text-[10px] uppercase font-bold text-emerald-200 block tracking-wider">{{ $item->position }}</span>
                                <strong class="text-sm block">{{ $item->name }}</strong>
                            </div>
                        @endforeach
                    </div>

                    <div class="w-0.5 h-5 bg-slate-300"></div>

                    <!-- Level 3: Sekretaris & Bendahara -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 w-full max-w-3xl">
                        @foreach($stafHarian as $item)
                            <div class="bg-slate-50 border border-slate-200 p-3.5 rounded-xl text-center">
                                <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">{{ $item->position }}</span>
                                <strong class="text-xs text-slate-800 block mt-0.5">{{ $item->name }}</strong>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- SECTION 2: DETAIL SEKSI-SEKSI -->
            <div class="mb-12">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-slate-900">Seksi-Seksi Kinerja</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($seksi as $item)
                        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all flex items-start gap-4">
                            @if($item->avatar)
                                <img src="{{ asset('storage/' . $item->avatar) }}" alt="{{ $item->name }}" class="w-14 h-14 rounded-2xl object-cover border border-slate-100 flex-shrink-0 shadow-sm">
                            @else
                                <div class="w-14 h-14 rounded-2xl bg-emerald-50 border border-emerald-200 flex-shrink-0 flex items-center justify-center text-emerald-700 font-extrabold text-xs">
                                    {{ $item->code ?? 'SEK' }}
                                </div>
                            @endif
                            <div class="overflow-hidden">
                                <span class="text-[10px] uppercase font-bold text-emerald-600 tracking-wider block truncate">{{ $item->position }}</span>
                                <h3 class="font-bold text-slate-900 text-sm mt-1">{{ $item->name }}</h3>
                                @if($item->email_or_phone)
                                    <p class="text-[11px] text-slate-500 mt-1 font-medium flex items-center gap-1">
                                        <span>📱</span> {{ $item->email_or_phone }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 col-span-full">Belum ada data seksi yang ditambahkan.</p>
                    @endforelse
                </div>
            </div>

            <!-- SECTION 3: MAJELIS GURU -->
            <div>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-slate-900">Majelis Guru / Tenaga Pendidik</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($guru as $item)
                        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all flex items-center gap-4">
                            @if($item->avatar)
                                <img src="{{ asset('storage/' . $item->avatar) }}" alt="{{ $item->name }}" class="w-12 h-12 rounded-xl object-cover border border-slate-100 flex-shrink-0 shadow-sm">
                            @else
                                <div class="w-12 h-12 rounded-xl bg-indigo-50 border border-indigo-100 flex-shrink-0 flex items-center justify-center text-indigo-700 font-bold text-xs">
                                    {{ $item->code ?? 'GRU' }}
                                </div>
                            @endif
                            <div class="overflow-hidden">
                                <span class="text-[10px] uppercase font-bold text-indigo-600 tracking-wider block">{{ $item->position }}</span>
                                <h3 class="font-bold text-slate-900 text-sm mt-0.5 truncate">{{ $item->name }}</h3>
                                @if($item->email_or_phone)
                                    <p class="text-[11px] text-slate-500 mt-0.5 font-medium">
                                        Kontak: {{ $item->email_or_phone }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 col-span-full">Belum ada data majelis guru yang ditambahkan.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </main>

    <!-- Panggil Footer dari komponen -->
    <x-footer />
</x-guest-layout>

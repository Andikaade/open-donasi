<x-admin-layout>
    <div class="p-6 space-y-6">

        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Kelola Artikel & Berita</h1>
                <p class="text-sm text-slate-500 mt-1">Atur dan publikasikan berita kegiatan serta perkembangan santri yang tampil di halaman utama.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.artikels.create') ?? '#' }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-emerald-600/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Artikel Baru</span>
                </a>
            </div>
        </div>

        <!-- Ringkasan Status / Kartu Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Artikel</p>
                <h3 class="text-2xl font-bold text-slate-800">
                    {{ isset($artikels) ? $artikels->count() : 3 }}
                </h3>
                <p class="text-xs text-slate-400">Keseluruhan postingan berita</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Artikel Dipublikasi</p>
                <h3 class="text-2xl font-bold text-emerald-600">
                    {{ isset($artikels) ? $artikels->where('status', 'published')->count() : 3 }}
                </h3>
                <p class="text-xs text-slate-400">Tampil aktif di website publik</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Draft / Konsep</p>
                <h3 class="text-2xl font-bold text-amber-500">
                    {{ isset($artikels) ? $artikels->where('status', 'draft')->count() : 0 }}
                </h3>
                <p class="text-xs text-slate-400">Belum dipublikasikan</p>
            </div>
        </div>

        <!-- Section Utama: Tabel Artikel -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

            <!-- Bar Filter & Pencarian -->
            <div class="p-5 border-b border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="w-full md:w-80 relative">
                    <input type="text" placeholder="Cari judul artikel..."
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <div class="w-full md:w-auto flex items-center gap-3">
                    <select class="px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        <option value="">Semua Status</option>
                        <option value="published">Dipublikasikan</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50/80 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4">Gambar & Judul Artikel</th>
                            <th class="px-6 py-4">Ringkasan Konten</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Tanggal Rilis</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">

                        @forelse($artikels ?? [] as $item)
                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4 max-w-xs">
                                    <div class="flex items-center gap-3">
                                        <div class="w-14 h-10 rounded-lg bg-slate-100 overflow-hidden flex-shrink-0 border border-slate-200">
                                            @if(!empty($item->image))
                                                <img src="{{ asset('storage/' . $item->image) }}" alt="Thumbnail" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-slate-400 text-[10px]">No Pic</div>
                                            @endif
                                        </div>
                                        <div class="font-bold text-slate-800 line-clamp-2">
                                            {{ $item->title }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-slate-500 text-[11px] max-w-sm">
                                    <p class="line-clamp-2">{{ $item->excerpt ?? Str::limit(strip_tags($item->content), 80) }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    @if(($item->status ?? 'published') == 'published')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Aktif
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                            Draft
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-slate-500 text-[11px] whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.artikels.edit', $item->id) ?? '#' }}"
                                           class="px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white rounded-lg font-semibold text-xs transition-colors">
                                            Edit
                                        </a>
                                        <button class="px-3 py-1.5 bg-rose-500 hover:bg-rose-600 text-white rounded-lg font-semibold text-xs transition-colors">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <!-- Dummy Data (Tampilan Sementara jika data DB belum diisi) -->
                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4 max-w-xs">
                                    <div class="flex items-center gap-3">
                                        <div class="w-14 h-10 rounded-lg bg-emerald-100 flex-shrink-0 flex items-center justify-center text-emerald-600 font-bold text-xs">
                                            IMG
                                        </div>
                                        <div class="font-bold text-slate-800 line-clamp-2">
                                            Ujian Tasmi' 3 Juz Santri Angkatan Ke-2
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-slate-500 text-[11px] max-w-sm">
                                    <p class="line-clamp-2">Alhamdulillah, sebanyak 10 santri berhasil menuntaskan hafalan dengan predikat mumtaz.</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500 text-[11px] whitespace-nowrap">
                                    15 Februari 2026
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white rounded-lg font-semibold text-xs transition-colors">Edit</button>
                                        <button class="px-3 py-1.5 bg-rose-500 hover:bg-rose-600 text-white rounded-lg font-semibold text-xs transition-colors">Hapus</button>
                                    </div>
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4 max-w-xs">
                                    <div class="flex items-center gap-3">
                                        <div class="w-14 h-10 rounded-lg bg-emerald-100 flex-shrink-0 flex items-center justify-center text-emerald-600 font-bold text-xs">
                                            IMG
                                        </div>
                                        <div class="font-bold text-slate-800 line-clamp-2">
                                            Penyaluran Menu MBG Sehat Pekan Ke-2
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-slate-500 text-[11px] max-w-sm">
                                    <p class="line-clamp-2">Pemberian nutrisi berupa susu, buah, dan makanan bergizi untuk mendukung hafalan harian santri.</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500 text-[11px] whitespace-nowrap">
                                    10 Februari 2026
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white rounded-lg font-semibold text-xs transition-colors">Edit</button>
                                        <button class="px-3 py-1.5 bg-rose-500 hover:bg-rose-600 text-white rounded-lg font-semibold text-xs transition-colors">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <!-- Footer Tabel -->
            <div class="p-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <p>Menampilkan data artikel & berita santri</p>
            </div>

        </div>

    </div>
</x-admin-layout>

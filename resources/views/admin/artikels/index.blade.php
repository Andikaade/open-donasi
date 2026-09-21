<x-admin-layout>
    <div class="p-2 space-y-6">

        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Kelola Artikel & Berita</h1>
                <p class="text-sm text-slate-500 mt-1">Atur dan publikasikan berita kegiatan serta perkembangan santri yang tampil di halaman utama.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.artikels.create') }}"
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
                    {{ isset($artikels) ? $artikels->count() : 0 }}
                </h3>
                <p class="text-xs text-slate-400">Keseluruhan postingan berita</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Artikel Dipublikasi</p>
                <h3 class="text-2xl font-bold text-emerald-600">
                    {{ isset($artikels) ? $artikels->whereNotNull('published_at')->count() : 0 }}
                </h3>
                <p class="text-xs text-slate-400">Tampil aktif di website publik</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Draft / Konsep</p>
                <h3 class="text-2xl font-bold text-amber-500">
                    {{ isset($artikels) ? $artikels->whereNull('published_at')->count() : 0 }}
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
                                    <p class="line-clamp-2">{{ $item->excerpt ?? Str::limit(strip_tags($item->body), 80) }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    @if(!empty($item->published_at))
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
                                    {{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') : '-' }}
                                </td>
                               <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-3">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('admin.artikels.edit', $item->id) }}"
                                        class="p-1.5 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors"
                                        title="Edit Artikel">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('admin.artikels.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors"
                                                    title="Hapus Artikel">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l5 5v11a2 2 0 01-2 2z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 4v5h5"/>
                                        </svg>
                                        <p class="text-sm font-medium">Belum ada artikel yang ditambahkan.</p>
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

<x-admin-layout>
    <div class="p-6 space-y-6">

        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Kelola Pengumuman</h1>
                <p class="text-sm text-slate-500 mt-1">Atur dan publikasikan pengumuman penting yang akan tampil di halaman depan (frontend).</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.announcements.create') ?? '#' }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-emerald-600/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Pengumuman Baru</span>
                </a>
            </div>
        </div>

        <!-- Ringkasan Status -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Pengumuman</p>
                <h3 class="text-2xl font-bold text-slate-800">
                    {{ isset($announcements) ? $announcements->count() : 1 }}
                </h3>
                <p class="text-xs text-slate-400">Keseluruhan pengumuman terdaftar</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pengumuman Aktif</p>
                <h3 class="text-2xl font-bold text-emerald-600">
                    {{ isset($announcements) ? $announcements->where('is_active', true)->count() : 1 }}
                </h3>
                <p class="text-xs text-slate-400">Tampil di halaman utama</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Non-Aktif / Draf</p>
                <h3 class="text-2xl font-bold text-slate-400">
                    {{ isset($announcements) ? $announcements->where('is_active', false)->count() : 0 }}
                </h3>
                <p class="text-xs text-slate-400">Disembunyikan dari publik</p>
            </div>
        </div>

        <!-- Main Section: Tabel Pengumuman -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

            <!-- Filter & Search Bar -->
            <div class="p-5 border-b border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="w-full md:w-80 relative">
                    <input type="text" placeholder="Cari judul pengumuman..."
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
                        <option value="1">Aktif</option>
                        <option value="0">Non-Aktif</option>
                    </select>
                </div>
            </div>

            <!-- Tabel Data Pengumuman -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50/80 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4">Badge / Label</th>
                            <th class="px-6 py-4">Judul Pengumuman</th>
                            <th class="px-6 py-4">Atribut / Info</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Terakhir Diperbarui</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">

                        @forelse($announcements ?? [] as $item)
                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 bg-amber-100 text-amber-800 rounded-md text-[10px] font-black uppercase tracking-wider">
                                        {{ $item->badge ?? 'PENGUMUMAN PENTING' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 max-w-xs">
                                    <div class="font-bold text-slate-800 line-clamp-1">{{ $item->title }}</div>
                                    <div class="text-[11px] text-slate-400 line-clamp-1 mt-0.5">{{ $item->description }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="space-y-1 text-[11px] text-slate-500">
                                        @if($item->kuota) <div>• Kuota: {{ $item->kuota }}</div> @endif
                                        @if($item->batas_akhir) <div>• Batas: {{ $item->batas_akhir }}</div> @endif
                                        @if($item->beasiswa) <div>• Beasiswa: {{ $item->beasiswa }}</div> @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($item->is_active)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Aktif
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-slate-100 text-slate-500 rounded-full text-[10px] font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                            Non-Aktif
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-slate-400">
                                    {{ $item->updated_at ? $item->updated_at->format('d M Y H:i') : '-' }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.announcements.edit', $item->id) ?? '#' }}"
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
                            <!-- Dummy Data Tampilan saat belum disambungkan ke Controller -->
                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 bg-amber-100 text-amber-800 rounded-md text-[10px] font-black uppercase tracking-wider">
                                        PENGUMUMAN PENTING
                                    </span>
                                </td>
                                <td class="px-6 py-4 max-w-xs">
                                    <div class="font-bold text-slate-800 line-clamp-1">Pendaftaran Santri Baru Rumah Tahfiz Angkatan 2026 Resmikan Dibuka!</div>
                                    <div class="text-[11px] text-slate-400 line-clamp-1 mt-0.5">Kesempatan emas bagi putra-putri untuk menghafal Al-Qur'an dengan fasilitas beasiswa penuh...</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="space-y-0.5 text-[11px] text-slate-500">
                                        <div>• Kuota: 30 Santri</div>
                                        <div>• Batas: 15 Maret 2026</div>
                                        <div>• Beasiswa: Gratis 100%</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-400">16 Feb 2026 08:00</td>
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

            <!-- Footer / Pagination Info -->
            <div class="p-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <p>Menampilkan data pengumuman</p>
            </div>

        </div>

    </div>
</x-admin-layout>

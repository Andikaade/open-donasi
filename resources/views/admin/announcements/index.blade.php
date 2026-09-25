<x-admin-layout>
    <div class="p-2 space-y-6">

        <!-- Alert Notifikasi Flash Message -->
        @if(session('success'))
            <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-xs font-semibold flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">✕</button>
            </div>
        @endif

        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Kelola Pengumuman</h1>
                <p class="text-sm text-slate-500 mt-1">Atur dan publikasikan pengumuman penting yang akan tampil di halaman depan (frontend).</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.announcements.create') }}"
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
                    {{ $stats['total'] ?? 0 }}
                </h3>
                <p class="text-xs text-slate-400">Keseluruhan pengumuman terdaftar</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pengumuman Aktif</p>
                <h3 class="text-2xl font-bold text-emerald-600">
                    {{ $stats['active'] ?? 0 }}
                </h3>
                <p class="text-xs text-slate-400">Tampil di halaman utama</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Non-Aktif / Draf</p>
                <h3 class="text-2xl font-bold text-slate-400">
                    {{ $stats['inactive'] ?? 0 }}
                </h3>
                <p class="text-xs text-slate-400">Disembunyikan dari publik</p>
            </div>
        </div>

        <!-- Main Section: Tabel Pengumuman -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

            <!-- Filter & Search Bar Form -->
            <form method="GET" action="{{ route('admin.announcements.index') }}" class="p-5 border-b border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="w-full md:w-80 relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul pengumuman..."
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <div class="w-full md:w-auto flex items-center gap-3">
                    <select name="is_active" onchange="this.form.submit()" class="px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        <option value="">Semua Status</option>
                        <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>

                    @if(request('search') || request()->has('is_active'))
                        <a href="{{ route('admin.announcements.index') }}" class="text-xs font-semibold text-rose-500 hover:text-rose-700 transition-colors">
                            Reset Filter
                        </a>
                    @endif
                </div>
            </form>

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

                        @forelse($announcements as $item)
                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 bg-amber-100 text-amber-800 rounded-md text-[10px] font-black uppercase tracking-wider">
                                        {{ $item->badge }}
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
                                        @if(!$item->kuota && !$item->batas_akhir && !$item->beasiswa) <div class="text-slate-400">-</div> @endif
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
                                    <div class="flex items-center justify-center gap-3">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('admin.announcements.edit', $item->id) }}"
                                           class="p-1.5 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all"
                                           title="Edit Pengumuman">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('admin.announcements.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-all"
                                                    title="Hapus Pengumuman">
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
                                <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                        </svg>
                                        <span>Belum ada data pengumuman yang ditemukan.</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <!-- Footer / Pagination Info -->
            <div class="p-4 border-t border-slate-100">
                {{ $announcements->links() }}
            </div>

        </div>

    </div>
</x-admin-layout>

<x-admin-layout>
    <div class="p-2 space-y-6">

        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Kelola Struktur Organisasi</h1>
                <p class="text-sm text-slate-500 mt-1">Atur daftar pembina, pengurus harian, seksi-seksi, dan majelis guru Rumah Tahfidz (Masa Bakti 2026 - 2030).</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.structures.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-emerald-600/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Anggota Baru</span>
                </a>
            </div>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <!-- Ringkasan Status / Statistik (Compact) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
            <div class="p-3.5 bg-white rounded-xl border border-slate-100 shadow-sm flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Anggota</span>
                <span class="text-xl font-bold text-slate-800">{{ $stats['total'] }}</span>
            </div>

            <div class="p-3.5 bg-white rounded-xl border border-slate-100 shadow-sm flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pembina & Penasehat</span>
                <span class="text-xl font-bold text-emerald-600">{{ $stats['pembina'] }}</span>
            </div>

            <div class="p-3.5 bg-white rounded-xl border border-slate-100 shadow-sm flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pengurus</span>
                <span class="text-xl font-bold text-sky-600">{{ $stats['pengurus'] }}</span>
            </div>

            <div class="p-3.5 bg-white rounded-xl border border-slate-100 shadow-sm flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Seksi-Seksi</span>
                <span class="text-xl font-bold text-amber-600">{{ $stats['seksi'] }}</span>
            </div>

            <div class="p-3.5 bg-white rounded-xl border border-slate-100 shadow-sm flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Majelis Guru</span>
                <span class="text-xl font-bold text-indigo-600">{{ $stats['guru'] }}</span>
            </div>
        </div>

        <!-- Main Section: Tabel Pengurus -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

            <!-- Filter & Search Bar -->
            <form method="GET" action="{{ route('admin.structures.index') }}" class="p-5 border-b border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="w-full md:w-80 relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, jabatan, atau kode..."
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <div class="w-full md:w-auto flex items-center gap-3">
                    <select name="category" onchange="this.form.submit()" class="px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        <option value="">Semua Divisi / Kategori</option>
                        <option value="pelindung" {{ request('category') == 'pelindung' ? 'selected' : '' }}>Pelindung / Penasehat</option>
                        <option value="eksekutif" {{ request('category') == 'eksekutif' ? 'selected' : '' }}>Pimpinan Eksekutif / Pembina</option>
                        <option value="pengurus_harian" {{ request('category') == 'pengurus_harian' ? 'selected' : '' }}>Pengurus Harian</option>
                        <option value="seksi" {{ request('category') == 'seksi' ? 'selected' : '' }}>Seksi-Seksi</option>
                        <option value="guru" {{ request('category') == 'guru' ? 'selected' : '' }}>Majelis Guru</option>
                    </select>

                    @if(request('search') || request('category'))
                        <a href="{{ route('admin.structures.index') }}" class="px-3 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-xs font-semibold transition-all">
                            Reset
                        </a>
                    @endif
                </div>
            </form>

            <!-- Tabel Data -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50/80 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4">Foto & Nama</th>
                            <th class="px-6 py-4">Jabatan</th>
                            <th class="px-6 py-4">Kategori / Divisi</th>
                            <th class="px-6 py-4">No. HP / E-mail</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">

                        @forelse($members as $item)
                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @if($item->avatar)
                                            <img src="{{ asset('storage/' . $item->avatar) }}" alt="{{ $item->name }}" class="w-9 h-9 rounded-full object-cover border border-slate-100 shadow-sm">
                                        @else
                                            <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs uppercase">
                                                {{ $item->code ?? substr($item->name, 0, 3) }}
                                            </div>
                                        @endif
                                        <div>
                                            <div class="font-bold text-slate-800">{{ $item->name }}</div>
                                            @if($item->code)
                                                <div class="text-[11px] text-slate-400">Kode: {{ $item->code }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-slate-700">
                                    {{ $item->position }}
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $badgeClasses = match($item->category) {
                                            'pelindung' => 'bg-slate-100 text-slate-700',
                                            'pembina', 'eksekutif' => 'bg-emerald-100 text-emerald-800',
                                            'pengurus_harian' => 'bg-sky-100 text-sky-800',
                                            'seksi' => 'bg-amber-100 text-amber-800',
                                            'guru' => 'bg-indigo-100 text-indigo-800',
                                            default => 'bg-slate-100 text-slate-700',
                                        };
                                    @endphp
                                    <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider {{ $badgeClasses }}">
                                        {{ str_replace('_', ' ', $item->category) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-600 text-xs font-medium">
                                    {{ $item->email_or_phone ?? '-' }}
                                </td>
                               <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-3">
                                        <!-- Tombol Edit (Ikon Pensil) -->
                                        <a href="{{ route('admin.structures.edit', $item->id) }}"
                                        class="p-1.5 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all"
                                        title="Edit Data">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>

                                        <!-- Tombol Hapus (Ikon Tempat Sampah) -->
                                        <form action="{{ route('admin.structures.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-all"
                                                    title="Hapus Data">
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
                                <td colspan="5" class="px-6 py-8 text-center text-slate-400">
                                    <p class="text-sm font-semibold">Data tidak ditemukan.</p>
                                    <p class="text-xs mt-1">Belum ada anggota yang terdaftar atau hasil pencarian tidak sesuai.</p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <!-- Footer / Pagination -->
            <div class="p-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>
                    Menampilkan
                    <span class="font-semibold text-slate-700">{{ $members->firstItem() ?? 0 }}</span>
                    sampai
                    <span class="font-semibold text-slate-700">{{ $members->lastItem() ?? 0 }}</span>
                    dari
                    <span class="font-semibold text-slate-700">{{ $members->total() }}</span> data
                </p>

                <div>
                    {{ $members->links() }}
                </div>
            </div>

        </div>

    </div>
</x-admin-layout>

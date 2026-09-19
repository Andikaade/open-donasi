<x-admin-layout>
    <div class="p-2 space-y-6">

        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Kelola Struktur Organisasi</h1>
                <p class="text-sm text-slate-500 mt-1">Atur daftar dewan pembina, pengurus harian, dan tenaga pendidik Rumah Tahfiz.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.structures.create') ?? '#' }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-emerald-600/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Anggota Baru</span>
                </a>
            </div>
        </div>

        <!-- Ringkasan Status / Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Anggota</p>
                <h3 class="text-2xl font-bold text-slate-800">
                    {{ isset($members) ? $members->count() : 6 }}
                </h3>
                <p class="text-xs text-slate-400">Keseluruhan pengurus & staf</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Dewan Pembina</p>
                <h3 class="text-2xl font-bold text-emerald-600">
                    {{ isset($members) ? $members->where('role', 'pembina')->count() : 1 }}
                </h3>
                <p class="text-xs text-slate-400">Penasihat & pembina utama</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pengurus Harian</p>
                <h3 class="text-2xl font-bold text-sky-600">
                    {{ isset($members) ? $members->where('role', 'pengurus')->count() : 2 }}
                </h3>
                <p class="text-xs text-slate-400">Ketua, sekretaris, bendahara</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Tenaga Pendidik</p>
                <h3 class="text-2xl font-bold text-indigo-600">
                    {{ isset($members) ? $members->where('role', 'pendidik')->count() : 3 }}
                </h3>
                <p class="text-xs text-slate-400">Ustadz & pengajar tahfiz</p>
            </div>
        </div>

        <!-- Main Section: Tabel Pengurus -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

            <!-- Filter & Search Bar -->
            <div class="p-5 border-b border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="w-full md:w-80 relative">
                    <input type="text" placeholder="Cari nama pengurus..."
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <div class="w-full md:w-auto flex items-center gap-3">
                    <select class="px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        <option value="">Semua Divisi / Kategori</option>
                        <option value="pembina">Dewan Pembina</option>
                        <option value="pengurus">Pengurus Harian</option>
                        <option value="pendidik">Tenaga Pendidik</option>
                    </select>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50/80 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4">Nama & Inisial</th>
                            <th class="px-6 py-4">Jabatan</th>
                            <th class="px-6 py-4">Kategori / Divisi</th>
                            <th class="px-6 py-4">Kontak / Catatan</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">

                        @forelse($members ?? [] as $item)
                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs uppercase">
                                            {{ $item->code ?? substr($item->name, 0, 3) }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800">{{ $item->name }}</div>
                                            <div class="text-[11px] text-slate-400">{{ $item->email ?? '-' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-slate-700">
                                    {{ $item->position }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-slate-100 text-slate-700">
                                        {{ $item->category }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500 text-[11px]">
                                    {{ $item->note ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.struktur.edit', $item->id) ?? '#' }}"
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
                            <!-- Dummy Data Tampilan awal -->
                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs uppercase">
                                            UST
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800">Nama Pembina / Tokoh</div>
                                            <div class="text-[11px] text-slate-400">pembina@rumahtahfiz.or.id</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-slate-700">Pembina Utama</td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-emerald-100 text-emerald-800">
                                        PEMBINA / PENASIHAT
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500 text-[11px]">Mengarahkan kebijakan & spiritualitas</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white rounded-lg font-semibold text-xs transition-colors">Edit</button>
                                        <button class="px-3 py-1.5 bg-rose-500 hover:bg-rose-600 text-white rounded-lg font-semibold text-xs transition-colors">Hapus</button>
                                    </div>
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs uppercase">
                                            KUA
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800">Nama Ketua Harian</div>
                                            <div class="text-[11px] text-slate-400">+62 812-3456-7890</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-slate-700">Ketua Harian</td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-sky-100 text-sky-800">
                                        KETUA PENGURUS
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500 text-[11px]">Penanggung jawab operasional harian</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white rounded-lg font-semibold text-xs transition-colors">Edit</button>
                                        <button class="px-3 py-1.5 bg-rose-500 hover:bg-rose-600 text-white rounded-lg font-semibold text-xs transition-colors">Hapus</button>
                                    </div>
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs uppercase">
                                            ADM
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800">Nama Bendahara</div>
                                            <div class="text-[11px] text-slate-400">keuangan@rumahtahfiz.or.id</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-slate-700">Bendahara & Administrasi</td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-sky-100 text-sky-800">
                                        KEUANGAN & ADM
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500 text-[11px]">Pengelola pencatatan keuangan donasi</td>
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
                <p>Menampilkan data pengurus & tenaga pendidik</p>
            </div>

        </div>

    </div>
</x-admin-layout>

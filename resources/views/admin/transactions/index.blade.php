<x-admin-layout>
    <div class="p-6 space-y-6" x-data="{ activeTab: 'masuk' }">

        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Laporan Keuangan</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola dan pantau seluruh arus kas masuk (donasi) serta kas keluar operasional.</p>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-emerald-600/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Eksport Laporan</span>
                </button>
            </div>
        </div>

        <!-- Ringkasan Statistik Keuangan -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Kas Masuk</p>
                <h3 class="text-2xl font-bold text-emerald-600">
                    Rp {{ number_format($totalKasMasuk ?? 15750000, 0, ',', '.') }}
                </h3>
                <p class="text-xs text-slate-400">Total donasi berhasil</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Kas Keluar</p>
                <h3 class="text-2xl font-bold text-rose-600">
                    Rp {{ number_format($totalKasKeluar ?? 4200000, 0, ',', '.') }}
                </h3>
                <p class="text-xs text-slate-400">Total pengeluaran operasional</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Saldo / Kas Bersih</p>
                <h3 class="text-2xl font-bold text-sky-600">
                    Rp {{ number_format(($totalKasMasuk ?? 15750000) - ($totalKasKeluar ?? 4200000), 0, ',', '.') }}
                </h3>
                <p class="text-xs text-slate-400">Sisa dana tersedia</p>
            </div>
        </div>

        <!-- Tab Navigasi & Main Content -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

            <!-- Tab Headers -->
            <div class="border-b border-slate-100 px-6 pt-4 flex items-center justify-between gap-4">
                <div class="flex items-center gap-6">
                    <button @click="activeTab = 'masuk'"
                        :class="activeTab === 'masuk' ? 'border-emerald-600 text-emerald-600 font-bold' : 'border-transparent text-slate-400 hover:text-slate-600 font-medium'"
                        class="pb-4 border-b-2 text-sm transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                        <span>Kas Masuk (Donasi)</span>
                    </button>

                    <button @click="activeTab = 'keluar'"
                        :class="activeTab === 'keluar' ? 'border-rose-600 text-rose-600 font-bold' : 'border-transparent text-slate-400 hover:text-slate-600 font-medium'"
                        class="pb-4 border-b-2 text-sm transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                        <span>Kas Keluar (Pengeluaran)</span>
                    </button>
                </div>

                <!-- Tombol Tambah Pengeluaran (Hanya muncul saat Tab Kas Keluar) -->
                <div x-show="activeTab === 'keluar'">
                    <button class="mb-3 px-3.5 py-1.5 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-semibold transition-all">
                        + Catat Kas Keluar
                    </button>
                </div>
            </div>

            <!-- Filter & Search Bar -->
            <div class="p-5 border-b border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4 bg-slate-50/50">
                <div class="w-full md:w-80 relative">
                    <input type="text" placeholder="Cari transaksi..."
                        class="w-full pl-10 pr-4 py-2 bg-white border border-slate-200 rounded-xl text-xs font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                </div>

                <div class="w-full md:w-auto flex items-center gap-3">
                    <input type="date" class="px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none">
                </div>
            </div>

            <!-- Content TAB 1: Kas Masuk -->
            <div x-show="activeTab === 'masuk'" class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4">Kode Trx</th>
                            <th class="px-6 py-4">Donatur</th>
                            <th class="px-6 py-4">Program</th>
                            <th class="px-6 py-4">Nominal</th>
                            <th class="px-6 py-4">Metode</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-6 py-4 font-bold text-slate-800">DON-172491201</td>
                            <td class="px-6 py-4">Budi Santoso</td>
                            <td class="px-6 py-4">Dapur Tahfiz MBG</td>
                            <td class="px-6 py-4 font-bold text-emerald-600">Rp 250.000</td>
                            <td class="px-6 py-4">QRIS</td>
                            <td class="px-6 py-4"><span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">Berhasil</span></td>
                            <td class="px-6 py-4 text-slate-400">14 Sep 2026</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Content TAB 2: Kas Keluar -->
            <div x-show="activeTab === 'keluar'" class="overflow-x-auto" x-cloak>
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4">Kode Keluar</th>
                            <th class="px-6 py-4">Keterangan / Keperluan</th>
                            <th class="px-6 py-4">Kategori Program</th>
                            <th class="px-6 py-4">Nominal</th>
                            <th class="px-6 py-4">Penanggung Jawab</th>
                            <th class="px-6 py-4">Tanggal</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-6 py-4 font-bold text-slate-800">OUT-202609001</td>
                            <td class="px-6 py-4">Pembelian Bahan Pangan Dapur Santri</td>
                            <td class="px-6 py-4">Dapur Tahfiz MBG</td>
                            <td class="px-6 py-4 font-bold text-rose-600">Rp 1.500.000</td>
                            <td class="px-6 py-4">Pengurus Rumah Tahfiz</td>
                            <td class="px-6 py-4 text-slate-400">12 Sep 2026</td>
                            <td class="px-6 py-4 text-center">
                                <button class="px-3 py-1 bg-amber-500 text-white rounded-lg text-[11px]">Edit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</x-admin-layout>

<x-admin-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 leading-tight">
                    {{ __('Dashboard Overview') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">Selamat datang kembali! Ringkasan statistik dan aktivitas donasi hari ini.</p>
            </div>

            <!-- Quick Actions Button -->
            <div class="flex items-center gap-3">
                <a href="#"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs rounded-xl shadow-md shadow-emerald-600/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span>Tambah Program</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-2 space-y-6">

        <!-- 1. KARTU STATISTIK UTAMA -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            <!-- Card 1: Total Donasi -->
            <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm relative overflow-hidden">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total Donasi Terkumpul</p>
                        <h3 class="text-xl font-extrabold text-slate-800 mt-1">
                            Rp {{ number_format($totalDonation ?? 128500000, 0, ',', '.') }}
                        </h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs text-emerald-600 font-medium gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    <span>+12.5% bulan ini</span>
                </div>
            </div>

            <!-- Card 2: Total Donatur -->
            <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total Donatur</p>
                        <h3 class="text-xl font-extrabold text-slate-800 mt-1">
                            {{ number_format($totalDonors ?? 1420, 0, ',', '.') }} <span class="text-xs font-normal text-slate-400">Orang</span>
                        </h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs text-emerald-600 font-medium gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    <span>+48 donatur baru minggu ini</span>
                </div>
            </div>

            <!-- Card 3: Program Aktif -->
            <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Program Donasi Aktif</p>
                        <h3 class="text-xl font-extrabold text-slate-800 mt-1">
                            {{ $activeCampaignsCount ?? 8 }} <span class="text-xs font-normal text-slate-400">Campaign</span>
                        </h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs text-slate-500 font-medium">
                    <span>Dari total {{ $totalCampaignsCount ?? 12 }} program terdaftar</span>
                </div>
            </div>

            <!-- Card 4: Donasi Pending -->
            <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Perlu Verifikasi (Pending)</p>
                        <h3 class="text-xl font-extrabold text-amber-600 mt-1">
                            {{ $pendingDonationsCount ?? 5 }} <span class="text-xs font-normal text-slate-400">Transaksi</span>
                        </h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs text-purple-600 font-medium">
                    <a href="#" class="hover:underline">Lihat & Verifikasi &rarr;</a>
                </div>
            </div>

        </div>

        <!-- 2. GRAFIK & PROGRAM TOP -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            <!-- Chart Tren Donasi -->
            <div class="lg:col-span-8 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-slate-800 text-base">Grafik Tren Donasi (2026)</h3>
                        <p class="text-xs text-slate-400">Perbandingan perolehan donasi per bulan</p>
                    </div>
                    <span class="text-xs font-semibold px-2.5 py-1 bg-slate-100 text-slate-600 rounded-lg">Tahun Ini</span>
                </div>

                <div class="h-64 flex items-end justify-between gap-2 pt-6 px-2">
                    <div class="w-full bg-emerald-100 hover:bg-emerald-500 rounded-t-lg transition-all h-[30%] relative group">
                        <span class="absolute -top-7 left-1/2 -translate-x-1/2 hidden group-hover:block bg-slate-800 text-white text-[10px] px-2 py-0.5 rounded shadow">15M</span>
                    </div>
                    <div class="w-full bg-emerald-100 hover:bg-emerald-500 rounded-t-lg transition-all h-[45%] relative group">
                        <span class="absolute -top-7 left-1/2 -translate-x-1/2 hidden group-hover:block bg-slate-800 text-white text-[10px] px-2 py-0.5 rounded shadow">22M</span>
                    </div>
                    <div class="w-full bg-emerald-100 hover:bg-emerald-500 rounded-t-lg transition-all h-[60%] relative group">
                        <span class="absolute -top-7 left-1/2 -translate-x-1/2 hidden group-hover:block bg-slate-800 text-white text-[10px] px-2 py-0.5 rounded shadow-[10px]">35M</span>
                    </div>
                    <div class="w-full bg-emerald-100 hover:bg-emerald-500 rounded-t-lg transition-all h-[40%] relative group">
                        <span class="absolute -top-7 left-1/2 -translate-x-1/2 hidden group-hover:block bg-slate-800 text-white text-[10px] px-2 py-0.5 rounded shadow">18M</span>
                    </div>
                    <div class="w-full bg-emerald-100 hover:bg-emerald-500 rounded-t-lg transition-all h-[75%] relative group">
                        <span class="absolute -top-7 left-1/2 -translate-x-1/2 hidden group-hover:block bg-slate-800 text-white text-[10px] px-2 py-0.5 rounded shadow">48M</span>
                    </div>
                    <div class="w-full bg-emerald-100 hover:bg-emerald-500 rounded-t-lg transition-all h-[55%] relative group">
                        <span class="absolute -top-7 left-1/2 -translate-x-1/2 hidden group-hover:block bg-slate-800 text-white text-[10px] px-2 py-0.5 rounded shadow">28M</span>
                    </div>
                    <div class="w-full bg-emerald-100 hover:bg-emerald-500 rounded-t-lg transition-all h-[80%] relative group">
                        <span class="absolute -top-7 left-1/2 -translate-x-1/2 hidden group-hover:block bg-slate-800 text-white text-[10px] px-2 py-0.5 rounded shadow">52M</span>
                    </div>
                    <div class="w-full bg-emerald-600 rounded-t-lg transition-all h-[95%] relative group shadow-lg shadow-emerald-600/30">
                        <span class="absolute -top-7 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] px-2 py-0.5 rounded shadow">68M</span>
                    </div>
                </div>

                <div class="flex justify-between text-[11px] text-slate-400 border-t border-slate-100 pt-3">
                    <span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>Mei</span><span>Jun</span><span>Jul</span><span class="font-bold text-emerald-600">Agu</span>
                </div>
            </div>

            <!-- Program Terpopuler -->
            <div class="lg:col-span-4 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="font-bold text-slate-800 text-base">Program Unggulan</h3>
                    <a href="#" class="text-xs text-emerald-600 font-semibold hover:underline">Semua</a>
                </div>

                <div class="space-y-4">
                    <!-- Item 1 -->
                    <div class="space-y-2 border-b border-slate-100 pb-3">
                        <div class="flex justify-between text-xs">
                            <span class="font-semibold text-slate-800 truncate max-w-[180px]">Dapur Tahfiz: Makan Bergizi</span>
                            <span class="font-bold text-emerald-600">85%</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                            <div class="bg-emerald-500 h-full rounded-full" style="width: 85%"></div>
                        </div>
                        <div class="flex justify-between text-[10px] text-slate-400">
                            <span>Terkumpul: Rp 12.7M</span>
                            <span>Target: Rp 15M</span>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="space-y-2 border-b border-slate-100 pb-3">
                        <div class="flex justify-between text-xs">
                            <span class="font-semibold text-slate-800 truncate max-w-[180px]">Wakaf Qur'an Hafiz</span>
                            <span class="font-bold text-emerald-600">60%</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                            <div class="bg-emerald-500 h-full rounded-full" style="width: 60%"></div>
                        </div>
                        <div class="flex justify-between text-[10px] text-slate-400">
                            <span>Terkumpul: Rp 30M</span>
                            <span>Target: Rp 50M</span>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="space-y-2">
                        <div class="flex justify-between text-xs">
                            <span class="font-semibold text-slate-800 truncate max-w-[180px]">Beasiswa Santri Yatim</span>
                            <span class="font-bold text-emerald-600">42%</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                            <div class="bg-emerald-500 h-full rounded-full" style="width: 42%"></div>
                        </div>
                        <div class="flex justify-between text-[10px] text-slate-400">
                            <span>Terkumpul: Rp 21M</span>
                            <span>Target: Rp 50M</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- 3. TABEL TRANSAKSI TERBARU -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-6 flex items-center justify-between border-b border-slate-100">
                <div>
                    <h3 class="font-bold text-slate-800 text-base">Transaksi Donasi Terbaru</h3>
                    <p class="text-xs text-slate-400">10 transaksi donasi yang baru saja masuk</p>
                </div>
                <a href="#" class="text-xs font-semibold px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg transition-all">
                    Lihat Semua
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 text-slate-400 uppercase font-semibold text-[10px] tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-3.5">Kode Transaksi</th>
                            <th class="px-6 py-3.5">Donatur</th>
                            <th class="px-6 py-3.5">Program</th>
                            <th class="px-6 py-3.5">Nominal</th>
                            <th class="px-6 py-3.5">Status</th>
                            <th class="px-6 py-3.5">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">

                        <!-- Row 1 -->
                        <tr class="hover:bg-slate-50/80 transition-all">
                            <td class="px-6 py-4 font-bold text-slate-800">DON-172491201</td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-slate-800">Budi Santoso</div>
                                <div class="text-[11px] text-slate-400">budi@gmail.com</div>
                            </td>
                            <td class="px-6 py-4 truncate max-w-[200px]">Dapur Tahfiz: Makan Bergizi Gratis</td>
                            <td class="px-6 py-4 font-bold text-emerald-600">Rp 250.000</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">Success</span>
                            </td>
                            <td class="px-6 py-4 text-slate-400">2 Menit yang lalu</td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="hover:bg-slate-50/80 transition-all">
                            <td class="px-6 py-4 font-bold text-slate-800">DON-172491185</td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-slate-800">Hamba Allah</div>
                                <div class="text-[11px] text-slate-400">Anonim</div>
                            </td>
                            <td class="px-6 py-4 truncate max-w-[200px]">Wakaf Qur'an Hafiz</td>
                            <td class="px-6 py-4 font-bold text-emerald-600">Rp 1.000.000</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">Success</span>
                            </td>
                            <td class="px-6 py-4 text-slate-400">15 Menit yang lalu</td>
                        </tr>

                        <!-- Row 3 -->
                        <tr class="hover:bg-slate-50/80 transition-all">
                            <td class="px-6 py-4 font-bold text-slate-800">DON-172491099</td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-slate-800">Siti Rahma</div>
                                <div class="text-[11px] text-slate-400">siti.rahma@yahoo.com</div>
                            </td>
                            <td class="px-6 py-4 truncate max-w-[200px]">Beasiswa Santri Yatim</td>
                            <td class="px-6 py-4 font-bold text-amber-600">Rp 100.000</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 bg-amber-100 text-amber-700 rounded-full text-[10px] font-bold">Pending</span>
                            </td>
                            <td class="px-6 py-4 text-slate-400">1 Jam yang lalu</td>
                        </tr>

                        <!-- Row 4 -->
                        <tr class="hover:bg-slate-50/80 transition-all">
                            <td class="px-6 py-4 font-bold text-slate-800">DON-172490812</td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-slate-800">Ahmad Rizky</div>
                                <div class="text-[11px] text-slate-400">ahmad.rizky@gmail.com</div>
                            </td>
                            <td class="px-6 py-4 truncate max-w-[200px]">Dapur Tahfiz: Makan Bergizi Gratis</td>
                            <td class="px-6 py-4 font-bold text-red-600">Rp 50.000</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 bg-red-100 text-red-700 rounded-full text-[10px] font-bold">Failed</span>
                            </td>
                            <td class="px-6 py-4 text-slate-400">3 Jam yang lalu</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-admin-layout>

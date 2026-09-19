<x-admin-layout>
    <div class="p-2 space-y-6">

        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Manajemen User</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola data pengguna, hak akses administrator, serta informasi akun sistem.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.manajemen-users.create') ?? '#' }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-emerald-600/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah User Baru</span>
                </a>
            </div>
        </div>

        <!-- Ringkasan Status / Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Pengguna</p>
                <h3 class="text-2xl font-bold text-slate-800">
                    {{ isset($users) ? $users->count() : 2 }}
                </h3>
                <p class="text-xs text-slate-400">Keseluruhan akun terdaftar</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Administrator</p>
                <h3 class="text-2xl font-bold text-emerald-600">
                    {{ isset($users) ? $users->where('is_admin', true)->count() : 1 }}
                </h3>
                <p class="text-xs text-slate-400">Akses penuh dashboard admin</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm space-y-2">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Donatur / Pengguna Biasa</p>
                <h3 class="text-2xl font-bold text-sky-600">
                    {{ isset($users) ? $users->where('is_admin', false)->count() : 1 }}
                </h3>
                <p class="text-xs text-slate-400">Akun pengguna standar</p>
            </div>
        </div>

        <!-- Tabel User -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

            <!-- Filter & Pencarian -->
            <div class="p-5 border-b border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="w-full md:w-80 relative">
                    <input type="text" placeholder="Cari nama, username, atau email..."
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <div class="w-full md:w-auto flex items-center gap-3">
                    <select class="px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        <option value="">Semua Role</option>
                        <option value="admin">Administrator</option>
                        <option value="user">User Biasa</option>
                    </select>
                </div>
            </div>

            <!-- Content Tabel -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50/80 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4">User Info</th>
                            <th class="px-6 py-4">Username</th>
                            <th class="px-6 py-4">Kontak (HP)</th>
                            <th class="px-6 py-4">Gelar / Title</th>
                            <th class="px-6 py-4">Role</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">

                        @forelse($users ?? [] as $user)
                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @if(!empty($user->avatar))
                                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-9 h-9 rounded-full object-cover border border-slate-200">
                                        @else
                                            <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs uppercase">
                                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                            </div>
                                        @endif
                                        <div>
                                            <div class="font-bold text-slate-800">{{ $user->name }}</div>
                                            <div class="text-[11px] text-slate-400">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-slate-700">
                                    {{ $user->username }}
                                </td>
                                <td class="px-6 py-4 text-slate-500">
                                    {{ $user->phone ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-slate-500">
                                    {{ $user->title ?? '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($user->is_admin)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Admin
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                            User
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.manajemen-users.edit', $user->id) ?? '#' }}"
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
                                            PE
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800">Pengurus Rumah Tahfiz</div>
                                            <div class="text-[11px] text-slate-400">admin@rumahtahfiz.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-slate-700">admin_tahfiz</td>
                                <td class="px-6 py-4 text-slate-500">+62 812-3456-7890</td>
                                <td class="px-6 py-4 text-slate-500">Administrator Utama</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Admin
                                    </span>
                                </td>
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
                                        <div class="w-9 h-9 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center font-bold text-xs uppercase">
                                            AH
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800">Ahmad Hidayat</div>
                                            <div class="text-[11px] text-slate-400">ahmad@gmail.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-slate-700">ahmad_hidayat</td>
                                <td class="px-6 py-4 text-slate-500">+62 857-1122-3344</td>
                                <td class="px-6 py-4 text-slate-500">Donatur Tetap</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                        User
                                    </span>
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
                <p>Menampilkan data pengguna terdaftar</p>
            </div>

        </div>

    </div>
</x-admin-layout>

<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
       class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-300 flex flex-col justify-between transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 shrink-0">

    <div>
        <!-- Logo Header -->
        <div class="h-16 flex items-center px-6 bg-slate-950/40 border-b border-slate-800/60 justify-between">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-emerald-600 text-white font-extrabold flex items-center justify-center text-sm shadow-md shadow-emerald-600/30">
                    RT
                </div>
                <div>
                    <h1 class="font-bold text-white text-sm tracking-wide leading-none">Rumah Tahfiz</h1>
                    <span class="text-[10px] text-emerald-400 font-medium">Admin Panel</span>
                </div>
            </a>

            <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Navigation Menu -->
        <nav class="p-4 space-y-1.5 text-xs font-semibold">
            <div class="px-3 py-2 text-[10px] uppercase font-bold text-slate-500 tracking-wider">Main Menu</div>

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white font-bold shadow-lg shadow-emerald-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-slate-200' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Dashboard</span>
            </a>

            <!-- Program Donasi -->
            <a href="{{ route('admin.campaigns.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.campaigns.*') ? 'bg-emerald-600 text-white font-bold shadow-lg shadow-emerald-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-slate-200' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                <span>Program Donasi</span>
            </a>

            <!-- Laporan Keuangan -->
            <a href="{{ route('admin.transactions.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.transactions.*') ? 'bg-emerald-600 text-white font-bold shadow-lg shadow-emerald-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-slate-200' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <span>Laporan Keuangan</span>
            </a>

            <div class="pt-4 px-3 py-2 text-[10px] uppercase font-bold text-slate-500 tracking-wider">Informasi</div>

            <!-- Pengumuman (Megalopa / Megaphone) -->
            <a href="{{ route('admin.announcements.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.announcements.*') ? 'bg-emerald-600 text-white font-bold shadow-lg shadow-emerald-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-slate-200' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.684A1.76 1.76 0 013 12.036V10c0-.853.606-1.564 1.436-1.72l4.98-1.042"/></svg>
                <span>Pengumuman</span>
            </a>

            <!-- Struktur Organisasi (Ikon Hierarchy / User Group) -->
            <a href="{{ route('admin.structures.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.structures.*') ? 'bg-emerald-600 text-white font-bold shadow-lg shadow-emerald-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-slate-200' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <span>Struktur Organisasi</span>
            </a>

            <!-- Artikel (Ikon Document / Newspaper) -->
            <a href="{{ route('admin.artikels.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.artikels.*') ? 'bg-emerald-600 text-white font-bold shadow-lg shadow-emerald-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-slate-200' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                <span>Artikel</span>
            </a>

            <div class="pt-4 px-3 py-2 text-[10px] uppercase font-bold text-slate-500 tracking-wider">Manajemen</div>

            <!-- Management User (Ikon Users Cog / Shield User) -->
            <a href="{{ route('admin.manajemen-users.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.manajemen-users.*') ? 'bg-emerald-600 text-white font-bold shadow-lg shadow-emerald-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-slate-200' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                <span>Management User</span>
            </a>

            <!-- Profile (Ikon User Circle) -->
            <a href="{{ route('admin.profiles.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.profiles.*') ? 'bg-emerald-600 text-white font-bold shadow-lg shadow-emerald-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-slate-200' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Profile</span>
            </a>
        </nav>
    </div>

    <!-- Logout Button -->
    <div class="p-4 border-t border-slate-800/80">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold text-rose-400 hover:bg-rose-500/10 hover:text-rose-300 transition-all">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</aside>

<nav class="bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">

            <!-- Logo & Nama -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group shrink-0 ">
            <!-- Kontainer Logo Presisi -->
                <div class="w-20 h-20 flex items-center justify-center shrink-0 overflow-hidden">
                    <img src="{{ asset('images/logo-amanah.png') }}"
                        alt="Logo Rumah Tahfiz Amanah"
                        class="max-w-full max-h-full w-auto h-auto object-contain group-hover:scale-105 transition-transform duration-300">
                </div>

                <!-- Teks Judul -->
                <span class="text-lg md:text-xl font-extrabold bg-gradient-to-r from-emerald-700 to-teal-600 bg-clip-text text-transparent whitespace-nowrap">
                    Rumah Tahfiz Amanah
                </span>
            </a>

            <!-- Right Wrapper: link dropdown menu & Singin -->
            <div class="flex items-center gap-8 ml-auto">

                <!-- Navigation Links (Digeser ke kanan dengan ml-auto pada wrapper) -->
                <div class="hidden md:flex items-center space-x-6 text-sm font-semibold text-slate-600">
                    <a href="{{ route('home') }}" class="hover:text-emerald-600 transition-colors">Beranda</a>
                    {{-- <a href="#pengumuman" class="hover:text-emerald-600 transition-colors">Pengumunan</a> --}}

                    <!-- Dropdown Tentang Kami -->
                    <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                        <button @click="open = !open" class="flex items-center gap-1 hover:text-emerald-600 transition-colors focus:outline-none py-2">
                            <span>Tentang Kami</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown Menu Item -->
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute left-0 mt-2 w-52 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50"
                             style="display: none;">

                            <a href="#" @click="open = false" class="flex items-center px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                                Profil
                            </a>
                            <a href="#legalitas" @click="open = false" class="flex items-center px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                                Legalitas
                            </a>
                            <a href="#" @click="open = false" class="flex items-center px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                                Logo
                            </a>
                            <a href="#struktur" @click="open = false" class="flex items-center px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                                Struktur Organisasi
                            </a>
                            <a href="#footer" @click="open = false" class="flex items-center px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                                Kontak kami
                            </a>
                        </div>
                    </div>

                    <!-- Dropdown Kegiatan -->
                    <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                        <button @click="open = !open" class="flex items-center gap-1 hover:text-emerald-600 transition-colors focus:outline-none py-2">
                            <span>Kegiatan</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown Menu Item -->
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute left-0 mt-2 w-52 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50"
                             style="display: none;">

                            {{-- <a href="{{ route('home') }}#program" @click="open = false" class="flex items-center px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                                Program
                            </a> --}}
                            <a href="#program" @click="open = false" class="flex items-center px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                                Program Rumah Tahfiz
                            </a>
                            <a href="#pengumuman" @click="open = false" class="flex items-center px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                                pengumuman
                            </a>
                            <a href="#" @click="open = false" class="flex items-center px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                                Kurikulum
                            </a>
                            <a href="{{ route('galeri.index') }}" @click="open = false" class="flex items-center px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                                Galery
                            </a>

                            <a href="{{ route('artikel.index') }}" @click="open = false" class="flex items-center px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                                Kabar Hafizh & Hafizah
                            </a>
                            {{-- <a href="{{ route('home') }}#testimoni" @click="open = false" class="flex items-center px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                                Apa Kata Mereka
                            </a> --}}
                            <a href="#testimoni" @click="open = false" class="flex items-center px-4 py-2.5 text-xs text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                                Apa Kata Mereka
                            </a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('transparansi.index') }}" class="hover:text-emerald-600 transition-colors">Transparansi</a>

                <!-- Action Button -->
                <a href="{{ route('admin.dashboard') }}" class="px-5 py-2.5 bg-emerald-600 text-white rounded-full text-sm font-semibold shadow-lg shadow-emerald-600/30 hover:bg-emerald-700 hover:shadow-emerald-600/50 transition-all duration-300 whitespace-nowrap">
                    Sign In
                </a>

            </div>

        </div>
    </div>
</nav>

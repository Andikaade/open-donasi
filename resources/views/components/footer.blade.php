<footer id="footer" class="bg-slate-900 text-slate-400 py-12 sm:py-16 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-sm">

        <!-- Kolom 1: Profil Brand -->
        <div class="space-y-4">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 bg-emerald-600 rounded-xl flex items-center justify-center text-white font-extrabold text-sm shadow-md shadow-emerald-900/40">
                    RT
                </div>
                <span class="text-lg font-bold text-white tracking-tight">Rumah Tahfiz Amanah</span>
            </div>
            <p class="text-slate-400 text-xs leading-relaxed">
                Sistem Informasi Donasi & Transparansi Keuangan Santri Mandiri. Mengelola amanah secara terbuka, akuntabel, dan profesional.
            </p>
        </div>

        <!-- Kolom 2: Profil & Kelembagaan -->
        <div>
            <h4 class="text-white font-bold text-sm mb-4 tracking-wide uppercase text-xs text-emerald-500">Tentang Kami</h4>
            <ul class="space-y-2.5 text-xs">
                <li><a href="#beranda" class="hover:text-emerald-400 transition-colors">Beranda Utama</a></li>
                {{-- <li><a href="{{ route('struktur.index') }}" class="hover:text-emerald-400 transition-colors">Struktur Organisasi</a></li> --}}
                <li><a href="#" class="hover:text-emerald-400 transition-colors">Struktur Organisasi</a></li>
                <li><a href="#legalitas" class="hover:text-emerald-400 transition-colors">Wasiat & Legalitas</a></li>
                <li><a href="#testimonies" class="hover:text-emerald-400 transition-colors">Testimoni Santri</a></li>
                <li><a href="#pengumuman" class="hover:text-emerald-400 transition-colors">Pengumuman Terbaru</a></li>
            </ul>
        </div>

        <!-- Kolom 3: Program & Kegiatan -->
        <div>
            <h4 class="text-white font-bold text-sm mb-4 tracking-wide uppercase text-xs text-emerald-500">Program & Informasi</h4>
            <ul class="space-y-2.5 text-xs">
                <li><a href="#program" class="hover:text-emerald-400 transition-colors">Program Donasi Santri</a></li>
                <li><a href="{{ route('transparansi.index') }}" class="hover:text-emerald-400 transition-colors">Laporan Keuangan & Transparansi</a></li>
                <li><a href="{{ route('artikel.index') }}" class="hover:text-emerald-400 transition-colors">Kabar & Artikel Santri</a></li>
                <li><a href="{{ route('galeri.index') }}" class="hover:text-emerald-400 transition-colors">Galeri & Dokumentasi</a></li>
            </ul>
        </div>

        <!-- Kolom 4: Kontak & Media Sosial -->
        <div>
            <h4 class="text-white font-bold text-sm mb-4 tracking-wide uppercase text-xs text-emerald-500">Kontak & Alamat</h4>
            <ul class="space-y-2 text-xs text-slate-400">
                <li class="flex items-start gap-2">
                    <span class="flex-shrink-0">📍</span>
                    <span>Jalan Raya Nagari No. 12, Kantor Wali Nagari, Sumatera Barat</span>
                </li>
                <li class="flex items-center gap-2 mt-2">
                    <span class="flex-shrink-0">📞</span>
                    <span>+62 812-3456-7890</span>
                </li>
                <li class="flex items-center gap-2">
                    <span class="flex-shrink-0">✉️</span>
                    <span>info@rumahtahfiz.or.id</span>
                </li>
            </ul>

            <!-- Media Sosial -->
            <div class="mt-5 pt-4 border-t border-slate-800/80">
                <span class="text-[11px] font-medium text-slate-500 block mb-2.5">Sosial Media</span>
                <div class="flex items-center gap-2.5">
                    <!-- Instagram -->
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"
                       class="w-8 h-8 rounded-lg bg-slate-800 border border-slate-700/80 flex items-center justify-center text-slate-300 hover:bg-gradient-to-tr hover:from-amber-500 hover:via-rose-500 hover:to-purple-600 hover:text-white hover:border-transparent transition-all shadow-xs"
                       title="Instagram">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>

                    <!-- TikTok -->
                    <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer"
                       class="w-8 h-8 rounded-lg bg-slate-800 border border-slate-700/80 flex items-center justify-center text-slate-300 hover:bg-black hover:text-white hover:border-slate-600 transition-all shadow-xs"
                       title="TikTok">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                            <path d="M12.525.001h-3.28c-.012 2.251-.72 3.99-2.126 5.215C5.713 6.442 3.916 6.931 1.8 6.931v3.313c2.251 0 4.22-.593 5.908-1.78v7.037c0 2.302-.823 4.24-2.469 5.814C3.593 22.89 1.57 23.75 0 23.75v3.313c2.81 0 5.289-.968 7.437-2.904 2.148-1.936 3.222-4.383 3.222-7.34V7.818c1.393 1.002 2.973 1.503 4.74 1.503V6.008c-1.637 0-3.08-.49-4.33-1.47-1.25-.98-1.897-2.274-1.942-3.882h-.002z" transform="translate(3.2 0)"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Copyright -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 pt-6 border-t border-slate-800/80 text-center text-xs text-slate-500">
        &copy; {{ date('Y') }} Rumah Tahfiz Amanah. Seluruh Hak Cipta Dilindungi.
    </div>
</footer>

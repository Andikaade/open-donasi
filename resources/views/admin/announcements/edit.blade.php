<x-admin-layout>
    <div class="p-2 space-y-6">

        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Edit Pengumuman</h1>
                <p class="text-sm text-slate-500 mt-1">Perbarui informasi pengumuman atau tombol aksi yang ditampilkan di halaman depan.</p>
            </div>
            <div>
                <a href="{{ route('admin.announcements.index') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-xl transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Kembali</span>
                </a>
            </div>
        </div>

        <!-- Form Edit Pengumuman -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 md:p-8">
            <form action="{{ route('admin.announcements.update', $announcement->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Section: Informasi Utama -->
                <div class="space-y-4">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Informasi Utama</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Badge / Label -->
                        <div class="space-y-1.5 md:col-span-1">
                            <label for="badge" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Badge / Label <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="badge" id="badge" value="{{ old('badge', $announcement->badge) }}" required
                                placeholder="Contoh: PENGUMUMAN PENTING, INFO PSB"
                                class="w-full px-4 py-2.5 bg-slate-50 border @error('badge') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                            @error('badge')
                                <p class="text-rose-500 text-xs font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Judul Pengumuman -->
                        <div class="space-y-1.5 md:col-span-2">
                            <label for="title" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Judul Pengumuman <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title', $announcement->title) }}" required
                                placeholder="Contoh: Pendaftaran Santri Baru Rumah Tahfiz Angkatan 2026/2027"
                                class="w-full px-4 py-2.5 bg-slate-50 border @error('title') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                            @error('title')
                                <p class="text-rose-500 text-xs font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Deskripsi Pengumuman -->
                    <div class="space-y-1.5">
                        <label for="description" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            Deskripsi / Isi Pengumuman <span class="text-rose-500">*</span>
                        </label>
                        <textarea name="description" id="description" rows="4" required
                            placeholder="Tuliskan detail pengumuman secara lengkap di sini..."
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('description') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">{{ old('description', $announcement->description) }}</textarea>
                        @error('description')
                            <p class="text-rose-500 text-xs font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <hr class="border-slate-100">

                <!-- Section: Tombol Aksi (Buttons) -->
                <div class="space-y-4">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tombol Aksi (Opsional)</h3>

                    <!-- Button 1 Utama -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4 bg-slate-50/50 rounded-xl border border-slate-100">
                        <div class="space-y-1.5">
                            <label for="primary_button_text" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Teks Tombol Utama
                            </label>
                            <input type="text" name="primary_button_text" id="primary_button_text" value="{{ old('primary_button_text', $announcement->primary_button_text) }}"
                                placeholder="Contoh: Daftar Sekarang"
                                class="w-full px-4 py-2.5 bg-white border @error('primary_button_text') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        </div>

                        <div class="space-y-1.5">
                            <label for="primary_button_url" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Link / URL Tombol Utama
                            </label>
                            <input type="text" name="primary_button_url" id="primary_button_url" value="{{ old('primary_button_url', $announcement->primary_button_url) }}"
                                placeholder="Contoh: https://wa.me/6281234567890"
                                class="w-full px-4 py-2.5 bg-white border @error('primary_button_url') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        </div>
                    </div>

                    <!-- Button 2 Sekunder + Upload Dokumen -->
                    <div class="p-4 bg-slate-50/50 rounded-xl border border-slate-100 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label for="secondary_button_text" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                    Teks Tombol Sekunder
                                </label>
                                <input type="text" name="secondary_button_text" id="secondary_button_text" value="{{ old('secondary_button_text', $announcement->secondary_button_text) }}"
                                    placeholder="Contoh: Download Brosur"
                                    class="w-full px-4 py-2.5 bg-white border @error('secondary_button_text') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                            </div>

                            <div class="space-y-1.5">
                                <label for="secondary_button_url" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                    Link / URL External (Opsional jika tidak upload file)
                                </label>
                                <input type="text" name="secondary_button_url" id="secondary_button_url" value="{{ old('secondary_button_url', $announcement->secondary_button_url) }}"
                                    placeholder="Contoh: /brosur.pdf atau https://..."
                                    class="w-full px-4 py-2.5 bg-white border @error('secondary_button_url') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                            </div>
                        </div>

                        <!-- Input Upload File -->
                        <div class="space-y-2">
                            <label for="secondary_button_file" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Upload Dokumen / Brosur PDF (Opsional)
                            </label>

                            @if($announcement->secondary_button_file)
                                <div class="flex items-center gap-2 p-2.5 bg-emerald-50 border border-emerald-200 rounded-xl text-xs text-emerald-800">
                                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <span>File tersimpan: </span>
                                    <a href="{{ asset('storage/' . $announcement->secondary_button_file) }}" target="_blank" class="font-bold underline text-emerald-700 hover:text-emerald-900">
                                        Lihat / Download File saat ini
                                    </a>
                                </div>
                            @endif

                            <input type="file" name="secondary_button_file" id="secondary_button_file" accept=".pdf,.doc,.docx"
                                class="w-full px-4 py-2 bg-white border @error('secondary_button_file') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-all">
                            <p class="text-[11px] text-slate-400">Pilih file baru jika ingin mengganti file yang sudah ada (PDF/DOC, Max 5MB).</p>
                            @error('secondary_button_file')
                                <p class="text-rose-500 text-xs font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr class="border-slate-100">

                <!-- Section: Atribut Metadata Bawah -->
                <div class="space-y-4">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Atribut Tambahan (Opsional)</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Kuota -->
                        <div class="space-y-1.5">
                            <label for="kuota" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Info Kuota
                            </label>
                            <input type="text" name="kuota" id="kuota" value="{{ old('kuota', $announcement->kuota) }}"
                                placeholder="Contoh: 30 Santri"
                                class="w-full px-4 py-2.5 bg-slate-50 border @error('kuota') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        </div>

                        <!-- Batas Akhir -->
                        <div class="space-y-1.5">
                            <label for="batas_akhir" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Batas Akhir
                            </label>
                            <input type="text" name="batas_akhir" id="batas_akhir" value="{{ old('batas_akhir', $announcement->batas_akhir) }}"
                                placeholder="Contoh: 15 Maret 2026"
                                class="w-full px-4 py-2.5 bg-slate-50 border @error('batas_akhir') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        </div>

                        <!-- Beasiswa -->
                        <div class="space-y-1.5">
                            <label for="beasiswa" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Beasiswa / Biaya
                            </label>
                            <input type="text" name="beasiswa" id="beasiswa" value="{{ old('beasiswa', $announcement->beasiswa) }}"
                                placeholder="Contoh: Gratis 100%"
                                class="w-full px-4 py-2.5 bg-slate-50 border @error('beasiswa') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        </div>
                    </div>
                </div>

                <hr class="border-slate-100">

                <!-- Status Aktif / Non-Aktif -->
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $announcement->is_active) ? 'checked' : '' }}
                        class="w-4 h-4 text-emerald-600 bg-slate-100 border-slate-300 rounded focus:ring-emerald-500 focus:ring-2 transition-all">
                    <label for="is_active" class="text-xs font-bold text-slate-700 uppercase tracking-wider cursor-pointer">
                        Tampilkan pengumuman ini di halaman depan (Status Aktif)
                    </label>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <a href="{{ route('admin.announcements.index') }}"
                       class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl shadow-lg shadow-emerald-600/20 transition-all">
                        Perbarui Pengumuman
                    </button>
                </div>

            </form>
        </div>

    </div>
</x-admin-layout>

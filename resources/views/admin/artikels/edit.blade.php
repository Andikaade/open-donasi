<x-admin-layout>
    <div class="p-2 space-y-6">

        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <nav class="flex mb-2 text-xs text-slate-500 font-medium">
                    <a href="{{ route('admin.artikels.index') }}" class="hover:text-emerald-600">Kelola Artikel</a>
                    <span class="mx-2">/</span>
                    <span class="text-slate-800 font-semibold">Edit Artikel</span>
                </nav>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Edit Artikel & Berita</h1>
                <p class="text-sm text-slate-500 mt-1">Perbarui data artikel, ubah status publikasi, atau ganti gambar utama.</p>
            </div>
            <div>
                <a href="{{ route('admin.artikels.index') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-xl transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Kembali</span>
                </a>
            </div>
        </div>

        <!-- Form Edit Artikel -->
        <form action="{{ route('admin.artikels.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                <!-- Kolom Kiri: Input Utama -->
                <div class="lg:col-span-8 space-y-6">
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm space-y-5">

                        <!-- Judul Artikel -->
                        <div>
                            <label for="title" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Judul Artikel <span class="text-rose-500">*</span></label>
                            <input type="text" name="title" id="title" value="{{ old('title', $artikel->title) }}" required placeholder="Masukkan judul artikel..."
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                            @error('title')
                                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Ringkasan / Excerpt -->
                        <div>
                            <label for="excerpt" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Ringkasan (Excerpt)</label>
                            <textarea name="excerpt" id="excerpt" rows="3" placeholder="Tulis ringkasan singkat artikel..."
                                      class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">{{ old('excerpt', $artikel->excerpt) }}</textarea>
                            <p class="text-[11px] text-slate-400 mt-1">Ringkasan akan ditampilkan pada kartu pratinjau artikel di halaman depan.</p>
                            @error('excerpt')
                                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Isi Artikel (Body) -->
                        <div>
                            <label for="body" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Isi Konten Artikel <span class="text-rose-500">*</span></label>
                            <textarea name="body" id="body" rows="12" required placeholder="Tulis narasi lengkap artikel di sini..."
                                      class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">{{ old('body', $artikel->body) }}</textarea>
                            @error('body')
                                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>

                <!-- Kolom Kanan: Gambar & Tanggal Publikasi -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm space-y-5">

                        <!-- Upload Gambar Thumbnail -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Gambar Sampul / Thumbnail</label>
                            <div class="border-2 border-dashed border-slate-200 rounded-xl p-4 text-center bg-slate-50/50 hover:bg-slate-50 transition-all">
                                <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="previewImage(event)">
                                <label for="image" class="cursor-pointer space-y-2 block">
                                    <div id="image-preview-container" class="w-full h-40 rounded-lg bg-slate-100 flex items-center justify-center overflow-hidden border border-slate-200">
                                        <div id="placeholder-text" class="{{ $artikel->image ? 'hidden' : '' }} text-slate-400 text-xs flex flex-col items-center gap-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span>Klik untuk ganti gambar</span>
                                        </div>
                                        <img id="image-preview" src="{{ $artikel->image ? asset('storage/' . $artikel->image) : '' }}" class="{{ $artikel->image ? '' : 'hidden' }} w-full h-full object-cover">
                                    </div>
                                </label>
                            </div>
                            <p class="text-[11px] text-slate-400 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                            @error('image')
                                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tanggal Publikasi -->
                        <div>
                            <label for="published_at" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Tanggal Rilis / Publikasi</label>
                            <input type="date" name="published_at" id="published_at"
                                   value="{{ old('published_at', $artikel->published_at ? \Carbon\Carbon::parse($artikel->published_at)->format('Y-m-d') : '') }}"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                            <p class="text-[11px] text-slate-400 mt-1">Akan terisi tanggal publikasi jika diterbitkan.</p>
                            @error('published_at')
                                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <hr class="border-slate-100">

                        <!-- Tombol Aksi -->
                        <div class="flex flex-col gap-2 pt-2">
                            <button type="submit" name="action" value="publish"
                                    class="w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl text-xs shadow-lg shadow-emerald-600/20 transition-all text-center">
                                Perbarui & Publikasikan
                            </button>
                            <button type="submit" name="action" value="draft"
                                    class="w-full py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-xs transition-all text-center">
                                Simpan sebagai Draft
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </form>

    </div>

    <!-- Script Preview Image -->
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('placeholder-text');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-admin-layout>

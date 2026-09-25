<x-admin-layout>
    <div class="p-2 space-y-6">

        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Edit Anggota Struktur Organisasi</h1>
                <p class="text-sm text-slate-500 mt-1">Perbarui data informasi pengurus, pembina, atau majelis guru.</p>
            </div>
            <div>
                <a href="{{ route('admin.structures.index') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-xl transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Kembali</span>
                </a>
            </div>
        </div>

        <!-- Form Edit Anggota -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 md:p-8">
            <form action="{{ route('admin.structures.update', $structure->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Foto Profil / Avatar -->
                <div class="space-y-1.5">
                    <label for="avatar" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                        Foto Profil / Avatar <span class="text-slate-400 font-normal">(Opsional)</span>
                    </label>

                    <div class="flex items-center gap-4">
                        <!-- Pratinjau Avatar saat ini -->
                        <div class="flex-shrink-0">
                            @if($structure->avatar)
                                <img src="{{ asset('storage/' . $structure->avatar) }}" alt="{{ $structure->name }}" class="w-12 h-12 rounded-full object-cover border border-slate-200 shadow-sm">
                            @else
                                <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs uppercase border border-emerald-200">
                                    {{ $structure->code ?? substr($structure->name, 0, 3) }}
                                </div>
                            @endif
                        </div>

                        <!-- Input File -->
                        <div class="w-full">
                            <input type="file" name="avatar" id="avatar" accept="image/*"
                                class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 border border-slate-200 rounded-xl bg-slate-50 focus:outline-none transition-all">
                            <p class="text-[11px] text-slate-400 mt-1">Pilih file baru jika ingin mengganti foto profil (Maksimal 2MB).</p>
                        </div>
                    </div>

                    @error('avatar')
                        <p class="text-rose-500 text-xs font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Nama Lengkap -->
                    <div class="space-y-1.5">
                        <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            Nama Lengkap & Gelar <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name', $structure->name) }}" required
                            placeholder="Contoh: BEDRUL EFENDI, S.Pd.MM"
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('name') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        @error('name')
                            <p class="text-rose-500 text-xs font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Inisial / Kode Singkat -->
                    <div class="space-y-1.5">
                        <label for="code" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            Inisial / Kode Unik <span class="text-slate-400 font-normal">(Opsional)</span>
                        </label>
                        <input type="text" name="code" id="code" value="{{ old('code', $structure->code) }}" maxlength="10"
                            placeholder="Contoh: BED"
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('code') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        @error('code')
                            <p class="text-rose-500 text-xs font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jabatan -->
                    <div class="space-y-1.5">
                        <label for="position" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            Jabatan <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="position" id="position" value="{{ old('position', $structure->position) }}" required
                            placeholder="Contoh: Ketua Umum, Bendahara, Guru Tahfiz"
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('position') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        @error('position')
                            <p class="text-rose-500 text-xs font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori / Divisi -->
                    <div class="space-y-1.5">
                        <label for="category" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            Kategori / Divisi <span class="text-rose-500">*</span>
                        </label>
                        <select name="category" id="category" required
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('category') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="pelindung" {{ old('category', $structure->category) == 'pelindung' ? 'selected' : '' }}>Pelindung / Penasehat</option>
                            <option value="eksekutif" {{ old('category', $structure->category) == 'eksekutif' ? 'selected' : '' }}>Pimpinan Eksekutif / Pembina</option>
                            <option value="pengurus" {{ old('category', $structure->category) == 'pengurus' ? 'selected' : '' }}>Pengurus</option>
                            <option value="seksi" {{ old('category', $structure->category) == 'seksi' ? 'selected' : '' }}>Seksi-Seksi</option>
                            <option value="guru" {{ old('category', $structure->category) == 'guru' ? 'selected' : '' }}>Majelis Guru</option>
                        </select>
                        @error('category')
                            <p class="text-rose-500 text-xs font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- No Kontak / WhatsApp -->
                    <div class="space-y-1.5">
                        <label for="email_or_phone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            No. HP / WhatsApp <span class="text-slate-400 font-normal">(Opsional)</span>
                        </label>
                        <input type="text" name="email_or_phone" id="email_or_phone" value="{{ old('email_or_phone', $structure->email_or_phone) }}"
                            placeholder="Contoh: 081234567890"
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('email_or_phone') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        @error('email_or_phone')
                            <p class="text-rose-500 text-xs font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Urutan Prioritas -->
                    <div class="space-y-1.5">
                        <label for="order_priority" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            Urutan Tampilan <span class="text-slate-400 font-normal">(Opsional)</span>
                        </label>
                        <input type="number" name="order_priority" id="order_priority" value="{{ old('order_priority', $structure->order_priority) }}" min="1"
                            placeholder="Angka terkecil tampil paling atas"
                            class="w-full px-4 py-2.5 bg-slate-50 border @error('order_priority') border-rose-500 @else border-slate-200 @enderror rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                        @error('order_priority')
                            <p class="text-rose-500 text-xs font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <a href="{{ route('admin.structures.index') }}"
                       class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl shadow-lg shadow-emerald-600/20 transition-all">
                        Perbarui Anggota
                    </button>
                </div>

            </form>
        </div>

    </div>
</x-admin-layout>

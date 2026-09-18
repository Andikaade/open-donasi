<x-admin-layout>
    <div class="p-6 max-w-4xl space-y-6">

        <!-- Header Halaman -->
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Pengaturan Profil</h1>
            <p class="text-sm text-slate-500 mt-1">Kelola informasi pribadi dan data akun administrator Anda.</p>
        </div>

        <!-- Alert Success -->
        @if(session('status') === 'profile-updated')
            <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold rounded-xl flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Profil berhasil diperbarui.</span>
            </div>
        @endif

        <form action="{{ route('admin.profiles.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PATCH')

            <!-- Card Informasi Akun & Foto -->
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-3">Informasi Akun</h3>

                <!-- Upload Avatar -->
                <div class="flex items-center gap-5">
                    <div class="relative">
                        @if(auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="w-20 h-20 rounded-full object-cover border-2 border-emerald-500">
                        @else
                            <div class="w-20 h-20 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xl uppercase">
                                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Foto Profil</label>
                        <input type="file" name="avatar" class="text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-all">
                        <p class="text-[10px] text-slate-400 mt-1">Format: JPG, PNG, WEBP. Maksimal 2MB.</p>
                    </div>
                </div>

                <!-- Form Fields Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs font-medium">
                    <div>
                        <label class="block text-slate-700 mb-1 font-semibold">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all" required>
                    </div>

                    <div>
                        <label class="block text-slate-700 mb-1 font-semibold">Username</label>
                        <input type="text" name="username" value="{{ old('username', auth()->user()->username) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all" required>
                    </div>

                    <div>
                        <label class="block text-slate-700 mb-1 font-semibold">Email</label>
                        <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all" required>
                    </div>

                    <div>
                        <label class="block text-slate-700 mb-1 font-semibold">Nomor WhatsApp / HP</label>
                        <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-slate-700 mb-1 font-semibold">Gelar / Jabatan (Title)</label>
                        <input type="text" name="title" value="{{ old('title', auth()->user()->title) }}" placeholder="Contoh: Pengurus Utama / Administrator" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-slate-700 mb-1 font-semibold">Alamat</label>
                        <textarea name="address" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all">{{ old('address', auth()->user()->address) }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end pt-2">
                    <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs rounded-xl shadow-lg shadow-emerald-600/20 transition-all">
                        Simpan Perubahan Profil
                    </button>
                </div>
            </div>
        </form>

    </div>
</x-admin-layout>

<x-admin-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 leading-tight">
                    {{ __('Tambah Program Donasi Baru') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">Buat program donasi baru dan unggah berkas pendukung seperti RAB.</p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.campaigns.index') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-xl transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Kembali ke Halaman Sebelumnya</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-2">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.campaigns.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="title" value="Judul Program Donasi" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div>
                        <x-input-label for="category_id" value="Kategori Program" />
                        <select id="category_id" name="category_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="target_amount" value="Target Dana (Rp)" />
                            <x-text-input id="target_amount" name="target_amount" type="number" class="mt-1 block w-full" :value="old('target_amount')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('target_amount')" />
                        </div>

                        <div>
                            <x-input-label for="end_date" value="Batas Waktu (Opsional)" />
                            <x-text-input id="end_date" name="end_date" type="date" class="mt-1 block w-full" :value="old('end_date')" />
                            <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="short_description" value="Deskripsi Singkat (Ringkasan Card)" />
                        <textarea id="short_description" name="short_description" rows="2" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('short_description') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('short_description')" />
                    </div>

                    <div>
                        <x-input-label for="description" value="Cerita & Rincian Lengkap Program" />
                        <textarea id="description" name="description" rows="5" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('description') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <x-input-label for="featured_image" value="Banner / Foto Utama Program" />
                        <input id="featured_image" name="featured_image" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required />
                        <x-input-error class="mt-2" :messages="$errors->get('featured_image')" />
                    </div>

                    <div>
                        <x-input-label for="budget_plan_file" value="Rancangan Anggaran Biaya / RAB (Opsional - PDF/JPG)" />
                        <x-text-input id="budget_plan_file" name="budget_plan_file" type="file" accept=".pdf,.png,.jpg,.jpeg" class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200" />
                        <x-input-error class="mt-2" :messages="$errors->get('budget_plan_file')" />
                    </div>

                    <div class="flex items-center">
                        <input id="is_active" name="is_active" type="checkbox" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" checked>
                        <label for="is_active" class="ml-2 text-sm text-gray-600">Aktifkan Program Ini Sekarang</label>
                    </div>

                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.campaigns.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md text-sm font-semibold hover:bg-gray-300">Batal</a>
                        <x-primary-button>{{ __('Simpan Program') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>

<x-admin-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 leading-tight">
                    {{ __('Edit Program Donasi') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">Perbarui informasi campaign, target dana, atau file RAB.</p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.campaigns.index') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-xl transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Kembali Ke Halaman Sebelumnya</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-2">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.campaigns.update', $campaign) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="title" value="Judul Program Donasi" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $campaign->title)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div>
                        <x-input-label for="category_id" value="Kategori Program" />
                        <select id="category_id" name="category_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $campaign->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="target_amount" value="Target Dana (Rp)" />
                            <x-text-input id="target_amount" name="target_amount" type="number" class="mt-1 block w-full" :value="old('target_amount', $campaign->target_amount)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('target_amount')" />
                        </div>

                        <div>
                            <x-input-label for="end_date" value="Batas Waktu (Opsional)" />
                            <x-text-input id="end_date" name="end_date" type="date" class="mt-1 block w-full" :value="old('end_date', $campaign->end_date ? $campaign->end_date->format('Y-m-d') : '')" />
                            <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="short_description" value="Deskripsi Singkat" />
                        <textarea id="short_description" name="short_description" rows="2" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('short_description', $campaign->short_description) }}</textarea>
                    </div>

                    <div>
                        <x-input-label for="description" value="Cerita & Rincian Lengkap Program" />
                        <textarea id="description" name="description" rows="5" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('description', $campaign->description) }}</textarea>
                    </div>

                    <div>
                        <x-input-label for="featured_image" value="Ganti Banner / Foto Utama (Kosongkan jika tidak diganti)" />
                        <input id="featured_image" name="featured_image" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                        <div class="mt-2">
                            <span class="text-xs text-gray-500">Banner Saat Ini:</span>
                            <img src="{{ asset('storage/' . $campaign->featured_image) }}" class="w-32 h-20 object-cover rounded mt-1">
                        </div>
                    </div>

                    <div>
                        <x-input-label for="budget_plan_file" value="Rancangan Anggaran Biaya / RAB (Opsional - PDF/JPG)" />
                        <x-text-input id="budget_plan_file" name="budget_plan_file" type="file" accept=".pdf,.png,.jpg,.jpeg" class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200" />
                        <x-input-error class="mt-2" :messages="$errors->get('budget_plan_file')" />

                        <!-- Tampilkan status / link file RAB yang sudah terunggah -->
                        @if($campaign->budget_plan_file)
                            <div class="mt-2 text-xs text-gray-600 flex items-center gap-1">
                                <span>File RAB Saat Ini:</span>
                                <a href="{{ asset('storage/' . $campaign->budget_plan_file) }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 font-semibold underline flex items-center gap-1">
                                    <span>Lihat / Unduh File RAB</span>
                                    <svg class="w-3.5 h-3.5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </a>
                            </div>
                        @else
                            <div class="mt-1 text-xs text-gray-400 italic">
                                Belum ada file RAB yang diunggah.
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center">
                        <input id="is_active" name="is_active" type="checkbox" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ $campaign->is_active ? 'checked' : '' }}>
                        <label for="is_active" class="ml-2 text-sm text-gray-600">Status Program Aktif</label>
                    </div>

                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.campaigns.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md text-sm font-semibold hover:bg-gray-300">Batal</a>
                        <x-primary-button>{{ __('Perbarui Program') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>

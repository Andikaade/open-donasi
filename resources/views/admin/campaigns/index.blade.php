<x-admin-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 leading-tight">
                    {{ __('Kelola Program Donasi') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">Daftar seluruh campaign donasi yang terdaftar di sistem.</p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.campaigns.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs rounded-xl shadow-md shadow-emerald-600/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span>Tambah Program Baru</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6 space-y-6">

        @if(session('success'))
            <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-xs font-semibold flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-6 flex items-center justify-between border-b border-slate-100">
                <div>
                    <h3 class="font-bold text-slate-800 text-base">Daftar Campaign</h3>
                    <p class="text-xs text-slate-400">Kelola informasi, target, dan status keaktifan program.</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 text-slate-400 uppercase font-semibold text-[10px] tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-3.5">Banner</th>
                            <th class="px-6 py-3.5">Judul Program</th>
                            <th class="px-6 py-3.5">Kategori</th>
                            <th class="px-6 py-3.5">Target Dana</th>
                            <th class="px-6 py-3.5">Terkumpul</th>
                            <th class="px-6 py-3.5">Status</th>
                            <th class="px-6 py-3.5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        @forelse($campaigns as $campaign)
                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4">
                                    @if($campaign->featured_image)
                                        <img src="{{ Storage::url($campaign->featured_image) }}"
                                             class="w-16 h-12 object-cover rounded-lg border border-slate-200 shadow-sm"
                                             alt="{{ $campaign->title }}"
                                             onerror="this.onerror=null; this.src='https://placehold.co/100x75?text=No+Image';">
                                    @else
                                        <div class="w-16 h-12 bg-slate-100 text-slate-400 rounded-lg flex items-center justify-center text-[10px]">No Image</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-bold text-slate-800 max-w-xs">
                                    {{ $campaign->title }}
                                </td>
                                <td class="px-6 py-4 text-slate-500">
                                    {{ $campaign->category->name ?? 'Uncategorized' }}
                                </td>
                                <td class="px-6 py-4 font-bold text-slate-800">
                                    Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 font-bold text-emerald-600">
                                    Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($campaign->is_active)
                                        <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">Aktif</span>
                                    @else
                                        <span class="px-2.5 py-1 bg-rose-100 text-rose-700 rounded-full text-[10px] font-bold">Non-Aktif</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.campaigns.edit', $campaign) }}"
                                           class="px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-lg text-[11px] transition-all">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.campaigns.destroy', $campaign) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1.5 bg-rose-600 hover:bg-rose-700 text-white font-semibold rounded-lg text-[11px] transition-all">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-slate-400">
                                    Belum ada program donasi yang dibuat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($campaigns, 'hasPages') && $campaigns->hasPages())
                <div class="p-4 border-t border-slate-100">
                    {{ $campaigns->links() }}
                </div>
            @endif
        </div>

    </div>
</x-admin-layout>

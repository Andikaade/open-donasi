<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Program Donasi') }}
            </h2>
            <a href="{{ route('admin.campaigns.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700 transition">
                + Tambah Program Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b bg-gray-50 text-xs font-semibold text-gray-600 uppercase">
                                <th class="p-3">Banner</th>
                                <th class="p-3">Judul Program</th>
                                <th class="p-3">Kategori</th>
                                <th class="p-3">Target Dana</th>
                                <th class="p-3">Terkumpul</th>
                                <th class="p-3">Status</th>
                                <th class="p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm">
                            @forelse($campaigns as $campaign)
                                <tr>
                                    <td class="p-3">
                                        <img src="{{ asset('storage/' . $campaign->featured_image) }}" class="w-16 h-12 object-cover rounded-md" alt="banner">
                                    </td>
                                    <td class="p-3 font-medium text-gray-900">{{ $campaign->title }}</td>
                                    <td class="p-3 text-gray-500">{{ $campaign->category->name }}</td>
                                    <td class="p-3 font-semibold">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</td>
                                    <td class="p-3 text-green-600 font-semibold">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</td>
                                    <td class="p-3">
                                        @if($campaign->is_active)
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Aktif</span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">Non-Aktif</span>
                                        @endif
                                    </td>
                                    <td class="p-3 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('admin.campaigns.edit', $campaign) }}" class="px-3 py-1 bg-amber-500 text-white rounded text-xs hover:bg-amber-600">Edit</a>
                                            <form action="{{ route('admin.campaigns.destroy', $campaign) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded text-xs hover:bg-red-700">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-4 text-center text-gray-500">Belum ada program donasi yang dibuat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $campaigns->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-guest-layout>
    <div class="bg-slate-50 min-h-screen py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb -->
            <nav class="flex mb-6 text-xs text-slate-500">
                <a href="{{ route('campaigns.index') }}" class="hover:text-emerald-600">Program Donasi</a>
                <span class="mx-2">/</span>
                <a href="{{ route('campaigns.show', $campaign->slug) }}" class="hover:text-emerald-600 truncate max-w-[200px]">
                    {{ $campaign->title }}
                </a>
                <span class="mx-2">/</span>
                <span class="text-slate-800 font-semibold">Form Donasi</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <!-- Kolom Form Donasi -->
                <div class="lg:col-span-7 space-y-6">
                    <form action="#" method="POST" class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-xl shadow-slate-200/50 space-y-6">
                        @csrf

                        <!-- Hidden input untuk menyimpan ID Campaign yang disasar -->
                        <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

                        <div>
                            <h2 class="text-xl font-bold text-slate-900">Isi Nominal Donasi</h2>
                            <p class="text-xs text-slate-500 mt-1">Pilih atau masukkan jumlah donasi yang ingin Anda salurkan.</p>
                        </div>

                        <!-- Preset Nominal Cepat -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-3">Pilih Nominal</label>
                            <div class="grid grid-cols-3 gap-3" x-data="{ amount: 50000 }">
                                <button type="button" @click="amount = 20000" :class="amount === 20000 ? 'border-emerald-600 bg-emerald-50 text-emerald-700 font-bold' : 'border-slate-200 text-slate-600'" class="py-3 text-xs sm:text-sm border rounded-xl hover:border-emerald-500 transition-all">
                                    Rp 20.000
                                </button>
                                <button type="button" @click="amount = 50000" :class="amount === 50000 ? 'border-emerald-600 bg-emerald-50 text-emerald-700 font-bold' : 'border-slate-200 text-slate-600'" class="py-3 text-xs sm:text-sm border rounded-xl hover:border-emerald-500 transition-all">
                                    Rp 50.000
                                </button>
                                <button type="button" @click="amount = 100000" :class="amount === 100000 ? 'border-emerald-600 bg-emerald-50 text-emerald-700 font-bold' : 'border-slate-200 text-slate-600'" class="py-3 text-xs sm:text-sm border rounded-xl hover:border-emerald-500 transition-all">
                                    Rp 100.000
                                </button>
                                <button type="button" @click="amount = 250000" :class="amount === 250000 ? 'border-emerald-600 bg-emerald-50 text-emerald-700 font-bold' : 'border-slate-200 text-slate-600'" class="py-3 text-xs sm:text-sm border rounded-xl hover:border-emerald-500 transition-all">
                                    Rp 250.000
                                </button>
                                <button type="button" @click="amount = 500000" :class="amount === 500000 ? 'border-emerald-600 bg-emerald-50 text-emerald-700 font-bold' : 'border-slate-200 text-slate-600'" class="py-3 text-xs sm:text-sm border rounded-xl hover:border-emerald-500 transition-all">
                                    Rp 500.000
                                </button>
                                <button type="button" @click="amount = 1000000" :class="amount === 1000000 ? 'border-emerald-600 bg-emerald-50 text-emerald-700 font-bold' : 'border-slate-200 text-slate-600'" class="py-3 text-xs sm:text-sm border rounded-xl hover:border-emerald-500 transition-all">
                                    Rp 1.000.000
                                </button>

                                <!-- Custom Input Nominal -->
                                <div class="col-span-3 mt-2">
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-sm font-bold text-slate-400">Rp</span>
                                        <input type="number" name="amount" x-model="amount" placeholder="Nominal Lainnya..." min="10000" required
                                               class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-xl text-slate-900 font-semibold focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="border-slate-100">

                        <!-- Data Donatur -->
                        <div class="space-y-4">
                            <h2 class="text-lg font-bold text-slate-900">Data Donatur</h2>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="donor_name" placeholder="Masukkan nama Anda" required
                                       class="w-full px-4 py-3 border border-slate-200 rounded-xl text-slate-900 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Email</label>
                                    <input type="email" name="donor_email" placeholder="contoh@email.com" required
                                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-slate-900 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nomor WhatsApp</label>
                                    <input type="tel" name="donor_phone" placeholder="08123456789" required
                                           class="w-full px-4 py-3 border border-slate-200 rounded-xl text-slate-900 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Doa / Dukungan (Opsional)</label>
                                <textarea name="comment" rows="3" placeholder="Tuliskan doa atau niat baik Anda untuk para santri..."
                                          class="w-full px-4 py-3 border border-slate-200 rounded-xl text-slate-900 text-sm focus:ring-emerald-500 focus:border-emerald-500"></textarea>
                            </div>

                            <div class="flex items-center gap-2 pt-1">
                                <input type="checkbox" id="is_anonymous" name="is_anonymous" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 h-4 w-4">
                                <label for="is_anonymous" class="text-xs text-slate-600 select-none">Sembunyikan nama saya (Sebagai Hamba Allah)</label>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg shadow-emerald-600/20 transition-all text-sm">
                            Lanjut ke Pembayaran
                        </button>
                    </form>
                </div>

                <!-- Kolom Ringkasan Campaign Dinamis -->
                <div class="lg:col-span-5">
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xl shadow-slate-200/50 sticky top-8 space-y-4">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Anda Akan Berdonasi Untuk</h3>

                        <div class="flex items-start gap-4">
                            @if($campaign->featured_image)
                                <img src="{{ Storage::url($campaign->featured_image) }}" alt="{{ $campaign->title }}" class="w-20 h-20 rounded-xl object-cover shrink-0">
                            @else
                                <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=600" alt="{{ $campaign->title }}" class="w-20 h-20 rounded-xl object-cover shrink-0">
                            @endif

                            <div>
                                <span class="inline-block px-2 py-0.5 bg-emerald-100 text-emerald-700 text-[10px] font-bold rounded">
                                    {{ $campaign->category->name ?? 'Donasi' }}
                                </span>
                                <h4 class="font-bold text-slate-900 text-sm leading-snug mt-1">
                                    {{ $campaign->title }}
                                </h4>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 space-y-2">
                            <div class="flex justify-between text-xs text-slate-500">
                                <span>Penyelenggara</span>
                                <span class="font-semibold text-slate-800">{{ $campaign->user->name ?? 'Rumah Tahfiz Amanah' }}</span>
                            </div>
                            <div class="flex justify-between text-xs text-slate-500">
                                <span>Target Program</span>
                                <span class="font-semibold text-slate-800">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 text-xs text-slate-600 space-y-2">
                            <div class="flex items-center gap-2 font-semibold text-emerald-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                Transaksi Aman & Terverifikasi
                            </div>
                            <p>Donasi disalurkan secara transparan dan langsung dialokasikan untuk operasional program santri.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>

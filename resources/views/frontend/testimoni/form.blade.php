<div id="form-testimoni" class="max-w-xl mx-auto bg-slate-50 p-6 rounded-2xl border border-slate-200 mt-10">
    <h3 class="font-bold text-slate-900 mb-4 text-center">Bagi Kesan & Doa Anda</h3>
    <form onsubmit="kirimTestimoniWA(event)" class="space-y-4">
        <div>
            <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap</label>
            <input type="text" id="nama" required class="w-full text-xs px-3 py-2 rounded-lg border border-slate-300 focus:outline-emerald-600">
        </div>
        <div>
            <label class="block text-xs font-semibold text-slate-700 mb-1">Status</label>
            <select id="peran" class="w-full text-xs px-3 py-2 rounded-lg border border-slate-300 focus:outline-emerald-600">
                <option value="Santri">Santri Tahfiz</option>
                <option value="Orang Tua Santri">Orang Tua / Wali Santri</option>
                <option value="Donatur">Donatur / Muwakif</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-semibold text-slate-700 mb-1">Kesan & Pesan</label>
            <textarea id="pesan" rows="3" required class="w-full text-xs px-3 py-2 rounded-lg border border-slate-300 focus:outline-emerald-600"></textarea>
        </div>
        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs py-2.5 rounded-xl transition-all flex items-center justify-center gap-2">
            📲 Kirim via WhatsApp Admin
        </button>
    </form>
</div>

<script>
function kirimTestimoniWA(e) {
    e.preventDefault();
    const nama = document.getElementById('nama').value;
    const peran = document.getElementById('peran').value;
    const pesan = document.getElementById('pesan').value;
    const noHPAdmin = "6281234567890"; // Ganti dengan nomor WA Admin

    const teks = `*Testimoni Baru Web Rumah Tahfiz*%0A%0A*Nama:* ${nama}%0A*Status:* ${peran}%0A*Kesan:* "${pesan}"`;
    window.open(`https://wa.me/${noHPAdmin}?text=${teks}`, '_blank');
}
</script>

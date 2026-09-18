<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Ujian Tasmi\' 3 Juz Santri Angkatan Ke-2',
                'slug' => Str::slug('Ujian Tasmi 3 Juz Santri Angkatan Ke-2'),
                'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=600&auto=format&fit=crop',
                'excerpt' => 'Alhamdulillah, sebanyak 10 santri berhasil menuntaskan hafalan dengan predikat mumtaz.',
                'body' => 'Kegiatan ini diadakan sebagai tolok ukur kelancaran hafalan para santri sebelum melangkah ke juz berikutnya.',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Penyaluran Menu MBG Sehat Pekan Ke-2',
                'slug' => Str::slug('Penyaluran Menu MBG Sehat Pekan Ke-2'),
                'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=600&auto=format&fit=crop',
                'excerpt' => 'Pemberian nutrisi berupa susu, buah, dan makanan bergizi untuk mendukung hafalan harian.',
                'body' => 'Nutrisi yang baik sangat mendukung daya ingat dan fokus para santri penghafal Al-Qur\'an.',
                'published_at' => now()->subDays(5),
            ],
        ];

        foreach ($data as $item) {
            Artikel::create($item);
        }
    }
}

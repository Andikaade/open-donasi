<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Profil & Kegiatan Santri',
                'type' => 'video',
                'file_path' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'category' => 'video',
                'description' => 'Dokumentasi harian hafalan Al-Qur\'an',
            ],
            [
                'title' => 'Bimbingan Tajwid & Tahsin Ustadz',
                'type' => 'image',
                'file_path' => 'https://images.unsplash.com/photo-1585036156171-384164a8c675?auto=format&fit=crop&w=1000&q=80',
                'category' => 'kegiatan',
                'description' => 'Suasana bimbingan tajwid santri.',
            ],
            [
                'title' => 'Penyaluran Program Makan Bergizi (MBG)',
                'type' => 'image',
                'file_path' => 'https://images.unsplash.com/photo-1542810634-71277d95dcbb?auto=format&fit=crop&w=1000&q=80',
                'category' => 'penyaluran',
                'description' => 'Penyaluran makanan sehat dan nutrisi.',
            ],
            [
                'title' => 'Pelaksanaan Ujian Tasmi\' Sekali Duduk',
                'type' => 'image',
                'file_path' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1000&q=80',
                'category' => 'kegiatan',
                'description' => 'Ujian kelancaran hafalan santri.',
            ],
        ];

        foreach ($data as $item) {
            Gallery::create($item);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campaign::create([
            'category_id' => 1, // ID Kategori Program MBG Mandiri
            'title' => 'Dapur Tahfiz: Makan Bergizi Gratis (MBG) untuk Santri',
            'slug' => 'dapur-tahfiz-makan-bergizi-gratis-mbg-santri',
            'short_description' => 'Program penyediaan makanan sehat dan bergizi secara gratis untuk santri hafiz Al-Quran secara mandiri.',
            'description' => 'Program ini ditujukan untuk memenuhi kebutuhan nutrisi santri sehari-hari tanpa membebani orang tua murid maupun pemerintah.',
            'target_amount' => 15000000.00,
            'current_amount' => 0.00,
            'featured_image' => 'campaigns/default-mbg.jpg',
            'is_active' => true,
        ]);
    }
}

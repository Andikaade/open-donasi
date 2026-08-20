<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Program MBG Mandiri', 'slug' => 'program-mbg-mandiri'],
            ['name' => 'Gaji & Insentif Guru Tahfiz', 'slug' => 'gaji-insentif-guru-tahfiz'],
            ['name' => 'Perbaikan & Renovasi', 'slug' => 'perbaikan-renovasi'],
            ['name' => 'Sarana & Alat Belajar', 'slug' => 'sarana-alat-belajar'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

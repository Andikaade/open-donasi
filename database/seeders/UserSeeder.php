<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin_tahfiz',
            'name' => 'Pengurus Rumah Tahfiz',
            'email' => 'admin@rumahtahfiz.or.id',
            'password' => Hash::make('password123'),
            'phone' => '081234567890',
            'is_admin' => true,
        ]);
    }
}

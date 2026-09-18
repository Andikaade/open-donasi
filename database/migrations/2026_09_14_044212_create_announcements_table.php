<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->default('PENGUMUMAN PENTING');
            $table->string('title');
            $table->text('description');

            // Button 1
            $table->string('primary_button_text')->nullable();
            $table->string('primary_button_url')->nullable();

            // Button 2
            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_url')->nullable();

            // Metadata / Badge Bawah (Opsional)
            $table->string('kuota')->nullable(); // contoh: '30 Santri'
            $table->string('batas_akhir')->nullable(); // contoh: '15 Maret 2026'
            $table->string('beasiswa')->nullable(); // contoh: 'Gratis 100%'

            // Status Aktif/Non-Aktif
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function __construct() {}

public function up(): void
{
    Schema::create('profils', function (Blueprint $table) {
        $table->id();
        
        // Header / Hero Banner
        $table->string('hero_judul')->default('Profil Perusahaan');
        $table->text('hero_deskripsi')->nullable();
        
        // Tentang Perusahaan
        $table->string('nama_perusahaan')->default('PT Solusi Koneksi Anda');
        $table->text('deskripsi_1')->nullable();
        $table->text('deskripsi_2')->nullable();
        
        // Visi & Misi
        $table->text('visi')->nullable();
        $table->text('misi')->nullable();
        
        // Statistik Keunggulan
        $table->string('stat_1_angka')->default('99.9%');
        $table->string('stat_1_label')->default('Uptime SLA Network');
        $table->string('stat_2_angka')->default('24/7');
        $table->string('stat_2_label')->default('Dukungan Tim Teknis');
        $table->string('stat_3_angka')->default('100+');
        $table->string('stat_3_label')->default('Klien Korporat & Bisnis');
        
        $table->timestamps();
    });
}
};
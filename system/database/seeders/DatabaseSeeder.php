<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Kelas;
use App\Models\Bidang;
use App\Models\KategoriAset;
use App\Models\PengaturanPembelajaran;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       

        Admin::factory()->create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'level' => '1',
            'nip' => '19780212 200405 3 003',
            'jabatan' => 'Operator Dinas',
            'no_telp' => '081234567890',
        ]);


        Bidang::factory()->create([
            'bidang_nama' => 'Bidang PAUD',
        ]);

        Bidang::factory()->create([
            'bidang_nama' => 'Bidang SD',
        ]);

        Bidang::factory()->create([
            'bidang_nama' => 'Bidang SMP',
        ]);

        Bidang::factory()->create([
            'bidang_nama' => 'Bidang SMA',
        ]);


        KategoriAset::factory()->create([
            'kategori_nama' => 'laptop/pc',
        ]);

        KategoriAset::factory()->create([
            'kategori_nama' => 'Tablet',
        ]);


        KategoriAset::factory()->create([
            'kategori_nama' => 'motor',
        ]);

        KategoriAset::factory()->create([
            'kategori_nama' => 'mobil',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Semester;
use App\Models\TahunAjaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAjaranSemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahunAjaran1 = TahunAjaran::create([
            'tahun_ajaran' => '2024/2025',
            'tanggal_mulai' => '2024-09-01',
            'tanggal_selesai' => '2025-08-31',
            'status' => 'aktif',
        ]);

        Semester::create([
            'tahun_ajaran_id' => $tahunAjaran1->id,
            'semester' => 'ganjil',
            'tanggal_mulai' => '2024-09-01',
            'tanggal_selesai' => '2025-02-28',
            'status' => 'aktif',
        ]);

        $tahunAjaran2 = TahunAjaran::create([
            'tahun_ajaran' => '2023/2024',
            'tanggal_mulai' => '2023-09-01',
            'tanggal_selesai' => '2024-08-31',
            'status' => 'tidak aktif',
        ]);

        Semester::create([
            'tahun_ajaran_id' => $tahunAjaran2->id,
            'semester' => 'genap',
            'tanggal_mulai' => '2024-03-01',
            'tanggal_selesai' => '2024-08-31',
            'status' => 'tidak aktif',
        ]);
    }
}

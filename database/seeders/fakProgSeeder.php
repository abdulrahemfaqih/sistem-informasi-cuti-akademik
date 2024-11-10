<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\ProgramStudi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class fakProgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakultasData = [
            'Teknik' => [
                'Teknik Informatika',
                'Teknik Elektro',
                'Teknik Mesin',
                'Teknik Mekaotronika',
                'Teknik Industri',
                'Sistem Informasi'
            ],
            'Ekonomi dan Bisnis' => [
                'Manajemen',
                'Akuntansi',
                'Ekonomi Pembangunan'
            ],
            'Ilmu Sosial dan Ilmu Politik' => [
                'Sosiologi',
                'Sastra Inggris',
                'Ilmu Komunikasi',
                'Psihologi'
            ],
            'Keislaman' => [
                'Ekonomi Syariah',
                'Hukum Bisnis Syariah'
            ],
            'Hukum' => [
                'Ilmu Hukum'
            ],
            'Pertanian' => [
                'Agroteknologi',
                'Agribisnis',
                'Teknologi Ilmu Pertanian',
                'Ilmu Kelautan',
                'Manajemen Sumberdaya Peraiaran'
            ],
            'Ilmu Pendidikan' => [
                'Pendidikan Guru Sekolah Dasar',
                'Pendidikan Anak Usia Dini',
                'Pendidilan Ilmu Pengetahuan Alam',
                'Pendidikan Informatika',
                'Pendidikan Bahasa dan Sastra Indonesia'
            ]
        ];

        foreach ($fakultasData as $fakultas => $programStudi) {
            $fakultasModel = Fakultas::create([
                'nama' => $fakultas,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($programStudi as $prodi) {
                ProgramStudi::create([
                    'fakultas_id' => $fakultasModel->id,
                    'nama' => $prodi,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

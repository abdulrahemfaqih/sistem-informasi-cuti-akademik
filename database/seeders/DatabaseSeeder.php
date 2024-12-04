<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Fakultas;
use App\Models\Semester;
use App\Models\Mahasiswa;
use App\Models\TahunAjaran;
use Illuminate\Support\Str;
use App\Models\PengajuanBss;
use App\Models\ProgramStudi;
use App\Models\AdminFakultas;
use Illuminate\Database\Seeder;
use App\Models\DokumenPendukung;
use App\Models\TanggunganFakultas;
use App\Models\TanggunganPerpustakaan;
use App\Models\TanggunganLab;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if (TahunAjaran::count() === 0 && Semester::count() === 0) {
            $this->call(TahunAjaranSemesterSeeder::class);
        }
        if (Fakultas::count() === 0) {
            $this->call(FakprogSeeder::class);
        }

        if (User::where('username', 'faqih')->count() === 0) {
            User::create([
                'name' => 'Pak Faqih',
                'username' => 'faqih',
                'email' => 'faqih3935@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin_bak',
            ]);
        }
        if (User::where('username', 'ilham')->count() === 0) {
            User::create([
                'name' => 'Pak Zakaria',
                'username' => 'ilham',
                'email' => 'ilham@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin_fakultas',
            ]);
        }
        if (User::where('Username', 'fais')->count() === 0){
            User::create([
                'name' => 'Pak Shah',
                'username' => 'fais',
                'email' => 'fais.shah@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin_perpus',
            ]);
        }
        if (User::where('Username', 'qian')->count() === 0){
            User::create([
                'name' => 'Pak Qian',
                'username' => 'qian',
                'email' => 'fais.qian@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin_lab',
            ]);
        }
        if (Mahasiswa::count() === 0) {
            $programStudis = DB::table('program_studi')->get();

            $totalMahasiswa = $programStudis->count() * 2;
            $this->command->info("proses mengisi data mahasiswa sebanyak $totalMahasiswa");
            $this->command->getOutput()->progressStart($totalMahasiswa);

            foreach ($programStudis as $prodi) {
                for ($i = 0; $i < 2; $i++) {
                    Mahasiswa::factory()->create([
                        'program_studi_id' => $prodi->id,
                    ]);

                    // Perbarui progress bar setiap ka  li data mahasiswa dibuat
                    if ($i % 2 === 0) {
                        $this->command->getOutput()->progressAdvance(10);
                    }
                }
            }

            $this->command->getOutput()->progressFinish();
            $this->command->info("Selesai mengisi data mahasiswa.");
        }

        if (TanggunganFakultas::count() == 0) {
            $mahasiswaIds = Mahasiswa::pluck('id')->random(20);
            $fakultasIds = Fakultas::where('nama', 'Teknik')->pluck('id');

            if ($fakultasIds->isNotEmpty()) {
                foreach ($mahasiswaIds as $key => $mahasiswaId) {
                    DB::table('tanggungan_fakultas')->insert([
                        'id' => Str::ulid(),
                        'mahasiswa_id' => $mahasiswaId,
                        'fakultas_id' => $fakultasIds->random(),
                        'nama_tanggungan' => 'Tunggakan UKT',
                        'status' => 'Belum Lunas',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            } else {
                $this->command->info('Fakultas dengan nama Teknik tidak ditemukan.');
            }
        }

        if (TanggunganPerpustakaan::count() == 0) {
            $mahasiswaIds = Mahasiswa::pluck('id')->random(20);
            $fakultasIds = Fakultas::where('nama', 'Teknik')->pluck('id');
        
            if ($fakultasIds->isNotEmpty()) {
                foreach ($mahasiswaIds as $key => $mahasiswaId) {
                    DB::table('tanggungan_perpustakaan')->insert([
                        'id' => Str::ulid(),
                        'mahasiswa_id' => $mahasiswaId,
                        'nama_tanggungan' => 'Peminjaman Barang',
                        'status' => 'Belum Lunas',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            } else {
                $this->command->info('Fakultas dengan nama Teknik tidak ditemukan.');
            }
        }

        if (TanggunganLab::count() == 0) {
            $mahasiswaIds = Mahasiswa::pluck('id')->random(20);
            $fakultasIds = Fakultas::where('nama', 'Teknik')->pluck('id');
        
            if ($fakultasIds->isNotEmpty()) {
                foreach ($mahasiswaIds as $key => $mahasiswaId) {
                    DB::table('tanggungan_lab')->insert([
                        'id' => Str::ulid(),
                        'mahasiswa_id' => $mahasiswaId,
                        'nama_tanggungan' => 'Peminjaman Barang',
                        'status' => 'Belum Lunas',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            } else {
                $this->command->info('Fakultas dengan nama Teknik tidak ditemukan.');
            }
        }

        if (User::where('username', '220411100100')->orWhere('username', '220411100035')->count() === 0) {
            $user1 = User::create([
                'name' => 'Ilham Zakaria',
                'username' => '220411100100',
                'email' => 'ilhamzakaria3024@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'mahasiswa',
            ]);
            Mahasiswa::create([
                'nim' => '220411100100',
                'angkatan' => 22,
                'tanggal_masuk' => '2022-09-01',
                'status' => 'aktif',
                'alamat' => 'Jl. Jalan',
                'program_studi_id' => ProgramStudi::where('nama', 'Teknik Informatika')->first()->id,
                'user_id' => $user1->id,
            ]);


            $user2 = User::create([
                'name' => 'Kun Fadhilah',
                'username' => '220411100035',
                'email' => 'kunfadhilaha@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'mahasiswa',
            ]);

            Mahasiswa::create([
                'nim' => '220411100035',
                'angkatan' => 22,
                'tanggal_masuk' => '2022-09-01',
                'status' => 'aktif',
                'alamat' => 'Jl. Jalan',
                'program_studi_id' => ProgramStudi::where('nama', 'Teknik Informatika')->first()->id,
                'user_id' => $user2->id,
            ]);
        }

        if (PengajuanBss::count() === 0 && DokumenPendukung::count() === 0) {
            $this->call(PengajuanBssDokumenPendukungSeeder::class);
        }
    }
}

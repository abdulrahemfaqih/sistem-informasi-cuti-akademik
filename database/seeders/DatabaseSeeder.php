<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\AdminFakultas;
use App\Models\DokumenPendukung;
use App\Models\PengajuanBss;
use App\Models\ProgramStudi;
use App\Models\Semester;
use App\Models\TahunAjaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        if (Mahasiswa::count() === 0) {
            $programStudis = DB::table('program_studi')->get();

            $totalMahasiswa = $programStudis->count() * 10;
            $this->command->info("proses mengisi data mahasiswa sebanyak $totalMahasiswa");
            $this->command->getOutput()->progressStart($totalMahasiswa);

            foreach ($programStudis as $prodi) {
                for ($i = 0; $i < 10; $i++) {
                    Mahasiswa::factory()->create([
                        'program_studi_id' => $prodi->id,
                    ]);

                    // Perbarui progress bar setiap kali data mahasiswa dibuat
                    if ($i % 10 === 0) {
                        $this->command->getOutput()->progressAdvance(10);
                    }
                }
            }

            $this->command->getOutput()->progressFinish();
            $this->command->info("Selesai mengisi data mahasiswa.");
        }



        // seeder untuk mahasiswa dan email asli


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

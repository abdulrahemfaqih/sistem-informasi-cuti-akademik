<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\AdminFakultas;
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

        if (Fakultas::count() === 0) {
            $this->call(FakprogSeeder::class);
        }

        User::create([
            'name' => 'Pak Faqih',
            'username' => 'faqih',
            'email' => 'faqih3935@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin_bak',
        ]);

        $fakultas = Fakultas::all();
        foreach ($fakultas as $fak) {
            $AdminUser = User::create([
                'name' => 'Admin ' . $fak->nama,
                'username' => 'Admin' . strtolower(str_replace(' ', '_', $fak->nama)),
                'email' => 'Admin' . strtolower(str_replace(' ', '_', $fak->nama)) . '@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin_fakultas',
            ]);

            AdminFakultas::create([
                'fakultas_id' => $fak->id,
                'user_id' => $AdminUser->id,
            ]);
        }

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

        // seeder untuk mahasiswa dan email asli
        $user1 = User::create([
            'name' => 'Ilham Zakaria',
            'username' => '220411100100',
            'email' =>'ilhamzakaria3024@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'mahasiswa',
        ]);
        Mahasiswa::create([
            'nim' => '220411100100',
            'angkatan' => 22,
            'tanggal_masuk' => '2022-09-01',
            'status' => 'aktif',
            'alamat' => 'Jl. Jalan',
            'program_studi_id' => '01jcb36304g2zt0yby2wb1w0h3',
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
            'program_studi_id' => '01jcb36304g2zt0yby2wb1w0h3',
            'user_id' => $user2->id,
        ]);





    }


}

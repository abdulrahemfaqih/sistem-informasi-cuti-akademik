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
            "name" => "jokosuwardo",
            "username" => "jokosuwardo",
            'email' => 'admin_bak@gmail.com',
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

        $totalMahasiswa = $programStudis->count() * 20;
        $this->command->info("proses mengisi data mahasiswa sebanyak $totalMahasiswa");
        $this->command->getOutput()->progressStart($totalMahasiswa);

        foreach ($programStudis as $prodi) {
            for ($i = 0; $i < 20; $i++) {
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
}

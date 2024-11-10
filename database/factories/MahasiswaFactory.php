<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\ProgramStudi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $angkatan = $this->faker->numberBetween(21, 24);
        $nim = $angkatan . $this->faker->numerify('##########');

        $user = User::create([
            'id' => Str::ulid()->toBase32(),
            'name' => $this->faker->name('id_ID'),
            'username' => $nim, // Username disamakan dengan NIM
            'email' => $this->faker->unique()->safeEmail('id_ID'),
            'password' => bcrypt('password'),
            'role' => 'mahasiswa',
        ]);
        return [
            'id' => Str::ulid()->toBase32(),
            'nim' => $nim,
            'angkatan' => $angkatan,
            'tanggal_masuk' => $this->faker->date(),
            'status' => $this->faker->randomElement(['aktif', 'tidak aktif', 'lulus']),
            'alamat' => $this->faker->address('id_ID'),
            'program_studi_id' => ProgramStudi::inRandomOrder()->first()->id,
            'user_id' => $user->id,
        ];
    }
}

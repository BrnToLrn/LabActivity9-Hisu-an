<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nurse Hisu-an',
            'email' => 'nurse.hisuan@bakuna.test',
            'password' => Hash::make('bakuna2026'),
        ]);

        $this->call([
            VaccinationSeeder::class,
        ]);
    }
}

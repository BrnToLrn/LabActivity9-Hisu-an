<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use Illuminate\Database\Seeder;

class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'patient_name' => 'Warlic Archmage',
                'purok' => 'Purok Alteon',
                'vaccine' => 'BCG',
                'dose' => '1st dose',
                'scheduled_at' => '2026-11-03',
                'status' => 'Scheduled',
            ],
            [
                'patient_name' => 'Artix ArchPaladin',
                'purok' => 'Purok Battleon',
                'vaccine' => 'Anti-Flu',
                'dose' => 'Annual',
                'scheduled_at' => '2026-10-20',
                'status' => 'Overdue',
            ],
            [
                'patient_name' => 'Baby Uncle Dags',
                'purok' => 'Purok GHR',
                'vaccine' => 'Pentavalent',
                'dose' => '2nd dose',
                'scheduled_at' => '2026-11-15',
                'status' => 'Scheduled',
            ],
            [
                'patient_name' => '',
                'purok' => 'Purok Yokai',
                'vaccine' => 'OPV',
                'dose' => '3rd dose',
                'scheduled_at' => '2026-10-05',
                'status' => 'Done',
            ],
            [
                'patient_name' => 'Nulgath ArchFiend ',
                'purok' => 'Purok 4',
                'vaccine' => 'MMR',
                'dose' => '1st dose',
                'scheduled_at' => '2026-10-28',
                'status' => 'Done',
            ],
            [
                'patient_name' => 'Drakath ChampionChaos',
                'purok' => 'Purok Dauntless',
                'vaccine' => 'Hepatitis B',
                'dose' => 'Booster',
                'scheduled_at' => '2026-10-30',
                'status' => 'Scheduled',
            ],
            [
                'patient_name' => 'Flow Gee',
                'purok' => 'Purok 46',
                'vaccine' => 'Anti-Flu',
                'dose' => 'Annual Booster',
                'scheduled_at' => '2026-06-15',
                'status' => 'Scheduled',
            ],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}

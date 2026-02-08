<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        $educations = [
            [
                'institution' => 'SMPI Al-Abidin Surakarta',
                'degree' => 'Program Unggulan ICT (Information and Communication Technology)',
                'description' => null,
                'start_year' => 2016,
                'end_year' => 2019,
                'is_graduated' => true,
            ],
            [
                'institution' => 'SMKN 1 Adiwerna',
                'degree' => 'Jurusan TKJ (Teknik Komputer dan Jaringan)',
                'description' => null,
                'start_year' => 2019,
                'end_year' => 2022,
                'is_graduated' => true,
            ],
        ];

        foreach ($educations as $index => $edu) {
            Education::updateOrCreate(
                ['institution' => $edu['institution']],
                array_merge($edu, ['order' => $index + 1])
            );
        }

        $this->command->info('Educations seeded successfully!');
    }
}
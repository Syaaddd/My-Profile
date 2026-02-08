<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'position' => 'Fullstack Web Developer',
                'company' => 'Ether.ID',
                'description' => 'Merancang dan membangun platform e-commerce aset digital menggunakan TALL Stack (Tailwind, Alpine, Laravel, Livewire). Mengembangkan antarmuka responsif dengan Tailwind CSS, fitur dark mode, dan integrasi model 3D interaktif. Mengintegrasikan komponen React JS untuk elemen antarmuka yang dinamis.',
                'start_date' => '2025-12-01',
                'end_date' => '2026-01-31',
                'is_current' => false,
                'location' => 'Remote',
            ],
            [
                'position' => 'Minecraft Server & Plugin Developer',
                'company' => 'Alwination & MineGens',
                'description' => 'Mengembangkan plugin kustom "EtherealEssence" dengan sistem peringkat dinamis dan random quest kompleks. Mengoptimalkan performa server untuk ratusan pemain real-time. Mengelola integrasi plugin RPG seperti MythicMobs, MMOCore, dan LuckPerms.',
                'start_date' => '2025-03-01',
                'end_date' => null,
                'is_current' => true,
                'location' => 'Remote',
            ],
        ];

        foreach ($experiences as $index => $exp) {
            Experience::updateOrCreate(
                ['company' => $exp['company'], 'position' => $exp['position']],
                array_merge($exp, ['order' => $index + 1])
            );
        }

        $this->command->info('Experiences seeded successfully!');
    }
}
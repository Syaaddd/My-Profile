<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Ether.ID - Digital Asset E-Commerce',
                'description' => 'Platform e-commerce aset digital full-featured menggunakan TALL Stack (Tailwind, Alpine, Laravel, Livewire). Fitur utama: responsive UI dengan Tailwind CSS, dark mode implementation, integrasi model 3D interaktif, komponen React JS untuk elemen dinamis, dan sistem pembayaran digital terintegrasi.',
                'short_description' => 'Platform e-commerce aset digital dengan TALL Stack dan fitur modern.',
                'technologies' => ['Laravel', 'Tailwind CSS', 'Livewire', 'Alpine.js', 'React JS', 'MySQL'],
                'github_url' => 'https://github.com/Syaaddd',
                'start_date' => '2025-12-01',
                'end_date' => '2026-01-31',
                'is_featured' => true,
            ],
            [
                'title' => 'EtherealEssence - Minecraft Plugin Suite',
                'description' => 'Plugin Java kustom komprehensif untuk server Minecraft dengan sistem peringkat dinamis, random quest generator yang kompleks, dan optimasi performa untuk ratusan pemain real-time. Integrasi seamless dengan plugin RPG pihak ketiga seperti MythicMobs, MMOCore, dan LuckPerms.',
                'short_description' => 'Plugin Java komprehensif untuk Minecraft server dengan sistem RPG.',
                'technologies' => ['Java', 'MySQL', 'Minecraft API', 'Server Optimization'],
                'github_url' => 'https://github.com/Syaaddd',
                'start_date' => '2025-03-01',
                'end_date' => null,
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $index => $project) {
            Project::updateOrCreate(
                ['title' => $project['title']],
                array_merge($project, ['order' => $index + 1])
            );
        }

        $this->command->info('Projects seeded successfully!');
    }
}
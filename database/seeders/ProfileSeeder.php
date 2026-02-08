<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::updateOrCreate(
            ['id' => 1],
            [
                'full_name' => 'M. ARSYAD AL KAHFI',
                'profession' => 'FULL STACK WEBSITE DEVELOPMENT',
                'description' => 'Fullstack Developer yang berfokus pada penyampaian hasil berdampak, dengan kemahiran utama dalam membangun aplikasi web modern menggunakan Laravel dan Tailwind CSS. Saya antusias dalam menghadapi tantangan dinamis dan saat ini aktif memperluas kapabilitas pengembangan frontend melalui React JS.',
                'address' => 'Jl. Melati No. 1 Mindaka, Kabupaten Tegal',
                'phone' => '+62 85771484673',
                'github_url' => 'https://github.com/Syaaddd',
                'linkedin_url' => null,
                'website_url' => null,
                'meta_title' => 'M. ARSYAD AL KAHFI - Full Stack Web Developer',
                'meta_description' => 'Fullstack Developer dengan keahlian Laravel, React JS, dan modern web development.',
            ]
        );

        $this->command->info('Profile data seeded successfully!');
    }
}
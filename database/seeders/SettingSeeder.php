<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General Settings
            ['key' => 'site_name', 'value' => 'Portfolio - M. ARSYAD AL KAHFI', 'type' => 'string', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Full Stack Web Developer Portfolio', 'type' => 'text', 'group' => 'general'],
            ['key' => 'maintenance_mode', 'value' => '0', 'type' => 'boolean', 'group' => 'general'],
            
            // SEO Settings
            ['key' => 'meta_author', 'value' => 'M. ARSYAD AL KAHFI', 'type' => 'string', 'group' => 'seo'],
            ['key' => 'meta_keywords', 'value' => 'web developer, laravel, react, fullstack, portfolio', 'type' => 'string', 'group' => 'seo'],
            ['key' => 'google_analytics', 'value' => '', 'type' => 'string', 'group' => 'seo'],
            
            // Contact Settings
            ['key' => 'contact_email', 'value' => 'strxshopxlb@gmail.com', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+62 85771484673', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'Jl. Melati No. 1 Mindaka, Kabupaten Tegal', 'type' => 'text', 'group' => 'contact'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        $this->command->info('Settings seeded successfully!');
    }
}
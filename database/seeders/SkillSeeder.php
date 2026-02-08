<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Laravel', 'proficiency' => 90, 'category' => 'Backend'],
            ['name' => 'React JS', 'proficiency' => 75, 'category' => 'Frontend'],
            ['name' => 'PHP', 'proficiency' => 88, 'category' => 'Backend'],
            ['name' => 'JavaScript', 'proficiency' => 85, 'category' => 'Frontend'],
            ['name' => 'HTML5', 'proficiency' => 95, 'category' => 'Frontend'],
            ['name' => 'CSS3', 'proficiency' => 90, 'category' => 'Frontend'],
            ['name' => 'Java', 'proficiency' => 70, 'category' => 'Backend'],
            ['name' => 'Tailwind CSS', 'proficiency' => 92, 'category' => 'Frontend'],
            ['name' => 'Bootstrap', 'proficiency' => 85, 'category' => 'Frontend'],
            ['name' => 'Git/GitHub', 'proficiency' => 88, 'category' => 'Tools'],
            ['name' => 'MySQL', 'proficiency' => 85, 'category' => 'Database'],
        ];

        foreach ($skills as $index => $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name']],
                array_merge($skill, ['order' => $index + 1])
            );
        }

        $this->command->info('Skills seeded successfully!');
    }
}
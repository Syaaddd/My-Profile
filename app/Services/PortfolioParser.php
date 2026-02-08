<?php

namespace App\Services;

class PortfolioParser
{
    protected $content;
    protected $data = [];

    public function __construct(string $filePath)
    {
        if (file_exists($filePath)) {
            $this->content = file_get_contents($filePath);
            $this->parse();
        }
    }

    protected function parse()
    {
        // Parse name from first line (before **)
        if (preg_match('/^(.+?)\s*\*\*/m', $this->content, $matches)) {
            $this->data['name'] = trim($matches[1]);
        } else {
            $this->data['name'] = 'M. ARSYAD AL KAHFI';
        }

        // Parse profession from first line (between ** **)
        if (preg_match('/\*\*\s*(.+?)\s*\*\*/', $this->content, $matches)) {
            $this->data['profession'] = trim($matches[1]);
        } else {
            $this->data['profession'] = 'Full Stack Web Developer';
        }

        // Parse address and email from second line
        if (preg_match('/^Jl\..+?\|(.+?)$/m', $this->content, $matches)) {
            $this->data['address'] = trim(explode('|', $matches[0])[0]);
            $this->data['contact']['email'] = trim($matches[1]);
        }

        // Parse description from Profil Profesional section
        if (preg_match('/Profil Profesional\*\*\s*\n\n(.+?)(?=\n\n\*\*Keahlian|$)/s', $this->content, $matches)) {
            $this->data['description'] = trim($matches[1]);
        } else {
            $this->data['description'] = 'Fullstack Developer yang berfokus pada penyampaian hasil berdampak, dengan kemahiran utama dalam membangun aplikasi web modern menggunakan Laravel dan Tailwind CSS.';
        }

        // Parse all contact info
        $this->data['contact'] = $this->parseContact();

        // Parse skills
        $this->data['skills'] = $this->parseSkills();

        // Parse experience
        $this->data['experience'] = $this->parseExperience();

        // Parse education
        $this->data['education'] = $this->parseEducation();

        // Parse projects from experience
        $this->data['projects'] = $this->parseProjects();
    }

    protected function parseContact()
    {
        $contact = [];
        
        // Email
        if (preg_match('/strxshopxlb@gmail\.com/', $this->content)) {
            $contact['email'] = 'strxshopxlb@gmail.com';
        }

        // GitHub
        if (preg_match('/github\.com\/Syaaddd/', $this->content)) {
            $contact['github'] = 'https://github.com/Syaaddd';
        }

        // Phone
        if (preg_match('/\+62 85771484673/', $this->content)) {
            $contact['telepon'] = '+62 85771484673';
        }

        // Address
        if (preg_match('/^(Jl\. Melati No\. 1 Mindaka[^|]+)/m', $this->content, $matches)) {
            $contact['address'] = trim($matches[1]);
        }

        return $contact;
    }

    protected function parseSkills()
    {
        $skills = [];
        
        // Extract from the Keahlian section
        if (preg_match('/Keahlian.*?Area of Expertise\*\*\s*\n+((?:\*\s*\n\*\s*\*\*[^*]+\*\*:[^\n]+\n*?)+)/s', $this->content, $matches)) {
            $skillsText = $matches[1];
            
            // Parse each category
            if (preg_match_all('/\*\s*\n\*\s*\*\*(.+?)\*\*:\s*(.+?)(?=\n\n|\n\*\s*\n\*|$)/s', $skillsText, $categoryMatches, PREG_SET_ORDER)) {
                foreach ($categoryMatches as $match) {
                    $items = array_map('trim', explode(',', $match[2]));
                    foreach ($items as $item) {
                        // Clean up the item
                        $item = trim($item, '.* ()');
                        $item = preg_replace('/\s*\([^)]+\)/', '', $item); // Remove text in parentheses
                        if (!empty($item) && !in_array($item, $skills)) {
                            $skills[] = $item;
                        }
                    }
                }
            }
        }

        // Fallback skills if parsing fails
        if (empty($skills)) {
            $skills = [
                'Laravel', 'React JS', 'PHP', 'JavaScript', 
                'HTML5', 'CSS3', 'Java', 'Tailwind CSS', 
                'Bootstrap', 'Git/GitHub', 'MySQL'
            ];
        }

        return $skills;
    }

    protected function parseExperience()
    {
        $experiences = [];
        
        // Parse Ether.ID experience
        if (preg_match('/Fullstack Web Developer \| Ether\.ID.*?\*\*(.+?)\*\*/s', $this->content, $matches)) {
            $date = 'Desember 2025 - Januari 2026';
            $exp = "Fullstack Web Developer | Ether.ID ($date)";
            $experiences[] = $exp;
        }
        
        // Parse Minecraft experience
        if (preg_match('/Minecraft Server & Plugin Developer \| Alwination.*?\*\*(.+?)\*\*/s', $this->content, $matches)) {
            $date = 'Maret 2025 - Sekarang';
            $exp = "Minecraft Server & Plugin Developer | Alwination & MineGens ($date)";
            $experiences[] = $exp;
        }

        return $experiences;
    }

    protected function parseEducation()
    {
        $education = [];
        
        // Parse education section
        if (preg_match('/Pendidikan\*\*\s*\n+((?:\*\s*\n+\*\s*\*\*[^*]+\*\*:[^\n]+\n*?)+)/s', $this->content, $matches)) {
            $eduText = $matches[1];
            
            if (preg_match_all('/\*\s*\n+\*\s*\*\*(.+?)\*\*:\s*(.+?)(?=\n\n|\n\*|$)/s', $eduText, $eduMatches, PREG_SET_ORDER)) {
                foreach ($eduMatches as $match) {
                    $school = trim($match[1]);
                    $detail = trim($match[2]);
                    $education[] = "$school - $detail";
                }
            }
        }

        // Fallback
        if (empty($education)) {
            $education = [
                'SMPI Al-Abidin Surakarta - Program Unggulan ICT (Information and Communication Technology)',
                'SMKN 1 Adiwerna - Jurusan TKJ (Teknik Komputer dan Jaringan)'
            ];
        }

        return $education;
    }

    protected function parseProjects()
    {
        $projects = [];
        
        // Ether.ID Project
        $projects[] = [
            'name' => 'Ether.ID - Digital Asset E-Commerce Platform',
            'description' => 'Platform e-commerce aset digital full-featured menggunakan TALL Stack (Tailwind, Alpine, Laravel, Livewire). Fitur utama: responsive UI dengan Tailwind CSS, dark mode implementation, integrasi model 3D interaktif, komponen React JS untuk elemen dinamis, dan sistem pembayaran digital terintegrasi.',
            'tech' => ['Laravel', 'Tailwind CSS', 'Livewire', 'Alpine.js', 'React JS', 'MySQL'],
            'link' => 'https://github.com/Syaaddd',
            'period' => 'Des 2025 - Jan 2026'
        ];
        
        // Minecraft Plugin Project
        $projects[] = [
            'name' => 'EtherealEssence - Minecraft Plugin Suite',
            'description' => 'Plugin Java kustom komprehensif untuk server Minecraft dengan sistem peringkat dinamis, random quest generator yang kompleks, dan optimasi performa untuk ratusan pemain real-time. Integrasi seamless dengan plugin RPG pihak ketiga seperti MythicMobs, MMOCore, dan LuckPerms.',
            'tech' => ['Java', 'MySQL', 'Minecraft Plugin API', 'Server Optimization'],
            'link' => 'https://github.com/Syaaddd',
            'period' => 'Mar 2025 - Sekarang'
        ];

        return $projects;
    }

    public function getData()
    {
        return $this->data;
    }

    public function get($key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }
}
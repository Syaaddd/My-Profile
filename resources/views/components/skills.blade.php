<section id="skills" class="py-20 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-primary-600 dark:text-primary-400 font-semibold tracking-wide uppercase text-sm">Keahlian Teknis</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mt-2">
                Area of Expertise
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mt-4 max-w-2xl mx-auto">
                Kemampuan teknis dan tools yang saya kuasai dalam pengembangan aplikasi web dan sistem.
            </p>
        </div>
        
        @if(!empty($portfolio['skills']))
            <!-- Skills Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($portfolio['skills'] as $index => $skill)
                    @php
                        // Define skill categories and colors
                        $skillColors = [
                            'Laravel' => 'from-red-400 to-red-600',
                            'React JS' => 'from-blue-400 to-blue-600',
                            'PHP' => 'from-purple-400 to-purple-600',
                            'JavaScript' => 'from-yellow-400 to-yellow-600',
                            'HTML5' => 'from-orange-400 to-orange-600',
                            'CSS3' => 'from-blue-400 to-blue-600',
                            'Java' => 'from-red-400 to-red-600',
                            'Tailwind CSS' => 'from-cyan-400 to-cyan-600',
                            'Bootstrap' => 'from-purple-400 to-purple-600',
                            'Git/GitHub' => 'from-gray-400 to-gray-600',
                            'MySQL' => 'from-blue-400 to-blue-600',
                        ];
                        
                        $color = $skillColors[$skill] ?? 'from-primary-400 to-purple-600';
                    @endphp
                    
                    <div data-aos="fade-up" data-aos-delay="{{ $index * 50 }}" 
                         class="group bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700">
                        <div class="flex items-center gap-4">
                            <!-- Skill Icon -->
                            <div class="w-12 h-12 rounded-lg bg-gradient-to-br {{ $color }} flex items-center justify-center text-white font-bold text-lg group-hover:scale-110 transition-transform shadow-lg">
                                {{ substr($skill, 0, 1) }}
                            </div>
                            
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 dark:text-white group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                                    {{ $skill }}
                                </h3>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5 mt-2">
                                    <div class="bg-gradient-to-r {{ $color }} h-1.5 rounded-full transition-all duration-1000" 
                                         style="width: {{ rand(75, 95) }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Fallback Skills -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @php
                    $defaultSkills = [
                        ['name' => 'Laravel', 'level' => 90, 'color' => 'from-red-400 to-red-600'],
                        ['name' => 'React JS', 'level' => 75, 'color' => 'from-blue-400 to-blue-600'],
                        ['name' => 'PHP', 'level' => 88, 'color' => 'from-purple-400 to-purple-600'],
                        ['name' => 'JavaScript', 'level' => 85, 'color' => 'from-yellow-400 to-yellow-600'],
                        ['name' => 'HTML5', 'level' => 95, 'color' => 'from-orange-400 to-orange-600'],
                        ['name' => 'CSS3', 'level' => 90, 'color' => 'from-blue-400 to-blue-600'],
                        ['name' => 'Java', 'level' => 70, 'color' => 'from-red-400 to-red-600'],
                        ['name' => 'Tailwind CSS', 'level' => 92, 'color' => 'from-cyan-400 to-cyan-600'],
                        ['name' => 'Bootstrap', 'level' => 85, 'color' => 'from-purple-400 to-purple-600'],
                        ['name' => 'Git/GitHub', 'level' => 88, 'color' => 'from-gray-400 to-gray-600'],
                        ['name' => 'MySQL', 'level' => 85, 'color' => 'from-blue-400 to-blue-600'],
                    ];
                @endphp
                
                @foreach($defaultSkills as $index => $skill)
                    <div data-aos="fade-up" data-aos-delay="{{ $index * 50 }}" 
                         class="group bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg bg-gradient-to-br {{ $skill['color'] }} flex items-center justify-center text-white font-bold text-lg group-hover:scale-110 transition-transform shadow-lg">
                                {{ substr($skill['name'], 0, 1) }}
                            </div>
                            
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 dark:text-white group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                                    {{ $skill['name'] }}
                                </h3>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5 mt-2">
                                    <div class="bg-gradient-to-r {{ $skill['color'] }} h-1.5 rounded-full transition-all duration-1000" 
                                         style="width: {{ $skill['level'] }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        
        <!-- Skill Categories Summary -->
        <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="400">
            <div class="text-center p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-100 dark:border-gray-700 hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 mx-auto bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Frontend Development</h3>
                <p class="text-gray-600 dark:text-gray-400">React JS, Tailwind CSS, Bootstrap, HTML5, CSS3, JavaScript</p>
            </div>
            
            <div class="text-center p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-100 dark:border-gray-700 hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 mx-auto bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Backend Development</h3>
                <p class="text-gray-600 dark:text-gray-400">Laravel, PHP, MySQL, RESTful API, Server Management</p>
            </div>
            
            <div class="text-center p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-100 dark:border-gray-700 hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 mx-auto bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Tools & Management</h3>
                <p class="text-gray-600 dark:text-gray-400">Git/GitHub, Project Lifecycle, Team Collaboration, UX Problem Solving</p>
            </div>
        </div>

        <!-- Stats -->
        <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="fade-up" data-aos-delay="500">
            <div class="text-center p-4 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                <div class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-1">3+</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Tahun Pengalaman</div>
            </div>
            <div class="text-center p-4 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                <div class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-1">10+</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Tech Stack</div>
            </div>
            <div class="text-center p-4 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                <div class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-1">2+</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Project Selesai</div>
            </div>
            <div class="text-center p-4 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                <div class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-1">∞</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Semangat Belajar</div>
            </div>
        </div>
    </div>
</section>
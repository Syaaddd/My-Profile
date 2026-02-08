<section id="about" class="py-20 bg-white dark:bg-gray-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-primary-600 dark:text-primary-400 font-semibold tracking-wide uppercase text-sm">Tentang Saya</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mt-2">
                Profil Profesional
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            
            <!-- Left Column - Personal Info -->
            <div data-aos="fade-right">
                <div class="bg-gradient-to-br from-primary-50 to-purple-50 dark:from-gray-700 dark:to-gray-600 rounded-2xl p-8 shadow-lg">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-primary-100 dark:bg-primary-900/50 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-600 dark:text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $portfolio['name'] ?? 'M. ARSYAD AL KAHFI' }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $portfolio['profession'] ?? 'Full Stack Web Developer' }}</p>
                        </div>
                    </div>

                    <!-- Personal Details -->
                    <div class="space-y-4">
                        @if(!empty($portfolio['contact']['address']))
                            <div class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 dark:text-primary-400 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">{{ $portfolio['contact']['address'] }}</span>
                            </div>
                        @endif

                        @if(!empty($portfolio['contact']['email']))
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 dark:text-primary-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <a href="mailto:{{ $portfolio['contact']['email'] }}" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                    {{ $portfolio['contact']['email'] }}
                                </a>
                            </div>
                        @endif

                        @if(!empty($portfolio['contact']['telepon']))
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 dark:text-primary-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <a href="tel:{{ str_replace(' ', '', $portfolio['contact']['telepon']) }}" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                    {{ $portfolio['contact']['telepon'] }}
                                </a>
                            </div>
                        @endif

                        @if(!empty($portfolio['contact']['github']))
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 dark:text-primary-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                                <a href="{{ $portfolio['contact']['github'] }}" target="_blank" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                    github.com/Syaaddd
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Key Traits -->
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-600">
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-4">Karakteristik</h4>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span class="text-gray-700 dark:text-gray-300">Problem Solver</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <span class="text-gray-700 dark:text-gray-300">Creative Thinker</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                <span class="text-gray-700 dark:text-gray-300">Team Player</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                                <span class="text-gray-700 dark:text-gray-300">Fast Learner</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Description & Experience -->
            <div data-aos="fade-left">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    Deskripsi
                </h3>
                
                <div class="prose dark:prose-invert max-w-none mb-8">
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        {{ $portfolio['description'] ?? 'Fullstack Developer yang berfokus pada penyampaian hasil berdampak, dengan kemahiran utama dalam membangun aplikasi web modern menggunakan Laravel dan Tailwind CSS. Saya antusias dalam menghadapi tantangan dinamis dan saat ini aktif memperluas kapabilitas pengembangan frontend melalui React JS. Memiliki rekam jejak dalam manajemen proyek yang efisien, penyelesaian masalah secara kreatif, serta kolaborasi tim untuk menghadirkan pengalaman digital yang intuitif.' }}
                    </p>
                </div>
                
                <!-- Experience -->
                @if(!empty($portfolio['experience']))
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 dark:text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Pengalaman Profesional
                        </h3>
                        <div class="space-y-4">
                            @foreach($portfolio['experience'] as $exp)
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 border-l-4 border-primary-500">
                                    <p class="text-gray-700 dark:text-gray-300">{{ $exp }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                
                <!-- Education -->
                @if(!empty($portfolio['education']))
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 dark:text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            </svg>
                            Pendidikan
                        </h3>
                        <ul class="space-y-3">
                            @foreach($portfolio['education'] as $edu)
                                <li class="flex items-start gap-3 bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                    <span class="text-primary-600 dark:text-primary-400 mt-1">▸</span>
                                    <span class="text-gray-700 dark:text-gray-300">{{ $edu }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
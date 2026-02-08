<section id="projects" class="py-20 bg-white dark:bg-gray-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-primary-600 dark:text-primary-400 font-semibold tracking-wide uppercase text-sm">Portfolio</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mt-2">
                Pengalaman & Proyek
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mt-4 max-w-2xl mx-auto">
                Berikut adalah pengalaman profesional dan proyek-proyek yang telah saya kerjakan.
            </p>
        </div>
        
        @if(!empty($portfolio['projects']))
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach($portfolio['projects'] as $index => $project)
                    <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" 
                         class="group bg-gray-50 dark:bg-gray-700 rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-600">
                        
                        <!-- Project Header with Icon -->
                        <div class="relative h-56 bg-gradient-to-br from-primary-500 via-purple-500 to-pink-500 flex items-center justify-center overflow-hidden">
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors"></div>
                            
                            <!-- Animated background circles -->
                            <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -mr-20 -mt-20 animate-float"></div>
                            <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/10 rounded-full -ml-16 -mb-16 animate-float" style="animation-delay: 1s;"></div>
                            
                            <!-- Project Initial/Icon -->
                            <div class="relative z-10 text-center">
                                <div class="w-24 h-24 mx-auto bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-500">
                                    <span class="text-5xl font-bold text-white">{{ substr($project['name'], 0, 1) }}</span>
                                </div>
                                @if(!empty($project['period']))
                                    <span class="inline-block px-4 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm">
                                        {{ $project['period'] }}
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Hover overlay -->
                            @if(!empty($project['link']))
                                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <a href="{{ $project['link'] }}" target="_blank" 
                                       class="px-8 py-3 bg-white text-gray-900 rounded-full font-semibold hover:bg-primary-50 transition-all transform scale-90 group-hover:scale-100 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                        Lihat di GitHub
                                    </a>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Content -->
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                                {{ $project['name'] }}
                            </h3>
                            
                            <p class="text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">
                                {{ $project['description'] }}
                            </p>
                            
                            @if(!empty($project['tech']))
                                <div class="flex flex-wrap gap-2">
                                    @foreach($project['tech'] as $tech)
                                        <span class="px-4 py-2 text-sm bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 rounded-lg font-medium">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Default Projects based on CV -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Ether.ID Project -->
                <div data-aos="fade-up" data-aos-delay="0" 
                     class="group bg-gray-50 dark:bg-gray-700 rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-600">
                    
                    <div class="relative h-56 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 flex items-center justify-center overflow-hidden">
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors"></div>
                        <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -mr-20 -mt-20 animate-float"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/10 rounded-full -ml-16 -mb-16 animate-float" style="animation-delay: 1s;"></div>
                        
                        <div class="relative z-10 text-center">
                            <div class="w-24 h-24 mx-auto bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-500">
                                <span class="text-5xl font-bold text-white">E</span>
                            </div>
                            <span class="inline-block px-4 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm">
                                Des 2025 - Jan 2026
                            </span>
                        </div>
                        
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <a href="https://github.com/Syaaddd" target="_blank" 
                               class="px-8 py-3 bg-white text-gray-900 rounded-full font-semibold hover:bg-primary-50 transition-all transform scale-90 group-hover:scale-100 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                Lihat di GitHub
                            </a>
                        </div>
                    </div>
                    
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                            Ether.ID - Digital Asset E-Commerce
                        </h3>
                        
                        <p class="text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">
                            Platform e-commerce aset digital full-featured menggunakan TALL Stack (Tailwind, Alpine, Laravel, Livewire). Fitur utama: responsive UI dengan Tailwind CSS, dark mode implementation, integrasi model 3D interaktif, komponen React JS untuk elemen dinamis, dan sistem pembayaran digital terintegrasi.
                        </p>
                        
                        <div class="flex flex-wrap gap-2">
                            <span class="px-4 py-2 text-sm bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 rounded-lg font-medium">Laravel</span>
                            <span class="px-4 py-2 text-sm bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 rounded-lg font-medium">Tailwind CSS</span>
                            <span class="px-4 py-2 text-sm bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 rounded-lg font-medium">Livewire</span>
                            <span class="px-4 py-2 text-sm bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 rounded-lg font-medium">React JS</span>
                            <span class="px-4 py-2 text-sm bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 rounded-lg font-medium">MySQL</span>
                        </div>
                    </div>
                </div>

                <!-- Minecraft Plugin Project -->
                <div data-aos="fade-up" data-aos-delay="100" 
                     class="group bg-gray-50 dark:bg-gray-700 rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-600">
                    
                    <div class="relative h-56 bg-gradient-to-br from-green-500 via-emerald-500 to-teal-500 flex items-center justify-center overflow-hidden">
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors"></div>
                        <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -mr-20 -mt-20 animate-float"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/10 rounded-full -ml-16 -mb-16 animate-float" style="animation-delay: 1s;"></div>
                        
                        <div class="relative z-10 text-center">
                            <div class="w-24 h-24 mx-auto bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-500">
                                <span class="text-5xl font-bold text-white">M</span>
                            </div>
                            <span class="inline-block px-4 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm">
                                Mar 2025 - Sekarang
                            </span>
                        </div>
                        
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <a href="https://github.com/Syaaddd" target="_blank" 
                               class="px-8 py-3 bg-white text-gray-900 rounded-full font-semibold hover:bg-primary-50 transition-all transform scale-90 group-hover:scale-100 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                Lihat di GitHub
                            </a>
                        </div>
                    </div>
                    
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                            EtherealEssence - Minecraft Plugin Suite
                        </h3>
                        
                        <p class="text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">
                            Plugin Java kustom komprehensif untuk server Minecraft dengan sistem peringkat dinamis, random quest generator yang kompleks, dan optimasi performa untuk ratusan pemain real-time. Integrasi seamless dengan plugin RPG pihak ketiga seperti MythicMobs, MMOCore, dan LuckPerms.
                        </p>
                        
                        <div class="flex flex-wrap gap-2">
                            <span class="px-4 py-2 text-sm bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 rounded-lg font-medium">Java</span>
                            <span class="px-4 py-2 text-sm bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 rounded-lg font-medium">MySQL</span>
                            <span class="px-4 py-2 text-sm bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 rounded-lg font-medium">Minecraft API</span>
                            <span class="px-4 py-2 text-sm bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 rounded-lg font-medium">Server Optimization</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
<section id="home" class="min-h-screen flex items-center justify-center relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-primary-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 pt-16">
    
    <!-- Background decoration -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-primary-400/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute top-1/2 -left-20 w-60 h-60 bg-purple-400/20 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 right-20 w-40 h-40 bg-pink-400/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            
            <!-- Greeting -->
            <div data-aos="fade-down" data-aos-delay="100" class="mb-4">
                <span class="inline-block px-4 py-2 rounded-full bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 text-sm font-medium">
                    👋 Halo, Saya
                </span>
            </div>
            
            <!-- Name -->
            <h1 data-aos="fade-up" data-aos-delay="200" class="text-5xl md:text-7xl font-bold mb-4">
                <span class="bg-gradient-to-r from-gray-900 via-primary-600 to-purple-600 dark:from-white dark:via-primary-400 dark:to-purple-400 bg-clip-text text-transparent">
                    {{ $portfolio['name'] ?? 'M. ARSYAD AL KAHFI' }}
                </span>
            </h1>
            
            <!-- Profession -->
            <div data-aos="fade-up" data-aos-delay="300" class="mb-4">
                <span class="text-2xl md:text-3xl text-gray-600 dark:text-gray-400 font-light">
                    {{ $portfolio['profession'] ?? 'Full Stack Web Developer' }}
                </span>
            </div>

            <!-- Location -->
            @if(!empty($portfolio['contact']['address']))
                <div data-aos="fade-up" data-aos-delay="350" class="mb-6 flex items-center justify-center gap-2 text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>{{ $portfolio['contact']['address'] }}</span>
                </div>
            @endif
            
            <!-- Description -->
            <p data-aos="fade-up" data-aos-delay="400" class="text-lg md:text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto mb-10 leading-relaxed">
                {{ $portfolio['description'] ?? 'Fullstack Developer yang berfokus pada penyampaian hasil berdampak, dengan kemahiran utama dalam membangun aplikasi web modern menggunakan Laravel dan Tailwind CSS.' }}
            </p>
            
            <!-- CTA Buttons -->
            <div data-aos="fade-up" data-aos-delay="500" class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#contact" class="group px-8 py-4 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 flex items-center gap-2">
                    <span>Hubungi Saya</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                
                <a href="{{ route('cv.download') }}" class="group px-8 py-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-white font-semibold rounded-full border-2 border-gray-300 dark:border-gray-600 hover:border-primary-500 dark:hover:border-primary-500 transition-all duration-300 shadow-md hover:shadow-lg hover:scale-105 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>Download CV</span>
                </a>
            </div>

            <!-- Quick Contact Info -->
            <div data-aos="fade-up" data-aos-delay="600" class="mt-10 flex flex-wrap items-center justify-center gap-6 text-gray-500 dark:text-gray-400">
                @if(!empty($portfolio['contact']['email']))
                    <a href="mailto:{{ $portfolio['contact']['email'] }}" class="flex items-center gap-2 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm">{{ $portfolio['contact']['email'] }}</span>
                    </a>
                @endif

                @if(!empty($portfolio['contact']['telepon']))
                    <a href="tel:{{ str_replace(' ', '', $portfolio['contact']['telepon']) }}" class="flex items-center gap-2 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-sm">{{ $portfolio['contact']['telepon'] }}</span>
                    </a>
                @endif
            </div>
            
            <!-- Scroll indicator -->
            <div data-aos="fade-up" data-aos-delay="700" class="mt-16 animate-bounce">
                <a href="#about" class="text-gray-400 hover:text-primary-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
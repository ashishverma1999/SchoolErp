<section class="relative overflow-hidden min-h-screen flex flex-col justify-between" data-hero-carousel>
    <!-- Background: Layered purple mesh + image -->
    <div class="absolute inset-0">
        <!-- Hero image layer -->
        @foreach ($heroImages as $image)
            <img src="{{ asset(ltrim($image, '/')) }}" alt="{{ $school['name'] }} campus photograph" class="hero-slide {{ $loop->first ? 'is-active' : '' }}">
        @endforeach

        <!-- Deep purple overlay — gives the purple theme feeling -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#0f0620]/97 via-[#1a0a35]/88 to-[#2d1060]/75"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#0f0620]/60"></div>

        <!-- Glowing blobs for ambiance -->
        <div class="absolute -top-32 -left-32 w-[700px] h-[700px] rounded-full bg-purple-700/20 blur-[120px] pointer-events-none"></div>
        <div class="absolute -bottom-20 right-0 w-[500px] h-[500px] rounded-full bg-violet-600/15 blur-[100px] pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[600px] rounded-full bg-purple-900/10 blur-[80px] pointer-events-none"></div>
    </div>

    <!-- Main Content Container -->
    <div class="relative z-10 mx-auto grid max-w-7xl content-center gap-10 px-4 py-20 sm:px-6 lg:grid-cols-[1.25fr_400px] lg:py-28 my-auto">
        <div class="max-w-2xl">
            <!-- Admission Open Badge -->
            <div class="inline-flex items-center gap-2.5 rounded-full border border-purple-400/30 bg-purple-400/10 px-4 py-2 backdrop-blur-md">
                <span class="flex h-2 w-2 rounded-full bg-purple-400 animate-pulse flex-none"></span>
                <span class="text-xs font-black uppercase tracking-widest text-purple-300">Admissions Open 2026–27 · Pre-Nursery to Class XII</span>
            </div>

            <!-- Main Heading -->
            <h1 class="mt-7 font-serif text-4xl font-black leading-[1.08] sm:text-6xl lg:text-6xl tracking-tight text-white drop-shadow-sm">
                {{ $school['name'] }}
            </h1>

            <!-- Gold accent underline -->
            <div class="mt-4 w-24 h-1 rounded-full bg-gradient-to-r from-purple-400 to-violet-300"></div>

            <!-- Subtitle -->
            <p class="mt-5 text-lg sm:text-xl font-medium text-purple-100 max-w-xl leading-relaxed">
                {{ $school['tagline'] }}
            </p>

            <!-- Feature Pills -->
            <div class="mt-6 flex flex-wrap items-center gap-2.5 text-xs sm:text-sm font-semibold text-purple-200">
                <span class="inline-flex items-center gap-1.5 rounded-lg bg-white/8 border border-white/10 px-3 py-1.5 backdrop-blur-sm">
                    <svg class="w-4 h-4 text-purple-400 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Pre-Nursery to Class XII
                </span>
                <span class="inline-flex items-center gap-1.5 rounded-lg bg-white/8 border border-white/10 px-3 py-1.5 backdrop-blur-sm">
                    <svg class="w-4 h-4 text-purple-400 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Science, Commerce &amp; Arts
                </span>
                <span class="inline-flex items-center gap-1.5 rounded-lg bg-white/8 border border-white/10 px-3 py-1.5 backdrop-blur-sm">
                    <svg class="w-4 h-4 text-purple-400 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Smart Classrooms &amp; Labs
                </span>
                <span class="inline-flex items-center gap-1.5 rounded-lg bg-white/8 border border-white/10 px-3 py-1.5 backdrop-blur-sm">
                    <svg class="w-4 h-4 text-purple-400 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Safe Transport Service
                </span>
            </div>

            <!-- CTA Buttons -->
            <div class="mt-9 flex flex-wrap gap-4">
                <a href="#admissions" class="btn-primary shadow-xl shadow-purple-900/40">
                    <span>Enquire for Admission</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <a href="#gallery" class="btn-outline-white">
                    <svg class="w-4 h-4 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>View Campus Photos</span>
                </a>
            </div>

            <!-- Stats Row -->
            <div class="mt-10 flex flex-wrap items-center gap-6 pt-6 border-t border-white/10">
                <div class="text-center">
                    <p class="font-serif text-3xl font-black text-white">15+</p>
                    <p class="text-xs text-purple-300 font-semibold mt-0.5">Years of Excellence</p>
                </div>
                <div class="w-px h-10 bg-white/15"></div>
                <div class="text-center">
                    <p class="font-serif text-3xl font-black text-white">2500+</p>
                    <p class="text-xs text-purple-300 font-semibold mt-0.5">Students Enrolled</p>
                </div>
                <div class="w-px h-10 bg-white/15"></div>
                <div class="text-center">
                    <p class="font-serif text-3xl font-black text-white">120+</p>
                    <p class="text-xs text-purple-300 font-semibold mt-0.5">Expert Faculty</p>
                </div>
                <div class="w-px h-10 bg-white/15"></div>
                <div class="text-center">
                    <p class="font-serif text-3xl font-black text-white">98%</p>
                    <p class="text-xs text-purple-300 font-semibold mt-0.5">Board Pass Rate</p>
                </div>
            </div>
        </div>

        <!-- Live Notice Board Card (Glassmorphism) -->
        <aside id="notices" class="rounded-2xl border border-white/15 bg-white/7 p-6 backdrop-blur-2xl shadow-2xl shadow-black/30 self-center lg:self-auto">
            <div class="flex items-center justify-between border-b border-white/12 pb-4">
                <div class="flex items-center gap-2">
                    <span class="flex h-2.5 w-2.5 rounded-full bg-purple-400 animate-ping flex-none"></span>
                    <h2 class="text-base font-black tracking-wide text-white">Notice Board</h2>
                </div>
                <span class="rounded-lg bg-purple-400/20 border border-purple-400/20 px-2 py-0.5 text-[10px] font-extrabold uppercase text-purple-300 tracking-widest">Live</span>
            </div>

            <div class="mt-4 grid gap-2.5 notice-scroll">
                @foreach ($notices as $notice)
                    <article class="rounded-xl border border-white/8 bg-white/5 p-3.5 hover:bg-white/10 transition-all hover:border-purple-400/30 cursor-default">
                        <div class="flex items-center justify-between text-[11px] font-bold">
                            <span class="text-purple-300 uppercase tracking-wider">{{ $notice['badge'] ?? 'Notice' }}</span>
                            <time class="text-purple-400/70">{{ \Illuminate\Support\Carbon::parse($notice['date'])->format('d M Y') }}</time>
                        </div>
                        <p class="mt-1.5 text-xs sm:text-sm font-medium leading-snug text-purple-100">{{ $notice['title'] }}</p>
                    </article>
                @endforeach
            </div>

            <div class="mt-4 pt-3 border-t border-white/10 flex items-center justify-between text-xs text-purple-400">
                <span>📍 {{ $school['location'] ?? 'Campus Location' }}</span>
                <a href="#admissions" class="text-purple-300 hover:text-white font-bold underline transition-colors">Contact Office →</a>
            </div>
        </aside>
    </div>

    <!-- Carousel Indicator Dots -->
    <div class="relative z-10 mx-auto mb-8 flex items-center gap-2" data-hero-dots>
        <!-- Dots injected via JS -->
    </div>
</section>

<!-- About Section -->
<section id="about" class="bg-white py-20 lg:py-28 relative overflow-hidden">
    <!-- Subtle background decoration -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] rounded-full bg-purple-50 -translate-y-1/2 translate-x-1/3 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] rounded-full bg-purple-50/60 translate-y-1/3 -translate-x-1/4 pointer-events-none"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6">
        <div class="grid gap-14 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div>
                <span class="eyebrow-badge eyebrow-badge-purple">
                    <span class="h-1.5 w-1.5 rounded-full bg-purple-600"></span>
                    About {{ $school['name'] }}
                </span>
                
                <h2 class="mt-5 section-title">
                    A school built around <span class="gradient-text">learning, values,</span> and holistic care.
                </h2>
                
                <div class="section-rule mt-5"></div>

                <div class="mt-7 space-y-4 text-base sm:text-lg leading-relaxed text-slate-600">
                    <p>
                        Established with a mission to deliver accessible, high-quality, English-medium education, <strong class="text-[#1a0a35]">{{ $school['name'] }} ({{ $school['short'] ?? 'EPS' }})</strong> creates an environment where young minds are encouraged to question, explore, and excel.
                    </p>
                    <p>
                        Our pedagogical philosophy balances academic clarity with moral values, disciplined habits, physical health, public speaking confidence, and active co-curricular participation.
                    </p>
                </div>

                <!-- Stats Grid -->
                <div class="mt-10 grid grid-cols-2 gap-4 sm:grid-cols-4">
                    @foreach ($stats as $stat)
                        <div class="rounded-2xl border border-purple-100 bg-gradient-to-br from-purple-50 to-violet-50/50 p-4 text-center hover:border-purple-300 hover:shadow-md hover:shadow-purple-100 transition-all group">
                            <strong class="block font-serif text-3xl sm:text-4xl font-black text-purple-700 group-hover:text-purple-800">{{ $stat['value'] }}</strong>
                            <span class="mt-1 block text-xs sm:text-sm font-bold text-slate-700">{{ $stat['label'] }}</span>
                            <span class="mt-0.5 block text-[11px] text-slate-500 hidden sm:block">{{ $stat['detail'] ?? '' }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="#vision-mission" class="btn-navy text-sm">
                        <span>Our Vision &amp; Values</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <a href="#admissions" class="btn-primary text-sm">
                        <span>Visit Our Campus</span>
                    </a>
                </div>
            </div>

            <!-- Campus Image Mosaic -->
            <div class="grid grid-cols-2 gap-3.5 sm:gap-4">
                @foreach ($aboutImages->take(4) as $image)
                    <div class="relative overflow-hidden rounded-2xl shadow-lg group {{ $loop->first ? 'row-span-2 h-full min-h-[300px]' : 'h-44 sm:h-52' }}">
                        <img src="{{ asset(ltrim($image, '/')) }}" alt="{{ $school['name'] }} campus life" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                            <span class="text-xs font-bold text-white uppercase tracking-wider">Campus View</span>
                        </div>
                        <!-- Purple shimmer border on hover -->
                        <div class="absolute inset-0 ring-0 group-hover:ring-2 ring-purple-400/50 rounded-2xl transition-all duration-300 pointer-events-none"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section id="vision-mission" class="relative py-16 lg:py-24 overflow-hidden">
    <!-- Background: subtle purple gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#0f0620] via-[#1a0a35] to-[#2d1060]"></div>
    <!-- Grid pattern overlay -->
    <div class="absolute inset-0 opacity-[0.04]" style="background-image: url(\"data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M0 0h1v40H0zM39 0h1v40H39zM0 0v1h40V0zM0 39v1h40v-1z'/%3E%3C/g%3E%3C/svg%3E\")"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6">
        <div class="text-center max-w-3xl mx-auto">
            <span class="eyebrow-badge eyebrow-badge-white">Guiding Principles</span>
            <h2 class="mt-4 font-serif text-3xl sm:text-4xl font-black text-white">Vision, Mission &amp; Core Values</h2>
            <p class="mt-3 text-purple-200 text-base">Shaping students into enlightened, compassionate, and self-reliant leaders of tomorrow.</p>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2">
            <!-- Vision Card -->
            <div class="glass-card p-7 sm:p-8 border-l-4 border-l-purple-400">
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-400/20 text-purple-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-white">Our Vision</h3>
                </div>
                <p class="mt-4 text-base leading-relaxed text-purple-100">
                    {{ $visionMission['vision'] ?? 'To be a premier center of holistic K-12 education that fosters intellectual curiosity, moral integrity, scientific temperament, and lifelong learning in every student.' }}
                </p>
            </div>

            <!-- Mission Card -->
            <div class="glass-card p-7 sm:p-8 border-l-4 border-l-violet-300">
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-violet-400/20 text-violet-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-white">Our Mission</h3>
                </div>
                <p class="mt-4 text-base leading-relaxed text-purple-100">
                    {{ $visionMission['mission'] ?? 'To provide a stimulating, safe, and modern learning environment with balanced focus on foundational literacy, board exam excellence, competitive stream preparation, and communication skills.' }}
                </p>
            </div>
        </div>

        <!-- 4 Core Pillars Grid -->
        <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($visionMission['values'] ?? [] as $val)
                <div class="glass-card p-5 hover:border-purple-400/40 transition-all group">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-purple-400/20 text-purple-300 font-black text-sm group-hover:bg-purple-500 group-hover:text-white transition-all">
                        {{ $loop->iteration }}
                    </div>
                    <h4 class="mt-4 font-bold text-base text-white">{{ $val['title'] }}</h4>
                    <p class="mt-1.5 text-xs sm:text-sm text-purple-200 leading-normal">{{ $val['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Academics Wing Section -->
<section id="academics" class="bg-[#f8f7ff] py-20 lg:py-28 relative">
    <div class="absolute inset-0 bg-warm-mesh pointer-events-none opacity-50"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div class="max-w-2xl">
                <span class="eyebrow-badge eyebrow-badge-purple">Academic Excellence</span>
                <h2 class="mt-3 section-title">Structured Curriculum from Pre-Nursery to Class XII</h2>
                <p class="mt-3 text-slate-600 text-base">Comprehensive progression from joyful foundational learning to senior secondary stream mastery — Science, Commerce &amp; Arts.</p>
            </div>
            <a href="#admissions" class="btn-navy text-sm self-start md:self-auto">Check Class Eligibility →</a>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($academics as $wing)
                <article class="modern-card p-7 flex flex-col justify-between relative overflow-hidden group bg-white">
                    <!-- Top corner decoration -->
                    <div class="absolute top-0 right-0 h-28 w-28 bg-purple-400/6 rounded-bl-full pointer-events-none group-hover:scale-110 transition-transform duration-500"></div>
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="inline-block rounded-full bg-purple-100 px-3 py-1 text-xs font-black text-purple-700 uppercase tracking-wider">{{ $wing['classes'] }}</span>
                            <span class="text-xs font-semibold text-slate-500">{{ $wing['tag'] ?? '' }}</span>
                        </div>
                        
                        <h3 class="mt-5 font-serif text-2xl font-black text-[#1a0a35]">{{ $wing['title'] }}</h3>
                        <p class="mt-3 text-sm sm:text-base leading-relaxed text-slate-600">{{ $wing['text'] }}</p>
                        
                        <div class="mt-6 pt-5 border-t border-purple-100/60">
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2.5">Key Focus Areas:</p>
                            <ul class="space-y-2">
                                @foreach ($wing['highlights'] ?? ['Interactive learning', 'Language skills', 'Concept clarity', 'Activities'] as $highlight)
                                    <li class="flex items-center gap-2 text-xs sm:text-sm font-semibold text-slate-700">
                                        <svg class="w-4 h-4 text-purple-600 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                        <span>{{ $highlight }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <a href="#admissions" class="mt-8 inline-flex items-center gap-1.5 text-sm font-bold text-purple-600 hover:text-purple-800 group-hover:translate-x-1 transition-all">
                        <span>Enquire for this wing</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>

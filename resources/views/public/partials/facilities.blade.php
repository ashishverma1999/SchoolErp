<!-- Facilities Section -->
<section id="facilities" class="bg-[#f8f7ff] py-20 lg:py-28 relative overflow-hidden">
    <div class="absolute inset-0 bg-warm-mesh opacity-60 pointer-events-none"></div>
    <div class="absolute top-10 right-10 w-80 h-80 rounded-full bg-purple-100/50 blur-3xl pointer-events-none"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6">
        <div class="max-w-3xl">
            <span class="eyebrow-badge eyebrow-badge-purple">
                <span class="h-1.5 w-1.5 rounded-full bg-purple-600"></span>
                World-Class Infrastructure
            </span>
            <h2 class="mt-5 font-serif text-3xl sm:text-4xl lg:text-5xl font-black text-[#1a0a35] leading-tight">
                Modern Campus Facilities for <span class="gradient-text">Balanced Growth</span>
            </h2>
            <p class="mt-4 text-slate-600 text-base sm:text-lg">
                Designed to make every school day productive, engaging, secure, and comfortable for students from pre-nursery through senior secondary.
            </p>
        </div>

        <!-- Facilities Cards Grid -->
        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @php
                $facilityIcons = [
                    'classroom' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
                    'computer' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>',
                    'library' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>',
                    'sports' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                    'bus' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>',
                    'shield' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                    'medical' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
                    'stage' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z"/>',
                ];
            @endphp

            @foreach ($facilities as $facility)
                <article class="modern-card p-6 bg-white group">
                    <div class="feature-icon-wrap group-hover:bg-purple-600 group-hover:text-white group-hover:border-transparent group-hover:shadow-lg group-hover:shadow-purple-200 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            {!! $facilityIcons[$facility['icon'] ?? 'classroom'] ?? $facilityIcons['classroom'] !!}
                        </svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#1a0a35]">{{ $facility['title'] }}</h3>
                    <p class="mt-2 text-sm text-slate-600 leading-relaxed">{{ $facility['text'] }}</p>
                </article>
            @endforeach
        </div>

        <!-- Real Classrooms Preview Strip -->
        <div class="mt-16 pt-12 border-t border-purple-100">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h3 class="text-xl font-bold text-[#1a0a35]">Classroom Environments at {{ $school['short'] ?? 'EPS' }}</h3>
                    <p class="text-xs sm:text-sm text-slate-500">Bright, airy, well-furnished spaces fostering student concentration.</p>
                </div>
                <a href="#gallery" class="text-sm font-bold text-purple-600 hover:text-purple-800 inline-flex items-center gap-1 transition-colors">
                    <span>View all classroom photos →</span>
                </a>
            </div>

            <div class="grid gap-4 sm:grid-cols-3">
                <div class="relative rounded-2xl overflow-hidden h-52 group shadow-md">
                    <img src="{{ asset('images/classroom1.jpeg') }}" alt="Classroom interior at {{ $school['name'] }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900/80 via-transparent to-transparent flex items-end p-4">
                        <span class="text-xs font-bold text-white">Smart Classroom</span>
                    </div>
                </div>
                <div class="relative rounded-2xl overflow-hidden h-52 group shadow-md">
                    <img src="{{ asset('images/classroom2.jpeg') }}" alt="Science lab at {{ $school['name'] }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900/80 via-transparent to-transparent flex items-end p-4">
                        <span class="text-xs font-bold text-white">Science Laboratory</span>
                    </div>
                </div>
                <div class="relative rounded-2xl overflow-hidden h-52 group shadow-md">
                    <img src="{{ asset('images/classroom3.jpeg') }}" alt="Library at {{ $school['name'] }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900/80 via-transparent to-transparent flex items-end p-4">
                        <span class="text-xs font-bold text-white">Digital Library</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Transport Van Spotlight Section -->
<section id="transport" class="relative py-20 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-[#1a0a35] via-[#2d1060] to-[#0f0620]"></div>
    <!-- Decorative circles -->
    <div class="absolute top-0 right-1/4 w-96 h-96 rounded-full bg-purple-600/10 blur-3xl pointer-events-none"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6">
        <div class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div>
                <span class="eyebrow-badge eyebrow-badge-white">
                    <span class="h-1.5 w-1.5 rounded-full bg-purple-400"></span>
                    Safe Student Transport
                </span>
                <h2 class="mt-4 font-serif text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight">
                    Reliable School Van Service for <span class="text-purple-300">Student Safety</span>
                </h2>
                <div class="mt-5 w-16 h-1 rounded-full bg-gradient-to-r from-purple-400 to-violet-300"></div>

                <p class="mt-6 text-base sm:text-lg leading-relaxed text-purple-200">
                    {{ $school['name'] }} operates dedicated school vans with disciplined drivers and care attendants to ensure children travel safely between home and campus — every single day.
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    @foreach ([
                        ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'title' => 'Verified & Trained Drivers', 'desc' => 'Strict adherence to speed limits and child safety norms.'],
                        ['icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7', 'title' => 'Doorstep / Route Pickups', 'desc' => 'Covering key residential pockets and nearby areas.'],
                        ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'title' => 'Lady Care Attendant', 'desc' => 'Assisting tiny tots during boarding and drop-off.'],
                        ['icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'title' => 'First Aid Box on Board', 'desc' => 'Emergency medical kit and contact protocols on every route.'],
                    ] as $feature)
                        <div class="rounded-xl border border-white/10 bg-white/5 p-4 backdrop-blur-sm hover:bg-white/8 transition-all group">
                            <div class="flex items-center gap-2 text-purple-300 font-bold text-sm">
                                <svg class="w-5 h-5 text-purple-400 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}"/></svg>
                                <span>{{ $feature['title'] }}</span>
                            </div>
                            <p class="mt-1.5 text-xs text-purple-300/70">{{ $feature['desc'] }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#admissions" class="btn-primary text-sm">Enquire About Transport Routes</a>
                    <a href="tel:{{ $school['phone'] }}" class="btn-outline-white text-sm">Call Office for Stops</a>
                </div>
            </div>

            <!-- Transport Photo Card -->
            <div class="relative overflow-hidden rounded-3xl shadow-2xl shadow-purple-900/50 border border-purple-500/20 group">
                <img src="{{ asset('images/school_van.jpeg') }}" alt="{{ $school['name'] }} transport fleet" class="w-full h-[420px] object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-[#0f0620] via-[#1a0a35]/70 to-transparent p-6 text-white">
                    <span class="rounded-lg bg-purple-500/30 border border-purple-400/30 px-2 py-0.5 text-xs font-black text-purple-200 uppercase tracking-wider">{{ $school['short'] ?? 'EPS' }} Campus</span>
                    <h3 class="mt-2 font-serif text-xl font-bold">Safe &amp; Supervised Travel</h3>
                    <p class="text-xs text-purple-200 mt-1">Convenient daily pickup and drop routines for student comfort and safety.</p>
                </div>
            </div>
        </div>
    </div>
</section>

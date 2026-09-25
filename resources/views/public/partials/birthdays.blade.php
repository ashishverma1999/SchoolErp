<section id="birthdays" class="relative bg-[#f8f7ff] py-20 lg:py-28 border-t border-purple-100 overflow-hidden">
    <!-- Decorative background -->
    <div class="absolute inset-0 bg-warm-mesh opacity-60 pointer-events-none"></div>
    <div class="pointer-events-none absolute -top-24 -left-24 h-96 w-96 rounded-full bg-purple-100/60 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-24 -right-24 h-96 w-96 rounded-full bg-violet-100/50 blur-3xl"></div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 relative">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div class="max-w-2xl">
                <span class="eyebrow-badge eyebrow-badge-purple">
                    <span class="h-1.5 w-1.5 rounded-full bg-purple-600 animate-ping"></span>
                    🎉 Campus Celebrations &amp; Achievements
                </span>
                <h2 class="mt-3 section-title">Birthday Stars &amp; <span class="gradient-text">Student Spotlight</span></h2>
                <p class="mt-3 text-slate-600 text-base sm:text-lg leading-relaxed">
                    Celebrating our wonderful students and faculty on their special days! Sending heartfelt blessings, warmth, and wishes for bright achievements ahead.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <div class="inline-flex items-center gap-2 rounded-full bg-purple-100 px-4 py-2 text-xs font-bold text-purple-800 border border-purple-200/60">
                    <span>🎂 Wishing Everyone A Bright Future!</span>
                </div>
            </div>
        </div>

        <!-- Birthday Cards Grid -->
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse ($birthdays as $birthday)
                <div class="modern-card group relative p-6 bg-white flex flex-col justify-between overflow-hidden hover:shadow-xl hover:shadow-purple-100">
                    <!-- Top Ribbon Badge -->
                    <div class="absolute top-4 right-4">
                        <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-extrabold {{ $birthday['type'] === 'Teacher' ? 'bg-purple-100 text-purple-800 border border-purple-200' : ($birthday['type'] === 'Star Student' ? 'bg-emerald-100 text-emerald-800 border border-emerald-200' : 'bg-violet-100 text-violet-800 border border-violet-200') }}">
                            {{ $birthday['badge'] ?? 'Birthday Star' }}
                        </span>
                    </div>

                    <div>
                        <!-- Avatar & Info -->
                        <div class="flex items-center gap-4 mt-2">
                            <div class="relative">
                                <div class="h-20 w-20 rounded-2xl overflow-hidden ring-4 ring-purple-200/60 shadow-md bg-purple-50 flex-none group-hover:scale-105 transition-transform duration-300">
                                    <img 
                                        src="{{ asset(ltrim($birthday['image'] ?? '/images/classroom1.jpeg', '/')) }}" 
                                        alt="{{ $birthday['name'] }}"
                                        class="h-full w-full object-cover"
                                        onerror="this.src='/images/classroom1.jpeg'"
                                    >
                                </div>
                                <span class="absolute -bottom-2 -right-1 text-xl drop-shadow">🎉</span>
                            </div>

                            <div class="pr-2">
                                <span class="text-[11px] font-bold uppercase tracking-wider text-purple-700 bg-purple-50 px-2 py-0.5 rounded-md inline-block mb-1">
                                    {{ $birthday['type'] ?? 'Student' }}
                                </span>
                                <h3 class="font-extrabold text-lg text-[#1a0a35] leading-snug group-hover:text-purple-700 transition-colors">
                                    {{ $birthday['name'] }}
                                </h3>
                                <p class="text-xs font-semibold text-slate-500 mt-0.5">
                                    {{ $birthday['class_or_role'] }}
                                </p>
                            </div>
                        </div>

                        <!-- Birthday Date Badge -->
                        @if (!empty($birthday['birth_date']))
                            <div class="mt-4 inline-flex items-center gap-2 rounded-xl bg-purple-50 px-3 py-1.5 text-xs font-bold text-purple-800 border border-purple-100">
                                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>Birthday: {{ $birthday['birth_date'] }}</span>
                            </div>
                        @endif

                        <!-- Wishes Text -->
                        @if (!empty($birthday['wishes']))
                            <p class="mt-4 text-xs leading-relaxed text-slate-600 italic bg-purple-50/70 p-3 rounded-2xl border border-purple-100">
                                "{{ $birthday['wishes'] }}"
                            </p>
                        @endif
                    </div>

                    <!-- Card Footer -->
                    <div class="mt-5 pt-3 border-t border-purple-100 flex items-center justify-between text-[11px] font-bold text-purple-600">
                        <span class="flex items-center gap-1">
                            <span>✨</span> Best Wishes from {{ $school['short'] ?? 'EPS' }}
                        </span>
                        <span>🎈 🎂</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full rounded-3xl bg-purple-50 border border-purple-200 p-8 text-center">
                    <p class="text-base text-purple-900 font-bold">No active birthday entries at this moment. You can add birthdays anytime via the Admin Panel!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

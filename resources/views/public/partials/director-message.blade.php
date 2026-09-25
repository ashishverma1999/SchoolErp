<section id="leadership" class="bg-white py-20 lg:py-28 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 rounded-full bg-purple-50 -translate-y-1/2 -translate-x-1/4 pointer-events-none"></div>
    <div class="mx-auto relative max-w-7xl px-4 sm:px-6">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div class="max-w-2xl">
                <span class="eyebrow-badge eyebrow-badge-purple">
                    <span class="h-1.5 w-1.5 rounded-full bg-purple-600"></span>
                    Leadership &amp; Guidance
                </span>
                <h2 class="mt-3 section-title">Messages from Our <span class="gradient-text">Leadership Desk</span></h2>
                <p class="mt-3 text-slate-600 text-base">Inspiring values, academic integrity, and personalized mentorship from our leadership team.</p>
            </div>
            <a href="#contact" class="btn-outline-purple text-sm self-start md:self-auto">Connect with Office</a>
        </div>

        <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($messages as $message)
                <article class="modern-card overflow-hidden flex flex-col justify-between group bg-white">
                    <div class="relative">
                        <!-- Portrait Image -->
                        <div class="h-72 w-full overflow-hidden bg-purple-100">
                            <img 
                                src="{{ $message['image'] ?? asset('images/classroom1.jpeg') }}" 
                                alt="{{ $message['name'] }} - {{ $message['title'] }}" 
                                class="h-full w-full object-cover object-top group-hover:scale-105 transition-transform duration-500"
                                onerror="this.onerror=null; this.src='{{ asset('images/classroom1.jpeg') }}';"
                            >
                        </div>
                        <!-- Role Badge Overlay -->
                        <div class="absolute bottom-3 left-3 right-3">
                            <span class="inline-block rounded-xl bg-[#0f0620]/88 px-3 py-1.5 text-xs font-bold text-purple-300 backdrop-blur-md border border-purple-500/20">
                                {{ $message['role'] ?? $message['title'] }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-serif text-xl font-black text-[#1a0a35]">{{ $message['name'] }}</h3>
                            <p class="text-xs font-bold uppercase tracking-wider text-purple-600 mt-1">{{ $message['title'] }}</p>
                            @if (!empty($message['designation']))
                                <p class="text-[11px] font-semibold text-slate-500 mt-1 leading-snug bg-purple-50 p-2 rounded-lg border border-purple-100">{{ $message['designation'] }}</p>
                            @endif
                            
                            <blockquote class="mt-4 text-xs sm:text-sm leading-relaxed text-slate-600 italic relative pl-3 border-l-2 border-purple-300">
                                {{ $message['text'] }}
                            </blockquote>
                        </div>

                        <div class="mt-6 pt-4 border-t border-purple-100 flex items-center justify-between text-xs font-bold text-slate-500">
                            <span>{{ $school['short'] ?? 'EPS' }} Leadership</span>
                            <span class="text-purple-500">★ ★ ★</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section id="reviews" class="relative py-20 lg:py-28 overflow-hidden" data-review-carousel>
    <!-- Dark purple background with mesh -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#0f0620] via-[#1a0a35] to-[#2d1060]"></div>
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\")"></div>
    <!-- Glow blobs -->
    <div class="absolute top-1/4 left-0 w-96 h-96 rounded-full bg-purple-700/20 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-80 h-80 rounded-full bg-violet-600/15 blur-3xl pointer-events-none"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div class="max-w-2xl">
                <span class="eyebrow-badge eyebrow-badge-white">
                    <span class="h-1.5 w-1.5 rounded-full bg-purple-400"></span>
                    Community Trust &amp; Testimonials
                </span>
                <h2 class="mt-4 font-serif text-3xl sm:text-4xl font-black text-white">What Parents &amp; Students <span class="text-purple-300">Say About Us</span></h2>
                <p class="mt-3 text-purple-200 text-base">Hear from the families whose children learn, grow, and flourish at {{ $school['name'] ?? 'Excel Public School' }}.</p>
            </div>

            <!-- Carousel Nav Buttons -->
            <div class="flex items-center gap-2 self-start md:self-auto">
                <button type="button" class="flex h-10 w-10 items-center justify-center rounded-xl border border-purple-600/40 text-purple-300 bg-white/5 hover:bg-purple-600 hover:text-white hover:border-purple-600 transition-all backdrop-blur-sm" data-review-prev aria-label="Previous Review">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button type="button" class="flex h-10 w-10 items-center justify-center rounded-xl border border-purple-600/40 text-purple-300 bg-white/5 hover:bg-purple-600 hover:text-white hover:border-purple-600 transition-all backdrop-blur-sm" data-review-next aria-label="Next Review">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>

        <!-- Reviews Grid -->
        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            @forelse ($reviews as $review)
                <article class="glass-card p-6 flex flex-col justify-between hover:border-purple-400/50 hover:shadow-lg hover:shadow-purple-900/30 transition-all duration-300">
                    <div>
                        <!-- Star Rating -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1 text-purple-400 text-sm">
                                @for ($i = 0; $i < ($review['rating'] ?? 5); $i++)
                                    <span>★</span>
                                @endfor
                                @for ($i = ($review['rating'] ?? 5); $i < 5; $i++)
                                    <span class="text-purple-800">★</span>
                                @endfor
                            </div>
                            <span class="text-xs font-bold text-purple-500 rounded-lg border border-purple-700/30 bg-purple-800/20 px-2 py-0.5">Verified</span>
                        </div>

                        <!-- Quote -->
                        <p class="mt-4 text-sm leading-relaxed text-purple-100 italic">
                            "{{ $review['text'] ?? $review['quote'] ?? '' }}"
                        </p>
                    </div>

                    <!-- Author Info -->
                    <div class="mt-6 pt-4 border-t border-purple-700/30 flex items-center gap-3">
                        @if (!empty($review['image']))
                            <img 
                                src="{{ asset(ltrim($review['image'], '/')) }}" 
                                alt="{{ $review['name'] }}" 
                                class="h-10 w-10 rounded-full object-cover ring-2 ring-purple-400/40 flex-none"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >
                        @endif
                        <div class="h-10 w-10 rounded-full bg-purple-600/40 text-purple-200 {{ !empty($review['image']) ? 'hidden' : 'flex' }} items-center justify-center font-bold text-sm flex-none border border-purple-500/30">
                            {{ substr($review['name'] ?? 'P', 0, 1) }}
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-white">{{ $review['name'] }}</h4>
                            <p class="text-[11px] text-purple-400 font-semibold">{{ $review['role'] }}</p>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-2xl bg-white/5 border border-white/10 p-8 text-center text-purple-300">
                    No testimonials added yet. You can add parent &amp; student reviews through the Admin Panel.
                </div>
            @endforelse
        </div>
    </div>
</section>

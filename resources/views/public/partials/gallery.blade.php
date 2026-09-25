<section id="gallery" class="bg-[#f8f7ff] py-20 lg:py-28 relative overflow-hidden">
    <div class="absolute inset-0 bg-warm-mesh opacity-70 pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 rounded-full bg-purple-100/50 blur-3xl pointer-events-none"></div>
    <div class="absolute top-10 left-0 w-72 h-72 rounded-full bg-violet-100/40 blur-3xl pointer-events-none"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6">

        <!-- Section Header -->
        <div class="max-w-2xl mb-10">
            <span class="eyebrow-badge eyebrow-badge-purple">
                <span class="h-1.5 w-1.5 rounded-full bg-purple-600"></span>
                Campus Photo Gallery
            </span>
            <h2 class="mt-3 section-title">Life &amp; Moments at <span class="gradient-text">{{ $school['name'] }}</span></h2>
            <p class="mt-3 text-slate-600 text-base">Explore our vibrant classrooms, cultural celebrations, sports days, and campus facilities ({{ count($galleryItems) }} photos).</p>
        </div>

        <!-- ── Tab Strip Filter ── -->
        @php
            $tabIcons = [
                'all'           => '🖼️',
                'Celebrations'  => '🎉',
                'Academics'     => '🔬',
                'Activities'    => '🎨',
                'Campus'        => '🏫',
                'Sports'        => '🏆',
                'Transport'     => '🚌',
                'Classroom'     => '🏫',
                'Cultural'      => '🎭',
                'Science'       => '🔬',
                'Events'        => '🎉',
                'Library'       => '📚',
            ];
        @endphp

        <div class="gallery-tabs" aria-label="Gallery category filters" role="tablist">

            {{-- "All Photos" tab --}}
            <button
                type="button"
                class="filter-btn is-active"
                data-gallery-filter="all"
                role="tab"
                aria-selected="true"
            >
                <span class="tab-icon">{{ $tabIcons['all'] }}</span>
                <span>All</span>
                <span class="tab-count">{{ count($galleryItems) }}</span>
            </button>

            {{-- Category tabs --}}
            @foreach ($galleryCategories as $cat)
                @php
                    $catCount = collect($galleryItems)->where('category', $cat)->count();
                    $icon = $tabIcons[$cat] ?? '📷';
                @endphp
                <button
                    type="button"
                    class="filter-btn"
                    data-gallery-filter="{{ $cat }}"
                    role="tab"
                    aria-selected="false"
                >
                    <span class="tab-icon">{{ $icon }}</span>
                    <span>{{ $cat }}</span>
                    <span class="tab-count">{{ $catCount }}</span>
                </button>
            @endforeach

        </div>

        <!-- Images Grid -->
        <div class="mt-10 grid gap-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4" data-gallery-grid>
            @foreach ($galleryItems as $item)
                <article 
                    class="gallery-item group h-64 sm:h-72" 
                    data-gallery-item
                    data-gallery-category="{{ $item['category'] }}"
                    data-image-src="{{ asset(ltrim($item['image'], '/')) }}"
                    data-image-title="{{ $item['title'] }}"
                    data-image-desc="{{ $item['description'] ?? 'Campus moment at ' . $school['name'] }}"
                >
                    <img 
                        src="{{ asset(ltrim($item['image'], '/')) }}" 
                        alt="{{ $item['title'] }}" 
                        loading="lazy" 
                        class="h-full w-full object-cover"
                    >
                    <div class="gallery-overlay"></div>
                    
                    <!-- Caption Info -->
                    <div class="absolute bottom-0 inset-x-0 p-4 text-white z-10">
                        <span class="inline-block rounded-lg bg-purple-600/80 backdrop-blur-sm px-2 py-0.5 text-[10px] font-black uppercase tracking-wider text-white">
                            {{ $item['category'] }}
                        </span>
                        <h3 class="mt-1.5 text-sm sm:text-base font-bold leading-snug line-clamp-2 text-white group-hover:text-purple-200 transition-colors">
                            {{ $item['title'] }}
                        </h3>
                    </div>

                    <!-- View Icon Top Right -->
                    <div class="absolute top-3 right-3 h-8 w-8 rounded-full bg-purple-900/60 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity backdrop-blur-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="gallery-lightbox" class="lightbox-modal" role="dialog" aria-modal="true" aria-label="Photo Viewer">
    <div class="lightbox-backdrop absolute inset-0"></div>

    <div class="relative z-10 max-w-5xl w-full mx-4 my-auto bg-[#0f0620] rounded-2xl overflow-hidden shadow-2xl border border-purple-500/20 flex flex-col max-h-[92vh]">
        <!-- Top Toolbar -->
        <div class="flex items-center justify-between px-5 py-3.5 bg-[#1a0a35] border-b border-purple-800/40 text-white">
            <div class="flex items-center gap-3">
                <span class="rounded-lg bg-purple-600/70 border border-purple-500/30 px-2 py-0.5 text-xs font-bold text-purple-100" data-lightbox-category>Campus</span>
                <span class="text-xs text-purple-400 font-bold" data-lightbox-counter>1 / {{ count($galleryItems) }}</span>
            </div>
            <button type="button" class="text-purple-300 hover:text-white rounded-xl p-1.5 hover:bg-white/10 transition-colors" data-lightbox-close aria-label="Close Lightbox">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Image Container -->
        <div class="relative flex-1 bg-black flex items-center justify-center min-h-[320px] max-h-[68vh] overflow-hidden p-2">
            <img src="" alt="" class="max-h-full max-w-full object-contain mx-auto" data-lightbox-img>

            <!-- Prev / Next Buttons -->
            <button type="button" class="absolute left-3 top-1/2 -translate-y-1/2 flex h-11 w-11 items-center justify-center rounded-full bg-purple-900/70 text-white hover:bg-purple-600 transition-all shadow-lg backdrop-blur-sm" data-lightbox-prev aria-label="Previous Photo">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 flex h-11 w-11 items-center justify-center rounded-full bg-purple-900/70 text-white hover:bg-purple-600 transition-all shadow-lg backdrop-blur-sm" data-lightbox-next aria-label="Next Photo">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>

        <!-- Bottom Caption -->
        <div class="p-4 sm:p-5 bg-[#1a0a35] text-white">
            <h3 class="text-base sm:text-lg font-bold text-white" data-lightbox-title>Photo Title</h3>
            <p class="mt-1 text-xs sm:text-sm text-purple-300" data-lightbox-desc>Photo description</p>
        </div>
    </div>
</div>

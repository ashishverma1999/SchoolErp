<footer id="contact" class="relative text-white pt-20 pb-10 overflow-hidden border-t border-purple-900/50">
    <!-- Rich purple gradient background -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#0f0620] via-[#1a0a35] to-[#2d1060]"></div>
    <!-- Glow blobs -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] rounded-full bg-purple-700/15 blur-[80px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 rounded-full bg-violet-600/10 blur-[60px] pointer-events-none"></div>
    <!-- Grid pattern -->
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: url(\"data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M0 0h1v40H0zM39 0h1v40H39zM0 0v1h40V0zM0 39v1h40v-1z'/%3E%3C/g%3E%3C/svg%3E\")"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6">
        <div class="grid gap-12 lg:grid-cols-[1.2fr_0.8fr_1fr]">
            <!-- Column 1: School Identity & Address -->
            <div>
                <div class="flex items-center gap-3.5">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-purple-600 to-violet-700 p-2 shadow-lg shadow-purple-900/50 flex-none">
                        <img src="{{ asset('images/logo.png') }}" alt="{{ $school['name'] }} Logo" class="h-full w-full object-contain brightness-0 invert">
                    </div>
                    <div>
                        <h2 class="font-serif text-2xl font-black text-white leading-none">{{ $school['name'] }}</h2>
                        <p class="text-xs font-bold text-purple-400 uppercase tracking-widest mt-1">{{ $school['location'] ?? 'Excellence in Education' }}</p>
                    </div>
                </div>

                <p class="mt-5 text-sm leading-relaxed text-purple-200 max-w-md">
                    {{ $school['tagline'] }} An English-medium co-educational institution committed to academic excellence, strong moral values, and student well-being.
                </p>

                <div class="mt-6 space-y-3 text-xs sm:text-sm text-purple-200">
                    <p class="flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-purple-400 flex-none mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>{{ $school['address'] }}</span>
                    </p>
                    <p class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-purple-400 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <a href="tel:{{ $school['phone'] }}" class="hover:text-purple-300 transition-colors font-bold">{{ $school['phone'] }}</a>
                        @if (!empty($school['alternate_phone']))
                            <span class="text-purple-700">|</span>
                            <a href="tel:{{ $school['alternate_phone'] }}" class="hover:text-purple-300 transition-colors font-bold">{{ $school['alternate_phone'] }}</a>
                        @endif
                    </p>
                    <p class="flex items-center gap-2.5">
                        <span class="text-emerald-400 text-sm">💬</span>
                        <a href="https://wa.me/{{ $school['whatsapp'] ?? '919876543210' }}" target="_blank" rel="noopener" class="hover:text-emerald-300 transition-colors font-bold text-emerald-400">WhatsApp: {{ $school['whatsapp_display'] ?? '+91 98765 43210' }}</a>
                    </p>
                    <p class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-purple-400 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <a href="mailto:{{ $school['email'] }}" class="hover:text-purple-300 transition-colors">{{ $school['email'] }}</a>
                    </p>
                </div>
            </div>

            <!-- Column 2: Quick Links Navigation -->
            <div>
                <h3 class="text-sm font-black uppercase tracking-widest text-purple-400">Quick Navigation</h3>
                <div class="mt-5 grid grid-cols-2 gap-2 text-xs sm:text-sm text-purple-200">
                    <a href="#about" class="hover:text-purple-300 transition-colors py-1">About {{ $school['short'] ?? 'EPS' }}</a>
                    <a href="#vision-mission" class="hover:text-purple-300 transition-colors py-1">Vision &amp; Mission</a>
                    <a href="#academics" class="hover:text-purple-300 transition-colors py-1">Curriculum</a>
                    <a href="#leadership" class="hover:text-purple-300 transition-colors py-1">Leadership Desk</a>
                    <a href="#facilities" class="hover:text-purple-300 transition-colors py-1">Facilities &amp; Labs</a>
                    <a href="#transport" class="hover:text-purple-300 transition-colors py-1">Transport Fleet</a>
                    <a href="#gallery" class="hover:text-purple-300 transition-colors py-1">Campus Photos</a>
                    <a href="#reviews" class="hover:text-purple-300 transition-colors py-1">Parent Reviews</a>
                    <a href="#faqs" class="hover:text-purple-300 transition-colors py-1">FAQs</a>
                    <a href="#admissions" class="hover:text-purple-300 transition-colors py-1">Admissions</a>
                </div>

                <div class="mt-8">
                    <p class="text-xs font-bold uppercase tracking-wider text-purple-500">School Office Hours</p>
                    <p class="text-sm font-semibold text-white mt-1">{{ $school['office_timing'] ?? 'Monday to Saturday, 8:00 AM - 3:30 PM' }}</p>
                </div>

                <!-- Social-like badges -->
                <div class="mt-6 flex items-center gap-2">
                    <span class="inline-flex items-center gap-1 rounded-lg bg-purple-800/40 border border-purple-700/30 px-2.5 py-1 text-xs font-bold text-purple-300">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        Affiliated
                    </span>
                    <span class="inline-flex items-center gap-1 rounded-lg bg-emerald-900/40 border border-emerald-700/30 px-2.5 py-1 text-xs font-bold text-emerald-400">
                        ✓ Recognized
                    </span>
                </div>
            </div>

            <!-- Column 3: Location Map & Admission CTA -->
            <div>
                <h3 class="text-sm font-black uppercase tracking-widest text-purple-400">Campus Location</h3>
                
                <!-- Map Container -->
                <div class="mt-5 rounded-2xl overflow-hidden border border-purple-700/30 bg-purple-900/20 p-1 h-44 relative group">
                    <iframe 
                        src="{{ $school['map_embed'] ?? 'https://maps.google.com/maps?q=School+Location&t=&z=14&ie=UTF8&iwloc=&output=embed' }}" 
                        class="w-full h-full rounded-xl filter grayscale group-hover:grayscale-0 transition-all duration-300"
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        title="{{ $school['name'] }} location map"
                    ></iframe>
                </div>

                <div class="mt-4 flex flex-wrap gap-2">
                    <a href="#admissions" class="btn-primary text-xs py-2.5 w-full text-center">
                        <span>Apply Online for Admission</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright & Admin Access Bar -->
        <div class="mt-14 pt-8 border-t border-purple-800/40 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-purple-500">
            <p>
                Copyright &copy; {{ now()->year }} <strong class="text-purple-300">{{ $school['name'] }}</strong>. All rights reserved.
            </p>
            <div class="flex items-center gap-4">
                <a href="#home" class="hover:text-purple-300 transition-colors">Back to Top ↑</a>
                <span>•</span>
                <a href="{{ url('/schoolAdmin') }}" class="text-purple-400 hover:text-purple-200 font-bold underline transition-colors">Admin Portal Login</a>
            </div>
        </div>
    </div>
</footer>

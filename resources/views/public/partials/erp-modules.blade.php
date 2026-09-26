<!-- ── ERP Digital Campus & Management System Showcase ── -->
<section id="erp-modules" class="relative bg-gradient-to-b from-[#0f0620] via-[#1a0a35] to-[#120726] py-20 lg:py-28 text-white overflow-hidden border-y border-purple-500/20">
    <!-- Atmospheric Ambient Glows -->
    <div class="pointer-events-none absolute -top-40 left-1/4 h-[500px] w-[500px] rounded-full bg-purple-600/15 blur-[120px]"></div>
    <div class="pointer-events-none absolute bottom-0 right-10 h-[450px] w-[450px] rounded-full bg-violet-600/15 blur-[130px]"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div class="max-w-2xl">
                <span class="inline-flex items-center gap-2 rounded-full border border-purple-400/30 bg-purple-500/10 px-4 py-1.5 text-xs font-black uppercase tracking-widest text-purple-300 backdrop-blur-md">
                    <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Integrated School ERP Platform
                </span>
                <h2 class="mt-4 font-serif text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight">
                    Smart ERP Digital Campus <br class="hidden sm:inline">
                    <span class="bg-gradient-to-r from-purple-300 via-violet-200 to-amber-300 bg-clip-text text-transparent">Powering {{ $school['short'] ?? 'EPS' }}</span>
                </h2>
                <p class="mt-4 text-purple-200 text-base sm:text-lg leading-relaxed">
                    A unified cloud management system connecting students, parents, educators, and school administration with real-time automation, mobile alerts, and zero-paperwork workflows.
                </p>
            </div>

            <!-- Quick Action: Launch Live Demo Modal -->
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <button 
                    type="button" 
                    onclick="openErpDemoModal('admin')"
                    class="inline-flex items-center justify-center gap-2.5 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-[#1a0a35] font-black px-6 py-3.5 text-sm shadow-xl shadow-amber-500/20 hover:shadow-amber-500/40 transform hover:-translate-y-0.5 transition-all"
                >
                    <svg class="w-5 h-5 text-[#1a0a35]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Launch ERP Demo Sandbox</span>
                </button>
            </div>
        </div>

        <!-- 4 Role Portals Quick Selector Cards -->
        <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-4">
            <!-- Student Portal -->
            <div 
                onclick="openErpDemoModal('student')"
                class="cursor-pointer group rounded-2xl border border-purple-500/25 bg-white/5 p-5 backdrop-blur-xl hover:bg-white/10 hover:border-purple-400/50 hover:shadow-xl hover:shadow-purple-900/30 transition-all duration-300"
            >
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 text-white shadow-md group-hover:scale-110 transition-transform">
                    <span class="text-2xl">👨‍🎓</span>
                </div>
                <h3 class="mt-4 font-bold text-base text-white group-hover:text-purple-300 transition-colors">Student Portal</h3>
                <p class="text-xs text-purple-200/70 mt-1">Timetable, homework, digital library, and live marksheet.</p>
                <div class="mt-3 flex items-center gap-1.5 text-xs font-bold text-amber-400 group-hover:translate-x-1 transition-transform">
                    <span>Try Demo</span>
                    <span>→</span>
                </div>
            </div>

            <!-- Parent Portal -->
            <div 
                onclick="openErpDemoModal('parent')"
                class="cursor-pointer group rounded-2xl border border-purple-500/25 bg-white/5 p-5 backdrop-blur-xl hover:bg-white/10 hover:border-purple-400/50 hover:shadow-xl hover:shadow-purple-900/30 transition-all duration-300"
            >
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white shadow-md group-hover:scale-110 transition-transform">
                    <span class="text-2xl">👨‍👩‍👧</span>
                </div>
                <h3 class="mt-4 font-bold text-base text-white group-hover:text-emerald-300 transition-colors">Parent Portal</h3>
                <p class="text-xs text-purple-200/70 mt-1">Fee payment, live bus GPS tracking & daily attendance alerts.</p>
                <div class="mt-3 flex items-center gap-1.5 text-xs font-bold text-amber-400 group-hover:translate-x-1 transition-transform">
                    <span>Try Demo</span>
                    <span>→</span>
                </div>
            </div>

            <!-- Teacher Portal -->
            <div 
                onclick="openErpDemoModal('teacher')"
                class="cursor-pointer group rounded-2xl border border-purple-500/25 bg-white/5 p-5 backdrop-blur-xl hover:bg-white/10 hover:border-purple-400/50 hover:shadow-xl hover:shadow-purple-900/30 transition-all duration-300"
            >
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-violet-500 to-purple-600 text-white shadow-md group-hover:scale-110 transition-transform">
                    <span class="text-2xl">👨‍🏫</span>
                </div>
                <h3 class="mt-4 font-bold text-base text-white group-hover:text-violet-300 transition-colors">Teacher Portal</h3>
                <p class="text-xs text-purple-200/70 mt-1">1-click attendance, exam marks entry & assignment hub.</p>
                <div class="mt-3 flex items-center gap-1.5 text-xs font-bold text-amber-400 group-hover:translate-x-1 transition-transform">
                    <span>Try Demo</span>
                    <span>→</span>
                </div>
            </div>

            <!-- Admin & Management -->
            <div 
                onclick="openErpDemoModal('admin')"
                class="cursor-pointer group rounded-2xl border border-purple-500/25 bg-white/5 p-5 backdrop-blur-xl hover:bg-white/10 hover:border-purple-400/50 hover:shadow-xl hover:shadow-purple-900/30 transition-all duration-300"
            >
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-amber-500 to-orange-600 text-[#1a0a35] shadow-md group-hover:scale-110 transition-transform">
                    <span class="text-2xl">🏛️</span>
                </div>
                <h3 class="mt-4 font-bold text-base text-white group-hover:text-amber-300 transition-colors">Admin &amp; Finance</h3>
                <p class="text-xs text-purple-200/70 mt-1">Fee ledger, admissions pipeline, staff HR & fleet control.</p>
                <div class="mt-3 flex items-center gap-1.5 text-xs font-bold text-amber-400 group-hover:translate-x-1 transition-transform">
                    <span>Try Demo</span>
                    <span>→</span>
                </div>
            </div>
        </div>

        <!-- 6 Core ERP Modules Grid -->
        <div class="mt-14">
            <div class="text-center max-w-xl mx-auto mb-10">
                <span class="text-xs font-extrabold uppercase tracking-widest text-purple-400">Modular Architecture</span>
                <h3 class="text-2xl sm:text-3xl font-bold text-white mt-1">Comprehensive ERP Modules</h3>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <!-- Module 1: Fee & Finance Management -->
                <div class="rounded-2xl border border-purple-500/20 bg-white/[0.04] p-6 hover:bg-white/[0.08] hover:border-purple-400/40 transition-all group">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-500/20 text-purple-300 border border-purple-400/30">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <span class="rounded-full bg-emerald-500/20 px-2.5 py-0.5 text-[11px] font-bold text-emerald-300 border border-emerald-500/30">UPI / NetBanking</span>
                    </div>
                    <h4 class="mt-5 text-lg font-bold text-white group-hover:text-purple-300 transition-colors">Fee &amp; Accounts Ledger</h4>
                    <p class="mt-2 text-xs sm:text-sm text-purple-200/80 leading-relaxed">
                        Automated fee structures, term installments, instant digital receipts, automated WhatsApp defaulter reminders, and cash counter integration.
                    </p>
                    <ul class="mt-4 space-y-1.5 text-xs text-purple-300">
                        <li class="flex items-center gap-2">✓ Razorpay, UPI &amp; QR Code Gateway</li>
                        <li class="flex items-center gap-2">✓ Instant GST-compliant receipts &amp; dues ledger</li>
                    </ul>
                </div>

                <!-- Module 2: Smart Biometric Attendance -->
                <div class="rounded-2xl border border-purple-500/20 bg-white/[0.04] p-6 hover:bg-white/[0.08] hover:border-purple-400/40 transition-all group">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-500/20 text-purple-300 border border-purple-400/30">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        </div>
                        <span class="rounded-full bg-purple-500/20 px-2.5 py-0.5 text-[11px] font-bold text-purple-300 border border-purple-500/30">Real-Time Sync</span>
                    </div>
                    <h4 class="mt-5 text-lg font-bold text-white group-hover:text-purple-300 transition-colors">Smart Attendance &amp; RFID</h4>
                    <p class="mt-2 text-xs sm:text-sm text-purple-200/80 leading-relaxed">
                        Teacher 1-tap mobile attendance, RFID gate tap notifications, and automatic WhatsApp alerts to parents if a student is marked absent.
                    </p>
                    <ul class="mt-4 space-y-1.5 text-xs text-purple-300">
                        <li class="flex items-center gap-2">✓ SMS / WhatsApp gate tap alerts</li>
                        <li class="flex items-center gap-2">✓ Monthly percentage analysis &amp; leave approval</li>
                    </ul>
                </div>

                <!-- Module 3: Live GPS Fleet Tracking -->
                <div class="rounded-2xl border border-purple-500/20 bg-white/[0.04] p-6 hover:bg-white/[0.08] hover:border-purple-400/40 transition-all group">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-500/20 text-purple-300 border border-purple-400/30">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <span class="rounded-full bg-amber-500/20 px-2.5 py-0.5 text-[11px] font-bold text-amber-300 border border-amber-500/30">Live Tracking</span>
                    </div>
                    <h4 class="mt-5 text-lg font-bold text-white group-hover:text-purple-300 transition-colors">Transport Fleet &amp; GPS ERP</h4>
                    <p class="mt-2 text-xs sm:text-sm text-purple-200/80 leading-relaxed">
                        Live vehicle mapping on parent portal, driver route management, speed limit alerts, and ETA notifications when bus is 2 stops away.
                    </p>
                    <ul class="mt-4 space-y-1.5 text-xs text-purple-300">
                        <li class="flex items-center gap-2">✓ Real-time Google Map bus location</li>
                        <li class="flex items-center gap-2">✓ SOS emergency button &amp; driver log</li>
                    </ul>
                </div>

                <!-- Module 4: Exam, Grading & AI Report Cards -->
                <div class="rounded-2xl border border-purple-500/20 bg-white/[0.04] p-6 hover:bg-white/[0.08] hover:border-purple-400/40 transition-all group">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-500/20 text-purple-300 border border-purple-400/30">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                        <span class="rounded-full bg-violet-500/20 px-2.5 py-0.5 text-[11px] font-bold text-violet-300 border border-violet-500/30">CBSE Standard</span>
                    </div>
                    <h4 class="mt-5 text-lg font-bold text-white group-hover:text-purple-300 transition-colors">Exams &amp; Report Card Engine</h4>
                    <p class="mt-2 text-xs sm:text-sm text-purple-200/80 leading-relaxed">
                        Automatic marks calculation, CBSE grading scale, subject teacher remarks, rank analytics, and 1-click printable PDF report cards.
                    </p>
                    <ul class="mt-4 space-y-1.5 text-xs text-purple-300">
                        <li class="flex items-center gap-2">✓ Digital report card with QR verification</li>
                        <li class="flex items-center gap-2">✓ Student performance trend graphs</li>
                    </ul>
                </div>

                <!-- Module 5: Parent Mobile App & Digital Diary -->
                <div class="rounded-2xl border border-purple-500/20 bg-white/[0.04] p-6 hover:bg-white/[0.08] hover:border-purple-400/40 transition-all group">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-500/20 text-purple-300 border border-purple-400/30">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        </div>
                        <span class="rounded-full bg-indigo-500/20 px-2.5 py-0.5 text-[11px] font-bold text-indigo-300 border border-indigo-500/30">Android &amp; iOS</span>
                    </div>
                    <h4 class="mt-5 text-lg font-bold text-white group-hover:text-purple-300 transition-colors">Parent App &amp; Digital Diary</h4>
                    <p class="mt-2 text-xs sm:text-sm text-purple-200/80 leading-relaxed">
                        Teachers post homework, circulars, exam dates, and notices directly to parents' smartphones. Parents can submit leave applications online.
                    </p>
                    <ul class="mt-4 space-y-1.5 text-xs text-purple-300">
                        <li class="flex items-center gap-2">✓ Real-time push notifications &amp; diary entries</li>
                        <li class="flex items-center gap-2">✓ Direct 1-to-1 teacher communication</li>
                    </ul>
                </div>

                <!-- Module 6: Digital Library & Barcode ERP -->
                <div class="rounded-2xl border border-purple-500/20 bg-white/[0.04] p-6 hover:bg-white/[0.08] hover:border-purple-400/40 transition-all group">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-500/20 text-purple-300 border border-purple-400/30">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <span class="rounded-full bg-cyan-500/20 px-2.5 py-0.5 text-[11px] font-bold text-cyan-300 border border-cyan-500/30">Barcode Ready</span>
                    </div>
                    <h4 class="mt-5 text-lg font-bold text-white group-hover:text-purple-300 transition-colors">Library &amp; Asset ERP</h4>
                    <p class="mt-2 text-xs sm:text-sm text-purple-200/80 leading-relaxed">
                        Barcode cataloging of 12,000+ volumes, 1-click book issue/return tracking, overdue fine calculation, and student reading logs.
                    </p>
                    <ul class="mt-4 space-y-1.5 text-xs text-purple-300">
                        <li class="flex items-center gap-2">✓ Student card barcode scanning</li>
                        <li class="flex items-center gap-2">✓ E-book library &amp; lecture notes repository</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Live Metrics Strip -->
        <div class="mt-14 rounded-3xl border border-purple-500/30 bg-gradient-to-r from-purple-900/40 via-violet-900/30 to-purple-900/40 p-8 backdrop-blur-xl">
            <div class="grid grid-cols-2 gap-6 sm:grid-cols-4 text-center">
                <div>
                    <strong class="block font-serif text-3xl sm:text-4xl font-black text-amber-400">100%</strong>
                    <span class="text-xs sm:text-sm font-semibold text-purple-200 mt-1 block">Paperless Administration</span>
                </div>
                <div>
                    <strong class="block font-serif text-3xl sm:text-4xl font-black text-white">2,500+</strong>
                    <span class="text-xs sm:text-sm font-semibold text-purple-200 mt-1 block">Active Student Profiles</span>
                </div>
                <div>
                    <strong class="block font-serif text-3xl sm:text-4xl font-black text-emerald-400">&lt; 3 Sec</strong>
                    <span class="text-xs sm:text-sm font-semibold text-purple-200 mt-1 block">Attendance SMS Delivery</span>
                </div>
                <div>
                    <strong class="block font-serif text-3xl sm:text-4xl font-black text-purple-300">99.9%</strong>
                    <span class="text-xs sm:text-sm font-semibold text-purple-200 mt-1 block">Cloud System Uptime</span>
                </div>
            </div>
        </div>
    </div>
</section>

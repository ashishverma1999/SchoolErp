<!-- ── Interactive School ERP Demo Sandbox Modal ── -->
<div 
    id="erp-demo-modal" 
    class="fixed inset-0 z-50 hidden overflow-y-auto bg-[#0a0414]/90 backdrop-blur-md p-2 sm:p-4 md:p-6 transition-opacity duration-300"
    role="dialog" 
    aria-modal="true" 
    aria-labelledby="erp-modal-title"
>
    <div class="min-h-full flex items-center justify-center">
        <div class="relative w-full max-w-5xl rounded-3xl bg-[#140a28] border border-purple-500/30 text-white shadow-2xl shadow-purple-950/80 overflow-hidden flex flex-col max-h-[92vh]">
            
            <!-- Modal Header -->
            <div class="flex items-center justify-between border-b border-purple-800/40 bg-gradient-to-r from-[#1a0a35] via-[#220e45] to-[#1a0a35] px-6 py-4 flex-none">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-purple-600 text-white font-black text-sm shadow-md">
                        EPS
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 id="erp-modal-title" class="font-bold text-base sm:text-lg text-white">School ERP Live Interactive Sandbox</h2>
                            <span class="rounded-full bg-emerald-500/20 border border-emerald-500/40 px-2 py-0.5 text-[10px] font-extrabold text-emerald-300 uppercase tracking-widest animate-pulse">Live Demo</span>
                        </div>
                        <p class="text-xs text-purple-300">Test drive the digital campus portal from any role perspective.</p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <button 
                        type="button" 
                        onclick="closeErpDemoModal()" 
                        class="rounded-xl bg-white/10 p-2 text-purple-300 hover:bg-white/20 hover:text-white transition-colors"
                        aria-label="Close modal"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>

            <!-- Role Switcher Tabs Bar -->
            <div class="flex flex-wrap items-center gap-1.5 border-b border-purple-800/30 bg-[#0e051c] px-6 py-2.5 flex-none">
                <span class="text-xs font-bold uppercase tracking-wider text-purple-400 mr-2 hidden sm:inline">Role View:</span>
                
                <button 
                    type="button" 
                    onclick="switchErpRole('student')" 
                    id="tab-role-student"
                    class="erp-role-btn is-active flex items-center gap-2 rounded-xl px-3.5 py-1.5 text-xs font-bold transition-all"
                >
                    <span>👨‍🎓</span>
                    <span>Student View</span>
                </button>

                <button 
                    type="button" 
                    onclick="switchErpRole('parent')" 
                    id="tab-role-parent"
                    class="erp-role-btn flex items-center gap-2 rounded-xl px-3.5 py-1.5 text-xs font-bold transition-all"
                >
                    <span>👨‍👩‍👧</span>
                    <span>Parent View</span>
                </button>

                <button 
                    type="button" 
                    onclick="switchErpRole('teacher')" 
                    id="tab-role-teacher"
                    class="erp-role-btn flex items-center gap-2 rounded-xl px-3.5 py-1.5 text-xs font-bold transition-all"
                >
                    <span>👨‍🏫</span>
                    <span>Teacher View</span>
                </button>

                <button 
                    type="button" 
                    onclick="switchErpRole('admin')" 
                    id="tab-role-admin"
                    class="erp-role-btn flex items-center gap-2 rounded-xl px-3.5 py-1.5 text-xs font-bold transition-all"
                >
                    <span>🏛️</span>
                    <span>Admin / Principal</span>
                </button>
            </div>

            <!-- Modal Body (Scrollable Dashboard View) -->
            <div class="overflow-y-auto p-4 sm:p-6 space-y-6 flex-1 bg-[#140a28]">
                
                <!-- ══════════════════════════════════════════ -->
                <!-- 1. STUDENT VIEW PANEL -->
                <!-- ══════════════════════════════════════════ -->
                <div id="erp-view-student" class="erp-view-panel space-y-6">
                    <!-- Student Header Summary -->
                    <div class="rounded-2xl border border-purple-500/25 bg-gradient-to-r from-purple-900/40 via-violet-900/30 to-[#1e0d3b] p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="h-16 w-16 rounded-2xl overflow-hidden ring-2 ring-purple-400/40 shadow-lg flex-none">
                                <img src="/images/dummy/student_boy1.jpg" alt="Aarav Sharma" class="h-full w-full object-cover">
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h3 class="text-xl font-black text-white">Aarav Sharma</h3>
                                    <span class="rounded-md bg-purple-500/30 px-2 py-0.5 text-[10px] font-bold text-purple-200">Roll #14</span>
                                </div>
                                <p class="text-xs text-purple-300 mt-0.5">Class X - Science Wing (Section A) • ID: EPS-2026-0841</p>
                                <div class="mt-2 flex items-center gap-3 text-xs font-semibold text-purple-200">
                                    <span class="flex items-center gap-1"><span class="h-2 w-2 rounded-full bg-emerald-400"></span> Attendance: 96.4%</span>
                                    <span>•</span>
                                    <span class="text-amber-300">GPA Rank: #2 / 45</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-2.5">
                            <button 
                                type="button" 
                                onclick="simulateReportCardDownload()" 
                                class="inline-flex items-center gap-2 rounded-xl bg-purple-600 hover:bg-purple-500 text-white font-bold px-4 py-2 text-xs shadow-md shadow-purple-900/50 transition-all"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <span>Download CBSE Term Report</span>
                            </button>
                        </div>
                    </div>

                    <!-- Timetable & Assignments 2-col -->
                    <div class="grid gap-6 md:grid-cols-2">
                        <!-- Today's Timetable -->
                        <div class="rounded-2xl border border-purple-500/20 bg-white/[0.03] p-5">
                            <div class="flex items-center justify-between border-b border-purple-800/40 pb-3">
                                <h4 class="font-bold text-sm text-white flex items-center gap-2">
                                    <span>📅</span> Today's Class Timetable (Monday)
                                </h4>
                                <span class="text-xs text-purple-400 font-bold">5 Periods</span>
                            </div>
                            <div class="mt-3 space-y-2.5">
                                <div class="flex items-center justify-between rounded-xl bg-purple-500/10 border border-purple-500/20 p-2.5">
                                    <div>
                                        <p class="text-xs font-bold text-purple-200">Period 1: Physics Laboratory</p>
                                        <p class="text-[11px] text-purple-400">08:15 AM – 09:05 AM • Lab Room 204</p>
                                    </div>
                                    <span class="rounded bg-emerald-500/20 text-emerald-300 text-[10px] font-bold px-2 py-0.5">Completed</span>
                                </div>
                                <div class="flex items-center justify-between rounded-xl bg-purple-500/20 border border-purple-400/40 p-2.5">
                                    <div>
                                        <p class="text-xs font-bold text-white">Period 2: Mathematics (Calculus)</p>
                                        <p class="text-[11px] text-purple-300">09:10 AM – 10:00 AM • Room 102</p>
                                    </div>
                                    <span class="rounded bg-amber-500/20 text-amber-300 text-[10px] font-bold px-2 py-0.5 animate-pulse">Ongoing</span>
                                </div>
                                <div class="flex items-center justify-between rounded-xl bg-white/[0.02] border border-white/5 p-2.5">
                                    <div>
                                        <p class="text-xs font-bold text-purple-200">Period 3: Computer Science &amp; AI</p>
                                        <p class="text-[11px] text-purple-400">10:15 AM – 11:00 AM • Senior IT Lab</p>
                                    </div>
                                    <span class="rounded bg-slate-700/50 text-slate-300 text-[10px] font-bold px-2 py-0.5">Upcoming</span>
                                </div>
                                <div class="flex items-center justify-between rounded-xl bg-white/[0.02] border border-white/5 p-2.5">
                                    <div>
                                        <p class="text-xs font-bold text-purple-200">Period 4: English Literature</p>
                                        <p class="text-[11px] text-purple-400">11:05 AM – 11:50 AM • Room 102</p>
                                    </div>
                                    <span class="rounded bg-slate-700/50 text-slate-300 text-[10px] font-bold px-2 py-0.5">Upcoming</span>
                                </div>
                            </div>
                        </div>

                        <!-- Active Homework & Quizzes -->
                        <div class="rounded-2xl border border-purple-500/20 bg-white/[0.03] p-5">
                            <div class="flex items-center justify-between border-b border-purple-800/40 pb-3">
                                <h4 class="font-bold text-sm text-white flex items-center gap-2">
                                    <span>📝</span> Pending Homework &amp; Assignments
                                </h4>
                                <span class="text-xs text-amber-400 font-bold">2 Due This Week</span>
                            </div>
                            <div class="mt-3 space-y-2.5">
                                <div class="rounded-xl border border-purple-500/20 bg-white/[0.02] p-3 flex items-start gap-3">
                                    <input type="checkbox" id="hw-1" onchange="toggleHomework(this)" class="mt-1 h-4 w-4 rounded border-purple-400 text-purple-600 focus:ring-purple-500">
                                    <label for="hw-1" class="text-xs cursor-pointer flex-1">
                                        <span class="font-bold text-white block">Chemistry: Organic Reactions Lab File</span>
                                        <span class="text-purple-300/80 text-[11px]">Due Tomorrow • Teacher: Dr. Roy</span>
                                    </label>
                                    <span class="text-[10px] font-bold text-rose-400 bg-rose-500/20 px-2 py-0.5 rounded">High Priority</span>
                                </div>

                                <div class="rounded-xl border border-purple-500/20 bg-white/[0.02] p-3 flex items-start gap-3">
                                    <input type="checkbox" id="hw-2" onchange="toggleHomework(this)" class="mt-1 h-4 w-4 rounded border-purple-400 text-purple-600 focus:ring-purple-500">
                                    <label for="hw-2" class="text-xs cursor-pointer flex-1">
                                        <span class="font-bold text-white block">Computer Science: Python Array Algorithms</span>
                                        <span class="text-purple-300/80 text-[11px]">Due Friday • 4 Questions</span>
                                    </label>
                                    <span class="text-[10px] font-bold text-purple-300 bg-purple-500/20 px-2 py-0.5 rounded">Assignment</span>
                                </div>

                                <div class="rounded-xl border border-emerald-500/20 bg-emerald-500/5 p-3 flex items-start gap-3">
                                    <input type="checkbox" id="hw-3" checked disabled class="mt-1 h-4 w-4 rounded border-emerald-400 text-emerald-600">
                                    <div class="text-xs flex-1 line-through text-slate-400">
                                        <span class="font-bold block">Mathematics: Quadratic Word Problems</span>
                                        <span class="text-[11px]">Submitted &amp; Graded: 20/20</span>
                                    </div>
                                    <span class="text-[10px] font-bold text-emerald-400 bg-emerald-500/20 px-2 py-0.5 rounded">Completed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ══════════════════════════════════════════ -->
                <!-- 2. PARENT VIEW PANEL -->
                <!-- ══════════════════════════════════════════ -->
                <div id="erp-view-parent" class="erp-view-panel hidden space-y-6">
                    <!-- Parent Header Card -->
                    <div class="rounded-2xl border border-emerald-500/30 bg-gradient-to-r from-emerald-950/40 via-[#152e25] to-[#120726] p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="h-16 w-16 rounded-2xl overflow-hidden ring-2 ring-emerald-400/40 shadow-lg flex-none">
                                <img src="/images/dummy/parent_female.jpg" alt="Parent Profile" class="h-full w-full object-cover">
                            </div>
                            <div>
                                <span class="rounded-md bg-emerald-500/20 px-2 py-0.5 text-[10px] font-bold text-emerald-300 uppercase">Verified Guardian</span>
                                <h3 class="text-xl font-black text-white mt-1">Mrs. Sunita Sharma</h3>
                                <p class="text-xs text-emerald-200 mt-0.5">Parent of Aarav Sharma (Class X-A, Roll #14)</p>
                            </div>
                        </div>

                        <!-- Live Status Badges -->
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 rounded-xl bg-emerald-500/20 border border-emerald-500/40 px-3 py-1.5 text-xs font-bold text-emerald-300">
                                <span class="h-2 w-2 rounded-full bg-emerald-400 animate-ping"></span>
                                Aarav In Campus (Gate 1 Entry: 07:54 AM)
                            </span>
                        </div>
                    </div>

                    <!-- Fee Payment & Live Bus Tracking Grid -->
                    <div class="grid gap-6 md:grid-cols-2">
                        <!-- Fee Payment Sandbox -->
                        <div class="rounded-2xl border border-purple-500/20 bg-white/[0.03] p-5 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between border-b border-purple-800/40 pb-3">
                                    <h4 class="font-bold text-sm text-white flex items-center gap-2">
                                        <span>💳</span> Online Fee Payment Ledger
                                    </h4>
                                    <span class="text-xs text-amber-300 font-bold">Session 2026–27</span>
                                </div>

                                <div class="mt-4 rounded-xl bg-purple-500/10 border border-purple-500/20 p-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-purple-300">Quarter II Tuition &amp; Science Lab</span>
                                        <span class="text-base font-black text-white">₹ 8,500</span>
                                    </div>
                                    <div class="mt-2 flex items-center justify-between text-[11px] text-purple-400">
                                        <span>Due Date: 15 Oct 2026</span>
                                        <span id="fee-status-badge" class="font-bold text-amber-400 bg-amber-500/20 px-2 py-0.5 rounded">Due Pending</span>
                                    </div>
                                </div>

                                <div class="mt-3 text-xs text-purple-300 space-y-1">
                                    <p>✓ Zero convenience fee on UPI &amp; RuPay</p>
                                    <p>✓ Instant tax-compliant digital fee receipt generated</p>
                                </div>
                            </div>

                            <div class="mt-5 pt-4 border-t border-purple-800/40">
                                <button 
                                    type="button" 
                                    id="pay-fee-btn"
                                    onclick="simulateFeePayment()"
                                    class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white font-bold py-3 text-xs shadow-lg shadow-emerald-950/50 transition-all"
                                >
                                    <span>Pay ₹ 8,500 (Instant Demo Payment)</span>
                                    <span>→</span>
                                </button>
                            </div>
                        </div>

                        <!-- Live GPS Bus Tracking Simulator -->
                        <div class="rounded-2xl border border-purple-500/20 bg-white/[0.03] p-5 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between border-b border-purple-800/40 pb-3">
                                    <h4 class="font-bold text-sm text-white flex items-center gap-2">
                                        <span>🚌</span> Live Van GPS Tracking
                                    </h4>
                                    <span class="text-xs text-emerald-400 font-bold flex items-center gap-1">
                                        <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                        On Route #07
                                    </span>
                                </div>

                                <!-- Simulated Map Container -->
                                <div class="mt-4 rounded-xl overflow-hidden border border-purple-500/30 bg-[#0a0518] relative h-36 flex items-center justify-center text-center p-4">
                                    <!-- Map background grid simulation -->
                                    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#a855f7_1px,transparent_1px)] [background-size:16px_16px]"></div>
                                    
                                    <div class="relative z-10">
                                        <div class="inline-flex items-center gap-2 rounded-full bg-emerald-500/20 border border-emerald-500/50 px-3 py-1 text-xs font-bold text-emerald-300">
                                            <span>🚐 Van #07</span>
                                            <span>•</span>
                                            <span class="text-white">Speed: 32 km/h</span>
                                        </div>
                                        <p class="text-xs text-purple-200 mt-2 font-semibold">Current Location: Near Sector 14 Main Crossroad</p>
                                        <p class="text-[11px] text-amber-300 font-bold mt-0.5">ETA to Child Stop: ~4 Minutes</p>
                                    </div>
                                </div>

                                <div class="mt-3 flex items-center justify-between text-xs text-purple-300">
                                    <span>Driver: Ramesh Kumar (+91 98765 00122)</span>
                                    <a href="tel:{{ $school['phone'] }}" class="text-emerald-400 font-bold hover:underline">Call Driver</a>
                                </div>
                            </div>

                            <div class="mt-5 pt-4 border-t border-purple-800/40">
                                <button 
                                    type="button" 
                                    onclick="showToast('Live GPS ping refreshed! Bus is moving smoothly.')"
                                    class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-purple-600/30 hover:bg-purple-600/50 border border-purple-400/30 text-purple-200 font-bold py-2.5 text-xs transition-all"
                                >
                                    <span>Refresh GPS Ping 🔄</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ══════════════════════════════════════════ -->
                <!-- 3. TEACHER VIEW PANEL -->
                <!-- ══════════════════════════════════════════ -->
                <div id="erp-view-teacher" class="erp-view-panel hidden space-y-6">
                    <!-- Teacher Header Card -->
                    <div class="rounded-2xl border border-violet-500/30 bg-gradient-to-r from-violet-950/40 via-[#27104b] to-[#120726] p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="h-16 w-16 rounded-2xl overflow-hidden ring-2 ring-violet-400/40 shadow-lg flex-none">
                                <img src="/images/vice_principal.jpeg" alt="Dr. Abhilasha Sharma" class="h-full w-full object-cover">
                            </div>
                            <div>
                                <span class="rounded-md bg-violet-500/20 px-2 py-0.5 text-[10px] font-bold text-violet-300 uppercase">Faculty Portal</span>
                                <h3 class="text-xl font-black text-white mt-1">Dr. Abhilasha Sharma</h3>
                                <p class="text-xs text-violet-200 mt-0.5">Head of Science &amp; Class Teacher (Class X - Section A)</p>
                            </div>
                        </div>

                        <!-- Class Attendance Summary -->
                        <div class="flex items-center gap-3">
                            <div class="text-right">
                                <p class="text-xs text-purple-300">Today's Class Presence</p>
                                <p class="text-lg font-black text-emerald-400" id="teacher-present-count">41 / 42 Present (97.6%)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Interactive Class Attendance Sheet -->
                    <div class="rounded-2xl border border-purple-500/20 bg-white/[0.03] p-5">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-purple-800/40 pb-3">
                            <div>
                                <h4 class="font-bold text-sm text-white">Daily Attendance Marker (Class X - A)</h4>
                                <p class="text-xs text-purple-400">Click on any student status to toggle between Present &amp; Absent.</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <button 
                                    type="button" 
                                    onclick="markAllPresent()" 
                                    class="rounded-lg bg-emerald-500/20 hover:bg-emerald-500/30 border border-emerald-500/40 text-emerald-300 font-bold px-3 py-1.5 text-xs transition-colors"
                                >
                                    ✓ Mark All Present
                                </button>
                                <button 
                                    type="button" 
                                    onclick="showToast('Class attendance submitted! SMS sent to 1 absent guardian.')" 
                                    class="rounded-lg bg-purple-600 hover:bg-purple-500 text-white font-bold px-4 py-1.5 text-xs shadow-md transition-colors"
                                >
                                    Save &amp; Notify Parents
                                </button>
                            </div>
                        </div>

                        <!-- Student List Rows -->
                        <div class="mt-4 divide-y divide-purple-900/40">
                            <!-- Row 1 -->
                            <div class="py-3 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <span class="text-xs font-bold text-purple-400 w-6">#01</span>
                                    <img src="/images/dummy/student_boy1.jpg" alt="" class="h-8 w-8 rounded-lg object-cover">
                                    <div>
                                        <p class="text-xs font-bold text-white">Aarav Sharma</p>
                                        <p class="text-[10px] text-purple-300">Admission: EPS-2026-0841</p>
                                    </div>
                                </div>
                                <button type="button" onclick="toggleStudentAttendance(this)" class="student-att-toggle rounded-lg bg-emerald-500/20 border border-emerald-500/40 px-3 py-1 text-xs font-bold text-emerald-300">
                                    Present
                                </button>
                            </div>

                            <!-- Row 2 -->
                            <div class="py-3 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <span class="text-xs font-bold text-purple-400 w-6">#02</span>
                                    <img src="/images/dummy/student_girl1.jpg" alt="" class="h-8 w-8 rounded-lg object-cover">
                                    <div>
                                        <p class="text-xs font-bold text-white">Ananya Patel</p>
                                        <p class="text-[10px] text-purple-300">Admission: EPS-2026-0922</p>
                                    </div>
                                </div>
                                <button type="button" onclick="toggleStudentAttendance(this)" class="student-att-toggle rounded-lg bg-emerald-500/20 border border-emerald-500/40 px-3 py-1 text-xs font-bold text-emerald-300">
                                    Present
                                </button>
                            </div>

                            <!-- Row 3 -->
                            <div class="py-3 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <span class="text-xs font-bold text-purple-400 w-6">#03</span>
                                    <img src="/images/dummy/student_boy2.jpg" alt="" class="h-8 w-8 rounded-lg object-cover">
                                    <div>
                                        <p class="text-xs font-bold text-white">Rohan Verma</p>
                                        <p class="text-[10px] text-purple-300">Admission: EPS-2026-0750</p>
                                    </div>
                                </div>
                                <button type="button" onclick="toggleStudentAttendance(this)" class="student-att-toggle rounded-lg bg-rose-500/20 border border-rose-500/40 px-3 py-1 text-xs font-bold text-rose-300">
                                    Absent (SMS Sent)
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ══════════════════════════════════════════ -->
                <!-- 4. ADMIN & PRINCIPAL VIEW PANEL -->
                <!-- ══════════════════════════════════════════ -->
                <div id="erp-view-admin" class="erp-view-panel hidden space-y-6">
                    <!-- Admin Command Center Overview -->
                    <div class="rounded-2xl border border-amber-500/30 bg-gradient-to-r from-amber-950/40 via-[#2e1c0c] to-[#120726] p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="h-16 w-16 rounded-2xl overflow-hidden ring-2 ring-amber-400/40 shadow-lg flex-none bg-amber-500/20 flex items-center justify-center text-2xl">
                                🏛️
                            </div>
                            <div>
                                <span class="rounded-md bg-amber-500/20 px-2 py-0.5 text-[10px] font-bold text-amber-300 uppercase">Executive Dashboard</span>
                                <h3 class="text-xl font-black text-white mt-1">Campus Command &amp; Control</h3>
                                <p class="text-xs text-amber-200/80 mt-0.5">Excel Public School • Central ERP Hub</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <a 
                                href="{{ url('/schoolAdmin') }}" 
                                target="_blank"
                                class="inline-flex items-center gap-2 rounded-xl bg-amber-500 hover:bg-amber-400 text-[#1a0a35] font-black px-4 py-2 text-xs shadow-md shadow-amber-900/50 transition-all"
                            >
                                <span>Open Full Admin Panel (Filament)</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>

                    <!-- 4 Live Command Center Metric Cards -->
                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                        <div class="rounded-2xl border border-purple-500/20 bg-white/[0.03] p-4 text-center">
                            <span class="text-xs text-purple-300 block font-semibold">Today's Attendance</span>
                            <strong class="text-2xl sm:text-3xl font-black text-emerald-400 mt-1 block">96.7%</strong>
                            <span class="text-[11px] text-purple-400 mt-0.5 block">2,418 / 2,500 present</span>
                        </div>

                        <div class="rounded-2xl border border-purple-500/20 bg-white/[0.03] p-4 text-center">
                            <span class="text-xs text-purple-300 block font-semibold">Month Fee Inflow</span>
                            <strong class="text-2xl sm:text-3xl font-black text-amber-300 mt-1 block">₹ 38.4 L</strong>
                            <span class="text-[11px] text-purple-400 mt-0.5 block">88% target achieved</span>
                        </div>

                        <div class="rounded-2xl border border-purple-500/20 bg-white/[0.03] p-4 text-center">
                            <span class="text-xs text-purple-300 block font-semibold">Active Fleet</span>
                            <strong class="text-2xl sm:text-3xl font-black text-purple-300 mt-1 block">14 / 14</strong>
                            <span class="text-[11px] text-purple-400 mt-0.5 block">All GPS units active</span>
                        </div>

                        <div class="rounded-2xl border border-purple-500/20 bg-white/[0.03] p-4 text-center">
                            <span class="text-xs text-purple-300 block font-semibold">New Enquiries</span>
                            <strong class="text-2xl sm:text-3xl font-black text-white mt-1 block">42</strong>
                            <span class="text-[11px] text-purple-400 mt-0.5 block">For 2026–27 session</span>
                        </div>
                    </div>

                    <!-- Quick Operations Trigger -->
                    <div class="rounded-2xl border border-purple-500/20 bg-white/[0.03] p-5">
                        <h4 class="font-bold text-sm text-white mb-3">1-Click ERP Operations (Simulated)</h4>
                        <div class="grid gap-3 sm:grid-cols-3">
                            <button 
                                type="button" 
                                onclick="showToast('Exported CBSE Examination Ledger for 2,500 students!')"
                                class="rounded-xl border border-purple-500/30 bg-purple-500/10 hover:bg-purple-500/20 p-3 text-left transition-all"
                            >
                                <p class="text-xs font-bold text-white">📊 Export CBSE Ledger</p>
                                <p class="text-[11px] text-purple-300 mt-0.5">Download full grades CSV</p>
                            </button>

                            <button 
                                type="button" 
                                onclick="showToast('Generated Fee Defaulter Report & Queued WhatsApp Reminders!')"
                                class="rounded-xl border border-amber-500/30 bg-amber-500/10 hover:bg-amber-500/20 p-3 text-left transition-all"
                            >
                                <p class="text-xs font-bold text-white">💸 Defaulter SMS Alert</p>
                                <p class="text-[11px] text-amber-200 mt-0.5">Send auto reminders</p>
                            </button>

                            <button 
                                type="button" 
                                onclick="showToast('All 14 School Vans GPS telemetry synchronized with Police & Parent desk!')"
                                class="rounded-xl border border-emerald-500/30 bg-emerald-500/10 hover:bg-emerald-500/20 p-3 text-left transition-all"
                            >
                                <p class="text-xs font-bold text-white">🚐 Sync Fleet GPS</p>
                                <p class="text-[11px] text-emerald-200 mt-0.5">Zero route deviations</p>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal Footer -->
            <div class="flex flex-col sm:flex-row items-center justify-between border-t border-purple-800/40 bg-[#0e051c] px-6 py-3.5 gap-3 flex-none text-xs text-purple-300">
                <div class="flex items-center gap-2">
                    <span class="text-emerald-400">● Cloud Sync Active</span>
                    <span>•</span>
                    <span>Excel Public School ERP Core v3.4</span>
                </div>
                <div class="flex items-center gap-3">
                    <button 
                        type="button" 
                        onclick="closeErpDemoModal()"
                        class="rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold px-4 py-2 transition-colors"
                    >
                        Close Sandbox
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Simple Toast Notification Box -->
<div 
    id="erp-toast" 
    class="fixed bottom-6 right-6 z-50 hidden max-w-md rounded-2xl bg-gradient-to-r from-purple-900 to-indigo-900 border border-purple-400/40 px-5 py-3.5 text-white shadow-2xl shadow-black/60 transition-all duration-300 transform translate-y-4"
>
    <div class="flex items-center gap-3">
        <span class="text-xl">⚡</span>
        <p id="erp-toast-message" class="text-xs font-bold"></p>
    </div>
</div>

<script>
    function openErpDemoModal(role = 'admin') {
        const modal = document.getElementById('erp-demo-modal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            switchErpRole(role);
        }
    }

    function closeErpDemoModal() {
        const modal = document.getElementById('erp-demo-modal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    function switchErpRole(role) {
        // Hide all views
        document.querySelectorAll('.erp-view-panel').forEach(p => p.classList.add('hidden'));
        document.querySelectorAll('.erp-role-btn').forEach(b => {
            b.classList.remove('bg-purple-600', 'text-white', 'shadow-md', 'is-active');
            b.classList.add('text-purple-300', 'hover:bg-white/5');
        });

        const activePanel = document.getElementById(`erp-view-${role}`);
        const activeTab = document.getElementById(`tab-role-${role}`);

        if (activePanel) activePanel.classList.remove('hidden');
        if (activeTab) {
            activeTab.classList.remove('text-purple-300', 'hover:bg-white/5');
            activeTab.classList.add('bg-purple-600', 'text-white', 'shadow-md', 'is-active');
        }
    }

    function toggleHomework(cb) {
        const label = cb.nextElementSibling;
        if (cb.checked) {
            label.classList.add('line-through', 'text-slate-400');
            showToast('Assignment marked as completed!');
        } else {
            label.classList.remove('line-through', 'text-slate-400');
        }
    }

    function simulateFeePayment() {
        const btn = document.getElementById('pay-fee-btn');
        const badge = document.getElementById('fee-status-badge');
        if (btn) {
            btn.innerHTML = '<span>Processing Razorpay UPI...</span>';
            btn.disabled = true;
            setTimeout(() => {
                btn.innerHTML = '<span>✓ Paid ₹ 8,500 (Receipt #EPS-REC-8921)</span>';
                btn.classList.remove('from-emerald-500', 'to-teal-600');
                btn.classList.add('bg-slate-700', 'text-emerald-300');
                if (badge) {
                    badge.textContent = 'Paid Online';
                    badge.classList.remove('text-amber-400', 'bg-amber-500/20');
                    badge.classList.add('text-emerald-400', 'bg-emerald-500/20');
                }
                showToast('Fee Payment Successful! Digital receipt generated & emailed.');
            }, 1000);
        }
    }

    function toggleStudentAttendance(btn) {
        if (btn.classList.contains('bg-emerald-500/20')) {
            btn.classList.remove('bg-emerald-500/20', 'border-emerald-500/40', 'text-emerald-300');
            btn.classList.add('bg-rose-500/20', 'border-rose-500/40', 'text-rose-300');
            btn.textContent = 'Absent (SMS Queued)';
            showToast('Student marked Absent. Parent notification queued.');
        } else {
            btn.classList.remove('bg-rose-500/20', 'border-rose-500/40', 'text-rose-300');
            btn.classList.add('bg-emerald-500/20', 'border-emerald-500/40', 'text-emerald-300');
            btn.textContent = 'Present';
            showToast('Student marked Present.');
        }
    }

    function markAllPresent() {
        document.querySelectorAll('.student-att-toggle').forEach(btn => {
            btn.classList.remove('bg-rose-500/20', 'border-rose-500/40', 'text-rose-300');
            btn.classList.add('bg-emerald-500/20', 'border-emerald-500/40', 'text-emerald-300');
            btn.textContent = 'Present';
        });
        const counter = document.getElementById('teacher-present-count');
        if (counter) counter.textContent = '42 / 42 Present (100%)';
        showToast('All 42 students marked Present!');
    }

    function simulateReportCardDownload() {
        showToast('Generating official CBSE Term Report Card PDF...');
        setTimeout(() => {
            window.open('about:blank', '_blank');
        }, 800);
    }

    function showToast(msg) {
        const toast = document.getElementById('erp-toast');
        const text = document.getElementById('erp-toast-message');
        if (toast && text) {
            text.textContent = msg;
            toast.classList.remove('hidden', 'translate-y-4');
            setTimeout(() => {
                toast.classList.add('hidden', 'translate-y-4');
            }, 3500);
        }
    }

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeErpDemoModal();
    });
</script>

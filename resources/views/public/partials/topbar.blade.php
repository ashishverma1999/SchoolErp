<div class="bg-gradient-to-r from-[#0f0620] via-[#1a0a35] to-[#0f0620] text-xs sm:text-sm text-purple-200 border-b border-purple-800/40">
    <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-2 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex flex-wrap items-center gap-x-5 gap-y-1">
            <a href="tel:{{ $school['phone'] }}" class="inline-flex items-center gap-1.5 hover:text-purple-300 transition-colors">
                <svg class="w-3.5 h-3.5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                <span>{{ $school['phone'] }}</span>
            </a>
            <a href="mailto:{{ $school['email'] }}" class="hidden md:inline-flex items-center gap-1.5 hover:text-purple-300 transition-colors">
                <svg class="w-3.5 h-3.5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>{{ $school['email'] }}</span>
            </a>
            <span class="inline-flex items-center gap-1.5 text-purple-300">
                <svg class="w-3.5 h-3.5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span>{{ $school['location'] }}</span>
            </span>
        </div>
        <div class="flex flex-wrap items-center gap-2.5 self-end sm:self-auto">
            <!-- Language Switcher -->
            <div class="inline-flex items-center rounded-lg bg-purple-900/50 p-0.5 border border-purple-700/40 text-xs font-bold" data-language-switcher>
                <button type="button" class="lang-btn is-active px-2 py-0.5 rounded transition-all text-purple-200 font-extrabold" data-lang="en" title="English">
                    🇬🇧 EN
                </button>
                <span class="text-purple-600 text-[10px]">|</span>
                <button type="button" class="lang-btn px-2 py-0.5 rounded transition-all text-purple-400 hover:text-purple-200" data-lang="hi" title="हिन्दी (Hindi)">
                    🇮🇳 हिन्दी
                </button>
            </div>

            <!-- Role Portals Shortcut for Live Demo -->
            <div class="hidden xl:inline-flex items-center gap-1.5 text-xs text-purple-300 border-l border-purple-800/60 pl-3">
                <span class="text-purple-400 font-semibold text-[11px] uppercase tracking-wider">ERP Portals:</span>
                <button type="button" onclick="openErpDemoModal('student')" class="px-2 py-0.5 rounded bg-purple-950/70 hover:bg-purple-800/80 text-purple-200 hover:text-white transition-all text-[11px] font-semibold border border-purple-700/30">
                    🎓 Student
                </button>
                <button type="button" onclick="openErpDemoModal('parent')" class="px-2 py-0.5 rounded bg-purple-950/70 hover:bg-purple-800/80 text-purple-200 hover:text-white transition-all text-[11px] font-semibold border border-purple-700/30">
                    👨‍👩‍👧 Parent
                </button>
                <button type="button" onclick="openErpDemoModal('teacher')" class="px-2 py-0.5 rounded bg-purple-950/70 hover:bg-purple-800/80 text-purple-200 hover:text-white transition-all text-[11px] font-semibold border border-purple-700/30">
                    👩‍🏫 Teacher
                </button>
            </div>
            
            <a href="https://wa.me/{{ $school['whatsapp'] ?? '919876543210' }}?text=Hello%20Excel%20Public%20School%2C%20I%20would%20like%20to%20know%20more%20about%20admissions." target="_blank" rel="noopener" class="hidden sm:inline-flex items-center gap-1.5 text-emerald-400 hover:text-emerald-300 font-semibold text-xs transition-colors">
                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
                <span>WhatsApp</span>
            </a>
            
            <a href="{{ url('/schoolAdmin') }}" class="inline-flex items-center gap-1.5 bg-gradient-to-r from-purple-600 to-violet-600 hover:from-purple-500 hover:to-violet-500 text-white font-bold px-3 py-1 rounded-lg text-xs transition-all shadow-sm shadow-purple-900/40 ring-1 ring-purple-400/30">
                <svg class="w-3 h-3 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                <span>ERP Admin Login</span>
            </a>
        </div>
    </div>
</div>

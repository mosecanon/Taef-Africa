<?php
/**
 * Homepage View
 * The African Executive Feature Summit 2027
 * Clean Corporate Executive Layout
 * Hero Stage Image Only + Professional Architecture Below
 */

// Active section tracking for quick-jump rail
$activeSection = 'hero-stage-section';
?>
<!-- Floating Quick-Jump Section Rail (Desktop Navigation Dock) -->
<nav class="quick-jump-rail hidden" aria-label="Executive Section Quick Rail">
    <div class="rail-dot active" data-target="hero-stage-section">
        <span class="rail-tooltip">01 // Plenary Hero Stage</span>
    </div>
    <div class="rail-dot" data-target="summit-statement-section">
        <span class="rail-tooltip">02 // Executive Statement</span>
    </div>
    <div class="rail-dot" data-target="chief-guest-section">
        <span class="rail-tooltip">03 // Chief Guest & Registration</span>
    </div>
    <div class="rail-dot" data-target="introduction-section">
        <span class="rail-tooltip">04 // Continent of Possibilities</span>
    </div>
    <div class="rail-dot" data-target="why-summit-section">
        <span class="rail-tooltip">05 // Strategic Purpose</span>
    </div>
    <div class="rail-dot" data-target="tracks-preview-section">
        <span class="rail-tooltip">06 // 6 Thematic Tracks</span>
    </div>
    <div class="rail-dot" data-target="speakers-spotlight-section">
        <span class="rail-tooltip">07 // Keynote Faculty</span>
    </div>
    <div class="rail-dot" data-target="cta-section">
        <span class="rail-tooltip">08 // Executive Pass</span>
    </div>
</nav>

<!-- =========================================================================
     01. HERO SECTION: The Stage Image Only
     The first thing visitors see upon landing on the summit website
     ========================================================================= -->
<section id="hero-stage-section" class="relative w-full bg-[#050906] pt-6 md:pt-12 pb-12 px-4 md:px-8 overflow-hidden">
    <div class="max-w-7xl mx-auto relative">
        <div class="relative w-full aspect-[16/9] sm:aspect-[21/10] max-h-[82vh] sm:max-h-[90vh] rounded-3xl overflow-hidden bg-black shadow-lg shadow-black/80 select-none">

            <!-- Pure, Clean Stage Visual (NO decorative overlays, buttons, or pins) -->
            <img id="stage-main-visual"
                 src="<?= url('/assets/images/summit-main-stage.jpg?v=' . time()) ?>"
                 alt="The African Executive Feature Summit 2027 Plenary Stage - JW Marriott Hotel, Nairobi, Kenya"
                 class="w-full h-full object-cover object-center transition-all duration-700 ease-out group-hover:scale-[1.01]">

        </div>
    </div>
</section>

<!-- =========================================================================
     01B. EXECUTIVE SUMMIT STATEMENT & REGISTRATION HUB
     Clean, professional replacement for the decorative drift-form-01 section
     ========================================================================= -->
<section id="summit-statement-section" class="relative py-14 lg:py-20 bg-[#050906] border-b border-emerald-950/60 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 md:px-8 w-full relative z-10 space-y-10">

        <!-- Subtle accent bar -->
        <div class="h-1 bg-lime-accent/15 w-full max-w-2xl mx-auto mb-8"></div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

            <!-- Left Column: Tag, Headline, Narrative & CTA (7 cols) -->
            <div class="lg:col-span-7 space-y-6 text-left">

                <!-- Status Tag -->
                <div class="inline-flex items-center gap-2.5 font-mono text-xs text-lime-400 uppercase tracking-widest">
                    <span class="w-2 h-2 rounded-full bg-lime-400 animate-ping"></span>
                    <span>MARCH 24–26, 2027 — JW MARRIOTT HOTEL // NAIROBI, KENYA</span>
                </div>

                <!-- Giant Headline - Fixed typography with better spacing and line height -->
                <div class="space-y-3">
                    <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-display font-black tracking-tight text-white leading-[1.05] uppercase">
                        <span class="block">SHAPING</span>
                        <span class="block bg-gradient-to-r from-white via-lime-accent to-gold bg-clip-text text-transparent">
                            AFRICA'S FUTURE.
                        </span>
                    </h1>
                </div>

                <!-- Understated Narrative -->
                <div class="text-slate-300 text-sm md:text-base font-light leading-relaxed max-w-2xl space-y-3">
                    <p class="text-white font-medium text-base md:text-lg">A meeting point for Africa's most transformative leaders.</p>
                    <p class="text-slate-400 text-sm md:text-base">
                        Creating a space for shared ideas, meaningful connections, and collective conversations towards shaping Africa's economic advancement. Convening visionary founders, C-Suite executives, corporate brands, and policymakers in the grand plenary hall.
                    </p>
                </div>

                <!-- Dual Action Controls -->
                <div class="pt-4 flex flex-wrap items-center gap-4">
                    <!-- Primary CTA Button -->
                    <a href="<?= url('/register') ?>" class="lime-glow-btn px-8 py-4 rounded-full text-xs font-extrabold tracking-wider uppercase inline-flex items-center gap-2">
                        <span>Register Your Interest</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>

                    <!-- Secondary Button -->
                    <a href="#chief-guest-section" class="secondary-btn px-8 py-4 rounded-full border border-lime-accent/30 text-lime-300 hover:text-white hover:border-lime-accent font-semibold text-xs tracking-wider uppercase transition-all inline-flex items-center gap-2">
                        <i data-lucide="briefcase" class="w-4 h-4"></i>
                        <span>Explore Plenary Programme</span>
                    </a>
                </div>

            </div>

            <!-- Right Column: Sovereign Metrics (5 cols) - Enhanced with better typography -->
            <div class="lg:col-span-5 space-y-4">

                <div class="drift-box p-6 md:p-8 rounded-2xl border border-emerald-500/20 bg-emerald-950/50">

                    <div class="flex items-center justify-between mb-6">
                        <span class="text-lime-400 font-bold uppercase tracking-wider text-xs">PLENARY TELEMETRY</span>
                        <span class="text-gold font-bold text-sm">JW MARRIOTT NAIROBI</span>
                    </div>

                    <div class="space-y-5">

                        <!-- Metric 1 -->
                        <div class="group relative">
                            <div class="text-4xl sm:text-5xl md:text-6xl font-display font-black text-white leading-[1.1] tracking-tight group-hover:text-lime-accent transition-colors duration-300">500+</div>
                            <div class="mt-2 text-xs text-slate-400 uppercase tracking-wider font-medium">C-Suite & Sovereign Leaders</div>
                        </div>

                        <div class="border-t border-emerald-950/80"></div>

                        <!-- Metric 2 -->
                        <div class="group relative">
                            <div class="text-4xl sm:text-5xl md:text-6xl font-display font-black text-lime-400 leading-[1.1] tracking-tight group-hover:text-lime-300 transition-colors duration-300">54</div>
                            <div class="mt-2 text-xs text-slate-400 uppercase tracking-wider font-medium">African Markets Convening</div>
                        </div>

                        <div class="border-t border-emerald-950/80"></div>

                        <!-- Metric 3 -->
                        <div class="group relative">
                            <div class="text-4xl sm:text-5xl md:text-6xl font-display font-black text-gold leading-[1.1] tracking-tight group-hover:text-yellow-300 transition-colors duration-300">$3.4T</div>
                            <div class="mt-2 text-xs text-slate-400 uppercase tracking-wider font-medium">AfCFTA Combined Market Potential</div>
                        </div>

                    </div>

                    <!-- Animated indicator line -->
                    <div class="mt-6 h-1 bg-gradient-to-r from-transparent via-lime-accent/30 to-transparent rounded-full"></div>

                </div>

            </div>

        </div>

        <!-- Viewport Anchored Status Bar -->
        <div class="pt-8 border-t border-emerald-950/80 flex flex-col md:flex-row items-center justify-between gap-6 text-xs font-mono text-slate-400">
            <!-- Steps Indicator -->
            <div class="flex flex-wrap items-center gap-4 md:gap-6 w-full md:w-auto">
                <span class="text-white font-bold tracking-wider">
                    <span class="text-lime-400">01</span> THE PLENARY
                </span>
                <a href="#chief-guest-section" class="hover:text-lime-accent transition-colors whitespace-nowrap">
                    <span class="text-slate-500">02</span> CHIEF GUEST
                </a>
                <a href="#introduction-section" class="hover:text-lime-accent transition-colors whitespace-nowrap">
                    <span class="text-slate-500">03</span> CONTINENT OF POSSIBILITIES
                </a>
                <a href="#tracks-preview-section" class="hover:text-lime-accent transition-colors whitespace-nowrap">
                    <span class="text-slate-500">04</span> 6 TRACKS
                </a>
            </div>

            <!-- Center Scroll Indicator -->
            <a href="#chief-guest-section" class="hidden md:flex items-center gap-2 text-lime-400 hover:text-lime-accent transition-colors mx-auto md:mx-0">
                <span class="tracking-widest">SCROLL TO EXPLORE</span>
                <i data-lucide="arrow-down" class="w-3.5 h-3.5"></i>
            </a>

            <!-- Sovereign Metric Tags -->
            <div class="text-slate-400 text-center md:text-right w-full md:w-auto">
                <span class="text-white font-bold">54 AFRICAN MARKETS</span> <span class="mx-2 hidden md:inline">•</span> <span class="text-gold font-bold">$3.4T AfCFTA</span>
            </div>
        </div>

    </div>
</section>

<!-- =========================================================================
     02. CONFIRMED CHIEF GUEST & PRIORITY REGISTRATION NOTIFICATION
     ========================================================================= -->
<section id="chief-guest-section" class="py-16 lg:py-24 relative bg-obsidian border-b border-emerald-950/60 overflow-hidden">
    <!-- Atmospheric Ambient Blooms - Deep emerald on the left to maximize and illuminate the left space -->
    <div class="absolute -left-28 top-1/4 w-[600px] h-[600px] bg-emerald-500/10 blur-[150px] pointer-events-none rounded-full"></div>
    <div class="absolute left-10 top-2/3 w-[450px] h-[450px] bg-lime-400/5 blur-[130px] pointer-events-none rounded-full"></div>
    <div class="absolute right-0 top-1/3 w-[500px] h-[500px] bg-emerald-900/10 blur-[160px] pointer-events-none rounded-full"></div>
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_50%_0%,_rgba(163,230,53,0.06)_0%,_transparent_65%)] pointer-events-none"></div>

    <!-- Wide Canvas Container (Expands outward to 1600px to fully utilize the left & right screen margins) -->
    <div class="max-w-[1600px] w-full mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 relative z-10 space-y-10 lg:space-y-12">

        <!-- Section Header: Elegant Editorial Layout with Diplomatic Indicator -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-6 border-b border-emerald-950/80">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2.5 font-mono text-xs text-lime-400 uppercase tracking-widest">
                    <span class="w-2 h-2 rounded-full bg-lime-400 animate-ping"></span>
                    <span>02 // OFFICIAL GUEST OF HONOUR & KEYNOTE CONFIRMATION</span>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-black text-white tracking-tight leading-tight">
                    H.E. HON. ADEN DUALE
                    <span class="block text-gold font-light text-xl sm:text-2xl md:text-3xl mt-1">
                        Cabinet Secretary for Health, Republic of Kenya
                    </span>
                </h2>
            </div>
            <div class="md:text-right font-mono text-xs text-slate-400 space-y-1 shrink-0">
                <div class="text-white font-bold tracking-wide">SUMMIT OPENING PLENARY ADDRESS</div>
                <div class="text-lime-400/90 flex md:justify-end items-center gap-1.5">
                    <i data-lucide="calendar" class="w-3.5 h-3.5 text-lime-400"></i>
                    <span>MARCH 24, 2027 • 09:30 AM EAT</span>
                </div>
                <div class="text-slate-500">GRAND BALLROOM PLENARY // JW MARRIOTT NAIROBI</div>
            </div>
        </div>

        <!-- Main Content Grid: Expanded 12-Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-stretch">

            <!-- Chief Guest Portrait & Comprehensive Dossier (7 cols on lg, 8 cols on xl) -->
            <div class="lg:col-span-7 xl:col-span-8 space-y-6">

                <!-- Master Dossier Card -->
                <div class="drift-box rounded-3xl bg-emerald-950/40 border border-emerald-500/25 overflow-hidden shadow-2xl shadow-black/80 hover:border-lime-accent/30 transition-all duration-300">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 lg:gap-8 xl:gap-10 p-6 sm:p-8 xl:p-10 items-center">

                        <!-- Left Column: 100% Complete, High-Definition Chief Guest Poster (5 cols on md/lg) -->
                        <div class="md:col-span-5 flex flex-col items-center justify-center">
                            <div class="group relative w-full max-w-[420px] rounded-2xl overflow-hidden bg-black select-none transition-all duration-500 ease-out hover:scale-[1.015] border border-lime-accent/25 shadow-[0_10px_40px_rgba(0,0,0,0.8),0_0_30px_rgba(163,230,53,0.06)] aspect-[717/1024]">
                                
                                <!-- Full Uncropped Poster Image (Exact 717x1024 poster ratio - No cropped edges) -->
                                <img src="<?= url('/assets/images/chief-guest-aden-duale.jpg?v=' . time()) ?>"
                                     alt="Hon. Aden Duale - Cabinet Secretary for Health, Kenya - Confirmed Chief Guest AEFS 2027"
                                     class="w-full h-full object-contain object-center block"
                                     loading="eager">

                                <!-- Specular Glass Reflection Sheen -->
                                <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-white/10 pointer-events-none opacity-40 group-hover:opacity-70 transition-opacity"></div>
                                <div class="absolute inset-0 border border-white/10 rounded-2xl pointer-events-none"></div>

                                <!-- Floating State Dignitary Badge on Poster -->
                                <div class="absolute top-3 left-3 pointer-events-none">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-black/85 backdrop-blur-md border border-white/15 text-[10px] font-mono font-bold text-white uppercase tracking-wider shadow-lg">
                                        <span class="w-1.5 h-1.5 rounded-full bg-lime-400 animate-pulse"></span>
                                        🇰🇪 STATE GUEST
                                    </span>
                                </div>
                            </div>

                            <!-- Poster Caption & Live Status Indicator under image -->
                            <div class="mt-3 w-full flex items-center justify-between text-[11px] font-mono text-slate-400 px-1">
                                <span class="text-lime-400/90 flex items-center gap-1">
                                    <i data-lucide="check-circle" class="w-3 h-3 text-lime-400"></i>
                                    Official Protocol Verified
                                </span>
                                <span class="text-slate-500">AEFS 2027</span>
                            </div>
                        </div>

                        <!-- Right Column: Dignitary Credentials, Plenary Statement & Action Controls (7 cols on md/lg) -->
                        <div class="md:col-span-7 space-y-5 flex flex-col justify-center">

                            <!-- Badges Row -->
                            <div class="flex flex-wrap items-center gap-2.5">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-lime-accent/15 border border-lime-accent/35 text-lime-300 font-mono text-xs uppercase tracking-widest font-semibold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-lime-400 animate-ping"></span>
                                    Plenary Opening Keynote 2027
                                </span>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-950/70 border border-emerald-500/35 text-lime-400 font-mono text-xs uppercase tracking-wider">
                                    <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
                                    Keynote Confirmed
                                </span>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-black/60 border border-white/10 text-slate-300 font-mono text-xs uppercase tracking-wider">
                                    <i data-lucide="map-pin" class="w-3.5 h-3.5 text-gold"></i>
                                    Grand Ballroom Plenary
                                </span>
                            </div>

                            <!-- Dignitary Identity & Ministry Portfolio -->
                            <div class="space-y-1">
                                <div class="text-xs font-mono text-gold uppercase tracking-widest font-bold flex items-center gap-2">
                                    <span>Republic of Kenya</span>
                                    <span class="text-slate-600">//</span>
                                    <span>Ministry of Health</span>
                                </div>
                                <h3 class="text-2xl sm:text-3xl xl:text-4xl font-display font-black text-white tracking-tight leading-tight">
                                    HON. ADEN DUALE
                                </h3>
                                <p class="text-sm font-mono text-lime-400 font-bold tracking-wide">
                                    Cabinet Secretary, Health
                                </p>
                            </div>

                            <!-- Opening Plenary Address Spotlight Box -->
                            <div class="p-4 sm:p-5 rounded-2xl bg-black/60 border border-emerald-900/60 text-slate-300 space-y-2 shadow-inner relative overflow-hidden">
                                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-lime-accent/5 rounded-full blur-xl pointer-events-none"></div>
                                <span class="text-[11px] font-mono text-gold uppercase tracking-wider font-bold block flex items-center gap-1.5">
                                    <i data-lucide="mic" class="w-3.5 h-3.5 text-gold"></i>
                                    Summit Opening Plenary Address:
                                </span>
                                <p class="font-medium text-slate-100 text-sm sm:text-base leading-snug">
                                    "Shaping Africa's Healthcare Sovereignty: Biomanufacturing, Pharma Security & Cross-Border Health Systems"
                                </p>
                            </div>

                            <!-- Dignitary Bio & Mandate Narrative -->
                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-light">
                                Leading Kenya's universal healthcare transition and spearheading continental dialogues on sovereign pharmaceutical manufacturing, digital health infrastructure, and health capital investment across Africa.
                            </p>

                            <!-- Three Continental Health Transformation Pillars -->
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5 pt-1">
                                <div class="p-2.5 rounded-xl bg-black/40 border border-emerald-950/70 text-left">
                                    <span class="text-[10px] font-mono text-lime-400 block font-bold uppercase tracking-wider">Pillar 01</span>
                                    <span class="text-xs text-slate-200 font-medium leading-tight block mt-0.5">Sovereign Biomanufacturing</span>
                                </div>
                                <div class="p-2.5 rounded-xl bg-black/40 border border-emerald-950/70 text-left">
                                    <span class="text-[10px] font-mono text-gold block font-bold uppercase tracking-wider">Pillar 02</span>
                                    <span class="text-xs text-slate-200 font-medium leading-tight block mt-0.5">Cross-Border Health Security</span>
                                </div>
                                <div class="p-2.5 rounded-xl bg-black/40 border border-emerald-950/70 text-left">
                                    <span class="text-[10px] font-mono text-lime-400 block font-bold uppercase tracking-wider">Pillar 03</span>
                                    <span class="text-xs text-slate-200 font-medium leading-tight block mt-0.5">Universal Healthcare Capital</span>
                                </div>
                            </div>

                            <!-- Executive Action Controls -->
                            <div class="pt-3 flex flex-wrap items-center gap-3">
                                <button type="button" id="chief-guest-calendar-btn" class="lime-glow-btn px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider inline-flex items-center gap-2 cursor-pointer transition-transform hover:scale-[1.02]">
                                    <i data-lucide="calendar-plus" class="w-4 h-4"></i>
                                    <span>Add Plenary To Calendar</span>
                                </button>
                                <a href="<?= url('/speakers') ?>" class="px-5 py-2.5 rounded-xl bg-black/60 border border-white/15 text-slate-200 hover:text-white hover:bg-white/5 hover:border-lime-accent/40 transition-all text-xs font-mono uppercase tracking-wider inline-flex items-center gap-2">
                                    <i data-lucide="users" class="w-4 h-4 text-lime-400"></i>
                                    <span>View Keynote Faculty</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Companion Card: Day 1 Opening Plenary Architecture & High-Level Roundtable Programme -->
                <div class="drift-box rounded-3xl bg-emerald-950/40 border border-emerald-500/25 p-6 sm:p-8 overflow-hidden shadow-2xl shadow-black/80 hover:border-lime-accent/30 transition-all duration-300 relative">
                    <!-- Subtle ambient corner glow -->
                    <div class="absolute -right-12 -bottom-12 w-48 h-48 bg-lime-accent/5 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="space-y-6">
                        <!-- Card Header -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-emerald-950/80">
                            <div>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-lime-accent/15 border border-lime-accent/30 text-lime-300 font-mono text-[10px] uppercase font-bold tracking-widest">
                                    <span class="w-1.5 h-1.5 rounded-full bg-lime-400 animate-ping"></span>
                                    DAY 1 PLENARY SESSION ARCHITECTURE • MARCH 24, 2027
                                </span>
                                <h4 class="text-lg sm:text-xl font-display font-black text-white mt-2">
                                    Ministerial Keynote & Sovereign Dialogue Programme
                                </h4>
                            </div>
                            <span class="text-xs font-mono text-gold flex items-center gap-1.5 font-semibold shrink-0">
                                <i data-lucide="map-pin" class="w-3.5 h-3.5 text-gold"></i>
                                Grand Ballroom, JW Marriott Nairobi
                            </span>
                        </div>

                        <!-- 3-Stage Plenary Flow -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Stage 1 -->
                            <div class="p-4 rounded-2xl bg-black/50 border border-emerald-950/70 hover:border-emerald-500/30 transition-all space-y-2 relative">
                                <div class="flex items-center justify-between text-xs font-mono">
                                    <span class="text-lime-400 font-bold">09:30 – 10:15 EAT</span>
                                    <span class="px-2 py-0.5 rounded bg-lime-accent/10 text-lime-300 text-[10px] font-bold">KEYNOTE</span>
                                </div>
                                <h5 class="text-sm font-bold text-white leading-snug">
                                    Opening Ministerial Plenary Address
                                </h5>
                                <p class="text-[11px] text-slate-400 leading-relaxed font-light">
                                    Delivered by <strong class="text-slate-200">Hon. Aden Duale</strong>. Setting the continental agenda on biomanufacturing, pharma supply chains, and sovereign digital health corridors.
                                </p>
                            </div>

                            <!-- Stage 2 -->
                            <div class="p-4 rounded-2xl bg-black/50 border border-emerald-950/70 hover:border-emerald-500/30 transition-all space-y-2 relative">
                                <div class="flex items-center justify-between text-xs font-mono">
                                    <span class="text-gold font-bold">10:15 – 11:30 EAT</span>
                                    <span class="px-2 py-0.5 rounded bg-gold/10 text-gold text-[10px] font-bold">ROUNDTABLE</span>
                                </div>
                                <h5 class="text-sm font-bold text-white leading-snug">
                                    Sovereign Leaders & DFI Capital Panel
                                </h5>
                                <p class="text-[11px] text-slate-400 leading-relaxed font-light">
                                    Convening Ministers, sovereign wealth leaders, and DFI executives to structure catalytic funding for domestic drug and vaccine manufacturing.
                                </p>
                            </div>

                            <!-- Stage 3 -->
                            <div class="p-4 rounded-2xl bg-black/50 border border-emerald-950/70 hover:border-emerald-500/30 transition-all space-y-2 relative">
                                <div class="flex items-center justify-between text-xs font-mono">
                                    <span class="text-lime-400 font-bold">11:30 – 12:30 EAT</span>
                                    <span class="px-2 py-0.5 rounded bg-emerald-950 text-slate-300 text-[10px] font-bold">BILATERALS</span>
                                </div>
                                <h5 class="text-sm font-bold text-white leading-snug">
                                    Deal Room Accords & Cross-Border MOUs
                                </h5>
                                <p class="text-[11px] text-slate-400 leading-relaxed font-light">
                                    Closed-door diplomatic sessions for private-public partnerships, cross-border health infrastructure treaties, and investment accords.
                                </p>
                            </div>
                        </div>

                        <!-- Telemetry Stats & Diplomatic Action Strip -->
                        <div class="p-3.5 rounded-xl bg-black/60 border border-emerald-500/20 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs font-mono">
                            <div class="flex flex-wrap items-center gap-4 text-slate-300">
                                <span class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-lime-400"></span>
                                    <strong class="text-white">54</strong> African Delegations
                                </span>
                                <span class="text-emerald-800">•</span>
                                <span class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gold"></span>
                                    <strong class="text-white">$500M+</strong> Health Facility Pipeline
                                </span>
                                <span class="text-emerald-800">•</span>
                                <span class="flex items-center gap-1.5">
                                    <i data-lucide="shield-check" class="w-3.5 h-3.5 text-lime-400"></i>
                                    VVIP Protocol Suite
                                </span>
                            </div>
                            <a href="<?= url('/about') ?>" class="text-lime-400 hover:text-lime-300 uppercase tracking-wider font-bold inline-flex items-center gap-1 text-[11px] whitespace-nowrap">
                                <span>Explore Full 3-Day Summit Agenda</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Delegate Registration Card (5 cols on lg, 4 cols on xl) - Full height sticky -->
            <div class="lg:col-span-5 xl:col-span-4 flex">
                <div class="drift-box w-full rounded-3xl bg-emerald-950/40 border border-lime-accent/30 overflow-hidden flex flex-col h-full sticky top-24 shadow-2xl shadow-black/80">

                    <!-- Header Badge -->
                    <div class="p-4 md:p-6 border-b border-emerald-950/60">
                        <div class="flex items-center justify-between text-xs font-mono mb-4">
                            <span class="text-lime-400 font-bold uppercase tracking-wider flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-lime-400 shadow-[0_0_8px_#b4f233] animate-pulse"></span>
                                PRIORITY WAITLIST OPEN
                            </span>
                            <span class="text-gold font-mono text-xs font-bold">500-Seat Plenary</span>
                        </div>

                        <!-- Poster Image - Full width, high visibility (Exact 819x1024 poster ratio) -->
                        <div class="relative w-full rounded-2xl overflow-hidden bg-black select-none transition-transform duration-500 ease-out hover:scale-[1.01] border border-white/10 aspect-[819/1024]">
                            <img src="<?= url('/assets/images/delegate-open-soon-hd.jpg?v=' . time()) ?>"
                                 alt="Delegate Registration Opening Soon - The African Executive Feature Summit 2027"
                                 class="w-full h-full object-cover object-center block"
                                 loading="eager">
                        </div>
                    </div>

                    <!-- Waitlist Form Section -->
                    <div class="p-4 md:p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div class="space-y-4">
                            <div class="p-3.5 rounded-xl bg-black/50 border border-emerald-500/20">
                                <p class="text-xs font-mono text-lime-300 uppercase tracking-wider font-bold mb-1.5 flex items-center gap-1.5">
                                    <i data-lucide="bell" class="w-3.5 h-3.5 text-lime-400"></i>
                                    Guaranteed First Notice
                                </p>
                                <p class="text-xs text-slate-300 leading-relaxed font-light">
                                    Join the priority waitlist for guaranteed first notice before public delegate registration opens. Limited to 500 executive seats.
                                </p>
                            </div>

                            <form id="waitlist-quick-form" class="space-y-3">
                                <div id="waitlist-msg" class="hidden p-2.5 rounded-lg text-xs font-mono"></div>

                                <div>
                                    <input type="text" id="waitlist-name" name="full_name" required placeholder="Full Name"
                                           class="w-full px-4 py-3 rounded-lg bg-black/80 border border-emerald-500/40 text-white font-mono text-xs focus:border-lime-accent focus:outline-none focus:ring-2 focus:ring-lime-accent/20 transition-all">
                                </div>

                                <div>
                                    <input type="email" id="waitlist-email" name="email" required placeholder="Corporate Email"
                                           class="w-full px-4 py-3 rounded-lg bg-black/80 border border-emerald-500/40 text-white font-mono text-xs focus:border-lime-accent focus:outline-none focus:ring-2 focus:ring-lime-accent/20 transition-all">
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                                    <div>
                                        <input type="text" id="waitlist-title" name="job_title" required placeholder="Executive Title"
                                               class="w-full px-4 py-3 rounded-lg bg-black/80 border border-emerald-500/40 text-white font-mono text-xs focus:border-lime-accent focus:outline-none focus:ring-2 focus:ring-lime-accent/20 transition-all">
                                    </div>
                                    <div>
                                        <input type="text" id="waitlist-company" name="company" required placeholder="Organisation"
                                               class="w-full px-4 py-3 rounded-lg bg-black/80 border border-emerald-500/40 text-white font-mono text-xs focus:border-lime-accent focus:outline-none focus:ring-2 focus:ring-lime-accent/20 transition-all">
                                    </div>
                                </div>

                                <div>
                                    <input type="text" id="waitlist-country" name="country" required placeholder="Country"
                                           class="w-full px-4 py-3 rounded-lg bg-black/80 border border-emerald-500/40 text-white font-mono text-xs focus:border-lime-accent focus:outline-none focus:ring-2 focus:ring-lime-accent/20 transition-all">
                                </div>

                                <button type="submit" class="lime-glow-btn w-full px-4 py-3 rounded-lg text-xs font-bold uppercase tracking-wider inline-flex items-center justify-center gap-2 cursor-pointer">
                                    <span>Notify Me</span>
                                    <i data-lucide="bell" class="w-4 h-4"></i>
                                </button>
                            </form>

                            <!-- Trust indicators -->
                            <div class="pt-3 border-t border-emerald-950/40 space-y-2.5">
                                <div class="flex items-center gap-2.5 text-xs text-slate-400">
                                    <i data-lucide="shield-check" class="w-4 h-4 text-lime-400 shrink-0"></i>
                                    <span>Secure & confidential — corporate emails only</span>
                                </div>
                                <div class="flex items-center gap-2.5 text-xs text-slate-400">
                                    <i data-lucide="clock" class="w-4 h-4 text-gold shrink-0"></i>
                                    <span>Early-bird pricing locked for waitlist members</span>
                                </div>
                                <div class="flex items-center gap-2.5 text-xs text-slate-400">
                                    <i data-lucide="star" class="w-4 h-4 text-gold shrink-0"></i>
                                    <span>Priority access to VIP networking lounges</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     03. INTRODUCTION: A Continent of Possibilities
     ========================================================================= -->
<section id="introduction-section" class="py-14 lg:py-20 relative bg-[#060c08] border-b border-emerald-950/60 overflow-hidden">
    <!-- Subtle Background Ambient Glow -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_50%,_rgba(163,230,53,0.1)_0%,_transparent_60%)] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 md:px-8 relative z-10">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

            <!-- Left Narrative (5 cols) -->
            <div class="lg:col-span-5 space-y-5 text-left">
                <span class="text-xs font-mono text-lime-400 tracking-widest uppercase block font-semibold">
                    03 // Continental Trajectory & Vision
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-black text-white leading-tight">
                    A CONTINENT OF POSSIBILITIES.
                    <span class="text-gold  font-light">A FUTURE WORTH SHAPING.</span>
                </h2>
                <div class="w-16 h-1 bg-lime-accent"></div>

                <div class="space-y-4 text-slate-300 text-sm md:text-base font-light leading-relaxed">
                    <p>
                        Africa is home to extraordinary talent, ambitious entrepreneurs, innovative businesses, and leaders redefining industries. As the continent continues to evolve at unprecedented speed, the need for meaningful conversations, stronger relationships, and collaborative cross-border opportunities becomes increasingly important.
                    </p>
                    <p class="text-slate-400 text-xs md:text-sm">
                        The African Executive Feature Summit 2027 is envisioned as a platform that brings these voices together: a meeting point for business leaders, founders, corporate executives, institutions, and emerging innovators to exchange ideas, share experiences, and explore opportunities that contribute to Africa's business and economic advancement.
                    </p>
                    <div class="p-3.5 rounded-xl bg-emerald-950/40 border border-emerald-500/20 text-xs font-mono text-lime-300 flex items-center gap-3">
                        <i data-lucide="compass" class="w-4 h-4 text-gold shrink-0"></i>
                        <span>We believe that shaping Africa's future requires collective thinking, shared responsibility, and meaningful participation.</span>
                    </div>
                </div>
            </div>

            <!-- Right Visual: Large, High-Visibility Image (7 cols, Full-Bleed Height, Zero Decorative Overlays) -->
            <div class="lg:col-span-7 flex flex-col justify-center">
                <div class="relative w-full h-[400px] sm:h-[480px] lg:h-[520px] rounded-3xl md:rounded-4xl overflow-hidden bg-black shadow-lg select-none">
                    <!-- High-Definition, Brightened, Visible Image with Zero Overlays -->
                    <img src="<?= url('/assets/images/summit-connectivity-hd.jpg?v=' . time()) ?>"
                         alt="Africa's Global Connectivity & Trade Corridors"
                         class="w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-[1.02]"
                         style="filter: brightness(1.15) contrast(1.1); display: block;">

                    <!-- Clean Technical Sub-Caption Below Image Frame -->
                    <div class="pt-3 px-4 flex flex-wrap items-center justify-between gap-2 text-xs font-mono text-slate-400">
                        <span class="text-lime-400 font-bold uppercase tracking-wider flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-lime-400 shadow-[0_0_8px_#a3e635] animate-pulse"></span>
                            PAN-AFRICAN CONNECTIVITY // AVATION & MARITIME CORRIDORS
                        </span>
                        <span class="text-gold font-bold tracking-wider">AfCFTA $3.4T SINGLE MARKET</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- =========================================================================
     04. WHY THE SUMMIT: More Than Just a Conversation
     ========================================================================= -->
<section id="why-summit-section" class="py-14 lg:py-20 relative bg-obsidian overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 md:px-8 space-y-12">

        <div class="max-w-3xl space-y-4">
            <span class="text-xs font-mono text-gold tracking-widest uppercase block font-semibold">
                04 // Purpose & Strategic Imperative
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-black text-white leading-tight">
                WHY THE SUMMIT?
            </h2>
            <p class="text-lg md:text-xl font-display  text-lime-accent">
                "Because Africa's future deserves more than just a conversation."
            </p>
            <p class="text-slate-400 text-xs md:text-sm leading-relaxed">
                The summit seeks to bridge industries, connect influential voices, and create opportunities for meaningful engagement. It is designed to encourage collaboration between established corporate organizations and emerging enterprises, while providing an executive platform for ideas and perspectives that can directly influence the continent's trajectory.
            </p>
        </div>

        <!-- 04B. WHAT TO EXPECT: The 5 Pillars (Clean Bento Grid) -->
        <div id="pillars-section" class="space-y-4 pt-4">
            <div class="flex items-center justify-between border-b border-emerald-950 pb-3">
                <h3 class="font-mono text-xs text-slate-400 uppercase tracking-widest font-bold">
                    What To Expect // 5 Strategic Experience Pillars
                </h3>
                <span class="text-xs font-mono text-lime-400">[C-SUITE IMPACT READY]</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                <!-- Pillar 1 -->
                <div class="drift-box p-5 rounded-2xl border border-emerald-500/20">
                    <div class="w-10 h-10 rounded-xl bg-emerald-950/80 border border-lime-accent/30 flex items-center justify-center text-lime-accent mb-4">
                        <i data-lucide="lightbulb" class="w-5 h-5"></i>
                    </div>
                    <h4 class="text-lg font-display font-bold text-white">
                        Thought Leadership
                    </h4>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        Insightful keynote addresses and high-stakes conversations with influential industry voices shaping policies, governance, and capital allocation across Africa.
                    </p>
                </div>

                <!-- Pillar 2 -->
                <div class="drift-box p-5 rounded-2xl border border-emerald-500/20">
                    <div class="w-10 h-10 rounded-xl bg-emerald-950/80 border border-lime-accent/30 flex items-center justify-center text-lime-accent mb-4">
                        <i data-lucide="messages-square" class="w-5 h-5"></i>
                    </div>
                    <h4 class="text-lg font-display font-bold text-white">
                        Business Conversations
                    </h4>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        Unvarnished discussions exploring enterprise leadership, scaling realities, frontier technology, investment climate, and economic expansion opportunities.
                    </p>
                </div>

                <!-- Pillar 3 -->
                <div class="drift-box p-5 rounded-2xl border border-emerald-500/20">
                    <div class="w-10 h-10 rounded-xl bg-emerald-950/80 border border-lime-accent/30 flex items-center justify-center text-lime-accent mb-4">
                        <i data-lucide="network" class="w-5 h-5"></i>
                    </div>
                    <h4 class="text-lg font-display font-bold text-white">
                        Strategic Networking
                    </h4>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        Curated, high-value interactions between founders, corporate executives, institutional brands, and sovereign leaders in dedicated VIP lounges.
                    </p>
                </div>

                <!-- Pillar 4 -->
                <div class="drift-box p-5 rounded-2xl border border-emerald-500/20">
                    <div class="w-10 h-10 rounded-xl bg-emerald-950/80 border border-lime-accent/30 flex items-center justify-center text-lime-accent mb-4">
                        <i data-lucide="handshake" class="w-5 h-5"></i>
                    </div>
                    <h4 class="text-lg font-display font-bold text-white">
                        Partnership Opportunities
                    </h4>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        A structured platform for organisations to establish institutional relationships, explore joint ventures, and sign cross-border collaboration agreements.
                    </p>
                </div>

                <!-- Pillar 5 -->
                <div class="drift-box md:col-span-2 lg:col-span-2 p-5 rounded-2xl border border-emerald-500/20">
                    <div class="w-10 h-10 rounded-xl bg-emerald-950/80 border border-lime-accent/30 flex items-center justify-center text-lime-accent mb-4">
                        <i data-lucide="sparkles" class="w-5 h-5"></i>
                    </div>
                    <h4 class="text-lg font-display font-bold text-white">
                        Brand Engagement & Global Visibility
                    </h4>
                    <p class="text-slate-400 text-xs leading-relaxed max-w-2xl">
                        Unmatched opportunities for participating corporate organisations and emerging enterprises to showcase their expertise, game-changing innovations, and sovereign economic contributions across international media broadcasts and executive feature showcases.
                    </p>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- =========================================================================
     05. THE 6 THEMATIC CONVERSATION TRACKS PREVIEW
     ========================================================================= -->
<section id="tracks-preview-section" class="py-14 lg:py-20 relative bg-[#040805] border-t border-b border-emerald-950/60">
    <div class="max-w-7xl mx-auto px-6 md:px-8">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
            <div class="space-y-2 max-w-2xl">
                <span class="text-xs font-mono text-lime-400 tracking-widest uppercase font-semibold">
                    05 // Strategic Thematic Matrix
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-display font-black text-white">
                    SUMMIT CONVERSATION AREAS
                </h2>
                <p class="text-slate-400 text-xs md:text-sm leading-relaxed">
                    Six structured pillars addressing key strategic opportunities across African commerce, governance, and frontier technology.
                </p>
            </div>
            <a href="<?= url('/about#tracks') ?>" class="inline-flex items-center gap-1.5 text-xs font-mono font-bold text-lime-accent hover:text-white uppercase tracking-wider py-2.5 px-4 rounded-full border border-lime-accent/30 hover:border-lime-accent transition-all shrink-0">
                <span>Explore Full 6-Track Dossier</span>
                <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($tracks as $track): ?>
                <div class="drift-box p-4 rounded-2xl border border-emerald-500/20">
                    <div class="flex items-center justify-between text-xs font-mono">
                        <span class="px-2 py-0.5 rounded bg-lime-accent/15 text-lime-300 font-bold border border-lime-accent/30 text-[10px]">
                            <?= htmlspecialchars($track['tag']) ?>
                        </span>
                        <span class="text-slate-500 text-[11px]"><?= htmlspecialchars($track['stats']) ?></span>
                    </div>
                    <h3 class="text-base font-display font-bold text-white mt-2 line-clamp-2">
                        <?= htmlspecialchars($track['title']) ?>
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed line-clamp-2 mt-1">
                        <?= htmlspecialchars($track['desc']) ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- =========================================================================
     06. CONFIRMED KEYNOTE SPEAKERS SPOTLIGHT
     ========================================================================= -->
<section id="speakers-spotlight-section" class="py-14 lg:py-20 relative bg-obsidian">
    <div class="max-w-7xl mx-auto px-6 md:px-8">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
            <div class="space-y-2 max-w-2xl">
                <span class="text-xs font-mono text-gold tracking-widest uppercase font-semibold">
                    06 // Plenary Faculty
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-display font-black text-white">
                    THE VOICES THAT MOVE IDEAS FORWARD
                </h2>
                <p class="text-slate-400 text-xs md:text-sm leading-relaxed">
                    Distinguished business leaders, founders, corporate executives, and influential industry minds committed to shaping Africa's economic sovereignty.
                </p>
            </div>
            <a href="<?= url('/speakers') ?>" class="inline-flex items-center gap-1.5 text-xs font-mono font-bold text-lime-accent hover:text-white uppercase tracking-wider py-2.5 px-4 rounded-full border border-lime-accent/30 hover:border-lime-accent transition-all shrink-0">
                <span>View All Speakers</span>
                <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php foreach ($speakers as $spk): ?>
                <div class="group drift-box p-4 rounded-2xl border border-emerald-500/20 hover:border-lime-accent/40 transition-all duration-300 flex flex-col justify-between">
                    <div class="aspect-[4/4.5] w-full relative overflow-hidden rounded-xl bg-emerald-950">
                        <img src="<?= htmlspecialchars($spk['photo_url']) ?>" alt="<?= htmlspecialchars($spk['full_name']) ?>" class="w-full h-full object-cover object-top group-hover:scale-105 transition-all duration-500 filter grayscale group-hover:grayscale-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity duration-500"></div>
                        <div class="absolute bottom-2 left-2 right-2 flex items-center justify-between text-xs font-mono">
                            <span class="px-2 py-0.5 rounded bg-black/70 text-lime-300 border border-lime-accent/20 text-[10px]">
                                <?= htmlspecialchars($spk['country']) ?>
                            </span>
                            <?php if ($spk['is_keynote']): ?>
                                <span class="px-2 py-0.5 rounded bg-gold/20 text-gold border border-gold/30 font-bold uppercase text-[9px]">
                                    Keynote
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="p-3 space-y-1.5 flex-1 flex flex-col justify-between">
                        <div>
                            <h4 class="text-sm font-display font-bold text-white group-hover:text-lime-accent transition-colors duration-300">
                                <?= htmlspecialchars($spk['full_name']) ?>
                            </h4>
                            <p class="text-[11px] text-lime-400 font-mono"><?= htmlspecialchars($spk['designation']) ?></p>
                            <p class="text-[11px] text-slate-400 truncate"><?= htmlspecialchars($spk['organisation']) ?></p>
                        </div>
                        <p class="text-[10px] text-slate-500  border-t border-emerald-950 pt-1.5 line-clamp-2">
                            "<?= htmlspecialchars($spk['topic']) ?>"
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- =========================================================================
     07. CALL TO ACTION & DIGITAL VIP PASS PREVIEW
     ========================================================================= -->
<section id="cta-section" class="py-16 lg:py-24 relative bg-obsidian border-t border-emerald-950/40 overflow-hidden">

    <div class="max-w-7xl mx-auto px-6 md:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">

            <!-- Left CTA Column (7 cols) -->
            <div class="lg:col-span-7 space-y-6 text-left">
                <span class="inline-block px-3.5 py-1 rounded-full bg-lime-accent/15 border border-lime-accent/30 text-lime-400 font-mono text-xs uppercase tracking-widest">
                    Executive Accreditations Now Open // March 2027
                </span>

                <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-black text-white leading-tight">
                    BE PART OF THE CONVERSATION.
                    <span class="text-lime-accent ">BE PART OF THE FUTURE.</span>
                </h2>

                <p class="text-sm sm:text-base text-slate-300 font-light max-w-2xl leading-relaxed">
                    Whether you are a founder, executive, entrepreneur, corporate organisation or institution, your contribution matters. Join us as we create a continental platform for transformative ideas, connections and opportunities.
                </p>

                <div class="pt-3 flex flex-wrap items-center gap-3.5">
                    <a href="<?= url('/register') ?>" class="lime-glow-btn px-7 py-3.5 rounded-full text-xs font-extrabold tracking-wider uppercase inline-flex items-center gap-2">
                        <span>Register Your Interest</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="<?= url('/partnerships') ?>" class="px-7 py-3.5 rounded-full border border-emerald-500/30 text-white text-xs font-mono uppercase tracking-wider hover:bg-emerald-950/60 transition-all inline-flex items-center gap-2">
                        <i data-lucide="briefcase" class="w-4 h-4"></i>
                        <span>Explore Partnership Opportunities</span>
                    </a>
                </div>
            </div>

            <!-- Right: Simplified VIP Pass Preview (5 cols) -->
            <div class="lg:col-span-5 text-center">
                <div class="drift-box rounded-2xl bg-emerald-950/50 border border-lime-accent/30 p-6 md:p-8 max-w-sm mx-auto">
                    <span class="text-[10px] font-mono text-gold uppercase tracking-widest block font-bold">
                        Digital VIP Accreditation Pass
                    </span>
                    <?php include __DIR__ . '/../components/vip-pass-card.php'; ?>
                </div>
            </div>

        </div>

    </div>
</section>
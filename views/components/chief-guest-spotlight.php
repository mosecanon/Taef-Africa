<?php
/**
 * Confirmed Chief Guest Spotlight & Registration Open Soon Card
 * Clean Corporate Executive Design
 * The African Executive Feature Summit 2027
 */
?>
<div class="drift-box w-full rounded-3xl bg-emerald-950/50 border border-lime-accent/30 overflow-hidden">

    <!-- Chief Guest Portrait & Dossier -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-stretch">

        <!-- Chief Guest Portrait & Dossier (7 cols on lg, 8 cols on xl) -->
        <div class="lg:col-span-7 xl:col-span-8 space-y-6 flex flex-col justify-between">

            <div class="flex flex-wrap items-center gap-2">
                <span class="inline-block px-2.5 py-0.5 rounded bg-lime-accent/20 text-lime-300 font-mono text-xs uppercase tracking-widest">
                    <span class="w-1 h-1 rounded-full bg-lime-400 animate-ping"></span>
                    CONFIRMED CHIEF GUEST
                </span>
                <span class="px-2.5 py-0.5 rounded bg-emerald-950/80 border border-emerald-500/30 text-lime-400 font-mono text-xs uppercase">Plenary Keynote 2027</span>
                <span class="px-2.5 py-0.5 rounded bg-black/60 border border-white/10 text-slate-400 font-mono text-xs uppercase">JW Marriott Nairobi</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-12 gap-6 md:gap-8 items-center">
                <!-- Very Big, High-Definition Chief Guest Poster (No overlay, full poster ratio, maximum visibility) -->
                <div class="sm:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-[420px] sm:max-w-none rounded-2xl overflow-hidden bg-black select-none transition-transform duration-500 ease-out hover:scale-[1.02] aspect-[717/1024]">
                        <img src="<?= url('/assets/images/chief-guest-aden-duale.jpg?v=' . time()) ?>"
                             alt="Hon. Aden Duale - Cabinet Secretary for Health, Kenya - Confirmed Chief Guest AEFS 2027"
                             class="w-full h-full object-cover object-center block">
                    </div>
                </div>

                <!-- Dignitary Credentials & Plenary Address Details (7 cols) -->
                <div class="sm:col-span-7 space-y-4">
                    <div>
                        <span class="text-xs font-mono text-ochre-gold uppercase tracking-wider block font-bold">
                            Republic of Kenya // Ministry of Health
                        </span>
                        <h3 class="text-2xl sm:text-3xl lg:text-4xl font-display font-black text-white tracking-tight leading-tight">
                            HON. ADEN DUALE
                        </h3>
                        <p class="text-xs sm:text-sm font-mono text-lime-400 font-bold tracking-wide">
                            Cabinet Secretary, Health
                        </div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-black/60 border border-emerald-950 text-xs text-slate-300 space-y-1.5 shadow-inner">
                        <span class="text-[10px] font-mono text-ochre-gold uppercase font-bold tracking-wider block">Summit Opening Plenary Address:</span>
                        <p class="font-medium text-slate-100 text-xs sm:text-sm leading-snug">
                            "Shaping Africa's Healthcare Sovereignty: Biomanufacturing, Pharma Security & Cross-Border Health Systems"
                        </p>
                    </div>

                    <p class="text-xs text-slate-300 leading-relaxed font-light">
                        Leading Kenya's universal healthcare transition and spearheading continental dialogues on sovereign pharmaceutical manufacturing, digital health infrastructure, and health capital investment across Africa.
                    </p>

                    <div class="pt-2 flex flex-wrap items-center gap-2 text-[11px] font-mono text-slate-400">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-emerald-950/60 border border-emerald-500/20 text-lime-300">
                            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-lime-400"></i>
                            Keynote Confirmed
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-black/60 border border-white/10 text-slate-300">
                            <i data-lucide="map-pin" class="w-3.5 h-3.5 text-ochre-gold"></i>
                            Grand Ballroom Plenary
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delegate Registration Opening Soon Poster Card (5 cols on lg) -->
        <div class="lg:col-span-5 xl:col-span-4 flex flex-col justify-center relative">
            <div class="drift-box w-full rounded-2xl bg-emerald-950/50 border border-lime-accent/30 p-4 sm:p-5 overflow-hidden">

                <!-- Very Big, High-Definition Delegate Poster (Full vertical ratio, uncropped, maximum visibility) -->
                <div class="relative w-full rounded-xl overflow-hidden bg-black select-none transition-transform duration-500 ease-out hover:scale-[1.01] aspect-[819/1024]">
                    <img src="<?= url('/assets/images/delegate-open-soon-hd.jpg?v=' . time()) ?>"
                         alt="Delegate Registration Opening Soon - The African Executive Feature Summit 2027"
                         class="w-full h-full object-cover object-center block">
                </div>

                <!-- Instant Priority Waitlist Notification Form -->
                <div class="pt-2 border-t border-emerald-950 space-y-2">
                    <div class="flex items-center justify-between text-xs font-mono">
                        <span class="text-lime-400 font-bold uppercase tracking-wider flex items-center gap-1.5">
                            <span class="w-1 h-1 rounded-full bg-lime-400 shadow-[0_0_8px_#b4f233] animate-pulse"></span>
                            PRIORITY WAITLIST OPEN
                        </span>
                        <span class="text-ochre-gold font-mono text-[11px] font-bold">500-Seat Plenary</span>
                    </div>

                    <form id="waitlist-quick-form" class="space-y-2">
                        <div id="waitlist-msg" class="hidden p-2 rounded text-[10px] font-mono"></div>
                        <div class="flex items-center gap-2">
                            <input type="email"
                                   id="waitlist-email"
                                   name="email"
                                   required
                                   placeholder="Enter corporate email for alert..."
                                   class="flex-1 px-3 py-2 rounded-lg bg-black/80 border border-emerald-500/40 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                            <button type="submit" class="lime-glow-btn px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider inline-flex items-center gap-1.5">
                                <span>Notify Me</span>
                                <i data-lucide="bell" class="w-3.5 h-3.5"></i>
                            </button>
                        </div>
                        <span class="text-[10px] font-mono text-slate-400 block">
                            Guaranteed first notice before public delegate registration opens.
                        </span>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>
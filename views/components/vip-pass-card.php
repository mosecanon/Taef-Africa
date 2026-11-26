<?php
/**
 * 3D Holographic VIP Pass Card Component
 * Inspired by the official AEFS 2027 Delegate V.I.P artwork
 */
?>
<div class="relative w-full max-w-md mx-auto group">
    <!-- Ambient Behind Glow -->
    <div class="absolute -inset-2 bg-gradient-to-r from-lime-accent/30 via-emerald-600/20 to-ochre-gold/30 rounded-3xl blur-2xl opacity-60 group-hover:opacity-90 transition-opacity duration-500 -z-10 animate-pulse-slow"></div>

    <!-- The 3D Perspective Wrapper -->
    <div class="vip-pass-card w-full py-2">
        <div id="vip-card" class="vip-card-inner relative w-full aspect-[1/1.42] rounded-2xl overflow-hidden border border-lime-accent/30 bg-[#07130c] shadow-2xl shadow-black/80 flex flex-col justify-between p-6 cursor-grab active:cursor-grabbing select-none" style="background: linear-gradient(145deg, #09170f 0%, #040805 100%);">
            
            <!-- Dynamic Glare Overlay -->
            <div id="vip-card-glare" class="vip-glare"></div>

            <!-- Background Texture with faint Nairobi Runway visual -->
            <div class="absolute inset-0 opacity-20 pointer-events-none bg-cover bg-center" style="background-image: url('<?= url('/assets/images/summit-hero-bg.jpg') ?>');"></div>

            <!-- Top Header on Pass: Clean, zoomed-in official logo -->
            <div class="relative z-10 flex items-center justify-between">
                <img src="<?= url('/assets/images/summit-logo.png') ?>" alt="AEFS 2027 Emblem" class="h-9 md:h-10 w-auto object-contain filter drop-shadow">
                <div class="px-2.5 py-0.5 rounded-full bg-lime-accent/20 border border-lime-accent/40 text-lime-300 font-mono text-[10px] uppercase font-bold tracking-wider">
                    Accredited
                </div>
            </div>

            <!-- Central Profile Zone (Replicating Mbali Sebapu V.I.P Delegate Design) -->
            <div class="relative z-10 flex flex-col items-center text-center my-auto">
                <!-- Circular Avatar with Neon Ring -->
                <div class="relative w-28 h-28 md:w-32 md:h-32 rounded-full p-1 bg-gradient-to-b from-lime-accent via-emerald-500 to-transparent shadow-xl shadow-lime-accent/15 mb-2 group/avatar">
                    <div class="w-full h-full rounded-full overflow-hidden bg-emerald-950 border-2 border-black relative">
                        <img id="pass-avatar" src="<?= url('/assets/images/vip-delegate-poster.jpg') ?>" alt="Delegate Portrait" class="w-full h-full object-cover object-top scale-110">
                    </div>
                    <!-- Live Verified Pulse -->
                    <span class="absolute bottom-1 right-2 w-4 h-4 rounded-full bg-lime-accent border-2 border-black shadow flex items-center justify-center text-[9px] text-black font-bold" title="Accredited Executive">
                        ✓
                    </span>
                </div>

                <!-- Country Flag & Delegate Name -->
                <div class="flex items-center justify-center gap-1.5 text-xs text-slate-300 font-mono mb-1">
                    <span id="pass-flag" class="text-base">🇿🇦</span>
                    <span id="pass-country" class="uppercase tracking-widest text-[11px] text-slate-400">South Africa</span>
                </div>
                <h4 id="pass-name" class="text-xl md:text-2xl font-display font-black text-white tracking-wider uppercase drop-shadow-md">
                    MBALI SEBAPU
                </h4>
                <p id="pass-role" class="text-xs text-lime-400/90 font-mono tracking-wide mt-0.5 max-w-[240px] truncate">
                    Founder & Group CEO ~ Hermosa Flor
                </p>
            </div>

            <!-- Lower Badge Type: "DELEGATE V.I.P" -->
            <div class="relative z-10 text-center pb-2">
                <div id="pass-category-label" class="font-display text-sm tracking-[0.25em] text-white/90 uppercase font-light">
                    DELEGATE
                </div>
                <div id="pass-tier-badge" class="font-display  font-black text-4xl md:text-5xl text-lime-accent tracking-wider -mt-1 drop-shadow-[0_0_15px_rgba(180,242,51,0.4)]">
                    V.I.P
                </div>
                <div class="font-mono text-[10px] text-slate-400 uppercase tracking-widest mt-1">
                    MARCH, 2027 ~ JW MARRIOTT NAIROBI, KENYA
                </div>
            </div>

            <!-- Bottom African Pattern Trim On Pass -->
            <div class="absolute bottom-0 inset-x-0 h-2.5 african-pattern-strip rounded-b-2xl"></div>
        </div>
    </div>

    <!-- Interactive Pass Customizer Controls -->
    <div class="mt-3 p-3.5 rounded-xl bg-emerald-950/60 border border-emerald-500/20 backdrop-blur-md space-y-2.5">
        <div class="flex items-center justify-between text-xs font-mono text-slate-400">
            <span class="flex items-center gap-1.5 text-lime-400">
                <i data-lucide="sliders" class="w-3.5 h-3.5"></i>
                <span class="font-semibold uppercase text-[11px]">Pass Customizer Studio:</span>
            </span>
            <span class="text-[10px] text-slate-500">Tilt mouse over card</span>
        </div>

        <div class="grid grid-cols-2 gap-2 text-xs">
            <div>
                <label class="block text-[9px] font-mono text-slate-400 uppercase mb-0.5">Your Full Name</label>
                <input type="text" id="custom-pass-name" value="Mbali Sebapu" placeholder="e.g. Dr. Aliko Dangote" class="w-full px-2.5 py-1.5 rounded-lg bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
            </div>
            <div>
                <label class="block text-[9px] font-mono text-slate-400 uppercase mb-0.5">Pass Tier</label>
                <select id="custom-pass-tier" class="w-full px-2.5 py-1.5 rounded-lg bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                    <option value="DELEGATE|V.I.P">Delegate V.I.P</option>
                    <option value="KEYNOTE|SPEAKER">Keynote Speaker</option>
                    <option value="STRATEGIC|PARTNER">Strategic Partner</option>
                    <option value="FOUNDER|CIRCLE">Founder Circle</option>
                </select>
            </div>
        </div>

        <div class="flex items-center justify-between pt-0.5">
            <span class="text-[10px] font-mono text-slate-400">Pass Code: <span class="text-lime-300 font-bold">AEFS-27-VIP-8842</span></span>
            <a href="<?= url('/register') ?>" class="text-[11px] font-mono font-bold text-lime-accent hover:text-white flex items-center gap-1 transition-colors">
                <span>Claim Invitation</span>
                <i data-lucide="arrow-right" class="w-3 h-3"></i>
            </a>
        </div>
    </div>
</div>

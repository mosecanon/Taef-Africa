<?php
/**
 * About The Summit View
 * The African Executive Feature Summit 2027
 * Clean Corporate Executive Design
 */
?>
<!-- Header Hero Banner -->
<section class="relative py-20 lg:py-28 overflow-hidden border-b border-emerald-950/60 bg-[#050906]">
    <div class="absolute inset-0 bg-gradient-to-b from-obsidian via-transparent to-obsidian"></div>

    <!-- Hero Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="<?= url('/assets/images/summit-hero-bg.jpg') ?>" alt="Summit stage" class="w-full h-full object-cover opacity-40" aria-hidden="true">
    </div>

    <div class="max-w-7xl mx-auto px-6 md:px-8 relative z-10 text-center space-y-4">
        <span class="inline-block px-4 py-1.5 rounded-full bg-lime-accent/15 border border-lime-accent/30 text-lime-400 font-sans text-xs uppercase tracking-widest font-bold">
            02 // Executive Dossier
        </span>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-display font-black text-white tracking-tight leading-none">
            MORE THAN A SUMMIT.
            <br>
            <span class="text-lime-400 text-lg md:text-xl tracking-normal">A PLATFORM FOR COLLECTIVE PROGRESS.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
            The African Executive Feature Summit is a business leadership and executive engagement platform designed to bring together influential voices from across Africa's corporate, entrepreneurial, institutional and innovation ecosystems.
        </p>
    </div>
</section>

<!-- Vision, Mission & Objectives -->
<section class="py-24 bg-obsidian relative">
    <div class="max-w-7xl mx-auto px-6 md:px-8 space-y-12">

        <!-- Executive Stage Image Strip -->
        <div class="relative rounded-3xl overflow-hidden border border-emerald-950/40 shadow-2xl mb-8">
            <img src="<?= url('/assets/images/summit-main-stage.jpg') ?>" alt="The African Executive Feature Summit main stage" class="w-full h-[400px] md:h-[520px] object-cover opacity-90">
            <div class="absolute inset-0 bg-obsidian/40 flex items-center justify-center">
                <span class="text-lime-400 font-display font-bold text-2xl md:text-3xl tracking-widest uppercase bg-obsidian/60 px-6 py-2 rounded border border-lime-accent/30 backdrop-blur-sm">
                    Where African Enterprise Convenes
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Vision -->
            <div class="p-8 md:p-10 rounded-3xl bg-emerald-950/50 border border-lime-accent/30 space-y-4">
                <h3 class="text-sm font-mono text-lime-400 uppercase tracking-widest font-bold">Our Vision</h3>
                <h4 class="text-2xl font-display font-bold text-white leading-snug">
                    To establish a distinguished African platform for executive engagement, business leadership, strategic networking, and cross-industry collaboration.
                </h4>
                <p class="text-slate-400 text-sm leading-relaxed">
                    Our ambition extends beyond an annual gathering. We envision an enduring continental institution that encourages continuous engagement, celebrates African enterprise, and creates structured opportunities for high-impact partnerships.
                </p>
            </div>

            <!-- Mission -->
            <div class="p-8 md:p-10 rounded-3xl bg-emerald-950/50 border border-gold/30 space-y-4">
                <h3 class="text-sm font-mono text-gold uppercase tracking-widest font-bold">Our Mission</h3>
                <h4 class="text-2xl font-display font-bold text-white leading-snug">
                    To bring together leaders, founders, organisations, and influential stakeholders through meaningful conversations and collaborative opportunities.
                </h4>
                <p class="text-slate-400 text-sm leading-relaxed">
                    Connecting experience with fresh thinking, linking high-growth businesses with cross-border opportunities, and empowering leaders to engage in conversations that directly shape the direction of African enterprise.
                </p>
            </div>

        </div>

        <!-- 5 Objectives Grid -->
        <div class="space-y-6 pt-6 border-t border-emerald-950/60">
            <h3 class="font-mono text-xs text-slate-400 uppercase tracking-widest font-bold mb-4">
                Strategic Objectives // Guiding Principles
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 text-sm">
                <div class="p-5 rounded-2xl bg-emerald-950/40 border border-lime-accent/30 space-y-3">
                    <span class="text-lime-400 font-mono text-xs font-bold">01. Connect</span>
                    <p class="text-slate-300 font-light">To connect business leaders, entrepreneurs, brands, and institutions across different industries.</p>
                </div>
                <div class="p-5 rounded-2xl bg-emerald-950/40 border border-lime-accent/30 space-y-3">
                    <span class="text-lime-400 font-mono text-xs font-bold">02. Exchange</span>
                    <p class="text-slate-300 font-light">To encourage the exchange of knowledge, experiences, and perspectives on issues shaping African enterprise.</p>
                </div>
                <div class="p-5 rounded-2xl bg-emerald-950/40 border border-lime-accent/30 space-y-3">
                    <span class="text-lime-400 font-mono text-xs font-bold">03. Partner</span>
                    <p class="text-slate-300 font-light">To create opportunities for strategic partnerships, business relationships, and institutional collaboration.</p>
                </div>
                <div class="p-5 rounded-2xl bg-emerald-950/40 border border-lime-accent/30 space-y-3">
                    <span class="text-lime-400 font-mono text-xs font-bold">04. Amplify</span>
                    <p class="text-slate-300 font-light">To recognise and amplify the contributions of African leaders, innovators, and emerging businesses.</p>
                </div>
                <div class="p-5 rounded-2xl bg-emerald-950/40 border border-lime-accent/30 space-y-3">
                    <span class="text-lime-400 font-mono text-xs font-bold">05. Inspire</span>
                    <p class="text-slate-300 font-light">To inspire collective thinking and action towards a more innovative, connected, and economically progressive Africa.</p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- SUMMIT CONVERSATION AREAS -->
<section id="tracks" class="py-24 lg:py-32 bg-[#040805] border-t border-b border-emerald-950/80 relative">
    <div class="max-w-7xl mx-auto px-6 md:px-8 space-y-12">

        <div class="max-w-3xl space-y-3">
            <span class="text-xs font-mono text-lime-400 tracking-widest uppercase font-semibold">
                Plenary Agenda Focus
            </span>
            <h2 class="text-3xl sm:text-5xl font-display font-black text-white">
                SUMMIT CONVERSATION AREAS
            </h2>
            <p class="text-slate-400 text-sm md:text-base leading-relaxed">
                Six structured pillars addressing key strategic opportunities across African commerce, governance, and frontier technology.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ($tracks as $index => $track): ?>
                <div class="p-8 md:p-10 rounded-3xl bg-emerald-950/50 border border-lime-accent/30 hover:border-lime-accent/50 transition-all space-y-4 group">
                    <div class="flex items-center justify-between text-xs font-mono">
                        <span class="px-3 py-1 rounded-full bg-lime-accent/15 text-lime-300 border border-lime-accent/30 font-bold">
                            <?= htmlspecialchars($track['tag']) ?>
                        </span>
                        <span class="text-gold"><?= htmlspecialchars($track['stats']) ?></span>
                    </div>

                    <h3 class="text-xl md:text-2xl font-display font-bold text-white group-hover:text-lime-accent transition-colors">
                        <?= htmlspecialchars($track['title']) ?>
                    </h3>

                    <p class="text-xs font-mono text-emerald-400/90 font-semibold uppercase tracking-wider mb-3">
                        <?= htmlspecialchars($track['subtitle'] ?? 'Executive Plenary Session') ?>
                    </p>

                    <p class="text-sm text-slate-300 leading-relaxed font-light">
                        <?= htmlspecialchars($track['desc']) ?>
                    </p>

                    <div class="pt-4 border-t border-emerald-950/80 flex items-center justify-between text-xs font-mono text-slate-400">
                        <span>Format: Keynote & Closed Roundtable</span>
                        <a href="<?= url('/register?track=' . urlencode($track['id'])) ?>" class="text-lime-accent hover:underline flex items-center gap-1 font-bold">
                            <span>Register for Track</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- WHO SHOULD ATTEND -->
<section class="py-24 bg-obsidian">
    <div class="max-w-7xl mx-auto px-6 md:px-8">
        <div class="p-8 md:p-14 rounded-3xl bg-emerald-950/50 border border-lime-accent/30 relative overflow-hidden space-y-8">
            <div class="space-y-3 max-w-2xl">
                <span class="text-xs font-mono text-gold tracking-widest uppercase font-semibold">Delegate Accreditation</span>
                <h2 class="text-3xl sm:text-4xl font-display font-black text-white">WHO SHOULD ATTEND?</h2>
                <p class="text-slate-300 text-sm md:text-base leading-relaxed">
                    The summit welcomes corporate executives, CEOs, managing directors, founders, entrepreneurs, investors, policymakers, institutional representatives, technology leaders, established brands, emerging businesses, and professionals interested in the advancement of African enterprise.
                </p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 text-xs font-mono">
                <div class="p-3 rounded-xl bg-black/50 border border-lime-accent/20 text-slate-200 flex items-center gap-2">
                    <i data-lucide="briefcase" class="w-3.5 h-3.5 text-lime-400"></i>
                    <span>CEOs & Managing Directors</span>
                </div>
                <div class="p-3 rounded-xl bg-black/50 border border-lime-accent/20 text-slate-200 flex items-center gap-2">
                    <i data-lucide="rocket" class="w-3.5 h-3.5 text-lime-400"></i>
                    <span>High-Growth Founders</span>
                </div>
                <div class="p-3 rounded-xl bg-black/50 border border-lime-accent/20 text-slate-200 flex items-center gap-2">
                    <i data-lucide="coins" class="w-3.5 h-3.5 text-lime-400"></i>
                    <span>Institutional Investors & DFIs</span>
                </div>
                <div class="p-3 rounded-xl bg-black/50 border border-lime-accent/20 text-slate-200 flex items-center gap-2">
                    <i data-lucide="landmark" class="w-3.5 h-3.5 text-lime-400"></i>
                    <span>Policymakers & Regulators</span>
                </div>
                <div class="p-3 rounded-xl bg-black/50 border border-lime-accent/20 text-slate-200 flex items-center gap-2">
                    <i data-lucide="cpu" class="w-3.5 h-3.5 text-lime-400"></i>
                    <span>Tech & AI Pioneers</span>
                </div>
                <div class="p-3 rounded-xl bg-black/50 border border-lime-accent/20 text-slate-200 flex items-center gap-2">
                    <i data-lucide="award" class="w-3.5 h-3.5 text-lime-400"></i>
                    <span>Corporate Brand Leaders</span>
                </div>
                <div class="p-3 rounded-xl bg-black/50 border border-lime-accent/20 text-slate-200 flex items-center gap-2">
                    <i data-lucide="globe" class="w-3.5 h-3.5 text-lime-400"></i>
                    <span>AfCFTA Trade Facilitators</span>
                </div>
                <div class="p-3 rounded-xl bg-black/50 border border-lime-accent/20 text-slate-200 flex items-center gap-2">
                    <i data-lucide="sparkles" class="w-3.5 h-3.5 text-lime-400"></i>
                    <span>Emerging African Leaders</span>
                </div>
            </div>

            <div class="pt-6 flex flex-wrap items-center gap-4">
                <a href="<?= url('/register') ?>" class="lime-glow-btn px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider inline-flex items-center gap-2">
                    <span>Register Your Interest</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
                <a href="<?= url('/partnerships') ?>" class="px-6 py-3.5 rounded-full border border-lime-accent/30 text-lime-300 text-xs font-mono uppercase tracking-wider hover:bg-emerald-950/60 transition-all">
                    Explore Partnership Opportunities
                </a>
            </div>
        </div>
    </div>
</section>
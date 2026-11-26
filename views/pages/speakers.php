<?php
/**
 * Speakers View
 * The African Executive Feature Summit 2027
 * Clean Corporate Executive Design
 */
?>
<!-- Header Hero -->
<section class="relative py-20 lg:py-24 overflow-hidden border-b border-emerald-950/60 bg-[#050906]">
    <div class="absolute inset-0 bg-gradient-to-b from-obsidian via-transparent to-obsidian"></div>

    <div class="max-w-7xl mx-auto px-6 md:px-8 relative z-10 text-center space-y-4">
        <span class="inline-block px-4 py-1.5 rounded-full bg-lime-accent/15 border border-lime-accent/30 text-lime-400 font-mono text-xs uppercase tracking-widest">
            03 // Plenary Faculty & Keynotes
        </span>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-display font-black text-white tracking-tight">
            THE VOICES THAT MOVE IDEAS FORWARD.
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
            The future is shaped by people who are willing to share knowledge, challenge perspectives and inspire meaningful change. Our distinguished speakers will explore the opportunities, challenges and emerging developments shaping African enterprise.
        </p>
    </div>
</section>

<!-- Chief Guest Pinned Feature -->
<section class="py-12 bg-[#040805] border-b border-emerald-950/80">
    <div class="max-w-7xl mx-auto px-6 md:px-8">

        <div class="drift-box rounded-2xl bg-emerald-950/50 border border-lime-accent/30 p-6 md:p-8 space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">

                <!-- Portrait -->
                <div class="lg:col-span-4 flex justify-center">
                    <div class="relative group">
                        <div class="w-full max-w-[380px] sm:max-w-[420px] rounded-2xl overflow-hidden bg-black aspect-[717/1024]">
                            <img src="<?= url('/assets/images/chief-guest-aden-duale.jpg?v=' . time()) ?>"
                                 alt="Hon. Aden Duale - Cabinet Secretary for Health, Kenya"
                                 class="w-full h-full object-cover object-center block group-hover:scale-105 transition-transform duration-500">
                        </div>
                    </div>
                </div>

                <!-- Chief Guest Dossier -->
                <div class="lg:col-span-8 space-y-4 text-left">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="px-2.5 py-0.5 rounded bg-black/60 border border-white/10 text-slate-400 font-mono text-[10px] uppercase">
                            Ministerial Keynote
                        </span>
                        <span class="px-2.5 py-0.5 rounded bg-black/60 border border-white/10 text-slate-400 font-mono text-[10px] uppercase">
                            March 2027 Plenary
                        </span>
                    </div>

                    <div>
                        <h2 class="text-3xl sm:text-4xl font-display font-bold text-white tracking-tight">
                            HON. ADEN DUALE
                        </h2>
                        <p class="text-sm font-mono text-lime-400 font-semibold mt-1">
                            Cabinet Secretary for Health // Republic of Kenya
                        </p>
                    </div>

                    <div class="p-4 rounded-xl bg-black/60 border border-emerald-500/20 space-y-1 max-w-2xl">
                        <span class="text-xs font-mono text-ochre-gold uppercase font-bold block">Summit Opening Plenary Keynote Address:</span>
                        <p class="text-sm text-slate-100 font-medium">
                            "Shaping Africa's Healthcare Sovereignty: Biomanufacturing, Pharma Security & Cross-Border Health Systems"
                        </p>
                    </div>

                    <p class="text-xs md:text-sm text-slate-300 font-light leading-relaxed max-w-2xl">
                        Hon. Aden Duale serves as the Cabinet Secretary for Health in the Republic of Kenya. A veteran statesman, author, and senior policy architect, he oversees Kenya's flagship healthcare transformation agenda. At the Summit, Hon. Duale will deliver the official ministerial keynote address focusing on catalytic healthcare capital, continental pharmaceutical supply chains, and public-private cooperation under the AfCFTA single market framework.
                    </p>

                    <div class="pt-2 flex flex-wrap items-center gap-3">
                        <a href="<?= url('/register') ?>" class="lime-glow-btn px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider inline-flex items-center gap-2">
                            <span>Reserve Plenary Keynote Seat</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <span class="text-[11px] font-mono text-slate-400">
                            Venue: Main Plenary Hall // JW Marriott Nairobi
                        </span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- Speaker Grid -->
<section class="py-16 bg-obsidian">
    <div class="max-w-7xl mx-auto px-6 md:px-8 space-y-12">

        <!-- Category Filter Buttons -->
        <div class="flex items-center gap-2 overflow-x-auto pb-4 border-b border-emerald-950/80 scrollbar-none text-xs font-mono">
            <button class="speaker-filter-btn px-4 py-2 rounded-full bg-lime-accent text-black font-bold tracking-wider uppercase transition-all" data-category="all">
                All Faculty (<?= count($speakers) ?>)
            </button>
            <?php foreach ($categories as $cat): ?>
                <button class="speaker-filter-btn px-4 py-2 rounded-full bg-emerald-950/60 text-slate-300 border border-emerald-500/20 hover:border-lime-accent/50 hover:text-white uppercase tracking-wider transition-all whitespace-nowrap" data-category="<?= htmlspecialchars($cat) ?>">
                    <?= htmlspecialchars($cat) ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Speaker Cards Grid -->
        <div id="speakers-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php foreach ($speakers as $spk): ?>
                <div class="group speaker-card drift-box rounded-2xl bg-emerald-950/50 border border-lime-accent/30 flex flex-col justify-between h-shadow transition-all hover:border-lime-accent/50 hover:box-shadow-lg" data-category="<?= htmlspecialchars($spk['category']) ?>">
                    <div class="relative overflow-hidden rounded-t-2xl bg-emerald-950">
                        <img src="<?= htmlspecialchars($spk['photo_url']) ?>" alt="<?= htmlspecialchars($spk['full_name']) ?>" class="w-full h-48 object-cover object-top group-hover:scale-105 transition-all duration-500 filter grayscale group-hover:grayscale-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent group-hover:from-black/60 transition-all duration-500"></div>
                        <div class="absolute top-3 right-3 flex items-center gap-1.5 z-10">
                            <?php if ($spk['is_keynote']): ?>
                                <span class="px-2 py-0.5 rounded bg-gold text-black font-mono font-bold text-[9px] uppercase tracking-wider">
                                    Keynote
                                </span>
                            <?php endif; ?>
                            <span class="px-2.5 py-1 rounded-full bg-black/70 backdrop-blur-md border border-lime-accent/30 text-lime-300 font-mono text-[11px] font-semibold">
                                <?= htmlspecialchars($spk['country']) ?>
                            </span>
                        </div>

                        <div class="absolute bottom-3 left-4 right-4 z-10">
                            <span class="text-xs font-mono text-ochre-gold uppercase tracking-widest font-semibold block mb-0.5">
                                <?= htmlspecialchars($spk['category']) ?>
                            </span>
                            <h3 class="text-xl font-display font-extrabold text-white group-hover:text-lime-accent transition-colors duration-300">
                                <?= htmlspecialchars($spk['full_name']) ?>
                            </h3>
                        </div>
                    </div>

                    <!-- Details & Topic -->
                    <div class="p-5 space-y-4 flex-1 flex flex-col justify-between">
                        <div class="space-y-1">
                            <div class="text-xs font-mono text-lime-400 font-semibold"><?= htmlspecialchars($spk['designation']) ?></div>
                            <div class="text-xs text-slate-400 font-medium"><?= htmlspecialchars($spk['organisation']) ?></div>
                        </div>

                        <div class="p-3.5 rounded-xl bg-black/50 border border-emerald-950 text-xs text-slate-300 leading-relaxed font-light">
                            <span class="text-ochre-gold font-mono text-[10px] uppercase font-bold block mb-1">Keynote / Session Topic:</span>
                            "<?= htmlspecialchars($spk['topic']) ?>"
                        </div>

                        <p class="text-xs text-slate-400 line-clamp-3 leading-relaxed">
                            <?= htmlspecialchars($spk['bio']) ?>
                        </p>

                        <div class="pt-2 border-t border-emerald-950 flex items-center justify-between">
                            <span class="text-[11px] font-mono text-slate-500">March 2027 Plenary</span>
                            <button class="view-bio-btn text-xs font-mono font-bold text-lime-accent hover:underline flex items-center gap-1"
                                data-name="<?= htmlspecialchars($spk['full_name']) ?>"
                                data-role="<?= htmlspecialchars($spk['designation']) ?>"
                                data-org="<?= htmlspecialchars($spk['organisation']) ?>"
                                data-country="<?= htmlspecialchars($spk['country']) ?>"
                                data-topic="<?= htmlspecialchars($spk['topic']) ?>"
                                data-bio="<?= htmlspecialchars($spk['bio']) ?>"
                                data-photo="<?= htmlspecialchars($spk['photo_url']) ?>">
                                <span>Executive Bio</span>
                                <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="text-center font-mono text-xs text-slate-500 ">
            Confirmed plenary speakers will continue to be announced progressively leading up to March 2027.
        </div>

    </div>
</section>

<!-- Speaker Application: Express Interest as a Speaker -->
<section id="apply" class="py-20 bg-[#040805] border-t border-emerald-950">
    <div class="max-w-4xl mx-auto px-6 md:px-8 space-y-8">

        <div class="text-center space-y-3">
            <span class="text-xs font-mono text-gold tracking-widest uppercase font-semibold">Plenary Call for Speakers // 2027</span>
            <h2 class="text-3xl sm:text-4xl font-display font-black text-white">
                EXPRESS INTEREST AS A SPEAKER
            </h2>
            <p class="text-slate-300 text-sm max-w-xl mx-auto font-light leading-relaxed">
                We welcome expressions of interest from accomplished professionals, business leaders, founders, and industry experts interested in contributing to the summit's high-level conversations.
            </p>
        </div>

        <div class="drift-box rounded-2xl bg-emerald-950/50 border border-lime-accent/30 p-8 md:p-10 space-y-6">
            <form id="speaker-application-form" class="space-y-6">

                <div id="speaker-msg" class="hidden p-4 rounded-xl text-xs font-mono"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[01] Full Name *</label>
                        <input type="text" name="full_name" required placeholder="e.g. Dr. Ngozi Adeyemi" class="w-full px-4 py-3 rounded-lg bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[02] Corporate Email Address *</label>
                        <input type="email" name="email" required placeholder="name@organisation.com" class="w-full px-4 py-3 rounded-lg bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[03] Telephone / WhatsApp *</label>
                        <input type="tel" name="phone" required="+254 700 000 000" class="w-full px-4 py-3 rounded-lg bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[04] Organisation / Enterprise *</label>
                        <input type="text" name="organisation" required placeholder="e.g. Sovereign Capital Group" class="w-full px-4 py-3 rounded-lg bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[05] Current Designation / Role *</label>
                        <input type="text" name="designation" required placeholder="e.g. Group Chief Strategy Officer" class="w-full px-4 py-3 rounded-lg bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[06] Thematic Track *</label>
                        <select name="category" class="w-full px-4 py-3 rounded-lg bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[07] Proposed Keynote / Panel Topic *</label>
                    <input type="text" name="proposed_topic" required placeholder="e.g. Scaling Sovereign Digital Public Infrastructure Across Regional Blocs" class="w-full px-4 py-3 rounded-lg bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[08] Executive Dossier / Biography *</label>
                    <textarea name="bio" rows="4" required placeholder="Brief career overview, executive milestones, and thought leadership background..." class="w-full px-4 py-3 rounded-lg bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none"></textarea>
                </div>

                <button type="submit" class="w-full py-4 rounded-xl text-xs font-extrabold uppercase tracking-wider inline-flex items-center justify-center gap-2">
                    <span>Submit Speaker Expression of Interest</span>
                    <i data-lucide="send" class="w-4 h-4"></i>
                </button>
            </form>
        </div>

    </div>
</section>

<!-- Executive Bio Modal -->
<div id="bio-modal" class="fixed inset-0 z-50 hidden bg-black/85 backdrop-blur-md flex items-center justify-center p-4">
    <div class="drift-panel rounded-2xl p-8 md:p-10 max-w-2xl w-full border border-lime-accent/40 relative space-y-6 max-h-[90vh] overflow-y-auto">
        <button id="close-bio-modal" class="absolute top-5 right-5 p-2 rounded-full bg-emerald-950 text-slate-400 hover:text-white border border-emerald-500/20">
            <i data-lucide="x" class="w-5 h-5"></i>
        </button>

        <div class="flex items-center gap-4">
            <img id="modal-photo" src="" alt="Speaker" class="w-20 h-20 rounded-xl object-cover object-top border-2 border-lime-accent">
            <div>
                <span id="modal-country" class="px-2.5 py-0.5 rounded-full bg-lime-accent/15 text-lime-400 font-mono text-[10px] font-bold border border-lime-accent/30"></span>
                <h3 id="modal-name" class="text-2xl font-display font-black text-white mt-1"></h3>
                <p id="modal-role" class="text-xs font-mono text-lime-300"></p>
                <p id="modal-org" class="text-xs text-slate-400"></p>
            </div>
        </div>

        <div class="p-4 rounded-xl bg-black/60 border border-emerald-500/20 space-y-1">
            <span class="text-[10px] font-mono text-ochre-gold uppercase font-bold block">Plenary Discussion Session:</span>
            <p id="modal-topic" class="text-sm text-slate-200 font-medium"></p>
        </div>

        <div class="space-y-2">
            <span class="text-xs font-mono text-slate-400 uppercase tracking-wider block font-bold">Executive Profile</span>
            <p id="modal-bio" class="text-xs md:text-sm text-slate-300 leading-relaxed font-light"></p>
        </div>

        <div class="pt-4 border-t border-emerald-950 flex justify-end">
            <a href="<?= url('/register') ?>" class="lime-glow-btn px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider">
                Attend Keynote Session
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Speaker Filtering
    const filterBtns = document.querySelectorAll('.speaker-filter-btn');
    const cards = document.querySelectorAll('.speaker-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => {
                b.classList.remove('bg-lime-accent', 'text-black', 'font-bold');
                b.classList.add('bg-emerald-950/60', 'text-slate-300');
            });
            this.classList.add('bg-lime-accent', 'text-black', 'font-bold');
            this.classList.remove('bg-emerald-950/60', 'text-slate-300');

            const cat = this.dataset.category;
            cards.forEach(card => {
                if (cat === 'all' || card.dataset.category === cat) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Bio Modal
    const modal = document.getElementById('bio-modal');
    const closeBtn = document.getElementById('close-bio-modal');

    document.querySelectorAll('.view-bio-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('modal-name').textContent = this.dataset.name;
            document.getElementById('modal-role').textContent = this.dataset.role;
            document.getElementById('modal-org').textContent = this.dataset.org;
            document.getElementById('modal-country').textContent = this.dataset.country;
            document.getElementById('modal-topic').textContent = this.dataset.topic;
            document.getElementById('modal-bio').textContent = this.dataset.bio;
            document.getElementById('modal-photo').src = this.dataset.photo;
            modal.classList.remove('hidden');
        });
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
    }
    modal.addEventListener('click', (e) => {
        if (e.target === modal) modal.classList.add('hidden');
    });

    // Speaker Application Form
    const appForm = document.getElementById('speaker-application-form');
    const appMsg = document.getElementById('speaker-msg');

    if (appForm) {
        appForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = appForm.querySelector('button[type="submit"]');
            btn.disabled = true;
            btn.innerHTML = '<span>Transmitting Dossier...</span>';

            const fd = new FormData(appForm);
            try {
                const res = await fetch('<?= url('/api/speakers/apply') ?>', {
                    method: 'POST',
                    body: fd
                });
                const data = await res.json();
                appMsg.classList.remove('hidden');

                if (data.status === 'success') {
                    appMsg.className = 'p-4 rounded-xl text-xs font-mono bg-emerald-900/80 text-lime-300 border border-lime-accent';
                    appMsg.textContent = data.message;
                    appForm.reset();
                } else {
                    appMsg.className = 'p-4 rounded-xl text-xs font-mono bg-red-950/80 text-red-200 border border-red-500/40';
                    appMsg.textContent = data.message || 'Submission error. Please verify your details.';
                }
            } catch (err) {
                appMsg.className = 'p-4 rounded-xl text-xs font-mono bg-red-950/80 text-red-200 border border-red-500/40';
                appMsg.textContent = 'Network or transmission error. Please retry.';
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<span>Submit Speaker Expression of Interest</span><i data-lucide="send" class="w-4 h-4"></i>';
                if (window.lucide) lucide.createIcons();
            }
        });
    }
});
</script>
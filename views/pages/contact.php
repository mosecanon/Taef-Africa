<?php
/**
 * Contact Us View
 * The African Executive Feature Summit 2027
 * Clean Corporate Executive Design
 */
?>
<!-- Header Hero -->
<section class="relative py-20 lg:py-24 overflow-hidden border-b border-emerald-950/60 bg-[#050906]">
    <div class="absolute inset-0 bg-gradient-to-b from-obsidian via-transparent to-obsidian"></div>

    <div class="max-w-7xl mx-auto px-6 md:px-8 relative z-10 text-center space-y-4">
        <span class="inline-block px-4 py-1.5 rounded-full bg-lime-accent/15 border border-lime-accent/30 text-lime-400 font-mono text-xs uppercase tracking-widest">
            06 // Executive Secretariat
        </span>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-display font-black text-white tracking-tight">
            LET'S START A CONVERSATION.
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
            Every meaningful partnership, connection and opportunity begins with a conversation. Connect with our organising team and discover how you can become part of The African Executive Feature Summit 2027.
        </p>
    </div>
</section>

<!-- Contact Matrix & Form -->
<section class="py-16 bg-obsidian min-h-screen">
    <div class="max-w-7xl mx-auto px-6 md:px-8 space-y-16">

        <!-- 4 Direct Enquiries Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 text-xs font-mono">
            <div class="drift-box rounded-2xl bg-emerald-950/50 border border-lime-accent/30 p-6 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-lime-accent/15 border border-lime-accent/30 flex items-center justify-center text-lime-300">
                    <i data-lucide="mail" class="w-5 h-5"></i>
                </div>
                <span class="uppercase tracking-wider block">General Enquiries</span>
                <a href="mailto:<?= htmlspecialchars($config['contact']['general_email']) ?>" class="text-white hover:text-lime-accent font-semibold block text-sm transition-colors break-all">
                    <?= htmlspecialchars($config['contact']['general_email']) ?>
                </a>
            </div>

            <div class="drift-box rounded-2xl bg-emerald-950/50 border border-lime-accent/30 p-6 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-ochre-gold/15 border border-ochre-gold/30 flex items-center justify-center text-ochre-gold">
                    <i data-lucide="shield-check" class="w-5 h-5"></i>
                </div>
                <span class="uppercase tracking-wider block">Sponsorship & Partnerships</span>
                <a href="mailto:<?= htmlspecialchars($config['contact']['partnership_email']) ?>" class="text-white hover:text-ochre-gold font-semibold block text-sm transition-colors break-all">
                    <?= htmlspecialchars($config['contact']['partnership_email']) ?>
                </a>
            </div>

            <div class="drift-box rounded-2xl bg-emerald-950/50 border border-lime-accent/30 p-6 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/15 border border-emerald-500/30 flex items-center justify-center text-emerald-400">
                    <i data-lucide="mic" class="w-5 h-5"></i>
                </div>
                <span class="uppercase tracking-wider block">Speaker Engagement</span>
                <a href="mailto:<?= htmlspecialchars($config['contact']['speaker_email']) ?>" class="text-white hover:text-emerald-300 font-semibold block text-sm transition-colors break-all">
                    <?= htmlspecialchars($config['contact']['speaker_email']) ?>
                </a>
            </div>

            <div class="drift-box rounded-2xl bg-emerald-950/50 border border-lime-accent/30 p-6 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-slate-500/15 border border-slate-500/30 flex items-center justify-center text-slate-300">
                    <i data-lucide="phone-call" class="w-5 h-5"></i>
                </div>
                <span class="uppercase tracking-wider block">Official Telephone</span>
                <div class="text-white font-semibold text-sm">
                    <?= htmlspecialchars($config['contact']['phone']) ?>
                </div>
            </div>
        </div>

        <!-- Main Form & Venue Guide Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

            <!-- Left: Contact Form (7 cols) -->
            <div class="lg:col-span-7 drift-box rounded-3xl bg-emerald-950/50 border border-lime-accent/30 p-8 md:p-12 space-y-6">
                <div class="border-b border-emerald-950 pb-4">
                    <h3 class="text-2xl font-display font-black text-white">Direct Secretariat Dispatch</h3>
                    <p class="text-xs text-slate-400 mt-1">Whether inquiring about attendance, proposing an institutional partnership, or requesting media accreditation.</p>
                </div>

                <form id="contact-form" class="space-y-6">
                    <div id="contact-msg" class="hidden p-4 rounded-xl text-xs font-mono"></div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">Full Name *</label>
                            <input type="text" name="full_name" required placeholder="e.g. Jean-Luc Habimana" class="w-full px-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">Corporate Email Address *</label>
                            <input type="email" name="email" required placeholder="name@company.com" class="w-full px-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">Organisation / Company</label>
                            <input type="text" name="organisation" placeholder="e.g. Kigali Robotics Ltd" class="w-full px-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">Subject / Nature of Enquiry *</label>
                            <select name="subject" class="w-full px-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                                <option value="General Summit Attendance">General Summit Attendance</option>
                                <option value="Partnership & Sponsorship Enquiry">Partnership & Sponsorship Enquiry</option>
                                <option value="Speaker Participation">Speaker Participation</option>
                                <option value="Media & Press Accreditation">Media & Press Accreditation</option>
                                <option value="VIP Concierge & Hospitality">VIP Concierge & Hospitality</option>
                                <option value="Other Protocol Matter">Other Protocol Matter</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">Message / Detailed Request *</label>
                        <textarea name="message" rows="5" required placeholder="Please outline your enquiry or institutional objectives..." class="w-full px-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none"></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-xl text-xs font-extrabold uppercase tracking-wider inline-flex items-center justify-center gap-2">
                        <span>Send Enquiry</span>
                        <i data-lucide="send" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>

            <!-- Right: Location, Hotel & Protocol Guide (5 cols) -->
            <div class="lg:col-span-5 space-y-6">
                <!-- Venue Card -->
                <div class="drift-box rounded-3xl bg-emerald-950/50 border border-lime-accent/30 p-8 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-lime-accent/15 border border-lime-accent/30 flex items-center justify-center text-lime-300">
                            <i data-lucide="map-pin" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <span class="text-xs font-mono text-lime-400 uppercase tracking-widest font-bold">Host Venue</span>
                            <h4 class="text-xl font-display font-black text-white">JW Marriott Hotel</h4>
                        </div>
                    </div>

                    <p class="text-xs text-slate-300 leading-relaxed font-light">
                        Located in the prestigious commercial hub of Westlands, Nairobi, JW Marriott offers world-class plenary halls, presidential suites, and closed-door bilateral deal rooms.
                    </p>

                    <div class="space-y-2 text-xs font-mono text-slate-400 pt-2 border-t border-emerald-950">
                        <div class="flex items-center gap-2">
                            <i data-lucide="plane" class="w-4 h-4 text-ochre-gold"></i>
                            <span>Jomo Kenyatta Int'l Airport (NBO): ~25 mins via Expressway</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="shield" class="w-4 h-4 text-lime-400"></i>
                            <span>Dedicated VIP Diplomatic & Executive Security Corridor</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="clock" class="w-4 h-4 text-slate-400"></i>
                            <span>Timezone: East Africa Time (GMT+3)</span>
                        </div>
                    </div>
                </div>

                <!-- Follow The Conversation Card -->
                <div class="drift-box rounded-3xl bg-emerald-950/50 border border-lime-accent/30 p-8 space-y-4">
                    <h4 class="text-lg font-display font-bold text-white">Follow The Conversation</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Stay connected through our official social media platforms for summit announcements, speaker features, partnership updates, and important developments.
                    </p>

                    <div class="grid grid-cols-2 gap-3 text-xs font-mono pt-2">
                        <a href="<?= htmlspecialchars($config['contact']['social']['linkedin']) ?>" target="_blank" rel="noopener noreferrer" class="p-3 rounded-xl bg-black/60 border border-emerald-500/20 hover:border-lime-accent flex items-center gap-2 text-slate-300 hover:text-white transition-all">
                            <i data-lucide="linkedin" class="w-4 h-4 text-lime-400"></i>
                            <span>LinkedIn</span>
                        </a>
                        <a href="<?= htmlspecialchars($config['contact']['social']['instagram']) ?>" target="_blank" rel="noopener noreferrer" class="p-3 rounded-xl bg-black/60 border border-emerald-500/20 hover:border-lime-accent flex items-center gap-2 text-slate-300 hover:text-white transition-all">
                            <i data-lucide="instagram" class="w-4 h-4 text-lime-400"></i>
                            <span>Instagram</span>
                        </a>
                        <a href="<?= htmlspecialchars($config['contact']['social']['facebook']) ?>" target="_blank" rel="noopener noreferrer" class="p-3 rounded-xl bg-black/60 border border-emerald-500/20 hover:border-lime-accent flex items-center gap-2 text-slate-300 hover:text-white transition-all">
                            <i data-lucide="facebook" class="w-4 h-4 text-lime-400"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="<?= htmlspecialchars($config['contact']['social']['youtube']) ?>" target="_blank" rel="noopener noreferrer" class="p-3 rounded-xl bg-black/60 border border-emerald-500/20 hover:border-lime-accent flex items-center gap-2 text-slate-300 hover:text-white transition-all">
                            <i data-lucide="youtube" class="w-4 h-4 text-lime-400"></i>
                            <span>YouTube</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contact-form');
    const msg = document.getElementById('contact-msg');

    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Transmitting Message...';

        const formData = new FormData(form);
        const json = Object.fromEntries(formData.entries());

        try {
            const res = await fetch('<?= url('/api/contact') ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(json)
            });
            const data = await res.json();

            msg.classList.remove('hidden', 'bg-red-950/80', 'text-red-300', 'bg-emerald-950/80', 'text-lime-300');
            if (data.success) {
                msg.classList.add('bg-emerald-950/80', 'text-lime-300', 'border', 'border-lime-accent/40');
                msg.textContent = data.message;
                form.reset();
            } else {
                msg.classList.add('bg-red-950/80', 'text-red-300', 'border', 'border-red-500/40');
                msg.textContent = data.message;
            }
        } catch (err) {
            msg.classList.remove('hidden');
            msg.classList.add('bg-red-950/80', 'text-red-300');
            msg.textContent = 'Connection error. Please try again.';
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<span>Send Enquiry</span><i data-lucide="send" class="w-4 h-4"></i>';
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }
    });
});
</script>
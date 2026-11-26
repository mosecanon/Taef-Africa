<?php
/**
 * Executive Concierge Registration View
 * The African Executive Feature Summit 2027
 * Clean Corporate Executive Design
 */
?>
<!-- Header Hero -->
<section class="relative py-20 lg:py-24 overflow-hidden border-b border-emerald-950/60 bg-[#050906]">
    <div class="absolute inset-0 bg-gradient-to-b from-obsidian via-transparent to-obsidian"></div>

    <div class="max-w-7xl mx-auto px-6 md:px-8 relative z-10 text-center space-y-4">
        <span class="inline-block px-4 py-1.5 rounded-full bg-lime-accent/15 border border-lime-accent/30 text-lime-400 font-mono text-xs uppercase tracking-widest">
            05 // Accreditation & Registration Portal
        </span>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-display font-black text-white tracking-tight">
            YOUR PLACE IN THE CONVERSATION
            <br>
            STARTS HERE.
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
            The African Executive Feature Summit 2027 welcomes individuals and organisations interested in being part of conversations shaping Africa's business and leadership landscape.
        </p>
    </div>
</section>

<!-- Concierge Registration Multi-Step Experience -->
<section class="py-16 bg-obsidian min-h-screen">
    <div class="max-w-5xl mx-auto px-6 md:px-8 space-y-10">

        <!-- Stepper Navigation Header -->
        <div class="grid grid-cols-3 gap-2 md:gap-4 font-mono text-xs">
            <div id="step-nav-1" class="p-3 md:p-4 rounded-xl border border-lime-accent bg-lime-accent/15 text-white flex items-center gap-2 md:gap-3 transition-all">
                <span class="w-6 h-6 rounded-full bg-lime-accent text-black font-bold flex items-center justify-center shrink-0">1</span>
                <div>
                    <span class="text-[10px] text-lime-300 uppercase tracking-widest block font-bold">Step 01</span>
                    <span class="font-bold hidden sm:inline">Identity & Contact</span>
                </div>
            </div>

            <div id="step-nav-2" class="p-3 md:p-4 rounded-xl border border-emerald-950 bg-emerald-950/40 text-slate-400 flex items-center gap-2 md:gap-3 transition-all">
                <span class="w-6 h-6 rounded-full bg-emerald-900 text-slate-300 font-bold flex items-center justify-center shrink-0">2</span>
                <div>
                    <span class="text-[10px] text-slate-500 uppercase tracking-widest block font-bold">Step 02</span>
                    <span class="font-bold hidden sm:inline">Enterprise & Role</span>
                </div>
            </div>

            <div id="step-nav-3" class="p-3 md:p-4 rounded-xl border border-emerald-950 bg-emerald-950/40 text-slate-400 flex items-center gap-2 md:gap-3 transition-all">
                <span class="w-6 h-6 rounded-full bg-emerald-900 text-slate-300 font-bold flex items-center justify-center shrink-0">3</span>
                <div>
                    <span class="text-[10px] text-slate-500 uppercase tracking-widest block font-bold">Step 03</span>
                    <span class="font-bold hidden sm:inline">Pass Verification</span>
                </div>
            </div>
        </div>

        <!-- Form Card Container -->
        <div class="drift-box rounded-3xl bg-emerald-950/50 border border-lime-accent/30 p-8 md:p-12 space-y-8">
            <form id="registration-form" action="<?= url('/api/register') ?>" method="POST" class="space-y-8">

                <div id="reg-error-msg" class="hidden p-4 rounded-xl bg-red-950/80 border border-red-500/40 text-xs font-mono text-red-200"></div>

                <!-- STEP 1: Personal Identity -->
                <div id="step-content-1" class="space-y-6">
                    <div class="border-b border-emerald-950 pb-3 flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-display font-bold text-white">Delegate Identity Credentials</h3>
                            <p class="text-xs text-slate-400 mt-1">Please provide your official identification details for summit accreditation.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[01] Full Name *</label>
                            <input type="text" id="reg-name" name="full_name" required placeholder="e.g. Aliko Dangote" class="w-full px-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[02] Corporate Email Address *</label>
                            <input type="email" id="reg-email" name="email" required placeholder="exec@organisation.com" class="w-full px-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[03] Telephone / WhatsApp *</label>
                            <input type="tel" id="reg-phone" name="phone" required placeholder="+254 700 000 000" class="w-full px-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[04] Country of Residence / Base *</label>
                            <input type="text" id="reg-country" name="country" required placeholder="e.g. Kenya, South Africa, Nigeria, Ghana, Rwanda" class="w-full px-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                        </div>
                    </div>

                    <div class="pt-4 flex justify-end">
                        <button type="button" id="to-step-2" class="lime-glow-btn px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider inline-flex items-center gap-2">
                            <span>Proceed to Enterprise Profile</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                <!-- STEP 2: Organisation & Category -->
                <div id="step-content-2" class="space-y-6 hidden">
                    <div class="border-b border-emerald-950 pb-3 flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-display font-bold text-white">Enterprise Affiliation & Focus</h3>
                            <p class="text-xs text-slate-400 mt-1">Specify your current enterprise role and participation category.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[05] Organisation / Company *</label>
                            <input type="text" id="reg-company" name="company" required placeholder="e.g. Standard Bank, Safaricom, MTN" class="w-full px-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[06] Professional Designation *</label>
                            <input type="text" id="reg-title" name="job_title" required placeholder="e.g. Chief Executive Officer, Managing Director" class="w-full px-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[07] Industry / Sector *</label>
                            <select id="reg-industry" name="industry" class="w-full px-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                                <option value="Banking & Financial Services">Banking & Financial Services</option>
                                <option value="Technology & Artificial Intelligence">Technology & Artificial Intelligence</option>
                                <option value="Energy, Mining & Infrastructure">Energy, Mining & Infrastructure</option>
                                <option value="Trade, Logistics & Manufacturing">Trade, Logistics & Manufacturing</option>
                                <option value="Healthcare & Life Sciences">Healthcare & Life Sciences</option>
                                <option value="Venture Capital & Private Equity">Venture Capital & Private Equity</option>
                                <option value="Government & Multilateral Institution">Government & Multilateral Institution</option>
                                <option value="Consumer Goods & Luxury Retail">Consumer Goods & Luxury Retail</option>
                                <option value="Other">Other Sector</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">[08] Preferred Participation Category *</label>
                            <select id="reg-category" name="category" class="w-full px-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                                <option value="Delegate">Delegate (V.I.P Plenary Attendance)</option>
                                <option value="Speaker">Speaker (Keynote / Panelist Application)</option>
                                <option value="Sponsor">Sponsor (Corporate Partnership)</option>
                                <option value="Strategic Partner">Strategic Partner (Institutional Alignment)</option>
                                <option value="Exhibitor">Exhibitor (Brand Activation Suite)</option>
                                <option value="Other">Other Category</option>
                            </select>
                        </div>
                    </div>

                    <div class="pt-4 flex justify-between items-center">
                        <button type="button" id="back-to-step-1" class="px-6 py-3 rounded-full border border-emerald-500/30 text-slate-300 hover:text-white text-xs font-mono uppercase">
                            ← Back
                        </button>
                        <button type="button" id="to-step-3" class="lime-glow-btn px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider inline-flex items-center gap-2">
                            <span>Preview Digital VIP Pass</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                <!-- STEP 3: Review & Live VIP Badge Preview -->
                <div id="step-content-3" class="space-y-6 hidden">
                    <div class="border-b border-emerald-950 pb-3 flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-display font-bold text-white">Review & Confirm Accreditation</h3>
                            <p class="text-xs text-slate-400 mt-1">Verify your credentials and view your real-time executive pass preview below.</p>
                        </div>
                    </div>

                    <!-- Pass Card Preview Snapshot -->
                    <div class="drift-box rounded-2xl bg-emerald-950/50 border border-lime-accent/30 p-6 md:p-10">
                        <div class="space-y-2 text-xs font-mono">
                            <span class="px-2.5 py-0.5 rounded-full bg-lime-accent/20 text-lime-400 border border-lime-accent/40 font-bold uppercase text-[10px]" id="preview-category">
                                Delegate V.I.P
                            </span>
                            <h4 id="preview-name" class="text-2xl font-display font-black text-white uppercase">
                                [Your Name]
                            </h4>
                            <p id="preview-role" class="text-lime-300 font-semibold">[Designation] ~ [Company]</p>
                            <p id="preview-country" class="text-slate-400">[Country]</p>
                            <div class="text-[11px] text-ochre-gold pt-2">
                                March 24-26, 2027 ~ JW Marriott Hotel Nairobi, Kenya
                            </div>
                        </div>

                        <div class="w-24 h-24 rounded-xl bg-emerald-950 border border-lime-accent/40 flex flex-col items-center justify-center text-center p-2 shrink-0">
                            <i data-lucide="qr-code" class="w-12 h-12 text-lime-400"></i>
                            <span class="text-[9px] font-mono text-slate-400 uppercase mt-1">Pass Preview</span>
                        </div>
                    </div>

                    <div class="pt-4 flex justify-between items-center">
                        <button type="button" id="back-to-step-2" class="px-6 py-3 rounded-full border border-emerald-500/30 text-slate-300 hover:text-white text-xs font-mono uppercase">
                            ← Edit Credentials
                        </button>
                        <button type="submit" id="submit-reg-btn" class="lime-glow-btn px-9 py-4 rounded-full text-xs sm:text-sm font-extrabold uppercase tracking-wider inline-flex items-center gap-2">
                            <span>Register My Interest</span>
                            <i data-lucide="check-circle" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>

            </form>
        </div>

        <!-- REGISTRATION CONFIRMATION STATE (From Document) -->
        <div id="confirmation-view" class="hidden text-center py-8 space-y-6">
            <div class="w-20 h-20 rounded-full bg-lime-accent/20 border-2 border-lime-accent mx-auto flex items-center justify-center text-lime-accent">
                <i data-lucide="check" class="w-10 h-10"></i>
            </div>

            <div class="space-y-3">
                <span class="px-3 py-1 rounded-full bg-emerald-950 text-lime-400 font-mono text-xs uppercase tracking-widest border border-lime-accent/30">
                    Registration Received // More details to follow
                </span>
                <h3 class="text-3xl md:text-4xl font-display font-black text-white">
                    REGISTRATION CONFIRMATION
                </h3>
                <p class="text-base text-slate-200 max-w-xl mx-auto leading-relaxed">
                    Thank you for expressing interest in <strong>The African Executive Feature Summit 2027</strong>.
                </p>
                <p class="text-xs md:text-sm text-slate-400 max-w-lg mx-auto leading-relaxed">
                    Your details have been received. Our team will share relevant updates and further participation information as it becomes available.
                </p>
                <div class="font-display  text-lg text-lime-accent font-bold pt-2">
                    SHAPING AFRICA'S FUTURE.
                </div>
            </div>

            <!-- Calendar & Download Actions -->
            <div class="pt-6 flex flex-wrap items-center justify-center gap-4">
                <button id="download-ics-btn" class="px-6 py-3.5 rounded-full bg-emerald-950 border border-lime-accent/50 text-lime-300 hover:bg-emerald-900 font-mono text-xs uppercase tracking-wider inline-flex items-center gap-2 transition-all">
                    <i data-lucide="calendar-plus" class="w-4 h-4"></i>
                    <span>Add to Calendar (.ICS)</span>
                </button>
                <button onclick="window.print()" class="px-6 py-3.5 rounded-full border border-slate-700 text-slate-300 hover:text-white font-mono text-xs uppercase tracking-wider inline-flex items-center gap-2">
                    <i data-lucide="printer" class="w-4 h-4"></i>
                    <span>Print Accreditation Voucher</span>
                </button>
                <a href="<?= url('/') ?>" class="px-6 py-3.5 rounded-full lime-glow-btn text-xs font-bold uppercase tracking-wider">
                    Return to Plenary
                </a>
            </div>
        </div>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('registration-form');
    const msg = document.getElementById('reg-error-msg');
    const confirmationView = document.getElementById('confirmation-view');

    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Registering...';

        // Collect form data from steps
        const data = {
            full_name: document.getElementById('reg-name').value,
            email: document.getElementById('reg-email').value,
            phone: document.getElementById('reg-phone').value,
            country: document.getElementById('reg-country').value,
            company: document.getElementById('reg-company').value,
            job_title: document.getElementById('reg-title').value,
            industry: document.getElementById('reg-industry').value,
            category: document.getElementById('reg-category').value
        };

        try {
            const res = await fetch('<?= url('/api/register') ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
            const result = await res.json();

            if (result.success) {
                // Show confirmation view, hide form
                form.classList.add('hidden');
                confirmationView.classList.remove('hidden');
                document.getElementById('confirmed-pass-code').textContent = 'Details will be shared via email.';
            } else {
                msg.classList.remove('hidden');
                msg.textContent = result.message || 'Registration failed. Please try again.';
            }
        } catch (err) {
            msg.classList.remove('hidden');
            msg.textContent = 'Network error. Please try again.';
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Register My Interest';
        }
    });
});
</script>
<?php
/**
 * Master Footer Layout
 * The African Executive Feature Summit 2027
 */

$config = $config ?? (require __DIR__ . '/../../config/app.php');
?>
    <!-- African Geometric Heritage Divider -->
    <div class="w-full h-3 md:h-4 african-pattern-strip border-t border-b border-ochre-gold/30"></div>

    <!-- Executive Footer -->
    <footer class="w-full bg-[#030604] border-t border-emerald-950/80 pt-16 pb-12 text-slate-400 relative overflow-hidden">
        <!-- Ambient Background Glow -->
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[800px] h-[300px] bg-emerald-600/5 blur-[120px] pointer-events-none -z-10"></div>

        <div class="max-w-7xl mx-auto px-6 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 pb-12 border-b border-emerald-900/30">
                
                <!-- Column 1: Branding & Ethos (4 cols) -->
                <div class="lg:col-span-4 space-y-4">
                    <a href="<?= url('/') ?>" class="inline-block">
                        <img src="<?= url('/assets/images/summit-logo.png') ?>" alt="The African Executive Feature Summit 2027 Logo" class="h-12 md:h-14 w-auto object-contain filter drop-shadow">
                    </a>
                    <p class="text-xs md:text-sm text-slate-400 leading-relaxed max-w-sm">
                        Creating a space for shared ideas, meaningful connections, and collective conversations towards shaping Africa's economic advancement and sovereign future.
                    </p>
                    <div class="pt-2 flex items-center gap-2 font-mono text-xs text-lime-400/90">
                        <i data-lucide="map-pin" class="w-4 h-4"></i>
                        <span>JW Marriott Hotel ~ Nairobi, Kenya | March 2027</span>
                    </div>
                </div>

                <!-- Column 2: Navigation (2 cols) -->
                <div class="lg:col-span-2 space-y-3">
                    <h3 class="font-mono text-xs text-white uppercase tracking-widest font-semibold">Summit Portal</h3>
                    <ul class="space-y-2 text-xs md:text-sm">
                        <?php foreach ($config['navigation'] as $nav): ?>
                            <li>
                                <a href="<?= url($nav['url']) ?>" class="hover:text-lime-accent transition-colors flex items-center gap-1.5">
                                    <span class="text-emerald-500">›</span> <?= htmlspecialchars($nav['label']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Column 3: Thematic Focus (3 cols) -->
                <div class="lg:col-span-3 space-y-3">
                    <h3 class="font-mono text-xs text-white uppercase tracking-widest font-semibold">Conversation Tracks</h3>
                    <ul class="space-y-2 text-xs">
                        <?php foreach (array_slice($config['conversation_tracks'], 0, 4) as $track): ?>
                            <li>
                                <a href="<?= url('/about#tracks') ?>" class="hover:text-lime-accent transition-colors block text-slate-400 truncate">
                                    • <?= htmlspecialchars($track['title']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <li>
                            <a href="<?= url('/about#tracks') ?>" class="text-lime-400 hover:underline text-[11px] font-mono inline-flex items-center gap-1 mt-1">
                                View All 6 Tracks <i data-lucide="arrow-right" class="w-3 h-3"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Column 4: Concierge & Direct Lines (3 cols) -->
                <div class="lg:col-span-3 space-y-3">
                    <h3 class="font-mono text-xs text-white uppercase tracking-widest font-semibold">Secretariat Enquiries</h3>
                    <div class="space-y-2 text-xs">
                        <div class="flex items-start gap-2">
                            <i data-lucide="mail" class="w-4 h-4 text-lime-accent shrink-0 mt-0.5"></i>
                            <a href="mailto:<?= htmlspecialchars($config['contact']['general_email']) ?>" class="hover:text-white transition-colors">
                                <?= htmlspecialchars($config['contact']['general_email']) ?>
                            </a>
                        </div>
                        <div class="flex items-start gap-2">
                            <i data-lucide="shield-check" class="w-4 h-4 text-ochre-gold shrink-0 mt-0.5"></i>
                            <a href="mailto:<?= htmlspecialchars($config['contact']['partnership_email']) ?>" class="hover:text-white transition-colors">
                                <?= htmlspecialchars($config['contact']['partnership_email']) ?>
                            </a>
                        </div>
                        <div class="flex items-start gap-2">
                            <i data-lucide="phone" class="w-4 h-4 text-slate-400 shrink-0 mt-0.5"></i>
                            <span><?= htmlspecialchars($config['contact']['phone']) ?></span>
                        </div>
                    </div>

                    <!-- Social Icons -->
                    <div class="pt-3">
                        <span class="text-[11px] font-mono text-slate-500 block mb-2 uppercase">Follow The Conversation:</span>
                        <div class="flex items-center gap-3">
                            <a href="<?= htmlspecialchars($config['contact']['social']['linkedin']) ?>" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-lg bg-emerald-950/70 border border-emerald-500/20 flex items-center justify-center text-slate-300 hover:text-lime-accent hover:border-lime-accent transition-all" aria-label="LinkedIn">
                                <i data-lucide="linkedin" class="w-4 h-4"></i>
                            </a>
                            <a href="<?= htmlspecialchars($config['contact']['social']['instagram']) ?>" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-lg bg-emerald-950/70 border border-emerald-500/20 flex items-center justify-center text-slate-300 hover:text-lime-accent hover:border-lime-accent transition-all" aria-label="Instagram">
                                <i data-lucide="instagram" class="w-4 h-4"></i>
                            </a>
                            <a href="<?= htmlspecialchars($config['contact']['social']['youtube']) ?>" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-lg bg-emerald-950/70 border border-emerald-500/20 flex items-center justify-center text-slate-300 hover:text-lime-accent hover:border-lime-accent transition-all" aria-label="YouTube">
                                <i data-lucide="youtube" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Sub-Footer -->
            <div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-xs font-mono text-slate-500">
                <div class="text-center md:text-left">
                    &copy; 2027 The African Executive Feature Summit. All Rights Reserved. Nairobi, Kenya.
                </div>
                <div class="text-center md:text-right">
                    Powered by <a href="https://veen.africa" target="_blank" rel="noopener noreferrer" class="text-lime-accent hover:underline">Veen Africa</a>
                </div>
                <div class="flex items-center gap-4">
                    <a href="<?= url('/register') ?>" class="text-lime-accent hover:underline">Register Interest</a>
                    <a href="<?= url('/contact') ?>" class="text-slate-400 hover:underline">Contact</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- GSAP & ScrollTrigger CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <!-- Lenis Smooth Scroll -->
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>

    <!-- Master Scripts -->
    <script src="<?= url('/assets/js/app.js') ?>"></script>
    <script src="<?= url('/assets/js/vip-pass.js') ?>"></script>
    <script src="<?= url('/assets/js/register.js') ?>"></script>

    <script>
        // Initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</body>
</html>

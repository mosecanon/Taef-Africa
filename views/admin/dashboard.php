<?php
/**
 * Admin Console Dashboard View
 */
include __DIR__ . '/layout/header.php';
?>

<div class="space-y-8">
    
    <!-- Top Welcome Banner -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-emerald-950">
        <div>
            <h1 class="text-2xl md:text-3xl font-display font-black text-white">Executive Secretariat Overview</h1>
            <p class="text-xs text-slate-400 mt-1">Real-time status of delegate accreditations, speaker submissions, and plenary logistics.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/admin/registrations/export') ?>" class="px-4 py-2.5 rounded-full bg-emerald-950 border border-emerald-500/30 text-lime-300 hover:bg-emerald-900 text-xs font-mono font-semibold inline-flex items-center gap-2 transition-all">
                <i data-lucide="download" class="w-3.5 h-3.5"></i>
                <span>Export Accreditation CSV</span>
            </a>
            <a href="<?= url('/admin/speakers') ?>" class="lime-glow-btn px-4 py-2.5 rounded-full text-xs font-mono font-bold uppercase tracking-wider inline-flex items-center gap-2">
                <i data-lucide="mic" class="w-3.5 h-3.5"></i>
                <span>Speaker Desk</span>
            </a>
        </div>
    </div>

    <!-- 5 KPI Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- Total Registrations -->
        <div class="glass-panel p-6 rounded-2xl border border-emerald-500/20 space-y-2">
            <div class="flex items-center justify-between text-xs font-mono text-slate-400">
                <span>Accredited Delegates</span>
                <i data-lucide="users" class="w-4 h-4 text-lime-400"></i>
            </div>
            <div class="text-3xl font-display font-extrabold text-white">
                <?= $regTotal ?>
            </div>
            <div class="text-[10px] font-mono text-emerald-400 flex items-center gap-1">
                <span>C-Suite, Founders & Investors</span>
            </div>
        </div>

        <!-- Confirmed Speakers -->
        <div class="glass-panel p-6 rounded-2xl border border-emerald-500/20 space-y-2">
            <div class="flex items-center justify-between text-xs font-mono text-slate-400">
                <span>Plenary Faculty</span>
                <i data-lucide="mic" class="w-4 h-4 text-ochre-gold"></i>
            </div>
            <div class="text-3xl font-display font-extrabold text-white">
                <?= $spkTotal ?>
            </div>
            <div class="text-[10px] font-mono text-ochre-gold flex items-center gap-1">
                <span>Confirmed Keynotes & Paneling</span>
            </div>
        </div>

        <!-- Pending Pitches -->
        <div class="glass-panel p-6 rounded-2xl border border-emerald-500/20 space-y-2">
            <div class="flex items-center justify-between text-xs font-mono text-slate-400">
                <span>Speaker Pitches</span>
                <i data-lucide="file-text" class="w-4 h-4 text-lime-accent"></i>
            </div>
            <div class="text-3xl font-display font-extrabold text-lime-accent">
                <?= $pitchesPending ?>
            </div>
            <div class="text-[10px] font-mono text-slate-400">
                <span>Awaiting Plenary Board Vetting</span>
            </div>
        </div>

        <!-- Corporate Partnerships -->
        <div class="glass-panel p-6 rounded-2xl border border-emerald-500/20 space-y-2">
            <div class="flex items-center justify-between text-xs font-mono text-slate-400">
                <span>Sponsorship Leads</span>
                <i data-lucide="shield-check" class="w-4 h-4 text-emerald-400"></i>
            </div>
            <div class="text-3xl font-display font-extrabold text-white">
                <?= $partnerCount ?>
            </div>
            <div class="text-[10px] font-mono text-slate-400">
                <span>Active Title & Platinum Pipeline</span>
            </div>
        </div>

    </div>

    <!-- Cache & Architecture Health Widget -->
    <div class="p-5 rounded-2xl bg-black/60 border border-emerald-950 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 text-xs font-mono">
        <div class="flex items-center gap-3">
            <span class="w-3 h-3 rounded-full <?= $isRedis ? 'bg-lime-400 animate-ping' : 'bg-emerald-400' ?>"></span>
            <div>
                <span class="text-slate-400">Caching Engine:</span>
                <span class="text-white font-bold ml-1"><?= htmlspecialchars($cacheDriver) ?></span>
            </div>
        </div>
        <div class="flex items-center gap-4 text-slate-400 text-[11px]">
            <span>Database: <strong class="text-lime-300">PDO SQLite</strong></span>
            <span>Venue: <strong class="text-slate-200">JW Marriott Nairobi</strong></span>
            <span>Target: <strong class="text-ochre-gold">March 2027</strong></span>
        </div>
    </div>

    <!-- Dual Tables: Recent Registrations & Incoming Speaker Pitches -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left: Recent Registrations (7 cols) -->
        <div class="lg:col-span-7 glass-panel p-6 rounded-2xl border border-emerald-500/20 space-y-4">
            <div class="flex items-center justify-between border-b border-emerald-950 pb-3">
                <h3 class="text-sm font-mono font-bold text-white uppercase tracking-wider flex items-center gap-2">
                    <i data-lucide="user-check" class="w-4 h-4 text-lime-400"></i>
                    <span>Recent Delegate Accreditations</span>
                </h3>
                <a href="<?= url('/admin/registrations') ?>" class="text-xs font-mono text-lime-accent hover:underline">
                    View All (<?= $regTotal ?>) →
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs font-mono">
                    <thead>
                        <tr class="text-slate-500 border-b border-emerald-950/80 text-[11px]">
                            <th class="pb-2.5">Pass Code</th>
                            <th class="pb-2.5">Delegate</th>
                            <th class="pb-2.5">Organisation</th>
                            <th class="pb-2.5">Category</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-emerald-950/60">
                        <?php if (empty($recentRegs)): ?>
                            <tr>
                                <td colspan="4" class="py-4 text-center text-slate-500">No registrations logged yet.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recentRegs as $r): ?>
                                <tr class="hover:bg-emerald-950/30 transition-colors">
                                    <td class="py-2.5 font-bold text-lime-300"><?= htmlspecialchars($r['pass_code']) ?></td>
                                    <td class="py-2.5 text-white font-medium">
                                        <?= htmlspecialchars($r['full_name']) ?>
                                        <span class="block text-[10px] text-slate-500"><?= htmlspecialchars($r['country']) ?></span>
                                    </td>
                                    <td class="py-2.5 text-slate-300"><?= htmlspecialchars($r['company']) ?></td>
                                    <td class="py-2.5">
                                        <span class="px-2 py-0.5 rounded-full bg-emerald-950 text-lime-400 border border-lime-accent/20 text-[10px]">
                                            <?= htmlspecialchars($r['category']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right: Incoming Speaker Pitches (5 cols) -->
        <div class="lg:col-span-5 glass-panel p-6 rounded-2xl border border-emerald-500/20 space-y-4">
            <div class="flex items-center justify-between border-b border-emerald-950 pb-3">
                <h3 class="text-sm font-mono font-bold text-white uppercase tracking-wider flex items-center gap-2">
                    <i data-lucide="mic" class="w-4 h-4 text-ochre-gold"></i>
                    <span>Speaker Applications</span>
                </h3>
                <a href="<?= url('/admin/speakers') ?>" class="text-xs font-mono text-ochre-gold hover:underline">
                    Vetting Queue →
                </a>
            </div>

            <div class="space-y-3">
                <?php if (empty($recentPitches)): ?>
                    <div class="py-6 text-center text-slate-500 text-xs font-mono">
                        No pending speaker pitches at this moment.
                    </div>
                <?php else: ?>
                    <?php foreach ($recentPitches as $p): ?>
                        <div class="p-3.5 rounded-xl bg-black/50 border border-emerald-950 space-y-2 text-xs">
                            <div class="flex items-start justify-between gap-2">
                                <div>
                                    <h4 class="font-bold text-white"><?= htmlspecialchars($p['full_name']) ?></h4>
                                    <span class="text-[10px] font-mono text-lime-400"><?= htmlspecialchars($p['designation']) ?> ~ <?= htmlspecialchars($p['organisation']) ?></span>
                                </div>
                                <span class="px-2 py-0.5 rounded-full text-[9px] font-mono <?= ($p['status'] === 'Approved') ? 'bg-emerald-950 text-lime-300 border border-lime-accent/30' : 'bg-ochre-gold/15 text-ochre-gold border border-ochre-gold/30' ?>">
                                    <?= htmlspecialchars($p['status']) ?>
                                </span>
                            </div>
                            <p class="text-[11px] text-slate-300 italic line-clamp-2">
                                "<?= htmlspecialchars($p['proposed_topic']) ?>"
                            </p>
                            <?php if ($p['status'] !== 'Approved'): ?>
                                <button class="quick-approve-btn text-[10px] font-mono font-bold text-lime-accent hover:underline flex items-center gap-1" data-id="<?= $p['id'] ?>" data-name="<?= htmlspecialchars($p['full_name']) ?>">
                                    <i data-lucide="check" class="w-3 h-3"></i>
                                    <span>Approve as Plenary Faculty</span>
                                </button>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Quick approve speaker
    document.querySelectorAll('.quick-approve-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const appId = btn.dataset.id;
            const name = btn.dataset.name;
            if (!confirm(`Confirm approval of ${name} as official plenary speaker?`)) return;

            btn.disabled = true;
            btn.textContent = 'Approving...';

            try {
                const res = await fetch('<?= url('/admin/speakers/approve') ?>', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ application_id: appId })
                });
                const data = await res.json();
                if (data.success) {
                    showToast(data.message, true);
                    setTimeout(() => location.reload(), 1000);
                } else {
                    showToast(data.message || 'Error approving speaker', false);
                    btn.disabled = false;
                }
            } catch (e) {
                showToast('Failed to connect to admin server.', false);
                btn.disabled = false;
            }
        });
    });
});
</script>

<?php include __DIR__ . '/layout/footer.php'; ?>

<?php
/**
 * Admin Console Speakers & Vetting Desk View
 */
include __DIR__ . '/layout/header.php';
?>

<div class="space-y-8">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-emerald-950">
        <div>
            <h1 class="text-2xl md:text-3xl font-display font-black text-white">Speaker Desk & Plenary Scheduling</h1>
            <p class="text-xs text-slate-400 mt-1">Review incoming speaking proposals, approve accredited faculty, and assign stages.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-3 py-1.5 rounded-full bg-emerald-950 border border-lime-accent/30 text-lime-400 font-mono text-xs">
                <?= count($speakers) ?> Confirmed Faculty
            </span>
            <span class="px-3 py-1.5 rounded-full bg-black border border-ochre-gold/30 text-ochre-gold font-mono text-xs">
                <?= count($applications) ?> Total Applications
            </span>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="flex items-center gap-3 border-b border-emerald-950 pb-2 text-xs font-mono">
        <button id="tab-btn-applications" class="spk-tab-btn px-4 py-2 rounded-xl bg-lime-accent text-black font-bold uppercase tracking-wider transition-all" data-target="tab-applications">
            Incoming Applications (<?= count($applications) ?>)
        </button>
        <button id="tab-btn-confirmed" class="spk-tab-btn px-4 py-2 rounded-xl bg-emerald-950/60 text-slate-400 hover:text-white uppercase tracking-wider transition-all" data-target="tab-confirmed">
            Confirmed Faculty (<?= count($speakers) ?>)
        </button>
        <button id="tab-btn-sessions" class="spk-tab-btn px-4 py-2 rounded-xl bg-emerald-950/60 text-slate-400 hover:text-white uppercase tracking-wider transition-all" data-target="tab-sessions">
            Stage Schedule (<?= count($sessions) ?>)
        </button>
    </div>

    <!-- TAB 1: INCOMING SPEAKER APPLICATIONS -->
    <div id="tab-applications" class="spk-tab-content space-y-6">
        <div class="glass-panel p-6 rounded-2xl border border-emerald-500/20 space-y-4">
            <h3 class="text-sm font-mono font-bold text-white uppercase tracking-wider">
                Vetting Queue // Plenary Applications
            </h3>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs font-mono">
                    <thead>
                        <tr class="text-slate-500 border-b border-emerald-950/80 text-[11px]">
                            <th class="pb-3">Applicant Name</th>
                            <th class="pb-3">Enterprise / Role</th>
                            <th class="pb-3">Category</th>
                            <th class="pb-3">Proposed Topic</th>
                            <th class="pb-3">Status</th>
                            <th class="pb-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-emerald-950/60">
                        <?php if (empty($applications)): ?>
                            <tr>
                                <td colspan="6" class="py-6 text-center text-slate-500">No applications received yet.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($applications as $app): ?>
                                <tr class="hover:bg-emerald-950/30 transition-colors">
                                    <td class="py-3 text-white font-medium">
                                        <?= htmlspecialchars($app['full_name']) ?>
                                        <span class="block text-[10px] text-slate-500"><?= htmlspecialchars($app['email']) ?></span>
                                    </td>
                                    <td class="py-3 text-slate-300">
                                        <?= htmlspecialchars($app['designation']) ?>
                                        <span class="block text-[10px] text-slate-400"><?= htmlspecialchars($app['organisation']) ?></span>
                                    </td>
                                    <td class="py-3 text-slate-400"><?= htmlspecialchars($app['category']) ?></td>
                                    <td class="py-3 text-slate-200 max-w-xs">
                                        <div class="line-clamp-2 italic" title="<?= htmlspecialchars($app['proposed_topic']) ?>">
                                            "<?= htmlspecialchars($app['proposed_topic']) ?>"
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        <span class="px-2 py-0.5 rounded-full text-[10px] <?= ($app['status'] === 'Approved') ? 'bg-emerald-950 text-lime-300 border border-lime-accent/30' : 'bg-ochre-gold/15 text-ochre-gold border border-ochre-gold/30' ?>">
                                            <?= htmlspecialchars($app['status']) ?>
                                        </span>
                                    </td>
                                    <td class="py-3 text-right">
                                        <?php if ($app['status'] !== 'Approved'): ?>
                                            <button class="approve-app-btn px-3 py-1.5 rounded-full bg-lime-accent text-black font-bold hover:bg-lime-300 text-[10px] uppercase tracking-wider transition-all shadow-sm" data-id="<?= $app['id'] ?>" data-name="<?= htmlspecialchars($app['full_name']) ?>">
                                                Approve
                                            </button>
                                        <?php else: ?>
                                            <span class="text-[10px] text-emerald-400 font-bold">✓ Published</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- TAB 2: CONFIRMED PLENARY FACULTY -->
    <div id="tab-confirmed" class="spk-tab-content space-y-6 hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($speakers as $spk): ?>
                <div class="glass-panel p-5 rounded-2xl border border-emerald-500/20 flex gap-4 items-start">
                    <img src="<?= htmlspecialchars($spk['photo_url']) ?>" alt="Speaker" class="w-16 h-16 rounded-xl object-cover object-top border border-lime-accent shrink-0">
                    <div class="space-y-1 text-xs">
                        <span class="text-[9px] font-mono text-lime-400 font-bold uppercase"><?= htmlspecialchars($spk['country']) ?></span>
                        <h4 class="font-bold text-white text-sm"><?= htmlspecialchars($spk['full_name']) ?></h4>
                        <p class="text-[11px] text-slate-300"><?= htmlspecialchars($spk['designation']) ?></p>
                        <p class="text-[10px] text-slate-500 truncate"><?= htmlspecialchars($spk['organisation']) ?></p>
                        <div class="pt-2 text-[10px] font-mono text-ochre-gold italic line-clamp-1">
                            "<?= htmlspecialchars($spk['topic']) ?>"
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- TAB 3: STAGE SESSIONS -->
    <div id="tab-sessions" class="spk-tab-content space-y-6 hidden">
        <div class="glass-panel p-6 rounded-2xl border border-emerald-500/20 space-y-4">
            <h3 class="text-sm font-mono font-bold text-white uppercase tracking-wider">
                JW Marriott Plenary Stage Schedule // March 2027
            </h3>

            <div class="space-y-3">
                <?php foreach ($sessions as $s): ?>
                    <div class="p-4 rounded-xl bg-black/60 border border-emerald-950 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 text-xs font-mono">
                        <div class="space-y-1">
                            <span class="px-2 py-0.5 rounded bg-lime-accent/15 text-lime-300 font-bold text-[10px] border border-lime-accent/30">
                                <?= htmlspecialchars($s['stage']) ?>
                            </span>
                            <h4 class="text-sm font-bold text-white mt-1"><?= htmlspecialchars($s['title']) ?></h4>
                            <p class="text-[11px] text-slate-400">
                                Faculty: <span class="text-ochre-gold font-bold"><?= htmlspecialchars($s['speaker_name'] ?? 'To Be Confirmed') ?></span>
                            </p>
                        </div>
                        <div class="text-right shrink-0">
                            <div class="text-white font-bold"><?= htmlspecialchars($s['day_date']) ?></div>
                            <div class="text-lime-400"><?= htmlspecialchars($s['start_time']) ?> - <?= htmlspecialchars($s['end_time']) ?></div>
                            <span class="text-[10px] text-slate-500 uppercase"><?= htmlspecialchars($s['format']) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Tab switching
    const tabBtns = document.querySelectorAll('.spk-tab-btn');
    const tabContents = document.querySelectorAll('.spk-tab-content');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            tabBtns.forEach(b => {
                b.classList.remove('bg-lime-accent', 'text-black', 'font-bold');
                b.classList.add('bg-emerald-950/60', 'text-slate-400');
            });
            btn.classList.add('bg-lime-accent', 'text-black', 'font-bold');
            btn.classList.remove('bg-emerald-950/60', 'text-slate-400');

            const target = btn.dataset.target;
            tabContents.forEach(tc => {
                if (tc.id === target) {
                    tc.classList.remove('hidden');
                } else {
                    tc.classList.add('hidden');
                }
            });
        });
    });

    // Approve applicant
    document.querySelectorAll('.approve-app-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const id = btn.dataset.id;
            const name = btn.dataset.name;
            if (!confirm(`Approve ${name} as speaker? This will sync them to the live public site.`)) return;

            btn.disabled = true;
            btn.textContent = 'Approving...';

            try {
                const res = await fetch('<?= url('/admin/speakers/approve') ?>', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ application_id: id })
                });
                const data = await res.json();
                if (data.success) {
                    showToast(data.message, true);
                    setTimeout(() => location.reload(), 1200);
                } else {
                    showToast(data.message || 'Error approving speaker', false);
                    btn.disabled = false;
                }
            } catch (e) {
                showToast('Failed to reach admin API.', false);
                btn.disabled = false;
            }
        });
    });
});
</script>

<?php include __DIR__ . '/layout/footer.php'; ?>

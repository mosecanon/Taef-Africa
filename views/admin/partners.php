<?php
/**
 * Admin Console Corporate Partners CRM View
 */
include __DIR__ . '/layout/header.php';
?>

<div class="space-y-8">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-emerald-950">
        <div>
            <h1 class="text-2xl md:text-3xl font-display font-black text-white">Corporate Partnerships & Sponsors</h1>
            <p class="text-xs text-slate-400 mt-1">Institutional deal pipeline, title sponsor leads, and confidential prospectus requests.</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="px-3.5 py-1.5 rounded-full bg-emerald-950 border border-ochre-gold/30 text-ochre-gold font-mono text-xs">
                <?= count($inquiries) ?> Active Leads
            </span>
        </div>
    </div>

    <!-- Partnership Leads Table -->
    <div class="glass-panel p-6 rounded-2xl border border-emerald-500/20 space-y-4">
        <div class="flex items-center justify-between text-xs font-mono text-slate-400 border-b border-emerald-950 pb-3">
            <h3 class="text-sm font-mono font-bold text-white uppercase tracking-wider">
                Institutional Partnership Inquiries
            </h3>
            <span class="text-[11px] text-lime-400">Prospectus Dispatches Active</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs font-mono">
                <thead>
                    <tr class="text-slate-500 border-b border-emerald-950/80 text-[11px]">
                        <th class="pb-3">Institution / Company</th>
                        <th class="pb-3">Executive Contact</th>
                        <th class="pb-3">Tier of Interest</th>
                        <th class="pb-3">Budget Range</th>
                        <th class="pb-3">Objectives / Notes</th>
                        <th class="pb-3">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-emerald-950/60">
                    <?php if (empty($inquiries)): ?>
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-500">
                                No partnership inquiries logged yet.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($inquiries as $p): ?>
                            <tr class="hover:bg-emerald-950/30 transition-colors">
                                <td class="py-3 text-white font-bold">
                                    <?= htmlspecialchars($p['company']) ?>
                                </td>
                                <td class="py-3 text-slate-300">
                                    <span class="font-medium text-white"><?= htmlspecialchars($p['contact_name']) ?></span>
                                    <span class="block text-[10px] text-slate-400"><?= htmlspecialchars($p['email']) ?></span>
                                    <span class="block text-[10px] text-slate-500"><?= htmlspecialchars($p['phone']) ?></span>
                                </td>
                                <td class="py-3">
                                    <span class="px-2.5 py-1 rounded-full bg-ochre-gold/15 text-ochre-gold border border-ochre-gold/30 text-[10px] font-bold">
                                        <?= htmlspecialchars($p['tier_interest']) ?>
                                    </span>
                                </td>
                                <td class="py-3 text-slate-400 text-[11px]"><?= htmlspecialchars($p['budget_range'] ?? 'Undisclosed') ?></td>
                                <td class="py-3 text-slate-300 max-w-xs">
                                    <div class="line-clamp-2 italic" title="<?= htmlspecialchars($p['message'] ?? '') ?>">
                                        <?= htmlspecialchars($p['message'] ? '"' . $p['message'] . '"' : 'Direct Proposal Requested') ?>
                                    </div>
                                </td>
                                <td class="py-3 text-[10px] text-slate-500"><?= date('M j, Y', strtotime($p['created_at'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include __DIR__ . '/layout/footer.php'; ?>

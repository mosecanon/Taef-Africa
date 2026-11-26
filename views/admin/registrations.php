<?php
/**
 * Admin Console Delegate Registrations Roster
 */
include __DIR__ . '/layout/header.php';
?>

<div class="space-y-8">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-emerald-950">
        <div>
            <h1 class="text-2xl md:text-3xl font-display font-black text-white">Delegate Accreditation Roster</h1>
            <p class="text-xs text-slate-400 mt-1">Manage accredited executive attendees, verify credentials, and export badge logs.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/admin/registrations/export') ?>" class="lime-glow-btn px-4 py-2.5 rounded-full text-xs font-mono font-bold uppercase tracking-wider inline-flex items-center gap-2">
                <i data-lucide="download" class="w-3.5 h-3.5"></i>
                <span>Download Accreditation CSV</span>
            </a>
        </div>
    </div>

    <!-- Search & Filter Bar -->
    <div class="glass-panel p-4 rounded-2xl border border-emerald-500/20">
        <form method="GET" action="<?= url('/admin/registrations') ?>" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center text-xs font-mono">
            <div class="md:col-span-7 relative">
                <i data-lucide="search" class="w-4 h-4 text-slate-500 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                <input type="text" name="q" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>" placeholder="Search by name, company, email, or pass code..." class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
            </div>

            <div class="md:col-span-3">
                <select name="category" class="w-full px-3 py-2.5 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                    <option value="">All Categories</option>
                    <option value="Delegate" <?= (($_GET['category'] ?? '') === 'Delegate') ? 'selected' : '' ?>>Delegate</option>
                    <option value="Speaker" <?= (($_GET['category'] ?? '') === 'Speaker') ? 'selected' : '' ?>>Speaker</option>
                    <option value="Sponsor" <?= (($_GET['category'] ?? '') === 'Sponsor') ? 'selected' : '' ?>>Sponsor</option>
                    <option value="Strategic Partner" <?= (($_GET['category'] ?? '') === 'Strategic Partner') ? 'selected' : '' ?>>Strategic Partner</option>
                    <option value="Exhibitor" <?= (($_GET['category'] ?? '') === 'Exhibitor') ? 'selected' : '' ?>>Exhibitor</option>
                </select>
            </div>

            <div class="md:col-span-2 flex gap-2">
                <button type="submit" class="w-full px-4 py-2.5 rounded-xl bg-emerald-950 border border-lime-accent/40 text-lime-300 hover:bg-emerald-900 font-bold uppercase transition-all">
                    Filter
                </button>
                <?php if (!empty($_GET['q']) || !empty($_GET['category'])): ?>
                    <a href="<?= url('/admin/registrations') ?>" class="px-3 py-2.5 rounded-xl border border-slate-700 text-slate-400 hover:text-white flex items-center justify-center">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Registrations Data Table -->
    <div class="glass-panel p-6 rounded-2xl border border-emerald-500/20 space-y-4">
        <div class="flex items-center justify-between text-xs font-mono text-slate-400 border-b border-emerald-950 pb-3">
            <span>Showing <strong class="text-white"><?= count($registrations) ?></strong> Accredited Records</span>
            <span class="text-[11px] text-emerald-400">Plenary Access Confirmed</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs font-mono">
                <thead>
                    <tr class="text-slate-500 border-b border-emerald-950/80 text-[11px]">
                        <th class="pb-3">Pass Code</th>
                        <th class="pb-3">Delegate Name</th>
                        <th class="pb-3">Organisation & Role</th>
                        <th class="pb-3">Industry</th>
                        <th class="pb-3">Country</th>
                        <th class="pb-3">Category</th>
                        <th class="pb-3">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-emerald-950/60">
                    <?php if (empty($registrations)): ?>
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-500">
                                No delegate accreditations match the specified criteria.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($registrations as $reg): ?>
                            <tr class="hover:bg-emerald-950/30 transition-colors">
                                <td class="py-3 font-bold text-lime-300">
                                    <span class="px-2 py-0.5 rounded bg-black/60 border border-lime-accent/30">
                                        <?= htmlspecialchars($reg['pass_code']) ?>
                                    </span>
                                </td>
                                <td class="py-3 text-white font-medium">
                                    <?= htmlspecialchars($reg['full_name']) ?>
                                    <span class="block text-[10px] text-slate-400"><?= htmlspecialchars($reg['email']) ?></span>
                                    <span class="block text-[10px] text-slate-500"><?= htmlspecialchars($reg['phone']) ?></span>
                                </td>
                                <td class="py-3 text-slate-300">
                                    <span class="font-bold text-white"><?= htmlspecialchars($reg['company']) ?></span>
                                    <span class="block text-[10px] text-slate-400"><?= htmlspecialchars($reg['job_title']) ?></span>
                                </td>
                                <td class="py-3 text-slate-400 text-[11px]"><?= htmlspecialchars($reg['industry']) ?></td>
                                <td class="py-3 text-slate-300 font-semibold"><?= htmlspecialchars($reg['country']) ?></td>
                                <td class="py-3">
                                    <span class="px-2.5 py-0.5 rounded-full bg-emerald-950 text-lime-400 border border-lime-accent/20 text-[10px] font-bold">
                                        <?= htmlspecialchars($reg['category']) ?>
                                    </span>
                                </td>
                                <td class="py-3 text-[10px] text-slate-500"><?= date('M j, Y', strtotime($reg['created_at'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include __DIR__ . '/layout/footer.php'; ?>

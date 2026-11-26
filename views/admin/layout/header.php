<?php
/**
 * Admin Console Master Header
 */
$activeTab = $activeTab ?? 'dashboard';
$currentUser = $currentUser ?? ['username' => 'admin', 'role' => 'superadmin'];
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'AEFS 2027 Executive Console') ?></title>
    <link rel="icon" type="image/png" href="<?= url('/assets/images/summit-logo.png') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        obsidian: '#050806',
                        forest: {
                            DEFAULT: '#09150f',
                            light: '#0e2419'
                        },
                        lime: { accent: '#b4f233' },
                        ochre: { gold: '#e4b558' }
                    },
                    fontFamily: {
                        serif: ['Cinzel', 'serif'],
                        sans: ['"Inter"', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace']
                    }
                }
            }
        }
    </script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="<?= url('/assets/css/main.css') ?>">
</head>
<body class="bg-obsidian text-slate-100 min-h-screen flex antialiased">

    <!-- Left Sidebar Navigation -->
    <aside class="w-64 bg-[#030604] border-r border-emerald-950 flex flex-col justify-between shrink-0 hidden md:flex min-h-screen sticky top-0">
        <div class="p-6 space-y-6">
            
            <!-- Branding -->
            <a href="<?= url('/admin') ?>" class="block">
                <img src="<?= url('/assets/images/summit-logo.png') ?>" alt="AEFS Logo" class="h-10 w-auto object-contain filter drop-shadow">
                <span class="text-[10px] font-mono text-lime-400 uppercase tracking-widest mt-2 block font-semibold">
                    Secretariat Console
                </span>
            </a>

            <!-- Navigation Links -->
            <nav class="space-y-1.5 text-xs font-mono">
                <a href="<?= url('/admin') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all <?= ($activeTab === 'dashboard') ? 'bg-lime-accent text-black font-bold shadow-md shadow-lime-accent/20' : 'text-slate-400 hover:text-white hover:bg-emerald-950/40' ?>">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Overview & KPIs</span>
                </a>

                <a href="<?= url('/admin/speakers') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all <?= ($activeTab === 'speakers') ? 'bg-lime-accent text-black font-bold shadow-md shadow-lime-accent/20' : 'text-slate-400 hover:text-white hover:bg-emerald-950/40' ?>">
                    <i data-lucide="mic" class="w-4 h-4"></i>
                    <span>Speakers & Vetting</span>
                </a>

                <a href="<?= url('/admin/registrations') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all <?= ($activeTab === 'registrations') ? 'bg-lime-accent text-black font-bold shadow-md shadow-lime-accent/20' : 'text-slate-400 hover:text-white hover:bg-emerald-950/40' ?>">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    <span>Delegate Roster</span>
                </a>

                <a href="<?= url('/admin/partners') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all <?= ($activeTab === 'partners') ? 'bg-lime-accent text-black font-bold shadow-md shadow-lime-accent/20' : 'text-slate-400 hover:text-white hover:bg-emerald-950/40' ?>">
                    <i data-lucide="shield-check" class="w-4 h-4"></i>
                    <span>Corporate Partners</span>
                </a>
            </nav>

        </div>

        <!-- Footer of Sidebar -->
        <div class="p-6 border-t border-emerald-950 space-y-4 text-xs font-mono">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-emerald-950 border border-lime-accent/40 flex items-center justify-center text-lime-400 font-bold text-xs uppercase">
                    <?= strtoupper(substr($currentUser['username'], 0, 2)) ?>
                </div>
                <div class="truncate">
                    <div class="text-white font-semibold truncate"><?= htmlspecialchars($currentUser['username']) ?></div>
                    <div class="text-[10px] text-slate-500 uppercase"><?= htmlspecialchars($currentUser['role']) ?></div>
                </div>
            </div>

            <div class="pt-2 flex flex-col gap-2">
                <a href="<?= url('/') ?>" target="_blank" class="flex items-center gap-2 text-slate-400 hover:text-lime-accent transition-colors">
                    <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                    <span>View Public Summit Site</span>
                </a>
                <a href="<?= url('/admin/logout') ?>" class="flex items-center gap-2 text-red-400 hover:text-red-300 transition-colors">
                    <i data-lucide="log-out" class="w-3.5 h-3.5"></i>
                    <span>Terminate Session</span>
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-h-screen overflow-x-hidden">
        
        <!-- Top Navigation Bar -->
        <header class="h-16 bg-[#040805] border-b border-emerald-950/80 px-6 flex items-center justify-between sticky top-0 z-30">
            <div class="flex items-center gap-4">
                <!-- Mobile Toggle -->
                <button id="admin-mobile-toggle" class="md:hidden text-slate-400 hover:text-white p-2 rounded-lg bg-emerald-950/40">
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </button>
                <div class="flex items-center gap-2 text-xs font-mono">
                    <span class="text-slate-500">Summit 2027</span>
                    <span class="text-emerald-700">/</span>
                    <span class="text-lime-400 font-semibold uppercase tracking-wider"><?= ucfirst($activeTab) ?></span>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <!-- Quick Purge Cache Button -->
                <button id="admin-purge-cache-btn" class="px-3.5 py-1.5 rounded-full bg-emerald-950/80 border border-emerald-500/30 text-lime-300 hover:bg-emerald-900 text-xs font-mono font-semibold inline-flex items-center gap-1.5 transition-all shadow-sm">
                    <i data-lucide="refresh-cw" class="w-3.5 h-3.5"></i>
                    <span>Purge Cache</span>
                </button>

                <div class="hidden sm:flex items-center gap-2 text-xs font-mono text-slate-400">
                    <span class="w-2 h-2 rounded-full bg-lime-400"></span>
                    <span>JW Marriott Nairobi</span>
                </div>
            </div>
        </header>

        <!-- Main Body Content -->
        <main class="flex-1 p-6 md:p-8 space-y-8 bg-obsidian">

<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Executive Secretariat Login') ?></title>
    <link rel="icon" type="image/png" href="<?= url('/assets/images/summit-logo.png') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        obsidian: '#050806',
                        forest: '#09150f',
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
<body class="bg-obsidian text-slate-100 min-h-screen flex items-center justify-center p-6 relative overflow-hidden">
    
    <!-- Background runway with heavy dark overlay -->
    <div class="absolute inset-0 bg-cover bg-center opacity-15 pointer-events-none filter brightness-50" style="background-image: url('<?= url('/assets/images/summit-hero-bg.jpg') ?>');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-obsidian via-obsidian/90 to-obsidian"></div>

    <div class="relative z-10 w-full max-w-md">
        <!-- Logo Area -->
        <div class="text-center mb-8 space-y-3">
            <img src="<?= url('/assets/images/summit-logo.png') ?>" alt="AEFS 2027 Logo" class="h-14 mx-auto w-auto object-contain filter drop-shadow">
            <div>
                <span class="text-[10px] font-mono text-lime-400 uppercase tracking-widest block font-bold">Secretariat Protocol</span>
                <h1 class="text-xl font-display font-black text-white">Executive Control Console</h1>
            </div>
        </div>

        <!-- Login Card -->
        <div class="glass-panel p-8 rounded-3xl border border-emerald-500/30 shadow-2xl space-y-6">
            <div id="login-error" class="hidden p-3.5 rounded-xl bg-red-950/80 border border-red-500/40 text-xs font-mono text-red-200"></div>

            <form id="admin-login-form" class="space-y-5">
                <div>
                    <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">Executive Username</label>
                    <div class="relative">
                        <i data-lucide="user" class="w-4 h-4 text-slate-500 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                        <input type="text" name="username" required placeholder="admin" value="admin" class="w-full pl-10 pr-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">Secretariat Password</label>
                    <div class="relative">
                        <i data-lucide="lock" class="w-4 h-4 text-slate-500 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                        <input type="password" name="password" required placeholder="••••••••••••" value="Summit2027!" class="w-full pl-10 pr-4 py-3 rounded-xl bg-black/60 border border-emerald-500/30 text-white font-mono text-xs focus:border-lime-accent focus:outline-none">
                    </div>
                </div>

                <button type="submit" class="w-full lime-glow-btn py-3.5 rounded-xl text-xs font-extrabold uppercase tracking-wider inline-flex items-center justify-center gap-2">
                    <span>Authenticate & Enter Console</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </button>
            </form>

            <div class="pt-2 text-center">
                <a href="<?= url('/') ?>" class="text-xs font-mono text-slate-400 hover:text-lime-accent transition-colors inline-flex items-center gap-1">
                    <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
                    <span>Return to Public Summit Site</span>
                </a>
            </div>
        </div>

        <div class="text-center font-mono text-[10px] text-slate-600 mt-6 uppercase tracking-widest">
            Protected Executive Infrastructure ~ JW Marriott Nairobi 2027
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof lucide !== 'undefined') lucide.createIcons();

        const form = document.getElementById('admin-login-form');
        const err = document.getElementById('login-error');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            err.classList.add('hidden');
            const btn = form.querySelector('button[type="submit"]');
            btn.disabled = true;
            btn.innerHTML = 'Verifying Credentials...';

            const formData = new FormData(form);
            const json = Object.fromEntries(formData.entries());

            try {
                const res = await fetch('<?= url('/admin/login') ?>', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(json)
                });
                const data = await res.json();

                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    err.classList.remove('hidden');
                    err.textContent = data.message || 'Authentication rejected.';
                    btn.disabled = false;
                    btn.innerHTML = '<span>Authenticate & Enter Console</span><i data-lucide="arrow-right" class="w-4 h-4"></i>';
                    if (typeof lucide !== 'undefined') lucide.createIcons();
                }
            } catch (error) {
                err.classList.remove('hidden');
                err.textContent = 'Server connection error.';
                btn.disabled = false;
                btn.innerHTML = '<span>Authenticate & Enter Console</span><i data-lucide="arrow-right" class="w-4 h-4"></i>';
                if (typeof lucide !== 'undefined') lucide.createIcons();
            }
        });
    });
    </script>
</body>
</html>

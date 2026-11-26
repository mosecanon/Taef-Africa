<?php
/**
 * Master Header Layout
 * The African Executive Feature Summit 2027
 * Corporate Executive Design System Revamp
 */

$pageTitle = $pageTitle ?? "The African Executive Feature Summit 2027 | Shaping Africa's Future";
$metaDesc = $metaDesc ?? "The premier continental leadership platform convening corporate executives, founders, policymakers, and innovators. March 2027 at JW Marriott, Nairobi, Kenya.";
$activeNav = $activeNav ?? 'Home';
$config = $config ?? (require __DIR__ . '/../../config/app.php');
?>
<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($metaDesc) ?>">
    <meta name="keywords" content="African Executive Summit 2027, African Business Leaders, Nairobi Summit 2027, JW Marriott Nairobi, AfCFTA, Pan-African CEO conference, African enterprise innovation">
    <link rel="canonical" href="<?= htmlspecialchars((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= htmlspecialchars((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") ?>">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($metaDesc) ?>">
    <meta property="og:image" content="<?= htmlspecialchars((isset($_SERVER['HTTP_HOST']) ? ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]") : "") . url('/assets/images/summit-logo.png')) ?>">
    <meta property="og:image:secure_url" content="<?= htmlspecialchars((isset($_SERVER['HTTP_HOST']) ? ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]") : "") . url('/assets/images/summit-logo.png')) ?>">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:alt" content="The African Executive Feature Summit 2027 Logo">
    <meta property="og:site_name" content="The African Executive Feature Summit">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($metaDesc) ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars((isset($_SERVER['HTTP_HOST']) ? ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]") : "") . url('/assets/images/summit-logo.png')) ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= url('/assets/images/summit-logo.png') ?>">

    <!-- Corporate Typography: Inter (sans-serif, used by leading corporate/tech sites) + Playfair Display accent -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (Tailwind Play CDN for instant production-level rendering) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        obsidian: '#050806',
                        lime: {
                            accent: '#a3e635',
                            gold: '#d4a853',
                        },
                        slate: {
                            DEFAULT: '#64748b',
                            light: '#f1f5f9',
                        }
                    },
                    fontFamily: {
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                        sans: ['"Inter"', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                        display: ['"Inter"', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                        mono: ['"JetBrains Mono"', '"Fira Code"', 'monospace'],
                    }
                }
            }
        }
    </script>

    <!-- Global App URL Context for client-side API requests -->
    <script>
        window.APP_URL = "<?= url('/') ?>".replace(/\/+$/, '');
    </script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Custom Executive Design System -->
    <link rel="stylesheet" href="<?= url('/assets/css/main.css') ?>">

    <!-- JSON-LD Structured Data Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BusinessEvent",
      "name": "The African Executive Feature Summit 2027",
      "startDate": "2027-03-24T09:00:00+03:00",
      "endDate": "2027-03-26T18:00:00+03:00",
      "eventStatus": "https://schema.org/EventScheduled",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "location": {
        "@type": "Place",
        "name": "JW Marriott Hotel Nairobi",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Chiromo Road, Westlands",
          "addressLocality": "Nairobi",
          "addressCountry": "KE"
        }
      },
      "description": "<?= htmlspecialchars($metaDesc) ?>",
      "organizer": {
        "@type": "Organization",
        "name": "The African Executive Feature Summit Secretariat",
        "url": "<?= htmlspecialchars((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]") ?>"
      }
    }
    </script>
</head>
<body class="bg-obsidian text-slate-light antialiased selection:bg-lime-accent selection:text-black">

    <!-- Top Summit Executive Heads-Up Display (HUD) -->
    <aside aria-label="Summit Status Bar" class="w-full bg-[#030604] border-b border-emerald-900/40 text-xs font-mono text-slate-400 py-2 px-4 md:px-8 z-50 relative">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-4">
                <span class="inline-flex items-center gap-1.5 text-lime-400 font-semibold tracking-wider uppercase text-[11px]">
                    <span class="w-2 h-2 rounded-full bg-lime-400 animate-ping"></span>
                    <span>Plenary 2027 // Nairobi</span>
                </span>
                <span class="hidden sm:inline-block text-emerald-800">|</span>
                <span class="hidden sm:flex items-center gap-1.5 text-slate-300">
                    <i data-lucide="map-pin" class="w-3.5 h-3.5 text-lime-400"></i>
                    <span>JW Marriott Hotel ~ Nairobi, Kenya</span>
                </span>
            </div>

            <div class="flex items-center gap-4 text-[11px]">
                <div class="flex items-center gap-2">
                    <i data-lucide="clock" class="w-3.5 h-3.5 text-ochre-gold"></i>
                    <span>Nairobi Local Time:</span>
                    <span id="nairobi-clock" class="text-white font-bold tracking-widest">--:--:-- EAT</span>
                </div>
                <span class="text-lime-400">|</span>
                <div class="hidden md:flex items-center gap-1.5 text-lime-300">
                    <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                    <span id="summit-countdown">Calculating...</span>
                </div>
            </div>
        </div>
    </aside>

    <!-- Persistent Floating Executive Header -->
    <header class="sticky top-0 z-40 w-full transition-all duration-300 backdrop-blur-xl bg-obsidian/90 border-b border-emerald-500/15">
        <nav class="max-w-7xl mx-auto px-4 md:px-8 py-2.5 md:py-3 flex items-center justify-between">

            <!-- Brand Logo: Clean, pure visibility -->
            <a href="<?= url('/') ?>" class="relative group flex items-center py-0.5">
                <img src="<?= url('/assets/images/summit-logo.png') ?>"
                     alt="The African Executive Feature Summit 2027 Logo"
                     class="h-12 sm:h-14 md:h-16 w-auto object-contain transition-transform duration-300 ease-out group-hover:scale-105 filter drop-shadow-[0_2px_12px_rgba(0,0,0,0.9)]">
            </a>

            <!-- Desktop Navigation Links -->
            <ul class="hidden lg:flex items-center gap-2 md:gap-2 text-sm font-medium">
                <?php foreach ($config['navigation'] as $item):
                    $isActive = ($activeNav === $item['label']);
                    $isRegister = !empty($item['highlight']);
                ?>
                    <?php if ($isRegister): ?>
                        <li class="ml-2">
                            <a href="<?= url($item['url']) ?>" class="pill-btn !py-2.5 !px-5 !text-[11px]">
                                <span><?= htmlspecialchars($item['label']) ?></span>
                                <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?= url($item['url']) ?>" class="px-4 py-2 rounded-full transition-all text-xs uppercase tracking-wider <?= $isActive ? 'text-lime-accent bg-emerald-950/70 border border-lime-accent/30 font-semibold' : 'text-slate-300 hover:text-white hover:bg-emerald-950/40' ?>">
                                <?= htmlspecialchars($item['label']) ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>

            <!-- Mobile Menu Toggle Button -->
            <button id="mobile-menu-btn" aria-label="Toggle Navigation Menu" class="lg:hidden p-2.5 rounded-lg border border-emerald-500/20 text-slate-300 hover:text-lime-accent hover:border-lime-accent/40 bg-emerald-950/40 transition-all">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </nav>

        <!-- Mobile Drawer Navigation -->
        <div id="mobile-drawer" class="lg:hidden hidden bg-obsidian/95 border-b border-emerald-500/20 px-6 py-6 space-y-4 backdrop-blur-2xl">
            <ul class="space-y-3">
                <?php foreach ($config['navigation'] as $item):
                    $isActive = ($activeNav === $item['label']);
                    $isRegister = !empty($item['highlight']);
                ?>
                    <li>
                        <?php if ($isRegister): ?>
                            <a href="<?= url($item['url']) ?>" class="block w-full text-center lime-glow-btn py-3 rounded-xl text-xs font-bold uppercase tracking-wider mt-4">
                                <?= htmlspecialchars($item['label']) ?>
                            </a>
                        <?php else: ?>
                            <a href="<?= url($item['url']) ?>" class="block py-2.5 px-3 rounded-lg text-sm uppercase tracking-wider <?= $isActive ? 'text-lime-accent bg-emerald-950/60 font-bold border border-lime-accent/20' : 'text-slate-300 hover:text-white' ?>">
                                <?= htmlspecialchars($item['label']) ?>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </header>
</body>
</html>
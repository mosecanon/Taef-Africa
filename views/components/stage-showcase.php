<?php
/**
 * Master Hero Stage Showcase Component
 * The African Executive Feature Summit 2027
 * Pure, Cinematic Hero Visual with Interactive Hotspots
 */
?>
<div class="drift-box w-full rounded-3xl bg-emerald-950/50 border border-lime-accent/30 overflow-hidden">

    <!-- Pure, Clean Stage Visual (NO decorative overlays, buttons, or pins) -->
    <div class="relative w-full aspect-[16/9] sm:aspect-[21/10] rounded-3xl overflow-hidden bg-black shadow-lg shadow-black/80 select-none">

        <!-- Stage Main Visual (High-Resolution Render) -->
        <img id="stage-main-visual"
             src="<?= url('/assets/images/summit-main-stage.jpg') ?>"
             alt="The African Executive Feature Summit 2027 - Nairobi, Kenya"
             class="w-full h-full object-cover object-center transition-all duration-700 ease-out group-hover:scale-[1.01]">

        <!-- Subtle Radial Vignette (Clean, minimal) -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,_rgba(0,0,0,0.4)_0%,_transparent_70%)] pointer-events-none mix-blend-multiply opacity-20"></div>

    </div>

</div>
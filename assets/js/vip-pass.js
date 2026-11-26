/**
 * The African Executive Feature Summit 2027
 * 3D Holographic VIP Pass Card Physics & Customizer Engine
 */

document.addEventListener('DOMContentLoaded', () => {
    initVipPassTilt();
    initVipPassCustomizer();
});

function initVipPassTilt() {
    const card = document.getElementById('vip-card');
    const glare = document.getElementById('vip-card-glare');
    if (!card) return;

    const wrapper = card.parentElement;

    let bounds;
    function updateBounds() {
        bounds = card.getBoundingClientRect();
    }
    updateBounds();
    window.addEventListener('resize', updateBounds);
    window.addEventListener('scroll', updateBounds);

    function handleMove(e) {
        if (!bounds) updateBounds();
        const clientX = e.clientX || (e.touches && e.touches[0].clientX);
        const clientY = e.clientY || (e.touches && e.touches[0].clientY);
        if (!clientX || !clientY) return;

        const mouseX = clientX - bounds.left;
        const mouseY = clientY - bounds.top;

        const xPct = (mouseX / bounds.width) - 0.5;
        const yPct = (mouseY / bounds.height) - 0.5;

        // Rotation angles
        const maxRotate = 16;
        const rotateY = xPct * maxRotate;
        const rotateX = -yPct * maxRotate;

        card.style.transform = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) scale3d(1.02, 1.02, 1.02)`;

        // Dynamic glare position
        if (glare) {
            glare.style.setProperty('--mouse-x', `${(mouseX / bounds.width * 100).toFixed(1)}%`);
            glare.style.setProperty('--mouse-y', `${(mouseY / bounds.height * 100).toFixed(1)}%`);
            glare.style.opacity = '1';
        }
    }

    function handleLeave() {
        card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
        if (glare) {
            glare.style.opacity = '0.3';
        }
    }

    wrapper.addEventListener('mousemove', handleMove);
    wrapper.addEventListener('mouseleave', handleLeave);

    // Touch support for mobile
    wrapper.addEventListener('touchmove', handleMove, { passive: true });
    wrapper.addEventListener('touchend', handleLeave);
}

function initVipPassCustomizer() {
    const nameInput = document.getElementById('custom-pass-name');
    const tierSelect = document.getElementById('custom-pass-tier');

    const passNameEl = document.getElementById('pass-name');
    const passRoleEl = document.getElementById('pass-role');
    const passCategoryLabel = document.getElementById('pass-category-label');
    const passTierBadge = document.getElementById('pass-tier-badge');
    const passFlag = document.getElementById('pass-flag');
    const passCountry = document.getElementById('pass-country');

    if (nameInput && passNameEl) {
        nameInput.addEventListener('input', (e) => {
            const val = e.target.value.trim();
            if (val) {
                passNameEl.textContent = val.toUpperCase();
                passRoleEl.textContent = "Executive Delegate ~ Accredited";
                passCountry.textContent = "Accredited Delegate";
                passFlag.textContent = "🌍";
            } else {
                passNameEl.textContent = "MBALI SEBAPU";
                passRoleEl.textContent = "Founder & Group CEO ~ Hermosa Flor";
                passCountry.textContent = "South Africa";
                passFlag.textContent = "🇿🇦";
            }
        });
    }

    if (tierSelect && passCategoryLabel && passTierBadge) {
        tierSelect.addEventListener('change', (e) => {
            const [cat, tier] = e.target.value.split('|');
            passCategoryLabel.textContent = cat;
            passTierBadge.textContent = tier;

            if (tier === 'V.I.P') {
                passTierBadge.className = 'font-serif italic font-black text-4xl md:text-5xl text-lime-accent tracking-wider -mt-1 drop-shadow-[0_0_15px_rgba(180,242,51,0.4)]';
            } else if (tier === 'SPEAKER') {
                passTierBadge.className = 'font-serif italic font-black text-4xl md:text-5xl text-ochre-gold tracking-wider -mt-1 drop-shadow-[0_0_15px_rgba(228,181,88,0.4)]';
            } else {
                passTierBadge.className = 'font-serif italic font-black text-3xl md:text-4xl text-white tracking-wider -mt-1';
            }
        });
    }
}

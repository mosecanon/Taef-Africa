/**
 * The African Executive Feature Summit 2027
 * Master Interactive Controller & Hero Motion Engine
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize Nairobi Local Time Clock (EAT / UTC+3)
    initNairobiClock();

    // 2. Initialize Countdown to Summit (March 24, 2027)
    initCountdown();

    // 3. Mobile Navigation Drawer Toggle
    initMobileNav();

    // 4. Animated Hero Background Dots & Constellation Motion Engine
    initHeroMovingDotsCanvas();

    // 5. Quick-Jump Section Rail & Fast Responsive Scroll
    initQuickJumpRail();

    // 6. GSAP Reveal Animations
    initScrollAnimations();

    // 7. Homepage Priority Waitlist (Notify Me)
    initWaitlistForm();
});

/* ==========================================================================
   1. Live Nairobi Clock (UTC+3)
   ========================================================================== */
function initNairobiClock() {
    const clockEl = document.getElementById('nairobi-clock');
    if (!clockEl) return;

    function updateTime() {
        const now = new Date();
        const options = {
            timeZone: 'Africa/Nairobi',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false
        };
        const formatter = new Intl.DateTimeFormat('en-GB', options);
        clockEl.textContent = `${formatter.format(now)} EAT`;
    }

    updateTime();
    setInterval(updateTime, 1000);
}

/* ==========================================================================
   2. Summit Countdown Timer
   ========================================================================== */
function initCountdown() {
    const countdownEl = document.getElementById('summit-countdown');
    if (!countdownEl) return;

    const targetDate = new Date('2027-03-24T09:00:00+03:00').getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        const diff = targetDate - now;

        if (diff <= 0) {
            countdownEl.textContent = "PLENARY IN SESSION";
            return;
        }

        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));

        countdownEl.textContent = `T-${days}d ${hours}h ${mins}m to Plenary`;
    }

    updateCountdown();
    setInterval(updateCountdown, 60000);
}

/* ==========================================================================
   3. Mobile Navigation Toggle
   ========================================================================== */
function initMobileNav() {
    const btn = document.getElementById('mobile-menu-btn');
    const drawer = document.getElementById('mobile-drawer');

    if (!btn || !drawer) return;

    btn.addEventListener('click', () => {
        drawer.classList.toggle('hidden');
    });
}

/* ==========================================================================
   4. Animated Hero Moving Dots & Constellation Engine
   Makes the dots in the background image feel alive, moving, and pulsing!
   ========================================================================== */
function initHeroMovingDotsCanvas() {
    const canvas = document.getElementById('connectivity-canvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    let width, height;

    function resize() {
        width = canvas.width = canvas.parentElement.offsetWidth || window.innerWidth;
        height = canvas.height = canvas.parentElement.offsetHeight || window.innerHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    // Mouse tracking for interactive ripple/magnetism
    let mouse = { x: -1000, y: -1000, radius: 140 };
    window.addEventListener('mousemove', (e) => {
        const rect = canvas.getBoundingClientRect();
        mouse.x = e.clientX - rect.left;
        mouse.y = e.clientY - rect.top;
    });
    window.addEventListener('mouseleave', () => {
        mouse.x = -1000;
        mouse.y = -1000;
    });

    // Particle pool: Concentrated heavily on the left (Africa constellation) and along the runway
    const dots = [];
    const dotCount = Math.min(Math.floor(width / 16), 85);

    for (let i = 0; i < dotCount; i++) {
        // Bias 65% of dots toward the left and lower center to match the visual artwork
        const isLeftConstellation = Math.random() < 0.65;
        const initialX = isLeftConstellation ? Math.random() * (width * 0.55) : Math.random() * width;
        const initialY = Math.random() * height;

        dots.push({
            originX: initialX,
            originY: initialY,
            x: initialX,
            y: initialY,
            vx: (Math.random() - 0.5) * 0.4,
            vy: (Math.random() - 0.5) * 0.4,
            radius: Math.random() * 2.2 + 1.2,
            pulseOffset: Math.random() * Math.PI * 2,
            pulseSpeed: 0.03 + Math.random() * 0.04,
            isGreen: Math.random() > 0.25, // electric lime/green vs amber runway bokeh
            glowRadius: Math.random() * 6 + 4
        });
    }

    // Moving Signal Packets that travel along the network lines
    const signals = [];
    for (let s = 0; s < 12; s++) {
        signals.push({
            fromIndex: Math.floor(Math.random() * dots.length),
            toIndex: Math.floor(Math.random() * dots.length),
            progress: Math.random(),
            speed: 0.006 + Math.random() * 0.008
        });
    }

    let frame = 0;
    function render() {
        ctx.clearRect(0, 0, width, height);
        frame++;

        // Update dot positions with organic harmonic drift
        dots.forEach((dot, idx) => {
            dot.pulseOffset += dot.pulseSpeed;
            const floatOffset = Math.sin(dot.pulseOffset) * 1.5;

            dot.x += dot.vx + Math.cos(dot.pulseOffset * 0.5) * 0.2;
            dot.y += dot.vy + floatOffset * 0.15;

            // Soft screen boundary wrapping
            if (dot.x < 0) dot.x = width;
            if (dot.x > width) dot.x = 0;
            if (dot.y < 0) dot.y = height;
            if (dot.y > height) dot.y = 0;

            // Interactive Mouse Magnetism / Push
            const dx = mouse.x - dot.x;
            const dy = mouse.y - dot.y;
            const dist = Math.sqrt(dx * dx + dy * dy);
            if (dist < mouse.radius) {
                const force = (1 - dist / mouse.radius) * 3;
                dot.x -= (dx / dist) * force;
                dot.y -= (dy / dist) * force;
            }
        });

        // 1. Draw glowing constellation network connection lines
        for (let i = 0; i < dots.length; i++) {
            for (let j = i + 1; j < dots.length; j++) {
                const dx = dots[i].x - dots[j].x;
                const dy = dots[i].y - dots[j].y;
                const dist = Math.sqrt(dx * dx + dy * dy);

                if (dist < 120) {
                    const alpha = (1 - dist / 120) * 0.25;
                    ctx.strokeStyle = `rgba(180, 242, 51, ${alpha})`;
                    ctx.lineWidth = 0.75;
                    ctx.beginPath();
                    ctx.moveTo(dots[i].x, dots[i].y);
                    ctx.lineTo(dots[j].x, dots[j].y);
                    ctx.stroke();
                }
            }
        }

        // 2. Draw Moving Data Signals traveling along connections
        signals.forEach(sig => {
            sig.progress += sig.speed;
            if (sig.progress >= 1) {
                sig.progress = 0;
                sig.fromIndex = Math.floor(Math.random() * dots.length);
                sig.toIndex = Math.floor(Math.random() * dots.length);
            }

            const from = dots[sig.fromIndex];
            const to = dots[sig.toIndex];
            if (from && to) {
                const sx = from.x + (to.x - from.x) * sig.progress;
                const sy = from.y + (to.y - from.y) * sig.progress;

                ctx.beginPath();
                ctx.arc(sx, sy, 2.5, 0, Math.PI * 2);
                ctx.fillStyle = '#ffffff';
                ctx.shadowColor = '#b4f233';
                ctx.shadowBlur = 8;
                ctx.fill();
                ctx.shadowBlur = 0; // reset
            }
        });

        // 3. Draw dots with dynamic pulsating luminance
        dots.forEach(dot => {
            const pulse = (Math.sin(dot.pulseOffset) + 1) * 0.5; // 0 to 1
            const currentRadius = dot.radius * (0.8 + pulse * 0.4);
            const baseColor = dot.isGreen ? '180, 242, 51' : '228, 181, 88';
            const alpha = 0.4 + pulse * 0.6;

            // Outer Halo
            ctx.beginPath();
            ctx.arc(dot.x, dot.y, currentRadius * 2.5, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(${baseColor}, ${alpha * 0.25})`;
            ctx.fill();

            // Core dot
            ctx.beginPath();
            ctx.arc(dot.x, dot.y, currentRadius, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(${baseColor}, ${alpha})`;
            ctx.fill();
        });

        requestAnimationFrame(render);
    }

    render();
}

/* ==========================================================================
   5. Quick-Jump Section Rail & Fast Responsive Scroll
   ========================================================================== */
function initQuickJumpRail() {
    const dots = Array.from(document.querySelectorAll('.rail-dot'));
    if (dots.length === 0) return;

    const sections = dots.map(dot => document.getElementById(dot.dataset.target)).filter(Boolean);
    if (sections.length === 0) return;

    // Click handler for instant smooth navigation
    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            const targetId = dot.dataset.target;
            const targetEl = document.getElementById(targetId);
            if (targetEl) {
                targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Update active dot on scroll
    window.addEventListener('scroll', () => {
        const scrollPos = window.scrollY + window.innerHeight * 0.35;

        sections.forEach((sec, idx) => {
            const top = sec.offsetTop;
            const height = sec.offsetHeight;

            if (scrollPos >= top && scrollPos < top + height) {
                dots.forEach(d => d.classList.remove('active'));
                if (dots[idx]) {
                    dots[idx].classList.add('active');
                }
            }
        });
    }, { passive: true });
}

/* ==========================================================================
   6. GSAP Subtle Entrance Animations (Snappy & Lightweight)
   ========================================================================== */
function initScrollAnimations() {
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        // Lightweight entrance for cards
        gsap.utils.toArray('.glass-panel, .drift-panel').forEach(panel => {
            gsap.from(panel, {
                scrollTrigger: {
                    trigger: panel,
                    start: 'top 92%',
                    toggleActions: 'play none none none'
                },
                y: 18,
                opacity: 0,
                duration: 0.5,
                ease: 'power2.out'
            });
        });
    }
}

/* ==========================================================================
   7. Chief Guest Plenary Calendar & Priority Waitlist Quick Handlers
   ========================================================================== */
document.addEventListener('DOMContentLoaded', () => {
    // Chief Guest Calendar .ICS Generator
    const calBtn = document.getElementById('chief-guest-calendar-btn');
    if (calBtn) {
        calBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const icsContent = 
`BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//The African Executive Feature Summit//Chief Guest Keynote 2027//EN
CALSCALE:GREGORIAN
METHOD:PUBLISH
BEGIN:VEVENT
SUMMARY:H.E. Hon. Aden Duale - Opening Plenary Keynote | AEFS 2027
DESCRIPTION:Opening Plenary Address: "Shaping Africa's Healthcare Sovereignty: Biomanufacturing, Pharma Security & Cross-Border Health Systems" by H.E. Hon. Aden Duale, Cabinet Secretary for Health, Republic of Kenya.
LOCATION:Grand Ballroom Plenary, JW Marriott Hotel, Chiromo Road, Westlands, Nairobi, Kenya
DTSTART;TZID=Africa/Nairobi:20270324T093000
DTEND;TZID=Africa/Nairobi:20270324T110000
STATUS:CONFIRMED
ORGANIZER;CN=AEFS Executive Secretariat:mailto:concierge@africanexecutivesummit.com
END:VEVENT
END:VCALENDAR`;

            const blob = new Blob([icsContent], { type: 'text/calendar;charset=utf-8' });
            const link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.setAttribute('download', 'Hon_Aden_Duale_Plenary_Keynote_AEFS2027.ics');
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    }
});

/* ==========================================================================
   7. Homepage Priority Waitlist (Notify Me)
   ========================================================================== */
function initWaitlistForm() {
    const form = document.getElementById('waitlist-quick-form');
    if (!form) return;
    const msg = document.getElementById('waitlist-msg');
    const btn = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        if (!msg) return;
        msg.classList.add('hidden');
        msg.textContent = '';
        const orig = btn ? btn.innerHTML : '';
        if (btn) { btn.disabled = true; btn.innerHTML = '<span>Submitting…</span>'; }

        const email = (form.querySelector('#waitlist-email') || {}).value || '';
        const fullName = (form.querySelector('#waitlist-name') || {}).value || '';
        const jobTitle = (form.querySelector('#waitlist-title') || {}).value || '';
        const company = (form.querySelector('#waitlist-company') || {}).value || '';
        const country = (form.querySelector('#waitlist-country') || {}).value || '';
        const endpoint = (window.APP_URL ? window.APP_URL + '/api/register' : (window.location.origin + window.location.pathname.replace(/\/home\/?$/, '') + '/api/register'));

        const payload = {
            full_name: fullName,
            email: email,
            phone: '',
            country: country,
            company: company,
            job_title: jobTitle,
            category: 'Waitlist',
            industry: '',
            organisation: company,
            designation: jobTitle,
            sector: ''
        };

        try {
            const res = await fetch(endpoint, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            msg.classList.remove('hidden');
            if (data.success || data.status === 'success') {
                msg.classList.add('bg-emerald-950/80', 'text-lime-300', 'border', 'border-lime-accent/40');
                msg.textContent = 'You are on the priority waitlist. Our team will reach out with registration details via email shortly.';
                form.reset();
            } else {
                msg.classList.add('bg-red-950/80', 'text-red-300', 'border', 'border-red-500/40');
                msg.textContent = data.message || 'Could not join waitlist. Please try again.';
            }
        } catch (err) {
            msg.classList.remove('hidden');
            msg.classList.add('bg-red-950/80', 'text-red-300');
            msg.textContent = 'Unable to connect to the summit server. Please try again.';
        } finally {
            if (btn) { btn.disabled = false; btn.innerHTML = orig; }
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }
    });
}

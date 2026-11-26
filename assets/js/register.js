/**
 * The African Executive Feature Summit 2027
 * Executive Concierge Registration Stepper Controller
 */

document.addEventListener('DOMContentLoaded', () => {
    initRegistrationStepper();
});

function initRegistrationStepper() {
    const form = document.getElementById('registration-form');
    if (!form) return;

    // Navigation elements
    const stepNav1 = document.getElementById('step-nav-1');
    const stepNav2 = document.getElementById('step-nav-2');
    const stepNav3 = document.getElementById('step-nav-3');

    const step1 = document.getElementById('step-content-1');
    const step2 = document.getElementById('step-content-2');
    const step3 = document.getElementById('step-content-3');
    const confirmationView = document.getElementById('confirmation-view');

    const toStep2 = document.getElementById('to-step-2');
    const toStep3 = document.getElementById('to-step-3');
    const backTo1 = document.getElementById('back-to-step-1');
    const backTo2 = document.getElementById('back-to-step-2');

    const errorMsg = document.getElementById('reg-error-msg');

    // Inputs
    const nameInput = document.getElementById('reg-name');
    const emailInput = document.getElementById('reg-email');
    const phoneInput = document.getElementById('reg-phone');
    const countryInput = document.getElementById('reg-country');
    const companyInput = document.getElementById('reg-company');
    const titleInput = document.getElementById('reg-title');
    const categorySelect = document.getElementById('reg-category');

    // Preview Elements
    const previewName = document.getElementById('preview-name');
    const previewRole = document.getElementById('preview-role');
    const previewCountry = document.getElementById('preview-country');
    const previewCat = document.getElementById('preview-category');

    let confirmedData = null;

    function showError(msg) {
        errorMsg.classList.remove('hidden');
        errorMsg.textContent = msg;
    }

    function clearError() {
        errorMsg.classList.add('hidden');
        errorMsg.textContent = '';
    }

    // Step 1 -> Step 2
    toStep2.addEventListener('click', () => {
        clearError();
        if (!nameInput.value.trim() || !emailInput.value.trim() || !phoneInput.value.trim() || !countryInput.value.trim()) {
            showError('Please complete all credential fields in Step 1.');
            return;
        }

        step1.classList.add('hidden');
        step2.classList.remove('hidden');

        stepNav1.classList.remove('border-lime-accent', 'bg-lime-accent/15', 'text-white');
        stepNav1.classList.add('border-emerald-950', 'bg-emerald-950/40', 'text-slate-400');

        stepNav2.classList.add('border-lime-accent', 'bg-lime-accent/15', 'text-white');
        stepNav2.classList.remove('border-emerald-950', 'bg-emerald-950/40', 'text-slate-400');
    });

    // Step 2 -> Step 1 (Back)
    backTo1.addEventListener('click', () => {
        clearError();
        step2.classList.add('hidden');
        step1.classList.remove('hidden');

        stepNav2.classList.remove('border-lime-accent', 'bg-lime-accent/15', 'text-white');
        stepNav2.classList.add('border-emerald-950', 'bg-emerald-950/40', 'text-slate-400');

        stepNav1.classList.add('border-lime-accent', 'bg-lime-accent/15', 'text-white');
        stepNav1.classList.remove('border-emerald-950', 'bg-emerald-950/40', 'text-slate-400');
    });

    // Step 2 -> Step 3
    toStep3.addEventListener('click', () => {
        clearError();
        if (!companyInput.value.trim() || !titleInput.value.trim()) {
            showError('Please provide your organization and executive title.');
            return;
        }

        // Update preview snapshot
        previewName.textContent = nameInput.value.trim().toUpperCase();
        previewRole.textContent = `${titleInput.value.trim()} ~ ${companyInput.value.trim()}`;
        previewCountry.textContent = `Accredited from ${countryInput.value.trim()}`;
        previewCat.textContent = `${categorySelect.value} V.I.P`;

        step2.classList.add('hidden');
        step3.classList.remove('hidden');

        stepNav2.classList.remove('border-lime-accent', 'bg-lime-accent/15', 'text-white');
        stepNav2.classList.add('border-emerald-950', 'bg-emerald-950/40', 'text-slate-400');

        stepNav3.classList.add('border-lime-accent', 'bg-lime-accent/15', 'text-white');
        stepNav3.classList.remove('border-emerald-950', 'bg-emerald-950/40', 'text-slate-400');
    });

    // Step 3 -> Step 2 (Back)
    backTo2.addEventListener('click', () => {
        clearError();
        step3.classList.add('hidden');
        step2.classList.remove('hidden');

        stepNav3.classList.remove('border-lime-accent', 'bg-lime-accent/15', 'text-white');
        stepNav3.classList.add('border-emerald-950', 'bg-emerald-950/40', 'text-slate-400');

        stepNav2.classList.add('border-lime-accent', 'bg-lime-accent/15', 'text-white');
        stepNav2.classList.remove('border-emerald-950', 'bg-emerald-950/40', 'text-slate-400');
    });

    // Final Form Submission
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        clearError();

        const submitBtn = document.getElementById('submit-reg-btn');
        const origBtnText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="inline-flex items-center gap-2"><svg class="animate-spin h-4 w-4 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg> Issuing Executive Pass...</span>';

        const formData = new FormData(form);
        const json = Object.fromEntries(formData.entries());

        // Normalize aliases between schemas
        if (!json.company && json.organisation) json.company = json.organisation;
        if (!json.job_title && json.designation) json.job_title = json.designation;
        if (!json.industry && json.sector) json.industry = json.sector;
        if (!json.category) json.category = 'Delegate';

        // Calculate exact absolute endpoint
        const endpoint = form.getAttribute('action') 
            || (window.APP_URL ? window.APP_URL + '/api/register' : (window.location.origin + window.location.pathname.replace(/\/register\/?$/, '') + '/api/register'));

        try {
            const res = await fetch(endpoint, {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(json)
            });

            const data = await res.json();

            if (data.success || data.status === 'success') {
                confirmedData = data.registration || data.data;
                const passEl = document.getElementById('confirmed-pass-code');
                if (passEl) passEl.textContent = 'Your accreditation pass code will be shared with you by our team via email shortly.';
                
                // Hide form & stepper, show confirmation view
                form.classList.add('hidden');
                const stepperEl = document.getElementById('step-nav-1')?.closest('.grid');
                if (stepperEl) stepperEl.classList.add('hidden');

                confirmationView.classList.remove('hidden');
                confirmationView.scrollIntoView({ behavior: 'smooth' });
                if (typeof lucide !== 'undefined') lucide.createIcons();
            } else {
                showError(data.message || 'An error occurred during registration. Please verify your credentials.');
                submitBtn.disabled = false;
                submitBtn.innerHTML = origBtnText;
            }
        } catch (err) {
            console.error('Registration communication error:', err);
            showError('Unable to connect to the summit server. Please check your network or try again.');
            submitBtn.disabled = false;
            submitBtn.innerHTML = origBtnText;
        }
    });

    // Download .ICS Calendar File
    const icsBtn = document.getElementById('download-ics-btn');
    if (icsBtn) {
        icsBtn.addEventListener('click', () => {
            const icsContent = 
`BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//The African Executive Feature Summit//AEFS 2027//EN
CALSCALE:GREGORIAN
METHOD:PUBLISH
BEGIN:VEVENT
SUMMARY:The African Executive Feature Summit 2027
DESCRIPTION:Theme: Shaping Africa's Future. Venue: JW Marriott Hotel, Nairobi, Kenya. Accreditation Pass Code: ${confirmedData ? confirmedData.pass_code : 'AEFS-2027'}
LOCATION:JW Marriott Hotel, Chiromo Road, Westlands, Nairobi, Kenya
DTSTART;TZID=Africa/Nairobi:20270324T090000
DTEND;TZID=Africa/Nairobi:20270326T180000
STATUS:CONFIRMED
ORGANIZER;CN=AEFS Secretariat:mailto:concierge@africanexecutivesummit.com
END:VEVENT
END:VCALENDAR`;

            const blob = new Blob([icsContent], { type: 'text/calendar;charset=utf-8' });
            const link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.setAttribute('download', 'African_Executive_Summit_2027.ics');
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    }
}

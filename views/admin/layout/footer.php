        </main>
        
        <!-- Admin Footer -->
        <footer class="h-12 border-t border-emerald-950/60 bg-[#030604] px-6 flex items-center justify-between text-[11px] font-mono text-slate-500">
            <div>
                The African Executive Feature Summit 2027 &copy; Secretariat Control Engine
            </div>
            <div>
                System: Active // Cache Layer Connected
            </div>
        </footer>

    </div>

    <!-- Toast Notification Container -->
    <div id="admin-toast" class="fixed bottom-6 right-6 z-50 hidden px-5 py-3 rounded-2xl shadow-2xl font-mono text-xs border backdrop-blur-xl transition-all duration-300"></div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof lucide !== 'undefined') lucide.createIcons();

        // Toast Helper
        window.showToast = function(msg, isSuccess = true) {
            const toast = document.getElementById('admin-toast');
            if (!toast) return;

            toast.className = `fixed bottom-6 right-6 z-50 px-5 py-3 rounded-2xl shadow-2xl font-mono text-xs border backdrop-blur-xl transition-all duration-300 ${
                isSuccess 
                ? 'bg-emerald-950/90 border-lime-accent/50 text-lime-300 shadow-lime-accent/10' 
                : 'bg-red-950/90 border-red-500/50 text-red-300 shadow-red-500/10'
            }`;
            toast.textContent = msg;
            toast.classList.remove('hidden');

            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3500);
        };

        // Cache Purge Trigger
        const purgeBtn = document.getElementById('admin-purge-cache-btn');
        if (purgeBtn) {
            purgeBtn.addEventListener('click', async () => {
                const orig = purgeBtn.innerHTML;
                purgeBtn.disabled = true;
                purgeBtn.innerHTML = '<i data-lucide="loader" class="w-3.5 h-3.5 animate-spin"></i><span>Purging...</span>';
                if (typeof lucide !== 'undefined') lucide.createIcons();

                try {
                    const res = await fetch('<?= url('/admin/cache/purge') ?>', { method: 'POST' });
                    const data = await res.json();
                    if (data.success) {
                        showToast(data.message, true);
                    } else {
                        showToast('Failed to flush cache.', false);
                    }
                } catch (e) {
                    showToast('Connection error during cache purge.', false);
                } finally {
                    purgeBtn.disabled = false;
                    purgeBtn.innerHTML = orig;
                    if (typeof lucide !== 'undefined') lucide.createIcons();
                }
            });
        }
    });
    </script>
</body>
</html>

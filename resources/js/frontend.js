/**
 * Frontend Alpine.js entry point.
 * Carrega Alpine via CDN somente se o Livewire ainda não o carregou.
 * + WhatsApp: mobile → api (app), desktop → web.
 */
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Alpine === 'undefined') {
        var s = document.createElement('script');
        s.src = 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js';
        s.defer = true;
        document.head.appendChild(s);
    }

    // ─── WhatsApp: mobile → api, desktop → web ──────────
    fixWhatsAppLinks();

    // MutationObserver pega mudanças do Livewire morph
    var observer = new MutationObserver(function () { fixWhatsAppLinks(); });
    observer.observe(document.body, { childList: true, subtree: true });
});

function fixWhatsAppLinks() {
    var isMobile = /Android|iPhone|iPad|iPod/i.test(navigator.userAgent);

    document.querySelectorAll('a[data-whatsapp]').forEach(function (link) {
        var href = link.getAttribute('href');
        if (!href) return;

        if (isMobile) {
            link.href = href.replace('web.whatsapp.com/send', 'api.whatsapp.com/send');
        } else {
            link.href = href.replace('api.whatsapp.com/send', 'web.whatsapp.com/send');
        }
    });
}

document.addEventListener('alpine:init', () => {
    Alpine.data('reveal', () => ({
        shown: false,
        init() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.shown = true;
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12 });
            observer.observe(this.$el);
        }
    }))

    Alpine.data('counter', (target) => ({
        count: 0,
        init() {
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    this.animate();
                    observer.disconnect();
                }
            }, { threshold: 0.5 });
            observer.observe(this.$el);
        },
        animate() {
            const duration = 1600;
            const start = performance.now();
            const step = (now) => {
                const progress = Math.min((now - start) / duration, 1);
                this.count = Math.floor(progress * target);
                if (progress < 1) requestAnimationFrame(step);
            };
            requestAnimationFrame(step);
        }
    }))

    Alpine.data('backToTop', () => ({
        visible: false,
        init() {
            window.addEventListener('scroll', () => {
                this.visible = window.scrollY > 400;
            }, { passive: true });
        },
        scrollTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }))

    Alpine.data('cookieConsent', () => ({
        open: false,
        // Já inicia correto a partir do localStorage, evitando 1 frame "errado"
        accepted: typeof localStorage !== 'undefined' && !!localStorage.getItem('cookie_consent'),
        stats: false,
        marketing: false,

        init() {
            const saved = localStorage.getItem('cookie_consent');
            if (saved) {
                const prefs = JSON.parse(saved);
                this.stats = prefs.stats ?? false;
                this.marketing = prefs.marketing ?? false;
                this.accepted = true;
            }
        },

        openModal() { this.open = true },
        closeModal() { this.open = false },

        acceptAll() {
            this.stats = true;
            this.marketing = true;
            this.save();
        },

        save() {
            localStorage.setItem('cookie_consent', JSON.stringify({
                stats: this.stats,
                marketing: this.marketing
            }));
            this.accepted = true;
            this.open = false;
        }
    }))
})

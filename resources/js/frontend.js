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

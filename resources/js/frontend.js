/**
 * Frontend Alpine.js entry point.
 * Carrega Alpine via CDN somente se o Livewire ainda não o carregou.
 */
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Alpine === 'undefined') {
        var s = document.createElement('script');
        s.src = 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js';
        s.defer = true;
        document.head.appendChild(s);
    }
});

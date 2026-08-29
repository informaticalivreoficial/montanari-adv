import '../css/app.css';
import './libs/index.js';

// Observação: o Livewire 4 JÁ embute e auto-inicia o Alpine.js (veja livewire.js →
// `module_default.start()` durante a inicialização do Livewire). Não importe nem
// chame `Alpine.start()` aqui, senão criamos uma 2ª instância que conflita com o
// `wire:model` e quebra a persistência dos formulários. Basta usar `x-data`/`x-*`
// normalmente que o Alpine do Livewire cuida.

// ─── Trata 419 (CSRF/sessão expirada) globalmente: redireciona ao login em vez do alert nativo
// (Livewire exibe "This page has expired" ao receber 419; aqui interceptamos e vamos ao login)
function registerLivewire419Handler() {
    if (typeof Livewire === 'undefined') return;
    Livewire.hook('request', ({ fail }) => {
        fail(({ status, preventDefault }) => {
            if (status === 419) {
                preventDefault();
                const isClient = window.location.pathname.startsWith('/cliente');
                window.location.href = isClient ? '/cliente' : '/admin';
            }
        });
    });
}
if (typeof Livewire !== 'undefined') {
    registerLivewire419Handler();
} else {
    document.addEventListener('livewire:init', registerLivewire419Handler);
}

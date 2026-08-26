import '../css/app.css';
import './libs/index.js';

// Observação: o Livewire 4 JÁ embute e auto-inicia o Alpine.js (veja livewire.js →
// `module_default.start()` durante a inicialização do Livewire). Não importe nem
// chame `Alpine.start()` aqui, senão criamos uma 2ª instância que conflita com o
// `wire:model` e quebra a persistência dos formulários. Basta usar `x-data`/`x-*`
// normalmente que o Alpine do Livewire cuida.

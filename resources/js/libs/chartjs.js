/**
 * Chart.js - Helper para integração com Livewire
 *
 * Exposes window.MontanariChart(containerId, config)
 */

import { Chart, registerables } from 'chart.js';

// Register all Chart.js components
Chart.register(...registerables);

// Store chart instances for cleanup
window._chartInstances = {};

/**
 * Cria ou atualiza um gráfico Chart.js
 */
window.MontanariChart = function (containerId, config) {
    // Destroy existing chart if any
    if (window._chartInstances[containerId]) {
        window._chartInstances[containerId].destroy();
    }

    const canvas = document.getElementById(containerId);
    if (!canvas) return null;

    const ctx = canvas.getContext('2d');
    const chart = new Chart(ctx, config);
    window._chartInstances[containerId] = chart;

    return chart;
};

/**
 * Destroi um gráfico específico
 */
window.destroyChart = function (containerId) {
    if (window._chartInstances[containerId]) {
        window._chartInstances[containerId].destroy();
        delete window._chartInstances[containerId];
    }
};

/**
 * Destroi todos os gráficos
 */
window.destroyAllCharts = function () {
    Object.keys(window._chartInstances).forEach(id => {
        window._chartInstances[id].destroy();
    });
    window._chartInstances = {};
};

<div>
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Analytics</h1>
            <p class="mt-1 text-sm text-gray-500">Métricas de acesso do site nos últimos meses.</p>
        </div>
        <div class="flex items-center gap-2">
            @foreach([3 => '3 meses', 6 => '6 meses', 12 => '12 meses'] as $months => $label)
                <button
                    wire:click="setPeriod({{ $months }})"
                    class="rounded-lg border px-3 py-1.5 text-xs font-medium transition
                        {{ $period === $months
                            ? 'border-amber-500 bg-amber-50 text-amber-700'
                            : 'border-gray-200 bg-white text-gray-600 hover:bg-gray-50' }}"
                >
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </div>

    @if(!$hasAnalytics)
        <div class="rounded-xl border border-yellow-200 bg-yellow-50 p-6">
            <div class="flex items-start gap-4">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-yellow-100 text-yellow-600">
                    <i class="fa-solid fa-triangle-exclamation text-lg"></i>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-yellow-800">Dados de Analytics indisponíveis</h3>
                    <p class="mt-1 text-sm text-yellow-700">
                        Não foi possível conectar ao Google Analytics. Verifique as credenciais em
                        <code class="rounded bg-yellow-100 px-1">storage/app/analytics/</code>.
                    </p>
                    @if($errorMessage)
                        <p class="mt-2 text-xs text-yellow-600 font-mono bg-yellow-100 rounded p-2">{{ $errorMessage }}</p>
                    @endif
                </div>
            </div>
        </div>
    @else
        <!-- Summary Cards -->
        @php
            $totalDevices = collect($deviceCategory)->sum('value');
            $mobileValue = collect($deviceCategory)->firstWhere('device', 'Mobile')['value'] ?? 0;
            $desktopValue = collect($deviceCategory)->firstWhere('device', 'Desktop')['value'] ?? 0;
            $mobilePct = $totalDevices > 0 ? round(($mobileValue / $totalDevices) * 100, 1) : 0;
            $desktopPct = $totalDevices > 0 ? round(($desktopValue / $totalDevices) * 100, 1) : 0;
        @endphp

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-6">
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-5">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Visitantes</p>
                        <p class="text-xl font-bold text-gray-900">{{ number_format($totalVisitors, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-5">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-green-600">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Page Views</p>
                        <p class="text-xl font-bold text-gray-900">{{ number_format($totalPageViews, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-5">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 text-purple-600">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Mobile</p>
                        <p class="text-xl font-bold text-gray-900">{{ $mobilePct }}%</p>
                    </div>
                </div>
            </div>
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-5">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-100 text-amber-600">
                        <i class="fa-solid fa-desktop"></i>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Desktop</p>
                        <p class="text-xl font-bold text-gray-900">{{ $desktopPct }}%</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row 1 -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mb-6">
            <!-- Visitors & Page Views -->
            <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <i class="fa-solid fa-chart-line text-sm"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900">Visitantes & Page Views</h3>
                </div>
                <div style="height: 300px;">
                    <canvas id="visitorsChart"></canvas>
                </div>
            </div>

            <!-- Devices -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-purple-50 text-purple-600">
                        <i class="fa-solid fa-chart-pie text-sm"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900">Dispositivos</h3>
                </div>
                <div class="relative" style="height: 220px;">
                    <canvas id="deviceChart"></canvas>
                </div>
                @if(!empty($deviceCategory))
                    <div class="mt-4 space-y-2">
                        @foreach($deviceCategory as $device)
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-gray-600">{{ $device['device'] }}</span>
                                <span class="font-medium text-gray-900">{{ number_format($device['value'], 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Charts Row 2 -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
            <!-- Top Browsers -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-50 text-green-600">
                        <i class="fa-solid fa-globe text-sm"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900">Navegadores</h3>
                </div>
                <div style="height: 250px;">
                    <canvas id="browsersChart"></canvas>
                </div>
            </div>

            <!-- User Types -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                        <i class="fa-solid fa-user-check text-sm"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900">Novos vs Retornantes</h3>
                </div>
                <div style="height: 250px;">
                    <canvas id="userTypesChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Top Pages -->
        <div class="rounded-xl border border-gray-200 bg-white shadow-sm mb-6">
            <div class="px-6 py-4 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                        <i class="fa-solid fa-fire text-sm"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900">Páginas Mais Visitadas</h3>
                </div>
            </div>
            @if(!empty($topPages))
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Página</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Views</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($topPages as $i => $page)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-3">
                                        <div class="flex items-center gap-3">
                                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-100 text-xs font-bold text-gray-500">{{ $i + 1 }}</span>
                                            <div class="min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate max-w-md" title="{{ $page['title'] }}">{{ $page['title'] }}</p>
                                                <p class="text-xs text-gray-400 truncate max-w-md">{{ $page['url'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-right">
                                        <span class="text-sm font-semibold text-gray-900">{{ number_format($page['views'], 0, ',', '.') }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="px-6 py-8 text-center text-gray-500 text-sm">Nenhum dado disponível.</div>
            @endif
        </div>

        <!-- Top Countries -->
        @if(!empty($topCountries))
        <div class="rounded-xl border border-gray-200 bg-white shadow-sm mb-6">
            <div class="px-6 py-4 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 text-red-600">
                        <i class="fa-solid fa-earth-americas text-sm"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900">Top Países</h3>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    @php $maxCountry = collect($topCountries)->max('value') ?: 1; @endphp
                    @foreach($topCountries as $country)
                        <div class="flex items-center gap-4">
                            <span class="text-sm text-gray-700 w-32 truncate">{{ $country['name'] }}</span>
                            <div class="flex-1 bg-gray-100 rounded-full h-2.5">
                                <div class="bg-amber-500 h-2.5 rounded-full transition-all duration-500"
                                     style="width: {{ ($country['value'] / $maxCountry) * 100 }}%"></div>
                            </div>
                            <span class="text-xs font-medium text-gray-500 w-16 text-right">{{ number_format($country['value'], 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    @endif

    @if($hasAnalytics)
    <script>
        document.addEventListener('livewire:initialized', () => {
            setTimeout(() => initAnalyticsCharts(@js($this->chartData)), 200);
        });

        Livewire.hook('morph.updated', ({ el }) => {
            if (el.querySelector('#visitorsChart')) {
                setTimeout(() => initAnalyticsCharts(@js($this->chartData)), 300);
            }
        });

        function initAnalyticsCharts(data) {
            // Visitors & Page Views
            if (data.labels && data.labels.length > 0) {
                MontanariChart('visitorsChart', {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Visitantes',
                            data: data.visitors,
                            borderColor: '#3b82f6',
                            backgroundColor: 'rgba(59,130,246,0.1)',
                            fill: true, tension: 0.4, borderWidth: 2, pointRadius: 0, pointHoverRadius: 4,
                        },{
                            label: 'Page Views',
                            data: data.pageViews,
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16,185,129,0.05)',
                            fill: true, tension: 0.4, borderWidth: 2, pointRadius: 0, pointHoverRadius: 4,
                        }]
                    },
                    options: {
                        responsive: true, maintainAspectRatio: false,
                        interaction: { intersect: false, mode: 'index' },
                        plugins: {
                            legend: { position: 'top', labels: { usePointStyle: true, pointStyle: 'circle', padding: 15, font: { size: 11 } } },
                            tooltip: { backgroundColor: '#1f2937', padding: 10, cornerRadius: 8 }
                        },
                        scales: {
                            x: { grid: { display: false }, ticks: { font: { size: 10 }, color: '#9ca3af', maxRotation: 0 } },
                            y: { beginAtZero: true, grid: { color: '#f3f4f6' }, ticks: { font: { size: 10 }, color: '#9ca3af' } }
                        }
                    }
                });
            }

            // Devices
            var dc = data.deviceCategory || [];
            var hasDeviceData = dc.length > 0 && dc.some(d => d.value > 0);
            if (hasDeviceData) {
                var deviceColors = ['#3b82f6', '#f59e0b', '#8b5cf6', '#10b981', '#ef4444'];
                MontanariChart('deviceChart', {
                    type: 'doughnut',
                    data: {
                        labels: dc.map(d => d.device),
                        datasets: [{
                            data: dc.map(d => d.value),
                            backgroundColor: deviceColors.slice(0, dc.length),
                            borderWidth: 0, hoverOffset: 6,
                        }]
                    },
                    options: {
                        responsive: true, maintainAspectRatio: false, cutout: '65%',
                        plugins: {
                            legend: { position: 'bottom', labels: { usePointStyle: true, pointStyle: 'circle', padding: 12, font: { size: 11 } } },
                            tooltip: {
                                backgroundColor: '#1f2937', padding: 10, cornerRadius: 8,
                                callbacks: {
                                    label: function(ctx) {
                                        var total = ctx.dataset.data.reduce((a, b) => a + b, 0);
                                        var pct = total > 0 ? ((ctx.parsed / total) * 100).toFixed(1) : 0;
                                        return ' ' + ctx.label + ': ' + ctx.parsed.toLocaleString('pt-BR') + ' (' + pct + '%)';
                                    }
                                }
                            }
                        }
                    }
                });
            } else {
                // Show placeholder when no device data
                var canvas = document.getElementById('deviceChart');
                if (canvas) {
                    var ctx2 = canvas.getContext('2d');
                    ctx2.font = '13px sans-serif';
                    ctx2.fillStyle = '#9ca3af';
                    ctx2.textAlign = 'center';
                    ctx2.fillText('Sem dados de dispositivos', canvas.width / 2, canvas.height / 2);
                }
            }

            // Top Browsers
            if (data.topBrowsers && data.topBrowsers.length > 0) {
                MontanariChart('browsersChart', {
                    type: 'bar',
                    data: {
                        labels: data.topBrowsers.map(b => b.name),
                        datasets: [{
                            label: 'Visualizações',
                            data: data.topBrowsers.map(b => b.value),
                            backgroundColor: ['#3b82f6','#10b981','#f59e0b','#ef4444','#8b5cf6','#ec4899','#06b6d4','#84cc16','#f97316','#6366f1'],
                            borderRadius: 6, barPercentage: 0.7,
                        }]
                    },
                    options: {
                        responsive: true, maintainAspectRatio: false, indexAxis: 'y',
                        plugins: { legend: { display: false }, tooltip: { backgroundColor: '#1f2937', padding: 10, cornerRadius: 8 } },
                        scales: {
                            x: { beginAtZero: true, grid: { color: '#f3f4f6' }, ticks: { font: { size: 10 }, color: '#9ca3af' } },
                            y: { grid: { display: false }, ticks: { font: { size: 11 }, color: '#374151' } }
                        }
                    }
                });
            }

            // User Types
            if (data.userTypes && data.userTypes.length > 0) {
                var typeLabels = data.userTypes.map(t => {
                    if (t.type === 'new') return 'Novos';
                    if (t.type === 'returning') return 'Retornantes';
                    return t.type;
                });
                MontanariChart('userTypesChart', {
                    type: 'doughnut',
                    data: {
                        labels: typeLabels,
                        datasets: [{
                            data: data.userTypes.map(t => t.value),
                            backgroundColor: ['#3b82f6', '#f59e0b', '#10b981'],
                            borderWidth: 0, hoverOffset: 6,
                        }]
                    },
                    options: {
                        responsive: true, maintainAspectRatio: false, cutout: '65%',
                        plugins: {
                            legend: { position: 'bottom', labels: { usePointStyle: true, pointStyle: 'circle', padding: 12, font: { size: 11 } } },
                            tooltip: {
                                backgroundColor: '#1f2937', padding: 10, cornerRadius: 8,
                                callbacks: {
                                    label: function(ctx) {
                                        var total = ctx.dataset.data.reduce((a, b) => a + b, 0);
                                        var pct = total > 0 ? ((ctx.parsed / total) * 100).toFixed(1) : 0;
                                        return ' ' + ctx.label + ': ' + ctx.parsed.toLocaleString('pt-BR') + ' (' + pct + '%)';
                                    }
                                }
                            }
                        }
                    }
                });
            }
        }
    </script>
    @endif
</div>

<div>
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
        <p class="mt-1 text-sm text-gray-500">Visão geral do sistema.</p>
    </div>

    <!-- Stats Cards - Sistema -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-6">
        <!-- Usuários -->
        <a href="{{ route('dashboard.users') }}" class="group">
            <x-card class="transition-all group-hover:shadow-md group-hover:-translate-y-0.5">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                        <i class="fa-solid fa-users text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Usuários</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\User::count() }}</p>
                    </div>
                </div>
            </x-card>
        </a>

        <!-- Configurações -->
        <a href="{{ route('dashboard.config') }}" class="group">
            <x-card class="transition-all group-hover:shadow-md group-hover:-translate-y-0.5">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                        <i class="fa-solid fa-gear text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Configurações</p>
                        <p class="text-lg font-semibold text-gray-900">Sistema</p>
                    </div>
                </div>
            </x-card>
        </a>



       
    </div>

    <!-- Analytics Charts -->
    <h2 class="text-lg font-semibold text-gray-900 mb-4">Visão Geral do Site</h2>
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mb-6">
        <!-- Visitors & Page Views Chart -->
        <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-white shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <i class="fa-solid fa-chart-line text-sm"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900">Visitantes & Page Views (6 meses)</h3>
                </div>
                <a href="{{ route('dashboard.analytics') }}" class="text-xs text-amber-600 hover:text-amber-700 font-medium">
                    Ver mais <i class="fa-solid fa-arrow-right text-[10px] ml-0.5"></i>
                </a>
            </div>
            @if($hasAnalytics && count($analyticsLabels) > 0)
                <div style="height: 220px;">
                    <canvas id="dashVisitorsChart"></canvas>
                </div>
            @else
                <div class="flex h-[220px] items-center justify-center">
                    <p class="text-sm text-gray-400">Sem dados de analytics disponíveis</p>
                </div>
            @endif
        </div>

        <!-- Device Category -->
        <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-purple-50 text-purple-600">
                        <i class="fa-solid fa-chart-pie text-sm"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900">Dispositivos</h3>
                </div>
            </div>
            @if($hasAnalytics && count($deviceLabels) > 0)
                <div style="height: 200px;">
                    <canvas id="dashDeviceChart"></canvas>
                </div>
            @else
                <div class="flex h-[200px] items-center justify-center">
                    <p class="text-sm text-gray-400">Sem dados de dispositivos</p>
                </div>
            @endif
        </div>
    </div>

    @if($hasAnalytics && count($analyticsLabels) > 0)
    <script>
        document.addEventListener('livewire:initialized', () => {
            setTimeout(() => initDashboardCharts(), 200);
        });

        Livewire.hook('morph.updated', ({ el }) => {
            if (el.querySelector('#dashVisitorsChart')) {
                setTimeout(() => initDashboardCharts(), 300);
            }
        });

        function initDashboardCharts() {
            var labels = @js($analyticsLabels);
            var visitors = @js($analyticsVisitors);
            var pageViews = @js($analyticsPageViews);
            var deviceLabels = @js($deviceLabels);
            var deviceValues = @js($deviceValues);

            // Visitors Line Chart
            if (labels.length > 0) {
                MontanariChart('dashVisitorsChart', {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Visitantes', data: visitors,
                            borderColor: '#3b82f6', backgroundColor: 'rgba(59,130,246,0.08)',
                            fill: true, tension: 0.4, borderWidth: 2, pointRadius: 0, pointHoverRadius: 4,
                        },{
                            label: 'Page Views', data: pageViews,
                            borderColor: '#10b981', backgroundColor: 'rgba(16,185,129,0.04)',
                            fill: true, tension: 0.4, borderWidth: 2, pointRadius: 0, pointHoverRadius: 4,
                        }]
                    },
                    options: {
                        responsive: true, maintainAspectRatio: false,
                        interaction: { intersect: false, mode: 'index' },
                        plugins: {
                            legend: { position: 'top', labels: { usePointStyle: true, pointStyle: 'circle', padding: 12, font: { size: 10 } } },
                            tooltip: { backgroundColor: '#1f2937', padding: 8, cornerRadius: 6 }
                        },
                        scales: {
                            x: { grid: { display: false }, ticks: { font: { size: 9 }, color: '#9ca3af', maxRotation: 0 } },
                            y: { beginAtZero: true, grid: { color: '#f3f4f6' }, ticks: { font: { size: 9 }, color: '#9ca3af' } }
                        }
                    }
                });
            }

            // Device Doughnut
            var hasDeviceData = deviceLabels.length > 0 && deviceValues.some(v => v > 0);
            if (hasDeviceData) {
                MontanariChart('dashDeviceChart', {
                    type: 'doughnut',
                    data: {
                        labels: deviceLabels,
                        datasets: [{
                            data: deviceValues,
                            backgroundColor: ['#3b82f6', '#f59e0b', '#8b5cf6', '#10b981'],
                            borderWidth: 0, hoverOffset: 4,
                        }]
                    },
                    options: {
                        responsive: true, maintainAspectRatio: false, cutout: '65%',
                        plugins: {
                            legend: { position: 'bottom', labels: { usePointStyle: true, pointStyle: 'circle', padding: 10, font: { size: 10 } } },
                            tooltip: {
                                backgroundColor: '#1f2937', padding: 8, cornerRadius: 6,
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

    <!-- Stats Cards - Módulo Jurídico -->
    <h2 class="text-lg font-semibold text-gray-900 mb-4">Módulo Jurídico</h2>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-6">
        <!-- Processos -->
        <a href="{{ route('dashboard.legal.processes') }}" class="group">
            <x-card class="transition-all group-hover:shadow-md group-hover:-translate-y-0.5">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600">
                        <i class="fa-solid fa-scale-balanced text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Processos</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Process::count() }}</p>
                    </div>
                </div>
            </x-card>
        </a>

        <!-- Prazos Pendentes -->
        <a href="{{ route('dashboard.legal.deadlines') }}" class="group">
            <x-card class="transition-all group-hover:shadow-md group-hover:-translate-y-0.5">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-100 text-red-600">
                        <i class="fa-solid fa-clock text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Prazos Pendentes</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Deadline::pending()->count() }}</p>
                    </div>
                </div>
            </x-card>
        </a>

        <!-- Tarefas -->
        <a href="{{ route('dashboard.legal.tasks') }}" class="group">
            <x-card class="transition-all group-hover:shadow-md group-hover:-translate-y-0.5">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-yellow-100 text-yellow-600">
                        <i class="fa-solid fa-list-check text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Tarefas</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Task::pending()->count() }}</p>
                    </div>
                </div>
            </x-card>
        </a>

        <!-- Agenda -->
        <a href="{{ route('dashboard.legal.agenda') }}" class="group">
            <x-card class="transition-all group-hover:shadow-md group-hover:-translate-y-0.5">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-teal-100 text-teal-600">
                        <i class="fa-solid fa-calendar-days text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Agenda</p>
                        <p class="text-lg font-semibold text-gray-900">Calendário</p>
                    </div>
                </div>
            </x-card>
        </a>
    </div>

    <!-- Quick Actions -->
    <x-card title="Ações Rápidas" icon="fa-bolt">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <a 
                href="{{ route('dashboard.legal.processes.create') }}" 
                class="flex items-center gap-3 rounded-lg border border-gray-200 p-4 transition hover:border-indigo-300 hover:bg-indigo-50"
            >
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-100 text-indigo-600">
                    <i class="fa-solid fa-scale-balanced"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Novo Processo</p>
                    <p class="text-xs text-gray-500">Criar novo processo</p>
                </div>
            </a>

            <a 
                href="{{ route('dashboard.legal.deadlines.create') }}" 
                class="flex items-center gap-3 rounded-lg border border-gray-200 p-4 transition hover:border-red-300 hover:bg-red-50"
            >
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-100 text-red-600">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Novo Prazo</p>
                    <p class="text-xs text-gray-500">Registrar prazo</p>
                </div>
            </a>

            <a 
                href="{{ route('dashboard.legal.tasks.create') }}" 
                class="flex items-center gap-3 rounded-lg border border-gray-200 p-4 transition hover:border-yellow-300 hover:bg-yellow-50"
            >
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-yellow-100 text-yellow-600">
                    <i class="fa-solid fa-list-check"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Nova Tarefa</p>
                    <p class="text-xs text-gray-500">Criar tarefa</p>
                </div>
            </a>

            <a 
                href="{{ route('dashboard.legal.agenda') }}" 
                class="flex items-center gap-3 rounded-lg border border-gray-200 p-4 transition hover:border-teal-300 hover:bg-teal-50"
            >
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-teal-100 text-teal-600">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Agenda</p>
                    <p class="text-xs text-gray-500">Abrir calendário</p>
                </div>
            </a>
        </div>
    </x-card>
</div>

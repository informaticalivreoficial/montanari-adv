<div>
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
        <p class="mt-1 text-sm text-gray-500">Visão geral do sistema.</p>
    </div>

    <!-- Stats Cards - Sistema -->
    @unless(auth()->user()->hasRole('employee'))
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
    @endunless

    <!-- Analytics Charts -->
    @unless(auth()->user()->hasRole('employee'))
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
    @endunless

    <!-- Stats Cards - Módulo Jurídico -->
    @if(auth()->user()->hasRole('employee'))
        {{-- ═══ Employee Dashboard ═══ --}}
        @php
            $myTasks = \App\Models\Task::with('process')
                ->where('responsible_id', auth()->id())
                ->whereIn('status', ['pending', 'in_progress'])
                ->orderBy('due_date')
                ->limit(5)
                ->get();

            $myDeadlines = \App\Models\Deadline::with('process', 'responsible')
                ->upcoming()
                ->orderBy('due_date')
                ->limit(5)
                ->get();

            $myEvents = \App\Models\Event::upcoming()
                ->orderBy('start_date')
                ->limit(5)
                ->get();
        @endphp

        {{-- Tarefas Designadas --}}
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Minhas Tarefas</h2>
        @if($myTasks->isEmpty())
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6 mb-6 text-center">
                <p class="text-sm text-gray-500">Nenhuma tarefa designada.</p>
            </div>
        @else
            <div class="space-y-3 mb-6">
                @foreach($myTasks as $task)
                    @php
                        $taskUrgent = false;
                        $taskAlert = false;
                        if ($task->due_date) {
                            $taskDaysLeft = now()->diffInDays($task->due_date, false);
                            $taskUrgent = $task->due_date->isPast() && $task->status !== 'completed';
                            $taskAlert = !$taskUrgent && $taskDaysLeft >= 0 && $taskDaysLeft <= 2;
                        }
                    @endphp
                    <a href="{{ route('dashboard.legal.tasks') }}" class="block rounded-xl border {{ $taskUrgent ? 'border-red-300 bg-red-50' : ($taskAlert ? 'border-amber-300 bg-amber-50' : 'border-gray-200 bg-white') }} shadow-sm p-4 transition hover:shadow-md">
                        <div class="flex items-center gap-4">
                            @if($taskUrgent)
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-100 text-red-600">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                            @elseif($taskAlert)
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-100 text-amber-600">
                                    <i class="fa-solid fa-clock"></i>
                                </div>
                            @else
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg {{ $task->status === 'in_progress' ? 'bg-blue-100 text-blue-600' : 'bg-yellow-100 text-yellow-600' }}">
                                    <i class="fa-solid {{ $task->status === 'in_progress' ? 'fa-play' : 'fa-list-check' }}"></i>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2">
                                    <p class="text-sm font-semibold text-gray-900 truncate">{{ $task->title }}</p>
                                    @if($taskUrgent)
                                        <span class="inline-flex items-center rounded-full bg-red-100 px-2 py-0.5 text-[10px] font-semibold text-red-700">Atrasado</span>
                                    @elseif($taskAlert)
                                        <span class="inline-flex items-center rounded-full bg-amber-100 px-2 py-0.5 text-[10px] font-semibold text-amber-700">
                                            <i class="fa-solid fa-bell mr-1"></i>Urgente
                                        </span>
                                    @endif
                                </div>
                                <div class="flex items-center gap-3 mt-1 text-xs text-gray-500">
                                    @if($task->process)
                                        <span><i class="fa-solid fa-folder mr-1"></i>{{ $task->process->process_number }}</span>
                                    @endif
                                    @if($task->due_date)
                                        <span class="{{ $taskUrgent ? 'text-red-600 font-medium' : ($taskAlert ? 'text-amber-600 font-medium' : '') }}">
                                            <i class="fa-solid fa-calendar mr-1"></i>{{ $task->due_date->format('d/m/Y H:i') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <span class="inline-flex items-center rounded-full bg-{{ $task->priority_color }}-100 px-2.5 py-0.5 text-xs font-medium text-{{ $task->priority_color }}-700">
                                {{ $task->priority_label }}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

        {{-- Prazos a Vencer --}}
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Próximos Prazos</h2>
        @if($myDeadlines->isEmpty())
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6 mb-6 text-center">
                <p class="text-sm text-gray-500">Nenhum prazo pendente.</p>
            </div>
        @else
            <div class="space-y-3 mb-6">
                @foreach($myDeadlines as $deadline)
                    @php
                        $dlUrgent = $deadline->is_overdue;
                        $dlAlert = !$dlUrgent && $deadline->due_date->diffInDays(now(), false) >= 0 && $deadline->due_date->diffInDays(now(), false) <= 2;
                    @endphp
                    <a href="{{ route('dashboard.legal.deadlines') }}" class="block rounded-xl border {{ $dlUrgent ? 'border-red-300 bg-red-50' : ($dlAlert ? 'border-amber-300 bg-amber-50' : 'border-gray-200 bg-white') }} shadow-sm p-4 transition hover:shadow-md">
                        <div class="flex items-center gap-4">
                            <div class="mt-1">
                                @if($dlUrgent)
                                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-100 text-red-600">
                                        <i class="fa-solid fa-triangle-exclamation text-sm"></i>
                                    </div>
                                @elseif($dlAlert)
                                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-100 text-amber-600">
                                        <i class="fa-solid fa-bell text-sm"></i>
                                    </div>
                                @elseif($deadline->priority === 'urgent')
                                    <span class="flex h-3 w-3 rounded-full bg-red-500 animate-pulse"></span>
                                @elseif($deadline->priority === 'high')
                                    <span class="flex h-3 w-3 rounded-full bg-orange-500"></span>
                                @elseif($deadline->priority === 'normal')
                                    <span class="flex h-3 w-3 rounded-full bg-blue-500"></span>
                                @else
                                    <span class="flex h-3 w-3 rounded-full bg-gray-400"></span>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2">
                                    <p class="text-sm font-semibold text-gray-900 truncate">{{ $deadline->title }}</p>
                                    @if($dlUrgent)
                                        <span class="inline-flex items-center rounded-full bg-red-100 px-2 py-0.5 text-[10px] font-semibold text-red-700">Atrasado</span>
                                    @elseif($dlAlert)
                                        <span class="inline-flex items-center rounded-full bg-amber-100 px-2 py-0.5 text-[10px] font-semibold text-amber-700">
                                            <i class="fa-solid fa-bell mr-1"></i>Vence em breve
                                        </span>
                                    @endif
                                </div>
                                <div class="flex items-center gap-3 mt-1 text-xs text-gray-500">
                                    @if($deadline->process)
                                        <span><i class="fa-solid fa-folder mr-1"></i>{{ $deadline->process->process_number }}</span>
                                    @endif
                                    @if($deadline->responsible)
                                        <span><i class="fa-solid fa-user mr-1"></i>{{ $deadline->responsible->name }}</span>
                                    @endif
                                    <span class="{{ $dlUrgent ? 'text-red-600 font-medium' : ($dlAlert ? 'text-amber-600 font-medium' : '') }}">
                                        <i class="fa-solid fa-calendar mr-1"></i>{{ $deadline->due_date->format('d/m/Y H:i') }}
                                    </span>
                                </div>
                            </div>
                            @if($deadline->is_overdue)
                                <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-700">Atrasado</span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

        {{-- Agenda --}}
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Próximos Eventos</h2>
        @if($myEvents->isEmpty())
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6 mb-6 text-center">
                <p class="text-sm text-gray-500">Nenhum evento agendado.</p>
            </div>
        @else
            <div class="space-y-3 mb-6">
                @foreach($myEvents as $event)
                    @php
                        $evUrgent = $event->start_date->isPast();
                        $evAlert = !$evUrgent && $event->start_date->diffInDays(now(), false) >= 0 && $event->start_date->diffInDays(now(), false) <= 2;
                    @endphp
                    <a href="{{ route('dashboard.legal.agenda') }}" class="block rounded-xl border {{ $evUrgent ? 'border-red-300 bg-red-50' : ($evAlert ? 'border-amber-300 bg-amber-50' : 'border-gray-200 bg-white') }} shadow-sm p-4 transition hover:shadow-md">
                        <div class="flex items-center gap-4">
                            @if($evUrgent)
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-100 text-red-600">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                            @elseif($evAlert)
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-100 text-amber-600">
                                    <i class="fa-solid fa-bell"></i>
                                </div>
                            @else
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg" style="background-color: {{ $event->event_type_color }}15; color: {{ $event->event_type_color }}">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2">
                                    <p class="text-sm font-semibold text-gray-900 truncate">{{ $event->title }}</p>
                                    @if($evUrgent)
                                        <span class="inline-flex items-center rounded-full bg-red-100 px-2 py-0.5 text-[10px] font-semibold text-red-700">Hoje!</span>
                                    @elseif($evAlert)
                                        <span class="inline-flex items-center rounded-full bg-amber-100 px-2 py-0.5 text-[10px] font-semibold text-amber-700">
                                            <i class="fa-solid fa-bell mr-1"></i>Em breve
                                        </span>
                                    @endif
                                </div>
                                <div class="flex items-center gap-3 mt-1 text-xs text-gray-500">
                                    <span class="inline-flex items-center rounded-full px-2 py-0.5 font-medium" style="background-color: {{ $evUrgent ? '#fef2f2' : ($evAlert ? '#fffbeb' : $event->event_type_color.'15') }}; color: {{ $evUrgent ? '#dc2626' : ($evAlert ? '#d97706' : $event->event_type_color) }}">
                                        {{ $event->event_type_label }}
                                    </span>
                                    <span class="{{ $evUrgent ? 'text-red-600 font-medium' : ($evAlert ? 'text-amber-600 font-medium' : '') }}">
                                        <i class="fa-solid fa-calendar mr-1"></i>{{ $event->start_date->format('d/m/Y H:i') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

    @else
        {{-- ═══ Admin/Manager Dashboard ═══ --}}
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
                            <p class="text-2xl font-bold text-gray-900">
                                @if(auth()->user()->hasRole('manager'))
                                    {{ \App\Models\Process::where('responsible_id', auth()->id())->count() }}
                                @else
                                    {{ \App\Models\Process::count() }}
                                @endif
                            </p>
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
    @endif
</div>

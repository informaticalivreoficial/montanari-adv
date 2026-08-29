<?php

use Illuminate\Support\Facades\Schedule;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file defines the schedule for commands that run periodically.
|
*/

// Re-sincroniza processos vinculados ao Datajud (CNJ) e gera sitemap
Schedule::command('sitemap:generate')->everyMinute()->withoutOverlapping();
Schedule::command('datajud:sync')->everyMinute()->withoutOverlapping();
Schedule::command('app:clear-logs')->everyMinute()->withoutOverlapping();

// Remove notificações com mais de 90 dias (evita crescimento indefinido da tabela)
Schedule::command('notifications:purge')->daily()->withoutOverlapping();

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsPurge extends Command
{
    /**
     * Assinatura do comando.
     * Ex.: php artisan notifications:purge
     *      php artisan notifications:purge --days=30
     *      php artisan notifications:purge --only-read
     */
    protected $signature = 'notifications:purge
                            {--days=90 : Idade mínima (em dias) das notificações a serem excluídas}
                            {--only-read : Quando informado, exclui apenas notificações já lidas}';

    protected $description = 'Remove do banco as notificações com mais de N dias';

    public function handle()
    {
        $days = (int) $this->option('days');
        $onlyRead = $this->option('only-read');

        $query = DatabaseNotification::query()
            ->where('created_at', '<', now()->subDays($days));

        if ($onlyRead) {
            $query->whereNotNull('read_at');
        }

        $count = $query->count();

        if ($count === 0) {
            $this->info("Nenhuma notificação com mais de {$days} dias" . ($onlyRead ? ' (somente lidas)' : '') . ' para remover.');

            return Command::SUCCESS;
        }

        $query->delete();

        $this->info("Notificações removidas (>{$days} dias" . ($onlyRead ? ', somente lidas' : '') . "): {$count}");

        return Command::SUCCESS;
    }
}

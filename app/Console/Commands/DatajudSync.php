<?php

namespace App\Console\Commands;

use App\Exceptions\DatajudException;
use App\Exceptions\DjenException;
use App\Models\Process;
use App\Models\User;
use App\Services\DatajudService;
use App\Services\DjenService;
use App\Notifications\System\ProcessMovement;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

/**
 * Re-sincroniza processos locais vinculados ao Datajud (CNJ).
 *
 * Por padrão, atualiza todos os processos cuja origem é o Datajud.
 * É possível restringir a um número CNJ específico com --numero.
 *
 * O tribunal é inferido do campo court_acronym do processo, ou pode ser
 * informado explicitamente via --tribunal.
 *
 * Exemplos:
 *   php artisan datajud:sync
 *   php artisan datajud:sync --numero 0000762-04.2003.4.01.3700 --tribunal trf1
 */
class DatajudSync extends Command
{
    protected $signature = 'datajud:sync
        {--tribunal= : Sigla do tribunal (ex.: trf1, tjsp) usada na consulta}
        {--numero= : Re-sincroniza apenas este número CNJ}
        {--all : Sincroniza mesmo os processos com auto_sync desativado}
        {--pretend : Exibe o que seria feito, sem gravar no banco}';

    protected $description = 'Re-sincroniza processos locais vinculados ao Datajud (API Pública do CNJ).';

    public function handle(): int
    {
        $svc = new DatajudService();

        $query = Process::query()
            ->where('source_provider', 'datajud')
            ->whereNotNull('source_id');

        if (!$this->option('all')) {
            $query->where('auto_sync', true);
        }

        if ($numero = $this->option('numero')) {
            $query->where('source_id', $numero);
        }

        $processes = $query->get();

        if ($processes->isEmpty()) {
            $this->warn('Nenhum processo vinculado ao Datajud encontrado localmente.');
            return self::SUCCESS;
        }

        $this->info("Processos a sincronizar: {$processes->count()}");

        $synced = 0;
        $errors = 0;

        foreach ($processes as $process) {
            $tribunal = $this->option('tribunal') ?: strtolower((string) ($process->court_acronym ?? ''));

            if (empty($tribunal)) {
                $this->warn("Processo {$process->source_id} ignorado: tribunal não informado (defina court_acronym ou --tribunal).");
                continue;
            }

            try {
                $source = $svc->findByNumero($tribunal, $process->source_id);

                if ($source === null) {
                    $msg = "Processo {$process->source_id} não encontrado no Datajud ({$tribunal}).";
                    $this->error($msg);
                    if (!$this->option('pretend')) {
                        $process->update([
                            'sync_error'    => $msg,
                            'sync_attempts' => $process->sync_attempts + 1,
                        ]);
                    }
                    $errors++;
                    continue;
                }

                $data = $svc->normalize($source);
                $synced++;

                if ($this->option('pretend')) {
                    $this->line("  [simulação] {$process->source_id} -> {$tribunal}: " . count($data) . ' campos mapeados.');
                    continue;
                }

                $process->update(array_merge($data, [
                    'source_data'    => $source,
                    'last_synced_at' => now(),
                    'sync_attempts'  => $process->sync_attempts + 1,
                    'sync_error'     => null,
                ]));

                $svc->syncDetails($process, $source);

                $this->line("  [ok] {$process->source_id} sincronizado ({$tribunal}).");

                // Notifica movimentação
                if (! $this->option('pretend')) {
                    $admins = User::role(['super-admin', 'admin'])->get();
                    Notification::send($admins, new ProcessMovement(
                        processNumber: $process->source_id,
                        sourceLabel: 'Datajud',
                        description: "Dados atualizados via API do CNJ ({$tribunal})",
                        processId: $process->id,
                    ));
                }

                // Complemento DJEN: publicações/intimações do Diário oficial.
                if (! $this->option('pretend')) {
                    try {
                        $djen = new DjenService();
                        $n = $djen->syncPublications($process);
                        if ($n > 0) {
                            $this->line("  [ok] {$process->source_id}: {$n} publicação(ões) do DJEN.");

                            // Notifica publicações DJEN
                            if (! $this->option('pretend')) {
                                $admins = User::role(['super-admin', 'admin'])->get();
                                Notification::send($admins, new ProcessMovement(
                                    processNumber: $process->source_id,
                                    sourceLabel: 'DJEN',
                                    description: "{$n} nova(s) publicação(ões) no Diário Eletrônico",
                                    processId: $process->id,
                                ));
                            }
                        }
                    } catch (DjenException $e) {
                        $this->warn("  [aviso] DJEN para {$process->source_id}: {$e->getMessage()}");
                    }
                }
            } catch (DatajudException $e) {
                $errors++;
                $this->error("  [erro] {$process->source_id}: {$e->getMessage()}");
                if (!$this->option('pretend')) {
                    $process->update([
                        'sync_error'    => $e->getMessage(),
                        'sync_attempts' => $process->sync_attempts + 1,
                    ]);
                }
            }
        }

        $this->info("Concluído. Sincronizados: {$synced} | Erros: {$errors}");

        return $errors > 0 ? self::FAILURE : self::SUCCESS;
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Process;
use App\Models\Deadline;
use App\Models\Task;
use App\Models\Event;
use App\Models\Document;
use App\Models\User;

class LegalModuleSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🔧 Seedando módulo jurídico...');

        // Busca team e clients existentes
        $team = User::team()->get();
        $clients = User::role('client')->get();

        if ($team->isEmpty() || $clients->isEmpty()) {
            $this->command->warn('⚠️  Crie ao menos um membro do time e um cliente antes de rodar este seeder.');
            return;
        }

        // --- PROCESSOS ---
        $this->command->info('  📂 Criando processos...');
        $processes = Process::factory(15)
            ->sequence(fn () => [
                'client_id' => $clients->random()->id,
                'responsible_id' => $team->random()->id,
            ])
            ->create();

        // Alguns processos ativos, outros arquivados
        $processes->take(10)->each(fn ($p) => $p->update(['status' => 'active']));
        $processes->slice(10, 3)->each(fn ($p) => $p->update(['status' => 'suspended']));
        $processes->slice(13, 2)->each(fn ($p) => $p->update(['status' => 'archived']));

        // --- PRAZOS ---
        $this->command->info('  ⏰ Criando prazos...');
        foreach ($processes->take(10) as $process) {
            $count = rand(1, 4);
            Deadline::factory($count)
                ->create([
                    'process_id' => $process->id,
                    'responsible_id' => $team->random()->id,
                ]);
        }

        // Prazos atrasados (para testar indicador visual)
        Deadline::factory(3)
            ->overdue()
            ->create([
                'process_id' => $processes->random()->id,
                'responsible_id' => $team->random()->id,
            ]);

        // Prazos urgentes próximos
        Deadline::factory(2)
            ->urgent()
            ->create([
                'process_id' => $processes->random()->id,
                'responsible_id' => $team->random()->id,
            ]);

        // --- TAREFAS ---
        $this->command->info('  ✅ Criando tarefas...');
        foreach ($processes->take(8) as $process) {
            $count = rand(1, 3);
            Task::factory($count)
                ->create([
                    'process_id' => $process->id,
                    'responsible_id' => $team->random()->id,
                ]);
        }

        // Tarefas gerais (sem processo vinculado)
        Task::factory(5)
            ->create([
                'process_id' => null,
                'responsible_id' => $team->random()->id,
            ]);

        // --- EVENTOS (Agenda) ---
        $this->command->info('  📅 Criando eventos...');
        foreach ($processes->take(10) as $index => $process) {
            $type = $index % 3 === 0 ? 'hearing' : ($index % 3 === 1 ? 'meeting' : 'other');

            Event::factory()
                ->create([
                    'process_id' => $process->id,
                    'user_id' => $team->random()->id,
                    'event_type' => $type,
                    'start_date' => now()->addDays(rand(-7, 30)),
                    'end_date' => now()->addDays(rand(-7, 30))->addHours(rand(1, 3)),
                ]);
        }

        // --- DOCUMENTOS ---
        $this->command->info('  📄 Criando documentos...');
        foreach ($processes->take(8) as $process) {
            $count = rand(1, 3);
            Document::factory($count)
                ->create([
                    'process_id' => $process->id,
                    'uploaded_by' => $team->random()->id,
                ]);
        }

        $totalProcesses = Process::count();
        $totalDeadlines = Deadline::count();
        $totalTasks = Task::count();
        $totalEvents = Event::count();
        $totalDocuments = Document::count();

        $this->command->info("  ✅ Módulo jurídico seedado com sucesso!");
        $this->command->info("     Processos: {$totalProcesses}");
        $this->command->info("     Prazos:    {$totalDeadlines}");
        $this->command->info("     Tarefas:   {$totalTasks}");
        $this->command->info("     Eventos:   {$totalEvents}");
        $this->command->info("     Documentos: {$totalDocuments}");
    }
}

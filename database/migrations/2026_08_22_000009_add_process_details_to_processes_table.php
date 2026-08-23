<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Adiciona os campos do sistema externo que ainda não existiam na tabela processes.
     * Nomes padronizados em inglês.
     */
    public function up(): void
    {
        Schema::table('processes', function (Blueprint $table) {
            // Números
            $table->string('cnj_number', 30)->nullable()->unique()->after('process_number');
            $table->string('legacy_number', 50)->nullable()->after('cnj_number');
            $table->string('external_number', 100)->nullable()->after('legacy_number');

            // Origem / Tribunal
            $table->string('court_acronym', 20)->nullable()->after('court_variable');
            $table->string('justice_segment', 100)->nullable()->after('court_acronym');
            $table->string('instance_level', 50)->nullable()->after('justice_segment');
            $table->string('state', 2)->nullable()->after('instance_level');
            $table->string('judicial_district', 150)->nullable()->after('state');
            $table->string('judicial_district_code', 30)->nullable()->after('judicial_district');
            $table->string('forum', 150)->nullable()->after('judicial_district_code');
            $table->string('forum_code', 50)->nullable()->after('forum');
            $table->string('court_division_code', 50)->nullable()->after('forum_code');
            $table->string('judicial_unit', 200)->nullable()->after('court_division_code');

            // Classificação
            $table->string('case_class', 200)->nullable()->after('case_area');
            $table->string('case_class_code', 50)->nullable()->after('case_class');
            $table->string('main_subject', 255)->nullable()->after('case_class_code');
            $table->string('main_subject_code', 50)->nullable()->after('main_subject');
            $table->string('action_type', 200)->nullable()->after('main_subject_code');
            $table->string('nature', 100)->nullable()->after('action_type');

            // Fase / Situação
            $table->string('process_phase', 150)->nullable()->after('status');
            $table->string('court_status', 100)->nullable()->after('process_phase');
            $table->string('situation', 100)->nullable()->after('court_status');
            $table->text('situation_reason')->nullable()->after('situation');

            // Datas importantes
            $table->date('distribution_date')->nullable()->after('description');
            $table->date('filing_date')->nullable()->after('distribution_date');
            $table->date('start_date')->nullable()->after('filing_date');
            $table->date('summons_date')->nullable()->after('start_date');
            $table->date('sentence_date')->nullable()->after('summons_date');
            $table->date('res_judicata_date')->nullable()->after('sentence_date');
            $table->date('closure_date')->nullable()->after('res_judicata_date');
            $table->date('archival_date')->nullable()->after('closure_date');
            $table->date('unarchival_date')->nullable()->after('archival_date');
            $table->date('last_movement_date')->nullable()->after('unarchival_date');

            // Valores
            $table->decimal('cause_value', 15, 2)->nullable()->after('contract_value');
            $table->decimal('updated_cause_value', 15, 2)->nullable()->after('cause_value');
            $table->decimal('conviction_value', 15, 2)->nullable()->after('updated_cause_value');
            $table->decimal('executed_value', 15, 2)->nullable()->after('conviction_value');
            $table->decimal('received_value', 15, 2)->nullable()->after('executed_value');
            $table->decimal('pending_value', 15, 2)->nullable()->after('executed_value');
            $table->string('currency', 3)->default('BRL')->after('pending_value');

            // Segredo de justiça / prioridades
            $table->boolean('secret_of_justice')->default(false)->after('currency');
            $table->boolean('free_justice')->default(false)->after('secret_of_justice');
            $table->boolean('priority')->default(false)->after('free_justice');
            $table->string('priority_type', 150)->nullable()->after('priority');
            $table->boolean('elderly')->default(false)->after('priority_type');
            $table->boolean('disabled')->default(false)->after('elderly');
            $table->boolean('serious_illness')->default(false)->after('disabled');

            // Liminar / tutela / urgência
            $table->boolean('has_injunction')->default(false)->after('serious_illness');
            $table->boolean('has_preliminary_injunction')->default(false)->after('has_injunction');
            $table->boolean('has_urgency')->default(false)->after('has_preliminary_injunction');
            $table->text('injunction_notes')->nullable()->after('has_urgency');

            // Audiências
            $table->boolean('has_hearing')->default(false)->after('injunction_notes');
            $table->dateTime('next_hearing_at')->nullable()->after('has_hearing');
            $table->string('next_hearing_type', 150)->nullable()->after('next_hearing_at');
            $table->string('next_hearing_location', 255)->nullable()->after('next_hearing_type');
            $table->text('hearing_notes')->nullable()->after('next_hearing_location');

            // Sentença / acórdão / recurso
            $table->boolean('has_sentence')->default(false)->after('hearing_notes');
            $table->string('sentence_result', 150)->nullable()->after('has_sentence');
            $table->boolean('has_appeal')->default(false)->after('sentence_result');
            $table->string('appeal_type', 150)->nullable()->after('has_appeal');
            $table->string('appeal_result', 150)->nullable()->after('appeal_type');

            // Controle interno do escritório
            $table->string('internal_title', 255)->nullable()->after('appeal_result');
            $table->string('internal_code', 100)->nullable()->unique()->after('internal_title');
            $table->string('folder', 255)->nullable()->after('internal_code');
            $table->string('folder_number', 100)->nullable()->after('folder');
            $table->longText('notes')->nullable()->after('folder_number');

            // Controle de sincronização
            $table->string('source', 50)->default('manual')->after('notes');
            $table->string('source_provider', 100)->nullable()->after('source');
            $table->string('source_id', 255)->nullable()->after('source_provider');
            $table->dateTime('last_synced_at')->nullable()->after('source_id');
            $table->dateTime('next_sync_at')->nullable()->after('last_synced_at');
            $table->text('sync_error')->nullable()->after('next_sync_at');
            $table->unsignedInteger('sync_attempts')->default(0)->after('sync_error');
            $table->json('source_data')->nullable()->after('sync_attempts');
            $table->json('metadata')->nullable()->after('source_data');
        });
    }

    public function down(): void
    {
        Schema::table('processes', function (Blueprint $table) {
            $table->dropUnique(['cnj_number']);
            $table->dropUnique(['internal_code']);

            $table->dropColumn([
                'cnj_number',
                'legacy_number',
                'external_number',
                'court_acronym',
                'justice_segment',
                'instance_level',
                'state',
                'judicial_district',
                'judicial_district_code',
                'forum',
                'forum_code',
                'court_division_code',
                'judicial_unit',
                'case_class',
                'case_class_code',
                'main_subject',
                'main_subject_code',
                'action_type',
                'nature',
                'process_phase',
                'court_status',
                'situation',
                'situation_reason',
                'distribution_date',
                'filing_date',
                'start_date',
                'summons_date',
                'sentence_date',
                'res_judicata_date',
                'closure_date',
                'archival_date',
                'unarchival_date',
                'last_movement_date',
                'cause_value',
                'updated_cause_value',
                'conviction_value',
                'executed_value',
                'received_value',
                'pending_value',
                'currency',
                'secret_of_justice',
                'free_justice',
                'priority',
                'priority_type',
                'elderly',
                'disabled',
                'serious_illness',
                'has_injunction',
                'has_preliminary_injunction',
                'has_urgency',
                'injunction_notes',
                'has_hearing',
                'next_hearing_at',
                'next_hearing_type',
                'next_hearing_location',
                'hearing_notes',
                'has_sentence',
                'sentence_result',
                'has_appeal',
                'appeal_type',
                'appeal_result',
                'internal_title',
                'internal_code',
                'folder',
                'folder_number',
                'notes',
                'source',
                'source_provider',
                'source_id',
                'last_synced_at',
                'next_sync_at',
                'sync_error',
                'sync_attempts',
                'source_data',
                'metadata',
            ]);
        });
    }
};

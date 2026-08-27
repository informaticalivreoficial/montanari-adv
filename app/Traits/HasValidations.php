<?php

namespace App\Traits;

/**
 * Trait HasValidations
 *
 * Centraliza regras de validação para todos os componentes Livewire.
 *
 * Uso:
 *   use HasValidations;
 *
 *   public function save()
 *   {
 *       $this->validateWith('article');  // valida com regras de artigo
 *       // ...
 *   }
 */
trait HasValidations
{
    /**
     * Regras de validação centralizadas
     */
    protected static function validationRules(): array
    {
        return [
            // ── Posts / Artigos ──
            'article' => [
                'title'        => 'required|string|min:3|max:255',
                'category'     => 'required|exists:cat_post,id',
                'content'      => 'nullable|string|max:100000',
                'excerpt'      => 'nullable|string|max:500',
                'metaDescription' => 'nullable|string|max:160',
                'tags'         => 'nullable|string|max:500',
                'publish_at'   => 'nullable|date_format:d/m/Y|after_or_equal:2000-01-01',
                'readingTime'  => 'nullable|string|max:50',
                'thumbCaption' => 'nullable|string|max:255',
                'status'       => 'nullable|in:0,1',
                'highlight'    => 'nullable|in:0,1',
            ],

            // ── Páginas ──
            'page' => [
                'title'        => 'required|string|min:3|max:255',
                'content'      => 'nullable|string|max:100000',
                'excerpt'      => 'nullable|string|max:500',
                'metaDescription' => 'nullable|string|max:160',
                'tags'         => 'nullable|string|max:500',
                'publish_at'   => 'nullable|date_format:d/m/Y|after_or_equal:2000-01-01',
                'showInMenu'   => 'nullable|in:0,1',
                'status'       => 'nullable|in:0,1',
            ],

            // ── Categorias ──
            'category' => [
                'title'   => 'required|string|min:2|max:255',
                'slug'    => 'nullable|string|max:255',
                'content' => 'nullable|string|max:50000',
                'status'  => 'nullable|in:0,1',
            ],

            // ── Processos ──
            'process' => [
                'client_id'           => 'required|exists:users,id',
                'process_number'      => 'required|string|max:255',
                'case_type'           => 'required|string',
                'court_name'          => 'nullable|string|max:255',
                'status'              => 'required|string',
                'cnj_number'          => 'nullable|string|max:30',
                'internal_code'       => 'nullable|string|max:100',
                'cause_value'         => 'nullable|numeric',
                'updated_cause_value' => 'nullable|numeric',
                'conviction_value'    => 'nullable|numeric',
                'executed_value'      => 'nullable|numeric',
                'received_value'      => 'nullable|numeric',
                'pending_value'       => 'nullable|numeric',
                'distribution_date'   => 'nullable|date',
                'filing_date'         => 'nullable|date',
                'start_date'          => 'nullable|date',
                'summons_date'        => 'nullable|date',
                'sentence_date'       => 'nullable|date',
                'res_judicata_date'   => 'nullable|date',
                'closure_date'        => 'nullable|date',
                'archival_date'       => 'nullable|date',
                'unarchival_date'     => 'nullable|date',
                'last_movement_date'  => 'nullable|date',
                'next_hearing_at'     => 'nullable|date',
                'source'              => 'nullable|string|in:manual,tribunal,api,importacao',
                'source_provider'     => 'nullable|string|max:100',
                'source_id'           => 'nullable|string|max:255',
                'last_synced_at'      => 'nullable|date',
                'next_sync_at'        => 'nullable|date',
                'sync_attempts'       => 'nullable|integer|min:0',
                'auto_sync'           => 'nullable|boolean',
                'source_data'         => 'nullable|json',
                'metadata'            => 'nullable|json',
            ],

            // ── Prazos ──
            'deadline' => [
                'process_id'     => 'required|exists:processes,id',
                'title'          => 'required|string|max:255',
                'due_date'       => 'required|date',
                'priority'       => 'required|string|in:low,normal,high,urgent',
                'description'    => 'nullable|string|max:5000',
                'responsible_id' => 'nullable|exists:users,id',
                'reminder_at'    => 'nullable|date',
                'notes'          => 'nullable|string|max:5000',
            ],

            // ── Tarefas ──
            'task' => [
                'title'          => 'required|string|max:255',
                'description'    => 'nullable|string|max:5000',
                'due_date'       => 'nullable|date',
                'priority'       => 'required|string|in:low,normal,high,urgent',
                'status'         => 'nullable|string|in:pending,in_progress,completed',
                'process_id'     => 'nullable|exists:processes,id',
                'responsible_id' => 'nullable|exists:users,id',
                'notes'          => 'nullable|string|max:5000',
            ],

            // ── Documentos ──
            'document' => [
                'title'       => 'required|string|min:3|max:255',
                'description' => 'nullable|string|max:2000',
                'category'    => 'nullable|string|max:100',
                'process_id'  => 'nullable|exists:processes,id',
                'file'        => 'required|file|max:10240|mimes:pdf,doc,docx,jpg,jpeg,png',
            ],

            // ── Imagens ──
            'image' => [
                'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
                'images'  => 'nullable|array|max:10',
                'images.*' => 'image|mimes:jpg,jpeg,png,gif,webp|max:5120',
            ],

            // ── Usuários ──
            'user' => [
                'name'     => 'required|string|min:3|max:255',
                'email'    => 'required|email|max:255',
                'password' => 'nullable|min:8|confirmed',
                'avatar'   => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
                'phone'    => 'nullable|string|max:15',
                'cell_phone' => 'nullable|string|max:15',
                'whatsapp' => 'nullable|string|max:15',
                'additional_email' => 'nullable|email|max:255',
                'cpf'      => 'nullable|string|max:14',
                'facebook' => 'nullable|url|max:255',
                'instagram' => 'nullable|url|max:255',
                'linkedin' => 'nullable|url|max:255',
                'twitter'  => 'nullable|url|max:255',
            ],

            // ── Config ──
            'config' => [
                'app_name'  => 'required|string|max:255',
                'email'     => 'nullable|email|max:255',
                'phone'     => 'nullable|string|max:255',
                'facebook'  => 'nullable|url|max:255',
                'twitter'   => 'nullable|url|max:255',
                'instagram' => 'nullable|url|max:255',
                'youtube'   => 'nullable|url|max:255',
                'linkedin'  => 'nullable|url|max:255',
            ],
        ];
    }

    /**
     * Mensagens de validação customizadas
     */
    protected static function validationMessages(): array
    {
        return [
            'required'             => 'O campo :attribute é obrigatório.',
            'string'               => 'O campo :attribute deve ser um texto.',
            'email'                => 'O campo :attribute deve ser um e-mail válido.',
            'url'                  => 'O campo :attribute deve ser uma URL válida.',
            'min'                  => [
                'string' => 'O campo :attribute deve ter pelo menos :min caracteres.',
            ],
            'max'                  => [
                'string' => 'O campo :attribute não pode ter mais de :max caracteres.',
            ],
            'exists'               => 'O valor selecionado para :attribute não é válido.',
            'image'                => 'O campo :attribute deve ser uma imagem.',
            'mimes'                => 'O campo :attribute aceita apenas: :values.',
            'file'                 => 'O campo :attribute deve ser um arquivo.',
            'in'                   => 'O valor selecionado para :attribute não é válido.',
            'date_format'          => 'O campo :attribute deve ter o formato :format.',
            'after_or_equal'       => 'O campo :attribute deve ser uma data igual ou posterior a :date.',
            'after'                => 'O campo :attribute deve ser uma data posterior a :date.',
            'confirmed'            => 'A confirmação do campo :attribute não confere.',
            'same'                 => 'Os campos :attribute e :other não conferem.',
            'unique'               => 'O valor do campo :attribute já está em uso.',
        ];
    }

    /**
     * Labels dos atributos para tradução nas mensagens de validação
     */
    protected static function validationAttributes(): array
    {
        return [
            'title'        => 'título',
            'name'         => 'nome',
            'email'        => 'e-mail',
            'password'     => 'senha',
            'password_confirmation' => 'confirmação de senha',
            'phone'        => 'telefone',
            'cell_phone'   => 'celular',
            'whatsapp'     => 'whatsapp',
            'additional_email' => 'e-mail adicional',
            'cpf'          => 'CPF',
            'rg'           => 'RG',
            'content'      => 'conteúdo',
            'description'  => 'descrição',
            'category'     => 'categoria',
            'status'       => 'status',
            'priority'     => 'prioridade',
            'role'         => 'função',
            'avatar'       => 'foto do perfil',
            'due_date'     => 'data de vencimento',
            'publish_at'   => 'data de publicação',
            'client_name'  => 'nome do cliente',
            'client_email' => 'e-mail do cliente',
            'case_number'  => 'número do processo',
            'court'        => 'vara/tribunal',
            'excerpt'      => 'resumo',
            'tags'         => 'tags',
            'metaDescription' => 'meta descrição',
            'readingTime'  => 'tempo de leitura',
            'thumbCaption' => 'legenda da imagem',
            'file'         => 'arquivo',
            'slug'         => 'slug',
            'facebook'     => 'Facebook',
            'twitter'      => 'Twitter',
            'instagram'    => 'Instagram',
            'youtube'      => 'YouTube',
            'linkedin'     => 'LinkedIn',

            // ── Processos ──
            'client_id'           => 'cliente',
            'process_number'      => 'número do processo',
            'case_type'           => 'tipo de ação',
            'court_name'          => 'vara/tribunal',
            'cnj_number'          => 'número CNJ',
            'internal_code'       => 'código interno',
            'cause_value'         => 'valor da causa',
            'updated_cause_value' => 'valor da causa atualizado',
            'conviction_value'    => 'valor da condenação',
            'executed_value'      => 'valor executado',
            'received_value'      => 'valor recebido',
            'pending_value'       => 'valor pendente',
            'distribution_date'   => 'data de distribuição',
            'filing_date'         => 'data de ajuizamento',
            'start_date'          => 'data de início',
            'summons_date'        => 'data de citação',
            'sentence_date'       => 'data da sentença',
            'res_judicata_date'   => 'data do trânsito em julgado',
            'closure_date'        => 'data de baixa',
            'archival_date'       => 'data de arquivamento',
            'unarchival_date'     => 'data de desarquivamento',
            'last_movement_date'  => 'data da última movimentação',
            'next_hearing_at'     => 'próxima audiência',
            'source'              => 'origem',
            'source_provider'     => 'provedor da fonte',
            'source_id'           => 'ID da fonte',
            'last_synced_at'      => 'última sincronização',
            'next_sync_at'        => 'próxima sincronização',
            'sync_attempts'       => 'tentativas de sincronização',
            'auto_sync'           => 'sincronização automática',
            'source_data'         => 'dados da fonte',
            'metadata'            => 'metadados',
            'responsible_id'      => 'advogado responsável',
            'court_variable'      => 'vara',
            'case_area'           => 'área do direito',
            'opposing_party'      => 'parte contrária',
            'opposing_lawyer'     => 'advogado da parte contrária',
            'description'         => 'descrição',
            'client_interest'     => 'interesse do cliente',
            'contract_value'      => 'valor do contrato',
            'internal_notes'      => 'observações internas',
            'legacy_number'       => 'número legado',
            'external_number'     => 'número externo',
            'court_acronym'       => 'sigla do tribunal',
            'justice_segment'     => 'segmento da justiça',
            'instance_level'      => 'instância',
            'state'               => 'estado',
            'judicial_district'   => 'distrito judicial',
            'judicial_district_code' => 'código do distrito judicial',
            'forum'               => 'fórum',
            'forum_code'          => 'código do fórum',
            'court_division_code'  => 'código da seção judiciária',
            'judicial_unit'       => 'unidade judiciária',
            'case_class'          => 'classe processual',
            'case_class_code'     => 'código da classe',
            'main_subject'        => 'assunto principal',
            'main_subject_code'   => 'código do assunto',
            'action_type'         => 'tipo de ação',
            'nature'              => 'natureza',
            'process_phase'       => 'fase do processo',
            'court_status'        => 'status no tribunal',
            'situation'           => 'situação',
            'situation_reason'    => 'motivo da situação',
            'notes'               => 'anotações',
            'datajud_tribunal'    => 'Tribunal (Datajud)',

            // ── Prazos ──
            'process_id'     => 'processo',
            'title'          => 'título',
            'due_date'       => 'data de vencimento',
            'due_time'       => 'horário',
            'priority'       => 'prioridade',
            'description'    => 'descrição',
            'responsible_id' => 'responsável',
            'reminder_at'    => 'lembrete',
            'notes'          => 'observações',
        ];
    }

    /**
     * Valida o componente com as regras do tipo especificado
     *
     * @param  string  $type  Chave do array de regras (ex: 'article', 'page', 'process')
     * @param  array   $extraRules  Regras extras para merge
     * @return void
     *
     * @throws \Livewire\Exceptions\ValidationException
     */
    protected function validateWith(string $type, array $extraRules = []): void
    {
        $allRules = static::validationRules();

        if (!isset($allRules[$type])) {
            throw new \InvalidArgumentException("Tipo de validação '{$type}' não encontrado.");
        }

        $rules = array_merge($allRules[$type], $extraRules);
        $messages = static::validationMessages();
        $attributes = static::validationAttributes();

        $this->validate($rules, $messages, $attributes);
    }

    /**
     * Valida um campo individual em tempo real (updatedXxx)
     */
    protected function validateField(string $field, string $type): void
    {
        $allRules = static::validationRules();

        if (!isset($allRules[$type][$field])) {
            return;
        }

        $this->validateOnly($field, [
            $field => $allRules[$type][$field],
        ], static::validationMessages(), static::validationAttributes());
    }
}

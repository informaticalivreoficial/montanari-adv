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
                'title'        => 'required|string|min:3|max:255',
                'description'  => 'nullable|string|max:10000',
                'client_name'  => 'required|string|min:2|max:255',
                'client_email' => 'nullable|email|max:255',
                'client_phone' => 'nullable|string|max:255',
                'court'        => 'nullable|string|max:255',
                'case_number'  => 'nullable|string|max:255',
                'status'       => 'nullable|in:active,suspended,closed,pending',
            ],

            // ── Prazos ──
            'deadline' => [
                'title'       => 'required|string|min:3|max:255',
                'description' => 'nullable|string|max:5000',
                'due_date'    => 'required|date|after_or_equal:today',
                'priority'    => 'nullable|in:low,medium,high,urgent',
                'status'      => 'nullable|in:pending,in_progress,completed,overdue',
                'process_id'  => 'nullable|exists:processes,id',
            ],

            // ── Tarefas ──
            'task' => [
                'title'       => 'required|string|min:3|max:255',
                'description' => 'nullable|string|max:5000',
                'due_date'    => 'nullable|date|after_or_equal:today',
                'priority'    => 'nullable|in:low,medium,high,urgent',
                'status'      => 'nullable|in:pending,in_progress,completed',
                'process_id'  => 'nullable|exists:processes,id',
                'assigned_to' => 'nullable|exists:users,id',
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
                'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,bmp,tiff|max:5120',
                'images'  => 'nullable|array|max:10',
                'images.*' => 'image|mimes:jpg,jpeg,png,gif,webp,bmp,tiff|max:5120',
            ],

            // ── Usuários ──
            'user' => [
                'name'     => 'required|string|min:3|max:255',
                'email'    => 'required|email|max:255',
                'phone'    => 'nullable|string|max:255',
                'password' => 'nullable|min:8|confirmed',
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
            'unique'               => 'O valor do campo :attribute já está em uso.',

            // Custom labels
            'title'        => 'título',
            'name'         => 'nome',
            'email'        => 'e-mail',
            'password'     => 'senha',
            'phone'        => 'telefone',
            'content'      => 'conteúdo',
            'description'  => 'descrição',
            'category'     => 'categoria',
            'status'       => 'status',
            'priority'     => 'prioridade',
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
            'thumbCaption'  => 'legenda da imagem',
            'file'         => 'arquivo',
            'slug'         => 'slug',
            'facebook'     => 'Facebook',
            'twitter'      => 'Twitter',
            'instagram'    => 'Instagram',
            'youtube'      => 'YouTube',
            'linkedin'     => 'LinkedIn',
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

        $this->validate($rules, $messages);
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
        ], static::validationMessages());
    }
}

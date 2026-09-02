# Changelog - 02/09/2026

## Input de Processo (Autocomplete) — Correção Global

### Problema
O input de processo nos formulários de **Tarefas**, **Prazos**, **Agenda** e **Documentos** tinha vários bugs:
1. Select simples carregava todos os processos (lento e sem busca)
2. `wire:ignore.self` não sincronizava `processLabel` com Livewire
3. `<div x-data>` duplicado e quebrado no form de Prazos
4. Rota `/dashboard/processos/search` retornava 404 (conflito com rota `{id}`)
5. `\"` dentro de `x-data` causava Alpine Expression Error

### Correções

#### Rota de busca (`routes/web.php`)
- Rota `/dashboard/processos/search` movida **antes** da rota `{id}` para evitar conflito

#### Tarefas (`Tasks/`)
- **CreateTask.php**: Adicionada `$processLabel`, método `updatedProcessId()`
- **EditTask.php**: Adicionado método `updatedProcessId()`
- **create.blade.php**: Alpine `processLabel` sincronizado com Livewire via `@js($processLabel)`, `@this.set('processLabel')`, CSRF via `{{ csrf_token() }}`
- **edit.blade.php**: Mesmos fixes

#### Prazos (`Deadlines/`)
- **CreateDeadline.php**: Adicionada `$processLabel`, método `updatedProcessId()`, removido `$processes`
- **create.blade.php**: Removido `<div x-data>` duplicado, select substituído por autocomplete com `wire:ignore.self`

#### Agenda (`Agenda/`)
- **Agenda.php**: Adicionada `$processLabel`, método `updatedProcessId()`, removido `$processes`, `openEventModal()` popula label, `resetForm()` limpa label
- **calendar.blade.php**: Select substituído por autocomplete no modal, `x-data` no `<form>` do modal

#### Documentos (`Documents/`)
- **ListDocuments.php**: Adicionada `$uploadProcessLabel`, método `updatedUploadProcessId()`, removido `$processes`, `resetUploadForm()` limpa label
- **list.blade.php**: Select substituído por autocomplete no modal de upload, `x-data` no `<form>` do modal

#### Componente reutilizável (`process-search.blade.php`)
- CSRF token corrigido: `{{ csrf_token() }}` em vez de `document.querySelector()`

### Padrão aplicado em todos os forms
- Autocomplete com busca AJAX via `fetch()` a cada 300ms
- Dropdown com resultados, loading spinner, "nenhum processo encontrado"
- Processo selecionado exibido com label e botão de remover
- `wire:ignore.self` no container para preservar estado do Alpine
- `@this.set()` sincroniza `process_id` e `processLabel` com Livewire
- `updatedProcessId()` busca label do processo no servidor
- CSRF via `{{ csrf_token() }}` (sem `\"` que quebra HTML)

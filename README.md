<p align="center">
    <a href="https://montanariadvocacia.com.br" target="_blank">
        <img src="https://montanariadvocacia.com.br/theme/images/logo.png">
    </a>
</p>

# Montanari Advocacia

Sistema de gerenciamento para escritório de advocacia, com painel administrativo completo, área do cliente e site institucional. Desenvolvido com tecnologias modernas (Laravel 11 + Livewire 4), voltado para produtividade jurídica: processos, prazos, tarefas, agenda, documentos e comunicação cliente ↔ escritório.

## Stack / Tecnologias

- **Laravel 11** (PHP 8.3)
- **Livewire 4** — painel e área do cliente usam *full-page components* (`Route::livewire()`), sem controllers para a administração
- **Tailwind CSS v4** (modo CSS-first) + **Vite**
- **Spatie Laravel Permission** — papéis e permissões
- **MySQL / MariaDB** via **Laravel Sail** (Docker)
- **Mailpit** para captura de e-mails em desenvolvimento

## Requisitos

- PHP 8.3+
- Composer
- Docker (Laravel Sail)

## Instalação (Sail)

```bash
# 1. Variáveis de ambiente
cp .env.example .env

# 2. Dependências PHP
composer install

# 3. Sobe a infraestrutura (banco, mailpit, etc.)
./vendor/bin/sail up -d

# 4. Chave da aplicação
./vendor/bin/sail artisan key:generate

# 5. Banco de dados + seeds (usuário admin inicial, papéis e permissões)
./vendor/bin/sail artisan migrate --seed

# 6. Front-end (Tailwind v4 + assets do Livewire)
npm install
npm run build
```

> Em desenvolvimento, os assets são servidos pelo Vite. O Livewire 4 injeta automaticamente seus scripts/styles.

## Acessos

| Área | Rota | Papéis |
|------|------|--------|
| Painel administrativo | `/admin` | `super-admin`, `admin`, `manager` |
| Área do cliente | `/cliente` | `client` |
| Site institucional | `/` | público |

O seeder cria um usuário administrador com o papel `super-admin` (ver `DatabaseSeeder`).

## Arquitetura

- **Rotas administrativas** usam `Route::livewire()` — cada página do painel é um componente Livewire em `app/Http/Livewire/Dashboard/...`, renderizado com `->layout('layouts.admin', [...])`.
- **Autenticação** é customizada em Livewire (`app/Http/Livewire/Auth/...`) com Spatie Permission.
- **Layouts** em `resources/views/layouts/` (`admin`, `auth`, `client`, `client-auth`, `app`).
- **Models** em `app/Models/` (inglês, campos correspondentes às migrations).
- **Deploy** automático via GitHub Actions (`.github/workflows/deploy.yml`): `git pull` → `composer install` → `npm run build` → `php artisan livewire:publish --assets` → cache.

## Módulos

### Administração
- Usuários, Perfil, Configurações e Permissões
- Notificações e Mensagens (hub cliente ↔ escritório)
- Analytics

### Jurídico
- **Processos** (`/dashboard/processos`) — com integração opcional Datajud/DJEN
- **Prazos** (`/dashboard/prazos`)
- **Tarefas** (`/dashboard/tarefas`) — com edição e espelhamento na Agenda
- **Agenda** (`/dashboard/agenda`) — eventos calendário
- **Documentos** (`/dashboard/documentos`)

### Site (público)
- Blog (artigos), Páginas e Categorias
- Feed RSS

### Área do cliente
- Processos, Prazos, Documentos, Mensagens e Perfil

## Deploy

O deploy em produção é automatizado por GitHub Actions (`.github/workflows/deploy.yml`). O fluxo publica os assets do Livewire (`php artisan livewire:publish --assets`) e reconstrói o front-end a cada push na branch principal.

## Licença

Montanari Adv é um sistema open-source licenciado sob a [MIT license](https://opensource.org/licenses/MIT).

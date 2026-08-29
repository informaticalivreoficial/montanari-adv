<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Web\RssFeedController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Dashboard\Users\Users;
use App\Http\Livewire\Dashboard\Users\Create as UserCreate;
use App\Http\Livewire\Dashboard\Users\Edit as UserEdit;
use App\Http\Livewire\Dashboard\Settings\Config;
use App\Http\Livewire\Dashboard\Users\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dashboard\Legal\Processes\ListProcesses;
use App\Http\Livewire\Dashboard\Legal\Processes\CreateProcess;
use App\Http\Livewire\Dashboard\Legal\Processes\EditProcess;
use App\Http\Livewire\Dashboard\Legal\Deadlines\ListDeadlines;
use App\Http\Livewire\Dashboard\Legal\Deadlines\CreateDeadline;
use App\Http\Livewire\Dashboard\Legal\Tasks\ListTasks;
use App\Http\Livewire\Dashboard\Legal\Tasks\CreateTask;
use App\Http\Livewire\Dashboard\Legal\Agenda\Agenda;
use App\Http\Livewire\Dashboard\Legal\Documents\ListDocuments;
use App\Http\Livewire\Dashboard\SiteAnalytics;
use App\Http\Livewire\Dashboard\Posts\Articles\ListArticles;
use App\Http\Livewire\Dashboard\Posts\Articles\CreateArticle;
use App\Http\Livewire\Dashboard\Posts\Articles\EditArticle;
use App\Http\Livewire\Dashboard\Posts\Pages\ListPages;
use App\Http\Livewire\Dashboard\Posts\Pages\CreatePage;
use App\Http\Livewire\Dashboard\Posts\Pages\EditPage;
use App\Http\Livewire\Dashboard\Posts\Categories\ListCategories;
use App\Http\Livewire\Dashboard\Posts\Categories\CreateCategory;
use App\Http\Livewire\Dashboard\Posts\Categories\EditCategory;
use App\Http\Livewire\Dashboard\Notifications\NotificationsDropdown;
use App\Http\Livewire\Dashboard\Notifications\ListNotifications;
use App\Http\Livewire\Dashboard\Messages;
use App\Http\Livewire\Client\ClientLogin;
use App\Http\Livewire\Client\ClientForgotPassword;
use App\Http\Livewire\Client\ClientResetPassword;
use App\Http\Controllers\Client\MagicLinkController;
use App\Http\Controllers\DocumentFileController;
use App\Http\Livewire\Client\Dashboard as ClientDashboard;
use App\Http\Livewire\Client\ProcessList;
use App\Http\Livewire\Client\ProcessDetail;
use App\Http\Livewire\Client\ClientDocuments;
use App\Http\Livewire\Client\ClientMessages;
use App\Http\Livewire\Client\ClientDeadlines;
use App\Http\Livewire\Client\ClientProfile;
use App\Http\Livewire\Client\ClientProfileEdit;
use App\Http\Livewire\Client\ClientPasswordChange;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Rotas Públicas (Site)
|--------------------------------------------------------------------------
*/
Route::group(['as' => 'web.'], function () {

    Route::match(['post', 'get'], '/', [WebController::class, 'home'])->name('home');

    Route::get('/atendimento', [WebController::class, 'atendimento'])->name('atendimento');
    Route::get('/sendEmail', [WebController::class, 'sendEmail'])->name('sendEmail');
    Route::get('/sendNewsletter', [WebController::class, 'sendNewsletter'])->name('sendNewsletter');

    Route::get('/area-de-atuacao/{slug}', [WebController::class, 'servico'])->name('servico');
    Route::get('/areas-de-atuacao', [WebController::class, 'servicos'])->name('servicos');

    Route::get('/blog/artigo/{slug}', [WebController::class, 'artigo'])->name('blog.artigo');
    Route::get('/blog/categoria/{slug}', [WebController::class, 'categoria'])->name('blog.categoria');
    Route::get('/blog/artigos', [WebController::class, 'artigos'])->name('blog.artigos');

    Route::match(['post', 'get'], '/pesquisa', [WebController::class, 'pesquisa'])->name('pesquisa');

    Route::get('/politica-de-privacidade', [WebController::class, 'politica'])->name('politica-de-privacidade');
    Route::get('/termos-e-condicoes', [WebController::class, 'terms'])->name('terms');
    
    // Páginas dinâmicas (criadas no painel com menu = 1)
    Route::get('/pagina/{slug}', [WebController::class, 'pagina'])->name('pagina');

    Route::get('feed', [RssFeedController::class, 'feed'])->name('feed');
});

/*
|--------------------------------------------------------------------------
| Autenticação (100% Livewire)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::livewire('/admin', Login::class)->name('login');
    Route::livewire('/cadastro', Register::class)->name('register');
    Route::livewire('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::livewire('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});

Route::middleware(['auth', 'admin.access'])->group(function () {
    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');

    Route::livewire('/dashboard', Dashboard::class)->name('dashboard');
    Route::livewire('/dashboard/perfil', Profile::class)->name('dashboard.profile');
    Route::livewire('/dashboard/usuarios', Users::class)->name('dashboard.users');
    Route::livewire('/dashboard/usuarios/criar', UserCreate::class)->name('dashboard.users.create');
    Route::livewire('/dashboard/usuarios/{id}/editar', UserEdit::class)->name('dashboard.users.edit');
    Route::livewire('/dashboard/config', Config::class)->name('dashboard.config');

    /*
    |--------------------------------------------------------------------------
    | Módulo Jurídico
    |--------------------------------------------------------------------------
    */
    // Processos
    Route::livewire('/dashboard/processos', ListProcesses::class)->name('dashboard.legal.processes');
    Route::livewire('/dashboard/processos/criar', CreateProcess::class)->name('dashboard.legal.processes.create');
    Route::livewire('/dashboard/processos/{id}/editar', EditProcess::class)->name('dashboard.legal.processes.edit');

    // Prazos
    Route::livewire('/dashboard/prazos', ListDeadlines::class)->name('dashboard.legal.deadlines');
    Route::livewire('/dashboard/prazos/criar', CreateDeadline::class)->name('dashboard.legal.deadlines.create');

    // Tarefas
    Route::livewire('/dashboard/tarefas', ListTasks::class)->name('dashboard.legal.tasks');
    Route::livewire('/dashboard/tarefas/criar', CreateTask::class)->name('dashboard.legal.tasks.create');

    // Agenda
    Route::livewire('/dashboard/agenda', Agenda::class)->name('dashboard.legal.agenda');

    // Documentos
    Route::livewire('/dashboard/documentos', ListDocuments::class)->name('dashboard.legal.documents');

    // Analytics
    Route::livewire('/dashboard/analytics', SiteAnalytics::class)->name('dashboard.analytics');

    // Notificações
    Route::livewire('/dashboard/notificacoes', ListNotifications::class)->name('dashboard.notifications');

    // Mensagens (hub cliente ↔ escritório)
    Route::livewire('/dashboard/mensagens', Messages::class)->name('dashboard.messages');

    /*
    |--------------------------------------------------------------------------
    | Módulo Posts
    |--------------------------------------------------------------------------
    */
    // Artigos
    Route::livewire('/dashboard/artigos', ListArticles::class)->name('dashboard.posts.articles');
    Route::livewire('/dashboard/artigos/criar', CreateArticle::class)->name('dashboard.posts.articles.create');
    Route::livewire('/dashboard/artigos/{id}/editar', EditArticle::class)->name('dashboard.posts.articles.edit');

    // Páginas
    Route::livewire('/dashboard/paginas', ListPages::class)->name('dashboard.posts.pages');
    Route::livewire('/dashboard/paginas/criar', CreatePage::class)->name('dashboard.posts.pages.create');
    Route::livewire('/dashboard/paginas/{id}/editar', EditPage::class)->name('dashboard.posts.pages.edit');

    // Categorias
    Route::livewire('/dashboard/categorias', ListCategories::class)->name('dashboard.posts.categories');
    Route::livewire('/dashboard/categorias/criar', CreateCategory::class)->name('dashboard.posts.categories.create');
    Route::livewire('/dashboard/categorias/{id}/editar', EditCategory::class)->name('dashboard.posts.categories.edit');
});

/*
|--------------------------------------------------------------------------
| Área do Cliente
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::livewire('/cliente', ClientLogin::class)->name('client.login');
    Route::livewire('/cliente/esqueci-senha', ClientForgotPassword::class)->name('client.password.request');
    Route::livewire('/cliente/resetar-senha/{token}', ClientResetPassword::class)->name('client.password.reset');
    Route::get('/cliente/acessar', [MagicLinkController::class, 'verify'])->name('client.magic-link.verify');
});

Route::middleware('client')->prefix('cliente')->name('client.')->group(function () {
    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('client.login');
    })->name('logout');

    Route::livewire('/dashboard', ClientDashboard::class)->name('dashboard');
    Route::livewire('/processos', ProcessList::class)->name('processes');
    Route::livewire('/processo/{id}', ProcessDetail::class)->name('process.show');
    Route::livewire('/prazos', ClientDeadlines::class)->name('deadlines');
    Route::livewire('/documentos', ClientDocuments::class)->name('documents');
    Route::livewire('/mensagens', ClientMessages::class)->name('messages');
    Route::livewire('/perfil', ClientProfile::class)->name('profile');
    Route::livewire('/perfil/editar', ClientProfileEdit::class)->name('profile.edit');
    Route::livewire('/perfil/senha', ClientPasswordChange::class)->name('profile.password');
});

/*
|--------------------------------------------------------------------------
| Arquivos de documentos (admin e cliente) — R2 / local
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/documentos/{document}/view', [DocumentFileController::class, 'view'])->name('documents.view');
    Route::get('/documentos/{document}/download', [DocumentFileController::class, 'download'])->name('documents.download');
});
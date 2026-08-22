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
use App\Http\Livewire\Dashboard\Permissions;
use App\Http\Livewire\Dashboard\Profile;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Rotas Públicas (Site)
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Web', 'as' => 'web.'], function () {

    Route::match(['post', 'get'], '/', [WebController::class, 'home'])->name('home');

    Route::get('/atendimento', 'WebController@atendimento')->name('atendimento');
    Route::get('/sendEmail', 'WebController@sendEmail')->name('sendEmail');
    Route::get('/sendNewsletter', 'WebController@sendNewsletter')->name('sendNewsletter');

    Route::get('/area-de-atuacao/{slug}', 'WebController@servico')->name('servico');
    Route::get('/areas-de-atuacao', 'WebController@servicos')->name('servicos');

    Route::get('/blog/artigo/{slug}', 'WebController@artigo')->name('blog.artigo');
    Route::get('/blog/categoria/{slug}', 'WebController@categoria')->name('blog.categoria');
    Route::get('/blog/artigos', 'WebController@artigos')->name('blog.artigos');

    Route::match(['post', 'get'], '/pesquisa', 'WebController@pesquisa')->name('pesquisa');

    Route::get('/politica-de-privacidade', 'WebController@politica')->name('politica-de-privacidade');

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

Route::middleware('auth')->group(function () {
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
    Route::livewire('/dashboard/permissions', Permissions::class)->name('dashboard.permissions');
});

/*
|--------------------------------------------------------------------------
| Testes
|--------------------------------------------------------------------------
*/
Route::get('/test-livewire', function () {
    return view('livewire.test-component');
})->name('test-livewire');

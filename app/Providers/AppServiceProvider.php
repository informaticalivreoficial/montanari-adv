<?php

namespace App\Providers;

use App\Models\Configuracoes;
use App\Models\Post;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * 
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {        
        Schema::defaultStringLength(191);
        
        // Share configuracoes with views (safe - won't crash if table missing)
        try {
            $configuracoes = Configuracoes::find(1);
            View()->share('configuracoes', $configuracoes);
        } catch (\Exception $e) {
            // Table might not exist or be empty, share null
            View()->share('configuracoes', (object)[]);
        }

        // Share menu pages (published pages with menu = 1)
        try {
            $menuPages = Post::where('type', 'page')
                ->where('status', 1)
                ->where('menu', 1)
                ->orderBy('created_at', 'ASC')
                ->get();
            View()->share('menuPages', $menuPages);
        } catch (\Exception $e) {
            View()->share('menuPages', collect());
        }
        
        Blade::aliasComponent('admin.components.message', 'message');

        // Registra o namespace `mail` dos componentes markdown do Laravel.
        // Sem isso, qualquer e-mail que use mail::layout / mail::header / mail::footer
        // falha com "No hint path defined for [mail]".
        view()->addNamespace('mail', base_path('vendor/laravel/framework/src/Illuminate/Mail/resources/views/html'));

        Paginator::useBootstrap();
    }
}

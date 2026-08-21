<?php

namespace App\Providers;

use App\Models\Configuracoes;
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
        
        Blade::aliasComponent('admin.components.message', 'message');
        
        Paginator::useBootstrap();
    }
}

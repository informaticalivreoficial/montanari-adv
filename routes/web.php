<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Web\PortalfeedController;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Web\RssFeedController;
//use App\Models\Portal;



Route::group(['namespace' => 'Web', 'as' => 'web.'], function () {

    /** Página Inicial */
    //Route::get('/', 'WebController@home')->name('home');
    Route::match(['post', 'get'], '/', [WebController::class, 'home'])->name('home');

    /** Página Inicial */
    Route::get('/atendimento', 'WebController@atendimento')->name('atendimento');
    Route::get('/sendEmail', 'WebController@sendEmail')->name('sendEmail');
    Route::get('/sendNewsletter', 'WebController@sendNewsletter')->name('sendNewsletter');

    /** Página do Projeto */
    //Route::get('/projeto/{slug}', 'WebController@projeto')->name('projeto');
    //Route::get('/projetos', 'WebController@projetos')->name('projetos');

    /** Página do Projeto */
    Route::get('/area-de-atuacao/{slug}', 'WebController@servico')->name('servico');
    Route::get('/areas-de-atuacao', 'WebController@servicos')->name('servicos');

    /** Blog */
    Route::get('/blog/artigo/{slug}', 'WebController@artigo')->name('blog.artigo');
    Route::get('/blog/categoria/{slug}', 'WebController@categoria')->name('blog.categoria');
    Route::get('/blog/artigos', 'WebController@artigos')->name('blog.artigos');

    /** Pesquisa */
    Route::match(['post', 'get'], '/pesquisa', 'WebController@pesquisa')->name('pesquisa');

    /** Política de Privacidade */
    Route::get('/politica-de-privacidade', 'WebController@politica')->name('politica-de-privacidade');

    /** FEED */
    //Route::get('feed', 'RssFeedController@feed');
    Route::get('feed', [RssFeedController::class, 'feed'])->name('feed');
    
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){
    
    /** Formulário de Login */
    Route::get('/', 'AuthController@showLoginForm')->name('login');
    Route::post('login', 'AuthController@login')->name('login.do'); 
    Route::post('recoverpass', 'AuthController@recoverpass')->name('recover.do');
    Route::match(['post', 'get'], 'redefinir-senha/{remember_token}', 'AuthController@redefinirsenha')->name('redefinirsenha'); 
    Route::match(['post', 'get'], 'resetpass', 'AuthController@resetpass')->name('resetpass.do');   
       
    /** Rotas Protegidas */
    Route::group(['middleware' => ['auth']], function () {
        /** Dashboard Home */
        Route::get('home', 'AuthController@home')->name('home');

        /** Sitemap */
        Route::get('gerarxml', 'SitemapController@gerarxml')->name('gerarxml');
        // Route::get('gerarfeed', 'SitemapController@gerarfeed')->name('gerarfeed');

        /** Usuários */
        Route::match(['post', 'get'], 'users/fetchCity', 'UserController@fetchCity')->name('users.fetchCity');
        Route::get('users/team', 'UserController@team')->name('users.team');
        Route::get('users/set-status', 'UserController@userSetStatus')->name('users.userSetStatus');
        Route::get('users/view/{id}', 'UserController@view')->name('users.view');
        Route::get('users/delete', 'UserController@delete')->name('users.delete');
        Route::delete('users/deleteon', 'UserController@deleteon')->name('users.deleteon');
        Route::get('users/deletecli', 'UserController@deletecli')->name('users.deletecli');
        Route::delete('users/deleteoncli', 'UserController@deleteoncli')->name('users.deleteoncli');
        //Route::get('users/delete{id}', 'UserController@destroy')->name('users.delete');
        Route::resource('users', 'UserController');

        /** Permissões */
        Route::get('permission/delete', 'ACL\\PermissionController@delete')->name('permission.delete');
        Route::delete('permission/deleteon', 'ACL\\PermissionController@deleteon')->name('permission.deleteon');
        Route::resource('permission', 'ACL\\PermissionController');

        /** Perfis */
        Route::get('role/delete', 'ACL\\RoleController@delete')->name('role.delete');
        Route::delete('role/deleteon', 'ACL\\RoleController@deleteon')->name('role.deleteon');
        Route::get('role/{role}/permissions', 'ACL\\RoleController@permissions')->name('role.permissions');
        Route::put('role/{role}/permission/sync', 'ACL\\RoleController@permissionsSync')->name('role.permissionsSync');
        Route::resource('role', 'ACL\\RoleController');
                
        /** Empresas */      
        Route::match(['post', 'get'], 'empresas/fetchCity', 'CompanyController@fetchCity')->name('empresas.fetchCity');  
        Route::get('empresas/delete', 'CompanyController@delete')->name('empresas.delete');
        Route::delete('empresas/deleteon', 'CompanyController@deleteon')->name('empresas.deleteon');
        Route::get('empresas/set-status', 'CompanyController@empresaSetStatus')->name('empresas.empresaSetStatus');
        Route::resource('empresas', 'CompanyController');
        
        /** Configurações */
        Route::match(['post', 'get'], 'configuracoes/fetchCity', 'ConfigController@fetchCity')->name('configuracoes.fetchCity');
        Route::resource('configuracoes', 'ConfigController');
        
        /** Email */
        Route::get('email/suporte', 'EmailController@suporte')->name('email.suporte');
        Route::match(['post', 'get'], 'email/send', 'EmailController@send')->name('email.send');
        Route::post('email/sendEmail', 'EmailController@sendEmail')->name('email.sendEmail');
        Route::match(['post', 'get'], 'email/success', 'EmailController@success')->name('email.success');

        /** Slides */
        Route::get('slides/set-status', 'SlideController@slideSetStatus')->name('slides.slideSetStatus');
        Route::get('slides/delete', 'SlideController@delete')->name('slides.delete');
        Route::delete('slides/deleteon', 'SlideController@deleteon')->name('slides.deleteon');
        Route::resource('slides', 'SlideController');

        /** Slides */
        // Route::get('avaliacoes/set-status', 'AvaliacoesController@avaliacoesSetStatus')->name('avaliacoes.avaliacoesSetStatus');
        // Route::get('avaliacoes/delete', 'AvaliacoesController@delete')->name('avaliacoes.delete');
        // Route::delete('avaliacoes/deleteon', 'AvaliacoesController@deleteon')->name('avaliacoes.deleteon');
        // Route::resource('avaliacoes', 'AvaliacoesController');

        /** Projetos */
        // Route::get('projetos/delete', 'ProjetoController@delete')->name('projetos.delete');
        // Route::delete('projetos/deleteon', 'ProjetoController@deleteon')->name('projetos.deleteon');
        // Route::post('projetos/image-set-cover', 'ProjetoController@imageSetCover')->name('projetos.imageSetCover');
        // Route::get('projetos/set-status', 'ProjetoController@projetoSetStatus')->name('projetos.projetoSetStatus');
        // Route::delete('projetos/image-remove', 'ProjetoController@imageRemove')->name('projetos.imageRemove');
        // Route::resource('projetos', 'ProjetoController');
        
        /** Categorias para Posts */
        Route::get('categorias/delete', 'CatPostController@delete')->name('categorias.delete');
        Route::delete('categorias/deleteon', 'CatPostController@deleteon')->name('categorias.deleteon');
        Route::get('categorias/secao/{tipo}', 'CatPostController@secao')->name('categorias.secao');
        Route::get('categorias/categoriacreate/{tipo}/{catpai}', 'CatPostController@categoriacreate')->name('categorias.categoriacreate');
        Route::resource('categorias', 'CatPostController');
        
        /** Posts */
        Route::get('artigos/set-status', 'PostController@artigoSetStatus')->name('artigos.artigoSetStatus');
        Route::get('artigos/delete', 'PostController@delete')->name('artigos.delete');
        Route::delete('artigos/deleteon', 'PostController@deleteon')->name('artigos.deleteon');
        Route::post('artigos/image-set-cover', 'PostController@imageSetCover')->name('artigos.imageSetCover');
        Route::delete('artigos/image-remove', 'PostController@imageRemove')->name('artigos.imageRemove');
        Route::resource('artigos', 'PostController');       
        
        /** Serviços */
        Route::get('servicos/set-status', 'ServicosController@servicoSetStatus')->name('servicos.servicoSetStatus');
        Route::get('servicos/delete', 'ServicosController@delete')->name('servicos.delete');
        Route::delete('servicos/deleteon', 'ServicosController@deleteon')->name('servicos.deleteon');
        Route::post('servicos/image-set-cover', 'ServicosController@imageSetCover')->name('servicos.imageSetCover');
        Route::delete('servicos/image-remove', 'ServicosController@imageRemove')->name('servicos.imageRemove');
        Route::resource('servicos', 'ServicosController');       
    });
    
    /** Logout */
    Route::get('logout', 'AuthController@logout')->name('logout');
    
});

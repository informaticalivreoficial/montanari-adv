<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;
use App\Models\Configuracoes;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Gera o sitemap.xml do site automaticamente';

    public function handle()
    {
        $config = Configuracoes::first();

        if (! $config || ! $config->sitemap) {
            $this->info('Geração automática de sitemap desabilitada. Nenhuma ação realizada.');

            return Command::SUCCESS;
        }

        $this->info('Gerando sitemap...');

        $sitemap = Sitemap::create();

        // Home
        $sitemap->add(
            Url::create(route('web.home'))
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(1.0)
        );

        // Áreas de atuação
        $sitemap->add(
            Url::create(route('web.servicos'))
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8)
        );

        // Blog - listagem de artigos
        $sitemap->add(
            Url::create(route('web.blog.artigos'))
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.9)
        );

        // Política de privacidade
        $sitemap->add(
            Url::create(route('web.politica-de-privacidade'))
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.5)
        );

        // Artigos publicados
        Post::where('type', 'artigo')
            ->postson()
            ->orderBy('created_at', 'desc')
            ->chunk(100, function ($posts) use ($sitemap) {
                foreach ($posts as $post) {
                    $sitemap->add(
                        Url::create(route('web.blog.artigo', $post->slug))
                            ->setLastModificationDate($post->updated_at)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                            ->setPriority(0.7)
                    );
                }
            });

        // Páginas publicadas (URL direta com slug)
        Post::where('type', 'pagina')
            ->postson()
            ->orderBy('created_at', 'desc')
            ->chunk(100, function ($posts) use ($sitemap) {
                foreach ($posts as $post) {
                    $sitemap->add(
                        Url::create(url('/') . '/' . $post->slug)
                            ->setLastModificationDate($post->updated_at)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                            ->setPriority(0.8)
                    );
                }
            });

        // Salva o sitemap
        $sitemap->writeToFile(public_path('sitemap.xml'));

        // Atualiza a data da última geração
        $config->update(['sitemap_data' => now()->format('Y-m-d')]);

        $this->info('Sitemap gerado com sucesso em: ' . public_path('sitemap.xml'));

        return Command::SUCCESS;
    }
}

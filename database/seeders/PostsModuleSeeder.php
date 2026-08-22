<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\CatPost;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostsModuleSeeder extends Seeder
{
    public function run(): void
    {
        // Create categories
        $categories = [];
        $categoryNames = [
            'Direito Civil', 'Direito Penal', 'Direito Trabalhista',
            'Direito de Família', 'Direito Empresarial', 'Notícias do Escritório',
            'Artigos Jurídicos', 'Dicas Legais',
        ];

        foreach ($categoryNames as $name) {
            $categories[] = CatPost::create([
                'title' => $name,
                'content' => "Categoria para posts sobre " . strtolower($name),
                'type' => 'artigo',
                'status' => 1,
            ]);
        }

        // Get admin user (or first user)
        $author = User::first() ?? User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@montanari.adv',
        ]);

        // Create articles
        $articles = [
            [
                'title' => 'Direitos do Consumidor em Compras Online',
                'content' => '<p>As compras pela internet cresceram significativamente nos últimos anos. Saiba quais são os seus direitos como consumidor em transações digitais...</p><p>O Código de Defesa do Consumidor estabelece regras claras para proteger os compradores online.</p>',
                'excerpt' => 'Conheça os principais direitos do consumidor em compras realizadas pela internet.',
                'metaDescription' => 'Direitos do consumidor em compras online - Guia completo',
                'tags' => 'consumidor,compras online,direitos digitais',
                'status' => 1,
                'highlight' => 1,
                'readingTime' => '5 min',
            ],
            [
                'title' => 'Como Funciona a Divórcio Consensual',
                'content' => '<p>O divórcio consensual é a forma mais rápida e simples de dissolver um casamento. Quando ambos os cônjuges concordam com os termos, o processo pode ser feito extrajudicialmente.</p><p>É necessário ter mais de 1 ano de casamento e filhos menores de 16 anos não podem ser excluídos do processo.</p>',
                'excerpt' => 'Entenda o passo a passo do divórcio consensual e quando é possível fazer extrajudicialmente.',
                'tags' => 'divórcio,família,casamento',
                'status' => 1,
                'highlight' => 0,
                'readingTime' => '7 min',
            ],
            [
                'title' => 'Rescisão Contratual: O que Saber',
                'content' => '<p>A rescisão contratual pode ocorrer por diversos motivos. É fundamental conhecer os seus direitos e deveres antes de rescindir qualquer contrato.</p><p>Os prazos de aviso prévio e as multas contratuais são pontos que merecem atenção especial.</p>',
                'excerpt' => 'Tudo sobre rescisão contratual: direitos, deveres e multas.',
                'tags' => 'contrato,rescisão,direito civil',
                'status' => 1,
                'highlight' => 1,
                'readingTime' => '6 min',
            ],
            [
                'title' => 'Importância do Testamento para Planejamento Patrimonial',
                'content' => '<p>O testamento é um instrumento jurídico que permite ao testador definir como seus bens serão distribuídos após o falecimento.</p><p>Muitas pessoas evitam pensar nesse assunto, mas o testamento é essencial para evitar disputas familiares e garantir que a vontade do falecido seja respeitada.</p>',
                'excerpt' => 'Por que elaborar um testamento é essencial para o planejamento patrimonial.',
                'tags' => 'testamento,herança,planejamento patrimonial',
                'status' => 1,
                'highlight' => 0,
                'readingTime' => '4 min',
            ],
            [
                'title' => 'Recentes Mudanças na Legislação Trabalhista',
                'content' => '<p>A legislação trabalhista passou por importantes alterações recentemente. Veja o que mudou e como impacta trabalhadores e empregadores.</p><p>As mudanças incluem novas regras sobre jornada de trabalho, home office e benefícios.</p>',
                'excerpt' => 'Conheça as principais alterações na CLT que afetam trabalhadores e empresas.',
                'tags' => 'trabalho,CLT,legislação',
                'status' => 1,
                'highlight' => 0,
                'readingTime' => '8 min',
            ],
        ];

        foreach ($articles as $i => $article) {
            Post::create(array_merge($article, [
                'autor' => $author->id,
                'type' => 'artigo',
                'category' => $categories[$i % count($categories)]->id,
                'publish_at' => now()->subDays(rand(1, 90)),
            ]));
        }

        // Create draft articles
        for ($i = 0; $i < 3; $i++) {
            Post::create([
                'autor' => $author->id,
                'type' => 'artigo',
                'title' => 'Rascunho ' . ($i + 1) . ': ' . $this->faker->sentence(3),
                'content' => '<p>' . $this->faker->paragraph(2) . '</p>',
                'category' => $categories[array_rand($categories)]->id,
                'status' => 0,
                'publish_at' => null,
            ]);
        }

        // Create pages
        $pages = [
            [
                'title' => 'Sobre o Escritório',
                'content' => '<h2>Nossa História</h2><p>O escritório Montanari Adv é referência em advocacia há mais de 20 anos. Com uma equipe dedicada e experiente, oferecemos soluções jurídicas personalizadas para cada cliente.</p><h2>Nossa Equipe</h2><p>Contamos com profissionais especializados em diversas áreas do direito, garantindo atendimento completo e de qualidade.</p>',
                'excerpt' => 'Conheça o escritório Montanari Adv e nossa equipe de advogados.',
                'status' => 1,
                'menu' => 1,
            ],
            [
                'title' => 'Áreas de Atuação',
                'content' => '<h2>Direito Civil</h2><p>Contratos, indenizações, responsabilidade civil.</p><h2>Direito de Família</h2><p>Divórcio, pensão, guarda de filhos.</p><h2>Direito Trabalhista</h2><p>Rescisão, horas extras, acidentes de trabalho.</p>',
                'excerpt' => 'Conheça todas as áreas de atuação do escritório.',
                'status' => 1,
                'menu' => 1,
            ],
            [
                'title' => 'Política de Privacidade',
                'content' => '<p>O escritório Montanari Adv respeita a privacidade dos seus clientes e visitantes. Esta política descreve como coletamos, usamos e protegemos suas informações pessoais.</p><p>Seus dados são tratados com total sigilo e segurança, conforme a Lei Geral de Proteção de Dados (LGPD).</p>',
                'excerpt' => 'Política de privacidade e uso de dados pessoais.',
                'status' => 1,
                'menu' => 0,
            ],
        ];

        foreach ($pages as $page) {
            Post::create(array_merge($page, [
                'autor' => $author->id,
                'type' => 'page',
                'category' => null,
                'publish_at' => now()->subDays(rand(30, 180)),
            ]));
        }

        $this->command->info("✅ Posts Module seeded: " . count($categories) . " categorias, " . (count($articles) + 3 + count($pages)) . " posts");
    }
}

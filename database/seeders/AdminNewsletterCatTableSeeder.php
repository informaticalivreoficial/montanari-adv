<?php
namespace Database\Seeders;

use App\Models\Newsletter;
use Illuminate\Database\Seeder;

class AdminNewsletterCatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('newsletter_cat')->insert([
            [
                'id' => 1,
                'titulo' => 'Emails Cadastrados pelo site',
                'content' => 'Esta é uma lista de e-mails cadastrados pelo site através do formulário.',
                'status' => '1',
                'sistema' => '1',
                'created_at' => now()//Data e hora Atual
            ],
            [
                'id' => 2,
                'titulo' => 'E-mails Cadastrados por Administradores',
                'content' => 'Esta é uma lista de e-mails cadastrados por administradores através do painel de controle',
                'status' => '1',
                'sistema' => '1',
                'created_at' => now()//Data e hora Atual
            ]
        ]);
    }
}

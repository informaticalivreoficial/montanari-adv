<?php
namespace Database\Seeders;

use App\Models\Configuracoes;
use Illuminate\Database\Seeder;

class AdminConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuracoes')->insert([
            'id' => 1,
            'email' => 'teste@teste.com.br',
            'nomedosite' => 'teste',
            'rss' => 'teste',
            'sitemap' => 'teste',
            
            'telefone1' => '(XX) XXXX-XXXX',
            'telefone2' => '(XX) XXXXX-XXXX',
            'telefone3' => '(XX) XXXXX-XXXX'            
        ]); 
    }
}

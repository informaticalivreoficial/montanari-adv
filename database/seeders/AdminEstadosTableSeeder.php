<?php
namespace Database\Seeders;

use App\Models\Estados;
use Illuminate\Database\Seeder;

class AdminEstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            ['estado_id' => 1, 'estado_nome' => 'Acre', 'estado_uf' => 'AC', 'estado_regiao' => 'Norte'],
            ['estado_id' => 2, 'estado_nome' => 'Alagoas', 'estado_uf' => 'AL', 'estado_regiao' => 'Nordeste'],
            ['estado_id' => 3, 'estado_nome' => 'Amapá', 'estado_uf' => 'AP', 'estado_regiao' => 'Norte'],
            ['estado_id' => 4, 'estado_nome' => 'Amazonas', 'estado_uf' => 'AM', 'estado_regiao' => 'Norte'],
            ['estado_id' => 5, 'estado_nome' => 'Bahia', 'estado_uf' => 'BA', 'estado_regiao' => 'Nordeste'],
            ['estado_id' => 6, 'estado_nome' => 'Ceará', 'estado_uf' => 'CE', 'estado_regiao' => 'Nordeste'],
            ['estado_id' => 7, 'estado_nome' => 'Distrito Federal', 'estado_uf' => 'DF', 'estado_regiao' => 'Centro-Oeste'],
            ['estado_id' => 8, 'estado_nome' => 'Espírito Santo', 'estado_uf' => 'ES', 'estado_regiao' => 'Sudeste'],
            ['estado_id' => 9, 'estado_nome' => 'Goiás', 'estado_uf' => 'GO', 'estado_regiao' => 'Centro-Oeste'],
            ['estado_id' => 10, 'estado_nome' => 'Maranhão', 'estado_uf' => 'MA', 'estado_regiao' => 'Nordeste'],
            ['estado_id' => 11, 'estado_nome' => 'Mato Grosso', 'estado_uf' => 'MT', 'estado_regiao' => 'Nordeste'],
            ['estado_id' => 12, 'estado_nome' => 'Mato Grosso do Sul', 'estado_uf' => 'MS', 'estado_regiao' => 'Centro-Oeste'],
            ['estado_id' => 13, 'estado_nome' => 'Minas Gerais', 'estado_uf' => 'MG', 'estado_regiao' => 'Sudeste'],
            ['estado_id' => 14, 'estado_nome' => 'Pará', 'estado_uf' => 'PA', 'estado_regiao' => 'Nordeste'],
            ['estado_id' => 15, 'estado_nome' => 'Paraíba', 'estado_uf' => 'PB', 'estado_regiao' => 'Nordeste'],
            ['estado_id' => 16, 'estado_nome' => 'Paraná', 'estado_uf' => 'PR', 'estado_regiao' => 'Sul'],
            ['estado_id' => 17, 'estado_nome' => 'Pernambuco', 'estado_uf' => 'PE', 'estado_regiao' => 'Nordeste'],
            ['estado_id' => 18, 'estado_nome' => 'Piauí', 'estado_uf' => 'PI', 'estado_regiao' => 'Nordeste'],
            ['estado_id' => 19, 'estado_nome' => 'Rio de Janeiro', 'estado_uf' => 'RJ', 'estado_regiao' => 'Sudeste'],
            ['estado_id' => 20, 'estado_nome' => 'Rio Grande do Norte', 'estado_uf' => 'RN', 'estado_regiao' => 'Nordeste'],
            ['estado_id' => 21, 'estado_nome' => 'Rio Grande do Sul', 'estado_uf' => 'RS', 'estado_regiao' => 'Sul'],
            ['estado_id' => 22, 'estado_nome' => 'Rondônia', 'estado_uf' => 'RO', 'estado_regiao' => 'Norte'],
            ['estado_id' => 23, 'estado_nome' => 'Roraima', 'estado_uf' => 'RR', 'estado_regiao' => 'Norte'],
            ['estado_id' => 24, 'estado_nome' => 'Santa Catarina', 'estado_uf' => 'SC', 'estado_regiao' => 'Sul'],
            ['estado_id' => 25, 'estado_nome' => 'São Paulo', 'estado_uf' => 'SP', 'estado_regiao' => 'Sudeste'],
            ['estado_id' => 26, 'estado_nome' => 'Sergipe', 'estado_uf' => 'SE', 'estado_regiao' => 'Nordeste'],
            ['estado_id' => 27, 'estado_nome' => 'Tocantins', 'estado_uf' => 'TO', 'estado_regiao' => 'Norte'],
        ]);
    }
}

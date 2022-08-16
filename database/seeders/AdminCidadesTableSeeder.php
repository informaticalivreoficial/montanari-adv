<?php
namespace Database\Seeders;

use App\Models\Cidades;
use Illuminate\Database\Seeder;

class AdminCidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cidades')->insert([
            ['cidade_id' => 1, 'estado_id' => 9, 'cidade_nome' => 'Abadia de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2, 'estado_id' => 13, 'cidade_nome' => 'Abadia dos Dourados', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3, 'estado_id' => 9, 'cidade_nome' => 'Abadiânia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 4, 'estado_id' => 13, 'cidade_nome' => 'Abaeté', 'cidade_uf' => 'MG'],
            ['cidade_id' => 5, 'estado_id' => 14, 'cidade_nome' => 'Abaetetuba', 'cidade_uf' => 'PA'],
            ['cidade_id' => 6, 'estado_id' => 6, 'cidade_nome' => 'Abaiara', 'cidade_uf' => 'CE'],
            ['cidade_id' => 7, 'estado_id' => 5, 'cidade_nome' => 'Abaíra', 'cidade_uf' => 'BA'],
            ['cidade_id' => 8, 'estado_id' => 5, 'cidade_nome' => 'Abaré', 'cidade_uf' => 'BA'],
            ['cidade_id' => 9, 'estado_id' => 16, 'cidade_nome' => 'Abatiá', 'cidade_uf' => 'PR'],
            ['cidade_id' => 10, 'estado_id' => 24, 'cidade_nome' => 'Abdon Batista', 'cidade_uf' => 'SC'],
            ['cidade_id' => 11, 'estado_id' => 14, 'cidade_nome' => 'Abel Figueiredo', 'cidade_uf' => 'PA'],
            ['cidade_id' => 12, 'estado_id' => 24, 'cidade_nome' => 'Abelardo Luz', 'cidade_uf' => 'SC'],
            ['cidade_id' => 13, 'estado_id' => 13, 'cidade_nome' => 'Abre Campo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 14, 'estado_id' => 17, 'cidade_nome' => 'Abreu e Lima', 'cidade_uf' => 'PE'],
            ['cidade_id' => 15, 'estado_id' => 27, 'cidade_nome' => 'Abreulândia', 'cidade_uf' => 'TO'],
            ['cidade_id' => 16, 'estado_id' => 13, 'cidade_nome' => 'Acaiaca', 'cidade_uf' => 'MG'],
            ['cidade_id' => 17, 'estado_id' => 10, 'cidade_nome' => 'Açailândia', 'cidade_uf' => 'MA'],
            ['cidade_id' => 18, 'estado_id' => 5, 'cidade_nome' => 'Acajutiba', 'cidade_uf' => 'BA'],
            ['cidade_id' => 19, 'estado_id' => 14, 'cidade_nome' => 'Acará', 'cidade_uf' => 'PA'],
            ['cidade_id' => 20, 'estado_id' => 6, 'cidade_nome' => 'Acarape', 'cidade_uf' => 'CE'],
            ['cidade_id' => 21, 'estado_id' => 6, 'cidade_nome' => 'Acaraú', 'cidade_uf' => 'CE'],
            ['cidade_id' => 22, 'estado_id' => 20, 'cidade_nome' => 'Acari', 'cidade_uf' => 'RN'],
            ['cidade_id' => 23, 'estado_id' => 18, 'cidade_nome' => 'Acauã', 'cidade_uf' => 'PI'],
            ['cidade_id' => 24, 'estado_id' => 21, 'cidade_nome' => 'Aceguá', 'cidade_uf' => 'RS'],
            ['cidade_id' => 25, 'estado_id' => 6, 'cidade_nome' => 'Acopiara', 'cidade_uf' => 'CE'],
            ['cidade_id' => 26, 'estado_id' => 11, 'cidade_nome' => 'Acorizal', 'cidade_uf' => 'MT'],
            ['cidade_id' => 27, 'estado_id' => 1, 'cidade_nome' => 'Acrelândia', 'cidade_uf' => 'AC'],
            ['cidade_id' => 28, 'estado_id' => 9, 'cidade_nome' => 'Acreúna', 'cidade_uf' => 'GO'],
            ['cidade_id' => 29, 'estado_id' => 20, 'cidade_nome' => 'Açu', 'cidade_uf' => 'RN'],
            ['cidade_id' => 30, 'estado_id' => 13, 'cidade_nome' => 'Açucena', 'cidade_uf' => 'MG'],
            ['cidade_id' => 31, 'estado_id' => 25, 'cidade_nome' => 'Adamantina', 'cidade_uf' => 'SP'],
            ['cidade_id' => 32, 'estado_id' => 9, 'cidade_nome' => 'Adelândia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 33, 'estado_id' => 25, 'cidade_nome' => 'Adolfo', 'cidade_uf' => 'SP'],
            ['cidade_id' => 34, 'estado_id' => 16, 'cidade_nome' => 'Adrianópolis', 'cidade_uf' => 'PR'],
            ['cidade_id' => 35, 'estado_id' => 5, 'cidade_nome' => 'Adustina', 'cidade_uf' => 'BA'],
            ['cidade_id' => 36, 'estado_id' => 17, 'cidade_nome' => 'Afogados da Ingazeira', 'cidade_uf' => 'PE'],
            ['cidade_id' => 37, 'estado_id' => 20, 'cidade_nome' => 'Afonso Bezerra', 'cidade_uf' => 'RN'],
            ['cidade_id' => 38, 'estado_id' => 8, 'cidade_nome' => 'Afonso Cláudio', 'cidade_uf' => 'ES'],
            ['cidade_id' => 39, 'estado_id' => 10, 'cidade_nome' => 'Afonso Cunha', 'cidade_uf' => 'MA'],
            ['cidade_id' => 40, 'estado_id' => 17, 'cidade_nome' => 'Afrânio', 'cidade_uf' => 'PE'],
            ['cidade_id' => 41, 'estado_id' => 14, 'cidade_nome' => 'Afuá', 'cidade_uf' => 'PA'],
            ['cidade_id' => 42, 'estado_id' => 17, 'cidade_nome' => 'Agrestina', 'cidade_uf' => 'PE'],
            ['cidade_id' => 43, 'estado_id' => 18, 'cidade_nome' => 'Agricolândia', 'cidade_uf' => 'PI'],
            ['cidade_id' => 44, 'estado_id' => 24, 'cidade_nome' => 'Agrolândia', 'cidade_uf' => 'SC'],
            ['cidade_id' => 45, 'estado_id' => 24, 'cidade_nome' => 'Agronômica', 'cidade_uf' => 'SC'],
            ['cidade_id' => 46, 'estado_id' => 14, 'cidade_nome' => 'Água Azul do Norte', 'cidade_uf' => 'PA'],
            ['cidade_id' => 47, 'estado_id' => 13, 'cidade_nome' => 'Água Boa', 'cidade_uf' => 'MG'],
            ['cidade_id' => 48, 'estado_id' => 11, 'cidade_nome' => 'Água Boa', 'cidade_uf' => 'MT'],
            ['cidade_id' => 49, 'estado_id' => 2, 'cidade_nome' => 'Água Branca', 'cidade_uf' => 'AL'],
            ['cidade_id' => 50, 'estado_id' => 15, 'cidade_nome' => 'Água Branca', 'cidade_uf' => 'PB'],
            ['cidade_id' => 51, 'estado_id' => 18, 'cidade_nome' => 'Água Branca', 'cidade_uf' => 'PI'],
            ['cidade_id' => 52, 'estado_id' => 12, 'cidade_nome' => 'Água Clara', 'cidade_uf' => 'MS'],
            ['cidade_id' => 53, 'estado_id' => 13, 'cidade_nome' => 'Água Comprida', 'cidade_uf' => 'MG'],
            ['cidade_id' => 54, 'estado_id' => 24, 'cidade_nome' => 'Água Doce', 'cidade_uf' => 'SC'],
            ['cidade_id' => 55, 'estado_id' => 10, 'cidade_nome' => 'Água Doce do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 56, 'estado_id' => 8, 'cidade_nome' => 'Água Doce do Norte', 'cidade_uf' => 'ES'],
            ['cidade_id' => 57, 'estado_id' => 5, 'cidade_nome' => 'Água Fria', 'cidade_uf' => 'BA'],
            ['cidade_id' => 58, 'estado_id' => 9, 'cidade_nome' => 'Água Fria de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 59, 'estado_id' => 9, 'cidade_nome' => 'Água Limpa', 'cidade_uf' => 'GO'],
            ['cidade_id' => 60, 'estado_id' => 20, 'cidade_nome' => 'Água Nova', 'cidade_uf' => 'RN'],
            ['cidade_id' => 61, 'estado_id' => 17, 'cidade_nome' => 'Água Preta', 'cidade_uf' => 'PE'],
            ['cidade_id' => 62, 'estado_id' => 21, 'cidade_nome' => 'Água Santa', 'cidade_uf' => 'RS'],
            ['cidade_id' => 63, 'estado_id' => 25, 'cidade_nome' => 'Aguaí', 'cidade_uf' => 'SP'],
            ['cidade_id' => 64, 'estado_id' => 13, 'cidade_nome' => 'Aguanil', 'cidade_uf' => 'MG'],
            ['cidade_id' => 65, 'estado_id' => 17, 'cidade_nome' => 'Águas Belas', 'cidade_uf' => 'PE'],
            ['cidade_id' => 66, 'estado_id' => 25, 'cidade_nome' => 'Águas da Prata', 'cidade_uf' => 'SP'],
            ['cidade_id' => 67, 'estado_id' => 24, 'cidade_nome' => 'Águas de Chapecó', 'cidade_uf' => 'SC'],
            ['cidade_id' => 68, 'estado_id' => 25, 'cidade_nome' => 'Águas de Lindóia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 69, 'estado_id' => 25, 'cidade_nome' => 'Águas de Santa Bárbara', 'cidade_uf' => 'SP'],
            ['cidade_id' => 70, 'estado_id' => 25, 'cidade_nome' => 'Águas de São Pedro', 'cidade_uf' => 'SP'],
            ['cidade_id' => 71, 'estado_id' => 13, 'cidade_nome' => 'Águas Formosas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 73, 'estado_id' => 9, 'cidade_nome' => 'Águas Lindas de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 74, 'estado_id' => 24, 'cidade_nome' => 'Águas Mornas', 'cidade_uf' => 'SC'],
            ['cidade_id' => 75, 'estado_id' => 13, 'cidade_nome' => 'Águas Vermelhas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 76, 'estado_id' => 21, 'cidade_nome' => 'Agudo', 'cidade_uf' => 'RS'],
            ['cidade_id' => 77, 'estado_id' => 25, 'cidade_nome' => 'Agudos', 'cidade_uf' => 'SP'],
            ['cidade_id' => 78, 'estado_id' => 16, 'cidade_nome' => 'Agudos do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 79, 'estado_id' => 8, 'cidade_nome' => 'Águia Branca', 'cidade_uf' => 'ES'],
            ['cidade_id' => 80, 'estado_id' => 15, 'cidade_nome' => 'Aguiar', 'cidade_uf' => 'PB'],
            ['cidade_id' => 81, 'estado_id' => 27, 'cidade_nome' => 'Aguiarnópolis', 'cidade_uf' => 'TO'],
            ['cidade_id' => 82, 'estado_id' => 13, 'cidade_nome' => 'Aimorés', 'cidade_uf' => 'MG'],
            ['cidade_id' => 83, 'estado_id' => 5, 'cidade_nome' => 'Aiquara', 'cidade_uf' => 'BA'],
            ['cidade_id' => 84, 'estado_id' => 6, 'cidade_nome' => 'Aiuaba', 'cidade_uf' => 'CE'],
            ['cidade_id' => 85, 'estado_id' => 13, 'cidade_nome' => 'Aiuruoca', 'cidade_uf' => 'MG'],
            ['cidade_id' => 86, 'estado_id' => 21, 'cidade_nome' => 'Ajuricaba', 'cidade_uf' => 'RS'],
            ['cidade_id' => 87, 'estado_id' => 13, 'cidade_nome' => 'Alagoa', 'cidade_uf' => 'MG'],
            ['cidade_id' => 88, 'estado_id' => 15, 'cidade_nome' => 'Alagoa Grande', 'cidade_uf' => 'PB'],
            ['cidade_id' => 89, 'estado_id' => 15, 'cidade_nome' => 'Alagoa Nova', 'cidade_uf' => 'PB'],
            ['cidade_id' => 90, 'estado_id' => 15, 'cidade_nome' => 'Alagoinha', 'cidade_uf' => 'PB'],
            ['cidade_id' => 91, 'estado_id' => 17, 'cidade_nome' => 'Alagoinha', 'cidade_uf' => 'PE'],
            ['cidade_id' => 92, 'estado_id' => 18, 'cidade_nome' => 'Alagoinha do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 93, 'estado_id' => 5, 'cidade_nome' => 'Alagoinhas', 'cidade_uf' => 'BA'],
            ['cidade_id' => 94, 'estado_id' => 25, 'cidade_nome' => 'Alambari', 'cidade_uf' => 'SP'],
            ['cidade_id' => 95, 'estado_id' => 13, 'cidade_nome' => 'Albertina', 'cidade_uf' => 'MG'],
            ['cidade_id' => 96, 'estado_id' => 10, 'cidade_nome' => 'Alcântara', 'cidade_uf' => 'MA'],
            ['cidade_id' => 97, 'estado_id' => 6, 'cidade_nome' => 'Alcântaras', 'cidade_uf' => 'CE'],
            ['cidade_id' => 98, 'estado_id' => 15, 'cidade_nome' => 'Alcantil', 'cidade_uf' => 'PB'],
            ['cidade_id' => 99, 'estado_id' => 12, 'cidade_nome' => 'Alcinópolis', 'cidade_uf' => 'MS'],
            ['cidade_id' => 100, 'estado_id' => 5, 'cidade_nome' => 'Alcobaça', 'cidade_uf' => 'BA'],
            ['cidade_id' => 101, 'estado_id' => 10, 'cidade_nome' => 'Aldeias Altas', 'cidade_uf' => 'MA'],
            ['cidade_id' => 102, 'estado_id' => 21, 'cidade_nome' => 'Alecrim', 'cidade_uf' => 'RS'],
            ['cidade_id' => 103, 'estado_id' => 8, 'cidade_nome' => 'Alegre', 'cidade_uf' => 'ES'],
            ['cidade_id' => 104, 'estado_id' => 21, 'cidade_nome' => 'Alegrete', 'cidade_uf' => 'RS'],
            ['cidade_id' => 105, 'estado_id' => 18, 'cidade_nome' => 'Alegrete do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 106, 'estado_id' => 21, 'cidade_nome' => 'Alegria', 'cidade_uf' => 'RS'],
            ['cidade_id' => 107, 'estado_id' => 13, 'cidade_nome' => 'Além Paraíba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 108, 'estado_id' => 14, 'cidade_nome' => 'Alenquer', 'cidade_uf' => 'PA'],
            ['cidade_id' => 109, 'estado_id' => 20, 'cidade_nome' => 'Alexandria', 'cidade_uf' => 'RN'],
            ['cidade_id' => 110, 'estado_id' => 9, 'cidade_nome' => 'Alexânia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 111, 'estado_id' => 13, 'cidade_nome' => 'Alfenas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 112, 'estado_id' => 8, 'cidade_nome' => 'Alfredo Chaves', 'cidade_uf' => 'ES'],
            ['cidade_id' => 113, 'estado_id' => 25, 'cidade_nome' => 'Alfredo Marcondes', 'cidade_uf' => 'SP'],
            ['cidade_id' => 114, 'estado_id' => 13, 'cidade_nome' => 'Alfredo Vasconcelos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 115, 'estado_id' => 24, 'cidade_nome' => 'Alfredo Wagner', 'cidade_uf' => 'SC'],
            ['cidade_id' => 116, 'estado_id' => 15, 'cidade_nome' => 'Algodão de Jandaíra', 'cidade_uf' => 'PB'],
            ['cidade_id' => 117, 'estado_id' => 15, 'cidade_nome' => 'Alhandra', 'cidade_uf' => 'PB'],
            ['cidade_id' => 118, 'estado_id' => 17, 'cidade_nome' => 'Aliança', 'cidade_uf' => 'PE'],
            ['cidade_id' => 119, 'estado_id' => 27, 'cidade_nome' => 'Aliança do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 120, 'estado_id' => 5, 'cidade_nome' => 'Almadina', 'cidade_uf' => 'BA'],
            ['cidade_id' => 121, 'estado_id' => 27, 'cidade_nome' => 'Almas', 'cidade_uf' => 'TO'],
            ['cidade_id' => 122, 'estado_id' => 14, 'cidade_nome' => 'Almeirim', 'cidade_uf' => 'PA'],
            ['cidade_id' => 123, 'estado_id' => 13, 'cidade_nome' => 'Almenara', 'cidade_uf' => 'MG'],
            ['cidade_id' => 124, 'estado_id' => 20, 'cidade_nome' => 'Almino Afonso', 'cidade_uf' => 'RN'],
            ['cidade_id' => 125, 'estado_id' => 16, 'cidade_nome' => 'Almirante Tamandaré', 'cidade_uf' => 'PR'],
            ['cidade_id' => 126, 'estado_id' => 21, 'cidade_nome' => 'Almirante Tamandaré do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 127, 'estado_id' => 9, 'cidade_nome' => 'Aloândia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 128, 'estado_id' => 13, 'cidade_nome' => 'Alpercata', 'cidade_uf' => 'MG'],
            ['cidade_id' => 129, 'estado_id' => 21, 'cidade_nome' => 'Alpestre', 'cidade_uf' => 'RS'],
            ['cidade_id' => 130, 'estado_id' => 13, 'cidade_nome' => 'Alpinópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 131, 'estado_id' => 11, 'cidade_nome' => 'Alta Floresta', 'cidade_uf' => 'MT'],
            ['cidade_id' => 132, 'estado_id' => 22, 'cidade_nome' => 'Alta Floresta D\'Oeste', 'cidade_uf' => 'RO'],
            ['cidade_id' => 133, 'estado_id' => 25, 'cidade_nome' => 'Altair', 'cidade_uf' => 'SP'],
            ['cidade_id' => 134, 'estado_id' => 14, 'cidade_nome' => 'Altamira', 'cidade_uf' => 'PA'],
            ['cidade_id' => 135, 'estado_id' => 10, 'cidade_nome' => 'Altamira do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 136, 'estado_id' => 16, 'cidade_nome' => 'Altamira do Paraná', 'cidade_uf' => 'PR'],
            ['cidade_id' => 137, 'estado_id' => 6, 'cidade_nome' => 'Altaneira', 'cidade_uf' => 'CE'],
            ['cidade_id' => 138, 'estado_id' => 13, 'cidade_nome' => 'Alterosa', 'cidade_uf' => 'MG'],
            ['cidade_id' => 139, 'estado_id' => 17, 'cidade_nome' => 'Altinho', 'cidade_uf' => 'PE'],
            ['cidade_id' => 140, 'estado_id' => 25, 'cidade_nome' => 'Altinópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 141, 'estado_id' => 23, 'cidade_nome' => 'Alto Alegre', 'cidade_uf' => 'RR'],
            ['cidade_id' => 142, 'estado_id' => 21, 'cidade_nome' => 'Alto Alegre', 'cidade_uf' => 'RS'],
            ['cidade_id' => 143, 'estado_id' => 25, 'cidade_nome' => 'Alto Alegre', 'cidade_uf' => 'SP'],
            ['cidade_id' => 144, 'estado_id' => 10, 'cidade_nome' => 'Alto Alegre do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 145, 'estado_id' => 10, 'cidade_nome' => 'Alto Alegre do Pindaré', 'cidade_uf' => 'MA'],
            ['cidade_id' => 146, 'estado_id' => 22, 'cidade_nome' => 'Alto Alegre dos Parecis', 'cidade_uf' => 'RO'],
            ['cidade_id' => 147, 'estado_id' => 11, 'cidade_nome' => 'Alto Araguaia', 'cidade_uf' => 'MT'],
            ['cidade_id' => 148, 'estado_id' => 24, 'cidade_nome' => 'Alto Bela Vista', 'cidade_uf' => 'SC'],
            ['cidade_id' => 149, 'estado_id' => 11, 'cidade_nome' => 'Alto Boa Vista', 'cidade_uf' => 'MT'],
            ['cidade_id' => 150, 'estado_id' => 13, 'cidade_nome' => 'Alto Caparaó', 'cidade_uf' => 'MG'],
            ['cidade_id' => 151, 'estado_id' => 20, 'cidade_nome' => 'Alto do Rodrigues', 'cidade_uf' => 'RN'],
            ['cidade_id' => 152, 'estado_id' => 21, 'cidade_nome' => 'Alto Feliz', 'cidade_uf' => 'RS'],
            ['cidade_id' => 153, 'estado_id' => 11, 'cidade_nome' => 'Alto Garças', 'cidade_uf' => 'MT'],
            ['cidade_id' => 154, 'estado_id' => 9, 'cidade_nome' => 'Alto Horizonte', 'cidade_uf' => 'GO'],
            ['cidade_id' => 155, 'estado_id' => 13, 'cidade_nome' => 'Alto Jequitibá', 'cidade_uf' => 'MG'],
            ['cidade_id' => 156, 'estado_id' => 18, 'cidade_nome' => 'Alto Longá', 'cidade_uf' => 'PI'],
            ['cidade_id' => 157, 'estado_id' => 11, 'cidade_nome' => 'Alto Paraguai', 'cidade_uf' => 'MT'],
            ['cidade_id' => 158, 'estado_id' => 16, 'cidade_nome' => 'Alto Paraíso', 'cidade_uf' => 'PR'],
            ['cidade_id' => 159, 'estado_id' => 22, 'cidade_nome' => 'Alto Paraíso', 'cidade_uf' => 'RO'],
            ['cidade_id' => 160, 'estado_id' => 9, 'cidade_nome' => 'Alto Paraíso de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 161, 'estado_id' => 16, 'cidade_nome' => 'Alto Paraná', 'cidade_uf' => 'PR'],
            ['cidade_id' => 162, 'estado_id' => 10, 'cidade_nome' => 'Alto Parnaíba', 'cidade_uf' => 'MA'],
            ['cidade_id' => 163, 'estado_id' => 16, 'cidade_nome' => 'Alto Piquiri', 'cidade_uf' => 'PR'],
            ['cidade_id' => 164, 'estado_id' => 13, 'cidade_nome' => 'Alto Rio Doce', 'cidade_uf' => 'MG'],
            ['cidade_id' => 165, 'estado_id' => 8, 'cidade_nome' => 'Alto Rio Novo', 'cidade_uf' => 'ES'],
            ['cidade_id' => 166, 'estado_id' => 6, 'cidade_nome' => 'Alto Santo', 'cidade_uf' => 'CE'],
            ['cidade_id' => 167, 'estado_id' => 11, 'cidade_nome' => 'Alto Taquari', 'cidade_uf' => 'MT'],
            ['cidade_id' => 168, 'estado_id' => 16, 'cidade_nome' => 'Altônia', 'cidade_uf' => 'PR'],
            ['cidade_id' => 169, 'estado_id' => 18, 'cidade_nome' => 'Altos', 'cidade_uf' => 'PI'],
            ['cidade_id' => 170, 'estado_id' => 25, 'cidade_nome' => 'Alumínio', 'cidade_uf' => 'SP'],
            ['cidade_id' => 171, 'estado_id' => 4, 'cidade_nome' => 'Alvarães', 'cidade_uf' => 'AM'],
            ['cidade_id' => 172, 'estado_id' => 13, 'cidade_nome' => 'Alvarenga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 173, 'estado_id' => 25, 'cidade_nome' => 'Álvares Florence', 'cidade_uf' => 'SP'],
            ['cidade_id' => 174, 'estado_id' => 25, 'cidade_nome' => 'Álvares Machado', 'cidade_uf' => 'SP'],
            ['cidade_id' => 175, 'estado_id' => 25, 'cidade_nome' => 'Álvaro de Carvalho', 'cidade_uf' => 'SP'],
            ['cidade_id' => 176, 'estado_id' => 25, 'cidade_nome' => 'Alvinlândia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 177, 'estado_id' => 13, 'cidade_nome' => 'Alvinópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 178, 'estado_id' => 21, 'cidade_nome' => 'Alvorada', 'cidade_uf' => 'RS'],
            ['cidade_id' => 179, 'estado_id' => 27, 'cidade_nome' => 'Alvorada', 'cidade_uf' => 'TO'],
            ['cidade_id' => 180, 'estado_id' => 13, 'cidade_nome' => 'Alvorada de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 181, 'estado_id' => 18, 'cidade_nome' => 'Alvorada do Gurguéia', 'cidade_uf' => 'PI'],
            ['cidade_id' => 182, 'estado_id' => 9, 'cidade_nome' => 'Alvorada do Norte', 'cidade_uf' => 'GO'],
            ['cidade_id' => 183, 'estado_id' => 16, 'cidade_nome' => 'Alvorada do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 184, 'estado_id' => 22, 'cidade_nome' => 'Alvorada D\'Oeste', 'cidade_uf' => 'RO'],
            ['cidade_id' => 185, 'estado_id' => 23, 'cidade_nome' => 'Amajari', 'cidade_uf' => 'RR'],
            ['cidade_id' => 186, 'estado_id' => 12, 'cidade_nome' => 'Amambai', 'cidade_uf' => 'MS'],
            ['cidade_id' => 187, 'estado_id' => 3, 'cidade_nome' => 'Amapá', 'cidade_uf' => 'AP'],
            ['cidade_id' => 188, 'estado_id' => 10, 'cidade_nome' => 'Amapá do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 189, 'estado_id' => 16, 'cidade_nome' => 'Amaporã', 'cidade_uf' => 'PR'],
            ['cidade_id' => 190, 'estado_id' => 17, 'cidade_nome' => 'Amaraji', 'cidade_uf' => 'PE'],
            ['cidade_id' => 191, 'estado_id' => 21, 'cidade_nome' => 'Amaral Ferrador', 'cidade_uf' => 'RS'],
            ['cidade_id' => 192, 'estado_id' => 9, 'cidade_nome' => 'Amaralina', 'cidade_uf' => 'GO'],
            ['cidade_id' => 193, 'estado_id' => 18, 'cidade_nome' => 'Amarante', 'cidade_uf' => 'PI'],
            ['cidade_id' => 194, 'estado_id' => 10, 'cidade_nome' => 'Amarante do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 195, 'estado_id' => 5, 'cidade_nome' => 'Amargosa', 'cidade_uf' => 'BA'],
            ['cidade_id' => 196, 'estado_id' => 4, 'cidade_nome' => 'Amaturá', 'cidade_uf' => 'AM'],
            ['cidade_id' => 197, 'estado_id' => 5, 'cidade_nome' => 'Amélia Rodrigues', 'cidade_uf' => 'BA'],
            ['cidade_id' => 198, 'estado_id' => 5, 'cidade_nome' => 'América Dourada', 'cidade_uf' => 'BA'],
            ['cidade_id' => 199, 'estado_id' => 25, 'cidade_nome' => 'Americana', 'cidade_uf' => 'SP'],
            ['cidade_id' => 200, 'estado_id' => 9, 'cidade_nome' => 'Americano do Brasil', 'cidade_uf' => 'GO'],
            ['cidade_id' => 201, 'estado_id' => 25, 'cidade_nome' => 'Américo Brasiliense', 'cidade_uf' => 'SP'],
            ['cidade_id' => 202, 'estado_id' => 25, 'cidade_nome' => 'Américo de Campos', 'cidade_uf' => 'SP'],
            ['cidade_id' => 203, 'estado_id' => 21, 'cidade_nome' => 'Ametista do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 204, 'estado_id' => 6, 'cidade_nome' => 'Amontada', 'cidade_uf' => 'CE'],
            ['cidade_id' => 205, 'estado_id' => 9, 'cidade_nome' => 'Amorinópolis', 'cidade_uf' => 'GO'],
            ['cidade_id' => 206, 'estado_id' => 15, 'cidade_nome' => 'Amparo', 'cidade_uf' => 'PB'],
            ['cidade_id' => 207, 'estado_id' => 25, 'cidade_nome' => 'Amparo', 'cidade_uf' => 'SP'],
            ['cidade_id' => 208, 'estado_id' => 26, 'cidade_nome' => 'Amparo de São Francisco', 'cidade_uf' => 'SE'],
            ['cidade_id' => 209, 'estado_id' => 13, 'cidade_nome' => 'Amparo do Serra', 'cidade_uf' => 'MG'],
            ['cidade_id' => 210, 'estado_id' => 16, 'cidade_nome' => 'Ampére', 'cidade_uf' => 'PR'],
            ['cidade_id' => 211, 'estado_id' => 2, 'cidade_nome' => 'Anadia', 'cidade_uf' => 'AL'],
            ['cidade_id' => 212, 'estado_id' => 5, 'cidade_nome' => 'Anagé', 'cidade_uf' => 'BA'],
            ['cidade_id' => 213, 'estado_id' => 16, 'cidade_nome' => 'Anahy', 'cidade_uf' => 'PR'],
            ['cidade_id' => 214, 'estado_id' => 14, 'cidade_nome' => 'Anajás', 'cidade_uf' => 'PA'],
            ['cidade_id' => 215, 'estado_id' => 10, 'cidade_nome' => 'Anajatuba', 'cidade_uf' => 'MA'],
            ['cidade_id' => 216, 'estado_id' => 25, 'cidade_nome' => 'Analândia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 217, 'estado_id' => 4, 'cidade_nome' => 'Anamã', 'cidade_uf' => 'AM'],
            ['cidade_id' => 218, 'estado_id' => 27, 'cidade_nome' => 'Ananás', 'cidade_uf' => 'TO'],
            ['cidade_id' => 219, 'estado_id' => 14, 'cidade_nome' => 'Ananindeua', 'cidade_uf' => 'PA'],
            ['cidade_id' => 220, 'estado_id' => 9, 'cidade_nome' => 'Anápolis', 'cidade_uf' => 'GO'],
            ['cidade_id' => 221, 'estado_id' => 14, 'cidade_nome' => 'Anapu', 'cidade_uf' => 'PA'],
            ['cidade_id' => 222, 'estado_id' => 10, 'cidade_nome' => 'Anapurus', 'cidade_uf' => 'MA'],
            ['cidade_id' => 223, 'estado_id' => 12, 'cidade_nome' => 'Anastácio', 'cidade_uf' => 'MS'],
            ['cidade_id' => 224, 'estado_id' => 12, 'cidade_nome' => 'Anaurilândia', 'cidade_uf' => 'MS'],
            ['cidade_id' => 225, 'estado_id' => 8, 'cidade_nome' => 'Anchieta', 'cidade_uf' => 'ES'],
            ['cidade_id' => 226, 'estado_id' => 24, 'cidade_nome' => 'Anchieta', 'cidade_uf' => 'SC'],
            ['cidade_id' => 227, 'estado_id' => 5, 'cidade_nome' => 'Andaraí', 'cidade_uf' => 'BA'],
            ['cidade_id' => 228, 'estado_id' => 16, 'cidade_nome' => 'Andirá', 'cidade_uf' => 'PR'],
            ['cidade_id' => 229, 'estado_id' => 5, 'cidade_nome' => 'Andorinha', 'cidade_uf' => 'BA'],
            ['cidade_id' => 230, 'estado_id' => 13, 'cidade_nome' => 'Andradas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 231, 'estado_id' => 25, 'cidade_nome' => 'Andradina', 'cidade_uf' => 'SP'],
            ['cidade_id' => 232, 'estado_id' => 21, 'cidade_nome' => 'André da Rocha', 'cidade_uf' => 'RS'],
            ['cidade_id' => 233, 'estado_id' => 13, 'cidade_nome' => 'Andrelândia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 234, 'estado_id' => 25, 'cidade_nome' => 'Angatuba', 'cidade_uf' => 'SP'],
            ['cidade_id' => 235, 'estado_id' => 13, 'cidade_nome' => 'Angelândia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 236, 'estado_id' => 12, 'cidade_nome' => 'Angélica', 'cidade_uf' => 'MS'],
            ['cidade_id' => 237, 'estado_id' => 17, 'cidade_nome' => 'Angelim', 'cidade_uf' => 'PE'],
            ['cidade_id' => 238, 'estado_id' => 24, 'cidade_nome' => 'Angelina', 'cidade_uf' => 'SC'],
            ['cidade_id' => 239, 'estado_id' => 5, 'cidade_nome' => 'Angical', 'cidade_uf' => 'BA'],
            ['cidade_id' => 240, 'estado_id' => 18, 'cidade_nome' => 'Angical do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 241, 'estado_id' => 27, 'cidade_nome' => 'Angico', 'cidade_uf' => 'TO'],
            ['cidade_id' => 242, 'estado_id' => 20, 'cidade_nome' => 'Angicos', 'cidade_uf' => 'RN'],
            ['cidade_id' => 243, 'estado_id' => 19, 'cidade_nome' => 'Angra dos Reis', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 244, 'estado_id' => 5, 'cidade_nome' => 'Anguera', 'cidade_uf' => 'BA'],
            ['cidade_id' => 245, 'estado_id' => 16, 'cidade_nome' => 'Ângulo', 'cidade_uf' => 'PR'],
            ['cidade_id' => 246, 'estado_id' => 9, 'cidade_nome' => 'Anhanguera', 'cidade_uf' => 'GO'],
            ['cidade_id' => 247, 'estado_id' => 25, 'cidade_nome' => 'Anhembi', 'cidade_uf' => 'SP'],
            ['cidade_id' => 248, 'estado_id' => 25, 'cidade_nome' => 'Anhumas', 'cidade_uf' => 'SP'],
            ['cidade_id' => 249, 'estado_id' => 9, 'cidade_nome' => 'Anicuns', 'cidade_uf' => 'GO'],
            ['cidade_id' => 250, 'estado_id' => 18, 'cidade_nome' => 'Anísio de Abreu', 'cidade_uf' => 'PI'],
            ['cidade_id' => 251, 'estado_id' => 24, 'cidade_nome' => 'Anita Garibaldi', 'cidade_uf' => 'SC'],
            ['cidade_id' => 252, 'estado_id' => 24, 'cidade_nome' => 'Anitápolis', 'cidade_uf' => 'SC'],
            ['cidade_id' => 253, 'estado_id' => 4, 'cidade_nome' => 'Anori', 'cidade_uf' => 'AM'],
            ['cidade_id' => 254, 'estado_id' => 21, 'cidade_nome' => 'Anta Gorda', 'cidade_uf' => 'RS'],
            ['cidade_id' => 255, 'estado_id' => 5, 'cidade_nome' => 'Antas', 'cidade_uf' => 'BA'],
            ['cidade_id' => 256, 'estado_id' => 16, 'cidade_nome' => 'Antonina', 'cidade_uf' => 'PR'],
            ['cidade_id' => 257, 'estado_id' => 6, 'cidade_nome' => 'Antonina do Norte', 'cidade_uf' => 'CE'],
            ['cidade_id' => 258, 'estado_id' => 18, 'cidade_nome' => 'Antônio Almeida', 'cidade_uf' => 'PI'],
            ['cidade_id' => 259, 'estado_id' => 5, 'cidade_nome' => 'Antônio Cardoso', 'cidade_uf' => 'BA'],
            ['cidade_id' => 260, 'estado_id' => 13, 'cidade_nome' => 'Antônio Carlos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 261, 'estado_id' => 24, 'cidade_nome' => 'Antônio Carlos', 'cidade_uf' => 'SC'],
            ['cidade_id' => 262, 'estado_id' => 13, 'cidade_nome' => 'Antônio Dias', 'cidade_uf' => 'MG'],
            ['cidade_id' => 263, 'estado_id' => 5, 'cidade_nome' => 'Antônio Gonçalves', 'cidade_uf' => 'BA'],
            ['cidade_id' => 264, 'estado_id' => 12, 'cidade_nome' => 'Antônio João', 'cidade_uf' => 'MS'],
            ['cidade_id' => 265, 'estado_id' => 20, 'cidade_nome' => 'Antônio Martins', 'cidade_uf' => 'RN'],
            ['cidade_id' => 266, 'estado_id' => 16, 'cidade_nome' => 'Antônio Olinto', 'cidade_uf' => 'PR'],
            ['cidade_id' => 267, 'estado_id' => 21, 'cidade_nome' => 'Antônio Prado', 'cidade_uf' => 'RS'],
            ['cidade_id' => 268, 'estado_id' => 13, 'cidade_nome' => 'Antônio Prado de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 269, 'estado_id' => 15, 'cidade_nome' => 'Aparecida', 'cidade_uf' => 'PB'],
            ['cidade_id' => 270, 'estado_id' => 25, 'cidade_nome' => 'Aparecida', 'cidade_uf' => 'SP'],
            ['cidade_id' => 271, 'estado_id' => 9, 'cidade_nome' => 'Aparecida de Goiânia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 272, 'estado_id' => 9, 'cidade_nome' => 'Aparecida do Rio Doce', 'cidade_uf' => 'GO'],
            ['cidade_id' => 273, 'estado_id' => 27, 'cidade_nome' => 'Aparecida do Rio Negro', 'cidade_uf' => 'TO'],
            ['cidade_id' => 274, 'estado_id' => 12, 'cidade_nome' => 'Aparecida do Taboado', 'cidade_uf' => 'MS'],
            ['cidade_id' => 275, 'estado_id' => 25, 'cidade_nome' => 'Aparecida d\'Oeste', 'cidade_uf' => 'SP'],
            ['cidade_id' => 276, 'estado_id' => 19, 'cidade_nome' => 'Aperibé', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 277, 'estado_id' => 8, 'cidade_nome' => 'Apiacá', 'cidade_uf' => 'ES'],
            ['cidade_id' => 278, 'estado_id' => 11, 'cidade_nome' => 'Apiacás', 'cidade_uf' => 'MT'],
            ['cidade_id' => 279, 'estado_id' => 25, 'cidade_nome' => 'Apiaí', 'cidade_uf' => 'SP'],
            ['cidade_id' => 280, 'estado_id' => 10, 'cidade_nome' => 'Apicum-Açu', 'cidade_uf' => 'MA'],
            ['cidade_id' => 281, 'estado_id' => 24, 'cidade_nome' => 'Apiúna', 'cidade_uf' => 'SC'],
            ['cidade_id' => 282, 'estado_id' => 20, 'cidade_nome' => 'Apodi', 'cidade_uf' => 'RN'],
            ['cidade_id' => 283, 'estado_id' => 5, 'cidade_nome' => 'Aporá', 'cidade_uf' => 'BA'],
            ['cidade_id' => 284, 'estado_id' => 9, 'cidade_nome' => 'Aporé', 'cidade_uf' => 'GO'],
            ['cidade_id' => 285, 'estado_id' => 5, 'cidade_nome' => 'Apuarema', 'cidade_uf' => 'BA'],
            ['cidade_id' => 286, 'estado_id' => 16, 'cidade_nome' => 'Apucarana', 'cidade_uf' => 'PR'],
            ['cidade_id' => 287, 'estado_id' => 4, 'cidade_nome' => 'Apuí', 'cidade_uf' => 'AM'],
            ['cidade_id' => 288, 'estado_id' => 6, 'cidade_nome' => 'Apuiarés', 'cidade_uf' => 'CE'],
            ['cidade_id' => 289, 'estado_id' => 26, 'cidade_nome' => 'Aquidabã', 'cidade_uf' => 'SE'],
            ['cidade_id' => 290, 'estado_id' => 12, 'cidade_nome' => 'Aquidauana', 'cidade_uf' => 'MS'],
            ['cidade_id' => 291, 'estado_id' => 6, 'cidade_nome' => 'Aquiraz', 'cidade_uf' => 'CE'],
            ['cidade_id' => 292, 'estado_id' => 24, 'cidade_nome' => 'Arabutã', 'cidade_uf' => 'SC'],
            ['cidade_id' => 293, 'estado_id' => 15, 'cidade_nome' => 'Araçagi', 'cidade_uf' => 'PB'],
            ['cidade_id' => 294, 'estado_id' => 13, 'cidade_nome' => 'Araçaí', 'cidade_uf' => 'MG'],
            ['cidade_id' => 295, 'estado_id' => 26, 'cidade_nome' => 'Aracaju', 'cidade_uf' => 'SE'],
            ['cidade_id' => 296, 'estado_id' => 25, 'cidade_nome' => 'Araçariguama', 'cidade_uf' => 'SP'],
            ['cidade_id' => 297, 'estado_id' => 5, 'cidade_nome' => 'Araças', 'cidade_uf' => 'BA'],
            ['cidade_id' => 298, 'estado_id' => 6, 'cidade_nome' => 'Aracati', 'cidade_uf' => 'CE'],
            ['cidade_id' => 299, 'estado_id' => 5, 'cidade_nome' => 'Aracatu', 'cidade_uf' => 'BA'],
            ['cidade_id' => 300, 'estado_id' => 25, 'cidade_nome' => 'Araçatuba', 'cidade_uf' => 'SP'],
            ['cidade_id' => 301, 'estado_id' => 5, 'cidade_nome' => 'Araci', 'cidade_uf' => 'BA'],
            ['cidade_id' => 302, 'estado_id' => 13, 'cidade_nome' => 'Aracitaba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 303, 'estado_id' => 6, 'cidade_nome' => 'Aracoiaba', 'cidade_uf' => 'CE'],
            ['cidade_id' => 304, 'estado_id' => 17, 'cidade_nome' => 'Araçoiaba', 'cidade_uf' => 'PE'],
            ['cidade_id' => 305, 'estado_id' => 25, 'cidade_nome' => 'Araçoiaba da Serra', 'cidade_uf' => 'SP'],
            ['cidade_id' => 306, 'estado_id' => 8, 'cidade_nome' => 'Aracruz', 'cidade_uf' => 'ES'],
            ['cidade_id' => 307, 'estado_id' => 9, 'cidade_nome' => 'Araçu', 'cidade_uf' => 'GO'],
            ['cidade_id' => 308, 'estado_id' => 13, 'cidade_nome' => 'Araçuaí', 'cidade_uf' => 'MG'],
            ['cidade_id' => 309, 'estado_id' => 9, 'cidade_nome' => 'Aragarças', 'cidade_uf' => 'GO'],
            ['cidade_id' => 310, 'estado_id' => 9, 'cidade_nome' => 'Aragoiânia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 311, 'estado_id' => 27, 'cidade_nome' => 'Aragominas', 'cidade_uf' => 'TO'],
            ['cidade_id' => 312, 'estado_id' => 27, 'cidade_nome' => 'Araguacema', 'cidade_uf' => 'TO'],
            ['cidade_id' => 313, 'estado_id' => 27, 'cidade_nome' => 'Araguaçu', 'cidade_uf' => 'TO'],
            ['cidade_id' => 314, 'estado_id' => 11, 'cidade_nome' => 'Araguaiana', 'cidade_uf' => 'MT'],
            ['cidade_id' => 315, 'estado_id' => 27, 'cidade_nome' => 'Araguaína', 'cidade_uf' => 'TO'],
            ['cidade_id' => 316, 'estado_id' => 11, 'cidade_nome' => 'Araguainha', 'cidade_uf' => 'MT'],
            ['cidade_id' => 317, 'estado_id' => 10, 'cidade_nome' => 'Araguanã', 'cidade_uf' => 'MA'],
            ['cidade_id' => 318, 'estado_id' => 27, 'cidade_nome' => 'Araguanã', 'cidade_uf' => 'TO'],
            ['cidade_id' => 319, 'estado_id' => 9, 'cidade_nome' => 'Araguapaz', 'cidade_uf' => 'GO'],
            ['cidade_id' => 320, 'estado_id' => 13, 'cidade_nome' => 'Araguari', 'cidade_uf' => 'MG'],
            ['cidade_id' => 321, 'estado_id' => 27, 'cidade_nome' => 'Araguatins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 322, 'estado_id' => 10, 'cidade_nome' => 'Araioses', 'cidade_uf' => 'MA'],
            ['cidade_id' => 323, 'estado_id' => 12, 'cidade_nome' => 'Aral Moreira', 'cidade_uf' => 'MS'],
            ['cidade_id' => 324, 'estado_id' => 5, 'cidade_nome' => 'Aramari', 'cidade_uf' => 'BA'],
            ['cidade_id' => 325, 'estado_id' => 21, 'cidade_nome' => 'Arambaré', 'cidade_uf' => 'RS'],
            ['cidade_id' => 326, 'estado_id' => 10, 'cidade_nome' => 'Arame', 'cidade_uf' => 'MA'],
            ['cidade_id' => 327, 'estado_id' => 25, 'cidade_nome' => 'Aramina', 'cidade_uf' => 'SP'],
            ['cidade_id' => 328, 'estado_id' => 25, 'cidade_nome' => 'Arandu', 'cidade_uf' => 'SP'],
            ['cidade_id' => 329, 'estado_id' => 13, 'cidade_nome' => 'Arantina', 'cidade_uf' => 'MG'],
            ['cidade_id' => 330, 'estado_id' => 25, 'cidade_nome' => 'Arapeí', 'cidade_uf' => 'SP'],
            ['cidade_id' => 331, 'estado_id' => 2, 'cidade_nome' => 'Arapiraca', 'cidade_uf' => 'AL'],
            ['cidade_id' => 332, 'estado_id' => 27, 'cidade_nome' => 'Arapoema', 'cidade_uf' => 'TO'],
            ['cidade_id' => 333, 'estado_id' => 13, 'cidade_nome' => 'Araponga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 334, 'estado_id' => 16, 'cidade_nome' => 'Arapongas', 'cidade_uf' => 'PR'],
            ['cidade_id' => 335, 'estado_id' => 13, 'cidade_nome' => 'Araporã', 'cidade_uf' => 'MG'],
            ['cidade_id' => 336, 'estado_id' => 16, 'cidade_nome' => 'Arapoti', 'cidade_uf' => 'PR'],
            ['cidade_id' => 337, 'estado_id' => 13, 'cidade_nome' => 'Arapuá', 'cidade_uf' => 'MG'],
            ['cidade_id' => 338, 'estado_id' => 16, 'cidade_nome' => 'Arapuã', 'cidade_uf' => 'PR'],
            ['cidade_id' => 339, 'estado_id' => 11, 'cidade_nome' => 'Araputanga', 'cidade_uf' => 'MT'],
            ['cidade_id' => 340, 'estado_id' => 24, 'cidade_nome' => 'Araquari', 'cidade_uf' => 'SC'],
            ['cidade_id' => 341, 'estado_id' => 15, 'cidade_nome' => 'Arara', 'cidade_uf' => 'PB'],
            ['cidade_id' => 342, 'estado_id' => 24, 'cidade_nome' => 'Araranguá', 'cidade_uf' => 'SC'],
            ['cidade_id' => 343, 'estado_id' => 25, 'cidade_nome' => 'Araraquara', 'cidade_uf' => 'SP'],
            ['cidade_id' => 344, 'estado_id' => 25, 'cidade_nome' => 'Araras', 'cidade_uf' => 'SP'],
            ['cidade_id' => 345, 'estado_id' => 6, 'cidade_nome' => 'Ararendá', 'cidade_uf' => 'CE'],
            ['cidade_id' => 346, 'estado_id' => 10, 'cidade_nome' => 'Arari', 'cidade_uf' => 'MA'],
            ['cidade_id' => 347, 'estado_id' => 21, 'cidade_nome' => 'Araricá', 'cidade_uf' => 'RS'],
            ['cidade_id' => 348, 'estado_id' => 6, 'cidade_nome' => 'Araripe', 'cidade_uf' => 'CE'],
            ['cidade_id' => 349, 'estado_id' => 17, 'cidade_nome' => 'Araripina', 'cidade_uf' => 'PE'],
            ['cidade_id' => 350, 'estado_id' => 19, 'cidade_nome' => 'Araruama', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 351, 'estado_id' => 15, 'cidade_nome' => 'Araruna', 'cidade_uf' => 'PB'],
            ['cidade_id' => 352, 'estado_id' => 16, 'cidade_nome' => 'Araruna', 'cidade_uf' => 'PR'],
            ['cidade_id' => 353, 'estado_id' => 5, 'cidade_nome' => 'Arataca', 'cidade_uf' => 'BA'],
            ['cidade_id' => 354, 'estado_id' => 21, 'cidade_nome' => 'Aratiba', 'cidade_uf' => 'RS'],
            ['cidade_id' => 355, 'estado_id' => 6, 'cidade_nome' => 'Aratuba', 'cidade_uf' => 'CE'],
            ['cidade_id' => 356, 'estado_id' => 5, 'cidade_nome' => 'Aratuípe', 'cidade_uf' => 'BA'],
            ['cidade_id' => 357, 'estado_id' => 26, 'cidade_nome' => 'Arauá', 'cidade_uf' => 'SE'],
            ['cidade_id' => 358, 'estado_id' => 16, 'cidade_nome' => 'Araucária', 'cidade_uf' => 'PR'],
            ['cidade_id' => 359, 'estado_id' => 13, 'cidade_nome' => 'Araújos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 360, 'estado_id' => 13, 'cidade_nome' => 'Araxá', 'cidade_uf' => 'MG'],
            ['cidade_id' => 361, 'estado_id' => 13, 'cidade_nome' => 'Arceburgo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 362, 'estado_id' => 25, 'cidade_nome' => 'Arco-Íris', 'cidade_uf' => 'SP'],
            ['cidade_id' => 363, 'estado_id' => 13, 'cidade_nome' => 'Arcos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 364, 'estado_id' => 17, 'cidade_nome' => 'Arcoverde', 'cidade_uf' => 'PE'],
            ['cidade_id' => 365, 'estado_id' => 13, 'cidade_nome' => 'Areado', 'cidade_uf' => 'MG'],
            ['cidade_id' => 366, 'estado_id' => 19, 'cidade_nome' => 'Areal', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 367, 'estado_id' => 25, 'cidade_nome' => 'Arealva', 'cidade_uf' => 'SP'],
            ['cidade_id' => 368, 'estado_id' => 15, 'cidade_nome' => 'Areia', 'cidade_uf' => 'PB'],
            ['cidade_id' => 369, 'estado_id' => 20, 'cidade_nome' => 'Areia Branca', 'cidade_uf' => 'RN'],
            ['cidade_id' => 370, 'estado_id' => 26, 'cidade_nome' => 'Areia Branca', 'cidade_uf' => 'SE'],
            ['cidade_id' => 371, 'estado_id' => 15, 'cidade_nome' => 'Areia de Baraúnas', 'cidade_uf' => 'PB'],
            ['cidade_id' => 372, 'estado_id' => 15, 'cidade_nome' => 'Areial', 'cidade_uf' => 'PB'],
            ['cidade_id' => 373, 'estado_id' => 25, 'cidade_nome' => 'Areias', 'cidade_uf' => 'SP'],
            ['cidade_id' => 374, 'estado_id' => 25, 'cidade_nome' => 'Areiópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 375, 'estado_id' => 11, 'cidade_nome' => 'Arenápolis', 'cidade_uf' => 'MT'],
            ['cidade_id' => 376, 'estado_id' => 9, 'cidade_nome' => 'Arenópolis', 'cidade_uf' => 'GO'],
            ['cidade_id' => 377, 'estado_id' => 20, 'cidade_nome' => 'Arês', 'cidade_uf' => 'RN'],
            ['cidade_id' => 378, 'estado_id' => 13, 'cidade_nome' => 'Argirita', 'cidade_uf' => 'MG'],
            ['cidade_id' => 379, 'estado_id' => 13, 'cidade_nome' => 'Aricanduva', 'cidade_uf' => 'MG'],
            ['cidade_id' => 380, 'estado_id' => 13, 'cidade_nome' => 'Arinos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 381, 'estado_id' => 11, 'cidade_nome' => 'Aripuanã', 'cidade_uf' => 'MT'],
            ['cidade_id' => 382, 'estado_id' => 22, 'cidade_nome' => 'Ariquemes', 'cidade_uf' => 'RO'],
            ['cidade_id' => 383, 'estado_id' => 25, 'cidade_nome' => 'Ariranha', 'cidade_uf' => 'SP'],
            ['cidade_id' => 384, 'estado_id' => 16, 'cidade_nome' => 'Ariranha do Ivaí', 'cidade_uf' => 'PR'],
            ['cidade_id' => 385, 'estado_id' => 19, 'cidade_nome' => 'Armação dos Búzios', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 386, 'estado_id' => 24, 'cidade_nome' => 'Armazém', 'cidade_uf' => 'SC'],
            ['cidade_id' => 387, 'estado_id' => 6, 'cidade_nome' => 'Arneiroz', 'cidade_uf' => 'CE'],
            ['cidade_id' => 388, 'estado_id' => 18, 'cidade_nome' => 'Aroazes', 'cidade_uf' => 'PI'],
            ['cidade_id' => 389, 'estado_id' => 15, 'cidade_nome' => 'Aroeiras', 'cidade_uf' => 'PB'],
            ['cidade_id' => 390, 'estado_id' => 18, 'cidade_nome' => 'Aroeiras do Itaim', 'cidade_uf' => 'PI'],
            ['cidade_id' => 391, 'estado_id' => 18, 'cidade_nome' => 'Arraial', 'cidade_uf' => 'PI'],
            ['cidade_id' => 392, 'estado_id' => 19, 'cidade_nome' => 'Arraial do Cabo', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 393, 'estado_id' => 27, 'cidade_nome' => 'Arraias', 'cidade_uf' => 'TO'],
            ['cidade_id' => 394, 'estado_id' => 21, 'cidade_nome' => 'Arroio do Meio', 'cidade_uf' => 'RS'],
            ['cidade_id' => 395, 'estado_id' => 21, 'cidade_nome' => 'Arroio do Padre', 'cidade_uf' => 'RS'],
            ['cidade_id' => 396, 'estado_id' => 21, 'cidade_nome' => 'Arroio do Sal', 'cidade_uf' => 'RS'],
            ['cidade_id' => 397, 'estado_id' => 21, 'cidade_nome' => 'Arroio do Tigre', 'cidade_uf' => 'RS'],
            ['cidade_id' => 398, 'estado_id' => 21, 'cidade_nome' => 'Arroio dos Ratos', 'cidade_uf' => 'RS'],
            ['cidade_id' => 399, 'estado_id' => 21, 'cidade_nome' => 'Arroio Grande', 'cidade_uf' => 'RS'],
            ['cidade_id' => 400, 'estado_id' => 24, 'cidade_nome' => 'Arroio Trinta', 'cidade_uf' => 'SC'],
            ['cidade_id' => 401, 'estado_id' => 25, 'cidade_nome' => 'Artur Nogueira', 'cidade_uf' => 'SP'],
            ['cidade_id' => 402, 'estado_id' => 9, 'cidade_nome' => 'Aruanã', 'cidade_uf' => 'GO'],
            ['cidade_id' => 403, 'estado_id' => 25, 'cidade_nome' => 'Arujá', 'cidade_uf' => 'SP'],
            ['cidade_id' => 404, 'estado_id' => 24, 'cidade_nome' => 'Arvoredo', 'cidade_uf' => 'SC'],
            ['cidade_id' => 405, 'estado_id' => 21, 'cidade_nome' => 'Arvorezinha', 'cidade_uf' => 'RS'],
            ['cidade_id' => 406, 'estado_id' => 24, 'cidade_nome' => 'Ascurra', 'cidade_uf' => 'SC'],
            ['cidade_id' => 407, 'estado_id' => 25, 'cidade_nome' => 'Aspásia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 408, 'estado_id' => 16, 'cidade_nome' => 'Assaí', 'cidade_uf' => 'PR'],
            ['cidade_id' => 409, 'estado_id' => 6,  'cidade_nome' => 'Assaré', 'cidade_uf' => 'CE'],
            ['cidade_id' => 410, 'estado_id' => 25, 'cidade_nome' => 'Assis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 411, 'estado_id' => 1, 'cidade_nome' => 'Assis Brasil', 'cidade_uf' => 'AC'],
            ['cidade_id' => 412, 'estado_id' => 16, 'cidade_nome' => 'Assis Chateaubriand', 'cidade_uf' => 'PR'],
            ['cidade_id' => 413, 'estado_id' => 15, 'cidade_nome' => 'Assunção', 'cidade_uf' => 'PB'],
            ['cidade_id' => 414, 'estado_id' => 18, 'cidade_nome' => 'Assunção do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 415, 'estado_id' => 13, 'cidade_nome' => 'Astolfo Dutra', 'cidade_uf' => 'MG'],
            ['cidade_id' => 416, 'estado_id' => 16, 'cidade_nome' => 'Astorga', 'cidade_uf' => 'PR'],
            ['cidade_id' => 417, 'estado_id' => 2, 'cidade_nome' => 'Atalaia', 'cidade_uf' => 'AL'],
            ['cidade_id' => 418, 'estado_id' => 16, 'cidade_nome' => 'Atalaia', 'cidade_uf' => 'PR'],
            ['cidade_id' => 419, 'estado_id' => 4, 'cidade_nome' => 'Atalaia do Norte', 'cidade_uf' => 'AM'],
            ['cidade_id' => 420, 'estado_id' => 24, 'cidade_nome' => 'Atalanta', 'cidade_uf' => 'SC'],
            ['cidade_id' => 421, 'estado_id' => 13, 'cidade_nome' => 'Ataléia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 422, 'estado_id' => 25, 'cidade_nome' => 'Atibaia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 423, 'estado_id' => 8, 'cidade_nome' => 'Atilio Vivacqua', 'cidade_uf' => 'ES'],
            ['cidade_id' => 424, 'estado_id' => 27, 'cidade_nome' => 'Augustinópolis', 'cidade_uf' => 'TO'],
            ['cidade_id' => 425, 'estado_id' => 14, 'cidade_nome' => 'Augusto Corrêa', 'cidade_uf' => 'PA'],
            ['cidade_id' => 426, 'estado_id' => 13, 'cidade_nome' => 'Augusto de Lima', 'cidade_uf' => 'MG'],
            ['cidade_id' => 427, 'estado_id' => 21, 'cidade_nome' => 'Augusto Pestana', 'cidade_uf' => 'RS'],
            ['cidade_id' => 428, 'estado_id' => 20, 'cidade_nome' => 'Augusto Severo', 'cidade_uf' => 'RN'],
            ['cidade_id' => 429, 'estado_id' => 21, 'cidade_nome' => 'Áurea', 'cidade_uf' => 'RS'],
            ['cidade_id' => 430, 'estado_id' => 5, 'cidade_nome' => 'Aurelino Leal', 'cidade_uf' => 'BA'],
            ['cidade_id' => 431, 'estado_id' => 25, 'cidade_nome' => 'Auriflama', 'cidade_uf' => 'SP'],
            ['cidade_id' => 432, 'estado_id' => 9, 'cidade_nome' => 'Aurilândia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 433, 'estado_id' => 6, 'cidade_nome' => 'Aurora', 'cidade_uf' => 'CE'],
            ['cidade_id' => 434, 'estado_id' => 24, 'cidade_nome' => 'Aurora', 'cidade_uf' => 'SC'],
            ['cidade_id' => 435, 'estado_id' => 14, 'cidade_nome' => 'Aurora do Pará', 'cidade_uf' => 'PA'],
            ['cidade_id' => 436, 'estado_id' => 27, 'cidade_nome' => 'Aurora do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 437, 'estado_id' => 4, 'cidade_nome' => 'Autazes', 'cidade_uf' => 'AM'],
            ['cidade_id' => 438, 'estado_id' => 25, 'cidade_nome' => 'Avaí', 'cidade_uf' => 'SP'],
            ['cidade_id' => 439, 'estado_id' => 25, 'cidade_nome' => 'Avanhandava', 'cidade_uf' => 'SP'],
            ['cidade_id' => 440, 'estado_id' => 25, 'cidade_nome' => 'Avaré', 'cidade_uf' => 'SP'],
            ['cidade_id' => 441, 'estado_id' => 14, 'cidade_nome' => 'Aveiro', 'cidade_uf' => 'PA'],
            ['cidade_id' => 442, 'estado_id' => 18, 'cidade_nome' => 'Avelino Lopes', 'cidade_uf' => 'PI'],
            ['cidade_id' => 443, 'estado_id' => 9, 'cidade_nome' => 'Avelinópolis', 'cidade_uf' => 'GO'],
            ['cidade_id' => 444, 'estado_id' => 10, 'cidade_nome' => 'Axixá', 'cidade_uf' => 'MA'],
            ['cidade_id' => 445, 'estado_id' => 27, 'cidade_nome' => 'Axixá do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 446, 'estado_id' => 27, 'cidade_nome' => 'Babaçulândia', 'cidade_uf' => 'TO'],
            ['cidade_id' => 447, 'estado_id' => 10, 'cidade_nome' => 'Bacabal', 'cidade_uf' => 'MA'],
            ['cidade_id' => 448, 'estado_id' => 10, 'cidade_nome' => 'Bacabeira', 'cidade_uf' => 'MA'],
            ['cidade_id' => 449, 'estado_id' => 10, 'cidade_nome' => 'Bacuri', 'cidade_uf' => 'MA'],
            ['cidade_id' => 450, 'estado_id' => 10, 'cidade_nome' => 'Bacurituba', 'cidade_uf' => 'MA'],
            ['cidade_id' => 451, 'estado_id' => 25, 'cidade_nome' => 'Bady Bassitt', 'cidade_uf' => 'SP'],
            ['cidade_id' => 452, 'estado_id' => 13, 'cidade_nome' => 'Baependi', 'cidade_uf' => 'MG'],
            ['cidade_id' => 453, 'estado_id' => 21, 'cidade_nome' => 'Bagé', 'cidade_uf' => 'RS'],
            ['cidade_id' => 454, 'estado_id' => 14, 'cidade_nome' => 'Bagre', 'cidade_uf' => 'PA'],
            ['cidade_id' => 455, 'estado_id' => 15, 'cidade_nome' => 'Baía da Traição', 'cidade_uf' => 'PB'],
            ['cidade_id' => 456, 'estado_id' => 20, 'cidade_nome' => 'Baía Formosa', 'cidade_uf' => 'RN'],
            ['cidade_id' => 457, 'estado_id' => 5, 'cidade_nome' => 'Baianópolis', 'cidade_uf' => 'BA'],
            ['cidade_id' => 458, 'estado_id' => 14, 'cidade_nome' => 'Baião', 'cidade_uf' => 'PA'],
            ['cidade_id' => 459, 'estado_id' => 5, 'cidade_nome' => 'Baixa Grande', 'cidade_uf' => 'BA'],
            ['cidade_id' => 460, 'estado_id' => 18, 'cidade_nome' => 'Baixa Grande do Ribeiro', 'cidade_uf' => 'PI'],
            ['cidade_id' => 461, 'estado_id' => 6, 'cidade_nome' => 'Baixio', 'cidade_uf' => 'CE'],
            ['cidade_id' => 462, 'estado_id' => 8, 'cidade_nome' => 'Baixo Guandu', 'cidade_uf' => 'ES'],
            ['cidade_id' => 463, 'estado_id' => 25, 'cidade_nome' => 'Balbinos', 'cidade_uf' => 'SP'],
            ['cidade_id' => 464, 'estado_id' => 13, 'cidade_nome' => 'Baldim', 'cidade_uf' => 'MG'],
            ['cidade_id' => 465, 'estado_id' => 9, 'cidade_nome' => 'Baliza', 'cidade_uf' => 'GO'],
            ['cidade_id' => 466, 'estado_id' => 24, 'cidade_nome' => 'Balneário Arroio do Silva', 'cidade_uf' => 'SC'],
            ['cidade_id' => 467, 'estado_id' => 24, 'cidade_nome' => 'Balneário Barra do Sul', 'cidade_uf' => 'SC'],
            ['cidade_id' => 468, 'estado_id' => 24, 'cidade_nome' => 'Balneário Camboriú', 'cidade_uf' => 'SC'],
            ['cidade_id' => 469, 'estado_id' => 24, 'cidade_nome' => 'Balneário Gaivota', 'cidade_uf' => 'SC'],
            ['cidade_id' => 470, 'estado_id' => 24, 'cidade_nome' => 'Balneário Piçarras', 'cidade_uf' => 'SC'],
            ['cidade_id' => 471, 'estado_id' => 21, 'cidade_nome' => 'Balneário Pinhal', 'cidade_uf' => 'RS'],
            ['cidade_id' => 472, 'estado_id' => 16, 'cidade_nome' => 'Balsa Nova', 'cidade_uf' => 'PR'],
            ['cidade_id' => 473, 'estado_id' => 25, 'cidade_nome' => 'Bálsamo', 'cidade_uf' => 'SP'],
            ['cidade_id' => 474, 'estado_id' => 10, 'cidade_nome' => 'Balsas', 'cidade_uf' => 'MA'],
            ['cidade_id' => 475, 'estado_id' => 13, 'cidade_nome' => 'Bambuí', 'cidade_uf' => 'MG'],
            ['cidade_id' => 476, 'estado_id' => 6, 'cidade_nome' => 'Banabuiú', 'cidade_uf' => 'CE'],
            ['cidade_id' => 477, 'estado_id' => 25, 'cidade_nome' => 'Bananal', 'cidade_uf' => 'SP'],
            ['cidade_id' => 478, 'estado_id' => 15, 'cidade_nome' => 'Bananeiras', 'cidade_uf' => 'PB'],
            ['cidade_id' => 479, 'estado_id' => 13, 'cidade_nome' => 'Bandeira', 'cidade_uf' => 'MG'],
            ['cidade_id' => 480, 'estado_id' => 13, 'cidade_nome' => 'Bandeira do Sul', 'cidade_uf' => 'MG'],
            ['cidade_id' => 481, 'estado_id' => 24, 'cidade_nome' => 'Bandeirante', 'cidade_uf' => 'SC'],
            ['cidade_id' => 482, 'estado_id' => 12, 'cidade_nome' => 'Bandeirantes', 'cidade_uf' => 'MS'],
            ['cidade_id' => 483, 'estado_id' => 16, 'cidade_nome' => 'Bandeirantes', 'cidade_uf' => 'PR'],
            ['cidade_id' => 484, 'estado_id' => 27, 'cidade_nome' => 'Bandeirantes do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 485, 'estado_id' => 14, 'cidade_nome' => 'Bannach', 'cidade_uf' => 'PA'],
            ['cidade_id' => 486, 'estado_id' => 5, 'cidade_nome' => 'Banzaê', 'cidade_uf' => 'BA'],
            ['cidade_id' => 487, 'estado_id' => 21, 'cidade_nome' => 'Barão', 'cidade_uf' => 'RS'],
            ['cidade_id' => 488, 'estado_id' => 25, 'cidade_nome' => 'Barão de Antonina', 'cidade_uf' => 'SP'],
            ['cidade_id' => 489, 'estado_id' => 13, 'cidade_nome' => 'Barão de Cocais', 'cidade_uf' => 'MG'],
            ['cidade_id' => 490, 'estado_id' => 21, 'cidade_nome' => 'Barão de Cotegipe', 'cidade_uf' => 'RS'],
            ['cidade_id' => 491, 'estado_id' => 10, 'cidade_nome' => 'Barão de Grajaú', 'cidade_uf' => 'MA'],
            ['cidade_id' => 492, 'estado_id' => 11, 'cidade_nome' => 'Barão de Melgaço', 'cidade_uf' => 'MT'],
            ['cidade_id' => 493, 'estado_id' => 13, 'cidade_nome' => 'Barão de Monte Alto', 'cidade_uf' => 'MG'],
            ['cidade_id' => 494, 'estado_id' => 21, 'cidade_nome' => 'Barão do Triunfo', 'cidade_uf' => 'RS'],
            ['cidade_id' => 495, 'estado_id' => 15, 'cidade_nome' => 'Baraúna', 'cidade_uf' => 'PB'],
            ['cidade_id' => 496, 'estado_id' => 20, 'cidade_nome' => 'Baraúna', 'cidade_uf' => 'RN'],
            ['cidade_id' => 497, 'estado_id' => 13, 'cidade_nome' => 'Barbacena', 'cidade_uf' => 'MG'],
            ['cidade_id' => 498, 'estado_id' => 6, 'cidade_nome' => 'Barbalha', 'cidade_uf' => 'CE'],
            ['cidade_id' => 499, 'estado_id' => 25, 'cidade_nome' => 'Barbosa', 'cidade_uf' => 'SP'],
            ['cidade_id' => 500, 'estado_id' => 16, 'cidade_nome' => 'Barbosa Ferraz', 'cidade_uf' => 'PR'],
            ['cidade_id' => 501, 'estado_id' => 14, 'cidade_nome' => 'Barcarena', 'cidade_uf' => 'PA'],
            ['cidade_id' => 502, 'estado_id' => 20, 'cidade_nome' => 'Barcelona', 'cidade_uf' => 'RN'],
            ['cidade_id' => 503, 'estado_id' => 4, 'cidade_nome' => 'Barcelos', 'cidade_uf' => 'AM'],
            ['cidade_id' => 504, 'estado_id' => 25, 'cidade_nome' => 'Bariri', 'cidade_uf' => 'SP'],
            ['cidade_id' => 505, 'estado_id' => 5, 'cidade_nome' => 'Barra', 'cidade_uf' => 'BA'],
            ['cidade_id' => 506, 'estado_id' => 24, 'cidade_nome' => 'Barra Bonita', 'cidade_uf' => 'SC'],
            ['cidade_id' => 507, 'estado_id' => 25, 'cidade_nome' => 'Barra Bonita', 'cidade_uf' => 'SP'],
            ['cidade_id' => 508, 'estado_id' => 5, 'cidade_nome' => 'Barra da Estiva', 'cidade_uf' => 'BA'],
            ['cidade_id' => 509, 'estado_id' => 18, 'cidade_nome' => 'Barra D\'Alcântara', 'cidade_uf' => 'PI'],
            ['cidade_id' => 510, 'estado_id' => 17, 'cidade_nome' => 'Barra de Guabiraba', 'cidade_uf' => 'PE'],
            ['cidade_id' => 511, 'estado_id' => 15, 'cidade_nome' => 'Barra de Santa Rosa', 'cidade_uf' => 'PB'],
            ['cidade_id' => 512, 'estado_id' => 15, 'cidade_nome' => 'Barra de Santana', 'cidade_uf' => 'PB'],
            ['cidade_id' => 513, 'estado_id' => 2, 'cidade_nome' => 'Barra de Santo Antônio', 'cidade_uf' => 'AL'],
            ['cidade_id' => 514, 'estado_id' => 8, 'cidade_nome' => 'Barra de São Francisco', 'cidade_uf' => 'ES'],
            ['cidade_id' => 515, 'estado_id' => 2, 'cidade_nome' => 'Barra de São Miguel', 'cidade_uf' => 'AL'],
            ['cidade_id' => 516, 'estado_id' => 15, 'cidade_nome' => 'Barra de São Miguel', 'cidade_uf' => 'PB'],
            ['cidade_id' => 517, 'estado_id' => 11, 'cidade_nome' => 'Barra do Bugres', 'cidade_uf' => 'MT'],
            ['cidade_id' => 518, 'estado_id' => 25, 'cidade_nome' => 'Barra do Chapéu', 'cidade_uf' => 'SP'],
            ['cidade_id' => 519, 'estado_id' => 5, 'cidade_nome' => 'Barra do Choça', 'cidade_uf' => 'BA'],
            ['cidade_id' => 520, 'estado_id' => 10, 'cidade_nome' => 'Barra do Corda', 'cidade_uf' => 'MA'],
            ['cidade_id' => 521, 'estado_id' => 11, 'cidade_nome' => 'Barra do Garças', 'cidade_uf' => 'MT'],
            ['cidade_id' => 522, 'estado_id' => 21, 'cidade_nome' => 'Barra do Guarita', 'cidade_uf' => 'RS'],
            ['cidade_id' => 523, 'estado_id' => 16, 'cidade_nome' => 'Barra do Jacaré', 'cidade_uf' => 'PR'],
            ['cidade_id' => 524, 'estado_id' => 5, 'cidade_nome' => 'Barra do Mendes', 'cidade_uf' => 'BA'],
            ['cidade_id' => 525, 'estado_id' => 27, 'cidade_nome' => 'Barra do Ouro', 'cidade_uf' => 'TO'],
            ['cidade_id' => 526, 'estado_id' => 19, 'cidade_nome' => 'Barra do Piraí', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 527, 'estado_id' => 21, 'cidade_nome' => 'Barra do Quaraí', 'cidade_uf' => 'RS'],
            ['cidade_id' => 528, 'estado_id' => 21, 'cidade_nome' => 'Barra do Ribeiro', 'cidade_uf' => 'RS'],
            ['cidade_id' => 529, 'estado_id' => 21, 'cidade_nome' => 'Barra do Rio Azul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 530, 'estado_id' => 5, 'cidade_nome' => 'Barra do Rocha', 'cidade_uf' => 'BA'],
            ['cidade_id' => 531, 'estado_id' => 25, 'cidade_nome' => 'Barra do Turvo', 'cidade_uf' => 'SP'],
            ['cidade_id' => 532, 'estado_id' => 26, 'cidade_nome' => 'Barra dos Coqueiros', 'cidade_uf' => 'SE'],
            ['cidade_id' => 533, 'estado_id' => 21, 'cidade_nome' => 'Barra Funda', 'cidade_uf' => 'RS'],
            ['cidade_id' => 534, 'estado_id' => 13, 'cidade_nome' => 'Barra Longa', 'cidade_uf' => 'MG'],
            ['cidade_id' => 535, 'estado_id' => 19, 'cidade_nome' => 'Barra Mansa', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 536, 'estado_id' => 24, 'cidade_nome' => 'Barra Velha', 'cidade_uf' => 'SC'],
            ['cidade_id' => 537, 'estado_id' => 16, 'cidade_nome' => 'Barracão', 'cidade_uf' => 'PR'],
            ['cidade_id' => 538, 'estado_id' => 21, 'cidade_nome' => 'Barracão', 'cidade_uf' => 'RS'],
            ['cidade_id' => 539, 'estado_id' => 18, 'cidade_nome' => 'Barras', 'cidade_uf' => 'PI'],
            ['cidade_id' => 540, 'estado_id' => 6, 'cidade_nome' => 'Barreira', 'cidade_uf' => 'CE'],
            ['cidade_id' => 541, 'estado_id' => 5, 'cidade_nome' => 'Barreiras', 'cidade_uf' => 'BA'],
            ['cidade_id' => 542, 'estado_id' => 18, 'cidade_nome' => 'Barreiras do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 543, 'estado_id' => 4, 'cidade_nome' => 'Barreirinha', 'cidade_uf' => 'AM'],
            ['cidade_id' => 544, 'estado_id' => 10, 'cidade_nome' => 'Barreirinhas', 'cidade_uf' => 'MA'],
            ['cidade_id' => 545, 'estado_id' => 17, 'cidade_nome' => 'Barreiros', 'cidade_uf' => 'PE'],
            ['cidade_id' => 546, 'estado_id' => 25, 'cidade_nome' => 'Barretos', 'cidade_uf' => 'SP'],
            ['cidade_id' => 547, 'estado_id' => 25, 'cidade_nome' => 'Barrinha', 'cidade_uf' => 'SP'],
            ['cidade_id' => 548, 'estado_id' => 6, 'cidade_nome' => 'Barro', 'cidade_uf' => 'CE'],
            ['cidade_id' => 549, 'estado_id' => 5, 'cidade_nome' => 'Barro Alto', 'cidade_uf' => 'BA'],
            ['cidade_id' => 550, 'estado_id' => 9, 'cidade_nome' => 'Barro Alto', 'cidade_uf' => 'GO'],
            ['cidade_id' => 551, 'estado_id' => 18, 'cidade_nome' => 'Barro Duro', 'cidade_uf' => 'PI'],
            ['cidade_id' => 552, 'estado_id' => 5, 'cidade_nome' => 'Barro Preto', 'cidade_uf' => 'BA'],
            ['cidade_id' => 553, 'estado_id' => 5, 'cidade_nome' => 'Barrocas', 'cidade_uf' => 'BA'],
            ['cidade_id' => 554, 'estado_id' => 27, 'cidade_nome' => 'Barrolândia', 'cidade_uf' => 'TO'],
            ['cidade_id' => 555, 'estado_id' => 6, 'cidade_nome' => 'Barroquinha', 'cidade_uf' => 'CE'],
            ['cidade_id' => 556, 'estado_id' => 21, 'cidade_nome' => 'Barros Cassal', 'cidade_uf' => 'RS'],
            ['cidade_id' => 557, 'estado_id' => 13, 'cidade_nome' => 'Barroso', 'cidade_uf' => 'MG'],
            ['cidade_id' => 558, 'estado_id' => 25, 'cidade_nome' => 'Barueri', 'cidade_uf' => 'SP'],
            ['cidade_id' => 559, 'estado_id' => 25, 'cidade_nome' => 'Bastos', 'cidade_uf' => 'SP'],
            ['cidade_id' => 560, 'estado_id' => 12, 'cidade_nome' => 'Bataguassu', 'cidade_uf' => 'MS'],
            ['cidade_id' => 561, 'estado_id' => 2, 'cidade_nome' => 'Batalha', 'cidade_uf' => 'AL'],
            ['cidade_id' => 562, 'estado_id' => 18, 'cidade_nome' => 'Batalha', 'cidade_uf' => 'PI'],
            ['cidade_id' => 563, 'estado_id' => 25, 'cidade_nome' => 'Batatais', 'cidade_uf' => 'SP'],
            ['cidade_id' => 564, 'estado_id' => 12, 'cidade_nome' => 'Batayporã', 'cidade_uf' => 'MS'],
            ['cidade_id' => 565, 'estado_id' => 6, 'cidade_nome' => 'Baturité', 'cidade_uf' => 'CE'],
            ['cidade_id' => 566, 'estado_id' => 25, 'cidade_nome' => 'Bauru', 'cidade_uf' => 'SP'],
            ['cidade_id' => 567, 'estado_id' => 15, 'cidade_nome' => 'Bayeux', 'cidade_uf' => 'PB'],
            ['cidade_id' => 568, 'estado_id' => 25, 'cidade_nome' => 'Bebedouro', 'cidade_uf' => 'SP'],
            ['cidade_id' => 569, 'estado_id' => 6, 'cidade_nome' => 'Beberibe', 'cidade_uf' => 'CE'],
            ['cidade_id' => 570, 'estado_id' => 6, 'cidade_nome' => 'Bela Cruz', 'cidade_uf' => 'CE'],
            ['cidade_id' => 571, 'estado_id' => 12, 'cidade_nome' => 'Bela Vista', 'cidade_uf' => 'MS'],
            ['cidade_id' => 572, 'estado_id' => 16, 'cidade_nome' => 'Bela Vista da Caroba', 'cidade_uf' => 'PR'],
            ['cidade_id' => 573, 'estado_id' => 9, 'cidade_nome' => 'Bela Vista de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 574, 'estado_id' => 13, 'cidade_nome' => 'Bela Vista de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 575, 'estado_id' => 10, 'cidade_nome' => 'Bela Vista do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 576, 'estado_id' => 16, 'cidade_nome' => 'Bela Vista do Paraíso', 'cidade_uf' => 'PR'],
            ['cidade_id' => 577, 'estado_id' => 18, 'cidade_nome' => 'Bela Vista do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 578, 'estado_id' => 24, 'cidade_nome' => 'Bela Vista do Toldo', 'cidade_uf' => 'SC'],
            ['cidade_id' => 579, 'estado_id' => 10, 'cidade_nome' => 'Belágua', 'cidade_uf' => 'MA'],
            ['cidade_id' => 580, 'estado_id' => 2, 'cidade_nome' => 'Belém', 'cidade_uf' => 'AL'],
            ['cidade_id' => 581, 'estado_id' => 14, 'cidade_nome' => 'Belém', 'cidade_uf' => 'PA'],
            ['cidade_id' => 582, 'estado_id' => 15, 'cidade_nome' => 'Belém', 'cidade_uf' => 'PB'],
            ['cidade_id' => 583, 'estado_id' => 17, 'cidade_nome' => 'Belém de Maria', 'cidade_uf' => 'PE'],
            ['cidade_id' => 584, 'estado_id' => 15, 'cidade_nome' => 'Belém do Brejo do Cruz', 'cidade_uf' => 'PB'],
            ['cidade_id' => 585, 'estado_id' => 18, 'cidade_nome' => 'Belém do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 586, 'estado_id' => 17, 'cidade_nome' => 'Belém do São Francisco', 'cidade_uf' => 'PE'],
            ['cidade_id' => 587, 'estado_id' => 19, 'cidade_nome' => 'Belford Roxo', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 588, 'estado_id' => 13, 'cidade_nome' => 'Belmiro Braga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 589, 'estado_id' => 5, 'cidade_nome' => 'Belmonte', 'cidade_uf' => 'BA'],
            ['cidade_id' => 590, 'estado_id' => 24, 'cidade_nome' => 'Belmonte', 'cidade_uf' => 'SC'],
            ['cidade_id' => 591, 'estado_id' => 5, 'cidade_nome' => 'Belo Campo', 'cidade_uf' => 'BA'],
            ['cidade_id' => 592, 'estado_id' => 13, 'cidade_nome' => 'Belo Horizonte', 'cidade_uf' => 'MG'],
            ['cidade_id' => 593, 'estado_id' => 17, 'cidade_nome' => 'Belo Jardim', 'cidade_uf' => 'PE'],
            ['cidade_id' => 594, 'estado_id' => 2, 'cidade_nome' => 'Belo Monte', 'cidade_uf' => 'AL'],
            ['cidade_id' => 595, 'estado_id' => 13, 'cidade_nome' => 'Belo Oriente', 'cidade_uf' => 'MG'],
            ['cidade_id' => 596, 'estado_id' => 13, 'cidade_nome' => 'Belo Vale', 'cidade_uf' => 'MG'],
            ['cidade_id' => 597, 'estado_id' => 14, 'cidade_nome' => 'Belterra', 'cidade_uf' => 'PA'],
            ['cidade_id' => 598, 'estado_id' => 18, 'cidade_nome' => 'Beneditinos', 'cidade_uf' => 'PI'],
            ['cidade_id' => 599, 'estado_id' => 10, 'cidade_nome' => 'Benedito Leite', 'cidade_uf' => 'MA'],
            ['cidade_id' => 600, 'estado_id' => 24, 'cidade_nome' => 'Benedito Novo', 'cidade_uf' => 'SC'],
            ['cidade_id' => 601, 'estado_id' => 14, 'cidade_nome' => 'Benevides', 'cidade_uf' => 'PA'],
            ['cidade_id' => 602, 'estado_id' => 4, 'cidade_nome' => 'Benjamin Constant', 'cidade_uf' => 'AM'],
            ['cidade_id' => 603, 'estado_id' => 21, 'cidade_nome' => 'Benjamin Constant do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 604, 'estado_id' => 25, 'cidade_nome' => 'Bento de Abreu', 'cidade_uf' => 'SP'],
            ['cidade_id' => 605, 'estado_id' => 20, 'cidade_nome' => 'Bento Fernandes', 'cidade_uf' => 'RN'],
            ['cidade_id' => 606, 'estado_id' => 21, 'cidade_nome' => 'Bento Gonçalves', 'cidade_uf' => 'RS'],
            ['cidade_id' => 607, 'estado_id' => 10, 'cidade_nome' => 'Bequimão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 608, 'estado_id' => 13, 'cidade_nome' => 'Berilo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 609, 'estado_id' => 13, 'cidade_nome' => 'Berizal', 'cidade_uf' => 'MG'],
            ['cidade_id' => 610, 'estado_id' => 15, 'cidade_nome' => 'Bernardino Batista', 'cidade_uf' => 'PB'],
            ['cidade_id' => 611, 'estado_id' => 25, 'cidade_nome' => 'Bernardino de Campos', 'cidade_uf' => 'SP'],
            ['cidade_id' => 612, 'estado_id' => 10, 'cidade_nome' => 'Bernardo do Mearim', 'cidade_uf' => 'MA'],
            ['cidade_id' => 613, 'estado_id' => 27, 'cidade_nome' => 'Bernardo Sayão', 'cidade_uf' => 'TO'],
            ['cidade_id' => 614, 'estado_id' => 25, 'cidade_nome' => 'Bertioga', 'cidade_uf' => 'SP'],
            ['cidade_id' => 615, 'estado_id' => 18, 'cidade_nome' => 'Bertolínia', 'cidade_uf' => 'PI'],
            ['cidade_id' => 616, 'estado_id' => 13, 'cidade_nome' => 'Bertópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 617, 'estado_id' => 4, 'cidade_nome' => 'Beruri', 'cidade_uf' => 'AM'],
            ['cidade_id' => 618, 'estado_id' => 17, 'cidade_nome' => 'Betânia', 'cidade_uf' => 'PE'],
            ['cidade_id' => 619, 'estado_id' => 18, 'cidade_nome' => 'Betânia do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 620, 'estado_id' => 13, 'cidade_nome' => 'Betim', 'cidade_uf' => 'MG'],
            ['cidade_id' => 621, 'estado_id' => 17, 'cidade_nome' => 'Bezerros', 'cidade_uf' => 'PE'],
            ['cidade_id' => 622, 'estado_id' => 13, 'cidade_nome' => 'Bias Fortes', 'cidade_uf' => 'MG'],
            ['cidade_id' => 623, 'estado_id' => 13, 'cidade_nome' => 'Bicas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 624, 'estado_id' => 24, 'cidade_nome' => 'Biguaçu', 'cidade_uf' => 'SC'],
            ['cidade_id' => 625, 'estado_id' => 25, 'cidade_nome' => 'Bilac', 'cidade_uf' => 'SP'],
            ['cidade_id' => 626, 'estado_id' => 13, 'cidade_nome' => 'Biquinhas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 627, 'estado_id' => 25, 'cidade_nome' => 'Birigui', 'cidade_uf' => 'SP'],
            ['cidade_id' => 628, 'estado_id' => 25, 'cidade_nome' => 'Biritiba-Mirim', 'cidade_uf' => 'SP'],
            ['cidade_id' => 629, 'estado_id' => 5, 'cidade_nome' => 'Biritinga', 'cidade_uf' => 'BA'],
            ['cidade_id' => 630, 'estado_id' => 16, 'cidade_nome' => 'Bituruna', 'cidade_uf' => 'PR'],
            ['cidade_id' => 631, 'estado_id' => 24, 'cidade_nome' => 'Blumenau', 'cidade_uf' => 'SC'],
            ['cidade_id' => 632, 'estado_id' => 8, 'cidade_nome' => 'Boa Esperança', 'cidade_uf' => 'ES'],
            ['cidade_id' => 633, 'estado_id' => 13, 'cidade_nome' => 'Boa Esperança', 'cidade_uf' => 'MG'],
            ['cidade_id' => 634, 'estado_id' => 16, 'cidade_nome' => 'Boa Esperança', 'cidade_uf' => 'PR'],
            ['cidade_id' => 635, 'estado_id' => 16, 'cidade_nome' => 'Boa Esperança do Iguaçu', 'cidade_uf' => 'PR'],
            ['cidade_id' => 636, 'estado_id' => 25, 'cidade_nome' => 'Boa Esperança do Sul', 'cidade_uf' => 'SP'],
            ['cidade_id' => 637, 'estado_id' => 18, 'cidade_nome' => 'Boa Hora', 'cidade_uf' => 'PI'],
            ['cidade_id' => 638, 'estado_id' => 5, 'cidade_nome' => 'Boa Nova', 'cidade_uf' => 'BA'],
            ['cidade_id' => 639, 'estado_id' => 15, 'cidade_nome' => 'Boa Ventura', 'cidade_uf' => 'PB'],
            ['cidade_id' => 640, 'estado_id' => 16, 'cidade_nome' => 'Boa Ventura de São Roque', 'cidade_uf' => 'PR'],
            ['cidade_id' => 641, 'estado_id' => 6, 'cidade_nome' => 'Boa Viagem', 'cidade_uf' => 'CE'],
            ['cidade_id' => 642, 'estado_id' => 15, 'cidade_nome' => 'Boa Vista', 'cidade_uf' => 'PB'],
            ['cidade_id' => 643, 'estado_id' => 23, 'cidade_nome' => 'Boa Vista', 'cidade_uf' => 'RR'],
            ['cidade_id' => 644, 'estado_id' => 16, 'cidade_nome' => 'Boa Vista da Aparecida', 'cidade_uf' => 'PR'],
            ['cidade_id' => 645, 'estado_id' => 21, 'cidade_nome' => 'Boa Vista das Missões', 'cidade_uf' => 'RS'],
            ['cidade_id' => 646, 'estado_id' => 21, 'cidade_nome' => 'Boa Vista do Buricá', 'cidade_uf' => 'RS'],
            ['cidade_id' => 647, 'estado_id' => 21, 'cidade_nome' => 'Boa Vista do Cadeado', 'cidade_uf' => 'RS'],
            ['cidade_id' => 648, 'estado_id' => 10, 'cidade_nome' => 'Boa Vista do Gurupi', 'cidade_uf' => 'MA'],
            ['cidade_id' => 649, 'estado_id' => 21, 'cidade_nome' => 'Boa Vista do Incra', 'cidade_uf' => 'RS'],
            ['cidade_id' => 650, 'estado_id' => 4, 'cidade_nome' => 'Boa Vista do Ramos', 'cidade_uf' => 'AM'],
            ['cidade_id' => 651, 'estado_id' => 21, 'cidade_nome' => 'Boa Vista do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 652, 'estado_id' => 5, 'cidade_nome' => 'Boa Vista do Tupim', 'cidade_uf' => 'BA'],
            ['cidade_id' => 653, 'estado_id' => 2, 'cidade_nome' => 'Boca da Mata', 'cidade_uf' => 'AL'],
            ['cidade_id' => 654, 'estado_id' => 4, 'cidade_nome' => 'Boca do Acre', 'cidade_uf' => 'AM'],
            ['cidade_id' => 655, 'estado_id' => 18, 'cidade_nome' => 'Bocaina', 'cidade_uf' => 'PI'],
            ['cidade_id' => 656, 'estado_id' => 25, 'cidade_nome' => 'Bocaina', 'cidade_uf' => 'SP'],
            ['cidade_id' => 657, 'estado_id' => 13, 'cidade_nome' => 'Bocaina de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 658, 'estado_id' => 24, 'cidade_nome' => 'Bocaina do Sul', 'cidade_uf' => 'SC'],
            ['cidade_id' => 659, 'estado_id' => 13, 'cidade_nome' => 'Bocaiúva', 'cidade_uf' => 'MG'],
            ['cidade_id' => 660, 'estado_id' => 16, 'cidade_nome' => 'Bocaiúva do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 661, 'estado_id' => 20, 'cidade_nome' => 'Bodó', 'cidade_uf' => 'RN'],
            ['cidade_id' => 662, 'estado_id' => 17, 'cidade_nome' => 'Bodocó', 'cidade_uf' => 'PE'],
            ['cidade_id' => 663, 'estado_id' => 12, 'cidade_nome' => 'Bodoquena', 'cidade_uf' => 'MS'],
            ['cidade_id' => 664, 'estado_id' => 25, 'cidade_nome' => 'Bofete', 'cidade_uf' => 'SP'],
            ['cidade_id' => 665, 'estado_id' => 25, 'cidade_nome' => 'Boituva', 'cidade_uf' => 'SP'],
            ['cidade_id' => 666, 'estado_id' => 17, 'cidade_nome' => 'Bom Conselho', 'cidade_uf' => 'PE'],
            ['cidade_id' => 667, 'estado_id' => 13, 'cidade_nome' => 'Bom Despacho', 'cidade_uf' => 'MG'],
            ['cidade_id' => 668, 'estado_id' => 10, 'cidade_nome' => 'Bom Jardim', 'cidade_uf' => 'MA'],
            ['cidade_id' => 669, 'estado_id' => 17, 'cidade_nome' => 'Bom Jardim', 'cidade_uf' => 'PE'],
            ['cidade_id' => 670, 'estado_id' => 19, 'cidade_nome' => 'Bom Jardim', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 671, 'estado_id' => 24, 'cidade_nome' => 'Bom Jardim da Serra', 'cidade_uf' => 'SC'],
            ['cidade_id' => 672, 'estado_id' => 9, 'cidade_nome' => 'Bom Jardim de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 673, 'estado_id' => 13, 'cidade_nome' => 'Bom Jardim de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 674, 'estado_id' => 15, 'cidade_nome' => 'Bom Jesus', 'cidade_uf' => 'PB'],
            ['cidade_id' => 675, 'estado_id' => 18, 'cidade_nome' => 'Bom Jesus', 'cidade_uf' => 'PI'],
            ['cidade_id' => 676, 'estado_id' => 20, 'cidade_nome' => 'Bom Jesus', 'cidade_uf' => 'RN'],
            ['cidade_id' => 677, 'estado_id' => 21, 'cidade_nome' => 'Bom Jesus', 'cidade_uf' => 'RS'],
            ['cidade_id' => 678, 'estado_id' => 24, 'cidade_nome' => 'Bom Jesus', 'cidade_uf' => 'SC'],
            ['cidade_id' => 679, 'estado_id' => 5, 'cidade_nome' => 'Bom Jesus da Lapa', 'cidade_uf' => 'BA'],
            ['cidade_id' => 680, 'estado_id' => 13, 'cidade_nome' => 'Bom Jesus da Penha', 'cidade_uf' => 'MG'],
            ['cidade_id' => 681, 'estado_id' => 5, 'cidade_nome' => 'Bom Jesus da Serra', 'cidade_uf' => 'BA'],
            ['cidade_id' => 682, 'estado_id' => 10, 'cidade_nome' => 'Bom Jesus das Selvas', 'cidade_uf' => 'MA'],
            ['cidade_id' => 683, 'estado_id' => 9, 'cidade_nome' => 'Bom Jesus de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 684, 'estado_id' => 13, 'cidade_nome' => 'Bom Jesus do Amparo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 685, 'estado_id' => 11, 'cidade_nome' => 'Bom Jesus do Araguaia', 'cidade_uf' => 'MT'],
            ['cidade_id' => 686, 'estado_id' => 13, 'cidade_nome' => 'Bom Jesus do Galho', 'cidade_uf' => 'MG'],
            ['cidade_id' => 687, 'estado_id' => 19, 'cidade_nome' => 'Bom Jesus do Itabapoana', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 688, 'estado_id' => 8, 'cidade_nome' => 'Bom Jesus do Norte', 'cidade_uf' => 'ES'],
            ['cidade_id' => 689, 'estado_id' => 24, 'cidade_nome' => 'Bom Jesus do Oeste', 'cidade_uf' => 'SC'],
            ['cidade_id' => 690, 'estado_id' => 16, 'cidade_nome' => 'Bom Jesus do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 691, 'estado_id' => 14, 'cidade_nome' => 'Bom Jesus do Tocantins', 'cidade_uf' => 'PA'],
            ['cidade_id' => 692, 'estado_id' => 27, 'cidade_nome' => 'Bom Jesus do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 693, 'estado_id' => 25, 'cidade_nome' => 'Bom Jesus dos Perdões', 'cidade_uf' => 'SP'],
            ['cidade_id' => 694, 'estado_id' => 10, 'cidade_nome' => 'Bom Lugar', 'cidade_uf' => 'MA'],
            ['cidade_id' => 695, 'estado_id' => 21, 'cidade_nome' => 'Bom Princípio', 'cidade_uf' => 'RS'],
            ['cidade_id' => 696, 'estado_id' => 18, 'cidade_nome' => 'Bom Princípio do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 697, 'estado_id' => 21, 'cidade_nome' => 'Bom Progresso', 'cidade_uf' => 'RS'],
            ['cidade_id' => 698, 'estado_id' => 13, 'cidade_nome' => 'Bom Repouso', 'cidade_uf' => 'MG'],
            ['cidade_id' => 699, 'estado_id' => 24, 'cidade_nome' => 'Bom Retiro', 'cidade_uf' => 'SC'],
            ['cidade_id' => 700, 'estado_id' => 21, 'cidade_nome' => 'Bom Retiro do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 701, 'estado_id' => 13, 'cidade_nome' => 'Bom Sucesso', 'cidade_uf' => 'MG'],
            ['cidade_id' => 702, 'estado_id' => 15, 'cidade_nome' => 'Bom Sucesso', 'cidade_uf' => 'PB'],
            ['cidade_id' => 703, 'estado_id' => 16, 'cidade_nome' => 'Bom Sucesso', 'cidade_uf' => 'PR'],
            ['cidade_id' => 704, 'estado_id' => 25, 'cidade_nome' => 'Bom Sucesso de Itararé', 'cidade_uf' => 'SP'],
            ['cidade_id' => 705, 'estado_id' => 16, 'cidade_nome' => 'Bom Sucesso do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 706, 'estado_id' => 24, 'cidade_nome' => 'Bombinhas', 'cidade_uf' => 'SC'],
            ['cidade_id' => 707, 'estado_id' => 13, 'cidade_nome' => 'Bonfim', 'cidade_uf' => 'MG'],
            ['cidade_id' => 708, 'estado_id' => 23, 'cidade_nome' => 'Bonfim', 'cidade_uf' => 'RR'],
            ['cidade_id' => 709, 'estado_id' => 18, 'cidade_nome' => 'Bonfim do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 710, 'estado_id' => 9, 'cidade_nome' => 'Bonfinópolis', 'cidade_uf' => 'GO'],
            ['cidade_id' => 711, 'estado_id' => 13, 'cidade_nome' => 'Bonfinópolis de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 712, 'estado_id' => 5, 'cidade_nome' => 'Boninal', 'cidade_uf' => 'BA'],
            ['cidade_id' => 713, 'estado_id' => 5, 'cidade_nome' => 'Bonito', 'cidade_uf' => 'BA'],
            ['cidade_id' => 714, 'estado_id' => 12, 'cidade_nome' => 'Bonito', 'cidade_uf' => 'MS'],
            ['cidade_id' => 715, 'estado_id' => 14, 'cidade_nome' => 'Bonito', 'cidade_uf' => 'PA'],
            ['cidade_id' => 716, 'estado_id' => 17, 'cidade_nome' => 'Bonito', 'cidade_uf' => 'PE'],
            ['cidade_id' => 717, 'estado_id' => 13, 'cidade_nome' => 'Bonito de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 718, 'estado_id' => 15, 'cidade_nome' => 'Bonito de Santa Fé', 'cidade_uf' => 'PB'],
            ['cidade_id' => 719, 'estado_id' => 9, 'cidade_nome' => 'Bonópolis', 'cidade_uf' => 'GO'],
            ['cidade_id' => 720, 'estado_id' => 15, 'cidade_nome' => 'Boqueirão', 'cidade_uf' => 'PB'],
            ['cidade_id' => 721, 'estado_id' => 21, 'cidade_nome' => 'Boqueirão do Leão', 'cidade_uf' => 'RS'],
            ['cidade_id' => 722, 'estado_id' => 18, 'cidade_nome' => 'Boqueirão do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 723, 'estado_id' => 26, 'cidade_nome' => 'Boquim', 'cidade_uf' => 'SE'],
            ['cidade_id' => 724, 'estado_id' => 5, 'cidade_nome' => 'Boquira', 'cidade_uf' => 'BA'],
            ['cidade_id' => 725, 'estado_id' => 25, 'cidade_nome' => 'Borá', 'cidade_uf' => 'SP'],
            ['cidade_id' => 726, 'estado_id' => 25, 'cidade_nome' => 'Boracéia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 727, 'estado_id' => 4, 'cidade_nome' => 'Borba', 'cidade_uf' => 'AM'],
            ['cidade_id' => 728, 'estado_id' => 15, 'cidade_nome' => 'Borborema', 'cidade_uf' => 'PB'],
            ['cidade_id' => 729, 'estado_id' => 25, 'cidade_nome' => 'Borborema', 'cidade_uf' => 'SP'],
            ['cidade_id' => 730, 'estado_id' => 13, 'cidade_nome' => 'Borda da Mata', 'cidade_uf' => 'MG'],
            ['cidade_id' => 731, 'estado_id' => 25, 'cidade_nome' => 'Borebi', 'cidade_uf' => 'SP'],
            ['cidade_id' => 732, 'estado_id' => 16, 'cidade_nome' => 'Borrazópolis', 'cidade_uf' => 'PR'],
            ['cidade_id' => 733, 'estado_id' => 21, 'cidade_nome' => 'Bossoroca', 'cidade_uf' => 'RS'],
            ['cidade_id' => 734, 'estado_id' => 13, 'cidade_nome' => 'Botelhos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 735, 'estado_id' => 25, 'cidade_nome' => 'Botucatu', 'cidade_uf' => 'SP'],
            ['cidade_id' => 736, 'estado_id' => 13, 'cidade_nome' => 'Botumirim', 'cidade_uf' => 'MG'],
            ['cidade_id' => 737, 'estado_id' => 5, 'cidade_nome' => 'Botuporã', 'cidade_uf' => 'BA'],
            ['cidade_id' => 738, 'estado_id' => 24, 'cidade_nome' => 'Botuverá', 'cidade_uf' => 'SC'],
            ['cidade_id' => 739, 'estado_id' => 21, 'cidade_nome' => 'Bozano', 'cidade_uf' => 'RS'],
            ['cidade_id' => 740, 'estado_id' => 24, 'cidade_nome' => 'Braço do Norte', 'cidade_uf' => 'SC'],
            ['cidade_id' => 741, 'estado_id' => 24, 'cidade_nome' => 'Braço do Trombudo', 'cidade_uf' => 'SC'],
            ['cidade_id' => 742, 'estado_id' => 21, 'cidade_nome' => 'Braga', 'cidade_uf' => 'RS'],
            ['cidade_id' => 743, 'estado_id' => 14, 'cidade_nome' => 'Bragança', 'cidade_uf' => 'PA'],
            ['cidade_id' => 744, 'estado_id' => 25, 'cidade_nome' => 'Bragança Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 745, 'estado_id' => 16, 'cidade_nome' => 'Braganey', 'cidade_uf' => 'PR'],
            ['cidade_id' => 746, 'estado_id' => 2, 'cidade_nome' => 'Branquinha', 'cidade_uf' => 'AL'],
            ['cidade_id' => 747, 'estado_id' => 13, 'cidade_nome' => 'Brás Pires', 'cidade_uf' => 'MG'],
            ['cidade_id' => 748, 'estado_id' => 14, 'cidade_nome' => 'Brasil Novo', 'cidade_uf' => 'PA'],
            ['cidade_id' => 749, 'estado_id' => 12, 'cidade_nome' => 'Brasilândia', 'cidade_uf' => 'MS'],
            ['cidade_id' => 750, 'estado_id' => 13, 'cidade_nome' => 'Brasilândia de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 751, 'estado_id' => 16, 'cidade_nome' => 'Brasilândia do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 752, 'estado_id' => 27, 'cidade_nome' => 'Brasilândia do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 753, 'estado_id' => 1, 'cidade_nome' => 'Brasiléia', 'cidade_uf' => 'AC'],
            ['cidade_id' => 754, 'estado_id' => 18, 'cidade_nome' => 'Brasileira', 'cidade_uf' => 'PI'],
            ['cidade_id' => 755, 'estado_id' => 7, 'cidade_nome' => 'Brasília', 'cidade_uf' => 'DF'],
            ['cidade_id' => 756, 'estado_id' => 13, 'cidade_nome' => 'Brasília de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 757, 'estado_id' => 11, 'cidade_nome' => 'Brasnorte', 'cidade_uf' => 'MT'],
            ['cidade_id' => 758, 'estado_id' => 13, 'cidade_nome' => 'Brasópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 759, 'estado_id' => 25, 'cidade_nome' => 'Braúna', 'cidade_uf' => 'SP'],
            ['cidade_id' => 760, 'estado_id' => 13, 'cidade_nome' => 'Braúnas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 761, 'estado_id' => 9, 'cidade_nome' => 'Brazabrantes', 'cidade_uf' => 'GO'],
            ['cidade_id' => 762, 'estado_id' => 17, 'cidade_nome' => 'Brejão', 'cidade_uf' => 'PE'],
            ['cidade_id' => 763, 'estado_id' => 8, 'cidade_nome' => 'Brejetuba', 'cidade_uf' => 'ES'],
            ['cidade_id' => 764, 'estado_id' => 17, 'cidade_nome' => 'Brejinho', 'cidade_uf' => 'PE'],
            ['cidade_id' => 765, 'estado_id' => 20, 'cidade_nome' => 'Brejinho', 'cidade_uf' => 'RN'],
            ['cidade_id' => 766, 'estado_id' => 27, 'cidade_nome' => 'Brejinho de Nazaré', 'cidade_uf' => 'TO'],
            ['cidade_id' => 767, 'estado_id' => 10, 'cidade_nome' => 'Brejo', 'cidade_uf' => 'MA'],
            ['cidade_id' => 768, 'estado_id' => 25, 'cidade_nome' => 'Brejo Alegre', 'cidade_uf' => 'SP'],
            ['cidade_id' => 769, 'estado_id' => 17, 'cidade_nome' => 'Brejo da Madre de Deus', 'cidade_uf' => 'PE'],
            ['cidade_id' => 770, 'estado_id' => 10, 'cidade_nome' => 'Brejo de Areia', 'cidade_uf' => 'MA'],
            ['cidade_id' => 771, 'estado_id' => 15, 'cidade_nome' => 'Brejo do Cruz', 'cidade_uf' => 'PB'],
            ['cidade_id' => 772, 'estado_id' => 18, 'cidade_nome' => 'Brejo do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 773, 'estado_id' => 15, 'cidade_nome' => 'Brejo dos Santos', 'cidade_uf' => 'PB'],
            ['cidade_id' => 774, 'estado_id' => 26, 'cidade_nome' => 'Brejo Grande', 'cidade_uf' => 'SE'],
            ['cidade_id' => 775, 'estado_id' => 14, 'cidade_nome' => 'Brejo Grande do Araguaia', 'cidade_uf' => 'PA'],
            ['cidade_id' => 776, 'estado_id' => 6, 'cidade_nome' => 'Brejo Santo', 'cidade_uf' => 'CE'],
            ['cidade_id' => 777, 'estado_id' => 5, 'cidade_nome' => 'Brejões', 'cidade_uf' => 'BA'],
            ['cidade_id' => 778, 'estado_id' => 5, 'cidade_nome' => 'Brejolândia', 'cidade_uf' => 'BA'],
            ['cidade_id' => 779, 'estado_id' => 14, 'cidade_nome' => 'Breu Branco', 'cidade_uf' => 'PA'],
            ['cidade_id' => 780, 'estado_id' => 14, 'cidade_nome' => 'Breves', 'cidade_uf' => 'PA'],
            ['cidade_id' => 781, 'estado_id' => 9, 'cidade_nome' => 'Britânia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 782, 'estado_id' => 21, 'cidade_nome' => 'Brochier', 'cidade_uf' => 'RS'],
            ['cidade_id' => 783, 'estado_id' => 25, 'cidade_nome' => 'Brodowski', 'cidade_uf' => 'SP'],
            ['cidade_id' => 784, 'estado_id' => 25, 'cidade_nome' => 'Brotas', 'cidade_uf' => 'SP'],
            ['cidade_id' => 785, 'estado_id' => 5, 'cidade_nome' => 'Brotas de Macaúbas', 'cidade_uf' => 'BA'],
            ['cidade_id' => 786, 'estado_id' => 13, 'cidade_nome' => 'Brumadinho', 'cidade_uf' => 'MG'],
            ['cidade_id' => 787, 'estado_id' => 5, 'cidade_nome' => 'Brumado', 'cidade_uf' => 'BA'],
            ['cidade_id' => 788, 'estado_id' => 24, 'cidade_nome' => 'Brunópolis', 'cidade_uf' => 'SC'],
            ['cidade_id' => 789, 'estado_id' => 24, 'cidade_nome' => 'Brusque', 'cidade_uf' => 'SC'],
            ['cidade_id' => 790, 'estado_id' => 13, 'cidade_nome' => 'Bueno Brandão', 'cidade_uf' => 'MG'],
            ['cidade_id' => 791, 'estado_id' => 13, 'cidade_nome' => 'Buenópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 792, 'estado_id' => 17, 'cidade_nome' => 'Buenos Aires', 'cidade_uf' => 'PE'],
            ['cidade_id' => 793, 'estado_id' => 5, 'cidade_nome' => 'Buerarema', 'cidade_uf' => 'BA'],
            ['cidade_id' => 794, 'estado_id' => 13, 'cidade_nome' => 'Bugre', 'cidade_uf' => 'MG'],
            ['cidade_id' => 795, 'estado_id' => 17, 'cidade_nome' => 'Buíque', 'cidade_uf' => 'PE'],
            ['cidade_id' => 796, 'estado_id' => 1, 'cidade_nome' => 'Bujari', 'cidade_uf' => 'AC'],
            ['cidade_id' => 797, 'estado_id' => 14, 'cidade_nome' => 'Bujaru', 'cidade_uf' => 'PA'],
            ['cidade_id' => 798, 'estado_id' => 25, 'cidade_nome' => 'Buri', 'cidade_uf' => 'SP'],
            ['cidade_id' => 799, 'estado_id' => 25, 'cidade_nome' => 'Buritama', 'cidade_uf' => 'SP'],
            ['cidade_id' => 800, 'estado_id' => 10, 'cidade_nome' => 'Buriti', 'cidade_uf' => 'MA'],
            ['cidade_id' => 801, 'estado_id' => 9, 'cidade_nome' => 'Buriti Alegre', 'cidade_uf' => 'GO'],
            ['cidade_id' => 802, 'estado_id' => 10, 'cidade_nome' => 'Buriti Bravo', 'cidade_uf' => 'MA'],
            ['cidade_id' => 803, 'estado_id' => 9, 'cidade_nome' => 'Buriti de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 804, 'estado_id' => 27, 'cidade_nome' => 'Buriti do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 805, 'estado_id' => 18, 'cidade_nome' => 'Buriti dos Lopes', 'cidade_uf' => 'PI'],
            ['cidade_id' => 806, 'estado_id' => 18, 'cidade_nome' => 'Buriti dos Montes', 'cidade_uf' => 'PI'],
            ['cidade_id' => 807, 'estado_id' => 10, 'cidade_nome' => 'Buriticupu', 'cidade_uf' => 'MA'],
            ['cidade_id' => 808, 'estado_id' => 9, 'cidade_nome' => 'Buritinópolis', 'cidade_uf' => 'GO'],
            ['cidade_id' => 809, 'estado_id' => 5, 'cidade_nome' => 'Buritirama', 'cidade_uf' => 'BA'],
            ['cidade_id' => 810, 'estado_id' => 10, 'cidade_nome' => 'Buritirana', 'cidade_uf' => 'MA'],
            ['cidade_id' => 811, 'estado_id' => 13, 'cidade_nome' => 'Buritis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 812, 'estado_id' => 22, 'cidade_nome' => 'Buritis', 'cidade_uf' => 'RO'],
            ['cidade_id' => 813, 'estado_id' => 25, 'cidade_nome' => 'Buritizal', 'cidade_uf' => 'SP'],
            ['cidade_id' => 814, 'estado_id' => 13, 'cidade_nome' => 'Buritizeiro', 'cidade_uf' => 'MG'],
            ['cidade_id' => 815, 'estado_id' => 21, 'cidade_nome' => 'Butiá', 'cidade_uf' => 'RS'],
            ['cidade_id' => 816, 'estado_id' => 4, 'cidade_nome' => 'Caapiranga', 'cidade_uf' => 'AM'],
            ['cidade_id' => 817, 'estado_id' => 15, 'cidade_nome' => 'Caaporã', 'cidade_uf' => 'PB'],
            ['cidade_id' => 818, 'estado_id' => 12, 'cidade_nome' => 'Caarapó', 'cidade_uf' => 'MS'],
            ['cidade_id' => 819, 'estado_id' => 5, 'cidade_nome' => 'Caatiba', 'cidade_uf' => 'BA'],
            ['cidade_id' => 820, 'estado_id' => 15, 'cidade_nome' => 'Cabaceiras', 'cidade_uf' => 'PB'],
            ['cidade_id' => 821, 'estado_id' => 5, 'cidade_nome' => 'Cabaceiras do Paraguaçu', 'cidade_uf' => 'BA'],
            ['cidade_id' => 822, 'estado_id' => 13, 'cidade_nome' => 'Cabeceira Grande', 'cidade_uf' => 'MG'],
            ['cidade_id' => 823, 'estado_id' => 9, 'cidade_nome' => 'Cabeceiras', 'cidade_uf' => 'GO'],
            ['cidade_id' => 824, 'estado_id' => 18, 'cidade_nome' => 'Cabeceiras do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 825, 'estado_id' => 15, 'cidade_nome' => 'Cabedelo', 'cidade_uf' => 'PB'],
            ['cidade_id' => 826, 'estado_id' => 22, 'cidade_nome' => 'Cabixi', 'cidade_uf' => 'RO'],
            ['cidade_id' => 827, 'estado_id' => 17, 'cidade_nome' => 'Cabo de Santo Agostinho', 'cidade_uf' => 'PE'],
            ['cidade_id' => 828, 'estado_id' => 19, 'cidade_nome' => 'Cabo Frio', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 829, 'estado_id' => 13, 'cidade_nome' => 'Cabo Verde', 'cidade_uf' => 'MG'],
            ['cidade_id' => 830, 'estado_id' => 25, 'cidade_nome' => 'Cabrália Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 831, 'estado_id' => 25, 'cidade_nome' => 'Cabreúva', 'cidade_uf' => 'SP'],
            ['cidade_id' => 832, 'estado_id' => 17, 'cidade_nome' => 'Cabrobó', 'cidade_uf' => 'PE'],
            ['cidade_id' => 833, 'estado_id' => 24, 'cidade_nome' => 'Caçador', 'cidade_uf' => 'SC'],
            ['cidade_id' => 834, 'estado_id' => 25, 'cidade_nome' => 'Caçapava', 'cidade_uf' => 'SP'],
            ['cidade_id' => 835, 'estado_id' => 21, 'cidade_nome' => 'Caçapava do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 836, 'estado_id' => 22, 'cidade_nome' => 'Cacaulândia', 'cidade_uf' => 'RO'],
            ['cidade_id' => 837, 'estado_id' => 21, 'cidade_nome' => 'Cacequi', 'cidade_uf' => 'RS'],
            ['cidade_id' => 838, 'estado_id' => 11, 'cidade_nome' => 'Cáceres', 'cidade_uf' => 'MT'],
            ['cidade_id' => 839, 'estado_id' => 5, 'cidade_nome' => 'Cachoeira', 'cidade_uf' => 'BA'],
            ['cidade_id' => 840, 'estado_id' => 9, 'cidade_nome' => 'Cachoeira Alta', 'cidade_uf' => 'GO'],
            ['cidade_id' => 841, 'estado_id' => 13, 'cidade_nome' => 'Cachoeira da Prata', 'cidade_uf' => 'MG'],
            ['cidade_id' => 842, 'estado_id' => 9, 'cidade_nome' => 'Cachoeira de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 843, 'estado_id' => 13, 'cidade_nome' => 'Cachoeira de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 844, 'estado_id' => 13, 'cidade_nome' => 'Cachoeira de Pajeú', 'cidade_uf' => 'MG'],
            ['cidade_id' => 845, 'estado_id' => 14, 'cidade_nome' => 'Cachoeira do Arari', 'cidade_uf' => 'PA'],
            ['cidade_id' => 846, 'estado_id' => 14, 'cidade_nome' => 'Cachoeira do Piriá', 'cidade_uf' => 'PA'],
            ['cidade_id' => 847, 'estado_id' => 21, 'cidade_nome' => 'Cachoeira do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 848, 'estado_id' => 15, 'cidade_nome' => 'Cachoeira dos Índios', 'cidade_uf' => 'PB'],
            ['cidade_id' => 849, 'estado_id' => 9, 'cidade_nome' => 'Cachoeira Dourada', 'cidade_uf' => 'GO'],
            ['cidade_id' => 850, 'estado_id' => 13, 'cidade_nome' => 'Cachoeira Dourada', 'cidade_uf' => 'MG'],
            ['cidade_id' => 851, 'estado_id' => 10, 'cidade_nome' => 'Cachoeira Grande', 'cidade_uf' => 'MA'],
            ['cidade_id' => 852, 'estado_id' => 25, 'cidade_nome' => 'Cachoeira Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 853, 'estado_id' => 19, 'cidade_nome' => 'Cachoeiras de Macacu', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 854, 'estado_id' => 17, 'cidade_nome' => 'Cachoeirinha', 'cidade_uf' => 'PE'],
            ['cidade_id' => 855, 'estado_id' => 21, 'cidade_nome' => 'Cachoeirinha', 'cidade_uf' => 'RS'],
            ['cidade_id' => 856, 'estado_id' => 27, 'cidade_nome' => 'Cachoeirinha', 'cidade_uf' => 'TO'],
            ['cidade_id' => 857, 'estado_id' => 8, 'cidade_nome' => 'Cachoeiro de Itapemirim', 'cidade_uf' => 'ES'],
            ['cidade_id' => 858, 'estado_id' => 15, 'cidade_nome' => 'Cacimba de Areia', 'cidade_uf' => 'PB'],
            ['cidade_id' => 859, 'estado_id' => 15, 'cidade_nome' => 'Cacimba de Dentro', 'cidade_uf' => 'PB'],
            ['cidade_id' => 860, 'estado_id' => 15, 'cidade_nome' => 'Cacimbas', 'cidade_uf' => 'PB'],
            ['cidade_id' => 861, 'estado_id' => 2, 'cidade_nome' => 'Cacimbinhas', 'cidade_uf' => 'AL'],
            ['cidade_id' => 862, 'estado_id' => 21, 'cidade_nome' => 'Cacique Doble', 'cidade_uf' => 'RS'],
            ['cidade_id' => 863, 'estado_id' => 22, 'cidade_nome' => 'Cacoal', 'cidade_uf' => 'RO'],
            ['cidade_id' => 864, 'estado_id' => 25, 'cidade_nome' => 'Caconde', 'cidade_uf' => 'SP'],
            ['cidade_id' => 865, 'estado_id' => 9, 'cidade_nome' => 'Caçu', 'cidade_uf' => 'GO'],
            ['cidade_id' => 866, 'estado_id' => 5, 'cidade_nome' => 'Caculé', 'cidade_uf' => 'BA'],
            ['cidade_id' => 867, 'estado_id' => 5, 'cidade_nome' => 'Caém', 'cidade_uf' => 'BA'],
            ['cidade_id' => 868, 'estado_id' => 13, 'cidade_nome' => 'Caetanópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 869, 'estado_id' => 5, 'cidade_nome' => 'Caetanos', 'cidade_uf' => 'BA'],
            ['cidade_id' => 870, 'estado_id' => 13, 'cidade_nome' => 'Caeté', 'cidade_uf' => 'MG'],
            ['cidade_id' => 871, 'estado_id' => 17, 'cidade_nome' => 'Caetés', 'cidade_uf' => 'PE'],
            ['cidade_id' => 872, 'estado_id' => 5, 'cidade_nome' => 'Caetité', 'cidade_uf' => 'BA'],
            ['cidade_id' => 873, 'estado_id' => 5, 'cidade_nome' => 'Cafarnaum', 'cidade_uf' => 'BA'],
            ['cidade_id' => 874, 'estado_id' => 16, 'cidade_nome' => 'Cafeara', 'cidade_uf' => 'PR'],
            ['cidade_id' => 875, 'estado_id' => 16, 'cidade_nome' => 'Cafelândia', 'cidade_uf' => 'PR'],
            ['cidade_id' => 876, 'estado_id' => 25, 'cidade_nome' => 'Cafelândia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 877, 'estado_id' => 16, 'cidade_nome' => 'Cafezal do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 878, 'estado_id' => 25, 'cidade_nome' => 'Caiabu', 'cidade_uf' => 'SP'],
            ['cidade_id' => 879, 'estado_id' => 13, 'cidade_nome' => 'Caiana', 'cidade_uf' => 'MG'],
            ['cidade_id' => 880, 'estado_id' => 9, 'cidade_nome' => 'Caiapônia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 881, 'estado_id' => 21, 'cidade_nome' => 'Caibaté', 'cidade_uf' => 'RS'],
            ['cidade_id' => 882, 'estado_id' => 24, 'cidade_nome' => 'Caibi', 'cidade_uf' => 'SC'],
            ['cidade_id' => 883, 'estado_id' => 15, 'cidade_nome' => 'Caiçara', 'cidade_uf' => 'PB'],
            ['cidade_id' => 884, 'estado_id' => 21, 'cidade_nome' => 'Caiçara', 'cidade_uf' => 'RS'],
            ['cidade_id' => 885, 'estado_id' => 20, 'cidade_nome' => 'Caiçara do Norte', 'cidade_uf' => 'RN'],
            ['cidade_id' => 886, 'estado_id' => 20, 'cidade_nome' => 'Caiçara do Rio do Vento', 'cidade_uf' => 'RN'],
            ['cidade_id' => 887, 'estado_id' => 20, 'cidade_nome' => 'Caicó', 'cidade_uf' => 'RN'],
            ['cidade_id' => 888, 'estado_id' => 25, 'cidade_nome' => 'Caieiras', 'cidade_uf' => 'SP'],
            ['cidade_id' => 889, 'estado_id' => 5, 'cidade_nome' => 'Cairu', 'cidade_uf' => 'BA'],
            ['cidade_id' => 890, 'estado_id' => 25, 'cidade_nome' => 'Caiuá', 'cidade_uf' => 'SP'],
            ['cidade_id' => 891, 'estado_id' => 25, 'cidade_nome' => 'Cajamar', 'cidade_uf' => 'SP'],
            ['cidade_id' => 892, 'estado_id' => 10, 'cidade_nome' => 'Cajapió', 'cidade_uf' => 'MA'],
            ['cidade_id' => 893, 'estado_id' => 10, 'cidade_nome' => 'Cajari', 'cidade_uf' => 'MA'],
            ['cidade_id' => 894, 'estado_id' => 25, 'cidade_nome' => 'Cajati', 'cidade_uf' => 'SP'],
            ['cidade_id' => 895, 'estado_id' => 15, 'cidade_nome' => 'Cajazeiras', 'cidade_uf' => 'PB'],
            ['cidade_id' => 896, 'estado_id' => 18, 'cidade_nome' => 'Cajazeiras do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 897, 'estado_id' => 15, 'cidade_nome' => 'Cajazeirinhas', 'cidade_uf' => 'PB'],
            ['cidade_id' => 898, 'estado_id' => 25, 'cidade_nome' => 'Cajobi', 'cidade_uf' => 'SP'],
            ['cidade_id' => 899, 'estado_id' => 2, 'cidade_nome' => 'Cajueiro', 'cidade_uf' => 'AL'],
            ['cidade_id' => 900, 'estado_id' => 18, 'cidade_nome' => 'Cajueiro da Praia', 'cidade_uf' => 'PI'],
            ['cidade_id' => 901, 'estado_id' => 13, 'cidade_nome' => 'Cajuri', 'cidade_uf' => 'MG'],
            ['cidade_id' => 902, 'estado_id' => 25, 'cidade_nome' => 'Cajuru', 'cidade_uf' => 'SP'],
            ['cidade_id' => 903, 'estado_id' => 17, 'cidade_nome' => 'Calçado', 'cidade_uf' => 'PE'],
            ['cidade_id' => 904, 'estado_id' => 3, 'cidade_nome' => 'Calçoene', 'cidade_uf' => 'AP'],
            ['cidade_id' => 905, 'estado_id' => 13, 'cidade_nome' => 'Caldas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 906, 'estado_id' => 15, 'cidade_nome' => 'Caldas Brandão', 'cidade_uf' => 'PB'],
            ['cidade_id' => 907, 'estado_id' => 9, 'cidade_nome' => 'Caldas Novas', 'cidade_uf' => 'GO'],
            ['cidade_id' => 908, 'estado_id' => 9, 'cidade_nome' => 'Caldazinha', 'cidade_uf' => 'GO'],
            ['cidade_id' => 909, 'estado_id' => 5, 'cidade_nome' => 'Caldeirão Grande', 'cidade_uf' => 'BA'],
            ['cidade_id' => 910, 'estado_id' => 18, 'cidade_nome' => 'Caldeirão Grande do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 911, 'estado_id' => 16, 'cidade_nome' => 'Califórnia', 'cidade_uf' => 'PR'],
            ['cidade_id' => 912, 'estado_id' => 24, 'cidade_nome' => 'Calmon', 'cidade_uf' => 'SC'],
            ['cidade_id' => 913, 'estado_id' => 17, 'cidade_nome' => 'Calumbi', 'cidade_uf' => 'PE'],
            ['cidade_id' => 914, 'estado_id' => 5, 'cidade_nome' => 'Camacan', 'cidade_uf' => 'BA'],
            ['cidade_id' => 915, 'estado_id' => 5, 'cidade_nome' => 'Camaçari', 'cidade_uf' => 'BA'],
            ['cidade_id' => 916, 'estado_id' => 13, 'cidade_nome' => 'Camacho', 'cidade_uf' => 'MG'],
            ['cidade_id' => 917, 'estado_id' => 15, 'cidade_nome' => 'Camalaú', 'cidade_uf' => 'PB'],
            ['cidade_id' => 918, 'estado_id' => 5, 'cidade_nome' => 'Camamu', 'cidade_uf' => 'BA'],
            ['cidade_id' => 919, 'estado_id' => 13, 'cidade_nome' => 'Camanducaia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 920, 'estado_id' => 12, 'cidade_nome' => 'Camapuã', 'cidade_uf' => 'MS'],
            ['cidade_id' => 921, 'estado_id' => 21, 'cidade_nome' => 'Camaquã', 'cidade_uf' => 'RS'],
            ['cidade_id' => 922, 'estado_id' => 17, 'cidade_nome' => 'Camaragibe', 'cidade_uf' => 'PE'],
            ['cidade_id' => 923, 'estado_id' => 21, 'cidade_nome' => 'Camargo', 'cidade_uf' => 'RS'],
            ['cidade_id' => 924, 'estado_id' => 16, 'cidade_nome' => 'Cambará', 'cidade_uf' => 'PR'],
            ['cidade_id' => 925, 'estado_id' => 21, 'cidade_nome' => 'Cambará do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 926, 'estado_id' => 16, 'cidade_nome' => 'Cambé', 'cidade_uf' => 'PR'],
            ['cidade_id' => 927, 'estado_id' => 16, 'cidade_nome' => 'Cambira', 'cidade_uf' => 'PR'],
            ['cidade_id' => 928, 'estado_id' => 24, 'cidade_nome' => 'Camboriú', 'cidade_uf' => 'SC'],
            ['cidade_id' => 929, 'estado_id' => 19, 'cidade_nome' => 'Cambuci', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 930, 'estado_id' => 13, 'cidade_nome' => 'Cambuí', 'cidade_uf' => 'MG'],
            ['cidade_id' => 931, 'estado_id' => 13, 'cidade_nome' => 'Cambuquira', 'cidade_uf' => 'MG'],
            ['cidade_id' => 932, 'estado_id' => 14, 'cidade_nome' => 'Cametá', 'cidade_uf' => 'PA'],
            ['cidade_id' => 933, 'estado_id' => 6, 'cidade_nome' => 'Camocim', 'cidade_uf' => 'CE'],
            ['cidade_id' => 934, 'estado_id' => 17, 'cidade_nome' => 'Camocim de São Félix', 'cidade_uf' => 'PE'],
            ['cidade_id' => 935, 'estado_id' => 13, 'cidade_nome' => 'Campanário', 'cidade_uf' => 'MG'],
            ['cidade_id' => 936, 'estado_id' => 13, 'cidade_nome' => 'Campanha', 'cidade_uf' => 'MG'],
            ['cidade_id' => 937, 'estado_id' => 2, 'cidade_nome' => 'Campestre', 'cidade_uf' => 'AL'],
            ['cidade_id' => 938, 'estado_id' => 13, 'cidade_nome' => 'Campestre', 'cidade_uf' => 'MG'],
            ['cidade_id' => 939, 'estado_id' => 21, 'cidade_nome' => 'Campestre da Serra', 'cidade_uf' => 'RS'],
            ['cidade_id' => 940, 'estado_id' => 9, 'cidade_nome' => 'Campestre de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 941, 'estado_id' => 10, 'cidade_nome' => 'Campestre do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 942, 'estado_id' => 16, 'cidade_nome' => 'Campina da Lagoa', 'cidade_uf' => 'PR'],
            ['cidade_id' => 943, 'estado_id' => 21, 'cidade_nome' => 'Campina das Missões', 'cidade_uf' => 'RS'],
            ['cidade_id' => 944, 'estado_id' => 25, 'cidade_nome' => 'Campina do Monte Alegre', 'cidade_uf' => 'SP'],
            ['cidade_id' => 945, 'estado_id' => 16, 'cidade_nome' => 'Campina do Simão', 'cidade_uf' => 'PR'],
            ['cidade_id' => 946, 'estado_id' => 15, 'cidade_nome' => 'Campina Grande', 'cidade_uf' => 'PB'],
            ['cidade_id' => 947, 'estado_id' => 16, 'cidade_nome' => 'Campina Grande do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 948, 'estado_id' => 13, 'cidade_nome' => 'Campina Verde', 'cidade_uf' => 'MG'],
            ['cidade_id' => 949, 'estado_id' => 9, 'cidade_nome' => 'Campinaçu', 'cidade_uf' => 'GO'],
            ['cidade_id' => 950, 'estado_id' => 11, 'cidade_nome' => 'Campinápolis', 'cidade_uf' => 'MT'],
            ['cidade_id' => 951, 'estado_id' => 25, 'cidade_nome' => 'Campinas', 'cidade_uf' => 'SP'],
            ['cidade_id' => 952, 'estado_id' => 18, 'cidade_nome' => 'Campinas do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 953, 'estado_id' => 21, 'cidade_nome' => 'Campinas do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 954, 'estado_id' => 9, 'cidade_nome' => 'Campinorte', 'cidade_uf' => 'GO'],
            ['cidade_id' => 955, 'estado_id' => 2, 'cidade_nome' => 'Campo Alegre', 'cidade_uf' => 'AL'],
            ['cidade_id' => 956, 'estado_id' => 24, 'cidade_nome' => 'Campo Alegre', 'cidade_uf' => 'SC'],
            ['cidade_id' => 957, 'estado_id' => 9, 'cidade_nome' => 'Campo Alegre de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 958, 'estado_id' => 5, 'cidade_nome' => 'Campo Alegre de Lourdes', 'cidade_uf' => 'BA'],
            ['cidade_id' => 959, 'estado_id' => 18, 'cidade_nome' => 'Campo Alegre do Fidalgo', 'cidade_uf' => 'PI'],
            ['cidade_id' => 960, 'estado_id' => 13, 'cidade_nome' => 'Campo Azul', 'cidade_uf' => 'MG'],
            ['cidade_id' => 961, 'estado_id' => 13, 'cidade_nome' => 'Campo Belo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 962, 'estado_id' => 24, 'cidade_nome' => 'Campo Belo do Sul', 'cidade_uf' => 'SC'],
            ['cidade_id' => 963, 'estado_id' => 21, 'cidade_nome' => 'Campo Bom', 'cidade_uf' => 'RS'],
            ['cidade_id' => 964, 'estado_id' => 16, 'cidade_nome' => 'Campo Bonito', 'cidade_uf' => 'PR'],
            ['cidade_id' => 965, 'estado_id' => 26, 'cidade_nome' => 'Campo do Brito', 'cidade_uf' => 'SE'],
            ['cidade_id' => 966, 'estado_id' => 13, 'cidade_nome' => 'Campo do Meio', 'cidade_uf' => 'MG'],
            ['cidade_id' => 967, 'estado_id' => 16, 'cidade_nome' => 'Campo do Tenente', 'cidade_uf' => 'PR'],
            ['cidade_id' => 968, 'estado_id' => 24, 'cidade_nome' => 'Campo Erê', 'cidade_uf' => 'SC'],
            ['cidade_id' => 969, 'estado_id' => 13, 'cidade_nome' => 'Campo Florido', 'cidade_uf' => 'MG'],
            ['cidade_id' => 970, 'estado_id' => 5, 'cidade_nome' => 'Campo Formoso', 'cidade_uf' => 'BA'],
            ['cidade_id' => 971, 'estado_id' => 2, 'cidade_nome' => 'Campo Grande', 'cidade_uf' => 'AL'],
            ['cidade_id' => 972, 'estado_id' => 12, 'cidade_nome' => 'Campo Grande', 'cidade_uf' => 'MS'],
            ['cidade_id' => 973, 'estado_id' => 18, 'cidade_nome' => 'Campo Grande do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 974, 'estado_id' => 16, 'cidade_nome' => 'Campo Largo', 'cidade_uf' => 'PR'],
            ['cidade_id' => 975, 'estado_id' => 18, 'cidade_nome' => 'Campo Largo do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 976, 'estado_id' => 9, 'cidade_nome' => 'Campo Limpo de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 977, 'estado_id' => 25, 'cidade_nome' => 'Campo Limpo Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 978, 'estado_id' => 16, 'cidade_nome' => 'Campo Magro', 'cidade_uf' => 'PR'],
            ['cidade_id' => 979, 'estado_id' => 18, 'cidade_nome' => 'Campo Maior', 'cidade_uf' => 'PI'],
            ['cidade_id' => 980, 'estado_id' => 16, 'cidade_nome' => 'Campo Mourão', 'cidade_uf' => 'PR'],
            ['cidade_id' => 981, 'estado_id' => 21, 'cidade_nome' => 'Campo Novo', 'cidade_uf' => 'RS'],
            ['cidade_id' => 982, 'estado_id' => 22, 'cidade_nome' => 'Campo Novo de Rondônia', 'cidade_uf' => 'RO'],
            ['cidade_id' => 983, 'estado_id' => 11, 'cidade_nome' => 'Campo Novo do Parecis', 'cidade_uf' => 'MT'],
            ['cidade_id' => 984, 'estado_id' => 20, 'cidade_nome' => 'Campo Redondo', 'cidade_uf' => 'RN'],
            ['cidade_id' => 985, 'estado_id' => 11, 'cidade_nome' => 'Campo Verde', 'cidade_uf' => 'MT'],
            ['cidade_id' => 986, 'estado_id' => 13, 'cidade_nome' => 'Campos Altos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 987, 'estado_id' => 9, 'cidade_nome' => 'Campos Belos', 'cidade_uf' => 'GO'],
            ['cidade_id' => 988, 'estado_id' => 21, 'cidade_nome' => 'Campos Borges', 'cidade_uf' => 'RS'],
            ['cidade_id' => 989, 'estado_id' => 11, 'cidade_nome' => 'Campos de Júlio', 'cidade_uf' => 'MT'],
            ['cidade_id' => 990, 'estado_id' => 25, 'cidade_nome' => 'Campos do Jordão', 'cidade_uf' => 'SP'],
            ['cidade_id' => 991, 'estado_id' => 19, 'cidade_nome' => 'Campos dos Goytacazes', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 992, 'estado_id' => 13, 'cidade_nome' => 'Campos Gerais', 'cidade_uf' => 'MG'],
            ['cidade_id' => 993, 'estado_id' => 27, 'cidade_nome' => 'Campos Lindos', 'cidade_uf' => 'TO'],
            ['cidade_id' => 994, 'estado_id' => 24, 'cidade_nome' => 'Campos Novos', 'cidade_uf' => 'SC'],
            ['cidade_id' => 995, 'estado_id' => 25, 'cidade_nome' => 'Campos Novos Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 996, 'estado_id' => 6, 'cidade_nome' => 'Campos Sales', 'cidade_uf' => 'CE'],
            ['cidade_id' => 997, 'estado_id' => 9, 'cidade_nome' => 'Campos Verdes', 'cidade_uf' => 'GO'],
            ['cidade_id' => 998, 'estado_id' => 17, 'cidade_nome' => 'Camutanga', 'cidade_uf' => 'PE'],
            ['cidade_id' => 999, 'estado_id' => 13, 'cidade_nome' => 'Cana Verde', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1000, 'estado_id' => 13, 'cidade_nome' => 'Canaã', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1001, 'estado_id' => 14, 'cidade_nome' => 'Canaã dos Carajás', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1002, 'estado_id' => 11, 'cidade_nome' => 'Canabrava do Norte', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1003, 'estado_id' => 25, 'cidade_nome' => 'Cananéia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1004, 'estado_id' => 2, 'cidade_nome' => 'Canapi', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1005, 'estado_id' => 5, 'cidade_nome' => 'Canápolis', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1006, 'estado_id' => 13, 'cidade_nome' => 'Canápolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1007, 'estado_id' => 5, 'cidade_nome' => 'Canarana', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1008, 'estado_id' => 11, 'cidade_nome' => 'Canarana', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1009, 'estado_id' => 25, 'cidade_nome' => 'Canas', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1010, 'estado_id' => 18, 'cidade_nome' => 'Canavieira', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1011, 'estado_id' => 5, 'cidade_nome' => 'Canavieiras', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1012, 'estado_id' => 5, 'cidade_nome' => 'Candeal', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1013, 'estado_id' => 5, 'cidade_nome' => 'Candeias', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1014, 'estado_id' => 13, 'cidade_nome' => 'Candeias', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1015, 'estado_id' => 22, 'cidade_nome' => 'Candeias do Jamari', 'cidade_uf' => 'RO'],
            ['cidade_id' => 1016, 'estado_id' => 21, 'cidade_nome' => 'Candelária', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1017, 'estado_id' => 5, 'cidade_nome' => 'Candiba', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1018, 'estado_id' => 16, 'cidade_nome' => 'Cândido de Abreu', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1019, 'estado_id' => 21, 'cidade_nome' => 'Cândido Godói', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1020, 'estado_id' => 10, 'cidade_nome' => 'Cândido Mendes', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1021, 'estado_id' => 25, 'cidade_nome' => 'Cândido Mota', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1022, 'estado_id' => 25, 'cidade_nome' => 'Cândido Rodrigues', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1023, 'estado_id' => 5, 'cidade_nome' => 'Cândido Sales', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1024, 'estado_id' => 21, 'cidade_nome' => 'Candiota', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1025, 'estado_id' => 16, 'cidade_nome' => 'Candói', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1026, 'estado_id' => 21, 'cidade_nome' => 'Canela', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1027, 'estado_id' => 24, 'cidade_nome' => 'Canelinha', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1028, 'estado_id' => 20, 'cidade_nome' => 'Canguaretama', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1029, 'estado_id' => 21, 'cidade_nome' => 'Canguçu', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1030, 'estado_id' => 26, 'cidade_nome' => 'Canhoba', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1031, 'estado_id' => 17, 'cidade_nome' => 'Canhotinho', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1032, 'estado_id' => 6, 'cidade_nome' => 'Canindé', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1033, 'estado_id' => 26, 'cidade_nome' => 'Canindé de São Francisco', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1034, 'estado_id' => 25, 'cidade_nome' => 'Canitar', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1035, 'estado_id' => 21, 'cidade_nome' => 'Canoas', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1036, 'estado_id' => 24, 'cidade_nome' => 'Canoinhas', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1037, 'estado_id' => 5, 'cidade_nome' => 'Cansanção', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1038, 'estado_id' => 23, 'cidade_nome' => 'Cantá', 'cidade_uf' => 'RR'],
            ['cidade_id' => 1039, 'estado_id' => 13, 'cidade_nome' => 'Cantagalo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1040, 'estado_id' => 16, 'cidade_nome' => 'Cantagalo', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1041, 'estado_id' => 19, 'cidade_nome' => 'Cantagalo', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 1042, 'estado_id' => 10, 'cidade_nome' => 'Cantanhede', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1043, 'estado_id' => 18, 'cidade_nome' => 'Canto do Buriti', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1044, 'estado_id' => 5, 'cidade_nome' => 'Canudos', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1045, 'estado_id' => 21, 'cidade_nome' => 'Canudos do Vale', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1046, 'estado_id' => 4, 'cidade_nome' => 'Canutama', 'cidade_uf' => 'AM'],
            ['cidade_id' => 1047, 'estado_id' => 14, 'cidade_nome' => 'Capanema', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1048, 'estado_id' => 16, 'cidade_nome' => 'Capanema', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1049, 'estado_id' => 24, 'cidade_nome' => 'Capão Alto', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1050, 'estado_id' => 25, 'cidade_nome' => 'Capão Bonito', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1051, 'estado_id' => 21, 'cidade_nome' => 'Capão Bonito do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1052, 'estado_id' => 21, 'cidade_nome' => 'Capão da Canoa', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1053, 'estado_id' => 21, 'cidade_nome' => 'Capão do Cipó', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1054, 'estado_id' => 21, 'cidade_nome' => 'Capão do Leão', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1055, 'estado_id' => 13, 'cidade_nome' => 'Caparaó', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1056, 'estado_id' => 2, 'cidade_nome' => 'Capela', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1057, 'estado_id' => 26, 'cidade_nome' => 'Capela', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1058, 'estado_id' => 21, 'cidade_nome' => 'Capela de Santana', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1059, 'estado_id' => 25, 'cidade_nome' => 'Capela do Alto', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1060, 'estado_id' => 5, 'cidade_nome' => 'Capela do Alto Alegre', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1061, 'estado_id' => 13, 'cidade_nome' => 'Capela Nova', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1062, 'estado_id' => 13, 'cidade_nome' => 'Capelinha', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1063, 'estado_id' => 13, 'cidade_nome' => 'Capetinga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1064, 'estado_id' => 15, 'cidade_nome' => 'Capim', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1065, 'estado_id' => 13, 'cidade_nome' => 'Capim Branco', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1066, 'estado_id' => 5, 'cidade_nome' => 'Capim Grosso', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1067, 'estado_id' => 13, 'cidade_nome' => 'Capinópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1068, 'estado_id' => 24, 'cidade_nome' => 'Capinzal', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1069, 'estado_id' => 10, 'cidade_nome' => 'Capinzal do Norte', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1070, 'estado_id' => 6, 'cidade_nome' => 'Capistrano', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1071, 'estado_id' => 21, 'cidade_nome' => 'Capitão', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1072, 'estado_id' => 13, 'cidade_nome' => 'Capitão Andrade', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1073, 'estado_id' => 18, 'cidade_nome' => 'Capitão de Campos', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1074, 'estado_id' => 13, 'cidade_nome' => 'Capitão Enéas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1075, 'estado_id' => 18, 'cidade_nome' => 'Capitão Gervásio Oliveira', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1076, 'estado_id' => 16, 'cidade_nome' => 'Capitão Leônidas Marques', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1077, 'estado_id' => 14, 'cidade_nome' => 'Capitão Poço', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1078, 'estado_id' => 13, 'cidade_nome' => 'Capitólio', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1079, 'estado_id' => 25, 'cidade_nome' => 'Capivari', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1080, 'estado_id' => 24, 'cidade_nome' => 'Capivari de Baixo', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1081, 'estado_id' => 21, 'cidade_nome' => 'Capivari do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1082, 'estado_id' => 1, 'cidade_nome' => 'Capixaba', 'cidade_uf' => 'AC'],
            ['cidade_id' => 1083, 'estado_id' => 17, 'cidade_nome' => 'Capoeiras', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1084, 'estado_id' => 13, 'cidade_nome' => 'Caputira', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1085, 'estado_id' => 21, 'cidade_nome' => 'Caraá', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1086, 'estado_id' => 23, 'cidade_nome' => 'Caracaraí', 'cidade_uf' => 'RR'],
            ['cidade_id' => 1087, 'estado_id' => 12, 'cidade_nome' => 'Caracol', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1088, 'estado_id' => 18, 'cidade_nome' => 'Caracol', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1089, 'estado_id' => 25, 'cidade_nome' => 'Caraguatatuba', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1090, 'estado_id' => 13, 'cidade_nome' => 'Caraí', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1091, 'estado_id' => 5, 'cidade_nome' => 'Caraíbas', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1092, 'estado_id' => 16, 'cidade_nome' => 'Carambeí', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1093, 'estado_id' => 13, 'cidade_nome' => 'Caranaíba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1094, 'estado_id' => 13, 'cidade_nome' => 'Carandaí', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1095, 'estado_id' => 13, 'cidade_nome' => 'Carangola', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1096, 'estado_id' => 19, 'cidade_nome' => 'Carapebus', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 1097, 'estado_id' => 25, 'cidade_nome' => 'Carapicuíba', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1098, 'estado_id' => 13, 'cidade_nome' => 'Caratinga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1099, 'estado_id' => 4, 'cidade_nome' => 'Carauari', 'cidade_uf' => 'AM'],
            ['cidade_id' => 1100, 'estado_id' => 15, 'cidade_nome' => 'Caraúbas', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1101, 'estado_id' => 20, 'cidade_nome' => 'Caraúbas', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1102, 'estado_id' => 18, 'cidade_nome' => 'Caraúbas do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1103, 'estado_id' => 5, 'cidade_nome' => 'Caravelas', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1104, 'estado_id' => 21, 'cidade_nome' => 'Carazinho', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1105, 'estado_id' => 13, 'cidade_nome' => 'Carbonita', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1106, 'estado_id' => 5, 'cidade_nome' => 'Cardeal da Silva', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1107, 'estado_id' => 25, 'cidade_nome' => 'Cardoso', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1108, 'estado_id' => 19, 'cidade_nome' => 'Cardoso Moreira', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 1109, 'estado_id' => 13, 'cidade_nome' => 'Careaçu', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1110, 'estado_id' => 4, 'cidade_nome' => 'Careiro', 'cidade_uf' => 'AM'],
            ['cidade_id' => 1111, 'estado_id' => 4, 'cidade_nome' => 'Careiro da Várzea', 'cidade_uf' => 'AM'],
            ['cidade_id' => 1112, 'estado_id' => 8, 'cidade_nome' => 'Cariacica', 'cidade_uf' => 'ES'],
            ['cidade_id' => 1113, 'estado_id' => 6, 'cidade_nome' => 'Caridade', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1114, 'estado_id' => 18, 'cidade_nome' => 'Caridade do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1115, 'estado_id' => 5, 'cidade_nome' => 'Carinhanha', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1116, 'estado_id' => 26, 'cidade_nome' => 'Carira', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1117, 'estado_id' => 6, 'cidade_nome' => 'Cariré', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1118, 'estado_id' => 27, 'cidade_nome' => 'Cariri do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1119, 'estado_id' => 6, 'cidade_nome' => 'Caririaçu', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1120, 'estado_id' => 6, 'cidade_nome' => 'Cariús', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1121, 'estado_id' => 11, 'cidade_nome' => 'Carlinda', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1122, 'estado_id' => 16, 'cidade_nome' => 'Carlópolis', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1123, 'estado_id' => 21, 'cidade_nome' => 'Carlos Barbosa', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1124, 'estado_id' => 13, 'cidade_nome' => 'Carlos Chagas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1125, 'estado_id' => 21, 'cidade_nome' => 'Carlos Gomes', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1126, 'estado_id' => 13, 'cidade_nome' => 'Carmésia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1127, 'estado_id' => 19, 'cidade_nome' => 'Carmo', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 1128, 'estado_id' => 13, 'cidade_nome' => 'Carmo da Cachoeira', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1129, 'estado_id' => 13, 'cidade_nome' => 'Carmo da Mata', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1130, 'estado_id' => 13, 'cidade_nome' => 'Carmo de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1131, 'estado_id' => 13, 'cidade_nome' => 'Carmo do Cajuru', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1132, 'estado_id' => 13, 'cidade_nome' => 'Carmo do Paranaíba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1133, 'estado_id' => 13, 'cidade_nome' => 'Carmo do Rio Claro', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1134, 'estado_id' => 9, 'cidade_nome' => 'Carmo do Rio Verde', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1135, 'estado_id' => 27, 'cidade_nome' => 'Carmolândia', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1136, 'estado_id' => 26, 'cidade_nome' => 'Carmópolis', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1137, 'estado_id' => 13, 'cidade_nome' => 'Carmópolis de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1138, 'estado_id' => 17, 'cidade_nome' => 'Carnaíba', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1139, 'estado_id' => 20, 'cidade_nome' => 'Carnaúba dos Dantas', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1140, 'estado_id' => 20, 'cidade_nome' => 'Carnaubais', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1141, 'estado_id' => 6, 'cidade_nome' => 'Carnaubal', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1142, 'estado_id' => 17, 'cidade_nome' => 'Carnaubeira da Penha', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1143, 'estado_id' => 13, 'cidade_nome' => 'Carneirinho', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1144, 'estado_id' => 2, 'cidade_nome' => 'Carneiros', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1145, 'estado_id' => 23, 'cidade_nome' => 'Caroebe', 'cidade_uf' => 'RR'],
            ['cidade_id' => 1146, 'estado_id' => 10, 'cidade_nome' => 'Carolina', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1147, 'estado_id' => 17, 'cidade_nome' => 'Carpina', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1148, 'estado_id' => 13, 'cidade_nome' => 'Carrancas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1149, 'estado_id' => 15, 'cidade_nome' => 'Carrapateira', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1150, 'estado_id' => 27, 'cidade_nome' => 'Carrasco Bonito', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1151, 'estado_id' => 17, 'cidade_nome' => 'Caruaru', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1152, 'estado_id' => 10, 'cidade_nome' => 'Carutapera', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1153, 'estado_id' => 13, 'cidade_nome' => 'Carvalhópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1154, 'estado_id' => 13, 'cidade_nome' => 'Carvalhos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1155, 'estado_id' => 25, 'cidade_nome' => 'Casa Branca', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1156, 'estado_id' => 13, 'cidade_nome' => 'Casa Grande', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1157, 'estado_id' => 5, 'cidade_nome' => 'Casa Nova', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1158, 'estado_id' => 21, 'cidade_nome' => 'Casca', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1159, 'estado_id' => 13, 'cidade_nome' => 'Cascalho Rico', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1160, 'estado_id' => 6, 'cidade_nome' => 'Cascavel', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1161, 'estado_id' => 16, 'cidade_nome' => 'Cascavel', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1162, 'estado_id' => 27, 'cidade_nome' => 'Caseara', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1163, 'estado_id' => 21, 'cidade_nome' => 'Caseiros', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1164, 'estado_id' => 19, 'cidade_nome' => 'Casimiro de Abreu', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 1165, 'estado_id' => 17, 'cidade_nome' => 'Casinhas', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1166, 'estado_id' => 15, 'cidade_nome' => 'Casserengue', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1167, 'estado_id' => 13, 'cidade_nome' => 'Cássia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1168, 'estado_id' => 25, 'cidade_nome' => 'Cássia dos Coqueiros', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1169, 'estado_id' => 12, 'cidade_nome' => 'Cassilândia', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1170, 'estado_id' => 14, 'cidade_nome' => 'Castanhal', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1171, 'estado_id' => 11, 'cidade_nome' => 'Castanheira', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1172, 'estado_id' => 22, 'cidade_nome' => 'Castanheiras', 'cidade_uf' => 'RO'],
            ['cidade_id' => 1173, 'estado_id' => 9, 'cidade_nome' => 'Castelândia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1174, 'estado_id' => 8, 'cidade_nome' => 'Castelo', 'cidade_uf' => 'ES'],
            ['cidade_id' => 1175, 'estado_id' => 18, 'cidade_nome' => 'Castelo do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1176, 'estado_id' => 25, 'cidade_nome' => 'Castilho', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1177, 'estado_id' => 16, 'cidade_nome' => 'Castro', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1178, 'estado_id' => 5, 'cidade_nome' => 'Castro Alves', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1179, 'estado_id' => 13, 'cidade_nome' => 'Cataguases', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1180, 'estado_id' => 9, 'cidade_nome' => 'Catalão', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1181, 'estado_id' => 25, 'cidade_nome' => 'Catanduva', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1182, 'estado_id' => 16, 'cidade_nome' => 'Catanduvas', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1183, 'estado_id' => 24, 'cidade_nome' => 'Catanduvas', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1184, 'estado_id' => 6, 'cidade_nome' => 'Catarina', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1185, 'estado_id' => 13, 'cidade_nome' => 'Catas Altas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1186, 'estado_id' => 13, 'cidade_nome' => 'Catas Altas da Noruega', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1187, 'estado_id' => 17, 'cidade_nome' => 'Catende', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1188, 'estado_id' => 25, 'cidade_nome' => 'Catiguá', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1189, 'estado_id' => 15, 'cidade_nome' => 'Catingueira', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1190, 'estado_id' => 5, 'cidade_nome' => 'Catolândia', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1191, 'estado_id' => 15, 'cidade_nome' => 'Catolé do Rocha', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1192, 'estado_id' => 5, 'cidade_nome' => 'Catu', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1193, 'estado_id' => 21, 'cidade_nome' => 'Catuípe', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1194, 'estado_id' => 13, 'cidade_nome' => 'Catuji', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1195, 'estado_id' => 6, 'cidade_nome' => 'Catunda', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1196, 'estado_id' => 9, 'cidade_nome' => 'Caturaí', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1197, 'estado_id' => 5, 'cidade_nome' => 'Caturama', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1198, 'estado_id' => 15, 'cidade_nome' => 'Caturité', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1199, 'estado_id' => 13, 'cidade_nome' => 'Catuti', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1200, 'estado_id' => 6, 'cidade_nome' => 'Caucaia', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1201, 'estado_id' => 9, 'cidade_nome' => 'Cavalcante', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1202, 'estado_id' => 13, 'cidade_nome' => 'Caxambu', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1203, 'estado_id' => 24, 'cidade_nome' => 'Caxambu do Sul', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1204, 'estado_id' => 10, 'cidade_nome' => 'Caxias', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1205, 'estado_id' => 21, 'cidade_nome' => 'Caxias do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1206, 'estado_id' => 18, 'cidade_nome' => 'Caxingó', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1207, 'estado_id' => 20, 'cidade_nome' => 'Ceará-Mirim', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1208, 'estado_id' => 10, 'cidade_nome' => 'Cedral', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1209, 'estado_id' => 25, 'cidade_nome' => 'Cedral', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1210, 'estado_id' => 6, 'cidade_nome' => 'Cedro', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1211, 'estado_id' => 17, 'cidade_nome' => 'Cedro', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1212, 'estado_id' => 26, 'cidade_nome' => 'Cedro de São João', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1213, 'estado_id' => 13, 'cidade_nome' => 'Cedro do Abaeté', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1214, 'estado_id' => 24, 'cidade_nome' => 'Celso Ramos', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1215, 'estado_id' => 21, 'cidade_nome' => 'Centenário', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1216, 'estado_id' => 27, 'cidade_nome' => 'Centenário', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1217, 'estado_id' => 16, 'cidade_nome' => 'Centenário do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1218, 'estado_id' => 5, 'cidade_nome' => 'Central', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1219, 'estado_id' => 13, 'cidade_nome' => 'Central de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1220, 'estado_id' => 10, 'cidade_nome' => 'Central do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1221, 'estado_id' => 13, 'cidade_nome' => 'Centralina', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1222, 'estado_id' => 10, 'cidade_nome' => 'Centro do Guilherme', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1223, 'estado_id' => 10, 'cidade_nome' => 'Centro Novo do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1224, 'estado_id' => 22, 'cidade_nome' => 'Cerejeiras', 'cidade_uf' => 'RO'],
            ['cidade_id' => 1225, 'estado_id' => 9, 'cidade_nome' => 'Ceres', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1226, 'estado_id' => 25, 'cidade_nome' => 'Cerqueira César', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1227, 'estado_id' => 25, 'cidade_nome' => 'Cerquilho', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1228, 'estado_id' => 21, 'cidade_nome' => 'Cerrito', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1229, 'estado_id' => 16, 'cidade_nome' => 'Cerro Azul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1230, 'estado_id' => 21, 'cidade_nome' => 'Cerro Branco', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1231, 'estado_id' => 20, 'cidade_nome' => 'Cerro Corá', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1232, 'estado_id' => 21, 'cidade_nome' => 'Cerro Grande', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1233, 'estado_id' => 21, 'cidade_nome' => 'Cerro Grande do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1234, 'estado_id' => 21, 'cidade_nome' => 'Cerro Largo', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1235, 'estado_id' => 24, 'cidade_nome' => 'Cerro Negro', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1236, 'estado_id' => 25, 'cidade_nome' => 'Cesário Lange', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1237, 'estado_id' => 16, 'cidade_nome' => 'Céu Azul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1238, 'estado_id' => 9, 'cidade_nome' => 'Cezarina', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1239, 'estado_id' => 17, 'cidade_nome' => 'Chã de Alegria', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1240, 'estado_id' => 17, 'cidade_nome' => 'Chã Grande', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1241, 'estado_id' => 2, 'cidade_nome' => 'Chã Preta', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1242, 'estado_id' => 13, 'cidade_nome' => 'Chácara', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1243, 'estado_id' => 13, 'cidade_nome' => 'Chalé', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1244, 'estado_id' => 21, 'cidade_nome' => 'Chapada', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1245, 'estado_id' => 27, 'cidade_nome' => 'Chapada da Natividade', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1246, 'estado_id' => 27, 'cidade_nome' => 'Chapada de Areia', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1247, 'estado_id' => 13, 'cidade_nome' => 'Chapada do Norte', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1248, 'estado_id' => 11, 'cidade_nome' => 'Chapada dos Guimarães', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1249, 'estado_id' => 13, 'cidade_nome' => 'Chapada Gaúcha', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1250, 'estado_id' => 9, 'cidade_nome' => 'Chapadão do Céu', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1251, 'estado_id' => 24, 'cidade_nome' => 'Chapadão do Lageado', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1252, 'estado_id' => 12, 'cidade_nome' => 'Chapadão do Sul', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1253, 'estado_id' => 10, 'cidade_nome' => 'Chapadinha', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1254, 'estado_id' => 24, 'cidade_nome' => 'Chapecó', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1255, 'estado_id' => 25, 'cidade_nome' => 'Charqueada', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1256, 'estado_id' => 21, 'cidade_nome' => 'Charqueadas', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1257, 'estado_id' => 21, 'cidade_nome' => 'Charrua', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1258, 'estado_id' => 6, 'cidade_nome' => 'Chaval', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1259, 'estado_id' => 25, 'cidade_nome' => 'Chavantes', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1260, 'estado_id' => 14, 'cidade_nome' => 'Chaves', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1261, 'estado_id' => 13, 'cidade_nome' => 'Chiador', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1262, 'estado_id' => 21, 'cidade_nome' => 'Chiapetta', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1263, 'estado_id' => 16, 'cidade_nome' => 'Chopinzinho', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1264, 'estado_id' => 6, 'cidade_nome' => 'Choró', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1265, 'estado_id' => 6, 'cidade_nome' => 'Chorozinho', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1266, 'estado_id' => 5, 'cidade_nome' => 'Chorrochó', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1267, 'estado_id' => 21, 'cidade_nome' => 'Chuí', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1268, 'estado_id' => 22, 'cidade_nome' => 'Chupinguaia', 'cidade_uf' => 'RO'],
            ['cidade_id' => 1269, 'estado_id' => 21, 'cidade_nome' => 'Chuvisca', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1270, 'estado_id' => 16, 'cidade_nome' => 'Cianorte', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1271, 'estado_id' => 5, 'cidade_nome' => 'Cícero Dantas', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1272, 'estado_id' => 16, 'cidade_nome' => 'Cidade Gaúcha', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1273, 'estado_id' => 9, 'cidade_nome' => 'Cidade Ocidental', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1274, 'estado_id' => 10, 'cidade_nome' => 'Cidelândia', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1275, 'estado_id' => 21, 'cidade_nome' => 'Cidreira', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1276, 'estado_id' => 5, 'cidade_nome' => 'Cipó', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1277, 'estado_id' => 13, 'cidade_nome' => 'Cipotânea', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1278, 'estado_id' => 21, 'cidade_nome' => 'Ciríaco', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1279, 'estado_id' => 13, 'cidade_nome' => 'Claraval', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1280, 'estado_id' => 13, 'cidade_nome' => 'Claro dos Poções', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1281, 'estado_id' => 11, 'cidade_nome' => 'Cláudia', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1282, 'estado_id' => 13, 'cidade_nome' => 'Cláudio', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1283, 'estado_id' => 25, 'cidade_nome' => 'Clementina', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1284, 'estado_id' => 16, 'cidade_nome' => 'Clevelândia', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1285, 'estado_id' => 5, 'cidade_nome' => 'Coaraci', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1286, 'estado_id' => 4, 'cidade_nome' => 'Coari', 'cidade_uf' => 'AM'],
            ['cidade_id' => 1287, 'estado_id' => 18, 'cidade_nome' => 'Cocal', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1288, 'estado_id' => 18, 'cidade_nome' => 'Cocal de Telha', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1289, 'estado_id' => 24, 'cidade_nome' => 'Cocal do Sul', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1290, 'estado_id' => 18, 'cidade_nome' => 'Cocal dos Alves', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1291, 'estado_id' => 11, 'cidade_nome' => 'Cocalinho', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1292, 'estado_id' => 9, 'cidade_nome' => 'Cocalzinho de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1293, 'estado_id' => 5, 'cidade_nome' => 'Cocos', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1294, 'estado_id' => 4, 'cidade_nome' => 'Codajás', 'cidade_uf' => 'AM'],
            ['cidade_id' => 1295, 'estado_id' => 10, 'cidade_nome' => 'Codó', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1296, 'estado_id' => 10, 'cidade_nome' => 'Coelho Neto', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1297, 'estado_id' => 13, 'cidade_nome' => 'Coimbra', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1298, 'estado_id' => 2, 'cidade_nome' => 'Coité do Nóia', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1299, 'estado_id' => 18, 'cidade_nome' => 'Coivaras', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1300, 'estado_id' => 14, 'cidade_nome' => 'Colares', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1301, 'estado_id' => 8, 'cidade_nome' => 'Colatina', 'cidade_uf' => 'ES'],
            ['cidade_id' => 1302, 'estado_id' => 11, 'cidade_nome' => 'Colíder', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1303, 'estado_id' => 25, 'cidade_nome' => 'Colina', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1304, 'estado_id' => 10, 'cidade_nome' => 'Colinas', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1305, 'estado_id' => 21, 'cidade_nome' => 'Colinas', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1306, 'estado_id' => 9, 'cidade_nome' => 'Colinas do Sul', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1307, 'estado_id' => 27, 'cidade_nome' => 'Colinas do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1308, 'estado_id' => 27, 'cidade_nome' => 'Colméia', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1309, 'estado_id' => 11, 'cidade_nome' => 'Colniza', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1310, 'estado_id' => 25, 'cidade_nome' => 'Colômbia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1311, 'estado_id' => 16, 'cidade_nome' => 'Colombo', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1312, 'estado_id' => 18, 'cidade_nome' => 'Colônia do Gurguéia', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1313, 'estado_id' => 18, 'cidade_nome' => 'Colônia do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1314, 'estado_id' => 2, 'cidade_nome' => 'Colônia Leopoldina', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1315, 'estado_id' => 16, 'cidade_nome' => 'Colorado', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1316, 'estado_id' => 21, 'cidade_nome' => 'Colorado', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1317, 'estado_id' => 22, 'cidade_nome' => 'Colorado do Oeste', 'cidade_uf' => 'RO'],
            ['cidade_id' => 1318, 'estado_id' => 13, 'cidade_nome' => 'Coluna', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1319, 'estado_id' => 27, 'cidade_nome' => 'Combinado', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1320, 'estado_id' => 13, 'cidade_nome' => 'Comendador Gomes', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1321, 'estado_id' => 19, 'cidade_nome' => 'Comendador Levy Gasparian', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 1322, 'estado_id' => 13, 'cidade_nome' => 'Comercinho', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1323, 'estado_id' => 11, 'cidade_nome' => 'Comodoro', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1324, 'estado_id' => 15, 'cidade_nome' => 'Conceição', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1325, 'estado_id' => 13, 'cidade_nome' => 'Conceição da Aparecida', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1326, 'estado_id' => 8, 'cidade_nome' => 'Conceição da Barra', 'cidade_uf' => 'ES'],
            ['cidade_id' => 1327, 'estado_id' => 13, 'cidade_nome' => 'Conceição da Barra de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1328, 'estado_id' => 5, 'cidade_nome' => 'Conceição da Feira', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1329, 'estado_id' => 13, 'cidade_nome' => 'Conceição das Alagoas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1330, 'estado_id' => 13, 'cidade_nome' => 'Conceição das Pedras', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1331, 'estado_id' => 13, 'cidade_nome' => 'Conceição de Ipanema', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1332, 'estado_id' => 19, 'cidade_nome' => 'Conceição de Macabu', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 1333, 'estado_id' => 5, 'cidade_nome' => 'Conceição do Almeida', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1334, 'estado_id' => 14, 'cidade_nome' => 'Conceição do Araguaia', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1335, 'estado_id' => 18, 'cidade_nome' => 'Conceição do Canindé', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1336, 'estado_id' => 8, 'cidade_nome' => 'Conceição do Castelo', 'cidade_uf' => 'ES'],
            ['cidade_id' => 1337, 'estado_id' => 5, 'cidade_nome' => 'Conceição do Coité', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1338, 'estado_id' => 5, 'cidade_nome' => 'Conceição do Jacuípe', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1339, 'estado_id' => 10, 'cidade_nome' => 'Conceição do Lago-Açu', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1340, 'estado_id' => 13, 'cidade_nome' => 'Conceição do Mato Dentro', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1341, 'estado_id' => 13, 'cidade_nome' => 'Conceição do Pará', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1342, 'estado_id' => 13, 'cidade_nome' => 'Conceição do Rio Verde', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1343, 'estado_id' => 27, 'cidade_nome' => 'Conceição do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1344, 'estado_id' => 13, 'cidade_nome' => 'Conceição dos Ouros', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1345, 'estado_id' => 25, 'cidade_nome' => 'Conchal', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1346, 'estado_id' => 25, 'cidade_nome' => 'Conchas', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1347, 'estado_id' => 24, 'cidade_nome' => 'Concórdia', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1348, 'estado_id' => 14, 'cidade_nome' => 'Concórdia do Pará', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1349, 'estado_id' => 15, 'cidade_nome' => 'Condado', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1350, 'estado_id' => 17, 'cidade_nome' => 'Condado', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1351, 'estado_id' => 5, 'cidade_nome' => 'Conde', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1352, 'estado_id' => 15, 'cidade_nome' => 'Conde', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1353, 'estado_id' => 5, 'cidade_nome' => 'Condeúba', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1354, 'estado_id' => 21, 'cidade_nome' => 'Condor', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1355, 'estado_id' => 13, 'cidade_nome' => 'Cônego Marinho', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1356, 'estado_id' => 13, 'cidade_nome' => 'Confins', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1357, 'estado_id' => 11, 'cidade_nome' => 'Confresa', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1358, 'estado_id' => 15, 'cidade_nome' => 'Congo', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1359, 'estado_id' => 13, 'cidade_nome' => 'Congonhal', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1360, 'estado_id' => 13, 'cidade_nome' => 'Congonhas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1361, 'estado_id' => 13, 'cidade_nome' => 'Congonhas do Norte', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1362, 'estado_id' => 16, 'cidade_nome' => 'Congonhinhas', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1363, 'estado_id' => 13, 'cidade_nome' => 'Conquista', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1364, 'estado_id' => 11, 'cidade_nome' => 'Conquista D\'Oeste', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1365, 'estado_id' => 13, 'cidade_nome' => 'Conselheiro Lafaiete', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1366, 'estado_id' => 16, 'cidade_nome' => 'Conselheiro Mairinck', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1367, 'estado_id' => 13, 'cidade_nome' => 'Conselheiro Pena', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1368, 'estado_id' => 13, 'cidade_nome' => 'Consolação', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1369, 'estado_id' => 21, 'cidade_nome' => 'Constantina', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1370, 'estado_id' => 13, 'cidade_nome' => 'Contagem', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1371, 'estado_id' => 16, 'cidade_nome' => 'Contenda', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1372, 'estado_id' => 5, 'cidade_nome' => 'Contendas do Sincorá', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1373, 'estado_id' => 13, 'cidade_nome' => 'Coqueiral', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1374, 'estado_id' => 21, 'cidade_nome' => 'Coqueiro Baixo', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1375, 'estado_id' => 2, 'cidade_nome' => 'Coqueiro Seco', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1376, 'estado_id' => 21, 'cidade_nome' => 'Coqueiros do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1377, 'estado_id' => 13, 'cidade_nome' => 'Coração de Jesus', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1378, 'estado_id' => 5, 'cidade_nome' => 'Coração de Maria', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1379, 'estado_id' => 16, 'cidade_nome' => 'Corbélia', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1380, 'estado_id' => 19, 'cidade_nome' => 'Cordeiro', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 1381, 'estado_id' => 25, 'cidade_nome' => 'Cordeirópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1382, 'estado_id' => 5, 'cidade_nome' => 'Cordeiros', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1383, 'estado_id' => 24, 'cidade_nome' => 'Cordilheira Alta', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1384, 'estado_id' => 13, 'cidade_nome' => 'Cordisburgo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1385, 'estado_id' => 13, 'cidade_nome' => 'Cordislândia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1386, 'estado_id' => 6, 'cidade_nome' => 'Coreaú', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1387, 'estado_id' => 15, 'cidade_nome' => 'Coremas', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1388, 'estado_id' => 12, 'cidade_nome' => 'Corguinho', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1389, 'estado_id' => 5, 'cidade_nome' => 'Coribe', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1390, 'estado_id' => 13, 'cidade_nome' => 'Corinto', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1391, 'estado_id' => 16, 'cidade_nome' => 'Cornélio Procópio', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1392, 'estado_id' => 13, 'cidade_nome' => 'Coroaci', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1393, 'estado_id' => 25, 'cidade_nome' => 'Coroados', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1394, 'estado_id' => 10, 'cidade_nome' => 'Coroatá', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1395, 'estado_id' => 13, 'cidade_nome' => 'Coromandel', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1396, 'estado_id' => 21, 'cidade_nome' => 'Coronel Barros', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1397, 'estado_id' => 21, 'cidade_nome' => 'Coronel Bicaco', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1398, 'estado_id' => 16, 'cidade_nome' => 'Coronel Domingos Soares', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1399, 'estado_id' => 20, 'cidade_nome' => 'Coronel Ezequiel', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1400, 'estado_id' => 13, 'cidade_nome' => 'Coronel Fabriciano', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1401, 'estado_id' => 24, 'cidade_nome' => 'Coronel Freitas', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1402, 'estado_id' => 20, 'cidade_nome' => 'Coronel João Pessoa', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1403, 'estado_id' => 5, 'cidade_nome' => 'Coronel João Sá', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1404, 'estado_id' => 18, 'cidade_nome' => 'Coronel José Dias', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1405, 'estado_id' => 25, 'cidade_nome' => 'Coronel Macedo', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1406, 'estado_id' => 24, 'cidade_nome' => 'Coronel Martins', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1407, 'estado_id' => 13, 'cidade_nome' => 'Coronel Murta', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1408, 'estado_id' => 13, 'cidade_nome' => 'Coronel Pacheco', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1409, 'estado_id' => 21, 'cidade_nome' => 'Coronel Pilar', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1410, 'estado_id' => 12, 'cidade_nome' => 'Coronel Sapucaia', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1411, 'estado_id' => 16, 'cidade_nome' => 'Coronel Vivida', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1412, 'estado_id' => 13, 'cidade_nome' => 'Coronel Xavier Chaves', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1413, 'estado_id' => 13, 'cidade_nome' => 'Córrego Danta', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1414, 'estado_id' => 13, 'cidade_nome' => 'Córrego do Bom Jesus', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1415, 'estado_id' => 9, 'cidade_nome' => 'Córrego do Ouro', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1416, 'estado_id' => 13, 'cidade_nome' => 'Córrego Fundo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1417, 'estado_id' => 13, 'cidade_nome' => 'Córrego Novo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1418, 'estado_id' => 24, 'cidade_nome' => 'Correia Pinto', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1419, 'estado_id' => 18, 'cidade_nome' => 'Corrente', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1420, 'estado_id' => 17, 'cidade_nome' => 'Correntes', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1421, 'estado_id' => 5, 'cidade_nome' => 'Correntina', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1422, 'estado_id' => 17, 'cidade_nome' => 'Cortês', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1423, 'estado_id' => 12, 'cidade_nome' => 'Corumbá', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1424, 'estado_id' => 9, 'cidade_nome' => 'Corumbá de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1425, 'estado_id' => 9, 'cidade_nome' => 'Corumbaíba', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1426, 'estado_id' => 25, 'cidade_nome' => 'Corumbataí', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1427, 'estado_id' => 16, 'cidade_nome' => 'Corumbataí do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1428, 'estado_id' => 22, 'cidade_nome' => 'Corumbiara', 'cidade_uf' => 'RO'],
            ['cidade_id' => 1429, 'estado_id' => 24, 'cidade_nome' => 'Corupá', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1430, 'estado_id' => 2, 'cidade_nome' => 'Coruripe', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1431, 'estado_id' => 25, 'cidade_nome' => 'Cosmópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1432, 'estado_id' => 25, 'cidade_nome' => 'Cosmorama', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1433, 'estado_id' => 22, 'cidade_nome' => 'Costa Marques', 'cidade_uf' => 'RO'],
            ['cidade_id' => 1434, 'estado_id' => 12, 'cidade_nome' => 'Costa Rica', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1435, 'estado_id' => 5, 'cidade_nome' => 'Cotegipe', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1436, 'estado_id' => 25, 'cidade_nome' => 'Cotia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1437, 'estado_id' => 21, 'cidade_nome' => 'Cotiporã', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1438, 'estado_id' => 11, 'cidade_nome' => 'Cotriguaçu', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1439, 'estado_id' => 13, 'cidade_nome' => 'Couto de Magalhães de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1440, 'estado_id' => 27, 'cidade_nome' => 'Couto Magalhães', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1441, 'estado_id' => 21, 'cidade_nome' => 'Coxilha', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1442, 'estado_id' => 12, 'cidade_nome' => 'Coxim', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1443, 'estado_id' => 15, 'cidade_nome' => 'Coxixola', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1444, 'estado_id' => 2, 'cidade_nome' => 'Craíbas', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1445, 'estado_id' => 6, 'cidade_nome' => 'Crateús', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1446, 'estado_id' => 6, 'cidade_nome' => 'Crato', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1447, 'estado_id' => 25, 'cidade_nome' => 'Cravinhos', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1448, 'estado_id' => 5, 'cidade_nome' => 'Cravolândia', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1449, 'estado_id' => 24, 'cidade_nome' => 'Criciúma', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1450, 'estado_id' => 13, 'cidade_nome' => 'Crisólita', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1451, 'estado_id' => 5, 'cidade_nome' => 'Crisópolis', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1452, 'estado_id' => 21, 'cidade_nome' => 'Crissiumal', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1453, 'estado_id' => 13, 'cidade_nome' => 'Cristais', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1454, 'estado_id' => 25, 'cidade_nome' => 'Cristais Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1455, 'estado_id' => 21, 'cidade_nome' => 'Cristal', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1456, 'estado_id' => 21, 'cidade_nome' => 'Cristal do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1457, 'estado_id' => 27, 'cidade_nome' => 'Cristalândia', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1458, 'estado_id' => 18, 'cidade_nome' => 'Cristalândia do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1459, 'estado_id' => 13, 'cidade_nome' => 'Cristália', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1460, 'estado_id' => 9, 'cidade_nome' => 'Cristalina', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1461, 'estado_id' => 13, 'cidade_nome' => 'Cristiano Otoni', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1462, 'estado_id' => 9, 'cidade_nome' => 'Cristianópolis', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1463, 'estado_id' => 13, 'cidade_nome' => 'Cristina', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1464, 'estado_id' => 26, 'cidade_nome' => 'Cristinápolis', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1465, 'estado_id' => 18, 'cidade_nome' => 'Cristino Castro', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1466, 'estado_id' => 5, 'cidade_nome' => 'Cristópolis', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1467, 'estado_id' => 9, 'cidade_nome' => 'Crixás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1468, 'estado_id' => 27, 'cidade_nome' => 'Crixás do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1469, 'estado_id' => 6, 'cidade_nome' => 'Croatá', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1470, 'estado_id' => 9, 'cidade_nome' => 'Cromínia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1471, 'estado_id' => 13, 'cidade_nome' => 'Crucilândia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1472, 'estado_id' => 6, 'cidade_nome' => 'Cruz', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1473, 'estado_id' => 21, 'cidade_nome' => 'Cruz Alta', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1474, 'estado_id' => 5, 'cidade_nome' => 'Cruz das Almas', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1475, 'estado_id' => 15, 'cidade_nome' => 'Cruz do Espírito Santo', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1476, 'estado_id' => 16, 'cidade_nome' => 'Cruz Machado', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1477, 'estado_id' => 25, 'cidade_nome' => 'Cruzália', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1478, 'estado_id' => 21, 'cidade_nome' => 'Cruzaltense', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1479, 'estado_id' => 25, 'cidade_nome' => 'Cruzeiro', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1480, 'estado_id' => 13, 'cidade_nome' => 'Cruzeiro da Fortaleza', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1481, 'estado_id' => 16, 'cidade_nome' => 'Cruzeiro do Iguaçu', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1482, 'estado_id' => 16, 'cidade_nome' => 'Cruzeiro do Oeste', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1483, 'estado_id' => 1, 'cidade_nome' => 'Cruzeiro do Sul', 'cidade_uf' => 'AC'],
            ['cidade_id' => 1484, 'estado_id' => 16, 'cidade_nome' => 'Cruzeiro do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1485, 'estado_id' => 21, 'cidade_nome' => 'Cruzeiro do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1486, 'estado_id' => 20, 'cidade_nome' => 'Cruzeta', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1487, 'estado_id' => 13, 'cidade_nome' => 'Cruzília', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1488, 'estado_id' => 16, 'cidade_nome' => 'Cruzmaltina', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1489, 'estado_id' => 25, 'cidade_nome' => 'Cubatão', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1490, 'estado_id' => 15, 'cidade_nome' => 'Cubati', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1491, 'estado_id' => 11, 'cidade_nome' => 'Cuiabá', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1492, 'estado_id' => 15, 'cidade_nome' => 'Cuité', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1493, 'estado_id' => 15, 'cidade_nome' => 'Cuité de Mamanguape', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1494, 'estado_id' => 15, 'cidade_nome' => 'Cuitegi', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1495, 'estado_id' => 22, 'cidade_nome' => 'Cujubim', 'cidade_uf' => 'RO'],
            ['cidade_id' => 1496, 'estado_id' => 9, 'cidade_nome' => 'Cumari', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1497, 'estado_id' => 17, 'cidade_nome' => 'Cumaru', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1498, 'estado_id' => 14, 'cidade_nome' => 'Cumaru do Norte', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1499, 'estado_id' => 26, 'cidade_nome' => 'Cumbe', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1500, 'estado_id' => 25, 'cidade_nome' => 'Cunha', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1501, 'estado_id' => 24, 'cidade_nome' => 'Cunha Porã', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1502, 'estado_id' => 24, 'cidade_nome' => 'Cunhataí', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1503, 'estado_id' => 13, 'cidade_nome' => 'Cuparaque', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1504, 'estado_id' => 17, 'cidade_nome' => 'Cupira', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1505, 'estado_id' => 5, 'cidade_nome' => 'Curaçá', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1506, 'estado_id' => 18, 'cidade_nome' => 'Curimatá', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1507, 'estado_id' => 14, 'cidade_nome' => 'Curionópolis', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1508, 'estado_id' => 16, 'cidade_nome' => 'Curitiba', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1509, 'estado_id' => 24, 'cidade_nome' => 'Curitibanos', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1510, 'estado_id' => 16, 'cidade_nome' => 'Curiúva', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1511, 'estado_id' => 18, 'cidade_nome' => 'Currais', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1512, 'estado_id' => 20, 'cidade_nome' => 'Currais Novos', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1513, 'estado_id' => 15, 'cidade_nome' => 'Curral de Cima', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1514, 'estado_id' => 13, 'cidade_nome' => 'Curral de Dentro', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1515, 'estado_id' => 18, 'cidade_nome' => 'Curral Novo do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1516, 'estado_id' => 15, 'cidade_nome' => 'Curral Velho', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1517, 'estado_id' => 14, 'cidade_nome' => 'Curralinho', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1518, 'estado_id' => 18, 'cidade_nome' => 'Curralinhos', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1519, 'estado_id' => 14, 'cidade_nome' => 'Curuá', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1520, 'estado_id' => 14, 'cidade_nome' => 'Curuçá', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1521, 'estado_id' => 10, 'cidade_nome' => 'Cururupu', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1522, 'estado_id' => 11, 'cidade_nome' => 'Curvelândia', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1523, 'estado_id' => 13, 'cidade_nome' => 'Curvelo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1524, 'estado_id' => 17, 'cidade_nome' => 'Custódia', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1525, 'estado_id' => 3, 'cidade_nome' => 'Cutias', 'cidade_uf' => 'AP'],
            ['cidade_id' => 1526, 'estado_id' => 9, 'cidade_nome' => 'Damianópolis', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1527, 'estado_id' => 15, 'cidade_nome' => 'Damião', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1528, 'estado_id' => 9, 'cidade_nome' => 'Damolândia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1529, 'estado_id' => 27, 'cidade_nome' => 'Darcinópolis', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1530, 'estado_id' => 5, 'cidade_nome' => 'Dário Meira', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1531, 'estado_id' => 13, 'cidade_nome' => 'Datas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1532, 'estado_id' => 21, 'cidade_nome' => 'David Canabarro', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1533, 'estado_id' => 9, 'cidade_nome' => 'Davinópolis', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1534, 'estado_id' => 10, 'cidade_nome' => 'Davinópolis', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1535, 'estado_id' => 13, 'cidade_nome' => 'Delfim Moreira', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1536, 'estado_id' => 13, 'cidade_nome' => 'Delfinópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1537, 'estado_id' => 2, 'cidade_nome' => 'Delmiro Gouveia', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1538, 'estado_id' => 13, 'cidade_nome' => 'Delta', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1539, 'estado_id' => 18, 'cidade_nome' => 'Demerval Lobão', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1540, 'estado_id' => 11, 'cidade_nome' => 'Denise', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1541, 'estado_id' => 12, 'cidade_nome' => 'Deodápolis', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1542, 'estado_id' => 6, 'cidade_nome' => 'Deputado Irapuan Pinheiro', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1543, 'estado_id' => 21, 'cidade_nome' => 'Derrubadas', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1544, 'estado_id' => 25, 'cidade_nome' => 'Descalvado', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1545, 'estado_id' => 24, 'cidade_nome' => 'Descanso', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1546, 'estado_id' => 13, 'cidade_nome' => 'Descoberto', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1547, 'estado_id' => 15, 'cidade_nome' => 'Desterro', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1548, 'estado_id' => 13, 'cidade_nome' => 'Desterro de Entre Rios', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1549, 'estado_id' => 13, 'cidade_nome' => 'Desterro do Melo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1550, 'estado_id' => 21, 'cidade_nome' => 'Dezesseis de Novembro', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1551, 'estado_id' => 25, 'cidade_nome' => 'Diadema', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1552, 'estado_id' => 15, 'cidade_nome' => 'Diamante', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1553, 'estado_id' => 16, 'cidade_nome' => 'Diamante do Norte', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1554, 'estado_id' => 16, 'cidade_nome' => 'Diamante do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1555, 'estado_id' => 16, 'cidade_nome' => 'Diamante D\'Oeste', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1556, 'estado_id' => 13, 'cidade_nome' => 'Diamantina', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1557, 'estado_id' => 11, 'cidade_nome' => 'Diamantino', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1558, 'estado_id' => 27, 'cidade_nome' => 'Dianópolis', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1559, 'estado_id' => 5, 'cidade_nome' => 'Dias d\'Ávila', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1560, 'estado_id' => 21, 'cidade_nome' => 'Dilermando de Aguiar', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1561, 'estado_id' => 13, 'cidade_nome' => 'Diogo de Vasconcelos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1562, 'estado_id' => 13, 'cidade_nome' => 'Dionísio', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1563, 'estado_id' => 24, 'cidade_nome' => 'Dionísio Cerqueira', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1564, 'estado_id' => 9, 'cidade_nome' => 'Diorama', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1565, 'estado_id' => 25, 'cidade_nome' => 'Dirce Reis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1566, 'estado_id' => 18, 'cidade_nome' => 'Dirceu Arcoverde', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1567, 'estado_id' => 26, 'cidade_nome' => 'Divina Pastora', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1568, 'estado_id' => 13, 'cidade_nome' => 'Divinésia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1569, 'estado_id' => 13, 'cidade_nome' => 'Divino', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1570, 'estado_id' => 13, 'cidade_nome' => 'Divino das Laranjeiras', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1571, 'estado_id' => 8, 'cidade_nome' => 'Divino de São Lourenço', 'cidade_uf' => 'ES'],
            ['cidade_id' => 1572, 'estado_id' => 25, 'cidade_nome' => 'Divinolândia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1573, 'estado_id' => 13, 'cidade_nome' => 'Divinolândia de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1574, 'estado_id' => 13, 'cidade_nome' => 'Divinópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1575, 'estado_id' => 9, 'cidade_nome' => 'Divinópolis de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1576, 'estado_id' => 27, 'cidade_nome' => 'Divinópolis do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1577, 'estado_id' => 13, 'cidade_nome' => 'Divisa Alegre', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1578, 'estado_id' => 13, 'cidade_nome' => 'Divisa Nova', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1579, 'estado_id' => 13, 'cidade_nome' => 'Divisópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1580, 'estado_id' => 25, 'cidade_nome' => 'Dobrada', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1581, 'estado_id' => 25, 'cidade_nome' => 'Dois Córregos', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1582, 'estado_id' => 21, 'cidade_nome' => 'Dois Irmãos', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1583, 'estado_id' => 21, 'cidade_nome' => 'Dois Irmãos das Missões', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1584, 'estado_id' => 12, 'cidade_nome' => 'Dois Irmãos do Buriti', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1585, 'estado_id' => 27, 'cidade_nome' => 'Dois Irmãos do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1586, 'estado_id' => 21, 'cidade_nome' => 'Dois Lajeados', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1587, 'estado_id' => 2, 'cidade_nome' => 'Dois Riachos', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1588, 'estado_id' => 16, 'cidade_nome' => 'Dois Vizinhos', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1589, 'estado_id' => 25, 'cidade_nome' => 'Dolcinópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1590, 'estado_id' => 11, 'cidade_nome' => 'Dom Aquino', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1591, 'estado_id' => 5, 'cidade_nome' => 'Dom Basílio', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1592, 'estado_id' => 13, 'cidade_nome' => 'Dom Bosco', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1593, 'estado_id' => 13, 'cidade_nome' => 'Dom Cavati', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1594, 'estado_id' => 14, 'cidade_nome' => 'Dom Eliseu', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1595, 'estado_id' => 18, 'cidade_nome' => 'Dom Expedito Lopes', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1596, 'estado_id' => 21, 'cidade_nome' => 'Dom Feliciano', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1597, 'estado_id' => 18, 'cidade_nome' => 'Dom Inocêncio', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1598, 'estado_id' => 13, 'cidade_nome' => 'Dom Joaquim', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1599, 'estado_id' => 5, 'cidade_nome' => 'Dom Macedo Costa', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1600, 'estado_id' => 21, 'cidade_nome' => 'Dom Pedrito', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1601, 'estado_id' => 10, 'cidade_nome' => 'Dom Pedro', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1602, 'estado_id' => 21, 'cidade_nome' => 'Dom Pedro de Alcântara', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1603, 'estado_id' => 13, 'cidade_nome' => 'Dom Silvério', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1604, 'estado_id' => 13, 'cidade_nome' => 'Dom Viçoso', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1605, 'estado_id' => 8, 'cidade_nome' => 'Domingos Martins', 'cidade_uf' => 'ES'],
            ['cidade_id' => 1606, 'estado_id' => 18, 'cidade_nome' => 'Domingos Mourão', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1607, 'estado_id' => 24, 'cidade_nome' => 'Dona Emma', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1608, 'estado_id' => 13, 'cidade_nome' => 'Dona Eusébia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1609, 'estado_id' => 21, 'cidade_nome' => 'Dona Francisca', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1610, 'estado_id' => 15, 'cidade_nome' => 'Dona Inês', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1611, 'estado_id' => 13, 'cidade_nome' => 'Dores de Campos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1612, 'estado_id' => 13, 'cidade_nome' => 'Dores de Guanhães', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1613, 'estado_id' => 13, 'cidade_nome' => 'Dores do Indaiá', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1614, 'estado_id' => 8, 'cidade_nome' => 'Dores do Rio Preto', 'cidade_uf' => 'ES'],
            ['cidade_id' => 1615, 'estado_id' => 13, 'cidade_nome' => 'Dores do Turvo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1616, 'estado_id' => 13, 'cidade_nome' => 'Doresópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1617, 'estado_id' => 17, 'cidade_nome' => 'Dormentes', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1618, 'estado_id' => 12, 'cidade_nome' => 'Douradina', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1619, 'estado_id' => 16, 'cidade_nome' => 'Douradina', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1620, 'estado_id' => 25, 'cidade_nome' => 'Dourado', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1621, 'estado_id' => 13, 'cidade_nome' => 'Douradoquara', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1622, 'estado_id' => 12, 'cidade_nome' => 'Dourados', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1623, 'estado_id' => 16, 'cidade_nome' => 'Doutor Camargo', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1624, 'estado_id' => 21, 'cidade_nome' => 'Doutor Maurício Cardoso', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1625, 'estado_id' => 24, 'cidade_nome' => 'Doutor Pedrinho', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1626, 'estado_id' => 21, 'cidade_nome' => 'Doutor Ricardo', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1627, 'estado_id' => 20, 'cidade_nome' => 'Doutor Severiano', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1628, 'estado_id' => 16, 'cidade_nome' => 'Doutor Ulysses', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1629, 'estado_id' => 9, 'cidade_nome' => 'Doverlândia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1630, 'estado_id' => 25, 'cidade_nome' => 'Dracena', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1631, 'estado_id' => 25, 'cidade_nome' => 'Duartina', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1632, 'estado_id' => 19, 'cidade_nome' => 'Duas Barras', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 1633, 'estado_id' => 15, 'cidade_nome' => 'Duas Estradas', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1634, 'estado_id' => 27, 'cidade_nome' => 'Dueré', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1635, 'estado_id' => 25, 'cidade_nome' => 'Dumont', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1636, 'estado_id' => 10, 'cidade_nome' => 'Duque Bacelar', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1637, 'estado_id' => 19, 'cidade_nome' => 'Duque de Caxias', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 1638, 'estado_id' => 13, 'cidade_nome' => 'Durandé', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1639, 'estado_id' => 25, 'cidade_nome' => 'Echaporã', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1640, 'estado_id' => 8, 'cidade_nome' => 'Ecoporanga', 'cidade_uf' => 'ES'],
            ['cidade_id' => 1641, 'estado_id' => 9, 'cidade_nome' => 'Edealina', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1642, 'estado_id' => 9, 'cidade_nome' => 'Edéia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1643, 'estado_id' => 4, 'cidade_nome' => 'Eirunepé', 'cidade_uf' => 'AM'],
            ['cidade_id' => 1644, 'estado_id' => 12, 'cidade_nome' => 'Eldorado', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1645, 'estado_id' => 25, 'cidade_nome' => 'Eldorado', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1646, 'estado_id' => 21, 'cidade_nome' => 'Eldorado do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1647, 'estado_id' => 14, 'cidade_nome' => 'Eldorado dos Carajás', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1648, 'estado_id' => 18, 'cidade_nome' => 'Elesbão Veloso', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1649, 'estado_id' => 25, 'cidade_nome' => 'Elias Fausto', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1650, 'estado_id' => 18, 'cidade_nome' => 'Eliseu Martins', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1651, 'estado_id' => 25, 'cidade_nome' => 'Elisiário', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1652, 'estado_id' => 5, 'cidade_nome' => 'Elísio Medrado', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1653, 'estado_id' => 13, 'cidade_nome' => 'Elói Mendes', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1654, 'estado_id' => 15, 'cidade_nome' => 'Emas', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1655, 'estado_id' => 25, 'cidade_nome' => 'Embaúba', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1656, 'estado_id' => 25, 'cidade_nome' => 'Embu', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1657, 'estado_id' => 25, 'cidade_nome' => 'Embu-Guaçu', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1658, 'estado_id' => 25, 'cidade_nome' => 'Emilianópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1659, 'estado_id' => 21, 'cidade_nome' => 'Encantado', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1660, 'estado_id' => 20, 'cidade_nome' => 'Encanto', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1661, 'estado_id' => 5, 'cidade_nome' => 'Encruzilhada', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1662, 'estado_id' => 21, 'cidade_nome' => 'Encruzilhada do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1663, 'estado_id' => 16, 'cidade_nome' => 'Enéas Marques', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1664, 'estado_id' => 16, 'cidade_nome' => 'Engenheiro Beltrão', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1665, 'estado_id' => 13, 'cidade_nome' => 'Engenheiro Caldas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1666, 'estado_id' => 25, 'cidade_nome' => 'Engenheiro Coelho', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1667, 'estado_id' => 13, 'cidade_nome' => 'Engenheiro Navarro', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1668, 'estado_id' => 19, 'cidade_nome' => 'Engenheiro Paulo de Frontin', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 1669, 'estado_id' => 21, 'cidade_nome' => 'Engenho Velho', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1670, 'estado_id' => 13, 'cidade_nome' => 'Entre Folhas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1671, 'estado_id' => 5, 'cidade_nome' => 'Entre Rios', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1672, 'estado_id' => 24, 'cidade_nome' => 'Entre Rios', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1673, 'estado_id' => 13, 'cidade_nome' => 'Entre Rios de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1674, 'estado_id' => 16, 'cidade_nome' => 'Entre Rios do Oeste', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1675, 'estado_id' => 21, 'cidade_nome' => 'Entre Rios do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1676, 'estado_id' => 21, 'cidade_nome' => 'Entre-Ijuís', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1677, 'estado_id' => 4, 'cidade_nome' => 'Envira', 'cidade_uf' => 'AM'],
            ['cidade_id' => 1678, 'estado_id' => 1, 'cidade_nome' => 'Epitaciolândia', 'cidade_uf' => 'AC'],
            ['cidade_id' => 1679, 'estado_id' => 20, 'cidade_nome' => 'Equador', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1680, 'estado_id' => 21, 'cidade_nome' => 'Erebango', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1681, 'estado_id' => 21, 'cidade_nome' => 'Erechim', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1682, 'estado_id' => 6, 'cidade_nome' => 'Ererê', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1683, 'estado_id' => 5, 'cidade_nome' => 'Érico Cardoso', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1684, 'estado_id' => 24, 'cidade_nome' => 'Ermo', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1685, 'estado_id' => 21, 'cidade_nome' => 'Ernestina', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1686, 'estado_id' => 21, 'cidade_nome' => 'Erval Grande', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1687, 'estado_id' => 21, 'cidade_nome' => 'Erval Seco', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1688, 'estado_id' => 24, 'cidade_nome' => 'Erval Velho', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1689, 'estado_id' => 13, 'cidade_nome' => 'Ervália', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1690, 'estado_id' => 17, 'cidade_nome' => 'Escada', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1691, 'estado_id' => 21, 'cidade_nome' => 'Esmeralda', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1692, 'estado_id' => 13, 'cidade_nome' => 'Esmeraldas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1693, 'estado_id' => 13, 'cidade_nome' => 'Espera Feliz', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1694, 'estado_id' => 15, 'cidade_nome' => 'Esperança', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1695, 'estado_id' => 21, 'cidade_nome' => 'Esperança do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1696, 'estado_id' => 16, 'cidade_nome' => 'Esperança Nova', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1697, 'estado_id' => 18, 'cidade_nome' => 'Esperantina', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1698, 'estado_id' => 27, 'cidade_nome' => 'Esperantina', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1699, 'estado_id' => 10, 'cidade_nome' => 'Esperantinópolis', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1700, 'estado_id' => 16, 'cidade_nome' => 'Espigão Alto do Iguaçu', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1701, 'estado_id' => 22, 'cidade_nome' => 'Espigão d\'Oeste', 'cidade_uf' => 'RO'],
            ['cidade_id' => 1702, 'estado_id' => 13, 'cidade_nome' => 'Espinosa', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1703, 'estado_id' => 20, 'cidade_nome' => 'Espírito Santo', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1704, 'estado_id' => 13, 'cidade_nome' => 'Espírito Santo do Dourado', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1705, 'estado_id' => 25, 'cidade_nome' => 'Espírito Santo do Pinhal', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1706, 'estado_id' => 25, 'cidade_nome' => 'Espírito Santo do Turvo', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1707, 'estado_id' => 5, 'cidade_nome' => 'Esplanada', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1708, 'estado_id' => 21, 'cidade_nome' => 'Espumoso', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1709, 'estado_id' => 21, 'cidade_nome' => 'Estação', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1710, 'estado_id' => 26, 'cidade_nome' => 'Estância', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1711, 'estado_id' => 21, 'cidade_nome' => 'Estância Velha', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1712, 'estado_id' => 21, 'cidade_nome' => 'Esteio', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1713, 'estado_id' => 13, 'cidade_nome' => 'Estiva', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1714, 'estado_id' => 25, 'cidade_nome' => 'Estiva Gerbi', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1715, 'estado_id' => 10, 'cidade_nome' => 'Estreito', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1716, 'estado_id' => 21, 'cidade_nome' => 'Estrela', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1717, 'estado_id' => 13, 'cidade_nome' => 'Estrela Dalva', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1718, 'estado_id' => 2, 'cidade_nome' => 'Estrela de Alagoas', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1719, 'estado_id' => 13, 'cidade_nome' => 'Estrela do Indaiá', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1720, 'estado_id' => 9, 'cidade_nome' => 'Estrela do Norte', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1721, 'estado_id' => 25, 'cidade_nome' => 'Estrela do Norte', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1722, 'estado_id' => 13, 'cidade_nome' => 'Estrela do Sul', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1723, 'estado_id' => 25, 'cidade_nome' => 'Estrela d\'Oeste', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1724, 'estado_id' => 21, 'cidade_nome' => 'Estrela Velha', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1725, 'estado_id' => 5, 'cidade_nome' => 'Euclides da Cunha', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1726, 'estado_id' => 25, 'cidade_nome' => 'Euclides da Cunha Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1727, 'estado_id' => 21, 'cidade_nome' => 'Eugênio de Castro', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1728, 'estado_id' => 13, 'cidade_nome' => 'Eugenópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1729, 'estado_id' => 5, 'cidade_nome' => 'Eunápolis', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1730, 'estado_id' => 6, 'cidade_nome' => 'Eusébio', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1731, 'estado_id' => 13, 'cidade_nome' => 'Ewbank da Câmara', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1732, 'estado_id' => 13, 'cidade_nome' => 'Extrema', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1733, 'estado_id' => 20, 'cidade_nome' => 'Extremoz', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1734, 'estado_id' => 17, 'cidade_nome' => 'Exu', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1735, 'estado_id' => 15, 'cidade_nome' => 'Fagundes', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1736, 'estado_id' => 21, 'cidade_nome' => 'Fagundes Varela', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1737, 'estado_id' => 9, 'cidade_nome' => 'Faina', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1738, 'estado_id' => 13, 'cidade_nome' => 'Fama', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1739, 'estado_id' => 13, 'cidade_nome' => 'Faria Lemos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1740, 'estado_id' => 6, 'cidade_nome' => 'Farias Brito', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1741, 'estado_id' => 14, 'cidade_nome' => 'Faro', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1742, 'estado_id' => 16, 'cidade_nome' => 'Farol', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1743, 'estado_id' => 21, 'cidade_nome' => 'Farroupilha', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1744, 'estado_id' => 25, 'cidade_nome' => 'Fartura', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1745, 'estado_id' => 18, 'cidade_nome' => 'Fartura do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1746, 'estado_id' => 5, 'cidade_nome' => 'Fátima', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1747, 'estado_id' => 27, 'cidade_nome' => 'Fátima', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1748, 'estado_id' => 12, 'cidade_nome' => 'Fátima do Sul', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1749, 'estado_id' => 16, 'cidade_nome' => 'Faxinal', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1750, 'estado_id' => 21, 'cidade_nome' => 'Faxinal do Soturno', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1751, 'estado_id' => 24, 'cidade_nome' => 'Faxinal dos Guedes', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1752, 'estado_id' => 21, 'cidade_nome' => 'Faxinalzinho', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1753, 'estado_id' => 9, 'cidade_nome' => 'Fazenda Nova', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1754, 'estado_id' => 16, 'cidade_nome' => 'Fazenda Rio Grande', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1755, 'estado_id' => 21, 'cidade_nome' => 'Fazenda Vilanova', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1756, 'estado_id' => 1, 'cidade_nome' => 'Feijó', 'cidade_uf' => 'AC'],
            ['cidade_id' => 1757, 'estado_id' => 5, 'cidade_nome' => 'Feira da Mata', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1758, 'estado_id' => 5, 'cidade_nome' => 'Feira de Santana', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1759, 'estado_id' => 2, 'cidade_nome' => 'Feira Grande', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1760, 'estado_id' => 17, 'cidade_nome' => 'Feira Nova', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1761, 'estado_id' => 26, 'cidade_nome' => 'Feira Nova', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1762, 'estado_id' => 10, 'cidade_nome' => 'Feira Nova do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1763, 'estado_id' => 13, 'cidade_nome' => 'Felício dos Santos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1764, 'estado_id' => 20, 'cidade_nome' => 'Felipe Guerra', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1765, 'estado_id' => 13, 'cidade_nome' => 'Felisburgo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1766, 'estado_id' => 13, 'cidade_nome' => 'Felixlândia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1767, 'estado_id' => 21, 'cidade_nome' => 'Feliz', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1768, 'estado_id' => 2, 'cidade_nome' => 'Feliz Deserto', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1769, 'estado_id' => 11, 'cidade_nome' => 'Feliz Natal', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1770, 'estado_id' => 16, 'cidade_nome' => 'Fênix', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1771, 'estado_id' => 16, 'cidade_nome' => 'Fernandes Pinheiro', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1772, 'estado_id' => 13, 'cidade_nome' => 'Fernandes Tourinho', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1773, 'estado_id' => 17, 'cidade_nome' => 'Fernando de Noronha', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1774, 'estado_id' => 10, 'cidade_nome' => 'Fernando Falcão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1775, 'estado_id' => 20, 'cidade_nome' => 'Fernando Pedroza', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1776, 'estado_id' => 25, 'cidade_nome' => 'Fernando Prestes', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1777, 'estado_id' => 25, 'cidade_nome' => 'Fernandópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1778, 'estado_id' => 25, 'cidade_nome' => 'Fernão', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1779, 'estado_id' => 25, 'cidade_nome' => 'Ferraz de Vasconcelos', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1780, 'estado_id' => 3, 'cidade_nome' => 'Ferreira Gomes', 'cidade_uf' => 'AP'],
            ['cidade_id' => 1781, 'estado_id' => 17, 'cidade_nome' => 'Ferreiros', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1782, 'estado_id' => 13, 'cidade_nome' => 'Ferros', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1783, 'estado_id' => 13, 'cidade_nome' => 'Fervedouro', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1784, 'estado_id' => 16, 'cidade_nome' => 'Figueira', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1785, 'estado_id' => 12, 'cidade_nome' => 'Figueirão', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1786, 'estado_id' => 27, 'cidade_nome' => 'Figueirópolis', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1787, 'estado_id' => 11, 'cidade_nome' => 'Figueirópolis D\'Oeste', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1788, 'estado_id' => 5, 'cidade_nome' => 'Filadélfia', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1789, 'estado_id' => 27, 'cidade_nome' => 'Filadélfia', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1790, 'estado_id' => 5, 'cidade_nome' => 'Firmino Alves', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1791, 'estado_id' => 9, 'cidade_nome' => 'Firminópolis', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1792, 'estado_id' => 2, 'cidade_nome' => 'Flexeiras', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1793, 'estado_id' => 16, 'cidade_nome' => 'Flor da Serra do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1794, 'estado_id' => 24, 'cidade_nome' => 'Flor do Sertão', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1795, 'estado_id' => 25, 'cidade_nome' => 'Flora Rica', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1796, 'estado_id' => 16, 'cidade_nome' => 'Floraí', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1797, 'estado_id' => 20, 'cidade_nome' => 'Florânia', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1798, 'estado_id' => 25, 'cidade_nome' => 'Floreal', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1799, 'estado_id' => 17, 'cidade_nome' => 'Flores', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1800, 'estado_id' => 21, 'cidade_nome' => 'Flores da Cunha', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1801, 'estado_id' => 9, 'cidade_nome' => 'Flores de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1802, 'estado_id' => 18, 'cidade_nome' => 'Flores do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1803, 'estado_id' => 17, 'cidade_nome' => 'Floresta', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1804, 'estado_id' => 16, 'cidade_nome' => 'Floresta', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1805, 'estado_id' => 5, 'cidade_nome' => 'Floresta Azul', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1806, 'estado_id' => 14, 'cidade_nome' => 'Floresta do Araguaia', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1807, 'estado_id' => 18, 'cidade_nome' => 'Floresta do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1808, 'estado_id' => 13, 'cidade_nome' => 'Florestal', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1809, 'estado_id' => 16, 'cidade_nome' => 'Florestópolis', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1810, 'estado_id' => 18, 'cidade_nome' => 'Floriano', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1811, 'estado_id' => 21, 'cidade_nome' => 'Floriano Peixoto', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1812, 'estado_id' => 24, 'cidade_nome' => 'Florianópolis', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1813, 'estado_id' => 16, 'cidade_nome' => 'Flórida', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1814, 'estado_id' => 25, 'cidade_nome' => 'Flórida Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1815, 'estado_id' => 25, 'cidade_nome' => 'Florínia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1816, 'estado_id' => 4, 'cidade_nome' => 'Fonte Boa', 'cidade_uf' => 'AM'],
            ['cidade_id' => 1817, 'estado_id' => 21, 'cidade_nome' => 'Fontoura Xavier', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1818, 'estado_id' => 13, 'cidade_nome' => 'Formiga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1819, 'estado_id' => 21, 'cidade_nome' => 'Formigueiro', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1820, 'estado_id' => 9, 'cidade_nome' => 'Formosa', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1821, 'estado_id' => 10, 'cidade_nome' => 'Formosa da Serra Negra', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1822, 'estado_id' => 16, 'cidade_nome' => 'Formosa do Oeste', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1823, 'estado_id' => 5, 'cidade_nome' => 'Formosa do Rio Preto', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1824, 'estado_id' => 24, 'cidade_nome' => 'Formosa do Sul', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1825, 'estado_id' => 9, 'cidade_nome' => 'Formoso', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1826, 'estado_id' => 13, 'cidade_nome' => 'Formoso', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1827, 'estado_id' => 27, 'cidade_nome' => 'Formoso do Araguaia', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1828, 'estado_id' => 21, 'cidade_nome' => 'Forquetinha', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1829, 'estado_id' => 6, 'cidade_nome' => 'Forquilha', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1830, 'estado_id' => 24, 'cidade_nome' => 'Forquilhinha', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1831, 'estado_id' => 6, 'cidade_nome' => 'Fortaleza', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1832, 'estado_id' => 13, 'cidade_nome' => 'Fortaleza de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1833, 'estado_id' => 27, 'cidade_nome' => 'Fortaleza do Tabocão', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1834, 'estado_id' => 10, 'cidade_nome' => 'Fortaleza dos Nogueiras', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1835, 'estado_id' => 21, 'cidade_nome' => 'Fortaleza dos Valos', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1836, 'estado_id' => 6, 'cidade_nome' => 'Fortim', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1837, 'estado_id' => 10, 'cidade_nome' => 'Fortuna', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1838, 'estado_id' => 13, 'cidade_nome' => 'Fortuna de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1839, 'estado_id' => 16, 'cidade_nome' => 'Foz do Iguaçu', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1840, 'estado_id' => 16, 'cidade_nome' => 'Foz do Jordão', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1841, 'estado_id' => 24, 'cidade_nome' => 'Fraiburgo', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1842, 'estado_id' => 25, 'cidade_nome' => 'Franca', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1843, 'estado_id' => 18, 'cidade_nome' => 'Francinópolis', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1844, 'estado_id' => 16, 'cidade_nome' => 'Francisco Alves', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1845, 'estado_id' => 18, 'cidade_nome' => 'Francisco Ayres', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1846, 'estado_id' => 13, 'cidade_nome' => 'Francisco Badaró', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1847, 'estado_id' => 16, 'cidade_nome' => 'Francisco Beltrão', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1848, 'estado_id' => 20, 'cidade_nome' => 'Francisco Dantas', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1849, 'estado_id' => 13, 'cidade_nome' => 'Francisco Dumont', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1850, 'estado_id' => 18, 'cidade_nome' => 'Francisco Macedo', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1851, 'estado_id' => 25, 'cidade_nome' => 'Francisco Morato', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1852, 'estado_id' => 13, 'cidade_nome' => 'Francisco Sá', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1853, 'estado_id' => 18, 'cidade_nome' => 'Francisco Santos', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1854, 'estado_id' => 13, 'cidade_nome' => 'Franciscópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1855, 'estado_id' => 25, 'cidade_nome' => 'Franco da Rocha', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1856, 'estado_id' => 6, 'cidade_nome' => 'Frecheirinha', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1857, 'estado_id' => 21, 'cidade_nome' => 'Frederico Westphalen', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1858, 'estado_id' => 13, 'cidade_nome' => 'Frei Gaspar', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1859, 'estado_id' => 13, 'cidade_nome' => 'Frei Inocêncio', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1860, 'estado_id' => 13, 'cidade_nome' => 'Frei Lagonegro', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1861, 'estado_id' => 15, 'cidade_nome' => 'Frei Martinho', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1862, 'estado_id' => 17, 'cidade_nome' => 'Frei Miguelinho', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1863, 'estado_id' => 26, 'cidade_nome' => 'Frei Paulo', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1864, 'estado_id' => 24, 'cidade_nome' => 'Frei Rogério', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1865, 'estado_id' => 13, 'cidade_nome' => 'Fronteira', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1866, 'estado_id' => 13, 'cidade_nome' => 'Fronteira dos Vales', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1867, 'estado_id' => 18, 'cidade_nome' => 'Fronteiras', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1868, 'estado_id' => 13, 'cidade_nome' => 'Fruta de Leite', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1869, 'estado_id' => 13, 'cidade_nome' => 'Frutal', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1870, 'estado_id' => 20, 'cidade_nome' => 'Frutuoso Gomes', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1871, 'estado_id' => 8, 'cidade_nome' => 'Fundão', 'cidade_uf' => 'ES'],
            ['cidade_id' => 1872, 'estado_id' => 13, 'cidade_nome' => 'Funilândia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1873, 'estado_id' => 25, 'cidade_nome' => 'Gabriel Monteiro', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1874, 'estado_id' => 15, 'cidade_nome' => 'Gado Bravo', 'cidade_uf' => 'PB'],
            ['cidade_id' => 1875, 'estado_id' => 25, 'cidade_nome' => 'Gália', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1876, 'estado_id' => 13, 'cidade_nome' => 'Galiléia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1877, 'estado_id' => 20, 'cidade_nome' => 'Galinhos', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1878, 'estado_id' => 24, 'cidade_nome' => 'Galvão', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1879, 'estado_id' => 17, 'cidade_nome' => 'Gameleira', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1880, 'estado_id' => 9, 'cidade_nome' => 'Gameleira de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1881, 'estado_id' => 13, 'cidade_nome' => 'Gameleiras', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1882, 'estado_id' => 5, 'cidade_nome' => 'Gandu', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1883, 'estado_id' => 17, 'cidade_nome' => 'Garanhuns', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1884, 'estado_id' => 26, 'cidade_nome' => 'Gararu', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1885, 'estado_id' => 25, 'cidade_nome' => 'Garça', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1886, 'estado_id' => 21, 'cidade_nome' => 'Garibaldi', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1887, 'estado_id' => 24, 'cidade_nome' => 'Garopaba', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1888, 'estado_id' => 14, 'cidade_nome' => 'Garrafão do Norte', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1889, 'estado_id' => 21, 'cidade_nome' => 'Garruchos', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1890, 'estado_id' => 24, 'cidade_nome' => 'Garuva', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1891, 'estado_id' => 24, 'cidade_nome' => 'Gaspar', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1892, 'estado_id' => 25, 'cidade_nome' => 'Gastão Vidigal', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1893, 'estado_id' => 11, 'cidade_nome' => 'Gaúcha do Norte', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1894, 'estado_id' => 21, 'cidade_nome' => 'Gaurama', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1895, 'estado_id' => 5, 'cidade_nome' => 'Gavião', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1896, 'estado_id' => 25, 'cidade_nome' => 'Gavião Peixoto', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1897, 'estado_id' => 18, 'cidade_nome' => 'Geminiano', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1898, 'estado_id' => 21, 'cidade_nome' => 'General Câmara', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1899, 'estado_id' => 11, 'cidade_nome' => 'General Carneiro', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1900, 'estado_id' => 16, 'cidade_nome' => 'General Carneiro', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1901, 'estado_id' => 26, 'cidade_nome' => 'General Maynard', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1902, 'estado_id' => 25, 'cidade_nome' => 'General Salgado', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1903, 'estado_id' => 6, 'cidade_nome' => 'General Sampaio', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1904, 'estado_id' => 21, 'cidade_nome' => 'Gentil', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1905, 'estado_id' => 5, 'cidade_nome' => 'Gentio do Ouro', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1906, 'estado_id' => 25, 'cidade_nome' => 'Getulina', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1907, 'estado_id' => 21, 'cidade_nome' => 'Getúlio Vargas', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1908, 'estado_id' => 18, 'cidade_nome' => 'Gilbués', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1909, 'estado_id' => 2, 'cidade_nome' => 'Girau do Ponciano', 'cidade_uf' => 'AL'],
            ['cidade_id' => 1910, 'estado_id' => 21, 'cidade_nome' => 'Giruá', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1911, 'estado_id' => 13, 'cidade_nome' => 'Glaucilândia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1912, 'estado_id' => 25, 'cidade_nome' => 'Glicério', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1913, 'estado_id' => 5, 'cidade_nome' => 'Glória', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1914, 'estado_id' => 12, 'cidade_nome' => 'Glória de Dourados', 'cidade_uf' => 'MS'],
            ['cidade_id' => 1915, 'estado_id' => 17, 'cidade_nome' => 'Glória do Goitá', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1916, 'estado_id' => 11, 'cidade_nome' => 'Glória D\'Oeste', 'cidade_uf' => 'MT'],
            ['cidade_id' => 1917, 'estado_id' => 21, 'cidade_nome' => 'Glorinha', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1918, 'estado_id' => 10, 'cidade_nome' => 'Godofredo Viana', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1919, 'estado_id' => 16, 'cidade_nome' => 'Godoy Moreira', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1920, 'estado_id' => 13, 'cidade_nome' => 'Goiabeira', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1921, 'estado_id' => 17, 'cidade_nome' => 'Goiana', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1922, 'estado_id' => 13, 'cidade_nome' => 'Goianá', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1923, 'estado_id' => 9, 'cidade_nome' => 'Goianápolis', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1924, 'estado_id' => 9, 'cidade_nome' => 'Goiandira', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1925, 'estado_id' => 9, 'cidade_nome' => 'Goianésia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1926, 'estado_id' => 14, 'cidade_nome' => 'Goianésia do Pará', 'cidade_uf' => 'PA'],
            ['cidade_id' => 1927, 'estado_id' => 9, 'cidade_nome' => 'Goiânia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1928, 'estado_id' => 20, 'cidade_nome' => 'Goianinha', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1929, 'estado_id' => 9, 'cidade_nome' => 'Goianira', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1930, 'estado_id' => 27, 'cidade_nome' => 'Goianorte', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1931, 'estado_id' => 9, 'cidade_nome' => 'Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1932, 'estado_id' => 27, 'cidade_nome' => 'Goiatins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 1933, 'estado_id' => 9, 'cidade_nome' => 'Goiatuba', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1934, 'estado_id' => 16, 'cidade_nome' => 'Goioerê', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1935, 'estado_id' => 16, 'cidade_nome' => 'Goioxim', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1936, 'estado_id' => 13, 'cidade_nome' => 'Gonçalves', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1937, 'estado_id' => 10, 'cidade_nome' => 'Gonçalves Dias', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1938, 'estado_id' => 5, 'cidade_nome' => 'Gongogi', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1939, 'estado_id' => 13, 'cidade_nome' => 'Gonzaga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1940, 'estado_id' => 13, 'cidade_nome' => 'Gouveia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1941, 'estado_id' => 9, 'cidade_nome' => 'Gouvelândia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1942, 'estado_id' => 10, 'cidade_nome' => 'Governador Archer', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1943, 'estado_id' => 24, 'cidade_nome' => 'Governador Celso Ramos', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1944, 'estado_id' => 20, 'cidade_nome' => 'Governador Dix-Sept Rosado', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1945, 'estado_id' => 10, 'cidade_nome' => 'Governador Edison Lobão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1946, 'estado_id' => 10, 'cidade_nome' => 'Governador Eugênio Barros', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1947, 'estado_id' => 22, 'cidade_nome' => 'Governador Jorge Teixeira', 'cidade_uf' => 'RO'],
            ['cidade_id' => 1948, 'estado_id' => 8, 'cidade_nome' => 'Governador Lindenberg', 'cidade_uf' => 'ES'],
            ['cidade_id' => 1949, 'estado_id' => 10, 'cidade_nome' => 'Governador Luiz Rocha', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1950, 'estado_id' => 5, 'cidade_nome' => 'Governador Mangabeira', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1951, 'estado_id' => 10, 'cidade_nome' => 'Governador Newton Bello', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1952, 'estado_id' => 10, 'cidade_nome' => 'Governador Nunes Freire', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1953, 'estado_id' => 13, 'cidade_nome' => 'Governador Valadares', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1954, 'estado_id' => 6, 'cidade_nome' => 'Graça', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1955, 'estado_id' => 10, 'cidade_nome' => 'Graça Aranha', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1956, 'estado_id' => 26, 'cidade_nome' => 'Gracho Cardoso', 'cidade_uf' => 'SE'],
            ['cidade_id' => 1957, 'estado_id' => 10, 'cidade_nome' => 'Grajaú', 'cidade_uf' => 'MA'],
            ['cidade_id' => 1958, 'estado_id' => 21, 'cidade_nome' => 'Gramado', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1959, 'estado_id' => 21, 'cidade_nome' => 'Gramado dos Loureiros', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1960, 'estado_id' => 21, 'cidade_nome' => 'Gramado Xavier', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1961, 'estado_id' => 16, 'cidade_nome' => 'Grandes Rios', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1962, 'estado_id' => 17, 'cidade_nome' => 'Granito', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1963, 'estado_id' => 6, 'cidade_nome' => 'Granja', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1964, 'estado_id' => 6, 'cidade_nome' => 'Granjeiro', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1965, 'estado_id' => 13, 'cidade_nome' => 'Grão Mogol', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1966, 'estado_id' => 24, 'cidade_nome' => 'Grão Pará', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1967, 'estado_id' => 17, 'cidade_nome' => 'Gravatá', 'cidade_uf' => 'PE'],
            ['cidade_id' => 1968, 'estado_id' => 21, 'cidade_nome' => 'Gravataí', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1969, 'estado_id' => 24, 'cidade_nome' => 'Gravatal', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1970, 'estado_id' => 6, 'cidade_nome' => 'Groaíras', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1971, 'estado_id' => 20, 'cidade_nome' => 'Grossos', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1972, 'estado_id' => 13, 'cidade_nome' => 'Grupiara', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1973, 'estado_id' => 21, 'cidade_nome' => 'Guabiju', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1974, 'estado_id' => 24, 'cidade_nome' => 'Guabiruba', 'cidade_uf' => 'SC'],
            ['cidade_id' => 1975, 'estado_id' => 8, 'cidade_nome' => 'Guaçuí', 'cidade_uf' => 'ES'],
            ['cidade_id' => 1976, 'estado_id' => 18, 'cidade_nome' => 'Guadalupe', 'cidade_uf' => 'PI'],
            ['cidade_id' => 1977, 'estado_id' => 21, 'cidade_nome' => 'Guaíba', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1978, 'estado_id' => 25, 'cidade_nome' => 'Guaiçara', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1979, 'estado_id' => 25, 'cidade_nome' => 'Guaimbê', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1980, 'estado_id' => 16, 'cidade_nome' => 'Guaíra', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1981, 'estado_id' => 25, 'cidade_nome' => 'Guaíra', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1982, 'estado_id' => 16, 'cidade_nome' => 'Guairaçá', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1983, 'estado_id' => 6, 'cidade_nome' => 'Guaiúba', 'cidade_uf' => 'CE'],
            ['cidade_id' => 1984, 'estado_id' => 4, 'cidade_nome' => 'Guajará', 'cidade_uf' => 'AM'],
            ['cidade_id' => 1985, 'estado_id' => 22, 'cidade_nome' => 'Guajará-Mirim', 'cidade_uf' => 'RO'],
            ['cidade_id' => 1986, 'estado_id' => 5, 'cidade_nome' => 'Guajeru', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1987, 'estado_id' => 20, 'cidade_nome' => 'Guamaré', 'cidade_uf' => 'RN'],
            ['cidade_id' => 1988, 'estado_id' => 16, 'cidade_nome' => 'Guamiranga', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1989, 'estado_id' => 5, 'cidade_nome' => 'Guanambi', 'cidade_uf' => 'BA'],
            ['cidade_id' => 1990, 'estado_id' => 13, 'cidade_nome' => 'Guanhães', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1991, 'estado_id' => 13, 'cidade_nome' => 'Guapé', 'cidade_uf' => 'MG'],
            ['cidade_id' => 1992, 'estado_id' => 25, 'cidade_nome' => 'Guapiaçu', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1993, 'estado_id' => 25, 'cidade_nome' => 'Guapiara', 'cidade_uf' => 'SP'],
            ['cidade_id' => 1994, 'estado_id' => 19, 'cidade_nome' => 'Guapimirim', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 1995, 'estado_id' => 16, 'cidade_nome' => 'Guapirama', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1996, 'estado_id' => 9, 'cidade_nome' => 'Guapó', 'cidade_uf' => 'GO'],
            ['cidade_id' => 1997, 'estado_id' => 21, 'cidade_nome' => 'Guaporé', 'cidade_uf' => 'RS'],
            ['cidade_id' => 1998, 'estado_id' => 16, 'cidade_nome' => 'Guaporema', 'cidade_uf' => 'PR'],
            ['cidade_id' => 1999, 'estado_id' => 25, 'cidade_nome' => 'Guará', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2000, 'estado_id' => 15, 'cidade_nome' => 'Guarabira', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2001, 'esdado_id' => 25, 'cidade_nome' => 'Guaraçaí', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2002, 'esdado_id' => 16, 'cidade_nome' => 'Guaraci', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2003, 'esdado_id' => 25, 'cidade_nome' => 'Guaraci', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2004, 'esdado_id' => 13, 'cidade_nome' => 'Guaraciaba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2005, 'esdado_id' => 24, 'cidade_nome' => 'Guaraciaba', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2006, 'esdado_id' => 6, 'cidade_nome' => 'Guaraciaba do Norte', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2007, 'esdado_id' => 13, 'cidade_nome' => 'Guaraciama', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2008, 'esdado_id' => 27, 'cidade_nome' => 'Guaraí', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2009, 'esdado_id' => 9, 'cidade_nome' => 'Guaraíta', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2010, 'esdado_id' => 6, 'cidade_nome' => 'Guaramiranga', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2011, 'esdado_id' => 24, 'cidade_nome' => 'Guaramirim', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2012, 'esdado_id' => 13, 'cidade_nome' => 'Guaranésia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2013, 'esdado_id' => 13, 'cidade_nome' => 'Guarani', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2014, 'esdado_id' => 21, 'cidade_nome' => 'Guarani das Missões', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2015, 'esdado_id' => 9, 'cidade_nome' => 'Guarani de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2016, 'esdado_id' => 25, 'cidade_nome' => 'Guarani d\'Oeste', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2017, 'esdado_id' => 16, 'cidade_nome' => 'Guaraniaçu', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2018, 'esdado_id' => 25, 'cidade_nome' => 'Guarantã', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2019, 'esdado_id' => 11, 'cidade_nome' => 'Guarantã do Norte', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2020, 'esdado_id' => 8, 'cidade_nome' => 'Guarapari', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2021, 'esdado_id' => 16, 'cidade_nome' => 'Guarapuava', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2022, 'esdado_id' => 16, 'cidade_nome' => 'Guaraqueçaba', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2023, 'esdado_id' => 13, 'cidade_nome' => 'Guarará', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2024, 'esdado_id' => 25, 'cidade_nome' => 'Guararapes', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2025, 'esdado_id' => 25, 'cidade_nome' => 'Guararema', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2026, 'esdado_id' => 5, 'cidade_nome' => 'Guaratinga', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2027, 'esdado_id' => 25, 'cidade_nome' => 'Guaratinguetá', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2028, 'esdado_id' => 16, 'cidade_nome' => 'Guaratuba', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2029, 'esdado_id' => 13, 'cidade_nome' => 'Guarda-Mor', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2030, 'esdado_id' => 25, 'cidade_nome' => 'Guareí', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2031, 'esdado_id' => 25, 'cidade_nome' => 'Guariba', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2032, 'esdado_id' => 18, 'cidade_nome' => 'Guaribas', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2033, 'esdado_id' => 9, 'cidade_nome' => 'Guarinos', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2034, 'esdado_id' => 25, 'cidade_nome' => 'Guarujá', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2035, 'esdado_id' => 24, 'cidade_nome' => 'Guarujá do Sul', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2036, 'esdado_id' => 25, 'cidade_nome' => 'Guarulhos', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2037, 'esdado_id' => 24, 'cidade_nome' => 'Guatambú', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2038, 'esdado_id' => 25, 'cidade_nome' => 'Guatapará', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2039, 'esdado_id' => 13, 'cidade_nome' => 'Guaxupé', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2040, 'esdado_id' => 12, 'cidade_nome' => 'Guia Lopes da Laguna', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2041, 'esdado_id' => 13, 'cidade_nome' => 'Guidoval', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2042, 'esdado_id' => 10, 'cidade_nome' => 'Guimarães', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2043, 'esdado_id' => 13, 'cidade_nome' => 'Guimarânia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2044, 'esdado_id' => 11, 'cidade_nome' => 'Guiratinga', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2045, 'esdado_id' => 13, 'cidade_nome' => 'Guiricema', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2046, 'esdado_id' => 13, 'cidade_nome' => 'Gurinhatã', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2047, 'esdado_id' => 15, 'cidade_nome' => 'Gurinhém', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2048, 'esdado_id' => 15, 'cidade_nome' => 'Gurjão', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2049, 'esdado_id' => 14, 'cidade_nome' => 'Gurupá', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2050, 'esdado_id' => 27, 'cidade_nome' => 'Gurupi', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2051, 'esdado_id' => 25, 'cidade_nome' => 'Guzolândia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2052, 'esdado_id' => 21, 'cidade_nome' => 'Harmonia', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2053, 'esdado_id' => 9, 'cidade_nome' => 'Heitoraí', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2054, 'esdado_id' => 13, 'cidade_nome' => 'Heliodora', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2055, 'esdado_id' => 5, 'cidade_nome' => 'Heliópolis', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2056, 'esdado_id' => 25, 'cidade_nome' => 'Herculândia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2057, 'esdado_id' => 21, 'cidade_nome' => 'Herval', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2058, 'esdado_id' => 24, 'cidade_nome' => 'Herval d\'Oeste', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2059, 'esdado_id' => 21, 'cidade_nome' => 'Herveiras', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2060, 'esdado_id' => 6, 'cidade_nome' => 'Hidrolândia', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2061, 'esdado_id' => 9, 'cidade_nome' => 'Hidrolândia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2062, 'esdado_id' => 9, 'cidade_nome' => 'Hidrolina', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2063, 'esdado_id' => 25, 'cidade_nome' => 'Holambra', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2064, 'esdado_id' => 16, 'cidade_nome' => 'Honório Serpa', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2065, 'esdado_id' => 6, 'cidade_nome' => 'Horizonte', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2066, 'esdado_id' => 21, 'cidade_nome' => 'Horizontina', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2067, 'esdado_id' => 25, 'cidade_nome' => 'Hortolândia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2068, 'esdado_id' => 18, 'cidade_nome' => 'Hugo Napoleão', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2069, 'esdado_id' => 21, 'cidade_nome' => 'Hulha Negra', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2070, 'esdado_id' => 4, 'cidade_nome' => 'Humaitá', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2071, 'esdado_id' => 21, 'cidade_nome' => 'Humaitá', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2072, 'esdado_id' => 10, 'cidade_nome' => 'Humberto de Campos', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2073, 'esdado_id' => 25, 'cidade_nome' => 'Iacanga', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2074, 'esdado_id' => 9, 'cidade_nome' => 'Iaciara', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2075, 'esdado_id' => 25, 'cidade_nome' => 'Iacri', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2076, 'esdado_id' => 5, 'cidade_nome' => 'Iaçu', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2077, 'esdado_id' => 13, 'cidade_nome' => 'Iapu', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2078, 'esdado_id' => 25, 'cidade_nome' => 'Iaras', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2079, 'esdado_id' => 17, 'cidade_nome' => 'Iati', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2080, 'esdado_id' => 16, 'cidade_nome' => 'Ibaiti', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2081, 'esdado_id' => 21, 'cidade_nome' => 'Ibarama', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2082, 'esdado_id' => 6, 'cidade_nome' => 'Ibaretama', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2083, 'esdado_id' => 25, 'cidade_nome' => 'Ibaté', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2084, 'esdado_id' => 2, 'cidade_nome' => 'Ibateguara', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2085, 'esdado_id' => 8, 'cidade_nome' => 'Ibatiba', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2086, 'esdado_id' => 16, 'cidade_nome' => 'Ibema', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2087, 'esdado_id' => 13, 'cidade_nome' => 'Ibertioga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2088, 'esdado_id' => 13, 'cidade_nome' => 'Ibiá', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2089, 'esdado_id' => 21, 'cidade_nome' => 'Ibiaçá', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2090, 'esdado_id' => 13, 'cidade_nome' => 'Ibiaí', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2091, 'esdado_id' => 24, 'cidade_nome' => 'Ibiam', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2092, 'esdado_id' => 6, 'cidade_nome' => 'Ibiapina', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2093, 'esdado_id' => 15, 'cidade_nome' => 'Ibiara', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2094, 'esdado_id' => 5, 'cidade_nome' => 'Ibiassucê', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2095, 'esdado_id' => 5, 'cidade_nome' => 'Ibicaraí', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2096, 'esdado_id' => 24, 'cidade_nome' => 'Ibicaré', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2097, 'esdado_id' => 5, 'cidade_nome' => 'Ibicoara', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2098, 'esdado_id' => 5, 'cidade_nome' => 'Ibicuí', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2099, 'esdado_id' => 6, 'cidade_nome' => 'Ibicuitinga', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2100, 'esdado_id' => 17, 'cidade_nome' => 'Ibimirim', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2101, 'esdado_id' => 5, 'cidade_nome' => 'Ibipeba', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2102, 'esdado_id' => 5, 'cidade_nome' => 'Ibipitanga', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2103, 'esdado_id' => 16, 'cidade_nome' => 'Ibiporã', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2104, 'esdado_id' => 5, 'cidade_nome' => 'Ibiquera', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2105, 'esdado_id' => 25, 'cidade_nome' => 'Ibirá', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2106, 'esdado_id' => 13, 'cidade_nome' => 'Ibiracatu', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2107, 'esdado_id' => 13, 'cidade_nome' => 'Ibiraci', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2108, 'esdado_id' => 8, 'cidade_nome' => 'Ibiraçu', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2109, 'esdado_id' => 21, 'cidade_nome' => 'Ibiraiaras', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2110, 'esdado_id' => 17, 'cidade_nome' => 'Ibirajuba', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2111, 'esdado_id' => 24, 'cidade_nome' => 'Ibirama', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2112, 'esdado_id' => 5, 'cidade_nome' => 'Ibirapitanga', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2113, 'esdado_id' => 5, 'cidade_nome' => 'Ibirapuã', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2114, 'esdado_id' => 21, 'cidade_nome' => 'Ibirapuitã', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2115, 'esdado_id' => 25, 'cidade_nome' => 'Ibirarema', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2116, 'esdado_id' => 5, 'cidade_nome' => 'Ibirataia', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2117, 'esdado_id' => 13, 'cidade_nome' => 'Ibirité', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2118, 'esdado_id' => 21, 'cidade_nome' => 'Ibirubá', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2119, 'esdado_id' => 5, 'cidade_nome' => 'Ibitiara', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2120, 'esdado_id' => 25, 'cidade_nome' => 'Ibitinga', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2121, 'esdado_id' => 8, 'cidade_nome' => 'Ibitirama', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2122, 'esdado_id' => 5, 'cidade_nome' => 'Ibititá', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2123, 'esdado_id' => 13, 'cidade_nome' => 'Ibitiúra de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2124, 'esdado_id' => 13, 'cidade_nome' => 'Ibituruna', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2125, 'esdado_id' => 25, 'cidade_nome' => 'Ibiúna', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2126, 'esdado_id' => 5, 'cidade_nome' => 'Ibotirama', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2127, 'esdado_id' => 6, 'cidade_nome' => 'Icapuí', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2128, 'esdado_id' => 24, 'cidade_nome' => 'Içara', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2129, 'esdado_id' => 13, 'cidade_nome' => 'Icaraí de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2130, 'esdado_id' => 16, 'cidade_nome' => 'Icaraíma', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2131, 'esdado_id' => 10, 'cidade_nome' => 'Icatu', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2132, 'esdado_id' => 25, 'cidade_nome' => 'Icém', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2133, 'esdado_id' => 5, 'cidade_nome' => 'Ichu', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2134, 'esdado_id' => 6, 'cidade_nome' => 'Icó', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2135, 'esdado_id' => 8, 'cidade_nome' => 'Iconha', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2136, 'esdado_id' => 20, 'cidade_nome' => 'Ielmo Marinho', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2137, 'esdado_id' => 25, 'cidade_nome' => 'Iepê', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2138, 'esdado_id' => 2, 'cidade_nome' => 'Igaci', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2139, 'esdado_id' => 5, 'cidade_nome' => 'Igaporã', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2140, 'esdado_id' => 25, 'cidade_nome' => 'Igaraçu do Tietê', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2141, 'esdado_id' => 15, 'cidade_nome' => 'Igaracy', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2142, 'esdado_id' => 25, 'cidade_nome' => 'Igarapava', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2143, 'esdado_id' => 13, 'cidade_nome' => 'Igarapé', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2144, 'esdado_id' => 10, 'cidade_nome' => 'Igarapé do Meio', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2145, 'esdado_id' => 10, 'cidade_nome' => 'Igarapé Grande', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2146, 'esdado_id' => 14, 'cidade_nome' => 'Igarapé-Açu', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2147, 'esdado_id' => 14, 'cidade_nome' => 'Igarapé-Miri', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2148, 'esdado_id' => 17, 'cidade_nome' => 'Igarassu', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2149, 'esdado_id' => 25, 'cidade_nome' => 'Igaratá', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2150, 'esdado_id' => 13, 'cidade_nome' => 'Igaratinga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2151, 'esdado_id' => 5, 'cidade_nome' => 'Igrapiúna', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2152, 'esdado_id' => 2, 'cidade_nome' => 'Igreja Nova', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2153, 'esdado_id' => 21, 'cidade_nome' => 'Igrejinha', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2154, 'esdado_id' => 19, 'cidade_nome' => 'Iguaba Grande', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2155, 'esdado_id' => 5, 'cidade_nome' => 'Iguaí', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2156, 'esdado_id' => 25, 'cidade_nome' => 'Iguape', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2157, 'esdado_id' => 17, 'cidade_nome' => 'Iguaraci', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2158, 'esdado_id' => 16, 'cidade_nome' => 'Iguaraçu', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2159, 'esdado_id' => 13, 'cidade_nome' => 'Iguatama', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2160, 'esdado_id' => 12, 'cidade_nome' => 'Iguatemi', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2161, 'esdado_id' => 6, 'cidade_nome' => 'Iguatu', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2162, 'esdado_id' => 16, 'cidade_nome' => 'Iguatu', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2163, 'esdado_id' => 13, 'cidade_nome' => 'Ijaci', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2164, 'esdado_id' => 21, 'cidade_nome' => 'Ijuí', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2165, 'esdado_id' => 25, 'cidade_nome' => 'Ilha Comprida', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2166, 'esdado_id' => 26, 'cidade_nome' => 'Ilha das Flores', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2167, 'esdado_id' => 17, 'cidade_nome' => 'Ilha de Itamaracá', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2168, 'esdado_id' => 18, 'cidade_nome' => 'Ilha Grande', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2169, 'esdado_id' => 25, 'cidade_nome' => 'Ilha Solteira', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2170, 'esdado_id' => 25, 'cidade_nome' => 'Ilhabela', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2171, 'esdado_id' => 5, 'cidade_nome' => 'Ilhéus', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2172, 'esdado_id' => 24, 'cidade_nome' => 'Ilhota', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2173, 'esdado_id' => 13, 'cidade_nome' => 'Ilicínea', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2174, 'esdado_id' => 21, 'cidade_nome' => 'Ilópolis', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2175, 'esdado_id' => 15, 'cidade_nome' => 'Imaculada', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2176, 'esdado_id' => 24, 'cidade_nome' => 'Imaruí', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2177, 'esdado_id' => 16, 'cidade_nome' => 'Imbaú', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2178, 'esdado_id' => 21, 'cidade_nome' => 'Imbé', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2179, 'esdado_id' => 13, 'cidade_nome' => 'Imbé de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2180, 'esdado_id' => 24, 'cidade_nome' => 'Imbituba', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2181, 'esdado_id' => 16, 'cidade_nome' => 'Imbituva', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2182, 'esdado_id' => 24, 'cidade_nome' => 'Imbuia', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2183, 'esdado_id' => 21, 'cidade_nome' => 'Imigrante', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2184, 'esdado_id' => 10, 'cidade_nome' => 'Imperatriz', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2185, 'esdado_id' => 16, 'cidade_nome' => 'Inácio Martins', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2186, 'esdado_id' => 9, 'cidade_nome' => 'Inaciolândia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2187, 'esdado_id' => 17, 'cidade_nome' => 'Inajá', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2188, 'esdado_id' => 16, 'cidade_nome' => 'Inajá', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2189, 'esdado_id' => 13, 'cidade_nome' => 'Inconfidentes', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2190, 'esdado_id' => 13, 'cidade_nome' => 'Indaiabira', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2191, 'esdado_id' => 24, 'cidade_nome' => 'Indaial', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2192, 'esdado_id' => 25, 'cidade_nome' => 'Indaiatuba', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2193, 'esdado_id' => 6, 'cidade_nome' => 'Independência', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2194, 'esdado_id' => 21, 'cidade_nome' => 'Independência', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2195, 'esdado_id' => 25, 'cidade_nome' => 'Indiana', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2196, 'esdado_id' => 13, 'cidade_nome' => 'Indianópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2197, 'esdado_id' => 16, 'cidade_nome' => 'Indianópolis', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2198, 'esdado_id' => 25, 'cidade_nome' => 'Indiaporã', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2199, 'esdado_id' => 9, 'cidade_nome' => 'Indiara', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2200, 'esdado_id' => 26, 'cidade_nome' => 'Indiaroba', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2201, 'estado_id' => 11, 'cidade_nome' => 'Indiavaí', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2202, 'estado_id' => 15, 'cidade_nome' => 'Ingá', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2203, 'estado_id' => 13, 'cidade_nome' => 'Ingaí', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2204, 'estado_id' => 17, 'cidade_nome' => 'Ingazeira', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2205, 'estado_id' => 21, 'cidade_nome' => 'Inhacorá', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2206, 'estado_id' => 5, 'cidade_nome' => 'Inhambupe', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2207, 'estado_id' => 14, 'cidade_nome' => 'Inhangapi', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2208, 'estado_id' => 2, 'cidade_nome' => 'Inhapi', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2209, 'estado_id' => 13, 'cidade_nome' => 'Inhapim', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2210, 'estado_id' => 13, 'cidade_nome' => 'Inhaúma', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2211, 'estado_id' => 18, 'cidade_nome' => 'Inhuma', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2212, 'estado_id' => 9, 'cidade_nome' => 'Inhumas', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2213, 'estado_id' => 13, 'cidade_nome' => 'Inimutaba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2214, 'estado_id' => 12, 'cidade_nome' => 'Inocência', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2215, 'estado_id' => 25, 'cidade_nome' => 'Inúbia Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2216, 'estado_id' => 24, 'cidade_nome' => 'Iomerê', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2217, 'estado_id' => 13, 'cidade_nome' => 'Ipaba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2218, 'estado_id' => 9, 'cidade_nome' => 'Ipameri', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2219, 'estado_id' => 13, 'cidade_nome' => 'Ipanema', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2220, 'estado_id' => 20, 'cidade_nome' => 'Ipanguaçu', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2221, 'estado_id' => 6, 'cidade_nome' => 'Ipaporanga', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2222, 'estado_id' => 13, 'cidade_nome' => 'Ipatinga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2223, 'estado_id' => 6, 'cidade_nome' => 'Ipaumirim', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2224, 'estado_id' => 25, 'cidade_nome' => 'Ipaussu', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2225, 'estado_id' => 21, 'cidade_nome' => 'Ipê', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2226, 'estado_id' => 5, 'cidade_nome' => 'Ipecaetá', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2227, 'estado_id' => 25, 'cidade_nome' => 'Iperó', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2228, 'estado_id' => 25, 'cidade_nome' => 'Ipeúna', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2229, 'estado_id' => 13, 'cidade_nome' => 'Ipiaçu', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2230, 'estado_id' => 5, 'cidade_nome' => 'Ipiaú', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2231, 'estado_id' => 25, 'cidade_nome' => 'Ipiguá', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2232, 'estado_id' => 24, 'cidade_nome' => 'Ipira', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2233, 'estado_id' => 5, 'cidade_nome' => 'Ipirá', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2234, 'estado_id' => 16, 'cidade_nome' => 'Ipiranga', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2235, 'estado_id' => 9, 'cidade_nome' => 'Ipiranga de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2236, 'estado_id' => 11, 'cidade_nome' => 'Ipiranga do Norte', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2237, 'estado_id' => 18, 'cidade_nome' => 'Ipiranga do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2238, 'estado_id' => 21, 'cidade_nome' => 'Ipiranga do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2239, 'estado_id' => 4, 'cidade_nome' => 'Ipixuna', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2240, 'estado_id' => 14, 'cidade_nome' => 'Ipixuna do Pará', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2241, 'estado_id' => 17, 'cidade_nome' => 'Ipojuca', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2242, 'estado_id' => 9, 'cidade_nome' => 'Iporá', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2243, 'estado_id' => 16, 'cidade_nome' => 'Iporã', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2244, 'estado_id' => 24, 'cidade_nome' => 'Iporã do Oeste', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2245, 'estado_id' => 25, 'cidade_nome' => 'Iporanga', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2246, 'estado_id' => 6, 'cidade_nome' => 'Ipu', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2247, 'estado_id' => 25, 'cidade_nome' => 'Ipuã', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2248, 'estado_id' => 24, 'cidade_nome' => 'Ipuaçu', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2249, 'estado_id' => 17, 'cidade_nome' => 'Ipubi', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2250, 'estado_id' => 20, 'cidade_nome' => 'Ipueira', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2251, 'estado_id' => 6, 'cidade_nome' => 'Ipueiras', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2252, 'estado_id' => 27, 'cidade_nome' => 'Ipueiras', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2253, 'estado_id' => 13, 'cidade_nome' => 'Ipuiúna', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2254, 'estado_id' => 24, 'cidade_nome' => 'Ipumirim', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2255, 'estado_id' => 5, 'cidade_nome' => 'Ipupiara', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2256, 'estado_id' => 6, 'cidade_nome' => 'Iracema', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2257, 'estado_id' => 23, 'cidade_nome' => 'Iracema', 'cidade_uf' => 'RR'],
            ['cidade_id' => 2258, 'estado_id' => 16, 'cidade_nome' => 'Iracema do Oeste', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2259, 'estado_id' => 25, 'cidade_nome' => 'Iracemápolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2260, 'estado_id' => 24, 'cidade_nome' => 'Iraceminha', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2261, 'estado_id' => 21, 'cidade_nome' => 'Iraí', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2262, 'estado_id' => 13, 'cidade_nome' => 'Iraí de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2263, 'estado_id' => 5, 'cidade_nome' => 'Irajuba', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2264, 'estado_id' => 5, 'cidade_nome' => 'Iramaia', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2265, 'estado_id' => 4, 'cidade_nome' => 'Iranduba', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2266, 'estado_id' => 24, 'cidade_nome' => 'Irani', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2267, 'estado_id' => 25, 'cidade_nome' => 'Irapuã', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2268, 'estado_id' => 25, 'cidade_nome' => 'Irapuru', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2269, 'estado_id' => 5, 'cidade_nome' => 'Iraquara', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2270, 'estado_id' => 5, 'cidade_nome' => 'Irará', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2271, 'estado_id' => 16, 'cidade_nome' => 'Irati', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2272, 'estado_id' => 24, 'cidade_nome' => 'Irati', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2273, 'estado_id' => 6, 'cidade_nome' => 'Irauçuba', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2274, 'estado_id' => 5, 'cidade_nome' => 'Irecê', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2275, 'estado_id' => 16, 'cidade_nome' => 'Iretama', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2276, 'estado_id' => 24, 'cidade_nome' => 'Irineópolis', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2277, 'estado_id' => 14, 'cidade_nome' => 'Irituia', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2278, 'estado_id' => 8, 'cidade_nome' => 'Irupi', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2279, 'estado_id' => 18, 'cidade_nome' => 'Isaías Coelho', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2280, 'estado_id' => 9, 'cidade_nome' => 'Israelândia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2281, 'estado_id' => 24, 'cidade_nome' => 'Itá', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2282, 'estado_id' => 21, 'cidade_nome' => 'Itaara', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2283, 'estado_id' => 15, 'cidade_nome' => 'Itabaiana', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2284, 'estado_id' => 26, 'cidade_nome' => 'Itabaiana', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2285, 'estado_id' => 26, 'cidade_nome' => 'Itabaianinha', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2286, 'estado_id' => 5, 'cidade_nome' => 'Itabela', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2287, 'estado_id' => 25, 'cidade_nome' => 'Itaberá', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2288, 'estado_id' => 5, 'cidade_nome' => 'Itaberaba', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2289, 'estado_id' => 9, 'cidade_nome' => 'Itaberaí', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2290, 'estado_id' => 26, 'cidade_nome' => 'Itabi', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2291, 'estado_id' => 13, 'cidade_nome' => 'Itabira', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2292, 'estado_id' => 13, 'cidade_nome' => 'Itabirinha', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2293, 'estado_id' => 13, 'cidade_nome' => 'Itabirito', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2294, 'estado_id' => 19, 'cidade_nome' => 'Itaboraí', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2295, 'estado_id' => 5, 'cidade_nome' => 'Itabuna', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2296, 'estado_id' => 27, 'cidade_nome' => 'Itacajá', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2297, 'estado_id' => 13, 'cidade_nome' => 'Itacambira', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2298, 'estado_id' => 13, 'cidade_nome' => 'Itacarambi', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2299, 'estado_id' => 5, 'cidade_nome' => 'Itacaré', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2300, 'estado_id' => 4, 'cidade_nome' => 'Itacoatiara', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2301, 'estado_id' => 17, 'cidade_nome' => 'Itacuruba', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2302, 'estado_id' => 21, 'cidade_nome' => 'Itacurubi', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2303, 'estado_id' => 5, 'cidade_nome' => 'Itaeté', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2304, 'estado_id' => 5, 'cidade_nome' => 'Itagi', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2305, 'estado_id' => 5, 'cidade_nome' => 'Itagibá', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2306, 'estado_id' => 5, 'cidade_nome' => 'Itagimirim', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2307, 'estado_id' => 8, 'cidade_nome' => 'Itaguaçu', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2308, 'estado_id' => 5, 'cidade_nome' => 'Itaguaçu da Bahia', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2309, 'estado_id' => 19, 'cidade_nome' => 'Itaguaí', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2310, 'estado_id' => 16, 'cidade_nome' => 'Itaguajé', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2311, 'estado_id' => 13, 'cidade_nome' => 'Itaguara', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2312, 'estado_id' => 9, 'cidade_nome' => 'Itaguari', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2313, 'estado_id' => 9, 'cidade_nome' => 'Itaguaru', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2314, 'estado_id' => 27, 'cidade_nome' => 'Itaguatins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2315, 'estado_id' => 25, 'cidade_nome' => 'Itaí', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2316, 'estado_id' => 17, 'cidade_nome' => 'Itaíba', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2317, 'estado_id' => 6, 'cidade_nome' => 'Itaiçaba', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2318, 'estado_id' => 18, 'cidade_nome' => 'Itainópolis', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2319, 'estado_id' => 24, 'cidade_nome' => 'Itaiópolis', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2320, 'estado_id' => 10, 'cidade_nome' => 'Itaipava do Grajaú', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2321, 'estado_id' => 13, 'cidade_nome' => 'Itaipé', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2322, 'estado_id' => 16, 'cidade_nome' => 'Itaipulândia', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2323, 'estado_id' => 6, 'cidade_nome' => 'Itaitinga', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2324, 'estado_id' => 14, 'cidade_nome' => 'Itaituba', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2325, 'estado_id' => 9, 'cidade_nome' => 'Itajá', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2326, 'estado_id' => 20, 'cidade_nome' => 'Itajá', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2327, 'estado_id' => 24, 'cidade_nome' => 'Itajaí', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2328, 'estado_id' => 25, 'cidade_nome' => 'Itajobi', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2329, 'estado_id' => 25, 'cidade_nome' => 'Itaju', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2330, 'estado_id' => 5, 'cidade_nome' => 'Itaju do Colônia', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2331, 'estado_id' => 13, 'cidade_nome' => 'Itajubá', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2332, 'estado_id' => 5, 'cidade_nome' => 'Itajuípe', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2333, 'estado_id' => 19, 'cidade_nome' => 'Italva', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2334, 'estado_id' => 5, 'cidade_nome' => 'Itamaraju', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2335, 'estado_id' => 13, 'cidade_nome' => 'Itamarandiba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2336, 'estado_id' => 4, 'cidade_nome' => 'Itamarati', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2337, 'estado_id' => 13, 'cidade_nome' => 'Itamarati de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2338, 'estado_id' => 5, 'cidade_nome' => 'Itamari', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2339, 'estado_id' => 13, 'cidade_nome' => 'Itambacuri', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2340, 'estado_id' => 16, 'cidade_nome' => 'Itambaracá', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2341, 'estado_id' => 5, 'cidade_nome' => 'Itambé', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2342, 'estado_id' => 17, 'cidade_nome' => 'Itambé', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2343, 'estado_id' => 16, 'cidade_nome' => 'Itambé', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2344, 'estado_id' => 13, 'cidade_nome' => 'Itambé do Mato Dentro', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2345, 'estado_id' => 13, 'cidade_nome' => 'Itamogi', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2346, 'estado_id' => 13, 'cidade_nome' => 'Itamonte', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2347, 'estado_id' => 5, 'cidade_nome' => 'Itanagra', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2348, 'estado_id' => 25, 'cidade_nome' => 'Itanhaém', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2349, 'estado_id' => 13, 'cidade_nome' => 'Itanhandu', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2350, 'estado_id' => 11, 'cidade_nome' => 'Itanhangá', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2351, 'estado_id' => 5, 'cidade_nome' => 'Itanhém', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2352, 'estado_id' => 13, 'cidade_nome' => 'Itanhomi', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2353, 'estado_id' => 13, 'cidade_nome' => 'Itaobim', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2354, 'estado_id' => 25, 'cidade_nome' => 'Itaóca', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2355, 'estado_id' => 19, 'cidade_nome' => 'Itaocara', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2356, 'estado_id' => 9, 'cidade_nome' => 'Itapaci', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2357, 'estado_id' => 6, 'cidade_nome' => 'Itapagé', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2358, 'estado_id' => 13, 'cidade_nome' => 'Itapagipe', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2359, 'estado_id' => 5, 'cidade_nome' => 'Itaparica', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2360, 'estado_id' => 5, 'cidade_nome' => 'Itapé', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2361, 'estado_id' => 5, 'cidade_nome' => 'Itapebi', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2362, 'estado_id' => 13, 'cidade_nome' => 'Itapecerica', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2363, 'estado_id' => 25, 'cidade_nome' => 'Itapecerica da Serra', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2364, 'estado_id' => 10, 'cidade_nome' => 'Itapecuru Mirim', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2365, 'estado_id' => 16, 'cidade_nome' => 'Itapejara d\'Oeste', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2366, 'estado_id' => 24, 'cidade_nome' => 'Itapema', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2367, 'estado_id' => 8, 'cidade_nome' => 'Itapemirim', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2368, 'estado_id' => 16, 'cidade_nome' => 'Itaperuçu', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2369, 'estado_id' => 19, 'cidade_nome' => 'Itaperuna', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2370, 'estado_id' => 17, 'cidade_nome' => 'Itapetim', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2371, 'estado_id' => 5, 'cidade_nome' => 'Itapetinga', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2372, 'estado_id' => 25, 'cidade_nome' => 'Itapetininga', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2373, 'estado_id' => 13, 'cidade_nome' => 'Itapeva', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2374, 'estado_id' => 25, 'cidade_nome' => 'Itapeva', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2375, 'estado_id' => 25, 'cidade_nome' => 'Itapevi', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2376, 'estado_id' => 5, 'cidade_nome' => 'Itapicuru', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2377, 'estado_id' => 6, 'cidade_nome' => 'Itapipoca', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2378, 'estado_id' => 25, 'cidade_nome' => 'Itapira', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2379, 'estado_id' => 4, 'cidade_nome' => 'Itapiranga', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2380, 'estado_id' => 24, 'cidade_nome' => 'Itapiranga', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2381, 'estado_id' => 9, 'cidade_nome' => 'Itapirapuã', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2382, 'estado_id' => 25, 'cidade_nome' => 'Itapirapuã Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2383, 'estado_id' => 27, 'cidade_nome' => 'Itapiratins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2384, 'estado_id' => 17, 'cidade_nome' => 'Itapissuma', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2385, 'estado_id' => 5, 'cidade_nome' => 'Itapitanga', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2386, 'estado_id' => 6, 'cidade_nome' => 'Itapiúna', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2387, 'estado_id' => 24, 'cidade_nome' => 'Itapoá', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2388, 'estado_id' => 25, 'cidade_nome' => 'Itápolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2389, 'estado_id' => 12, 'cidade_nome' => 'Itaporã', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2390, 'estado_id' => 27, 'cidade_nome' => 'Itaporã do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2391, 'estado_id' => 15, 'cidade_nome' => 'Itaporanga', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2392, 'estado_id' => 25, 'cidade_nome' => 'Itaporanga', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2393, 'estado_id' => 26, 'cidade_nome' => 'Itaporanga d\'Ajuda', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2394, 'estado_id' => 15, 'cidade_nome' => 'Itapororoca', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2395, 'estado_id' => 22, 'cidade_nome' => 'Itapuã do Oeste', 'cidade_uf' => 'RO'],
            ['cidade_id' => 2396, 'estado_id' => 21, 'cidade_nome' => 'Itapuca', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2397, 'estado_id' => 25, 'cidade_nome' => 'Itapuí', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2398, 'estado_id' => 25, 'cidade_nome' => 'Itapura', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2399, 'estado_id' => 9, 'cidade_nome' => 'Itapuranga', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2400, 'estado_id' => 25, 'cidade_nome' => 'Itaquaquecetuba', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2401, 'estado_id' => 5, 'cidade_nome' => 'Itaquara', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2402, 'estado_id' => 21, 'cidade_nome' => 'Itaqui', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2403, 'estado_id' => 12, 'cidade_nome' => 'Itaquiraí', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2404, 'estado_id' => 17, 'cidade_nome' => 'Itaquitinga', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2405, 'estado_id' => 8, 'cidade_nome' => 'Itarana', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2406, 'estado_id' => 5, 'cidade_nome' => 'Itarantim', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2407, 'estado_id' => 25, 'cidade_nome' => 'Itararé', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2408, 'estado_id' => 6, 'cidade_nome' => 'Itarema', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2409, 'estado_id' => 25, 'cidade_nome' => 'Itariri', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2410, 'estado_id' => 9, 'cidade_nome' => 'Itarumã', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2411, 'estado_id' => 21, 'cidade_nome' => 'Itati', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2412, 'estado_id' => 19, 'cidade_nome' => 'Itatiaia', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2413, 'estado_id' => 13, 'cidade_nome' => 'Itatiaiuçu', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2414, 'estado_id' => 25, 'cidade_nome' => 'Itatiba', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2415, 'estado_id' => 21, 'cidade_nome' => 'Itatiba do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2416, 'estado_id' => 5, 'cidade_nome' => 'Itatim', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2417, 'estado_id' => 25, 'cidade_nome' => 'Itatinga', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2418, 'estado_id' => 6, 'cidade_nome' => 'Itatira', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2419, 'estado_id' => 15, 'cidade_nome' => 'Itatuba', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2420, 'estado_id' => 20, 'cidade_nome' => 'Itaú', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2421, 'estado_id' => 13, 'cidade_nome' => 'Itaú de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2422, 'estado_id' => 11, 'cidade_nome' => 'Itaúba', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2423, 'estado_id' => 3, 'cidade_nome' => 'Itaubal', 'cidade_uf' => 'AP'],
            ['cidade_id' => 2424, 'estado_id' => 9, 'cidade_nome' => 'Itauçu', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2425, 'estado_id' => 18, 'cidade_nome' => 'Itaueira', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2426, 'estado_id' => 13, 'cidade_nome' => 'Itaúna', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2427, 'estado_id' => 16, 'cidade_nome' => 'Itaúna do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2428, 'estado_id' => 13, 'cidade_nome' => 'Itaverava', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2429, 'estado_id' => 13, 'cidade_nome' => 'Itinga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2430, 'estado_id' => 10, 'cidade_nome' => 'Itinga do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2431, 'estado_id' => 11, 'cidade_nome' => 'Itiquira', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2432, 'estado_id' => 25, 'cidade_nome' => 'Itirapina', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2433, 'estado_id' => 25, 'cidade_nome' => 'Itirapuã', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2434, 'estado_id' => 5, 'cidade_nome' => 'Itiruçu', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2435, 'estado_id' => 5, 'cidade_nome' => 'Itiúba', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2436, 'estado_id' => 25, 'cidade_nome' => 'Itobi', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2437, 'estado_id' => 5, 'cidade_nome' => 'Itororó', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2438, 'estado_id' => 25, 'cidade_nome' => 'Itu', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2439, 'estado_id' => 5, 'cidade_nome' => 'Ituaçu', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2440, 'estado_id' => 5, 'cidade_nome' => 'Ituberá', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2441, 'estado_id' => 13, 'cidade_nome' => 'Itueta', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2442, 'estado_id' => 13, 'cidade_nome' => 'Ituiutaba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2443, 'estado_id' => 9, 'cidade_nome' => 'Itumbiara', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2444, 'estado_id' => 13, 'cidade_nome' => 'Itumirim', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2445, 'estado_id' => 25, 'cidade_nome' => 'Itupeva', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2446, 'estado_id' => 14, 'cidade_nome' => 'Itupiranga', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2447, 'estado_id' => 24, 'cidade_nome' => 'Ituporanga', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2448, 'estado_id' => 13, 'cidade_nome' => 'Iturama', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2449, 'estado_id' => 13, 'cidade_nome' => 'Itutinga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2450, 'estado_id' => 25, 'cidade_nome' => 'Ituverava', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2451, 'estado_id' => 5, 'cidade_nome' => 'Iuiú', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2452, 'estado_id' => 8, 'cidade_nome' => 'Iúna', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2453, 'estado_id' => 16, 'cidade_nome' => 'Ivaí', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2454, 'estado_id' => 16, 'cidade_nome' => 'Ivaiporã', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2455, 'estado_id' => 16, 'cidade_nome' => 'Ivaté', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2456, 'estado_id' => 16, 'cidade_nome' => 'Ivatuba', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2457, 'estado_id' => 12, 'cidade_nome' => 'Ivinhema', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2458, 'estado_id' => 9, 'cidade_nome' => 'Ivolândia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2459, 'estado_id' => 21, 'cidade_nome' => 'Ivorá', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2460, 'estado_id' => 21, 'cidade_nome' => 'Ivoti', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2461, 'estado_id' => 17, 'cidade_nome' => 'Jaboatão dos Guararapes', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2462, 'estado_id' => 24, 'cidade_nome' => 'Jaborá', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2463, 'estado_id' => 5, 'cidade_nome' => 'Jaborandi', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2464, 'estado_id' => 25, 'cidade_nome' => 'Jaborandi', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2465, 'estado_id' => 16, 'cidade_nome' => 'Jaboti', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2466, 'estado_id' => 21, 'cidade_nome' => 'Jaboticaba', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2467, 'estado_id' => 25, 'cidade_nome' => 'Jaboticabal', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2468, 'estado_id' => 13, 'cidade_nome' => 'Jaboticatubas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2469, 'estado_id' => 20, 'cidade_nome' => 'Jaçanã', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2470, 'estado_id' => 5, 'cidade_nome' => 'Jacaraci', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2471, 'estado_id' => 15, 'cidade_nome' => 'Jacaraú', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2472, 'estado_id' => 2, 'cidade_nome' => 'Jacaré dos Homens', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2473, 'estado_id' => 14, 'cidade_nome' => 'Jacareacanga', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2474, 'estado_id' => 25, 'cidade_nome' => 'Jacareí', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2475, 'estado_id' => 16, 'cidade_nome' => 'Jacarezinho', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2476, 'estado_id' => 25, 'cidade_nome' => 'Jaci', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2477, 'estado_id' => 11, 'cidade_nome' => 'Jaciara', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2478, 'estado_id' => 13, 'cidade_nome' => 'Jacinto', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2479, 'estado_id' => 24, 'cidade_nome' => 'Jacinto Machado', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2480, 'estado_id' => 5, 'cidade_nome' => 'Jacobina', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2481, 'estado_id' => 18, 'cidade_nome' => 'Jacobina do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2482, 'estado_id' => 13, 'cidade_nome' => 'Jacuí', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2483, 'estado_id' => 2, 'cidade_nome' => 'Jacuípe', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2484, 'estado_id' => 21, 'cidade_nome' => 'Jacuizinho', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2485, 'estado_id' => 14, 'cidade_nome' => 'Jacundá', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2486, 'estado_id' => 25, 'cidade_nome' => 'Jacupiranga', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2487, 'estado_id' => 13, 'cidade_nome' => 'Jacutinga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2488, 'estado_id' => 21, 'cidade_nome' => 'Jacutinga', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2489, 'estado_id' => 16, 'cidade_nome' => 'Jaguapitã', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2490, 'estado_id' => 5, 'cidade_nome' => 'Jaguaquara', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2491, 'estado_id' => 13, 'cidade_nome' => 'Jaguaraçu', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2492, 'estado_id' => 21, 'cidade_nome' => 'Jaguarão', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2493, 'estado_id' => 5, 'cidade_nome' => 'Jaguarari', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2494, 'estado_id' => 8, 'cidade_nome' => 'Jaguaré', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2495, 'estado_id' => 6, 'cidade_nome' => 'Jaguaretama', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2496, 'estado_id' => 21, 'cidade_nome' => 'Jaguari', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2497, 'estado_id' => 16, 'cidade_nome' => 'Jaguariaíva', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2498, 'estado_id' => 6, 'cidade_nome' => 'Jaguaribara', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2499, 'estado_id' => 6, 'cidade_nome' => 'Jaguaribe', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2500, 'estado_id' => 5, 'cidade_nome' => 'Jaguaripe', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2501, 'estado_id' => 25, 'cidade_nome' => 'Jaguariúna', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2502, 'estado_id' => 6, 'cidade_nome' => 'Jaguaruana', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2503, 'estado_id' => 24, 'cidade_nome' => 'Jaguaruna', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2504, 'estado_id' => 13, 'cidade_nome' => 'Jaíba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2505, 'estado_id' => 18, 'cidade_nome' => 'Jaicós', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2506, 'estado_id' => 25, 'cidade_nome' => 'Jales', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2507, 'estado_id' => 25, 'cidade_nome' => 'Jambeiro', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2508, 'estado_id' => 13, 'cidade_nome' => 'Jampruca', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2509, 'estado_id' => 13, 'cidade_nome' => 'Janaúba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2510, 'estado_id' => 9, 'cidade_nome' => 'Jandaia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2511, 'estado_id' => 16, 'cidade_nome' => 'Jandaia do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2512, 'estado_id' => 5, 'cidade_nome' => 'Jandaíra', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2513, 'estado_id' => 20, 'cidade_nome' => 'Jandaíra', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2514, 'estado_id' => 25, 'cidade_nome' => 'Jandira', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2515, 'estado_id' => 20, 'cidade_nome' => 'Janduís', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2516, 'estado_id' => 11, 'cidade_nome' => 'Jangada', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2517, 'estado_id' => 16, 'cidade_nome' => 'Janiópolis', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2518, 'estado_id' => 13, 'cidade_nome' => 'Januária', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2519, 'estado_id' => 20, 'cidade_nome' => 'Januário Cicco', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2520, 'estado_id' => 13, 'cidade_nome' => 'Japaraíba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2521, 'estado_id' => 2, 'cidade_nome' => 'Japaratinga', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2522, 'estado_id' => 26, 'cidade_nome' => 'Japaratuba', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2523, 'estado_id' => 19, 'cidade_nome' => 'Japeri', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2524, 'estado_id' => 20, 'cidade_nome' => 'Japi', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2525, 'estado_id' => 16, 'cidade_nome' => 'Japira', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2526, 'estado_id' => 26, 'cidade_nome' => 'Japoatã', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2527, 'estado_id' => 13, 'cidade_nome' => 'Japonvar', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2528, 'estado_id' => 12, 'cidade_nome' => 'Japorã', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2529, 'estado_id' => 4, 'cidade_nome' => 'Japurá', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2530, 'estado_id' => 16, 'cidade_nome' => 'Japurá', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2531, 'estado_id' => 17, 'cidade_nome' => 'Jaqueira', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2532, 'estado_id' => 21, 'cidade_nome' => 'Jaquirana', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2533, 'estado_id' => 9, 'cidade_nome' => 'Jaraguá', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2534, 'estado_id' => 24, 'cidade_nome' => 'Jaraguá do Sul', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2535, 'estado_id' => 12, 'cidade_nome' => 'Jaraguari', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2536, 'estado_id' => 2, 'cidade_nome' => 'Jaramataia', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2537, 'estado_id' => 6, 'cidade_nome' => 'Jardim', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2538, 'estado_id' => 12, 'cidade_nome' => 'Jardim', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2539, 'estado_id' => 16, 'cidade_nome' => 'Jardim Alegre', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2540, 'estado_id' => 20, 'cidade_nome' => 'Jardim de Angicos', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2541, 'estado_id' => 20, 'cidade_nome' => 'Jardim de Piranhas', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2542, 'estado_id' => 18, 'cidade_nome' => 'Jardim do Mulato', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2543, 'estado_id' => 20, 'cidade_nome' => 'Jardim do Seridó', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2544, 'estado_id' => 16, 'cidade_nome' => 'Jardim Olinda', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2545, 'estado_id' => 24, 'cidade_nome' => 'Jardinópolis', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2546, 'estado_id' => 25, 'cidade_nome' => 'Jardinópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2547, 'estado_id' => 21, 'cidade_nome' => 'Jari', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2548, 'estado_id' => 25, 'cidade_nome' => 'Jarinu', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2549, 'estado_id' => 22, 'cidade_nome' => 'Jaru', 'cidade_uf' => 'RO'],
            ['cidade_id' => 2550, 'estado_id' => 9, 'cidade_nome' => 'Jataí', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2551, 'estado_id' => 16, 'cidade_nome' => 'Jataizinho', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2552, 'estado_id' => 17, 'cidade_nome' => 'Jataúba', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2553, 'estado_id' => 12, 'cidade_nome' => 'Jateí', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2554, 'estado_id' => 6, 'cidade_nome' => 'Jati', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2555, 'estado_id' => 10, 'cidade_nome' => 'Jatobá', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2556, 'estado_id' => 17, 'cidade_nome' => 'Jatobá', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2557, 'estado_id' => 18, 'cidade_nome' => 'Jatobá do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2558, 'estado_id' => 25, 'cidade_nome' => 'Jaú', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2559, 'estado_id' => 27, 'cidade_nome' => 'Jaú do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2560, 'estado_id' => 9, 'cidade_nome' => 'Jaupaci', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2561, 'estado_id' => 11, 'cidade_nome' => 'Jauru', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2562, 'estado_id' => 13, 'cidade_nome' => 'Jeceaba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2563, 'estado_id' => 13, 'cidade_nome' => 'Jenipapo de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2564, 'estado_id' => 10, 'cidade_nome' => 'Jenipapo dos Vieiras', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2565, 'estado_id' => 13, 'cidade_nome' => 'Jequeri', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2566, 'estado_id' => 2, 'cidade_nome' => 'Jequiá da Praia', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2567, 'estado_id' => 5, 'cidade_nome' => 'Jequié', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2568, 'estado_id' => 13, 'cidade_nome' => 'Jequitaí', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2569, 'estado_id' => 13, 'cidade_nome' => 'Jequitibá', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2570, 'estado_id' => 13, 'cidade_nome' => 'Jequitinhonha', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2571, 'estado_id' => 5, 'cidade_nome' => 'Jeremoabo', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2572, 'estado_id' => 15, 'cidade_nome' => 'Jericó', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2573, 'estado_id' => 25, 'cidade_nome' => 'Jeriquara', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2574, 'estado_id' => 8, 'cidade_nome' => 'Jerônimo Monteiro', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2575, 'estado_id' => 18, 'cidade_nome' => 'Jerumenha', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2576, 'estado_id' => 13, 'cidade_nome' => 'Jesuânia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2577, 'estado_id' => 16, 'cidade_nome' => 'Jesuítas', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2578, 'estado_id' => 9, 'cidade_nome' => 'Jesúpolis', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2579, 'estado_id' => 6, 'cidade_nome' => 'Jijoca de Jericoacoara', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2580, 'estado_id' => 22, 'cidade_nome' => 'Ji-Paraná', 'cidade_uf' => 'RO'],
            ['cidade_id' => 2581, 'estado_id' => 5, 'cidade_nome' => 'Jiquiriçá', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2582, 'estado_id' => 5, 'cidade_nome' => 'Jitaúna', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2583, 'estado_id' => 24, 'cidade_nome' => 'Joaçaba', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2584, 'estado_id' => 13, 'cidade_nome' => 'Joaíma', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2585, 'estado_id' => 13, 'cidade_nome' => 'Joanésia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2586, 'estado_id' => 25, 'cidade_nome' => 'Joanópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2587, 'estado_id' => 17, 'cidade_nome' => 'João Alfredo', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2588, 'estado_id' => 20, 'cidade_nome' => 'João Câmara', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2589, 'estado_id' => 18, 'cidade_nome' => 'João Costa', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2590, 'estado_id' => 20, 'cidade_nome' => 'João Dias', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2591, 'estado_id' => 5, 'cidade_nome' => 'João Dourado', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2592, 'estado_id' => 10, 'cidade_nome' => 'João Lisboa', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2593, 'estado_id' => 13, 'cidade_nome' => 'João Monlevade', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2594, 'estado_id' => 8, 'cidade_nome' => 'João Neiva', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2595, 'estado_id' => 15, 'cidade_nome' => 'João Pessoa', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2596, 'estado_id' => 13, 'cidade_nome' => 'João Pinheiro', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2597, 'estado_id' => 25, 'cidade_nome' => 'João Ramalho', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2598, 'estado_id' => 13, 'cidade_nome' => 'Joaquim Felício', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2599, 'estado_id' => 2, 'cidade_nome' => 'Joaquim Gomes', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2600, 'estado_id' => 17, 'cidade_nome' => 'Joaquim Nabuco', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2601, 'estado_id' => 18, 'cidade_nome' => 'Joaquim Pires', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2602, 'estado_id' => 16, 'cidade_nome' => 'Joaquim Távora', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2603, 'estado_id' => 15, 'cidade_nome' => 'Joca Claudino', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2604, 'estado_id' => 18, 'cidade_nome' => 'Joca Marques', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2605, 'estado_id' => 21, 'cidade_nome' => 'Jóia', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2606, 'estado_id' => 24, 'cidade_nome' => 'Joinville', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2607, 'estado_id' => 13, 'cidade_nome' => 'Jordânia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2608, 'estado_id' => 1, 'cidade_nome' => 'Jordão', 'cidade_uf' => 'AC'],
            ['cidade_id' => 2609, 'estado_id' => 24, 'cidade_nome' => 'José Boiteux', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2610, 'estado_id' => 25, 'cidade_nome' => 'José Bonifácio', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2611, 'estado_id' => 20, 'cidade_nome' => 'José da Penha', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2612, 'estado_id' => 18, 'cidade_nome' => 'José de Freitas', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2613, 'estado_id' => 13, 'cidade_nome' => 'José Gonçalves de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2614, 'estado_id' => 13, 'cidade_nome' => 'José Raydan', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2615, 'estado_id' => 10, 'cidade_nome' => 'Joselândia', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2616, 'estado_id' => 13, 'cidade_nome' => 'Josenópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2617, 'estado_id' => 9, 'cidade_nome' => 'Joviânia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2618, 'estado_id' => 11, 'cidade_nome' => 'Juara', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2619, 'estado_id' => 15, 'cidade_nome' => 'Juarez Távora', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2620, 'estado_id' => 27, 'cidade_nome' => 'Juarina', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2621, 'estado_id' => 13, 'cidade_nome' => 'Juatuba', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2622, 'estado_id' => 15, 'cidade_nome' => 'Juazeirinho', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2623, 'estado_id' => 5, 'cidade_nome' => 'Juazeiro', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2624, 'estado_id' => 6, 'cidade_nome' => 'Juazeiro do Norte', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2625, 'estado_id' => 18, 'cidade_nome' => 'Juazeiro do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2626, 'estado_id' => 6, 'cidade_nome' => 'Jucás', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2627, 'estado_id' => 17, 'cidade_nome' => 'Jucati', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2628, 'estado_id' => 5, 'cidade_nome' => 'Jucuruçu', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2629, 'estado_id' => 20, 'cidade_nome' => 'Jucurutu', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2630, 'estado_id' => 11, 'cidade_nome' => 'Juína', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2631, 'estado_id' => 13, 'cidade_nome' => 'Juiz de Fora', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2632, 'estado_id' => 18, 'cidade_nome' => 'Júlio Borges', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2633, 'estado_id' => 21, 'cidade_nome' => 'Júlio de Castilhos', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2634, 'estado_id' => 25, 'cidade_nome' => 'Júlio Mesquita', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2635, 'estado_id' => 25, 'cidade_nome' => 'Jumirim', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2636, 'estado_id' => 10, 'cidade_nome' => 'Junco do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2637, 'estado_id' => 15, 'cidade_nome' => 'Junco do Seridó', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2638, 'estado_id' => 2, 'cidade_nome' => 'Jundiá', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2639, 'estado_id' => 20, 'cidade_nome' => 'Jundiá', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2640, 'estado_id' => 25, 'cidade_nome' => 'Jundiaí', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2641, 'estado_id' => 16, 'cidade_nome' => 'Jundiaí do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2642, 'estado_id' => 2, 'cidade_nome' => 'Junqueiro', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2643, 'estado_id' => 25, 'cidade_nome' => 'Junqueirópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2644, 'estado_id' => 17, 'cidade_nome' => 'Jupi', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2645, 'estado_id' => 24, 'cidade_nome' => 'Jupiá', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2646, 'estado_id' => 25, 'cidade_nome' => 'Juquiá', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2647, 'estado_id' => 25, 'cidade_nome' => 'Juquitiba', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2648, 'estado_id' => 13, 'cidade_nome' => 'Juramento', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2649, 'estado_id' => 16, 'cidade_nome' => 'Juranda', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2650, 'estado_id' => 17, 'cidade_nome' => 'Jurema', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2651, 'estado_id' => 18, 'cidade_nome' => 'Jurema', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2652, 'estado_id' => 15, 'cidade_nome' => 'Juripiranga', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2653, 'estado_id' => 15, 'cidade_nome' => 'Juru', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2654, 'estado_id' => 4, 'cidade_nome' => 'Juruá', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2655, 'estado_id' => 13, 'cidade_nome' => 'Juruaia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2656, 'estado_id' => 11, 'cidade_nome' => 'Juruena', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2657, 'estado_id' => 14, 'cidade_nome' => 'Juruti', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2658, 'estado_id' => 11, 'cidade_nome' => 'Juscimeira', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2659, 'estado_id' => 5, 'cidade_nome' => 'Jussara', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2660, 'estado_id' => 9, 'cidade_nome' => 'Jussara', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2661, 'estado_id' => 16, 'cidade_nome' => 'Jussara', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2662, 'estado_id' => 5, 'cidade_nome' => 'Jussari', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2663, 'estado_id' => 5, 'cidade_nome' => 'Jussiape', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2664, 'estado_id' => 4, 'cidade_nome' => 'Jutaí', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2665, 'estado_id' => 12, 'cidade_nome' => 'Juti', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2666, 'estado_id' => 13, 'cidade_nome' => 'Juvenília', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2667, 'estado_id' => 16, 'cidade_nome' => 'Kaloré', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2668, 'estado_id' => 4, 'cidade_nome' => 'Lábrea', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2669, 'estado_id' => 24, 'cidade_nome' => 'Lacerdópolis', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2670, 'estado_id' => 13, 'cidade_nome' => 'Ladainha', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2671, 'estado_id' => 12, 'cidade_nome' => 'Ladário', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2672, 'estado_id' => 5, 'cidade_nome' => 'Lafaiete Coutinho', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2673, 'estado_id' => 13, 'cidade_nome' => 'Lagamar', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2674, 'estado_id' => 26, 'cidade_nome' => 'Lagarto', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2675, 'estado_id' => 24, 'cidade_nome' => 'Lages', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2676, 'estado_id' => 10, 'cidade_nome' => 'Lago da Pedra', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2677, 'estado_id' => 10, 'cidade_nome' => 'Lago do Junco', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2678, 'estado_id' => 10, 'cidade_nome' => 'Lago dos Rodrigues', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2679, 'estado_id' => 10, 'cidade_nome' => 'Lago Verde', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2680, 'estado_id' => 15, 'cidade_nome' => 'Lagoa', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2681, 'estado_id' => 18, 'cidade_nome' => 'Lagoa Alegre', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2682, 'estado_id' => 21, 'cidade_nome' => 'Lagoa Bonita do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2683, 'estado_id' => 2, 'cidade_nome' => 'Lagoa da Canoa', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2684, 'estado_id' => 27, 'cidade_nome' => 'Lagoa da Confusão', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2685, 'estado_id' => 13, 'cidade_nome' => 'Lagoa da Prata', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2686, 'estado_id' => 20, 'cidade_nome' => 'Lagoa d\'Anta', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2687, 'estado_id' => 15, 'cidade_nome' => 'Lagoa de Dentro', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2688, 'estado_id' => 17, 'cidade_nome' => 'Lagoa de Itaenga', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2689, 'estado_id' => 20, 'cidade_nome' => 'Lagoa de Pedras', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2690, 'estado_id' => 18, 'cidade_nome' => 'Lagoa de São Francisco', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2691, 'estado_id' => 20, 'cidade_nome' => 'Lagoa de Velhos', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2692, 'estado_id' => 18, 'cidade_nome' => 'Lagoa do Barro do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2693, 'estado_id' => 17, 'cidade_nome' => 'Lagoa do Carro', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2694, 'estado_id' => 10, 'cidade_nome' => 'Lagoa do Mato', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2695, 'estado_id' => 17, 'cidade_nome' => 'Lagoa do Ouro', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2696, 'estado_id' => 18, 'cidade_nome' => 'Lagoa do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2697, 'estado_id' => 18, 'cidade_nome' => 'Lagoa do Sítio', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2698, 'estado_id' => 27, 'cidade_nome' => 'Lagoa do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2699, 'estado_id' => 17, 'cidade_nome' => 'Lagoa dos Gatos', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2700, 'estado_id' => 13, 'cidade_nome' => 'Lagoa dos Patos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2701, 'estado_id' => 21, 'cidade_nome' => 'Lagoa dos Três Cantos', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2702, 'estado_id' => 13, 'cidade_nome' => 'Lagoa Dourada', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2703, 'estado_id' => 13, 'cidade_nome' => 'Lagoa Formosa', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2704, 'estado_id' => 13, 'cidade_nome' => 'Lagoa Grande', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2705, 'estado_id' => 17, 'cidade_nome' => 'Lagoa Grande', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2706, 'estado_id' => 10, 'cidade_nome' => 'Lagoa Grande do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2707, 'estado_id' => 20, 'cidade_nome' => 'Lagoa Nova', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2708, 'estado_id' => 5, 'cidade_nome' => 'Lagoa Real', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2709, 'estado_id' => 20, 'cidade_nome' => 'Lagoa Salgada', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2710, 'estado_id' => 9, 'cidade_nome' => 'Lagoa Santa', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2711, 'estado_id' => 13, 'cidade_nome' => 'Lagoa Santa', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2712, 'estado_id' => 15, 'cidade_nome' => 'Lagoa Seca', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2713, 'estado_id' => 21, 'cidade_nome' => 'Lagoa Vermelha', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2714, 'estado_id' => 21, 'cidade_nome' => 'Lagoão', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2715, 'estado_id' => 25, 'cidade_nome' => 'Lagoinha', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2716, 'estado_id' => 18, 'cidade_nome' => 'Lagoinha do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2717, 'estado_id' => 24, 'cidade_nome' => 'Laguna', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2718, 'estado_id' => 12, 'cidade_nome' => 'Laguna Carapã', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2719, 'estado_id' => 5, 'cidade_nome' => 'Laje', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2720, 'estado_id' => 19, 'cidade_nome' => 'Laje do Muriaé', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2721, 'estado_id' => 21, 'cidade_nome' => 'Lajeado', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2722, 'estado_id' => 27, 'cidade_nome' => 'Lajeado', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2723, 'estado_id' => 21, 'cidade_nome' => 'Lajeado do Bugre', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2724, 'estado_id' => 24, 'cidade_nome' => 'Lajeado Grande', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2725, 'estado_id' => 10, 'cidade_nome' => 'Lajeado Novo', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2726, 'estado_id' => 5, 'cidade_nome' => 'Lajedão', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2727, 'estado_id' => 5, 'cidade_nome' => 'Lajedinho', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2728, 'estado_id' => 17, 'cidade_nome' => 'Lajedo', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2729, 'estado_id' => 5, 'cidade_nome' => 'Lajedo do Tabocal', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2730, 'estado_id' => 20, 'cidade_nome' => 'Lajes', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2731, 'estado_id' => 20, 'cidade_nome' => 'Lajes Pintadas', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2732, 'estado_id' => 13, 'cidade_nome' => 'Lajinha', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2733, 'estado_id' => 5, 'cidade_nome' => 'Lamarão', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2734, 'estado_id' => 13, 'cidade_nome' => 'Lambari', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2735, 'estado_id' => 11, 'cidade_nome' => 'Lambari D\'Oeste', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2736, 'estado_id' => 13, 'cidade_nome' => 'Lamim', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2737, 'estado_id' => 18, 'cidade_nome' => 'Landri Sales', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2738, 'estado_id' => 16, 'cidade_nome' => 'Lapa', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2739, 'estado_id' => 5, 'cidade_nome' => 'Lapão', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2740, 'estado_id' => 8, 'cidade_nome' => 'Laranja da Terra', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2741, 'estado_id' => 13, 'cidade_nome' => 'Laranjal', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2742, 'estado_id' => 16, 'cidade_nome' => 'Laranjal', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2743, 'estado_id' => 3, 'cidade_nome' => 'Laranjal do Jari', 'cidade_uf' => 'AP'],
            ['cidade_id' => 2744, 'estado_id' => 25, 'cidade_nome' => 'Laranjal Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2745, 'estado_id' => 26, 'cidade_nome' => 'Laranjeiras', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2746, 'estado_id' => 16, 'cidade_nome' => 'Laranjeiras do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2747, 'estado_id' => 13, 'cidade_nome' => 'Lassance', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2748, 'estado_id' => 15, 'cidade_nome' => 'Lastro', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2749, 'estado_id' => 24, 'cidade_nome' => 'Laurentino', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2750, 'estado_id' => 5, 'cidade_nome' => 'Lauro de Freitas', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2751, 'estado_id' => 24, 'cidade_nome' => 'Lauro Muller', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2752, 'estado_id' => 27, 'cidade_nome' => 'Lavandeira', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2753, 'estado_id' => 25, 'cidade_nome' => 'Lavínia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2754, 'estado_id' => 13, 'cidade_nome' => 'Lavras', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2755, 'estado_id' => 6, 'cidade_nome' => 'Lavras da Mangabeira', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2756, 'estado_id' => 21, 'cidade_nome' => 'Lavras do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2757, 'estado_id' => 25, 'cidade_nome' => 'Lavrinhas', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2758, 'estado_id' => 13, 'cidade_nome' => 'Leandro Ferreira', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2759, 'estado_id' => 24, 'cidade_nome' => 'Lebon Régis', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2760, 'estado_id' => 25, 'cidade_nome' => 'Leme', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2761, 'estado_id' => 13, 'cidade_nome' => 'Leme do Prado', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2762, 'estado_id' => 5, 'cidade_nome' => 'Lençóis', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2763, 'estado_id' => 25, 'cidade_nome' => 'Lençóis Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2764, 'estado_id' => 24, 'cidade_nome' => 'Leoberto Leal', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2765, 'estado_id' => 13, 'cidade_nome' => 'Leopoldina', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2766, 'estado_id' => 9, 'cidade_nome' => 'Leopoldo de Bulhões', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2767, 'estado_id' => 16, 'cidade_nome' => 'Leópolis', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2768, 'estado_id' => 21, 'cidade_nome' => 'Liberato Salzano', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2769, 'estado_id' => 13, 'cidade_nome' => 'Liberdade', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2770, 'estado_id' => 5, 'cidade_nome' => 'Licínio de Almeida', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2771, 'estado_id' => 16, 'cidade_nome' => 'Lidianópolis', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2772, 'estado_id' => 10, 'cidade_nome' => 'Lima Campos', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2773, 'estado_id' => 13, 'cidade_nome' => 'Lima Duarte', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2774, 'estado_id' => 25, 'cidade_nome' => 'Limeira', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2775, 'estado_id' => 13, 'cidade_nome' => 'Limeira do Oeste', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2776, 'estado_id' => 17, 'cidade_nome' => 'Limoeiro', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2777, 'estado_id' => 2, 'cidade_nome' => 'Limoeiro de Anadia', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2778, 'estado_id' => 14, 'cidade_nome' => 'Limoeiro do Ajuru', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2779, 'estado_id' => 6, 'cidade_nome' => 'Limoeiro do Norte', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2780, 'estado_id' => 16, 'cidade_nome' => 'Lindoeste', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2781, 'estado_id' => 25, 'cidade_nome' => 'Lindóia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2782, 'estado_id' => 24, 'cidade_nome' => 'Lindóia do Sul', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2783, 'estado_id' => 21, 'cidade_nome' => 'Lindolfo Collor', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2784, 'estado_id' => 21, 'cidade_nome' => 'Linha Nova', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2785, 'estado_id' => 8, 'cidade_nome' => 'Linhares', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2786, 'estado_id' => 25, 'cidade_nome' => 'Lins', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2787, 'estado_id' => 15, 'cidade_nome' => 'Livramento', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2788, 'estado_id' => 5, 'cidade_nome' => 'Livramento de Nossa Senhora', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2789, 'estado_id' => 27, 'cidade_nome' => 'Lizarda', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2790, 'estado_id' => 16, 'cidade_nome' => 'Loanda', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2791, 'estado_id' => 16, 'cidade_nome' => 'Lobato', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2792, 'estado_id' => 15, 'cidade_nome' => 'Logradouro', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2793, 'estado_id' => 16, 'cidade_nome' => 'Londrina', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2794, 'estado_id' => 13, 'cidade_nome' => 'Lontra', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2795, 'estado_id' => 24, 'cidade_nome' => 'Lontras', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2796, 'estado_id' => 25, 'cidade_nome' => 'Lorena', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2797, 'estado_id' => 10, 'cidade_nome' => 'Loreto', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2798, 'estado_id' => 25, 'cidade_nome' => 'Lourdes', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2799, 'estado_id' => 25, 'cidade_nome' => 'Louveira', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2800, 'estado_id' => 11, 'cidade_nome' => 'Lucas do Rio Verde', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2801, 'estado_id' => 25, 'cidade_nome' => 'Lucélia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2802, 'estado_id' => 15, 'cidade_nome' => 'Lucena', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2803, 'estado_id' => 25, 'cidade_nome' => 'Lucianópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2804, 'estado_id' => 11, 'cidade_nome' => 'Luciara', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2805, 'estado_id' => 20, 'cidade_nome' => 'Lucrécia', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2806, 'estado_id' => 25, 'cidade_nome' => 'Luís Antônio', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2807, 'estado_id' => 18, 'cidade_nome' => 'Luís Correia', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2808, 'estado_id' => 10, 'cidade_nome' => 'Luís Domingues', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2809, 'estado_id' => 5, 'cidade_nome' => 'Luís Eduardo Magalhães', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2810, 'estado_id' => 20, 'cidade_nome' => 'Luís Gomes', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2811, 'estado_id' => 13, 'cidade_nome' => 'Luisburgo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2812, 'estado_id' => 13, 'cidade_nome' => 'Luislândia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2813, 'estado_id' => 24, 'cidade_nome' => 'Luiz Alves', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2814, 'estado_id' => 16, 'cidade_nome' => 'Luiziana', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2815, 'estado_id' => 25, 'cidade_nome' => 'Luiziânia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2816, 'estado_id' => 13, 'cidade_nome' => 'Luminárias', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2817, 'estado_id' => 16, 'cidade_nome' => 'Lunardelli', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2818, 'estado_id' => 25, 'cidade_nome' => 'Lupércio', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2819, 'estado_id' => 16, 'cidade_nome' => 'Lupionópolis', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2820, 'estado_id' => 25, 'cidade_nome' => 'Lutécia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2821, 'estado_id' => 13, 'cidade_nome' => 'Luz', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2822, 'estado_id' => 24, 'cidade_nome' => 'Luzerna', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2823, 'estado_id' => 9, 'cidade_nome' => 'Luziânia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2824, 'estado_id' => 18, 'cidade_nome' => 'Luzilândia', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2825, 'estado_id' => 27, 'cidade_nome' => 'Luzinópolis', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2826, 'estado_id' => 19, 'cidade_nome' => 'Macaé', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2827, 'estado_id' => 20, 'cidade_nome' => 'Macaíba', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2828, 'estado_id' => 5, 'cidade_nome' => 'Macajuba', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2829, 'estado_id' => 21, 'cidade_nome' => 'Maçambará', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2830, 'estado_id' => 26, 'cidade_nome' => 'Macambira', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2831, 'estado_id' => 3, 'cidade_nome' => 'Macapá', 'cidade_uf' => 'AP'],
            ['cidade_id' => 2832, 'estado_id' => 17, 'cidade_nome' => 'Macaparana', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2833, 'estado_id' => 5, 'cidade_nome' => 'Macarani', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2834, 'estado_id' => 25, 'cidade_nome' => 'Macatuba', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2835, 'estado_id' => 20, 'cidade_nome' => 'Macau', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2836, 'estado_id' => 25, 'cidade_nome' => 'Macaubal', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2837, 'estado_id' => 5, 'cidade_nome' => 'Macaúbas', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2838, 'estado_id' => 25, 'cidade_nome' => 'Macedônia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2839, 'estado_id' => 2, 'cidade_nome' => 'Maceió', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2840, 'estado_id' => 13, 'cidade_nome' => 'Machacalis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2841, 'estado_id' => 21, 'cidade_nome' => 'Machadinho', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2842, 'estado_id' => 22, 'cidade_nome' => 'Machadinho D\'Oeste', 'cidade_uf' => 'RO'],
            ['cidade_id' => 2843, 'estado_id' => 13, 'cidade_nome' => 'Machado', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2844, 'estado_id' => 17, 'cidade_nome' => 'Machados', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2845, 'estado_id' => 24, 'cidade_nome' => 'Macieira', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2846, 'estado_id' => 19, 'cidade_nome' => 'Macuco', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2847, 'estado_id' => 5, 'cidade_nome' => 'Macururé', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2848, 'estado_id' => 6, 'cidade_nome' => 'Madalena', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2849, 'estado_id' => 18, 'cidade_nome' => 'Madeiro', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2850, 'estado_id' => 5, 'cidade_nome' => 'Madre de Deus', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2851, 'estado_id' => 13, 'cidade_nome' => 'Madre de Deus de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2852, 'estado_id' => 15, 'cidade_nome' => 'Mãe d\'Água', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2853, 'estado_id' => 14, 'cidade_nome' => 'Mãe do Rio', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2854, 'estado_id' => 5, 'cidade_nome' => 'Maetinga', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2855, 'estado_id' => 24, 'cidade_nome' => 'Mafra', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2856, 'estado_id' => 14, 'cidade_nome' => 'Magalhães Barata', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2857, 'estado_id' => 10, 'cidade_nome' => 'Magalhães de Almeida', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2858, 'estado_id' => 25, 'cidade_nome' => 'Magda', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2859, 'estado_id' => 19, 'cidade_nome' => 'Magé', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2860, 'estado_id' => 5, 'cidade_nome' => 'Maiquinique', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2861, 'estado_id' => 5, 'cidade_nome' => 'Mairi', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2862, 'estado_id' => 25, 'cidade_nome' => 'Mairinque', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2863, 'estado_id' => 25, 'cidade_nome' => 'Mairiporã', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2864, 'estado_id' => 9, 'cidade_nome' => 'Mairipotaba', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2865, 'estado_id' => 24, 'cidade_nome' => 'Major Gercino', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2866, 'estado_id' => 2, 'cidade_nome' => 'Major Isidoro', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2867, 'estado_id' => 20, 'cidade_nome' => 'Major Sales', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2868, 'estado_id' => 24, 'cidade_nome' => 'Major Vieira', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2869, 'estado_id' => 13, 'cidade_nome' => 'Malacacheta', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2870, 'estado_id' => 5, 'cidade_nome' => 'Malhada', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2871, 'estado_id' => 5, 'cidade_nome' => 'Malhada de Pedras', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2872, 'estado_id' => 26, 'cidade_nome' => 'Malhada dos Bois', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2873, 'estado_id' => 26, 'cidade_nome' => 'Malhador', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2874, 'estado_id' => 16, 'cidade_nome' => 'Mallet', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2875, 'estado_id' => 15, 'cidade_nome' => 'Malta', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2876, 'estado_id' => 15, 'cidade_nome' => 'Mamanguape', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2877, 'estado_id' => 9, 'cidade_nome' => 'Mambaí', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2878, 'estado_id' => 16, 'cidade_nome' => 'Mamborê', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2879, 'estado_id' => 13, 'cidade_nome' => 'Mamonas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2880, 'estado_id' => 21, 'cidade_nome' => 'Mampituba', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2881, 'estado_id' => 4, 'cidade_nome' => 'Manacapuru', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2882, 'estado_id' => 15, 'cidade_nome' => 'Manaíra', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2883, 'estado_id' => 4, 'cidade_nome' => 'Manaquiri', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2884, 'estado_id' => 17, 'cidade_nome' => 'Manari', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2885, 'estado_id' => 4, 'cidade_nome' => 'Manaus', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2886, 'estado_id' => 1, 'cidade_nome' => 'Mâncio Lima', 'cidade_uf' => 'AC'],
            ['cidade_id' => 2887, 'estado_id' => 16, 'cidade_nome' => 'Mandaguaçu', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2888, 'estado_id' => 16, 'cidade_nome' => 'Mandaguari', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2889, 'estado_id' => 16, 'cidade_nome' => 'Mandirituba', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2890, 'estado_id' => 25, 'cidade_nome' => 'Manduri', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2891, 'estado_id' => 16, 'cidade_nome' => 'Manfrinópolis', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2892, 'estado_id' => 13, 'cidade_nome' => 'Manga', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2893, 'estado_id' => 19, 'cidade_nome' => 'Mangaratiba', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2894, 'estado_id' => 16, 'cidade_nome' => 'Mangueirinha', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2895, 'estado_id' => 13, 'cidade_nome' => 'Manhuaçu', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2896, 'estado_id' => 13, 'cidade_nome' => 'Manhumirim', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2897, 'estado_id' => 4, 'cidade_nome' => 'Manicoré', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2898, 'estado_id' => 18, 'cidade_nome' => 'Manoel Emídio', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2899, 'estado_id' => 16, 'cidade_nome' => 'Manoel Ribas', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2900, 'estado_id' => 1, 'cidade_nome' => 'Manoel Urbano', 'cidade_uf' => 'AC'],
            ['cidade_id' => 2901, 'estado_id' => 21, 'cidade_nome' => 'Manoel Viana', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2902, 'estado_id' => 5, 'cidade_nome' => 'Manoel Vitorino', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2903, 'estado_id' => 5, 'cidade_nome' => 'Mansidão', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2904, 'estado_id' => 13, 'cidade_nome' => 'Mantena', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2905, 'estado_id' => 8, 'cidade_nome' => 'Mantenópolis', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2906, 'estado_id' => 21, 'cidade_nome' => 'Maquiné', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2907, 'estado_id' => 13, 'cidade_nome' => 'Mar de Espanha', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2908, 'estado_id' => 2, 'cidade_nome' => 'Mar Vermelho', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2909, 'estado_id' => 9, 'cidade_nome' => 'Mara Rosa', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2910, 'estado_id' => 4, 'cidade_nome' => 'Maraã', 'cidade_uf' => 'AM'],
            ['cidade_id' => 2911, 'estado_id' => 14, 'cidade_nome' => 'Marabá', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2912, 'estado_id' => 25, 'cidade_nome' => 'Marabá Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2913, 'estado_id' => 10, 'cidade_nome' => 'Maracaçumé', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2914, 'estado_id' => 25, 'cidade_nome' => 'Maracaí', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2915, 'estado_id' => 24, 'cidade_nome' => 'Maracajá', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2916, 'estado_id' => 12, 'cidade_nome' => 'Maracaju', 'cidade_uf' => 'MS'],
            ['cidade_id' => 2917, 'estado_id' => 14, 'cidade_nome' => 'Maracanã', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2918, 'estado_id' => 6, 'cidade_nome' => 'Maracanaú', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2919, 'estado_id' => 5, 'cidade_nome' => 'Maracás', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2920, 'estado_id' => 2, 'cidade_nome' => 'Maragogi', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2921, 'estado_id' => 5, 'cidade_nome' => 'Maragogipe', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2922, 'estado_id' => 17, 'cidade_nome' => 'Maraial', 'cidade_uf' => 'PE'],
            ['cidade_id' => 2923, 'estado_id' => 10, 'cidade_nome' => 'Marajá do Sena', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2924, 'estado_id' => 6, 'cidade_nome' => 'Maranguape', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2925, 'estado_id' => 10, 'cidade_nome' => 'Maranhãozinho', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2926, 'estado_id' => 14, 'cidade_nome' => 'Marapanim', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2927, 'estado_id' => 25, 'cidade_nome' => 'Marapoama', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2928, 'estado_id' => 21, 'cidade_nome' => 'Maratá', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2929, 'estado_id' => 8, 'cidade_nome' => 'Marataízes', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2930, 'estado_id' => 21, 'cidade_nome' => 'Marau', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2931, 'estado_id' => 5, 'cidade_nome' => 'Maraú', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2932, 'estado_id' => 2, 'cidade_nome' => 'Maravilha', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2933, 'estado_id' => 24, 'cidade_nome' => 'Maravilha', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2934, 'estado_id' => 13, 'cidade_nome' => 'Maravilhas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2935, 'estado_id' => 15, 'cidade_nome' => 'Marcação', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2936, 'estado_id' => 11, 'cidade_nome' => 'Marcelândia', 'cidade_uf' => 'MT'],
            ['cidade_id' => 2937, 'estado_id' => 21, 'cidade_nome' => 'Marcelino Ramos', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2938, 'estado_id' => 20, 'cidade_nome' => 'Marcelino Vieira', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2939, 'estado_id' => 5, 'cidade_nome' => 'Marcionílio Souza', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2940, 'estado_id' => 6, 'cidade_nome' => 'Marco', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2941, 'estado_id' => 18, 'cidade_nome' => 'Marcolândia', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2942, 'estado_id' => 18, 'cidade_nome' => 'Marcos Parente', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2943, 'estado_id' => 16, 'cidade_nome' => 'Marechal Cândido Rondon', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2944, 'estado_id' => 2, 'cidade_nome' => 'Marechal Deodoro', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2945, 'estado_id' => 8, 'cidade_nome' => 'Marechal Floriano', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2946, 'estado_id' => 1, 'cidade_nome' => 'Marechal Thaumaturgo', 'cidade_uf' => 'AC'],
            ['cidade_id' => 2947, 'estado_id' => 24, 'cidade_nome' => 'Marema', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2948, 'estado_id' => 15, 'cidade_nome' => 'Mari', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2949, 'estado_id' => 13, 'cidade_nome' => 'Maria da Fé', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2950, 'estado_id' => 16, 'cidade_nome' => 'Maria Helena', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2951, 'estado_id' => 16, 'cidade_nome' => 'Marialva', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2952, 'estado_id' => 13, 'cidade_nome' => 'Mariana', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2953, 'estado_id' => 21, 'cidade_nome' => 'Mariana Pimentel', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2954, 'estado_id' => 21, 'cidade_nome' => 'Mariano Moro', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2955, 'estado_id' => 27, 'cidade_nome' => 'Marianópolis do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2956, 'estado_id' => 25, 'cidade_nome' => 'Mariápolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2957, 'estado_id' => 2, 'cidade_nome' => 'Maribondo', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2958, 'estado_id' => 19, 'cidade_nome' => 'Maricá', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 2959, 'estado_id' => 13, 'cidade_nome' => 'Marilac', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2960, 'estado_id' => 8, 'cidade_nome' => 'Marilândia', 'cidade_uf' => 'ES'],
            ['cidade_id' => 2961, 'estado_id' => 16, 'cidade_nome' => 'Marilândia do Sul', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2962, 'estado_id' => 16, 'cidade_nome' => 'Marilena', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2963, 'estado_id' => 25, 'cidade_nome' => 'Marília', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2964, 'estado_id' => 16, 'cidade_nome' => 'Mariluz', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2965, 'estado_id' => 16, 'cidade_nome' => 'Maringá', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2966, 'estado_id' => 25, 'cidade_nome' => 'Marinópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2967, 'estado_id' => 13, 'cidade_nome' => 'Mário Campos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2968, 'estado_id' => 16, 'cidade_nome' => 'Mariópolis', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2969, 'estado_id' => 16, 'cidade_nome' => 'Maripá', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2970, 'estado_id' => 13, 'cidade_nome' => 'Maripá de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2971, 'estado_id' => 14, 'cidade_nome' => 'Marituba', 'cidade_uf' => 'PA'],
            ['cidade_id' => 2972, 'estado_id' => 15, 'cidade_nome' => 'Marizópolis', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2973, 'estado_id' => 13, 'cidade_nome' => 'Marliéria', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2974, 'estado_id' => 16, 'cidade_nome' => 'Marmeleiro', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2975, 'estado_id' => 13, 'cidade_nome' => 'Marmelópolis', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2976, 'estado_id' => 21, 'cidade_nome' => 'Marques de Souza', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2977, 'estado_id' => 16, 'cidade_nome' => 'Marquinho', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2978, 'estado_id' => 13, 'cidade_nome' => 'Martinho Campos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2979, 'estado_id' => 6, 'cidade_nome' => 'Martinópole', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2980, 'estado_id' => 25, 'cidade_nome' => 'Martinópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2981, 'estado_id' => 20, 'cidade_nome' => 'Martins', 'cidade_uf' => 'RN'],
            ['cidade_id' => 2982, 'estado_id' => 13, 'cidade_nome' => 'Martins Soares', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2983, 'estado_id' => 26, 'cidade_nome' => 'Maruim', 'cidade_uf' => 'SE'],
            ['cidade_id' => 2984, 'estado_id' => 16, 'cidade_nome' => 'Marumbi', 'cidade_uf' => 'PR'],
            ['cidade_id' => 2985, 'estado_id' => 9, 'cidade_nome' => 'Marzagão', 'cidade_uf' => 'GO'],
            ['cidade_id' => 2986, 'estado_id' => 5, 'cidade_nome' => 'Mascote', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2987, 'estado_id' => 6, 'cidade_nome' => 'Massapê', 'cidade_uf' => 'CE'],
            ['cidade_id' => 2988, 'estado_id' => 18, 'cidade_nome' => 'Massapê do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 2989, 'estado_id' => 15, 'cidade_nome' => 'Massaranduba', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2990, 'estado_id' => 24, 'cidade_nome' => 'Massaranduba', 'cidade_uf' => 'SC'],
            ['cidade_id' => 2991, 'estado_id' => 21, 'cidade_nome' => 'Mata', 'cidade_uf' => 'RS'],
            ['cidade_id' => 2992, 'estado_id' => 5, 'cidade_nome' => 'Mata de São João', 'cidade_uf' => 'BA'],
            ['cidade_id' => 2993, 'estado_id' => 2, 'cidade_nome' => 'Mata Grande', 'cidade_uf' => 'AL'],
            ['cidade_id' => 2994, 'estado_id' => 10, 'cidade_nome' => 'Mata Roma', 'cidade_uf' => 'MA'],
            ['cidade_id' => 2995, 'estado_id' => 13, 'cidade_nome' => 'Mata Verde', 'cidade_uf' => 'MG'],
            ['cidade_id' => 2996, 'estado_id' => 25, 'cidade_nome' => 'Matão', 'cidade_uf' => 'SP'],
            ['cidade_id' => 2997, 'estado_id' => 15, 'cidade_nome' => 'Mataraca', 'cidade_uf' => 'PB'],
            ['cidade_id' => 2998, 'estado_id' => 27, 'cidade_nome' => 'Mateiros', 'cidade_uf' => 'TO'],
            ['cidade_id' => 2999, 'estado_id' => 16, 'cidade_nome' => 'Matelândia', 'cidade_uf' => 'PR'],
            ['cidade_id' => 3000, 'estado_id' => 13, 'cidade_nome' => 'Materlândia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3001, 'estado_id' => 13, 'cidade_nome' => 'Mateus Leme', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3002, 'estado_id' => 13, 'cidade_nome' => 'Mathias Lobato', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3003, 'estado_id' => 13, 'cidade_nome' => 'Matias Barbosa', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3004, 'estado_id' => 13, 'cidade_nome' => 'Matias Cardoso', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3005, 'estado_id' => 18, 'cidade_nome' => 'Matias Olímpio', 'cidade_uf' => 'PI'],
            ['cidade_id' => 3006, 'estado_id' => 5, 'cidade_nome' => 'Matina', 'cidade_uf' => 'BA'],
            ['cidade_id' => 3007, 'estado_id' => 10, 'cidade_nome' => 'Matinha', 'cidade_uf' => 'MA'],
            ['cidade_id' => 3008, 'estado_id' => 15, 'cidade_nome' => 'Matinhas', 'cidade_uf' => 'PB'],
            ['cidade_id' => 3009, 'estado_id' => 16, 'cidade_nome' => 'Matinhos', 'cidade_uf' => 'PR'],
            ['cidade_id' => 3010, 'estado_id' => 13, 'cidade_nome' => 'Matipó', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3011, 'estado_id' => 21, 'cidade_nome' => 'Mato Castelhano', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3012, 'estado_id' => 15, 'cidade_nome' => 'Mato Grosso', 'cidade_uf' => 'PB'],
            ['cidade_id' => 3013, 'estado_id' => 21, 'cidade_nome' => 'Mato Leitão', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3014, 'estado_id' => 21, 'cidade_nome' => 'Mato Queimado', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3015, 'estado_id' => 16, 'cidade_nome' => 'Mato Rico', 'cidade_uf' => 'PR'],
            ['cidade_id' => 3016, 'estado_id' => 13, 'cidade_nome' => 'Mato Verde', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3017, 'estado_id' => 10, 'cidade_nome' => 'Matões', 'cidade_uf' => 'MA'],
            ['cidade_id' => 3018, 'estado_id' => 10, 'cidade_nome' => 'Matões do Norte', 'cidade_uf' => 'MA'],
            ['cidade_id' => 3019, 'estado_id' => 24, 'cidade_nome' => 'Matos Costa', 'cidade_uf' => 'SC'],
            ['cidade_id' => 3020, 'estado_id' => 13, 'cidade_nome' => 'Matozinhos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3021, 'estado_id' => 9, 'cidade_nome' => 'Matrinchã', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3022, 'estado_id' => 2, 'cidade_nome' => 'Matriz de Camaragibe', 'cidade_uf' => 'AL'],
            ['cidade_id' => 3023, 'estado_id' => 11, 'cidade_nome' => 'Matupá', 'cidade_uf' => 'MT'],
            ['cidade_id' => 3024, 'estado_id' => 15, 'cidade_nome' => 'Maturéia', 'cidade_uf' => 'PB'],
            ['cidade_id' => 3025, 'estado_id' => 13, 'cidade_nome' => 'Matutina', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3026, 'estado_id' => 25, 'cidade_nome' => 'Mauá', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3027, 'estado_id' => 16, 'cidade_nome' => 'Mauá da Serra', 'cidade_uf' => 'PR'],
            ['cidade_id' => 3028, 'estado_id' => 4, 'cidade_nome' => 'Maués', 'cidade_uf' => 'AM'],
            ['cidade_id' => 3029, 'estado_id' => 9, 'cidade_nome' => 'Maurilândia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3030, 'estado_id' => 27, 'cidade_nome' => 'Maurilândia do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 3031, 'estado_id' => 6, 'cidade_nome' => 'Mauriti', 'cidade_uf' => 'CE'],
            ['cidade_id' => 3032, 'estado_id' => 20, 'cidade_nome' => 'Maxaranguape', 'cidade_uf' => 'RN'],
            ['cidade_id' => 3033, 'estado_id' => 21, 'cidade_nome' => 'Maximiliano de Almeida', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3034, 'estado_id' => 3, 'cidade_nome' => 'Mazagão', 'cidade_uf' => 'AP'],
            ['cidade_id' => 3035, 'estado_id' => 13, 'cidade_nome' => 'Medeiros', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3036, 'estado_id' => 5, 'cidade_nome' => 'Medeiros Neto', 'cidade_uf' => 'BA'],
            ['cidade_id' => 3037, 'estado_id' => 16, 'cidade_nome' => 'Medianeira', 'cidade_uf' => 'PR'],
            ['cidade_id' => 3038, 'estado_id' => 14, 'cidade_nome' => 'Medicilândia', 'cidade_uf' => 'PA'],
            ['cidade_id' => 3039, 'estado_id' => 13, 'cidade_nome' => 'Medina', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3040, 'estado_id' => 24, 'cidade_nome' => 'Meleiro', 'cidade_uf' => 'SC'],
            ['cidade_id' => 3041, 'estado_id' => 14, 'cidade_nome' => 'Melgaço', 'cidade_uf' => 'PA'],
            ['cidade_id' => 3042, 'estado_id' => 19, 'cidade_nome' => 'Mendes', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 3043, 'estado_id' => 13, 'cidade_nome' => 'Mendes Pimentel', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3044, 'estado_id' => 25, 'cidade_nome' => 'Mendonça', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3045, 'estado_id' => 16, 'cidade_nome' => 'Mercedes', 'cidade_uf' => 'PR'],
            ['cidade_id' => 3046, 'estado_id' => 13, 'cidade_nome' => 'Mercês', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3047, 'estado_id' => 25, 'cidade_nome' => 'Meridiano', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3048, 'estado_id' => 6, 'cidade_nome' => 'Meruoca', 'cidade_uf' => 'CE'],
            ['cidade_id' => 3049, 'estado_id' => 25, 'cidade_nome' => 'Mesópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3050, 'estado_id' => 13, 'cidade_nome' => 'Mesquita', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3051, 'estado_id' => 19, 'cidade_nome' => 'Mesquita', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 3052, 'estado_id' => 2, 'cidade_nome' => 'Messias', 'cidade_uf' => 'AL'],
            ['cidade_id' => 3053, 'estado_id' => 20, 'cidade_nome' => 'Messias Targino', 'cidade_uf' => 'RN'],
            ['cidade_id' => 3054, 'estado_id' => 18, 'cidade_nome' => 'Miguel Alves', 'cidade_uf' => 'PI'],
            ['cidade_id' => 3055, 'estado_id' => 5, 'cidade_nome' => 'Miguel Calmon', 'cidade_uf' => 'BA'],
            ['cidade_id' => 3056, 'estado_id' => 18, 'cidade_nome' => 'Miguel Leão', 'cidade_uf' => 'PI'],
            ['cidade_id' => 3057, 'estado_id' => 19, 'cidade_nome' => 'Miguel Pereira', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 3058, 'estado_id' => 25, 'cidade_nome' => 'Miguelópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3059, 'estado_id' => 5, 'cidade_nome' => 'Milagres', 'cidade_uf' => 'BA'],
            ['cidade_id' => 3060, 'estado_id' => 6, 'cidade_nome' => 'Milagres', 'cidade_uf' => 'CE'],
            ['cidade_id' => 3061, 'estado_id' => 10, 'cidade_nome' => 'Milagres do Maranhão', 'cidade_uf' => 'MA'],
            ['cidade_id' => 3062, 'estado_id' => 6, 'cidade_nome' => 'Milhã', 'cidade_uf' => 'CE'],
            ['cidade_id' => 3063, 'estado_id' => 18, 'cidade_nome' => 'Milton Brandão', 'cidade_uf' => 'PI'],
            ['cidade_id' => 3064, 'estado_id' => 9, 'cidade_nome' => 'Mimoso de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3065, 'estado_id' => 8, 'cidade_nome' => 'Mimoso do Sul', 'cidade_uf' => 'ES'],
            ['cidade_id' => 3066, 'estado_id' => 9, 'cidade_nome' => 'Minaçu', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3067, 'estado_id' => 2, 'cidade_nome' => 'Minador do Negrão', 'cidade_uf' => 'AL'],
            ['cidade_id' => 3068, 'estado_id' => 21, 'cidade_nome' => 'Minas do Leão', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3069, 'estado_id' => 13, 'cidade_nome' => 'Minas Novas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3070, 'estado_id' => 13, 'cidade_nome' => 'Minduri', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3071, 'estado_id' => 9, 'cidade_nome' => 'Mineiros', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3072, 'estado_id' => 25, 'cidade_nome' => 'Mineiros do Tietê', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3073, 'estado_id' => 22, 'cidade_nome' => 'Ministro Andreazza', 'cidade_uf' => 'RO'],
            ['cidade_id' => 3074, 'estado_id' => 25, 'cidade_nome' => 'Mira Estrela', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3075, 'estado_id' => 13, 'cidade_nome' => 'Mirabela', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3076, 'estado_id' => 25, 'cidade_nome' => 'Miracatu', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3077, 'estado_id' => 19, 'cidade_nome' => 'Miracema', 'cidade_uf' => 'RJ'],
            ['cidade_id' => 3078, 'estado_id' => 27, 'cidade_nome' => 'Miracema do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 3079, 'estado_id' => 10, 'cidade_nome' => 'Mirador', 'cidade_uf' => 'MA'],
            ['cidade_id' => 3080, 'estado_id' => 16, 'cidade_nome' => 'Mirador', 'cidade_uf' => 'PR'],
            ['cidade_id' => 3081, 'estado_id' => 13, 'cidade_nome' => 'Miradouro', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3082, 'estado_id' => 21, 'cidade_nome' => 'Miraguaí', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3083, 'estado_id' => 13, 'cidade_nome' => 'Miraí', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3084, 'estado_id' => 6, 'cidade_nome' => 'Miraíma', 'cidade_uf' => 'CE'],
            ['cidade_id' => 3085, 'estado_id' => 12, 'cidade_nome' => 'Miranda', 'cidade_uf' => 'MS'],
            ['cidade_id' => 3086, 'estado_id' => 10, 'cidade_nome' => 'Miranda do Norte', 'cidade_uf' => 'MA'],
            ['cidade_id' => 3087, 'estado_id' => 17, 'cidade_nome' => 'Mirandiba', 'cidade_uf' => 'PE'],
            ['cidade_id' => 3088, 'estado_id' => 25, 'cidade_nome' => 'Mirandópolis', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3089, 'estado_id' => 5, 'cidade_nome' => 'Mirangaba', 'cidade_uf' => 'BA'],
            ['cidade_id' => 3090, 'estado_id' => 27, 'cidade_nome' => 'Miranorte', 'cidade_uf' => 'TO'],
            ['cidade_id' => 3091, 'estado_id' => 5, 'cidade_nome' => 'Mirante', 'cidade_uf' => 'BA'],
            ['cidade_id' => 3092, 'estado_id' => 22, 'cidade_nome' => 'Mirante da Serra', 'cidade_uf' => 'RO'],
            ['cidade_id' => 3093, 'estado_id' => 25, 'cidade_nome' => 'Mirante do Paranapanema', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3094, 'estado_id' => 16, 'cidade_nome' => 'Miraselva', 'cidade_uf' => 'PR'],
            ['cidade_id' => 3095, 'estado_id' => 25, 'cidade_nome' => 'Mirassol', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3096, 'estado_id' => 11, 'cidade_nome' => 'Mirassol d\'Oeste', 'cidade_uf' => 'MT'],
            ['cidade_id' => 3097, 'estado_id' => 25, 'cidade_nome' => 'Mirassolândia', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3098, 'estado_id' => 13, 'cidade_nome' => 'Miravânia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3099, 'estado_id' => 24, 'cidade_nome' => 'Mirim Doce', 'cidade_uf' => 'SC'],
            ['cidade_id' => 3100, 'estado_id' => 10, 'cidade_nome' => 'Mirinzal', 'cidade_uf' => 'MA'],
            ['cidade_id' => 3101, 'estado_id' => 16, 'cidade_nome' => 'Missal', 'cidade_uf' => 'PR'],
            ['cidade_id' => 3102, 'estado_id' => 6, 'cidade_nome' => 'Missão Velha', 'cidade_uf' => 'CE'],
            ['cidade_id' => 3103, 'estado_id' => 14, 'cidade_nome' => 'Mocajuba', 'cidade_uf' => 'PA'],
            ['cidade_id' => 3104, 'estado_id' => 25, 'cidade_nome' => 'Mococa', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3105, 'estado_id' => 24, 'cidade_nome' => 'Modelo', 'cidade_uf' => 'SC'],
            ['cidade_id' => 3106, 'estado_id' => 13, 'cidade_nome' => 'Moeda', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3107, 'estado_id' => 13, 'cidade_nome' => 'Moema', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3108, 'estado_id' => 15, 'cidade_nome' => 'Mogeiro', 'cidade_uf' => 'PB'],
            ['cidade_id' => 3109, 'estado_id' => 25, 'cidade_nome' => 'Mogi das Cruzes', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3110, 'estado_id' => 25, 'cidade_nome' => 'Mogi Guaçu', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3111, 'estado_id' => 9, 'cidade_nome' => 'Moiporá', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3112, 'estado_id' => 26, 'cidade_nome' => 'Moita Bonita', 'cidade_uf' => 'SE'],
            ['cidade_id' => 3113, 'estado_id' => 25, 'cidade_nome' => 'Moji Mirim', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3114, 'estado_id' => 14, 'cidade_nome' => 'Moju', 'cidade_uf' => 'PA'],
            ['cidade_id' => 3115, 'estado_id' => 6, 'cidade_nome' => 'Mombaça', 'cidade_uf' => 'CE'],
            ['cidade_id' => 3116, 'estado_id' => 25, 'cidade_nome' => 'Mombuca', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3117, 'estado_id' => 10, 'cidade_nome' => 'Monção', 'cidade_uf' => 'MA'],
            ['cidade_id' => 3118, 'estado_id' => 25, 'cidade_nome' => 'Monções', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3119, 'estado_id' => 24, 'cidade_nome' => 'Mondaí', 'cidade_uf' => 'SC'],
            ['cidade_id' => 3120, 'estado_id' => 25, 'cidade_nome' => 'Mongaguá', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3121, 'estado_id' => 13, 'cidade_nome' => 'Monjolos', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3122, 'estado_id' => 18, 'cidade_nome' => 'Monsenhor Gil', 'cidade_uf' => 'PI'],
            ['cidade_id' => 3123, 'estado_id' => 18, 'cidade_nome' => 'Monsenhor Hipólito', 'cidade_uf' => 'PI'],
            ['cidade_id' => 3124, 'estado_id' => 13, 'cidade_nome' => 'Monsenhor Paulo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3125, 'estado_id' => 6, 'cidade_nome' => 'Monsenhor Tabosa', 'cidade_uf' => 'CE'],
            ['cidade_id' => 3126, 'estado_id' => 15, 'cidade_nome' => 'Montadas', 'cidade_uf' => 'PB'],
            ['cidade_id' => 3127, 'estado_id' => 13, 'cidade_nome' => 'Montalvânia', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3128, 'estado_id' => 8, 'cidade_nome' => 'Montanha', 'cidade_uf' => 'ES'],
            ['cidade_id' => 3129, 'estado_id' => 20, 'cidade_nome' => 'Montanhas', 'cidade_uf' => 'RN'],
            ['cidade_id' => 3130, 'estado_id' => 21, 'cidade_nome' => 'Montauri', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3131, 'estado_id' => 14, 'cidade_nome' => 'Monte Alegre', 'cidade_uf' => 'PA'],
            ['cidade_id' => 3132, 'estado_id' => 20, 'cidade_nome' => 'Monte Alegre', 'cidade_uf' => 'RN'],
            ['cidade_id' => 3133, 'estado_id' => 9, 'cidade_nome' => 'Monte Alegre de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3134, 'estado_id' => 13, 'cidade_nome' => 'Monte Alegre de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3135, 'estado_id' => 26, 'cidade_nome' => 'Monte Alegre de Sergipe', 'cidade_uf' => 'SE'],
            ['cidade_id' => 3136, 'estado_id' => 18, 'cidade_nome' => 'Monte Alegre do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 3137, 'estado_id' => 25, 'cidade_nome' => 'Monte Alegre do Sul', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3138, 'estado_id' => 21, 'cidade_nome' => 'Monte Alegre dos Campos', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3139, 'estado_id' => 25, 'cidade_nome' => 'Monte Alto', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3140, 'estado_id' => 25, 'cidade_nome' => 'Monte Aprazível', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3141, 'estado_id' => 13, 'cidade_nome' => 'Monte Azul', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3142, 'estado_id' => 25, 'cidade_nome' => 'Monte Azul Paulista', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3143, 'estado_id' => 13, 'cidade_nome' => 'Monte Belo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3144, 'estado_id' => 21, 'cidade_nome' => 'Monte Belo do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3145, 'estado_id' => 24, 'cidade_nome' => 'Monte Carlo', 'cidade_uf' => 'SC'],
            ['cidade_id' => 3146, 'estado_id' => 13, 'cidade_nome' => 'Monte Carmelo', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3147, 'estado_id' => 24, 'cidade_nome' => 'Monte Castelo', 'cidade_uf' => 'SC'],
            ['cidade_id' => 3148, 'estado_id' => 25, 'cidade_nome' => 'Monte Castelo', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3149, 'estado_id' => 20, 'cidade_nome' => 'Monte das Gameleiras', 'cidade_uf' => 'RN'],
            ['cidade_id' => 3150, 'estado_id' => 27, 'cidade_nome' => 'Monte do Carmo', 'cidade_uf' => 'TO'],
            ['cidade_id' => 3151, 'estado_id' => 13, 'cidade_nome' => 'Monte Formoso', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3152, 'estado_id' => 15, 'cidade_nome' => 'Monte Horebe', 'cidade_uf' => 'PB'],
            ['cidade_id' => 3153, 'estado_id' => 25, 'cidade_nome' => 'Monte Mor', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3154, 'estado_id' => 22, 'cidade_nome' => 'Monte Negro', 'cidade_uf' => 'RO'],
            ['cidade_id' => 3155, 'estado_id' => 5, 'cidade_nome' => 'Monte Santo', 'cidade_uf' => 'BA'],
            ['cidade_id' => 3156, 'estado_id' => 13, 'cidade_nome' => 'Monte Santo de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3157, 'estado_id' => 27, 'cidade_nome' => 'Monte Santo do Tocantins', 'cidade_uf' => 'TO'],
            ['cidade_id' => 3158, 'estado_id' => 13, 'cidade_nome' => 'Monte Sião', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3159, 'estado_id' => 15, 'cidade_nome' => 'Monteiro', 'cidade_uf' => 'PB'],
            ['cidade_id' => 3160, 'estado_id' => 25, 'cidade_nome' => 'Monteiro Lobato', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3161, 'estado_id' => 2, 'cidade_nome' => 'Monteirópolis', 'cidade_uf' => 'AL'],
            ['cidade_id' => 3162, 'estado_id' => 21, 'cidade_nome' => 'Montenegro', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3163, 'estado_id' => 10, 'cidade_nome' => 'Montes Altos', 'cidade_uf' => 'MA'],
            ['cidade_id' => 3164, 'estado_id' => 13, 'cidade_nome' => 'Montes Claros', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3165, 'estado_id' => 9, 'cidade_nome' => 'Montes Claros de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3166, 'estado_id' => 13, 'cidade_nome' => 'Montezuma', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3167, 'estado_id' => 9, 'cidade_nome' => 'Montividiu', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3168, 'estado_id' => 9, 'cidade_nome' => 'Montividiu do Norte', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3169, 'estado_id' => 6, 'cidade_nome' => 'Morada Nova', 'cidade_uf' => 'CE'],
            ['cidade_id' => 3170, 'estado_id' => 13, 'cidade_nome' => 'Morada Nova de Minas', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3171, 'estado_id' => 6, 'cidade_nome' => 'Moraújo', 'cidade_uf' => 'CE'],
            ['cidade_id' => 3172, 'estado_id' => 17, 'cidade_nome' => 'Moreilândia', 'cidade_uf' => 'PE'],
            ['cidade_id' => 3173, 'estado_id' => 16, 'cidade_nome' => 'Moreira Sales', 'cidade_uf' => 'PR'],
            ['cidade_id' => 3174, 'estado_id' => 17, 'cidade_nome' => 'Moreno', 'cidade_uf' => 'PE'],
            ['cidade_id' => 3175, 'estado_id' => 21, 'cidade_nome' => 'Mormaço', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3176, 'estado_id' => 5, 'cidade_nome' => 'Morpará', 'cidade_uf' => 'BA'],
            ['cidade_id' => 3177, 'estado_id' => 16, 'cidade_nome' => 'Morretes', 'cidade_uf' => 'PR'],
            ['cidade_id' => 3178, 'estado_id' => 6, 'cidade_nome' => 'Morrinhos', 'cidade_uf' => 'CE'],
            ['cidade_id' => 3179, 'estado_id' => 9, 'cidade_nome' => 'Morrinhos', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3180, 'estado_id' => 21, 'cidade_nome' => 'Morrinhos do Sul', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3181, 'estado_id' => 25, 'cidade_nome' => 'Morro Agudo', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3182, 'estado_id' => 9, 'cidade_nome' => 'Morro Agudo de Goiás', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3183, 'estado_id' => 18, 'cidade_nome' => 'Morro Cabeça no Tempo', 'cidade_uf' => 'PI'],
            ['cidade_id' => 3184, 'estado_id' => 24, 'cidade_nome' => 'Morro da Fumaça', 'cidade_uf' => 'SC'],
            ['cidade_id' => 3185, 'estado_id' => 13, 'cidade_nome' => 'Morro da Garça', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3186, 'estado_id' => 5, 'cidade_nome' => 'Morro do Chapéu', 'cidade_uf' => 'BA'],
            ['cidade_id' => 3187, 'estado_id' => 18, 'cidade_nome' => 'Morro do Chapéu do Piauí', 'cidade_uf' => 'PI'],
            ['cidade_id' => 3188, 'estado_id' => 13, 'cidade_nome' => 'Morro do Pilar', 'cidade_uf' => 'MG'],
            ['cidade_id' => 3189, 'estado_id' => 24, 'cidade_nome' => 'Morro Grande', 'cidade_uf' => 'SC'],
            ['cidade_id' => 3190, 'estado_id' => 21, 'cidade_nome' => 'Morro Redondo', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3191, 'estado_id' => 21, 'cidade_nome' => 'Morro Reuter', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3192, 'estado_id' => 10, 'cidade_nome' => 'Morros', 'cidade_uf' => 'MA'],
            ['cidade_id' => 3193, 'estado_id' => 5, 'cidade_nome' => 'Mortugaba', 'cidade_uf' => 'BA'],
            ['cidade_id' => 3194, 'estado_id' => 25, 'cidade_nome' => 'Morungaba', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3195, 'estado_id' => 9, 'cidade_nome' => 'Mossâmedes', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3196, 'estado_id' => 20, 'cidade_nome' => 'Mossoró', 'cidade_uf' => 'RN'],
            ['cidade_id' => 3197, 'estado_id' => 21, 'cidade_nome' => 'Mostardas', 'cidade_uf' => 'RS'],
            ['cidade_id' => 3198, 'estado_id' => 25, 'cidade_nome' => 'Motuca', 'cidade_uf' => 'SP'],
            ['cidade_id' => 3199, 'estado_id' => 9, 'cidade_nome' => 'Mozarlândia', 'cidade_uf' => 'GO'],
            ['cidade_id' => 3200, 'estado_id' => 14, 'cidade_nome' => 'Muaná', 'cidade_uf' => 'PA'],
            INSERT INTO `cidades` VALUES ('3201', '23', 'Mucajaí', 'RR');
            INSERT INTO `cidades` VALUES ('3202', '6', 'Mucambo', 'CE');
            INSERT INTO `cidades` VALUES ('3203', '5', 'Mucugê', 'BA');
            INSERT INTO `cidades` VALUES ('3204', '21', 'Muçum', 'RS');
            INSERT INTO `cidades` VALUES ('3205', '5', 'Mucuri', 'BA');
            INSERT INTO `cidades` VALUES ('3206', '8', 'Mucurici', 'ES');
            INSERT INTO `cidades` VALUES ('3207', '21', 'Muitos Capões', 'RS');
            INSERT INTO `cidades` VALUES ('3208', '21', 'Muliterno', 'RS');
            INSERT INTO `cidades` VALUES ('3209', '6', 'Mulungu', 'CE');
            INSERT INTO `cidades` VALUES ('3210', '15', 'Mulungu', 'PB');
            INSERT INTO `cidades` VALUES ('3211', '5', 'Mulungu do Morro', 'BA');
            INSERT INTO `cidades` VALUES ('3212', '5', 'Mundo Novo', 'BA');
            INSERT INTO `cidades` VALUES ('3213', '9', 'Mundo Novo', 'GO');
            INSERT INTO `cidades` VALUES ('3214', '12', 'Mundo Novo', 'MS');
            INSERT INTO `cidades` VALUES ('3215', '13', 'Munhoz', 'MG');
            INSERT INTO `cidades` VALUES ('3216', '16', 'Munhoz de Melo', 'PR');
            INSERT INTO `cidades` VALUES ('3217', '5', 'Muniz Ferreira', 'BA');
            INSERT INTO `cidades` VALUES ('3218', '8', 'Muniz Freire', 'ES');
            INSERT INTO `cidades` VALUES ('3219', '5', 'Muquém de São Francisco', 'BA');
            INSERT INTO `cidades` VALUES ('3220', '8', 'Muqui', 'ES');
            INSERT INTO `cidades` VALUES ('3221', '13', 'Muriaé', 'MG');
            INSERT INTO `cidades` VALUES ('3222', '26', 'Muribeca', 'SE');
            INSERT INTO `cidades` VALUES ('3223', '2', 'Murici', 'AL');
            INSERT INTO `cidades` VALUES ('3224', '18', 'Murici dos Portelas', 'PI');
            INSERT INTO `cidades` VALUES ('3225', '27', 'Muricilândia', 'TO');
            INSERT INTO `cidades` VALUES ('3226', '5', 'Muritiba', 'BA');
            INSERT INTO `cidades` VALUES ('3227', '25', 'Murutinga do Sul', 'SP');
            INSERT INTO `cidades` VALUES ('3228', '5', 'Mutuípe', 'BA');
            INSERT INTO `cidades` VALUES ('3229', '13', 'Mutum', 'MG');
            INSERT INTO `cidades` VALUES ('3230', '9', 'Mutunópolis', 'GO');
            INSERT INTO `cidades` VALUES ('3231', '13', 'Muzambinho', 'MG');
            INSERT INTO `cidades` VALUES ('3232', '13', 'Nacip Raydan', 'MG');
            INSERT INTO `cidades` VALUES ('3233', '25', 'Nantes', 'SP');
            INSERT INTO `cidades` VALUES ('3234', '13', 'Nanuque', 'MG');
            INSERT INTO `cidades` VALUES ('3235', '21', 'Não-Me-Toque', 'RS');
            INSERT INTO `cidades` VALUES ('3236', '13', 'Naque', 'MG');
            INSERT INTO `cidades` VALUES ('3237', '25', 'Narandiba', 'SP');
            INSERT INTO `cidades` VALUES ('3238', '20', 'Natal', 'RN');
            INSERT INTO `cidades` VALUES ('3239', '13', 'Natalândia', 'MG');
            INSERT INTO `cidades` VALUES ('3240', '13', 'Natércia', 'MG');
            INSERT INTO `cidades` VALUES ('3241', '19', 'Natividade', 'RJ');
            INSERT INTO `cidades` VALUES ('3242', '27', 'Natividade', 'TO');
            INSERT INTO `cidades` VALUES ('3243', '25', 'Natividade da Serra', 'SP');
            INSERT INTO `cidades` VALUES ('3244', '15', 'Natuba', 'PB');
            INSERT INTO `cidades` VALUES ('3245', '24', 'Navegantes', 'SC');
            INSERT INTO `cidades` VALUES ('3246', '12', 'Naviraí', 'MS');
            INSERT INTO `cidades` VALUES ('3247', '5', 'Nazaré', 'BA');
            INSERT INTO `cidades` VALUES ('3248', '27', 'Nazaré', 'TO');
            INSERT INTO `cidades` VALUES ('3249', '17', 'Nazaré da Mata', 'PE');
            INSERT INTO `cidades` VALUES ('3250', '18', 'Nazaré do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('3251', '25', 'Nazaré Paulista', 'SP');
            INSERT INTO `cidades` VALUES ('3252', '13', 'Nazareno', 'MG');
            INSERT INTO `cidades` VALUES ('3253', '15', 'Nazarezinho', 'PB');
            INSERT INTO `cidades` VALUES ('3254', '18', 'Nazária ', 'PI');
            INSERT INTO `cidades` VALUES ('3255', '9', 'Nazário', 'GO');
            INSERT INTO `cidades` VALUES ('3256', '26', 'Neópolis', 'SE');
            INSERT INTO `cidades` VALUES ('3257', '13', 'Nepomuceno', 'MG');
            INSERT INTO `cidades` VALUES ('3258', '9', 'Nerópolis', 'GO');
            INSERT INTO `cidades` VALUES ('3259', '25', 'Neves Paulista', 'SP');
            INSERT INTO `cidades` VALUES ('3260', '4', 'Nhamundá', 'AM');
            INSERT INTO `cidades` VALUES ('3261', '25', 'Nhandeara', 'SP');
            INSERT INTO `cidades` VALUES ('3262', '21', 'Nicolau Vergueiro', 'RS');
            INSERT INTO `cidades` VALUES ('3263', '5', 'Nilo Peçanha', 'BA');
            INSERT INTO `cidades` VALUES ('3264', '19', 'Nilópolis', 'RJ');
            INSERT INTO `cidades` VALUES ('3265', '10', 'Nina Rodrigues', 'MA');
            INSERT INTO `cidades` VALUES ('3266', '13', 'Ninheira', 'MG');
            INSERT INTO `cidades` VALUES ('3267', '12', 'Nioaque', 'MS');
            INSERT INTO `cidades` VALUES ('3268', '25', 'Nipoã', 'SP');
            INSERT INTO `cidades` VALUES ('3269', '9', 'Niquelândia', 'GO');
            INSERT INTO `cidades` VALUES ('3270', '20', 'Nísia Floresta', 'RN');
            INSERT INTO `cidades` VALUES ('3271', '19', 'Niterói', 'RJ');
            INSERT INTO `cidades` VALUES ('3272', '11', 'Nobres', 'MT');
            INSERT INTO `cidades` VALUES ('3273', '21', 'Nonoai', 'RS');
            INSERT INTO `cidades` VALUES ('3274', '5', 'Nordestina', 'BA');
            INSERT INTO `cidades` VALUES ('3275', '23', 'Normandia', 'RR');
            INSERT INTO `cidades` VALUES ('3276', '11', 'Nortelândia', 'MT');
            INSERT INTO `cidades` VALUES ('3277', '26', 'Nossa Senhora Aparecida', 'SE');
            INSERT INTO `cidades` VALUES ('3278', '26', 'Nossa Senhora da Glória', 'SE');
            INSERT INTO `cidades` VALUES ('3279', '26', 'Nossa Senhora das Dores', 'SE');
            INSERT INTO `cidades` VALUES ('3280', '16', 'Nossa Senhora das Graças', 'PR');
            INSERT INTO `cidades` VALUES ('3281', '26', 'Nossa Senhora de Lourdes', 'SE');
            INSERT INTO `cidades` VALUES ('3282', '18', 'Nossa Senhora de Nazaré', 'PI');
            INSERT INTO `cidades` VALUES ('3283', '11', 'Nossa Senhora do Livramento', 'MT');
            INSERT INTO `cidades` VALUES ('3284', '26', 'Nossa Senhora do Socorro', 'SE');
            INSERT INTO `cidades` VALUES ('3285', '18', 'Nossa Senhora dos Remédios', 'PI');
            INSERT INTO `cidades` VALUES ('3286', '25', 'Nova Aliança', 'SP');
            INSERT INTO `cidades` VALUES ('3287', '16', 'Nova Aliança do Ivaí', 'PR');
            INSERT INTO `cidades` VALUES ('3288', '21', 'Nova Alvorada', 'RS');
            INSERT INTO `cidades` VALUES ('3289', '12', 'Nova Alvorada do Sul', 'MS');
            INSERT INTO `cidades` VALUES ('3290', '9', 'Nova América', 'GO');
            INSERT INTO `cidades` VALUES ('3291', '16', 'Nova América da Colina', 'PR');
            INSERT INTO `cidades` VALUES ('3292', '12', 'Nova Andradina', 'MS');
            INSERT INTO `cidades` VALUES ('3293', '21', 'Nova Araçá', 'RS');
            INSERT INTO `cidades` VALUES ('3294', '9', 'Nova Aurora', 'GO');
            INSERT INTO `cidades` VALUES ('3295', '16', 'Nova Aurora', 'PR');
            INSERT INTO `cidades` VALUES ('3296', '11', 'Nova Bandeirantes', 'MT');
            INSERT INTO `cidades` VALUES ('3297', '21', 'Nova Bassano', 'RS');
            INSERT INTO `cidades` VALUES ('3298', '13', 'Nova Belém', 'MG');
            INSERT INTO `cidades` VALUES ('3299', '21', 'Nova Boa Vista', 'RS');
            INSERT INTO `cidades` VALUES ('3300', '11', 'Nova Brasilândia', 'MT');
            INSERT INTO `cidades` VALUES ('3301', '22', 'Nova Brasilândia D\'Oeste', 'RO');
            INSERT INTO `cidades` VALUES ('3302', '21', 'Nova Bréscia', 'RS');
            INSERT INTO `cidades` VALUES ('3303', '25', 'Nova Campina', 'SP');
            INSERT INTO `cidades` VALUES ('3304', '5', 'Nova Canaã', 'BA');
            INSERT INTO `cidades` VALUES ('3305', '11', 'Nova Canaã do Norte', 'MT');
            INSERT INTO `cidades` VALUES ('3306', '25', 'Nova Canaã Paulista', 'SP');
            INSERT INTO `cidades` VALUES ('3307', '21', 'Nova Candelária', 'RS');
            INSERT INTO `cidades` VALUES ('3308', '16', 'Nova Cantu', 'PR');
            INSERT INTO `cidades` VALUES ('3309', '25', 'Nova Castilho', 'SP');
            INSERT INTO `cidades` VALUES ('3310', '10', 'Nova Colinas', 'MA');
            INSERT INTO `cidades` VALUES ('3311', '9', 'Nova Crixás', 'GO');
            INSERT INTO `cidades` VALUES ('3312', '20', 'Nova Cruz', 'RN');
            INSERT INTO `cidades` VALUES ('3313', '13', 'Nova Era', 'MG');
            INSERT INTO `cidades` VALUES ('3314', '24', 'Nova Erechim', 'SC');
            INSERT INTO `cidades` VALUES ('3315', '16', 'Nova Esperança', 'PR');
            INSERT INTO `cidades` VALUES ('3316', '14', 'Nova Esperança do Piriá', 'PA');
            INSERT INTO `cidades` VALUES ('3317', '16', 'Nova Esperança do Sudoeste', 'PR');
            INSERT INTO `cidades` VALUES ('3318', '21', 'Nova Esperança do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('3319', '25', 'Nova Europa', 'SP');
            INSERT INTO `cidades` VALUES ('3320', '5', 'Nova Fátima', 'BA');
            INSERT INTO `cidades` VALUES ('3321', '16', 'Nova Fátima', 'PR');
            INSERT INTO `cidades` VALUES ('3322', '15', 'Nova Floresta', 'PB');
            INSERT INTO `cidades` VALUES ('3323', '19', 'Nova Friburgo', 'RJ');
            INSERT INTO `cidades` VALUES ('3324', '9', 'Nova Glória', 'GO');
            INSERT INTO `cidades` VALUES ('3325', '25', 'Nova Granada', 'SP');
            INSERT INTO `cidades` VALUES ('3326', '11', 'Nova Guarita', 'MT');
            INSERT INTO `cidades` VALUES ('3327', '25', 'Nova Guataporanga', 'SP');
            INSERT INTO `cidades` VALUES ('3328', '21', 'Nova Hartz', 'RS');
            INSERT INTO `cidades` VALUES ('3329', '5', 'Nova Ibiá', 'BA');
            INSERT INTO `cidades` VALUES ('3330', '19', 'Nova Iguaçu', 'RJ');
            INSERT INTO `cidades` VALUES ('3331', '9', 'Nova Iguaçu de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('3332', '25', 'Nova Independência', 'SP');
            INSERT INTO `cidades` VALUES ('3333', '10', 'Nova Iorque', 'MA');
            INSERT INTO `cidades` VALUES ('3334', '14', 'Nova Ipixuna', 'PA');
            INSERT INTO `cidades` VALUES ('3335', '24', 'Nova Itaberaba', 'SC');
            INSERT INTO `cidades` VALUES ('3336', '5', 'Nova Itarana', 'BA');
            INSERT INTO `cidades` VALUES ('3337', '11', 'Nova Lacerda', 'MT');
            INSERT INTO `cidades` VALUES ('3338', '16', 'Nova Laranjeiras', 'PR');
            INSERT INTO `cidades` VALUES ('3339', '13', 'Nova Lima', 'MG');
            INSERT INTO `cidades` VALUES ('3340', '16', 'Nova Londrina', 'PR');
            INSERT INTO `cidades` VALUES ('3341', '25', 'Nova Luzitânia', 'SP');
            INSERT INTO `cidades` VALUES ('3342', '22', 'Nova Mamoré', 'RO');
            INSERT INTO `cidades` VALUES ('3343', '11', 'Nova Marilândia', 'MT');
            INSERT INTO `cidades` VALUES ('3344', '11', 'Nova Maringá', 'MT');
            INSERT INTO `cidades` VALUES ('3345', '13', 'Nova Módica', 'MG');
            INSERT INTO `cidades` VALUES ('3346', '11', 'Nova Monte Verde', 'MT');
            INSERT INTO `cidades` VALUES ('3347', '11', 'Nova Mutum', 'MT');
            INSERT INTO `cidades` VALUES ('3348', '11', 'Nova Nazaré', 'MT');
            INSERT INTO `cidades` VALUES ('3349', '25', 'Nova Odessa', 'SP');
            INSERT INTO `cidades` VALUES ('3350', '11', 'Nova Olímpia', 'MT');
            INSERT INTO `cidades` VALUES ('3351', '16', 'Nova Olímpia', 'PR');
            INSERT INTO `cidades` VALUES ('3352', '6', 'Nova Olinda', 'CE');
            INSERT INTO `cidades` VALUES ('3353', '15', 'Nova Olinda', 'PB');
            INSERT INTO `cidades` VALUES ('3354', '27', 'Nova Olinda', 'TO');
            INSERT INTO `cidades` VALUES ('3355', '10', 'Nova Olinda do Maranhão', 'MA');
            INSERT INTO `cidades` VALUES ('3356', '4', 'Nova Olinda do Norte', 'AM');
            INSERT INTO `cidades` VALUES ('3357', '21', 'Nova Pádua', 'RS');
            INSERT INTO `cidades` VALUES ('3358', '21', 'Nova Palma', 'RS');
            INSERT INTO `cidades` VALUES ('3359', '15', 'Nova Palmeira', 'PB');
            INSERT INTO `cidades` VALUES ('3360', '21', 'Nova Petrópolis', 'RS');
            INSERT INTO `cidades` VALUES ('3361', '13', 'Nova Ponte', 'MG');
            INSERT INTO `cidades` VALUES ('3362', '13', 'Nova Porteirinha', 'MG');
            INSERT INTO `cidades` VALUES ('3363', '21', 'Nova Prata', 'RS');
            INSERT INTO `cidades` VALUES ('3364', '16', 'Nova Prata do Iguaçu', 'PR');
            INSERT INTO `cidades` VALUES ('3365', '21', 'Nova Ramada', 'RS');
            INSERT INTO `cidades` VALUES ('3366', '5', 'Nova Redenção', 'BA');
            INSERT INTO `cidades` VALUES ('3367', '13', 'Nova Resende', 'MG');
            INSERT INTO `cidades` VALUES ('3368', '9', 'Nova Roma', 'GO');
            INSERT INTO `cidades` VALUES ('3369', '21', 'Nova Roma do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('3370', '27', 'Nova Rosalândia', 'TO');
            INSERT INTO `cidades` VALUES ('3371', '6', 'Nova Russas', 'CE');
            INSERT INTO `cidades` VALUES ('3372', '16', 'Nova Santa Bárbara', 'PR');
            INSERT INTO `cidades` VALUES ('3373', '11', 'Nova Santa Helena', 'MT');
            INSERT INTO `cidades` VALUES ('3374', '18', 'Nova Santa Rita', 'PI');
            INSERT INTO `cidades` VALUES ('3375', '21', 'Nova Santa Rita', 'RS');
            INSERT INTO `cidades` VALUES ('3376', '16', 'Nova Santa Rosa', 'PR');
            INSERT INTO `cidades` VALUES ('3377', '13', 'Nova Serrana', 'MG');
            INSERT INTO `cidades` VALUES ('3378', '5', 'Nova Soure', 'BA');
            INSERT INTO `cidades` VALUES ('3379', '16', 'Nova Tebas', 'PR');
            INSERT INTO `cidades` VALUES ('3380', '14', 'Nova Timboteua', 'PA');
            INSERT INTO `cidades` VALUES ('3381', '24', 'Nova Trento', 'SC');
            INSERT INTO `cidades` VALUES ('3382', '11', 'Nova Ubiratã', 'MT');
            INSERT INTO `cidades` VALUES ('3383', '13', 'Nova União', 'MG');
            INSERT INTO `cidades` VALUES ('3384', '22', 'Nova União', 'RO');
            INSERT INTO `cidades` VALUES ('3385', '8', 'Nova Venécia', 'ES');
            INSERT INTO `cidades` VALUES ('3386', '9', 'Nova Veneza', 'GO');
            INSERT INTO `cidades` VALUES ('3387', '24', 'Nova Veneza', 'SC');
            INSERT INTO `cidades` VALUES ('3388', '5', 'Nova Viçosa', 'BA');
            INSERT INTO `cidades` VALUES ('3389', '11', 'Nova Xavantina', 'MT');
            INSERT INTO `cidades` VALUES ('3390', '25', 'Novais', 'SP');
            INSERT INTO `cidades` VALUES ('3391', '27', 'Novo Acordo', 'TO');
            INSERT INTO `cidades` VALUES ('3392', '4', 'Novo Airão', 'AM');
            INSERT INTO `cidades` VALUES ('3393', '27', 'Novo Alegre', 'TO');
            INSERT INTO `cidades` VALUES ('3394', '4', 'Novo Aripuanã', 'AM');
            INSERT INTO `cidades` VALUES ('3395', '21', 'Novo Barreiro', 'RS');
            INSERT INTO `cidades` VALUES ('3396', '9', 'Novo Brasil', 'GO');
            INSERT INTO `cidades` VALUES ('3397', '21', 'Novo Cabrais', 'RS');
            INSERT INTO `cidades` VALUES ('3398', '13', 'Novo Cruzeiro', 'MG');
            INSERT INTO `cidades` VALUES ('3399', '9', 'Novo Gama', 'GO');
            INSERT INTO `cidades` VALUES ('3400', '21', 'Novo Hamburgo', 'RS');
            INSERT INTO `cidades` VALUES ('3401', '5', 'Novo Horizonte', 'BA');
            INSERT INTO `cidades` VALUES ('3402', '24', 'Novo Horizonte', 'SC');
            INSERT INTO `cidades` VALUES ('3403', '25', 'Novo Horizonte', 'SP');
            INSERT INTO `cidades` VALUES ('3404', '11', 'Novo Horizonte do Norte', 'MT');
            INSERT INTO `cidades` VALUES ('3405', '22', 'Novo Horizonte do Oeste', 'RO');
            INSERT INTO `cidades` VALUES ('3406', '12', 'Novo Horizonte do Sul', 'MS');
            INSERT INTO `cidades` VALUES ('3407', '16', 'Novo Itacolomi', 'PR');
            INSERT INTO `cidades` VALUES ('3408', '27', 'Novo Jardim', 'TO');
            INSERT INTO `cidades` VALUES ('3409', '2', 'Novo Lino', 'AL');
            INSERT INTO `cidades` VALUES ('3410', '21', 'Novo Machado', 'RS');
            INSERT INTO `cidades` VALUES ('3411', '11', 'Novo Mundo', 'MT');
            INSERT INTO `cidades` VALUES ('3412', '6', 'Novo Oriente', 'CE');
            INSERT INTO `cidades` VALUES ('3413', '13', 'Novo Oriente de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('3414', '18', 'Novo Oriente do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('3415', '9', 'Novo Planalto', 'GO');
            INSERT INTO `cidades` VALUES ('3416', '14', 'Novo Progresso', 'PA');
            INSERT INTO `cidades` VALUES ('3417', '14', 'Novo Repartimento', 'PA');
            INSERT INTO `cidades` VALUES ('3418', '11', 'Novo Santo Antônio', 'MT');
            INSERT INTO `cidades` VALUES ('3419', '18', 'Novo Santo Antônio', 'PI');
            INSERT INTO `cidades` VALUES ('3420', '11', 'Novo São Joaquim', 'MT');
            INSERT INTO `cidades` VALUES ('3421', '21', 'Novo Tiradentes', 'RS');
            INSERT INTO `cidades` VALUES ('3422', '5', 'Novo Triunfo', 'BA');
            INSERT INTO `cidades` VALUES ('3423', '21', 'Novo Xingu', 'RS');
            INSERT INTO `cidades` VALUES ('3424', '13', 'Novorizonte', 'MG');
            INSERT INTO `cidades` VALUES ('3425', '25', 'Nuporanga', 'SP');
            INSERT INTO `cidades` VALUES ('3426', '14', 'Óbidos', 'PA');
            INSERT INTO `cidades` VALUES ('3427', '6', 'Ocara', 'CE');
            INSERT INTO `cidades` VALUES ('3428', '25', 'Ocauçu', 'SP');
            INSERT INTO `cidades` VALUES ('3429', '18', 'Oeiras', 'PI');
            INSERT INTO `cidades` VALUES ('3430', '14', 'Oeiras do Pará', 'PA');
            INSERT INTO `cidades` VALUES ('3431', '3', 'Oiapoque', 'AP');
            INSERT INTO `cidades` VALUES ('3432', '13', 'Olaria', 'MG');
            INSERT INTO `cidades` VALUES ('3433', '25', 'Óleo', 'SP');
            INSERT INTO `cidades` VALUES ('3434', '15', 'Olho d\'Água', 'PB');
            INSERT INTO `cidades` VALUES ('3435', '10', 'Olho d\'Água das Cunhãs', 'MA');
            INSERT INTO `cidades` VALUES ('3436', '2', 'Olho d\'Água das Flores', 'AL');
            INSERT INTO `cidades` VALUES ('3437', '2', 'Olho d\'Água do Casado', 'AL');
            INSERT INTO `cidades` VALUES ('3438', '18', 'Olho D\'Água do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('3439', '2', 'Olho d\'Água Grande', 'AL');
            INSERT INTO `cidades` VALUES ('3440', '20', 'Olho-d\'Água do Borges', 'RN');
            INSERT INTO `cidades` VALUES ('3441', '13', 'Olhos-d\'Água', 'MG');
            INSERT INTO `cidades` VALUES ('3442', '25', 'Olímpia', 'SP');
            INSERT INTO `cidades` VALUES ('3443', '13', 'Olímpio Noronha', 'MG');
            INSERT INTO `cidades` VALUES ('3444', '17', 'Olinda', 'PE');
            INSERT INTO `cidades` VALUES ('3445', '10', 'Olinda Nova do Maranhão', 'MA');
            INSERT INTO `cidades` VALUES ('3446', '5', 'Olindina', 'BA');
            INSERT INTO `cidades` VALUES ('3447', '15', 'Olivedos', 'PB');
            INSERT INTO `cidades` VALUES ('3448', '13', 'Oliveira', 'MG');
            INSERT INTO `cidades` VALUES ('3449', '27', 'Oliveira de Fátima', 'TO');
            INSERT INTO `cidades` VALUES ('3450', '5', 'Oliveira dos Brejinhos', 'BA');
            INSERT INTO `cidades` VALUES ('3451', '13', 'Oliveira Fortes', 'MG');
            INSERT INTO `cidades` VALUES ('3452', '2', 'Olivença', 'AL');
            INSERT INTO `cidades` VALUES ('3453', '13', 'Onça de Pitangui', 'MG');
            INSERT INTO `cidades` VALUES ('3454', '25', 'Onda Verde', 'SP');
            INSERT INTO `cidades` VALUES ('3455', '13', 'Oratórios', 'MG');
            INSERT INTO `cidades` VALUES ('3456', '25', 'Oriente', 'SP');
            INSERT INTO `cidades` VALUES ('3457', '25', 'Orindiúva', 'SP');
            INSERT INTO `cidades` VALUES ('3458', '14', 'Oriximiná', 'PA');
            INSERT INTO `cidades` VALUES ('3459', '13', 'Orizânia', 'MG');
            INSERT INTO `cidades` VALUES ('3460', '9', 'Orizona', 'GO');
            INSERT INTO `cidades` VALUES ('3461', '25', 'Orlândia', 'SP');
            INSERT INTO `cidades` VALUES ('3462', '24', 'Orleans', 'SC');
            INSERT INTO `cidades` VALUES ('3463', '17', 'Orobó', 'PE');
            INSERT INTO `cidades` VALUES ('3464', '17', 'Orocó', 'PE');
            INSERT INTO `cidades` VALUES ('3465', '6', 'Orós', 'CE');
            INSERT INTO `cidades` VALUES ('3466', '16', 'Ortigueira', 'PR');
            INSERT INTO `cidades` VALUES ('3467', '25', 'Osasco', 'SP');
            INSERT INTO `cidades` VALUES ('3468', '25', 'Oscar Bressane', 'SP');
            INSERT INTO `cidades` VALUES ('3469', '21', 'Osório', 'RS');
            INSERT INTO `cidades` VALUES ('3470', '25', 'Osvaldo Cruz', 'SP');
            INSERT INTO `cidades` VALUES ('3471', '24', 'Otacílio Costa', 'SC');
            INSERT INTO `cidades` VALUES ('3472', '14', 'Ourém', 'PA');
            INSERT INTO `cidades` VALUES ('3473', '5', 'Ouriçangas', 'BA');
            INSERT INTO `cidades` VALUES ('3474', '17', 'Ouricuri', 'PE');
            INSERT INTO `cidades` VALUES ('3475', '14', 'Ourilândia do Norte', 'PA');
            INSERT INTO `cidades` VALUES ('3476', '25', 'Ourinhos', 'SP');
            INSERT INTO `cidades` VALUES ('3477', '16', 'Ourizona', 'PR');
            INSERT INTO `cidades` VALUES ('3478', '24', 'Ouro', 'SC');
            INSERT INTO `cidades` VALUES ('3479', '2', 'Ouro Branco', 'AL');
            INSERT INTO `cidades` VALUES ('3480', '13', 'Ouro Branco', 'MG');
            INSERT INTO `cidades` VALUES ('3481', '20', 'Ouro Branco', 'RN');
            INSERT INTO `cidades` VALUES ('3482', '13', 'Ouro Fino', 'MG');
            INSERT INTO `cidades` VALUES ('3483', '13', 'Ouro Preto', 'MG');
            INSERT INTO `cidades` VALUES ('3484', '22', 'Ouro Preto do Oeste', 'RO');
            INSERT INTO `cidades` VALUES ('3485', '15', 'Ouro Velho', 'PB');
            INSERT INTO `cidades` VALUES ('3486', '24', 'Ouro Verde', 'SC');
            INSERT INTO `cidades` VALUES ('3487', '25', 'Ouro Verde', 'SP');
            INSERT INTO `cidades` VALUES ('3488', '9', 'Ouro Verde de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('3489', '13', 'Ouro Verde de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('3490', '16', 'Ouro Verde do Oeste', 'PR');
            INSERT INTO `cidades` VALUES ('3491', '25', 'Ouroeste', 'SP');
            INSERT INTO `cidades` VALUES ('3492', '5', 'Ourolândia', 'BA');
            INSERT INTO `cidades` VALUES ('3493', '9', 'Ouvidor', 'GO');
            INSERT INTO `cidades` VALUES ('3494', '25', 'Pacaembu', 'SP');
            INSERT INTO `cidades` VALUES ('3495', '14', 'Pacajá', 'PA');
            INSERT INTO `cidades` VALUES ('3496', '6', 'Pacajus', 'CE');
            INSERT INTO `cidades` VALUES ('3497', '23', 'Pacaraima', 'RR');
            INSERT INTO `cidades` VALUES ('3498', '6', 'Pacatuba', 'CE');
            INSERT INTO `cidades` VALUES ('3499', '26', 'Pacatuba', 'SE');
            INSERT INTO `cidades` VALUES ('3500', '10', 'Paço do Lumiar', 'MA');
            INSERT INTO `cidades` VALUES ('3501', '6', 'Pacoti', 'CE');
            INSERT INTO `cidades` VALUES ('3502', '6', 'Pacujá', 'CE');
            INSERT INTO `cidades` VALUES ('3503', '9', 'Padre Bernardo', 'GO');
            INSERT INTO `cidades` VALUES ('3504', '13', 'Padre Carvalho', 'MG');
            INSERT INTO `cidades` VALUES ('3505', '18', 'Padre Marcos', 'PI');
            INSERT INTO `cidades` VALUES ('3506', '13', 'Padre Paraíso', 'MG');
            INSERT INTO `cidades` VALUES ('3507', '18', 'Paes Landim', 'PI');
            INSERT INTO `cidades` VALUES ('3508', '13', 'Pai Pedro', 'MG');
            INSERT INTO `cidades` VALUES ('3509', '24', 'Paial', 'SC');
            INSERT INTO `cidades` VALUES ('3510', '16', 'Paiçandu', 'PR');
            INSERT INTO `cidades` VALUES ('3511', '21', 'Paim Filho', 'RS');
            INSERT INTO `cidades` VALUES ('3512', '13', 'Paineiras', 'MG');
            INSERT INTO `cidades` VALUES ('3513', '24', 'Painel', 'SC');
            INSERT INTO `cidades` VALUES ('3514', '13', 'Pains', 'MG');
            INSERT INTO `cidades` VALUES ('3515', '13', 'Paiva', 'MG');
            INSERT INTO `cidades` VALUES ('3516', '18', 'Pajeú do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('3517', '2', 'Palestina', 'AL');
            INSERT INTO `cidades` VALUES ('3518', '25', 'Palestina', 'SP');
            INSERT INTO `cidades` VALUES ('3519', '9', 'Palestina de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('3520', '14', 'Palestina do Pará', 'PA');
            INSERT INTO `cidades` VALUES ('3521', '6', 'Palhano', 'CE');
            INSERT INTO `cidades` VALUES ('3522', '24', 'Palhoça', 'SC');
            INSERT INTO `cidades` VALUES ('3523', '13', 'Palma', 'MG');
            INSERT INTO `cidades` VALUES ('3524', '24', 'Palma Sola', 'SC');
            INSERT INTO `cidades` VALUES ('3525', '6', 'Palmácia', 'CE');
            INSERT INTO `cidades` VALUES ('3526', '17', 'Palmares', 'PE');
            INSERT INTO `cidades` VALUES ('3527', '21', 'Palmares do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('3528', '25', 'Palmares Paulista', 'SP');
            INSERT INTO `cidades` VALUES ('3529', '16', 'Palmas', 'PR');
            INSERT INTO `cidades` VALUES ('3530', '27', 'Palmas', 'TO');
            INSERT INTO `cidades` VALUES ('3531', '5', 'Palmas de Monte Alto', 'BA');
            INSERT INTO `cidades` VALUES ('3532', '16', 'Palmeira', 'PR');
            INSERT INTO `cidades` VALUES ('3533', '24', 'Palmeira', 'SC');
            INSERT INTO `cidades` VALUES ('3534', '21', 'Palmeira das Missões', 'RS');
            INSERT INTO `cidades` VALUES ('3535', '18', 'Palmeira do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('3536', '25', 'Palmeira d\'Oeste', 'SP');
            INSERT INTO `cidades` VALUES ('3537', '2', 'Palmeira dos Índios', 'AL');
            INSERT INTO `cidades` VALUES ('3538', '18', 'Palmeirais', 'PI');
            INSERT INTO `cidades` VALUES ('3539', '10', 'Palmeirândia', 'MA');
            INSERT INTO `cidades` VALUES ('3540', '27', 'Palmeirante', 'TO');
            INSERT INTO `cidades` VALUES ('3541', '5', 'Palmeiras', 'BA');
            INSERT INTO `cidades` VALUES ('3542', '9', 'Palmeiras de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('3543', '27', 'Palmeiras do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('3544', '17', 'Palmeirina', 'PE');
            INSERT INTO `cidades` VALUES ('3545', '27', 'Palmeirópolis', 'TO');
            INSERT INTO `cidades` VALUES ('3546', '9', 'Palmelo', 'GO');
            INSERT INTO `cidades` VALUES ('3547', '9', 'Palminópolis', 'GO');
            INSERT INTO `cidades` VALUES ('3548', '16', 'Palmital', 'PR');
            INSERT INTO `cidades` VALUES ('3549', '25', 'Palmital', 'SP');
            INSERT INTO `cidades` VALUES ('3550', '21', 'Palmitinho', 'RS');
            INSERT INTO `cidades` VALUES ('3551', '24', 'Palmitos', 'SC');
            INSERT INTO `cidades` VALUES ('3552', '13', 'Palmópolis', 'MG');
            INSERT INTO `cidades` VALUES ('3553', '16', 'Palotina', 'PR');
            INSERT INTO `cidades` VALUES ('3554', '9', 'Panamá', 'GO');
            INSERT INTO `cidades` VALUES ('3555', '21', 'Panambi', 'RS');
            INSERT INTO `cidades` VALUES ('3556', '8', 'Pancas', 'ES');
            INSERT INTO `cidades` VALUES ('3557', '17', 'Panelas', 'PE');
            INSERT INTO `cidades` VALUES ('3558', '25', 'Panorama', 'SP');
            INSERT INTO `cidades` VALUES ('3559', '21', 'Pantano Grande', 'RS');
            INSERT INTO `cidades` VALUES ('3560', '2', 'Pão de Açúcar', 'AL');
            INSERT INTO `cidades` VALUES ('3561', '13', 'Papagaios', 'MG');
            INSERT INTO `cidades` VALUES ('3562', '24', 'Papanduva', 'SC');
            INSERT INTO `cidades` VALUES ('3563', '18', 'Paquetá', 'PI');
            INSERT INTO `cidades` VALUES ('3564', '13', 'Pará de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('3565', '19', 'Paracambi', 'RJ');
            INSERT INTO `cidades` VALUES ('3566', '13', 'Paracatu', 'MG');
            INSERT INTO `cidades` VALUES ('3567', '6', 'Paracuru', 'CE');
            INSERT INTO `cidades` VALUES ('3568', '14', 'Paragominas', 'PA');
            INSERT INTO `cidades` VALUES ('3569', '13', 'Paraguaçu', 'MG');
            INSERT INTO `cidades` VALUES ('3570', '25', 'Paraguaçu Paulista', 'SP');
            INSERT INTO `cidades` VALUES ('3571', '21', 'Paraí', 'RS');
            INSERT INTO `cidades` VALUES ('3572', '19', 'Paraíba do Sul', 'RJ');
            INSERT INTO `cidades` VALUES ('3573', '10', 'Paraibano', 'MA');
            INSERT INTO `cidades` VALUES ('3574', '25', 'Paraibuna', 'SP');
            INSERT INTO `cidades` VALUES ('3575', '6', 'Paraipaba', 'CE');
            INSERT INTO `cidades` VALUES ('3576', '24', 'Paraíso', 'SC');
            INSERT INTO `cidades` VALUES ('3577', '25', 'Paraíso', 'SP');
            INSERT INTO `cidades` VALUES ('3578', '16', 'Paraíso do Norte', 'PR');
            INSERT INTO `cidades` VALUES ('3579', '21', 'Paraíso do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('3580', '27', 'Paraíso do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('3581', '13', 'Paraisópolis', 'MG');
            INSERT INTO `cidades` VALUES ('3582', '6', 'Parambu', 'CE');
            INSERT INTO `cidades` VALUES ('3583', '5', 'Paramirim', 'BA');
            INSERT INTO `cidades` VALUES ('3584', '6', 'Paramoti', 'CE');
            INSERT INTO `cidades` VALUES ('3585', '20', 'Paraná', 'RN');
            INSERT INTO `cidades` VALUES ('3586', '27', 'Paranã', 'TO');
            INSERT INTO `cidades` VALUES ('3587', '16', 'Paranacity', 'PR');
            INSERT INTO `cidades` VALUES ('3588', '16', 'Paranaguá', 'PR');
            INSERT INTO `cidades` VALUES ('3589', '12', 'Paranaíba', 'MS');
            INSERT INTO `cidades` VALUES ('3590', '9', 'Paranaiguara', 'GO');
            INSERT INTO `cidades` VALUES ('3591', '11', 'Paranaíta', 'MT');
            INSERT INTO `cidades` VALUES ('3592', '25', 'Paranapanema', 'SP');
            INSERT INTO `cidades` VALUES ('3593', '16', 'Paranapoema', 'PR');
            INSERT INTO `cidades` VALUES ('3594', '25', 'Paranapuã', 'SP');
            INSERT INTO `cidades` VALUES ('3595', '17', 'Paranatama', 'PE');
            INSERT INTO `cidades` VALUES ('3596', '11', 'Paranatinga', 'MT');
            INSERT INTO `cidades` VALUES ('3597', '16', 'Paranavaí', 'PR');
            INSERT INTO `cidades` VALUES ('3598', '12', 'Paranhos', 'MS');
            INSERT INTO `cidades` VALUES ('3599', '13', 'Paraopeba', 'MG');
            INSERT INTO `cidades` VALUES ('3600', '25', 'Parapuã', 'SP');
            INSERT INTO `cidades` VALUES ('3601', '15', 'Parari', 'PB');
            INSERT INTO `cidades` VALUES ('3602', '5', 'Paratinga', 'BA');
            INSERT INTO `cidades` VALUES ('3603', '19', 'Paraty', 'RJ');
            INSERT INTO `cidades` VALUES ('3604', '20', 'Paraú', 'RN');
            INSERT INTO `cidades` VALUES ('3605', '14', 'Parauapebas', 'PA');
            INSERT INTO `cidades` VALUES ('3606', '9', 'Paraúna', 'GO');
            INSERT INTO `cidades` VALUES ('3607', '20', 'Parazinho', 'RN');
            INSERT INTO `cidades` VALUES ('3608', '25', 'Pardinho', 'SP');
            INSERT INTO `cidades` VALUES ('3609', '21', 'Pareci Novo', 'RS');
            INSERT INTO `cidades` VALUES ('3610', '22', 'Parecis', 'RO');
            INSERT INTO `cidades` VALUES ('3611', '20', 'Parelhas', 'RN');
            INSERT INTO `cidades` VALUES ('3612', '2', 'Pariconha', 'AL');
            INSERT INTO `cidades` VALUES ('3613', '4', 'Parintins', 'AM');
            INSERT INTO `cidades` VALUES ('3614', '5', 'Paripiranga', 'BA');
            INSERT INTO `cidades` VALUES ('3615', '2', 'Paripueira', 'AL');
            INSERT INTO `cidades` VALUES ('3616', '25', 'Pariquera-Açu', 'SP');
            INSERT INTO `cidades` VALUES ('3617', '25', 'Parisi', 'SP');
            INSERT INTO `cidades` VALUES ('3618', '18', 'Parnaguá', 'PI');
            INSERT INTO `cidades` VALUES ('3619', '18', 'Parnaíba', 'PI');
            INSERT INTO `cidades` VALUES ('3620', '17', 'Parnamirim', 'PE');
            INSERT INTO `cidades` VALUES ('3621', '20', 'Parnamirim', 'RN');
            INSERT INTO `cidades` VALUES ('3622', '10', 'Parnarama', 'MA');
            INSERT INTO `cidades` VALUES ('3623', '21', 'Parobé', 'RS');
            INSERT INTO `cidades` VALUES ('3624', '20', 'Passa e Fica', 'RN');
            INSERT INTO `cidades` VALUES ('3625', '13', 'Passa Quatro', 'MG');
            INSERT INTO `cidades` VALUES ('3626', '21', 'Passa Sete', 'RS');
            INSERT INTO `cidades` VALUES ('3627', '13', 'Passa Tempo', 'MG');
            INSERT INTO `cidades` VALUES ('3628', '13', 'Passabém', 'MG');
            INSERT INTO `cidades` VALUES ('3629', '15', 'Passagem', 'PB');
            INSERT INTO `cidades` VALUES ('3630', '20', 'Passagem', 'RN');
            INSERT INTO `cidades` VALUES ('3631', '10', 'Passagem Franca', 'MA');
            INSERT INTO `cidades` VALUES ('3632', '18', 'Passagem Franca do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('3633', '13', 'Passa-Vinte', 'MG');
            INSERT INTO `cidades` VALUES ('3634', '17', 'Passira', 'PE');
            INSERT INTO `cidades` VALUES ('3635', '2', 'Passo de Camaragibe', 'AL');
            INSERT INTO `cidades` VALUES ('3636', '24', 'Passo de Torres', 'SC');
            INSERT INTO `cidades` VALUES ('3637', '21', 'Passo do Sobrado', 'RS');
            INSERT INTO `cidades` VALUES ('3638', '21', 'Passo Fundo', 'RS');
            INSERT INTO `cidades` VALUES ('3639', '13', 'Passos', 'MG');
            INSERT INTO `cidades` VALUES ('3640', '24', 'Passos Maia', 'SC');
            INSERT INTO `cidades` VALUES ('3641', '10', 'Pastos Bons', 'MA');
            INSERT INTO `cidades` VALUES ('3642', '13', 'Patis', 'MG');
            INSERT INTO `cidades` VALUES ('3643', '16', 'Pato Bragado', 'PR');
            INSERT INTO `cidades` VALUES ('3644', '16', 'Pato Branco', 'PR');
            INSERT INTO `cidades` VALUES ('3645', '15', 'Patos', 'PB');
            INSERT INTO `cidades` VALUES ('3646', '13', 'Patos de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('3647', '18', 'Patos do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('3648', '13', 'Patrocínio', 'MG');
            INSERT INTO `cidades` VALUES ('3649', '13', 'Patrocínio do Muriaé', 'MG');
            INSERT INTO `cidades` VALUES ('3650', '25', 'Patrocínio Paulista', 'SP');
            INSERT INTO `cidades` VALUES ('3651', '20', 'Patu', 'RN');
            INSERT INTO `cidades` VALUES ('3652', '19', 'Paty do Alferes', 'RJ');
            INSERT INTO `cidades` VALUES ('3653', '5', 'Pau Brasil', 'BA');
            INSERT INTO `cidades` VALUES ('3654', '14', 'Pau D\'Arco', 'PA');
            INSERT INTO `cidades` VALUES ('3655', '27', 'Pau D\'Arco', 'TO');
            INSERT INTO `cidades` VALUES ('3656', '18', 'Pau D\'Arco do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('3657', '20', 'Pau dos Ferros', 'RN');
            INSERT INTO `cidades` VALUES ('3658', '17', 'Paudalho', 'PE');
            INSERT INTO `cidades` VALUES ('3659', '4', 'Pauini', 'AM');
            INSERT INTO `cidades` VALUES ('3660', '13', 'Paula Cândido', 'MG');
            INSERT INTO `cidades` VALUES ('3661', '16', 'Paula Freitas', 'PR');
            INSERT INTO `cidades` VALUES ('3662', '25', 'Paulicéia', 'SP');
            INSERT INTO `cidades` VALUES ('3663', '25', 'Paulínia', 'SP');
            INSERT INTO `cidades` VALUES ('3664', '10', 'Paulino Neves', 'MA');
            INSERT INTO `cidades` VALUES ('3665', '15', 'Paulista', 'PB');
            INSERT INTO `cidades` VALUES ('3666', '17', 'Paulista', 'PE');
            INSERT INTO `cidades` VALUES ('3667', '18', 'Paulistana', 'PI');
            INSERT INTO `cidades` VALUES ('3668', '25', 'Paulistânia', 'SP');
            INSERT INTO `cidades` VALUES ('3669', '13', 'Paulistas', 'MG');
            INSERT INTO `cidades` VALUES ('3670', '5', 'Paulo Afonso', 'BA');
            INSERT INTO `cidades` VALUES ('3671', '21', 'Paulo Bento', 'RS');
            INSERT INTO `cidades` VALUES ('3672', '25', 'Paulo de Faria', 'SP');
            INSERT INTO `cidades` VALUES ('3673', '16', 'Paulo Frontin', 'PR');
            INSERT INTO `cidades` VALUES ('3674', '2', 'Paulo Jacinto', 'AL');
            INSERT INTO `cidades` VALUES ('3675', '24', 'Paulo Lopes', 'SC');
            INSERT INTO `cidades` VALUES ('3676', '10', 'Paulo Ramos', 'MA');
            INSERT INTO `cidades` VALUES ('3677', '13', 'Pavão', 'MG');
            INSERT INTO `cidades` VALUES ('3678', '21', 'Paverama', 'RS');
            INSERT INTO `cidades` VALUES ('3679', '18', 'Pavussu', 'PI');
            INSERT INTO `cidades` VALUES ('3680', '5', 'Pé de Serra', 'BA');
            INSERT INTO `cidades` VALUES ('3681', '16', 'Peabiru', 'PR');
            INSERT INTO `cidades` VALUES ('3682', '13', 'Peçanha', 'MG');
            INSERT INTO `cidades` VALUES ('3683', '25', 'Pederneiras', 'SP');
            INSERT INTO `cidades` VALUES ('3684', '17', 'Pedra', 'PE');
            INSERT INTO `cidades` VALUES ('3685', '13', 'Pedra Azul', 'MG');
            INSERT INTO `cidades` VALUES ('3686', '25', 'Pedra Bela', 'SP');
            INSERT INTO `cidades` VALUES ('3687', '13', 'Pedra Bonita', 'MG');
            INSERT INTO `cidades` VALUES ('3688', '6', 'Pedra Branca', 'CE');
            INSERT INTO `cidades` VALUES ('3689', '15', 'Pedra Branca', 'PB');
            INSERT INTO `cidades` VALUES ('3690', '3', 'Pedra Branca do Amapari', 'AP');
            INSERT INTO `cidades` VALUES ('3691', '13', 'Pedra do Anta', 'MG');
            INSERT INTO `cidades` VALUES ('3692', '13', 'Pedra do Indaiá', 'MG');
            INSERT INTO `cidades` VALUES ('3693', '13', 'Pedra Dourada', 'MG');
            INSERT INTO `cidades` VALUES ('3694', '20', 'Pedra Grande', 'RN');
            INSERT INTO `cidades` VALUES ('3695', '15', 'Pedra Lavrada', 'PB');
            INSERT INTO `cidades` VALUES ('3696', '26', 'Pedra Mole', 'SE');
            INSERT INTO `cidades` VALUES ('3697', '11', 'Pedra Preta', 'MT');
            INSERT INTO `cidades` VALUES ('3698', '20', 'Pedra Preta', 'RN');
            INSERT INTO `cidades` VALUES ('3699', '13', 'Pedralva', 'MG');
            INSERT INTO `cidades` VALUES ('3700', '25', 'Pedranópolis', 'SP');
            INSERT INTO `cidades` VALUES ('3701', '5', 'Pedrão', 'BA');
            INSERT INTO `cidades` VALUES ('3702', '21', 'Pedras Altas', 'RS');
            INSERT INTO `cidades` VALUES ('3703', '15', 'Pedras de Fogo', 'PB');
            INSERT INTO `cidades` VALUES ('3704', '13', 'Pedras de Maria da Cruz', 'MG');
            INSERT INTO `cidades` VALUES ('3705', '24', 'Pedras Grandes', 'SC');
            INSERT INTO `cidades` VALUES ('3706', '25', 'Pedregulho', 'SP');
            INSERT INTO `cidades` VALUES ('3707', '25', 'Pedreira', 'SP');
            INSERT INTO `cidades` VALUES ('3708', '10', 'Pedreiras', 'MA');
            INSERT INTO `cidades` VALUES ('3709', '26', 'Pedrinhas', 'SE');
            INSERT INTO `cidades` VALUES ('3710', '25', 'Pedrinhas Paulista', 'SP');
            INSERT INTO `cidades` VALUES ('3711', '13', 'Pedrinópolis', 'MG');
            INSERT INTO `cidades` VALUES ('3712', '27', 'Pedro Afonso', 'TO');
            INSERT INTO `cidades` VALUES ('3713', '5', 'Pedro Alexandre', 'BA');
            INSERT INTO `cidades` VALUES ('3714', '20', 'Pedro Avelino', 'RN');
            INSERT INTO `cidades` VALUES ('3715', '8', 'Pedro Canário', 'ES');
            INSERT INTO `cidades` VALUES ('3716', '25', 'Pedro de Toledo', 'SP');
            INSERT INTO `cidades` VALUES ('3717', '10', 'Pedro do Rosário', 'MA');
            INSERT INTO `cidades` VALUES ('3718', '12', 'Pedro Gomes', 'MS');
            INSERT INTO `cidades` VALUES ('3719', '18', 'Pedro II', 'PI');
            INSERT INTO `cidades` VALUES ('3720', '18', 'Pedro Laurentino', 'PI');
            INSERT INTO `cidades` VALUES ('3721', '13', 'Pedro Leopoldo', 'MG');
            INSERT INTO `cidades` VALUES ('3722', '21', 'Pedro Osório', 'RS');
            INSERT INTO `cidades` VALUES ('3723', '15', 'Pedro Régis', 'PB');
            INSERT INTO `cidades` VALUES ('3724', '13', 'Pedro Teixeira', 'MG');
            INSERT INTO `cidades` VALUES ('3725', '20', 'Pedro Velho', 'RN');
            INSERT INTO `cidades` VALUES ('3726', '27', 'Peixe', 'TO');
            INSERT INTO `cidades` VALUES ('3727', '14', 'Peixe-Boi', 'PA');
            INSERT INTO `cidades` VALUES ('3728', '11', 'Peixoto de Azevedo', 'MT');
            INSERT INTO `cidades` VALUES ('3729', '21', 'Pejuçara', 'RS');
            INSERT INTO `cidades` VALUES ('3730', '21', 'Pelotas', 'RS');
            INSERT INTO `cidades` VALUES ('3731', '6', 'Penaforte', 'CE');
            INSERT INTO `cidades` VALUES ('3732', '10', 'Penalva', 'MA');
            INSERT INTO `cidades` VALUES ('3733', '25', 'Penápolis', 'SP');
            INSERT INTO `cidades` VALUES ('3734', '20', 'Pendências', 'RN');
            INSERT INTO `cidades` VALUES ('3735', '2', 'Penedo', 'AL');
            INSERT INTO `cidades` VALUES ('3736', '24', 'Penha', 'SC');
            INSERT INTO `cidades` VALUES ('3737', '6', 'Pentecoste', 'CE');
            INSERT INTO `cidades` VALUES ('3738', '13', 'Pequeri', 'MG');
            INSERT INTO `cidades` VALUES ('3739', '13', 'Pequi', 'MG');
            INSERT INTO `cidades` VALUES ('3740', '27', 'Pequizeiro', 'TO');
            INSERT INTO `cidades` VALUES ('3741', '13', 'Perdigão', 'MG');
            INSERT INTO `cidades` VALUES ('3742', '13', 'Perdizes', 'MG');
            INSERT INTO `cidades` VALUES ('3743', '13', 'Perdões', 'MG');
            INSERT INTO `cidades` VALUES ('3744', '25', 'Pereira Barreto', 'SP');
            INSERT INTO `cidades` VALUES ('3745', '25', 'Pereiras', 'SP');
            INSERT INTO `cidades` VALUES ('3746', '6', 'Pereiro', 'CE');
            INSERT INTO `cidades` VALUES ('3747', '10', 'Peri Mirim', 'MA');
            INSERT INTO `cidades` VALUES ('3748', '13', 'Periquito', 'MG');
            INSERT INTO `cidades` VALUES ('3749', '24', 'Peritiba', 'SC');
            INSERT INTO `cidades` VALUES ('3750', '10', 'Peritoró', 'MA');
            INSERT INTO `cidades` VALUES ('3751', '16', 'Perobal', 'PR');
            INSERT INTO `cidades` VALUES ('3752', '16', 'Pérola', 'PR');
            INSERT INTO `cidades` VALUES ('3753', '16', 'Pérola d\'Oeste', 'PR');
            INSERT INTO `cidades` VALUES ('3754', '9', 'Perolândia', 'GO');
            INSERT INTO `cidades` VALUES ('3755', '25', 'Peruíbe', 'SP');
            INSERT INTO `cidades` VALUES ('3756', '13', 'Pescador', 'MG');
            INSERT INTO `cidades` VALUES ('3757', '17', 'Pesqueira', 'PE');
            INSERT INTO `cidades` VALUES ('3758', '17', 'Petrolândia', 'PE');
            INSERT INTO `cidades` VALUES ('3759', '24', 'Petrolândia', 'SC');
            INSERT INTO `cidades` VALUES ('3760', '17', 'Petrolina', 'PE');
            INSERT INTO `cidades` VALUES ('3761', '9', 'Petrolina de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('3762', '19', 'Petrópolis', 'RJ');
            INSERT INTO `cidades` VALUES ('3763', '2', 'Piaçabuçu', 'AL');
            INSERT INTO `cidades` VALUES ('3764', '25', 'Piacatu', 'SP');
            INSERT INTO `cidades` VALUES ('3765', '15', 'Piancó', 'PB');
            INSERT INTO `cidades` VALUES ('3766', '5', 'Piatã', 'BA');
            INSERT INTO `cidades` VALUES ('3767', '13', 'Piau', 'MG');
            INSERT INTO `cidades` VALUES ('3768', '21', 'Picada Café', 'RS');
            INSERT INTO `cidades` VALUES ('3769', '14', 'Piçarra', 'PA');
            INSERT INTO `cidades` VALUES ('3770', '18', 'Picos', 'PI');
            INSERT INTO `cidades` VALUES ('3771', '15', 'Picuí', 'PB');
            INSERT INTO `cidades` VALUES ('3772', '25', 'Piedade', 'SP');
            INSERT INTO `cidades` VALUES ('3773', '13', 'Piedade de Caratinga', 'MG');
            INSERT INTO `cidades` VALUES ('3774', '13', 'Piedade de Ponte Nova', 'MG');
            INSERT INTO `cidades` VALUES ('3775', '13', 'Piedade do Rio Grande', 'MG');
            INSERT INTO `cidades` VALUES ('3776', '13', 'Piedade dos Gerais', 'MG');
            INSERT INTO `cidades` VALUES ('3777', '16', 'Piên', 'PR');
            INSERT INTO `cidades` VALUES ('3778', '5', 'Pilão Arcado', 'BA');
            INSERT INTO `cidades` VALUES ('3779', '2', 'Pilar', 'AL');
            INSERT INTO `cidades` VALUES ('3780', '15', 'Pilar', 'PB');
            INSERT INTO `cidades` VALUES ('3781', '9', 'Pilar de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('3782', '25', 'Pilar do Sul', 'SP');
            INSERT INTO `cidades` VALUES ('3783', '15', 'Pilões', 'PB');
            INSERT INTO `cidades` VALUES ('3784', '20', 'Pilões', 'RN');
            INSERT INTO `cidades` VALUES ('3785', '15', 'Pilõezinhos', 'PB');
            INSERT INTO `cidades` VALUES ('3786', '13', 'Pimenta', 'MG');
            INSERT INTO `cidades` VALUES ('3787', '22', 'Pimenta Bueno', 'RO');
            INSERT INTO `cidades` VALUES ('3788', '18', 'Pimenteiras', 'PI');
            INSERT INTO `cidades` VALUES ('3789', '22', 'Pimenteiras do Oeste', 'RO');
            INSERT INTO `cidades` VALUES ('3790', '5', 'Pindaí', 'BA');
            INSERT INTO `cidades` VALUES ('3791', '25', 'Pindamonhangaba', 'SP');
            INSERT INTO `cidades` VALUES ('3792', '10', 'Pindaré-Mirim', 'MA');
            INSERT INTO `cidades` VALUES ('3793', '2', 'Pindoba', 'AL');
            INSERT INTO `cidades` VALUES ('3794', '5', 'Pindobaçu', 'BA');
            INSERT INTO `cidades` VALUES ('3795', '25', 'Pindorama', 'SP');
            INSERT INTO `cidades` VALUES ('3796', '27', 'Pindorama do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('3797', '6', 'Pindoretama', 'CE');
            INSERT INTO `cidades` VALUES ('3798', '13', 'Pingo-d\'Água', 'MG');
            INSERT INTO `cidades` VALUES ('3799', '16', 'Pinhais', 'PR');
            INSERT INTO `cidades` VALUES ('3800', '21', 'Pinhal', 'RS');
            INSERT INTO `cidades` VALUES ('3801', '21', 'Pinhal da Serra', 'RS');
            INSERT INTO `cidades` VALUES ('3802', '16', 'Pinhal de São Bento', 'PR');
            INSERT INTO `cidades` VALUES ('3803', '21', 'Pinhal Grande', 'RS');
            INSERT INTO `cidades` VALUES ('3804', '16', 'Pinhalão', 'PR');
            INSERT INTO `cidades` VALUES ('3805', '24', 'Pinhalzinho', 'SC');
            INSERT INTO `cidades` VALUES ('3806', '25', 'Pinhalzinho', 'SP');
            INSERT INTO `cidades` VALUES ('3807', '16', 'Pinhão', 'PR');
            INSERT INTO `cidades` VALUES ('3808', '26', 'Pinhão', 'SE');
            INSERT INTO `cidades` VALUES ('3809', '19', 'Pinheiral', 'RJ');
            INSERT INTO `cidades` VALUES ('3810', '21', 'Pinheirinho do Vale', 'RS');
            INSERT INTO `cidades` VALUES ('3811', '10', 'Pinheiro', 'MA');
            INSERT INTO `cidades` VALUES ('3812', '21', 'Pinheiro Machado', 'RS');
            INSERT INTO `cidades` VALUES ('3813', '24', 'Pinheiro Preto', 'SC');
            INSERT INTO `cidades` VALUES ('3814', '8', 'Pinheiros', 'ES');
            INSERT INTO `cidades` VALUES ('3815', '5', 'Pintadas', 'BA');
            INSERT INTO `cidades` VALUES ('3816', '13', 'Pintópolis', 'MG');
            INSERT INTO `cidades` VALUES ('3817', '18', 'Pio IX', 'PI');
            INSERT INTO `cidades` VALUES ('3818', '10', 'Pio XII', 'MA');
            INSERT INTO `cidades` VALUES ('3819', '25', 'Piquerobi', 'SP');
            INSERT INTO `cidades` VALUES ('3820', '6', 'Piquet Carneiro', 'CE');
            INSERT INTO `cidades` VALUES ('3821', '25', 'Piquete', 'SP');
            INSERT INTO `cidades` VALUES ('3822', '25', 'Piracaia', 'SP');
            INSERT INTO `cidades` VALUES ('3823', '9', 'Piracanjuba', 'GO');
            INSERT INTO `cidades` VALUES ('3824', '13', 'Piracema', 'MG');
            INSERT INTO `cidades` VALUES ('3825', '25', 'Piracicaba', 'SP');
            INSERT INTO `cidades` VALUES ('3826', '18', 'Piracuruca', 'PI');
            INSERT INTO `cidades` VALUES ('3827', '19', 'Piraí', 'RJ');
            INSERT INTO `cidades` VALUES ('3828', '5', 'Piraí do Norte', 'BA');
            INSERT INTO `cidades` VALUES ('3829', '16', 'Piraí do Sul', 'PR');
            INSERT INTO `cidades` VALUES ('3830', '25', 'Piraju', 'SP');
            INSERT INTO `cidades` VALUES ('3831', '13', 'Pirajuba', 'MG');
            INSERT INTO `cidades` VALUES ('3832', '25', 'Pirajuí', 'SP');
            INSERT INTO `cidades` VALUES ('3833', '26', 'Pirambu', 'SE');
            INSERT INTO `cidades` VALUES ('3834', '13', 'Piranga', 'MG');
            INSERT INTO `cidades` VALUES ('3835', '25', 'Pirangi', 'SP');
            INSERT INTO `cidades` VALUES ('3836', '13', 'Piranguçu', 'MG');
            INSERT INTO `cidades` VALUES ('3837', '13', 'Piranguinho', 'MG');
            INSERT INTO `cidades` VALUES ('3838', '2', 'Piranhas', 'AL');
            INSERT INTO `cidades` VALUES ('3839', '9', 'Piranhas', 'GO');
            INSERT INTO `cidades` VALUES ('3840', '10', 'Pirapemas', 'MA');
            INSERT INTO `cidades` VALUES ('3841', '13', 'Pirapetinga', 'MG');
            INSERT INTO `cidades` VALUES ('3842', '21', 'Pirapó', 'RS');
            INSERT INTO `cidades` VALUES ('3843', '13', 'Pirapora', 'MG');
            INSERT INTO `cidades` VALUES ('3844', '25', 'Pirapora do Bom Jesus', 'SP');
            INSERT INTO `cidades` VALUES ('3845', '25', 'Pirapozinho', 'SP');
            INSERT INTO `cidades` VALUES ('3846', '16', 'Piraquara', 'PR');
            INSERT INTO `cidades` VALUES ('3847', '27', 'Piraquê', 'TO');
            INSERT INTO `cidades` VALUES ('3848', '25', 'Pirassununga', 'SP');
            INSERT INTO `cidades` VALUES ('3849', '21', 'Piratini', 'RS');
            INSERT INTO `cidades` VALUES ('3850', '25', 'Piratininga', 'SP');
            INSERT INTO `cidades` VALUES ('3851', '24', 'Piratuba', 'SC');
            INSERT INTO `cidades` VALUES ('3852', '13', 'Piraúba', 'MG');
            INSERT INTO `cidades` VALUES ('3853', '9', 'Pirenópolis', 'GO');
            INSERT INTO `cidades` VALUES ('3854', '9', 'Pires do Rio', 'GO');
            INSERT INTO `cidades` VALUES ('3855', '6', 'Pires Ferreira', 'CE');
            INSERT INTO `cidades` VALUES ('3856', '5', 'Piripá', 'BA');
            INSERT INTO `cidades` VALUES ('3857', '18', 'Piripiri', 'PI');
            INSERT INTO `cidades` VALUES ('3858', '5', 'Piritiba', 'BA');
            INSERT INTO `cidades` VALUES ('3859', '15', 'Pirpirituba', 'PB');
            INSERT INTO `cidades` VALUES ('3860', '16', 'Pitanga', 'PR');
            INSERT INTO `cidades` VALUES ('3861', '16', 'Pitangueiras', 'PR');
            INSERT INTO `cidades` VALUES ('3862', '25', 'Pitangueiras', 'SP');
            INSERT INTO `cidades` VALUES ('3863', '13', 'Pitangui', 'MG');
            INSERT INTO `cidades` VALUES ('3864', '15', 'Pitimbu', 'PB');
            INSERT INTO `cidades` VALUES ('3865', '27', 'Pium', 'TO');
            INSERT INTO `cidades` VALUES ('3866', '8', 'Piúma', 'ES');
            INSERT INTO `cidades` VALUES ('3867', '13', 'Piumhi', 'MG');
            INSERT INTO `cidades` VALUES ('3868', '14', 'Placas', 'PA');
            INSERT INTO `cidades` VALUES ('3869', '1', 'Plácido de Castro', 'AC');
            INSERT INTO `cidades` VALUES ('3870', '9', 'Planaltina', 'GO');
            INSERT INTO `cidades` VALUES ('3871', '16', 'Planaltina do Paraná', 'PR');
            INSERT INTO `cidades` VALUES ('3872', '5', 'Planaltino', 'BA');
            INSERT INTO `cidades` VALUES ('3873', '5', 'Planalto', 'BA');
            INSERT INTO `cidades` VALUES ('3874', '16', 'Planalto', 'PR');
            INSERT INTO `cidades` VALUES ('3875', '21', 'Planalto', 'RS');
            INSERT INTO `cidades` VALUES ('3876', '25', 'Planalto', 'SP');
            INSERT INTO `cidades` VALUES ('3877', '24', 'Planalto Alegre', 'SC');
            INSERT INTO `cidades` VALUES ('3878', '11', 'Planalto da Serra', 'MT');
            INSERT INTO `cidades` VALUES ('3879', '13', 'Planura', 'MG');
            INSERT INTO `cidades` VALUES ('3880', '25', 'Platina', 'SP');
            INSERT INTO `cidades` VALUES ('3881', '25', 'Poá', 'SP');
            INSERT INTO `cidades` VALUES ('3882', '17', 'Poção', 'PE');
            INSERT INTO `cidades` VALUES ('3883', '10', 'Poção de Pedras', 'MA');
            INSERT INTO `cidades` VALUES ('3884', '15', 'Pocinhos', 'PB');
            INSERT INTO `cidades` VALUES ('3885', '20', 'Poço Branco', 'RN');
            INSERT INTO `cidades` VALUES ('3886', '15', 'Poço Dantas', 'PB');
            INSERT INTO `cidades` VALUES ('3887', '21', 'Poço das Antas', 'RS');
            INSERT INTO `cidades` VALUES ('3888', '2', 'Poço das Trincheiras', 'AL');
            INSERT INTO `cidades` VALUES ('3889', '15', 'Poço de José de Moura', 'PB');
            INSERT INTO `cidades` VALUES ('3890', '13', 'Poço Fundo', 'MG');
            INSERT INTO `cidades` VALUES ('3891', '26', 'Poço Redondo', 'SE');
            INSERT INTO `cidades` VALUES ('3892', '26', 'Poço Verde', 'SE');
            INSERT INTO `cidades` VALUES ('3893', '5', 'Poções', 'BA');
            INSERT INTO `cidades` VALUES ('3894', '11', 'Poconé', 'MT');
            INSERT INTO `cidades` VALUES ('3895', '13', 'Poços de Caldas', 'MG');
            INSERT INTO `cidades` VALUES ('3896', '13', 'Pocrane', 'MG');
            INSERT INTO `cidades` VALUES ('3897', '5', 'Pojuca', 'BA');
            INSERT INTO `cidades` VALUES ('3898', '25', 'Poloni', 'SP');
            INSERT INTO `cidades` VALUES ('3899', '15', 'Pombal', 'PB');
            INSERT INTO `cidades` VALUES ('3900', '17', 'Pombos', 'PE');
            INSERT INTO `cidades` VALUES ('3901', '24', 'Pomerode', 'SC');
            INSERT INTO `cidades` VALUES ('3902', '25', 'Pompéia', 'SP');
            INSERT INTO `cidades` VALUES ('3903', '13', 'Pompéu', 'MG');
            INSERT INTO `cidades` VALUES ('3904', '25', 'Pongaí', 'SP');
            INSERT INTO `cidades` VALUES ('3905', '14', 'Ponta de Pedras', 'PA');
            INSERT INTO `cidades` VALUES ('3906', '16', 'Ponta Grossa', 'PR');
            INSERT INTO `cidades` VALUES ('3907', '12', 'Ponta Porã', 'MS');
            INSERT INTO `cidades` VALUES ('3908', '25', 'Pontal', 'SP');
            INSERT INTO `cidades` VALUES ('3909', '11', 'Pontal do Araguaia', 'MT');
            INSERT INTO `cidades` VALUES ('3910', '16', 'Pontal do Paraná', 'PR');
            INSERT INTO `cidades` VALUES ('3911', '9', 'Pontalina', 'GO');
            INSERT INTO `cidades` VALUES ('3912', '25', 'Pontalinda', 'SP');
            INSERT INTO `cidades` VALUES ('3913', '21', 'Pontão', 'RS');
            INSERT INTO `cidades` VALUES ('3914', '24', 'Ponte Alta', 'SC');
            INSERT INTO `cidades` VALUES ('3915', '27', 'Ponte Alta do Bom Jesus', 'TO');
            INSERT INTO `cidades` VALUES ('3916', '24', 'Ponte Alta do Norte', 'SC');
            INSERT INTO `cidades` VALUES ('3917', '27', 'Ponte Alta do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('3918', '11', 'Ponte Branca', 'MT');
            INSERT INTO `cidades` VALUES ('3919', '13', 'Ponte Nova', 'MG');
            INSERT INTO `cidades` VALUES ('3920', '21', 'Ponte Preta', 'RS');
            INSERT INTO `cidades` VALUES ('3921', '24', 'Ponte Serrada', 'SC');
            INSERT INTO `cidades` VALUES ('3922', '11', 'Pontes e Lacerda', 'MT');
            INSERT INTO `cidades` VALUES ('3923', '25', 'Pontes Gestal', 'SP');
            INSERT INTO `cidades` VALUES ('3924', '8', 'Ponto Belo', 'ES');
            INSERT INTO `cidades` VALUES ('3925', '13', 'Ponto Chique', 'MG');
            INSERT INTO `cidades` VALUES ('3926', '13', 'Ponto dos Volantes', 'MG');
            INSERT INTO `cidades` VALUES ('3927', '5', 'Ponto Novo', 'BA');
            INSERT INTO `cidades` VALUES ('3928', '25', 'Populina', 'SP');
            INSERT INTO `cidades` VALUES ('3929', '6', 'Poranga', 'CE');
            INSERT INTO `cidades` VALUES ('3930', '25', 'Porangaba', 'SP');
            INSERT INTO `cidades` VALUES ('3931', '9', 'Porangatu', 'GO');
            INSERT INTO `cidades` VALUES ('3932', '19', 'Porciúncula', 'RJ');
            INSERT INTO `cidades` VALUES ('3933', '16', 'Porecatu', 'PR');
            INSERT INTO `cidades` VALUES ('3934', '20', 'Portalegre', 'RN');
            INSERT INTO `cidades` VALUES ('3935', '21', 'Portão', 'RS');
            INSERT INTO `cidades` VALUES ('3936', '9', 'Porteirão', 'GO');
            INSERT INTO `cidades` VALUES ('3937', '6', 'Porteiras', 'CE');
            INSERT INTO `cidades` VALUES ('3938', '13', 'Porteirinha', 'MG');
            INSERT INTO `cidades` VALUES ('3939', '14', 'Portel', 'PA');
            INSERT INTO `cidades` VALUES ('3940', '9', 'Portelândia', 'GO');
            INSERT INTO `cidades` VALUES ('3941', '18', 'Porto', 'PI');
            INSERT INTO `cidades` VALUES ('3942', '1', 'Porto Acre', 'AC');
            INSERT INTO `cidades` VALUES ('3943', '21', 'Porto Alegre', 'RS');
            INSERT INTO `cidades` VALUES ('3944', '11', 'Porto Alegre do Norte', 'MT');
            INSERT INTO `cidades` VALUES ('3945', '18', 'Porto Alegre do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('3946', '27', 'Porto Alegre do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('3947', '16', 'Porto Amazonas', 'PR');
            INSERT INTO `cidades` VALUES ('3948', '16', 'Porto Barreiro', 'PR');
            INSERT INTO `cidades` VALUES ('3949', '24', 'Porto Belo', 'SC');
            INSERT INTO `cidades` VALUES ('3950', '2', 'Porto Calvo', 'AL');
            INSERT INTO `cidades` VALUES ('3951', '26', 'Porto da Folha', 'SE');
            INSERT INTO `cidades` VALUES ('3952', '14', 'Porto de Moz', 'PA');
            INSERT INTO `cidades` VALUES ('3953', '2', 'Porto de Pedras', 'AL');
            INSERT INTO `cidades` VALUES ('3954', '20', 'Porto do Mangue', 'RN');
            INSERT INTO `cidades` VALUES ('3955', '11', 'Porto dos Gaúchos', 'MT');
            INSERT INTO `cidades` VALUES ('3956', '11', 'Porto Esperidião', 'MT');
            INSERT INTO `cidades` VALUES ('3957', '11', 'Porto Estrela', 'MT');
            INSERT INTO `cidades` VALUES ('3958', '25', 'Porto Feliz', 'SP');
            INSERT INTO `cidades` VALUES ('3959', '25', 'Porto Ferreira', 'SP');
            INSERT INTO `cidades` VALUES ('3960', '13', 'Porto Firme', 'MG');
            INSERT INTO `cidades` VALUES ('3961', '10', 'Porto Franco', 'MA');
            INSERT INTO `cidades` VALUES ('3962', '3', 'Porto Grande', 'AP');
            INSERT INTO `cidades` VALUES ('3963', '21', 'Porto Lucena', 'RS');
            INSERT INTO `cidades` VALUES ('3964', '21', 'Porto Mauá', 'RS');
            INSERT INTO `cidades` VALUES ('3965', '12', 'Porto Murtinho', 'MS');
            INSERT INTO `cidades` VALUES ('3966', '27', 'Porto Nacional', 'TO');
            INSERT INTO `cidades` VALUES ('3967', '19', 'Porto Real', 'RJ');
            INSERT INTO `cidades` VALUES ('3968', '2', 'Porto Real do Colégio', 'AL');
            INSERT INTO `cidades` VALUES ('3969', '16', 'Porto Rico', 'PR');
            INSERT INTO `cidades` VALUES ('3970', '10', 'Porto Rico do Maranhão', 'MA');
            INSERT INTO `cidades` VALUES ('3971', '5', 'Porto Seguro', 'BA');
            INSERT INTO `cidades` VALUES ('3972', '24', 'Porto União', 'SC');
            INSERT INTO `cidades` VALUES ('3973', '22', 'Porto Velho', 'RO');
            INSERT INTO `cidades` VALUES ('3974', '21', 'Porto Vera Cruz', 'RS');
            INSERT INTO `cidades` VALUES ('3975', '16', 'Porto Vitória', 'PR');
            INSERT INTO `cidades` VALUES ('3976', '1', 'Porto Walter', 'AC');
            INSERT INTO `cidades` VALUES ('3977', '21', 'Porto Xavier', 'RS');
            INSERT INTO `cidades` VALUES ('3978', '9', 'Posse', 'GO');
            INSERT INTO `cidades` VALUES ('3979', '13', 'Poté', 'MG');
            INSERT INTO `cidades` VALUES ('3980', '6', 'Potengi', 'CE');
            INSERT INTO `cidades` VALUES ('3981', '25', 'Potim', 'SP');
            INSERT INTO `cidades` VALUES ('3982', '5', 'Potiraguá', 'BA');
            INSERT INTO `cidades` VALUES ('3983', '25', 'Potirendaba', 'SP');
            INSERT INTO `cidades` VALUES ('3984', '6', 'Potiretama', 'CE');
            INSERT INTO `cidades` VALUES ('3985', '13', 'Pouso Alegre', 'MG');
            INSERT INTO `cidades` VALUES ('3986', '13', 'Pouso Alto', 'MG');
            INSERT INTO `cidades` VALUES ('3987', '21', 'Pouso Novo', 'RS');
            INSERT INTO `cidades` VALUES ('3988', '24', 'Pouso Redondo', 'SC');
            INSERT INTO `cidades` VALUES ('3989', '11', 'Poxoréo', 'MT');
            INSERT INTO `cidades` VALUES ('3990', '25', 'Pracinha', 'SP');
            INSERT INTO `cidades` VALUES ('3991', '3', 'Pracuúba', 'AP');
            INSERT INTO `cidades` VALUES ('3992', '5', 'Prado', 'BA');
            INSERT INTO `cidades` VALUES ('3993', '16', 'Prado Ferreira', 'PR');
            INSERT INTO `cidades` VALUES ('3994', '25', 'Pradópolis', 'SP');
            INSERT INTO `cidades` VALUES ('3995', '13', 'Prados', 'MG');
            INSERT INTO `cidades` VALUES ('3996', '24', 'Praia Grande', 'SC');
            INSERT INTO `cidades` VALUES ('3997', '25', 'Praia Grande', 'SP');
            INSERT INTO `cidades` VALUES ('3998', '27', 'Praia Norte', 'TO');
            INSERT INTO `cidades` VALUES ('3999', '14', 'Prainha', 'PA');
            INSERT INTO `cidades` VALUES ('4000', '16', 'Pranchita', 'PR');
            INSERT INTO `cidades` VALUES ('4001', '13', 'Prata', 'MG');
            INSERT INTO `cidades` VALUES ('4002', '15', 'Prata', 'PB');
            INSERT INTO `cidades` VALUES ('4003', '18', 'Prata do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4004', '25', 'Pratânia', 'SP');
            INSERT INTO `cidades` VALUES ('4005', '13', 'Pratápolis', 'MG');
            INSERT INTO `cidades` VALUES ('4006', '13', 'Pratinha', 'MG');
            INSERT INTO `cidades` VALUES ('4007', '25', 'Presidente Alves', 'SP');
            INSERT INTO `cidades` VALUES ('4008', '13', 'Presidente Bernardes', 'MG');
            INSERT INTO `cidades` VALUES ('4009', '25', 'Presidente Bernardes', 'SP');
            INSERT INTO `cidades` VALUES ('4010', '24', 'Presidente Castello Branco', 'SC');
            INSERT INTO `cidades` VALUES ('4011', '16', 'Presidente Castelo Branco', 'PR');
            INSERT INTO `cidades` VALUES ('4012', '5', 'Presidente Dutra', 'BA');
            INSERT INTO `cidades` VALUES ('4013', '10', 'Presidente Dutra', 'MA');
            INSERT INTO `cidades` VALUES ('4014', '25', 'Presidente Epitácio', 'SP');
            INSERT INTO `cidades` VALUES ('4015', '4', 'Presidente Figueiredo', 'AM');
            INSERT INTO `cidades` VALUES ('4016', '24', 'Presidente Getúlio', 'SC');
            INSERT INTO `cidades` VALUES ('4017', '5', 'Presidente Jânio Quadros', 'BA');
            INSERT INTO `cidades` VALUES ('4018', '10', 'Presidente Juscelino', 'MA');
            INSERT INTO `cidades` VALUES ('4019', '13', 'Presidente Juscelino', 'MG');
            INSERT INTO `cidades` VALUES ('4020', '20', 'Presidente Juscelino', 'RN');
            INSERT INTO `cidades` VALUES ('4021', '8', 'Presidente Kennedy', 'ES');
            INSERT INTO `cidades` VALUES ('4022', '27', 'Presidente Kennedy', 'TO');
            INSERT INTO `cidades` VALUES ('4023', '13', 'Presidente Kubitschek', 'MG');
            INSERT INTO `cidades` VALUES ('4024', '21', 'Presidente Lucena', 'RS');
            INSERT INTO `cidades` VALUES ('4025', '10', 'Presidente Médici', 'MA');
            INSERT INTO `cidades` VALUES ('4026', '22', 'Presidente Médici', 'RO');
            INSERT INTO `cidades` VALUES ('4027', '24', 'Presidente Nereu', 'SC');
            INSERT INTO `cidades` VALUES ('4028', '13', 'Presidente Olegário', 'MG');
            INSERT INTO `cidades` VALUES ('4029', '25', 'Presidente Prudente', 'SP');
            INSERT INTO `cidades` VALUES ('4030', '10', 'Presidente Sarney', 'MA');
            INSERT INTO `cidades` VALUES ('4031', '5', 'Presidente Tancredo Neves', 'BA');
            INSERT INTO `cidades` VALUES ('4032', '10', 'Presidente Vargas', 'MA');
            INSERT INTO `cidades` VALUES ('4033', '25', 'Presidente Venceslau', 'SP');
            INSERT INTO `cidades` VALUES ('4034', '14', 'Primavera', 'PA');
            INSERT INTO `cidades` VALUES ('4035', '17', 'Primavera', 'PE');
            INSERT INTO `cidades` VALUES ('4036', '22', 'Primavera de Rondônia', 'RO');
            INSERT INTO `cidades` VALUES ('4037', '11', 'Primavera do Leste', 'MT');
            INSERT INTO `cidades` VALUES ('4038', '10', 'Primeira Cruz', 'MA');
            INSERT INTO `cidades` VALUES ('4039', '16', 'Primeiro de Maio', 'PR');
            INSERT INTO `cidades` VALUES ('4040', '24', 'Princesa', 'SC');
            INSERT INTO `cidades` VALUES ('4041', '15', 'Princesa Isabel', 'PB');
            INSERT INTO `cidades` VALUES ('4042', '9', 'Professor Jamil', 'GO');
            INSERT INTO `cidades` VALUES ('4043', '21', 'Progresso', 'RS');
            INSERT INTO `cidades` VALUES ('4044', '25', 'Promissão', 'SP');
            INSERT INTO `cidades` VALUES ('4045', '26', 'Propriá', 'SE');
            INSERT INTO `cidades` VALUES ('4046', '21', 'Protásio Alves', 'RS');
            INSERT INTO `cidades` VALUES ('4047', '13', 'Prudente de Morais', 'MG');
            INSERT INTO `cidades` VALUES ('4048', '16', 'Prudentópolis', 'PR');
            INSERT INTO `cidades` VALUES ('4049', '27', 'Pugmil', 'TO');
            INSERT INTO `cidades` VALUES ('4050', '20', 'Pureza', 'RN');
            INSERT INTO `cidades` VALUES ('4051', '21', 'Putinga', 'RS');
            INSERT INTO `cidades` VALUES ('4052', '15', 'Puxinanã', 'PB');
            INSERT INTO `cidades` VALUES ('4053', '25', 'Quadra', 'SP');
            INSERT INTO `cidades` VALUES ('4054', '21', 'Quaraí', 'RS');
            INSERT INTO `cidades` VALUES ('4055', '13', 'Quartel Geral', 'MG');
            INSERT INTO `cidades` VALUES ('4056', '16', 'Quarto Centenário', 'PR');
            INSERT INTO `cidades` VALUES ('4057', '25', 'Quatá', 'SP');
            INSERT INTO `cidades` VALUES ('4058', '16', 'Quatiguá', 'PR');
            INSERT INTO `cidades` VALUES ('4059', '14', 'Quatipuru', 'PA');
            INSERT INTO `cidades` VALUES ('4060', '19', 'Quatis', 'RJ');
            INSERT INTO `cidades` VALUES ('4061', '16', 'Quatro Barras', 'PR');
            INSERT INTO `cidades` VALUES ('4062', '21', 'Quatro Irmãos', 'RS');
            INSERT INTO `cidades` VALUES ('4063', '16', 'Quatro Pontes', 'PR');
            INSERT INTO `cidades` VALUES ('4064', '2', 'Quebrangulo', 'AL');
            INSERT INTO `cidades` VALUES ('4065', '16', 'Quedas do Iguaçu', 'PR');
            INSERT INTO `cidades` VALUES ('4066', '18', 'Queimada Nova', 'PI');
            INSERT INTO `cidades` VALUES ('4067', '5', 'Queimadas', 'BA');
            INSERT INTO `cidades` VALUES ('4068', '15', 'Queimadas', 'PB');
            INSERT INTO `cidades` VALUES ('4069', '19', 'Queimados', 'RJ');
            INSERT INTO `cidades` VALUES ('4070', '25', 'Queiroz', 'SP');
            INSERT INTO `cidades` VALUES ('4071', '25', 'Queluz', 'SP');
            INSERT INTO `cidades` VALUES ('4072', '13', 'Queluzito', 'MG');
            INSERT INTO `cidades` VALUES ('4073', '11', 'Querência', 'MT');
            INSERT INTO `cidades` VALUES ('4074', '16', 'Querência do Norte', 'PR');
            INSERT INTO `cidades` VALUES ('4075', '21', 'Quevedos', 'RS');
            INSERT INTO `cidades` VALUES ('4076', '5', 'Quijingue', 'BA');
            INSERT INTO `cidades` VALUES ('4077', '24', 'Quilombo', 'SC');
            INSERT INTO `cidades` VALUES ('4078', '16', 'Quinta do Sol', 'PR');
            INSERT INTO `cidades` VALUES ('4079', '25', 'Quintana', 'SP');
            INSERT INTO `cidades` VALUES ('4080', '21', 'Quinze de Novembro', 'RS');
            INSERT INTO `cidades` VALUES ('4081', '17', 'Quipapá', 'PE');
            INSERT INTO `cidades` VALUES ('4082', '9', 'Quirinópolis', 'GO');
            INSERT INTO `cidades` VALUES ('4083', '19', 'Quissamã', 'RJ');
            INSERT INTO `cidades` VALUES ('4084', '16', 'Quitandinha', 'PR');
            INSERT INTO `cidades` VALUES ('4085', '6', 'Quiterianópolis', 'CE');
            INSERT INTO `cidades` VALUES ('4086', '17', 'Quixaba', 'PE');
            INSERT INTO `cidades` VALUES ('4087', '15', 'Quixabá', 'PB');
            INSERT INTO `cidades` VALUES ('4088', '5', 'Quixabeira', 'BA');
            INSERT INTO `cidades` VALUES ('4089', '6', 'Quixadá', 'CE');
            INSERT INTO `cidades` VALUES ('4090', '6', 'Quixelô', 'CE');
            INSERT INTO `cidades` VALUES ('4091', '6', 'Quixeramobim', 'CE');
            INSERT INTO `cidades` VALUES ('4092', '6', 'Quixeré', 'CE');
            INSERT INTO `cidades` VALUES ('4093', '20', 'Rafael Fernandes', 'RN');
            INSERT INTO `cidades` VALUES ('4094', '20', 'Rafael Godeiro', 'RN');
            INSERT INTO `cidades` VALUES ('4095', '5', 'Rafael Jambeiro', 'BA');
            INSERT INTO `cidades` VALUES ('4096', '25', 'Rafard', 'SP');
            INSERT INTO `cidades` VALUES ('4097', '16', 'Ramilândia', 'PR');
            INSERT INTO `cidades` VALUES ('4098', '25', 'Rancharia', 'SP');
            INSERT INTO `cidades` VALUES ('4099', '16', 'Rancho Alegre', 'PR');
            INSERT INTO `cidades` VALUES ('4100', '16', 'Rancho Alegre D\'Oeste', 'PR');
            INSERT INTO `cidades` VALUES ('4101', '24', 'Rancho Queimado', 'SC');
            INSERT INTO `cidades` VALUES ('4102', '10', 'Raposa', 'MA');
            INSERT INTO `cidades` VALUES ('4103', '13', 'Raposos', 'MG');
            INSERT INTO `cidades` VALUES ('4104', '13', 'Raul Soares', 'MG');
            INSERT INTO `cidades` VALUES ('4105', '16', 'Realeza', 'PR');
            INSERT INTO `cidades` VALUES ('4106', '16', 'Rebouças', 'PR');
            INSERT INTO `cidades` VALUES ('4107', '17', 'Recife', 'PE');
            INSERT INTO `cidades` VALUES ('4108', '13', 'Recreio', 'MG');
            INSERT INTO `cidades` VALUES ('4109', '27', 'Recursolândia', 'TO');
            INSERT INTO `cidades` VALUES ('4110', '6', 'Redenção', 'CE');
            INSERT INTO `cidades` VALUES ('4111', '14', 'Redenção', 'PA');
            INSERT INTO `cidades` VALUES ('4112', '25', 'Redenção da Serra', 'SP');
            INSERT INTO `cidades` VALUES ('4113', '18', 'Redenção do Gurguéia', 'PI');
            INSERT INTO `cidades` VALUES ('4114', '21', 'Redentora', 'RS');
            INSERT INTO `cidades` VALUES ('4115', '13', 'Reduto', 'MG');
            INSERT INTO `cidades` VALUES ('4116', '18', 'Regeneração', 'PI');
            INSERT INTO `cidades` VALUES ('4117', '25', 'Regente Feijó', 'SP');
            INSERT INTO `cidades` VALUES ('4118', '25', 'Reginópolis', 'SP');
            INSERT INTO `cidades` VALUES ('4119', '25', 'Registro', 'SP');
            INSERT INTO `cidades` VALUES ('4120', '21', 'Relvado', 'RS');
            INSERT INTO `cidades` VALUES ('4121', '5', 'Remanso', 'BA');
            INSERT INTO `cidades` VALUES ('4122', '15', 'Remígio', 'PB');
            INSERT INTO `cidades` VALUES ('4123', '16', 'Renascença', 'PR');
            INSERT INTO `cidades` VALUES ('4124', '6', 'Reriutaba', 'CE');
            INSERT INTO `cidades` VALUES ('4125', '19', 'Resende', 'RJ');
            INSERT INTO `cidades` VALUES ('4126', '13', 'Resende Costa', 'MG');
            INSERT INTO `cidades` VALUES ('4127', '16', 'Reserva', 'PR');
            INSERT INTO `cidades` VALUES ('4128', '11', 'Reserva do Cabaçal', 'MT');
            INSERT INTO `cidades` VALUES ('4129', '16', 'Reserva do Iguaçu', 'PR');
            INSERT INTO `cidades` VALUES ('4130', '13', 'Resplendor', 'MG');
            INSERT INTO `cidades` VALUES ('4131', '13', 'Ressaquinha', 'MG');
            INSERT INTO `cidades` VALUES ('4132', '25', 'Restinga', 'SP');
            INSERT INTO `cidades` VALUES ('4133', '21', 'Restinga Seca', 'RS');
            INSERT INTO `cidades` VALUES ('4134', '5', 'Retirolândia', 'BA');
            INSERT INTO `cidades` VALUES ('4135', '10', 'Riachão', 'MA');
            INSERT INTO `cidades` VALUES ('4136', '15', 'Riachão', 'PB');
            INSERT INTO `cidades` VALUES ('4137', '5', 'Riachão das Neves', 'BA');
            INSERT INTO `cidades` VALUES ('4138', '15', 'Riachão do Bacamarte', 'PB');
            INSERT INTO `cidades` VALUES ('4139', '26', 'Riachão do Dantas', 'SE');
            INSERT INTO `cidades` VALUES ('4140', '5', 'Riachão do Jacuípe', 'BA');
            INSERT INTO `cidades` VALUES ('4141', '15', 'Riachão do Poço', 'PB');
            INSERT INTO `cidades` VALUES ('4142', '13', 'Riachinho', 'MG');
            INSERT INTO `cidades` VALUES ('4143', '27', 'Riachinho', 'TO');
            INSERT INTO `cidades` VALUES ('4144', '20', 'Riacho da Cruz', 'RN');
            INSERT INTO `cidades` VALUES ('4145', '17', 'Riacho das Almas', 'PE');
            INSERT INTO `cidades` VALUES ('4146', '5', 'Riacho de Santana', 'BA');
            INSERT INTO `cidades` VALUES ('4147', '20', 'Riacho de Santana', 'RN');
            INSERT INTO `cidades` VALUES ('4148', '15', 'Riacho de Santo Antônio', 'PB');
            INSERT INTO `cidades` VALUES ('4149', '15', 'Riacho dos Cavalos', 'PB');
            INSERT INTO `cidades` VALUES ('4150', '13', 'Riacho dos Machados', 'MG');
            INSERT INTO `cidades` VALUES ('4151', '18', 'Riacho Frio', 'PI');
            INSERT INTO `cidades` VALUES ('4152', '20', 'Riachuelo', 'RN');
            INSERT INTO `cidades` VALUES ('4153', '26', 'Riachuelo', 'SE');
            INSERT INTO `cidades` VALUES ('4154', '9', 'Rialma', 'GO');
            INSERT INTO `cidades` VALUES ('4155', '9', 'Rianápolis', 'GO');
            INSERT INTO `cidades` VALUES ('4156', '10', 'Ribamar Fiquene', 'MA');
            INSERT INTO `cidades` VALUES ('4157', '12', 'Ribas do Rio Pardo', 'MS');
            INSERT INTO `cidades` VALUES ('4158', '25', 'Ribeira', 'SP');
            INSERT INTO `cidades` VALUES ('4159', '5', 'Ribeira do Amparo', 'BA');
            INSERT INTO `cidades` VALUES ('4160', '18', 'Ribeira do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4161', '5', 'Ribeira do Pombal', 'BA');
            INSERT INTO `cidades` VALUES ('4162', '17', 'Ribeirão', 'PE');
            INSERT INTO `cidades` VALUES ('4163', '25', 'Ribeirão Bonito', 'SP');
            INSERT INTO `cidades` VALUES ('4164', '25', 'Ribeirão Branco', 'SP');
            INSERT INTO `cidades` VALUES ('4165', '11', 'Ribeirão Cascalheira', 'MT');
            INSERT INTO `cidades` VALUES ('4166', '16', 'Ribeirão Claro', 'PR');
            INSERT INTO `cidades` VALUES ('4167', '25', 'Ribeirão Corrente', 'SP');
            INSERT INTO `cidades` VALUES ('4168', '13', 'Ribeirão das Neves', 'MG');
            INSERT INTO `cidades` VALUES ('4169', '5', 'Ribeirão do Largo', 'BA');
            INSERT INTO `cidades` VALUES ('4170', '16', 'Ribeirão do Pinhal', 'PR');
            INSERT INTO `cidades` VALUES ('4171', '25', 'Ribeirão do Sul', 'SP');
            INSERT INTO `cidades` VALUES ('4172', '25', 'Ribeirão dos Índios', 'SP');
            INSERT INTO `cidades` VALUES ('4173', '25', 'Ribeirão Grande', 'SP');
            INSERT INTO `cidades` VALUES ('4174', '25', 'Ribeirão Pires', 'SP');
            INSERT INTO `cidades` VALUES ('4175', '25', 'Ribeirão Preto', 'SP');
            INSERT INTO `cidades` VALUES ('4176', '13', 'Ribeirão Vermelho', 'MG');
            INSERT INTO `cidades` VALUES ('4177', '11', 'Ribeirãozinho', 'MT');
            INSERT INTO `cidades` VALUES ('4178', '18', 'Ribeiro Gonçalves', 'PI');
            INSERT INTO `cidades` VALUES ('4179', '26', 'Ribeirópolis', 'SE');
            INSERT INTO `cidades` VALUES ('4180', '25', 'Rifaina', 'SP');
            INSERT INTO `cidades` VALUES ('4181', '25', 'Rincão', 'SP');
            INSERT INTO `cidades` VALUES ('4182', '25', 'Rinópolis', 'SP');
            INSERT INTO `cidades` VALUES ('4183', '13', 'Rio Acima', 'MG');
            INSERT INTO `cidades` VALUES ('4184', '16', 'Rio Azul', 'PR');
            INSERT INTO `cidades` VALUES ('4185', '8', 'Rio Bananal', 'ES');
            INSERT INTO `cidades` VALUES ('4186', '16', 'Rio Bom', 'PR');
            INSERT INTO `cidades` VALUES ('4187', '19', 'Rio Bonito', 'RJ');
            INSERT INTO `cidades` VALUES ('4188', '16', 'Rio Bonito do Iguaçu', 'PR');
            INSERT INTO `cidades` VALUES ('4189', '1', 'Rio Branco', 'AC');
            INSERT INTO `cidades` VALUES ('4190', '11', 'Rio Branco', 'MT');
            INSERT INTO `cidades` VALUES ('4191', '16', 'Rio Branco do Ivaí', 'PR');
            INSERT INTO `cidades` VALUES ('4192', '16', 'Rio Branco do Sul', 'PR');
            INSERT INTO `cidades` VALUES ('4193', '12', 'Rio Brilhante', 'MS');
            INSERT INTO `cidades` VALUES ('4194', '13', 'Rio Casca', 'MG');
            INSERT INTO `cidades` VALUES ('4195', '19', 'Rio Claro', 'RJ');
            INSERT INTO `cidades` VALUES ('4196', '25', 'Rio Claro', 'SP');
            INSERT INTO `cidades` VALUES ('4197', '22', 'Rio Crespo', 'RO');
            INSERT INTO `cidades` VALUES ('4198', '27', 'Rio da Conceição', 'TO');
            INSERT INTO `cidades` VALUES ('4199', '24', 'Rio das Antas', 'SC');
            INSERT INTO `cidades` VALUES ('4200', '19', 'Rio das Flores', 'RJ');
            INSERT INTO `cidades` VALUES ('4201', '19', 'Rio das Ostras', 'RJ');
            INSERT INTO `cidades` VALUES ('4202', '25', 'Rio das Pedras', 'SP');
            INSERT INTO `cidades` VALUES ('4203', '5', 'Rio de Contas', 'BA');
            INSERT INTO `cidades` VALUES ('4204', '19', 'Rio de Janeiro', 'RJ');
            INSERT INTO `cidades` VALUES ('4205', '5', 'Rio do Antônio', 'BA');
            INSERT INTO `cidades` VALUES ('4206', '24', 'Rio do Campo', 'SC');
            INSERT INTO `cidades` VALUES ('4207', '20', 'Rio do Fogo', 'RN');
            INSERT INTO `cidades` VALUES ('4208', '24', 'Rio do Oeste', 'SC');
            INSERT INTO `cidades` VALUES ('4209', '5', 'Rio do Pires', 'BA');
            INSERT INTO `cidades` VALUES ('4210', '13', 'Rio do Prado', 'MG');
            INSERT INTO `cidades` VALUES ('4211', '24', 'Rio do Sul', 'SC');
            INSERT INTO `cidades` VALUES ('4212', '13', 'Rio Doce', 'MG');
            INSERT INTO `cidades` VALUES ('4213', '27', 'Rio dos Bois', 'TO');
            INSERT INTO `cidades` VALUES ('4214', '24', 'Rio dos Cedros', 'SC');
            INSERT INTO `cidades` VALUES ('4215', '21', 'Rio dos Índios', 'RS');
            INSERT INTO `cidades` VALUES ('4216', '13', 'Rio Espera', 'MG');
            INSERT INTO `cidades` VALUES ('4217', '17', 'Rio Formoso', 'PE');
            INSERT INTO `cidades` VALUES ('4218', '24', 'Rio Fortuna', 'SC');
            INSERT INTO `cidades` VALUES ('4219', '21', 'Rio Grande', 'RS');
            INSERT INTO `cidades` VALUES ('4220', '25', 'Rio Grande da Serra', 'SP');
            INSERT INTO `cidades` VALUES ('4221', '18', 'Rio Grande do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4222', '2', 'Rio Largo', 'AL');
            INSERT INTO `cidades` VALUES ('4223', '13', 'Rio Manso', 'MG');
            INSERT INTO `cidades` VALUES ('4224', '14', 'Rio Maria', 'PA');
            INSERT INTO `cidades` VALUES ('4225', '24', 'Rio Negrinho', 'SC');
            INSERT INTO `cidades` VALUES ('4226', '12', 'Rio Negro', 'MS');
            INSERT INTO `cidades` VALUES ('4227', '16', 'Rio Negro', 'PR');
            INSERT INTO `cidades` VALUES ('4228', '13', 'Rio Novo', 'MG');
            INSERT INTO `cidades` VALUES ('4229', '8', 'Rio Novo do Sul', 'ES');
            INSERT INTO `cidades` VALUES ('4230', '13', 'Rio Paranaíba', 'MG');
            INSERT INTO `cidades` VALUES ('4231', '21', 'Rio Pardo', 'RS');
            INSERT INTO `cidades` VALUES ('4232', '13', 'Rio Pardo de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('4233', '13', 'Rio Piracicaba', 'MG');
            INSERT INTO `cidades` VALUES ('4234', '13', 'Rio Pomba', 'MG');
            INSERT INTO `cidades` VALUES ('4235', '13', 'Rio Preto', 'MG');
            INSERT INTO `cidades` VALUES ('4236', '4', 'Rio Preto da Eva', 'AM');
            INSERT INTO `cidades` VALUES ('4237', '9', 'Rio Quente', 'GO');
            INSERT INTO `cidades` VALUES ('4238', '5', 'Rio Real', 'BA');
            INSERT INTO `cidades` VALUES ('4239', '24', 'Rio Rufino', 'SC');
            INSERT INTO `cidades` VALUES ('4240', '27', 'Rio Sono', 'TO');
            INSERT INTO `cidades` VALUES ('4241', '15', 'Rio Tinto', 'PB');
            INSERT INTO `cidades` VALUES ('4242', '9', 'Rio Verde', 'GO');
            INSERT INTO `cidades` VALUES ('4243', '12', 'Rio Verde de Mato Grosso', 'MS');
            INSERT INTO `cidades` VALUES ('4244', '13', 'Rio Vermelho', 'MG');
            INSERT INTO `cidades` VALUES ('4245', '25', 'Riolândia', 'SP');
            INSERT INTO `cidades` VALUES ('4246', '21', 'Riozinho', 'RS');
            INSERT INTO `cidades` VALUES ('4247', '24', 'Riqueza', 'SC');
            INSERT INTO `cidades` VALUES ('4248', '13', 'Ritápolis', 'MG');
            INSERT INTO `cidades` VALUES ('4249', '25', 'Riversul', 'SP');
            INSERT INTO `cidades` VALUES ('4250', '21', 'Roca Sales', 'RS');
            INSERT INTO `cidades` VALUES ('4251', '12', 'Rochedo', 'MS');
            INSERT INTO `cidades` VALUES ('4252', '13', 'Rochedo de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('4253', '24', 'Rodeio', 'SC');
            INSERT INTO `cidades` VALUES ('4254', '21', 'Rodeio Bonito', 'RS');
            INSERT INTO `cidades` VALUES ('4255', '13', 'Rodeiro', 'MG');
            INSERT INTO `cidades` VALUES ('4256', '5', 'Rodelas', 'BA');
            INSERT INTO `cidades` VALUES ('4257', '20', 'Rodolfo Fernandes', 'RN');
            INSERT INTO `cidades` VALUES ('4258', '1', 'Rodrigues Alves', 'AC');
            INSERT INTO `cidades` VALUES ('4259', '21', 'Rolador', 'RS');
            INSERT INTO `cidades` VALUES ('4260', '16', 'Rolândia', 'PR');
            INSERT INTO `cidades` VALUES ('4261', '21', 'Rolante', 'RS');
            INSERT INTO `cidades` VALUES ('4262', '22', 'Rolim de Moura', 'RO');
            INSERT INTO `cidades` VALUES ('4263', '13', 'Romaria', 'MG');
            INSERT INTO `cidades` VALUES ('4264', '24', 'Romelândia', 'SC');
            INSERT INTO `cidades` VALUES ('4265', '16', 'Roncador', 'PR');
            INSERT INTO `cidades` VALUES ('4266', '21', 'Ronda Alta', 'RS');
            INSERT INTO `cidades` VALUES ('4267', '21', 'Rondinha', 'RS');
            INSERT INTO `cidades` VALUES ('4268', '11', 'Rondolândia', 'MT');
            INSERT INTO `cidades` VALUES ('4269', '16', 'Rondon', 'PR');
            INSERT INTO `cidades` VALUES ('4270', '14', 'Rondon do Pará', 'PA');
            INSERT INTO `cidades` VALUES ('4271', '11', 'Rondonópolis', 'MT');
            INSERT INTO `cidades` VALUES ('4272', '21', 'Roque Gonzales', 'RS');
            INSERT INTO `cidades` VALUES ('4273', '23', 'Rorainópolis', 'RR');
            INSERT INTO `cidades` VALUES ('4274', '25', 'Rosana', 'SP');
            INSERT INTO `cidades` VALUES ('4275', '10', 'Rosário', 'MA');
            INSERT INTO `cidades` VALUES ('4276', '13', 'Rosário da Limeira', 'MG');
            INSERT INTO `cidades` VALUES ('4277', '26', 'Rosário do Catete', 'SE');
            INSERT INTO `cidades` VALUES ('4278', '16', 'Rosário do Ivaí', 'PR');
            INSERT INTO `cidades` VALUES ('4279', '21', 'Rosário do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4280', '11', 'Rosário Oeste', 'MT');
            INSERT INTO `cidades` VALUES ('4281', '25', 'Roseira', 'SP');
            INSERT INTO `cidades` VALUES ('4282', '2', 'Roteiro', 'AL');
            INSERT INTO `cidades` VALUES ('4283', '13', 'Rubelita', 'MG');
            INSERT INTO `cidades` VALUES ('4284', '25', 'Rubiácea', 'SP');
            INSERT INTO `cidades` VALUES ('4285', '9', 'Rubiataba', 'GO');
            INSERT INTO `cidades` VALUES ('4286', '13', 'Rubim', 'MG');
            INSERT INTO `cidades` VALUES ('4287', '25', 'Rubinéia', 'SP');
            INSERT INTO `cidades` VALUES ('4288', '14', 'Rurópolis', 'PA');
            INSERT INTO `cidades` VALUES ('4289', '6', 'Russas', 'CE');
            INSERT INTO `cidades` VALUES ('4290', '5', 'Ruy Barbosa', 'BA');
            INSERT INTO `cidades` VALUES ('4291', '20', 'Ruy Barbosa', 'RN');
            INSERT INTO `cidades` VALUES ('4292', '13', 'Sabará', 'MG');
            INSERT INTO `cidades` VALUES ('4293', '16', 'Sabáudia', 'PR');
            INSERT INTO `cidades` VALUES ('4294', '25', 'Sabino', 'SP');
            INSERT INTO `cidades` VALUES ('4295', '13', 'Sabinópolis', 'MG');
            INSERT INTO `cidades` VALUES ('4296', '6', 'Saboeiro', 'CE');
            INSERT INTO `cidades` VALUES ('4297', '13', 'Sacramento', 'MG');
            INSERT INTO `cidades` VALUES ('4298', '21', 'Sagrada Família', 'RS');
            INSERT INTO `cidades` VALUES ('4299', '25', 'Sagres', 'SP');
            INSERT INTO `cidades` VALUES ('4300', '17', 'Sairé', 'PE');
            INSERT INTO `cidades` VALUES ('4301', '21', 'Saldanha Marinho', 'RS');
            INSERT INTO `cidades` VALUES ('4302', '25', 'Sales', 'SP');
            INSERT INTO `cidades` VALUES ('4303', '25', 'Sales Oliveira', 'SP');
            INSERT INTO `cidades` VALUES ('4304', '25', 'Salesópolis', 'SP');
            INSERT INTO `cidades` VALUES ('4305', '24', 'Salete', 'SC');
            INSERT INTO `cidades` VALUES ('4306', '15', 'Salgadinho', 'PB');
            INSERT INTO `cidades` VALUES ('4307', '17', 'Salgadinho', 'PE');
            INSERT INTO `cidades` VALUES ('4308', '26', 'Salgado', 'SE');
            INSERT INTO `cidades` VALUES ('4309', '15', 'Salgado de São Félix', 'PB');
            INSERT INTO `cidades` VALUES ('4310', '16', 'Salgado Filho', 'PR');
            INSERT INTO `cidades` VALUES ('4311', '17', 'Salgueiro', 'PE');
            INSERT INTO `cidades` VALUES ('4312', '13', 'Salinas', 'MG');
            INSERT INTO `cidades` VALUES ('4313', '5', 'Salinas da Margarida', 'BA');
            INSERT INTO `cidades` VALUES ('4314', '14', 'Salinópolis', 'PA');
            INSERT INTO `cidades` VALUES ('4315', '6', 'Salitre', 'CE');
            INSERT INTO `cidades` VALUES ('4316', '25', 'Salmourão', 'SP');
            INSERT INTO `cidades` VALUES ('4317', '17', 'Saloá', 'PE');
            INSERT INTO `cidades` VALUES ('4318', '24', 'Saltinho', 'SC');
            INSERT INTO `cidades` VALUES ('4319', '25', 'Saltinho', 'SP');
            INSERT INTO `cidades` VALUES ('4320', '25', 'Salto', 'SP');
            INSERT INTO `cidades` VALUES ('4321', '13', 'Salto da Divisa', 'MG');
            INSERT INTO `cidades` VALUES ('4322', '25', 'Salto de Pirapora', 'SP');
            INSERT INTO `cidades` VALUES ('4323', '11', 'Salto do Céu', 'MT');
            INSERT INTO `cidades` VALUES ('4324', '16', 'Salto do Itararé', 'PR');
            INSERT INTO `cidades` VALUES ('4325', '21', 'Salto do Jacuí', 'RS');
            INSERT INTO `cidades` VALUES ('4326', '16', 'Salto do Lontra', 'PR');
            INSERT INTO `cidades` VALUES ('4327', '25', 'Salto Grande', 'SP');
            INSERT INTO `cidades` VALUES ('4328', '24', 'Salto Veloso', 'SC');
            INSERT INTO `cidades` VALUES ('4329', '5', 'Salvador', 'BA');
            INSERT INTO `cidades` VALUES ('4330', '21', 'Salvador das Missões', 'RS');
            INSERT INTO `cidades` VALUES ('4331', '21', 'Salvador do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4332', '14', 'Salvaterra', 'PA');
            INSERT INTO `cidades` VALUES ('4333', '10', 'Sambaíba', 'MA');
            INSERT INTO `cidades` VALUES ('4334', '27', 'Sampaio', 'TO');
            INSERT INTO `cidades` VALUES ('4335', '21', 'Sananduva', 'RS');
            INSERT INTO `cidades` VALUES ('4336', '9', 'Sanclerlândia', 'GO');
            INSERT INTO `cidades` VALUES ('4337', '27', 'Sandolândia', 'TO');
            INSERT INTO `cidades` VALUES ('4338', '25', 'Sandovalina', 'SP');
            INSERT INTO `cidades` VALUES ('4339', '24', 'Sangão', 'SC');
            INSERT INTO `cidades` VALUES ('4340', '17', 'Sanharó', 'PE');
            INSERT INTO `cidades` VALUES ('4341', '25', 'Santa Adélia', 'SP');
            INSERT INTO `cidades` VALUES ('4342', '25', 'Santa Albertina', 'SP');
            INSERT INTO `cidades` VALUES ('4343', '16', 'Santa Amélia', 'PR');
            INSERT INTO `cidades` VALUES ('4344', '5', 'Santa Bárbara', 'BA');
            INSERT INTO `cidades` VALUES ('4345', '13', 'Santa Bárbara', 'MG');
            INSERT INTO `cidades` VALUES ('4346', '9', 'Santa Bárbara de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('4347', '13', 'Santa Bárbara do Leste', 'MG');
            INSERT INTO `cidades` VALUES ('4348', '13', 'Santa Bárbara do Monte Verde', 'MG');
            INSERT INTO `cidades` VALUES ('4349', '14', 'Santa Bárbara do Pará', 'PA');
            INSERT INTO `cidades` VALUES ('4350', '21', 'Santa Bárbara do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4351', '13', 'Santa Bárbara do Tugúrio', 'MG');
            INSERT INTO `cidades` VALUES ('4352', '25', 'Santa Bárbara d\'Oeste', 'SP');
            INSERT INTO `cidades` VALUES ('4353', '25', 'Santa Branca', 'SP');
            INSERT INTO `cidades` VALUES ('4354', '5', 'Santa Brígida', 'BA');
            INSERT INTO `cidades` VALUES ('4355', '11', 'Santa Carmem', 'MT');
            INSERT INTO `cidades` VALUES ('4356', '15', 'Santa Cecília', 'PB');
            INSERT INTO `cidades` VALUES ('4357', '24', 'Santa Cecília', 'SC');
            INSERT INTO `cidades` VALUES ('4358', '16', 'Santa Cecília do Pavão', 'PR');
            INSERT INTO `cidades` VALUES ('4359', '21', 'Santa Cecília do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4360', '21', 'Santa Clara do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4361', '25', 'Santa Clara d\'Oeste', 'SP');
            INSERT INTO `cidades` VALUES ('4362', '15', 'Santa Cruz', 'PB');
            INSERT INTO `cidades` VALUES ('4363', '17', 'Santa Cruz', 'PE');
            INSERT INTO `cidades` VALUES ('4364', '20', 'Santa Cruz', 'RN');
            INSERT INTO `cidades` VALUES ('4365', '5', 'Santa Cruz Cabrália', 'BA');
            INSERT INTO `cidades` VALUES ('4366', '17', 'Santa Cruz da Baixa Verde', 'PE');
            INSERT INTO `cidades` VALUES ('4367', '25', 'Santa Cruz da Conceição', 'SP');
            INSERT INTO `cidades` VALUES ('4368', '25', 'Santa Cruz da Esperança', 'SP');
            INSERT INTO `cidades` VALUES ('4369', '5', 'Santa Cruz da Vitória', 'BA');
            INSERT INTO `cidades` VALUES ('4370', '25', 'Santa Cruz das Palmeiras', 'SP');
            INSERT INTO `cidades` VALUES ('4371', '9', 'Santa Cruz de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('4372', '13', 'Santa Cruz de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('4373', '16', 'Santa Cruz de Monte Castelo', 'PR');
            INSERT INTO `cidades` VALUES ('4374', '13', 'Santa Cruz de Salinas', 'MG');
            INSERT INTO `cidades` VALUES ('4375', '14', 'Santa Cruz do Arari', 'PA');
            INSERT INTO `cidades` VALUES ('4376', '17', 'Santa Cruz do Capibaribe', 'PE');
            INSERT INTO `cidades` VALUES ('4377', '13', 'Santa Cruz do Escalvado', 'MG');
            INSERT INTO `cidades` VALUES ('4378', '18', 'Santa Cruz do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4379', '25', 'Santa Cruz do Rio Pardo', 'SP');
            INSERT INTO `cidades` VALUES ('4380', '21', 'Santa Cruz do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4381', '11', 'Santa Cruz do Xingu', 'MT');
            INSERT INTO `cidades` VALUES ('4382', '18', 'Santa Cruz dos Milagres', 'PI');
            INSERT INTO `cidades` VALUES ('4383', '13', 'Santa Efigênia de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('4384', '25', 'Santa Ernestina', 'SP');
            INSERT INTO `cidades` VALUES ('4385', '16', 'Santa Fé', 'PR');
            INSERT INTO `cidades` VALUES ('4386', '9', 'Santa Fé de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('4387', '13', 'Santa Fé de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('4388', '27', 'Santa Fé do Araguaia', 'TO');
            INSERT INTO `cidades` VALUES ('4389', '25', 'Santa Fé do Sul', 'SP');
            INSERT INTO `cidades` VALUES ('4390', '17', 'Santa Filomena', 'PE');
            INSERT INTO `cidades` VALUES ('4391', '18', 'Santa Filomena', 'PI');
            INSERT INTO `cidades` VALUES ('4392', '10', 'Santa Filomena do Maranhão', 'MA');
            INSERT INTO `cidades` VALUES ('4393', '25', 'Santa Gertrudes', 'SP');
            INSERT INTO `cidades` VALUES ('4394', '10', 'Santa Helena', 'MA');
            INSERT INTO `cidades` VALUES ('4395', '15', 'Santa Helena', 'PB');
            INSERT INTO `cidades` VALUES ('4396', '16', 'Santa Helena', 'PR');
            INSERT INTO `cidades` VALUES ('4397', '24', 'Santa Helena', 'SC');
            INSERT INTO `cidades` VALUES ('4398', '9', 'Santa Helena de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('4399', '13', 'Santa Helena de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('4400', '5', 'Santa Inês', 'BA');
            INSERT INTO `cidades` VALUES ('4401', '10', 'Santa Inês', 'MA');
            INSERT INTO `cidades` VALUES ('4402', '15', 'Santa Inês', 'PB');
            INSERT INTO `cidades` VALUES ('4403', '16', 'Santa Inês', 'PR');
            INSERT INTO `cidades` VALUES ('4404', '9', 'Santa Isabel', 'GO');
            INSERT INTO `cidades` VALUES ('4405', '25', 'Santa Isabel', 'SP');
            INSERT INTO `cidades` VALUES ('4406', '16', 'Santa Isabel do Ivaí', 'PR');
            INSERT INTO `cidades` VALUES ('4407', '14', 'Santa Isabel do Pará', 'PA');
            INSERT INTO `cidades` VALUES ('4408', '4', 'Santa Isabel do Rio Negro', 'AM');
            INSERT INTO `cidades` VALUES ('4409', '16', 'Santa Izabel do Oeste', 'PR');
            INSERT INTO `cidades` VALUES ('4410', '13', 'Santa Juliana', 'MG');
            INSERT INTO `cidades` VALUES ('4411', '8', 'Santa Leopoldina', 'ES');
            INSERT INTO `cidades` VALUES ('4412', '16', 'Santa Lúcia', 'PR');
            INSERT INTO `cidades` VALUES ('4413', '25', 'Santa Lúcia', 'SP');
            INSERT INTO `cidades` VALUES ('4414', '18', 'Santa Luz', 'PI');
            INSERT INTO `cidades` VALUES ('4415', '5', 'Santa Luzia', 'BA');
            INSERT INTO `cidades` VALUES ('4416', '10', 'Santa Luzia', 'MA');
            INSERT INTO `cidades` VALUES ('4417', '13', 'Santa Luzia', 'MG');
            INSERT INTO `cidades` VALUES ('4418', '15', 'Santa Luzia', 'PB');
            INSERT INTO `cidades` VALUES ('4419', '26', 'Santa Luzia do Itanhy', 'SE');
            INSERT INTO `cidades` VALUES ('4420', '2', 'Santa Luzia do Norte', 'AL');
            INSERT INTO `cidades` VALUES ('4421', '14', 'Santa Luzia do Pará', 'PA');
            INSERT INTO `cidades` VALUES ('4422', '10', 'Santa Luzia do Paruá', 'MA');
            INSERT INTO `cidades` VALUES ('4423', '22', 'Santa Luzia D\'Oeste', 'RO');
            INSERT INTO `cidades` VALUES ('4424', '13', 'Santa Margarida', 'MG');
            INSERT INTO `cidades` VALUES ('4425', '21', 'Santa Margarida do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4426', '20', 'Santa Maria', 'RN');
            INSERT INTO `cidades` VALUES ('4427', '21', 'Santa Maria', 'RS');
            INSERT INTO `cidades` VALUES ('4428', '17', 'Santa Maria da Boa Vista', 'PE');
            INSERT INTO `cidades` VALUES ('4429', '25', 'Santa Maria da Serra', 'SP');
            INSERT INTO `cidades` VALUES ('4430', '5', 'Santa Maria da Vitória', 'BA');
            INSERT INTO `cidades` VALUES ('4431', '14', 'Santa Maria das Barreiras', 'PA');
            INSERT INTO `cidades` VALUES ('4432', '13', 'Santa Maria de Itabira', 'MG');
            INSERT INTO `cidades` VALUES ('4433', '8', 'Santa Maria de Jetibá', 'ES');
            INSERT INTO `cidades` VALUES ('4434', '17', 'Santa Maria do Cambucá', 'PE');
            INSERT INTO `cidades` VALUES ('4435', '21', 'Santa Maria do Herval', 'RS');
            INSERT INTO `cidades` VALUES ('4436', '16', 'Santa Maria do Oeste', 'PR');
            INSERT INTO `cidades` VALUES ('4437', '14', 'Santa Maria do Pará', 'PA');
            INSERT INTO `cidades` VALUES ('4438', '13', 'Santa Maria do Salto', 'MG');
            INSERT INTO `cidades` VALUES ('4439', '13', 'Santa Maria do Suaçuí', 'MG');
            INSERT INTO `cidades` VALUES ('4440', '27', 'Santa Maria do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('4441', '19', 'Santa Maria Madalena', 'RJ');
            INSERT INTO `cidades` VALUES ('4442', '16', 'Santa Mariana', 'PR');
            INSERT INTO `cidades` VALUES ('4443', '25', 'Santa Mercedes', 'SP');
            INSERT INTO `cidades` VALUES ('4444', '16', 'Santa Mônica', 'PR');
            INSERT INTO `cidades` VALUES ('4445', '6', 'Santa Quitéria', 'CE');
            INSERT INTO `cidades` VALUES ('4446', '10', 'Santa Quitéria do Maranhão', 'MA');
            INSERT INTO `cidades` VALUES ('4447', '10', 'Santa Rita', 'MA');
            INSERT INTO `cidades` VALUES ('4448', '15', 'Santa Rita', 'PB');
            INSERT INTO `cidades` VALUES ('4449', '13', 'Santa Rita de Caldas', 'MG');
            INSERT INTO `cidades` VALUES ('4450', '5', 'Santa Rita de Cássia', 'BA');
            INSERT INTO `cidades` VALUES ('4451', '13', 'Santa Rita de Ibitipoca', 'MG');
            INSERT INTO `cidades` VALUES ('4452', '13', 'Santa Rita de Jacutinga', 'MG');
            INSERT INTO `cidades` VALUES ('4453', '13', 'Santa Rita de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('4454', '9', 'Santa Rita do Araguaia', 'GO');
            INSERT INTO `cidades` VALUES ('4455', '13', 'Santa Rita do Itueto', 'MG');
            INSERT INTO `cidades` VALUES ('4456', '9', 'Santa Rita do Novo Destino', 'GO');
            INSERT INTO `cidades` VALUES ('4457', '12', 'Santa Rita do Pardo', 'MS');
            INSERT INTO `cidades` VALUES ('4458', '25', 'Santa Rita do Passa Quatro', 'SP');
            INSERT INTO `cidades` VALUES ('4459', '13', 'Santa Rita do Sapucaí', 'MG');
            INSERT INTO `cidades` VALUES ('4460', '27', 'Santa Rita do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('4461', '11', 'Santa Rita do Trivelato', 'MT');
            INSERT INTO `cidades` VALUES ('4462', '25', 'Santa Rita d\'Oeste', 'SP');
            INSERT INTO `cidades` VALUES ('4463', '21', 'Santa Rosa', 'RS');
            INSERT INTO `cidades` VALUES ('4464', '13', 'Santa Rosa da Serra', 'MG');
            INSERT INTO `cidades` VALUES ('4465', '9', 'Santa Rosa de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('4466', '24', 'Santa Rosa de Lima', 'SC');
            INSERT INTO `cidades` VALUES ('4467', '26', 'Santa Rosa de Lima', 'SE');
            INSERT INTO `cidades` VALUES ('4468', '25', 'Santa Rosa de Viterbo', 'SP');
            INSERT INTO `cidades` VALUES ('4469', '18', 'Santa Rosa do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4470', '1', 'Santa Rosa do Purus', 'AC');
            INSERT INTO `cidades` VALUES ('4471', '24', 'Santa Rosa do Sul', 'SC');
            INSERT INTO `cidades` VALUES ('4472', '27', 'Santa Rosa do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('4473', '25', 'Santa Salete', 'SP');
            INSERT INTO `cidades` VALUES ('4474', '8', 'Santa Teresa', 'ES');
            INSERT INTO `cidades` VALUES ('4475', '5', 'Santa Teresinha', 'BA');
            INSERT INTO `cidades` VALUES ('4476', '15', 'Santa Teresinha', 'PB');
            INSERT INTO `cidades` VALUES ('4477', '21', 'Santa Tereza', 'RS');
            INSERT INTO `cidades` VALUES ('4478', '9', 'Santa Tereza de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('4479', '16', 'Santa Tereza do Oeste', 'PR');
            INSERT INTO `cidades` VALUES ('4480', '27', 'Santa Tereza do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('4481', '11', 'Santa Terezinha', 'MT');
            INSERT INTO `cidades` VALUES ('4482', '17', 'Santa Terezinha', 'PE');
            INSERT INTO `cidades` VALUES ('4483', '24', 'Santa Terezinha', 'SC');
            INSERT INTO `cidades` VALUES ('4484', '9', 'Santa Terezinha de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('4485', '16', 'Santa Terezinha de Itaipu', 'PR');
            INSERT INTO `cidades` VALUES ('4486', '24', 'Santa Terezinha do Progresso', 'SC');
            INSERT INTO `cidades` VALUES ('4487', '27', 'Santa Terezinha do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('4488', '13', 'Santa Vitória', 'MG');
            INSERT INTO `cidades` VALUES ('4489', '21', 'Santa Vitória do Palmar', 'RS');
            INSERT INTO `cidades` VALUES ('4490', '5', 'Santaluz', 'BA');
            INSERT INTO `cidades` VALUES ('4491', '3', 'Santana', 'AP');
            INSERT INTO `cidades` VALUES ('4492', '5', 'Santana', 'BA');
            INSERT INTO `cidades` VALUES ('4493', '21', 'Santana da Boa Vista', 'RS');
            INSERT INTO `cidades` VALUES ('4494', '25', 'Santana da Ponte Pensa', 'SP');
            INSERT INTO `cidades` VALUES ('4495', '13', 'Santana da Vargem', 'MG');
            INSERT INTO `cidades` VALUES ('4496', '13', 'Santana de Cataguases', 'MG');
            INSERT INTO `cidades` VALUES ('4497', '15', 'Santana de Mangueira', 'PB');
            INSERT INTO `cidades` VALUES ('4498', '25', 'Santana de Parnaíba', 'SP');
            INSERT INTO `cidades` VALUES ('4499', '13', 'Santana de Pirapama', 'MG');
            INSERT INTO `cidades` VALUES ('4500', '6', 'Santana do Acaraú', 'CE');
            INSERT INTO `cidades` VALUES ('4501', '14', 'Santana do Araguaia', 'PA');
            INSERT INTO `cidades` VALUES ('4502', '6', 'Santana do Cariri', 'CE');
            INSERT INTO `cidades` VALUES ('4503', '13', 'Santana do Deserto', 'MG');
            INSERT INTO `cidades` VALUES ('4504', '13', 'Santana do Garambéu', 'MG');
            INSERT INTO `cidades` VALUES ('4505', '2', 'Santana do Ipanema', 'AL');
            INSERT INTO `cidades` VALUES ('4506', '16', 'Santana do Itararé', 'PR');
            INSERT INTO `cidades` VALUES ('4507', '13', 'Santana do Jacaré', 'MG');
            INSERT INTO `cidades` VALUES ('4508', '21', 'Sant\'Ana do Livramento', 'RS');
            INSERT INTO `cidades` VALUES ('4509', '13', 'Santana do Manhuaçu', 'MG');
            INSERT INTO `cidades` VALUES ('4510', '10', 'Santana do Maranhão', 'MA');
            INSERT INTO `cidades` VALUES ('4511', '20', 'Santana do Matos', 'RN');
            INSERT INTO `cidades` VALUES ('4512', '2', 'Santana do Mundaú', 'AL');
            INSERT INTO `cidades` VALUES ('4513', '13', 'Santana do Paraíso', 'MG');
            INSERT INTO `cidades` VALUES ('4514', '18', 'Santana do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4515', '13', 'Santana do Riacho', 'MG');
            INSERT INTO `cidades` VALUES ('4516', '26', 'Santana do São Francisco', 'SE');
            INSERT INTO `cidades` VALUES ('4517', '20', 'Santana do Seridó', 'RN');
            INSERT INTO `cidades` VALUES ('4518', '15', 'Santana dos Garrotes', 'PB');
            INSERT INTO `cidades` VALUES ('4519', '13', 'Santana dos Montes', 'MG');
            INSERT INTO `cidades` VALUES ('4520', '5', 'Santanópolis', 'BA');
            INSERT INTO `cidades` VALUES ('4521', '14', 'Santarém', 'PA');
            INSERT INTO `cidades` VALUES ('4522', '14', 'Santarém Novo', 'PA');
            INSERT INTO `cidades` VALUES ('4523', '21', 'Santiago', 'RS');
            INSERT INTO `cidades` VALUES ('4524', '24', 'Santiago do Sul', 'SC');
            INSERT INTO `cidades` VALUES ('4525', '11', 'Santo Afonso', 'MT');
            INSERT INTO `cidades` VALUES ('4526', '5', 'Santo Amaro', 'BA');
            INSERT INTO `cidades` VALUES ('4527', '24', 'Santo Amaro da Imperatriz', 'SC');
            INSERT INTO `cidades` VALUES ('4528', '26', 'Santo Amaro das Brotas', 'SE');
            INSERT INTO `cidades` VALUES ('4529', '10', 'Santo Amaro do Maranhão', 'MA');
            INSERT INTO `cidades` VALUES ('4530', '25', 'Santo Anastácio', 'SP');
            INSERT INTO `cidades` VALUES ('4531', '15', 'Santo André', 'PB');
            INSERT INTO `cidades` VALUES ('4532', '25', 'Santo André', 'SP');
            INSERT INTO `cidades` VALUES ('4533', '21', 'Santo Ângelo', 'RS');
            INSERT INTO `cidades` VALUES ('4534', '20', 'Santo Antônio', 'RN');
            INSERT INTO `cidades` VALUES ('4535', '25', 'Santo Antônio da Alegria', 'SP');
            INSERT INTO `cidades` VALUES ('4536', '9', 'Santo Antônio da Barra', 'GO');
            INSERT INTO `cidades` VALUES ('4537', '21', 'Santo Antônio da Patrulha', 'RS');
            INSERT INTO `cidades` VALUES ('4538', '16', 'Santo Antônio da Platina', 'PR');
            INSERT INTO `cidades` VALUES ('4539', '21', 'Santo Antônio das Missões', 'RS');
            INSERT INTO `cidades` VALUES ('4540', '9', 'Santo Antônio de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('4541', '5', 'Santo Antônio de Jesus', 'BA');
            INSERT INTO `cidades` VALUES ('4542', '18', 'Santo Antônio de Lisboa', 'PI');
            INSERT INTO `cidades` VALUES ('4543', '19', 'Santo Antônio de Pádua', 'RJ');
            INSERT INTO `cidades` VALUES ('4544', '25', 'Santo Antônio de Posse', 'SP');
            INSERT INTO `cidades` VALUES ('4545', '13', 'Santo Antônio do Amparo', 'MG');
            INSERT INTO `cidades` VALUES ('4546', '25', 'Santo Antônio do Aracanguá', 'SP');
            INSERT INTO `cidades` VALUES ('4547', '13', 'Santo Antônio do Aventureiro', 'MG');
            INSERT INTO `cidades` VALUES ('4548', '16', 'Santo Antônio do Caiuá', 'PR');
            INSERT INTO `cidades` VALUES ('4549', '9', 'Santo Antônio do Descoberto', 'GO');
            INSERT INTO `cidades` VALUES ('4550', '13', 'Santo Antônio do Grama', 'MG');
            INSERT INTO `cidades` VALUES ('4551', '4', 'Santo Antônio do Içá', 'AM');
            INSERT INTO `cidades` VALUES ('4552', '13', 'Santo Antônio do Itambé', 'MG');
            INSERT INTO `cidades` VALUES ('4553', '13', 'Santo Antônio do Jacinto', 'MG');
            INSERT INTO `cidades` VALUES ('4554', '25', 'Santo Antônio do Jardim', 'SP');
            INSERT INTO `cidades` VALUES ('4555', '11', 'Santo Antônio do Leste', 'MT');
            INSERT INTO `cidades` VALUES ('4556', '11', 'Santo Antônio do Leverger', 'MT');
            INSERT INTO `cidades` VALUES ('4557', '13', 'Santo Antônio do Monte', 'MG');
            INSERT INTO `cidades` VALUES ('4558', '21', 'Santo Antônio do Palma', 'RS');
            INSERT INTO `cidades` VALUES ('4559', '16', 'Santo Antônio do Paraíso', 'PR');
            INSERT INTO `cidades` VALUES ('4560', '25', 'Santo Antônio do Pinhal', 'SP');
            INSERT INTO `cidades` VALUES ('4561', '21', 'Santo Antônio do Planalto', 'RS');
            INSERT INTO `cidades` VALUES ('4562', '13', 'Santo Antônio do Retiro', 'MG');
            INSERT INTO `cidades` VALUES ('4563', '13', 'Santo Antônio do Rio Abaixo', 'MG');
            INSERT INTO `cidades` VALUES ('4564', '16', 'Santo Antônio do Sudoeste', 'PR');
            INSERT INTO `cidades` VALUES ('4565', '14', 'Santo Antônio do Tauá', 'PA');
            INSERT INTO `cidades` VALUES ('4566', '10', 'Santo Antônio dos Lopes', 'MA');
            INSERT INTO `cidades` VALUES ('4567', '18', 'Santo Antônio dos Milagres', 'PI');
            INSERT INTO `cidades` VALUES ('4568', '21', 'Santo Augusto', 'RS');
            INSERT INTO `cidades` VALUES ('4569', '21', 'Santo Cristo', 'RS');
            INSERT INTO `cidades` VALUES ('4570', '5', 'Santo Estêvão', 'BA');
            INSERT INTO `cidades` VALUES ('4571', '25', 'Santo Expedito', 'SP');
            INSERT INTO `cidades` VALUES ('4572', '21', 'Santo Expedito do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4573', '13', 'Santo Hipólito', 'MG');
            INSERT INTO `cidades` VALUES ('4574', '16', 'Santo Inácio', 'PR');
            INSERT INTO `cidades` VALUES ('4575', '18', 'Santo Inácio do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4576', '25', 'Santópolis do Aguapeí', 'SP');
            INSERT INTO `cidades` VALUES ('4577', '25', 'Santos', 'SP');
            INSERT INTO `cidades` VALUES ('4578', '13', 'Santos Dumont', 'MG');
            INSERT INTO `cidades` VALUES ('4579', '6', 'São Benedito', 'CE');
            INSERT INTO `cidades` VALUES ('4580', '10', 'São Benedito do Rio Preto', 'MA');
            INSERT INTO `cidades` VALUES ('4581', '17', 'São Benedito do Sul', 'PE');
            INSERT INTO `cidades` VALUES ('4582', '15', 'São Bentinho', 'PB');
            INSERT INTO `cidades` VALUES ('4583', '10', 'São Bento', 'MA');
            INSERT INTO `cidades` VALUES ('4584', '15', 'São Bento', 'PB');
            INSERT INTO `cidades` VALUES ('4585', '13', 'São Bento Abade', 'MG');
            INSERT INTO `cidades` VALUES ('4586', '20', 'São Bento do Norte', 'RN');
            INSERT INTO `cidades` VALUES ('4587', '25', 'São Bento do Sapucaí', 'SP');
            INSERT INTO `cidades` VALUES ('4588', '24', 'São Bento do Sul', 'SC');
            INSERT INTO `cidades` VALUES ('4589', '27', 'São Bento do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('4590', '20', 'São Bento do Trairí', 'RN');
            INSERT INTO `cidades` VALUES ('4591', '17', 'São Bento do Una', 'PE');
            INSERT INTO `cidades` VALUES ('4592', '24', 'São Bernardino', 'SC');
            INSERT INTO `cidades` VALUES ('4593', '10', 'São Bernardo', 'MA');
            INSERT INTO `cidades` VALUES ('4594', '25', 'São Bernardo do Campo', 'SP');
            INSERT INTO `cidades` VALUES ('4595', '24', 'São Bonifácio', 'SC');
            INSERT INTO `cidades` VALUES ('4596', '21', 'São Borja', 'RS');
            INSERT INTO `cidades` VALUES ('4597', '2', 'São Brás', 'AL');
            INSERT INTO `cidades` VALUES ('4598', '13', 'São Brás do Suaçuí', 'MG');
            INSERT INTO `cidades` VALUES ('4599', '18', 'São Braz do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4600', '14', 'São Caetano de Odivelas', 'PA');
            INSERT INTO `cidades` VALUES ('4601', '25', 'São Caetano do Sul', 'SP');
            INSERT INTO `cidades` VALUES ('4602', '17', 'São Caitano', 'PE');
            INSERT INTO `cidades` VALUES ('4603', '24', 'São Carlos', 'SC');
            INSERT INTO `cidades` VALUES ('4604', '25', 'São Carlos', 'SP');
            INSERT INTO `cidades` VALUES ('4605', '16', 'São Carlos do Ivaí', 'PR');
            INSERT INTO `cidades` VALUES ('4606', '26', 'São Cristóvão', 'SE');
            INSERT INTO `cidades` VALUES ('4607', '24', 'São Cristovão do Sul', 'SC');
            INSERT INTO `cidades` VALUES ('4608', '5', 'São Desidério', 'BA');
            INSERT INTO `cidades` VALUES ('4609', '5', 'São Domingos', 'BA');
            INSERT INTO `cidades` VALUES ('4610', '9', 'São Domingos', 'GO');
            INSERT INTO `cidades` VALUES ('4611', '15', 'São Domingos', 'PB');
            INSERT INTO `cidades` VALUES ('4612', '24', 'São Domingos', 'SC');
            INSERT INTO `cidades` VALUES ('4613', '26', 'São Domingos', 'SE');
            INSERT INTO `cidades` VALUES ('4614', '13', 'São Domingos das Dores', 'MG');
            INSERT INTO `cidades` VALUES ('4615', '14', 'São Domingos do Araguaia', 'PA');
            INSERT INTO `cidades` VALUES ('4616', '10', 'São Domingos do Azeitão', 'MA');
            INSERT INTO `cidades` VALUES ('4617', '14', 'São Domingos do Capim', 'PA');
            INSERT INTO `cidades` VALUES ('4618', '15', 'São Domingos do Cariri', 'PB');
            INSERT INTO `cidades` VALUES ('4619', '10', 'São Domingos do Maranhão', 'MA');
            INSERT INTO `cidades` VALUES ('4620', '8', 'São Domingos do Norte', 'ES');
            INSERT INTO `cidades` VALUES ('4621', '13', 'São Domingos do Prata', 'MG');
            INSERT INTO `cidades` VALUES ('4622', '21', 'São Domingos do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4623', '5', 'São Felipe', 'BA');
            INSERT INTO `cidades` VALUES ('4624', '22', 'São Felipe D\'Oeste', 'RO');
            INSERT INTO `cidades` VALUES ('4625', '5', 'São Félix', 'BA');
            INSERT INTO `cidades` VALUES ('4626', '10', 'São Félix de Balsas', 'MA');
            INSERT INTO `cidades` VALUES ('4627', '13', 'São Félix de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('4628', '11', 'São Félix do Araguaia', 'MT');
            INSERT INTO `cidades` VALUES ('4629', '5', 'São Félix do Coribe', 'BA');
            INSERT INTO `cidades` VALUES ('4630', '18', 'São Félix do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4631', '27', 'São Félix do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('4632', '14', 'São Félix do Xingu', 'PA');
            INSERT INTO `cidades` VALUES ('4633', '20', 'São Fernando', 'RN');
            INSERT INTO `cidades` VALUES ('4634', '19', 'São Fidélis', 'RJ');
            INSERT INTO `cidades` VALUES ('4635', '13', 'São Francisco', 'MG');
            INSERT INTO `cidades` VALUES ('4636', '15', 'São Francisco', 'PB');
            INSERT INTO `cidades` VALUES ('4637', '26', 'São Francisco', 'SE');
            INSERT INTO `cidades` VALUES ('4638', '25', 'São Francisco', 'SP');
            INSERT INTO `cidades` VALUES ('4639', '21', 'São Francisco de Assis', 'RS');
            INSERT INTO `cidades` VALUES ('4640', '18', 'São Francisco de Assis do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4641', '9', 'São Francisco de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('4642', '19', 'São Francisco de Itabapoana', 'RJ');
            INSERT INTO `cidades` VALUES ('4643', '13', 'São Francisco de Paula', 'MG');
            INSERT INTO `cidades` VALUES ('4644', '21', 'São Francisco de Paula', 'RS');
            INSERT INTO `cidades` VALUES ('4645', '13', 'São Francisco de Sales', 'MG');
            INSERT INTO `cidades` VALUES ('4646', '10', 'São Francisco do Brejão', 'MA');
            INSERT INTO `cidades` VALUES ('4647', '5', 'São Francisco do Conde', 'BA');
            INSERT INTO `cidades` VALUES ('4648', '13', 'São Francisco do Glória', 'MG');
            INSERT INTO `cidades` VALUES ('4649', '22', 'São Francisco do Guaporé', 'RO');
            INSERT INTO `cidades` VALUES ('4650', '10', 'São Francisco do Maranhão', 'MA');
            INSERT INTO `cidades` VALUES ('4651', '20', 'São Francisco do Oeste', 'RN');
            INSERT INTO `cidades` VALUES ('4652', '14', 'São Francisco do Pará', 'PA');
            INSERT INTO `cidades` VALUES ('4653', '18', 'São Francisco do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4654', '24', 'São Francisco do Sul', 'SC');
            INSERT INTO `cidades` VALUES ('4655', '5', 'São Gabriel', 'BA');
            INSERT INTO `cidades` VALUES ('4656', '21', 'São Gabriel', 'RS');
            INSERT INTO `cidades` VALUES ('4657', '4', 'São Gabriel da Cachoeira', 'AM');
            INSERT INTO `cidades` VALUES ('4658', '8', 'São Gabriel da Palha', 'ES');
            INSERT INTO `cidades` VALUES ('4659', '12', 'São Gabriel do Oeste', 'MS');
            INSERT INTO `cidades` VALUES ('4660', '13', 'São Geraldo', 'MG');
            INSERT INTO `cidades` VALUES ('4661', '13', 'São Geraldo da Piedade', 'MG');
            INSERT INTO `cidades` VALUES ('4662', '14', 'São Geraldo do Araguaia', 'PA');
            INSERT INTO `cidades` VALUES ('4663', '13', 'São Geraldo do Baixio', 'MG');
            INSERT INTO `cidades` VALUES ('4664', '19', 'São Gonçalo', 'RJ');
            INSERT INTO `cidades` VALUES ('4665', '13', 'São Gonçalo do Abaeté', 'MG');
            INSERT INTO `cidades` VALUES ('4666', '6', 'São Gonçalo do Amarante', 'CE');
            INSERT INTO `cidades` VALUES ('4667', '20', 'São Gonçalo do Amarante', 'RN');
            INSERT INTO `cidades` VALUES ('4668', '18', 'São Gonçalo do Gurguéia', 'PI');
            INSERT INTO `cidades` VALUES ('4669', '13', 'São Gonçalo do Pará', 'MG');
            INSERT INTO `cidades` VALUES ('4670', '18', 'São Gonçalo do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4671', '13', 'São Gonçalo do Rio Abaixo', 'MG');
            INSERT INTO `cidades` VALUES ('4672', '13', 'São Gonçalo do Rio Preto', 'MG');
            INSERT INTO `cidades` VALUES ('4673', '13', 'São Gonçalo do Sapucaí', 'MG');
            INSERT INTO `cidades` VALUES ('4674', '5', 'São Gonçalo dos Campos', 'BA');
            INSERT INTO `cidades` VALUES ('4675', '13', 'São Gotardo', 'MG');
            INSERT INTO `cidades` VALUES ('4676', '21', 'São Jerônimo', 'RS');
            INSERT INTO `cidades` VALUES ('4677', '16', 'São Jerônimo da Serra', 'PR');
            INSERT INTO `cidades` VALUES ('4678', '17', 'São João', 'PE');
            INSERT INTO `cidades` VALUES ('4679', '16', 'São João', 'PR');
            INSERT INTO `cidades` VALUES ('4680', '10', 'São João Batista', 'MA');
            INSERT INTO `cidades` VALUES ('4681', '24', 'São João Batista', 'SC');
            INSERT INTO `cidades` VALUES ('4682', '13', 'São João Batista do Glória', 'MG');
            INSERT INTO `cidades` VALUES ('4683', '23', 'São João da Baliza', 'RR');
            INSERT INTO `cidades` VALUES ('4684', '19', 'São João da Barra', 'RJ');
            INSERT INTO `cidades` VALUES ('4685', '25', 'São João da Boa Vista', 'SP');
            INSERT INTO `cidades` VALUES ('4686', '18', 'São João da Canabrava', 'PI');
            INSERT INTO `cidades` VALUES ('4687', '18', 'São João da Fronteira', 'PI');
            INSERT INTO `cidades` VALUES ('4688', '13', 'São João da Lagoa', 'MG');
            INSERT INTO `cidades` VALUES ('4689', '13', 'São João da Mata', 'MG');
            INSERT INTO `cidades` VALUES ('4690', '9', 'São João da Paraúna', 'GO');
            INSERT INTO `cidades` VALUES ('4691', '14', 'São João da Ponta', 'PA');
            INSERT INTO `cidades` VALUES ('4692', '13', 'São João da Ponte', 'MG');
            INSERT INTO `cidades` VALUES ('4693', '18', 'São João da Serra', 'PI');
            INSERT INTO `cidades` VALUES ('4694', '21', 'São João da Urtiga', 'RS');
            INSERT INTO `cidades` VALUES ('4695', '18', 'São João da Varjota', 'PI');
            INSERT INTO `cidades` VALUES ('4696', '9', 'São João d\'Aliança', 'GO');
            INSERT INTO `cidades` VALUES ('4697', '25', 'São João das Duas Pontes', 'SP');
            INSERT INTO `cidades` VALUES ('4698', '13', 'São João das Missões', 'MG');
            INSERT INTO `cidades` VALUES ('4699', '25', 'São João de Iracema', 'SP');
            INSERT INTO `cidades` VALUES ('4700', '19', 'São João de Meriti', 'RJ');
            INSERT INTO `cidades` VALUES ('4701', '14', 'São João de Pirabas', 'PA');
            INSERT INTO `cidades` VALUES ('4702', '13', 'São João del Rei', 'MG');
            INSERT INTO `cidades` VALUES ('4703', '14', 'São João do Araguaia', 'PA');
            INSERT INTO `cidades` VALUES ('4704', '18', 'São João do Arraial', 'PI');
            INSERT INTO `cidades` VALUES ('4705', '16', 'São João do Caiuá', 'PR');
            INSERT INTO `cidades` VALUES ('4706', '15', 'São João do Cariri', 'PB');
            INSERT INTO `cidades` VALUES ('4707', '10', 'São João do Carú', 'MA');
            INSERT INTO `cidades` VALUES ('4708', '24', 'São João do Itaperiú', 'SC');
            INSERT INTO `cidades` VALUES ('4709', '16', 'São João do Ivaí', 'PR');
            INSERT INTO `cidades` VALUES ('4710', '6', 'São João do Jaguaribe', 'CE');
            INSERT INTO `cidades` VALUES ('4711', '13', 'São João do Manhuaçu', 'MG');
            INSERT INTO `cidades` VALUES ('4712', '13', 'São João do Manteninha', 'MG');
            INSERT INTO `cidades` VALUES ('4713', '24', 'São João do Oeste', 'SC');
            INSERT INTO `cidades` VALUES ('4714', '13', 'São João do Oriente', 'MG');
            INSERT INTO `cidades` VALUES ('4715', '13', 'São João do Pacuí', 'MG');
            INSERT INTO `cidades` VALUES ('4716', '10', 'São João do Paraíso', 'MA');
            INSERT INTO `cidades` VALUES ('4717', '13', 'São João do Paraíso', 'MG');
            INSERT INTO `cidades` VALUES ('4718', '25', 'São João do Pau d\'Alho', 'SP');
            INSERT INTO `cidades` VALUES ('4719', '18', 'São João do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4720', '21', 'São João do Polêsine', 'RS');
            INSERT INTO `cidades` VALUES ('4721', '15', 'São João do Rio do Peixe', 'PB');
            INSERT INTO `cidades` VALUES ('4722', '20', 'São João do Sabugi', 'RN');
            INSERT INTO `cidades` VALUES ('4723', '10', 'São João do Soter', 'MA');
            INSERT INTO `cidades` VALUES ('4724', '24', 'São João do Sul', 'SC');
            INSERT INTO `cidades` VALUES ('4725', '15', 'São João do Tigre', 'PB');
            INSERT INTO `cidades` VALUES ('4726', '16', 'São João do Triunfo', 'PR');
            INSERT INTO `cidades` VALUES ('4727', '10', 'São João dos Patos', 'MA');
            INSERT INTO `cidades` VALUES ('4728', '13', 'São João Evangelista', 'MG');
            INSERT INTO `cidades` VALUES ('4729', '13', 'São João Nepomuceno', 'MG');
            INSERT INTO `cidades` VALUES ('4730', '24', 'São Joaquim', 'SC');
            INSERT INTO `cidades` VALUES ('4731', '25', 'São Joaquim da Barra', 'SP');
            INSERT INTO `cidades` VALUES ('4732', '13', 'São Joaquim de Bicas', 'MG');
            INSERT INTO `cidades` VALUES ('4733', '17', 'São Joaquim do Monte', 'PE');
            INSERT INTO `cidades` VALUES ('4734', '21', 'São Jorge', 'RS');
            INSERT INTO `cidades` VALUES ('4735', '16', 'São Jorge do Ivaí', 'PR');
            INSERT INTO `cidades` VALUES ('4736', '16', 'São Jorge do Patrocínio', 'PR');
            INSERT INTO `cidades` VALUES ('4737', '16', 'São Jorge d\'Oeste', 'PR');
            INSERT INTO `cidades` VALUES ('4738', '24', 'São José', 'SC');
            INSERT INTO `cidades` VALUES ('4739', '13', 'São José da Barra', 'MG');
            INSERT INTO `cidades` VALUES ('4740', '25', 'São José da Bela Vista', 'SP');
            INSERT INTO `cidades` VALUES ('4741', '16', 'São José da Boa Vista', 'PR');
            INSERT INTO `cidades` VALUES ('4742', '17', 'São José da Coroa Grande', 'PE');
            INSERT INTO `cidades` VALUES ('4743', '15', 'São José da Lagoa Tapada', 'PB');
            INSERT INTO `cidades` VALUES ('4744', '2', 'São José da Laje', 'AL');
            INSERT INTO `cidades` VALUES ('4745', '13', 'São José da Lapa', 'MG');
            INSERT INTO `cidades` VALUES ('4746', '13', 'São José da Safira', 'MG');
            INSERT INTO `cidades` VALUES ('4747', '2', 'São José da Tapera', 'AL');
            INSERT INTO `cidades` VALUES ('4748', '13', 'São José da Varginha', 'MG');
            INSERT INTO `cidades` VALUES ('4749', '5', 'São José da Vitória', 'BA');
            INSERT INTO `cidades` VALUES ('4750', '21', 'São José das Missões', 'RS');
            INSERT INTO `cidades` VALUES ('4751', '16', 'São José das Palmeiras', 'PR');
            INSERT INTO `cidades` VALUES ('4752', '15', 'São José de Caiana', 'PB');
            INSERT INTO `cidades` VALUES ('4753', '15', 'São José de Espinharas', 'PB');
            INSERT INTO `cidades` VALUES ('4754', '20', 'São José de Mipibu', 'RN');
            INSERT INTO `cidades` VALUES ('4755', '15', 'São José de Piranhas', 'PB');
            INSERT INTO `cidades` VALUES ('4756', '15', 'São José de Princesa', 'PB');
            INSERT INTO `cidades` VALUES ('4757', '10', 'São José de Ribamar', 'MA');
            INSERT INTO `cidades` VALUES ('4758', '19', 'São José de Ubá', 'RJ');
            INSERT INTO `cidades` VALUES ('4759', '13', 'São José do Alegre', 'MG');
            INSERT INTO `cidades` VALUES ('4760', '25', 'São José do Barreiro', 'SP');
            INSERT INTO `cidades` VALUES ('4761', '17', 'São José do Belmonte', 'PE');
            INSERT INTO `cidades` VALUES ('4762', '15', 'São José do Bonfim', 'PB');
            INSERT INTO `cidades` VALUES ('4763', '15', 'São José do Brejo do Cruz', 'PB');
            INSERT INTO `cidades` VALUES ('4764', '8', 'São José do Calçado', 'ES');
            INSERT INTO `cidades` VALUES ('4765', '20', 'São José do Campestre', 'RN');
            INSERT INTO `cidades` VALUES ('4766', '24', 'São José do Cedro', 'SC');
            INSERT INTO `cidades` VALUES ('4767', '24', 'São José do Cerrito', 'SC');
            INSERT INTO `cidades` VALUES ('4768', '13', 'São José do Divino', 'MG');
            INSERT INTO `cidades` VALUES ('4769', '18', 'São José do Divino', 'PI');
            INSERT INTO `cidades` VALUES ('4770', '17', 'São José do Egito', 'PE');
            INSERT INTO `cidades` VALUES ('4771', '13', 'São José do Goiabal', 'MG');
            INSERT INTO `cidades` VALUES ('4772', '21', 'São José do Herval', 'RS');
            INSERT INTO `cidades` VALUES ('4773', '21', 'São José do Hortêncio', 'RS');
            INSERT INTO `cidades` VALUES ('4774', '21', 'São José do Inhacorá', 'RS');
            INSERT INTO `cidades` VALUES ('4775', '5', 'São José do Jacuípe', 'BA');
            INSERT INTO `cidades` VALUES ('4776', '13', 'São José do Jacuri', 'MG');
            INSERT INTO `cidades` VALUES ('4777', '13', 'São José do Mantimento', 'MG');
            INSERT INTO `cidades` VALUES ('4778', '21', 'São José do Norte', 'RS');
            INSERT INTO `cidades` VALUES ('4779', '21', 'São José do Ouro', 'RS');
            INSERT INTO `cidades` VALUES ('4780', '18', 'São José do Peixe', 'PI');
            INSERT INTO `cidades` VALUES ('4781', '18', 'São José do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4782', '11', 'São José do Povo', 'MT');
            INSERT INTO `cidades` VALUES ('4783', '11', 'São José do Rio Claro', 'MT');
            INSERT INTO `cidades` VALUES ('4784', '25', 'São José do Rio Pardo', 'SP');
            INSERT INTO `cidades` VALUES ('4785', '25', 'São José do Rio Preto', 'SP');
            INSERT INTO `cidades` VALUES ('4786', '15', 'São José do Sabugi', 'PB');
            INSERT INTO `cidades` VALUES ('4787', '20', 'São José do Seridó', 'RN');
            INSERT INTO `cidades` VALUES ('4788', '21', 'São José do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4789', '19', 'São José do Vale do Rio Preto', 'RJ');
            INSERT INTO `cidades` VALUES ('4790', '11', 'São José do Xingu', 'MT');
            INSERT INTO `cidades` VALUES ('4791', '21', 'São José dos Ausentes', 'RS');
            INSERT INTO `cidades` VALUES ('4792', '10', 'São José dos Basílios', 'MA');
            INSERT INTO `cidades` VALUES ('4793', '25', 'São José dos Campos', 'SP');
            INSERT INTO `cidades` VALUES ('4794', '15', 'São José dos Cordeiros', 'PB');
            INSERT INTO `cidades` VALUES ('4795', '16', 'São José dos Pinhais', 'PR');
            INSERT INTO `cidades` VALUES ('4796', '11', 'São José dos Quatro Marcos', 'MT');
            INSERT INTO `cidades` VALUES ('4797', '15', 'São José dos Ramos', 'PB');
            INSERT INTO `cidades` VALUES ('4798', '18', 'São Julião', 'PI');
            INSERT INTO `cidades` VALUES ('4799', '21', 'São Leopoldo', 'RS');
            INSERT INTO `cidades` VALUES ('4800', '13', 'São Lourenço', 'MG');
            INSERT INTO `cidades` VALUES ('4801', '17', 'São Lourenço da Mata', 'PE');
            INSERT INTO `cidades` VALUES ('4802', '25', 'São Lourenço da Serra', 'SP');
            INSERT INTO `cidades` VALUES ('4803', '24', 'São Lourenço do Oeste', 'SC');
            INSERT INTO `cidades` VALUES ('4804', '18', 'São Lourenço do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4805', '21', 'São Lourenço do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4806', '24', 'São Ludgero', 'SC');
            INSERT INTO `cidades` VALUES ('4807', '10', 'São Luís', 'MA');
            INSERT INTO `cidades` VALUES ('4808', '9', 'São Luís de Montes Belos', 'GO');
            INSERT INTO `cidades` VALUES ('4809', '6', 'São Luís do Curu', 'CE');
            INSERT INTO `cidades` VALUES ('4810', '25', 'São Luís do Paraitinga', 'SP');
            INSERT INTO `cidades` VALUES ('4811', '18', 'São Luis do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4812', '2', 'São Luís do Quitunde', 'AL');
            INSERT INTO `cidades` VALUES ('4813', '10', 'São Luís Gonzaga do Maranhão', 'MA');
            INSERT INTO `cidades` VALUES ('4814', '23', 'São Luiz', 'RR');
            INSERT INTO `cidades` VALUES ('4815', '9', 'São Luíz do Norte', 'GO');
            INSERT INTO `cidades` VALUES ('4816', '21', 'São Luiz Gonzaga', 'RS');
            INSERT INTO `cidades` VALUES ('4817', '15', 'São Mamede', 'PB');
            INSERT INTO `cidades` VALUES ('4818', '16', 'São Manoel do Paraná', 'PR');
            INSERT INTO `cidades` VALUES ('4819', '25', 'São Manuel', 'SP');
            INSERT INTO `cidades` VALUES ('4820', '21', 'São Marcos', 'RS');
            INSERT INTO `cidades` VALUES ('4821', '21', 'São Martinho', 'RS');
            INSERT INTO `cidades` VALUES ('4822', '24', 'São Martinho', 'SC');
            INSERT INTO `cidades` VALUES ('4823', '21', 'São Martinho da Serra', 'RS');
            INSERT INTO `cidades` VALUES ('4824', '8', 'São Mateus', 'ES');
            INSERT INTO `cidades` VALUES ('4825', '10', 'São Mateus do Maranhão', 'MA');
            INSERT INTO `cidades` VALUES ('4826', '16', 'São Mateus do Sul', 'PR');
            INSERT INTO `cidades` VALUES ('4827', '20', 'São Miguel', 'RN');
            INSERT INTO `cidades` VALUES ('4828', '25', 'São Miguel Arcanjo', 'SP');
            INSERT INTO `cidades` VALUES ('4829', '18', 'São Miguel da Baixa Grande', 'PI');
            INSERT INTO `cidades` VALUES ('4830', '24', 'São Miguel da Boa Vista', 'SC');
            INSERT INTO `cidades` VALUES ('4831', '5', 'São Miguel das Matas', 'BA');
            INSERT INTO `cidades` VALUES ('4832', '21', 'São Miguel das Missões', 'RS');
            INSERT INTO `cidades` VALUES ('4833', '15', 'São Miguel de Taipu', 'PB');
            INSERT INTO `cidades` VALUES ('4834', '26', 'São Miguel do Aleixo', 'SE');
            INSERT INTO `cidades` VALUES ('4835', '13', 'São Miguel do Anta', 'MG');
            INSERT INTO `cidades` VALUES ('4836', '9', 'São Miguel do Araguaia', 'GO');
            INSERT INTO `cidades` VALUES ('4837', '18', 'São Miguel do Fidalgo', 'PI');
            INSERT INTO `cidades` VALUES ('4838', '20', 'São Miguel do Gostoso', 'RN');
            INSERT INTO `cidades` VALUES ('4839', '14', 'São Miguel do Guamá', 'PA');
            INSERT INTO `cidades` VALUES ('4840', '22', 'São Miguel do Guaporé', 'RO');
            INSERT INTO `cidades` VALUES ('4841', '16', 'São Miguel do Iguaçu', 'PR');
            INSERT INTO `cidades` VALUES ('4842', '24', 'São Miguel do Oeste', 'SC');
            INSERT INTO `cidades` VALUES ('4843', '9', 'São Miguel do Passa Quatro', 'GO');
            INSERT INTO `cidades` VALUES ('4844', '18', 'São Miguel do Tapuio', 'PI');
            INSERT INTO `cidades` VALUES ('4845', '27', 'São Miguel do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('4846', '2', 'São Miguel dos Campos', 'AL');
            INSERT INTO `cidades` VALUES ('4847', '2', 'São Miguel dos Milagres', 'AL');
            INSERT INTO `cidades` VALUES ('4848', '21', 'São Nicolau', 'RS');
            INSERT INTO `cidades` VALUES ('4849', '9', 'São Patrício', 'GO');
            INSERT INTO `cidades` VALUES ('4850', '25', 'São Paulo', 'SP');
            INSERT INTO `cidades` VALUES ('4851', '21', 'São Paulo das Missões', 'RS');
            INSERT INTO `cidades` VALUES ('4852', '4', 'São Paulo de Olivença', 'AM');
            INSERT INTO `cidades` VALUES ('4853', '20', 'São Paulo do Potengi', 'RN');
            INSERT INTO `cidades` VALUES ('4854', '20', 'São Pedro', 'RN');
            INSERT INTO `cidades` VALUES ('4855', '25', 'São Pedro', 'SP');
            INSERT INTO `cidades` VALUES ('4856', '10', 'São Pedro da Água Branca', 'MA');
            INSERT INTO `cidades` VALUES ('4857', '19', 'São Pedro da Aldeia', 'RJ');
            INSERT INTO `cidades` VALUES ('4858', '11', 'São Pedro da Cipa', 'MT');
            INSERT INTO `cidades` VALUES ('4859', '21', 'São Pedro da Serra', 'RS');
            INSERT INTO `cidades` VALUES ('4860', '13', 'São Pedro da União', 'MG');
            INSERT INTO `cidades` VALUES ('4861', '21', 'São Pedro das Missões', 'RS');
            INSERT INTO `cidades` VALUES ('4862', '24', 'São Pedro de Alcântara', 'SC');
            INSERT INTO `cidades` VALUES ('4863', '21', 'São Pedro do Butiá', 'RS');
            INSERT INTO `cidades` VALUES ('4864', '16', 'São Pedro do Iguaçu', 'PR');
            INSERT INTO `cidades` VALUES ('4865', '16', 'São Pedro do Ivaí', 'PR');
            INSERT INTO `cidades` VALUES ('4866', '16', 'São Pedro do Paraná', 'PR');
            INSERT INTO `cidades` VALUES ('4867', '18', 'São Pedro do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('4868', '13', 'São Pedro do Suaçuí', 'MG');
            INSERT INTO `cidades` VALUES ('4869', '21', 'São Pedro do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4870', '25', 'São Pedro do Turvo', 'SP');
            INSERT INTO `cidades` VALUES ('4871', '10', 'São Pedro dos Crentes', 'MA');
            INSERT INTO `cidades` VALUES ('4872', '13', 'São Pedro dos Ferros', 'MG');
            INSERT INTO `cidades` VALUES ('4873', '20', 'São Rafael', 'RN');
            INSERT INTO `cidades` VALUES ('4874', '10', 'São Raimundo das Mangabeiras', 'MA');
            INSERT INTO `cidades` VALUES ('4875', '10', 'São Raimundo do Doca Bezerra', 'MA');
            INSERT INTO `cidades` VALUES ('4876', '18', 'São Raimundo Nonato', 'PI');
            INSERT INTO `cidades` VALUES ('4877', '10', 'São Roberto', 'MA');
            INSERT INTO `cidades` VALUES ('4878', '13', 'São Romão', 'MG');
            INSERT INTO `cidades` VALUES ('4879', '25', 'São Roque', 'SP');
            INSERT INTO `cidades` VALUES ('4880', '13', 'São Roque de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('4881', '8', 'São Roque do Canaã', 'ES');
            INSERT INTO `cidades` VALUES ('4882', '27', 'São Salvador do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('4883', '2', 'São Sebastião', 'AL');
            INSERT INTO `cidades` VALUES ('4884', '25', 'São Sebastião', 'SP');
            INSERT INTO `cidades` VALUES ('4885', '16', 'São Sebastião da Amoreira', 'PR');
            INSERT INTO `cidades` VALUES ('4886', '13', 'São Sebastião da Bela Vista', 'MG');
            INSERT INTO `cidades` VALUES ('4887', '14', 'São Sebastião da Boa Vista', 'PA');
            INSERT INTO `cidades` VALUES ('4888', '25', 'São Sebastião da Grama', 'SP');
            INSERT INTO `cidades` VALUES ('4889', '13', 'São Sebastião da Vargem Alegre', 'MG');
            INSERT INTO `cidades` VALUES ('4890', '15', 'São Sebastião de Lagoa de Roça', 'PB');
            INSERT INTO `cidades` VALUES ('4891', '19', 'São Sebastião do Alto', 'RJ');
            INSERT INTO `cidades` VALUES ('4892', '13', 'São Sebastião do Anta', 'MG');
            INSERT INTO `cidades` VALUES ('4893', '21', 'São Sebastião do Caí', 'RS');
            INSERT INTO `cidades` VALUES ('4894', '13', 'São Sebastião do Maranhão', 'MG');
            INSERT INTO `cidades` VALUES ('4895', '13', 'São Sebastião do Oeste', 'MG');
            INSERT INTO `cidades` VALUES ('4896', '13', 'São Sebastião do Paraíso', 'MG');
            INSERT INTO `cidades` VALUES ('4897', '5', 'São Sebastião do Passé', 'BA');
            INSERT INTO `cidades` VALUES ('4898', '13', 'São Sebastião do Rio Preto', 'MG');
            INSERT INTO `cidades` VALUES ('4899', '13', 'São Sebastião do Rio Verde', 'MG');
            INSERT INTO `cidades` VALUES ('4900', '27', 'São Sebastião do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('4901', '4', 'São Sebastião do Uatumã', 'AM');
            INSERT INTO `cidades` VALUES ('4902', '15', 'São Sebastião do Umbuzeiro', 'PB');
            INSERT INTO `cidades` VALUES ('4903', '21', 'São Sepé', 'RS');
            INSERT INTO `cidades` VALUES ('4904', '9', 'São Simão', 'GO');
            INSERT INTO `cidades` VALUES ('4905', '25', 'São Simão', 'SP');
            INSERT INTO `cidades` VALUES ('4906', '13', 'São Thomé das Letras', 'MG');
            INSERT INTO `cidades` VALUES ('4907', '13', 'São Tiago', 'MG');
            INSERT INTO `cidades` VALUES ('4908', '13', 'São Tomás de Aquino', 'MG');
            INSERT INTO `cidades` VALUES ('4909', '16', 'São Tomé', 'PR');
            INSERT INTO `cidades` VALUES ('4910', '20', 'São Tomé', 'RN');
            INSERT INTO `cidades` VALUES ('4911', '21', 'São Valentim', 'RS');
            INSERT INTO `cidades` VALUES ('4912', '21', 'São Valentim do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4913', '27', 'São Valério', 'TO');
            INSERT INTO `cidades` VALUES ('4914', '21', 'São Valério do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4915', '21', 'São Vendelino', 'RS');
            INSERT INTO `cidades` VALUES ('4916', '20', 'São Vicente', 'RN');
            INSERT INTO `cidades` VALUES ('4917', '25', 'São Vicente', 'SP');
            INSERT INTO `cidades` VALUES ('4918', '13', 'São Vicente de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('4919', '21', 'São Vicente do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4920', '10', 'São Vicente Ferrer', 'MA');
            INSERT INTO `cidades` VALUES ('4921', '17', 'São Vicente Ferrer', 'PE');
            INSERT INTO `cidades` VALUES ('4922', '15', 'Sapé', 'PB');
            INSERT INTO `cidades` VALUES ('4923', '5', 'Sapeaçu', 'BA');
            INSERT INTO `cidades` VALUES ('4924', '11', 'Sapezal', 'MT');
            INSERT INTO `cidades` VALUES ('4925', '21', 'Sapiranga', 'RS');
            INSERT INTO `cidades` VALUES ('4926', '16', 'Sapopema', 'PR');
            INSERT INTO `cidades` VALUES ('4927', '14', 'Sapucaia', 'PA');
            INSERT INTO `cidades` VALUES ('4928', '19', 'Sapucaia', 'RJ');
            INSERT INTO `cidades` VALUES ('4929', '21', 'Sapucaia do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4930', '13', 'Sapucaí-Mirim', 'MG');
            INSERT INTO `cidades` VALUES ('4931', '19', 'Saquarema', 'RJ');
            INSERT INTO `cidades` VALUES ('4932', '16', 'Sarandi', 'PR');
            INSERT INTO `cidades` VALUES ('4933', '21', 'Sarandi', 'RS');
            INSERT INTO `cidades` VALUES ('4934', '25', 'Sarapuí', 'SP');
            INSERT INTO `cidades` VALUES ('4935', '13', 'Sardoá', 'MG');
            INSERT INTO `cidades` VALUES ('4936', '25', 'Sarutaiá', 'SP');
            INSERT INTO `cidades` VALUES ('4937', '13', 'Sarzedo', 'MG');
            INSERT INTO `cidades` VALUES ('4938', '5', 'Sátiro Dias', 'BA');
            INSERT INTO `cidades` VALUES ('4939', '2', 'Satuba', 'AL');
            INSERT INTO `cidades` VALUES ('4940', '10', 'Satubinha', 'MA');
            INSERT INTO `cidades` VALUES ('4941', '5', 'Saubara', 'BA');
            INSERT INTO `cidades` VALUES ('4942', '16', 'Saudade do Iguaçu', 'PR');
            INSERT INTO `cidades` VALUES ('4943', '24', 'Saudades', 'SC');
            INSERT INTO `cidades` VALUES ('4944', '5', 'Saúde', 'BA');
            INSERT INTO `cidades` VALUES ('4945', '24', 'Schroeder', 'SC');
            INSERT INTO `cidades` VALUES ('4946', '5', 'Seabra', 'BA');
            INSERT INTO `cidades` VALUES ('4947', '24', 'Seara', 'SC');
            INSERT INTO `cidades` VALUES ('4948', '25', 'Sebastianópolis do Sul', 'SP');
            INSERT INTO `cidades` VALUES ('4949', '18', 'Sebastião Barros', 'PI');
            INSERT INTO `cidades` VALUES ('4950', '5', 'Sebastião Laranjeiras', 'BA');
            INSERT INTO `cidades` VALUES ('4951', '18', 'Sebastião Leal', 'PI');
            INSERT INTO `cidades` VALUES ('4952', '21', 'Seberi', 'RS');
            INSERT INTO `cidades` VALUES ('4953', '21', 'Sede Nova', 'RS');
            INSERT INTO `cidades` VALUES ('4954', '21', 'Segredo', 'RS');
            INSERT INTO `cidades` VALUES ('4955', '21', 'Selbach', 'RS');
            INSERT INTO `cidades` VALUES ('4956', '12', 'Selvíria', 'MS');
            INSERT INTO `cidades` VALUES ('4957', '13', 'Sem-Peixe', 'MG');
            INSERT INTO `cidades` VALUES ('4958', '1', 'Sena Madureira', 'AC');
            INSERT INTO `cidades` VALUES ('4959', '10', 'Senador Alexandre Costa', 'MA');
            INSERT INTO `cidades` VALUES ('4960', '13', 'Senador Amaral', 'MG');
            INSERT INTO `cidades` VALUES ('4961', '9', 'Senador Canedo', 'GO');
            INSERT INTO `cidades` VALUES ('4962', '13', 'Senador Cortes', 'MG');
            INSERT INTO `cidades` VALUES ('4963', '20', 'Senador Elói de Souza', 'RN');
            INSERT INTO `cidades` VALUES ('4964', '13', 'Senador Firmino', 'MG');
            INSERT INTO `cidades` VALUES ('4965', '20', 'Senador Georgino Avelino', 'RN');
            INSERT INTO `cidades` VALUES ('4966', '1', 'Senador Guiomard', 'AC');
            INSERT INTO `cidades` VALUES ('4967', '13', 'Senador José Bento', 'MG');
            INSERT INTO `cidades` VALUES ('4968', '14', 'Senador José Porfírio', 'PA');
            INSERT INTO `cidades` VALUES ('4969', '10', 'Senador La Rocque', 'MA');
            INSERT INTO `cidades` VALUES ('4970', '13', 'Senador Modestino Gonçalves', 'MG');
            INSERT INTO `cidades` VALUES ('4971', '6', 'Senador Pompeu', 'CE');
            INSERT INTO `cidades` VALUES ('4972', '2', 'Senador Rui Palmeira', 'AL');
            INSERT INTO `cidades` VALUES ('4973', '6', 'Senador Sá', 'CE');
            INSERT INTO `cidades` VALUES ('4974', '21', 'Senador Salgado Filho', 'RS');
            INSERT INTO `cidades` VALUES ('4975', '16', 'Sengés', 'PR');
            INSERT INTO `cidades` VALUES ('4976', '5', 'Senhor do Bonfim', 'BA');
            INSERT INTO `cidades` VALUES ('4977', '13', 'Senhora de Oliveira', 'MG');
            INSERT INTO `cidades` VALUES ('4978', '13', 'Senhora do Porto', 'MG');
            INSERT INTO `cidades` VALUES ('4979', '13', 'Senhora dos Remédios', 'MG');
            INSERT INTO `cidades` VALUES ('4980', '21', 'Sentinela do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('4981', '5', 'Sento Sé', 'BA');
            INSERT INTO `cidades` VALUES ('4982', '21', 'Serafina Corrêa', 'RS');
            INSERT INTO `cidades` VALUES ('4983', '13', 'Sericita', 'MG');
            INSERT INTO `cidades` VALUES ('4984', '15', 'Seridó', 'PB');
            INSERT INTO `cidades` VALUES ('4985', '22', 'Seringueiras', 'RO');
            INSERT INTO `cidades` VALUES ('4986', '21', 'Sério', 'RS');
            INSERT INTO `cidades` VALUES ('4987', '13', 'Seritinga', 'MG');
            INSERT INTO `cidades` VALUES ('4988', '19', 'Seropédica', 'RJ');
            INSERT INTO `cidades` VALUES ('4989', '8', 'Serra', 'ES');
            INSERT INTO `cidades` VALUES ('4990', '24', 'Serra Alta', 'SC');
            INSERT INTO `cidades` VALUES ('4991', '25', 'Serra Azul', 'SP');
            INSERT INTO `cidades` VALUES ('4992', '13', 'Serra Azul de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('4993', '15', 'Serra Branca', 'PB');
            INSERT INTO `cidades` VALUES ('4994', '15', 'Serra da Raiz', 'PB');
            INSERT INTO `cidades` VALUES ('4995', '13', 'Serra da Saudade', 'MG');
            INSERT INTO `cidades` VALUES ('4996', '20', 'Serra de São Bento', 'RN');
            INSERT INTO `cidades` VALUES ('4997', '20', 'Serra do Mel', 'RN');
            INSERT INTO `cidades` VALUES ('4998', '3', 'Serra do Navio', 'AP');
            INSERT INTO `cidades` VALUES ('4999', '5', 'Serra do Ramalho', 'BA');
            INSERT INTO `cidades` VALUES ('5000', '13', 'Serra do Salitre', 'MG');
            INSERT INTO `cidades` VALUES ('5001', '13', 'Serra dos Aimorés', 'MG');
            INSERT INTO `cidades` VALUES ('5002', '5', 'Serra Dourada', 'BA');
            INSERT INTO `cidades` VALUES ('5003', '15', 'Serra Grande', 'PB');
            INSERT INTO `cidades` VALUES ('5004', '25', 'Serra Negra', 'SP');
            INSERT INTO `cidades` VALUES ('5005', '20', 'Serra Negra do Norte', 'RN');
            INSERT INTO `cidades` VALUES ('5006', '11', 'Serra Nova Dourada', 'MT');
            INSERT INTO `cidades` VALUES ('5007', '5', 'Serra Preta', 'BA');
            INSERT INTO `cidades` VALUES ('5008', '15', 'Serra Redonda', 'PB');
            INSERT INTO `cidades` VALUES ('5009', '17', 'Serra Talhada', 'PE');
            INSERT INTO `cidades` VALUES ('5010', '25', 'Serrana', 'SP');
            INSERT INTO `cidades` VALUES ('5011', '13', 'Serrania', 'MG');
            INSERT INTO `cidades` VALUES ('5012', '10', 'Serrano do Maranhão', 'MA');
            INSERT INTO `cidades` VALUES ('5013', '9', 'Serranópolis', 'GO');
            INSERT INTO `cidades` VALUES ('5014', '13', 'Serranópolis de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('5015', '16', 'Serranópolis do Iguaçu', 'PR');
            INSERT INTO `cidades` VALUES ('5016', '13', 'Serranos', 'MG');
            INSERT INTO `cidades` VALUES ('5017', '15', 'Serraria', 'PB');
            INSERT INTO `cidades` VALUES ('5018', '5', 'Serrinha', 'BA');
            INSERT INTO `cidades` VALUES ('5019', '20', 'Serrinha', 'RN');
            INSERT INTO `cidades` VALUES ('5020', '20', 'Serrinha dos Pintos', 'RN');
            INSERT INTO `cidades` VALUES ('5021', '17', 'Serrita', 'PE');
            INSERT INTO `cidades` VALUES ('5022', '13', 'Serro', 'MG');
            INSERT INTO `cidades` VALUES ('5023', '5', 'Serrolândia', 'BA');
            INSERT INTO `cidades` VALUES ('5024', '16', 'Sertaneja', 'PR');
            INSERT INTO `cidades` VALUES ('5025', '17', 'Sertânia', 'PE');
            INSERT INTO `cidades` VALUES ('5026', '16', 'Sertanópolis', 'PR');
            INSERT INTO `cidades` VALUES ('5027', '21', 'Sertão', 'RS');
            INSERT INTO `cidades` VALUES ('5028', '21', 'Sertão Santana', 'RS');
            INSERT INTO `cidades` VALUES ('5029', '15', 'Sertãozinho', 'PB');
            INSERT INTO `cidades` VALUES ('5030', '25', 'Sertãozinho', 'SP');
            INSERT INTO `cidades` VALUES ('5031', '25', 'Sete Barras', 'SP');
            INSERT INTO `cidades` VALUES ('5032', '21', 'Sete de Setembro', 'RS');
            INSERT INTO `cidades` VALUES ('5033', '13', 'Sete Lagoas', 'MG');
            INSERT INTO `cidades` VALUES ('5034', '12', 'Sete Quedas', 'MS');
            INSERT INTO `cidades` VALUES ('5035', '13', 'Setubinha', 'MG');
            INSERT INTO `cidades` VALUES ('5036', '21', 'Severiano de Almeida', 'RS');
            INSERT INTO `cidades` VALUES ('5037', '20', 'Severiano Melo', 'RN');
            INSERT INTO `cidades` VALUES ('5038', '25', 'Severínia', 'SP');
            INSERT INTO `cidades` VALUES ('5039', '24', 'Siderópolis', 'SC');
            INSERT INTO `cidades` VALUES ('5040', '12', 'Sidrolândia', 'MS');
            INSERT INTO `cidades` VALUES ('5041', '18', 'Sigefredo Pacheco', 'PI');
            INSERT INTO `cidades` VALUES ('5042', '19', 'Silva Jardim', 'RJ');
            INSERT INTO `cidades` VALUES ('5043', '9', 'Silvânia', 'GO');
            INSERT INTO `cidades` VALUES ('5044', '27', 'Silvanópolis', 'TO');
            INSERT INTO `cidades` VALUES ('5045', '21', 'Silveira Martins', 'RS');
            INSERT INTO `cidades` VALUES ('5046', '13', 'Silveirânia', 'MG');
            INSERT INTO `cidades` VALUES ('5047', '25', 'Silveiras', 'SP');
            INSERT INTO `cidades` VALUES ('5048', '4', 'Silves', 'AM');
            INSERT INTO `cidades` VALUES ('5049', '13', 'Silvianópolis', 'MG');
            INSERT INTO `cidades` VALUES ('5050', '26', 'Simão Dias', 'SE');
            INSERT INTO `cidades` VALUES ('5051', '13', 'Simão Pereira', 'MG');
            INSERT INTO `cidades` VALUES ('5052', '18', 'Simões', 'PI');
            INSERT INTO `cidades` VALUES ('5053', '5', 'Simões Filho', 'BA');
            INSERT INTO `cidades` VALUES ('5054', '9', 'Simolândia', 'GO');
            INSERT INTO `cidades` VALUES ('5055', '13', 'Simonésia', 'MG');
            INSERT INTO `cidades` VALUES ('5056', '18', 'Simplício Mendes', 'PI');
            INSERT INTO `cidades` VALUES ('5057', '21', 'Sinimbu', 'RS');
            INSERT INTO `cidades` VALUES ('5058', '11', 'Sinop', 'MT');
            INSERT INTO `cidades` VALUES ('5059', '16', 'Siqueira Campos', 'PR');
            INSERT INTO `cidades` VALUES ('5060', '17', 'Sirinhaém', 'PE');
            INSERT INTO `cidades` VALUES ('5061', '26', 'Siriri', 'SE');
            INSERT INTO `cidades` VALUES ('5062', '9', 'Sítio d\'Abadia', 'GO');
            INSERT INTO `cidades` VALUES ('5063', '5', 'Sítio do Mato', 'BA');
            INSERT INTO `cidades` VALUES ('5064', '5', 'Sítio do Quinto', 'BA');
            INSERT INTO `cidades` VALUES ('5065', '10', 'Sítio Novo', 'MA');
            INSERT INTO `cidades` VALUES ('5066', '20', 'Sítio Novo', 'RN');
            INSERT INTO `cidades` VALUES ('5067', '27', 'Sítio Novo do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('5068', '5', 'Sobradinho', 'BA');
            INSERT INTO `cidades` VALUES ('5069', '21', 'Sobradinho', 'RS');
            INSERT INTO `cidades` VALUES ('5070', '15', 'Sobrado', 'PB');
            INSERT INTO `cidades` VALUES ('5071', '6', 'Sobral', 'CE');
            INSERT INTO `cidades` VALUES ('5072', '13', 'Sobrália', 'MG');
            INSERT INTO `cidades` VALUES ('5073', '25', 'Socorro', 'SP');
            INSERT INTO `cidades` VALUES ('5074', '18', 'Socorro do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('5075', '15', 'Solânea', 'PB');
            INSERT INTO `cidades` VALUES ('5076', '15', 'Soledade', 'PB');
            INSERT INTO `cidades` VALUES ('5077', '21', 'Soledade', 'RS');
            INSERT INTO `cidades` VALUES ('5078', '13', 'Soledade de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('5079', '17', 'Solidão', 'PE');
            INSERT INTO `cidades` VALUES ('5080', '6', 'Solonópole', 'CE');
            INSERT INTO `cidades` VALUES ('5081', '24', 'Sombrio', 'SC');
            INSERT INTO `cidades` VALUES ('5082', '12', 'Sonora', 'MS');
            INSERT INTO `cidades` VALUES ('5083', '8', 'Sooretama', 'ES');
            INSERT INTO `cidades` VALUES ('5084', '25', 'Sorocaba', 'SP');
            INSERT INTO `cidades` VALUES ('5085', '11', 'Sorriso', 'MT');
            INSERT INTO `cidades` VALUES ('5086', '15', 'Sossêgo', 'PB');
            INSERT INTO `cidades` VALUES ('5087', '14', 'Soure', 'PA');
            INSERT INTO `cidades` VALUES ('5088', '15', 'Sousa', 'PB');
            INSERT INTO `cidades` VALUES ('5089', '5', 'Souto Soares', 'BA');
            INSERT INTO `cidades` VALUES ('5090', '27', 'Sucupira', 'TO');
            INSERT INTO `cidades` VALUES ('5091', '10', 'Sucupira do Norte', 'MA');
            INSERT INTO `cidades` VALUES ('5092', '10', 'Sucupira do Riachão', 'MA');
            INSERT INTO `cidades` VALUES ('5093', '25', 'Sud Mennucci', 'SP');
            INSERT INTO `cidades` VALUES ('5094', '24', 'Sul Brasil', 'SC');
            INSERT INTO `cidades` VALUES ('5095', '16', 'Sulina', 'PR');
            INSERT INTO `cidades` VALUES ('5096', '25', 'Sumaré', 'SP');
            INSERT INTO `cidades` VALUES ('5097', '15', 'Sumé', 'PB');
            INSERT INTO `cidades` VALUES ('5098', '19', 'Sumidouro', 'RJ');
            INSERT INTO `cidades` VALUES ('5099', '17', 'Surubim', 'PE');
            INSERT INTO `cidades` VALUES ('5100', '18', 'Sussuapara', 'PI');
            INSERT INTO `cidades` VALUES ('5101', '25', 'Suzanápolis', 'SP');
            INSERT INTO `cidades` VALUES ('5102', '25', 'Suzano', 'SP');
            INSERT INTO `cidades` VALUES ('5103', '21', 'Tabaí', 'RS');
            INSERT INTO `cidades` VALUES ('5104', '11', 'Tabaporã', 'MT');
            INSERT INTO `cidades` VALUES ('5105', '25', 'Tabapuã', 'SP');
            INSERT INTO `cidades` VALUES ('5106', '4', 'Tabatinga', 'AM');
            INSERT INTO `cidades` VALUES ('5107', '25', 'Tabatinga', 'SP');
            INSERT INTO `cidades` VALUES ('5108', '17', 'Tabira', 'PE');
            INSERT INTO `cidades` VALUES ('5109', '25', 'Taboão da Serra', 'SP');
            INSERT INTO `cidades` VALUES ('5110', '5', 'Tabocas do Brejo Velho', 'BA');
            INSERT INTO `cidades` VALUES ('5111', '20', 'Taboleiro Grande', 'RN');
            INSERT INTO `cidades` VALUES ('5112', '13', 'Tabuleiro', 'MG');
            INSERT INTO `cidades` VALUES ('5113', '6', 'Tabuleiro do Norte', 'CE');
            INSERT INTO `cidades` VALUES ('5114', '17', 'Tacaimbó', 'PE');
            INSERT INTO `cidades` VALUES ('5115', '17', 'Tacaratu', 'PE');
            INSERT INTO `cidades` VALUES ('5116', '25', 'Taciba', 'SP');
            INSERT INTO `cidades` VALUES ('5117', '15', 'Tacima', 'PB');
            INSERT INTO `cidades` VALUES ('5118', '12', 'Tacuru', 'MS');
            INSERT INTO `cidades` VALUES ('5119', '25', 'Taguaí', 'SP');
            INSERT INTO `cidades` VALUES ('5120', '27', 'Taguatinga', 'TO');
            INSERT INTO `cidades` VALUES ('5121', '25', 'Taiaçu', 'SP');
            INSERT INTO `cidades` VALUES ('5122', '14', 'Tailândia', 'PA');
            INSERT INTO `cidades` VALUES ('5123', '24', 'Taió', 'SC');
            INSERT INTO `cidades` VALUES ('5124', '13', 'Taiobeiras', 'MG');
            INSERT INTO `cidades` VALUES ('5125', '27', 'Taipas do Tocantins', 'TO');
            INSERT INTO `cidades` VALUES ('5126', '20', 'Taipu', 'RN');
            INSERT INTO `cidades` VALUES ('5127', '25', 'Taiúva', 'SP');
            INSERT INTO `cidades` VALUES ('5128', '27', 'Talismã', 'TO');
            INSERT INTO `cidades` VALUES ('5129', '17', 'Tamandaré', 'PE');
            INSERT INTO `cidades` VALUES ('5130', '16', 'Tamarana', 'PR');
            INSERT INTO `cidades` VALUES ('5131', '25', 'Tambaú', 'SP');
            INSERT INTO `cidades` VALUES ('5132', '16', 'Tamboara', 'PR');
            INSERT INTO `cidades` VALUES ('5133', '6', 'Tamboril', 'CE');
            INSERT INTO `cidades` VALUES ('5134', '18', 'Tamboril do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('5135', '25', 'Tanabi', 'SP');
            INSERT INTO `cidades` VALUES ('5136', '20', 'Tangará', 'RN');
            INSERT INTO `cidades` VALUES ('5137', '24', 'Tangará', 'SC');
            INSERT INTO `cidades` VALUES ('5138', '11', 'Tangará da Serra', 'MT');
            INSERT INTO `cidades` VALUES ('5139', '19', 'Tanguá', 'RJ');
            INSERT INTO `cidades` VALUES ('5140', '5', 'Tanhaçu', 'BA');
            INSERT INTO `cidades` VALUES ('5141', '2', 'Tanque d\'Arca', 'AL');
            INSERT INTO `cidades` VALUES ('5142', '18', 'Tanque do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('5143', '5', 'Tanque Novo', 'BA');
            INSERT INTO `cidades` VALUES ('5144', '5', 'Tanquinho', 'BA');
            INSERT INTO `cidades` VALUES ('5145', '13', 'Taparuba', 'MG');
            INSERT INTO `cidades` VALUES ('5146', '4', 'Tapauá', 'AM');
            INSERT INTO `cidades` VALUES ('5147', '16', 'Tapejara', 'PR');
            INSERT INTO `cidades` VALUES ('5148', '21', 'Tapejara', 'RS');
            INSERT INTO `cidades` VALUES ('5149', '21', 'Tapera', 'RS');
            INSERT INTO `cidades` VALUES ('5150', '5', 'Taperoá', 'BA');
            INSERT INTO `cidades` VALUES ('5151', '15', 'Taperoá', 'PB');
            INSERT INTO `cidades` VALUES ('5152', '21', 'Tapes', 'RS');
            INSERT INTO `cidades` VALUES ('5153', '13', 'Tapira', 'MG');
            INSERT INTO `cidades` VALUES ('5154', '16', 'Tapira', 'PR');
            INSERT INTO `cidades` VALUES ('5155', '13', 'Tapiraí', 'MG');
            INSERT INTO `cidades` VALUES ('5156', '25', 'Tapiraí', 'SP');
            INSERT INTO `cidades` VALUES ('5157', '5', 'Tapiramutá', 'BA');
            INSERT INTO `cidades` VALUES ('5158', '25', 'Tapiratiba', 'SP');
            INSERT INTO `cidades` VALUES ('5159', '11', 'Tapurah', 'MT');
            INSERT INTO `cidades` VALUES ('5160', '21', 'Taquara', 'RS');
            INSERT INTO `cidades` VALUES ('5161', '13', 'Taquaraçu de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('5162', '25', 'Taquaral', 'SP');
            INSERT INTO `cidades` VALUES ('5163', '9', 'Taquaral de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('5164', '2', 'Taquarana', 'AL');
            INSERT INTO `cidades` VALUES ('5165', '21', 'Taquari', 'RS');
            INSERT INTO `cidades` VALUES ('5166', '25', 'Taquaritinga', 'SP');
            INSERT INTO `cidades` VALUES ('5167', '17', 'Taquaritinga do Norte', 'PE');
            INSERT INTO `cidades` VALUES ('5168', '25', 'Taquarituba', 'SP');
            INSERT INTO `cidades` VALUES ('5169', '25', 'Taquarivaí', 'SP');
            INSERT INTO `cidades` VALUES ('5170', '21', 'Taquaruçu do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('5171', '12', 'Taquarussu', 'MS');
            INSERT INTO `cidades` VALUES ('5172', '25', 'Tarabai', 'SP');
            INSERT INTO `cidades` VALUES ('5173', '1', 'Tarauacá', 'AC');
            INSERT INTO `cidades` VALUES ('5174', '6', 'Tarrafas', 'CE');
            INSERT INTO `cidades` VALUES ('5175', '3', 'Tartarugalzinho', 'AP');
            INSERT INTO `cidades` VALUES ('5176', '25', 'Tarumã', 'SP');
            INSERT INTO `cidades` VALUES ('5177', '13', 'Tarumirim', 'MG');
            INSERT INTO `cidades` VALUES ('5178', '10', 'Tasso Fragoso', 'MA');
            INSERT INTO `cidades` VALUES ('5179', '25', 'Tatuí', 'SP');
            INSERT INTO `cidades` VALUES ('5180', '6', 'Tauá', 'CE');
            INSERT INTO `cidades` VALUES ('5181', '25', 'Taubaté', 'SP');
            INSERT INTO `cidades` VALUES ('5182', '15', 'Tavares', 'PB');
            INSERT INTO `cidades` VALUES ('5183', '21', 'Tavares', 'RS');
            INSERT INTO `cidades` VALUES ('5184', '4', 'Tefé', 'AM');
            INSERT INTO `cidades` VALUES ('5185', '15', 'Teixeira', 'PB');
            INSERT INTO `cidades` VALUES ('5186', '5', 'Teixeira de Freitas', 'BA');
            INSERT INTO `cidades` VALUES ('5187', '16', 'Teixeira Soares', 'PR');
            INSERT INTO `cidades` VALUES ('5188', '13', 'Teixeiras', 'MG');
            INSERT INTO `cidades` VALUES ('5189', '22', 'Teixeirópolis', 'RO');
            INSERT INTO `cidades` VALUES ('5190', '6', 'Tejuçuoca', 'CE');
            INSERT INTO `cidades` VALUES ('5191', '25', 'Tejupá', 'SP');
            INSERT INTO `cidades` VALUES ('5192', '16', 'Telêmaco Borba', 'PR');
            INSERT INTO `cidades` VALUES ('5193', '26', 'Telha', 'SE');
            INSERT INTO `cidades` VALUES ('5194', '20', 'Tenente Ananias', 'RN');
            INSERT INTO `cidades` VALUES ('5195', '20', 'Tenente Laurentino Cruz', 'RN');
            INSERT INTO `cidades` VALUES ('5196', '21', 'Tenente Portela', 'RS');
            INSERT INTO `cidades` VALUES ('5197', '15', 'Tenório', 'PB');
            INSERT INTO `cidades` VALUES ('5198', '5', 'Teodoro Sampaio', 'BA');
            INSERT INTO `cidades` VALUES ('5199', '25', 'Teodoro Sampaio', 'SP');
            INSERT INTO `cidades` VALUES ('5200', '5', 'Teofilândia', 'BA');
            INSERT INTO `cidades` VALUES ('5201', '13', 'Teófilo Otoni', 'MG');
            INSERT INTO `cidades` VALUES ('5202', '5', 'Teolândia', 'BA');
            INSERT INTO `cidades` VALUES ('5203', '2', 'Teotônio Vilela', 'AL');
            INSERT INTO `cidades` VALUES ('5204', '12', 'Terenos', 'MS');
            INSERT INTO `cidades` VALUES ('5205', '18', 'Teresina', 'PI');
            INSERT INTO `cidades` VALUES ('5206', '9', 'Teresina de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('5207', '19', 'Teresópolis', 'RJ');
            INSERT INTO `cidades` VALUES ('5208', '17', 'Terezinha', 'PE');
            INSERT INTO `cidades` VALUES ('5209', '9', 'Terezópolis de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('5210', '14', 'Terra Alta', 'PA');
            INSERT INTO `cidades` VALUES ('5211', '16', 'Terra Boa', 'PR');
            INSERT INTO `cidades` VALUES ('5212', '21', 'Terra de Areia', 'RS');
            INSERT INTO `cidades` VALUES ('5213', '5', 'Terra Nova', 'BA');
            INSERT INTO `cidades` VALUES ('5214', '17', 'Terra Nova', 'PE');
            INSERT INTO `cidades` VALUES ('5215', '11', 'Terra Nova do Norte', 'MT');
            INSERT INTO `cidades` VALUES ('5216', '16', 'Terra Rica', 'PR');
            INSERT INTO `cidades` VALUES ('5217', '16', 'Terra Roxa', 'PR');
            INSERT INTO `cidades` VALUES ('5218', '25', 'Terra Roxa', 'SP');
            INSERT INTO `cidades` VALUES ('5219', '14', 'Terra Santa', 'PA');
            INSERT INTO `cidades` VALUES ('5220', '11', 'Tesouro', 'MT');
            INSERT INTO `cidades` VALUES ('5221', '21', 'Teutônia', 'RS');
            INSERT INTO `cidades` VALUES ('5222', '22', 'Theobroma', 'RO');
            INSERT INTO `cidades` VALUES ('5223', '6', 'Tianguá', 'CE');
            INSERT INTO `cidades` VALUES ('5224', '16', 'Tibagi', 'PR');
            INSERT INTO `cidades` VALUES ('5225', '20', 'Tibau', 'RN');
            INSERT INTO `cidades` VALUES ('5226', '20', 'Tibau do Sul', 'RN');
            INSERT INTO `cidades` VALUES ('5227', '25', 'Tietê', 'SP');
            INSERT INTO `cidades` VALUES ('5228', '24', 'Tigrinhos', 'SC');
            INSERT INTO `cidades` VALUES ('5229', '24', 'Tijucas', 'SC');
            INSERT INTO `cidades` VALUES ('5230', '16', 'Tijucas do Sul', 'PR');
            INSERT INTO `cidades` VALUES ('5231', '17', 'Timbaúba', 'PE');
            INSERT INTO `cidades` VALUES ('5232', '20', 'Timbaúba dos Batistas', 'RN');
            INSERT INTO `cidades` VALUES ('5233', '24', 'Timbé do Sul', 'SC');
            INSERT INTO `cidades` VALUES ('5234', '10', 'Timbiras', 'MA');
            INSERT INTO `cidades` VALUES ('5235', '24', 'Timbó', 'SC');
            INSERT INTO `cidades` VALUES ('5236', '24', 'Timbó Grande', 'SC');
            INSERT INTO `cidades` VALUES ('5237', '25', 'Timburi', 'SP');
            INSERT INTO `cidades` VALUES ('5238', '10', 'Timon', 'MA');
            INSERT INTO `cidades` VALUES ('5239', '13', 'Timóteo', 'MG');
            INSERT INTO `cidades` VALUES ('5240', '21', 'Tio Hugo', 'RS');
            INSERT INTO `cidades` VALUES ('5241', '13', 'Tiradentes', 'MG');
            INSERT INTO `cidades` VALUES ('5242', '21', 'Tiradentes do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('5243', '13', 'Tiros', 'MG');
            INSERT INTO `cidades` VALUES ('5244', '26', 'Tobias Barreto', 'SE');
            INSERT INTO `cidades` VALUES ('5245', '27', 'Tocantínia', 'TO');
            INSERT INTO `cidades` VALUES ('5246', '27', 'Tocantinópolis', 'TO');
            INSERT INTO `cidades` VALUES ('5247', '13', 'Tocantins', 'MG');
            INSERT INTO `cidades` VALUES ('5248', '13', 'Tocos do Moji', 'MG');
            INSERT INTO `cidades` VALUES ('5249', '13', 'Toledo', 'MG');
            INSERT INTO `cidades` VALUES ('5250', '16', 'Toledo', 'PR');
            INSERT INTO `cidades` VALUES ('5251', '26', 'Tomar do Geru', 'SE');
            INSERT INTO `cidades` VALUES ('5252', '16', 'Tomazina', 'PR');
            INSERT INTO `cidades` VALUES ('5253', '13', 'Tombos', 'MG');
            INSERT INTO `cidades` VALUES ('5254', '14', 'Tomé-Açu', 'PA');
            INSERT INTO `cidades` VALUES ('5255', '4', 'Tonantins', 'AM');
            INSERT INTO `cidades` VALUES ('5256', '17', 'Toritama', 'PE');
            INSERT INTO `cidades` VALUES ('5257', '11', 'Torixoréu', 'MT');
            INSERT INTO `cidades` VALUES ('5258', '21', 'Toropi', 'RS');
            INSERT INTO `cidades` VALUES ('5259', '25', 'Torre de Pedra', 'SP');
            INSERT INTO `cidades` VALUES ('5260', '21', 'Torres', 'RS');
            INSERT INTO `cidades` VALUES ('5261', '25', 'Torrinha', 'SP');
            INSERT INTO `cidades` VALUES ('5262', '20', 'Touros', 'RN');
            INSERT INTO `cidades` VALUES ('5263', '25', 'Trabiju', 'SP');
            INSERT INTO `cidades` VALUES ('5264', '14', 'Tracuateua', 'PA');
            INSERT INTO `cidades` VALUES ('5265', '17', 'Tracunhaém', 'PE');
            INSERT INTO `cidades` VALUES ('5266', '2', 'Traipu', 'AL');
            INSERT INTO `cidades` VALUES ('5267', '14', 'Trairão', 'PA');
            INSERT INTO `cidades` VALUES ('5268', '6', 'Trairi', 'CE');
            INSERT INTO `cidades` VALUES ('5269', '19', 'Trajano de Moraes', 'RJ');
            INSERT INTO `cidades` VALUES ('5270', '21', 'Tramandaí', 'RS');
            INSERT INTO `cidades` VALUES ('5271', '21', 'Travesseiro', 'RS');
            INSERT INTO `cidades` VALUES ('5272', '5', 'Tremedal', 'BA');
            INSERT INTO `cidades` VALUES ('5273', '25', 'Tremembé', 'SP');
            INSERT INTO `cidades` VALUES ('5274', '21', 'Três Arroios', 'RS');
            INSERT INTO `cidades` VALUES ('5275', '24', 'Três Barras', 'SC');
            INSERT INTO `cidades` VALUES ('5276', '16', 'Três Barras do Paraná', 'PR');
            INSERT INTO `cidades` VALUES ('5277', '21', 'Três Cachoeiras', 'RS');
            INSERT INTO `cidades` VALUES ('5278', '13', 'Três Corações', 'MG');
            INSERT INTO `cidades` VALUES ('5279', '21', 'Três Coroas', 'RS');
            INSERT INTO `cidades` VALUES ('5280', '21', 'Três de Maio', 'RS');
            INSERT INTO `cidades` VALUES ('5281', '21', 'Três Forquilhas', 'RS');
            INSERT INTO `cidades` VALUES ('5282', '25', 'Três Fronteiras', 'SP');
            INSERT INTO `cidades` VALUES ('5283', '12', 'Três Lagoas', 'MS');
            INSERT INTO `cidades` VALUES ('5284', '13', 'Três Marias', 'MG');
            INSERT INTO `cidades` VALUES ('5285', '21', 'Três Palmeiras', 'RS');
            INSERT INTO `cidades` VALUES ('5286', '21', 'Três Passos', 'RS');
            INSERT INTO `cidades` VALUES ('5287', '13', 'Três Pontas', 'MG');
            INSERT INTO `cidades` VALUES ('5288', '9', 'Três Ranchos', 'GO');
            INSERT INTO `cidades` VALUES ('5289', '19', 'Três Rios', 'RJ');
            INSERT INTO `cidades` VALUES ('5290', '24', 'Treviso', 'SC');
            INSERT INTO `cidades` VALUES ('5291', '24', 'Treze de Maio', 'SC');
            INSERT INTO `cidades` VALUES ('5292', '24', 'Treze Tílias', 'SC');
            INSERT INTO `cidades` VALUES ('5293', '9', 'Trindade', 'GO');
            INSERT INTO `cidades` VALUES ('5294', '17', 'Trindade', 'PE');
            INSERT INTO `cidades` VALUES ('5295', '21', 'Trindade do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('5296', '15', 'Triunfo', 'PB');
            INSERT INTO `cidades` VALUES ('5297', '17', 'Triunfo', 'PE');
            INSERT INTO `cidades` VALUES ('5298', '21', 'Triunfo', 'RS');
            INSERT INTO `cidades` VALUES ('5299', '20', 'Triunfo Potiguar', 'RN');
            INSERT INTO `cidades` VALUES ('5300', '10', 'Trizidela do Vale', 'MA');
            INSERT INTO `cidades` VALUES ('5301', '9', 'Trombas', 'GO');
            INSERT INTO `cidades` VALUES ('5302', '24', 'Trombudo Central', 'SC');
            INSERT INTO `cidades` VALUES ('5303', '24', 'Tubarão', 'SC');
            INSERT INTO `cidades` VALUES ('5304', '5', 'Tucano', 'BA');
            INSERT INTO `cidades` VALUES ('5305', '14', 'Tucumã', 'PA');
            INSERT INTO `cidades` VALUES ('5306', '21', 'Tucunduva', 'RS');
            INSERT INTO `cidades` VALUES ('5307', '14', 'Tucuruí', 'PA');
            INSERT INTO `cidades` VALUES ('5308', '10', 'Tufilândia', 'MA');
            INSERT INTO `cidades` VALUES ('5309', '25', 'Tuiuti', 'SP');
            INSERT INTO `cidades` VALUES ('5310', '13', 'Tumiritinga', 'MG');
            INSERT INTO `cidades` VALUES ('5311', '24', 'Tunápolis', 'SC');
            INSERT INTO `cidades` VALUES ('5312', '21', 'Tunas', 'RS');
            INSERT INTO `cidades` VALUES ('5313', '16', 'Tunas do Paraná', 'PR');
            INSERT INTO `cidades` VALUES ('5314', '16', 'Tuneiras do Oeste', 'PR');
            INSERT INTO `cidades` VALUES ('5315', '10', 'Tuntum', 'MA');
            INSERT INTO `cidades` VALUES ('5316', '25', 'Tupã', 'SP');
            INSERT INTO `cidades` VALUES ('5317', '13', 'Tupaciguara', 'MG');
            INSERT INTO `cidades` VALUES ('5318', '17', 'Tupanatinga', 'PE');
            INSERT INTO `cidades` VALUES ('5319', '21', 'Tupanci do Sul', 'RS');
            INSERT INTO `cidades` VALUES ('5320', '21', 'Tupanciretã', 'RS');
            INSERT INTO `cidades` VALUES ('5321', '21', 'Tupandi', 'RS');
            INSERT INTO `cidades` VALUES ('5322', '21', 'Tuparendi', 'RS');
            INSERT INTO `cidades` VALUES ('5323', '17', 'Tuparetama', 'PE');
            INSERT INTO `cidades` VALUES ('5324', '16', 'Tupãssi', 'PR');
            INSERT INTO `cidades` VALUES ('5325', '25', 'Tupi Paulista', 'SP');
            INSERT INTO `cidades` VALUES ('5326', '27', 'Tupirama', 'TO');
            INSERT INTO `cidades` VALUES ('5327', '27', 'Tupiratins', 'TO');
            INSERT INTO `cidades` VALUES ('5328', '10', 'Turiaçu', 'MA');
            INSERT INTO `cidades` VALUES ('5329', '10', 'Turilândia', 'MA');
            INSERT INTO `cidades` VALUES ('5330', '25', 'Turiúba', 'SP');
            INSERT INTO `cidades` VALUES ('5331', '13', 'Turmalina', 'MG');
            INSERT INTO `cidades` VALUES ('5332', '25', 'Turmalina', 'SP');
            INSERT INTO `cidades` VALUES ('5333', '21', 'Turuçu', 'RS');
            INSERT INTO `cidades` VALUES ('5334', '6', 'Tururu', 'CE');
            INSERT INTO `cidades` VALUES ('5335', '9', 'Turvânia', 'GO');
            INSERT INTO `cidades` VALUES ('5336', '9', 'Turvelândia', 'GO');
            INSERT INTO `cidades` VALUES ('5337', '16', 'Turvo', 'PR');
            INSERT INTO `cidades` VALUES ('5338', '24', 'Turvo', 'SC');
            INSERT INTO `cidades` VALUES ('5339', '13', 'Turvolândia', 'MG');
            INSERT INTO `cidades` VALUES ('5340', '10', 'Tutóia', 'MA');
            INSERT INTO `cidades` VALUES ('5341', '4', 'Uarini', 'AM');
            INSERT INTO `cidades` VALUES ('5342', '5', 'Uauá', 'BA');
            INSERT INTO `cidades` VALUES ('5343', '13', 'Ubá', 'MG');
            INSERT INTO `cidades` VALUES ('5344', '13', 'Ubaí', 'MG');
            INSERT INTO `cidades` VALUES ('5345', '5', 'Ubaíra', 'BA');
            INSERT INTO `cidades` VALUES ('5346', '5', 'Ubaitaba', 'BA');
            INSERT INTO `cidades` VALUES ('5347', '6', 'Ubajara', 'CE');
            INSERT INTO `cidades` VALUES ('5348', '13', 'Ubaporanga', 'MG');
            INSERT INTO `cidades` VALUES ('5349', '25', 'Ubarana', 'SP');
            INSERT INTO `cidades` VALUES ('5350', '5', 'Ubatã', 'BA');
            INSERT INTO `cidades` VALUES ('5351', '25', 'Ubatuba', 'SP');
            INSERT INTO `cidades` VALUES ('5352', '13', 'Uberaba', 'MG');
            INSERT INTO `cidades` VALUES ('5353', '13', 'Uberlândia', 'MG');
            INSERT INTO `cidades` VALUES ('5354', '25', 'Ubirajara', 'SP');
            INSERT INTO `cidades` VALUES ('5355', '16', 'Ubiratã', 'PR');
            INSERT INTO `cidades` VALUES ('5356', '21', 'Ubiretama', 'RS');
            INSERT INTO `cidades` VALUES ('5357', '25', 'Uchoa', 'SP');
            INSERT INTO `cidades` VALUES ('5358', '5', 'Uibaí', 'BA');
            INSERT INTO `cidades` VALUES ('5359', '23', 'Uiramutã', 'RR');
            INSERT INTO `cidades` VALUES ('5360', '9', 'Uirapuru', 'GO');
            INSERT INTO `cidades` VALUES ('5361', '15', 'Uiraúna', 'PB');
            INSERT INTO `cidades` VALUES ('5362', '14', 'Ulianópolis', 'PA');
            INSERT INTO `cidades` VALUES ('5363', '6', 'Umari', 'CE');
            INSERT INTO `cidades` VALUES ('5364', '20', 'Umarizal', 'RN');
            INSERT INTO `cidades` VALUES ('5365', '26', 'Umbaúba', 'SE');
            INSERT INTO `cidades` VALUES ('5366', '5', 'Umburanas', 'BA');
            INSERT INTO `cidades` VALUES ('5367', '13', 'Umburatiba', 'MG');
            INSERT INTO `cidades` VALUES ('5368', '15', 'Umbuzeiro', 'PB');
            INSERT INTO `cidades` VALUES ('5369', '6', 'Umirim', 'CE');
            INSERT INTO `cidades` VALUES ('5370', '16', 'Umuarama', 'PR');
            INSERT INTO `cidades` VALUES ('5371', '5', 'Una', 'BA');
            INSERT INTO `cidades` VALUES ('5372', '13', 'Unaí', 'MG');
            INSERT INTO `cidades` VALUES ('5373', '18', 'União', 'PI');
            INSERT INTO `cidades` VALUES ('5374', '21', 'União da Serra', 'RS');
            INSERT INTO `cidades` VALUES ('5375', '16', 'União da Vitória', 'PR');
            INSERT INTO `cidades` VALUES ('5376', '13', 'União de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('5377', '24', 'União do Oeste', 'SC');
            INSERT INTO `cidades` VALUES ('5378', '11', 'União do Sul', 'MT');
            INSERT INTO `cidades` VALUES ('5379', '2', 'União dos Palmares', 'AL');
            INSERT INTO `cidades` VALUES ('5380', '25', 'União Paulista', 'SP');
            INSERT INTO `cidades` VALUES ('5381', '16', 'Uniflor', 'PR');
            INSERT INTO `cidades` VALUES ('5382', '21', 'Unistalda', 'RS');
            INSERT INTO `cidades` VALUES ('5383', '20', 'Upanema', 'RN');
            INSERT INTO `cidades` VALUES ('5384', '16', 'Uraí', 'PR');
            INSERT INTO `cidades` VALUES ('5385', '5', 'Urandi', 'BA');
            INSERT INTO `cidades` VALUES ('5386', '25', 'Urânia', 'SP');
            INSERT INTO `cidades` VALUES ('5387', '10', 'Urbano Santos', 'MA');
            INSERT INTO `cidades` VALUES ('5388', '25', 'Uru', 'SP');
            INSERT INTO `cidades` VALUES ('5389', '9', 'Uruaçu', 'GO');
            INSERT INTO `cidades` VALUES ('5390', '9', 'Uruana', 'GO');
            INSERT INTO `cidades` VALUES ('5391', '13', 'Uruana de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('5392', '14', 'Uruará', 'PA');
            INSERT INTO `cidades` VALUES ('5393', '24', 'Urubici', 'SC');
            INSERT INTO `cidades` VALUES ('5394', '6', 'Uruburetama', 'CE');
            INSERT INTO `cidades` VALUES ('5395', '13', 'Urucânia', 'MG');
            INSERT INTO `cidades` VALUES ('5396', '4', 'Urucará', 'AM');
            INSERT INTO `cidades` VALUES ('5397', '5', 'Uruçuca', 'BA');
            INSERT INTO `cidades` VALUES ('5398', '18', 'Uruçuí', 'PI');
            INSERT INTO `cidades` VALUES ('5399', '13', 'Urucuia', 'MG');
            INSERT INTO `cidades` VALUES ('5400', '4', 'Urucurituba', 'AM');
            INSERT INTO `cidades` VALUES ('5401', '21', 'Uruguaiana', 'RS');
            INSERT INTO `cidades` VALUES ('5402', '6', 'Uruoca', 'CE');
            INSERT INTO `cidades` VALUES ('5403', '22', 'Urupá', 'RO');
            INSERT INTO `cidades` VALUES ('5404', '24', 'Urupema', 'SC');
            INSERT INTO `cidades` VALUES ('5405', '25', 'Urupês', 'SP');
            INSERT INTO `cidades` VALUES ('5406', '24', 'Urussanga', 'SC');
            INSERT INTO `cidades` VALUES ('5407', '9', 'Urutaí', 'GO');
            INSERT INTO `cidades` VALUES ('5408', '5', 'Utinga', 'BA');
            INSERT INTO `cidades` VALUES ('5409', '21', 'Vacaria', 'RS');
            INSERT INTO `cidades` VALUES ('5410', '11', 'Vale de São Domingos', 'MT');
            INSERT INTO `cidades` VALUES ('5411', '22', 'Vale do Anari', 'RO');
            INSERT INTO `cidades` VALUES ('5412', '22', 'Vale do Paraíso', 'RO');
            INSERT INTO `cidades` VALUES ('5413', '21', 'Vale do Sol', 'RS');
            INSERT INTO `cidades` VALUES ('5414', '21', 'Vale Real', 'RS');
            INSERT INTO `cidades` VALUES ('5415', '21', 'Vale Verde', 'RS');
            INSERT INTO `cidades` VALUES ('5416', '5', 'Valença', 'BA');
            INSERT INTO `cidades` VALUES ('5417', '19', 'Valença', 'RJ');
            INSERT INTO `cidades` VALUES ('5418', '18', 'Valença do Piauí', 'PI');
            INSERT INTO `cidades` VALUES ('5419', '5', 'Valente', 'BA');
            INSERT INTO `cidades` VALUES ('5420', '25', 'Valentim Gentil', 'SP');
            INSERT INTO `cidades` VALUES ('5421', '25', 'Valinhos', 'SP');
            INSERT INTO `cidades` VALUES ('5422', '25', 'Valparaíso', 'SP');
            INSERT INTO `cidades` VALUES ('5423', '9', 'Valparaíso de Goiás', 'GO');
            INSERT INTO `cidades` VALUES ('5424', '21', 'Vanini', 'RS');
            INSERT INTO `cidades` VALUES ('5425', '24', 'Vargeão', 'SC');
            INSERT INTO `cidades` VALUES ('5426', '24', 'Vargem', 'SC');
            INSERT INTO `cidades` VALUES ('5427', '25', 'Vargem', 'SP');
            INSERT INTO `cidades` VALUES ('5428', '13', 'Vargem Alegre', 'MG');
            INSERT INTO `cidades` VALUES ('5429', '8', 'Vargem Alta', 'ES');
            INSERT INTO `cidades` VALUES ('5430', '13', 'Vargem Bonita', 'MG');
            INSERT INTO `cidades` VALUES ('5431', '24', 'Vargem Bonita', 'SC');
            INSERT INTO `cidades` VALUES ('5432', '10', 'Vargem Grande', 'MA');
            INSERT INTO `cidades` VALUES ('5433', '13', 'Vargem Grande do Rio Pardo', 'MG');
            INSERT INTO `cidades` VALUES ('5434', '25', 'Vargem Grande do Sul', 'SP');
            INSERT INTO `cidades` VALUES ('5435', '25', 'Vargem Grande Paulista', 'SP');
            INSERT INTO `cidades` VALUES ('5436', '13', 'Varginha', 'MG');
            INSERT INTO `cidades` VALUES ('5437', '9', 'Varjão', 'GO');
            INSERT INTO `cidades` VALUES ('5438', '13', 'Varjão de Minas', 'MG');
            INSERT INTO `cidades` VALUES ('5439', '6', 'Varjota', 'CE');
            INSERT INTO `cidades` VALUES ('5440', '19', 'Varre-Sai', 'RJ');
            INSERT INTO `cidades` VALUES ('5441', '15', 'Várzea', 'PB');
            INSERT INTO `cidades` VALUES ('5442', '20', 'Várzea', 'RN');
            INSERT INTO `cidades` VALUES ('5443', '6', 'Várzea Alegre', 'CE');
            INSERT INTO `cidades` VALUES ('5444', '18', 'Várzea Branca', 'PI');
            INSERT INTO `cidades` VALUES ('5445', '13', 'Várzea da Palma', 'MG');
            INSERT INTO `cidades` VALUES ('5446', '5', 'Várzea da Roça', 'BA');
            INSERT INTO `cidades` VALUES ('5447', '5', 'Várzea do Poço', 'BA');
            INSERT INTO `cidades` VALUES ('5448', '11', 'Várzea Grande', 'MT');
            INSERT INTO `cidades` VALUES ('5449', '18', 'Várzea Grande', 'PI');
            INSERT INTO `cidades` VALUES ('5450', '5', 'Várzea Nova', 'BA');
            INSERT INTO `cidades` VALUES ('5451', '25', 'Várzea Paulista', 'SP');
            INSERT INTO `cidades` VALUES ('5452', '5', 'Varzedo', 'BA');
            INSERT INTO `cidades` VALUES ('5453', '13', 'Varzelândia', 'MG');
            INSERT INTO `cidades` VALUES ('5454', '19', 'Vassouras', 'RJ');
            INSERT INTO `cidades` VALUES ('5455', '13', 'Vazante', 'MG');
            INSERT INTO `cidades` VALUES ('5456', '21', 'Venâncio Aires', 'RS');
            INSERT INTO `cidades` VALUES ('5457', '8', 'Venda Nova do Imigrante', 'ES');
            INSERT INTO `cidades` VALUES ('5458', '20', 'Venha-Ver', 'RN');
            INSERT INTO `cidades` VALUES ('5459', '16', 'Ventania', 'PR');
            INSERT INTO `cidades` VALUES ('5460', '17', 'Venturosa', 'PE');
            INSERT INTO `cidades` VALUES ('5461', '11', 'Vera', 'MT');
            INSERT INTO `cidades` VALUES ('5462', '5', 'Vera Cruz', 'BA');
            INSERT INTO `cidades` VALUES ('5463', '20', 'Vera Cruz', 'RN');
            INSERT INTO `cidades` VALUES ('5464', '21', 'Vera Cruz', 'RS');
            INSERT INTO `cidades` VALUES ('5465', '25', 'Vera Cruz', 'SP');
            INSERT INTO `cidades` VALUES ('5466', '16', 'Vera Cruz do Oeste', 'PR');
            INSERT INTO `cidades` VALUES ('5467', '18', 'Vera Mendes', 'PI');
            INSERT INTO `cidades` VALUES ('5468', '21', 'Veranópolis', 'RS');
            INSERT INTO `cidades` VALUES ('5469', '17', 'Verdejante', 'PE');
            INSERT INTO `cidades` VALUES ('5470', '13', 'Verdelândia', 'MG');
            INSERT INTO `cidades` VALUES ('5471', '16', 'Verê', 'PR');
            INSERT INTO `cidades` VALUES ('5472', '5', 'Vereda', 'BA');
            INSERT INTO `cidades` VALUES ('5473', '13', 'Veredinha', 'MG');
            INSERT INTO `cidades` VALUES ('5474', '13', 'Veríssimo', 'MG');
            INSERT INTO `cidades` VALUES ('5475', '13', 'Vermelho Novo', 'MG');
            INSERT INTO `cidades` VALUES ('5476', '17', 'Vertente do Lério', 'PE');
            INSERT INTO `cidades` VALUES ('5477', '17', 'Vertentes', 'PE');
            INSERT INTO `cidades` VALUES ('5478', '13', 'Vespasiano', 'MG');
            INSERT INTO `cidades` VALUES ('5479', '21', 'Vespasiano Correa', 'RS');
            INSERT INTO `cidades` VALUES ('5480', '21', 'Viadutos', 'RS');
            INSERT INTO `cidades` VALUES ('5481', '21', 'Viamão', 'RS');
            INSERT INTO `cidades` VALUES ('5482', '8', 'Viana', 'ES');
            INSERT INTO `cidades` VALUES ('5483', '10', 'Viana', 'MA');
            INSERT INTO `cidades` VALUES ('5484', '9', 'Vianópolis', 'GO');
            INSERT INTO `cidades` VALUES ('5485', '17', 'Vicência', 'PE');
            INSERT INTO `cidades` VALUES ('5486', '21', 'Vicente Dutra', 'RS');
            INSERT INTO `cidades` VALUES ('5487', '12', 'Vicentina', 'MS');
            INSERT INTO `cidades` VALUES ('5488', '9', 'Vicentinópolis', 'GO');
            INSERT INTO `cidades` VALUES ('5489', '2', 'Viçosa', 'AL');
            INSERT INTO `cidades` VALUES ('5490', '13', 'Viçosa', 'MG');
            INSERT INTO `cidades` VALUES ('5491', '20', 'Viçosa', 'RN');
            INSERT INTO `cidades` VALUES ('5492', '6', 'Viçosa do Ceará', 'CE');
            INSERT INTO `cidades` VALUES ('5493', '21', 'Victor Graeff', 'RS');
            INSERT INTO `cidades` VALUES ('5494', '24', 'Vidal Ramos', 'SC');
            INSERT INTO `cidades` VALUES ('5495', '24', 'Videira', 'SC');
            INSERT INTO `cidades` VALUES ('5496', '13', 'Vieiras', 'MG');
            INSERT INTO `cidades` VALUES ('5497', '15', 'Vieirópolis', 'PB');
            INSERT INTO `cidades` VALUES ('5498', '14', 'Vigia', 'PA');
            INSERT INTO `cidades` VALUES ('5499', '11', 'Vila Bela da Santíssima Trindade', 'MT');
            INSERT INTO `cidades` VALUES ('5500', '9', 'Vila Boa', 'GO');            
        ]);
    }
}

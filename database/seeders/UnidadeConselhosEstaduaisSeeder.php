<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Unidade;

class UnidadeConselhosEstaduaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidade::create([
            'nome' => 'IFAL - RIO LARGO ', 
            'tipo' => 'INSTITUTO', 
            'esfera' => 'Estadual',
            'email' => 'dg.riolargo@ifal.edu.br',
            'url' => null,
            'sigla' => 'IFAL',
            'contato' => '',
            'contato2' => '',
            'endereco' => 'Rio Largo - AL, CEP: 57100-000', 
            'telefone' => '(82)2126-6290',
            'user_id' => '1',
            'estado_id' => null,
            'friendly_url' => '',
            'confirmado' => false
        ]);
    }
}

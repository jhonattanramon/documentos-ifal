<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->delete();
        Estado::create(['id' => 1, 'nome' => 'Água Branca', 'sigla' => 'AL']);
        Estado::create(['id' => 2, 'nome' => 'Anadia', 'sigla' => 'AL']);
        Estado::create(['id' => 3, 'nome' => 'Arapiraca', 'sigla' => 'AL']);
        Estado::create(['id' => 4, 'nome' => 'Atalaia', 'sigla' => 'AL']);
        Estado::create(['id' => 5, 'nome' => 'Barra de Santo Antônio', 'sigla' => 'AL']);
        Estado::create(['id' => 6, 'nome' => 'Barra de São Miguel', 'sigla' => 'AL']);
        Estado::create(['id' => 7, 'nome' => 'Batalha', 'sigla' => 'AL']);
        Estado::create(['id' => 8, 'nome' => 'Belém', 'sigla' => 'AL']);
        Estado::create(['id' => 9, 'nome' => 'Belo Monte', 'sigla' => 'AL']);
        Estado::create(['id' => 10, 'nome' => 'Boca da Mata', 'sigla' => 'AL']);
        Estado::create(['id' => 11, 'nome' => 'Branquinha', 'sigla' => 'AL']);
        Estado::create(['id' => 12, 'nome' => 'Cacimbinhas', 'sigla' => 'AL']);
        Estado::create(['id' => 13, 'nome' => 'Cajueiro', 'sigla' => 'AL']);
        Estado::create(['id' => 14, 'nome' => 'Campestre', 'sigla' => 'AL']);
        Estado::create(['id' => 15, 'nome' => 'Campo Alegre', 'sigla' => 'AL']);
        Estado::create(['id' => 16, 'nome' => 'Campo Grande', 'sigla' => 'AL']);
        Estado::create(['id' => 17, 'nome' => 'Canapi', 'sigla' => 'AL']);
        Estado::create(['id' => 18, 'nome' => 'Capela', 'sigla' => 'AL']);
        Estado::create(['id' => 19, 'nome' => 'Carneiros', 'sigla' => 'AL']);
        Estado::create(['id' => 20, 'nome' => 'Chã Preta', 'sigla' => 'AL']);
        Estado::create(['id' => 21, 'nome' => 'Coité do Noia', 'sigla' => 'AL']);
        Estado::create(['id' => 22, 'nome' => 'Colônia Leopoldina', 'sigla' => 'AL']);
        Estado::create(['id' => 23, 'nome' => 'Coqueiro Seco', 'sigla' => 'AL']);
        Estado::create(['id' => 24, 'nome' => 'Coruripe', 'sigla' => 'AL']);
        Estado::create(['id' => 25, 'nome' => 'Craíbas', 'sigla' => 'AL']);
        Estado::create(['id' => 26, 'nome' => 'Delmiro Gouveia', 'sigla' => 'AL']);
        Estado::create(['id' => 27, 'nome' => 'Dois Riachos', 'sigla' => 'AL']);
        Estado::create(['id' => 28, 'nome' => 'Estrela de Alagoas', 'sigla' => 'AL']);
        Estado::create(['id' => 29, 'nome' => 'Feira Grande', 'sigla' => 'AL']);
        Estado::create(['id' => 30, 'nome' => 'Feliz Deserto', 'sigla' => 'AL']);
        Estado::create(['id' => 31, 'nome' => 'Flexeiras', 'sigla' => 'AL']);
        Estado::create(['id' => 32, 'nome' => 'Girau do Ponciano', 'sigla' => 'AL']);
        Estado::create(['id' => 33, 'nome' => 'Ibateguara', 'sigla' => 'AL']);
        Estado::create(['id' => 34, 'nome' => 'Igaci', 'sigla' => 'AL']);
        Estado::create(['id' => 35, 'nome' => 'Igreja Nova', 'sigla' => 'AL']);
        Estado::create(['id' => 36, 'nome' => 'Inhapi', 'sigla' => 'AL']);
        Estado::create(['id' => 37, 'nome' => 'Jacaré dos Homens', 'sigla' => 'AL']);
        Estado::create(['id' => 38, 'nome' => 'Jacuípe', 'sigla' => 'AL']);
        Estado::create(['id' => 39, 'nome' => 'Japaratinga', 'sigla' => 'AL']);
        Estado::create(['id' => 40, 'nome' => 'Jaramataia', 'sigla' => 'AL']);
        Estado::create(['id' => 41, 'nome' => 'Jequiá da Praia', 'sigla' => 'AL']);
        Estado::create(['id' => 42, 'nome' => 'Joaquim Gomes', 'sigla' => 'AL']);
        Estado::create(['id' => 43, 'nome' => 'Jundiá', 'sigla' => 'AL']);
        Estado::create(['id' => 44, 'nome' => 'Junqueiro', 'sigla' => 'AL']);
        Estado::create(['id' => 45, 'nome' => 'Lagoa da Canoa', 'sigla' => 'AL']);
        Estado::create(['id' => 46, 'nome' => 'Limoeiro de Anadia', 'sigla' => 'AL']);
        Estado::create(['id' => 47, 'nome' => 'Maceió', 'sigla' => 'AL']);
        Estado::create(['id' => 48, 'nome' => 'Major Izidoro', 'sigla' => 'AL']);
        Estado::create(['id' => 49, 'nome' => 'Mar Vermelho', 'sigla' => 'AL']);
        Estado::create(['id' => 50, 'nome' => 'Maragogi', 'sigla' => 'AL']);
        Estado::create(['id' => 51, 'nome' => 'Maravilha', 'sigla' => 'AL']);
        Estado::create(['id' => 52, 'nome' => 'Marechal Deodoro', 'sigla' => 'AL']);
        Estado::create(['id' => 53, 'nome' => 'Maribondo', 'sigla' => 'AL']);
        Estado::create(['id' => 54, 'nome' => 'Mata Grande', 'sigla' => 'AL']);
        Estado::create(['id' => 55, 'nome' => 'Matriz de Camaragibe', 'sigla' => 'AL']);
        Estado::create(['id' => 56, 'nome' => 'Messias', 'sigla' => 'AL']);
        Estado::create(['id' => 57, 'nome' => 'Minador do Negrão', 'sigla' => 'AL']);
        Estado::create(['id' => 58, 'nome' => 'Monteirópolis', 'sigla' => 'AL']);
        Estado::create(['id' => 59, 'nome' => 'Murici', 'sigla' => 'AL']);
        Estado::create(['id' => 60, 'nome' => 'Novo Lino', 'sigla' => 'AL']);
        Estado::create(['id' => 61, 'nome' => 'Olho d\'Água das Flores', 'sigla' => 'AL']);
        Estado::create(['id' => 62, 'nome' => 'Olho d\'Água do Casado', 'sigla' => 'AL']);
        Estado::create(['id' => 63, 'nome' => 'Olho d\'Água Grande', 'sigla' => 'AL']);
        Estado::create(['id' => 64, 'nome' => 'Olivença', 'sigla' => 'AL']);
        Estado::create(['id' => 65, 'nome' => 'Ouro Branco', 'sigla' => 'AL']);
        Estado::create(['id' => 66, 'nome' => 'Palestina', 'sigla' => 'AL']);
        Estado::create(['id' => 67, 'nome' => 'Palmeira dos Índios', 'sigla' => 'AL']);
        Estado::create(['id' => 68, 'nome' => 'Pão de Açúcar', 'sigla' => 'AL']);
        Estado::create(['id' => 69, 'nome' => 'Pariconha', 'sigla' => 'AL']);
        Estado::create(['id' => 70, 'nome' => 'Paripueira', 'sigla' => 'AL']);
        Estado::create(['id' => 71, 'nome' => 'Passo de Camaragibe', 'sigla' => 'AL']);
        Estado::create(['id' => 72, 'nome' => 'Paulo Jacinto', 'sigla' => 'AL']);
        Estado::create(['id' => 73, 'nome' => 'Penedo', 'sigla' => 'AL']);
        Estado::create(['id' => 74, 'nome' => 'Piaçabuçu', 'sigla' => 'AL']);
        Estado::create(['id' => 75, 'nome' => 'Pilar', 'sigla' => 'AL']);
        Estado::create(['id' => 76, 'nome' => 'Pindoba', 'sigla' => 'AL']);
        Estado::create(['id' => 77, 'nome' => 'Piranhas', 'sigla' => 'AL']);
        Estado::create(['id' => 78, 'nome' => 'Poço das Trincheiras', 'sigla' => 'AL']);
        Estado::create(['id' => 79, 'nome' => 'Porto Calvo', 'sigla' => 'AL']);
        Estado::create(['id' => 80, 'nome' => 'Porto de Pedras', 'sigla' => 'AL']);
        Estado::create(['id' => 81, 'nome' => 'Porto Real do Colégio', 'sigla' => 'AL']);
        Estado::create(['id' => 82, 'nome' => 'Quebrangulo', 'sigla' => 'AL']);
        Estado::create(['id' => 83, 'nome' => 'Rio Largo', 'sigla' => 'AL']);
        Estado::create(['id' => 84, 'nome' => 'Roteiro', 'sigla' => 'AL']);
        Estado::create(['id' => 85, 'nome' => 'Santa Luzia do Norte', 'sigla' => 'AL']);
        Estado::create(['id' => 86, 'nome' => 'Santana do Ipanema', 'sigla' => 'AL']);
        Estado::create(['id' => 87, 'nome' => 'Santana do Mundaú', 'sigla' => 'AL']);
        Estado::create(['id' => 88, 'nome' => 'São Brás', 'sigla' => 'AL']);
        Estado::create(['id' => 89, 'nome' => 'São José da Laje', 'sigla' => 'AL']);
        Estado::create(['id' => 90, 'nome' => 'São José da Tapera', 'sigla' => 'AL']);
        Estado::create(['id' => 91, 'nome' => 'São Luís do Quitunde', 'sigla' => 'AL']);
        Estado::create(['id' => 92, 'nome' => 'São Miguel dos Campos', 'sigla' => 'AL']);
        Estado::create(['id' => 93, 'nome' => 'São Miguel dos Milagres', 'sigla' => 'AL']);
        Estado::create(['id' => 94, 'nome' => 'São Sebastião', 'sigla' => 'AL']);
        Estado::create(['id' => 95, 'nome' => 'Satuba', 'sigla' => 'AL']);
        Estado::create(['id' => 96, 'nome' => 'Senador Rui Palmeira', 'sigla' => 'AL']);
        Estado::create(['id' => 97, 'nome' => 'Tanque d\'Arca', 'sigla' => 'AL']);
        Estado::create(['id' => 98, 'nome' => 'Taquarana', 'sigla' => 'AL']);
        Estado::create(['id' => 99, 'nome' => 'Teotônio Vilela', 'sigla' => 'AL']);
        Estado::create(['id' => 100, 'nome' => 'Traipu', 'sigla' => 'AL']);
        Estado::create(['id' => 101, 'nome' => 'União dos Palmares', 'sigla' => 'AL']);
        Estado::create(['id' => 102, 'nome' => 'Viçosa', 'sigla' => 'AL']);

    }

}

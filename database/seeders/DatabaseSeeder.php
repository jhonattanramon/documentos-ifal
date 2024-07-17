<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(UnidadeDefaultTableSeeder::class);
        $this->call(UnidadeConselhosEstaduaisSeeder::class);
        $this->call(UserConselhosEstaduaisSeeder::class);
        $this->call(AssuntoTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
        $this->call(TipoDocumentoTableSeeder::class);
        $this->call(UpdateTipoUsuarioAdminSeeder::class);
        // $this->call(UserUnidadeConselhoFederalSeeder::class); a revisar se vai ser implementado
        
        
        // $this->call(AddUsersRoboUnidadesSeeder::class);        
        // $this->call(MunicipioTableSeeder::class);
        // $this->call(AddCapitalMunicipio::class);
        // $this->call(BrasilEstadoTableSeeder::class);
        // $this->call(UpdateStatusExtratorDFSeeder::class);
    }
}

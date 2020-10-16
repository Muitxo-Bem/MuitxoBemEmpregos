<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\Candidato;
use App\Models\Endereco;
use App\Models\Portfolio;
use App\Models\Telefone;
use App\Models\Curriculo;
use App\Models\User;

class CandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<25; $i++){
            Candidato::factory()
                    ->has(Endereco::factory()->count(1))
                    ->has(Portfolio::factory()->count(1))
                    ->has(Telefone::factory()->count(1))
                    ->has(Curriculo::factory()->count(1))
                    ->for(User::factory()->state(['tipo' =>'candidato']))
                    ->create();
        }
        
    }
}

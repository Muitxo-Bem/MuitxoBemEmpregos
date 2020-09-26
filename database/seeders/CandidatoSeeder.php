<?php

namespace Database\Seeders;

use App\Models\Candidato;
use App\Models\Endereco;
use Illuminate\Database\Seeder;

class CandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidato::factory()
                    ->times(50)
                    ->has(Endereco::factory()->count(1))
                    ->create();
    }
}

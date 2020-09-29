<?php

namespace Database\Seeders;

use App\Models\Candidato;
use App\Models\Telefone;
use App\Models\Curriculo;
use App\Models\Endereco;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Factories\CandidatoFactory;


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
                    ->has(Portfolio::factory()->count(1))
                    ->has(Telefone::factory()->count(1))
                    ->has(Curriculo::factory()->count(1))
                    ->create();
    }
}

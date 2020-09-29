<?php

namespace Database\Seeders;

use App\Models\Candidato;
use App\Models\Empregador;
use Illuminate\Database\Seeder;
use App\Models\VagaEmprego;

class VagaEmpregoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VagaEmprego::factory()
                ->times(50)
                ->create();
        //
    }
}

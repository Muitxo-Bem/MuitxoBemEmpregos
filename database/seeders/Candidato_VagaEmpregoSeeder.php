<?php

namespace Database\Seeders;

use App\Models\Candidato_VagaEmprego;
use Illuminate\Database\Seeder;

class Candidato_VagaEmpregoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidato_VagaEmprego::factory()
            ->times(25)
            ->create();
        //
    }
}

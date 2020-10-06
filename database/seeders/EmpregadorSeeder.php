<?php

namespace Database\Seeders;

use App\Models\Empregador;
use App\Models\Telefone;
use App\Models\VagaEmprego;
use Illuminate\Database\Seeder;

class EmpregadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empregador::factory()
                    ->times(5)
                    ->has(Telefone::factory()->count(1))
                    ->hasVagas(3)
                    ->create();
    }
}

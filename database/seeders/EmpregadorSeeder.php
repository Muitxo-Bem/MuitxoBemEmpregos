<?php

namespace Database\Seeders;

use App\Models\Empregador;
use App\Models\Telefone;
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
                    ->times(25)
                    ->has(Telefone::factory()->count(1))
                    ->create();
    }
}

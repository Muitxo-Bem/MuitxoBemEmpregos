<?php

namespace Database\Seeders;

use App\Models\Empregador;
use App\Models\Telefone;
use App\Models\User;
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
        for($i=0; $i<5; $i++){
            Empregador::factory()
            ->has(Telefone::factory()->count(1))
            ->hasVagas(3)
            ->for(User::factory()->state(['tipo' =>'empregador']))
            ->create();
        }
       
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CurriculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curriculo::factory()
                    ->times(50)
                    ->has(Idioma::factory()->count(1))
                    ->has(AreaFormacao::factory()->count(1))
                    ->create();
    }
}

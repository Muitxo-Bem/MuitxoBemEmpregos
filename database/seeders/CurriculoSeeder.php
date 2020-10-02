<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curriculo;
use App\Models\Idioma;
use App\Models\AreaFormacao;

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
                    ->times(1)
                    ->has(Idioma::factory())
                    ->has(AreaFormacao::factory())
                    ->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AreaFormacao;
use App\Models\SubArea;

class AreaFormacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AreaFormacao::factory()
                    ->times(50)
                    ->has(SubArea::factory()->count(1))
                    ->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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

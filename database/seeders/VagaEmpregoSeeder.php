<?php

namespace Database\Seeders;

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
                ->times(25)
                ->create();
        //
    }
}

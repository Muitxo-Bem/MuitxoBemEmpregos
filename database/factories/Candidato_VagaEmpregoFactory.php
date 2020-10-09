<?php

namespace Database\Factories;

use App\Models\Candidato;
use App\Models\Candidato_VagaEmprego;
use App\Models\Empregador;
use App\Models\VagaEmprego;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class Candidato_VagaEmpregoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidato_VagaEmprego::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'candidato_id' => rand(1,25),
            'vaga_id' => rand(1,15),

        ];
    }
}

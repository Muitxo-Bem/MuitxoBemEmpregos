<?php

namespace Database\Factories;

use App\Models\Candidato;
use App\Models\Empregador;
use App\Models\Telefone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TelefoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Telefone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'telefone_primario' => $this->faker->cellphonenumber,
            'telefone_secundario' => $this->faker->cellphonenumber,
        ];
    }
}

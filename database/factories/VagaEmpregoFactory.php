<?php

namespace Database\Factories;

use App\Models\Empregador;
use App\Models\VagaEmprego;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VagaEmpregoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VagaEmprego::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'descricao' => $this->faker->text($maxNbChars = 200),
            'quantidade_de_vagas' => $this->faker->randomDigitNotNull,
            'local_de_trabalho' => $this->faker->city,
            'requisitos' => $this->faker->text($maxNbChars = 200),
            'faixa_salarial' => $this->faker->numberBetween($min = 1000, $max = 20000),
            'ativa' => $this->faker->numberBetween($min = 0, $max = 1),
            'diferenciais' => $this->faker->text($maxNbChars = 200),



        ];
    }
    public function configure()
    {
        return $this->afterMaking(function (VagaEmprego $vagaEmprego){
        } )
            ->afterCreating(function(VagaEmprego $vagaEmprego){
            });
    }
}



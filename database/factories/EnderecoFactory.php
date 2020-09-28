<?php

namespace Database\Factories;

use App\Models\Candidato;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EnderecoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Endereco::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'candidato_id' => function() {
                return Candidato::factory()->create()->id;
            },
            'bairro' => $this->faker->state, // nao é nome de bairro, mas é só para testes
            'numero' => $this->faker->unique()->buildingNumber,
            'cep' => $this->faker->postcode,
            'estado'=> $this->faker->stateAbbr,
            'cidade' => $this->faker->city,
            'rua' => $this->faker->streetAddress,
        ];
    }
}

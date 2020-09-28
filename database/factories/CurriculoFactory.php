<?php

namespace Database\Factories;

use App\Models\Curriculo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CurriculoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Curriculo::class;

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
            'info_adicional' => $this->faker->sentence($nbWords = 8, $variableNbWords = true),
            'experiecnia' => $this->faker->sentence($nbWords = 8, $variableNbWords = true),

        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Curriculo $curriculo){
            //
        })->afterCreating(function (Curriculo $curriculo){
            //
        });
    }
}

<?php

namespace Database\Factories;

use App\Models\AreaFormacao;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AreaFormacaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AreaFormacao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'curriculo_id' => function() {
                return Curriculo::factory()->create()->id;
            },
            'area' => $this->faker->sentence($nbWords = 8, $variableNbWords = true),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (AreaFormacao $areaFormacao){
            //
        })->afterCreating(function (AreaFormacao $areaFormacao){
            //
        });
    }
}

<?php

namespace Database\Factories;

use App\Models\SubArea;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubAreaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubArea::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'area_formacao_id' => function() {
                return AreaFormacao::factory()->create()->id;
            },
            'area' => $this->faker->sentence($nbWords = 8, $variableNbWords = true),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (SubArea $subArea){
            //
        })->afterCreating(function (SubArea $subArea){
            //
        });
    }
}

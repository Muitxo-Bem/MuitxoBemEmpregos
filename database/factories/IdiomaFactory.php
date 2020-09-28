<?php

namespace Database\Factories;

use App\Models\Idioma;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IdiomaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Idioma::class;

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
            'idioma' => $this->faker->word,
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Idioma $idioma){
            //
        })->afterCreating(function (Idioma $idioma){
            //
        });
    }
}

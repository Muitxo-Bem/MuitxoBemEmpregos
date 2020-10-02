<?php

namespace Database\Factories;

use App\Models\Curriculo;
use App\Models\AreaFormacao;
use App\Models\SubArea;
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
            'area' => $this->faker->sentence($nbWords = 8, $variableNbWords = true),
        ];
        //subarea em curriculo por questao de erros
    }

    public function configure()
    {
        return $this->afterMaking(function (AreaFormacao $areaFormacao){
            
        })->afterCreating(function (AreaFormacao $areaFormacao){
           
        });
    }
}

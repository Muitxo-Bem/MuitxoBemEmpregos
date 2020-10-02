<?php

namespace Database\Factories;

use App\Models\Idioma;
use App\Models\AreaFormacao;
use App\Models\Curriculo;
use App\Models\SubArea;
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
            'info_adicional' => $this->faker->sentence($nbWords = 8, $variableNbWords = true),
            'experiencia' => $this->faker->sentence($nbWords = 8, $variableNbWords = true),

        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Curriculo $curriculo){
           
        })->afterCreating(function (Curriculo $curriculo){
            $idioma = Idioma::factory()->make();
            $curriculo->idiomas()->save($idioma);//se tiver idioma, save salva no banco de dados

            $area = AreaFormacao::factory()->make();
            $curriculo->areaFormacaos()->save($area);

            $subAreas = SubArea::factory()->count(3)->make();
            $area->subAreas()->saveMany($subAreas);
            
        });
    }
}

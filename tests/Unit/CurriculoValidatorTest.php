<?php

namespace Tests\Unit;

use App\Models\Curriculo;
use App\Validator\ValidationException;
use App\Validator\CurriculoValidator;
use Tests\TestCase;

class CurriculoValidatorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testCurriculoSemInfo(){
        $this->expectException(ValidationException::class);
        $curriculo = Curriculo::factory()->make(['info_adicional' => '']);
        $curriculo->info_adicional = $curriculo->info_adicional;
        CurriculoValidator::validate($curriculo->toArray());
    }
}

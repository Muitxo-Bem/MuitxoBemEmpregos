<?php

namespace Tests\Unit;

use App\Models\VagaEmprego;
use App\Validator\VagaEmpregoValidator;
use App\Validator\ValidationException;
use Tests\TestCase;

class VagaEmpregoValidatorTest extends TestCase
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

    public function testVagaEmpregoSemNome(){
        $this->expectException(ValidationException::class);
        $vagaEmprego = VagaEmprego::factory()->make(['nome' => '']);
        VagaEmpregoValidator::validate($vagaEmprego->toArray());
    }

    public function testVagaEmpregoSemDescricao(){
        $this->expectException(ValidationException::class);
        $vagaEmprego = VagaEmprego::factory()->make(['descricao' => '']);
        VagaEmpregoValidator::validate($vagaEmprego->toArray());
    }

    public function testVagaEmpregoSemLocalDeTrabalho(){
        $this->expectException(ValidationException::class);
        $vagaEmprego = VagaEmprego::factory()->make(['local_de_trabalho' => '']);
        VagaEmpregoValidator::validate($vagaEmprego->toArray());
    }

    public function testVagaEmpregoCorreta(){
        $vagaEmprego = VagaEmprego::factory()->make();
        VagaEmpregoValidator::validate($vagaEmprego->toArray());
        $this->assertTrue(True);
    }

}

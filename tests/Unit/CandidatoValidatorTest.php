<?php

namespace Tests\Unit;

use App\Models\Candidato;
use App\Validator\CandidatoValidator;
use App\Validator\ValidationException;
use Tests\TestCase;

class CandidatoValidatorTest extends TestCase
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

    public function testCandidatoSemNome(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['nome' => '']);
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testNomeCandidatoMenorQueTres(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['nome' => 'ab']);
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testNomeCandidatoMaiorQueCem(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['nome' => 'ensP65JekrmDCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpClJDzYjl30EIhOB6HUE8R2syeVN20']);
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testCandidatoSemCpf(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['cpf' => '']);
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testCpfCandidatoDiferenteDeQuatorze(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['cpf' => '321']);
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testCandidatoSemEmail(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['email' => '']);
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testEmailCandidatoInvalido(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['email' => 'uniuEmail']);
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testCandidatoSemSenha(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['senha' => '']);
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testSenhaCandidatoMenorQueOito(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['senha' => '123321']);
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testSenhaCandidatoMaiorQue64(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['senha' => 'uuuuuuuuuuuuuuuuuuuuuuuuunnnnnnnnnnnnnnnnnnnnnnnnnnnnniiiiiiiiiiiiiiiiiiiiiiiiiiiiiiuuuuuuuuuuuuuuuuuuuuuuuu']);
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testCandidatoCorreto(){
        $candidato = Candidato::factory()->make();
        $candidato->senha_confirmation = $candidato->senha;
        CandidatoValidator::validate($candidato->toArray());    
        $this->assertTrue(True);
    }
}

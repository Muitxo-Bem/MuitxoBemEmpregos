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
        $candidato->senha_confirmation = $candidato->senha;
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testNomeCandidatoMenorQueTres(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['nome' => 'ab']);
        $candidato->senha_confirmation = $candidato->senha;
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testNomeCandidatoMaiorQueCem(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['nome' => 'ensP65JekrmDCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpClJDzYjl30EIhOB6HUE8R2syeVN20']);
        $candidato->senha_confirmation = $candidato->senha;
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testCandidatoSemCpf(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['cpf' => '']);
        $candidato->senha_confirmation = $candidato->senha;
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testCpfCandidatoDiferenteDeQuatorze(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['cpf' => '321']);
        $candidato->senha_confirmation = $candidato->senha;
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testCandidatoSemEmail(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['email' => '']);
        $candidato->senha_confirmation = $candidato->senha;
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testEmailCandidatoInvalido(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['email' => 'uniuEmail']);
        $candidato->senha_confirmation = $candidato->senha;
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testCandidatoSemSenha(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['senha' => '']);
        $candidato->senha_confirmation = $candidato->senha;
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testSenhaCandidatoMenorQueOito(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['senha' => '123321']);
        $candidato->senha_confirmation = $candidato->senha;
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testSenhaCandidatoMaiorQue64(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make(['senha' => 'uuuuuuuuuuuuuuuuuuuuuuuuunnnnnnnnnnnnnnnnnnnnnnnnnnnnniiiiiiiiiiiiiiiiiiiiiiiiiiiiiiuuuuuuuuuuuuuuuuuuuuuuuu']);
        $candidato->senha_confirmation = $candidato->senha;
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testSenhaCandidatoDiferente(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make();
        $candidato->senha_confirmation = '20ashudhausdhiuasha100234';
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testCandidatoCorreto(){
        $candidato = Candidato::factory()->make();
        $candidato->senha_confirmation = $candidato->senha;
        CandidatoValidator::validate($candidato->toArray());    
        $this->assertTrue(True);
    }
}

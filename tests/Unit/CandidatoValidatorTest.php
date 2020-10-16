<?php

namespace Tests\Unit;

use App\Models\Candidato;
use App\Models\User;
use App\Validator\CandidatoValidator;
use App\Validator\UserValidator;
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
        $candidato = Candidato::factory()->make();
        $usr = new User();
        $usr->email = '';
        $usr->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $usr->senha_confirmation = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        UserValidator::validate($usr->toArray());
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testEmailCandidatoInvalido(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make();
        $usr = new User();
        $usr->email = 'erik';
        $usr->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $usr->senha_confirmation = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        UserValidator::validate($usr->toArray());
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testCandidatoSemSenha(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make();
        $usr = new User();
        $usr->email = 'erik@gmail.com';
        $usr->senha = "";
        $usr->senha_confirmation = "";
        UserValidator::validate($usr->toArray());
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testSenhaCandidatoMenorQueOito(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make();
        $usr = new User();
        $usr->email = 'erik@gmail.com';
        $usr->senha = "$2y$";
        $usr->senha_confirmation = "$2y$";
        UserValidator::validate($usr->toArray());
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testSenhaCandidatoMaiorQue64(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make();
        $usr = new User();
        $usr->email = 'erik@gmail.com';
        $usr->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaigi";
        $usr->senha_confirmation = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaigi";
        UserValidator::validate($usr->toArray());
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testSenhaCandidatoDiferente(){
        $this->expectException(ValidationException::class);
        $candidato = Candidato::factory()->make();
        $usr = new User();
        $usr->email = 'erik@gmail.com';
        $usr->senha = "$2ytestesenha";
        $usr->senha_confirmation = "$2ysenhateste";
        UserValidator::validate($usr->toArray());
        CandidatoValidator::validate($candidato->toArray());
    }

    public function testCandidatoCorreto(){
        $candidato = Candidato::factory()->make();
        $usr = new User();
        $usr->email = 'erik@gmail.com';
        $usr->senha = "$2ycorreta";
        $usr->senha_confirmation = "$2ycorreta";
        UserValidator::validate($usr->toArray());
        CandidatoValidator::validate($candidato->toArray());    
        $this->assertTrue(True);
    }
}

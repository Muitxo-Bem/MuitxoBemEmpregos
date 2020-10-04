<?php

namespace Tests\Unit;

use App\Models\Empregador;
use App\Validator\EmpregadorValidator;
use App\Validator\ValidationException;
//use Illuminate\Foundation\Testing\TestCase;
use Tests\TestCase;
//use Tests\CreatesApplication;

class EmpregadorValidatorTest extends TestCase
{
//    use CreatesApplication;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
//    public function testEmpregadorSemNome(){
//        $this->expectException(ValidationException::class);
//        $emp = new Empregador();
//        $emp->nome = '';
//        $emp->cpf ='12345678910';
//        $emp->email = 'erik@gmail.com';
//        $emp->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
//        EmpregadorValidator::validate($emp->toArray());
//    }
//    public function testEmpregadorNomeMaiorQueCem(){
//        $this->expectException(ValidationException::class);
//        $emp = new Empregador();
//        $emp->nome = 'ensP65JekrmDCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpClJDzYjl30EIhOB6HUE8R2syeVN20';
//        $emp->cpf ='12345678910';
//        $emp->email = 'erik@gmail.com';
//        $emp->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
//        EmpregadorValidator::validate($emp->toArray());
//    }
//    public function testEmpregadorNomeMenorQueCinco(){
//        $this->expectException(ValidationException::class);
//        $emp = new Empregador();
//        $emp->nome = 'ana';
//        $emp->cpf ='12345678910';
//        $emp->email = 'erik@gmail.com';
//        $emp->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
//        EmpregadorValidator::validate($emp->toArray());
//    }
    public function testCpfEmpregadorVazio(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'ErikJhonatta';
        $emp->cpf ='';
        $emp->email = 'erik@gmail.com';
        $emp->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        EmpregadorValidator::validate($emp->toArray());
    }
    public function testCpfEmpregadorDiferenteDeOnze(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'ErikJhonatta';
        $emp->cpf ='123';
        $emp->email = 'erik@gmail.com';
        $emp->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        EmpregadorValidator::validate($emp->toArray());
    }
    public function testEmailEmpregadorVazio(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'ErikJhonatta';
        $emp->cpf ='12345678910';
        $emp->email = '';
        $emp->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        EmpregadorValidator::validate($emp->toArray());
    }
    public function testEmailEmpregadorInvalido(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'ErikJhonatta';
        $emp->cpf ='12345678910';
        $emp->email = 'Email';
        $emp->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        EmpregadorValidator::validate($emp->toArray());
    }
    public function testSenhaEmpregadorVazia(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'ErikJhonatta';
        $emp->cpf ='12345678910';
        $emp->email = 'erik@gmail.com';
        $emp->senha = "";
        EmpregadorValidator::validate($emp->toArray());
    }
    public function testSenhaEmpregadorMenorQueOito(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'ErikJhonatta';
        $emp->cpf ='12345678910';
        $emp->email = 'erik@gmail.com';
        $emp->senha = "$2y";
        EmpregadorValidator::validate($emp->toArray());
    }
}

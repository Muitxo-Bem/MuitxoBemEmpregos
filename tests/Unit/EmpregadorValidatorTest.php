<?php

namespace Tests\Unit;

use App\Models\Empregador;
use App\Models\User;
use App\Validator\EmpregadorValidator;
use App\Validator\UserValidator;
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
    public function testEmpregadorCorreto(){

        $emp = new Empregador();
        $emp->nome = 'ErikJhonatta';
        $emp->cpf ='123.456.789-10';
        $usr = new User();
        $usr->email = 'erik@gmail.com';
        $usr->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $usr->senha_confirmation = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        
        UserValidator::validate($usr->toArray());
        EmpregadorValidator::validate($emp->toArray());
        $this->assertTrue(True);
    }
    public function testEmpregadorSemNome(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = '';
        $emp->cpf ='123.456.789-10';
        $usr = new User();
        $usr->email = 'erik@gmail.com';
        $usr->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $usr->senha_confirmation = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        
        UserValidator::validate($usr->toArray());

        EmpregadorValidator::validate($emp->toArray());
    }
    public function testEmpregadorNomeMaiorQueCem(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'ensP65JekrmDCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpCq9CWCK2RnqCc8D5dqpClJDzYjl30EIhOB6HUE8R2syeVN20';
        $emp->cpf ='123.456.789-10';
        $usr = new User();
        $usr->email = 'erik@gmail.com';
        $usr->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $usr->senha_confirmation = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        
        UserValidator::validate($usr->toArray());

        EmpregadorValidator::validate($emp->toArray());
    }
    public function testEmpregadorNomeMenorQueTres(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'an';
        $emp->cpf ='123.456.789-10';
        $usr = new User();
        $usr->email = 'erik@gmail.com';
        $usr->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $usr->senha_confirmation = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        
        UserValidator::validate($usr->toArray());

        EmpregadorValidator::validate($emp->toArray());
    }
    public function testCpfEmpregadorVazio(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'ErikJhonatta';
        $emp->cpf ='';
        $usr = new User();
        $usr->email = 'erik@gmail.com';
        $usr->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $usr->senha_confirmation = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        
        UserValidator::validate($usr->toArray());

        EmpregadorValidator::validate($emp->toArray());
    }
    public function testCpfEmpregadorDiferenteDeOnze(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'ErikJhonatta';
        $emp->cpf ='123';
        $usr = new User();
        $usr->email = 'erik@gmail.com';
        $usr->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $usr->senha_confirmation = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        
        UserValidator::validate($usr->toArray());

        EmpregadorValidator::validate($emp->toArray());
    }
    public function testEmailEmpregadorVazio(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'ErikJhonatta';
        $emp->cpf ='123.456.789-10';

        $usr = new User();
        $usr->email = '';
        $usr->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $usr->senha_confirmation = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        
        UserValidator::validate($usr->toArray());
        EmpregadorValidator::validate($emp->toArray());
    }
    public function testEmailEmpregadorInvalido(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'ErikJhonatta';
        $emp->cpf ='123.456.789-10';
        $usr = new User();
        $usr->email = 'Email';
        $usr->senha = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $usr->senha_confirmation = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        
        UserValidator::validate($usr->toArray());
        EmpregadorValidator::validate($emp->toArray());
    }
    public function testSenhaEmpregadorVazia(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'ErikJhonatta';
        $emp->cpf ='123.456.789-10';
        $usr = new User();
        $usr->email = 'secure@example.net';
        $usr->senha = "";
        $usr->senha_confirmation = "";
        
        UserValidator::validate($usr->toArray());
        EmpregadorValidator::validate($emp->toArray());
    }
    public function testSenhaEmpregadorMenorQueOito(){
        $this->expectException(ValidationException::class);
        $emp = new Empregador();
        $emp->nome = 'ErikJhonatta';
        $emp->cpf ='123.456.789-10';
        $usr = new User();
        $usr->email = 'erik@gmail.com';
        $usr->senha = "$2y$";
        $usr->senha_confirmation = "$2y$";
        
        UserValidator::validate($usr->toArray());
        EmpregadorValidator::validate($emp->toArray());
    }
}

<?php

namespace Tests\Feature;

use App\Models\Empregador;
use App\Models\User;
use App\Models\VagaEmprego;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VagaEmpregoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function inicializarArrayVagaEmprego(){
        $vagaEmprego = VagaEmprego::factory()->make();
        $dados = $vagaEmprego->toArray();
        return $dados;
    }

    public function logarEmpregador(){
        $dados['email'] = 'empregador@vagaemprego.com';
        $dados['password'] = 'password';
        $response = $this->followingRedirects()
                    ->post('login',$dados);
    }
    public function logarCandidato(){
        $dados['email'] = 'candidato@vagaemprego.com';
        $dados['password'] = 'password';
        $response = $this->followingRedirects()
                    ->post('login',$dados);
    }
    
    public function testEditarVaga(){
        $this->post('/logout');
        $this->logarEmpregador();

        $dados['nome'] = 'NovoNomeEditarTeste';
        $response = $this
                    ->followingRedirects()
                    ->put('vagas/1',$dados)
                    ->assertSee('NovoNomeEditarTeste');
    }
    
    public function testCandidatarseVaga(){
        $this->logarCandidato();
        $response = $this
                    ->followingRedirects()
                    ->post('vagas/aplicar/1')
                    ->assertDontSee('Candidatar-se');
    }
    public function testFecharVaga(){//depende do metodo cadastroVagaEmprego no teste de cadastro
        $this->logarEmpregador();
        $response = $this
                    ->followingRedirects()
                    ->post('vagas/close/1')
                    ->assertDontSee('Fechar Vaga');
                    
    }
    
    

}

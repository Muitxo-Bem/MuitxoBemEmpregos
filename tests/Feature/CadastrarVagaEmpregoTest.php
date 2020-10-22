<?php

namespace Tests\Feature;

use App\Models\Candidato;
use App\Models\Empregador;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\VagaEmprego;
use Hash;

class CadastrarVagaEmpregoTest extends TestCase
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
    public function createLogins(){
        $usr = User::factory()->create(['tipo' => 'empregador', 'email' => 'empregador@vagaemprego.com']);
        $emp = Empregador::factory()->make();
        $emp->user_id = $usr->id;
        $emp->save();

        $usr2 = User::factory()->create(['tipo' => 'candidato', 'email' => 'candidato@vagaemprego.com']);
        $cand = Candidato::factory()->make();
        $cand->user_id = $usr2->id;
        $cand->save();
    }
    public function logarEmpregador(){
        $dados['email'] = 'empregador@vagaemprego.com';
        $dados['password'] = 'password';
        $response = $this->followingRedirects()
                    ->post('login',$dados);
    }
    public function testCadastroVagaEmprego(){
        $vagaEmprego = $this->inicializarArrayVagaEmprego();

        $dados = ($vagaEmprego);
        $this->createLogins();
        $this->logarEmpregador();
        $response = $this
            ->followingRedirects()
            ->post('vagas', $dados)
            ->assertSee($dados['nome']);
    }

    public function testCadastroVagaEmpregoSemDescricao(){
        $vagaEmprego = $this->inicializarArrayVagaEmprego();
        $vagaEmprego['descricao'] = '';
        $dados = ($vagaEmprego);
        $this->logarEmpregador();
        $response = $this
            ->followingRedirects()
            ->post('vagas', $dados)
            ->assertSee('A descrição é necessária');
}


}

<?php

namespace Tests\Feature;

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
    public function logar(){
        $usr = User::factory()->create(['tipo' => 'empregador']);
        $emp = Empregador::factory()->make();
        $emp->user_id = $usr->id;
        $emp->save();
        $dados = array_merge($usr->toArray(), $emp->toArray());
        $dados['password'] = 'password';
        $response = $this->followingRedirects()
                    ->post('login',$dados);
    }
    public function testCadastroVagaEmprego(){
        $vagaEmprego = $this->inicializarArrayVagaEmprego();

        $dados = ($vagaEmprego);
        $this->logar();
        $response = $this
            ->followingRedirects()
            ->post('vagas', $dados)
            ->assertSee($dados['nome']);
    }

    public function testCadastroVagaEmpregoSemDescricao(){
        $vagaEmprego = $this->inicializarArrayVagaEmprego();
        $vagaEmprego['descricao'] = '';
        $dados = ($vagaEmprego);
        $response = $this
            ->followingRedirects()
            ->post('vagas', $dados)
            ->assertSee('A descrição é necessária');
}


}

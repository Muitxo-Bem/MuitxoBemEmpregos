<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\VagaEmprego;

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

    public function testCadastroVagaEmprego(){
        $vagaEmprego = $this->inicializarArrayVagaEmprego();

        $dados = ($vagaEmprego);
        $response = $this
            ->followingRedirects()
            ->post('vagas', $dados)
            ->assertSee('Vaga Criada');
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

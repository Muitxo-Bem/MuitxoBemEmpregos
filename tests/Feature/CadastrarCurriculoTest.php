<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Curriculo;
use App\Models\Candidato;

class CadastrarCurriculoTest extends TestCase
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

    public function inicializarArrayCurriculo(){
        $curriculo = Curriculo::factory()->make();
        $dados = $curriculo->toArray();
        return $dados;
    }

    public function inicializarArrayCandidato(){
        $candidato = Candidato::factory()->make();
        $dados = $candidato->toArray();
        $dados['senha_confirmation'] = $dados['senha'];
        return $dados;
    }

    public function testCadastroCurriculo(){
        $curriculo = $this->inicializarArrayCurriculo();
        $candidato = $this->inicializarArrayCandidato();
        $dados = array_merge($curriculo, $candidato);

        $response = $this
            ->followingRedirects()
            ->post('curriculos', $dados)
            ->assertSee('Curriculo Criado');
    }

    public function testCurriculoSemIdCandidato(){
        $curriculo = $this->inicializarArrayCurriculo();
        $curriculo['candidato_id'] = '';
        $dados = ($curriculo);
        $response = $this
            ->followingRedirects()
            ->post('curriculos', $dados)
            ->assertSee('Id de candidato Vazio');
    }
}
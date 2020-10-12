<?php

namespace Tests\Feature;

use App\Models\AreaFormacao;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Curriculo;
use App\Models\Candidato;
use App\Models\Idioma;

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
        $curriculo = $curriculo->toArray();
        
        $idioma = Idioma::factory()->make();
        $idioma = $idioma->toArray();

        $areaFormacao = AreaFormacao::factory()->make();
        $areaFormacao = $areaFormacao->toArray();

        $dados= array_merge($curriculo,$idioma,$areaFormacao);

        return $dados;
    }

    public function inicializarArrayCandidato(){
        $candidato = Candidato::factory()->make();
        $dados = $candidato->toArray();
        $dados['senha_confirmation'] = $dados['senha'];
        return $dados;
    }

    public function testCadastroCurriculo(){ // Verificar esse teste
        $curriculo = $this->inicializarArrayCurriculo();
        $curriculo['candidato_id'] = Candidato::factory()->create()->id; //Salva um Candidato no Banco
        $response = $this
            ->followingRedirects()
            ->post('curriculos', $curriculo)
            ->assertSee($curriculo['idioma']);
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

    public function testCurriculoSemInfoAdicional(){
        $curriculo = $this->inicializarArrayCurriculo();
        $curriculo['info_adicional'] = '';
        $dados = ($curriculo);
        $response = $this
            ->followingRedirects()
            ->post('curriculos', $dados)
            ->assertSee('Campo Informações Adicionais não pode estar vazio');
    }

    public function testCurriculoSemExperiencia(){
        $curriculo = $this->inicializarArrayCurriculo();
        $curriculo['experiencia'] = '';
        $dados = ($curriculo);
        $response = $this
            ->followingRedirects()
            ->post('curriculos', $dados)
            ->assertSee('Campo Experiência não pode estar vazio');
    }
}
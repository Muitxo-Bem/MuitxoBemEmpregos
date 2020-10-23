<?php

namespace Tests\Feature;

use App\Models\AreaFormacao;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Curriculo;
use App\Models\Candidato;
use App\Models\Idioma;
use App\Models\User;
use Hash;

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
        
        $idioma = Idioma::factory()->make(['idioma' => 'Inglês']);
        $idioma = $idioma->toArray();

        $areaFormacao = AreaFormacao::factory()->make();
        $areaFormacao = $areaFormacao->toArray();

        $dados= array_merge($curriculo,$idioma,$areaFormacao);

        return $dados;
    }
    public function logar(){
        $usr = User::factory()->create(['tipo' => 'candidato']);
        $cand = Candidato::factory()->make();
        $cand->user_id = $usr->id;
        $cand->save();
        $dados = array_merge($usr->toArray(), $cand->toArray());
        $dados['password'] = 'password';
        $response = $this->followingRedirects()
                    ->post('login',$dados);
        return $usr->id;
    }
    public function inicializarArrayCandidato(){
        $candidato = Candidato::factory()->make()->toArray();
        $usr = User::factory()->make();
        $usr['senha'] = 'password';
        $usr->senha_confirmation = $usr['senha'];
        return array_merge($candidato,$usr->toArray());
    }

    public function testCadastroCurriculo(){ // Verificar esse teste
        $curriculo = $this->inicializarArrayCurriculo();
        $candidato = $this->logar();
        $response = $this
            ->followingRedirects()
            ->post(route('curriculos.store',$candidato), $curriculo)
            ->assertDontSeeText('Informações do curriculo');
    }

    public function testCurriculoSemInfoAdicional(){
        $curriculo = $this->inicializarArrayCurriculo();
        $candidato = $this->logar();
        $curriculo['info_adicional'] = '';
        $dados = ($curriculo);
        $response = $this
            ->followingRedirects()
            ->post(route('curriculos.store',$candidato), $dados)
            ->assertSee('Campo Informações Adicionais não pode estar vazio');
    }

    public function testCurriculoSemExperiencia(){
        $curriculo = $this->inicializarArrayCurriculo();
        $candidato = $this->logar();

        $curriculo['experiencia'] = '';
        $dados = ($curriculo);
        $response = $this
            ->followingRedirects()
            ->post(route('curriculos.store',$candidato), $dados)
            ->assertSee('Campo Experiência não pode estar vazio');
    }
}
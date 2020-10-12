<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Candidato;
use App\Models\Endereco;
use App\Models\Telefone;

class CadastrarCandidatoTest extends TestCase
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

    public function inicializarArrayCandidato(){
        $candidato = Candidato::factory()->make();
        $dados = $candidato->toArray();
        $dados['senha_confirmation'] = $dados['senha'];
        return $dados;
    }

    public function inicializarArrayTelefone(){
        $telefone = Telefone::factory()->make();
        $dados = $telefone->toArray();
        $dados['telefone_primario'] = '65456545678';
        $dados['telefone_secundario'] = '65456545678';
        return $dados;
    }

    public function inicializarArrayEndereco(){
        $endereco = Endereco::factory()->make();
        $dados = $endereco->toArray();
        $dados['rua'] = 'Pedro Alves da Silva';
        $dados['cidade'] = 'Ibimirim';
        return $dados;
    }

    public function testCadastroCandidato(){
        $candidato = $this->inicializarArrayCandidato();
        $telefone = $this->inicializarArrayTelefone();
        $endereco = $this->inicializarArrayEndereco();
        $dados = array_merge($candidato, $telefone, $endereco);
        $response = $this
                    ->followingRedirects()
                    ->post('candidatos', $dados)
                    ->assertSee('Bem Vindo'); //redirect de Bruno, tá indo pra pagina de show
    }

    public function testCadastroCandidatoIncompleto(){
        $candidato = $this->inicializarArrayCandidato();
        $candidato['nome'] = '';
        $telefone = $this->inicializarArrayTelefone();
        $endereco = $this->inicializarArrayEndereco();  
        $dados = array_merge($candidato, $telefone, $endereco);
        $response = $this
                    ->followingRedirects()
                    ->post('candidatos', $dados)
                    ->assertSee('O campo Nome é obrigatório e deve ter entre 3 e 100 caracteres');
    }
}

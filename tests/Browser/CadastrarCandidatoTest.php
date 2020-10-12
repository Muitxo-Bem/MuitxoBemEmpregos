<?php

namespace Tests\Browser;

use App\Models\Candidato;
use App\Models\Endereco;
use App\Models\Telefone;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CadastrarCandidatoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCadastrarCandidato()
    {
        // $candidato = Candidato::find(random_int(1,25));
        // $telefone = Telefone::where('candidato_id', '=', $candidato->id)->get();
        // $endereco = Endereco::where('candidato_id', '=', $candidato->id)->get();

        $this->browse(function (Browser $browser) {
            $browser->visit('/candidatos/create')
                    ->type('nome', 'Bruno Diniz') //$candidato->nome
                    ->type('cpf', '123.123.321-32') //$candidato->cpf
                    ->type('email', 'uniu@gmail.com') //$candidato->email
                    ->type('senha', 'testando123') //$candidato->senha
                    ->type('senha_confirmation', 'testando123') //$candidato->senha
                    ->type('telefone_primario', '12312312312') //$telefone->telefone_primario
                    ->type('telefone_secundario', '12312312312') //$telefone->telefone_secundario
                    ->type('rua', 'Rua Pedro Alves da Silva') //$endereco->rua
                    ->type('bairro', 'Boa Vista') //$endereco->bairro
                    ->type('numero', '293') //$endereco->numero
                    ->type('cep', '44420-123') //$endereco->cep
                    ->select('estado', 'PE') //$endereco->estado
                    ->type('cidade', 'Ibimirim') //$endereco->cidade
                    ->press('Cadastrar')
                    ->screenshot('Cadastro Candidato')
                    ->assertSee('Bem vindo');
        });
    }
}

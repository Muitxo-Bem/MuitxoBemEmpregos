<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CadastrarVagaEmpregoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    //rodar artisan test antes do dusk
    public function testCadastrarVagaEmprego()//N mudar esse nome, pq esse teste roda primeiro do que o candidatar-se
    {                                         //To usando essa vaga que é criada aqui pra testar lá
                                              //Depois to fechando ela
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'empregador@vagaemprego.com')
                ->type('password', 'password')
                ->press('Login')
                ->pause(1000)
                ->screenshot('LogadoEmpregador');
        
            $browser->visit('/vagas/create')
            ->type('nome', 'dev backend')
            ->type('descricao', 'dev frontend')
            ->type('quantidade_de_vagas', '10')
            ->type('local_de_trabalho', 'jupi') //$candidato->senha
            ->type('requisitos', 'mt coragem de vir em jupi')
            ->type('faixa_salarial', '10') //$telefone->telefone_secundario
            ->type('diferenciais', 'qualquer coisa') //$endereco->rua
            ->press('Cadastrar')
            ->screenshot('Cadastro VagaEmprego')
            ->assertSee('Local de Trabalho');
});
}}
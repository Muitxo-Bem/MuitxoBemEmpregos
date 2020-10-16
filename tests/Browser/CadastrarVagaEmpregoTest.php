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
    public function testCadastrarVagaEmprego()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'dusk@dusk.com')
                ->type('password', '123456789')
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
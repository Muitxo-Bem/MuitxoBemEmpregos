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
        $browser->visit('/vagas/create')
            ->type('empregador_id', '01')
            ->type('nome', 'dev backend')
            ->type('descricao', 'dev frontend')
            ->type('quantidade_de_vagas', '10')
            ->type('local_de_trabalho', 'jupi') //$candidato->senha
            ->type('requisitos', 'mt coragem de vir em jupi')
            ->type('faixa_salarial', '10') //$telefone->telefone_secundario
            ->type('diferenciais', 'qualquer coisa') //$endereco->rua
            ->press('Cadastrar')
            ->screenshot('Cadastro VagaEmprego')
            ->assertSee('Vaga Criada');
});
}}

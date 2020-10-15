<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CadastrarCurriculoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    public function testCadastrarCurriculo()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/curriculos/create')
                    ->type('candidato_id', '001') //$curriculo->candidato_id
                    ->type('info_adicional', 'Familiar com métodos de desenvolvimento ágil') //$curriculo->info_adicional
                    ->type('experiencia', 'Três anos de experiência na NASA') //$curriculo->experiencia
                    ->type('idioma', 'Português, Mandarim') //$curriculo->idioma
                    ->type('area', 'Universidade Federal do Agreste de Pernambuco, UFAPE. Ciência da Computação') //$curriculo->areaFormacao
                    ->press('Finalizar')
                    ->screenshot('Cadastro Curriculo')
                    ->assertSee('Português');
        });
    }
}

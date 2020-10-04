<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CadastrarEmpregador extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/empregadores/create')->assertTitle('Empregador Create')
            ->type('nome','DuskTest')->type('cpf','111.111.111-11')
                ->type('email','dusk@dusk.com')
                ->type('senha','123456789')
                ->type('senha_confirmation','123456789')
                ->type('telefone_primario','11111111111')
                ->type('telefone_secundario','11111111111')
                ->press('Cadastrar')
                ->screenshot('Cadastro Empregador')
                ->pause(1000)->assertSee('Empregador cadastrado');

        });
    }
}

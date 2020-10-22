<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CandidatarVagaEmpregoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    //rodar artisan test antes do dusk
    public function testCandidatarVagaEmprego(){
        $this->browse(function (Browser $browser){
            $browser->visit('login')
            ->type('email', 'candidato@vagaemprego.com')
            ->type('password', 'password')
            ->press('Login');
            
            $browser->visit('/vagas/2')
            ->press('Candidatar-se')
            ->assertDontSee('Candidatar-se')
            ->screenshot('Candidatar-se');
            
        });
    }
}

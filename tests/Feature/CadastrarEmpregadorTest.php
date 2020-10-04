<?php

namespace Tests\Feature;

use App\Models\Empregador;
use App\Models\Telefone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CadastrarEmpregadorTest extends TestCase
{

    public function inicializarEmpregador(){
        return ['nome'=>"ErikJhonattaTest",
                'cpf'=>'987.654.321-00',
                'email' => 'secure@example.org',
                'senha' => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi"
        ];
    }
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testCadastroEmpregador(){

        $empNew = $this->inicializarEmpregador();
        $telNew = Telefone::factory()->make(['telefone_primario'=>'12345678910',
                                             'telefone_secundario'=>'12345678910',
        ]                       )->toArray();
        $dados = array_merge($empNew,$telNew);
        $response = $this->post('/empregadores/create',$dados)->assertSee('Empregador cadastrado');

    }
}

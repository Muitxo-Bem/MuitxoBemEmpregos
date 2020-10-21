    <?php

use Illuminate\Support\Facades\Route;
use App\Models\VagaEmprego;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('/');
Route::get('debug', function (){
    $a = \App\Models\Empregador::factory()->make();
//    return $a;
    return \App\Validator\EmpregadorValidator::validate($a->toArray());
});
Route::resource('candidatos','App\Http\Controllers\CandidatoController');
Route::resource('enderecos','App\Http\Controllers\EnderecoController');
Route::resource('telefones','App\Http\Controllers\TelefoneController');
Route::resource('empregadores','App\Http\Controllers\EmpregadorController');
Route::resource('vagas','App\Http\Controllers\VagaEmpregoController');
Route::resource('portfolios','App\Http\Controllers\PortfolioController');
Route::resource('curriculos','App\Http\Controllers\CurriculoController');
Route::resource('area_formacaos','App\Http\Controllers\AreaFormacaoController');


Route::post('vagas/close/{vaga}','App\Http\Controllers\VagaEmpregoController@close')->name('vagas.close');

Route::post('vagas/aplicar/{vaga}','App\Http\Controllers\VagaEmpregoController@candidatar')->name('vagas.candidatar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sobre',function(){
    return 'Sobre';
})->name('sobre');
    <?php

use Illuminate\Support\Facades\Route;

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
});
Route::get('debug', function (){
    \App\Models\Candidato::factory()->count(4)->create();
    return \App\Models\Candidato::all();
});
Route::resource('candidatos','App\Http\Controllers\CandidatoController');
Route::resource('enderecos','App\Http\Controllers\EnderecoController');
Route::resource('telefones','App\Http\Controllers\TelefoneController');
Route::resource('empregadores','App\Http\Controllers\EmpregadorController');
Route::resource('vagas','App\Http\Controllers\VagaEmpregoController');

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['rua', 'bairro','numero','cep','estado','cidade'];

    public static $rules = [   'rua' => array('required','regex:/^[\pL\s]+$/u'),
                               'bairro' => array('required','regex:/^[\pL\s]+$/u'),
                               'numero' => array('required','regex:/^(([0-9]+)\-([A-Z]|[a-z])|[0-9]+)/'),
                               'cep' => array('required','regex:/^\d{5}-\d{3}/'),
                               'estado' => array('required','regex:/^(AC|AL|AM|AP|BA|CE|DF|ES|GO|MA|MG|MS|MT|PA|PB|PE|PI|PR|RJ|RN|RO|RR|RS|SC|SE|SP|TO)/'),
                               'cidade' => array('required','regex:/^[\pL\s]+$/u'),
                            ];

    public static $messages = [   'rua.required' => "O campo rua é obrigatório",
                                  'rua.regex' => 'Rua Inválida',
                                  'bairro.required'=>'O campo bairro é obrigatório',
                                  'bairro.alpha'=>'Nome do bairro é inválido',
                                  'numero.required' => 'O campo número é obrigatório',
                                  'numero.regex' => 'Número Inválido',
                                  'cep.required' => 'O campo CEP é obrigatório',
                                  'cep.regex' => "Cep Inválido",
                                  'estado.required' => 'O campo estado é obrigatório, selecione um estado',
                                  'estado.regex' => "Estado Invalido (UF)",
                                  'cidade.required' => 'O campo cidade é obrigatório ',
                                  'cidade.alpha' => "Cidade Invalida",
                                 ];

    public function dono(){
        return $this->belongsTo('App\Models\Candidato','candidato_id');
    }

}

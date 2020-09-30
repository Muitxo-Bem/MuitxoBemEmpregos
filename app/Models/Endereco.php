<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['candidato_id','bairro','numero','cep','estado','cidade','rua'];

    public static $rules = ['candidato_id' => 'required',
                               'bairro' => array('required','regex:/^[\pL\s]+$/u'),
                               'numero' => array('required','regex:/^([0-9]+)\-([A-Z]|[a-z])/'),
                               'cep' => array('required','regex:/^\d{5}-\d{3}/'),
                               'estado' => array('required','regex:/^(AC|AL|AM|AP|BA|CE|DF|ES|GO|MA|MG|MS|MT|PA|PB|PE|PI|PR|RJ|RN|RO|RR|RS|SC|SE|SP|TO)/'),
                               'cidade' => array('required','regex:/^[\pL\s]+$/u'),
                               'rua' => array('required','regex:/^[\pL\s]+$/u'),
                              ];

    public static $messages = ['candidato_id.*'=>'Id do candidato Vazia',
                                  'bairro.required'=>'Bairro Vazio',
                                  'bairro.alpha'=>'Nome de Bairro Invalido',
                                  'numero.required' => 'Numero Vazio',
                                  'numero.regex' => 'Numero Inválido',
                                  'cep.required' => 'Cep Vazio',
                                  'cep.regex' => "Cep Inválido",
                                  'estado.required' => 'Estado Vazio (UF)',
                                  'estado.regex' => "Estado Invalido (UF)",
                                  'cidade.required' => 'Cidade Vazia',
                                  'cidade.alpha' => "Cidade Invalida",
                                  'rua.required' => "Rua vazia",
                                  'rua.regex' => 'Rua Inválida',
                                 ];

    public function dono(){
        return $this->belongsTo('App\Models\Candidato','candidato_id');
    }

}

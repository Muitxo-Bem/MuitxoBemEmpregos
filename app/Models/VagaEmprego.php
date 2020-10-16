<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VagaEmprego extends Model
{
    use HasFactory;

    protected $table = 'vaga_empregos';
    protected $fillable = ['ativa','faixa_salarial','requisitos','descricao',
                           'local_de_trabalho','nome','diferenciais','quantidade_de_vagas'];
    public static $rules = ['faixa_salarial' => 'regex:/^\d+(\.\d{1,2})?$/',
                            'requisitos' => 'required',
                            'descricao' => 'required',
                            'local_de_trabalho' => 'required',
                            'nome' => 'required',
                            'quantidade_de_vagas' => 'required|integer'];
    public static $messages = ['faixa_salarial.*' => "Faixa Salarial Inválida",
                               'requisitos.*' => 'Requisitos são necessários',
                               'descricao.*'=> 'A descrição é necessária',
                               'local_de_trabalho.*' => 'Local de Trabalho é necessário',
                               'nome.*' => "Nome da Vaga é necessário",
                               'quantidade_de_vagas.required'=>"A quantidade de vagas é necessária",
                               'quantidade_de_vagas.integer'=>"A quantidade de vagas deve ser um número inteiro não negativo",];


    public function aplicacoes(){
        return $this->belongsToMany('App\Models\Candidato','candidato_vaga_empregos','vaga_id','candidato_id');
    }

    public function empregador(){
        return $this->belongsTo('App\Models\Empregador','empregador_id');
        // return $this->belongsTo('App\Models\Empregador','empregador_id','vaga_id','candidato_id');
    }
}

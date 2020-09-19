<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VagaEmprego extends Model
{
    use HasFactory;

    protected $fillable = ['ativa','faixa_salarial','requisitos','descricao','empregador_id','local_de_trabalho','nome','diferenciais','quantidade_de_vagas'];

    public function aplicacoes(){
        return $this->belongsToMany('App\Models\Candidato','candidato_vaga_empregos');
    }

    public function empregador(){
        return $this->belongsTo('App\Models\Empregador','empregador_id','vaga_id','candidato_id');
    }
}

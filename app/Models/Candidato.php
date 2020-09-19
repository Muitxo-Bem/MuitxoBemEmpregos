<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = ['nome','cpf','email','senha'];

    protected $hidden = ['senha'];

    public function endereco(){
        return $this->hasOne('App\Models\Endereco');
    }

    public function telefones(){
        return $this->hasMany('App\Models\Telefone');
    }

    public function vagaEmpregos(){
        return $this->belongsToMany('App\Models\VagaEmprego','candidato_vaga_empregos','candidato_id','vaga_id');
    }
}

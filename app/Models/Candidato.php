<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = ['nome','cpf','user_id'];

    //protected $hidden = ['senha'];

    public static $rules =  [
                            'nome' => 'required|min:3|max:100',
                            'cpf' => 'required|min:14|max:14',
                            ];

    public static $messages = [
                              'nome.*' => 'O campo Nome é obrigatório e deve ter entre 3 e 100 caracteres',
                              'cpf.*' => 'O campo CPF é obrigatório e deve conter 14 digitos, incluindo os pontos e o hífen',
                              ];
    
    public function telefones(){
        return $this->hasMany('App\Models\Telefone');
    }
    
        public function endereco(){
        return $this->hasOne('App\Models\Endereco');
    }

    public function vagaEmpregos(){
        return $this->belongsToMany('App\Models\VagaEmprego','candidato_vaga_empregos','candidato_id','vaga_id');
    }

    public function curriculo(){
        return $this->hasOne('App\Models\Curriculo');
    }

    public function portfolio(){
        return $this->hasOne('App\Models\Portfolio');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}

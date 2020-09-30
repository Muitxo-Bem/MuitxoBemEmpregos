<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = ['nome','cpf','email','senha'];

    protected $hidden = ['senha'];

    public static $rules =  [
                            'nome' => 'required|min:5|max:100',
                            'cpf' => 'required|digits:11',
                            'email' => 'required|email',
                            'senha' => 'required|min:8', //Confirmação de password? Usar confirmed
                            ];

    public static $messages = [
                              'nome.*' => 'O campo Nome é obrigatório e deve ter entre 5 e 100 caracteres',
                              'cpf.*' => 'O campo CPF é obrigatório e deve conter 11 digitos',
                              'email.*' => 'O campo Email é obrigatório e deve ser válido',
                              'senha.*' => 'O campo Senha é obrigatório e deve conter no mínimo 8 caracteres',
                              ];

    public function endereco(){
        return $this->hasOne('App\Models\Endereco');
    }

    public function telefones(){
        return $this->hasMany('App\Models\Telefone');
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
}

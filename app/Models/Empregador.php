<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Empregador extends Model
{
    use HasFactory;

    protected $fillable = ['nome','cpf','user_id'];

    public static $rules =  [
                            'nome' => 'required|min:3|max:100',
                            'cpf' => 'required|min:14|max:14',
                            ];

    public static $messages = [
                              'nome.*' => 'O campo Nome é obrigatório e deve ter entre 3 e 100 caracteres',
                              'cpf.*' => 'O campo CPF é obrigatório e deve conter 14 caracteres',
                              ];

    public function telefones(){
        return $this->hasMany('App\Models\Telefone');
    }
    public function vagas(){
        return $this->hasMany('App\Models\VagaEmprego');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}

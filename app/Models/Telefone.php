<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    protected $fillable = ['telefone_primario','telefone_secundario'];

    public static $rules = ['telefone_primario' => 'required|digits:11',
                            'telefone_secundario' => 'digits:11',
    ];
    public static $messages = ['telefone_primario.*' => 'O telefone primário é obrigatório e precisa ter 11 digitos',
                               'telefone_secundario.*' => 'O telefone secundário precisa ter 11 digitos',
];
    #checar se empregador ou candidato e nulo, e retornar o outro
    public function dono(){
        return $this->belongsTo('App\Models\Candidato','candidato_id');
    }
}

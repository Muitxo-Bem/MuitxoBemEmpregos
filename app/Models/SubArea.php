<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{
    use HasFactory;

    protected $fillable = ['area_formacao_id','nome'];

    public static $rules = ['area_formacao_id' => 'required',
        'nome' => 'required|min:5|max:30',
    ];

    public static $messages = ['area_formacao_id.*'=>'Id da área de formação Vazia',
        'nome' => 'O campo nome é obrigatório e deve ter entre 5 e 30 caracteres'
    ];

    public function dono(){
        return $this->belongsTo('App\Models\AreaFormacao','area_formacao_id');
    }
}

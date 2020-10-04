<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    protected $fillable = ['Nome'];

    public static $rules = ['curriculo_id' => 'required',
                            'nome' => 'required|min:5|max:30',
                            ];

    public static $messages = ['curriculo_id.*'=>'Id do curriculo Vazia',
                                'nome' => 'O campo nome é obrigatório e deve ter entre 5 e 30 caracteres'
        ];

    public function dono(){
        return $this->belongsTo('App\Models\Curriculo','curriculo_id');
    }
}

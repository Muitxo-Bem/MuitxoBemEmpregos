<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    use HasFactory;
    protected $fillable = ['info_adicional', 'experiencia'];

    public static $rules = ['info_adicional'=>'required',
                            'experiencia'=>'required',
                            ];
    public static $messages = [
                            'info_adicional.*'=>'Campo Informações Adicionais não pode estar vazio',
                            'experiencia.*'=>'Campo Experiência não pode estar vazio',
                            ];

    public function idiomas(){
        return $this->hasMany('App\Models\Idioma');
    }

    public function areaFormacaos(){
        return $this->hasMany('App\Models\AreaFormacao');
    }

    public function dono(){
        return $this->belongsTo('App\Models\Candidato', 'candidato_id');
    }
}

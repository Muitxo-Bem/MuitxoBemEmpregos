<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    use HasFactory;

    public function idiomas(){
        return $this->hasMany('App\Models\Idioma');
    }

    public function areaFormacaos(){
        return $this->hasMany('App\Models\AreaFormacao');
    }

    public function dono(){
        return $this->belongsTo('App\Models\Candidato', 'candidato_id', 'curriculo_id');
    }
}

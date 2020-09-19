<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaFormacao extends Model
{
    use HasFactory;

    public function subAreas(){
        return $this->hasMany('App\Models\SubArea');
    }

    public function dono(){
        return $this->belongsTo('App\Models\Curriculo', 'curriculo_id', 'area_formacao_id');
    }
}

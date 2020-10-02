<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaFormacao extends Model
{
    use HasFactory;
    protected $table = 'area_formacaos';
    protected $fillable = ['curriculo_id','area'];

    public static $rules = [
                       'curriculo_id'=>'required',
                       'area'=>'required'
                       ];
    
    public static $messages = [
                          'curriculo_id.*'=>'Id do curriculo inválido',
                          'area.*'=>'Area de formação inválida'
                          ];

    public function subAreas(){
        return $this->hasMany('App\Models\SubArea');
    }

    public function dono(){
        return $this->belongsTo('App\Models\Curriculo', 'curriculo_id');
    }
}

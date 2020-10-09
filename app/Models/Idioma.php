<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    protected $fillable = ['curriculo_id', 'idioma'];

    public static $rules = ['idioma' => 'required|min:5|max:30',];

    public static $messages = ['idioma' => 'O campo nome é obrigatório e deve ter entre 5 e 30 caracteres',];

    public function dono(){
        return $this->belongsTo('App\Models\Curriculo','curriculo_id');
    }
}

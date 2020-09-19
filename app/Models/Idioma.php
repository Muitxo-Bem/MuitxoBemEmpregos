<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    protected $fillable = ['Nome'];

    public function dono(){
        return $this->belongsTo('App\Models\Curriculo','curriculo_id');
    }
}

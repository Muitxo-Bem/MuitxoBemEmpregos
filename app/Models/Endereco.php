<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['candidato_id','bairro','numero','cep','estado','cidade','rua'];

    public function dono(){
        return $this->belongsTo('App\Models\Candidato','candidato_id');
    }

}

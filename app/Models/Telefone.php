<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    protected $fillable = ['empregador_id','candidato_id','telefone_primario','telefone_secundario'];

    #checar se empregador ou candidato e nulo, e retornar o outro
    public function dono(){
        return $this->belongsTo('App\Models\Candidato','candidato_id');
    }
}

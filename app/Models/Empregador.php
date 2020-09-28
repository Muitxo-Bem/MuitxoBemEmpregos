<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empregador extends Model
{
    use HasFactory;

    protected $fillable = ['nome','cpf','email','senha'];

    protected $hidden = ['senha'];

    public function telefones(){
        return $this->hasMany('App\Models\Telefone');
    }
}

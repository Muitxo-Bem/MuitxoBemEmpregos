<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{
    use HasFactory;

    protected $fillable = ['area_formacao_id','nome'];

    public function dono(){
        return $this->belongsTo('App\Models\AreaFormacao','area_formacao_id');
    }
}

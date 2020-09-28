<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['candidato_id','link'];

    public function dono(){
        return $this->belongsTo('App\Models\Candidato','candidato_id');
    }
}

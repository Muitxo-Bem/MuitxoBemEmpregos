<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Curriculo;
use App\Models\Candidato;
use Illuminate\Auth\Access\HandlesAuthorization;

class CurriculoPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Candidato $candidato)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'candidato' and $candidato->curriculo !=NULL){
            return False;
        }
        else{
            return True;
        }
    }
}
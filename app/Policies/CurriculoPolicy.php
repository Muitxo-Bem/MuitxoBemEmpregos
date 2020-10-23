<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Curriculo;
use App\Models\Candidato;
use Illuminate\Auth\Access\HandlesAuthorization;

class CurriculoPolicy
{
    use HandlesAuthorization;

    public function editCurriculoCheck(User $user, Curriculo $curriculo)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'candidato' and \Auth::user()->candidato->curriculo->id == $curriculo->id){
            return True;
        }
        else{
            return False;
        }
    }
}
<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Auth\Access\HandlesAuthorization;

class PortfolioPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Candidato $candidato)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'candidato' and $candidato->portfolio !=NULL){
            return False;
        }
        else{
            return True;
        }
    }
}
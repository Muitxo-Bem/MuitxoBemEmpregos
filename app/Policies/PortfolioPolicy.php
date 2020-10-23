<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Auth\Access\HandlesAuthorization;

class PortfolioPolicy
{
    use HandlesAuthorization;

    public function editPortfolioCheck(User $user, Portfolio $portfolio)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'candidato' and \Auth::user()->candidato->portfolio->id == $portfolio->id){
            return True;
        }
        else{
            return False;
        }
    }
}
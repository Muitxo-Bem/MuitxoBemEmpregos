<?php

namespace App\Policies;

use App\Models\Empregador;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpregadorPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $user, Empregador $empregador)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'empregador' and $empregador->user_id == \Auth::user()->id){
            return True;
        }
        return False;
    }

    public function vagaEmpregoCheck(User $user, Empregador $empregador)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'empregador' and \Auth::user()->empregador->vagaEmprego !=NULL){
            return False;
        }
        else{
            return True;
        }
    }

    public function listarVagasCheck(User $user, Empregador $empregador)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'empregador' and \Auth::user()->empregador->vagaEmprego !=NULL){
            return False;
        }
        else{
            return True;
        }
    }
}

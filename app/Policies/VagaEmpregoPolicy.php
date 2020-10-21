<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VagaEmprego;
use Illuminate\Auth\Access\HandlesAuthorization;

class VagaEmpregoPolicy
{
    use HandlesAuthorization;

   
    public function create(User $user)
    {
        return \Auth::user()->tipo == 'empregador';
    }

    public function update(User $user, VagaEmprego $vagaEmprego)
    {
        if(\Auth::user()->tipo == 'empregador' and $vagaEmprego->empregador->user_id == \Auth::user()->id){
            return True;
        }
        return False;
    }

    public function delete(User $user, VagaEmprego $vagaEmprego)
    {
        if(\Auth::user()->tipo == 'empregador' and $vagaEmprego->empregador->user_id == \Auth::user()->id){
            return True;
        }
        return False;
    }

    public function showEmpregador(User $user, VagaEmprego $vagaEmprego){
        
    }
    public function showCandidato(User $user, VagaEmprego $vagaEmprego){

    }

  
}

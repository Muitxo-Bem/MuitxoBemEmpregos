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
    public function close(User $user,VagaEmprego $vaga){
        if(\Auth::user()->tipo == 'empregador' and $vaga->empregador->user_id == \Auth::user()->id and $vaga->ativa == 1){
            return True;
        }
        return False;
    }
    public function verAplic(User $user, VagaEmprego $vaga){
        return \Auth::user()->tipo == 'empregador' and $vaga->empregador->user_id == \Auth::user()->id;
    }
    
    public function candidatar(User $user, VagaEmprego $vaga){
        if(\Auth::check() and \Auth::user()->tipo == 'candidato' and $vaga->ativa == 1 and !$vaga->aplicacoes()->get()->contains(\Auth::user()->candidato)){
            return True;
        }
        return False;
    }
    
    public function update(User $user, VagaEmprego $vagaEmprego)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'empregador' and $vagaEmprego->empregador->user_id == \Auth::user()->id
            and $vagaEmprego->aplicacoes->count() == 0
        ){
            return True;
        }
        return False;
    }

    public function delete(User $user, VagaEmprego $vagaEmprego)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'empregador' and $vagaEmprego->empregador->user_id == \Auth::user()->id
            and is_null($vagaEmprego->aplicacoes)
        ){
            return True;
        }
        return False;
    }

    public function verVagaDeslogado(User $user, VagaEmprego $vagaEmprego){
        if((!\Auth::check()) and $vagaEmprego->ativa == 0){
            return False;
        }
        return True;
    }
    public function verVaga(User $user,VagaEmprego $vagaEmprego){
        if(\Auth::check() and \Auth::user()->tipo == 'empregador' and $vagaEmprego->empregador->user_id == \Auth::user()->id){
            return True;
        }
        elseif(\Auth::check() and \Auth::user()->tipo == 'candidato' and $vagaEmprego->ativa == 1){
            return True;
        }
        return False;
    }


  
}

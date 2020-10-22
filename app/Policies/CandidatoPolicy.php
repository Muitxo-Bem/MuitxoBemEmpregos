<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Candidato;
use Illuminate\Auth\Access\HandlesAuthorization;

class CandidatoPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Candidato $candidato)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'candidato' and $candidato->user_id == \Auth::user()->id){
            return True;
        }
        return False;
    }

    public function curriculoCheck(User $user, Candidato $candidato)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'candidato' and \Auth::user()->candidato->curriculo !=NULL){
            return False;
        }
        else{
            return True;
        }
    }

    public function adicionarCurriculoCheck(User $user, Candidato $candidato)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'candidato' and \Auth::user()->candidato->curriculo !=NULL){
            return False;
        }
        else{
            return True;
        }
    }

    public function verCurriculoCheck(User $user, Candidato $candidato)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'candidato' and \Auth::user()->candidato->curriculo !=NULL){
            return True;
        }
        else{
            return False;
        }
    }

    public function portfolioCheck(User $user, Candidato $candidato)
    {
        if(\Auth::check() and \Auth::user()->tipo == 'candidato' and \Auth::user()->candidato->portfolio !=NULL){
            return False;
        }
        else{
            return True;
        }
    }

    public function apagarCandidato(User $user, Candidato $candidato){
        if(\Auth::check() and \Auth::user()->tipo == 'candidato' and $candidato->user_id == \Auth::user()->id){
            return True;
        }else{
            return False;
        }
    }
}
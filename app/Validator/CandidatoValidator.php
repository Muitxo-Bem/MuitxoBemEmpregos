<?php

namespace App\Validator;

use Validator;

class CandidatoValidator{

    public static function validate($data){
        $validatorCandidato = \Validator::make($data, \App\Models\Candidato::$rules, \App\Models\Candidato::$messages);
        //dd($validatorCandidato->errors());
        //dd($data);
        if(!$validatorCandidato->errors()->isEmpty())
            throw new ValidationException($validatorCandidato, "Erro na validação do Candidato");

        return $validatorCandidato;
    }
}
<?php

namespace App\Validator;

use Validator;

class CandidatoValidator{

    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\Candidato::$rules, \App\Models\Candidato::$messages);

        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Candidato");
        return $validator;
    }
}
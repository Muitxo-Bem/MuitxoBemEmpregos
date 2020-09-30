<?php

namespace App\Validator;

class EmpregadorValidator{

    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\Empregador::$rules, \App\Models\Empregador::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Candidato");
        return $validator;
    }
}
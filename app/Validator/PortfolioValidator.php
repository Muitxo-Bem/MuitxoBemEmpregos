<?php

namespace App\Validator;

use App\Models\Candidato;

class PortfolioValidator{
    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\Portfolio::$rules,\App\Models\Portfolio::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Portfolio");
        return $validator;
    }
}

?>
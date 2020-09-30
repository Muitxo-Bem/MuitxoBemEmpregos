<?php

namespace App\Validator;

use App\Models\Candidato;

class PortfolioValidator{
    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\Portfolio::$rules,\App\Models\Portfolio::$messages);
        $cand = Candidato::find($data['candidato_id']);
        if($data['candidato_id'] == null){
            $validator->errors()->add('candidato','Id do candidato vazio.');
        }else if(is_null($cand)){
            $validator->errors()->add('candidato_invalido','Candidato Inválido');
        }
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Portfolio");
        return $validator;
    }
}

?>
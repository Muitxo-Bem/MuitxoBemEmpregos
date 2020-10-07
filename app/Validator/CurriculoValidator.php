<?php

namespace App\Validator;

use App\Models\Candidato;

class CurriculoValidator{
    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\Curriculo::$rules,\App\Models\Curriculo::$messages);
        /*$cand = Candidato::find($data['candidato_id']);
        if(is_null($cand)){
            $validator->errors()->add('candidato_invalido','Candidato Inválido');
        }*/
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Curriculo");
        return $validator;
    }

}

?>
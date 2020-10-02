<?php

namespace App\Validator;

use App\Models\Curriculo;

class AreaFormacaoValidator{

    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\AreaFormacao::$rules, \App\Models\AreaFormacao::$messages);
        $curriculo = Curriculo::find($data['curriculo_id']);
        if(is_null($curriculo)){
            $validator->errors()->add('curriculo_invalido','Curriculo Inválido');
        }
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação da Area de Formação");
        return $validator;
    }
}
<?php


namespace App\Validator;

use Validator;
use App\Models\Curriculo;


class IdiomaValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\Idioma::$rules,\App\Models\Idioma::$messages);
        //$curr = Curriculo::find($data['curriculo_id']);
        //if(is_null($curr)){
            //$validator->errors()->add('curriculo_invalido','Currículo Inválido');
        //}
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do idioma");
        return $validator;
    }
}

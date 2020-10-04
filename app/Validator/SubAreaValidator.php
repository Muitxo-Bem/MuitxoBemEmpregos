<?php


namespace App\Validator;


class SubAreaValidator
{

    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\SubArea::$rules,\App\Models\SubArea::$messages);
        $aform = AreaFormacao::find($data['area_formacao_id']);
        if(is_null($aform)){
            $validator->errors()->add('area_formacao_invalida','Area de formação inválida');
        }
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação da sub área");
        return $validator;
    }

}

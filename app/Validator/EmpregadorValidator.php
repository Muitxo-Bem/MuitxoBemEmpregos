<?php

namespace App\Validator;
use Illuminate\Support\Facades\Validator;
class EmpregadorValidator{

    public static function validate($data){
        $validator = Validator::make($data, \App\Models\Empregador::$rules, \App\Models\Empregador::$messages);
//        dd($data);
        //        dd($validator->errors());
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Empregador");
        return $validator;
    }
}

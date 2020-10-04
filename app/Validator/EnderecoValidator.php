<?php

namespace App\Validator;

use App\Models\Candidato;

class EnderecoValidator{
    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\Endereco::$rules,\App\Models\Endereco::$messages);
        //$cand = Candidato::find($data['candidato_id']);
        // if(is_null($cand)){
        //     $validator->errors()->add('candidato_invalido','Candidato Inválido');
        // }
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Endereço");
        return $validator;
    }
}

?>
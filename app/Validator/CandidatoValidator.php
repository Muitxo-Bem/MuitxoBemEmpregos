<?php

namespace App\Validator;

use Validator;

class CandidatoValidator{

    public static function validate($data){
        $validatorCandidato = \Validator::make($data, \App\Models\Candidato::$rules, \App\Models\Candidato::$messages);
        $validatorTelefone = \Validator::make($data, \App\Models\Telefone::$rules, \App\Models\Telefone::$messages);
        $validatorEndereco = \Validator::make($data, \App\Models\Endereco::$rules, \App\Models\Endereco::$messages);

        if(!$validatorCandidato->errors()->isEmpty())
            throw new ValidationException($validatorCandidato, "Erro na validação do Candidato");
        if(!$validatorTelefone->errors()->isEmpty())
            throw new ValidationException($validatorTelefone, "Erro na validação do Telefone");
        if(!$validatorEndereco->errors()->isEmpty())
            throw new ValidationException($validatorEndereco, "Erro na validação do Endereço");

        return [$validatorCandidato, $validatorTelefone, $validatorEndereco];
    }
}
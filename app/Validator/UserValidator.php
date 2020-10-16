<?php

namespace App\Validator;

use Validator;

class UserValidator{

    public static function validate($data){
        $validatorUser = \Validator::make($data, \App\Models\User::$rules, \App\Models\User::$messages);
        if(!$validatorUser->errors()->isEmpty())
            throw new ValidationException($validatorUser, "Erro na validação do User");

        return $validatorUser;
    }
}
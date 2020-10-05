<?php

namespace App\Validator;

use App\Models\Candidato;
use App\Models\Empregador;

class TelefoneValidator{
    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\Telefone::$rules,\App\Models\Telefone::$messages);
        // $emp = Empregador::find($data['empregador_id']);
        // $cand = Candidato::find($data['candidato_id']);

        // if($data['empregador_id'] == null && $data['candidato_id'] == null){
        //     $validator->errors()->add('dono','O telefone não está atribuido a nenhum dono');
        // }else if($data['empregador_id'] == null){
        //     if (is_null($cand)){
        //         $validator->errors()->add('candidato','Candidato Inexistente');
        //     }
        // }else if($data['candidato_id'] == null){
        //     if (is_null($emp)){
        //         $validator->errors()->add('empregador','Empregador Inexistente');
        //     }
        // }else{
        //     $validator->errors()->add('conflito','Tentando atribuir o mesmo telefone para empregador e candidato');
        // }
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Telefone");
        return $validator;
    }
}

?>

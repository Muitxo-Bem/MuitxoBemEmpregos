<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Endereco;
use App\Models\Telefone;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash as FacadesHash;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Candidato.index')->with('candidatos',Candidato::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Candidato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            \App\Validator\UserValidator::validate($request->all());
            \App\Validator\CandidatoValidator::validate($request->all());
            \App\Validator\TelefoneValidator::validate($request->all());
            \App\Validator\EnderecoValidator::validate($request->all());
        
            $user = new User();
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('senha'));
            $user->tipo = 'cliente';
            $user->save();
            $user_id = $user->id;
            
            $candidato = new Candidato();
            $candidato->user_id = $user_id;
            $candidato->nome = $request->input('nome');
            $candidato->cpf = $request->input('cpf');
            $candidato->save();
            $candidato_id = $candidato->id;

            $telefone = new Telefone();
            $telefone->telefone_primario = $request->input('telefone_primario');
            $telefone->telefone_secundario = $request->input('telefone_secundario');
            $telefone->candidato_id = $candidato_id;
            $telefone->save();

            $endereco = new Endereco();
            $endereco->rua = $request->input('rua');
            $endereco->bairro = $request->input('bairro');
            $endereco->numero = $request->input('numero');
            $endereco->cep = $request->input('cep');
            $endereco->estado = $request->input('estado');
            $endereco->cidade = $request->input('cidade');
            $endereco->candidato_id = $candidato_id;
            $endereco->save();

            return view('Candidato.show')->with('candidato', $candidato);

        }catch(\App\Validator\ValidationException $exception){
            return redirect(route('candidatos.create'))
            ->withErrors($exception->getValidator())
            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        return view('Candidato.show')->with('candidato', $candidato);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        return view('Candidato.editar')->with('candidato', $candidato);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        try{
            \App\Validator\CandidatoValidator::validate($request->all());
            \App\Validator\TelefoneValidator::validate($request->all());
            \App\Validator\EnderecoValidator::validate($request->all());

            //$parametros = $request->all();
            $candidatoAtualizar = Candidato::find($candidato->id);
            //$candidatoAtualizar->update($parametros);
            
            $candidatoAtualizar->nome = $request->input('nome');
            $candidatoAtualizar->email = $request->input('email');
            $candidatoAtualizar->senha = Hash::make($request->input('senha'));
            $candidatoAtualizar->update();

            $telefoneAtualizar = Telefone::where('candidato_id', '=', $candidato->id)->first();
            $telefoneAtualizar->telefone_primario = $request->input('telefone_primario');
            $telefoneAtualizar->telefone_secundario = $request->input('telefone_secundario');
            $telefoneAtualizar->update();

            $enderecoAtualizar = Endereco::where('candidato_id', '=', $candidato->id)->first();
            $enderecoAtualizar->rua = $request->input('rua');
            $enderecoAtualizar->bairro = $request->input('bairro');
            $enderecoAtualizar->numero = $request->input('numero');
            $enderecoAtualizar->cep = $request->input('cep');
            $enderecoAtualizar->estado = $request->input('estado');
            $enderecoAtualizar->cidade = $request->input('cidade');
            $enderecoAtualizar->update();

            return "Candidato atualizado";

        }catch(\App\Validator\ValidationException $exception){

            return redirect(route('candidatos.edit'))
            ->withErrors($exception->getValidator())
            ->withInput();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}

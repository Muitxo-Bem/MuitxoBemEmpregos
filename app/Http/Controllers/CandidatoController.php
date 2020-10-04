<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Endereco;
use App\Models\Telefone;
use Hash;
use Illuminate\Http\Request;

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
            \App\Validator\CandidatoValidator::validate($request->all());
            \App\Validator\TelefoneValidator::validate($request->all());
            \App\Validator\EnderecoValidator::validate($request->all());

            // $candidato = new Candidato();
            // $candidato->nome = $request->input('nome');
            // $candidato->cpf = $request->input('cpf');
            // $candidato->email = $request->input('email');
            // $candidato->senha = $request->input('senha');
            // $candidato->telefones->telefone_primario = $request->input('telefone_primario');
            // $candidato->telefones->telefone_secundario = $request->input('telefone_secundario');
            // $candidato->endereco->rua = $request->input('rua');
            // $candidato->endereco->bairro = $request->input('bairro');
            // $candidato->endereco->numero = $request->input('numero');
            // $candidato->endereco->cep = $request->input('cep');
            // $candidato->endereco->estado = $request->input('estado');
            // $candidato->endereco->cidade = $request->input('cidade');
            // $candidato->push();

            $candidato = new Candidato();
            $candidato->nome = $request->input('nome');
            $candidato->cpf = $request->input('cpf');
            $candidato->email = $request->input('email');
            $candidato->senha = $request->input('senha');
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

            return "Candidato Cadastrado";

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
        //return view('Candidato.show')->with('candidato', $candidato);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
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
        //
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

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
            $user->tipo = 'candidato';
            $user->save();
            #$user_id = $user->id;
            
            $candidato = new Candidato();
            //$candidato->user_id = $user_id;
            $candidato->nome = $request->input('nome');
            $candidato->cpf = $request->input('cpf');
            $candidato->user()->associate($user);
            $candidato->save();
            //$candidato_id = $candidato->id;

            $telefone = new Telefone();
            $telefone->telefone_primario = $request->input('telefone_primario');
            $telefone->telefone_secundario = $request->input('telefone_secundario');
            $telefone->dono()->associate($candidato);
            #$telefone->candidato_id = $candidato_id;
            $telefone->save();

            $endereco = new Endereco();
            $endereco->rua = $request->input('rua');
            $endereco->bairro = $request->input('bairro');
            $endereco->numero = $request->input('numero');
            $endereco->cep = $request->input('cep');
            $endereco->estado = $request->input('estado');
            $endereco->cidade = $request->input('cidade');
            #$endereco->candidato_id = $candidato_id;
            $endereco->dono()->associate($candidato);
            $endereco->save();

            return redirect((route('login')));
            #return view('Candidato.show')->with('candidato', $candidato);

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
            \App\Validator\UserValidator::validate($request->all());
            \App\Validator\TelefoneValidator::validate($request->all());
            \App\Validator\EnderecoValidator::validate($request->all());

            $candidato->update(['nome' => $request->input('nome')
                               ]);

            $candidato->user()->update(['email' => $request->input('email'),
                                        'password' => $request->input('senha'),
                                       ]);

            $candidato->telefones()->update(['telefone_primario' => $request->input('telefone_primario'), 
                                             'telefone_secundario' => $request->input('telefone_secundario')
                                            ]);

            $candidato->endereco()->update(['rua' => $request->input('rua'),
                                            'bairro' => $request->input('bairro'),
                                            'numero' => $request->input('numero'),
                                            'cep' => $request->input('cep'),
                                            'estado' => $request->input('estado'),
                                            'cidade' => $request->input('cidade'),
                                           ]);

            return "Dados atualizados com sucesso";

        }catch(\App\Validator\ValidationException $exception){

            return redirect(route('candidatos.edit', $candidato->id))
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

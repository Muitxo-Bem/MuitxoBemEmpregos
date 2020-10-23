<?php

namespace App\Http\Controllers;

use App\Models\Empregador;
use App\Models\Telefone;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash as FacadesHash;

class EmpregadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Empregador.index')->with('empregadores',Empregador::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empregador.create');
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
            \App\Validator\EmpregadorValidator::validate($request->all());
            \App\Validator\TelefoneValidator::validate($request->all());

            $user = new User();
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('senha'));
            $user->tipo = 'empregador';
            $user->save();
            $user_id = $user->id;

            $empregador = new Empregador();
            $empregador->user_id = $user_id;
            $empregador->nome = $request->input('nome');
            $empregador->cpf = $request->input('cpf');
            #$empregador->user()->associate($user);
            $empregador->save();
            $empregador_id = $empregador->id;

            $telefone = new Telefone();
            $telefone->telefone_primario = $request->input('telefone_primario');
            $telefone->telefone_secundario = $request->input('telefone_secundario');
            $telefone->empregador_id = $empregador_id;
            #$telefone->dono()->associate($empregador);
            $telefone->save();

            return redirect((route('login')));

        }catch(\App\Validator\ValidationException $exception){
            return redirect(route('empregadores.create'))
            ->withErrors($exception->getValidator())
            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empregador  $empregador
     * @return \Illuminate\Http\Response
     */
    public function show(Empregador $empregadore)
    {
        #dd($empregador);
        return view('Empregador.show')->with('empregador', $empregadore);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empregador  $empregador
     * @return \Illuminate\Http\Response
     */
    public function edit(Empregador $empregadore)
    {
        return view('Empregador.editar')->with('empregador', $empregadore);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empregador  $empregador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empregador $empregadore)
    {
        try{
            \App\Validator\EmpregadorValidator::validate($request->all());
            \App\Validator\UserValidator::validate($request->all());
            \App\Validator\TelefoneValidator::validate($request->all());

            $empregadore->update(['nome' => $request->input('nome')
            ]);

            $senhaHash = Hash::make($request->input('senha'));
            $empregadore->user()->update(['email' => $request->input('email'),
                'password' => $senhaHash,
            ]);

            $empregadore->telefones()->update(['telefone_primario' => $request->input('telefone_primario'),
                'telefone_secundario' => $request->input('telefone_secundario')
            ]);

            return view('Empregador.show')->with('empregador', $empregadore);

        }catch(\App\Validator\ValidationException $exception){

            return redirect(route('empregador.edit', $empregadore->id))
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empregador  $empregador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empregador $empregador)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Empregador;
use Illuminate\Http\Request;

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
        $newEmpregador = new Empregador();
        $newEmpregador->nome = $request->nome;
        $newEmpregador->cpf = $request->cpf ;
        $newEmpregador->email = $request->email;
        $newEmpregador->senha = $request->senha;
        $newEmpregador->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empregador  $empregador
     * @return \Illuminate\Http\Response
     */
    public function show(Empregador $empregador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empregador  $empregador
     * @return \Illuminate\Http\Response
     */
    public function edit(Empregador $empregador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empregador  $empregador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empregador $empregador)
    {
        //
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

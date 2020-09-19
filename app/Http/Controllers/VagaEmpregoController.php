<?php

namespace App\Http\Controllers;

use App\Models\VagaEmprego;
use Illuminate\Http\Request;

class VagaEmpregoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('VagaEmprego.index')->with('vagas',VagaEmprego::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('VagaEmprego.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newVagaEmprego = new VagaEmprego();
        $newVagaEmprego->nome = $request->nome;
        $newVagaEmprego->descricao = $request->descricao ;
        $newVagaEmprego->quantidade_de_vagas = $request->quantidade_de_vagas;
        $newVagaEmprego->local_de_trabalho = $request->local_de_trabalho;
        $newVagaEmprego->requisitos = $request->requisitos;
        $newVagaEmprego->faixa_salarial = $request->faixa_salarial;
        $newVagaEmprego->ativa = true;
        $newVagaEmprego->diferenciais = $request->diferenciais;
        $newVagaEmprego->empregador_id = $request->empregador_id;
        $newVagaEmprego->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VagaEmprego  $vagaEmprego
     * @return \Illuminate\Http\Response
     */
    public function show(VagaEmprego $vagaEmprego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VagaEmprego  $vagaEmprego
     * @return \Illuminate\Http\Response
     */
    public function edit(VagaEmprego $vagaEmprego)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VagaEmprego  $vagaEmprego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VagaEmprego $vagaEmprego)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VagaEmprego  $vagaEmprego
     * @return \Illuminate\Http\Response
     */
    public function destroy(VagaEmprego $vagaEmprego)
    {
        //
    }
}

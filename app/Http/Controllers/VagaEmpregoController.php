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
        try{
            \App\Validator\VagaEmpregoValidator::validate($request->all());
            //dd($request->all());
            if($request['quantidade_de_vagas'] <= 0){
                $request['ativa'] = 0;
            }
            $dados = $request->all();
            $vaga = new VagaEmprego();
            $vaga->ativa = 1;
            $vaga->empregador_id = \Auth::user()->empregador()->get()->first()->id;
            $vaga->nome = $request->input('nome');
            $vaga->descricao = $request->input('descricao');
            $vaga->quantidade_de_vagas = $request->input('quantidade_de_vagas');
            $vaga->local_de_trabalho = $request->input('local_de_trabalho');
            $vaga->requisitos = $request->input('requisitos');
            $vaga->faixa_salarial = $request->input('faixa_salarial');
            $vaga->diferenciais = $request->input('diferenciais');

            $vaga->save();
            return view('VagaEmprego.show')->with('vaga', $vaga);

        }catch (\App\Validator\ValidationException $e){
            return redirect(route('vagas.create'))->withErrors($e->getValidator())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VagaEmprego  $vaga
     * @return \Illuminate\Http\Response
     */
    public function show(VagaEmprego $vaga)
    {
        return view('VagaEmprego.show')->with('vaga',$vaga);
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
    public function close(VagaEmprego $vaga){
        VagaEmprego::where('id',$vaga->id)->update(['ativa'=>0]);
        return redirect()->back();
    }
}

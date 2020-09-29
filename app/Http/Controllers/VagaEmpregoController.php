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
            $dados = $request->all();
            \App\Models\VagaEmprego::create($dados);
            return 'Vaga Criada';
        }catch (\App\Validator\ValidationException $e){
            return redirect(route('vagas.create'))->withErrors($e->getValidator())->withInput();
        }
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

<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
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
        if(\Auth::check()){
            $this->authorize('create',VagaEmprego::class);
            return view('VagaEmprego.create');
        }
        
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',VagaEmprego::class);
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
        $this->authorize('verVagaDeslogado',$vaga);
        $this->authorize('verVaga',$vaga);
        return view('VagaEmprego.show')->with('vaga',$vaga);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VagaEmprego  $vagaEmprego
     * @return \Illuminate\Http\Response
     */
    public function edit(VagaEmprego $vaga)
    {
        $this->authorize('update',$vaga);
        return view('VagaEmprego.edit')->with('vaga',$vaga);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VagaEmprego  $vagaEmprego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VagaEmprego $vaga)
    {
        $this->authorize('update',$vaga);

        try{
            \App\Validator\VagaEmpregoValidator::validate($request->all());

            $vaga->update(['nome' => $request->input('nome')]);
            $vaga->update(['descricao' => $request->input('descricao')]);
            $vaga->update(['quantitade_de_vagas' => $request->input('quantidade_de_vagas')]);
            $vaga->update(['local_de_trabalho' => $request->input('local_de_trabalho')]);
            $vaga->update(['requisitos' => $request->input('requisitos')]);
            $vaga->update(['faixa_salarial' => $request->input('faixa_salarial')]);
            $vaga->update(['diferenciais' => $request->input('diferenciais')]);

            return redirect()->route('vagas.show',$vaga->id)->with('success', 'Atualizado com Sucesso');
        }catch(\App\Validator\ValidationException $exception){
            return redirect(route('vagas.edit', $vaga->id))
            ->withErrors($exception->getValidator())
            ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VagaEmprego  $vagaEmprego
     * @return \Illuminate\Http\Response
     */
    
    public function close(VagaEmprego $vaga){
        // dd($vaga);
        $this->authorize('close',$vaga);
        VagaEmprego::where('id',$vaga->id)->update(['ativa'=>0]);
        return redirect()->route('vagas.show',['vaga' => $vaga->id]);
    }

    public function candidatar(VagaEmprego $vaga){
        if(!\Auth::check()){
            return redirect()->route('login');    
        }
        $this->authorize('candidatar',$vaga);
        $data = new \DateTime();
        \DB::insert('insert into candidato_vaga_empregos (candidato_id, vaga_id,created_at,updated_at) values (?, ?, ?, ?)', [\Auth::user()->candidato()->get()->first()->id, $vaga->id, $data,$data]);
        return redirect()->back();
        
        
    }
}

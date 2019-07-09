<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alunos;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = \App\Alunos::all();
        return view('alunos', compact('alunos'));
    }

    public function buscar(Request $request)
    {
        $data = $request->all();
        $alunos = \DB::table('alunos')
                    ->select(['*'])
                    ->where('alunos.nome', 'like', $data["nome"]."%")
                    ->where('alunos.email', 'like', $data["email"]."%")
                    ->get();
       return view('alunos', compact('alunos'))->with("message", "Busca realizada no nome =".$data["nome"]." e email =".$data["email"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            \App\Alunos::create($request->all());
            return redirect()->back()->with("message", "Cadastro realizado com sucesso!");
        } catch (Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Alunos::findOrfail($id);
        return view('alunosEdit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $aluno = Alunos::findOrfail($request->id);
            $aluno->nome = $request->nome;
            $aluno->email = $request->email;
            $aluno->sexo = $request->sexo;
            $aluno->data_nascimento = $request->data_nascimento;
            $aluno->save();
            return redirect()->route('alunos')->with("message", "Aluno atualizado com sucesso!");
        } catch (Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $aluno = Alunos::findOrfail($id);
            $aluno->delete();
            return redirect()->back()->with("message", "Aluno excluído com sucesso!");
        } catch (Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cursos;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cursos = \App\Cursos::all();
        //dd($cursos);
/*        print "<pre>";
        var_dump($cursos);
        
        die();*/

        return view('cursos', compact('cursos'));
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
            \App\Cursos::create($request->all());
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

        $curso = Cursos::findOrfail($id);
        return view('cursosEdit', compact('curso'));
        
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
            $curso = Cursos::findOrfail($request->id);
            $curso->titulo = $request->titulo;
            $curso->descricao = $request->descricao;
            $curso->save();
            return redirect()->route('cursos')->with("message", "Curso atualizado com sucesso!");
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
            $curso = Cursos::findOrfail($id);
            $curso->delete();
            return redirect()->back()->with("message", "Curso excluído com sucesso!");
        } catch (Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }
}

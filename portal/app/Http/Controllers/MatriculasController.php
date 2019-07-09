<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cursos;
use App\Alunos;
use App\Matricula;

class MatriculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = \App\Cursos::all();
        $alunos = \App\Alunos::all();
        $matriculas = \DB::table('matriculas')
            ->select('matriculas.id', 'cursos.titulo', 'alunos.nome')
            ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id')
            ->join('alunos', 'alunos.id', '=', 'matriculas.id_aluno')
            ->get();
        return view('matriculas', compact('cursos', 'alunos', 'matriculas'));
    }

    public function buscar(Request $request)
    {
        $data = $request->all();
        $cursos = \App\Cursos::all();
        $alunos = \App\Alunos::all();
        $matriculas = \DB::table('matriculas')
                    ->select('matriculas.id', 'cursos.titulo', 'alunos.nome')
                    ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id')
                    ->join('alunos', 'alunos.id', '=', 'matriculas.id_aluno')
                    ->where('matriculas.id_curso', '=', $data["id_curso"])
                    ->get();

                    ################### Aqui eu pego os totais de Homens ######################
        //Aqui eu estou pegando os menores que 15
        $menor15 = \DB::table('matriculas')
                    ->select('matriculas.id', 'cursos.titulo', 'alunos.nome')
                    ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id')
                    ->join('alunos', 'alunos.id', '=', 'matriculas.id_aluno')
                    ->where('matriculas.id_curso', '=', $data["id_curso"])
                    ->where('alunos.data_nascimento', '>', '2004-01-01')
                    ->where('alunos.sexo', '=', 'masculino')
                    ->get();

        //Aqui eu estou pegando os entre 15 e 18
        $entre15_18 = \DB::table('matriculas')
                    ->select('matriculas.id', 'cursos.titulo', 'alunos.nome')
                    ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id')
                    ->join('alunos', 'alunos.id', '=', 'matriculas.id_aluno')
                    ->where('matriculas.id_curso', '=', $data["id_curso"])
                    ->where('alunos.data_nascimento', '<=', '2004-01-01')
                    ->where('alunos.data_nascimento', '>=', '2001-01-01')
                    ->where('alunos.sexo', '=', 'masculino')
                    ->get();
        //Aqui eu estou pegando os entre 19 e 24
        $entre19_24 = \DB::table('matriculas')
                    ->select('matriculas.id', 'cursos.titulo', 'alunos.nome')
                    ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id')
                    ->join('alunos', 'alunos.id', '=', 'matriculas.id_aluno')
                    ->where('matriculas.id_curso', '=', $data["id_curso"])
                    ->where('alunos.data_nascimento', '<=', '2000-01-01')
                    ->where('alunos.data_nascimento', '>=', '1995-01-01')
                    ->where('alunos.sexo', '=', 'masculino')
                    ->get();

        //Aqui eu estou pegando os entre 25 e 30
        $entre25_30 = \DB::table('matriculas')
                    ->select('matriculas.id', 'cursos.titulo', 'alunos.nome')
                    ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id')
                    ->join('alunos', 'alunos.id', '=', 'matriculas.id_aluno')
                    ->where('matriculas.id_curso', '=', $data["id_curso"])
                    ->where('alunos.data_nascimento', '<=', '1994-01-01')
                    ->where('alunos.data_nascimento', '>=', '1989-01-01')
                    ->where('alunos.sexo', '=', 'masculino')
                    ->get();

        //Aqui eu estou pegando a idade maior que 30
        $maior30 = \DB::table('matriculas')
                    ->select('matriculas.id', 'cursos.titulo', 'alunos.nome')
                    ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id')
                    ->join('alunos', 'alunos.id', '=', 'matriculas.id_aluno')
                    ->where('matriculas.id_curso', '=', $data["id_curso"])
                    ->where('alunos.data_nascimento', '<', '1989-01-01')
                    ->where('alunos.sexo', '=', 'masculino')
                    ->get();

                    ################### Aqui eu pego os totais de mulheres ######################

         //Aqui eu estou pegando os menores que 15
        $M_menor15 = \DB::table('matriculas')
                    ->select('matriculas.id', 'cursos.titulo', 'alunos.nome')
                    ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id')
                    ->join('alunos', 'alunos.id', '=', 'matriculas.id_aluno')
                    ->where('matriculas.id_curso', '=', $data["id_curso"])
                    ->where('alunos.data_nascimento', '>', '2004-01-01')
                    ->where('alunos.sexo', '=', 'feminino')
                    ->get();

        //Aqui eu estou pegando os entre 15 e 18
        $M_entre15_18 = \DB::table('matriculas')
                    ->select('matriculas.id', 'cursos.titulo', 'alunos.nome')
                    ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id')
                    ->join('alunos', 'alunos.id', '=', 'matriculas.id_aluno')
                    ->where('matriculas.id_curso', '=', $data["id_curso"])
                    ->where('alunos.data_nascimento', '<=', '2004-01-01')
                    ->where('alunos.data_nascimento', '>=', '2001-01-01')
                    ->where('alunos.sexo', '=', 'feminino')
                    ->get();
        //Aqui eu estou pegando os entre 19 e 24
        $M_entre19_24 = \DB::table('matriculas')
                    ->select('matriculas.id', 'cursos.titulo', 'alunos.nome')
                    ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id')
                    ->join('alunos', 'alunos.id', '=', 'matriculas.id_aluno')
                    ->where('matriculas.id_curso', '=', $data["id_curso"])
                    ->where('alunos.data_nascimento', '<=', '2000-01-01')
                    ->where('alunos.data_nascimento', '>=', '1995-01-01')
                    ->where('alunos.sexo', '=', 'feminino')
                    ->get();

        //Aqui eu estou pegando os entre 25 e 30
        $M_entre25_30 = \DB::table('matriculas')
                    ->select('matriculas.id', 'cursos.titulo', 'alunos.nome')
                    ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id')
                    ->join('alunos', 'alunos.id', '=', 'matriculas.id_aluno')
                    ->where('matriculas.id_curso', '=', $data["id_curso"])
                    ->where('alunos.data_nascimento', '<=', '1994-01-01')
                    ->where('alunos.data_nascimento', '>=', '1989-01-01')
                    ->where('alunos.sexo', '=', 'feminino')
                    ->get();

        //Aqui eu estou pegando a idade maior que 30
        $M_maior30 = \DB::table('matriculas')
                    ->select('matriculas.id', 'cursos.titulo', 'alunos.nome')
                    ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id')
                    ->join('alunos', 'alunos.id', '=', 'matriculas.id_aluno')
                    ->where('matriculas.id_curso', '=', $data["id_curso"])
                    ->where('alunos.data_nascimento', '<', '1989-01-01')
                    ->where('alunos.sexo', '=', 'feminino')
                    ->get();

        $obj[0]["nome"] = "Homens menor que 15 anos";
        $obj[0]["total"] = count($menor15);
        $obj[1]["nome"] = "Homens entre 15 e 18 anos";
        $obj[1]["total"] = count($entre15_18);
        $obj[2]["nome"] = "Homens entre 19 e 24 anos";
        $obj[2]["total"] = count($entre19_24);
        $obj[3]["nome"] = "Homens entre 25 e 30 anos";
        $obj[3]["total"] = count($entre25_30);
        $obj[4]["nome"] = "Homens maior que 30 anos";
        $obj[4]["total"] = count($maior30);

        $obj[5]["nome"] = "Mulheres menor que 15 anos";
        $obj[5]["total"] = count($M_menor15);
        $obj[6]["nome"] = "Mulheres entre 15 e 18 anos";
        $obj[6]["total"] = count($M_entre15_18);
        $obj[7]["nome"] = "Mulheres entre 19 e 24 anos";
        $obj[7]["total"] = count($M_entre19_24);
        $obj[8]["nome"] = "Mulheres entre 25 e 30 anos";
        $obj[8]["total"] = count($M_entre25_30);
        $obj[9]["nome"] = "Mulheres maior que 30 anos";
        $obj[9]["total"] = count($M_maior30);

       return view('matriculas', compact('cursos', 'alunos','matriculas', 'obj'));
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
            \App\Matricula::create($request->all());
            return redirect()->back()->with("message", "Matrícula realizada com sucesso!");
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
        $matricula = Matricula::findOrfail($id);
        $cursos = \App\Cursos::all();
        $alunos = \App\Alunos::all();
        return view('matriculasEdit', compact('matricula','alunos', 'cursos'));
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
            $matricula = Matricula::findOrfail($request->id);
            $matricula->id_aluno = $request->id_aluno;
            $matricula->id_curso = $request->id_curso;
            $matricula->save();
            return redirect()->route('matriculas')->with("message", "Matricula atualizada com sucesso!");
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
            $matricula = Matricula::findOrfail($id);
            $matricula->delete();
            return redirect()->back()->with("message", "Matricula excluída com sucesso!");
        } catch (Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }
}

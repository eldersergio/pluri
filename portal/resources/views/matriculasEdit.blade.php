<!DOCTYPE html>
<html>
<head>
	<title>Matrículas</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <div>
  	<h3 class="row d-flex justify-content-center">Matrículas</h3>
  </div>
  <div id="criar_curso">
  		<h3 class="row d-flex justify-content-center">Atualizar Matrícula</h3>
  		{!!Form::open(array('url'=>'/matriculas/atualizar'))!!}
      {!!Form::hidden('id', $matricula->id)!!}
  			<label>Escolha um aluno:</label>
          <select name="id_aluno">
            @foreach($alunos as $aluno)
                <option {{ ($matricula->id_aluno == $aluno->id) ? 'selected' : ''}} value=" {{ $aluno->id }} ">{{ $aluno->nome }}</option>
            @endforeach
          </select>
          <label>Escolha um curso:</label>
          <select name="id_curso">
            @foreach($cursos as $curso)
                <option {{ ($matricula->id_curso == $curso->id) ? 'selected' : ''}} value=" {{ $curso->id }} ">{{ $curso->titulo }}</option>
            @endforeach
          </select>
  			{!!Form::submit('Atualizar')!!}
  		{!!Form::close()!!}
  </div>
  {{--Buttons Submit e Voltar--}}
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <a href="http://127.0.0.1:8000/matriculas" class="btn btn-primary btn-block"><i class="fa fa-long-arrow-left"></i>  Voltar</a></div>
        </div>
    </div>
    {{--Fim Buttons Submit e Voltar--}}
</div>
</div>
</body>
</html>
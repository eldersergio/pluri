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
  <div class="row">
		<div class="col-sm-6 col-md-9">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <em> {!! session('message') !!}</em>
                </div>
            @endif

            @if(Session::has('errors'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
        </div>
  </div>
  <div class="row">
  	<div class="col-sm">
  		<button id="btn_criar" type="button" class="btn btn-info">Criar Matrícula</button>
  	</div>
  </div>
  <div id="criar_curso">
  		<h3 class="row d-flex justify-content-center">Matricular</h3>
  		{!!Form::open(array('url'=>'/matriculas/cadastrar'))!!}
        <label>Escolha um aluno:</label>
          <select name="id_aluno">
            @foreach($alunos as $aluno)
              <option value=" {{ $aluno->id }} ">{{ $aluno->nome }}</option>
            @endforeach
          </select>
          <label>Escolha um curso:</label>
          <select name="id_curso">
            @foreach($cursos as $curso)
              <option value=" {{ $curso->id }} ">{{ $curso->titulo }}</option>
            @endforeach
          </select>
  			{!!Form::submit('Cadastrar')!!}
  		{!!Form::close()!!}
  </div>
  <div class="card-body">
      <div class="table-responsive">
      	<h4>Matriculas</h4>
          <div>
            {!!Form::open(array('url'=>'/matriculas/buscar'))!!}
              <select name="id_curso">
                @foreach($cursos as $curso)
                  <option value=" {{ $curso->id }} ">{{ $curso->titulo }}</option>
                @endforeach
              </select>
            {!!Form::submit('Buscar')!!}
              <a href="http://127.0.0.1:8000/matriculas" class="btn btn-secondary">Todos</a>
            {!!Form::close()!!}
          </div>
          <table class="table table-bordered table-hover">
              <thead>
              <tr>
                  <th scope="col">Cod. Matrícula</th>
                  <th scope="col">Curso</th>
                  <th scope="col">Aluno</th>
                  <th scope="col">Ação</th>
              </tr>
              </thead>
              @if(isset($matriculas))
              <tbody>
              @for ($i = 0; $i < count($matriculas); $i++)
                  <tr>
                      <td>{{ $matriculas[$i]->id }}</td>
                      <td>{{ $matriculas[$i]->titulo }}</td>
                      <td>{{ $matriculas[$i]->nome }}</td>
                      <td><a href="{{ route('ed', ['id' => $matriculas[$i]->id])}}" ><i title="editar" class="fa fa-pencil-square-o"></i></a> - <a href="{{ route('remover', ['id' => $matriculas[$i]->id])}}" ><i title="apagar" class="fa fa-trash"></i></a></td>
                  </tr>
              @endfor

              </tbody>
              @endif
          </table>
      </div>
  </div>
  <div id="totais" class="card-body">
      <div class="table-responsive">
        <h4>Totais</h4>
          <table class="table table-bordered table-hover">
              <thead>
              <tr>
                  <th scope="col">Idade</th>
                  <th scope="col">Total</th>
              </tr>
              </thead>
              @if(isset($obj))
              <tbody>
              @for ($i = 0; $i < count($obj); $i++)
                  <tr>
                      <td>{{ $obj[$i]["nome"] }}</td>
                      <td>{{ $obj[$i]["total"] }}</td>
                  </tr>
              @endfor
              </tbody>
              @endif
          </table>
      </div>
  </div>
</div>
{{--Buttons Submit e Voltar--}}
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <a href="http://127.0.0.1:8000" class="btn btn-primary btn-block"><i class="fa fa-long-arrow-left"></i>  Voltar</a></div>
        </div>
    </div>
    {{--Fim Buttons Submit e Voltar--}}
</div>
</body>
</html>
<script type="text/javascript">

	document.getElementById('criar_curso').style.display = "none";
	btn = document.getElementById('btn_criar');	
	btn.onclick = function(){
			criar = document.getElementById('criar_curso').style.display;
			console.log(criar);
			if (criar == 'none') {				
				document.getElementById('criar_curso').style.display = 'block';
			}else{
				document.getElementById('criar_curso').style.display = 'none';
			}
	}
</script>
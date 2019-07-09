<!DOCTYPE html>
<html>
<head>
	<title>Alunos</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <div>
  	<h3 class="row d-flex justify-content-center">Alunos</h3>
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
  		<button id="btn_criar" type="button" class="btn btn-info">Criar Aluno</button>
  	</div>
  </div>
  <div id="criar_curso">
  		<h3 class="row d-flex justify-content-center">Casdastrar Aluno</h3>
  		{!!Form::open(array('url'=>'/alunos/cadastrar'))!!}
  			<label>Digite o nome:</label>
  			{!!Form::text('nome', '', array('id'=>'nome', 'required'=>''))!!}<br>
  			<label>Digite o email:</label>
  			{!!Form::text('email', '', array('id'=>'email', 'required'=>''))!!}<br>
        <label>Escolha um sexo:</label>
        {!! Form::select('sexo', ['masculino' => 'Masculino', 'feminino' => 'Feminino'],'', array('id'=>'select_pag', 'required'=>'')) !!}<br>
        <label>Nascimento:</label>
        {!!Form::date('data_nascimento', '2012-01-01', array('id'=>'data_nascimento', 'required'=>'', 'max'=>'2012-01-01', 'min'=>'1919-01-01'))!!}<br>
  			{!!Form::submit('Cadastrar')!!}
  		{!!Form::close()!!}
  </div>
  
  <div class="card-body">
                <div class="table-responsive">
                	<h4>Alunos Cadastrados</h4>
                  <div>
                    {!!Form::open(array('url'=>'/alunos/buscar'))!!}
                        {!!Form::text('nome', '', array('id'=>'nome', 'placeholder'=>'Buscar por nome'))!!}
                        {!!Form::text('email', '', array('id'=>'email', 'placeholder'=>'Buscar por email'))!!}
                        {!!Form::submit('Buscar')!!}
                        <a href="http://127.0.0.1:8000/alunos" class="btn btn-secondary">Todos</a>
                    {!!Form::close()!!}

                  </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Nascimento</th>
                            <th scope="col">Ação</th>
                        </tr>
                        </thead>
                        @if(isset($alunos))
                        <tbody>
                        @for ($i = 0; $i < count($alunos); $i++)
                            <tr>
                                <td>{{ $alunos[$i]->nome }}</td>
                                <td>{{ $alunos[$i]->email }}</td>
                                <td>{{ $alunos[$i]->sexo }}</td>
                                <td>{{ $alunos[$i]->data_nascimento }}</td>
                                <td><a href="{{ route('editar', ['id' => $alunos[$i]->id])}}" ><i title="editar" class="fa fa-pencil-square-o"></i></a> - <a href="{{ route('deletar', ['id' => $alunos[$i]->id])}}" ><i title="apagar" class="fa fa-trash"></i></a></td>
                            </tr>
                        @endfor

                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
</div>
{{--Buttons Submit e Voltar--}}
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <a href="http://127.0.0.1:8000" class="btn btn-primary btn-block"><i class="fa fa-long-arrow-left"></i>  Voltar</a>
              </div>
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
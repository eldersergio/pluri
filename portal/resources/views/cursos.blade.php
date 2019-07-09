<!DOCTYPE html>
<html>
<head>
	<title>Cursos</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script> -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <div>
  	<h3 class="row d-flex justify-content-center">Cursos</h3>
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
  		<button id="btn_criar" type="button" class="btn btn-info ">Criar Curso</button>
  	</div>
  </div>
  <div id="criar_curso">
  		<h3 class="row d-flex justify-content-center">Casdastrar Curso</h3>
  		{!!Form::open(array('url'=>'/cursos/cadastrar'))!!}
  			<label>Digite o titulo do curso:</label>
  			{!!Form::text('titulo', '', array('id'=>'titulo', 'required'=>''))!!}
  			<label>Digite uma descrição:</label>
  			{!!Form::text('descricao', '', array('id'=>'descricao', 'required'=>''))!!}
  			{!!Form::submit('Cadastrar')!!}
  		{!!Form::close()!!}
  </div>
  <div class="card-body">
                <div class="table-responsive">
                	<h4>Cursos Cadastrados</h4>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ação</th>
                        </tr>
                        </thead>
                        @if(isset($cursos))
                        <tbody>
                        @for ($i = 0; $i < count($cursos); $i++)
                            <tr>
                                <td>{{ $cursos[$i]->titulo }}</td>
                                <td>{{ $cursos[$i]->descricao }}</td>
                                <!-- <td><a href="cursos.editar?id={{ $cursos[$i]->id }}" ><i title="editar" class="fa fa-pencil-square-o"></i></a></td> -->
                                <td><a href="{{ route('edit', ['id' => $cursos[$i]->id])}}" ><i title="editar" class="fa fa-pencil-square-o"></i></a> - <a href="{{ route('apagar', ['id' => $cursos[$i]->id])}}" ><i title="apagar" class="fa fa-trash"></i></a></td>
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
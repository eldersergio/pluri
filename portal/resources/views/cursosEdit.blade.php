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
  <div id="criar_curso">
  		<h3 class="row d-flex justify-content-center">Atualizar Curso</h3>
  		{!!Form::open(array('url'=>'/cursos/atualizar'))!!}
      {!!Form::hidden('id', $curso->id)!!}
  			<label>Digite o titulo do curso:</label>
  			{!!Form::text('titulo', $curso->titulo, array('id'=>'titulo', 'required'=>''))!!}
  			<label>Digite uma descrição:</label>
  			{!!Form::text('descricao', $curso->descricao, array('id'=>'descricao', 'required'=>''))!!}
  			{!!Form::submit('Atualizar')!!}
  		{!!Form::close()!!}
  </div>
  {{--Buttons Submit e Voltar--}}
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <a href="http://127.0.0.1:8000/cursos" class="btn btn-primary btn-block"><i class="fa fa-long-arrow-left"></i>  Voltar</a></div>
        </div>
    </div>
    {{--Fim Buttons Submit e Voltar--}}
</div>
</div>
</body>
</html>
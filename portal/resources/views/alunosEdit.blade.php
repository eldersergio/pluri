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
  <div id="criar_curso">
  		<h3 class="row d-flex justify-content-center">Atualizar Aluno</h3>
  		{!!Form::open(array('url'=>'/alunos/atualizar'))!!}
      {!!Form::hidden('id', $aluno->id)!!}
        <label>Digite o nome:</label>
        {!!Form::text('nome', $aluno->nome, array('id'=>'nome', 'required'=>''))!!}<br>
        <label>Digite o email:</label>
        {!!Form::text('email', $aluno->email, array('id'=>'email', 'required'=>''))!!}<br>
        <label>Escolha um sexo:</label>
        {!! Form::select('sexo', ['masculino' => 'Masculino', 'feminino' => 'Feminino'], $aluno->sexo, array('id'=>'select_pag', 'required'=>'')) !!}<br>
        <label>Nascimento:</label>
        {!!Form::date('data_nascimento', $aluno->data_nascimento, array('id'=>'data_nascimento', 'required'=>'', 'max'=>'2012-01-01', 'min'=>'1919-01-01'))!!}<br>
        {!!Form::submit('Atualizar')!!}
      {!!Form::close()!!}
  </div>
  {{--Buttons Submit e Voltar--}}
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <a href="http://127.0.0.1:8000/alunos" class="btn btn-primary btn-block"><i class="fa fa-long-arrow-left"></i>  Voltar</a></div>
        </div>
    </div>
    {{--Fim Buttons Submit e Voltar--}}
</div>
</div>
</body>
</html>
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection
@section('content')
<div class="container">
<div class="page-header">
  <h2>Editar <small>{{$registro_a_editar->name}}</small></h2>
</div>
	{!! Form::open(['route' => ['actualizar-mas-informacion', $registro_a_editar], 'method' => 'PUT'])!!}
	<div class="form-group">
		{!! Form::label('state','Estado')!!}
		{!! Form::select('state', ['No contactado' => 'No contactado', 'Imposible contactar' => 'Imposible contactar', 'Contactado' => 'Contactado'], null ,['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('observations','Observaciones')!!}
		{!! Form::textarea('observations', null, ['class' => 'form-control', 'placeholder' => 'Observaciones']) !!}
	</div>
		<div class="form-group">
		{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
	</div>
</div>
@endsection
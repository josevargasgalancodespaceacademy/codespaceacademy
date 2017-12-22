@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection
@section('content')
<div class="container col-md-12">
<div class="row">
<div class="container col-md-2"> 
<h4 class="title"> Mostrar resultados para: </h4>
<p class="title"><strong>Ordenar por:</strong></p>
{!! Form::open(['route' => ['filtrar-talleresyeventos', $talleresyeventos], 'method' => 'PUT'])!!}
        {{ csrf_field() }}
<div class="form-group">
		{!! Form::select('campo_a_filtrar', ['name' => 'Nombre', 'created_at' => 'Fecha', 'state' => 'Estado'], null ,['class' => 'form-control']) !!}
</div>
<div class="form-group">
		{!! Form::select('orden', ['asc' => 'Ascendente', 'desc' => 'Descendente'], null ,['class' => 'form-control']) !!}
</div>
<p class="title"><strong>Filtrar por estado:</strong></p>
<div class="form-group">
		{{ Form::radio('state', 'No contactado', false) }} No contactado<br>
        {{ Form::radio('state', 'Imposible contactar', false) }} Imposible contactar<br>
        {{ Form::radio('state', 'Inscrito', false) }} Inscrito<br>
        {{ Form::radio('state', 'No inscrito', false) }} No inscrito<br>
        {{ Form::radio('state', 'Presentado', false) }} Presentado<br>
        {{ Form::radio('state', 'No presentado', false) }} No presentado
</div>
<div class="form-group">
		{!! Form::submit('Aplicar filtros', ['class' => 'btn']) !!}
</div>
<hr>
<a href="../public/listado-talleresyeventos" class="btn btn-success"></span> Limpiar filtros </a>
{{ Form::close() }}
</div>
<div class="container col-md-8"> 
<table class="table table-bordered">
		<thead>
			<th>Nombre</th>
			<th>Fecha</th>
			<th>Estado</th>
			<th>Observaciones</th>
			<th>Acciones</th>
		</thead>
		<tbody>
	@foreach($talleresyeventos as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->created_at }}</td>
			<td>{{ $registro->state }}</td>
			<td>{{ $registro->observations }}</td>		
			<td><a href="../public/listado-empresas/{{ $registro->id }}/detalle-empresa" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span> Ver más </a>
				<a href="../public/listado-empresas/{{ $registro->id }}/editar-empresa" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar </a></td>	
	</tr>	
	@endforeach
	</tbody>
</table>
<p>Número de registros encontrados: {{$total_talleresyeventos}}</p>
{{$talleresyeventos->links()}}
</div>
</div>
</div>
@endsection
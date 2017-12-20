@extends('layouts.app')
@section('content')
<div class="container col-md-12">
<div class="row">
<div class="container col-md-2"> 
<h4 class="title"> Mostrar resultados para: </h4>
<p class="title"><strong>Ordenar por:</strong></p>
{!! Form::open(['route' => ['filtrar-mas-informacion', $mas_informacion], 'method' => 'PUT'])!!}
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
        {{ Form::radio('state', 'Contactado', false) }} Contactado
</div>
<div class="form-group">
		{!! Form::submit('Aplicar filtros', ['class' => 'btn']) !!}
</div>
{{ Form::close() }}
<hr>
<a href="../public/listado-mas-informacion" class="btn btn-success"></span> Limpiar filtros </a>
</div>
<div class="container col-md-8 "> 
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Fecha</th>
			<th>Estado</th>
			<th>Observaciones</th>
			<th>Acciones</th>
	</thead>
	<tbody>
	@foreach($mas_informacion as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->created_at }}</td>
			<td>{{ $registro->state }}</td>
			<td>{{ $registro->observations }}</td>	
			<td><a href="../public/listado-mas-informacion/{{ $registro->id }}/detalle-mas-informacion" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span> Ver más </a>
				<a href="../public/listado-mas-informacion/{{ $registro->id }}/editar-mas-informacion" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</a></td>	
	</tr>	
	@endforeach
</tbody>
</table>
{{$mas_informacion->links()}}
</div>
</div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container col-md-12">
<div class="row">
<div class="container col-md-2"> 
<h4 class="title"> Mostrar resultados para: </h4>
<p class="title"><strong>Ordenar por:</strong></p>
{!! Form::open(['route' => ['filtrar-contactos', $contacto], 'method' => 'PUT'])!!}
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
        {{ Form::radio('state', 'Contactado', false) }} Contactado
</div>
<div class="form-group">
		{!! Form::submit('Aplicar filtros', ['class' => 'btn']) !!}
</div>
{{ Form::close() }}
<hr>
<a href="../public/listado-contacto" class="btn btn-success"></span> Limpiar filtros </a>
</div>
<div class="container col-md-8 ">
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th class="col-md-3">Comentario</th>
			<th>Fecha</th>
			<th>Estado</th>
			<th>Observaciones</th>
			<th>Acciones</th>
	</thead>
	<tbody>
	@foreach($contacto as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->comment }}</td>
			<td>{{ $registro->created_at }}</td>
			<td>{{ $registro->state }}</td>
			<td>{{ $registro->observations }}</td>		
			<td><a href="../public/listado-contacto/{{ $registro->id }}/detalle-contacto" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Ver más</a>
				<a href="../public/listado-contacto/{{ $registro->id }}/editar-contacto" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar </a></td>		
	</tr>	
	@endforeach
</tbody>
</table>
<p>Número de registros encontrados: {{$total_contacto}}</p>
{{$contacto->links()}}
</div>
</div>
</div>
@endsection
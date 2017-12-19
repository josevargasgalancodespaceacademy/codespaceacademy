@extends('layouts.app')
@section('content')
<div class="container col-md-12">
<div class="row">
<div class="container col-md-2"> 
<h4 class="title"> Mostrar resultados para: </h4>
<p class="title"><strong>Ordenar por:</strong></p>
{!! Form::open(['route' => ['filtrar-te-llamamos', $te_llamamos], 'method' => 'PUT'])!!}
<div class="form-group">
		{!! Form::select('campo_a_filtrar', ['name' => 'Nombre', 'telephone' => 'Teléfono', 'created_at' => 'Fecha', 'state' => 'Estado'], null ,['class' => 'form-control']) !!}
</div>
<div class="form-group">
		{!! Form::select('orden', ['asc' => 'Ascendente', 'desc' => 'Descendente'], null ,['class' => 'form-control']) !!}
</div>
<div class="form-group">
		{!! Form::submit('Aplicar filtros', ['class' => 'btn']) !!}
</div>
{{ Form::close() }}
</div>
<div class="container col-md-8 "> 
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Teléfono</th>
			<th>Fecha</th>
			<th>Estado</th>
			<th>Observaciones</th>
			<th>Acciones</th>
	</thead>
	<tbody>
	@foreach($te_llamamos as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->telephone }}</td>
			<td>{{ $registro->created_at }}</td>
			<td>{{ $registro->state }}</td>
			<td>{{ $registro->observations }}</td>
			<td><a href="../public/listado-te-llamamos/{{ $registro->id }}/editar-te-llamamos" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar </a></td>	
	</tr>	
	@endforeach
</tbody>
</table>
{{$te_llamamos->links()}}
</div>
</div>
</div>
@endsection
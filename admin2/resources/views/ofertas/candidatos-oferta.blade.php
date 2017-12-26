@extends('layouts.app')
@section('content')
<div class="container col-md-12">
<div class="row">
<div class="container col-md-2"> 
<h4 class="title"> Mostrar resultados para: </h4>
<p class="title"><strong>Ordenar por:</strong></p>
{!! Form::open(['route' => ['filtrar-ofertas-trabajo', $candidatos], 'method' => 'PUT'])!!}
{{ csrf_field() }}
<div class="form-group">
		{!! Form::select('campo_a_filtrar', ['name' => 'Nombre', 'created_at' => 'Fecha'], null ,['class' => 'form-control']) !!}
</div>
<div class="form-group">
		{!! Form::select('orden', ['asc' => 'Ascendente', 'desc' => 'Descendente'], null ,['class' => 'form-control']) !!}
</div>
<div class="form-group">
		{!! Form::submit('Aplicar filtros', ['class' => 'btn']) !!}
</div>
{{ Form::close() }}
</div>
<div class="container col-md-8"> 
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Fecha</th>
			<th>Acciones</th>
	</thead>
	<tbody>
	@foreach($candidatos as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->created_at }}</td>
			<td><a href="../../listado-ofertas-trabajo/{{ $registro->offer_id }}/candidatos/{{$registro->id}}/detalle-candidato" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span> Ver más </a></td>
	</tr>	
	@endforeach
</tbody>
</table>
<p>Número de registros encontrados: {{$total_candidatos}}</p>
{{$candidatos->links()}}
</div>
</div>
</div>
@endsection
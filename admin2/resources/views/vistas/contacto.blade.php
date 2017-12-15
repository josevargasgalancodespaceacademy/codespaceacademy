@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Comentario</th>
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
{{$contacto->links()}}
</div>
@endsection
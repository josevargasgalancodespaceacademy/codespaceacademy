@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Comentario</th>
			<th>Fecha</th>
			<th>Acciones</th>
	</thead>
	<tbody>
	@foreach($contacto as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->comment }}</td>
			<td>{{ $registro->created_at }}</td>	
			<td><a href="../public/listado-contacto/{{ $registro->id }}/detalle-contacto">Ver más</a></td>	
	</tr>	
	@endforeach
</tbody>
</table>
{{$contacto->links()}}
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-bordered">
	<tr>
			<td>Nombre</td>
			<td>Comentario</td>
			<td>Fecha</td>
			<td>Acciones</td>
	</tr>
	@foreach($contacto as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->comment }}</td>
			<td>{{ $registro->created_at }}</td>	
			<td><a href="../public/listado-contacto/{{ $registro->id }}/detalle-contacto">Ver más</a></td>	
	</tr>	
	@endforeach
</table>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-bordered">
	<tr>
			<td>Nombre</td>
			<td>Fecha</td>
			<td>Estado</td>
			<td>Acciones</td>
	</tr>
	@foreach($mas_informacion as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->created_at }}</td>
			<td>{{ $registro->state }}</td>	
			<td><a href="../public/listado-mas-informacion/{{ $registro->id }}/detalle-mas-informacion">Ver más</a></td>	
	</tr>	
	@endforeach
</table>
</div>
@endsection
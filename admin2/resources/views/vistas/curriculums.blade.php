@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-bordered">
	<tr>
			<td>Nombre</td>
			<td>Fecha</td>
			<td>Acciones</td>
	</tr>
	@foreach($curriculums as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->created_at }}</td>
			<td><a href="../public/listado-curriculums/{{ $registro->id }}/detalle-curriculum">Ver más</a></td>	
	</tr>	
	@endforeach
</table>
</div>
@endsection
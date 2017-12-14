@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Fecha</th>
			<th>Estado</th>
			<th>Acciones</th>
	</thead>
	<tbody>
	@foreach($sorteo_becas as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->created_at }}</td>
			<td>{{ $registro->state }}</td>	
			<td><a href="../public/listado-sorteo-becas/{{ $registro->id }}/detalle-sorteo-becas">Ver más</a></td>	
	</tr>	
	@endforeach
</tbody>
</table>
	{{$sorteo_becas->links()}}
</div>
@endsection
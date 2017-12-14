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
	@foreach($mas_informacion as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->created_at }}</td>
			<td>{{ $registro->state }}</td>	
			<td><a href="../public/listado-mas-informacion/{{ $registro->id }}/detalle-mas-informacion" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span> Ver más </a>
				<a href="../public/listado-mas-informacion/{{ $registro->id }}/editar-mas-informacion" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</a></td>	
	</tr>	
	@endforeach
</tbody>
</table>
{{$mas_informacion->links()}}
</div>
@endsection
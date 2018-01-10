@extends('layouts.app')
@section('content')
<div class="container-fluid table-responsive">
<table class="table table-bordered">
	<thead>
			<th>Nombre del contacto</th>
			<th>Email</th>
			<th>Teléfono</th>
			<th>Comentario</th>
			<th>Ciudad</th>
			<th>Curso</th>
			<th>Fecha</th>
			<th>Estado</th>
	</thead>
	<tbody>
	<tr>
			<td>{{ $detalle_mas_informacion->name }}</td>
			<td>{{ $detalle_mas_informacion->email }}</td>
			<td>{{ $detalle_mas_informacion->telephone }}</td>
			<td>{{ $detalle_mas_informacion->comment }}</td>
			<td>{{ $detalle_mas_informacion->city }}</td>
			<td>{{ $detalle_mas_informacion->course }}</td>
			<td>{{ $detalle_mas_informacion->created_at}}</td>
			<td>{{ $detalle_mas_informacion->state }}</td>
	</tr>
	</tbody>	
</table>
</div>
@endsection
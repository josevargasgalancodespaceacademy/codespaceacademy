@extends('layouts.app')
@section('content')
<div class="container-fluid table-responsive">
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Fecha de nacimiento</th>
			<th>Email</th>
			<th>DNI/NIE</th>
			<th>Teléfono</th>
			<th>Ciudad</th>
			<th>Comentario</th>
			<th>Fecha</th>
			<th>Estado</th>
	</thead>
	<tbody>
	<tr>
			<td>{{ $detalle_sorteo_becas->name }}</td>
			<td>{{ $detalle_sorteo_becas->surnames }}</td>
			<td>{{ $detalle_sorteo_becas->date_of_birth }}</td>
			<td>{{ $detalle_sorteo_becas->email }}</td>
			<td>{{ $detalle_sorteo_becas->number_identification }}</td>
			<td>{{ $detalle_sorteo_becas->telephone }}</td>
			<td>{{ $detalle_sorteo_becas->city }}</td>
			<td>{{ $detalle_sorteo_becas->comment }}</td>
			<td>{{ $detalle_sorteo_becas->created_at}}</td>
			<td>{{ $detalle_sorteo_becas->state }}</td>
	</tr>
	</tbody>	
</table>
</div>
@endsection
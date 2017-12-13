@extends('layouts.app')
@section('content')
<div class="container-fluid table-responsive">
<table class="table table-bordered">
	<tr>
			<td>Nombre</td>
			<td>Apellidos</td>
			<td>Fecha de nacimiento</td>
			<td>Email</td>
			<td>DNI/NIE</td>
			<td>Teléfono</td>
			<td>Ciudad</td>
			<td>Comentario</td>
			<td>Fecha</td>
			<td>Estado</td>
	</tr>
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
</table>
</div>
@endsection
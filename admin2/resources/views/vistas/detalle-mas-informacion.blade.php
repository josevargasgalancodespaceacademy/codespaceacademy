@extends('layouts.app')
@section('content')
<div class="container-fluid table-responsive">
<table class="table table-bordered">
	<tr>
			<td>Nombre del contacto</td>
			<td>Email</td>
			<td>Teléfono</td>
			<td>Comentario</td>
			<td>Ciudad</td>
			<td>Curso</td>
			<td>Fecha</td>
			<td>Estado</td>
	</tr>
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
</table>
</div>
@endsection
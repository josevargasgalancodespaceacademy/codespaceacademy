@extends('layouts.app')
@section('content')
<div class="container-fluid table-responsive">
<table class="table table-bordered">
	<tr>
			<td>Nombre</td>
			<td>Email</td>
			<td>Teléfono</td>
			<td>Comentario</td>
			<td>Fecha</td>
	</tr>
	<tr>
			<td>{{ $detalle_contacto->name }}</td>
			<td>{{ $detalle_contacto->email }}</td>
			<td>{{ $detalle_contacto->telephone }}</td>
			<td>{{ $detalle_contacto->comment }}</td>
			<td>{{ $detalle_contacto->created_at}}</td>
	</tr>	
</table>
</div>
@endsection
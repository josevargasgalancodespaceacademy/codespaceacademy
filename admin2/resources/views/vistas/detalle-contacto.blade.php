@extends('layouts.app')
@section('content')
<div class="container-fluid table-responsive">
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Email</th>
			<th>Teléfono</th>
			<th>Comentario</th>
			<th>Fecha</th>
	</thead>
	<tbody>
	<tr>
			<td>{{ $detalle_contacto->name }}</td>
			<td>{{ $detalle_contacto->email }}</td>
			<td>{{ $detalle_contacto->telephone }}</td>
			<td>{{ $detalle_contacto->comment }}</td>
			<td>{{ $detalle_contacto->created_at}}</td>
	</tr>
	</tbody>	
</table>
</div>
@endsection
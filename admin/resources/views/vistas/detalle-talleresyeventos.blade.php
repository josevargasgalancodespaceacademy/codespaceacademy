@extends('layouts.app')
@section('content')
<div class="container-fluid table-responsive">
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Email</th>
			<th>DNI/NIE</th>
			<th>Teléfono</th>
			<th>Fecha</th>
			<th>Estado</th>
	</thead>
	<tbody>
	<tr>
			<td>{{ $detalle_talleresyeventos->name }}</td>
			<td>{{ $detalle_talleresyeventos->email }}</td>
			<td>{{ $detalle_talleresyeventos->number_identification }}</td>
			<td>{{ $detalle_talleresyeventos->telephone }}</td>
			<td>{{ $detalle_talleresyeventos->created_at}}</td>
			<td>{{ $detalle_talleresyeventos->state }}</td>
	</tr>
	</tbody>	
</table>
</div>
@endsection
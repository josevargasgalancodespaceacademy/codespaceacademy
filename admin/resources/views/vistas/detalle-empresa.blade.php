@extends('layouts.app')
@section('content')
<div class="container-fluid table-responsive">
<table class="table table-bordered">
	<thead>
			<th>Nombre de la empresa</th>
			<th>Nombre del contacto</th>
			<th>Email</th>
			<th>Teléfono</th>
			<th>Link</th>
			<th>Petición de formación</th>
			<th>Comentario</th>
			<th>Fecha</th>
			<th>Estado</th>
	</thead>
	<tbody>
	<tr>
			<td>{{ $detalle_empresa->company_name }}</td>
			<td>{{ $detalle_empresa->name }}</td>
			<td>{{ $detalle_empresa->email }}</td>
			<td>{{ $detalle_empresa->telephone }}</td>
			<td><a href="{{ $detalle_empresa->company_link }}" target="_blank">{{ $detalle_empresa->company_link }}</a></td>
			<td>{{ $detalle_empresa->training_request }}</td>
			<td>{{ $detalle_empresa->comment }}</td>
			<td>{{ $detalle_empresa->created_at}}</td>
			<td>{{ $detalle_empresa->state }}</td>
	</tr>	
</tbody>
</table>
</div>
@endsection
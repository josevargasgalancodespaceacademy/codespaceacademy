@extends('layouts.app')
@section('content')
<div class="table-responsive">
<table class="table table-bordered">
	<tr>
			<td>Nombre de la empresa</td>
			<td>Nombre del contacto</td>
			<td>Email</td>
			<td>Teléfono</td>
			<td>Link</td>
			<td>Petición de formación</td>
			<td>Comentario</td>
			<td>Fecha</td>
			<td>Estado</td>
	</tr>
	<tr>
			<td>{{ $detalle_empresa->company_name }}</td>
			<td>{{ $detalle_empresa->name }}</td>
			<td>{{ $detalle_empresa->email }}</td>
			<td>{{ $detalle_empresa->telephone }}</td>
			<td>{{ $detalle_empresa->company_link }}</td>
			<td>{{ $detalle_empresa->training_request }}</td>
			<td>{{ $detalle_empresa->comment }}</td>
			<td>{{ $detalle_empresa->created_at}}</td>
			<td>{{ $detalle_empresa->state }}</td>
	</tr>	
</table>
</div>
@endsection
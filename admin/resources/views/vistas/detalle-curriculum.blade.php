@extends('layouts.app')
@section('content')
<div class="container-fluid table-responsive">
<table class="table table-bordered">
	<thead>
			<th>Nombre del contacto</th>
			<th>Email</th>
			<th>Teléfono</th>
			<th>Web</th>
			<th>Linkedin</th>
			<th>CV</th>
			<th>Fecha</th>
	</thead>
	<tbody>
	<tr>
			<td>{{ $detalle_curriculum->name }}</td>
			<td>{{ $detalle_curriculum->email }}</td>
			<td>{{ $detalle_curriculum->telephone }}</td>
			<td>{{ $detalle_curriculum->website }}</td>
			<td><a href="{{ $detalle_curriculum->linkedin }}" target="_blank">{{ $detalle_curriculum->linkedin }}</a></td>
			<td><a href="https://www.codespaceacademy.com/curriculums/{{ $fecha_ingreso = \Carbon\Carbon::parse($detalle_curriculum->created_at)->format('Y-m-d')}}-{{ $detalle_curriculum->route_curriculum_pdf }}" target="_blank">{{ $detalle_curriculum->route_curriculum_pdf }}</a></td>
			<td>{{ $detalle_curriculum->created_at}}</td>
	</tr>
	</tbody>	
</table>
</div>
@endsection
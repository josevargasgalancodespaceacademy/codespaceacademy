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
			<td>{{ $detalle_candidato->name }}</td>
			<td>{{ $detalle_candidato->email }}</td>
			<td>{{ $detalle_candidato->telephone }}</td>
			<td>{{ $detalle_candidato->website }}</td>
			<td><a href="{{ $detalle_candidato->linkedin }}" target="_blank">{{ $detalle_candidato->linkedin }}</a></td>
			<td><a href="https://www.codespaceacademy.com/curriculums/ofertas-externas/{{ $detalle_candidato->name_offer}}/{{ $fecha_ingreso = \Carbon\Carbon::parse($detalle_candidato->created_at)->format('Y-m-d')}}-{{ $detalle_candidato->route_curriculum_pdf }}" target="_blank">{{ $detalle_candidato->route_curriculum_pdf }}</a></td>
			<td>{{ $detalle_candidato->created_at}}</td>
	</tr>
	</tbody>	
</table>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Fecha</th>
			<th>Acciones</th>
	</thead>
	<tbody>
	@foreach($curriculums as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->created_at }}</td>
			<td><a href="../public/listado-curriculums/{{ $registro->id }}/detalle-curriculum" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span> Ver más </a>
	</tr>	
	@endforeach
</tbody>
</table>
{{$curriculums->links()}}
</div>
@endsection
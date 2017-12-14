@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection
@section('content')
<div class="container">
<table class="table table-bordered">
		<thead>
			<th>Nombre de la empresa</th>
			<th>Fecha</th>
			<th>Estado</th>
			<th>Acciones</th>
		</thead>
		<tbody>
	@foreach($empresas as $registro)
	<tr>
			<td>{{ $registro->company_name }}</td>
			<td>{{ $registro->created_at }}</td>
			<td>{{ $registro->state }}</td>	
			<td><a href="../public/listado-empresas/{{ $registro->id }}/detalle-empresa" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span> Ver más </a>
				<a href="../public/listado-empresas/{{ $registro->id }}/editar-empresa" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar </a></td>	
	</tr>	
	@endforeach
	</tbody>
</table>
{{$empresas->links()}}
</div>
@endsection
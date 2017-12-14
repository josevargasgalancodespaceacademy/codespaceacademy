@extends('layouts.app')
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
			<td><a href="../public/listado-empresas/{{ $registro->id }}/detalle-empresa">Ver más</a></td>	
	</tr>	
	@endforeach
	</tbody>
</table>
{{$empresas->links()}}
</div>
@endsection
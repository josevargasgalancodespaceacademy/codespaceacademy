@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-bordered">
	<tr>
			<td>Nombre de la empresa</td>
			<td>Fecha</td>
			<td>Estado</td>
			<td>Acciones</td>
	</tr>
	@foreach($empresas as $registro)
	<tr>
			<td>{{ $registro->company_name }}</td>
			<td>{{ $registro->created_at }}</td>
			<td>{{ $registro->state }}</td>	
			<td><a href="../public/listado-empresas/{{ $registro->id }}/detalle-empresa">Ver más</a></td>	
	</tr>	
	@endforeach
</table>
{{$empresas->links()}}
</div>
@endsection
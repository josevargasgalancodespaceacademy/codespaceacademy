@extends('layouts.app')
@section('content')
<div class="container col-md-12">
<div class="row">
<div class="container col-md-2"> 
</div>
<div class="container col-md-8"> 
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Fecha</th>
			<th>Acciones</th>
	</thead>
	<tbody>
	@foreach($candidatos as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->created_at }}</td>
			<td><a href="../../listado-ofertas-trabajo/{{ $registro->offer_id }}/candidatos/{{$registro->id}}/detalle-candidato" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span> Ver más </a></td>
	</tr>	
	@endforeach
</tbody>
</table>
<p>Número de registros encontrados: {{$total_candidatos}}</p>
{{$candidatos->links()}}
</div>
</div>
</div>
@endsection
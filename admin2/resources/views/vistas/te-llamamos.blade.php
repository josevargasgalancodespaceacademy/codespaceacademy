@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Teléfono</th>
			<th>Fecha</th>
			<th>Estado</th>
	</thead>
	<tbody>
	@foreach($te_llamamos as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->telephone }}</td>
			<td>{{ $registro->created_at }}</td>
			<td>{{ $registro->state }}</td>	
	</tr>	
	@endforeach
</tbody>
</table>
{{$te_llamamos->links()}}
</div>
@endsection
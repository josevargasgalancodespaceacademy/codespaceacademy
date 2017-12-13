@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-bordered">
	<tr>
			<td>Nombre</td>
			<td>Teléfono</td>
			<td>Fecha</td>
			<td>Estado</td>
	</tr>
	@foreach($te_llamamos as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->telephone }}</td>
			<td>{{ $registro->created_at }}</td>
			<td>{{ $registro->state }}</td>	
	</tr>	
	@endforeach
</table>
{{$te_llamamos->links()}}
</div>
@endsection
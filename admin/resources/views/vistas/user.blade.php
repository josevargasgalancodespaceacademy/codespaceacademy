@extends('layouts.app')
@section('content')
<div class="container col-md-12">
<table class="table table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Nombre de usuario</th>
			<th>Email</th>
			<th>Fecha</th>
	</thead>
	<tbody>
	@foreach($user as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->username }}</td>
			<td>{{ $registro->email}}</td>
			<td>{{ $registro->created_at }}</td>
	</tr>	
	@endforeach
</tbody>
</table>
<p>Número de registros encontrados: {{$total_user}}</p>
{{$user->links()}}
</div>
@endsection
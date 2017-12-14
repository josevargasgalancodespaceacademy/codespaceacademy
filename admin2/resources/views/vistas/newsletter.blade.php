@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-bordered">
	<thead>
			<th>Email</th>
			<th>Fecha</th>
	</thead>
	<tbody>
	@foreach($newsletter as $registro)
	<tr>
			<td>{{ $registro->email }}</td>
			<td>{{ $registro->created_at }}</td>
	</tr>	
	@endforeach
	</tbody>
</table>
{{$newsletter->links()}}
</div>
@endsection
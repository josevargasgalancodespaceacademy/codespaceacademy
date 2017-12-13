@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-bordered">
	<tr>
			<td>Email</td>
			<td>Fecha</td>
	</tr>
	@foreach($newsletter as $registro)
	<tr>
			<td>{{ $registro->email }}</td>
			<td>{{ $registro->created_at }}</td>
	</tr>	
	@endforeach
</table>
{{$newsletter->links()}}
</div>
@endsection
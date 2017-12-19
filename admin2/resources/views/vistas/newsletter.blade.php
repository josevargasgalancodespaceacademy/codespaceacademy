@extends('layouts.app')
@section('content')
@section('content')
<div class="container col-md-12">
<div class="row">
<div class="container col-md-2"> 
<h4 class="title"> Mostrar resultados para: </h4>
{!! Form::open(['route' => ['filtrar-newsletter', $newsletter], 'method' => 'PUT'])!!}
<div class="form-group">
		{!! Form::select('campo_a_filtrar', ['email' => 'Email', 'created_at' => 'Fecha'], null ,['class' => 'form-control']) !!}
</div>
<div class="form-group">
		{!! Form::select('orden', ['asc' => 'Ascendente', 'desc' => 'Descendente'], null ,['class' => 'form-control']) !!}
</div>
<div class="form-group">
		{!! Form::submit('Aplicar filtros', ['class' => 'btn']) !!}
</div>
</div>
<div class="container col-md-8"> 
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
</div>
</div>
@endsection
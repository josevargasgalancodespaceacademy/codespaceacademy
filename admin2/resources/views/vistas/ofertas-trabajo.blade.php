@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection
@section('content')
<div class="container">
<table class="table table-bordered">
		<thead>
			<th>Nombre de la oferta</th>
			<th>Localidad</th>
			<th>Empresa</th>
			<th>Estado</th>
			<th>Fecha</th>
			<th>Acciones</th>
		</thead>
		<tbody>
	@foreach($ofertas_trabajo as $registro)
	<tr>
			<td>{{ $registro->name }}</td>
			<td>{{ $registro->city }}</td>
			<td>{{ $registro->business }}</td>
			@if ($registro->status == 1)
			<td>Oferta activa</td>
			@elseif ($registro->status == 0)
			<td>Oferta desactivada</td>
			@endif	
			<td>{{ $registro->created_at }}</td>	
			<td><a href="../public/listado-ofertas-trabajo/{{ $registro->id }}/detalle-ofertas-trabajo" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span> Ver más </a>
				<a href="../public/listado-ofertas-trabajo/{{ $registro->id }}/editar-ofertas-trabajo" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar </a>
					@if ($registro->status == 1) 
					{!! Form::open(['route' => ['activar-ofertas-trabajo', $registro], 'method' => 'PUT'])!!}
					<div class="form-group">
				    <input type="hidden" name="status" value="0" /></div>
				    <div class="form-group">
							{!! Form::submit('Desactivar oferta', ['class' => 'btn btn-danger']) !!}
				    </div></td>
					{!! Form::close() !!}
					 @else 
					 {!! Form::open(['route' => ['activar-ofertas-trabajo', $registro], 'method' => 'PUT'])!!}
					<div class="form-group">
				    <input type="hidden" name="status" value="1" /></div>
				    <div class="form-group">
							{!! Form::submit('Activar oferta', ['class' => 'btn btn-success']) !!}
				    </div></td>
					{!! Form::close() !!}
				    @endif
	</tr>	
	@endforeach
	</tbody>
</table>
{{$ofertas_trabajo->links()}}
</div>
@endsection
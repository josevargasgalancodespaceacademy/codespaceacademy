@extends('layouts.app')
@section('content')
<div class="container-fluid table-responsive">
<table class="table table-bordered">
	<thead>
			<th>Nombre del contacto</th>
			<th>Email</th>
			<th>Teléfono</th>
			<th>Comentario</th>
			<th>Ciudad</th>
			<th>Curso</th>
			<th>Fecha</th>
			<th>Estado</th>
	</thead>
	<tbody>
	<tr>
			<td>{{ $detalle_mas_informacion->name }}</td>
			<td>{{ $detalle_mas_informacion->email }}</td>
			<td>{{ $detalle_mas_informacion->telephone }}</td>
			<td>{{ $detalle_mas_informacion->comment }}</td>
			<td>{{ $detalle_mas_informacion->city }}</td>
			@switch($detalle_mas_informacion->course)
    				@case(1)
        			<td>Full Stack Web Development Bootcamp Full-Time</td>
        			@break
    				@case(2)
        			<td>Full Stack Web Development Bootcamp Part-Time</td>
        			@break
    				@case(3)
        			<td>Videogames Development Bootcamp</td>
					@break
					@case(4)
        			<td>QA 360</td>
					@break
					@case(5)
        			<td>Curso de iniciación a la programación web</td>
					@break
					@case(6)
        			<td>Curso de iniciación a la programación en Python</td>
					@break
					@case(7)
        			<td>Curso de iniciación a la programación en Java</td>
					@break
    				@default
        			<td>Curso inexistente</td>
					@endswitch
			<td>{{ $detalle_mas_informacion->created_at}}</td>
			<td>{{ $detalle_mas_informacion->state }}</td>
	</tr>
	</tbody>	
</table>
</div>
@endsection
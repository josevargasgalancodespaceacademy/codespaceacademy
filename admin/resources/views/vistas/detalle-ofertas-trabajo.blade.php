@extends('layouts.app')
@section('content')
<div class="container-fluid table-responsive">
<table class="table table-bordered">
	<thead>
			<th>Nombre de la oferta</th>
			<th>Localidad</th>
			<th>Empresa</th>
			<th>Tipo de oferta</th>
			<th>Experiencia mínima</th>
			<th>Estudios mínimos</th>
			<th>Salario mínimo</th>
			<th>Salario máximo</th>
			<th>Requerimientos mínimos</th>
			<th>Número de vacantes</th>
			<th>Tipo de industria</th>
			<th>Descripción corta de la empresa</th>
			<th>Descripción de la oferta</th>
			<th>Estado</th>
			<th>Fecha</th>
	</thead>
	<tbody>
	<tr>
			<td>{{ $detalle_ofertas_trabajo->name }}</td>
			<td>{{ $detalle_ofertas_trabajo->city }}</td>
			<td>{{ $detalle_ofertas_trabajo->business }}</td>
			<td>{{ $detalle_ofertas_trabajo->offer_type }}</td>
			<td>{{ $detalle_ofertas_trabajo->min_experience }}</td>
			<td>{{ $detalle_ofertas_trabajo->min_studies }}</td>
			<td>{{ $detalle_ofertas_trabajo->min_salary}}</td>
			<td>{{ $detalle_ofertas_trabajo->max_salary }}</td>
			<td>{{ $detalle_ofertas_trabajo->min_requirements}}</td>
			<td>{{ $detalle_ofertas_trabajo->num_vacant }}</td>
			<td>{{ $detalle_ofertas_trabajo->industry_type}}</td>
			<td>{{ $detalle_ofertas_trabajo->offer_short_description}}</td>
			<td>{{ $detalle_ofertas_trabajo->offer_description}}</td>
		    @if ($detalle_ofertas_trabajo->status = 1)
			<td>Oferta activa</td>
			@endif
			@if ($detalle_ofertas_trabajo->status = 0)
			<td>Oferta desactivada</td>
			@endif	
			<td>{{ $detalle_ofertas_trabajo->created_at}}</td>
	</tr>	
</tbody>
</table>
</div>
@endsection
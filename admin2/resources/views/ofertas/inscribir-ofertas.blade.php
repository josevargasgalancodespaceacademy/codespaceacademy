@extends('layouts.app')
@section('styles')
 <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
@section('content')
<div class="container">
 <h1 style = "text-align: center; margin-bottom: 50px"> Creación de ofertas de trabajo </h1>
  @if (count($errors) > 0)
  <div class="alert alert-danger" role="alert">
    <ul>
       @foreach($errors->all() as $error)
       <li>{{$error}}</li>
       @endforeach
    </ul>
  </div>
  @endif
    <div class="panel panel-default">
      <div class="panel-heading">Formulario de creación de ofertas de trabajo </div>
        <div class="panel-body">
  {!! Form::open(['route' => ['crear-oferta-de-trabajo'], 'method' => 'PUT'])!!}
  {{ csrf_field() }}
  <div class="form-group col-sm-4">
    {!! Form::label('name','Nombre de la oferta*')!!}
    {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Introduce el nombre de la oferta']) !!}
  </div>
    <div class="form-group col-sm-4">
    {!! Form::label('city','Ciudad*')!!}
    {!! Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'Introduce la localidad']) !!}
  </div>
    <div class="form-group col-sm-4">
    {!! Form::label('business','Empresa*')!!}
    {!! Form::text('business', '', ['class' => 'form-control', 'placeholder' => 'Introduce el nombre de la empresa']) !!}
  </div>
    <div class="form-group col-sm-4">
    {!! Form::label('offer_type','Tipo de oferta*')!!}
    {!! Form::select('offer_type', ['' => 'Tipo de oferta', 'Temporal - jornada parcial' => 'Temporal - jornada parcial', 'Temporal - jornada completa' => 'Temporal - jornada completa', 'Indefinido' => 'Indefinido'], null ,['class' => 'form-control']) !!}
  </div>
    <div class="form-group col-sm-4">
    {!! Form::label('min_experience','Experiencia mínima*')!!}
    {!! Form::select('min_experience', ['' => 'Experencia mínima', '1 año' => '1 año', '2 años' => '2 años', '3 años' => '3 años', '4 años' => '4 años', '5 años' => '5 años', '6 años' => '6 años', '7 años' => '7 años', '8 años' => '8 años', '9 años' => '9 años', '10 años' => '10 años', 'Más de 10 años' => 'Más de 10 años'], null ,['class' => 'form-control']) !!}
  </div>
    <div class="form-group col-sm-4">
    {!! Form::label('min_studies','Estudios mínimos*')!!}
    {!! Form::select('min_studies', ['' => 'Estudios mínimos', 'Educación secundaria obligatoria' => 'Educación secundaria obligatoria', 'Bachillerato o Ciclo Formativo de Grado Medio' => 'Bachillerato o Ciclo Formativo de Grado Medio', 'Ciclo Formativo de Grado Superior' => 'Ciclo Formativo de Grado Superior', 'Título Universitario' => 'Título Universitario', 'Otros títulos y certificaciones' => 'Otros títulos y certificaciones'], null ,['class' => 'form-control']) !!}
  </div>
    <div class="form-group col-sm-4">
    {!! Form::label('min_salary','Salario mínimo*')!!}
    {!! Form::text('min_salary', '', ['class' => 'form-control', 'placeholder' => 'Introduce el salario mínimo']) !!}
  </div>
    <div class="form-group col-sm-4">
    {!! Form::label('max_salary','Salario máximo*')!!}
    {!! Form::text('max_salary', '', ['class' => 'form-control', 'placeholder' => 'Introduce el salario mínimo']) !!}
  </div>
  <div class="form-group col-sm-12 ">
    {!! Form::label('min_requirements','Requisitos mínimos')!!}
    {!! Form::textarea('min_requirements', '', ['class' => 'form-control', 'placeholder' => 'Requisitos mínimos de la oferta']) !!}
  </div>
    <div class="form-group col-sm-4">
    {!! Form::label('num_vacant','Número de vacantes*')!!}
    {!! Form::text('num_vacant', '', ['class' => 'form-control', 'placeholder' => 'Introduce el número de vacantes']) !!}
  </div>
    <div class="form-group col-sm-4">
    {!! Form::label('industry_type','Tipo de industria*')!!}
    {!! Form::text('industry_type', '', ['class' => 'form-control', 'placeholder' => 'Introduce el tipo de industria']) !!}
  </div>
    <div class="form-group col-sm-12 ">
    {!! Form::label('offer_short_description','Descripción corta de la oferta (máximo 300 caracteres)*')!!}
    {!! Form::textarea('offer_short_description', '', ['class' => 'form-control', 'placeholder' => 'Descripción corta de la oferta']) !!}
  </div>
      <div class="form-group col-sm-12 ">
    {!! Form::label('offer_description','Descripción de la oferta')!!}
    {!! Form::textarea('offer_description', '', ['class' => 'form-control', 'placeholder' => 'Descripción de la oferta']) !!}
  </div>
    <div class="form-group col-sm-12">
    {!! Form::submit('Añadir oferta', ['class' => 'btn btn-primary']) !!}
  </div>
  {{ Form::close() }}
</div>
</div>
</div>
@endsection
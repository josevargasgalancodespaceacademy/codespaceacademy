@extends('layouts.app')
@section('styles')
 <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
@section('content')
<div class="container">
 <h1 style = "text-align: center; margin-bottom: 50px"> Creación de eventos </h1>
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
      <div class="panel-heading">Formulario de creación de eventos</div>
        <div class="panel-body">
  {!! Form::open(['route' => ['crear-eventos'], 'method' => 'PUT', 'files' => true])!!}
  {{ csrf_field() }}
  <div class="form-group col-sm-4">
    {!! Form::label('event_name','Nombre del evento*')!!}
    {!! Form::text('event_name', '', ['class' => 'form-control', 'placeholder' => 'Introduce el nombre del evento']) !!}
  </div>
      <div class="form-group col-sm-4">
    {!! Form::label('event_type','Tipo de evento*')!!}
    {!! Form::select('event_type', ['' => 'Tipo de evento', 'Meetup codespace' => 'Meetup codespace', 'Master Class codespace' => 'Master Class codespace', 'Taller codespace' => 'Taller codespace'], null ,['class' => 'form-control']) !!}
  </div>
    <div class="form-group col-sm-4">
    {!! Form::label('event_date','Fecha*')!!}
    {!! Form::text('event_date', '', ['class' => 'form-control', 'placeholder' => 'Introduce la fecha del evento (YYYY/MM/DD)']) !!}
  </div>
    <div class="form-group col-sm-4">
    {!! Form::label('event_hour','Hora*')!!}
    {!! Form::text('event_hour', '', ['class' => 'form-control', 'placeholder' => 'Introduce la hora del evento (HH:MM)']) !!}
  </div>
   <div class="form-group col-sm-4">
    {!! Form::label('event_url','Enlace al evento*')!!}
    {!! Form::text('event_url', '', ['class' => 'form-control', 'placeholder' => 'Introduce un enlace al evento']) !!}
  </div>
     <div class="form-group col-sm-4">
    {!! Form::label('event_image','Imagen del evento*')!!}
    {!! Form::file('event_image', ['class' => 'field']) !!}
  </div>
      <div class="form-group col-sm-12 ">
    {!! Form::label('event_description','Descripción del evento*')!!}
    {!! Form::textarea('event_description', '', ['class' => 'form-control', 'placeholder' => 'Descripción del evento']) !!}
  </div>
    <div class="form-group col-sm-12">
    {!! Form::submit('Añadir evento', ['class' => 'btn btn-primary']) !!}
  </div>
  {{ Form::close() }}
</div>
</div>
</div>
@endsection
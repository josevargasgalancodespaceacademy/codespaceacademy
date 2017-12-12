@extends('layouts.app')
@section('js')
 <script src="{{ asset('js/forms/work_offers.js')}}"></script>
@endsection
@section('css')
 <link href="{{ asset('css/forms.css') }}" rel="stylesheet"> 
@endsection
@section('content')
<div class="container">
        <div class="container formulario-talento"> 
    <h2 class="title"><strong>Inscripción</strong> de ofertas de trabajo</h2>
        <form role="form" id="formulario-ofertas-trabajo">
        <div class="datos-personales">
        <label class="title"> Datos de la oferta</label>
        <div class="talento-field">
        <label class="title-field" for="name">Nombre de la oferta*</label>
        <input class="form-control" id="name"
           placeholder="Introduce el nombre de la oferta" name="name">
       </div>
       <div class="talento-field">
           <label class="title-field" for="city">Lugar*</label>
              <input class="form-control" id="city" 
           placeholder="Introduce la localidad de la oferta" name="city">
        </div>
         <div class="talento-field">
           <label class="title-field" for="business">Empresa*</label>
              <input class="form-control" id="business" 
           placeholder="Introduce el nombre de la empresa" name="business">
        </div>
        <div class="talento-field">
            <label class="title-field" for="offer_type">Tipo de oferta*</label>
          <select class="form-control" id="offer_type" name="offer_type">
      <option value="">Tipo de oferta</option>
       <option value="Temporal - jornada parcial">Temporal - jornada parcial</option>
       <option value="Temporal - jornada completa">Temporal - jornada completa</option>
       <option value="Indefinido">Indefinido</option>
       </select>
       </div>
        <div class="talento-field">
            <label class="title-field" for="min_experience">Experiencia mínima*</label>
          <select class="form-control" id="min_experience" name="min_experience">
      <option value="">Experiencia mínima</option>
       <option value="1 año">1 año</option>
       <option value="2 años">2 años</option>
       <option value="3 años">3 años</option>
       <option value="4 años">4 años</option>
       <option value="5 años">5 años</option>
       <option value="6 años">6 años</option>
       <option value="7 años">7 años</option>
       <option value="8 años">8 años</option>
       <option value="9 años">9 años</option>
       <option value="10 años">10 años</option>
       <option value="Más de 10 años">Más de 10 años</option>
       </select>
       </div>
       <div class="talento-field">
            <label class="title-field" for="min_studies">Estudios mínimos*</label>
          <select class="form-control" id="min_studies" name="min_studies">
      <option value="">Estudios mínimos</option>
       <option value="Educacion secundaria obligatoria">Educación secundaria obligatoria</option>
       <option value="Bachillerato o CF Grado medio">Bachillerato o Ciclo Formativo de Grado medio</option>
       <option value="Ciclo Formativo Grado superior">Ciclo Formativo de Grado superior</option>
       <option value="Título universitario">Título universitario</option>
        <option value="Otros títulos y certificaciones">Otros títulos y certificaciones</option>
       </select>
       </div>
       <div class="talento-field">
           <label class="title-field" for="salary">Salario mínimo*</label>
              <input class="form-control" id="min_salary" 
           placeholder="Introduce el salario mínimo" name="min_salary">
        </div>
           <div class="talento-field">
           <label class="title-field" for="salary">Salario máximo*</label>
              <input class="form-control" id="max_salary" 
           placeholder="Introduce el salario máximo" name="max_salary">
        </div>
        <br>
       <div>
       <label for="min_requirements" class="title-field">Requisitos mínimos*</label>
        <textarea class="form-control" id="min_requirements"
           placeholder="Requisitos mínimos de la oferta" name="min_requirements"></textarea>
       </div>
     </div>
       <div class="empresa">
       <label  class="title"> Detalles de la oferta</label>
       <div class="talento-field">
        <label class="title-field" for="num_vacant">Número de vacantes*</label>
       <input class="form-control" id="num_vacant" 
           placeholder="Introduce el número de vacantes" name="num_vacant">
           </div>
        <div class="talento-field">
       <label class="title-field" for="industry_type">Tipo de industria*</label>
           <input class="form-control" id="industry_type" 
           placeholder="Introduce el tipo de industria al que pertenece la oferta" name="industry_type">
           </div>
      </div>
      <div class="form-formacion-a-medida">  
      <div class="form-group">
       <label for="offer_short_description">Descripción corta de la oferta (máximo 120 caracteres)*</label>
        <textarea class="form-control" id="offer_short_description"
           placeholder="Descripción básica de la oferta" name="offer_short_description"></textarea>
      </div>
      <div class="form-group">
       <label for="offer_short_description">Descripción de la oferta*</label>
        <textarea class="form-control" id="offer_description"
           placeholder="Descripción detallada de la oferta" name="offer_description"></textarea>
         </div>
      </div>
      <button type="button" class="button fondobutton btn boton-enviar-talent" onclick="enviar_work_offer()">Inscribir oferta</button>
      <div class="mensajerror">Uno o mas campos del formulario tienen errores.</div>
      </form>
      </div>
    </div>
@endsection
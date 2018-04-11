<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Events;
use App\Http\Requests\ContenidoWeb\RequestCrearEventos;

class EventsController extends Controller
{
     //Creacion de ofertas de trabajo 
        public function crear_eventos(Request $request, RequestCrearEventos $requestcreareventos)
     {
         $validator = Validator::make($requestcreareventos->all(), $requestcreareventos->rules(), $requestcreareventos->messages());
         if ($validator->valid())
         {
         $Events = new Events();
         $Events->event_name =  $request->event_name;
         $Events->event_type =  $request->event_type;
         $Events->event_date =  $request->event_date;
         $Events->event_hour =  $request->event_hour;
         $Events->event_description =  $request->event_description;
         $Events->event_url =  $request->event_url;
         $Events->save();
         $request->file('event_image')->store('https://www.codespaceacademy.com/assets/images/eventos');
}
     }
}
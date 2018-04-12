<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Events;
use App\Http\Requests\ContenidoWeb\RequestCrearEventos;

class EventsController extends Controller
{
     //Creacion de eventos
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
         //$file = $request->file('event_image');
         $path = "var/www/codespaceacademy/assets";
         //$file->storeAs($path, $request->file('event_image')->getClientOriginalName());
         $request->file('event_image')->move($path,$file->getClientOriginalName());
         //$Events->event_image = $request->file('event_image')->getClientOriginalName();
         //@move_uploaded_file($origen, $destino);
         //$Events->save();
         //return redirect()->route('home');
         dd($path);
}
     }
}
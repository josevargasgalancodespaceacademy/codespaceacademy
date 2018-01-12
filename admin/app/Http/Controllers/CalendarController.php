<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eventosagendacalendario;

class CalendarController extends Controller
{
public function index()
    {
        $data = array(); //declaramos un array principal que va contener los datos
        $id = eventosagendacalendario::all()->pluck('id'); //listamos todos los id de los eventos
        $titulo = eventosagendacalendario::all()->pluck('title'); //lo mismo para lugar y fecha
        $fechaIni = eventosagendacalendario::all()->pluck('date_start');
        $fechaFin = eventosagendacalendario::all()->pluck('date_end');
        $allDay = eventosagendacalendario::all()->pluck('all_day');
        $background =eventosagendacalendario::all()->pluck('color');
        $count = count($id); //contamos los ids obtenidos para saber el numero exacto de eventos
 
        //hacemos un ciclo para anidar los valores obtenidos a nuestro array principal $data
        for($i=0;$i<$count;$i++){
            $data[$i] = array(
                "title"=>$titulo[$i], //obligatoriamente "title", "start" y "url" son campos requeridos
                "start"=>$fechaIni[$i], //por el plugin asi que asignamos a cada uno el valor correspondiente
                "end"=>$fechaFin[$i],
                "allDay"=>$allDay[$i],
                "backgroundColor"=>$background[$i],
                "id"=>$id[$i]
                //"url"=>"cargaEventos".$id[$i]
                //en el campo "url" concatenamos el el URL con el id del evento para luego
                //en el evento onclick de JS hacer referencia a este y usar el método show
                //para mostrar los datos completos de un evento
            );
        }
 
       json_encode($data); //convertimos el array principal $data a un objeto Json 
       return $data; //para luego retornarlo y estar listo para consumirlo
    }

    public function create(){
        //Valores recibidos via ajax
        $title = $_POST['title'];
        $start = $_POST['start'];
        $back = $_POST['background'];

        //Insertando evento a base de datos
        $evento=new eventosagendacalendario;
        $evento->date_start=$start;
        //$evento->date_end=$end;
        $evento->all_day=true;
        $evento->color=$back;
        $evento->title=$title;
        $evento->save();
   }

   public function update(){
        //Valores recibidos via ajax
        $id = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $allDay = $_POST['allday'];
        $back = $_POST['background'];

        $evento=eventosagendacalendario::find($id);
        if($end=='NULL'){
            $evento->date_end=NULL;
        }else{
            $evento->date_end=$end;
        }
        $evento->date_start=$start;
        $evento->all_day=$allDay;
        $evento->color=$back;
        $evento->title=$title;
        //$evento->fechaFin=$end;

        $evento->save();
   }

   public function delete(){
        //Valor id recibidos via ajax
        $id = $_POST['id'];

        eventosagendacalendario::destroy($id);
   }
}
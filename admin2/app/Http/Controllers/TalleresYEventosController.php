<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TalleresYEventos;

class TalleresYEventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta()
    {
    	$talleresyeventos = TalleresYEventos::orderBy('name' ,'asc')->paginate(15);
        $total_talleresyeventos = TalleresYEventos::all()->count();
    	return view('vistas.talleresyeventos')->with('talleresyeventos', $talleresyeventos)->with('total_talleresyeventos', $total_talleresyeventos);
    }
}

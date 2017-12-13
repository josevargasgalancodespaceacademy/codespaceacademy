<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SorteoBecas;

class SorteoBecasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta()
    {
    	$sorteo_becas = SorteoBecas::all('id' ,'name', 'surnames', 'date_of_birth', 'email', 'type_identification', 'number_identification', 'telephone', 'city', 'comment', 'created_at', 'state');
    	$sorteo_becas = SorteoBecas::paginate(15);
    	return view('vistas.sorteo-becas')->with('sorteo_becas', $sorteo_becas);
    }
    public function detalle($id)
    {
    	$detalle_sorteo_becas = SorteoBecas::find($id);
    	return view('vistas.detalle-sorteo-becas')->with('detalle_sorteo_becas', $detalle_sorteo_becas);
    }
}

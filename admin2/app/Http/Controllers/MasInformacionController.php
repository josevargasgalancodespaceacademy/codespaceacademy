<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasInformacion;

class MasInformacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta()
    {
    	$mas_informacion = MasInformacion::all('id' ,'name', 'email', 'telephone', 'comment', 'created_at', 'state');
    	return view('vistas.mas-informacion')->with('mas_informacion', $mas_informacion);
    }
    public function detalle($id)
    {
    	$detalle_mas_informacion = MasInformacion::find($id);
    	return view('vistas.detalle-mas-informacion')->with('detalle_mas_informacion', $detalle_mas_informacion);
    }
}

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
        $mas_informacion = MasInformacion::paginate(15);
    	return view('vistas.mas-informacion')->with('mas_informacion', $mas_informacion);
    }
    public function detalle($id)
    {
    	$detalle_mas_informacion = MasInformacion::find($id);
    	return view('vistas.detalle-mas-informacion')->with('detalle_mas_informacion', $detalle_mas_informacion);
    }
    public function editar($id)
    {
        $registro_a_editar = MasInformacion::find($id);
        return view('vistas.editar-mas-informacion')->with('registro_a_editar', $registro_a_editar);
    }
    public function actualizar(Request $request, $id)
    {
               $registro_a_editar = MasInformacion::find($id);
         $registro_a_editar->state = $request->state;
         $registro_a_editar->observations = $request->observations;
         $registro_a_editar->save();
         return redirect()->route('listado-mas-informacion');
    }
}

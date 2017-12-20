<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\Vistas\EditarRequest;
use App\MasInformacion;

class MasInformacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta()
    {
        $mas_informacion = MasInformacion::orderBy('name' ,'asc')->paginate(15);
        $total_mas_informacion = MasInformacion::all()->count();
    	return view('vistas.mas-informacion')->with('mas_informacion', $mas_informacion)->with('total_mas_informacion', $total_mas_informacion);
    }
    public function filtrar_mas_informacion(Request $request)
    {
        $mas_informacion = MasInformacion::orderBy($request->campo_a_filtrar , $request->orden)->paginate(15);
        if (!empty ($request->state)) 
        {
            $mas_informacion = MasInformacion::orderBy($request->campo_a_filtrar , $request->orden)->where('state', '=',$request->state)->paginate(15);
        }
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
    public function actualizar(Request $request, $id, EditarRequest $editarrequest)
    {
         $validator = Validator::make($editarrequest->all(), $editarrequest->rules(), $editarrequest->messages());
         if ($validator->valid())
         {
         $registro_a_editar = MasInformacion::find($id);
         $registro_a_editar->state = $request->state;
         $registro_a_editar->observations = $request->observations;
         $registro_a_editar->save();
         return redirect()->route('listado-mas-informacion');
    }
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\Vistas\EditarRequest;
use App\OfertasTrabajo;

class OfertasTrabajoController extends Controller
{
    	public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta(Request $request)
    {
    	$ofertas_trabajo = OfertasTrabajo::all('id' ,'name', 'city', 'business', 'status');
    	$ofertas_trabajo = OfertasTrabajo::paginate(15);
    	return view('vistas.ofertas-trabajo')->with('ofertas_trabajo', $ofertas_trabajo);
    }
    public function detalle($id)
    {
    	$detalle_ofertas_trabajo = OfertasTrabajo::find($id);
    	return view('vistas.detalle-ofertas-trabajo')->with('detalle_ofertas_trabajo', $detalle_ofertas_trabajo);
    }
    public function editar($id)
    {
    	$registro_a_editar = OfertasTrabajo::find($id);
    	return view('vistas.editar-ofertas-trabajo')->with('registro_a_editar', $registro_a_editar);
    }
    public function actualizar(Request $request, $id, EditarRequest $editarrequest)
    {
    	 $validator = Validator::make($editarrequest->all(), $editarrequest->rules(), $editarrequest->messages());
    	 if ($validator->valid())
    	 {
         $registro_a_editar = ofertas_trabajos::find($id);
         $registro_a_editar->state = $request->state;
         $registro_a_editar->observations = $request->observations;
         $registro_a_editar->save();
         return redirect()->route('listado-ofertas-trabajo');
     }
    }
}
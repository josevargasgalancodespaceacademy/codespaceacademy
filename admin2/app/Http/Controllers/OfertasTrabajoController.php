<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\Vistas\EditarRequest;
use App\OfertasTrabajo;
use App\CurriculumsOfertasTrabajo;


class OfertasTrabajoController extends Controller
{
    	public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta(Request $request)
    {
    	$ofertas_trabajo = OfertasTrabajo::orderBy('name' ,'asc')->paginate(15);
        $total_ofertas_trabajo= OfertasTrabajo::all()->count();
    	return view('vistas.ofertas-trabajo')->with('ofertas_trabajo', $ofertas_trabajo)->with('total_ofertas_trabajo', $total_ofertas_trabajo);
    }
    public function filtrar_ofertas_trabajo(Request $request)
    {
        $ofertas_trabajo = OfertasTrabajo::orderBy($request->campo_a_filtrar , $request->orden)->paginate(15);
        $total_ofertas_trabajo= OfertasTrabajo::orderBy($request->campo_a_filtrar , $request->orden)->count();
        if ($request->status>=0) 
        {
            $ofertas_trabajo = OfertasTrabajo::orderBy($request->campo_a_filtrar , $request->orden)->where('status', '=',$request->status)->paginate(15);
            $total_ofertas_trabajo = OfertasTrabajo::orderBy($request->campo_a_filtrar , $request->orden)->where('status', '=',$request->status)->count();
        }
        return view('vistas.ofertas-trabajo')->with('ofertas_trabajo', $ofertas_trabajo)->with('total_ofertas_trabajo',$total_ofertas_trabajo);
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
         $registro_a_editar = OfertasTrabajo::find($id);
         $registro_a_editar->state = $request->state;
         $registro_a_editar->observations = $request->observations;
         $registro_a_editar->save();
         return redirect()->route('listado-ofertas-trabajo');
     }
    }
    public function activar_oferta(Request $request, $id)
    {
         $registro_a_editar = OfertasTrabajo::find($id);
         $registro_a_editar->status = $request->status;
         $registro_a_editar->save();
         return redirect()->route('listado-ofertas-trabajo');
    }
        public function mostrar_candidatos($id)
    {
        $candidatos = CurriculumsOfertasTrabajo::where('offer_id', '=',$id)->paginate(15);
        $total_candidatos = CurriculumsOfertasTrabajo::where('offer_id', '=',$id)->count();
        return view('ofertas.candidatos-oferta')->with('candidatos', $candidatos)->with('total_candidatos', $total_candidatos);
    }
        public function detalle_candidatos($id)
    {
        $detalle_candidato= CurriculumsOfertasTrabajo::find($id);
        return view('ofertas.detalle-candidatos-oferta')->with('detalle_candidato', $detalle_candidato);
    }
}

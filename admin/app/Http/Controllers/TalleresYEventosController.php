<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\Vistas\EditarRequest;
use App\TalleresYEventos;

class TalleresYEventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta()
    {
    	$talleresyeventos = TalleresYEventos::orderBy('created_at' ,'desc')->paginate(15);
        $total_talleresyeventos = TalleresYEventos::all()->count();
    	return view('vistas.talleresyeventos')->with('talleresyeventos', $talleresyeventos)->with('total_talleresyeventos', $total_talleresyeventos);
    }
        public function filtrar_talleresyeventos(Request $request)
    {
        $talleresyeventos = TalleresYEventos::orderBy($request->campo_a_filtrar , $request->orden)->paginate(15);
        $total_talleresyeventos = TalleresYEventos::orderBy($request->campo_a_filtrar , $request->orden)->count();
        if (!empty ($request->state)) 
        {
            $talleresyeventos = TalleresYEventos::orderBy($request->campo_a_filtrar , $request->orden)->where('state', '=',$request->state)->paginate(15);
            $total_talleresyeventos = TalleresYEventos::orderBy($request->campo_a_filtrar , $request->orden)->where('state', '=',$request->state)->count();
        }
        return view('vistas.talleresyeventos')->with('talleresyeventos', $talleresyeventos)->with('total_talleresyeventos', $total_talleresyeventos);
    }
        public function detalle($id)
    {
    	$detalle_talleresyeventos = TalleresYEventos::find($id);
    	return view('vistas.detalle-talleresyeventos')->with('detalle_talleresyeventos', $detalle_talleresyeventos);
    }
    public function editar($id)
    {
    	$registro_a_editar = TalleresYEventos::find($id);
    	return view('vistas.editar-talleresyeventos')->with('registro_a_editar', $registro_a_editar);
    }
        public function actualizar(Request $request, $id, EditarRequest $editarrequest)
    {
    	 $validator = Validator::make($editarrequest->all(), $editarrequest->rules(), $editarrequest->messages());
    	 if ($validator->valid())
    	 {
         $registro_a_editar = TalleresYEventos::find($id);
         $registro_a_editar->state = $request->state;
         $registro_a_editar->observations = $request->observations;
         $registro_a_editar->save();
         return redirect()->route('listado-talleresyeventos');
     }
    }
}


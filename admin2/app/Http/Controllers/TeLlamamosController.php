<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeLLamamos;

class TeLlamamosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta()
    {
    	$te_llamamos = TeLLamamos::all('id' ,'name', 'telephone', 'created_at', 'state', 'observations');
    	$te_llamamos = TeLLamamos::paginate(15);
    	return view('vistas.te-llamamos')->with('te_llamamos', $te_llamamos);
    }
    public function editar($id)
    {
        $registro_a_editar = TeLLamamos::find($id);
        return view('vistas.editar-te-llamamos')->with('registro_a_editar', $registro_a_editar);
    }
    public function actualizar(Request $request, $id)
    {
         $registro_a_editar = TeLLamamos::find($id);
         $registro_a_editar->state = $request->state;
         $registro_a_editar->observations = $request->observations;
         $registro_a_editar->save();
         return redirect()->route('listado-te-llamamos');
    }
}

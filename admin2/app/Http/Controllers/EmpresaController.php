<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\Vistas\EditarRequest;
use App\Empresas;

class EmpresaController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta(Request $request)
    {
    	$empresas = Empresas::all('id' ,'name', 'company_name', 'email', 'telephone', 'comment', 'created_at', 'state', 'observations');
    	$empresas = Empresas::orderBy('company_name' ,'asc')->paginate(15);
    	return view('vistas.empresas')->with('empresas', $empresas);
    }
    public function detalle($id)
    {
    	$detalle_empresa = Empresas::find($id);
    	return view('vistas.detalle-empresa')->with('detalle_empresa', $detalle_empresa);
    }
    public function editar($id)
    {
    	$registro_a_editar = Empresas::find($id);
    	return view('vistas.editar-empresa')->with('registro_a_editar', $registro_a_editar);
    }
    public function actualizar(Request $request, $id, EditarRequest $editarrequest)
    {
    	 $validator = Validator::make($editarrequest->all(), $editarrequest->rules(), $editarrequest->messages());
    	 if ($validator->valid())
    	 {
         $registro_a_editar = Empresas::find($id);
         $registro_a_editar->state = $request->state;
         $registro_a_editar->observations = $request->observations;
         $registro_a_editar->save();
         return redirect()->route('listado-empresas');
     }
    }
}

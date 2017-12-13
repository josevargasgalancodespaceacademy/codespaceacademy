<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;

class EmpresaController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta()
    {
    	$empresas = Empresas::all('id' ,'name', 'company_name', 'email', 'telephone', 'comment', 'created_at', 'state');
    	return view('vistas.empresas')->with('empresas', $empresas);
    }
    public function detalle($id)
    {
    	$detalle_empresa = Empresas::find($id);
    	return view('vistas.detalle-empresa')->with('detalle_empresa', $detalle_empresa);
    }
}

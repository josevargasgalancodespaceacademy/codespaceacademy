<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;

class ContactoController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta()
    {
    	$contacto = Contacto::all('id' ,'name', 'email', 'telephone', 'comment', 'created_at' , 'state', 'observations');
        $contacto = Contacto::paginate(15);
    	return view('vistas.contacto')->with('contacto', $contacto);
    }
    public function detalle($id)
    {
    	$detalle_contacto = Contacto::find($id);
    	return view('vistas.detalle-contacto')->with('detalle_contacto', $detalle_contacto);
    }
    public function editar($id)
    {
        $registro_a_editar = Contacto::find($id);
        return view('vistas.editar-contacto')->with('registro_a_editar', $registro_a_editar);
    }
    public function actualizar(Request $request, $id)
    {
         $registro_a_editar = Contacto::find($id);
         $registro_a_editar->state = $request->state;
         $registro_a_editar->observations = $request->observations;
         $registro_a_editar->save();
         return redirect()->route('listado-contacto');
    }
}

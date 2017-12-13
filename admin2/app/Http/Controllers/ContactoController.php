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
    	$contacto = Contacto::all('id' ,'name', 'email', 'telephone', 'comment', 'created_at');
        $contacto = Contacto::paginate(15);
    	return view('vistas.contacto')->with('contacto', $contacto);
    }
    public function detalle($id)
    {
    	$detalle_contacto = Contacto::find($id);
    	return view('vistas.detalle-contacto')->with('detalle_contacto', $detalle_contacto);
    }
}

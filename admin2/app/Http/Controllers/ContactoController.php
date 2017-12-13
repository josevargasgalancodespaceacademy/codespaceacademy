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
    	return view('auth.vistas.contacto')->with('contacto', $contacto);
    }
    public function detalle($id)
    {
    	$detalle_contacto = Contacto::find($id);
    	return view('auth.vistas.detalle-contacto')->with('detalle_contacto', $detalle_contacto);
    }
}

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
    	$te_llamamos = TeLLamamos::all('id' ,'name', 'telephone', 'created_at', 'state');
    	$te_llamamos = TeLLamamos::paginate(15);
    	return view('vistas.te-llamamos')->with('te_llamamos', $te_llamamos);
    }
    public function editar()
    {
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeLlamamos;

class TeLlamamosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function consulta()
    {
    	$te_llamamos = TeLlamamos::all('id' ,'name', 'telephone', 'created_at', 'state');
    	return view('vistas.te-llamamos')->with('te_llamamos', $te_llamamos);
    }
}
